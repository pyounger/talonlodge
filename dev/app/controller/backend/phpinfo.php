<?php
class App_Controller_Backend_Phpinfo extends App_Controller_Base_Backend
{
	public function action_default()
	{
		ob_start();
		phpinfo();
		$phpinfo = ob_get_contents();
		ob_end_clean();
		$phpinfo = preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $phpinfo);
		$this->assign('phpinfo', $phpinfo);
	}
}

?>