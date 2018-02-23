<?php
ob_start();
session_start();
include("../../lib/openCon.php");
include("../../lib/functions.php");
if (isset($_REQUEST['get_packages'])) {
	$total_data = 0;
    $rs = mysql_query("SELECT Pms_Package_ID FROM packages ORDER BY Pms_Package_ID DESC LIMIT 0, 1");
    if (mysql_num_rows($rs) > 0) {
        $row = mysql_fetch_object($rs);
        $lastID = $row->Pms_Package_ID;
    } else {
        $lastID = 0;
    }
    $url = utf8_encode(file_get_contents('http://private.talonlodge.com/guests/talon_service.asp?function=getPackages&lastID=' . $lastID));
    //$url = utf8_encode(file_get_contents('http://private.talonlodge.com/guests/talon_service.asp?function=getPackages&lastID=600'));
    $live_pkg_data = simplexml_load_string($url);
    foreach ($live_pkg_data as $details):
		$total_data++;
		
        $existance_of_id = chkExist("Pms_Package_ID", "packages", " WHERE Pms_Package_ID=" . $details->Pms_Package_ID . "");
        if (!$existance_of_id) {

            $date = '';
            $date = calendarDateConver4($details->Arrival_Start_Date);
            $days = ($details->Package_Max_Days)+1;
            $date = strtotime($date);
            $date = strtotime('+' . $days . ' day', $date);
            $date = date('Y-m-d', $date);
            $date = $date . ' 00:00:00';

            $pak_id = getMaximum("packages", "pack_id");
            mysql_query("INSERT INTO packages (
			pack_id, 
			Pms_Package_ID, 
			State_Code, 
			Status_Code,
			Account_ID,
			sforce_pricebookentryid,
			sforce_product2id,
			Package_Name,
			Pricebook_Name,
			Web_Package,
			Package_Details,
			Package_Notes,
			Package_Terms,
			Package_Fees,
			Package_Includes,
			Package_DoesNot_Include,
			Associated_Species,
			Type_Of_Adventure,
			Package_Min_Days,
			Package_Min_Adults,
			Package_Min_Children,
			Package_Min_People,
			Package_Max_Days,
			Package_Max_Adults,
			Package_Max_Children,
			Package_Max_People,
			Arrival_Start_Date,
			Arrival_End_Date,
			Arrival_Travel_Days,
			Departure_Travel_Days,
			Arrival_Time_Min,
			Departure_Time_Min,
			Arrival_Time_Max,
			Departure_Time_Max,
			Booking_Start_Date,
			Booking_End_Date,
			Bookdays_Arrival_Min,
			Bookdays_Arrival_Max,
			Adult_Cost,
			Child_Cost,
			People_Cost,
			Adult_Deposit,
			Child_Deposit,
			People_Deposit,
			People_Fees,
			Sunday_Arrive_On,
			Monday_Arrive_On,
			Tuesday_Arrive_On,
			Wednesday_Arrive_On,
			Thursday_Arrive_On,
			Friday_Arrive_On,
			Saturday_Arrive_On
			) 
			VALUES(
			'" . dbStr($pak_id) . "',
			'" . dbStr($details->Pms_Package_ID) . "',
			'" . dbStr($details->State_Code) . "',
			'" . dbStr($details->Status_Code) . "',
			'" . dbStr($details->Account_ID) . "',
			'" . dbStr($details->sforce_pricebookentryid) . "',
			'" . dbStr($details->sforce_product2id) . "',
			'" . dbStr($details->Package_Name) . "',
			'" . dbStr($details->Pricebook_Name) . "',
			'" . dbStr($details->Web_Package) . "',
			'" . dbStr($details->Package_Details) . "',
			'" . dbStr($details->Package_Notes) . "',
			'" . dbStr($details->Package_Terms) . "',
			'" . dbStr($details->Package_Fees) . "',
			'" . dbStr($details->Package_Includes) . "',
			'" . dbStr($details->Package_DoesNot_Include) . "',
			'" . dbStr($details->Associated_Species) . "',
			'" . dbStr($details->Type_Of_Adventure) . "',
			'" . dbStr($details->Package_Min_Days) . "',
			'" . dbStr($details->Package_Min_Adults) . "',
			'" . dbStr($details->Package_Min_Children) . "',
			'" . dbStr($details->Package_Min_People) . "',
			'" . dbStr($details->Package_Max_Days) . "',
			'" . dbStr($details->Package_Max_Adults) . "',
			'" . dbStr($details->Package_Max_Children) . "',
			'" . dbStr($details->Package_Max_People) . "',
			'" . calendarDateConver($details->Arrival_Start_Date) . "',
			'" . $date . "',
			'" . dbStr($details->Arrival_Travel_Days) . "',
			'" . dbStr($details->Departure_Travel_Days) . "',
			'" . dbStr($details->Arrival_Time_Min) . "',
			'" . dbStr($details->Departure_Time_Min) . "',
			'" . dbStr($details->Arrival_Time_Max) . "',
			'" . dbStr($details->Departure_Time_Max) . "',
			'" . calendarDateConver($details->Booking_Start_Date) . "',
			'" . calendarDateConver($details->Booking_End_Date) . "',
			'" . dbStr($details->Bookdays_Arrival_Min) . "',
			'" . dbStr($details->Bookdays_Arrival_Max) . "',
			'" . dbStr($details->Adult_Cost) . "',
			'" . dbStr($details->Child_Cost) . "',
			'" . dbStr($details->People_Cost) . "',
			'" . dbStr($details->Adult_Deposit) . "',
			'" . dbStr($details->Child_Deposit) . "',
			'" . dbStr($details->People_Deposit) . "',
			'" . dbStr($details->People_Fees) . "',
			'" . dbStr($details->Sunday_Arrive_On) . "',
			'" . dbStr($details->Monday_Arrive_On) . "',
			'" . dbStr($details->Tuesday_Arrive_On) . "',
			'" . dbStr($details->Wednesday_Arrive_On) . "',
			'" . dbStr($details->Thursday_Arrive_On) . "',
			'" . dbStr($details->Friday_Arrive_On) . "',
			'" . dbStr($details->Saturday_Arrive_On) . "'
			)");
        }
    endforeach;
    header("Location: ../manage_packages.php?op=8&imp=".$total_data);
}
ob_end_flush();
?>