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

<div class="button"><a href="add_subcategory.php" style=" color:#fff; text-decoration:none;">Add Sub-Category</a></div>

</td></tr>

<?php
if(isset($_SESSION['user_id']))
{
	$userid=$_SESSION['user_id'];
	
}

	$select="select * from sub_category ";



$resource=mysql_query($select);
$counttotal = mysql_num_rows($resource);
if($counttotal>=1)
{
?>
<form name="formca" method="post" action="sub_category.php">
<tr>
<th align="left">
<h4>Sub-category Name</h4></th>
</tr>
<tr>
<td>
<?php

$select=mysql_query("select * from `sub_category`");

?>
</td>
<td>


<?php

$select=mysql_query("select * from `sub_category`");
while($res=mysql_fetch_assoc($select))
{
?>
<tr>
<td><?php echo $res['sub_cat_name'];?></td>
</tr>
<?php
}
?>	
	</td></tr>	<!--code for paging-->
			
	<tr>
		<td colspan="3" align="center">
			<?php
				//This is the actual usage of function, It prints the paging links
				doPages($numrecords, extractfilename($_SERVER['REQUEST_URI']), '', $counttotal);
			?>
		</td>
	</tr>
			
	<!--	code for paging-->
</table></div></td></tr></table>
<?php
	include('footer.php');
	ob_end_flush();
}
?>
