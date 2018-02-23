<?php
class App_Model_GalleryTree
{
	public
		$tree,
		$entity,
		$id;

	private
		$outlet,
		$config;

	public function __construct($id = null)
	{ 
		$this->outlet = Outlet::getInstance();
		$this->config = Cpf_Core_Config::get_instance();
		$this->_load_tree();
	}

	public function find_first($field, $value)
	{
		foreach (new App_Local_ObjectTree_DownIterator($this->tree) as $node)
		{
			if ($node->data->$field == $value)
			{
				return $node;				
			}
		}		
		return NULL;
	}
	
	public function get_children_field($start_node, $field, $exclude_hidden = FALSE)
	{
		$result = array(); 
		foreach (new App_Local_ObjectTree_DownIterator($start_node) as $node)
		{
			$result[] = $node->data->{$field};
		}		
		return $result;
	}

/*
	Private
*/
	private function _load_tree()
	{
		// Loading all items
		$items = $this->outlet->from('App_Model_Gallery')->with('App_Model_GalleryType')->orderBy('parent_id ASC, priority ASC')->find();

		// Loading root item
		$root_item = new App_Model_Gallery();
		$root_item->level = 0;
		$root_item->title = t('backend.galleries.root_menu_item');
		$root_item->remove_linked_objects();

		// Creating tree		
		$this->tree = new App_Model_GalleryTreeRoot($root_item);
		
		// Adding root to list
		$this->tree->list[] = $this->tree;

		// Build tree from DB entities
		$this->_add_items($this->tree, $items, $this->tree->list);
	}

/*
	TODO: 
		Move this recursive method to non-recursive iterator
		I gave up converting this to equal iterator: http://myarch.com/treeiter/traditways
		
		$node 		-- node to process
		$items 	    -- list of items from DB
		$list		-- list to place flattened tree to
*/
	private function _add_items($node, &$items, &$list)
	{
		foreach ($items as $key => $item)
		{
			if ($item->parent_id == $node->data->id)
			{
                $item->remove_linked_objects();
                $item->level = $node->data->level + 1;
				$inserted_node = $node->add_node(new App_Local_ObjectTree_Node($item));
				$list[] = $inserted_node;
				$this->_add_items($inserted_node, $items, $list);
			}
		}
	}
}
?>