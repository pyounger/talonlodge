<?php
class App_Model_NavigationMenuElementTree
{
	public
		$tree,
		$entity,
		$id;

	private
		$outlet,
		$config;

	public function __construct($id, $visible = true)
	{ 
		$this->outlet = Outlet::getInstance();
		$this->config = Cpf_Core_Config::get_instance();
		$this->id = $id;
		$this->_load_tree($visible); 
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
	private function _load_tree($visible)
	{
		// Loading all items
		if ($visible)
			$items = $this->outlet->from('App_Model_NavigationMenuElement')->where('menu_id = ? AND is_published = 1', array($this->id))->orderBy('parent_id ASC, priority ASC')->find();
		else
			$items = $this->outlet->from('App_Model_NavigationMenuElement')->where('menu_id = ?', array($this->id))->orderBy('parent_id ASC, priority ASC')->find();

		// Loading root item
		$root_item = new App_Model_NavigationMenuElement();
		$root_item->level = 0;
		$root_item->title = t('backend.navigation.root_menu_item');
		$root_item->remove_linked_objects();

		// Creating tree		
		$this->tree = new App_Model_NavigationMenuElementTreeRoot($root_item);
		
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
		$iteration = 0;
		foreach ($items as $key => $item)
		{
			if ($item->parent_id == $node->data->id)
			{
                $item->remove_linked_objects();
				
				// level
                $item->level = $node->data->level + 1;
				$item->first_on_level = $iteration == 0;
				$item->last_on_level = !isset($items[$key+1]) || (isset($items[$key+1]) && $items[$key+1]->parent_id != $item->parent_id);
				$iteration++;
				
				// attributes
				$item->attributes_array = array();
				$_attributes = explode(',', $item->attributes);
				foreach ($_attributes as $_attribute)
				{
					$_attribute_parts = explode('=', $_attribute);
					if (count($_attribute_parts) > 1)
					{
						//$item->attributes_array[$_attribute_parts[0]] = substr(str_replace('&quot;', '"', $_attribute_parts[1]), 1, strlen($_attribute_parts[1])-1);
						$item->attributes_array[$_attribute_parts[0]] = str_replace('&quot;', '', $_attribute_parts[1]);
					}
				}

				$inserted_node = $node->add_node(new App_Local_ObjectTree_Node($item));
				$list[] = $inserted_node;
				$this->_add_items($inserted_node, $items, $list);
			}
		}
	}
}
?>