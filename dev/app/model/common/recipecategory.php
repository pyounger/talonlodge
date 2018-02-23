<?php
class App_Model_Common_RecipeCategory extends App_Model_Base_Model
{
	public
		$id,
		$title,
		$slug,
		$type,
		$is_published;

	public function validate(&$errors, $is_edit)
	{
	}
}
?>