<?php
class App_Controller_Backend_Blocks extends App_Controller_Base_BackendSmart
{
    public
        $model = 'App_Model_Block';

    /*
        Actions
    */
    public function action_add()
    {
        if (($id = $this->request->param('id')) !== FALSE && !is_null($page = $this->outlet->load('App_Model_Page', (int)$id)))
        {
            $form_helper = $this->load_form_helper();

            $this->view->template_name = sprintf('forms/%s.form.tpl', $this->request->controller);
            $this->assign('page', $page);
            if (($page_placeholder = $this->request->param('ph')) !== FALSE)
            {
                $this->assign('page_placeholder', $page_placeholder);
            }

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
                        $this->outlet->save($entity);
                    }

                    $this->outlet->save($entity);

                    // update page content json
                    if (($page_id = $this->request->post('page_id')) !== FALSE && ($page_placeholder = $this->request->post('page_placeholder')) !== FALSE && !is_null($page = $this->outlet->load('App_Model_Page', $page_id)))
                    {
                        $content = json_decode($page->content, true);
                        $content[$page_placeholder][] = array(
                            "type" => "blocks",
                            "id" => $entity->id
                        );
                        $page->content = json_encode($content);
                        $this->outlet->save($page);
                    }

                    $this->outlet->save($entity);
                    $this->clear_cache();

                    $this->messenger->info(t('backend.common.record_added'));
                    // log
                    $this->log_add($entity);

                    if (isset($this->request->post['form-apply']))
                    {
                        $this->redirect_backend_back();
                    }
                    else
                    {
                        $this->redirect_backend('backend_pages', 'view', array('id' => $page->id));
                        return;
                    }
                }
            }
            else
            {
                $fake_item = new $this->model();
                $fake_item->date = new DateTime();
                $form_helper->load($fake_item);
                $this->assign('page_id', $page->id);
            }

            foreach ($this->request->params as $key => $param)
            {
                $this->assign($key, $param);
            }
        }
        else
        {
            $this->record_doesnt_exist();
        }
    }

    public function action_edit()
    {
        $this->entity_edit();
    }

    protected function redirect_after_edit($entity, $filter_params = null)
    {
        if (isset($this->request->post['form-apply']))
        {
            $this->redirect_backend_back();
        }
        else
        {
            if (($page_id = $this->request->param('page_id')) !== FALSE)
            {
                $this->redirect_backend('backend_pages', 'view', array('id' => $page_id));
            }
        }
    }

    public function action_delete()
    {
        if (($id = $this->request->param('id')) !== FALSE && !is_null($entity = $this->outlet->load($this->model, (int)$id)))
        {
            $this->outlet->delete($this->model, $entity->id);

            // update page content json
            if (($page_id = $this->request->param('page_id')) !== FALSE && ($page_placeholder = $this->request->param('page_placeholder')) !== FALSE && !is_null($page = $this->outlet->load('App_Model_Page', $page_id)))
            {
                $content = json_decode($page->content, true);
                $new_content = array();
                if (isset($content[$page_placeholder]))
                {
                    foreach ($content[$page_placeholder] as $cph)
                    {
                        if ($cph['id'] != $entity->id)
                            $new_content[] = $cph;
                    }
                    $content[$page_placeholder] = $new_content;
                }
                $page->content = json_encode($content);
                $this->outlet->save($page);
            }

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
                $this->redirect_backend_back();
            }
        }
        else
        {
            $this->record_doesnt_exist();
        }
    }

    public function action_up()
    {
        $this->entity_up();
    }

    public function action_down()
    {
        $this->entity_down();
    }

    /*
        Private
    */
}
?>