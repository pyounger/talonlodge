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

$select12="select * from seo where id=1";

$resource12=mysql_query($select12);
$counttotal = mysql_num_rows($resource);

$datagets = mysql_fetch_assoc($resource12);









?>
<form action="save_edit_delprofile.php?type=seo_add" method="post" id="form" >
<table border="0" width="90%"  style="text-align:center;" cellspacing="2" cellpadding="0">
<h1 class="heading_class">SEO</h1>
	
<tr>
	<td style="height:12px">
		<?php
			$task=$_REQUEST['task'];
			if($task=='add')
			{
				echo "<font style='color:red'>Your seo detail is updated</font>";
			}
		
		
		?> 
		
		
	</td>
</tr>
<tr>
 <td class="bodymd" style="width:200px"><span style="color:#FF0000;">*</span>Title:</td>
 <td style="float:left">
	<input type="text" name="title" id="title" value="<?php echo $datagets['title']; ?>" class="inputchange" />
 </td>
</tr>
<tr>
 <td class="bodymd" style="width:200px"><span style="color:#FF0000;">*</span>Keyword:</td> <td style="float:left">
		<input type="text" name="keyword" id="keyword" value="<?php echo $datagets['keyword']; ?>" class="inputchange" />
 </td>
</tr>
<tr>
 <td class="bodymd" style="width:200px"><span style="color:#FF0000;">*</span>Description:</td>
 <td style="float:left">
		<input type="text" name="description" id="description" value="<?php echo $datagets['description']; ?>" class="inputchange" />
 </td>
</tr>
<tr>
 <td class="bodymd" style="width:200px"><span style="color:#FF0000;">*</span>Content Type:</td>
 <td style="float:left">
		<input type="text" name="content_type" id="content_type" value="<?php echo $datagets['content_type']; ?>" class="inputchange" />
 </td>
</tr>
<tr>
 <td class="bodymd" style="width:200px"><span style="color:#FF0000;">*</span>Robots:</td>
 <td style="float:left">
		<input type="text" name="robots" id="robots" class="inputchange" value="<?php echo $datagets['robots']; ?>" />
 </td>
</tr>
<tr>
 <td class="bodymd" style="width:200px"><span style="color:#FF0000;">*</span>Revisit_After:</td>
 <td style="float:left">
		<input type="text" name="revisit_after" id="revisit_after" class="inputchange" value="<?php echo $datagets['revisit_after']; ?>" />
 </td>
</tr>
<tr>
 <td class="bodymd" style="width:200px"><span style="color:#FF0000;">*</span>Copywritte:</td>
 <td style="float:left">
		<input type="text" name="copywritte" id="copywritte" class="inputchange" value="<?php echo $datagets['copywritte']; ?>" />
 </td>
</tr>
<tr>
	<td class="bodymd" style="width:200px"><span style="color:#1a1a1a;">*</span></td><td style="float:left">
			<input type="submit" class="button marg" name="submit" value="Submit"/>
	</td>
</tr>
</table>
</form>



<?php
	include('footer.php');
	ob_end_flush();

?>
