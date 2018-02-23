<?php
class App_Controller_Backend_Messages extends App_Controller_Base_BackendSmart
{
    public
        $model = 'App_Model_Message';

    /* actions */
    public function action_default()
    {
        $this->load_entities();
    }

    public function action_view()
    {
        $this->entity_view();
    }

    public function action_delete()
    {
        $this->entity_delete($this->request->param('id'));
    }


}
?>