<?php
ob_start();
session_start();
include("../../lib/openCon.php");
include("../../lib/functions.php");

if(isset($_REQUEST['getContacts'])){
$prf_counter=0;
$live_prf_data = simplexml_load_file('http://private.talonlodge.com/guests/talon_service.asp?function=getContacts');
$qryMaxID = "coalesce((SELECT MAX(c.cont_id) as ID FROM contacts AS c), 0)+1";
foreach ($live_prf_data as $details){
    $prf_counter++;
        //$existance_of_id = chkExist("ContactID", "contacts", " WHERE ContactID=".$details->ContactID." ");
		//if(!$existance_of_id){
		$isExist = chkExist("ContactID", "contacts", " WHERE ContactID=".$details->ContactID);
		if($isExist==0){
            //$cont_id = getMaximum("contacts","cont_id");
              mysql_query("INSERT INTO contacts (
                cont_id, 
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
                ContactFirstName,
                ContactLastName,
                ContactFriendlyName,
                CustomerID_FK,
                ContactTypeID_FK,
                Email,
                Address1,
                Address2,
                City,
                State,
                ZIP,
                Country,
                Phone1,
                Phone2,
                Phone3,
                Active

                ) 
                VALUES(
                ".$qryMaxID.",
                '".dbStr($details->ContactFirstName)."',
                '".dbStr($details->ContactLastName)."',
                '".dbStr($details->CustomerID_FK)."',
                '".dbStr($details->ContactTypeID_FK)."',
                '".dbStr($details->Email)."',
                '".dbStr($details->Address1)."',
                '".dbStr($details->Address2)."',
                '".dbStr($details->City)."',
                '".dbStr($details->State)."',
                '".dbStr($details->ZIP)."',
                '".dbStr($details->Country)."',
                '".dbStr($details->Phone1)."',
                '".dbStr($details->Phone2)."',
                '".calendarDateConver3($details->CreatedDate)."',
                '".calendarDateConver3($details->LastUpdated)."',
                '".dbStr($details->ContactID)."',
                '".dbStr($details->ContactFirstName)."',
                '".dbStr($details->ContactLastName)."',
                '".dbStr($details->ContactFriendlyName)."',
                '".dbStr($details->CustomerID_FK)."',
                '".dbStr($details->ContactTypeID_FK)."',
                '".dbStr($details->Email)."',
                '".dbStr($details->Address1)."',
                '".dbStr($details->Address2)."',
                '".dbStr($details->City)."',
                '".dbStr($details->State)."',
                '".dbStr($details->ZIP)."',
                '".dbStr($details->Country)."',
                '".dbStr($details->Phone1)."',
                '".dbStr($details->Phone2)."',
                '".dbStr($details->Phone3)."',
                '".dbStr($details->Active)."'

                )")
                or die(mysql_error());
        }
	}
	header("Location: ../manage_profile.php?op=7");
}

ob_end_flush();
?>
