<?php
class App_Controller_Backend_Recipecategories extends App_Controller_Base_BackendSmart
{
    public
        $model = 'App_Model_RecipeCategory';

    /* actions */
    public function action_default()
    {
		$types = array('meal', 'fish', 'technique');
        if (($type = $this->request->param('type')) !== FALSE && in_array($type, $types)) { } else {
			$type = $types[0];
		}
		$this->assign('type', $type);

		$categories = $this->outlet->from($this->model)->where('type = ?', array($type))->orderBy('title ASC')->find();
		$this->assign('cpf_entities', $categories);
    }

    public function action_add()
    {
		$this->_assign_types();
        $this->entity_add();
    }
		protected function entity_add_load()
		{
			if (($ctype = $this->request->param('ctype')) !== FALSE) 
			{
				$this->assign('type', $ctype);
			}
		}

    public function action_edit()
    {
		$this->_assign_types();
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

	private function _assign_types()
	{
		$types = array(
			array('id' => 'meal', 'title' => 'Meal'), 
			array('id' => 'fish', 'title' => 'Fish'),
			array('id' => 'technique', 'title' => 'Technique'),
		);
		$this->assign('types', $types);
		return $types;
	}
}
?>