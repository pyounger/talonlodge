<?php
class App_Model_Common_RecipesInCategory extends App_Model_Base_Model
{
	public
		$id,
		$recipe_id,
		$category_id;

	public function validate(&$errors, $is_edit)
	{
	}
}
?>