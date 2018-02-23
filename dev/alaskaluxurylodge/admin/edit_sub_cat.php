<?php
ob_start();
//include('config.php');
include('session.php');
include('header.php');
//session_start();
include("../asset/databaseclass.php");
$task=$_REQUEST['task'];
$id=$_REQUEST['id'];
if($task=="del")
{
	$select="DELETE from category WHERE id='$id'";
	$resource=mysql_query($select);
}
?>
<script type="text/javascript">
function confirm_delete(url,id)
{
	
	if (confirm("Are you sure you want to delete the record?")==true)
	{
		location.href=url+id;
	}
 	else
	{
         return false;
  	}
	return false;
}
</script>
<form name="myform" action="" method="post" >
<table border="0" width="100%"  cellspacing="2" cellpadding="0">
<h1 class="heading_class">Edit Sub_Category</h1>
<?php
	$sel="select id,cat_name from category ";
	
?>
<th class="bodyfile">category</th>
<td><select name='cat_id' id='cat_id' >
<?php
	

$source=mysql_query($sel);

while( $data = mysql_fetch_array($source))
{
	
	if($_REQUEST[id]=='')
	{
		$selectedval="";
	}else if($id==$data[id])
	{
		$selectedval="selected";
	}
	else
	{
		$selectedval="";
	}
	echo '<option value='.$data["id"].' '.$selectedval.'>'.$data["cat_name"].'</option>';


}

?>

</select>

</td>
<?php


$getid=$_GET['id'];

$selqry=mysql_query("select * from `sub_category` where id=".$getid);
	$res=mysql_fetch_assoc($selqry);

?>
<tr class="bodyfile">
 <th>sub_Category:</th>
	<td>
		<input type="text" value="<?php echo $res['sub_cat_name']; ?>" name="sub_cat_name" id="sub_cat_name" /></td>
</tr>    
<tr>
<td><input type="submit" class="button" name="submit" value="Save"/></td>
</tr>
</table>
</form>
<?php
if(isset($_POST['submit']))
{
	
	
$cat_name=$_POST['cat_id'];
$sub_cat_name=$_POST['sub_cat_name'];
$sql=mysql_query("update sub_category set sub_cat_name='$sub_cat_name',cat_id='$cat_name' where id=$getid");
 
 if($sql)
 {
 // echo "qyery has been update";
   header("location:sub_category.php");
 }
 else
 {
    //echo "qyery has been not update";
 }
}	 

?> 
		
</table></td></tr></table>
<div>
<a href="sub_category.php"><input type="button" class="button" value="go to sub-category" /></a>
</div>
<?php
	include('footer.php');
	ob_end_flush();

?>
