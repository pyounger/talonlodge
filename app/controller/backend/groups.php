<?php
class App_Controller_Backend_Groups extends App_Controller_Base_Backend
{
	public function action_default()
	{
		$result = $this->pager->outlet_pdo_paging($this->outlet, '
		SELECT
			SQL_CALC_FOUND_ROWS
			{App_Model_Group}.*,
			(SELECT COUNT(*) FROM {App_Model_User} WHERE {App_Model_User.group_id}={App_Model_Group.id}) AS `users_count`
			FROM {App_Model_Group}
			ORDER BY :order_by
			LIMIT :offset, :count
		');

		$mapper = new App_Local_Outlet_ViewModelMapper('App_Model_ViewModel_Group', $result);
		$groups = $mapper->map();

		$this->assign('groups_default', $this->config->value('APP.RIGHTS.DEFAULT_GROUPS'));
		$this->assign('cpf_entities', $groups);
	}

	public function action_add()
	{
		$form_helper = new App_Local_Form_Helper('App_Model_Group', $this->request, $this->view);

		if ($this->request->is_post)
		{

			if ($form_helper->validate())
			{
				$group = $form_helper->fill();
				$this->outlet->save($group);
				$this->messenger->info(t('The group added'));
				$this->redirect_backend('backend_groups');
			}
		}
	}

	public function action_edit()
	{
		if (isset($this->request->params['id']) && !is_null($group = $this->outlet->load('App_Model_Group', intval($this->request->params['id'])) ))
		{
			$form_helper = new App_Local_Form_Helper('App_Model_Group', $this->request, $this->view, $group);

			if ($this->request->is_post)
			{
				if ($form_helper->validate())
				{
					$form_helper->fill();
					$group->id = intval($this->request->params['id']);
					$this->outlet->save($group);
					$this->messenger->info(t('The selected group saved'));
					$this->redirect_backend('backend_groups');
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
			$this->messenger->error(t('The selected group doesn\'t exist'));
			$this->redirect_backend_back();
			return;
		}
	}

	public function action_delete()
	{
		if (isset($this->request->params['id']) && !is_null($group = $this->outlet->load('App_Model_Group', $id = intval($this->request->params['id'])) ))
		{
			if (in_array($id, $this->config->value('APP.RIGHTS.DEFAULT_GROUPS')))
			{
				$this->messenger->warning(t('This group is reserved, you can\'t delete it'));
				$this->redirect_backend_back();
				return;
			}

			if (!is_null($this->outlet->selectOne('App_Model_User', 'WHERE {App_Model_User.group_id} = :group_id LIMIT 1', array('group_id' =>$id))))
			{
				$this->messenger->error(t('This group has users, you can\'t delete it'));
				$this->redirect_backend_back();
				return;
			}

			$this->outlet->delete('App_Model_Group', $group->id);
			$this->messenger->info(t('The selected group deleted'));
			$this->redirect_backend('backend_groups');
		}
		else
		{
			$this->messenger->error(t('The selected group doesn\'t exist'));
			$this->redirect_backend_back();
			return;
		}
	}
}

?>