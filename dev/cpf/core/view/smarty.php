<?php
/**
 * The main view class for CPF that uses Smarty 
 * 
 * Note: <samp>$this->data</samp> is not used. Underlying Smarty instance is using instead.
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_View_Smarty extends Cpf_Core_View
{
	/**
	* Smarty instance
 	* @var Smarty	
	*/
	protected $sm;
	
	/**
	 * Path to the template to process
	 * @var string  
	 */
	public $template_name;

	/**
	 * Constructor that instantiates Smarty and register build-in Smarty functions
	 * 
	 * The following Smarty plugins are registered:
	 * - <samp>link</samp> function (URL generation)
	 * - <samp>t</samp> block (Gettext)
	 * - <samp>control</samp> function (Control support)
	 * 
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->sm = new Smarty();

		$this->sm->setDebugging($this->config->value('VIEW.SMARTY.DEBUG'));
		$this->sm->setCompileCheck($this->config->value('VIEW.SMARTY.COMPILE_CHECK'));
		$this->sm->setErrorReporting($this->config->value('VIEW.SMARTY.ERROR_REPORTING'));

		$this->sm->setTemplateDir($this->config->value('VIEW.SMARTY.DIRS.TEMPLATES'));
		$this->sm->setCompileDir($this->config->value('VIEW.SMARTY.DIRS.COMPILE'));
		$this->sm->setConfigDir($this->config->value('VIEW.SMARTY.DIRS.COMPILE'));
		$this->sm->setCacheDir($this->config->value('VIEW.SMARTY.DIRS.COMPILE'));
		
		$this->sm->setPluginsDir($this->config->value('VIEW.SMARTY.DIRS.PLUGINS'));
				
		$this->sm->registerPlugin('function', 'link', array($this, 'link'));
		$this->sm->registerPlugin('block', 't', array($this,'translate'));
		$this->sm->registerPlugin('function', 'control', array($this, 'get_control'));		
	}

	/**
	 * Renders tamplate using Smarty <samp>display()</samp> method
	 * 
	 * @return void
	 */
	public function render()
	{
		$this->display($this->template_name);
	}

	/**
	 * Simply perform <samp>assign()</samp> on Smarty object
	 * 
	 * @param mixed $key Key for data
	 * @param mixed $value Value of assigned variable
	 * @return void
	 */
	public function assign($key, $value)
	{
		$this->sm->assign($key, $value);
	}

	/**
	 * Renders template to string 
	 * 
	 * @param mixed $resource Valid Smarty resource
	 * @return string Result of rendering
	 */
	public function fetch($resource)
	{
		return $this->sm->fetch($resource);
	}

	/**
	 * Renders template to output using 
	 * 
	 * @param mixed $resource Valid Smarty resource
	 * @return void
	 */
	public function display($resource)	
	{
		$this->sm->display($resource);
	}

	/**
	 * Assigns variable by reference 
	 * 
	 * @param mixed $key Key for data
	 * @param mixed $value Value of assigned variable
	 * @return void
	 */
	public function assign_by_ref($key, &$value)
	{
		$this->sm->assignByRef($key, $value);
	} 

	/**
	 * Registers template function
	 * 
	 * @param mixed $name
	 * @param mixed $signature
	 * @return void
	 */
	public function register_function($name, $signature)
	{
		$this->sm->registerPlugin('function', $name, $signature);
	}

	/**
	 * Registers Smarty modifier
	 * 
	 * @param mixed $name
	 * @param mixed $signature
	 * @return void
	 */
	public function register_modifier($name, $signature)
	{
		$this->sm->registerPlugin('modifier', $name, $signature);
	}

	/*
		Smarty-registered functions
	*/
	/**
	 * Smarty-registered function for creating links.
	 * 
	 * Function calls <samp>link()</samp> method of <samp>Cpf_Core_Url_Router</samp>. 
	 * For detailed documentation and examples see Quick Start guide.
	 * 
	 * @param mixed $params
	 * @return
	 */
	public function link($params)
	{
		if (isset($params['rule']))
		{
			$rule = $params['rule'];		
			unset($params['rule']);
		}
		else
		{
			$rule = CPF_URL_ROUTER_DEFAULT_RULE;
		}	

		$params_filtered = array();

		foreach ($params as $key => $value)
		{
			if ($value !== NULL)
			{
				$params_filtered[$key] = $value;
			}
		}

		return Cpf_Core_Url_Router::get_instance()->link($rule, $params_filtered);			
	}
	
	/**
	 * Smarty-registered function for performing translation using gettext. Plural forms are also supported.
	 * 
	 * For detailed documentation and examples see Quick Start guide.
	 * 
	 * @param mixed $params
	 * @param mixed $content
	 * @param mixed $smarty
	 * @param mixed $repeat
	 * @return
	 */
	public function translate($params, $content, &$smarty, &$repeat)
	{
		if (!is_null($content))
		{
			$text = t($content);

			if (isset($params['plural']))
			{
				$text = sprintf(tn($content, $params['plural'], $params['count']), $params['count']);
			}

			else
			{						
				if (count($params))
				{
					$text = vsprintf($text, array_values($params));
				}
			}
		
			return $text;			
		}	
	}

	/**
	 * Smarty-registered function to process controls. Caching is supported too.
	 * 
	 * For detailed documentation and examples see Quick Start guide.
	 * 
	 * @param mixed $params
	 * @return
	 */
	public function get_control($params)
	{		
		if (isset($params['name']))
		{
			// cache turned on
			if (isset($params['cache_key']) && isset($params['cache_ttl']))
			{			
				$cache_key = $params['cache_key'];
				$cache_ttl = $params['cache_ttl'];	
	
				unset($params['cache_key']);
				unset($params['cache_ttl']);
		
				$temp = Cpf_Core_Cache_Manager::get_instance()->get($cache_key);
				
				if ($temp != NULL)
				{
					return $temp;
				}
				else
				{
					$result = $this->_process_control($params);
					Cpf_Core_Cache_Manager::get_instance()->set($cache_key, $cache_ttl, $result);
					return $result;	
				}														
			}
			else //without cache
			{
				return $this->_process_control($params);
			}			
		}
		else
		{
			return '';
		}
	}


	/**
	 * Processes control and assign variables to the view with prefix
	 * 
	 * @param mixed $params
	 * @return
	 */
	private function _process_control($params)
	{
		$name = strtolower(trim($params['name']));
		unset($params['name']);						

		$class_name = ucwords(sprintf(Cpf_Core_Config::get_instance()->value('VIEW.SMARTY.CONTROLS.CLASS_NAME_FORMAT'), $name));
		$current_control = new $class_name();
		$current_control->set_params($params);
		$current_control->run(); 	
		
		$result = $current_control->get_data();
		
		if ($this->config->value('VIEW.SMARTY.CONTROLS.USE_TEMPLATE_OBJECTS')) 
		{
			$tpl = $this->sm->createTemplate(sprintf(Cpf_Core_Config::get_instance()->value('VIEW.SMARTY.CONTROLS.TEMPLATE_FILE_NAME_FORMAT'), $name), $this->sm);

			if (!empty($result))
			{
				foreach ($result as $key=>$value)
				{                                     
					$tpl->assign($key, $value);
				}
			}

			return $tpl->fetch();		
		}
		else
		{
			if (!empty($result))
			{
				foreach ($result as $key=>$value)
				{                                     
						$this->assign(sprintf(Cpf_Core_Config::get_instance()->value('VIEW.SMARTY.CONTROLS.VARIABLE_FORMAT'), $name, $key), $value);
				}
			}

			return $this->sm->fetch(sprintf(Cpf_Core_Config::get_instance()->value('VIEW.SMARTY.CONTROLS.TEMPLATE_FILE_NAME_FORMAT'), $name));					
		}		
	}	
}
?>