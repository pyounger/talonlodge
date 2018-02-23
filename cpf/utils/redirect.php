<?php
/**
 * Low-level HTTP redirect routine  
 * 
 * @static
 * @package CPF
 * @subpackage Utils
 */
class Cpf_Utils_Redirect
{
	/**
	 * Performs redirect to specified URL using PHP <samp>header()</samp> function.
	 * 
	 * @access public
	 * @static
	 * @param string $url Absolute or relative URL to redirect
	 * @return void
	 */
	public static function redirect($url)
	{
		header(sprintf('Location: %s', $url));
		exit();		
	}		
}
?>