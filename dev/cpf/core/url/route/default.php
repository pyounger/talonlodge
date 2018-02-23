<?php
/**
 * Default URL route
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_Url_Route_Default implements Cpf_Core_Url_IRoute
{
	private	
		$module_url,
		$module_class_prefix;

	public function __construct($module_url = NULL, $module_class_prefix = NULL)
	{
		$this->module_url = $module_url;
		$this->module_class_prefix = $module_class_prefix;
	}

	public function do_route(Cpf_Core_Request $request)
	{
		$url = preg_split('/\//', preg_replace('/\?(.*)$/', '', $request->url), -1, PREG_SPLIT_NO_EMPTY);

		if (isset($this->module_url))
		{
			if (!isset($url[0]) || $url[0] != $this->module_url)
			{
				return false; //mot matched
			}
			else
			{
				array_shift($url);
			}
		}

		//main page	
		if (empty($url))
		{
			$request->controller = $this->_construct_controller_name(CPF_DEFAULT_CONTROLLER);
			$request->action = CPF_DEFAULT_ACTION;
			return true;
		}				

		//controller only
		if (isset($url[0]) && !isset($url[1]))
		{			
			$request->controller = $this->_construct_controller_name($this->_trim_part($url[0]));
			$request->action = CPF_DEFAULT_ACTION;
			return true;			
		}

		//if controller only with params
		if (isset($url[0]) && isset($url[1]) && strpos($url[1], CPF_URL_ROUTE_DEFAULT_PARAM_SEPARATOR) > 0)
		{
			$request->controller = $this->_construct_controller_name($this->_trim_part($url[0]));
			$request->action = CPF_DEFAULT_ACTION;
			$request->params = $this->_get_params($url);											
			return true;
		}
	
		//controller, action and with\without params
		if (isset($url[0]) && isset($url[1]))
		{
			$request->controller = $this->_construct_controller_name($this->_trim_part($url[0]));
			$request->action = $this->_trim_part($url[1]);									
			$request->params = $this->_get_params($url);
			return true;
		}
	}

	public function reverse(array &$params)
	{
		$parts = array();
				
		if (isset($params['controller']))
		{
			$temp_controller = isset($this->module_class_prefix) ? str_replace(sprintf('%s_',$this->module_class_prefix), '', $params['controller'])  : $params['controller'];
			if ($temp_controller != CPF_DEFAULT_CONTROLLER)
			{
				$parts[] = $temp_controller; 
			}
		}

		if (isset($params['action']) && !empty($params['action']) && $params['action'] != CPF_DEFAULT_ACTION)
		{
			$parts[] = $params['action']; 
		}
		
		if (isset($params['id']) && isset($params['id_desc']))
		{
			$parts[] = $params['id'] . CPF_URL_ROUTE_DEFAULT_PARAM_SEPARATOR . Cpf_Core_Url_Lang_Process::encode_for_url(Cpf_Core_Url_Lang_Process::transliterate($params['id_desc'])); 
		}
		
		if (isset($params['id']) && !isset($params['id_desc']))
		{
			$parts[] = $params['id'];
		}
		
		$query = array();
		
		foreach ($params as $key=>$value)
		{
			if (!in_array($key, array('controller', 'action', 'id', 'id_desc')))
			{
				if (strpos($key, 'query_') === 0)
				{
					$query[] = sprintf('%s=%s', str_replace('query_', '', $key), urlencode($value));  
				}
				else
				{
					$parts[] = $key . CPF_URL_ROUTE_DEFAULT_PARAM_SEPARATOR . $value;
				}
			}		
		}	
		
		if (!empty($parts))
		{	
			$result = implode(CPF_URL_ROUTE_DEFAULT_URL_SEPARATOR, $parts) . CPF_URL_ROUTE_DEFAULT_URL_SEPARATOR;
		}
		else
		{
			$result = '';		
		}
		
		if (!empty($query))
		{
			$q = implode('&', $query);
			$result .= '?' . $q;
		}		

		if (isset($this->module_url))
		{
			$result = sprintf('%s%s%s', $this->module_url, CPF_URL_ROUTE_DEFAULT_URL_SEPARATOR, $result);
		}
						
		return $result;
	}


	private function _trim_part($string)
	{
		return strtolower(trim($string));
	}

	private function _get_params($url)
	{
		$params = array();
				
		foreach ($url as $key=>$value)
		{
			if (strpos($value, CPF_URL_ROUTE_DEFAULT_PARAM_SEPARATOR) !== false && $value[0] != CPF_URL_ROUTE_DEFAULT_PARAM_SEPARATOR) //if we find a param
			{
				$temp = explode(CPF_URL_ROUTE_DEFAULT_PARAM_SEPARATOR, $value);
							
				if (is_numeric($temp[0]) && !isset($params[CPF_URL_ROUTE_DEFAULT_ID_PARAM_NAME])) //we have id 
				{
					$params[CPF_URL_ROUTE_DEFAULT_ID_PARAM_NAME] = intval($temp[0]);
				}
				elseif (!is_numeric($temp[0]))
				{
					$temp_value = $temp;
					array_shift($temp_value);
					$params[$this->_trim_part($temp[0])] = trim(implode(CPF_URL_ROUTE_DEFAULT_PARAM_SEPARATOR, $temp_value));
				}
			}
			else //short id without description
			{
				if (is_numeric($value) && !isset($params[CPF_URL_ROUTE_DEFAULT_ID_PARAM_NAME]))
				{
					$params[CPF_URL_ROUTE_DEFAULT_ID_PARAM_NAME] = intval($value);
				}
			}
		}
		
		return $params;
	}	

	private function _construct_controller_name($name)
	{
		return isset($this->module_class_prefix) ? sprintf('%s_%s', $this->module_class_prefix, $name) : $name;	
	}
}
?>