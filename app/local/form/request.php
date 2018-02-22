<?php
/**
 * This class adds some useful helpers to CPF's request object
 * 
 * @package app-start
 * @subpackage Validation
 */
class App_Local_Form_Request extends Cpf_Core_Request
{
	/**
	 * Some emulation for copy constructor
	 * 
	 * @param Cpf_Core_Request $request
	 * @return void
	 */
	public function __construct(Cpf_Core_Request $request)
	{
		parent::__construct();
		foreach ($request as $key=>$value)
		{
			$this->$key = $value;
		}
	}	
	
	/**
	 * Returns value from <samp>$_GET</samp>, if <samp>$index</samp> not found returns <samp>NULL</samp>
	 * 
	 * @param mixed $index Index of value
	 * @return mixed Value from <samp>$_GET</samp>
	 */
	public function get($index)
	{
		return $this->_fetch_from_array($this->get, $index);
	}

	/**
	 * Returns value from <samp>$_POST</samp>, if <samp>$index</samp> not found returns <samp>NULL</samp>
	 * 
	 * @param mixed $index Index of value
	 * @return mixed Value from <samp>$_POST</samp>
	 */
	public function post($index)
	{
		return $this->_fetch_from_array($this->post, $index);
	}

	/**
	 * Returns value from URL params (parsed by router), if <samp>$index</samp> not found returns <samp>NULL</samp>
	 * 
	 * @param mixed $index Index of value
	 * @return mixed Value from params in URL (parsed by router)
	 */	
	public function param($index)
	{
		return $this->_fetch_from_array($this->params, $index);
	}

	/**
	 * Returns value from <samp>$_SERVER</samp>, if <samp>$index</samp> not found returns <samp>NULL</samp>
	 * 
	 * @param mixed $index Index of value
	 * @return mixed Value from <samp>$_SERVER</samp>
	 */	
	public function server($index)
	{
		return $this->_fetch_from_array($this->server, $index);
	}
			
	/**
	 * Returns value from array. If not found returns NULL
	 * 
	 * @param mixed $array
	 * @param mixed $index
	 * @return
	 */
	private function _fetch_from_array(&$array, $index)
	{
		if (!isset($array[$index]))
		{
			return FALSE;
		}
		
		return $array[$index];		
	}	

}
?>
