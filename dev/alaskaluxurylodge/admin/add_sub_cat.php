<?php
ob_start();
//include('config.php');
include('session.php');
include('header.php');
//session_start();
include("../asset/databaseclass.php");
$mode="add";
$mode=$_REQUEST['m'];
$id='';
$id=$_REQUEST['id'];
$id=base64_decode($id);
$resourcedetail=array();
if($id!='')
{
	$select="select * from category where id=$id";
	$resource=mysql_query($select);
	$resourcedetail=mysql_fetch_assoc($resource);
	$mode="edit";
}

?>
<script type="text/javascript">
	function cancelapplication(url)
	{
		window.location.href=url;
	}
	$(document).ready(function(){
		$('#formcat').validate();
	});
</script>
<table border="0" width="100%"  cellspacing="2" cellpadding="0">
	
	<h1 class="heading_class"><?php if($id!=''){ echo "Edit "; } else { echo "Add "; }?>File</h1>
	<tr>
		<td style=\"align:left\">
			<div class="button"><a href="category.php" style="color:#fff; text-decoration:none;">Manage Category</a></div>
			<?php
			
			if($id!='')
			{
				?>
			<div class="button" style="margin:0px 10px 0px 15px"><a href="viewfileemail.php?id='<?php echo base64_encode($id); ?>'" style=" color:#fff; text-decoration:none;">Send Links</a></div>
			
			<?php } ?>
		</td>
	</tr>
	
<tr><td><form name="myform" action="save_edit_delprofile.php?type=cat_add" method="post" >
<table>
<tr class="bodyfile">
 <th>Category:</th>
	<td><input type="text" name="cat_name" id="cat_name" /></td>
	<!--<td><input type="submit" name="submit" value="save" /></td>--> 
 </tr>
 


<tr>
	<td style="height:12px"></td>
</tr>
<!--<tr><td class="bodymd">User Id:</td><td>
<input type="text" name="user_id" value="<?php //echo $resourcedetail['user_id']; ?>" />
<input type="hidden" name="bltid" id="bltid" value="<?php //echo $id; ?>" />
<input type="hidden" name="created" id="created" value="<?php //echo date("Y-m-d H:i:s"); ?>" />
</td></tr>-->

<tr>
	<td colspan="2" style="padding-right:771px">
		<input type="button" name="btncancel" value="Cancel" class="button" onClick="cancelapplication('category.php')"/>
		<input type="submit" class="button" name="submit" value="Save"/>
	</td>
</tr>
<tr><td class="bodymd"></td><td>
<div id="errormsg" name="errormsg" style="color:red;font-size:10px"></div></td>
</tr>
</table>
</form>
</td></tr></table>
<?php
	include('footer.php');
	ob_end_flush();
?>
