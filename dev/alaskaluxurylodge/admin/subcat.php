<?php 

$database_host='localhost';
 $database_username='root';
  $database_password='';
  $database_name='harry';
$connection=mysql_connect($database_host, $database_username, $database_password, TRUE);
mysql_select_db($database_name, $connection);

?>
<form name="myform" action="" method="post" >
<table>
 <th>sub Category:</th>
	<td><input type="text" name="sub_cat_name" id="cat_name" /></td>
	<td><input type="submit" name="submit" value="save" /></td> 
 </tr>
 
</table>
</form>
<?php
if(isset($_POST['submit']))
{
 $subcatname=$_POST['sub_cat_name'];
//echo $catname;
 $insert=mysql_query("insert into sub_category(`sub_cat_name`) values('$subcatname')");
 if($insert)
 {
  echo "insert query;";
 }
 else
 {
  echo "not insert query:";
 }
}
?>