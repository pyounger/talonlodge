<?php
class App_Model_Common_NavigationMenu extends App_Model_Base_Model
{
	public
		$id,
		$title,
		$key,
		$has_em,
		$use_background_image,
		$is_dropdown,
		$attributes;

	public function validate(&$errors, $is_edit)
	{
	}
}
?>