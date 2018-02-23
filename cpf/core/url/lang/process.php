<?php
/**
 * Static class for urlize functions
 * 
 * Note: file should be encoded in windows-1251 encoding
 * 
 * @static
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_Url_Lang_Process
{
	/**
	 * Encodes string for use in URL
	 * 
	 * @param mixed $string String to encode
	 * @return string Encoded for URL string
	 */
	public static function encode_for_url($string)
	{
		$temp = preg_replace('(\s+|,|\/|\&|#|:|;|\'|�)','-', strtolower($string));
		$temp = preg_replace('(\!|\?|�|�|`|\.|\(|\))', '', $temp);
		$temp = preg_replace('(-+)','-', $temp);
		return trim(urlencode($temp));	
	}

	/**
	 * Transliterate string for use in URL
	 * 
	 * Note: the appropriate <samp>_transliterate_*</samp> function should be defined in this file
	 * 
	 * @param mixed $string String to transliterate
	 * @return string Transliterated string
	 */
	public static function transliterate($string)
	{
		$transliteration_type = sprintf('_transliterate_%s', Cpf_Core_Config::get_instance()->value('URL.TRANSLITERATE_TYPE'));
		return self::$transliteration_type($string);
	}
			
	/**
	 * Cpf_Core_Url_Lang_Process::_transliterate_ru_ua()
	 * 
	 * @param mixed $string
	 * @return string
	 */
	public static function _transliterate_ru_ua($string)
	{
		$string=iconv('UTF-8', 'windows-1251', $string);
		$string=strtr($string,"������������������������","abvgdeeziyklmnoprstufh'ie");
		$string=strtr($string,"�����Ũ������������������","ABVGDEEZIYKLMNOPRSTUFH'IE");
		$string=strtr($string,array(
							"�"=>"zh", "�"=>"ts", "�"=>"i", "�"=>"je", "�"=>"ch", "�"=>"sh", 
							"�"=>"shch","�"=>"", "�"=>"yu", "�"=>"ya", "�"=>"i",
							"�"=>"Zh", "�"=>"Ts", "�"=>"Ch", "�"=>"Sh", 
							"�"=>"Shch","�"=>"", "�"=>"Yu", "�"=>"Ya", "�"=>"I"
							));
  		return $string;
	}
}
?>
