<?php
/**
 * Configuration class [Singleton]
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_Config
{
	/**
	* Instance static variable
 	* @var Cpf_Core_Cache_Manager	
	*/
	private static $_instance;

	/**
	 * Private constructor (this is a singleton)
	 * 
	 * @return Cpf_Core_Config
	 */
	private function __construct()
	{
	}

	/**
	 * Prevent from clonning of this object
	 * 
	 * return void
	 */
	public function __clone()
	{
        trigger_error('Clone is not allowed.', E_USER_ERROR);
	}

	/**
	 * Singleton instance method
	 *
	 * @static
	 * @return Cpf_Core_Config
	 */
	public static function get_instance()
	{
		if (!isset(self::$_instance)) 
		{
            $class_name = __CLASS__;
			self::$_instance = new $class_name;
        }	
		
		return self::$_instance;		
	}

	/**
	 * Return configuration value by name
	 * 
	 * @param string $name Path to config value separated by <samp>CPF_CONFIG_VALUES_SEPARATOR</samp>
	 * @return mixed Configuration value
	 */
	public function value($name)
	{
		$path = explode(CPF_CONFIG_VALUES_SEPARATOR, $name);

		$temp = $GLOBALS[CPF_CONFIG_ARRAY];
		$value = NULL;
		
		foreach ($path as $key)
		{
			if (isset($temp[$key]))
			{
				$value = $temp[$key];
			}			
			else
			{
			 	trigger_error(sprintf('Configuration value %s undefined', $name), E_USER_ERROR);
				break;
			}
			$temp = $temp[$key];
		}
		
		return $value;
	}
}

?>