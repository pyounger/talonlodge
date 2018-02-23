<?php
/**
 * Plain-text view. Uses <samp>Content-type: text/plain; charset=utf-8</samp>
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_View_Text extends Cpf_Core_View
{
	/**
	 * Renders the first element of <samp>$this->data</samp> array as plain text
	 * 
	 * @return void
	 */
	public function render()	
	{
		$this->assign_header('Content-type', 'text/plain; charset=utf-8');		
		if (is_array($this->data))
		{
			$result = array_values($this->data);
			echo $result[0];
		}
	}	
}
?>