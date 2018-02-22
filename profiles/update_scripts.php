<?php
ob_start();
session_start();
include("lib/openCon.php");
include("lib/functions.php");
$tcount = 0;
if (isset($_REQUEST['sendEmails'])) {
	require_once("lib/class.pager1.php");
	$p = new Pager1;
	$ecount=0;
	$Query = "
	SELECT us.cont_id, us.user_name, us.user_pasphrase, co.ContactID, co.cont_fname, co.cont_lname, co.cont_email  
	FROM users AS us 
	LEFT OUTER JOIN contacts AS co ON us.cont_id = co.ContactID 
	WHERE co.cont_email != '' AND co.cont_email IS NOT NULL ";
    $limit = 100;
    $start = $p->findStart($limit);
    $count = mysql_num_rows(mysql_query($Query));
    $pages = $p->findPages($count, $limit);
    $rs = mysql_query($Query . " LIMIT " . $start . ", " . $limit);
	if($count>0){
		while($row=mysql_fetch_object($rs)){
			$Query = mysql_query("SELECT * FROM auto_email WHERE ae_id=1");
			$results = mysql_num_rows($Query);
			if($results>0){
				$ecount++;
				$name = trim($row->cont_fname.' '.$row->cont_lname);
				$user_name = trim($row->user_name);
				$email = trim($row->cont_email);
				$password = trim($row->user_pasphrase);
				$pid = trim($row->ContactID);
				$em_row = mysql_fetch_object($Query);
				$fromMail = $em_row->ae_from;
				$subject  = $em_row->ae_subject;
				$message = str_replace("[NAME]", $name, $em_row->ae_text);
				$message = str_replace("[EMAIL]", $user_name, $message);
				$message = str_replace("[PASSWORD]", $password, $message);
				$message = str_replace("[PROFILEID]", $pid, $message);
				$message = '<html><head><title>'.$subject.'</title></head><body> '. $message .' </body></html>';
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From: Guest Services <guestservices@talonlodge.com>' . "\r\n";
				// @mail($email, $subject, $message, $headers);
				// @mail("guestservices@talonlodge.com", $subject, $message, $headers);
				// @mail("mrumarayazz@gmail.com", $subject, $message, $headers);
			}
		}
	}
	if ($count>0 && $count>100) {
		$param = '&sendEmails=1';
		$next_prev = $p->nextPrev($_GET['page'], $pages, $param);
		print($next_prev);
	}
	print("<br>".$ecount." emails send <br><br> ");
}
if (isset($_REQUEST['createNeededTables'])) {
	mysql_query("CREATE TABLE IF NOT EXISTS `logs` (
	`log_id` bigint(255) unsigned NOT NULL,
	`cont_id` bigint(255) unsigned NOT NULL,
	`ContactID` bigint(255) unsigned NOT NULL,
	`user_id` bigint(255) unsigned NOT NULL,
	`log_datetime` datetime NOT NULL,
	`log_type` smallint(1) unsigned zerofill DEFAULT '0',
	`tinfo_id` bigint(22) unsigned DEFAULT '0',
	`grp_id` bigint(22) unsigned DEFAULT '0',
	PRIMARY KEY (`log_id`)
	) ENGINE=MyISAM DEFAULT CHARSET=latin1") or die(mysql_error());
	print(" logs table created <br><br>");

	mysql_query("CREATE TABLE IF NOT EXISTS `travel_info` (
	`tinfo_id` bigint(22) unsigned NOT NULL,
	`cont_id` bigint(22) unsigned NOT NULL,
	`grp_id` bigint(22) unsigned NOT NULL,
	`Pms_Booking_ID` bigint(22) unsigned DEFAULT NULL,
	`CreatedDate` datetime DEFAULT NULL,
	`LastUpdated` datetime DEFAULT NULL,
	`arrival_flight_data` datetime NOT NULL,
	`departure_flight_date` datetime NOT NULL,
	`arrival_airline_id` int(11) unsigned NOT NULL,
	`departure_airline_id` int(22) unsigned NOT NULL,
	`arrival_flight_no_id` int(22) unsigned NOT NULL,
	`departure_flight_no_id` int(22) unsigned NOT NULL,
	`ContactID` bigint(22) NOT NULL,
	`con_flight_comments` text NOT NULL,
	`arr_flight_id` bigint(22) unsigned NOT NULL,
	`arr_flightn_id` bigint(22) unsigned NOT NULL,
	`arr_flightt_id` varchar(255) NOT NULL,
	`arr_hotel_id` bigint(22) unsigned NOT NULL,
	`arr_con_private_jet` varchar(300) NOT NULL,
	`dep_flight_id` bigint(22) unsigned NOT NULL,
	`dep_flightn_id` bigint(22) unsigned NOT NULL,
	`dep_flightt_id` varchar(255) NOT NULL,
	`dep_hotel_id` bigint(22) unsigned NOT NULL,
	`dep_con_private_jet` varchar(300) NOT NULL,
	`is_completed` smallint(1) NOT NULL DEFAULT '0',
	`cont_special_ins` text NOT NULL,
	`Mag_ContactID` bigint(22) unsigned DEFAULT '0',
	PRIMARY KEY (`tinfo_id`)
	) ENGINE=MyISAM DEFAULT CHARSET=latin1") or die(mysql_error());
	print(" travel_info table created <br><br>");

	mysql_query("ALTER TABLE `contact_profiles` ADD `grp_id` BIGINT(22) UNSIGNED NULL DEFAULT '0' AFTER `jacketsize_id`, ADD `Pms_Booking_ID` BIGINT(22) UNSIGNED NOT NULL DEFAULT '0' AFTER `grp_id`") or die(mysql_error());
	print(" contact_profiles table updated <br><br>");

	mysql_query("ALTER TABLE `contact_profile_details` ADD `grp_id` BIGINT(22) UNSIGNED NOT NULL DEFAULT '0' AFTER `cont_id`, ADD `Pms_Booking_ID` BIGINT(22) UNSIGNED NOT NULL DEFAULT '0' AFTER `grp_id`") or die(mysql_error());
	print(" contact_profiles table updated <br><br>");
}
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
if (isset($_REQUEST['addUsersFromContacts'])) {
	$ucounter = 0;
	mysql_query("INSERT INTO users (user_id, user_name, user_pass, user_display_name, utype_id, cust_id, cont_id, createdDate, user_pasphrase) VALUES ('1', 'admin@hotmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '0', '0', '0', NOW(), 'admin')");
	$rsM = mysql_query("SELECT c.cont_fname, c.cont_lname, c.cust_id, c.ContactID FROM contacts AS c");
	if(mysql_num_rows($rsM)>0){
		while($row= mysql_fetch_object($rsM)){
			$ucounter++;
			$MaxID = getMaximum("users", "user_id");
			$user_name = $row->cont_fname.'_'.$row->ContactID;
			$user_display_name = $row->cont_fname.' '.$row->cont_lname;
			mysql_query("INSERT INTO users (user_id, user_name, user_pass, user_display_name, utype_id, cust_id, cont_id, createdDate, user_pasphrase) VALUES ('".$MaxID."', '".$user_name."', '2f23fa3579f3f75175793649115c1b25', '".$user_display_name."', '3', '".$row->cust_id."', '".$row->ContactID."', NOW(), 'Pass123')");
		}
	}
	print($ucounter." records inserted.");
}
ob_end_flush();
?>