<?php
class App_Model_Common_City extends App_Model_Base_Model
{
	public
		$id,
		$city_name,
		$longitude,
		$latitude,
		$province_id,
		$province_name,
		$country_id,
		$country_name;

	public function validate(&$errors, $is_edit)
	{
	}
}
?>