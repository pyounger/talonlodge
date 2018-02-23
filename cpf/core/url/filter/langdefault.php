<?php
/**
 * URL filter that implements support of single language site
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_Url_Filter_LangDefault implements Cpf_Core_Url_IFilter
{
	private 
		$_default_lang;

	public function __construct($default_lang)
	{
		$this->_default_lang = $default_lang;
	}

	public function filter_pre(Cpf_Core_Request $request)	
	{
		if (preg_match(CPF_URL_FILTER_LANG_REGEXP_FORMAT, $request->url, $matches) > 0)
		{
			$request->url = preg_replace(CPF_URL_FILTER_LANG_REGEXP_FORMAT, '$2', $request->url);										
		}

		$request->lang = $this->_default_lang;
	}

	public function filter_post(Cpf_Core_Request $request)	
	{
	
	}

	public function filter_reverse_pre(array &$params)
	{
		if (isset($params['lang']))
		{
			unset($params['lang']);
		}
	}

	public function filter_reverse_post(&$url, array &$params)
	{
	}
}
?>