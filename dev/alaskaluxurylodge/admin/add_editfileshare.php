<?php
ob_start();
//include('config.php');
include('session.php');
include('header.php');
//session_start();
include("../asset/databaseclass.php");
$mode="add";

$id='';
$id=$_REQUEST['id'];

$resourcedetail=array();
if($id!='')
{

	
	$select="select *,tblgallery.id as galid ,category.id as catid from tblgallery inner join category on category.id=tblgallery.catid where tblgallery.id=$id ";
	
	
	$resource=mysql_query($select);
	$resourcedetail=mysql_fetch_assoc($resource);
	
	//echo "resourcedetail";
	//echo "<pre>";print_r($resourcedetail);
	//die;
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
	
	<h1 class="heading_class"><?php if($id!=''){ echo "Edit "; } else { echo "Add "; }?>Image</h1>
	<tr>
		<td style=\"align:left\">
		
		</td>
	</tr>
<tr><td>
<form action="save_edit_delprofile.php?type=savefiles" method="post" id="formcat" name="formcat" enctype="multipart/form-data">
<table id="tbladdinstitute" name="tbladdinstitute"  border="0" width="100%"  cellspacing="2" cellpadding="0">
	
<tr>
    <td class="tab2">Heading:</td>
        <td class="tab">
		<input type="hidden" name="mode" id="mode" value="<?php echo $mode; ?>" />
		<input type="hidden" name="galid" id="galid" value="<?php echo $id; ?>" />
		<input type="text" name="heading1" id="heading1" value="<?php echo $resourcedetail['heading']; ?>" />
	</td>
  </tr>
<tr>
    <td class="tab2">Banner Color(Optional):</td>
        <td class="tab">
		<input type="text" name="bannercol" id="bannercol" value="<?php echo stripslashes($resourcedetail['bannercol']); ?>" />
	</td>
  </tr>
<tr>
    <td class="tab2">Font Color(Optional):</td>
        <td class="tab">
		<input type="text" name="fontcol" id="fontcol" value="<?php echo stripslashes($resourcedetail['fontcol']); ?>" />
	</td>
  </tr>

<tr>
    <td class="tab2">Category:</td>
    <td class="tab" style="width:479px;"><?php
				$sel="select id,cat_name from category ";
			?>
			<select name='cat_id' id='cat_id' onchange="getcommon('getsubcat.php?id='+this.value,'divsubcat');" >
			<?php
				$source=mysql_query($sel);
				while( $data = mysql_fetch_array($source))
				{
					$selectval='';
					if($data["id"]==$resourcedetail['catid'])
					{
						$selectval='selected';
					}
					else
					{
						$selectval='';
					}
					
					echo '<option value='.$data["id"].' '.$selectval.'  >'.$data["cat_name"].'</option>';
				}
			?>
			
			</select></td>
		<td class="tab">	</td>
  </tr>
<tr>
    <td class="tab2">Text</td>
    <td class="tab"><input type="text" name="txt" id="txt" value="<?php echo $resourcedetail['message']; ?>" /></td>
  </tr>


<tr>
    <td class="tab2">File:</td>
    <td class="tab" style="height:50px;"><input type="file" name="filename" <?php if($id == ""){ echo "class=\"fileedit\""; }; ?>>&nbsp;<?php if($resourcedetail['fileupload']==""){ echo "<i>- No File -</i>"; } else { echo $resourcedetail['fileupload'];} ?></td>
    <td class="tab"><img src="fileshare/<?php echo $resourcedetail['thumbpath']; ?>" name="img1" id="img1" /> </td>
</tr>


 <tr>
    <td class="tab2">&nbsp;</td>
    <td class="tab" ><input type="button" name="btncancel" value="Cancel" class="button" onclick="cancelapplication('viewfileshare.php')"/>
		<input type="submit" class="button" name="submit" value="Save"/></td>
    <td class="tab">&nbsp;</td>
  </tr>



<tr>
	<td style="height:12px"></td>
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
	<td colspan="2" style="padding-right:603px">
		
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
