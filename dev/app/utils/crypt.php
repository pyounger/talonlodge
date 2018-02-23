<?php
/**
 * Crypt functions
 * 
 * @static
 * @package app-start
 * @subpackage Utils 
 */
class App_Utils_Crypt
{
	/**
	 * Hash function for passwords
	 * 
	 * @param string $string String to hash
	 * @return
	 */
	public static function hash_password($string)
	{
		return sha1($string);
	}		
}
?>