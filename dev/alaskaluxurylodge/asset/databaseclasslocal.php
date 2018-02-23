<?php 

$database_host='localhost';
 $database_username='root';
  $database_password='';
  $database_name='vipeshdb';
$connection=mysql_connect($database_host, $database_username, $database_password, TRUE);
mysql_select_db($database_name, $connection);

?>
