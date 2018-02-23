<?php

/**

 * Framework's default settings

 * 

 * @package CPF

 * @subpackage Config

 */



/**

 * Global array of configuration values

 * @global array $CPF_CONFIG 

 */

$CPF_CONFIG = array();



$CPF_CONFIG['VIEW']['GZIP']['ENABLED'] = TRUE;

$CPF_CONFIG['VIEW']['GZIP']['FOR_IE6'] = FALSE;



// Smarty view

$CPF_CONFIG['VIEW']['SMARTY']['DEBUG'] = FALSE; 

$CPF_CONFIG['VIEW']['SMARTY']['ERROR_REPORTING'] = E_ALL & ~E_NOTICE; 

$CPF_CONFIG['VIEW']['SMARTY']['COMPILE_CHECK'] = TRUE;

$CPF_CONFIG['VIEW']['SMARTY']['DIRS']['COMPILE'] = CPF_ROOT_DIR . 'tmp/';

$CPF_CONFIG['VIEW']['SMARTY']['DIRS']['TEMPLATES'] = CPF_APP_DIR . 'templates/';

$CPF_CONFIG['VIEW']['SMARTY']['DIRS']['PLUGINS'] = array(

	CPF_FRAMEWORK_DIR . 'libs/smarty/plugins/', 

	CPF_FRAMEWORK_DIR . 'core/view/smarty/plugins/',

	CPF_APP_DIR . 'view/smarty/plugins/'

	); 

$CPF_CONFIG['VIEW']['SMARTY']['CONTROLS']['CLASS_NAME_FORMAT'] = 'App_Control_%s';

$CPF_CONFIG['VIEW']['SMARTY']['CONTROLS']['TEMPLATE_FILE_NAME_FORMAT'] = $CPF_CONFIG['VIEW']['SMARTY']['DIRS']['TEMPLATES'] . 'controls/%s.tpl';

$CPF_CONFIG['VIEW']['SMARTY']['CONTROLS']['USE_TEMPLATE_OBJECTS'] = FALSE; // Create private template scope for control or not

$CPF_CONFIG['VIEW']['SMARTY']['CONTROLS']['VARIABLE_FORMAT'] = 'control_%s_%s'; // Prefix for control variables when previous parameter set to FALSE



$CPF_CONFIG['VIEW']['SMARTY']['ACTION_TEMPLATE_FORMAT'] = '%s.%s.tpl';



// Regexp routes

$CPF_CONFIG['URL']['ROUTES']['REGEXP'] = array();



// Transliteration type for URLs

$CPF_CONFIG['URL']['TRANSLITERATE_TYPE'] = 'ru_ua';



// Charset

$CPF_CONFIG['CHARSET']['NAME'] = 'utf-8';

$CPF_CONFIG['CHARSET']['SHORT'] = 'utf8';



// Languages

$CPF_CONFIG['LANGS']['DEFAULT'] = 'en';

$CPF_CONFIG['LANGS']['LIST'] = array(

	

	'ru' => array(

		'name' => 'Русский',

		'codes' => array('ru-RU', 'ru'),

		'date_format' => 'd.m.Y',

		'timestamp_format' => 'd.m.y, H:i:s',

		'date_format_regexp_php' => '/^(?P<d>[0-9]{2})\.(?P<m>[0-9]{2})\.(?P<y>[0-9]{4})$/',

		'date_format_regexp_js' => '/^\d{2}[\.]\d{2}[\.]\d{4}$/',

		'float_format' => array(

			'decimals' => 2,

			'decimal_point' => ',', 

			'thousands_separator' => ' '

			),

		'float_format_regexp_php' => '/^[\+\-]?[0-9\s]+([\,|\.][0-9]+)?$/',

		'float_format_regexp_js' => '/^[\+\-]?([\d|\s]+)?([\,|\.]\d+)?$/',

		'int_format_regexp_php' => '/^[\+\-]?[0-9]+$/',

		'int_format_regexp_js' => '/^[\+\-]?\d+$/' 

		),



	'en' => array(

		'name' => 'English',

		'codes' => array('en-us', 'en'),

		'date_format' => 'm/d/Y',

		'timestamp_format' => 'm/d/y, g:i a',

		'date_format_regexp_php' => '/^(?P<m>[0-9]{2})\/(?P<d>[0-9]{2})\/(?P<y>[0-9]{4})$/',

		'date_format_regexp_js' => '/^\d{2}[\/]\d{2}[\/]\d{4}$/',

		'float_format' => array(

			'decimals' => 2,

			'decimal_point' => '.', 

			'thousands_separator' => ' '

			),  

		'float_format_regexp_php' => '/^[\+\-]?[0-9]+(\.[0-9]+)?$/',

		'float_format_regexp_js' => '/^[\+\-]?\d+([\.]\d+)?$/',

		'int_format_regexp_php' => '/^[\+\-]?[0-9]+$/',

		'int_format_regexp_js' => '/^[\+\-]?\d+$/' 

		),



	'ua' => array(

		'name' => 'Українська',

		'codes' => array('uk'),

		'date_format' => 'd.m.Y',

		'timestamp_format' => 'd.m.y, H:i:s',

		'date_format_regexp_php' => '/^(?P<d>[0-9]{2})\.(?P<m>[0-9]{2})\.(?P<y>[0-9]{4})$/',

		'date_format_regexp_js' => '/^\d{2}[\.]\d{2}[\.]\d{4}$/',

		'float_format' => array(

			'decimals' => 2, 

			'decimal_point' => ',', 

			'thousands_separator' => ' '

			),  

		'float_format_regexp_php' => '/^[\+\-]?[0-9\s]+([\,|\.][0-9]+)?$/',

		'float_format_regexp_js' => '/^[\+\-]?([\d|\s]+)?([\,|\.]\d+)?$/',

		'int_format_regexp_php' => '/^[\+\-]?[0-9]+$/',

		'int_format_regexp_js' => '/^[\+\-]?\d+$/' 

		),	

	);





// Cache

$CPF_CONFIG['CACHE']['STORAGE'] = 'null'; //Possible values: file, memcache, eaccelerator, null

$CPF_CONFIG['CACHE']['MEMCACHE']['HOST'] = 'localhost';

$CPF_CONFIG['CACHE']['MEMCACHE']['PORT'] = '11211';

$CPF_CONFIG['CACHE']['FILE']['FILE_NAME_FORMAT'] = CPF_ROOT_DIR . 'tmp/file_cache-%s.dat';





// Translate

$CPF_CONFIG['TRANSLATE']['STORAGE'] = 'Gettext'; // Possible values: Gettext, Mytext



// Gettext storage

$CPF_CONFIG['TRANSLATE']['GETTEXT']['CACHE']['KEYS']['GETTEXT_FORMAT'] = 'GETTEXT_%s';

$CPF_CONFIG['TRANSLATE']['GETTEXT']['CACHE']['ENABLED'] = TRUE;



// Mytext storage

$CPF_CONFIG['TRANSLATE']['MYTEXT']['CACHE']['KEYS']['MYTEXT_FORMAT'] = 'MYTEXT_%s';

$CPF_CONFIG['TRANSLATE']['MYTEXT']['CACHE']['ENABLED'] = FALSE;

$CPF_CONFIG['TRANSLATE']['MYTEXT']['AREAS'] = array('frontend', 'backend', 'tables');

$CPF_CONFIG['TRANSLATE']['MYTEXT']['FILE']['MASK'] = CPF_APP_DIR . 'resources/%s/%s/*.php';



// Mail

$CPF_CONFIG['MAIL']['MAILER_ENABLED'] = TRUE;

$CPF_CONFIG['MAIL']['MAILER_CHARSET'] = $CPF_CONFIG['CHARSET']['NAME'];

$CPF_CONFIG['MAIL']['MAILER_METHOD'] = 'mail';

$CPF_CONFIG['MAIL']['MAILER_SMTP_HOST'] = 'smtp.example.com';

$CPF_CONFIG['MAIL']['MAILER_SMTP_LOGIN'] = 'login';

$CPF_CONFIG['MAIL']['MAILER_SMTP_PASSWORD'] = '******';

$CPF_CONFIG['MAIL']['MAILER_SMTP_PORT'] = '25'; 

$CPF_CONFIG['MAIL']['MAILER_FROM_NAME'] = 'NoReply'; 

$CPF_CONFIG['MAIL']['MAILER_FROM'] = 'noreply@example.com';



// Exceptions and error handling

$CPF_CONFIG['ERRORS']['DEFAULT_ERROR_URL'] = '/500.html';

?>