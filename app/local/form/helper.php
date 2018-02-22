<?php
/**
 * Validation and form handling helper
 * 
 * @package app-start
 * @subpackage Validation
 */
class App_Local_Form_Helper
{
	/**
	 * Instance of Outlet singleton {@link Outlet}
	 * @var Outlet  
	 */
	protected $outlet;
	
	/**
	* Instance of HTTP-request class {@link Cpf_Core_Request}
 	* @var Cpf_Core_Request	
	*/
	protected $request;	
	
	/**
	* Instance of configuration class {@link Cpf_Core_Config}
 	* @var Cpf_Core_Config
	*/				
	protected $config;	
	
	/**
	* Instance of view {@link Cpf_Core_View}
 	* @var Cpf_Core_View
	*/			
	protected $view;
	
	/**
	* Name of the entity
 	* @var string
	*/				
	protected $entity_name;

	/**
	* Current entity (adding or editing)
 	* @var mixed
	*/						
	protected $entity;

	/**
	* Entity configuration 
 	* @var array
	*/						
	protected $entities;
	
	/**
	* Validation errors 
 	* @var array
	*/				
	protected $errors;

	/**
	* Flag, when set to TRUE the entity is in 'editing' mode
 	* @var bool
	*/		
	protected $is_edit = FALSE;			

	/**
	* Only this fields will be updated from form values
 	* @var array
	*/				
	protected $limit_fields_list = array();
			
	/**
	 * Default constructor
	 * 
	 * @param string $entity_name Name of the entity
	 * @param Cpf_Core_Request $request Current HTTP request to get values from
	 * @param Cpf_Core_View $view Current view to assign values to
	 * @param mixed $entity Current entity, if set, edit mode is enabled [optional]
	 * @param array $limit_fields_list Array of field titles to limit updating entity fields [optional]
	 * @return void
	 */
	public function __construct($entity_name, Cpf_Core_Request $request, Cpf_Core_View $view, App_Model_Base_Model $entity = NULL, $limit_fields_list = NULL)
	{
		$this->entity_name = $entity_name;
		$this->request = $request;
		$this->view = $view;
		$this->config = Cpf_Core_Config::get_instance();
		$this->errors = array();
		$temp_config = $this->config->value('MODEL.OUTLET.CONFIG');
		$this->entities = $temp_config['classes'];
		$this->outlet = Outlet::getInstance();

		if (is_null($entity))
		{
			$this->entity =	new $this->entity_name();
		}
		else
		{
			$this->entity = $entity;
			$this->is_edit = TRUE;
		}

		if (!is_null($limit_fields_list))
		{
			$this->limit_fields_list = $limit_fields_list;
		}
		
		$this->view->assign('cpf_current_entity', $this->entity);	
		$this->view->assign('cpf_is_edit', $this->is_edit);
	}
	
	/**
	 * Checks if we have validation errors
	 * 
	 * @return bool If we have validation errors
	 */
	public function has_errors()
	{
		return !empty($this->errors);
	}
	
	/**
	 * Fills entity with values from request and performs validation,
	 * validation errors are assigned to view
	 * 
	 * @return bool Returns if validation was sucessfull
	 */
	public function validate()
	{
		//call specific preprocess function
		$this->pre_process();

		foreach ($this->entities[$this->entity_name]['props'] as $key => $value)
		{
			if (
				($post_value = $this->request->post($key)) !== FALSE && 
				( empty($this->limit_fields_list) || (!empty($this->limit_fields_list) && in_array($key, $this->limit_fields_list)))
			)			
			{
				switch ($value[1])
				{
					case 'varchar':
					case 'text':						
						$html_allowed = isset($this->entities[$this->entity_name]['html_fields']) && in_array($key, $this->entities[$this->entity_name]['html_fields']);
						$this->entity->$key = (!$html_allowed && !is_array($this->request->post[$key])) ? Cpf_Utils_Cleaner::strip_html($this->request->post[$key]) : $this->request->post($key);
					break;

					case 'int':						
						$this->entity->$key = (strtolower(trim($post_value)) === 'on') ? 1 : intval($post_value);
					break;

					case 'float':
						//should work for most locales
						$temp = str_replace(' ', '', $post_value);
						$temp = str_replace(',', '.', $temp);
						$this->entity->$key = floatval($temp);
					break;

					case 'datetime':
						$field = trim($post_value);
						if (App_Utils_Validation::is_valid_date($field, $this->request->lang))
						{
							$temp = new DateTime(date(DATE_ATOM, App_Utils_Validation::date_to_unixtime($field, $this->request->lang)));  
							if (($post_value = $this->request->post($key . '_time')) !== FALSE)
							{
								$field_time = trim($post_value);								
								if (App_Utils_Validation::is_valid_time($field_time, $this->request->lang))
								{
									$time_values = App_Utils_Validation::time_to_array($field_time, $this->request->lang);
									$temp->setTime($time_values['h'], $time_values['m'],0);
								}
							}
							$this->entity->$key = $temp;					
						}
						else
						{
							$this->entity->$key = NULL;
						}
					break;
				}
			}
			else
			{
				// checkbox input type
				// когда чекбокс не отмечен в в браузере, то значение не посылается через post
				// поэтому и делаем след. проверку для чекбокса... 
				
				// ACHTUNG! есть маленькая проблема с этим... например, во Фронтэнде, если некоторые параметры типа integer 
				// мы не выносим в форму, то, соотв. они идут в этот алгоритм, что не есть хорошо
				//
				// решение: руками сохранять параметры в наследнике Form_Helper  
				if($value[1] === 'int')
				{
					if(isset($value[2]) and isset($value[2]['default']))
					{
						$this->entity->$key = $value[2]['default'];
					}
				}
			}
		}

		//call specific function
		$this->post_process();

		//call specific  function
		$this->pre_validate();

		$this->entity->validate($this->errors, $this->is_edit);

		//call specific  function
		$this->post_validate();
		
		if ($this->has_errors())
		{
			foreach ($this->request->post as $key => $value)
			{
				$this->view->assign($key, $value);
			}
			foreach ($this->entities[$this->entity_name]['props'] as $key => $value)
			{
				if (!isset($this->request->post[$key]))
				{
					$this->_assign_property($key, $value);
				}
			}
			$this->view->assign('cpf_errors', $this->errors);
		}
				
		return !$this->has_errors();
	}
	
	/**
	 * Assigns entity properties to the view
	 * 
	 * @return void
	 */
	public function load($entity = NULL)
	{
		if ($entity != NULL)
		{
			$this->entity = $entity;
		}
		
		//call specific function
		$this->pre_load();

		foreach ($this->entities[$this->entity_name]['props'] as $key => $value)			
		{
			$this->_assign_property($key, $value);
		}

		//call specific function
		$this->post_load();
	}
	
	/**
	 * Returns processed entity
	 * 
	 * @return mixed Current entity filled with values from request
	 */
	public function fill()
	{
		return $this->entity;
	}
	
	/**
	 * Called inside <samp>validate()</samp> method before assigning values from request to entity
	 * 
	 * @return void
	 */
	protected function pre_process()
	{
	}

	/**
	 * Called inside <samp>validate()</samp> method after assigning values from request to entity
	 * 
	 * @return void
	 */
	protected function post_process()
	{
	}

	/**
	 * Called inside <samp>validate()</samp> method before validation
	 * 
	 * @return void
	 */
	protected function pre_validate()
	{
	}
	
	/**
	 * Called inside <samp>validate()</samp> method after validation
	 * 
	 * @return void
	 */
	protected function post_validate()
	{
	}
	
	/**
	 * Called inside <samp>load()</samp> method before loading
	 * 
	 * @return void
	 */
	protected function pre_load()
	{
	}

	/**
	 * Called inside <samp>load()</samp> method after loading
	 * 
	 * @return void
	 */
	protected function post_load()
	{
	}
	
	/**
	 * Assigns entity property to the view with formatting
	 * 
	 * @return void
	 */
	private function _assign_property($key, $value)
	{
		switch ($value[1])
		{
			case 'datetime':
				$this->view->assign($key, App_Utils_Validation::format_datetime_date($this->entity->$key, $this->request->lang));
				$this->view->assign($key . '_time', App_Utils_Validation::format_datetime_time($this->entity->$key, $this->request->lang));
			break;
			
			case 'float':
				$lang_settings = $this->config->value('LANGS.LIST.' . $this->request->lang);
				$this->view->assign($key, number_format($this->entity->$key, $lang_settings['float_format']['decimals'], $lang_settings['float_format']['decimal_point'], $lang_settings['float_format']['thousands_separator']));
			break;
			
			default:
				$this->view->assign($key, $this->entity->$key);
			break;
		}
	}	
}
?>