<?php
class App_Model_Common_User extends App_Model_Base_Model
{
	public
		$id,
		$login,
		$password,
		$name,
		$group_id;

	public
		$usergroup;

	public function getApp_Model_Usergroup()
	{
		return $this->usergroup;
	}

	public function setApp_Model_Usergroup(App_Model_Usergroup $usergroup)
	{
		$this->usergroup = $usergroup;
	}

	public function validate(&$errors, $is_edit)
	{
	}
}
?>