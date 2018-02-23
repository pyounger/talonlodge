<?php
/**
 * Cache manager class [Singleton]
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_Cache_Manager
{
	/**
	* Instance static variable
 	* @staticvar Cpf_Core_Cache_Manager	
	*/
	private static $_instance;

	/**
	* Storage engine variable
 	* @var Cpf_Core_Cache_IStorage	
	*/
	private $_storage;
	
	/**
	* Number of calls of <samp>get()</samp> method
 	* @var integer	
	*/
	public $get_count = 0;

	/**
	* Number of calls of <samp>set()</samp> method
 	* @var integer	
	*/	
	public $set_count = 0;
	
	/**
	 * Private constructor (this is a singleton)
	 * 
	 * @return Cpf_Core_Cache_Manager
	 */
	private function __construct()
	{		
		$class_name = sprintf(CPF_CACHE_STORAGE_CLASS_FORMAT, Cpf_Core_Config::get_instance()->value('CACHE.STORAGE'));		
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
	 * @return Cpf_Core_Cache_Manager
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
	 * Gets object from the storage
	 * 
	 * @param string $key Key of the object
	 * @return mixed Object from cache
	 */
	public function get($key)
	{		
		$this->get_count++;		
		return $this->_storage->get($key);		
	}

	/**
	 * Put object to cache
	 * 
	 * @param string $key Key of object in cache
	 * @param mixed $ttl Time to keep object in cache (in seconds)
	 * @param mixed $data Object to store
	 * @return void
	 */
	public function set($key, $ttl, $data)
	{
		$this->set_count++;

		if ($ttl != CPF_CACHE_TIME_NEVER)
		{
			$this->_storage->set($key, $ttl, $data);
		}
		else
		{
			$this->_storage->remove($key);
		}
	}

	/**
	 * Calls callback function if no object in cache 
	 * 
	 * Example:
	 *
	 * <code>
	 * d(Mf_Core_Cache_Manager::get_instance()->call('SOME_KEY', 120, 
	 * 		array(
	 * 			'func' => array('Dbal_News', 'get_latest_news_with_languages'),
	 * 			'params' => array(
	 * 				'lang' => $this->request->lang,
	 * 				'count' => NEWS_LATEST_COUNT 
	 * 			)			
	 * 		)
	 * ));		
	 * </code>
	 * 
	 * @param mixed $key Key of object in cache
	 * @param mixed $ttl Time to store result (in seconds)
	 * @param mixed $callback Function to call
	 * @return mixed Object from cache
	 */
	public function call($key, $ttl, array $callback)
	{
		$temp = $this->get($key);

		if ($temp != NULL) 
		{
			return $temp;
		}
		else
		{			
			$result = call_user_func_array($callback['func'], $callback['params']);
			$this->set($key, $ttl, $result);
			return $result;
		}		
	}

	/**
	 * Remove object from cache
	 * 
	 * @param mixed $key Key of object to remove
	 * @return void
	 */
	public function remove($key)
	{
		$this->_storage->remove($key);
	}
	
	/**
	 * Removes all objects from cache
	 * 
	 * @return void
	 */
	public function flush()
	{
		$this->_storage->flush();
	}

}
?>