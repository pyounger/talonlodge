<?php
/**
 * Base control for Smarty view
 * 
 * @package app-start
 * @subpackage Controls
 * @abstract
 */
abstract class App_Control_Base_Common extends Cpf_Core_View_Smarty_Control
{
	/**
	* Instance Outlet singleton {@link Outlet}
 	* @var Outlet
	*/	
	protected $outlet;

	/**
	* Instance of configuration class {@link Cpf_Core_Config}
 	* @var Cpf_Core_Config
	*/		
	protected $config;		
		
	/**
	 * Default constructor
	 * 
	 * @return void
	 */
	public function __construct()
	{		
		parent::__construct();
		$this->config = Cpf_Core_Config::get_instance();	
		$this->outlet = Outlet::getInstance();
	}
}
?>