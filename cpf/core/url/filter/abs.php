<?php
/**
 * URL filter that implements absolute outogoing URLs
 * 
 * The parameter <samp>abs</samp> should be specified to generate absolute URL
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_Url_Filter_Abs implements Cpf_Core_Url_IFilter
{
	private 
		$_is_abs;

	public function filter_pre(Cpf_Core_Request $request)
	{
	}

	public function filter_post(Cpf_Core_Request $request)
	{
	}

	public function filter_reverse_pre(array &$params)
	{
		if (isset($params['abs']))
		{
			$this->_is_abs = TRUE;
			unset($params['abs']);
		}
		else
		{
			$this->_is_abs = FALSE;
		}
	}

	public function filter_reverse_post(&$url, array &$params)
	{
		$url = $this->_is_abs ? sprintf(CPF_URL_FILTER_ABS_URL_FORMAT, $url) : $url;
	}
}
?>