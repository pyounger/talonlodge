<?php
/**
 * File storage engine
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_Cache_Storage_File implements Cpf_Core_Cache_IStorage
{
	private 
		$_current_time;
	
	public function __construct()
	{
		$this->_current_time = time();
	}
	
	public function set($key, $ttl, $data)
	{
		$temp = array('ttl' => $ttl, 'time' => $this->_current_time, 'data' => $data);
		file_put_contents($this->_make_filename($key), serialize($temp));
	}
	
	public function get($key)
	{
		$filename = $this->_make_filename($key);

		if (file_exists($filename))
		{
			$content = file_get_contents($filename);
			$data = unserialize($content);
			if ($data['ttl'] == CPF_CACHE_TIME_FOREVER || $data['ttl'] > $this->_current_time - $data['time'])
			{
				return $data['data'];
			}
			else
			{
				return NULL;
			}
		}
		else
		{
			return NULL;
		}
	}
	
	public function remove($key)
	{
		$filename = $this->_make_filename($key);
		@unlink($filename);	
	}
	
	public function flush()
	{
		$pattern = $this->_make_filename('*');

		foreach (glob($pattern) as $filename) 
		{
	    		@unlink($filename);
		}
	}
		
	private function _make_filename($key)
	{
		return sprintf(Cpf_Core_Config::get_instance()->value('CACHE.FILE.FILE_NAME_FORMAT'), $key);
	}
}
?>