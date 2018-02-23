<?php
/**
 * Mytext storage engine by Evgeniy Klushnik
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_Translate_Storage_Mytext implements Cpf_Core_Translate_IStorage
{
	
	/**
	* Translations array
 	* @var array	
	*/	
	private $_translations;

	/**
	 * Init storage engine
	 * 
	 * @param Cpf_Core_Request $request Incoming HTTP request
	 * @return void
	 */
	public function init(Cpf_Core_Request $request)
	{
		$cache = Cpf_Core_Cache_Manager::get_instance();
		$config = Cpf_Core_Config::get_instance();

		$key = sprintf($config->value('TRANSLATE.MYTEXT.CACHE.KEYS.MYTEXT_FORMAT'), $request->lang);
		$temp = $cache->get($key);

		if ($config->value('TRANSLATE.MYTEXT.CACHE.ENABLED') && $temp != NULL) 
		{
			$this->_translations = $temp;
		}
		else
		{
			$areas = $config->value('TRANSLATE.MYTEXT.AREAS');
			foreach ($areas as $area)
			{
				$path = sprintf($config->value('TRANSLATE.MYTEXT.FILE.MASK'), $request->lang, $area);
				$files = glob($path);
				foreach ($files as $file)
				{
					include $file;
					$parts = explode('/', $file);
					$suffix = str_replace('.php', '', $parts[count($parts)-1]);
					if (!empty($tr) AND is_array($tr))
					{
						foreach ($tr as $k => $v)
						{
							$this->_translations[$area][$suffix][$k] = $v;
						}
					}
				}
			}
			$cache->set(
				$key,
				CPF_CACHE_TIME_FOREVER, 
				$this->_translations);
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

		return $this->_translate($string);
	}

	public function tl($params)
	{		
		$config = Cpf_Core_Config::get_instance();
		$lang = $params[0];
		$string = $params[1];
		if (empty($string))
		{
			return '';
		}

		$parts = explode('.', $string);

		$path = str_replace('*', $parts[1], sprintf($config->value('TRANSLATE.MYTEXT.FILE.MASK'), $lang, $parts[0]));
		try
		{
			include $path;
			if (!empty($tr) AND is_array($tr) && isset($tr[$parts[2]]))
			{
				$string = $tr[$parts[2]];
			}
		}	
		catch (Exception $e) {}
		
		return $string;
	}
	
	/**
	 * Plural version of <samp>t()</samp> (params passed in $params array)
	 * 
	 * @param mixed $string Message to translate
	 * @param mixed $number Number to choose form
	 * @return string Translated string
	 */
	public function tn(array $params)
	{
		$string = $params[0];
		$number = $params[1];

		if (empty($string))
		{
			return '';
		}

		return $this->_ntranslate($string, $number);
	}


	/**
	 * Gets translated string from the translation array
	 * 
	 * @param string $string Message to translate
	 * @return string Translated string
	 */
	private function _translate($string)
	{
		$parts = explode('.', $string);
		$temp = $this->_translations;
		$value = $string;
		$level = 1;
		foreach ($parts as $key)
		{
			if (isset($temp[$key]))
			{
				$value = $temp[$key];
    			$temp = $temp[$key];
				$level++;
			}
		}

		return count($parts) == $level ? $string : is_array($value) ? $string : $value;
	}

	/**
	 * Gets translated string in appropriate form from the translation array
	 * 
	 * @param string $string Message to translate
	 * @param int $number Number to choose form
	 * @return string Translated string
	 */
	private function _ntranslate($string, $number)
	{
		$value = $this->_translate($string);

		if (is_array($value) && ($c = count($value)) > 0)
		{
			switch ($c)
			{
				case 1:
					return $value[0]; 
				break;
				case 2:
					$single = $value[0];
					$few = $value[1];
					$many = $few;
				break;
				default:
					$single = $value[0];
					$few = $value[1];
					$many = $value[2];
				break;
			}
			
			$number = (int) abs($number);
			
			if ($number == 1) return $single;
			if ( $number % 100 == 1 || ($number % 100 > 20) && ( $number % 10 == 1 ) ) return $few;
			if ( $number % 100 == 2 || ($number % 100 > 20) && ( $number % 10 == 2 ) ) return $few;
			if ( $number % 100 == 3 || ($number % 100 > 20) && ( $number % 10 == 3 ) ) return $few;
			if ( $number % 100 == 4 || ($number % 100 > 20) && ( $number % 10 == 4 ) ) return $few;
			
			return $many;
		}
		
		return $string;
	}
}
?>
