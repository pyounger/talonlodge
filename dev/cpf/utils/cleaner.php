<?php
/**
 * Simple HTML entities and XSS cleaner  
 * 
 * @static
 * @package CPF
 * @subpackage Utils 
 */
class Cpf_Utils_Cleaner
{
	/**
	 * Encode HTML entities in UTF-8 string
	 * 
	 * @static
	 * @param string $value String to clean
	 * @return string Cleaned string
	 */
	public static function encode_html($value)
	{
		return htmlspecialchars($value, ENT_QUOTES, cpf_config('CHARSET.NAME'));
	}

	/**
	 * Strip HTML and perform HTML encoding afterwards
	 * 
	 * @static
	 * @param string $value String to clean
	 * @return string Cleaned string
	 */
	public static function strip_html($value)
	{
		$temp = strip_tags($value);
		return self::encode_html($temp);
	}
}
?>