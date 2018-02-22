<?php
class App_Model_Common_Page extends App_Model_Base_Model
{
	public
		$id,
		$parent_id,
		$is_category,
		$title,
		$content,
		$is_published,
		$priority,
		$slug,
		$type,
		$component,
		$route_name,
		$route_value,
		$layout_id,
		$seo_title,
		$seo_keywords,
		$seo_description,
		$seo_robots,
		$is_template;

	public function validate(&$errors, $is_edit)
	{
	}
}
?>