<?php
class App_Model_Common_GalleryType extends App_Model_Base_Model
{
	public
		$id,
		$title,
		$image_settings,
		$video_settings,
		$display_type;

	public function validate(&$errors, $is_edit)
	{
	}
}
?>