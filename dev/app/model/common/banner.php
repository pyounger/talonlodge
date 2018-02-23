<?php
class App_Model_Common_Banner extends App_Model_Base_Model
{
	public
		$id,
		$title,
		$start_date,
		$finish_date,
		$priority,
		$is_published,
		$shows_count,
		$clicks_count,
		$filename,
		$extension,
		$url,
		$flag,
		$last_show_date;

	public function validate(&$errors, $is_edit)
	{
	}
}
?>