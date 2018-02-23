<?php

// recipients
$to  = 'Phil Younger <phil@magnusadventures.com>';

// Set headers
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
// $headers .= 'To: Andy Sharp <andy.sharp@stellainternational.com>' . "\r\n"; //note this is same recipient as set above.
$headers .= 'From: Guest Services <guestservices@talonlodge.com>' . "\r\n";
$headers .= 'Cc: andy.sharp@stellainternational.com' . "\r\n";
$headers .= 'Bcc: ankouny@gmail.com' . "\r\n";

// Variables
$subject = 'Talon Lodge Profile Form for your Trip';
$to_name = "Cole Younger";
$to_email = "cole@whateveremail.com";
$to_password = "123456789";

// construct message.  Make sure HTML doesn't go past 70 chars per line, particularly with links.
$original_message = '
<html>
<head>
  <title>[SUBJECT]</title>
</head>
<body>
  [NAME], <br><br>

        We\'re gearing up for a great season and we can\'t wait to host you at Talon Lodge! <br><br>
	
        To better serve you and to make sure that we have everything we need to make your Talon Lodge
		trip a great success, we need your help. Please click on the following link and completely 
		fill out the Talon Lodge Guest Profile Form. This form serves as our guide while you are 
		at the lodge and provides us with arrival and departure information, as well as critical
		service requirements. <br><br>
        
        
	<a href="http://profiles.talonlodge.com/login/login.php">THIS FORM NEEDS TO BE FILLED OUT BY EVERY MEMBER IN YOUR GROUP!</a><br>
	Username= [EMAIL]<br>
	Password= [PASSWORD]<br>
	<br>
        
	If you are the group leader or planner, you have two options: <br>
	&nbsp; &nbsp; 1. Fill out the profile form for every member in your group, or <br>
        &nbsp; &nbsp; 2. Enter the name and e-mail address for each guest in your group, then hit the
		send icon to invite them to fill out their own profile
	<br><br>
        
	If you are a guest of a group this username and password allows you to fill out your own profile. <br><br>
        
        When planning your trip to Talon Lodge; this is what you need to know: 	<br><br>
        
        <strong>PACK LIGHT</strong - We\'ll have almost everything you will need! <br><br>
        
        What to bring... <br>
        
        Thanks to the Pacific Ocean\'s Japanese current that flows near our shores, Sitka enjoys a 
		moderate climate year-round. Summer temperatures reach an average high of 57-68 degrees and
		an average low of 46-55 degrees Fahrenheit. That means sweaters and sweatshirts are in order
		along with a jacket for the evenings. There\'s no need to bring your fishing tackle. We\'ll 
		provide everything for you. If there\'s one item of equipment you\'ll want to be sure to 
		bring, it is a camera. You\'ll want to capture this amazing experience on film to share 
		with family, friends, and colleagues back home. <br><br>
        
        And don\'t forget your sunglasses ... You\'ll enjoy more daylight in the summer months
		in Alaska, with the amount of daylight in July averaging 18.5 hours per day. <br><br>
        
        We recommend that you pack your slippers...<br>
Lounging in the Lodge and in your guest accommodations is much more enjoyable when you are wearing
 a comfortable pair of slippers or house shoes. <br><br>

        Arriving in Sitka...<br>
Your adventure will begin the moment you arrive in Sitka. You will be greeted at Rocky Gutierrez 
International Airport and transported via private van and boat to our private island,
 just 15 minutes away. <br><br>

        Make sure that you have your fishing license...<br>
There are two ways to purchase your fishing license. One of the easiest ways is to visit 
the Alaska Department of Fish & Game web site and purchase your license on-line. The direct
 link for this method is: 
 <a href="https://www.admin.adfg.state.ak.us/buyonline">https://www.admin.adfg.state.ak.us/buyonline</a>
 You will want to do this prior to your arrival date and remember to bring the license with you. <br><br>

        For more information on what to bring and what to expect during your stay at Talon 
		Lodge, please click on the following links: <br><br>
        
	 <a href="http://www.talonlodge.com/whattobring">What to Bring</a><br>
	 <a href="http://www.talonlodge.com/activities">Activities & Cost</a><br>
	 <a href="http://www.talonlodge.com/fishprocessing">Fish Processing</a><br>
	 <a href="http://www.talonlodge.com/gratuities">Gratuities Guidelines</a>
	<br><br>
        
        Trip Planning Assistance...<br>
Our guest relations manager will be reviewing your profile form and ensuring that all of your 
requests are taken care of prior to your visit. Based on your information and any special
 excursions you request, you may be receiving a call from a Talon representative to confirm
 your itinerary. You can also call us at any time at 1-800-536-1864.  <br><br>

	Planning an Alaskan fishing adventure is certainly exciting, but NOTHING can compare 
	to experiencing the real thing. We\'re looking forward to welcoming you to Talon Lodge. <br>
	Thanks and let the adventure begin!
	<br><br>
        
	Sincerely,<br>
	Phil & Gwen Younger<br>
	Owners, Talon Lodge<br>
	1-800-536-1864<br>
	info@talonlodge.com<br>
</body>
</html>
';

$message = '

<html>
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
	Username= [EMAIL]<br>
	Password= [PASSWORD]<br>
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
$message = str_replace("[NAME]",$to_name,$message);
$message = str_replace("[EMAIL]",$to_email,$message);
$message = str_replace("[PASSWORD]",$to_password,$message);




if(mail($to,$subject , $message, $headers)) {

   echo "Mail Sent Successfully.";
   echo "<br>$to<br>$subject<br>$headers<br>$message";

} else {

   echo "Mail Not Sent!";

}

?>