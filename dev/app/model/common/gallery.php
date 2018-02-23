<?php
class App_Model_Common_Gallery extends App_Model_Base_Model
{
	public
		$id,
		$title,
		$content_type,
		$description,
		$parent_id,
		$priority,
		$settings,
		$video_settings,
		$classname,
		$cover,
		$is_published,
		$page_id,
		$text_position,
		$type_id;

	public
		$gallerytype;

	public function getApp_Model_GalleryType()
	{
		return $this->gallerytype;
	}

	public function setApp_Model_GalleryType(App_Model_GalleryType $gallerytype)
	{
		$this->gallerytype = $gallerytype;
	}

	public function validate(&$errors, $is_edit)
	{
	}
}
?>