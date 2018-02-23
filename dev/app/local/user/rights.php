<?php
/**
 * User rights management class
 * 
 * @package app-start
 * @subpackage Rights
 */
class App_Local_User_Rights
{
	/**
	 * Instance of Outlet singleton {@link Outlet}
	 * @var Outlet  
	 */
	protected $outlet;
	
	/**
	* Instance of configuration class {@link Cpf_Core_Config}
 	* @var Cpf_Core_Config
	*/				
	protected $config;		
	
	/**
	* Array of rights to controllers and actions for user group
 	* @var array
	*/					
	protected $group_rights;
	
	/**
	* Name of the session variable to store user ID
 	* @var string
	*/		
	private $session_id;

	/**
	* Current user information
 	* @var App_Model_User
	*/		
	public $user;
		
    /**
     * Constructor. 'Remember me' auto login and load of rights is done here
     * 
     * @param mixed $request
     * @return void
     */
    public function __construct(Cpf_Core_Request $request)
	{
		$this->config = Cpf_Core_Config::get_instance();
		$this->outlet = Outlet::getInstance();
		
		$this->session_id = $this->config->value('SESSION.RIGHTS.USER_ID');
		
		if (!isset($_SESSION[$this->session_id]))
		{
			//auto login
			$cookie_name = $this->config->value('COOKIES.REMEMBER_ME.NAME');
			if (isset($request->cookie[$cookie_name])) 
			{
				$token = $request->cookie[$cookie_name];
				$user_id = $this->outlet->query('SELECT `user_id` FROM `usertokens` WHERE `token` = :token', array('token' => $token))->fetchColumn();
				if (!empty($user_id) && $user_id != FALSE)
				{
					$this->_delete_used_token($token, $user_id);
					$this->auto_login($user_id);
					$this->_set_remember_cookie($user_id);
				}	
				else
				{
					$this->_delete_remember_cookie();
					$_SESSION[$this->session_id] = $this->config->value('APP.RIGHTS.GUEST_USER_ID');
				}
			}		
			else //no cookie
			{
				$_SESSION[$this->session_id] = $this->config->value('APP.RIGHTS.GUEST_USER_ID');
			}
		}		
		
		$user_id = intval($_SESSION[$this->session_id]);		 	
		
		$this->_load_user_data($user_id);
			
		$temp = $this->outlet->query('SELECT `securable_name` FROM `sys_rights` WHERE `group_id` = :group_id', array('group_id' => $this->user->group_id))->fetchAll(PDO::FETCH_COLUMN, 0);		
		$separator = $this->config->value('APP.RIGHTS.CONTROLLER_ACTION_SEPARATOR');
		
		foreach ($temp as $key => $value)
		{
			$temp = explode($separator, $value);
			$this->group_rights[$temp[0]][] = $temp[1];
		}		
										 
	}
	
	/**
	 * Checks if user can login
	 * 
	 * @param string $login User login
	 * @param string $password User password
	 * @return bool TRUE if login/password pair is correct
	 */
	public function can_login($login, $password)
	{
		$user = $this->outlet->selectOne('App_Model_User', 'WHERE {App_Model_User.login} = :login AND {App_Model_User.password} = :password', array('login' => $login, 'password' => App_Utils_Crypt::hash_password($password)));
		return !(is_null($user));
	}
	
	/**
	 * Login user in
	 * 
	 * @param string $login User login
	 * @param string $password User password
	 * @param bool $remember If TRUE persistent cookie is issued
	 * @return void
	 */
	public function login($login, $password, $remember)
	{						
		if (!is_null($user = $this->outlet->selectOne('App_Model_User', 'WHERE {App_Model_User.login} = :login AND {App_Model_User.password} = :password', array('login' => $login, 'password' => App_Utils_Crypt::hash_password($password)))))
		{
			$_SESSION[$this->session_id] = $user->id;
		}	
			
		if ($remember)
		{
			$this->_set_remember_cookie($user->id);
		}
		
		$this->_load_user_data($user->id);
		
		/*
			Tokens maintaince: delete old tokens
		*/
		$this->_clean_tokens();
	}	
	
	/**
	 * Performs login by user ID (for 'Remember me' functionality)
	 * 
	 * @param int $user_id ID of the user
	 * @return void
	 */
	public function auto_login($user_id)
	{
		$_SESSION[$this->session_id] = $user_id;
	}
		
	/**
	 * Performs logout
	 * 
	 * @return void
	 */
	public function logout()
	{
		$this->_delete_remember_cookie();
		session_destroy();
		session_start(); // for messages and other components which use session
	}
	
	/**
	 * Checks if user has rights to access particular action for controller
	 * 
	 * @param string $controller Controller name (without App_Controller_* prefix) 
	 * @param string $action Name of the action (if not specified 'any action' is assumed) [optional]
	 * @return
	 */
	public function has_rights($controller, $action='')
    {
		if (empty($action)) //only controller
		{
			return isset($this->group_rights[$controller]);
		}
		else
		{
			return (isset($this->group_rights[$controller]) && in_array($action, $this->group_rights[$controller]));
		}		
	}

	/**
	 * Check if current user is guest
	 * 
	 * @return bool TRUE if current user is guest
	 */
	public function is_guest()
	{
		return ($this->user->id == $this->config->value('APP.RIGHTS.GUEST_USER_ID'));
	}

	/**
	 * Check if current user is guest
	 *
	 * @return bool TRUE if current user is guest
	 */
	public function is_root()
	{
		return ($this->user->id == $this->config->value('APP.RIGHTS.ADMIN_GROUP_ID'));
	}

/*
	Private
*/	
	/**
	 * Loads user and group data from the DB
	 * 
	 * @param int $id User ID
	 * @return void
	 */
	private function _load_user_data($id)
	{
		$temp = $this->outlet
						->from('App_Model_User')
						->with('App_Model_Usergroup')
						->where(sprintf('{App_Model_User.id} = %d', $id)) 
						->limit(1)
						->find();
		$this->user = $temp[0];
		/*
			NOTE: We prevend Outlet from caching this entity. Haven't found a better way yet.		
		*/
		$this->outlet->clearCache(); 
	}

	/**
	 * Set 'Remember me' cookie and store token
	 * 
	 * @param string $user_id User ID
	 * @return void
	 */
	private function _set_remember_cookie($user_id)
	{		
		$token = App_Utils_Crypt::hash_password($user_id . uniqid());
			$this->outlet->query('INSERT INTO `usertokens`(`token`, `user_id`, `type`) VALUES(:token, :user_id, :type)', array(
				'token'		=> $token,
				'user_id'	=> $user_id,
				'type'		=> 'login'
			));
			
		setcookie($this->config->value('COOKIES.REMEMBER_ME.NAME'), $token, time() + $this->config->value('COOKIES.REMEMBER_ME.TIMEOUT'), '/');		
	}
	
	/**
	 * Set 'Remember me' cookie
	 * 
	 * @return void
	 */
	private function _delete_remember_cookie()
	{
		setcookie($this->config->value('COOKIES.REMEMBER_ME.NAME'), '', time() - $this->config->value('COOKIES.REMEMBER_ME.TIMEOUT'), '/');		
	}
	
	/**
	 * Removes used token (called after auto login)
	 * 
	 * @param string $token Token 
	 * @param int $user_id User ID
	 * @return void
	 */
	private function _delete_used_token($token, $user_id)
	{
		$this->outlet->query('DELETE FROM `usertokens` WHERE (`token` = :token) AND (`user_id` = :user_id)', array(
				'token'		=> $token,
				'user_id'	=> $user_id
			)); 
	}
		
	/**
	 * Flushes outdated tokens from the DB
	 * 
	 * @return void
	 */
	private function _clean_tokens()
	{
		$this->outlet->query('DELETE FROM `usertokens` WHERE UNIX_TIMESTAMP(`created`) < :time', array('time' => time() - $this->config->value('COOKIES.REMEMBER_ME.TIMEOUT')));  
	}
}

?>