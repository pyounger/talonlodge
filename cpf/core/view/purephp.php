<?php
/**
 * Pure PHP view
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_View_PurePHP extends Cpf_Core_View
{
	/**
	 * Path to the template to process
	 * @var string  
	 */
	public $template_name;	

	/**
	 * Path to the template folder
	 * @var string  
	 */	
	public $template_dir;
	
	/**
	 * Renders pure PHP view
	 * 
	 * @return void
	 */
	public function render()	
	{
		extract($this->data);
		require($this->template_dir . $this->template_name);
	}	
}
?>