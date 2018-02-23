<?php
class App_Local_ObjectTree_UpIterator implements Iterator
{
	private 
		$node = NULL,
		$current = NULL;
	
	function __construct(App_Local_ObjectTree_Node $node)
	{
		$this->node = $node;
	}
	
	public function rewind() 
	{		
		$this->current = $this->node;       
	}

	public function current() 
	{
    	return $this->current;
	}

	public function key() 
	{
		return $this->current->data;
	}

	public function next() 
	{
		$temp = $this->current;
		$this->current = $this->current->parent; 		 
	}

	public function valid() 
	{
		return ($this->current != NULL);
	}
}

?>