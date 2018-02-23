<?php
/**
 * Serves file for downloading to the user
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_View_File extends Cpf_Core_View
{

	/**
	 * Default constructor
	 * 
	 * @return void
	 */
 	public function __construct()
	{
		parent::__construct();
		$this->use_gzip = FALSE;		
	}
	/**
	 * Serves file in two modes
	 * 
	 * If <samp>$this->data['filename_full']</samp> is set, the file is served using <samp>readfile()</samp>,
	 * otherwise <samp>$this->data['data']</samp> is used as body of attachment
	 * 
	 * The method has fixes for IE over SSL.
	 * 
	 * @return void
	 */
	public function render()	
	{
		/* For IE over SSL */
		header('Pragma: public');
		header('Cache-Control: public, max-age=12000'); 
		/* /end of IE fix*/
		header('Content-Type: '. $this->data['content-type']);
		header(sprintf('Content-Disposition: attachment; filename="%s"', urlencode($this->data['filename'])));	

		if (isset($this->data['filename_full']))
		{
			$filename = $this->data['filename_full'];
			header('Content-Length: ' . filesize($filename));
			readfile($filename);
		}
		else
		{
			echo $this->data['data'];
		}
	}	
}
?>