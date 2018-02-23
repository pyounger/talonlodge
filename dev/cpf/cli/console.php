<?php
/**
 * Console runner for controller/action
 * 
 * @package CPF
 * @subpackage CLI
 */

if ((php_sapi_name() == 'cli' && !isset($_SERVER['REMOTE_ADDR'])))
{
	set_include_path(str_replace('\\', '/', substr(dirname(__FILE__), 0, strlen(dirname(__FILE__))-8 )) . '/'); // strip '/cpf/cli' part from the path
		
	require_once('cpf/libs/getopts/getopts.php');

	$options = getopts(array(
		'u' => array('switch' => array('u', 'url'), 'type' => GETOPT_VAL),
	),$_SERVER['argv']);
					
	if (empty($options['u']))	
	{
		exit(sprintf("
Usage: php %s [options] \n
Short options:			
-u \t\t Url to process
\n
Long Options:
--url\t\t Url to process 			
		", basename(__FILE__)));
	}
	else
	{	
		$_SERVER = array(
			'HTTP_HOST' => 'www.example.com',
			'REQUEST_URI' => $options['u']
		);
		require_once('cpf/boot.php');	
	}	
}
else
{
	exit('Error: Please run this from command line...');
}
?>