<?php
/**
 * Main configuration, settings here override settings in cpf default configuration
 * 
 * @package app-start
 * @subpackage Config
 */

/*
	App specific
*/
$CPF_CONFIG['APP']['INFO']['BASE_VERSION'] = 'app-site 1.0';
$CPF_CONFIG['APP']['INFO']['RELEASE_YEAR'] = '2012';
$CPF_CONFIG['APP']['INFO']['SITE_TITLE'] = t('Talon Lodge');
$CPF_CONFIG['APP']['BACKEND']['ROOT_URL'] = 'manage';

$CPF_CONFIG['APP']['SITEMAP']['PAGES']['PRIORITY'] = 0.5;
$CPF_CONFIG['APP']['SITEMAP']['PAGES']['CHANGEFREQ'] = 'weekly';

/*
	Version of CSS and Javascript assets (used to flush client's cache)
 */
$CPF_CONFIG['APP']['ASSETS']['VERSION'] = 42;

/*
	Validation and forms
*/
$CPF_CONFIG['APP']['VALIDATION']['EMAIL_REGEXP'] = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i';
$CPF_CONFIG['APP']['VALIDATION']['SHORTCUT_REGEXP'] = '/^[a-zA-Z0-9\-_]+$/';
$CPF_CONFIG['APP']['VALIDATION']['LOGIN_REGEXP'] = '/^[a-zA-Z0-9]+$/';
$CPF_CONFIG['APP']['VALIDATION']['TIME'] = array(
	'FORMAT' => 'H:i',
	'MASK' => '99:99',
	'REGEXP_PHP' => '/^(?P<h>[0-9]{2}):(?P<m>[0-9]{2})$/',
	'REGEXP_JS' => '/^\d{2}:\d{2}$/',
);
$CPF_CONFIG['APP']['FORMS']['FAKE_SELECT_VALUE'] = -1;


/*
	Session
*/
$CPF_CONFIG['SESSION']['RIGHTS']['USER_ID'] = 'CPF_SESSION_USER_ID';
$CPF_CONFIG['SESSION']['MESSENGERS']['POPUP']['MESSAGES'] = 'CPF_SESSION_MESSENGER_POPUP_MESSAGES';

/*
	Cookies
*/
$CPF_CONFIG['COOKIES']['REMEMBER_ME']['NAME'] = 'CPF_REMEMBER_ME';
$CPF_CONFIG['COOKIES']['REMEMBER_ME']['TIMEOUT'] = 60 * 60 * 24 * 14; //in seconds

/*
	More general
*/
$CPF_CONFIG['LANGS']['DEFAULT'] = 'en';
unset($CPF_CONFIG['LANGS']['LIST']['ua']);
unset($CPF_CONFIG['LANGS']['LIST']['ru']);


$CPF_CONFIG['VIEW']['SMARTY']['PAGER']['DEFAULT']['FULL_LIST_ENABLED'] = TRUE; // enables page = 0 to show all records
$CPF_CONFIG['VIEW']['SMARTY']['PAGER']['PAGER_ORDERS_KEY_FORMAT'] = '%s-%s';
$CPF_CONFIG['VIEW']['SMARTY']['PAGER']['DEFAULT']['PAGE_SIZE'] = 20; 
$CPF_CONFIG['VIEW']['SMARTY']['PAGER']['DEFAULT']['DELTA'] = 5;
$CPF_CONFIG['VIEW']['SMARTY']['PAGER']['FAKE_PAGE'] = -1 * PHP_INT_MAX; //smallest int value in php for current OS & CPU

$CPF_CONFIG['VIEW']['SMARTY']['ORDER']['FAKE_SORT'] = 'fakesort';
$CPF_CONFIG['VIEW']['SMARTY']['ORDER']['FAKE_ORDER'] = 'fakeorder';
$CPF_CONFIG['VIEW']['SMARTY']['ORDER']['COMPLEX_ORDER_PLACEHOLDER'] = '***';

$CPF_CONFIG['VIEW']['SMARTY']['STAT_FOOTER_TEMPLATE'] = 'includes/common.footer.stats.tpl';

/*
	Rights
*/
$CPF_CONFIG['APP']['RIGHTS']['CONTROLLER_FILE_MASK'] = '*.php';
$CPF_CONFIG['APP']['RIGHTS']['CONTROLLER_ACTION_SEPARATOR'] = '-';
$CPF_CONFIG['APP']['RIGHTS']['GUEST_USER_ID'] = 1;  // GuestID in DB
$CPF_CONFIG['APP']['RIGHTS']['GUEST_GROUP_ID'] = 1; // Guest group in DB
$CPF_CONFIG['APP']['RIGHTS']['ADMIN_GROUP_ID'] = 2; // Admin group in DB

$CPF_CONFIG['APP']['RIGHTS']['DEFAULT_GROUPS'] = array(
	$CPF_CONFIG['APP']['RIGHTS']['GUEST_GROUP_ID'],	// Guests
	$CPF_CONFIG['APP']['RIGHTS']['ADMIN_GROUP_ID']	// Admins
);

$CPF_CONFIG['APP']['RIGHTS']['DEFAULT_USERS'] = array(
	$CPF_CONFIG['APP']['RIGHTS']['GUEST_USER_ID'] // Guest
);

$CPF_CONFIG['APP']['RIGHTS']['ALWAYS_ACTIVE'] = array(
	array('backend_profile-login', $CPF_CONFIG['APP']['RIGHTS']['GUEST_GROUP_ID']),		//backend_login for guest
	array('backend_index-default', $CPF_CONFIG['APP']['RIGHTS']['ADMIN_GROUP_ID']),		//backend_index for admin
	array('backend_rights-default', $CPF_CONFIG['APP']['RIGHTS']['ADMIN_GROUP_ID']), 	//backend_rights for admin
	array('backend_profile-logout', $CPF_CONFIG['APP']['RIGHTS']['ADMIN_GROUP_ID'])		//backend_logout for admin
);

?>