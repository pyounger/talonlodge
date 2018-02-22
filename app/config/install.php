<?php
/**
 * Settings to be changed for deployment
 *
 * @package app-start
 * @subpackage Config
 */
$CPF_CONFIG['MODEL']['OUTLET']['CREATE_PROXIES'] = TRUE;
$CPF_CONFIG['MODEL']['OUTLET']['DB_INITIALIZE'] = 'SET NAMES UTF8;';
$CPF_CONFIG['MODEL']['OUTLET']['DEBUG'] = false;
$CPF_CONFIG['SERVER']['IP'] = '69.89.31.212';

if ($_SERVER['SERVER_ADDR'] == '127.0.0.1')
{
	$CPF_CONFIG['MODEL']['OUTLET']['CONFIG'] = array(
	  'connection' => array(
		'host' => 'localhost', 
		'db' => 'talonlodge',
		'user' => 'root', 
		'password' => '', 
		'pdo' => '', 
		'dialect' => 'mysql'
	  ),
	  'classes' => array());

}
elseif ($_SERVER['SERVER_ADDR'] == $CPF_CONFIG['SERVER']['IP'])
{
	$CPF_CONFIG['MODEL']['OUTLET']['CONFIG'] = array(
	  'connection' => array(
		'host' => 'localhost', 
		'db' => 'talonlod_site',
		'user' => 'talonlod_usr', 
		'password' => 'lIUuOGCnn5oYH9dXO5yQ', 
		'pdo' => '', 
		'dialect' => 'mysql'
	  ),
	  'classes' => array());
}

$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['connection']['pdo'] = new DebugPDO(
	'mysql:host='.$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['connection']['host'].';dbname='.$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['connection']['db'],
	$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['connection']['user'], 
	$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['connection']['password'], 
	array(), 
	$CPF_CONFIG['MODEL']['OUTLET']['DEBUG'] ? 'd' : NULL
);

$CPF_CONFIG['CACHE']['STORAGE'] = 'file';

$CPF_CONFIG['VIEW']['GZIP']['ENABLED'] = TRUE;

$CPF_CONFIG['VIEW']['SMARTY']['DEBUG'] = FALSE;
$CPF_CONFIG['VIEW']['SMARTY']['COMPILE_CHECK'] = TRUE;

$CPF_CONFIG['TRANSLATE']['STORAGE'] = 'Mytext';

?>