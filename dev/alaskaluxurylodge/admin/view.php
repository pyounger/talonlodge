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

<h1 class="heading_class">Category</h1>

<tr><td>
<div id="divviewinstitute" name="divviewinstitute" style="border:0;width:100%" >
<table id="tblviewinstitute" name="tblviewinstitute" border="0" width="100%"  cellspacing="0" cellpadding="0" cols="2">
<tr><td colspan="2" style="">


<!--<div align="right"><a href="add_editbulletin.php" >Add Crime Bulletin</a></div>


<a href="javascript:void(0);" onclick="fieldblankcat()"></a>--></td><td width="30%" style=\"align:left\">

<div class="button"><a href="stylesheets/add_subcategory.php" style=" color:#fff; text-decoration:none;">Add </a></div>

</td></tr>

<?php
if(isset($_SESSION['user_id']))
{
	$userid=$_SESSION['user_id'];
	
}


?>








			
	
    
			
</table></div></td></tr></table>
<?php
	include('footer.php');
	ob_end_flush();
?>
