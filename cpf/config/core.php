<?php
/**
 * Framework's low-level settings (constants)
 * 
 * @package CPF
 * @subpackage Config
 */
// Version 
define('CPF_VERSION', 'Crisp PHP Framework 4.1 (trunk)');

// Files and pathes
define('CPF_CLASS_FILE_NAME_FORMAT', CPF_ROOT_DIR . '%s.php');
define('CPF_APP_DIR', CPF_ROOT_DIR . 'app/');
define('CPF_FRAMEWORK_DIR', CPF_ROOT_DIR . 'cpf/');
define('CPF_APP_CONFIG_FOLDER', CPF_APP_DIR . 'config/');
define('CPF_APP_BOOT_FILE', CPF_APP_DIR . 'boot.php');
define('CPF_LANGUAGE_FILE_NAME', CPF_APP_DIR . 'resources/%s.mo');

// MVC naming conventions
define('CPF_CONTROLLER_NAME_FORMAT', 'App_Controller_%s');
define('CPF_ACTION_NAME_FORMAT', 'action_%s');

define('CPF_DEFAULT_CONTROLLER', 'index');
define('CPF_DEFAULT_ACTION', 'default');

// URL Filters
define('CPF_URL_FILTER_ABS_URL_FORMAT', CPF_ROOT_URL . '%s');
define('CPF_URL_FILTER_LANG_REGEXP_FORMAT', '/^\/(\w{2})(\/(.*))?$/');
define('CPF_URL_FILTER_LANG_URL_FORMAT', '%s/%s');

// URL Routes
define('CPF_URL_ROUTER_DEFAULT_RULE', 'default');
define('CPF_URL_ROUTE_DEFAULT_PARAM_SEPARATOR', '-');
define('CPF_URL_ROUTE_DEFAULT_URL_SEPARATOR', '/');
define('CPF_URL_ROUTE_DEFAULT_ID_PARAM_NAME', 'id');
define('CPF_URL_ROUTE_REGEXP_REGEXP_FORMAT', '/^\/%s$/');

// Views
define('CPF_HTTP_HEADER_FORMAT', '%s: %s');

// Translate
define('CPF_TRANSLATE_STORAGE_CLASS_FORMAT', 'Cpf_Core_Translate_Storage_%s');

// Cache
define('CPF_CACHE_STORAGE_CLASS_FORMAT', 'Cpf_Core_Cache_Storage_%s');
define('CPF_CACHE_TIME_FOREVER', 0);
define('CPF_CACHE_TIME_NEVER', -1);

// Configuration
define('CPF_CONFIG_ARRAY', 'CPF_CONFIG');
define('CPF_CONFIG_VALUES_SEPARATOR', '.');

?>