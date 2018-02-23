<?php include "header.php"; ?>
<script type="text/javascript">

function validate()
{
	var name = document.getElementById('name').value;
	var email = document.getElementById('email').value;
	var country = document.getElementById('country').value;
	var phone = document.getElementById('phone').value;
	var subject = document.getElementById('subject'.value);
	var msg = document.getElementById('msg').value;
	var email1 = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	var numericExpression = /^[0-9]+$/;
	var submit1 = document.getElementById('submit1'.value);
	
	if(name == "")
	{
		alert("please enter your name");
		return false;
	}
	if(email == "" || !email.match(email1))
	{
		alert("please enter valid email");
		return false;
	}
	if(country== "")
	{
		alert("Please enter Country Name");
		return false;
	}
	
	if(phone == "" || !phone.match(numericExpression))
	{
		alert("please enter valid number");
		return false;
	}
	if(subject == "")
	{
		alert("please enter subject!!");
		return false;
	}
	if(msg == "")
	{
		alert("please type Message!!");
		return false;
	}
				
	else
	{
		alert('mail has been sent');
		return true;
	}
	
	
	
}

</script>


<?php 
error_reporting(0);
if($_POST['submit1'])
{

              $a=$_POST['name'];
			  
			  $b=$_POST['email'];

				$c=$_POST['country'];

				$d=$_POST['phone'];

				$e=$_POST['subject'];

				$f=$_POST['msg'];
												
			

$sub="<!--<span class='blue-text'><br/>Thanks for your submission.  Someone on our team will be getting back to you shortly.<br/>
All the best,<br/>Harry Project
</span>-->";
$subject = "Query From project";

$headers = "From: <http://www.61server.com>\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$msg="<table width='40%'>";

$msg.="<tr><th>name</th><td>".$a."</td></tr>";
$msg.="<tr><th>email</th><td>".$b."</td></tr>";
$msg.="<tr><th>country</th><td>".$c."</td></tr>";
$msg.="<tr><th>phone</th><td>".$d."</td></tr>";

$msg.="<tr><th>subject</td><th>".$e."</td></tr>";

$msg.="<tr><th>msg</th><td>".$f."</td></tr>";
$msg="</table>";

$to="munishsharmas@yahoo.com";
mail($to, $subject, $msg, $headers);
}

echo $sub;


?>



<div class="mid_part">

<div class="mid_left">
<div class="left_top"><img src="images/contact.png" /></div>

<div class="contact_left"><img src="images/contact_left.png" /></div>



</div>
<form name="signup" action="contact.php" id="regform" method="post" onsubmit="return validate();" >
<div class="contact_right">
<div class="get_touch">Get in touch</div>
<div class="contact_top">
<div class="contact_first">

<input type="text" name="name" id="name" class="first_input" size="34"  placeholder="Mark" />

<input type="text"  name="email" id="email" class="second_input"  size="34" placeholder="Email Id" />

<input type="text"   name="country" id="country" size="34" class="second_input" placeholder="Country" />



</div>
<div class="contact_first">

<input type="text"  name="phone"  id="phone" size="34" class="third_input" placeholder="Phone no." />

<input type="text"  name="subject" id="subject" size="34" class="second_input" placeholder="Subject" />

</div>
<div class="contact_first">

<textarea name="msg" id="msg" class="text_area" placeholder="Message" ></textarea>

</div>

<input type="submit" name="submit1" id="submit1" value="Submit" class="submit_btn" />

</div></div></form>
<div class="contact_btm">
<div class="contactbtm_left">E-mail: vipesh@usa.net
Website: www.vipesh.com<br /><br /><br />

Text will be here (Company)
0000 00th St W
Title here, FL 00000-0000 India
Phone: (xxx) xxxxxxx (
Fax:  (xxx) xxx-xxxx  </div>
<div class="contact_map"><img src="images/map.png" /></div>


</div>





</div>

</div></div>
<?php include "footer.php"; ?>