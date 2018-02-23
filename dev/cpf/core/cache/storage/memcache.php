<?php
/**
 * Memcached storage engine. Requires memcache PHP extension
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_Cache_Storage_Memcache implements Cpf_Core_Cache_IStorage
{
	private 
		$_memcache;
	
	public function __construct()
	{
		$this->_memcache = new Memcache;
		$this->_memcache->connect(Cpf_Core_Config::get_instance()->value('CACHE.MEMCACHE.HOST'), Cpf_Core_Config::get_instance()->value('CACHE.MEMCACHE.PORT')); 
	}
	
	public function set($key, $ttl, $data)
	{
		$this->_memcache->set($key, $data, 0, $ttl);
	}
	
	public function get($key)
	{
		$temp = $this->_memcache->get($key);
		return ($temp == FALSE) ? NULL : $temp;
	}
	
	public function remove($key)
	{
		$this->_memcache->delete($key);
	}
	
	public function flush()
	{
		$this->_memcache->flush();
	}
}
?>