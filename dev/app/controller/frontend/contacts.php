<?php

class App_Controller_Frontend_Contacts extends App_Controller_Base_Frontend

{

	public $errors;

	public function action_default()

	{

        // feedback

		$form_helper = new App_Local_Form_Helper('App_Model_Message', $this->request, $this->view);

		if ($this->request->is_post)

		{

			if ($form_helper->validate())

			{

				if ($this->_validate_captcha())

				{

					$message = $form_helper->fill();

					$message->datetime = new DateTime();

                    if (($ip = $this->request->server('REMOTE_ADDR')) !== FALSE)

                    {

                        $message->ip = $ip;

                    }

                   

                    /*..............added to send form data to magnus lead(Parvez)............*/

                    $url = 'http://www.magnusadventures.com/magnus/app/public/byoa/ma_Contact_Log_Inquiry_Edit.asp';
					$post = array(

						
						'directory_name' => "Talon Lodge & Spa - Alaska Fishing Resort",
						'directory_email' => 'phil@talonlodge.com',
						'ocdTFaccount_id' => '7',
						'package_name' => null,
						'ocdTFpartner' => '',
						'pms_package_id' => null,
						'arrival_date' => null,
						'Num_Adults' => null,
						'UnitPrice' => null,
						'lodge_phone' =>"800-536-1864",
						'ocdTFFirst_Name' => $message->first_name,
						'ocdTFLast_Name' => $message->last_name,
						'ocdTFemail' => $message->email,
						'ocdTFphone' => null,
						'ocdTFcomments' => $message->message,

						'ocdEditSave' => 'True',
						'ocdEditSave.X' => '74',
						'ocdEditSave.Y' => '13',
						);
					//echo '<br/>name==>'.


					$ch = curl_init();

					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_POST, 1);
					$post_string = array();
					foreach ($post as $key => $value)
						$post_string[] = sprintf('%s=%s', $key, urlencode($value));
					$post_string = implode('&', $post_string);
					$_SESSION["post_string"] =  $post_string;
					curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$response = curl_exec ($ch);
					curl_close ($ch);

                    /*......................sending lead to magnus(Parvez)....................*/

                    /*............added to send form data to Salesforce(Parvez)...............*/

                    $firstNamesf = $message->first_name;		
					$lastNamesf = $message->last_name;		
					$emailsf = $message->email;
					//$phonesf = $this->request->post('phone');
					$commentsf = $message->message;
					$commentsf = str_replace(" ","%20",$commentsf);

					$salesForceUrl =   'https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF&first_name='.$firstNamesf.'&last_name='.$lastNamesf.'&email='.$emailsf.'&description='.$commentsf.'&00N5000000ASX1U=1&oid=00D300000000HQz&retURL=http://www.magnusadventures.com/ebrochure/thanks.aspx';

					$chsf = curl_init();
					curl_setopt($chsf, CURLOPT_URL, $salesForceUrl);
					curl_setopt($chsf, CURLOPT_HEADER, 0);

					curl_exec($chsf);
					curl_close($chsf);


                    /*...........................End Salesforce(Parvez).......................*/

					$this->outlet->save($message);   //..save to TalonBackend

					$this->assign('message', $message);


					$name = $message->first_name;

					if (!empty($message->last_name))

					$name .= ' ' . $message->last_name;


					// customer

					Cpf_Utils_Mail::send_html(

						$name,

						$message->email, 

						'Talon Lodge Inquiry or Question Sent',

						$this->view->fetch('mail/request.tpl'));



					// admin

					sleep(1);

					

					Cpf_Utils_Mail::send_html(

						'', 

						$this->config->value('APP.MAIL.EMAIL.INFO'),

                        'Customer Inquiry or Question',

						$this->view->fetch('mail/admin_request.tpl'));

						

					sleep(1);



					Cpf_Utils_Mail::send_html(

						'', 

						$this->config->value('APP.MAIL.EMAIL.INFO2'),

                        'Customer Inquiry or Question',

						$this->view->fetch('mail/admin_request.tpl'));

					

                    if ($this->request->is_ajax)

                    {

                        $this->view = new Cpf_Core_View_Json();

                        $this->assign('success', true);

                    }

                    else

                    {

                        $this->view = new Cpf_Core_View_Redirect(sprintf('%s?success=1', $this->router->link('frontend_contacts', array('abs' => true))));

						$this->assign('success', true);

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

		}

        if (($success = $this->request->get('success')) !== FALSE)

            $this->assign('success', true);

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