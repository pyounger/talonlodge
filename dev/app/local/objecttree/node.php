<?php
class App_Local_ObjectTree_Node
{
    public 
       $data = NULL,
       $parent = NULL,
	   $nodes = array(); 

    public function __construct($data)
    {
  		$this->data = $data;
    }       
    
    public function has_nodes()
    {
    	return !empty($this->nodes);
    }

	public function add_node(App_Local_ObjectTree_Node $node)
    {
		$node->parent = $this;
		$this->nodes[] = $node;     	
		return $node;
    }

	
	public function get_nodes_data()
	{
		$result = array();
		foreach ($this->nodes as $node)
		{
			$result[] = $node->data;
		} 
		return $result;
	}    
	
	public function get_path_from_root()
	{
		$result = array();
		foreach (new App_Local_ObjectTree_UpIterator($this) as $node)
		{
			$result[] = $node;
		}		
		return array_reverse($result);
	}		
    
}

?>