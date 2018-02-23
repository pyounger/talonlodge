<?php
ob_start();
//include('config.php');
include('session.php');
include('header.php');
//session_start();

?>
<?php

if(isset($_POST['submit']))
{
$category=$_POST['category'];

$insert=mysql_query("insert in to category(`category`) values('$category')");
if($insert)
{
 echo "insert";
 }
 else
 {
  echo "insert not";
  }
 } 

?>
<table border="0" width="100%"  cellspacing="2" cellpadding="0">

<h1 class="heading_class">Add Category</h1>

<tr><td>
<div id="divviewinstitute" name="divviewinstitute" style="border:0;width:100%" >
<table id="tblviewinstitute" name="tblviewinstitute" border="0" width="50%"  cellspacing="0" cellpadding="0" cols="2">
<tr>
<th >Category</th>
<td><input type="text" name="category" id="category" /></td>
</tr>
<tr class="bodyfile">
<th>Sub-category</th>
<td><input type="text" name="sub-category" id="sub-category" /></td>
</tr>

<tr>
		<td class="bodyfile" align="center">File:</td>
		<td>
				<input type="file" name="filename" <?php if($id == ""){ echo "class=\"fileedit\""; }; ?>>&nbsp;<?php if($resourcedetail['fileupload']==""){ echo "<i>- No File -</i>"; } else { echo $resourcedetail['fileupload'];} ?>
		</td>
</tr>
<tr style="padding-top:20px;">
<td colspan="2" style="text-align:center;" ><input type="submit" name="submit" id="submit" value="submit" /></td>
</tr>

</table>
</div></td></tr></table>
<?php
	include('footer.php');
	ob_end_flush();
?>
