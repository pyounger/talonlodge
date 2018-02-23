<?php
/**
 * View that performes a redirect. The purpose of this view is to unify request processing for all cases including redirect
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_View_Redirect extends Cpf_Core_View
{
    /**
	 * URL for redirect
	 * @var string 
	 */
    private $url = '';

	/**
	 * Class constructor
	 * 
     * @param string $url Url where to redirect 
	 * @return void
	 */
	public function __construct($url)
	{
		parent::__construct();
        $this->url = $url;
	}

	/**
	 * Just empty method for this view 
	 * 
	 * @return void
	 */
	public function pre_render()	
	{
        // nothing here
	}	

	/**
	 * Just empty method for this view
	 * 
	 * @return void
	 */
	public function render()	
	{
        // nothing here
	}

	/**
	 * Post-render hook. Redirect actually performed here
	 * 
	 * @return void
	 */    
   	public function post_render()	
	{
        Cpf_Utils_Redirect::redirect($this->url);
	}	
}
?>