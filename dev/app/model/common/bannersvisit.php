<?php
class App_Model_Common_BannersVisit extends App_Model_Base_Model
{
	public
		$id,
		$month,
		$banner_id,
		$shows,
		$clicks;

	public function validate(&$errors, $is_edit)
	{
	}
}
?>