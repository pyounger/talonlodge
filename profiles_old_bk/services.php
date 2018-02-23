<?php 
include('includes/php_includes_top.php');
$count=0;
$Query = "SELECT ft.flightt_name FROM flight_no AS fn LEFT OUTER JOIN flight_time AS ft ON fn.flightt_id=ft.flightt_id WHERE fn.flightn_id=".$_REQUEST['flightn_id']."";
$count = mysql_num_rows(mysql_query($Query));
if ($count>0) {
	$rs = mysql_query($Query);
	$row = mysql_fetch_object($rs);
	echo $row->flightt_name;
} else {
	echo '00:00';
}
?>