<?php
class App_Model_Common_LayoutElement extends App_Model_Base_Model
{
	public
		$id,
		$layout_id,
		$page_id,
		$element_type,
		$element_id,
		$layout_position,
		$priority;

	public function validate(&$errors, $is_edit)
	{
	}
}
?>