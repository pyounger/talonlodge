<?php
class App_Model_Common_Reservation extends App_Model_Base_Model
{
	public
		$id,
		$first_name,
		$last_name,
		$email,
		$address,
		$city,
		$state,
		$postal,
		$country,
		$phone,
		$fax,
		$arrival_date,
		$departure_date,
		$adults,
		$children,
		$how_did_you_hear,
		$no_of_times,
		$comments,
		$receive_updates,
		$datetime;

	public function validate(&$errors, $is_edit)
	{
	}
}
?>