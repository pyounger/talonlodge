<?php
class App_Controller_Backend_Rights extends App_Controller_Base_Backend
{
	private
		$rights,
		$groups,
		$controllers_names,

		$errors;

	public function action_default()
	{
		if ($this->request->is_post)
		{
			if ($this->_is_valid())
			{
					$this->outlet->query('DELETE FROM sys_controllers');
					$this->outlet->query('DELETE FROM sys_securables');
					$this->outlet->query('DELETE FROM sys_rights');
					$query = 'INSERT INTO sys_rights (securable_name, group_id) VALUES (:name, :id)';
					$sql_r = $this->outlet->prepare($query);

					$query_sec = 'INSERT INTO sys_securables (name, title) VALUES (:name, :title)';
					$sql_s = $this->outlet->prepare($query_sec);

					$query_con = 'INSERT INTO sys_controllers (name, title) VALUES (:name, :title)';
					$sql_c = $this->outlet->prepare($query_con);

					foreach ($this->rights as $key => $value)
					{
						if (isset($value['groups'] ))
						{
							foreach ($value['groups'] as $group)
							{
								$sql_r->execute(array(':name' => $key, ':id'=> $group));
							}
							$sql_s->execute(array(':name' => $key, ':title'=> $value['title']));
						}
					}

					//d($this->controllers_names);
					foreach ($this->controllers_names as $key => $value)
					{
						$sql_c->execute(array(':name' => $key, ':title'=> $value));
					}

				//info
					$this->messenger->info(t('Rights have been changed'));
					$this->redirect_backend('backend_index');
			}
		}
		else
		{
			$this->_load_data();
		}
		$this->_assign_data();
	}

	/*	private functions	*/

	private function _is_valid()
	{
		$temp_rights = array();
		foreach ($this->request->post['rights'] as $key => $value)
		{
			$temp = explode('.', $value);
			$controller = explode('-', $temp[0]);
			$temp_rights[$temp[0]]['groups'][] = $temp[1];
			$temp_rights[$temp[0]]['controller'] = $controller[0];
		}
		foreach ($this->request->post as $key => $value)
		{
			if ($key != 'rights' && $key != 'submit')
			{
				if (strpos($key, "controller") === false)
				{
					$controller = explode('-', $key);
					$temp_rights[$key]['title'] = $value;
					$temp_rights[$key]['controller'] = $controller[0];
					if (trim($value) == '')
					{
						$this->errors[] = t('Error: empty title for securable %s', $key);
					}
				}
				else
				{
					$newkey = str_replace('controller_', '', $key);
					$this->controllers_names[$newkey] = trim($value);
					if (trim($value) == '')
					{
						$this->errors[] = t('Error: empty title for controller %s', $newkey);
					}
				}
			}
		}
		$this->rights = $temp_rights;

		return empty($this->errors);
	}

	private function _load_data()
	{
		$temp = $this->outlet->query('
			SELECT *
			FROM sys_controllers
			ORDER BY name
		')->fetchAll();
		foreach ($temp as $value)
		{
			$this->controllers_names[$value['name']] = $value['title'];
		}

		$this->rights = $this->outlet->query('
			SELECT *
			FROM sys_rights
			LEFT JOIN sys_securables ON sys_securables.name = sys_rights.securable_name
			ORDER BY sys_rights.securable_name
		')->fetchAll();

		$controllers = $this->_get_controllers();

		$temp = array();
		foreach ($this->rights as $key => $value)
		{
			if (in_array($value['securable_name'], $controllers))
			{
				$controller = explode('-', $value['securable_name']);
				$temp[$value['securable_name']]['title'] = $value['title'];
				$temp[$value['securable_name']]['groups'][] = $value['group_id'];
				$temp[$value['securable_name']]['controller'] = $controller[0];
			}

		}

		foreach ($controllers as $value)
		{
			$controller = explode('-', $value);
			if (!in_array($value, array_keys($temp)))
			{
				$temp[$value]['title'] = $value;
				$temp[$value]['groups'] = array();
				$temp[$value]['controller'] = $controller[0];
			}

			if (!in_array($controller[0], array_keys($this->controllers_names)))
			{
				$this->controllers_names[$controller[0]] = $controller[0];
			}
		}

		$this->rights = $temp;
	}

	private function _assign_data()
	{
		$this->groups = $this->outlet->select('App_Model_Usergroup');
		$this->assign('groups_count', count($this->groups));
		$this->assign('groups', $this->groups);
		$this->assign('rights_always_active', $this->config->value('APP.RIGHTS.ALWAYS_ACTIVE'));

		$this->assign('controllers_names', $this->controllers_names);

		ksort($this->rights);
		$this->assign('rights', $this->rights);

		$this->assign('cpf_errors', $this->errors);
	}

	private function _get_controllers()
	{
		$result = array();
		$folders = array('backend', 'frontend');
		foreach ($folders as $folder_name)
		{
			$path = sprintf('%scontroller/%s', CPF_APP_DIR, $folder_name);
			foreach (glob(sprintf('%s/%s', $path, $this->config->value('APP.RIGHTS.CONTROLLER_FILE_MASK'))) as $value)
			{
				$file = basename($value);
				$file_parts = explode('.', $file);
				$file_ext = $file_parts[count($file_parts)-1];
				$file_name = str_replace('.'.$file_ext, '', $file);
				$class_name = sprintf(CPF_CONTROLLER_NAME_FORMAT, sprintf('%s_%s', ucfirst($folder_name), ucfirst($file_name)));

				if (class_exists($class_name))
				{
					$methods = get_class_methods($class_name);
					foreach ($methods as $method)
					{
						if (substr($method, 0, 6) == substr(CPF_ACTION_NAME_FORMAT, 0, 6))
						{
							$result[] = sprintf('%s_%s-%s', $folder_name, $file_name, str_replace('action_', '', $method));
						}
					}
				}
			}
		}
		return $result;
	}
}

?>