<?php
class App_Model_Common_Video extends App_Model_Base_Model
{
	public
		$id,
		$gallery_id,
		$title,
		$description,
		$url,
		$type,
		$settings,
		$filename,
		$service_id,
		$width,
		$height,
		$page_id;

	public function validate(&$errors, $is_edit)
	{
	}
}
?>