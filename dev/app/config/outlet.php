<?php
/**
 * Outlet (database) configuration
 *
 * @package app-start
 * @subpackage Config
 */

/*
	Outlet domain classes
*/
$cpf_outlet_files = glob(CPF_APP_CONFIG_FOLDER . 'outlet/*.php');
foreach($cpf_outlet_files as $config_filename) 
{
	 require_once($config_filename);
}
unset($cpf_outlet_files);

?>