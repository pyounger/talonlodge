<?php
include("../asset/databaseclass.php");
$id=$_REQUEST['id'];
$sel="select * from sub_category where cat_id=$id";
?>
<select name='subcat' id='subcat'>
<?php
echo "<option value='' >Select</option>";
$source=mysql_query($sel);
while( $data = mysql_fetch_array($source))
{
echo "<option value='$data[id]' >$data[sub_cat_name]</option>";
}
?>
</select>


