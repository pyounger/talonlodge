<?php
/**
 * Server validation related functions
 * 
 * @static
 * @package app-start
 * @subpackage Utils 
 */
class App_Utils_Validation
{	
	/**
	 * Simple regexp-based validation
	 * 
	 * @param string $field Value to check
	 * @param string $regexp Regexp to use
	 * @return bool TRUE if validation passed
	 */
	public static function is_valid_regexp($field, $regexp)
	{
		return (preg_match($regexp, $field) != 0);
	}
	
	/**
	 * Validate e-mail format
	 * 
	 * @param string $field String to validate
	 * @return bool TRUE if validation passed
	 */
	public static function is_valid_email($field)
	{
		return App_Utils_Validation::is_valid_regexp($field, cpf_config('APP.VALIDATION.EMAIL_REGEXP'));
	}
	
	/**
	 * Validate URL format
	 * 
	 * @param string $field String to validate
	 * @return bool TRUE if validation passed
	 */
	public static function is_valid_url($field)
	{
		return App_Utils_Validation::is_valid_regexp($field, cpf_config('APP.VALIDATION.URL_REGEXP'));
	}
	
	/**
	 * Validate URL element (shortcut, slug etc)
	 * 
	 * @param string $field String to validate
	 * @return bool TRUE if validation passed
	 */
	public static function is_valid_shortcut($field)
	{
		return App_Utils_Validation::is_valid_regexp($field, cpf_config('APP.VALIDATION.SHORTCUT_REGEXP'));
	}
	
	/**
	 * Validate date format and if such date is possible
	 * 
	 * @param string $field String to validate
	 * @param string $lang Language to use (for local settings)
	 * @return bool TRUE if validation passed
	 */
	public static function is_valid_date($field, $lang)
	{		
		$matches = array();
		
		if(preg_match(cpf_config(sprintf('LANGS.LIST.%s.date_format_regexp_php', $lang)), $field, $matches) != 0)
		{
			return (checkdate($matches['m'], $matches['d'], $matches['y']));
		}
		else
		{
			return FALSE;
		}
	}


/*
	Date\time validation functions for App_Local_Form_Helper

	TODO: 
		- Will be fixed with App_Local_Form_Helper updates
*/
	public static function is_valid_time($field, $lang)
	{	
		return App_Utils_Validation::is_valid_regexp($field, cpf_config('APP.VALIDATION.TIME.REGEXP_PHP'));
	}
	
	public static function time_to_array($field, $lang)
	{
		$matches = array();
		preg_match(cpf_config('APP.VALIDATION.TIME.REGEXP_PHP'), $field, $matches);
		return $matches;
	}
		
	public static function date_to_unixtime($field, $lang)
	{
		$matches = array(); 
		
		if (preg_match(cpf_config(sprintf('LANGS.LIST.%s.date_format_regexp_php', $lang)), $field, $matches) != 0)
		{
			return mktime(0, 0, 0, $matches['m'], $matches['d'], $matches['y']);
		}
	}
	
	public static function format_datetime_date($datetime, $lang)
	{
		if (isset($datetime))
		{
			$format = cpf_config(sprintf('LANGS.LIST.%s.date_format', $lang));			
			return date_format($datetime, $format);
		}  
	}

	public static function format_datetime_time($datetime, $lang)
	{
		if (isset($datetime))
		{
			$format = cpf_config(sprintf('LANGS.LIST.%s.date_format', $lang));			
			return date_format($datetime, cpf_config('APP.VALIDATION.TIME.FORMAT'));			
		}  
	}
}
?>