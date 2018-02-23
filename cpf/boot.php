<?php
/**
 * Framework's bootstrap file
 * 
 * @package CPF
 * @subpackage Boot
 */

/**
 * The time of script start (for profiler)
 */
define('CPF_START_TIME', microtime(true));

// Low-level reporting and debug
error_reporting(E_ALL | E_STRICT); 
ini_set("display_errors", TRUE);
ini_set("log_errors", TRUE);

// Root dir and url
if (!defined('CPF_ROOT_DIR'))
{
	/**
	 * Absolute path to site's root directory with trailing slash
	 */
	define('CPF_ROOT_DIR', str_replace('\\', '/', substr(dirname(__FILE__), 0, strlen(dirname(__FILE__))-4 )) . '/'); //4 is the length of '/cpf' part in path
}

if (!defined('CPF_ROOT_URL'))
{
	/**
	 * Absolute URL of the site with trailing slash
	 */	
	define('CPF_ROOT_URL', sprintf('http://%s/', $_SERVER['HTTP_HOST']));
}

// Include path
restore_include_path();
set_include_path(CPF_ROOT_DIR);

// Function outside classes
require_once('cpf/utils/functions.php');

// System constants and default settings
require_once('cpf/config/core.php');
require_once('cpf/config/defaults.php');

// Core libraries
$CPF_AUTOLOAD_LIBS = array(
	'FastJSON' 			=> 'cpf/libs/json/FastJSON.class.php',
	'gettext_reader' 	=> 'cpf/libs/gettext/gettext.php',
	'FileReader'		=> 'cpf/libs/gettext/streams.php',
	'StreamReader'		=> 'cpf/libs/gettext/streams.php',
	'Smarty'			=> 'cpf/libs/smarty/Smarty.class.php',
	'PHPMailer'			=> 'cpf/libs/phpmailer/class.phpmailer.php',
);

// Register CPF autoload function
spl_autoload_register('cpf_autoload');

// Loading application's boot file
if (file_exists(CPF_APP_BOOT_FILE))
{
	require_once(CPF_APP_BOOT_FILE);
}	

// TimeZone handling
if (!defined('CPF_DEFAULT_TIMEZONE'))
{
	@date_default_timezone_set(date_default_timezone_get());
}
else
{
	date_default_timezone_set(CPF_DEFAULT_TIMEZONE);
}

// Profiler
if (!defined('CPF_PROFILER_ENABLED'))
{
	define('CPF_PROFILER_ENABLED', FALSE);
}

// Error handling: convert old php errors to exceptions and show friendly information about exceptions
if (!CPF_PROFILER_ENABLED)
{
	set_error_handler('cpf_error_handler');
	set_exception_handler('cpf_exception_handler');
}

// Loading application's configs
$cpf_files = glob(CPF_APP_CONFIG_FOLDER . '*.php');
foreach($cpf_files as $cpf_config_filename) 
{
	 require_once($cpf_config_filename);
}
unset($cpf_files);

// Starting application
p('application start');
$cpf_dispatcher = new App_Dispatcher();

p('init dispatcher');
$cpf_dispatcher->init();

p('running application dispatcher');
$cpf_dispatcher->run();

?>