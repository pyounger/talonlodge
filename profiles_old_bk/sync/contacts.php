<?php
ob_start();
session_start();
include("../../lib/openCon.php");
include("../../lib/functions.php");
if (isset($_REQUEST['getContacts'])) {
	$total_data = 0;
    $prf_counter = 0;
    $count_profiles = 0;

    //$rs2 = mysql_query("SELECT ContactID FROM contacts ORDER BY ContactID DESC LIMIT 0, 1");
	$rs2 = mysql_query("SELECT MAX(ContactID) AS ContactID FROM contacts");
    if (mysql_num_rows($rs2) > 0) {
        $row2 = mysql_fetch_object($rs2);
        $lastContactID = $row2->ContactID;
    } else {
        $lastContactID = 0;
    }
    
    //$rs = mysql_query("SELECT mii_last_import_id FROM max_import_id ORDER BY mii_id DESC LIMIT 0, 1");
	$rs = mysql_query("SELECT mii_last_import_id FROM max_import_id WHERE mii_id=1") or die(mysql_error());
    if (mysql_num_rows($rs) > 0) {
		$row = mysql_fetch_object($rs);
		$lastID = $row->mii_last_import_id;
    } else {
		$lastID = 0;
    }

    //$url = 'http://private.talonlodge.com/guests/talon_service.asp?function=getContacts&lastID=' . $lastID;
    //$live_prf_data = simplexml_load_file($url);
	//Mag_ContactID
	
    $url = utf8_encode(file_get_contents('http://private.talonlodge.com/guests/talon_service.asp?function=getContacts&lastID='.$lastID));
    $live_prf_data = simplexml_load_string($url);

    $qryMaxID = "coalesce((SELECT MAX(c.cont_id) as ID FROM contacts AS c), 0)+1";
    foreach ($live_prf_data as $details):
        //$prf_counter++;
        $isExist = chkExist("ContactID", "contacts", " WHERE Mag_ContactID=" . $details->ContactID);
        if ($isExist == 0) {
			$total_data++;
            $lastContactID++;
            //$count_profiles++;
            
            //if($count_profiles <= 10){
            
            mysql_query("INSERT INTO contacts (
                cont_id, 
		
                Mag_ContactID, 

                cont_fname, 
                cont_lname, 
                cust_id,
                ctype_id,
                cont_email,
                cont_address1,
                cont_address2,
                cont_city,
                cont_state,
                cont_zip,
                countries_id,
                cont_phone1,
                cont_phone2,
                CreatedDate,
                LastUpdated,
                
                ContactID,
                
                Name_Salutation,
                ContactFirstName,
                ContactMiddleName,
                ContactLastName,
                ContactFriendlyName,
                Company,
                Job_Title,
                CustomerID_FK,
                ContactTypeID_FK,
                Email,
                Email2,
                Email3,
                Address1,
                Address2,
                Address3,
                City,
                State,
                ZIP,
                Country,
                Phone1,
                Phone2,
                Phone3,
                MobilePhone,
                Active,
                Fax,
                Pager
                ) 
                VALUES(
                " . $qryMaxID . ",

                '" . dbStr($details->ContactID) . "',

                '" . dbStr($details->ContactFirstName) . "',
                '" . dbStr($details->ContactLastName) . "',
                '" . dbStr($details->CustomerID_FK) . "',
                '" . dbStr($details->ContactTypeID_FK) . "',
                '" . dbStr($details->Email) . "',
                '" . dbStr($details->Address1) . "',
                '" . dbStr($details->Address2) . "',
                '" . dbStr($details->City) . "',
                '" . dbStr($details->State) . "',
                '" . dbStr($details->ZIP) . "',
                '" . dbStr($details->Country) . "',
                '" . dbStr($details->Phone1) . "',
                '" . dbStr($details->Phone2) . "',
                '" . calendarDateConver3($details->CreatedDate) . "',
                '" . calendarDateConver3($details->LastUpdated) . "',
                
                '" . $lastContactID . "',

                '" . dbStr($details->Name_Salutation) . "',
                '" . dbStr($details->ContactFirstName) . "',
                '" . dbStr($details->ContactMiddleName) . "',
                '" . dbStr($details->ContactLastName) . "',
                '" . dbStr($details->ContactFriendlyName) . "',
                '" . dbStr($details->Company) . "',
                '" . dbStr($details->Job_Title) . "',
                '" . dbStr($details->CustomerID_FK) . "',
                '" . dbStr($details->ContactTypeID_FK) . "',
                '" . dbStr($details->Email) . "',
                '" . dbStr($details->Email2) . "',
                '" . dbStr($details->Email3) . "',
                '" . dbStr($details->Address1) . "',
                '" . dbStr($details->Address2) . "',
                '" . dbStr($details->Address3) . "',
                '" . dbStr($details->City) . "',
                '" . dbStr($details->State) . "',
                '" . dbStr($details->ZIP) . "',
                '" . dbStr($details->Country) . "',
                '" . dbStr($details->Phone1) . "',
                '" . dbStr($details->Phone2) . "',
                '" . dbStr($details->Phone3) . "',
                '" . dbStr($details->MobilePhone) . "',
                '" . dbStr($details->Active) . "',
                '" . dbStr($details->Fax) . "',
                '" . dbStr($details->Pager) . "'
                )");
            //}
			$last_Mag_ContactID = $details->ContactID;
        }
		if($total_data==0){
			$last_Mag_ContactID = $details->ContactID;
		}
    endforeach;

    // Get last Mag_ContactID from contacts table 
    //$rs1 = mysql_query("SELECT Mag_ContactID FROM contacts ORDER BY cont_id DESC LIMIT 0, 1");
	/*$rs1 = mysql_query("SELECT MAX(Mag_ContactID) AS Mag_ContactID FROM contacts");
    if (mysql_num_rows($rs1) > 0) {
        $row1 = mysql_fetch_object($rs1);
        $last_Mag_ContactID = $row1->Mag_ContactID;*/
		mysql_query("UPDATE max_import_id SET mii_last_import_id='".$last_Mag_ContactID."', mii_date=NOW() WHERE mii_id=1");
		/*$MaxID = getMaximum("max_import_id", "mii_id");
		mysql_query("INSERT INTO max_import_id (mii_id, mii_tbl, mii_last_import_id, mii_date) VALUES (".$MaxID.", 'contacts', '".$last_Mag_ContactID."', NOW())");*/
   /* }*/

    // print($lastID).'<br/>';
    // print($prf_counter);
    header("Location: ../manage_group.php?op=8&imp=".$total_data);
}
ob_end_flush();
?>
