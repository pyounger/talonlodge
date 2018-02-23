<?php
include('headerleftout.php');
error_reporting(0);
?>
<form action="save_edit_delprofile.php?type=sub" method="post" id="form" >
	
	<div class="main_content">
		<div class="a_login_box">
			<div class="login_box">
				<ul>
					<li><label><b>*</b>User Name:</label><span><input type="text" name="field1" /></span></li>
					<li><label><b>*</b>Password:</label><span><input type="password" name="field2" /></span></li>
					<li><input type="submit" class="btn" name="submit" value="Login"/></li>
				</ul>
<?php if($_REQUEST['type']=='mis')
{
	echo "<span class='error_msg'>Please Enter Valid username/password</span>";
}
?>
		</div>
	</div>
</form>
<?php
	include('footer.php');
?>
