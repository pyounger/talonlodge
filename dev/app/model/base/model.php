<?php

/**

 * Abstract base class for all Outlet entities 

 * 

 * @package app-start

 * @subpackage Model

 * @abstract

 */

abstract class App_Model_Base_Model

{

	/**

	 * Instance of Outlet singleton {@link Outlet}

	 * @var Outlet  

	 */

	protected $outlet;



	/**

	* Instance of configuration class {@link Cpf_Core_Config}

 	* @var Cpf_Core_Config

	*/				

 	protected $config;

 	

	/**

	 * Validation function for 

	 * 

	 * @param array $errors Array of validation errors (strings)

	 * @param bool $is_edit Is TRUE when entity is in edit mode

	 * @return void

	 */

	abstract public function validate(&$errors, $is_edit);

	

	/**

	 * Default constructor

	 * 

	 * @return void

	 */

	public function __construct()

	{

		$this->outlet = Outlet::getInstance();

		$this->config = Cpf_Core_Config::get_instance();		

	}

	

	public function remove_linked_objects()

	{

		$this->outlet = null;

		$this->config = null;

	}	

	

	protected function is_unique_field($is_edit, $field)

	{

		if ($is_edit)

		{

			$class_name = str_replace('_OutletProxy','', get_class($this));

			$data = $this->outlet->select($class_name, sprintf('WHERE {%s.%s} = ? AND {%s.id} != ?', $class_name, $field, $class_name), array($this->{$field}, $this->id));

		}

		else

		{

			$class_name = get_class($this);

			$data = $this->outlet->select($class_name, sprintf('WHERE {%s.%s} = ?', $class_name, $field), array($this->{$field}));

		}

		return empty($data);

	}

}	

?>