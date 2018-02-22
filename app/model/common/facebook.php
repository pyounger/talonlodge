<?php
class App_Model_Common_Facebook extends App_Model_Base_Model
{
	public
		$id,
		$title,
		$content,
		$key,
		$date,
		$priority,
		$is_published;

	public function validate(&$errors, $is_edit)
	{
	}
}
?>