<?php
////////////////////////////////////////////////////////////////////////////
// db Masters' Links Directory 3.1.2, Copyright (c) 2003 db Masters Multimedia
// Links Directory comes with ABSOLUTELY NO WARRANTY
// Licensed under the AGPL
// See license.txt and readme.txt for details
////////////////////////////////////////////////////////////////////////////

include('session.php');
include('header.php');

?>
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<style type="text/css">
	
.button1 {
    background: none repeat scroll 0 0 #009ACD;
   padding:10px 10px 0px -10px;
   
   
}
.buttontd{
	padding:0px 0px 0px 220px;text-align:left;
	
}

	
	
</style>
  <script type="text/javascript" >
           $(document).ready(function() {
                   $("#form").validate();
        });
           
           </script>

<form action="save_edit_delprofile.php?type=changepwd" method="post" id="form" >
<table border="0" width="90%"  style="text-align:center;" cellspacing="2" cellpadding="0">
<h1 class="heading_class">Change Password</h1>
	
	<tr>
		<td style="height:12px"></td>
		
	</tr>
	
	<tr>

<td colspan="2">

	<table border="0" width="100%"  cellspacing="2" cellpadding="0">
	
<tr>
	<td class="bodymd" style="width:200px"><span style="color:#FF0000;">*</span>Old Password:</td><td style="float:left">
		<input type="password" name="oldpwd" id="oldpwd" class="inputchange" />
	</td>
</tr>
<tr>
	<td class="bodymd" style="width:200px"><span style="color:#FF0000;">*</span>New Password:</td><td style="float:left">
		<input type="password" name="newpwd" id="newpwd" class="inputchange" />
	</td>
</tr>
<tr>
	<td class="bodymd" style="width:200px"><span style="color:#FF0000;">*</span>Confirm Password:</td><td style="float:left">
		<input type="password" name="confirmpwd" id="confirmpwd" class="inputchange" />
	</td>
</tr>
<tr>
	<td class="bodymd" style="width:200px"><span style="color:#1a1a1a;">*</span></td><td style="float:left">
			<input type="submit" class="button marg" name="submit" value="Change Password"/>
	</td>
</tr>

<tr>
	<td></td>
	
	
	<td  style="float:left">

	</td>
</tr>


<tr>
	<td style="height:12px" colspan="2"></td>
</tr>



<tr>
	<td style="height:12px">
		
	</td>
	
</tr>
<?php if($_REQUEST['type']=='mis')
{
echo "<tr><td></td><td style='color:red;font-size:8pt'>Please fill correct password</td></tr>";
}?>
<?php if($_REQUEST['type']=='change')
{
echo "<tr><td></td><td style='color:red;font-size:8pt'> Password is updated</td></tr>";
}?>


</table>
		</td>
</tr>
	</table>
</form>

<?php
	include('footer.php');
	
?>
