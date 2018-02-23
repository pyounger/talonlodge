<?php
/**
 * URL router class [Singleton]
 * 
 * @package CPF
 * @subpackage Core
 * @abstract
 */
class Cpf_Core_Url_Router
{
	/**
	* Instance static variable
 	* @var Cpf_Core_Url_Router	
	*/	
	private static $_instance;

	/**
	* URL routes table
 	* @var array	
	*/	
	public $routes;

	/**
	* URL filters table
 	* @var array	
	*/		
	public $filters;

	/**
	 * Private constructor (this is a singleton)
	 * 
	 * @return Cpf_Core_Url_Router
	 */
	private function __construct()
	{
	}

	/**
	 * Prevent from clonning of this object
	 * 
	 * return void
	 */
	public function __clone()
	{
        trigger_error('Clone is not allowed.', E_USER_ERROR);
	}

	/**
	 * Singleton instance method
	 * 
	 * @return Cpf_Core_Cache_Manager
	 */
	public static function get_instance()
	{
		if (!isset(self::$_instance)) 
		{
            $class_name = __CLASS__;
			self::$_instance = new $class_name;
        }	
		
		return self::$_instance;		
	}

	/**
	 * Setter for routes
	 * 
	 * @param array $routes
	 * @return void
	 */
	public function set_routes($routes)
	{
		$this->routes = $routes;
	}

	/**
	 * Adds route to route table
	 * 
	 * @param string $name Route name
	 * @param pf_Core_Url_IRoute $route
	 * @return void
	 */
	public function add_route($name, Cpf_Core_Url_IRoute $route)
	{
		$this->routes[$name] = $route;
	}

	/**
	 * Deletes route from route table
	 * 
	 * @param string $name Route name
	 * @return void
	 */
	public function delete_route($name)
	{
		unset($this->routes[$name]);
	}

	/**
	 * Adds filter to filter table 
	 * 
	 * @param string $name Filter Name
	 * @param Cpf_Core_Url_IFilter $filter
	 * @return void
	 */
	public function add_filter($name, Cpf_Core_Url_IFilter $filter)
	{
		$this->filters[$name] = $filter;	
	}

	/**
	 * Deletes filter from filter table
	 * 
	 * @param string $name Filter name
	 * @return void
	 */
	public function delete_filter($name)
	{
		unset($this->filters[$name]);
	}
	
	/**
	 * Performs routing of incoming request and applying all URL filters
	 * 
	 * @param Cpf_Core_Request &$request Incoming HTTP request
	 * @return void
	 */
	public function do_routing(Cpf_Core_Request &$request)
	{		
		//run filters ('pre')
		if (!empty($this->filters))
		{
			foreach ($this->filters as $key=>$value)
			{
				$value->filter_pre($request);		
			}
		}

		//perform routing
		foreach ($this->routes as $key=>$route)
		{
		 	if ($route->do_route($request))
			{
				break;
			}
		}		

		//run filters ('post')
		if (!empty($this->filters))
		{
			foreach ($this->filters as $key=>$value)
			{
				$value->filter_post($request);		
			}
		}
	}

	/**
	 * Construct outgoing URL using URL route and applying all URL filters
	 * 
	 * @param string $rule_name Name of URL route
	 * @param array $params Parameters for URL generation
	 * @return string Outgoing URL
	 */
	public function link($rule_name, array $params)
	{			
		if (isset($this->routes[$rule_name]))
		{
			$url = '';

			//run filters ('pre')
			if (!empty($this->filters))
			{
				foreach ($this->filters as $key=>$value)
				{
					$value->filter_reverse_pre($params);		
				}
			}		

			$route = $this->routes[$rule_name];
			$url = $route->reverse($params);

			if (!empty($this->filters))
			{
				foreach ($this->filters as $key=>$value)
				{
					$value->filter_reverse_post($url, $params);		
				}
			}		
			return $url;
		}
	}
}
?>