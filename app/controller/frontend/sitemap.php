<?php
class App_Controller_Frontend_Sitemap extends App_Controller_Base_Frontend
{
	public function action_xml()
	{
		$this->view->assign_header('Content-Type', 'text/xml; charset=utf-8');

		$pages = $this->outlet->from('App_Model_Page')->where('is_published = 1')->find();
		$this->assign('pages', $pages);

		$this->assign('pages_priority', $this->config->value('APP.SITEMAP.PAGES.PRIORITY'));
		$this->assign('pages_changefreq', $this->config->value('APP.SITEMAP.PAGES.CHANGEFREQ'));
	}
}
?>