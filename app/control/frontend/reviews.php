<?php
class App_Control_Frontend_Reviews extends App_Control_Base_Common
{
	public function run()
	{
        $tripadvisor = $this->outlet->from('App_Model_Review')->where('is_published = 1')->orderBy('`priority` ASC')->limit(2)->find();
        $this->assign('tripadvisor', $tripadvisor);

        $facebook = $this->outlet->from('App_Model_Facebook')->where('is_published = 1')->orderBy('`priority` ASC')->limit(2)->find();
        $this->assign('facebook', $facebook);

        $twitter = $this->outlet->from('App_Model_Twitter')->where('is_published = 1')->orderBy('`priority` ASC')->limit(2)->find();
        $this->assign('twitter', $twitter);
	}
}

?>