<?php
/**
 * Base application controller class
 *
 * Smarty-registered functions and variables (full list):
 * ------------------------------------------------------
 *
 * Cpf_Core_View_Smary:
 * - {t}...{/t} - Gettext block
 * - {link} - link function
 * - {control} - insert control
 *
 *
 *
 * Controller variables:
 * - cpf_lang - current language code ('en', 'ru' etc)
 * - cpf_lang - language settings from config
 * - cpf_lang_default - default language code
 * - cpf_config_validation - additional application-level validation (e-mail, login etc)
 *
 * - cpf_version - version of CPF
 * - cpf_app_start_version - version of app-start
 * - cpf_root_url - root URL of the site
 * - cpf_root_dir - path to the site root
 * - cpf_url_current - current URL
 *
 * - cpf_assets_version - version of CSS and JavaScript assets (to flush cache)
 *
 * - cpf_controller - name of the controller (not the class name!), for example 'backend_index'
 * - cpf_action - name of the action (not method name!), for example 'index'
 *
 * - cpf_release_year - year of site release
 * - cpf_site_title - site title
 *
 * Controller objects:
 * - cpf_rights - instance of App_Local_User_Rights for use in template
 *
 * Other controllers:
 * - cpf_entities -- list of entities for table
 *
 *
 *
 * App_Local_Navigation_Pager:
 * - cpf_order_sort - sort field
 * - cpf_order_order - sort order: asc/desc
 * - cpf_order_fake_sort - placeholder for replacement
 * - cpf_order_orders - list of order rules
 * 
 * - cpf_pager_current - current page
 * - cpf_pager_count - number of the pages
 * - cpf_pager_records_count - number of records
 * - cpf_pager_size - size of the page
 * - cpf_pager_fake_page - placeholder for replacement
 * - cpf_pager_delta - delta value
 * - cpf_pager_full_list_enabled - specifies if full list enabled
 *
 *
 *
 * App_Local_Navigation_Messenger_Popup
 * - cpf_popup_messages
 *
 *
 *
 * App_Local_Form_Helper:
 * - cpf_is_edit - TRUE when editing entity
 * - cpf_current_entity - current entity (created or edited)
 * - cpf_errors - server validation errors
 *
 *
 *
 * App_View_Smarty:
 * - cpf_stat_generated_in - page generation time
 * - cpf_stat_memory_usage - memory usage
 * - cpf_stat_memory_peak_usage - peak memory usage
 * - cpf_stat_db_query_count - count of executed queries
 * - cpf_stat_db_exec_time - time of query execution
 * - cpf_stat_cache_get_count - number of cache hits
 * - cpf_stat_cache_set_count - number of gets from cache
 * - cpf_stat_cache_storage_name - name of the active cache storage
 * - cpf_stat_translations_count - number of translated strings
 *
 *
 * Session variables (full list):
 * ------------------------------
 * - $CPF_CONFIG['SESSION']['RIGHTS']['USER_ID'] - id of current user
 * - $CPF_CONFIG['SESSION']['MESSENGERS']['POPUP']['MESSAGES'] - popup messages list
 *
 *
 * Cookies (full list):
 * --------------------
 * - $CPF_CONFIG['COOKIES']['REMEMBER_ME'] - cookie for 'remember me' functionality
 *
 *
 * @package app-start
 * @subpackage Controllers
 * @abstract
 *
 */
abstract class App_Controller_Base_Common extends Cpf_Core_Controller
{
	/**
	 * Instance of Outlet singleton {@link Outlet}
	 * @var Outlet
	 */
	protected $outlet;

	/**
	 * Instance of pager helper
	 * @var App_Local_Navigation_Pager
	 */
	protected $pager;

	/**
	 * Instance of rights management class {@link App_Local_User_Rights}
	 * @var App_Local_User_Rights
	 */
	protected $user_rights;

	/**
	 * Default constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->outlet = Outlet::getInstance();
	 	$this->view = new App_View_Smarty();
		$this->pager = new App_Local_Navigation_Pager();
	}

	/**
	 * Setter for <samp>$request</samp>. Using more specific request class
	 *
	 * @param Cpf_Core_Request $request
	 * @return void
	 */
	public function set_request(Cpf_Core_Request $request)
	{
		$this->request = new App_Local_Form_Request($request);
	}

	/**
	 * Initialization function called immediately after constructor, access rights checks are handled here
	 *
	 * @return void
	 */
	public function init()
	{
		@session_start();

		$this->view->template_name = sprintf($this->config->value('VIEW.SMARTY.ACTION_TEMPLATE_FORMAT'), $this->request->controller, $this->request->action);

		$this->user_rights = new App_Local_User_Rights($this->request);

		if (!$this->user_rights->has_rights($this->request->controller, $this->request->action))
		{
			$this->handle_access_denied();
		}
	}

	/**
	 * Called before action
	 *
	 * @return void
	 */
	public function pre_action()
	{
        // Process pager params
    	$this->pager->process_request($this->request);

		// General template variables
		$this->assign('cpf_lang', $this->request->lang);
		$this->assign('cpf_langs', $this->config->value('LANGS.LIST'));
		$this->assign('cpf_lang_default', $this->config->value('LANGS.DEFAULT'));
		$this->assign('cpf_config_validation', $this->config->value('APP.VALIDATION'));
	}

	/**
	 * Assign all necessary variables to view after action
	 *
	 * @return void
	 */
	public function post_action()
	{
		// If we use AJAX, Text or any other output
		if (get_class($this->view) != 'App_View_Smarty')
		{
			return;
		}

		// Base values
		$this->assign('cpf_version', CPF_VERSION);
		$this->assign('cpf_base_app_version', $this->config->value('APP.INFO.BASE_VERSION'));
		$this->assign('cpf_root_url', CPF_ROOT_URL);
		$this->assign('cpf_root_dir', CPF_ROOT_DIR);
		$this->assign('cpf_url_current', $this->request->url);
		$this->assign('cpf_canonical_url', sprintf('%s%s', substr(CPF_ROOT_URL, 0, strlen(CPF_ROOT_URL)-1), $_SERVER['REQUEST_URI']));

		// Assets version
		$this->assign('cpf_assets_version', $this->config->value('APP.ASSETS.VERSION'));

		// MVC related
		$this->assign('cpf_controller', $this->request->controller);
		$this->assign('cpf_action', $this->request->action);

		// Information
		$this->assign('cpf_release_year', $this->config->value('APP.INFO.RELEASE_YEAR'));
		$this->assign('cpf_site_title',  $this->config->value('APP.INFO.SITE_TITLE'));

		// Functions and objects
		$this->assign('cpf_rights', $this->user_rights);

		// Pager values
		$this->pager->process_view($this->view);
	}


	/**
	 * Override this function in inherited classes for custom 403 handling
	 *
	 * @return void
	 */
	protected function handle_access_denied()
	{
		$this->give_403();
	}
/*
	Shortcuts
*/
	/**
	 * Wrapper for view's <samp>assign()</samp> function
	 *
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	protected function assign($key, $value)
	{
		$this->view->assign($key, $value);
	}

	/**
	 * Throws 404 page intead of current page and terminates further processing
	 *
	 * @return void
	 */
	protected function give_404()
	{
		App_Utils_Redirect::give_404();
	}

	/**
	 * Throws 403 page intead of current page and terminates further processing
	 *
	 * @return void
	 */
	protected function give_403()
	{
		App_Utils_Redirect::give_403();
	}

/*
    Redirect shortcuts
*/
	/**
	 * Performs HTTP redirect using constructed URL
	 *
	 * @param string $rule_name Name of the URL rule
	 * @param array $params Params in the way it accepts {@link Cpf_Core_Url_Router}'s <samp>link()</samp> method
	 * @return void
	 */
	protected function redirect($rule_name, array $params=array())
	{
		$params['abs'] = TRUE;
		$this->view = new Cpf_Core_View_Redirect($this->router->link($rule_name, $params));
	}

	/**
	 * Performs HTTP redirect back to referring page using <samp>HTTP_REFERER</samp>, the fallback is provided
	 * in case when no referrer is specified
	 *
	 * @param string $fallback_rule_name Name of the URL rule
	 * @param array $params Params in the way it accepts {@link Cpf_Core_Url_Router}'s <samp>link()</samp> method
	 * @return void
	 */
	protected function redirect_back($fallback_rule_name, array $params=array())
	{
		if (isset($this->request->server['HTTP_REFERER']))
		{
			$this->view = new Cpf_Core_View_Redirect($this->request->server['HTTP_REFERER']);
		}
		else
		{
			$params['abs'] = TRUE;
			$this->view = new Cpf_Core_View_Redirect($this->router->link($fallback_rule_name, $params));
		}
	}
}

?>