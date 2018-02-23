<?php
/**
 * Abstract base controller class
 * 
 * @package CPF
 * @subpackage Core
 * @abstract
 */
abstract class Cpf_Core_Controller
{
	
	/**
	* Instance of HTTP-request class {@link Cpf_Core_Request}
 	* @var Cpf_Core_Request	
	*/
	protected $request;

	/**
	* Instance of routing class {@link Cpf_Core_Url_Router}
 	* @var Cpf_Core_Url_Router	
	*/		
	protected $router;

	/**
	* Instance of view {@link Cpf_Core_View}
 	* @var Cpf_Core_View
	*/			
	protected $view;

	/**
	* Instance of configuration class {@link Cpf_Core_Config}
 	* @var Cpf_Core_Config
	*/				
	protected $config;

	/**
	 * Class constructor
	 * 
	 * @return void
	 */
	public function __construct()
	{
		$this->router = Cpf_Core_Url_Router::get_instance();
		$this->config = Cpf_Core_Config::get_instance();
	}

	/**
	 * Setter for <samp>$request</samp>
	 * 
	 * @param Cpf_Core_Request $request
	 * @return void
	 */
	public function set_request(Cpf_Core_Request $request)
	{
		$this->request = $request;
	}

	/**
	 * Getter for $view
	 * 
	 * @return
	 */
	public function get_view()
	{
		return $this->view;
	}

	/**
	 * Init function is called after constructor but before action
	 * 
	 * @return void
	 */
	public function init() 
	{
	}
	
	/**
	 * Pre-action hook
	 * 
	 * @return void
	 */
	public function pre_action() 
	{
	}

	/**
	 * Post-action hook
	 * 
	 * @return void
	 */
	public function post_action()
	{
	}
	
}
?>