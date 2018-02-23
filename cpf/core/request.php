<?php
/**
 * Data-only class that represents HTTP-request
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_Request
{
	/**
	* Relative URL of request
 	* @var string	
	*/
	public $url;

	/**
	* Name of controller
 	* @var string	
	*/
	public $controller;

	/**
	* Name of action
 	* @var string	
	*/	
	public $action;

	/**
	* Params passed in URL
 	* @var array
	*/	
	public $params = array();

	/**
	* Language
 	* @var string
	*/	
	public $lang;

	/**
	* Analog of PHP <samp>$_SERVER</samp>
 	* @var array
	*/	
	public $server;
	
	/**
	* Analog of PHP <samp>$_GET</samp>
 	* @var array
	*/	
	public $get;

	/**
	* Analog of PHP <samp>$_POST</samp>
 	* @var array
	*/	
	public $post;

	/**
	* Analog of PHP <samp>$_FILES</samp>
 	* @var array
	*/	
	public $files;

	/**
	* Analog of PHP <samp>$_COOKIE</samp>
 	* @var array
	*/	
	public $cookie;


	/**
	* Indicates if current request is AJAX request
 	* @var bool
	*/	
	public $is_ajax = FALSE;
	
	/**
	* Indicates if current request is POST request
 	* @var bool
	*/	
	public $is_post = FALSE;
	
	/**
	 * Default constructor
	 * 
	 * @return void
	 */
	public function __construct()
	{			
	}
}
?>
