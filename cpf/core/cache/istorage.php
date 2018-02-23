<?php
/**
 * Interface for cache storage engines
 * 
 * @package CPF
 * @subpackage Core
 */
interface Cpf_Core_Cache_IStorage
{
	/**
	 * Put <samp>$data</samp> to cache with <samp>$key</samp> for <samp>$ttl</samp> seconds 
	 * 
	 * @param mixed $key Key to store data with 
	 * @param mixed $ttl Amount of seconds to keep object in cache
	 * @param mixed $data Data to cache
	 * @return void
	 */
	public function set($key, $ttl, $data);
	
	/**
	 * Get item from cache using <samp>$key</samp>
	 * 
	 * @param mixed $key Key to find records
	 * @return mixed
	 */
	public function get($key);
	
	/**
	 * Remove item from cache
	 * 
	 * @param mixed $key Key to remove
	 * @return void
	 */
	public function remove($key);
	
	/**
	 * Flush entire cache
	 * 
	 * @return void
	 */
	public function flush();
}
?>