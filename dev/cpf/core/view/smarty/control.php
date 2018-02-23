<?php
/**
 * Abstract base class for controls supported in Smarty view
 * 
 * @abstract
 * @package CPF
 * @subpackage Core
 */
abstract class Cpf_Core_View_Smarty_Control
{
	/**
	* Data assigned to the control
 	* @var array	
	*/
	protected $data;
	
	/**
	* Parameters passed to the control
 	* @var array	
	*/
	protected $params;

	/**
	 * Class constructor
	 * 
	 * @return void
	 */
	public function __construct()
	{
	}
	
	/**
	 * Assigns data to the control
	 * 
	 * @param string $key Key in collection for assigned data
	 * @param mixed $value Value of assigned data
	 * @return void
	 */
	public function assign($key, $value)
	{
		$this->data[$key] = $value;
	}

	/**
	 * Setter for <samp>$this->params</samp>
	 * 
	 * @param array $params Control parameters 
	 * @return void
	 */
	public function set_params($params)
	{
		$this->params = $params;
	}
	
	/**
	 * Returns value from control parameters array, if <samp>$index</samp> not found returns <samp>$default</samp> value (<samp>FALSE</samp> by default).
	 * 
	 * @param string $index Parameter index
	 * @param mixed $default Default value if parameter index not found
	 * @return mixed
	 */
	public function param($index, $default = FALSE)
	{
		return isset($this->params[$index]) ? $this->params[$index] : $default; 
	}

	/**
	 * Getter for <samp>$this->data</samp>
	 * 
	 * @return
	 */
	public function get_data()
	{
		return $this->data;
	}

	/**
	 * Performs actual work of the control
	 * 
	 * @abstract
	 * @return void
	 */
	abstract public function run();
}
?>