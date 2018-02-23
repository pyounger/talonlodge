<?php
class App_Controller_Backend_Reservations extends App_Controller_Base_BackendSmart
{
    public
        $model = 'App_Model_Reservation';
        
     

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

    public function action_export() {

		$this->load_entities();
		$data = $this->view->fetch($this->view->template_name);

               
		$this->view = new Cpf_Core_View_File();
		$this->assign('content-type', 'application/excel');
		$this->assign('filename', sprintf('lahainashores-contacts-%s.csv', date('mdy_Hi')));
		$this->assign('data', $data);
	}
}
?>