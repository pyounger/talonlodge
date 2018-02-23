<?php
class App_Model_Common_Photo extends App_Model_Base_Model
{
	public
		$id,
		$filename,
		$extension,
		$type,
		$datetime,
		$gallery_id,
		$priority,
		$title,
		$titlee,
		$title2,
		$description,
		$versions,
		$slideshow_position,
		$alt,
		$atitle,
		$aurl,
		$atarget;

	public function validate(&$errors, $is_edit)
	{
	}
}
?>