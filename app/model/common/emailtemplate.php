<?php
class App_Model_Common_EmailTemplate extends App_Model_Base_Model
{
	public
		$id,
		$title,
		$subject,
		$body,
		$variables,
		$code,
		$values;

	public function validate(&$errors, $is_edit)
	{
	}
}
?>