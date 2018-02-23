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
	$select="DELETE from sub_category WHERE id='$id'";
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

<h1 class="heading_class">Sub-Category</h1>

<tr><td>
<div id="divviewinstitute" name="divviewinstitute" style="border:0;width:100%" >
<table id="tblviewinstitute" name="tblviewinstitute" border="0" width="100%"  cellspacing="0" cellpadding="0" cols="2">
<tr><td colspan="2" style="">


<!--<div align="right"><a href="add_editbulletin.php" >Add Crime Bulletin</a></div>


<a href="javascript:void(0);" onclick="fieldblankcat()"></a>--></td><td width="41%" style=\"align:left\">



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
    <td class="tab"><h2>Sub-category Name</h2></td>
    <td class="tab"><h2>Category</h2></td>
    <td class="tab1"><h2>Action</h2></td>
    <td class="tab1"><div class="button"><a href="add_subcategory.php" style=" color:#fff; text-decoration:none;">Add Sub-Category</a></div></td>
  </tr>



<?php

$select=mysql_query("select *,sub_category.id as subcatid from sub_category inner join category on category.id=sub_category.cat_id ");
while($res=mysql_fetch_assoc($select))
{
?>

<tr>
    <td class="tab"><?php echo $res['sub_cat_name'];?></td>
    <td class="tab"><?php echo $res['cat_name'];?></td>
    <td class="tab1"> <a href="edit_sub_cat.php?id=<?php echo $res['subcatid']; ?>"><img src="images/1331556371_edit.png"></a><a href="javascript:void(0);" onclick="confirm_delete('sub_category.php?task=del&id=','<?php echo $res['subcatid']; ?>')"><img src="images/1331556391_trash_16x16.gif" class="del" ></a></td>
    <td class="tab1">&nbsp;</td>
  </tr>


</tr>
	</td></tr>	<!--code for paging-->
<?php
}
?>			
	
    
			
	<!--	code for paging-->
</table></div></td></tr></table>
<?php
	include('footer.php');
	ob_end_flush();
}

?>
