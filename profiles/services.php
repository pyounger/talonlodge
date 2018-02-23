<?php 

include('includes/php_includes_top.php');

$count=0;
if(isset($_REQUEST['fltNum'])){
	$retData = '';
	$rs = mysql_query("SELECT * FROM flight_no WHERE flightn_status='".$_REQUEST['flightn_status']."' AND flight_id=".$_REQUEST['flight_id']);
	$retData .= '<option value=""></option>';
	while($row=mysql_fetch_object($rs)){
		$retData .= '<option value="'.$row->flightn_id.'">'.$row->flightn_name.'</option>';
	}
	print($retData);
}
else{
	$Query = "SELECT ft.flightt_name FROM flight_no AS fn LEFT OUTER JOIN flight_time AS ft ON fn.flightt_id=ft.flightt_id WHERE fn.flightn_id=".$_REQUEST['flightn_id']."";
	$count = mysql_num_rows(mysql_query($Query));
	if ($count>0) {
		$rs = mysql_query($Query);
		$row = mysql_fetch_object($rs);
		echo $row->flightt_name;
	} else {
		echo '00:00';
	}
}
?>