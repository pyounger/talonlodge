<?php
class App_Model_Common_Message extends App_Model_Base_Model
{
	public
		$id,
		$datetime,
		$first_name,
		$last_name,
		$email,
		$message,
		$ip;

	public function validate(&$errors, $is_edit)
	{
	}
}
?>