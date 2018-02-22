<?php
class App_Control_Frontend_Menu extends App_Control_Base_Common
{
	public function run()
	{
		if (($key = $this->param('key')) !== FALSE && !is_null($menu = $this->outlet->from('App_Model_NavigationMenu')->where('`key` = ?', array($key))->findOne()))
        {
            $elements = new App_Model_NavigationMenuElementTree($menu->id);
            $this->assign('elements', $elements->tree->list);
            $this->assign('menu', $menu);

			// default options
			$options = array(
				'level' => 0,
				'em' => false,
				'bg' => false,
				'attributes' => array(),
				'custom_layout' => null
			);
			
			// extend options
            foreach($this->params as $key => $value)
            {
                $options[$key] = $value;
            }


			// assign options
            foreach($options as $key => $value)
			{
				$this->assign($key, $value);
			}
        }
	}
}
?>