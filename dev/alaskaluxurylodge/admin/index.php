<?php
include('headerleftout.php');
error_reporting(0);
?>
<form action="save_edit_delprofile.php?type=sub" method="post" id="form" >
	<div class="main_contentmain">
		<div class="a_login_box">
        <div class="vipeshimg">
			<div class="login_box">
				<ul>
					<li><span><input type="text" name="field1" value="username" onfocus="this.value=''; return false;" class="userinput" /></span></li>
					<li class="last"><span><input type="password" name="field2" value="password" onfocus="this.value=''; return false;" class="userinput"/></span></li>
					<li class="buttonlast"><input type="submit" class="userbtn" name="submit" value=""/></li>
				</ul>
<?php if($_REQUEST['type']=='mis')
{
	echo "<span class='error_msg'>Please Enter Valid username/password</span>";
}
?>
		</div>
      <!-- <p>forgot your password? <span><a href="#">click here</a></span></p>-->
        </div>
	</div>
</form>
<?php
	include('footer.php');
?>
