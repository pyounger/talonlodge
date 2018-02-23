<?php
/**
 * Redirect functions
 * 
 * @static
 * @package app-start
 * @subpackage Utils 
 */
class App_Utils_Redirect
{
	/**
	 * Function throws 404 error
	 * 
	 * @return void
	 */
	public static function give_404()
	{
		@ob_clean();
		ob_start();
		
		header('HTTP/1.0 404 Not Found');
		header('Status: 404 Not Found'); 
		 
		readfile(CPF_ROOT_DIR . '404.html');

		ob_end_flush();
		exit();			
	}		

	/**
	 * Function throws 403 error
	 * 
	 * @return void
	 */
	public static function give_403()
	{
		@ob_clean();
		ob_start();

		header('HTTP/1.0 403 Forbidden');
		header('Status: 403 Forbidden'); 
		
		readfile(CPF_ROOT_DIR . '403.html');
		
		ob_end_flush();
		exit();			
	}		

}
?>