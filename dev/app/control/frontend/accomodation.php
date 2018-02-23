<?php
class App_Control_Frontend_Accomodation extends App_Control_Base_Common
{
	public function run()
	{
		$accomodations = $this->outlet->from('App_Model_Accomodation')->where('is_published = 1')->orderBy('priority ASC')->find();
		$this->assign('data', $accomodations);
	}
}

?>