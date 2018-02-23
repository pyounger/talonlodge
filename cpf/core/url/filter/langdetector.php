<?php
/**
 * URL filter that implements language detection for site's home page
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_Url_Filter_LangDetector implements Cpf_Core_Url_IFilter
{
	private 
		$_default_lang,
		$_langs;
		

	public function __construct($langs, $default_lang)
	{
		$this->_langs = $langs;
		$this->_default_lang = $default_lang;
	}

	public function filter_pre(Cpf_Core_Request $request)
	{
		if ($request->url == '/' && isset($request->server['HTTP_ACCEPT_LANGUAGE']))
		{
			$acceptable_langs = explode(';', $request->server['HTTP_ACCEPT_LANGUAGE']);
			$preferable_lang = explode(',', $acceptable_langs[0]);
			$preferable_lang = strtolower(trim($preferable_lang[0]));			

			foreach ($this->_langs as $key=>$value)
			{
				if (in_array($preferable_lang, $value['codes']) && $key != $this->_default_lang)
				{
					Cpf_Utils_Redirect::redirect(sprintf(CPF_URL_FILTER_LANG_URL_FORMAT, $key, ''));
					exit();
				}
			}	
		}
	}
	
	public function filter_post(Cpf_Core_Request $request)
	{
	}

	public function filter_reverse_pre(array &$params)
	{
	}

	public function filter_reverse_post(&$url, array &$params)
	{
	}
}
?>