<?php
class App_Controller_Frontend_Brochure extends App_Controller_Base_Frontend
{
	public $errors;
	public function action_default()
	{
        $this->_assign_countries();
        $this->_assign_states();

        if ($this->request->is_post)
        {
            $result = false;
            if ($this->_validate())
            {
				if ($this->_validate_captcha())
				{
					$url = 'http://www.magnusadventures.com/ebrochure/process.aspx';

					$ch = curl_init();

					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_POST, 1);
					$post_string = array();
					foreach ($this->request->post as $key => $value)
						$post_string[] = sprintf('%s=%s', $key, urlencode($value));
					$post_string = implode('&', $post_string);

					curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);

					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$response = curl_exec ($ch);
					curl_close ($ch);
					$pos = strpos($response, '<h1>Object Moved</h1>');
					$result = $pos !== false;
					$result = 1;
					if ($result)
					{
						$params = array('abs' => true);
						$this->view = new Cpf_Core_View_Redirect(sprintf('%s?success=1', $this->router->link('frontend_brochure', $params)));
					}
				}
				else
				{
                    if ($this->request->is_ajax)
                    {
                        $this->view = new Cpf_Core_View_Json();
                    }
					$this->assign('cpf_errors', $this->errors);
					foreach ($this->request->post as $key => $value)
                    {
                        $this->assign($key, $value);
                    }
				}
            }
            else
            {
                $this->assign('cpf_errors', $this->errors);
            }
        }
        if (($success = $this->request->get('success')) !== FALSE)
            $this->assign('success', 1);
	}

    public function action_get_cities()
    {
        if (($id = $this->request->params('id')) !== FALSE)
        {
            $cities = $this->_load_cities($id);
            $cities_json = array();
            foreach ($cities as $city)
            {
                $cities_json[] = array(
                    'id' => $city->id,
                    'title' => $city->city_name
                );
            }
            $this->view = new Cpf_Core_View_Json();
            $this->assign('cities', $cities_json);
        }
        else
        {
            $this->give_404();
        }
    }

    private function _assign_countries()
    {
        $countries = array();
        $temp = $this->outlet->query('SELECT DISTINCT(`country_name`), `country_id` FROM {App_Model_City} ORDER BY `country_name` ASC');
        $temp = $temp->fetchAll(PDO::FETCH_ASSOC);
        foreach ($temp as $t)
        {
            $countries[ ] = array(
                'id' => $t['country_id'],
                'title' => $t['country_name']
            );
        }
        $this->assign('countries', $countries);
    }

    private function _assign_states()
    {
        $states = $this->outlet->from('App_Model_State')->orderBy('title ASC')->find();
        $this->assign('states', App_Utils_Form::bind_select($states, 'code', 'title'));
    }

    private function _load_cities($country_id)
    {
        return $this->outlet->from('App_Model_City')->where('`country_id` = ?', array((int)$country_id))->orderBy('`city_name` ASC')->find();
    }

    private function _validate()
    {
        foreach ($this->request->post as $k => $v)
        {
            $this->assign($k, $v);
        }

        if (($first_name = $this->request->post('txtFirstName')) === FALSE || empty($first_name))
        {
            $this->errors[] = 'Please enter your First Name';
        }
        if (($last_name = $this->request->post('txtLastName')) === FALSE || empty($last_name))
        {
            $this->errors[] = 'Please enter your Last Name';
        }
        if (($email = $this->request->post('txtEmail')) === FALSE || empty($email))
        {
            $this->errors[] = 'Please enter your e-mail';
        }
        elseif (!App_Utils_Validation::is_valid_email($email))
        {
            $this->errors[] = 'Please enter a valid e-mail address';
        }
        return count($this->errors) == 0;
    }
	
	private function _validate_captcha()
	{
		if (isset($_SESSION['captcha']) && $_SESSION['captcha'] !== $this->request->post('captcha'))
		{
			$this->errors[] = t('frontend.contacts.invalid_captcha');
		}
		return count($this->errors) == 0;
	}
	
}
?>