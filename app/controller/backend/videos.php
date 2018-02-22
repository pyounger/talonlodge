<?php
class App_Controller_Backend_Videos extends App_Controller_Base_BackendSmart
{
    public
        $model = 'App_Model_Video';

    /*
        Actions
    */
    public function action_add()
    {
        if (($id = $this->request->param('id')) !== FALSE && ($table = $this->request->param('table')) !== FALSE && !is_null($parent = $this->outlet->load($table, (int)$id)))
        {
            $this->assign('table', $table);
            if ($table == 'App_Model_Page')
            {
                $this->assign('page', $parent);
                if (($page_placeholder = $this->request->param('ph')) !== FALSE)
                {
                    $this->assign('page_placeholder', $page_placeholder);
                }
            }
            $form_helper = $this->load_form_helper();

            if ($this->request->is_post)
            {
                if ($form_helper->validate())
                {
                    $entity = $form_helper->fill();
                    $entity->page_id = $parent->id;

                    $this->outlet->save($entity);

                    // custom method
                    $content = json_decode($parent->content, true);
                    $content[$page_placeholder][] = array(
                        "type" => "videos",
                        "id" => $entity->id
                    );
                    $parent->content = json_encode($content);
                    $this->outlet->save($parent);

                    $this->clear_cache();

                    $this->messenger->info(t('backend.common.record_added'));
                    // log
                    $this->log_add($entity);

                    $this->redirect_after_edit($entity);
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

            $this->view->template_name = sprintf('forms/%s.form.tpl', $this->request->controller);        }
        else
        {
            $this->record_doesnt_exist();
        }
    }
    public function entity_add_callback($entity)
    {
    }

    public function action_edit()
    {
        $this->entity_edit();
    }

    protected function redirect_after_edit($entity, $filter_params = null)
    {
        if (isset($this->request->post['form-apply']))
        {
            $this->redirect_backend('backend_videos', 'edit', array('id' => $entity->id, 'page_id' => $entity->page_id));
        }
        else
        {
            $this->redirect_backend('backend_pages', 'view', array('id' => $entity->page_id));
        }
    }

    public function action_delete()
    {
        if (($id = $this->request->param('id')) !== FALSE && !is_null($entity = $this->outlet->load($this->model, (int)$id)))
        {
            $this->outlet->delete($this->model, $entity->id);
            // custom method
            try
            {
                // update page content json
                if (($page_id = $this->request->param('page_id')) !== FALSE && ($page_placeholder = $this->request->param('page_placeholder')) !== FALSE && !is_null($page = $this->outlet->load('App_Model_Page', $page_id)))
                {
                    $content = json_decode($page->content, true);
                    $new_content = array();
                    if (isset($content[$page_placeholder]))
                    {
                        foreach ($content[$page_placeholder] as $cph)
                        {
                            if ($cph['type'] == 'videos' && $cph['id'] != $entity->id)
                                $new_content[] = $cph;
                        }
                        $content[$page_placeholder] = $new_content;
                    }
                    $page->content = json_encode($content);
                    $this->outlet->save($page);
                }

            }
            catch (Exception $e){}
        }
        $this->redirect_backend('backend_pages', 'view', array('id' => $entity->page_id));
        return;
    }

    /*
        Private
    */
}
?>