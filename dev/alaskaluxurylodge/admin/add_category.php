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
	
	<h1 class="heading_class"><?php if($id!=''){ echo "Edit "; } else { echo "Add "; }?>Category</h1>
	<tr>
		<td style=\"align:left\">
			
		</td>
	</tr>
	
<tr><td><form name="myform" action="save_edit_delprofile.php?type=cat_add" method="post" >
<table>

<tr>
	
  
    <td class="tab-cat" style="margin-top:12px;">Category:</td>
    <td class="tab-add1"><input type="text" name="cat_name" id="cat_name" /></td>
    
    <td class="tab1"><div class="button" style="float:right;"><a href="category.php" style="color:#fff; text-decoration:none;">Manage Category</a></div>
	
	</td>
    <td class="tab1">&nbsp;</td>
  </tr>
<tr>
	
    <td class="tab-cat" style="margin-top:12px;">Url:</td>
    <td class="tab-add1"><input type="text" name="url" id="url" /></td></tr></br>
    
    <!--<td class="tab-cat" style="margin-top:12px;">Message:</td>
    <td class="tab-add1"><input type="text" name="message" id="message" /></td>
    -->
    <td class="tab1">
	
	</td>
    <td class="tab1">&nbsp;</td>
  </tr>
 
 
 <tr>
    <td class="tab-cat">&nbsp;</td>
    <td class="tab-add1">	<input type="button" name="btncancel" value="Cancel" class="button" onClick="cancelapplication('category.php')"/>
		<input type="submit" class="button" name="submit" value="Save"/></td>
    <td class="tab1">&nbsp;</td>
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
	<td colspan="2" style="padding-right:400px">
	
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
