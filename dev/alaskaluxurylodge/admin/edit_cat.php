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
<table border="0" width="100%"  cellspacing="2" cellpadding="0">

<h1 class="heading_class">Edit Category</h1>

<?php


$getid=$_GET['id'];
$selqry=mysql_query("select * from `category` where id=".$getid);
	$res=mysql_fetch_assoc($selqry);

?>
<form name="myform" action="" method="post" >
<table>
<tr class="bodyfile">
 <th>Category:</th>
	<td><input type="text" value="<?php echo $res['cat_name']; ?>" name="cat_name" id="cat_name" /></td>
</tr>
<tr class="bodyfile">
 <th>Url:</th>
	<td><input type="text" value="<?php echo $res['url']; ?>" name="url" id="url" /></td>
</tr> 
<tr>
<td><input type="submit" class="button" id="submit" name="submit" value="Save"/></td>
</tr>
</table>
</form>
<?php
if(isset($_POST['submit']))
{
 $cat_name=$_POST['cat_name'];
 $url=$_POST['url'];
 
 $sql=mysql_query("update category set cat_name='$cat_name',url='$url' where id=$getid");
 header("location:category.php");
 /*if($sql)
 {
  echo "qyery has been update";
 }
 else
 {
    echo "qyery has been not update";
 }*/
}	 

?> 
		
</table></td></tr></table>
<div>
<a href="category.php"><input type="button" class="button" value="go to category" /></a>
</div>
<?php
	include('footer.php');
	ob_end_flush();

?>
