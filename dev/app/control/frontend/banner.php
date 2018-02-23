<?php
class App_Control_Frontend_Banner extends App_Control_Base_Common
{
	public function run()
	{
		$dt = date('Y-m-d H:i:s');
		$banner =  $this->outlet->from('App_Model_Banner')->where('is_published = 1 AND start_date < ? AND finish_date > ? AND flag = 0', array($dt, $dt))->orderby('last_show_date ASC, priority ASC')->find();




		// $banner = $this->outlet->from('App_Model_Banner')->where('is_published = 1 AND start_date < ? AND finish_date > ? AND flag = 0', array($dt, $dt))->orderby('last_show_date ASC, priority ASC')->findOne();






		$this->assign('banner', $banner);
		
	}
}

?>