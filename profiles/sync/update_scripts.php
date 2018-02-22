<?php
ob_start();
session_start();
include("../../lib/openCon.php");
include("../../lib/functions.php");
$tcount = 0;
if (isset($_REQUEST['udtTravelInfo'])) {
	$qryMaxID = "coalesce((SELECT MAX(ti.tinfo_id) as ID FROM travel_info AS ti), 0)+1";
	$rs = mysql_query("SELECT gc.grp_id AS GROUPID, gc.Pms_Booking_ID, c.* FROM group_contacts AS gc INNER JOIN contacts AS c ON c.ContactID=gc.ContactID ORDER BY gc.ContactID");
	if(mysql_num_rows($rs)>0){
		while($rows=mysql_fetch_object($rs)){
			mysql_query("INSERT INTO travel_info(tinfo_id, cont_id, grp_id, Pms_Booking_ID, CreatedDate, arrival_flight_data, departure_flight_date, arrival_airline_id, departure_airline_id, arrival_flight_no_id, departure_flight_no_id, ContactID, con_flight_comments, arr_flight_id, arr_flightn_id, arr_flightt_id, arr_hotel_id, arr_con_private_jet, dep_flight_id, dep_flightn_id, dep_flightt_id, dep_hotel_id, dep_con_private_jet, is_completed, cont_special_ins, Mag_ContactID) 
			VALUES (".$qryMaxID.", '".$rows->cont_id."', '".$rows->GROUPID."', '".$rows->Pms_Booking_ID."', '".date("Y-m-d")."', '".dbStr($rows->arrival_flight_data)."', '".dbStr($rows->departure_flight_date)."', '".dbStr($rows->arrival_airline_id)."', '".dbStr($rows->departure_airline_id)."', '".dbStr($rows->arrival_flight_no_id)."', '".dbStr($rows->departure_flight_no_id)."', '".$rows->ContactID."', '".dbStr($rows->con_flight_comments)."', '".dbStr($rows->arr_flight_id)."', '".dbStr($rows->arr_flightn_id)."', '".dbStr($rows->arr_flightt_id)."', '".dbStr($rows->arr_hotel_id)."', '".dbStr($rows->arr_con_private_jet)."', '".dbStr($rows->dep_flight_id)."', '".dbStr($rows->dep_flightn_id)."', '".dbStr($rows->dep_flightt_id)."', '".$rows->dep_hotel_id."', '".dbStr($rows->dep_con_private_jet)."', '".$rows->is_completed."', '".dbStr($rows->cont_special_ins)."', '".$rows->Mag_ContactID."')");
			$tcount++;
		}
	}
	print($tcount." records inserted.");
}
if (isset($_REQUEST['udtContactProfile'])) {
	// First Add grp_id and Pms_Booking_ID fields in contact_profiles table
	/*
	SQL QUERY
	ALTER TABLE `contact_profiles` ADD `grp_id` BIGINT( 22 ) UNSIGNED NULL DEFAULT '0',
	ADD `Pms_Booking_ID` BIGINT( 22 ) UNSIGNED NULL DEFAULT '0'
	*/
	$rs = mysql_query("SELECT gc.grp_id AS GROUPID, gc.Pms_Booking_ID, c.cont_id, p.* FROM group_contacts AS gc INNER JOIN contacts AS c ON c.ContactID=gc.ContactID INNER JOIN contact_profiles AS p ON p.cont_id=c.cont_id ORDER BY gc.ContactID");
	if(mysql_num_rows($rs)>0){
		while($rows=mysql_fetch_object($rs)){
			mysql_query("UPDATE contact_profiles SET grp_id='".$rows->GROUPID."', Pms_Booking_ID='".$rows->Pms_Booking_ID."' WHERE conp_id=".$rows->conp_id);
			$tcount++;
		}
	}
	print($tcount." records updated.");
}
if (isset($_REQUEST['udtContactProfileDetails'])) {
	// First Add grp_id and Pms_Booking_ID fields in contact_profile_details table
	/*
	SQL QUERY
	ALTER TABLE `contact_profile_details` ADD `grp_id` BIGINT( 22 ) UNSIGNED NULL DEFAULT '0',
	ADD `Pms_Booking_ID` BIGINT( 22 ) UNSIGNED NULL DEFAULT '0'
	*/
	$rs = mysql_query("SELECT gc.grp_id AS GROUPID, gc.Pms_Booking_ID, c.cont_id, p.* FROM group_contacts AS gc INNER JOIN contacts AS c ON c.ContactID=gc.ContactID INNER JOIN contact_profile_details AS p ON p.cont_id=c.cont_id ORDER BY gc.ContactID");
	if(mysql_num_rows($rs)>0){
		while($rows=mysql_fetch_object($rs)){
			mysql_query("UPDATE contact_profile_details SET grp_id='".$rows->GROUPID."', Pms_Booking_ID='".$rows->Pms_Booking_ID."' WHERE cpd_id=".$rows->cpd_id); 
			$tcount++;
		}
	}
	print($tcount." records updated.");
}
if (isset($_REQUEST['udtDuplicates'])) {
	$tcount = 0;
	$isIns = 0;
	$strQry = "";
	$rs = mysql_query("SELECT cont_id, ContactID, Mag_ContactID, cont_fname, cont_lname, cont_email, COUNT(*) FROM contacts GROUP BY cont_fname, cont_lname HAVING COUNT(*) = 2 ORDER BY COUNT(*)");
	if(mysql_num_rows($rs)>0){
		while($rows=mysql_fetch_object($rs)){
			$isIns = 0;
			$tcount++;
			//print("<br><br>".$tcount." - ".$rows->cont_fname." ".$rows->cont_lname);
			$strQry1 = "<br><br>".$tcount." - ".$rows->cont_fname." ".$rows->cont_lname;
			$m_cont_id = 0;
			$m_ContactID = 0;
			$m_Mag_ContactID = 0;
			$t_cont_id = 0;
			$t_ContactID = 0;
			$t_Mag_ContactID = 0;
			//$rs1 = mysql_query("SELECT cont_id, ContactID, Mag_ContactID, cont_fname, cont_lname, cont_email FROM contacts WHERE cont_fname='".str_replace("'", "''", $rows->cont_fname)."' AND cont_lname='".str_replace("'", "''", $rows->cont_lname)."' AND ContactID NOT IN (8762, 9386, 8402, 8989, 8383, 8981, 8727, 9020, 8608, 9013, 8351, 9162)");
			$rs1 = mysql_query("SELECT cont_id, ContactID, Mag_ContactID, cont_fname, cont_lname, cont_email FROM contacts WHERE cont_fname='".str_replace("'", "''", $rows->cont_fname)."' AND cont_lname='".str_replace("'", "''", $rows->cont_lname)."'");
			while($row1=mysql_fetch_object($rs1)){
				//print("<br> ContactID:".$row1->ContactID.", Mag_ContactID:".$row1->Mag_ContactID);
				$strQry .= "<br> ContactID:".$row1->ContactID.", Mag_ContactID:".$row1->Mag_ContactID;
				if($row1->Mag_ContactID==0){
					$isIns++;
					$t_cont_id = $row1->cont_id;
					$t_ContactID = $row1->ContactID;
					$t_Mag_ContactID = $row1->Mag_ContactID;
				}
				else{
					$m_cont_id = $row1->cont_id;
					$m_ContactID = $row1->ContactID;
					$m_Mag_ContactID = $row1->Mag_ContactID;
				}
			}
			if($isIns==1){
				//print($strQry1."<br>");
				$strQry = "INSERT INTO tmp (m_cont_id, m_ContactID, m_Mag_ContactID, t_cont_id, t_ContactID, t_Mag_ContactID) VALUES($m_cont_id, $m_ContactID, $m_Mag_ContactID, $t_cont_id, $t_ContactID, $t_Mag_ContactID);";
				print($strQry."<br>");
			}	
		}
	}
}
if (isset($_REQUEST['udtDupIDs'])) {
	$rs=mysql_query("SELECT * FROM tmp");
	print("Start Processing...");
	while($rw=mysql_fetch_object($rs)){
		/*print("UPDATE act_orders SET cont_id='".$rw->m_cont_id."' WHERE cont_id='".$rw->t_cont_id."'");
		print("<br>");
		print("UPDATE act_schedule SET cont_id='".$rw->m_cont_id."' WHERE cont_id='".$rw->t_cont_id."'");
		print("<br>");
		print("UPDATE activity_confirmation SET cont_id='".$rw->m_cont_id."' WHERE cont_id='".$rw->t_cont_id."'");
		print("<br>");
		print("UPDATE bar_orders SET cont_id='".$rw->m_cont_id."' WHERE cont_id='".$rw->t_cont_id."'");
		print("<br>");
		print("UPDATE beverage_order SET cont_id='".$rw->m_cont_id."' WHERE cont_id='".$rw->t_cont_id."'");
		print("<br>");
		print("UPDATE contact_profile_details SET cont_id='".$rw->m_cont_id."' WHERE cont_id='".$rw->t_cont_id."'");
		print("<br>");
		print("UPDATE contact_profiles SET cont_id='".$rw->m_cont_id."' WHERE cont_id='".$rw->t_cont_id."'");
		print("<br>");
		print("UPDATE fish_record SET cont_id='".$rw->m_cont_id."' WHERE cont_id='".$rw->t_cont_id."'");
		print("<br>");
		print("UPDATE menu_schedules SET cont_id='".$rw->m_cont_id."' WHERE cont_id='".$rw->t_cont_id."'");
		print("<br>");
		print("UPDATE message_schedule SET cont_id='".$rw->m_cont_id."' WHERE cont_id='".$rw->t_cont_id."'");
		print("<br>");*/
		mysql_query("UPDATE act_orders SET cont_id='".$rw->m_ContactID."' WHERE cont_id='".$rw->t_ContactID."'");
		//print("<br>");
		mysql_query("UPDATE act_schedule SET cont_id='".$rw->m_ContactID."' WHERE cont_id='".$rw->t_ContactID."'");
		//print("<br>");
		mysql_query("UPDATE activity_confirmation SET cont_id='".$rw->m_ContactID."' WHERE cont_id='".$rw->t_ContactID."'");
		//print("<br>");
		mysql_query("UPDATE bar_orders SET cont_id='".$rw->m_ContactID."' WHERE cont_id='".$rw->t_ContactID."'");
		//print("<br>");
		mysql_query("UPDATE beverage_order SET cont_id='".$rw->m_ContactID."' WHERE cont_id='".$rw->t_ContactID."'");
		//print("<br>");
		mysql_query("UPDATE contact_profile_details SET cont_id='".$rw->m_ContactID."' WHERE cont_id='".$rw->t_ContactID."'");
		//print("<br>");
		mysql_query("UPDATE contact_profiles SET cont_id='".$rw->m_ContactID."' WHERE cont_id='".$rw->t_ContactID."'");
		//print("<br>");
		mysql_query("UPDATE fish_record SET cont_id='".$rw->m_ContactID."' WHERE cont_id='".$rw->t_ContactID."'");
		//print("<br>");
		mysql_query("UPDATE menu_schedules SET cont_id='".$rw->m_ContactID."' WHERE cont_id='".$rw->t_ContactID."'");
		//print("<br>");
		mysql_query("UPDATE message_schedule SET cont_id='".$rw->m_ContactID."' WHERE cont_id='".$rw->t_ContactID."'");
		//print("<br>");
		
		mysql_query("UPDATE group_contacts SET ContactID='".$rw->m_ContactID."' WHERE ContactID='".$rw->t_ContactID."'");
		//print("<br>");
		mysql_query("UPDATE groups SET Contact_ID='".$rw->m_ContactID."' WHERE Contact_ID='".$rw->t_ContactID."'");
		//print("<br>");
		mysql_query("UPDATE travel_info SET ContactID='".$rw->m_ContactID."', cont_id='".$rw->m_cont_id."' WHERE ContactID='".$rw->t_ContactID."'");
		//print("<br>");
		mysql_query("UPDATE room_reservation SET contact_id='".$rw->m_ContactID."' WHERE contact_id='".$rw->t_ContactID."'");
		//print("<br>");
		//print("<br><br>");
	}
	print("<br>Completed!");
}
if (isset($_REQUEST['udtDupIDs_1'])) {
	$rs=mysql_query("SELECT * FROM tmp");
	print("Start Processing...");
	while($rw=mysql_fetch_object($rs)){
		mysql_query("UPDATE room_reservation SET contact_id='".$rw->m_ContactID."' WHERE contact_id='".$rw->t_ContactID."'");
		print("UPDATE room_reservation SET contact_id='".$rw->m_ContactID."' WHERE contact_id='".$rw->t_ContactID."';<br>");
	}
	print("<br>Completed!");
}
if (isset($_REQUEST['delExtraGrpContacts'])) {
	$rs=mysql_query("SELECT g.grp_id, g.Contact_ID, g.GroupName, COUNT(*) FROM groups AS g GROUP BY Contact_ID HAVING COUNT(*) > 0");
	print("Start Processing...");
	while($rw=mysql_fetch_object($rs)){
		mysql_query("DELETE FROM group_contacts WHERE ContactID='".$rw->Contact_ID."' AND grp_id NOT IN (SELECT g.grp_id FROM groups AS g WHERE g.Contact_ID='".$rw->Contact_ID."')");
	}
	print("<br>Completed!");
}
if (isset($_REQUEST['udtImages'])) {
	$counter = 0;
	$rs=mysql_query("SELECT * FROM tmp");
	print("Start Processing...<br>");
	while($rw=mysql_fetch_object($rs)){
		$img = returnName("cont_image", "contacts", "ContactID", $rw->t_ContactID);
		if(!empty($img)){
			$counter++;
			//mysql_query("UPDATE contacts SET cont_image='".$img."' WHERE ContactID='".$rw->m_ContactID."'");
			print("UPDATE contacts SET cont_image='".$img."' WHERE ContactID='".$rw->m_ContactID."';<br>");
		}
	}
	print("<br>Completed! ".$counter." Records Updated");
}

if (isset($_REQUEST['udtRecord'])) {
	$counter = 0;
	$rs=mysql_query("SELECT * FROM contacts WHERE cont_id=7011");
	print("Start Processing...<br><br>");
	while($rw=mysql_fetch_object($rs)){
		$Query = "UPDATE `contacts` SET 
		`cont_fname`='$rw->cont_fname',
		`cont_lname`='$rw->cont_lname',
		`emg_contact_name`='$rw->emg_contact_name',
		`cust_id`='$rw->cust_id',
		`ctype_id`='$rw->ctype_id',
		`cont_email`='$rw->cont_email',
		`cont_address1`='$rw->cont_address1',
		`cont_address2`='$rw->cont_address2',
		`cont_city`='$rw->cont_city',
		`cont_state`='$rw->cont_state',
		`cont_zip`='$rw->cont_zip',
		`countries_id`='$rw->countries_id',
		`cont_phone1`='$rw->cont_phone1',
		`cont_phone2`='$rw->cont_phone2',
		`CreatedDate`='$rw->CreatedDate',
		`LastUpdated`='$rw->LastUpdated',
		`cont_image`='$rw->cont_image',
		`gen_id`='$rw->gen_id',
		`arrival_flight_data`='$rw->arrival_flight_data',
		`departure_flight_date`='$rw->departure_flight_date',
		`arrival_airline_id`='$rw->arrival_airline_id',
		`departure_airline_id`='$rw->departure_airline_id',
		`arrival_flight_no_id`='$rw->arrival_flight_no_id',
		`departure_flight_no_id`='$rw->departure_flight_no_id',
		`Name_Salutation`='$rw->Name_Salutation',
		`ContactFirstName`='$rw->ContactFirstName',
		`ContactMiddleName`='$rw->ContactMiddleName',
		`ContactLastName`='$rw->ContactLastName',
		`ContactFriendlyName`='$rw->ContactFriendlyName',
		`Company`='$rw->Company',
		`Job_Title`='$rw->Job_Title',
		`CustomerID_FK`='$rw->CustomerID_FK',
		`ContactTypeID_FK`='$rw->ContactTypeID_FK',
		`Email`='$rw->Email',
		`Email2`='$rw->Email2',
		`Email3`='$rw->Email3',
		`Address1`='$rw->Address1',
		`Address2`='$rw->Address2',
		`Address3`='$rw->Address3',
		`City`='$rw->City',
		`State`='$rw->State',
		`ZIP`='$rw->ZIP',
		`Country`='$rw->Country',
		`Phone1`='$rw->Phone1',
		`Phone2`='$rw->Phone2',
		`Phone3`='$rw->Phone3',
		`MobilePhone`='$rw->MobilePhone',
		`Active`='$rw->Active',
		`Fax`='$rw->Fax',
		`Pager`='$rw->Pager',
		`con_flight_comments`='$rw->con_flight_comments',
		`arr_flight_id`='$rw->arr_flight_id',
		`arr_flightn_id`='$rw->arr_flightn_id',
		`arr_flightt_id`='$rw->arr_flightt_id',
		`arr_hotel_id`='$rw->arr_hotel_id',
		`arr_con_private_jet`='$rw->arr_con_private_jet',
		`dep_flight_id`='$rw->dep_flight_id',
		`dep_flightn_id`='$rw->dep_flightn_id',
		`dep_flightt_id`='$rw->dep_flightt_id',
		`dep_hotel_id`='$rw->dep_hotel_id',
		`dep_con_private_jet`='$rw->dep_con_private_jet',
		`is_completed`='$rw->is_completed',
		`is_email`='$rw->is_email',
		`cont_special_ins`='$rw->cont_special_ins',
		`Mag_ContactID`='$rw->Mag_ContactID' WHERE cont_id=7217";
		print($Query);
		mysql_query($Query);
	}
	print("<br><br>Completed! ".$counter." Records Updated");
}

if (isset($_REQUEST['udtRecord2'])) {
	$counter = 0;
	$rs=mysql_query("SELECT * FROM contacts WHERE cont_id=7011");
	print("Start Processing...<br><br>");
	while($rw=mysql_fetch_object($rs)){
		$Query = "UPDATE `contacts` SET 
		`emg_contact_name`='$rw->emg_contact_name',
		`cont_email`='$rw->cont_email',
		`cont_address1`='$rw->cont_address1',
		`cont_address2`='$rw->cont_address2',
		`cont_city`='$rw->cont_city',
		`cont_state`='$rw->cont_state',
		`cont_zip`='$rw->cont_zip',
		`countries_id`='$rw->countries_id',
		`cont_phone1`='$rw->cont_phone1',
		`cont_phone2`='$rw->cont_phone2',
		`LastUpdated`='$rw->LastUpdated',
		`cont_image`='$rw->cont_image',
		`gen_id`='$rw->gen_id',
		`arrival_flight_data`='$rw->arrival_flight_data',
		`departure_flight_date`='$rw->departure_flight_date',
		`arrival_airline_id`='$rw->arrival_airline_id',
		`departure_airline_id`='$rw->departure_airline_id',
		`arrival_flight_no_id`='$rw->arrival_flight_no_id',
		`departure_flight_no_id`='$rw->departure_flight_no_id',
		`Name_Salutation`='$rw->Name_Salutation',
		`ContactFirstName`='$rw->ContactFirstName',
		`ContactMiddleName`='$rw->ContactMiddleName',
		`ContactLastName`='$rw->ContactLastName',
		`ContactFriendlyName`='$rw->ContactFriendlyName',
		`Company`='$rw->Company',
		`Job_Title`='$rw->Job_Title',
		`Email`='$rw->Email',
		`Email2`='$rw->Email2',
		`Email3`='$rw->Email3',
		`Address1`='$rw->Address1',
		`Address2`='$rw->Address2',
		`Address3`='$rw->Address3',
		`City`='$rw->City',
		`State`='$rw->State',
		`ZIP`='$rw->ZIP',
		`Country`='$rw->Country',
		`Phone1`='$rw->Phone1',
		`Phone2`='$rw->Phone2',
		`Phone3`='$rw->Phone3',
		`MobilePhone`='$rw->MobilePhone',
		`Active`='$rw->Active',
		`Fax`='$rw->Fax',
		`Pager`='$rw->Pager',
		`con_flight_comments`='$rw->con_flight_comments',
		`arr_flight_id`='$rw->arr_flight_id',
		`arr_flightn_id`='$rw->arr_flightn_id',
		`arr_flightt_id`='$rw->arr_flightt_id',
		`arr_hotel_id`='$rw->arr_hotel_id',
		`arr_con_private_jet`='$rw->arr_con_private_jet',
		`dep_flight_id`='$rw->dep_flight_id',
		`dep_flightn_id`='$rw->dep_flightn_id',
		`dep_flightt_id`='$rw->dep_flightt_id',
		`dep_hotel_id`='$rw->dep_hotel_id',
		`dep_con_private_jet`='$rw->dep_con_private_jet',
		`is_completed`='$rw->is_completed',
		`is_email`='$rw->is_email',
		`cont_special_ins`='$rw->cont_special_ins'
		WHERE cont_id=1834";
		print($Query);
		mysql_query($Query);
	}
	print("<br><br>Completed! ".$counter." Records Updated");
}

if (isset($_REQUEST['udtRecord3'])) {
	$counter = 0;
	$rs=mysql_query("SELECT * FROM contacts WHERE cont_id=7011");
	print("Start Processing...<br><br>");
	while($rw=mysql_fetch_object($rs)){
		$Query = "UPDATE `travel_info` SET 
		`arrival_flight_data`='$rw->arrival_flight_data',
		`departure_flight_date`='$rw->departure_flight_date',
		`arrival_airline_id`='$rw->arrival_airline_id',
		`departure_airline_id`='$rw->departure_airline_id',
		`arrival_flight_no_id`='$rw->arrival_flight_no_id',
		`departure_flight_no_id`='$rw->departure_flight_no_id',
		`con_flight_comments`='$rw->con_flight_comments',
		`arr_flight_id`='$rw->arr_flight_id',
		`arr_flightn_id`='$rw->arr_flightn_id',
		`arr_flightt_id`='$rw->arr_flightt_id',
		`arr_hotel_id`='$rw->arr_hotel_id',
		`arr_con_private_jet`='$rw->arr_con_private_jet',
		`dep_flight_id`='$rw->dep_flight_id',
		`dep_flightn_id`='$rw->dep_flightn_id',
		`dep_flightt_id`='$rw->dep_flightt_id',
		`dep_hotel_id`='$rw->dep_hotel_id',
		`dep_con_private_jet`='$rw->dep_con_private_jet',
		`is_completed`='$rw->is_completed',
		`cont_special_ins`='$rw->cont_special_ins'
		WHERE cont_id=1834 AND grp_id=1303";
		print($Query);
		mysql_query($Query);
	}
	print("<br><br>Completed! ".$counter." Records Updated");
}

if (isset($_REQUEST['udtUserNames'])) {
	$counter = 0;
	$rs=mysql_query("SELECT cont_fname, ContactID FROM contacts WHERE ContactID > 9748");
	print("Start Processing...<br><br>");
	while($rw=mysql_fetch_object($rs)){
		$fName = explode(" ", $rw->cont_fname);
		$uName = $fName[0]."_".$rw->ContactID;
		$Query = "UPDATE users SET user_name='".$uName."' WHERE cont_id=".$rw->ContactID;
		print($Query."<br>");
		mysql_query($Query);
	}
	print("<br><br>Completed! ".$counter." Records Updated");
}

ob_end_flush();
?>
