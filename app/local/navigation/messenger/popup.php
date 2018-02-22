<?php
/**
 * Popup messenger
 * 
 * @package app-start
 * @subpackage Navigation
 */
class App_Local_Navigation_Messenger_Popup implements App_Local_Navigation_IMessenger
{		
	/**
	 * Private variable for storing messages as array('text' => '', 'type' => '')
	 * @var array  
	 */	
	private 
		$messages = array();
			
	/**
	 * Adds message with status 'info'
	 * 
	 * @param string $text Text of the message
	 * @return void
	 */
	public function info($text)
	{
		$this->_add_message($text, __FUNCTION__);
	}

	/**
	 * Adds message with status 'warning'
	 * 
	 * @param string $text Text of the message
	 * @return void
	 */	
	public function warning($text)
	{
		$this->_add_message($text, __FUNCTION__);
	}

	/**
	 * Adds message with status 'error'
	 * 
	 * @param string $text Text of the message
	 * @return void
	 */		
	public function error($text)
	{
		$this->_add_message($text, __FUNCTION__);
	}	

	/**
	 * Assigns data to the view and session
	 * 
	 * @param Cpf_Core_View $view Instance of view
	 * @return void
	 */			
	public function process_view(Cpf_Core_View $view)
	{		
		$key = cpf_config('SESSION.MESSENGERS.POPUP.MESSAGES');
		if (isset($_SESSION[$key]))
		{
			$view->assign('cpf_popup_messages', $_SESSION[$key]);
			unset($_SESSION[$key]);
		}
	
		if (!empty($this->messages))
		{		
			$_SESSION[$key] = $this->messages;
		}
	}
	
	private function _add_message($text, $type)
	{
		$this->messages[] = array(
			'text' => $text,
			'type' => $type
		);
	}
}
