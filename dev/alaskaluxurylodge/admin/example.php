<?php
require("send-mail/loadsmtp.php");
$ishtml=true;
$reply_to="gourab.singha@gmail.com";
$reply_name="Gourab Singha";
$from_name="Gourab Singha";	
$subject="This Is Subject";
$resipent_address="nishant.chawla@kindlebit.com";
$htmlcontent="<b>This Is test Message</b>";
send_mail();



?>
