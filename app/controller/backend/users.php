<?php
class App_Controller_Backend_Users extends App_Controller_Base_Backend
{
    public $orders;

    public function pre_action()
    {
        $orders = $this->config->value('VIEW.SMARTY.PAGER.ORDERS');
        $key = sprintf('%s-default', $this->request->controller, $this->request->action);
        $this->orders = isset($orders[$key]) ? $orders[$key] : array();
        unset($this->orders['codes_count']);
        unset($this->orders['prizes_count']);
        unset($this->orders['sex']);
        parent::pre_action();
    }

	public function action_default()
	{
        $where = array();
        $is_search = FALSE;

        if (($field = $this->request->param('field')) !== FALSE && ($search = $this->request->get('q')) !== FALSE && isset($this->orders[$field]))
        {
            $this->assign('search', $search);
            $this->assign('field', $field);
			if ($field == 'name')
			{
				$where[] = sprintf('AND (name LIKE %2$s OR surname LIKE %2$s)', $field, $this->outlet->quote( '%' . $search . '%'));
			}
			else
			{
				$where[] = sprintf('AND %s LIKE %s', $field, $this->outlet->quote( '%' . $search . '%'));
			}
            $is_search = TRUE;
        }
        if (($from = $this->request->param('date_from')) !== FALSE && !empty($from))
        {
            $temp = new DateTime($from);
            $this->assign('date_from', $from);
            $from = $temp->format('Y-m-d');
            $where[] = sprintf('AND `datetime` >= "%s"', $from);
            $is_search = TRUE;
        }
        if (($to = $this->request->param('date_to')) !== FALSE && !empty($to))
        {
            $temp = new DateTime($to);
            $this->assign('date_to', $to);
            $to = $temp->format('Y-m-d');
            $where[] = sprintf('AND `datetime` <= "%s"', $to);
            $is_search = TRUE;
        }

        $query =sprintf('
            SELECT
                SQL_CALC_FOUND_ROWS
                {App_Model_User}.*
                FROM {App_Model_User}
                WHERE {App_Model_User.group_id} != %d AND {App_Model_User.group_id} != %d %s
                ORDER BY :order_by
                LIMIT :offset, :count
            ', $this->config->value('APP.RIGHTS.GUEST_GROUP_ID'), $this->config->value('APP.RIGHTS.ADMIN_GROUP_ID'), implode(' ', $where));
        $result = $this->pager->outlet_pdo_paging($this->outlet, $query);

        $users = array();
        foreach ($result as $key=>$value)
        {
            $temp = $this->outlet->getEntityForRowByName('App_Model_User', $value);
            $users  [] = $temp;
        }

        if ($is_search)
        {
            //$this->pager->pager_record_count = $this->pager->pager_size;
        }

		$this->assign('users_default', $this->config->value('APP.RIGHTS.DEFAULT_USERS'));
		$this->assign('guest_id', $this->config->value('APP.RIGHTS.GUEST_USER_ID'));
		$this->assign('cpf_entities', $users);
		$this->assign('cpf_orders', $this->orders);
	}

    public function action_search()
    {
        $params = array();
        if (($field = $this->request->post('field')) !== FALSE && isset($this->orders[$field]))
            $params['field'] = $field;
        if (($search = $this->request->post('search')) !== FALSE)
            $params['query_q'] = $search;
        if (($from = $this->request->post('date_from')) !== FALSE)
            $params['date_from'] = $from;
        if (($to = $this->request->post('date_to')) !== FALSE)
            $params['date_to'] = $to;

        if (!empty($params))
        {
            $this->redirect_backend($this->request->controller, 'default', $params);
        }
        else
        {
            $this->give_404();
        }
    }

    public function action_view()
	{
        if (isset($this->request->params['id']) && !is_null($user = $this->outlet->load('App_Model_User', intval($this->request->params['id'])) ))
        {
			$user->activities = $this->outlet->from('App_Model_UserActivity')->where('user_id = ?', array($user->id))->orderBy('datetime DESC')->find();
			$user->prizes = $this->outlet->from('App_Model_Prize')->where('user_id = ?', array($user->id))->orderBy('datetime DESC')->find();
			$user->codes = $this->outlet->from('App_Model_CodeAttempt')->where('success = 1 AND user_id = ?', array($user->id))->orderBy('datetime DESC')->find();
            $this->assign('user', $user);
        }
        else
        {
            $this->messenger->error(t('The selected user doesn\'t exists'));
            $this->redirect_backend_back();
            return;
        }
	}

	public function action_add()
	{
		$form_helper = new App_Controller_Backend_Users_Form_Helper('App_Model_User', $this->request, $this->view);

		$this->_assign_groups();

		if ($this->request->is_post)
		{
			if ($form_helper->validate())
			{
				$user = $form_helper->fill();
				$this->outlet->save($user);
				$this->messenger->info(t('User added'));
				$this->redirect_backend('backend_users');
			}
		}
	}

	public function action_edit()
	{
		if (isset($this->request->params['id']) && !is_null($user = $this->outlet->load('App_Model_User', intval($this->request->params['id'])) ))
		{
			$form_helper = new App_Controller_Backend_Users_Form_Helper('App_Model_User', $this->request, $this->view, $user);
			$this->_assign_groups();

			if ($this->request->is_post)
			{
				if ($form_helper->validate())
				{
					$form_helper->fill();
					$user->id = intval($this->request->params['id']);
					$this->outlet->save($user);
					$this->messenger->info(t('The selected user saved'));
					$this->redirect_backend('backend_users');
					return;
				}
			}
			else
			{
				$form_helper->load();
			}
		}
		else
		{
			$this->messenger->error(t('The selected user doesn\'t exists'));
			$this->redirect_backend_back();
			return;
		}
	}

	public function action_delete()
	{
		if (isset($this->request->params['id']) && !is_null($user = $this->outlet->load('App_Model_User', intval($this->request->params['id'])) ))
		{
			if (in_array(intval($this->request->params['id']), $this->config->value('APP.RIGHTS.DEFAULT_USERS')))
			{
				$this->messenger->warning(t('This user is reserved, you can\'t delete it'));
				$this->redirect_backend_back();
				return;
			}

			if (intval($this->request->params['id']) == $this->user_rights->user->id)
			{
				$this->messenger->warning(t('You are logged as this user, you can\'t delete it'));
				$this->redirect_backend_back();
				return;
			}

			$this->outlet->delete('App_Model_User', $user->id);
			$this->messenger->info(t('The selected user deleted'));
			$this->redirect_backend('backend_users');
		}
		else
		{
			$this->error(t('The selected user doesn\'t exists'));
			$this->redirect_backend_back();
			return;
		}
	}

/* AJAX validation action */

	public function action_check_login()
	{
		$this->view = new Cpf_Core_View_Text();
		$result = is_null($this->outlet->selectOne('App_Model_User', 'WHERE {App_Model_User.login} = ?', array(trim($this->request->get['login'])))) ? 'true' : 'false';
		$this->assign('fake_variable', $result);
	}

	private function _assign_groups()
	{
		$groups_list = App_Utils_Form::bind_select(
			$this->outlet->select('App_Model_Group', 'WHERE {App_Model_Group.id} != ?', array($this->config->value('APP.RIGHTS.GUEST_GROUP_ID'))),
			'id',
			'title');

		$this->assign('groups', $groups_list);
	}
}


/*
	Subclassing the helper classes because there are no true callbacks in PHP
*/
class App_Controller_Backend_Users_Form_Helper extends App_Local_Form_Helper
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
		if ($this->is_edit)
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
	}
}

?>