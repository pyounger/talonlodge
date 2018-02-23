<?php
function emailToCustomer($email, $password, $name){
    $fromMail = "guestservices@talonlodge.com";
    $subject  = "Talon Lodge Guest Portal Login";
    $message = '<html>
<head>
  <title>[SUBJECT]</title>
</head>
<body>
  [NAME], <br><br>
  
  We are gearing up for a great season and we cannot wait to host you at Talon Lodge! <br><br>
	
        To better serve you and to make sure that we have everything we need to make your Talon Lodge
		trip a great success, we need your help. Please click on the following link and completely 
		fill out the Talon Lodge Guest Profile Form. This form serves as our guide while you are 
		at the lodge and provides us with arrival and departure information, as well as critical
		service requirements. <br><br>
  
  <a href="http://profiles.talonlodge.com/login/login.php">THIS FORM NEEDS TO BE FILLED OUT BY EVERY MEMBER IN YOUR GROUP!</a><br>
	Username=[EMAIL]<br>
	Password=[PASSWORD]<br>
	<br>
     
<a href="http://www.talonlodge.com/planning">When planning your trip to Talon Lodge; this is what you need to know</a>	 
<br><br>
Sincerely,<br>
	Phil & Gwen Younger<br>
	Owners, Talon Lodge<br>
	1-800-536-1864<br>
	guestservices@talonlodge.com<br>
</body>
</html>';

	$message = str_replace("[SUBJECT]",$subject,$message);
	$message = str_replace("[NAME]",$name,$message);
	$message = str_replace("[EMAIL]",$email,$message);
	$message = str_replace("[PASSWORD]",$password,$message);
        
	/*$headers = "From: Talon Lodge <" . strip_tags($fromMail) . ">\r\n";
	$headers .= "Reply-To: ". strip_tags($fromMail) . "\r\n";
	$headers .= "X-Mailer: PHP/" . phpversion() .  "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";  */
	
	// Set headers
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	// $headers .= 'To: Andy Sharp <andy.sharp@stellainternational.com>' . "\r\n"; //note this is same recipient as set above.
	$headers .= 'From: Guest Services <guestservices@talonlodge.com>' . "\r\n";
	//$headers .= 'Cc: andy.sharp@stellainternational.com' . "\r\n";
	$headers .= 'Bcc: ankouny@gmail.com' . "\r\n";
	
	/*$headers =
    'Return-Path: ' . $fromMail . "\r\n" .
    'From: Talon Lodge <' . $fromMail . '>' . "\r\n" .
    'X-Priority: 1 (Highest)' . "\r\n" .
	'X-MSMail-Priority: High\n' . "\r\n" .
	'Importance: High\n' . "\r\n" .
    'X-Mailer: PHP ' . phpversion() .  "\r\n" .
    'Reply-To: Talon Lodge <' . $fromMail . '>' . "\r\n" .
    'MIME-Version: 1.0' . "\r\n" .
    'Content-Transfer-Encoding: 8bit' . "\r\n" .
    'Content-Type: text/plain; charset=UTF-8' . "\r\n";*/
	
	
	@mail($email, $subject, $message, $headers);
	@mail("guestservices@talonlodge.com", $subject, $message, $headers);
	//@mail("phil@magnusadventures.com", $subject, $message, $headers);
	//@mail("gyounger@talonlodge.com", $subject, $message, $headers);
	//@mail("phil@talonlodge.com", $subject, $message, $headers);
	//@mail("ankouny@gmail.com", $subject, $message, $headers);
	//@mail("aqeelashraf@gmail.com", $subject, $message, $headers);
	//@mail("civiebh@gmail.com", $subject, $message, $headers);
}
function emailToGroupLeader($email, $password, $name){
    $fromMail = "guestservices@talonlodge.com";
    $subject  = "Talon Lodge Guest Portal Login";

    $message = '<html>
<head>
  <title>[SUBJECT]</title>
</head>
<body>
  [NAME], <br><br>
  
 There are some profiles left to be filled in your group, so kindly logg in and fill them up.
	<br><br>

	<a href="http://profiles.talonlodge.com/ogin/login.php">CLICK HERE</a><br>
	Username=[EMAIL]<br>
	Password=[PASSWORD]<br>
	<br><br>

	Thanks and let the adventure begin!
<br><br>
Sincerely,<br>
	Phil & Gwen Younger<br>
	Owners, Talon Lodge<br>
	1-800-536-1864<br>
	guestservices@talonlodge.com<br>
</body>
</html>';

	$message = str_replace("[SUBJECT]",$subject,$message);
	$message = str_replace("[NAME]",$name,$message);
	$message = str_replace("[EMAIL]",$email,$message);
	$message = str_replace("[PASSWORD]",$password,$message);
	
	// Set headers
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	// $headers .= 'To: Andy Sharp <andy.sharp@stellainternational.com>' . "\r\n"; //note this is same recipient as set above.
	$headers .= 'From: Guest Services <guestservices@talonlodge.com>' . "\r\n";
	//$headers .= 'Cc: andy.sharp@stellainternational.com' . "\r\n";
	//$headers .= 'Bcc: ankouny@gmail.com' . "\r\n";
        
    /*$headers = "From: Talon Lodge <" . strip_tags($fromMail) . ">\r\n";
	$headers .= "Reply-To: ". strip_tags($fromMail) . "\r\n";
	$headers .= "X-Mailer: PHP/" . phpversion() .  "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; */ 
	
	/*$headers =
    'Return-Path: ' . $fromMail . "\r\n" .
    'From: Talon Lodge <' . $fromMail . '>' . "\r\n" .
    'X-Priority: 1 (Highest)' . "\r\n" .
	'X-MSMail-Priority: High\n' . "\r\n" .
	'Importance: High\n' . "\r\n" .
    'X-Mailer: PHP ' . phpversion() .  "\r\n" .
    'Reply-To: Talon Lodge <' . $fromMail . '>' . "\r\n" .
    'MIME-Version: 1.0' . "\r\n" .
    'Content-Transfer-Encoding: 8bit' . "\r\n" .
    'Content-Type: text/plain; charset=UTF-8' . "\r\n";*/
	
	@mail($email, $subject, $message, $headers);
	@mail("guestservices@talonlodge.com", $subject, $message, $headers);
}
function profile_completed_updated($email, $name, $id, $grp, $comp_upd){
    $fromMail = "guestservices@talonlodge.com";
    $subject  = "Talon Lodge Guest Portal Login";
	$message = '<html>
<head>
  <title>[SUBJECT]</title>
</head>
<body>
  [NAME], <br><br>
	A profile for [NAME] has been [STATUS] online for [GROUP]. Click the link below to view it. <br><br>
	<a href="http://private.talonlodge.com/guests/profile_report.asp?profileid=[GUESTID]">CLICK HERE</a> <br>
	Thanks!
</body>
</html>';
	$message = str_replace("[SUBJECT]",$subject,$message);
	$message = str_replace("[NAME]",$name,$message);
	$message = str_replace("[STATUS]",$comp_upd,$message);
	$message = str_replace("[GROUP]",$grp,$message);
	$message = str_replace("[GUESTID]",$id,$message);
	
	// Set headers
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	// $headers .= 'To: Andy Sharp <andy.sharp@stellainternational.com>' . "\r\n"; //note this is same recipient as set above.
	$headers .= 'From: Guest Services <guestservices@talonlodge.com>' . "\r\n";
	//$headers .= 'Cc: andy.sharp@stellainternational.com' . "\r\n";
	//$headers .= 'Bcc: ankouny@gmail.com' . "\r\n";

    /*$headers = "From: Talon Lodge <" . strip_tags($fromMail) . ">\r\n";
	$headers .= "Reply-To: ". strip_tags($fromMail) . "\r\n";
	$headers .= "X-Mailer: PHP/" . phpversion() .  "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";  */
	
	/*$headers =
    'Return-Path: ' . $fromMail . "\r\n" .
    'From: Talon Lodge <' . $fromMail . '>' . "\r\n" .
    'X-Priority: 1 (Highest)' . "\r\n" .
	'X-MSMail-Priority: High\n' . "\r\n" .
	'Importance: High\n' . "\r\n" .
    'X-Mailer: PHP ' . phpversion() .  "\r\n" .
    'Reply-To: Talon Lodge <' . $fromMail . '>' . "\r\n" .
    'MIME-Version: 1.0' . "\r\n" .
    'Content-Transfer-Encoding: 8bit' . "\r\n" .
    'Content-Type: text/plain; charset=UTF-8' . "\r\n";*/
	
	@mail($email, $subject, $message, $headers);
	@mail("guestservices@talonlodge.com", $subject, $message, $headers);
}
function profile_change_email($email, $name, $password){
    $fromMail = "guestservices@talonlodge.com";
    $subject  = "Talon Lodge Guest Portal Login";

    $message = '<html>
<head>
  <title>[SUBJECT]</title>
</head>
<body>
  [NAME], <br><br>
	There are some profile updates, so kindly logg in and see them.
	<br><br>
	<a href="http://profiles.talonlodge.com/login/login.php">CLICK HERE</a><br>
	Username= [EMAIL]<br>
	Password= [PASSWORD]<br>
</body>
</html>';

	$message = str_replace("[SUBJECT]",$subject,$message);
	$message = str_replace("[NAME]",$name,$message);
	$message = str_replace("[EMAIL]",$email,$message);
	$message = str_replace("[PASSWORD]",$password,$message);

	// Set headers
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	$headers .= 'From: Guest Services <guestservices@talonlodge.com>' . "\r\n";

    /*$headers = "From: Talon Lodge <" . strip_tags($fromMail) . ">\r\n";
	$headers .= "Reply-To: ". strip_tags($fromMail) . "\r\n";
	$headers .= "X-Mailer: PHP/" . phpversion() .  "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";  */
	
	/*$headers =
    'Return-Path: ' . $fromMail . "\r\n" .
    'From: Talon Lodge <' . $fromMail . '>' . "\r\n" .
    'X-Priority: 1 (Highest)' . "\r\n" .
	'X-MSMail-Priority: High\n' . "\r\n" .
	'Importance: High\n' . "\r\n" .
    'X-Mailer: PHP ' . phpversion() .  "\r\n" .
    'Reply-To: Talon Lodge <' . $fromMail . '>' . "\r\n" .
    'MIME-Version: 1.0' . "\r\n" .
    'Content-Transfer-Encoding: 8bit' . "\r\n" .
    'Content-Type: text/plain; charset=UTF-8' . "\r\n";*/
	
    //@mail($sentTo, $subject, $message, $headers);
	@mail($email, $subject, $message, $headers);
	@mail("guestservices@talonlodge.com", $subject, $message, $headers);
	//@mail("gyounger@talonlodge.com", $subject, $message, $headers);
	//@mail("phil@talonlodge.com", $subject, $message, $headers);
	//@mail("ankouny@gmail.com", $subject, $message, $headers);
	//@mail("aqeelashraf@gmail.com", $subject, $message, $headers);
	//@mail("civiebh@gmail.com", $subject, $message, $headers);
}
?>