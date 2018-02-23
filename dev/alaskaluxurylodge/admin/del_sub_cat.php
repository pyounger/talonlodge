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
function confirm_delete(id)
{
	
	if (confirm("Are you sure you want to delete the record?")==true)
	{
		location.href=id;
	}
 	else
	{
         return false;
  	}
	return false;
}

</script>
<table border="0" width="100%"  cellspacing="2" cellpadding="0">

<h1 class="heading_class">Delete Sub-Category</h1>

<?php


$getid=$_GET['_id'];
$del=mysql_query("delete from sub_category where id=".$getid);


header('location:sub_category.php');



?> 


		
</table></td></tr></table>
<?php
	include('footer.php');
	ob_end_flush();

?>
