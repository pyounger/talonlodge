<?php

class App_Model_Common_Recipe extends App_Model_Base_Model

{

	public

	$id,

	$title,

	$slug,

	$category_id,

	$serves,

	$prep_time,

	$cook_time,

	$ingredients,

	$directions,

	$nutritional,

	$meal_type,

	$fish_type,

	$technique_type,

	$filename,

	$filename_thumb;



	public function validate(&$errors, $is_edit)

	{

	}

}

?>