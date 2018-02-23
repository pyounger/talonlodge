<?php
ob_start();
session_start();
include("../../lib/openCon.php");
include("../../lib/functions.php");
if(isset($_REQUEST['getGroups'])){
	$total_data = 0;

    $rs = mysql_query("SELECT Pms_Booking_ID FROM groups ORDER BY Pms_Booking_ID DESC LIMIT 0, 1");
    if (mysql_num_rows($rs) > 0) {
        $row = mysql_fetch_object($rs);
        $lastID = $row->Pms_Booking_ID;
    } else {
        $lastID = 0;
    }
	print($lastID);
    $url = utf8_encode(file_get_contents('http://private.talonlodge.com/guests/talon_service.asp?function=getGroups&lastID='.$lastID));
    $live_grp_data = simplexml_load_string($url);
        foreach ($live_grp_data as $details){
		$total_data++;

		$existance_of_id = chkExist("pms_booking_id", "groups", " WHERE pms_booking_id=".$details->Pms_Booking_ID." ");
		if(!$existance_of_id){
			$grp_id = getMaximum("groups","grp_id");
			$total_cust = ($details->BYOA_Num_Adults + $details->BYOA_Num_Children);
			$orig_ContactID = returnName("ContactID", "contacts", "Mag_ContactID", $details->Contact_ID);
			$conID_chk = 0;
			if($orig_ContactID==0){
				$orig_ContactID = $details->Contact_ID;
				$conID_chk = $details->Contact_ID;
			}
			else{
				$conID_chk = 0;
			}
			
			mysql_query("INSERT INTO groups (
				grp_id, 
				Pms_Booking_ID, 
				Pms_Package_ID, 
				Contact_ID,
				GroupName,
				GroupArrivalDate,
				GroupDepartureDate,
				BYOA_Num_Adults,
				BYOA_Num_Children,
				grp_total_cust,
				Booking_Status,
				createdDate,
				Contact_ID_chk
			) 
			VALUES(
				'".dbStr($grp_id)."',
				'".dbStr($details->Pms_Booking_ID)."',
				'".dbStr($details->Pms_Package_ID)."',
				'".dbStr($orig_ContactID)."',
				'".dbStr($details->GroupName)."',
				'".@calendarDateConver4($details->GroupArrivalDate)."',
				'".@calendarDateConver4($details->GroupDepartureDate)."',
				'".dbStr($details->BYOA_Num_Adults)."',
				'".dbStr($details->BYOA_Num_Children)."',
				'".$total_cust."',
				'".dbStr($details->Booking_Status)."',
				NOW(),
				'".dbStr($conID_chk)."'
			)");
			/*print("INSERT INTO groups (
				grp_id, 
				Pms_Booking_ID, 
				Pms_Package_ID, 
				Contact_ID,
				GroupName,
				GroupArrivalDate,
				GroupDepartureDate,
				BYOA_Num_Adults,
				BYOA_Num_Children,
				grp_total_cust,
				Booking_Status,
				createdDate
			) 
			VALUES(
				'".dbStr($grp_id)."',
				'".dbStr($details->Pms_Booking_ID)."',
				'".dbStr($details->Pms_Package_ID)."',
				'".dbStr($orig_ContactID)."',
				'".dbStr($details->GroupName)."',
				'".@calendarDateConver4($details->GroupArrivalDate)."',
				'".@calendarDateConver4($details->GroupDepartureDate)."',
				'".dbStr($details->BYOA_Num_Adults)."',
				'".dbStr($details->BYOA_Num_Children)."',
				'".$total_cust."',
				'".dbStr($details->Booking_Status)."',
				NOW()
			)<br>");*/
		}
	}
	header("Location: ../manage_group.php?op=8&imp=".$total_data);
}
ob_end_flush();
?>