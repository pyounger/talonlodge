<?php
/**
 * MVC Front controller (dispatcher) abstract class
 * 
 * @package CPF
 * @subpackage Core
 * @abstract
 */
abstract class Cpf_Core_Dispatcher
{
	/**
	 * Instance of HTTP-request {@link Cpf_Core_Request}
 	 * @var Cpf_Core_Request	
	 */	
	protected $request;	 
	
	/**
	* Instance of routing class {@link Cpf_Core_Url_Router}
 	* @var Cpf_Core_Url_Router	
	*/		
	protected $router;
	
	/**
	* Instance of configuration class {@link Cpf_Core_Config}
 	* @var Cpf_Core_Config
	*/		
	protected $config;
		
	/**
	 * Class constructor. It loads URL routes and URL filters 
	 * 
	 * @return void
	 */
	public function __construct()
	{
		$this->router = Cpf_Core_Url_Router::get_instance();		
		$this->config = Cpf_Core_Config::get_instance();

		//loading routes	
		p('before loading routes');
		$this->load_routes();
		p('after loading routes');

		//loading filters
		p('before loading url filters');
		$this->load_filters();
		p('after loading url filters');
	}

	/**
	 * Abstract function to throw 404 error page
	 * 
	 * @abstract
	 * @return void
	 */
	abstract protected function give_404();

	/**
	 * Method called after constructor but before actually running the application
	 * 
	 * @return void
	 */
	public function init()
	{
	}

	/**
	 * Process request, instantiate controller, calls action and renders view
	 * 
	 * @return void
	 */
	public function run()
	{
		// Performing routing
		p('before routing');
		$this->router->do_routing($this->request);
		p('after routing');

		//  Loading translations
		p('before translations loading');
		Cpf_Core_Translate_Manager::get_instance()->init($this->request);
		p('after translations loaded');

		// Calling controller
		$not_found = FALSE;		
		$class_name = sprintf(CPF_CONTROLLER_NAME_FORMAT, ucwords($this->request->controller));
		$action_name = sprintf(CPF_ACTION_NAME_FORMAT, $this->request->action);

		if (!empty($this->request->controller) && !empty($this->request->action) && file_exists(cpf_class_path($class_name)) && class_exists($class_name))
		{
			$controller = new $class_name();
			if (method_exists($controller, $action_name))
			{
				$controller->set_request($this->request);

				// Calling action
				p('before controller action');
				$controller->init();
				$controller->pre_action();				
				call_user_func(array($controller, $action_name));
				$controller->post_action();
				p('after controller action');

				// Rendering view
				p('before render');
				$view = $controller->get_view();
				$view->pre_render();
				$view->send_headers();
				$view->render();
				$view->post_render();
				p('after render');
			}
			else
			{
				$not_found = TRUE;
			}
		}
		else
		{
			$not_found = TRUE;
		}

		if ($not_found)
		{
			$this->give_404();
		}
	}

	/**
	 * Construct instance of {@link Cpf_Core_Request} from PHP globals and server environment
	 * 
	 * @return
	 */
	protected function construct_request()
	{
		$request = new Cpf_Core_Request();

		if (get_magic_quotes_gpc())
		{
			$temp = array(&$_GET, &$_POST, &$_COOKIE);
			$this->traverse($temp);
		}

		$request->get = $_GET;
		$request->post = $_POST;
		$request->cookie = $_COOKIE;
		$request->server = $_SERVER;
		$request->files = $_FILES;

		// can't call unset() because of Smarty
		$_GET = array();
		$_POST = array();
		$_FILES = array();
		$_COOKIES = array();

		$request->url = $request->server['REQUEST_URI'];

		$request->is_ajax = isset($request->server['HTTP_X_REQUESTED_WITH']) && strtolower($request->server['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
		$request->is_post = isset($request->server['REQUEST_METHOD']) && $request->server['REQUEST_METHOD'] == 'POST';

		return $request;
	}

	/**
	 * Handle magic_quotes for nested arrays
	 * 
	 * @param mixed $input Array to strip slashes
	 * @return mixed Cleaned array
	 */
	protected function traverse(&$input)
	{
		if (!is_array($input))
		{
			return;
		}

		foreach ($input as $key=>$value) 
		{
			if (is_array($input[$key]))
			{
				$this->traverse($input[$key]);
			}
			else
			{
				$input[$key] = stripslashes($input[$key]);
			}
		}
	}

  	/**
  	 * Loads routes from configs and assign them to URL router
  	 * 
  	 * @return void
  	 */
  	protected function load_routes()
	{
		$routes = $this->config->value('URL.ROUTES.REGEXP');
		
		if (!empty($routes))
		{
			foreach ($routes as $key=>$value)
			{
				$action = isset($value['action']) ? $value['action'] : CPF_DEFAULT_ACTION;
				$params = isset($value['params']) ? $value['params'] : array();

				$this->router->add_route($key, new Cpf_Core_Url_Route_Regexp($value['rule'], $value['controller'], $action, $params, $value['reverse']));
			}
		}
		$this->router->add_route(CPF_URL_ROUTER_DEFAULT_RULE, new Cpf_Core_Url_Route_Default());
	}

	/**
	 * Load default set of URL filters
	 * 
	 * @return void
	 */
	protected function load_filters()
	{
		$this->router->add_filter('abs', new Cpf_Core_Url_Filter_Abs());			
	}
}
?>