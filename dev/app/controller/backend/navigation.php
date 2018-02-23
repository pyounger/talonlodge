<?php
class App_Controller_Backend_Navigation extends App_Controller_Base_BackendSmart
{
    public
        $model = 'App_Model_NavigationMenu';

    /* actions */
    public function action_default()
    {
        $this->load_entities();
    }

    public function action_add()
    {
        $this->entity_add();
    }

    public function action_edit()
    {
        $this->entity_edit();
    }

    public function action_delete()
    {
        $this->entity_delete($this->request->param('id'));
    }

    public function action_toggle_published()
    {
        $this->entity_toggle_published();
    }
}
?>