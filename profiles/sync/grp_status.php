<?php
ob_start();
session_start();
include("../../lib/openCon.php");
include("../../lib/functions.php");
if (isset($_REQUEST['getGrpStatus'])){
	$total_data = 0;

    $url = utf8_encode(file_get_contents('http://private.talonlodge.com/guests/talon_service.asp?function=getGroupStatus'));
    $varData = simplexml_load_string($url);
    foreach ($varData as $dInfo):
		$total_data++;

        mysql_query("UPDATE groups SET GroupArrivalDate='".@calendarDateConver4($dInfo->GroupArrivalDate)."', GroupDepartureDate='".@calendarDateConver4($dInfo->GroupDepartureDate)."', Booking_Status='".dbStr($dInfo->Booking_Status)."' WHERE Pms_Booking_ID=".$dInfo->Pms_Booking_ID."");
    endforeach;
    header("Location: ../manage_group.php?op=8&imp=0");
}
ob_end_flush();
?>