<?php
/**
 * Smart backend controller
 * 
 * @package app-start
 * @subpackage Controllers
 * @abstract
 */
abstract class App_Controller_Base_BackendSmart extends App_Controller_Base_Backend
{	
	protected 
	$model = '',
	$is_sortable,

        // attachment -- single image by default
	$has_attach = false,
	$attach_field = 'image',
	$attach_field_delete = 'image_delete',
	$attachment_path = '',
	$attachment_url = '';

	public function __construct()
	{
		$this->is_sortable = property_exists($this->model, 'priority');
		parent::__construct();
	}

	public function post_action()
	{
		$this->assign('is_sortable', $this->is_sortable);
		$this->assign('model', new $this->model());
		$this->assign('attachment_path', $this->attachment_path);
		$this->assign('attachment_url', $this->attachment_url);
		parent::post_action();
	}

	/**
	 * Loads Form Helper class
	 * 
	 * @param mixed $entity Current entity, if set, edit mode is enabled [optional]
	 * @return
	 */
	protected function load_form_helper($entity = NULL)
	{
		if (isset($this->model))
		{
			if (!class_exists($form_helper_class = get_class($this) . '_Form_Helper', FALSE))
			{
				$form_helper_class = 'App_Local_Form_Helper';
			}
			return new $form_helper_class($this->model, $this->request, $this->view, $entity);
		}
		else
		{
			# TO-DO:
			# ERROR MSG: $this->model class name have to be assigned
			return null;
		}
	}

	protected function record_doesnt_exist()
	{
		$this->messenger->error(t('backend.common.selected_record_doesnt_exists'));
		$this->redirect_backend_back();
		return;
	}

	/*
		CLEAR CACHE
	*/
		protected function clear_cache()
		{
		}

    /*
        LOAD entity
    */
        protected function load_entities()
        {
        	$list = $this->pager->outlet_paging($this->outlet->from($this->model));
        	$this->assign('cpf_entities', $list);
        }

	/*
		ADD entity
	*/
		protected function entity_add($is_filter = false)
		{
			$form_helper = $this->load_form_helper();

			if ($this->request->is_post)
			{
				if ($form_helper->validate())
				{
					$entity = $form_helper->fill();

				// if has priority
					if (property_exists($this->model, 'priority'))
					{
						if (property_exists($this->model, 'parent_id'))
						{
							$stmt = $this->outlet->query(sprintf('SELECT MAX({%1$s.priority}) AS `m` FROM {%1$s} WHERE `parent_id` = %2$d', $this->model, $entity->parent_id));
						}
						else
						{
							$stmt = $this->outlet->query(sprintf('SELECT MAX({%1$s.priority}) AS `m` FROM {%1$s}', $this->model));
						}
						$max_priority = $stmt->fetch(PDO::FETCH_ASSOC);
						$entity->priority = intval($max_priority['m']) + 1;
					}

                // if check for the attachment
                if (isset($this->request->files[$this->attach_field]) && $this->request->files[$this->attach_field]['error'] !== UPLOAD_ERR_NO_FILE) //All other checks in form helper
                {
                	$file = $this->request->files[$this->attach_field];

                	$this->upload_attachment($entity, $file);
                }

                // custom method
                $this->entity_add_callback($entity);

                $this->outlet->save($entity);
                $this->clear_cache();

                // custom method
                $this->entity_add_callback_after($entity);
                
                $this->messenger->info(t('backend.common.record_added'));
				// log
                $this->log_add($entity);

                $filter_params = $is_filter ? $this->request->params : null;
                $this->redirect_after_add($entity, $filter_params);
            }
        }
        else
        {
        	$fake_item = new $this->model();
        	$fake_item->date = new DateTime();
        	$form_helper->load($fake_item);

            // load additional data
        	$this->entity_add_load();
        }

        foreach ($this->request->params as $key => $param)
        {
        	$this->assign($key, $param);
        }

        $this->view->template_name = sprintf('forms/%s.form.tpl', $this->request->controller);
    }

    protected function entity_add_callback($entity) {}
    protected function entity_add_callback_after($entity) {}
    protected function entity_add_load() {}
    protected function redirect_after_add($entity, $filter_params = null)
    {
    	$this->redirect_after_form($entity, $filter_params);
    }

	/*
		EDIT entity
	*/
		protected function entity_edit($filter_params = null)
		{
			if (($id = $this->request->param('id')) !== FALSE && !is_null($entity = $this->outlet->load($this->model, (int)$id)))
			{
				$form_helper = $this->load_form_helper($entity);

				if ($this->request->is_post)
				{
					if ($form_helper->validate())
					{
						$entity = $form_helper->fill();

					// custom method
						$this->entity_edit_callback($entity);

						$this->outlet->save($entity);

                    // check for the attachment
						if ($this->request->post($this->attach_field_delete))
						{
							$this->delete_attachment($entity);
							$field = $this->attach_field;
							$entity->$field = '';
							$this->outlet->save($entity);
						}
						else
						{
                        if (isset($this->request->files[$this->attach_field]) && $this->request->files[$this->attach_field]['error'] !== UPLOAD_ERR_NO_FILE) //All other checks in form helper
                        {
                        	$file = $this->request->files[$this->attach_field];
                        	$this->delete_attachment($entity);
                        	$this->upload_attachment($entity, $file);
                        	$this->outlet->save($entity);
                        }
                    }

                    $this->clear_cache();

					// log
                    $this->log_edit($entity);

                    $this->messenger->info(t('backend.common.record_saved'));
                    $this->redirect_after_edit($entity, $filter_params);
                }
            }
            else
            {
            	$form_helper->load();
            	$this->entity_edit_load($entity);
            }
            $this->assign('current_language', $this->request->get('lang'));
            $this->view->template_name = sprintf('forms/%s.form.tpl', $this->request->controller);
        }
        else
        {
        	$this->record_doesnt_exist();
        }
    }

    protected function entity_edit_callback($entity) {}
    protected function entity_edit_load($entity) {}
    protected function redirect_after_edit($entity, $filter_params = null)
    {
    	$this->redirect_after_form($entity, $filter_params);
    }

    /*
        VIEW entity
    */
        protected function entity_view()
        {
        	if (($id = $this->request->param('id')) !== FALSE && !is_null($entity = $this->outlet->load($this->model, (int)$id)))
        	{
        		$this->entity_view_callback($entity);
        		$this->assign('entity', $entity);
        	}
        	else
        	{
        		$this->record_doesnt_exist();
        	}
        }
        protected function entity_view_callback($entity)
        {
        }

	/*
		DELETE entity
	*/
		protected function entity_delete($id, $no_message = false)
		{
			if (!is_null($entity = $this->outlet->load($this->model, (int)$id)))
			{
				$this->outlet->delete($this->model, $entity->id);
			// custom method
				$this->entity_delete_callback($entity);
				$this->clear_cache();

			// log
				$this->log_delete($entity);

				if ($this->request->is_ajax)
				{
					exit;
				}
				else
				{
					if (!$no_message)
						$this->messenger->info(t('backend.common.record_deleted'));
					$this->redirect_backend($this->request->controller);
				}
			}
			else
			{
				$this->record_doesnt_exist();
			}
		}
		protected function entity_delete_callback($entity)
		{
		}

	/*
		TOGGLE any entity bit property
	*/
		protected function entity_toggle_property($property, $id, $messages, $value = null)
		{
			if (!is_null($entity = $this->outlet->load($this->model, (int)$id)) && isset($entity->$property))
			{
				if (is_null($value))
					$entity->$property = !$entity->$property;
				else
					$entity->$property = $value;

			// log
				if ($property == 'is_deleted' && $entity->$property == 1)
				{
					$this->log_trash($entity);
				}

				$this->outlet->save($entity);
				$this->clear_cache();

				if ($messages)
				{
					if (!is_array($messages))
					{
						$this->messenger->info($messages);
					}
					else
					{
						if ($entity->$property === true)
							$this->messenger->info($messages[0]);
						else
							$this->messenger->info($messages[1]);
					}
				}
				$this->redirect_after_edit($entity, null);
			}
			else
			{
				$this->record_doesnt_exist();
			}
		}

	/*
		GROUP ACTION on entities
	*/	
		protected function entity_group_action()
		{
			if ($this->request->post('action') !== FALSE && $this->request->post('items') !== FALSE && !empty($this->request->post['items']))
			{
				$action_name = sprintf(CPF_ACTION_NAME_FORMAT, $this->request->post['action']);
				if (method_exists($this, $action_name))
				{
					$params = array();
					foreach ($this->request->post as $post => $value)
					{
						if ($post != 'action')
						{
							if (is_array($value))
								$params[$post] = implode(',', $value);
							else
								$params[$post] = $value;
						}
					}
					$items = implode(',', $this->request->post('items'));
					$this->redirect_backend($this->request->controller, $this->request->post('action'), $params);
				}
				else
				{
					$this->give_404();
				}
			}
			else
			{
				$this->give_404();
			}
		}

	/* 
		Bit methods
	*/
		protected function entity_toggle_published()
		{
			$this->entity_toggle_property('is_published', $this->request->param('id'), array(t('backend.common.record_published'), t('backend.common.record_unpublished')));
		}
		
	/*
		Remember the filter
	*/
		protected function remember_filter()
		{
			$key = sprintf('%s_%s', $this->request->controller, $this->request->action);
			if (count($this->request->params) == 0)
			{
				if (isset($_SESSION[$key]))
				{
					$params = unserialize($_SESSION[$key]);
					$this->redirect_backend($this->request->controller, $this->request->action, $params);
				}
			}
			else
			{
				$_SESSION[$key] = serialize($this->request->params);
			}
		}

		/* Sorting */
		protected function entity_up()

		{

			if (($id = $this->request->param('id')) !== FALSE && !is_null($entity = $this->outlet->load($this->model, (int)$id)))

			{

				if ($entity->priority == 1)

				{

					$this->messenger->error(t("The selected node is first on this level, you can`t move it up"));

					$this->redirect_backend_back();

				}



				$prev = $this->outlet->from($this->model)->where('`priority` = ?', array($entity->priority - 1))->find();

				if ($prev)

				{

					$prev = $prev[0];



					$tmp11 = $entity->priority;

					$entity->priority = $prev->priority;

					$prev->priority = $tmp11;



					$this->outlet->save($entity);

					$this->outlet->save($prev);

				}

				$this->redirect_backend_back();

			}

			else

			{

				$this->record_doesnt_exist();

				$this->redirect_backend_back();

			}

		}



		protected function entity_down()

		{

			if (($id = $this->request->param('id')) !== FALSE && !is_null($entity = $this->outlet->load($this->model, (int)$id)))

			{

				$max = $this->outlet->query(sprintf('SELECT MAX(`priority`) FROM {%s}', $this->model))->fetchColumn();

				if ($entity->priority == $max)

				{

					$this->messenger->error(t("The selected node is last on this level, you can`t move it up"));

					$this->redirect_backend_back();

				}



				$prev = $this->outlet->from($this->model)->where('`priority` = ?', array($entity->priority + 1))->find();

				
				if ($prev)

				{

					$prev = $prev[0];



					


					$tmp11 = $entity->priority;

					$entity->priority = $prev->priority;

					$prev->priority = $tmp11;


					$this->outlet->save($entity);

					$this->outlet->save($prev);

					

				}

				$this->redirect_backend_back();

			}

			else

			{

				$this->record_doesnt_exist();

				$this->redirect_backend_back();

			}

		}


		protected function ajax_move()
		{
			$this->view = new Cpf_Core_View_Json();
			$ids = $this->request->post('ids');
			if (isset($ids))
			{
				$minimum = intval($this->request->post('min_priority'));
				$ids = explode('-', $ids);

				$query[] = sprintf('UPDATE {%s} SET `priority` = CASE `id`', $this->model);

				$p = $minimum;
				foreach ($ids as $id)
				{
					$query[] = sprintf('WHEN %d THEN %d', $id, $p);
					$p++;
				}
				$query[] = sprintf('END WHERE `id` IN (%s)', implode(',', $ids));

				$this->outlet->query(implode(' ', $query));
			}
		}

		/* Attachment */
		protected function upload_attachment($entity, $file)
		{
			$ext = App_Utils_Image::get_extension($file['name']);
			$filename = App_Utils_Image::get_filename($file['name']);
			$path = App_Utils_Image::get_path($filename, $this->attachment_path);
			$r = move_uploaded_file($file['tmp_name'], $path);
			$field = $this->attach_field;
			$entity->$field = $filename;
			$entity->ext = $ext;
		}

		protected function delete_attachment($entity)
		{
			$field = $this->attach_field;
			if (isset($entity->$field))
			{
				$path = $this->get_path_for_the_attachment($entity);
				@unlink($path);
			}
		}

		protected function get_path_for_the_attachment($entity)
		{
			$field = $this->attach_field;
			return sprintf('%s%s', $this->attachment_path, $entity->$field);
		}


		/* Log */
		protected function log_add($entity) { }
		protected function log_edit($entity) { }
		protected function log_delete($entity) { }
		protected function log_trash($entity) { }
	}

	?>