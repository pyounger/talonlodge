<?php
class App_Model_Common_NavigationMenuElement extends App_Model_Base_Model
{
	public
		$id,
		$menu_id,
		$parent_id,
		$title,
		$type,
		$url,
		$target,
		$attributes,
		$slug,
		$priority,
		$page_id,
		$component,
		$filename,
		$extension,
		$is_published;

	public function validate(&$errors, $is_edit)
	{
	}
}
?>