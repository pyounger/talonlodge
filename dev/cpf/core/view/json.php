<?php
/**
 * Returns <samp>$this->data</samp> in JSON format
 * 
 * FastJSON library is used, because we can't relly on json PHP extension.
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_View_Json extends Cpf_Core_View
{
	/**
	 * Serializes the full <samp>$this->data</samp> array in JSON format. The
	 * output encoding is UTF-8.
	 * 
	 * @return void
	 */
	public function render()	
	{		
		$this->assign_header('Cache-Control', 'no-cache, must-revalidate');
		$this->assign_header('Expires', 'Mon, 26 Jul 1997 05:00:00 GMT');
		$this->assign_header('Content-type', 'application/json; charset=utf-8');		
		echo FastJSON::encode($this->data);
	}	
}
?>