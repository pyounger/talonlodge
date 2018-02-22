<?php
/**
 * Base backend controller
 * 
 * @package app-start
 * @subpackage Controllers
 * @abstract
 */
abstract class App_Controller_Base_Backend extends App_Controller_Base_Common
{	
	/**
	 * Instance of messenger helper
	 * @var App_Local_Navigation_IMessenger
	 */
	protected $messenger;
	
	/**
	 * Default constructor
	 * 
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();	
		$this->messenger = new App_Local_Navigation_Messenger_Popup();   
	}	
	
	/**
	 * Custom access denied handling for backend 
	 * 
	 * @return void
	 */	
	protected function handle_access_denied()
	{
		if ($this->user_rights->is_guest())
		{
			$this->messenger->warning(t('You have to login to get the access to the selected page'));
			$this->redirect_backend('backend_profile', 'login');
		}
		else
		{
			$this->give_403();
		}
	}

	/**
	 * Assign all necessary variables to view after action
	 * 
	 * @return void
	 */	
	public function post_action()
	{
		parent::post_action();		
		
		$this->messenger->process_view($this->view);
	}

	/**
	 * Performs HTTP redirect using {@link CPF_URL_ROUTER_DEFAULT_RULE} rule
	 * 
	 * @param string $controller Name of the controller 
	 * @param string $action Name of the action [optional]
	 * @param array $params Additional parameters [optional]
	 * @return void
	 */
	protected function redirect_backend($controller, $action = NULL, array $params=array())
	{
		$params['abs'] = TRUE;
		$params['controller'] = $controller;
		$params['action'] = $action; 
		$this->view = new Cpf_Core_View_Redirect($this->router->link(CPF_URL_ROUTER_DEFAULT_RULE, $params));				
	}

	/**
	 * Performs HTTP redirect using {@link CPF_URL_ROUTER_DEFAULT_RULE} rule if HTTP_REFERER is not defined
	 * 
	 * @param string $controller Name of the controller (default 'backend_index') [optional]
	 * @param string $action Name of the action [optional]
	 * @param array $params Additional parameters [optional]
	 * @return void
	 */
	protected function redirect_backend_back($controller = NULL, $action = NULL, array $params=array())
	{
		$params['controller'] = ($controller === NULL) ? 'backend_index' : $controller;
		$params['action'] = $action; 
		$this->redirect_back(CPF_URL_ROUTER_DEFAULT_RULE, $params);				
	}		


	protected function redirect_after_form($entity = null, $filter_params = null)
    {
        if (isset($this->request->post['form-apply']))
        {
            if ($this->request->action == 'add')
                $this->redirect_backend($this->request->controller, 'edit', array('id' => $entity->id));
            else
                $this->redirect_backend_back();
        }
        elseif (!is_null($filter_params))
        {
            $params = array();
            foreach ($filter_params as $key)
            {
                if (isset($entity->$key))
                {
                    $filter_key = str_replace('_id', '', $key);
                    $params[$filter_key] = $entity->$key;
                }
            }
            $this->redirect_backend($this->request->controller, 'filter', $params);
        }
        elseif (isset($this->request->get['r']))
        {
            $this->view = new Cpf_Core_View_Redirect(sprintf('%s%s', CPF_ROOT_URL, $this->request->get('r')));
        }
        else
        {
            $this->redirect_backend($this->request->controller);
        }
        return;
    }

}

?>