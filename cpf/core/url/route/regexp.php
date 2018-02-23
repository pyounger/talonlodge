<?php
/**
 * Regular expression rule route
 * 
 * @package CPF
 * @subpackage Core
 */
class Cpf_Core_Url_Route_Regexp implements Cpf_Core_Url_IRoute
{
	private 
		$rule,
		$controller,
		$action,
		$params,
		$reverse;
		
	public function __construct($rule, $controller, $action, $params, $reverse)
	{
		$this->rule = $rule;
		$this->controller = $controller;
		$this->action = $action;
		$this->params = $params;
		$this->reverse = $reverse;
	}

	public function do_route(Cpf_Core_Request $request)
	{
		$matches = array();
		$request->url = str_replace('/~talonlod/', '/', $request->url);
		if (preg_match(sprintf(CPF_URL_ROUTE_REGEXP_REGEXP_FORMAT, $this->rule), $request->url, $matches) > 0)
		{

			$request->controller = $this->controller;
			$request->action = $this->action;	

			foreach ($matches as $match_key=>$match_value)
			{
				if (is_numeric($match_key))
				{
					if (isset($this->params[$match_key]))
					{
						$request->params[$this->params[$match_key]] = $match_value;
					}
				}
				else
				{
					$request->params[$match_key] = $match_value;	
				}
			}

			return TRUE;
		}
		else
		{
			return FALSE;
		}				
	}

	public function reverse(array &$params)
	{
		$encode = !isset($params['encode']);
		unset($params['encode']);
		foreach ($params as $key=>$value)
		{
			if (is_string($value))
			{
				if ($encode)
				{
					$params[$key] = Cpf_Core_Url_Lang_Process::encode_for_url(Cpf_Core_Url_Lang_Process::transliterate($value));
				}
				else
				{
					$params[$key] = $value;
				}				
			}
		}		
		return vsprintf($this->reverse, array_values($params));
	}
}
?>