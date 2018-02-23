<?php
/**
 * Wrapper around PHPMailer functions  
 * 
 * @static
 * @package CPF
 * @subpackage Utils 
 */
class Cpf_Utils_Mail
{
	/**
	 * Sends plain-text e-mail. The e-mail settings in config are honored.
	 *
	 * @static 
	 * @param string $to Name of mail recipient
	 * @param string $to_address E-mail address of recipient
	 * @param string $subject E-mail subject
	 * @param string $body E-mail body text
	 * @param array $cc Carbon copy E-mail [optional]
	 * @return void
	 */
	public static function send($to, $to_address, $subject, $body, $cc = array())
	{	
		$config = Cpf_Core_Config::get_instance();
		if ($config->value('MAIL.MAILER_ENABLED'))
		{
			try
			{
				$mailer = new PHPMailer(true);
				$mailer->CharSet = $config->value('MAIL.MAILER_CHARSET');
				$mailer->Mailer = $config->value('MAIL.MAILER_METHOD');
				
				if ($mailer->Mailer === 'smtp')
				{
					$mailer->Host = $config->value('MAIL.MAILER_SMTP_HOST');
					$mailer->Port = $config->value('MAIL.MAILER_SMTP_PORT');
					$mailer->SMTPAuth = TRUE;
					$mailer->Username = $config->value('MAIL.MAILER_SMTP_LOGIN');
					$mailer->Password = $config->value('MAIL.MAILER_SMTP_PASSWORD');
				}
				
				$mailer->Body = $body;
				$mailer->From = $config->value('MAIL.MAILER_FROM');
				$mailer->FromName = t($config->value('MAIL.MAILER_FROM_NAME'));
				$mailer->Subject = $subject;
				$mailer->AddAddress($to_address, $to);

				if (!empty($cc) && is_array($cc))
				{
					foreach ($cc as $address)
					{
						$mailer->AddCC($address[0], $address[1]);
					}
				}

				@$mailer->Send();
			}
			catch (phpmailerException $e) 
			{
				echo $e->errorMessage();
			}
			catch (Exception $e) 
			{
				echo $e->getMessage();
			}
		}
	}

	/**
	 * Cpf_Utils_Mail::send_html()
	 * 
	 * @static
	 * @param string $to Recipient name
	 * @param string $to_address Recipient e-mail address
	 * @param string $subject Subject
	 * @param string $body Body in HTML
	 * @param array $cc Carbon copy E-mail [optional]
	 * @param array $attachments Attachments to e-mail (<samp>AddAttachment()</samp> is called) [optional]
	 * @param array $embedded Embedded images (<samp>AddEmbeddedImage()</samp> is called) [optional]
	 * @param array $string_attachments Base64-encoded atachments (<samp>AddStringAttachment()</samp> is called) [optional]
	 * @return void
	 */
	public static function send_html($to, $to_address, $subject, $body, $cc = array(), $attachments = array(), $embedded = array(), $string_attachments = array())
	{
		$config = Cpf_Core_Config::get_instance();
		if ($config->value('MAIL.MAILER_ENABLED'))
		{
			try
			{
				$mailer = new PHPMailer(true);
				$mailer->CharSet = $config->value('MAIL.MAILER_CHARSET');
				$mailer->Mailer = $config->value('MAIL.MAILER_METHOD');
				
				if ($mailer->Mailer === 'smtp')
				{
					$mailer->Host = $config->value('MAIL.MAILER_SMTP_HOST');
					$mailer->Port = $config->value('MAIL.MAILER_SMTP_PORT');
					$mailer->SMTPAuth = TRUE;
					$mailer->Username = $config->value('MAIL.MAILER_SMTP_LOGIN');
					$mailer->Password = $config->value('MAIL.MAILER_SMTP_PASSWORD');
				}

				$mailer->MsgHTML($body);
				$mailer->AltBody = t("To view the message, please use an HTML compatible email viewer!");

				//CC
				if (!empty($cc) && is_array($cc))
				{
					foreach ($cc as $address)
					{
						$mailer->AddCC($address[0], $address[1]);
					}
				}

				//attachments
				if (!empty($attachments) && is_array($attachments))
				{
					foreach ($attachments as $attachment)
					{
						$mailer->AddAttachment($attachment);
					}
				}

				//embedded images
				if (!empty($embedded) && is_array($embedded))
				{
					foreach ($embedded as $embed)
					{
						$mailer->AddEmbeddedImage($embed['path'], $embed['cid'], $embed['name']);
					}
				}

				//string attachments
				if (!empty($string_attachments) && is_array($string_attachments))
				{
					foreach ($string_attachments as $attachment)
					{
						$mailer->AddStringAttachment($attachment[0], $attachment[1], $attachment[2], $attachment[3]);
					}
				}

				$mailer->From = $config->value('MAIL.MAILER_FROM');
				$mailer->FromName = $config->value('MAIL.MAILER_FROM_NAME');
				$mailer->Subject = $subject;
				$mailer->AddAddress($to_address, $to);
				@$mailer->Send();
			}
			catch (phpmailerException $e) 
			{
				echo $e->errorMessage();
			}
			catch (Exception $e) 
			{
				echo $e->getMessage();
			}
		}
	}
}
?>