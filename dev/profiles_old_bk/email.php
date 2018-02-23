<?php

//phpinfo();exit;
error_reporting(E_ALL ^ E_NOTICE); 
ini_set("display_errors", 1);

$to      = 'ankouny@gmail.com';
$subject = 'This is a test.';
$message = 'Hello World.';
$headers = 'From: guestservices@talonlodge.com' . "\r\n" .
    'Reply-To: guestservices@talonlodge.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers)) {

   echo "Mail Sent Successfully.";

} else {

   echo "Mail Not Sent!";

}

?>