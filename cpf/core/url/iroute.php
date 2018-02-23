<?php
/**
 * Interface for URL routes
 * 
 * @package CPF
 * @subpackage Core
 */
interface Cpf_Core_Url_IRoute
{
	/**
	 * Perform routing for incoming request
	 * 
	 * @param Cpf_Core_Request $request Current HTTP request
	 * @return void
	 */
	public function do_route(Cpf_Core_Request $request);
	
	/**
	 * Generate outgoing URL
	 * 
	 * @param mixed &$params Params passed for link generation
	 * @return
	 */
	public function reverse(array &$params);
}
?>