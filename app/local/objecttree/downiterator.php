<?php
class App_Local_ObjectTree_DownIterator implements Iterator
{
	private 
		$root = NULL,
		$current = NULL,
		$stack = NULL;
	
	function __construct(App_Local_ObjectTree_Node $root)
	{
		$this->root = $root;
	}
	
	public function rewind() 
	{		
		$this->current = $this->root; 
		$this->stack = array();
		array_push($this->stack, $this->root);		      
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
		foreach ($this->current->nodes as $node)
		{
			array_push($this->stack, $node);
		}
		$this->current = array_pop($this->stack);		
	}

	public function valid() 
	{
		return (!empty($this->stack));
	}
}

?>