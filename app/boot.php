<?php
/**
 * Application boot file. It is called during application load. Usually this file is used for
 * including 3rd party libraries. 
 * 
 * @package app-start
 * @subpackage Boot
 */
/*
	Error handling (uncomment in production)	
*/ 
// ini_set("display_errors", FALSE);

/* 
	Profiler knob
*/
// define('CPF_PROFILER_ENABLED', TRUE);

/*
	TimeZone for application (if not specified current server timezone is used)
	http://php.net/manual/en/timezones.php
*/
define('CPF_DEFAULT_TIMEZONE', 'US/Alaska');

/*	
    For keep logins with and without www (uncomment in production). This will not work for domains without part '.<something>' at the end
*/
//ini_set('session.cookie_domain', sprintf('.%s', str_replace('www.', '', $_SERVER['HTTP_HOST'])));

/*
	Application-specific libs for autoload
*/
$CPF_AUTOLOAD_LIBS = array_merge($CPF_AUTOLOAD_LIBS, array(
	'DebugPDO'	=> CPF_APP_DIR . 'libs/debugpdo/debugpdo.php',
	'Outlet' 	=> CPF_APP_DIR . 'libs/outlet/Outlet.php',
	'Facebook' 	=> CPF_APP_DIR . 'libs/fb/facebook.php',
	'TwitterAPIExchange' 	=> CPF_APP_DIR . 'libs/twitter/TwitterAPIExchange.php',
));
?>