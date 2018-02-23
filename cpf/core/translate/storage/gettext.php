<?php
/**
 * Gettext storage engine
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_Translate_Storage_Gettext implements Cpf_Core_Translate_IStorage
{
	/**
	* Gettext reader
 	* @var gettext_reader	
	*/	
	private $_reader;
	
	/**
	 * Init storage engine
	 * 
	 * @param Cpf_Core_Request $request Incoming HTTP request
	 * @return void
	 */
	public function init(Cpf_Core_Request $request)
	{	
		$config = Cpf_Core_Config::get_instance();	
		$filename = sprintf($config->value('TRANSLATE.GETTEXT.FILENAME_FORMAT'), $request->lang);
						
		if ($config->value('TRANSLATE.GETTEXT.CACHE.ENABLED'))
		{
			$cache = Cpf_Core_Cache_Manager::get_instance();

			$key = sprintf($config->value('TRANSLATE.GETTEXT.CACHE.KEYS.GETTEXT_FORMAT'), md5($filename));		
			$temp = $cache->get($key);

			if ($temp != NULL) 
			{
				$this->_reader = $temp;
			}
			else
			{
				$this->_load_from_disk($filename);
				$cache->set(
					$key,
					CPF_CACHE_TIME_FOREVER, 
					$this->_reader);
			}
		}
		else
		{
			$this->_load_from_disk($filename);
		}
	}

	
	/**
	 * Translate string
	 * 
	 * @param string $string Message to translate
	 * @return string Translated string
	 */	
	public function t($string)
	{		
		if (empty($string))
		{
			return '';
		}

		if (!isset($this->_reader))
		{
			return $string;
		}
		
		return $this->_reader->translate($string);				
	}
	
	/**
	 * Plural version of <samp>t()</samp> (params passed in $params array)
	 * 
	 * @param mixed $single Single form
	 * @param mixed $plural Plural form 
	 * @param mixed $number Number to choose form
	 * @return string Translated string
	 */
	public function tn(array $params)
	{
		$single = $params[0];
		$plural = $params[1];
		$number = $params[2];
		
		if (empty($single))
		{
			return '';
		}

		if (!isset($this->_reader))
		{
			return $single;
		}

		return $this->_reader->ngettext($single, $plural, $number);		
	}
	
	/**
	 * Loads gettext data from disk
	 * 
	 * @param string $filename File to load
	 * @return void 
	 */	
	private function _load_from_disk($filename)
	{
		if (file_exists($filename))
		{
			$this->_reader = new gettext_reader(new FileReader($filename), true);	
			$this->_reader->load_tables();			
		}	
	}
}
?>