<?php
class App_Model_Common_Accomodation extends App_Model_Base_Model
{
	public
		$id,
		$title,
		$description,
		$one_bedroom_description,
		$two_bedroom_description,
		$main_image,
		$one_bedroom_image,
		$two_bedroom_image,
		$one_bedroom_small_image,
		$two_bedroom_small_image,
		$one_bedroom_popup_description,
		$two_bedroom_popup_description,
		$one_popup_image_description,
		$two_popup_image_description,
		$priority,
		$is_published,
		$one_bedroom_title,
		$two_bedroom_title,
		$one_popup,
		$two_popup,
		$main_image_alt,
		$one_bedroom_image_alt,
		$two_bedroom_image_alt,
		$one_bedroom_small_image_alt,
		$two_bedroom_small_image_alt,
		$url_one,
		$url_two;

	public function validate(&$errors, $is_edit)
	{
	}
}
?>