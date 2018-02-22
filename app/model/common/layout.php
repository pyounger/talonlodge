<?php
class App_Model_Common_Layout extends App_Model_Base_Model
{
	public
		$id,
		$title,
		$template_name,
		$settings,
		$placeholders,
		$grid,
		$freestyle,
		$is_default,
		$is_template;

	public function validate(&$errors, $is_edit)
	{
	}
}
?>