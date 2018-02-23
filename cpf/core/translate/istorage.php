<?php
/**
 * Interface for Translate translate engines
 * 
 * @package CPF
 * @subpackage Core
 */
interface Cpf_Core_Translate_IStorage
{
	/**
	 * Init storage engine
	 * 
	 * @param Cpf_Core_Request $request Incoming HTTP request
	 * @return void
	 */	
	public function init(Cpf_Core_Request $request);

	/**
	 * Translate string
	 * 
	 * @param string $string Message to translate
	 * @return string Translated string
	 */	
	public function t($string);
	
	/**
	 * Plural version of <samp>t()</samp>
	 * 
	 * @param array $params Incomming parameters (storage should is able to understand them)
	 * @return string Translated string
	 */	
	public function tn(array $params);
}
?>