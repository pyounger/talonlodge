<?php
class App_Controller_Backend_EmailTemplates extends App_Controller_Base_BackendSmart
{
    public
        $model = 'App_Model_EmailTemplate';

    /* actions */
    public function action_default()
    {
        $this->load_entities();
    }

    public function action_view()
    {
        $this->entity_view();
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

}
?>