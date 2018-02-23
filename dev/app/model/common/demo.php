<?php
class App_Model_Common_Demo extends App_Model_Base_Model
{
	public
	$id,
	$title,
	$description,
	$main_image,
	$private_bedroom_image,
	$three_bedroom_image,
	$private_bedroom_small_image,
	$threee_bedroom_small_image,
	$priority,
	$is_published,
	$private_bedroom_title,
	$three_bedroom_title,
	$main_image_alt,
	$private_bedroom_image_alt,
	$three_bedroom_image_alt,
	$url_private,
	$url_three;

	public function validate(&$errors, $is_edit)
	{
	}
}
?>