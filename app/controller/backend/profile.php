<?php
class App_Controller_Backend_Profile extends App_Controller_Base_Backend
{
	private
		$login,
		$password,
		$remember,

		$errors;

	public function action_default()
	{
		$user = $this->outlet->load('App_Model_User', $this->user_rights->user->id);
		$form_helper = new App_Controller_Backend_Profile_Form_Helper('App_Model_User', $this->request, $this->view, $user, array(
			'name',
			'password'
		));

		if ($this->request->is_post)
		{
			if ($form_helper->validate())
			{
				$form_helper->fill();
				$this->outlet->save($user);
				$this->messenger->info(t('Your profile has been changed'));
				$this->redirect_backend('backend_index');
			}
		}
		else
		{
			$form_helper->load($user);
		}
	}

	public function action_login()
	{
		if ($this->user_rights->is_guest())
		{
			if ($this->request->is_post)
			{
				if ($this->_is_valid_login())
				{
					$this->user_rights->login($this->login, $this->password, $this->remember);
					$this->messenger->info(t('You have successfuly logged in!'));
					$this->redirect_backend('backend_index');
				}
				else
				{
					$this->assign('login', $this->login);
					$this->assign('remember', $this->remember);
					$this->assign('cpf_errors', $this->errors);
				}
			}
		}
	}

	public function action_logout()
	{
		$this->user_rights->logout();
		$this->messenger->info(t('You have successfuly logged out!'));
		$this->redirect_backend('backend_profile', 'login');
	}

/*
	Private functions
*/
	private function _is_valid_login()
	{
		$this->login = $this->request->post('login');
		$this->password = $this->request->post('password');
		$this->remember = $this->request->post('remember');

		if (($this->login === FALSE) || empty($this->login))
		{
			$this->errors[] = t('Login is empty');
		}

		if (($this->password == FALSE) || empty($this->password))
		{
			$this->errors[] = t('Password is empty');
		}

		if (empty($this->errors) && !$this->user_rights->can_login($this->login, $this->password))
		{
			$this->errors[] = t('Authentication error: invalid login or password');
		}

		return empty($this->errors);
	}
}

/*
	Subclassing the helper classes because there are no true callbacks in PHP
*/
class App_Controller_Backend_Profile_Form_Helper extends App_Local_Form_Helper
{
	private
		$temp_password;

	protected function pre_process()
	{
		$this->temp_password = $this->entity->password;
	}

	protected function post_process()
	{
		if (isset($this->request->post['password']) && !empty($this->request->post['password']))
		{
			$this->entity->password = App_Utils_Crypt::hash_password($this->entity->password);
		}

	}

	protected function pre_validate()
	{
		if (isset($this->request->post['password_current'])  && !empty($this->request->post['password_current']))
		{
			if ($this->temp_password == App_Utils_Crypt::hash_password(trim($this->request->post['password_current'])))
			{
				if ( (isset($this->request->post['password']) && !empty($this->request->post['password'])) ||
					(isset($this->request->post['password_c']) && !empty($this->request->post['password_c'])) )
				{
					if (!isset($this->request->post['password_c']))
					{
						$this->errors[] = t('Password confirmation is empty');
					}

					if (isset($this->request->post['password']) &&
						isset($this->request->post['password_c']) &&
						trim($this->request->post['password']) != trim($this->request->post['password_c']))
					{
						$this->errors[] = t('Password and password confirmation do not match');
					}
				}
				else
				{
					$this->entity->password = $this->temp_password;
				}
			}
			else
			{
				$this->entity->password = $this->temp_password;
				$this->errors[] = t('Current password is wrong');
			}
		}
		else
		{
			$this->entity->password = $this->temp_password;
			$this->errors[] = t('Current password is empty');
		}
	}
}

?>