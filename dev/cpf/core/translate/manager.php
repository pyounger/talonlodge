<?php
/**
 * Translate manager class [Singleton]
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_Translate_Manager
{
	/**
	* Instance static variable
 	* @staticvar Cpf_Core_Translate_Manager	
	*/
	private static $_instance;

	/**
	* Storage engine variable
 	* @var Cpf_Core_Translate_IStorage	
	*/
	private $_storage;
	
	/**
	* Number of translations
 	* @var integer	
	*/	
	public $translation_count = 0;
	
	/**
	 * Private constructor (this is a singleton)
	 * 
	 * @return Cpf_Core_Translate_Manager
	 */
	private function __construct()
	{		
		$class_name = sprintf(CPF_TRANSLATE_STORAGE_CLASS_FORMAT, Cpf_Core_Config::get_instance()->value('TRANSLATE.STORAGE'));		
		$this->_storage = new $class_name();
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
	 * @return Cpf_Core_Translate_Manager
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
	 * Init storage engine
	 * 
	 * @param Cpf_Core_Request $request Incoming HTTP request
	 * @return void
	 */	
	public function init(Cpf_Core_Request $request)
	{	
		$this->_storage->init($request);
	}

	/**
	 * Translate string
	 * 
	 * @param string $string Message to translate
	 * @return string Translated string
	 */		
	public function t($string)
	{
		$this->translation_count++;
		return $this->_storage->t($string);		
	}
	
	/**
	 * Plural version of <samp>t()</samp>
	 * 
	 * @param array $params Incomming parameters (storage should is able to understand them)
	 * @return string Translated string
	 */	
	public function tn(array $params)
	{
		$this->translation_count++;
		return $this->_storage->tn($params);		
	}	
}
?>