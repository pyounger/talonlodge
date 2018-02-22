<?php
/**
 * Application Dispatcher (often called Front Controller in MVC pattern)
 * 
 * @package app-start
 * @subpackage Boot
 */
class App_Dispatcher extends Cpf_Core_Dispatcher
{
	/**
	 * Default constructor
	 * 
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->request = $this->construct_request();
	}

	/**
	 * Functon is called after constructor but before anything else
	 * 
	 * @return void
	 */
	public function init()
	{
		$this->init_outlet();
	}

	/**
	 * Default 404 function to handle routing 404 errors
	 * 
	 * @return void
	 */
	protected function give_404()
	{
		App_Utils_Redirect::give_404();
	}


  	/**
  	 * Concrete implementation of loading URL routes
  	 * 
  	 * @return void
  	 */
  	protected function load_routes()
	{
		$this->_load_routes_array($this->config->value('URL.ROUTES.REGEXP'));
		$this->router->add_route(CPF_URL_ROUTER_DEFAULT_RULE, new Cpf_Core_Url_Route_Default($this->config->value('APP.BACKEND.ROOT_URL'), 'backend'));
		$this->_load_routes_array($this->config->value('URL.ROUTES.REGEXP_AFTER'));
	}

	/**
	 * Concrete implementation of loading URL filters
	 * 
	 * @return void
	 */
	protected function load_filters()
	{
		$this->router->add_filter('lang_default', new Cpf_Core_Url_Filter_LangDefault($this->config->value('LANGS.DEFAULT')));
		parent::load_filters();
	}

	/**
	 * Initializes Outlet instance
	 * 
	 * @return void
	 */
	private function init_outlet()
	{
		Outlet::init($this->config->value('MODEL.OUTLET.CONFIG'));
		$outlet = Outlet::getInstance();
		if ($this->config->value('MODEL.OUTLET.CREATE_PROXIES'))
		{
			$outlet->createProxies();
		}
		else
		{
			require_once(CPF_APP_DIR . 'config/outlet/proxy/outlet-proxies.php');
		}	
		
		$init_query = $this->config->value('MODEL.OUTLET.DB_INITIALIZE');
		
		if (!empty($init_query))
		{
			$outlet->getConnection()->exec($init_query);
		}
	}

	/**
	 * Create instances of {@link Cpf_Core_Url_Route_Regexp} from configuration arrays and add them to URL router instance
	 * 
	 * @param array $routes
	 * @return void
	 */
	private function _load_routes_array($routes)
	{
		if (!empty($routes))
		{
			foreach ($routes as $key=>$value)
			{
				$action = isset($value['action']) ? $value['action'] : CPF_DEFAULT_ACTION;
				$params = isset($value['params']) ? $value['params'] : array();

				$this->router->add_route($key, new Cpf_Core_Url_Route_Regexp($value['rule'], $value['controller'], $action, $params, $value['reverse']));
			}
		}
	}
}
