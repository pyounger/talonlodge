<?php
class App_Model_Common_Usergroup extends App_Model_Base_Model
{
	public
		$id,
		$title,
		$level,
		$is_active;

	public
		$users;

	function __construct()
	{
		parent::__construct();
		$this->users = new Collection();
	}

	public function getApp_Model_Users()
	{
		return $this->users;
	}

	public function setApp_Model_Users(Collection $users)
	{
		$this->users = $users;
	}

	public function addApp_Model_User(App_Model_User $user)
	{
		$this->users[] = $user;
	}

	public function validate(&$errors, $is_edit)
	{
	}
}
?>