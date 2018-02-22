<?php
class App_Model_Common_Usertoken extends App_Model_Base_Model
{
	public
		$id,
		$user_id,
		$created,
		$type;

	public function validate(&$errors, $is_edit)
	{
	}
}
?>