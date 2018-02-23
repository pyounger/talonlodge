<?php
/**
 * Form related functions
 * 
 * @static
 * @package app-start
 * @subpackage Utils 
 */
class App_Utils_Form
{
	/**
	 * App_Utils_Form::bind_select()
	 * 
	 * @param array $entities List of entities
	 * @param string $id Name of the ID field in entity object
	 * @param string $title Name of the title field in entity object
	 * @param string $_1st_element If defined the first fake element with ID -1 and title $_1st_element is added to the select 
	 * @return
	 */
	public static function bind_select($entities, $id, $title, $_1st_element = NULL)
	{
		$result = array();
		
		if ($_1st_element !== NULL)
		{
			$result[] = array('id' => cpf_config('APP.FORMS.FAKE_SELECT_VALUE'), 'title' => $_1st_element);
		}
				
		foreach ($entities as $value)
		{			
			if (is_array($value))
			{
				$value = (object) $value;							
			}
		
			$temp['id'] = $value->$id;
			$temp['title'] = $value->$title;
			$result[] = $temp;
		}
		return $result;
	}
}
?>