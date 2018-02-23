<?php
/**
 * eAccelerator storage engine. Requires eAccelerator PHP extension
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_Cache_Storage_eAccelerator implements Cpf_Core_Cache_IStorage
{
		
	public function set($key, $ttl, $data)
	{
		if ($ttl != CPF_CACHE_TIME_NEVER)
		{
			eaccelerator_put($key, serialize($data), $ttl);
		}
	}
	
	public function get($key)
	{
		$temp = eaccelerator_get($key);
		return ($temp == NULL) ? NULL : unserialize($temp);
	}
	
	public function remove($key)
	{
		 eaccelerator_rm($key);
	}
	
	public function flush()
	{
		// There is no 'clear all shared memory' function, so we iterate over all keys and delete them
		$keys = eaccelerator_list_keys();
		foreach ($keys as $key)
		{
			$key_to_remove = ($key['name'][0] == ':') ? substr($key['name'], 1, strlen($key['name'])) : $key['name'];
			eaccelerator_rm($key_to_remove);			
		}
	}
}
?>