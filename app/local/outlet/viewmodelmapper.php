<?php
class App_Local_Outlet_ViewModelMapper
{
	protected
		$outlet, 
		$data_to_map = array(),
		$viewmodel_class = '',
		$entity_class = '';
	
	public function __construct($viewmodel_class, $data_to_map)
	{
		$this->outlet = Outlet::getInstance();
		$this->data_to_map = $data_to_map;
		$this->viewmodel_class = $viewmodel_class;
		$this->entity_class = get_parent_class(new $this->viewmodel_class());
	}
	
	public function map()
	{		
		$entity_properties = array_keys(get_class_vars($this->entity_class));
		$viewmodel_properties = array_keys(get_class_vars($this->viewmodel_class));		
		$properties_to_map = array_diff($viewmodel_properties, $entity_properties);		
		
		$result = array();
		foreach ($this->data_to_map as $row_key=>$row)
		{
			$entity = $this->outlet->getEntityForRowByName($this->entity_class, $row);
			
			// Map entity properties (some kind of upcasting), may be there is a better way?
			$viewmodel = new $this->viewmodel_class();
			foreach ($entity as $key=>$value)
			{
				$viewmodel->$key = $value;
			}		
			
			foreach ($properties_to_map as $prop)
			{
				if (isset($row[$prop]))
				{
					$viewmodel->$prop = $row[$prop];
				}
			}
			
			$result[] = $viewmodel;
		}
		
		return  $result;
	}
}
?>