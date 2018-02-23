<?php
class App_Controller_Backend_Help extends App_Controller_Base_BackendSmart
{
	public

	$model = 'App_Model_Help';

/*

Action

*/

public function action_default()
{

	$this->load_entities();


}
public function action_addcontroller()
{

	echo "Hello";
	exit();
}
}
?>