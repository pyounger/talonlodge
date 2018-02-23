<?php
/**
 * URL filter that implements support of multilanguage URLs
 * 
 * The parameter <samp>lang</samp> should be specified to generate language specific URL 
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_Url_Filter_Lang implements Cpf_Core_Url_IFilter
{
	private 
		$_langs,
		$_default_lang,
		$_lang,
		$_lang_reverse;

	public function __construct($langs, $default_lang)
	{
		$this->_langs = $langs;
		$this->_default_lang = $default_lang;
	}

	public function filter_pre(Cpf_Core_Request $request)	
	{
		if (!empty($this->_langs))
		{
			$matches = array();
			if (preg_match(CPF_URL_FILTER_LANG_REGEXP_FORMAT, $request->url, $matches) > 0)
			{
				if (array_key_exists($matches[1], $this->_langs))
				{
					$this->_lang = $matches[1];
					$request->lang = $matches[1];	
					$request->url = preg_replace(CPF_URL_FILTER_LANG_REGEXP_FORMAT, '$2', $request->url);										
				}
			}
			else
			{
				$this->_lang = $this->_default_lang;
				$request->lang = $this->_default_lang;
			}					
		}		
	}

	public function filter_post(Cpf_Core_Request $request)	
	{
	
	}

	public function filter_reverse_pre(array &$params)
	{
		//storing language 
		if (isset($params['lang']))
		{
			if (isset($this->_langs[$params['lang']]))
			{
				$this->_lang_reverse = $params['lang'];
			}	
			else
			{
				$this->_lang_reverse = '';
			}
		
			unset($params['lang']);
		}
	}

	public function filter_reverse_post(&$url, array &$params)
	{
		//lang is hard-coded in link
		if (!empty($this->_lang_reverse)) 
		{
			$url = sprintf(CPF_URL_FILTER_LANG_URL_FORMAT, $this->_lang_reverse, $url);
		}
				
		//request lang is not a default	and no hard-coded lang
		if ($this->_lang != $this->_default_lang && empty($this->_lang_reverse))
		{
			$url = sprintf(CPF_URL_FILTER_LANG_URL_FORMAT, $this->_lang, $url);			
		}

		$this->_lang_reverse = '';			
	}
}
?>