<?php
ob_start();
session_start();
include("../../lib/openCon.php");
include("../../lib/functions.php");
if (isset($_REQUEST['getGrpContacts'])) {
	$total_data = 0;

    $rs = mysql_query("SELECT Pms_Booking_ID FROM group_contacts ORDER BY Pms_Booking_ID DESC LIMIT 0, 1");
    if (mysql_num_rows($rs) > 0) {
        $row = mysql_fetch_object($rs);
        $lastID = $row->Pms_Booking_ID;
    } else {
        $lastID = 0;
    }

	//$lastID = 0;

	$rs = mysql_query("SELECT c.Mag_ContactID, c.ContactID, c.cont_id, c.CreatedDate, c.LastUpdated, g.grp_id, g.Pms_Booking_ID, g.GroupArrivalDate, g.createdDate FROM contacts AS c INNER JOIN groups AS g WHERE g.Contact_ID=c.ContactID AND g.Pms_Booking_ID>".$lastID);
	if(mysql_num_rows($rs)){
		while($rows=mysql_fetch_object($rs)){
			$isExist = chkExist("Pms_Booking_ID", "group_contacts", "WHERE Pms_Booking_ID=" . $rows->Pms_Booking_ID . " AND ContactID=" . $rows->ContactID);
			if ($isExist == 0) {
				$total_data++;
				mysql_query("INSERT INTO group_contacts (gcont_id, grp_id, Pms_Booking_ID, ContactID, Mag_ContactID, GroupArrivalDate, createdDate) VALUES (coalesce((SELECT MAX(gc.gcont_id) as ID FROM group_contacts AS gc), 0)+1, '" . $rows->grp_id. "', '" . $rows->Pms_Booking_ID . "', '" . $rows->ContactID . "', '" . $rows->Mag_ContactID . "', '" . $rows->GroupArrivalDate . "', '" . $rows->createdDate . "')") or die(mysql_error());
				// INSERT IN TRAVEL INFO TABLE
				$qryMaxID = "coalesce((SELECT MAX(t.tinfo_id) as ID FROM travel_info AS t), 0)+1";
				mysql_query("INSERT INTO `travel_info` (`tinfo_id`, `cont_id`, `grp_id`, `Pms_Booking_ID`, `CreatedDate`, `LastUpdated`, `ContactID`, `Mag_ContactID`) 
				VALUES(".$qryMaxID.", '".$rows->cont_id."', '".$rows->grp_id."', ".$rows->Pms_Booking_ID.", '".$rows->CreatedDate."', '".$rows->LastUpdated."', '".$rows->ContactID."', '".$rows->Mag_ContactID."')");
			}
		}
	}
	
	
	//$lastID = 1300;
    /*$url = utf8_encode(file_get_contents('http://private.talonlodge.com/guests/talon_service.asp?function=getGrpContacts&lastID='.$lastID));
    $varData = simplexml_load_string($url);
    foreach ($varData as $dInfo):
		$total_data++;

        $isExist = chkExist("Pms_Booking_ID", "group_contacts", "WHERE Pms_Booking_ID=" . $dInfo->Pms_Booking_ID . " AND Mag_ContactID=" . $dInfo->ContactID);
        if ($isExist == 0) {
            $grp_id = returnName("grp_id", "groups", "Pms_Booking_ID", $dInfo->Pms_Booking_ID);
            if($grp_id!=''&&$grp_id!=0){
                
                $orig_ContactID = returnName("ContactID", "contacts", "Mag_ContactID", $dInfo->ContactID);
				if($orig_ContactID==0){
					$orig_ContactID = $dInfo->ContactID;
				}
                mysql_query("INSERT INTO group_contacts (gcont_id, Mag_ContactID, grp_id, Pms_Booking_ID, ContactID, GroupArrivalDate, createdDate) VALUES (coalesce((SELECT MAX(gc.gcont_id) as ID FROM group_contacts AS gc), 0)+1, '" . $dInfo->ContactID . "', '" . $grp_id . "', '" . $dInfo->Pms_Booking_ID . "', '" . $orig_ContactID . "', '" . calendarDateConver4($dInfo->GroupArrivalDate) . "', '" . calendarDateConver4($dInfo->GroupArrivalDate) . "')") or die(mysql_error());
                
            }
        }
    endforeach;*/
    header("Location: ../manage_group.php?op=8&imp=".$total_data);
}
ob_end_flush();
?>