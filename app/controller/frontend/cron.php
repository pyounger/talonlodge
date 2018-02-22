<?php
class App_Controller_Frontend_Cron extends App_Controller_Base_Frontend
{
	private
		$secret = 'gusgus';

	public function action_default()
	{
		if (isset($this->request->get['secret']) && ($this->request->get('secret') == $this->secret) !== false)
		{
            // update token
            $controller = new App_Controller_Backend_Facebook();
            $controller->action_refresh_token();

			// delete temporary photos
			$controller = new App_Controller_Backend_Photos();
			$count = $controller->action_clear_temp();
			if ($count > 0)
				printf('<p>Temporary photos were deleted: %d.</p>', $count);

			exit();
		}
		else
			$this->give_403();
	}

	private function _log($string)
	{
		printf("%s<br />\n", $string);
	}

}

?>