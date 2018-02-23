<?php
/**
 * Empty storage engine (for disabling cache)
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_Cache_Storage_Null implements Cpf_Core_Cache_IStorage
{
	public function set($key, $ttl, $data)
	{		
	}
	
	public function get($key)
	{
		return NULL;
	}
	
	public function remove($key)
	{		
	}
	
	public function flush()
	{		
	}
}
?>