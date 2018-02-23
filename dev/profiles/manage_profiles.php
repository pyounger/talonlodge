<?php include('includes/php_includes_top.php'); ?>
<?php

if((isset($_REQUEST['guest_name']))){
    if($_REQUEST['guest_name'] == ''){
        $_SESSION['guest_name'] = 'Enter guest name';
    } else {
        $_SESSION['guest_name'] = $_REQUEST['guest_name'];
    }
} else if(isset($_SESSION['guest_name'])){
    //$_SESSION['guest_name'] = $_SESSION['guest_name'];
} else {
    $_SESSION['guest_name'] = 'Enter guest name';
}


if (isset($_REQUEST['grp_id'])) {
    $_SESSION['group_id'] = $_REQUEST['grp_id'];
} else {
    if (!isset($_SESSION['group_id'])) {
        $_SESSION['group_id'] = 0;
    } else if(isset($_REQUEST['contactid'])){
        $_SESSION['group_id'] = returnName("grp_id", "contacts", "ContactID", $_REQUEST['contactid']);
    }
}

if((isset($_REQUEST['limit_of_rec']))&&($_REQUEST['limit_of_rec']!='')){
    $_SESSION['limit_of_rec'] = $_REQUEST['limit_of_rec'];
} else if(isset($_SESSION['limit_of_rec'])){
    //$_SESSION['group_name'] = $_SESSION['group_name'];
} else {
    $_SESSION['limit_of_rec'] = '200';
}
if (isset($_REQUEST['send'])) {
    $rs = mysql_query("SELECT * FROM users WHERE cont_id=" . $_REQUEST['contactid']);
    if (mysql_num_rows($rs) > 0) {
        $row = mysql_fetch_object($rs);
        mysql_query("UPDATE contacts SET is_email = (is_email + 1) WHERE ContactID = ".$_REQUEST['contactid']."");
        emailToCustomer(dbStr($row->user_name), dbStr($row->user_pasphrase), dbStr($row->user_display_name), dbStr($_REQUEST['contactid']));
        $strMSG = " Login Info sent ";
        $class = "alert alert-success";
    } else {
        $MaxID = getMaximum("users", "user_id");
        $rs = mysql_query("SELECT * FROM contacts WHERE ContactID=" . $_REQUEST['contactid']);
        if(mysql_num_rows($rs)>0){
            $row = mysql_fetch_object($rs);
            $random_password = substr(number_format(time() * rand(),0,'',''),0,8);
            if($row->Email!=''){
                if($_REQUEST['send']==1){
                    //Guest Profile
                    $contact_name = dbStr($row->ContactFirstName).' '.dbStr($row->ContactLastName);
                    mysql_query("INSERT INTO users (user_id, user_name, user_pass, user_display_name, utype_id, cust_id, cont_id, createdDate, user_pasphrase) VALUES (".$MaxID.", '".dbStr($row->Email)."', '".md5($random_password)."', '".$contact_name."', '3', ".$row->cust_id.", ".$row->ContactID.", NOW(), '".$random_password."')");
                    
                    $rs1 = mysql_query("SELECT * FROM users WHERE cont_id=" . $_REQUEST['contactid']);
                    if (mysql_num_rows($rs1) > 0) {
                        $row1 = mysql_fetch_object($rs1);
                        mysql_query("UPDATE contacts SET is_email = (is_email + 1) WHERE ContactID = ".$_REQUEST['contactid']."");
                        emailToCustomer(dbStr($row1->user_name), dbStr($row1->user_pasphrase), dbStr($row1->user_display_name), dbStr($_REQUEST['contactid']));
                    }
                    $strMSG = " Login Info sent ";
                    $class = "alert alert-success";
                } else {
                    //Group Lead Profile
                    $contact_name = dbStr($row->ContactFirstName).' '.dbStr($row->ContactLastName);
                    mysql_query("INSERT INTO users (user_id, user_name, user_pass, user_display_name, utype_id, cust_id, cont_id, createdDate, user_pasphrase) VALUES (".$MaxID.", '".dbStr($row->Email)."', '".md5($random_password)."', '".$contact_name."', '2', ".$row->cust_id.", ".$row->ContactID.", NOW(), '".$random_password."')") or die(mysql_error());
                    $rs1 = mysql_query("SELECT * FROM users WHERE cont_id=" . $_REQUEST['contactid']);
                    if (mysql_num_rows($rs1) > 0) {
                        $row1 = mysql_fetch_object($rs1);
                        mysql_query("UPDATE contacts SET is_email = (is_email + 1) WHERE ContactID = ".$_REQUEST['contactid']."");
                        emailToCustomer(dbStr($row1->user_name), dbStr($row1->user_pasphrase), dbStr($row1->user_display_name), dbStr($_REQUEST['contactid']));
                    }
                    $strMSG = " Login Info sent ";
                    $class = "alert alert-success";
                }
            } else {
                $strMSG = " Email Address does not exists ";
                $class = "alert alert-danger";
            }
        } else {
            $strMSG = " Email Address does not exists ";
            $class = "alert alert-danger";
        }    
    }
}
if (isset($_REQUEST['action'])) {
    if (isset($_REQUEST['btnAdd'])) {
        $contid = getMaximum("contacts", "cont_id");
        $ContactID = getMaximum("contacts", "ContactID");
		$Mag_ContactID = returnName("Mag_ContactID", "contacts", "ContactID", $ContactID);
        $contpid = getMaximum("contact_profiles", "conp_id");
        $cpdid = getMaximum("contact_profile_details", "cpd_id");
        //$Pms_Booking_ID = getMaximum("group_contacts", "Pms_Booking_ID");
        @$gcont_id = getMaximum("group_contacts", "gcont_id");
        @$Pms_Booking_ID = returnName("Pms_Booking_ID", "groups", "grp_id", $_REQUEST['grp_id']);
		@$GroupName = returnName("GroupName", "groups", "grp_id", $_REQUEST['grp_id']);
        @$grp_arrival_date = returnName("GroupArrivalDate", "groups", "grp_id", $_REQUEST['grp_id']);

        if($_REQUEST['arr_flightt_id1']!=''){
                $arr_flightt_id = $_REQUEST['arr_flightt_id1'];
        } else if($_REQUEST['arr_flightt_id2']!=''){
                $arr_flightt_id = $_REQUEST['arr_flightt_id2'];
        } else {
                $arr_flightt_id = '';
        }
        if($_REQUEST['dep_flightt_id1']!=''){
                $dep_flightt_id = $_REQUEST['dep_flightt_id1'];
        } else if($_REQUEST['dep_flightt_id2']!=''){
                $dep_flightt_id = $_REQUEST['dep_flightt_id2'];
        } else {
                $dep_flightt_id = '';
        }

        mysql_query("INSERT INTO group_contacts (gcont_id, Mag_ContactID, grp_id, Pms_Booking_ID, ContactID, GroupArrivalDate, createdDate) VALUES(".$gcont_id.", ".$Mag_ContactID.", '".$_REQUEST['grp_id']."', '".$Pms_Booking_ID."', ".$ContactID.", '".$grp_arrival_date."', NOW())") or die(mysql_error());

        $pic = "";
        if (!empty($_FILES["photo"]["name"])) {
            $target = "files/contents/";
            $target = $target . basename($_FILES['photo']['name']);
            $pic = $ContactID . '_' . $_FILES['photo']['name'];
            if (move_uploaded_file($_FILES['photo']['tmp_name'], "files/contents/" . $ContactID . '_' . $_FILES['photo']['name'])) {
            }
        }
        
        if(isset($_REQUEST['is_completed'])){
            $is_completed = $_REQUEST['is_completed'];
        } else {
            $is_completed = '0';
        }

        if($_REQUEST['countries_id']==223){
            $state_name = $_REQUEST['cont_state1'];
        } else {
            $state_name = $_REQUEST['cont_state2'];
        }
        
        mysql_query("
            INSERT INTO contacts
            (
            cont_id,
            grp_id,
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
            ContactID,
            ContactFirstName,
            ContactLastName,
            Email,
            Address1,
            Address2,
            City,
            State,
            ZIP,
            Country,
            Phone1,
            Phone2,
            emg_contact_name,
            cont_image,
            gen_id,
            arrival_flight_data,
            departure_flight_date,
            con_flight_comments,
            arr_flight_id,
            arr_flightn_id,
            arr_flightt_id,
            arr_hotel_id,
            arr_con_private_jet,
            dep_flight_id,
            dep_flightn_id,
            dep_flightt_id,
            dep_hotel_id,
            dep_con_private_jet,
            is_completed
            )
            VALUES
            (
            "  . dbStr($contid) . ",
            '" . dbStr($_REQUEST['grp_id']) . "',
            '" . dbStr($_REQUEST['cont_fname']) . "',
            '" . dbStr($_REQUEST['cont_lname']) . "',
            "  . dbStr($ContactID) . ",
            '3',
            '" . dbStr($_REQUEST['cont_email']) . "',
            '" . dbStr($_REQUEST['cont_address1']) . "',
            '" . dbStr($_REQUEST['cont_address2']) . "',
            '" . dbStr($_REQUEST['cont_city']) . "',
            '" . dbStr($state_name) . "',
            '" . dbStr($_REQUEST['cont_zip']) . "',
            '" . dbStr($_REQUEST['countries_id']) . "',
            '" . dbStr($_REQUEST['cont_phone1']) . "',
            '" . dbStr($_REQUEST['cont_phone2']) . "',
            NOW(),
            "  . dbStr($ContactID) . ",
            '" . dbStr($_REQUEST['cont_fname']) . "',
            '" . dbStr($_REQUEST['cont_lname']) . "',
            '" . dbStr($_REQUEST['cont_email']) . "',
            '" . dbStr($_REQUEST['cont_address1']) . "',
            '" . dbStr($_REQUEST['cont_address2']) . "',
            '" . dbStr($_REQUEST['cont_city']) . "',
            '" . dbStr($state_name) . "',
            '" . dbStr($_REQUEST['cont_zip']) . "',
            '" . dbStr($_REQUEST['countries_id']) . "',
            '" . dbStr($_REQUEST['cont_phone1']) . "',
            '" . dbStr($_REQUEST['cont_phone2']) . "',
            '" . dbStr($_REQUEST['emg_contact_name']) . "',
            '" . $pic . "',
            '" . dbStr($_REQUEST['gen_id']) . "',
            '" . calendarDateConver4($_REQUEST['arrival_flight_data'])."',
            '".  calendarDateConver4($_REQUEST['departure_flight_date'])."',
            '" . dbStr(@$_REQUEST['con_flight_comments']) . "',
            '" . dbStr(@$_REQUEST['arr_flight_id']) . "',
            '" . dbStr(@$_REQUEST['arr_flightn_id']) . "',
            '" . dbStr(@$arr_flightt_id) . "',
            '" . dbStr(@$_REQUEST['arr_hotel_id']) . "',
            '" . dbStr(@$_REQUEST['arr_con_private_jet']) . "',
            '" . dbStr(@$_REQUEST['dep_flight_id']) . "',
            '" . dbStr(@$_REQUEST['dep_flightn_id']) . "',
            '" . dbStr(@$dep_flightt_id) . "',
            '" . dbStr(@$_REQUEST['dep_hotel_id']) . "',
            '" . dbStr(@$_REQUEST['dep_con_private_jet']) . "',
            '" . dbStr($is_completed) . "'
            )
        ");
        
        $userid = getMaximum("users", "user_id");
        $random_number = substr(number_format(time() * rand(), 0, '', ''), 0, 8);
        $contact_name = dbStr($_REQUEST['cont_fname']).' '.dbStr($_REQUEST['cont_lname']);
        mysql_query("INSERT INTO users(user_id, user_name, user_pass, user_display_name, utype_id, cust_id, cont_id, createdDate, user_pasphrase) VALUES(" . $userid . ",'" . dbStr($_REQUEST['cont_email']) . "', '" . md5($random_number) . "','" .$contact_name. "', '3', '".$ContactID."', '" . $ContactID . "', NOW(), '" . $random_number . "')");
        
        mysql_query("INSERT INTO contact_profiles(conp_id,createdDate,conp_age,bootsize_id,jacketsize_id,conp_comments,cont_id)
        VALUES ('" . $contpid . "',NOW(),'" . $_REQUEST['conp_age'] . "','" . $_REQUEST['bootsize_id'] . "','" . $_REQUEST['jacketsize_id'] . "','" . dbStr($_REQUEST['conp_comments']) . "','" . $ContactID . "')
        ");
        if(isset($_REQUEST['chkactivites'])){
            mysql_query("DELETE FROM contact_activities WHERE conp_id=".$contpid."");
            for ($i=0; $i<count($_REQUEST['chkactivites']); $i++) {
                mysql_query("INSERT INTO contact_activities (conp_id, act_id, date_added)
                values('" . $contpid . "','" . dbStr($_REQUEST['chkactivites'][$i]) . "',CURDATE())");
            }
        }
	
        mysql_query("DELETE FROM contact_profile_details WHERE conp_id=".$contpid."");
        for ($i=0; $i<count($_REQUEST['quest']); $i++) {
            @$yes_no_val = explode('_',$_REQUEST['yes_no_value'][$i]);
            $MaxID = getMaximum("contact_profile_details", "cpd_id");
            $udtQuery2 = "INSERT INTO contact_profile_details (cpd_id, conp_id, question_id, istrue, cpd_answer, createdDate, cont_id)
            VALUES (".$MaxID.", '".$contpid."', '".dbStr($_REQUEST['quest'][$i])."', '".(($yes_no_val[1]!='')?$yes_no_val[1]:'')."', '".dbStr($_REQUEST['ans'][$i])."', NOW(), '".$ContactID."')";
            mysql_query($udtQuery2);
        }

        if(isset($_REQUEST['grp_id'])){
            $grp = $_REQUEST['grp_id'];
        } else if($_SESSION['group_id']!=0){
            $grp = $_SESSION['group_id'];
        }
        $grp_name = returnName("GroupName", "groups", "grp_id", $grp);
        $gcid     = returnName("Contact_ID", "groups", "grp_id", $grp);
        $glname   = returnName("ContactFirstName", "contacts", "ContactID", $gcid);
        if(isset($_REQUEST['is_completed'])){
            $is_completed = $_REQUEST['is_completed'];
            $contact_name = dbStr($_REQUEST['cont_fname']).' '.dbStr($_REQUEST['cont_lname']);
			//if(isset($_REQUEST['send_email'])){
            	profile_completed_updated(dbStr($_REQUEST['cont_email']), $contact_name, dbStr($ContactID), dbStr($grp_name), dbStr($glname), dbStr("Completed"));
			//}
        } else {
            $is_completed = '0';
            $contact_name = dbStr($_REQUEST['cont_fname']).' '.dbStr($_REQUEST['cont_lname']);
            //if(isset($_REQUEST['send_email'])){
				profile_completed_updated(dbStr($_REQUEST['cont_email']), $contact_name, dbStr($ContactID), dbStr($grp_name), dbStr($glname), dbStr("Added"));
			//}
        }
        
        header("Location: " . $_SERVER['PHP_SELF'] . "?op=1");
        
        
        
    } elseif (isset($_REQUEST['btnUpdate'])) {
        
        $pic = @$_REQUEST['old_img'];
        if($_FILES['photo']['name']!=''){
            $target = "files/contents/";
            @unlink($target . $_REQUEST['old_img']);
            $target = $target . basename($_FILES['photo']['name']);
            $pic = ($_REQUEST['contactid'] . '_' . $_FILES['photo']['name']);
            if (move_uploaded_file($_FILES['photo']['tmp_name'], "files/contents/" . $_REQUEST['contactid'] . '_' . $_FILES['photo']['name'])) {

            }
        }

        if(isset($_REQUEST['is_completed'])){
            $is_completed = $_REQUEST['is_completed'];
        } else {
            $is_completed = '0';
        }
        
        $arr_flightn_id = '';
        $arr_flightt_id = '';
        $arr_hotel_id = '';
        $arr_con_private_jet = '';
        if($_REQUEST['arr_flight_id']==1){
            $arr_flightn_id = $_REQUEST['arr_flightn_id'];
            $arr_flightt_id = $_REQUEST['arr_flightt_id1'];
        } else if($_REQUEST['arr_flight_id']==2){
            $arr_flightt_id = $_REQUEST['arr_flightt_id2'];
        } else if($_REQUEST['arr_flight_id']==3){
            $arr_con_private_jet = $_REQUEST['arr_con_private_jet'];
        } else if($_REQUEST['arr_flight_id']==4){
            $arr_hotel_id = $_REQUEST['arr_hotel_id'];
        }

        $dep_flightn_id = '';
        $dep_flightt_id = '';
        $dep_hotel_id = '';
        $dep_con_private_jet = '';
        if($_REQUEST['dep_flight_id']==1){
            $dep_flightn_id = $_REQUEST['dep_flightn_id'];
            $dep_flightt_id = $_REQUEST['dep_flightt_id1'];
        } else if($_REQUEST['dep_flight_id']==2){
            $dep_flightt_id = $_REQUEST['dep_flightt_id2'];
        } else if($_REQUEST['dep_flight_id']==3){
            $dep_con_private_jet = $_REQUEST['dep_con_private_jet'];
        } else if($_REQUEST['dep_flight_id']==4){
            $dep_hotel_id = $_REQUEST['dep_hotel_id'];
        }
        if($_REQUEST['countries_id']==223){
            $state_name = $_REQUEST['cont_state1'];
        } else {
            $state_name = $_REQUEST['cont_state2'];
        }

        $country_name = returnName("countries_name", "countries", "countries_id", $_REQUEST['countries_id']);
        $udtQuery = "UPDATE contacts SET 
            ".((isset($_REQUEST['grp_id'])?"grp_id='".$_REQUEST['grp_id']."',":''))."
            cont_fname='" . dbStr($_REQUEST['cont_fname']) . "',
            cont_lname='" . dbStr($_REQUEST['cont_lname']) . "',
            emg_contact_name='" . dbStr($_REQUEST['emg_contact_name']) . "',
            cont_email='" . dbStr($_REQUEST['cont_email']) . "',
            cont_address1='" . dbStr($_REQUEST['cont_address1']) . "',
            cont_address2='" . dbStr($_REQUEST['cont_address2']) . "',
            cont_city='" . dbStr($_REQUEST['cont_city']) . "',
            cont_state='" . dbStr($state_name) . "',
            cont_zip='" . dbStr($_REQUEST['cont_zip']) . "',
            countries_id='" . dbStr($_REQUEST['countries_id']) . "',
            cont_phone1='" . dbStr($_REQUEST['cont_phone1']) . "',
            cont_phone2='" . dbStr($_REQUEST['cont_phone2']) . "',
            lastUpdated=NOW(),
            cont_image='" . $pic . "',
            gen_id='" . dbStr($_REQUEST['gen_id']) . "',
            arrival_flight_data='" . calendarDateConver4($_REQUEST['arrival_flight_data'])."',
            departure_flight_date='".calendarDateConver4($_REQUEST['departure_flight_date'])."',
            con_flight_comments='" . dbStr($_REQUEST['con_flight_comments']) . "',
            
            arr_flight_id='" . dbStr($_REQUEST['arr_flight_id']) . "',
            arr_flightn_id='" . dbStr($arr_flightn_id) . "',
            arr_flightt_id='" . dbStr($arr_flightt_id) . "',
            arr_hotel_id='" . dbStr($arr_hotel_id) . "',
            arr_con_private_jet='" . dbStr($arr_con_private_jet) . "',
            
            dep_flight_id='" . dbStr($_REQUEST['dep_flight_id']) . "',
            dep_flightn_id='" . dbStr($dep_flightn_id) . "',
            dep_flightt_id='" . dbStr($dep_flightt_id) . "',
            dep_hotel_id='" .dbStr($dep_hotel_id) . "',
            dep_con_private_jet='" . dbStr($dep_con_private_jet) . "',
            
            ContactFirstName='" . dbStr(@$_REQUEST['cont_fname']) . "',
            ContactLastName='" . dbStr(@$_REQUEST['cont_lname']) . "',
            Email='" . dbStr(@$_REQUEST['cont_email']) . "',
            Address1='" . dbStr(@$_REQUEST['cont_address1']) . "',
            Address2='" . dbStr(@$_REQUEST['cont_address2']) . "',
            City='" . dbStr(@$_REQUEST['cont_city']) . "',
            State='" . dbStr($state_name) . "',
            ZIP='" . dbStr(@$_REQUEST['cont_zip']) . "',
            Country='" . dbStr($country_name) . "',
            Phone1='" . dbStr(@$_REQUEST['cont_phone1']) . "',
            Phone2='" . dbStr(@$_REQUEST['cont_phone2']) . "',
            is_completed = ".dbStr($is_completed)."
        WHERE
        ContactID=" . $_REQUEST['contactid'];
        mysql_query($udtQuery);
       
        if(isset($_REQUEST['grp_id'])){
            @$gcont_id = getMaximum("group_contacts", "gcont_id");
            @$Pms_Booking_ID = returnName("Pms_Booking_ID", "groups", "grp_id", $_REQUEST['grp_id']);
            @$grp_arrival_date = returnName("GroupArrivalDate", "groups", "grp_id", $_REQUEST['grp_id']);
            
            $isexist = chkExist("gcont_id", "group_contacts", " WHERE grp_id=".$_REQUEST['grp_id']." AND Pms_Booking_ID=".@$Pms_Booking_ID." AND ContactID=".$_REQUEST['contactid']." AND GroupArrivalDate='".@$grp_arrival_date."' ");
            if($isexist>0){
                mysql_query("UPDATE group_contacts SET grp_id=".$_REQUEST['grp_id'].", Pms_Booking_ID=".@$Pms_Booking_ID.", ContactID=".$_REQUEST['contactid'].", GroupArrivalDate='".@$grp_arrival_date."', lastUpdated=NOW() WHERE grp_id=".$_REQUEST['grp_id']." AND Pms_Booking_ID=".@$Pms_Booking_ID." AND ContactID=".$_REQUEST['contactid']." AND GroupArrivalDate='".@$grp_arrival_date."' ");
            } else {
                mysql_query("INSERT INTO group_contacts (gcont_id, grp_id, Pms_Booking_ID, ContactID, GroupArrivalDate, createdDate) VALUES(" . $gcont_id . ", '" . $_REQUEST['grp_id'] . "', '" . $Pms_Booking_ID . "', " . $_REQUEST['contactid'] . ", '" . $grp_arrival_date . "', NOW())");
            }
        }

        $contact_name = dbStr($_REQUEST['cont_fname']).' '.dbStr($_REQUEST['cont_lname']);
        mysql_query("UPDATE users SET user_name='" . dbStr($_REQUEST['cont_email']) . "', user_display_name='" .$contact_name. "', lastUpdated=NOW() WHERE cont_id=" . $_REQUEST['contactid']);

        $conp_id = chkExist("conp_id", "contact_profiles", " WHERE cont_id=".$_REQUEST['contactid']."");
        if($conp_id>0){
            mysql_query("UPDATE contact_profiles SET conp_comments='" . dbStr($_REQUEST['conp_comments']) . "', lastUpdated=NOW(), conp_age='" . $_REQUEST['conp_age'] . "', bootsize_id='" . $_REQUEST['bootsize_id'] . "', jacketsize_id='" . $_REQUEST['jacketsize_id'] . "' WHERE cont_id=" . $_REQUEST['contactid']) or die(mysql_error());
        } else {
            $conp_id = getMaximum("contact_profiles", "conp_id");
            mysql_query("INSERT INTO contact_profiles (conp_id, cont_id, conp_comments, createdDate, conp_age, bootsize_id, jacketsize_id) VALUES (".$conp_id.", '".$_REQUEST['contactid']."', '".dbStr($_REQUEST['conp_comments'])."', NOW(), '".$_REQUEST['conp_age']."', '".$_REQUEST['bootsize_id']."', '".$_REQUEST['jacketsize_id']."')") or die(mysql_error());
        }
        mysql_query("DELETE FROM contact_profile_details WHERE conp_id=".$conp_id."");
        for ($i=0; $i<count($_REQUEST['quest']); $i++) {
            @$yes_no_val = explode('_',$_REQUEST['yes_no_value'][$i]);
            $MaxID = getMaximum("contact_profile_details", "cpd_id");
            $udtQuery2 = "INSERT INTO contact_profile_details (cpd_id, conp_id, question_id, istrue, cpd_answer, createdDate, cont_id)
            VALUES (".$MaxID.", '".$conp_id."', '".dbStr($_REQUEST['quest'][$i])."', '".(($yes_no_val[1]!='')?$yes_no_val[1]:'')."', '".dbStr($_REQUEST['ans'][$i])."', NOW(), '".$_REQUEST['contactid']."')";
            mysql_query($udtQuery2);
        }
        
        mysql_query("DELETE FROM contact_activities WHERE conp_id=".$conp_id."");
        if(isset($_REQUEST['chkactivites'])){
            for ($i=0; $i<count($_REQUEST['chkactivites']); $i++) {
                mysql_query("INSERT INTO contact_activities (conp_id, act_id, date_added) VALUES ('" . $conp_id . "','" . dbStr($_REQUEST['chkactivites'][$i]) . "',CURDATE())");
            }
        }

        if(isset($_REQUEST['grp_id'])){
            $grp = $_REQUEST['grp_id'];
        } else if($_SESSION['group_id']!=0){
            $grp = $_SESSION['group_id'];
        }
        $grp_name = returnName("GroupName", "groups", "grp_id", $grp);
        $gcid     = returnName("Contact_ID", "groups", "grp_id", $grp);
        $glname   = returnName("ContactFirstName", "contacts", "ContactID", $gcid);
        if(isset($_REQUEST['is_completed'])){
            $is_completed = $_REQUEST['is_completed'];
            $contact_name = dbStr($_REQUEST['cont_fname'].' '.$_REQUEST['cont_lname']);
			if(isset($_REQUEST['send_email'])){
            	profile_completed_updated(dbStr($_REQUEST['cont_email']), $contact_name, dbStr($_REQUEST['contactid']), dbStr($grp_name), dbStr($glname), dbStr('Completed'));
			}
        } else {
            $is_completed = '0';
            $contact_name = dbStr($_REQUEST['cont_fname'].' '.$_REQUEST['cont_lname']);
			if(isset($_REQUEST['send_email'])){
            	profile_completed_updated(dbStr($_REQUEST['cont_email']), $contact_name, dbStr($_REQUEST['contactid']), dbStr($grp_name), dbStr($glname), dbStr('Updated'));
			}
        }

        header("Location: " . $_SERVER['PHP_SELF'] . "?op=2");
    } elseif ($_REQUEST['action'] == 2) {

        $rsM = mysql_query("SELECT c.*, cp.* FROM contacts As c LEFT OUTER JOIN contact_profiles AS cp ON c.ContactID=cp.cont_id WHERE c.ContactID=" . $_REQUEST['contactid'] . " LIMIT 1");
         
        if (mysql_num_rows($rsM) > 0) {
            $rsMem = mysql_fetch_object($rsM);
            $cont_id = $rsMem->cont_id;
            $ContactID = $rsMem->ContactID;
            $grp_id = $rsMem->grp_id;
            $cont_fname = $rsMem->cont_fname;
            $cont_lname = $rsMem->cont_lname;
            $emg_contact_name = $rsMem->emg_contact_name;
            $cust_id = $rsMem->cust_id;
            $ctype_id = $rsMem->ctype_id;
            $cont_emial = $rsMem->cont_email;
            $cont_address1 = $rsMem->cont_address1;
            $cont_address2 = $rsMem->cont_address2;
            $cont_city = $rsMem->cont_city;
            $cont_state = $rsMem->cont_state;
            $cont_zip = $rsMem->cont_zip;
            $countries_id = $rsMem->countries_id;
            $cont_phone1 = $rsMem->cont_phone1;
            $cont_phone2 = $rsMem->cont_phone2;
            $con_flight_comments = $rsMem->con_flight_comments;

            $gen_id = $rsMem->gen_id;
            $arrival_flight_data = calendarDateConver2($rsMem->arrival_flight_data);
            $departure_flight_date = calendarDateConver2($rsMem->departure_flight_date);
            $arrival_airline_id = $rsMem->arrival_airline_id;
            $departure_airline_id = $rsMem->departure_airline_id;
            $arrival_flight_no_id = $rsMem->arrival_flight_no_id;
            $departure_flight_no_id = $rsMem->departure_flight_no_id;
            $cont_image = $rsMem->cont_image;
            $conp_id = $rsMem->conp_id;
            $conp_age = $rsMem->conp_age;
            $bootsize_id = $rsMem->bootsize_id;
            $jacketsize_id = $rsMem->jacketsize_id;

            $conp_comments = $rsMem->conp_comments;
            $arr_flight_id = $rsMem->arr_flight_id;
            $arr_flightn_id = $rsMem->arr_flightn_id;
            $arr_flightt_id = $rsMem->arr_flightt_id;
            $arr_hotel_id = $rsMem->arr_hotel_id;
            $arr_con_private_jet = $rsMem->arr_con_private_jet;
            $dep_flight_id = $rsMem->dep_flight_id;
            $dep_flightn_id = $rsMem->dep_flightn_id;
            $dep_flightt_id = $rsMem->dep_flightt_id;
            $dep_hotel_id = $rsMem->dep_hotel_id;
            $dep_con_private_jet = $rsMem->dep_con_private_jet;
            $is_completed = $rsMem->is_completed;

            //$question_id=$rsMem->question_id;
            //$question_field=$rsMem->question_field;
            //$cpd_answer=$rsMem->cpd_answer;
            //$status_id = $rsMem->status_id;
            //$status_id = $rsMem->status_id;
            //$site_del = $rsMem->site_del;
            $formHead = "Update Info";
        }
    } else {
        $cont_id = 0;
        $cont_fname = "";
        $cont_lname = "";
        $emg_contact_name = "";
        $cust_id = "";
        $ctype_id = "";
        $cont_emial = "";
        $cont_address1 = "";
        $cont_address2 = "";
        $cont_city = "";
        $cont_state = "";
        $cont_zip = "";
        $countries_id = "";
        $cont_phone1 = "";
        $cont_phone2 = "";
        $gen_id = "";
        $arrival_flight_data = "";
        $departure_flight_date = "";
        $arrival_airline_id = "";
        $departure_airline_id = "";
        $arrival_flight_no_id = "";
        $departure_flight_no_id = "";
        // $conp_id = "";
        $createdDate = "";
        $cont_image = "";
        $conp_id = "";
        $conp_age = "";
        $bootsize_id = "";
        $jacketsize_id = "";
        $conp_comments = "";
        $con_flight_comments = "";
        $grp_id = @$_SESSION['group_id'];
        $is_completed = '';
 
        $conp_comments = '';
        $arr_flight_id = '';
        $arr_flightn_id = '';
        $arr_flightt_id = '';
        $arr_hotel_id = '';
        $arr_con_private_jet = '';
        $dep_flight_id = '';
        $dep_flightn_id = '';
        $dep_flightt_id =  '';
        $dep_hotel_id =  '';
        $dep_con_private_jet =  '';
        $is_completed =  '';

        $formHead = "Add New";
    }
}

if (isset($_REQUEST['show'])) {

    $rsM = mysql_query("SELECT c.*, t.*, d.* ,cu.countries_name,f.flight_name ,n.flightn_name,fd.flight_name As depature_flight,
        nd.flightn_name AS depature_flight_no,j.jacketsize_name,b.bootsize_name,g.gen_name 
        FROM 
        contacts As c 
        LEFT OUTER JOIN contact_profiles AS t ON c.ContactID=t.cont_id
        LEFT OUTER JOIN contact_profile_details AS d ON d.cont_id=c.cont_id left outer join countries As cu on cu.countries_id=c.countries_id
        Left Outer Join flight_info As f on f.flight_id=c.arrival_airline_id Left Outer Join flight_no As n on n.flightn_id=c.arrival_flight_no_id
        Left Outer join flight_info As fd on fd.flight_id=c.departure_airline_id Left outer join flight_no As nd on nd.flightn_id=c.departure_flight_no_id
        Left Outer join jacket_size  As j  On j.jacketsize_id=t.jacketsize_id  Left outer Join boot_size As b on b.bootsize_id=t.bootsize_id
        Left Outer join gender  As g on g.gen_id=c.gen_id 
        WHERE c.cont_id=" . $_REQUEST['cont_id']);
    if (mysql_num_rows($rsM) > 0) {
        $rsMem = mysql_fetch_object($rsM);
        $cont_id = $rsMem->cont_id;
        $cont_fname = $rsMem->cont_fname;
        $cont_lname = $rsMem->cont_lname;
        $emg_contact_name = $rsMem->emg_contact_name;
        $cust_id = $rsMem->cust_id;
        $ctype_id = $rsMem->ctype_id;
        $cont_emial = $rsMem->cont_email;
        $cont_address1 = $rsMem->cont_address1;
        $cont_address2 = $rsMem->cont_address2;
        $cont_city = $rsMem->cont_city;
        $cont_state = $rsMem->cont_state;
        $cont_zip = $rsMem->cont_zip;
        $countries_id = $rsMem->countries_id;
        $countries_name = $rsMem->countries_name;
        $cont_phone1 = $rsMem->cont_phone1;
        $cont_phone2 = $rsMem->cont_phone2;

        
        $jacketsize_name = $rsMem->jacketsize_name;
        $bootsize_name = $rsMem->bootsize_name;
        
        $gen_id = $rsMem->gen_id;
        $gen_name = $rsMem->gen_name;
        //$flightn_id=$rsMem->flightn_id;

        $arrival_flight_data = $rsMem->arrival_flight_data;
        $departure_flight_date = $rsMem->departure_flight_date;
        $arrival_airline_id = $rsMem->arrival_airline_id;
        $flight_name = $rsMem->flight_name;
        $departure_airline_id = $rsMem->departure_airline_id;
        $flight_named = $rsMem->depature_flight;
        $arrival_flight_no_id = $rsMem->arrival_flight_no_id;
        $flightn_name = $rsMem->flightn_name;
        $departure_flight_no_id = $rsMem->departure_flight_no_id;
        $depature_flight_no = $rsMem->depature_flight_no;
        $conp_id = $rsMem->conp_id;
        $conp_age = $rsMem->conp_age;

        $bootsize_id = $rsMem->bootsize_id;
        $jacketsize_id = $rsMem->jacketsize_id;
        $conp_comments = $rsMem->conp_comments;
        $cont_image = $rsMem->cont_image;
        //$question_id=$rsMem->question_id;
        //$question_field=$rsMem->question_field;
        //$cpd_answer=$rsMem->cpd_answer;
        //$status_id = $rsMem->status_id;
        //$site_del = $rsMem->site_del;

        
        $conp_comments = $rsMem->conp_comments;
        $arr_flight_id = $rsMem->arr_flight_id;
        $arr_flightn_id = $rsMem->arr_flightn_id;
        $arr_flightt_id = $rsMem->arr_flightt_id;
        $arr_hotel_id = $rsMem->arr_hotel_id;
        $arr_con_private_jet = $rsMem->arr_con_private_jet;
        $dep_flight_id = $rsMem->dep_flight_id;
        $dep_flightn_id = $rsMem->dep_flightn_id;
        $dep_flightt_id = $rsMem->dep_flightt_id;
        $dep_hotel_id = $rsMem->dep_hotel_id;
        $dep_con_private_jet = $rsMem->dep_con_private_jet;
        $is_completed = $rsMem->is_completed;

            
        $formHead = "Update Info";
    }
}
//--------------Button Active--------------------
if (isset($_REQUEST['btnActive'])) {
    for ($i = 0; $i < count($_REQUEST['chkstatus']); $i++) {
        mysql_query("UPDATE activities SET status_id = 1 WHERE act_id = " . $_REQUEST['chkstatus'][$i]);
    }
    $class = "alert alert-success";
    $strMSG = "Record(s) updated successfully";
}
//--------------Button InActive--------------------
if (isset($_REQUEST['btnInactive'])) {
    for ($i = 0; $i < count($_REQUEST['chkstatus']); $i++) {
        mysql_query("UPDATE activities SET status_id = 0 WHERE act_id = " . $_REQUEST['chkstatus'][$i]);
    }
    $class = "alert alert-success";
    $strMSG = "Record(s) updated successfully";
}
//--------------Button Delete--------------------
//if (isset($_REQUEST['btnDelete'])) {
//    if (isset($_REQUEST['chkstatus'])) {
//        for ($i = 0; $i < count($_REQUEST['chkstatus']); $i++) {
//            mysql_query("DELETE FROM contacts  WHERE cont_id=" . $_REQUEST['chkstatus'][$i]) or die(mysql_query());
//        }
//        $class = "alert alert-success";
//        $strMSG = "Record(s) deleted successfully";
//    } else {
//        $class = "alert alert-danger";
//        $strMSG = "Please check atleast one checkbox";
//    }
//}

if(isset($_REQUEST['btnDelete'])){
    if($_SESSION['group_id']!=0){
            $Query = " DELETE FROM group_contacts WHERE ContactID=".$_REQUEST['contactid']." AND grp_id=".$_SESSION['group_id']."";
            mysql_query( $Query );
            @$deleted_rows = mysql_affected_rows();
        if(@$deleted_rows!=0){
            mysql_query("UPDATE contacts SET grp_id='0' WHERE ContactID = ".$_REQUEST['contactid']."");
            @$Query = " DELETE FROM users WHERE cont_id=".$_REQUEST['contactid']." OR cust_id=".$_REQUEST['contactid']."";
            @mysql_query( $Query );
            header("Location: " . $_SERVER['PHP_SELF'] . "?op=3");
        } else {
            $class = "alert alert-danger";
            $strMSG = "This Guest does not belongs to any group.";
        }
    } else {
        $class = "alert alert-danger";
        $strMSG = "This Guest does not belongs to any group.";
    }    
}

if (isset($_REQUEST['reserveRoom'])) {

    /* echo '<pre>';
      print_r( $_REQUEST );
      echo '</pre>';
     */
    if (isset($_REQUEST['chkstatus'])) {
        for ($i = 0; $i < count($_REQUEST['chkstatus']); $i++) {
            $grp_arrival = returnName("grp_arrival", "groups", "grp_id", $_REQUEST['grp_id']);
            $grp_departure = returnName("grp_departure", "groups", "grp_id", $_REQUEST['grp_id']);
            $roomr_id = getMaximum("room_reservation", "roomr_id");
            $tot_mem_in_room = totalCounts("roomr_id", "room_reservation", " room_id=" . $_REQUEST['room_id'] . " AND grp_id=" . $_REQUEST['grp_id'] . " ");

            /* echo $tot_mem_in_room;
              echo ' total mem in room <br/>'; */

            if ($tot_mem_in_room == 2) {
                $class = " alert alert-danger ";
                $strMSG = "This Room Is Already Full, Please Select Another Room!";
            } else {
                $same_mem_again = returnName("roomr_id", "room_reservation", "room_id", $_REQUEST['room_id'] . " AND  contact_id=" . $_REQUEST['chkstatus'][$i] . " AND grp_id=" . $_REQUEST['grp_id'] . " ");

                /* echo $same_mem_again;
                  echo ' same mem in room <br/>'; */

                if ($same_mem_again != '') {
                    $class = " alert alert-danger ";
                    $strMSG = "Selected Member(s) Already Exists In Selected Room!";
                } else {
                    $same_mem_again_another_room = returnName("roomr_id", "room_reservation", "contact_id", $_REQUEST['chkstatus'][$i] . " AND grp_id=" . $_REQUEST['grp_id'] . " ");

                    /* echo $same_mem_again_another_room;
                      echo ' same mem in another room <br/>'; */

                    if ($same_mem_again_another_room != '') {
                        $class = " alert alert-danger ";
                        $strMSG = "Selected Member(s) Already Exists In Another Room!";
                    } else {
                        mysql_query("INSERT INTO room_reservation (roomr_id, room_id, contact_id, grp_id, roomr_startdate, roomr_enddate) VALUES ('" . $roomr_id . "', '" . $_REQUEST['room_id'] . "', '" . $_REQUEST['chkstatus'][$i] . "', '" . $_REQUEST['grp_id'] . "', '" . $grp_arrival . "', '" . $grp_departure . "')");
                        $class = "alert alert-info";
                        $strMSG = "Record(s) Updated Successfully";
                    }
                }
            }
        }
    } else {
        $class = " alert alert-danger ";
        $strMSG = "Please check atleast one checkbox";
    }
}

if (isset($_REQUEST['op'])) {
    switch ($_REQUEST['op']) {
        case 1:
            $class = "alert alert-success";
            $strMSG = "Record Added Successfully";
            break;
        case 2:
            $strMSG = " Record Updated Successfully";
            $class = "alert alert-success";
            break;
        case 7:
            //$class = "notification success";
            $class = "alert alert-success";
            $strMSG = "Data Syncronized Successfully";
            break;
    }
}
?>
<?php include('includes/html_header.php'); ?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li>
                <a href="index.php">Dashboard</a></li>
        </ul>
        <!--<div class="form-group hiddn-minibar pull-right">
<input type="text" class="form-control form-cascade-control nav-input-search" size="20" placeholder="Search through site" />
<span class="input-icon fui-search"></span> </div>-->
        <h3 class="page-header"> Search Guest Profile <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b>Search Guest Profile: </b> You can search guest profiles here </p>
        </blockquote>
    </div>
</div>

<?php if (isset($_REQUEST['action'])) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-cascade">
                <div class="panel-heading">
                    <?php
                        if (isset($_REQUEST['contactid']) && $_SESSION["group_id"]!=0) {
                            // $Query = "SELECT c.cont_id AS ccont_id, c.ContactID AS cContactID, gc.grp_id, g.GroupName, g.GroupArrivalDate, g.GroupDepartureDate, p.Package_Name FROM contacts AS c LEFT OUTER JOIN group_contacts AS gc ON c.ContactID=gc.ContactID LEFT OUTER JOIN groups AS g ON gc.grp_id=g.grp_id LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID WHERE c.ContactID=" . $_REQUEST['contactid'] . " ";
                            
                            $Query = "SELECT p.Package_Name, g.GroupName, g.GroupArrivalDate, g.GroupDepartureDate FROM packages AS p LEFT OUTER JOIN groups AS g ON p.Pms_Package_ID=g.Pms_Package_ID WHERE g.grp_id=".$_SESSION["group_id"]."";
                            $count = mysql_num_rows(mysql_query($Query));
                            $rs = mysql_query($Query);
                            if ($count > 0) {
                                while ($row = mysql_fetch_object($rs)) {
                                    $sl_group_name2 = $row->GroupName;
                                    $sl_ard_date = calendarDateConver2($row->GroupArrivalDate);
                                    $sl_dpd_date = calendarDateConver2($row->GroupDepartureDate);
                                    $sl_pk = $row->Package_Name;
                                }
                            }
                    ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-cascade">
                                    <div class="panel-body ">
                                        <div class="ro">
                                            <div class="col-mol-md-offset-2">
                                                <?php //if($_SESSION["UType"]==2){?>
                                                    <form name="frm21" id="frm21" method="post" class="form-horizontal cascde-forms" action="<?php print($_SERVER['PHP_SELF']); ?>">
                                                        <div class="form-group">
                                                            <label class="col-lg-2 col-md-3 control-label">Group Name:</label>
                                                            <div class="col-lg-10 col-md-9">
                                                                <?php echo @$sl_group_name2;?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-2 col-md-3 control-label">Arrival Date:</label>
                                                            <div class="col-lg-10 col-md-9">
                                                                <?php echo @$sl_ard_date;?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-2 col-md-3 control-label">Departure Date:</label>
                                                            <div class="col-lg-10 col-md-9">
                                                                <?php echo @$sl_dpd_date;?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-2 col-md-3 control-label">Package:</label>
                                                            <div class="col-lg-10 col-md-9">
                                                                <?php echo @$sl_pk;?>
                                                            </div>
                                                        </div>
                                                    </form>    
                                                <?php //}?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <h3 class="panel-title text-primary"><?php print($formHead); ?></h3>
                </div>
                <div class="panel-body panel-border">
                    <form name="frm" id="frm" method="post" class="form-horizontal" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>"  enctype="multipart/form-data"  role="form">
                        <div class="form-group">
                            <?php if ($_SESSION["UType"]!=3){?>
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Select Your Group</label>
                            <div class="col-lg-10 col-md-9">
                                <?php if ($_SESSION["UType"]==2) { ?>
                                    <select name="grp_id" id="grp_id" data-placeholder="Choose a Group..." class="chosen-select" style="width:260px; z-index: 9999 !important;" tabindex="2">
                                        <?php echo FillSelected3(" groups AS g LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID LEFT OUTER JOIN contacts AS c ON g.Contact_ID=c.ContactID WHERE g.GroupArrivalDate!='0000-00-00' AND g.GroupDepartureDate!='0000-00-00' AND g.Booking_Status='Confirmed' AND c.ContactID=".$_SESSION["contact_id"]." ", " g.grp_id ", " g.GroupName ", " g.GroupArrivalDate ", " p.Package_Name ", @$_SESSION['group_id']);?>
                                    </select>
                                <?php } else { ?>
                                    <select name="grp_id" id="grp_id" data-placeholder="Choose a Group..." class="chosen-select" style="width:260px; z-index: 9999 !important;" tabindex="2">
                                        <?php echo FillSelected3(" groups AS g LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID LEFT OUTER JOIN contacts AS c ON g.Contact_ID=c.ContactID WHERE g.GroupArrivalDate!='0000-00-00' AND g.GroupDepartureDate!='0000-00-00' AND g.Booking_Status='Confirmed' ", " g.grp_id ", " g.GroupName ", " g.GroupArrivalDate ", " p.Package_Name ", @$_SESSION['group_id']);?>

                                    </select>
                                <?php } ?>
                            </div>
                            <?php }?>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Contact First Name</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact First Name..." value="<?php print($cont_fname);?>" id="cont_fname" name="cont_fname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Last Name</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact Last Name..." value="<?php print($cont_lname); ?>" id="cont_lname" name="cont_lname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Email</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact Email..." value="<?php print($cont_emial); ?>" id="cont_email" name="cont_email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Phone </label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Phone Number..." value="<?php print($cont_phone1); ?>" id="phone-input1" name="cont_phone1">
                            </div>
                        </div>
                        <hr style="padding:1px; background-color:#999">
                        
                        <?php 
                            if(!isset($_REQUEST['invite_guest'])){
                                $guest_display = 'block';
                            } else {
                                $guest_display = 'none';
                            }
                        ?>
                        <div style="display: <?php echo $guest_display;?>">

                            
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Country Name</label>
                            <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Country..." name="countries_id" id="countries_id" class="chosen-select" style="width:260px; z-index: 9999 !important;" tabindex="2" onchange="javascript: get_states(this.value);">
                                    <option value=""></option>
                                    <?php echo FillSelected("countries", "countries_id", "countries_name", (($countries_id==0||$countries_id=='')?'223':$countries_id)); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="with_states">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">State Name</label>
                            <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a State..." name="cont_state1" class="chosen-" tabindex="2" style=" width:260px; ">
                                    <?php echo FillSelected("states", "name", "name", $cont_state);?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="without_states">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">State Name</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" id="without_states_val" class="form-control form-cascade-control input_wid70" placeholder="State..." value="<?php print($cont_state);?>" name="cont_state2" style= " ">
                            </div>
                        </div>
                        <script>
                            var coid = '<?php echo (($countries_id==0||$countries_id=='')?'223':$countries_id);?>';
                            if(coid=='223'){
                                document.getElementById('with_states').style.display='block';
                                document.getElementById('without_states').style.display='none';
                                document.getElementById('without_states_val').value='';
                            } else {
                                document.getElementById('without_states').style.display='block';
                                document.getElementById('with_states').style.display='none';
                            }
                            function get_states( coid ){
                                if(coid=='223'){
                                    document.getElementById('with_states').style.display='block';
                                    document.getElementById('without_states').style.display='none';
                                } else {
                                    document.getElementById('without_states').style.display='block';
                                    document.getElementById('with_states').style.display='none';
                                    document.getElementById('without_states_val').value='';
                                }
                            }
                        </script>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">City</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70" placeholder="City Name..." value="<?php print($cont_city); ?>" id="cont_city" name="cont_city">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Zip Code</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Zip Code..." value="<?php print($cont_zip); ?>" id="cont_zip" name="cont_zip">
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Address 1</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Contact Address 1..." value="<?php print($cont_address1); ?>" id="cont_address1" name="cont_address1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Address 2</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Contact Address 2..." value="<?php print($cont_address2); ?>" id="cont_address2" name="cont_address2">
                            </div>
                        </div>
                        <hr style="padding:1px; background-color:#999">
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Emergency Contact Name</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Emergency Contact Name..." value="<?php print($emg_contact_name); ?>" id="emg_contact_name" name="emg_contact_name">
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Emergency Contact Phone</label>
                            <div class="col-lg-10 col-md-9">

                                <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Emergency Contact Phone..." value="<?php print($cont_phone2); ?>" id="phone-input2" name="cont_phone2">

                                <script src="http://firstopinion.github.io/formatter.js/javascripts/formatter.js"></script>
                                <script>
                                    var phoneInput1 = document.getElementById('phone-input1');
                                    if (phoneInput1) {
                                        new Formatter(phoneInput1, {
                                            'pattern': '({{999}}) {{999}}-{{9999}}',
                                            'persistent': true
                                        });
                                    }
                                    var phoneInput2 = document.getElementById('phone-input2');
                                    if (phoneInput2) {
                                        new Formatter(phoneInput2, {
                                            'pattern': '({{999}}) {{999}}-{{9999}}',
                                            'persistent': true
                                        });
                                    }
                                </script>
                            </div>
                        </div>
                        <hr style="padding:1px; background-color:#999">
                        <h3> Travel Information </h3>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Mode</label>
                            <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Arrival Mode..." name="arr_flight_id" id="arr_flight_id" class="chosen-select" style="width:260px; z-index: 9999 !important;" onChange="javascript:changecontent1(this.value);" tabindex="2">
                                    <option value=""></option>
                                    <?php FillSelected("flight_info", "flight_id", "flight_name", @$arr_flight_id); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="arrival_flight1">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Flight Number</label>
                            <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Arrival Flight Number..." name="arr_flightn_id" id="arr_flightn_id" class="" style="width:260px;" tabindex="2" onChange="javascript:get_arr_time(this.value);">
                                    <option value="0"></option>
                                    <?php FillSelected(" flight_no WHERE flightn_status=1 ", "flightn_id", "flightn_name", @$arr_flightn_id); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="arrival_flight2">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Time</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" value="<?php echo @$arr_flightt_id;?>" name="arr_flightt_id1" id="arrival_flight22" readonly='readonly' class="form-control form-cascade-control input_wid70">
                            </div>
                        </div>
                        <script>
                            function get_arr_time(flight_no){
                                var url = "services.php?arrival=1&flightn_id="+flight_no;
                                $.ajax({
                                    type: "POST",
                                    url: url,
                                    data: null,
                                    success: function(data)
                                    {
                                        document.getElementById('arrival_flight22').value=data;
                                    }
                                });
                            }
                        </script>
                        <div class="form-group" id="arrival_flight3">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Time</label>
                            <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Arrival Flight Time..." name="arr_flightt_id2" id="arr_flightt_id" class="" style="width:260px;" tabindex="2">
                                    <option value=""></option>
                                    <?php FillSelected(" flight_time WHERE flightt_status=3 ", "flightt_id", "flightt_name", @$arr_flightt_id); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="arrival_flight5">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Hotels</label>
                            <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Hotel..." name="arr_hotel_id" id="arr_hotel_id" class="" style="width:260px;" tabindex="2">
                                    <option value=""></option>
                                    <?php FillSelected(" hotel_info ", "hotel_id", "hotel_name", @$arr_hotel_id); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="arrival_flight4">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Private Jet Information</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Private Jet Info..." value="<?php echo @$arr_con_private_jet;?>" id="arr_con_private_jet" name="arr_con_private_jet">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Date</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 datetimepicker" placeholder="Arrival Flight Date..." value="<?php $ar_dat1 = (($arrival_flight_data=='00/00/0000')?'':$arrival_flight_data); $ar_dat2 = @calendarDateConver2(@returnName(" p.Arrival_Start_Date ", " packages AS p LEFT OUTER JOIN groups AS g ON p.Pms_Package_ID=g.Pms_Package_ID ", " g.grp_id ", $_SESSION['group_id'])); echo (($ar_dat1!='')?$ar_dat1:$ar_dat2);?>" id="arrival_flight_data" name="arrival_flight_data">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Mode</label>
                            <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Departure Mode..." name="dep_flight_id" id="dep_flight_id" class="chosen-select" style="width:260px; z-index: 9999 !important;" onChange="javascript:changecontent2(this.value);" tabindex="2">
                                    <option value=""></option>
                                    <?php FillSelected("flight_info", "flight_id", "flight_name", @$dep_flight_id); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="dep_flight1">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Flight Number</label>
                            <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Departure Flight Number..." name="dep_flightn_id" id="dep_flightn_id" class="" style="width:260px;" tabindex="2" onChange="javascript:get_dep_time(this.value);">
                                    <option value=""></option>
                                    <?php FillSelected(" flight_no WHERE flightn_status=2 ", "flightn_id", "flightn_name", @$dep_flightn_id); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="dep_flight2">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Time</label>
                            <div class="col-lg-10 col-md-9">
								<input type="text" value="<?php echo @$dep_flightt_id;?>" name="dep_flightt_id1" id="dep_flight22" readonly='readonly' class="form-control form-cascade-control input_wid70">
                            </div>
                        </div>
                        <script>
                            function get_dep_time(flight_no){
                                var url = "services.php?flightn_id="+flight_no;
                                $.ajax({
                                    type: "POST",
                                    url: url,
                                    data: null,
                                    success: function(data)
                                    {
                                        document.getElementById('dep_flight22').value=data;
                                    }
                                });
                            }
                        </script>
                        <div class="form-group" id="dep_flight3">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Time</label>
                            <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Departure Flight Time..." name="dep_flightt_id2" id="dep_flightt_id" class="" style="width:260px;" tabindex="2">
                                    <option value=""></option>
                                    <?php FillSelected(" flight_time WHERE flightt_status=3 ", "flightt_id", "flightt_name", @$dep_flightt_id); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="dep_flight5">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Hotels</label>
                            <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Hotel..." name="dep_hotel_id" id="dep_hotel_id" class="" style="width:260px;" tabindex="2">
                                    <option value=""></option>
                                    <?php FillSelected(" hotel_info ", "hotel_id", "hotel_name", @$dep_hotel_id); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="dep_flight4">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Private Jet Information</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Private Jet Info..." value="<?php echo @$dep_con_private_jet;?>" id="dep_con_private_jet" name="dep_con_private_jet">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Date</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70  datetimepicker" placeholder="Departure Flight Date..." value="<?php $dr_dat1 = (($departure_flight_date=='00/00/0000')?'':$departure_flight_date); $dr_dat2 = @calendarDateConver2(@returnName(" p.Arrival_End_Date ", " packages AS p LEFT OUTER JOIN groups AS g ON p.Pms_Package_ID=g.Pms_Package_ID ", " g.grp_id ", $_SESSION['group_id'])); echo (($dr_dat1!='')?$dr_dat1:$dr_dat2);?>" id="departure_flight_date" name="departure_flight_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival or Departure Comments</label>
                            <div class="col-lg-10 col-md-9">
                                <textarea type="text" class="form-control form-cascade-control input_wid70" placeholder="comment.."  id="con_flight_comments" name="con_flight_comments"><?php print($con_flight_comments); ?></textarea>
                            </div>
                        </div>
                        <script>
                        document.getElementById("arrival_flight1").style.display='none';
                        document.getElementById("arrival_flight1").style.visibility='hidden';
                        document.getElementById("arrival_flight2").style.display='none';
                        document.getElementById("arrival_flight2").style.visibility='hidden';
                        document.getElementById("arrival_flight3").style.display='none';
                        document.getElementById("arrival_flight3").style.visibility='hidden';
                        document.getElementById("arrival_flight4").style.display='none';
                        document.getElementById("arrival_flight4").style.visibility='hidden';
                        document.getElementById("arrival_flight5").style.display='none';
                        document.getElementById("arrival_flight5").style.visibility='hidden';
                        document.getElementById("dep_flight1").style.display='none';
                        document.getElementById("dep_flight1").style.visibility='hidden';
                        document.getElementById("dep_flight2").style.display='none';
                        document.getElementById("dep_flight2").style.visibility='hidden';
                        document.getElementById("dep_flight3").style.display='none';
                        document.getElementById("dep_flight3").style.visibility='hidden';
                        document.getElementById("dep_flight4").style.display='none';
                        document.getElementById("dep_flight4").style.visibility='hidden';
                        document.getElementById("dep_flight5").style.display='none';
                        document.getElementById("dep_flight5").style.visibility='hidden';

                        var arr_flight = '<?php echo $arr_flight_id;?>';
                        //alert( arr_flight );
                        if(arr_flight==1){
                            document.getElementById("arrival_flight1").style.display='block';
                            document.getElementById("arrival_flight1").style.visibility='visible';
                            document.getElementById("arrival_flight2").style.display='block';
                            document.getElementById("arrival_flight2").style.visibility='visible';
                        } else if(arr_flight==2){
                            document.getElementById("arrival_flight3").style.display='block';
                            document.getElementById("arrival_flight3").style.visibility='visible';
                            document.getElementById("arrival_flight22").value='';
                        } else if(arr_flight==3){
                            document.getElementById("arrival_flight4").style.display='block';
                            document.getElementById("arrival_flight4").style.visibility='visible';
                            document.getElementById("arrival_flight22").value='';
                        } else if(arr_flight==4){
                            document.getElementById("arrival_flight5").style.display='block';
                            document.getElementById("arrival_flight5").style.visibility='visible';
                            document.getElementById("arrival_flight22").value='';
                        }

                        var dep_flight = '<?php echo $dep_flight_id;?>';
                        //alert( dep_flight );
                        if(dep_flight==1){
                            document.getElementById("dep_flight1").style.display='block';
                            document.getElementById("dep_flight1").style.visibility='visible';
                            document.getElementById("dep_flight2").style.display='block';
                            document.getElementById("dep_flight2").style.visibility='visible';
                        } else if(dep_flight==2){
                            document.getElementById("dep_flight3").style.display='block';
                            document.getElementById("dep_flight3").style.visibility='visible';
                            document.getElementById("dep_flight22").value='';
                        } else if(dep_flight==3){
                            document.getElementById("dep_flight4").style.display='block';
                            document.getElementById("dep_flight4").style.visibility='visible';
                            document.getElementById("dep_flight22").value='';
                        } else if(dep_flight==4){
                            document.getElementById("dep_flight5").style.display='block';
                            document.getElementById("dep_flight5").style.visibility='visible';
                            document.getElementById("dep_flight22").value='';
                        }
                            
                        function changecontent1(val){
                            if(val=='1'){
                                document.getElementById("arrival_flight1").style.display='block';
                                document.getElementById("arrival_flight1").style.visibility='visible';
                                document.getElementById("arrival_flight2").style.display='block';
                                document.getElementById("arrival_flight2").style.visibility='visible';
                            } else {
                                document.getElementById("arrival_flight1").style.display='none';
                                document.getElementById("arrival_flight1").style.visibility='hidden';
                                document.getElementById("arrival_flight2").style.display='none';
                                document.getElementById("arrival_flight2").style.visibility='hidden';
                            } 
                            if(val=='2'){
                                document.getElementById("arrival_flight3").style.display='block';
                                document.getElementById("arrival_flight3").style.visibility='visible';
                            } else {
                                document.getElementById("arrival_flight3").style.display='none';
                                document.getElementById("arrival_flight3").style.visibility='hidden';
                            } 
                            if(val=='3'){
                                document.getElementById("arrival_flight4").style.display='block';
                                document.getElementById("arrival_flight4").style.visibility='visible';
                            } else {
                                document.getElementById("arrival_flight4").style.display='none';
                                document.getElementById("arrival_flight4").style.visibility='hidden';
                            }
                            if(val=='4'){
                                document.getElementById("arrival_flight5").style.display='block';
                                document.getElementById("arrival_flight5").style.visibility='visible';
                            } else {
                                document.getElementById("arrival_flight5").style.display='none';
                                document.getElementById("arrival_flight5").style.visibility='hidden';
                            }
                        }
                        function changecontent2(val){
                            if(val=='1'){
                                document.getElementById("dep_flight1").style.display='block';
                                document.getElementById("dep_flight1").style.visibility='visible';
                                document.getElementById("dep_flight2").style.display='block';
                                document.getElementById("dep_flight2").style.visibility='visible';
                            } else {
                                document.getElementById("dep_flight1").style.display='none';
                                document.getElementById("dep_flight1").style.visibility='hidden';
                                document.getElementById("dep_flight2").style.display='none';
                                document.getElementById("dep_flight2").style.visibility='hidden';
                            } 
                            if(val=='2'){
                                document.getElementById("dep_flight3").style.display='block';
                                document.getElementById("dep_flight3").style.visibility='visible';
                            } else {
                                document.getElementById("dep_flight3").style.display='none';
                                document.getElementById("dep_flight3").style.visibility='hidden';
                            } 
                            if(val=='3'){
                                document.getElementById("dep_flight4").style.display='block';
                                document.getElementById("dep_flight4").style.visibility='visible';
                            } else {
                                document.getElementById("dep_flight4").style.display='none';
                                document.getElementById("dep_flight4").style.visibility='hidden';
                            }
                            if(val=='4'){
                                document.getElementById("dep_flight5").style.display='block';
                                document.getElementById("dep_flight5").style.visibility='visible';
                            } else {
                                document.getElementById("dep_flight5").style.display='none';
                                document.getElementById("dep_flight5").style.visibility='hidden';
                            }
                        }
                        </script>
                        <hr style="padding:1px; background-color:#999">
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Boot size</label>
                            <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Boot Size..." name="bootsize_id" id="bootsize_id" class="chosen-select" style="width:260px; z-index: 9999 !important;" tabindex="2">
                                    <option value=""></option>
    <?php FillSelected("boot_size", "bootsize_id", "bootsize_name", $bootsize_id); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Jacket Size</label>
                            <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Jacket Size..." name="jacketsize_id" id="jacketsize_id" class="chosen-select " style="width:260px; z-index: 9999 !important;" tabindex="2">
                                    <option value=""></option>
    <?php FillSelected("jacket_size", "jacketsize_id", "jacketsize_name", $jacketsize_id); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Gender</label>
                            <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Select your Gender..." name="gen_id" id="gen_id" class="chosen-select " style="width:260px; z-index: 9999 !important;" tabindex="2">
                                    <option value=""></option>
    <?php FillSelected("gender", "gen_id", "gen_name", $gen_id); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Age</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70  " placeholder="Age..." value="<?php print($conp_age); ?>" id="conp_age" name="conp_age">
                            </div>
                        </div>
                        <hr style="padding:1px; background-color:#999">
                        <h3> Question Answer </h3>
                            <?php
                                $counter_qn=0;
                                if($_REQUEST['action']==1){
                                    $Query = "SELECT q.* FROM questions AS q WHERE q.status_id=1 ORDER BY q.question_id";
                                } else {
                                    $Query = "SELECT q.*, cpd.question_id AS cpdquestion_id, cpd.istrue, cpd_answer FROM questions AS q LEFT OUTER JOIN contact_profile_details AS cpd ON q.question_id=cpd.question_id AND cpd.cont_id=".$_REQUEST['contactid']." WHERE q.status_id=1 ORDER BY q.question_id";
                                }
                                //echo $Query;
                                $rs = mysql_query($Query);
                                if (mysql_num_rows($rs) > 0) {
                                    while ($row = mysql_fetch_object($rs)) {
                                        $counter_qn++;
                            ?>
                                        <div class="form-group">
                                            <label for="site_login" class="col-lg-2 col-md-3 control-label"><?php print($row->question_field);?></label>
                                            <div class="col-lg-10 col-md-9">
                                                <input type="hidden" name="quest[]" value="<?php print($row->question_id); ?>"/>
                                                <input type="checkbox" id="<?php echo $counter_qn;?>" value="1" name="istrue[]" onchange="javascript: makeAnsRequired('<?php echo $counter_qn;?>');" <?php echo ((@$row->istrue=='yes')?"checked":'');?> />
                                                 Yes &nbsp; &nbsp; 
                                                <input type="checkbox" id="no_<?php echo $counter_qn;?>" value="0" name="istrue_false[]" onchange="javascript: makeQueUnchk('<?php echo $counter_qn;?>');" <?php echo ((@$row->istrue=='no')?"checked":'');?> />
                                                 No &nbsp; &nbsp;
                                            </div>
                                            <input type="hidden" id="yes_no_value_<?php print($row->question_id);?>" value="<?php print($row->question_id);?>_<?php echo ((@$row->istrue=='yes')?"yes":'');?><?php echo ((@$row->istrue=='no')?"no":'');?>" name="yes_no_value[]" >
                                        </div>
                                        <div class="form-group">
                                            <label for="ans_<?php echo $counter_qn;?>" class="col-lg-2 col-md-3 control-label">If yes please describe</label>
                                            <div class="col-lg-10 col-md-9">
                                                <textarea name="ans[]" id="ans_<?php echo $counter_qn;?>" class=" form-control form-cascade-control input_wid70 ans "><?php echo @$row->cpd_answer;?></textarea>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            var id_of_true = '<?php echo $counter_qn;?>';
                                            var truFalseVal = null;
                                            truFalseVal = document.getElementById(id_of_true).checked;
                                            if(truFalseVal==true){
                                                var addd_class = document.getElementById('ans_'+id_of_true);
                                                addd_class.classList.add("required");
                                            }
                                        </script>    
                            <?php
                                    }
                                }
                            ?>
                        <script>
                                function makeAnsRequired( id ){
                                    var truFalseVal = null;
                                    truFalseVal =  $('#'+id).is(":checked");
                                    if(truFalseVal==true){
                                        $('#no_'+id).attr('checked', false);
                                        $('#yes_no_value_'+id).attr("value", id+"_yes");
                                        $('#ans_'+id).attr("class", " form-control form-cascade-control input_wid70 ans required error ");
                                        $('#err_'+id).attr("style", " visibility: visible; ");
                                    } else {
                                        $('#yes_no_value_'+id).attr("value", id+"_");
                                        $('#ans_'+id).attr("class", " form-control form-cascade-control input_wid70 ans ");
                                        $('#err_'+id).attr("style", " visibility: hidden; ");
                                    }
                                }
                                function makeQueUnchk( id ){
                                    var truFalseVal = null;
                                    truFalseVal =  $('#no_'+id).is(":checked");
                                    if(truFalseVal==true){
                                        $('#'+id).attr('checked', false);
                                        $('#yes_no_value_'+id).attr("value", id+"_no");
                                        $('#ans_'+id).attr("class", " form-control form-cascade-control input_wid70 ans ");
                                        $('#err_'+id).attr("style", " visibility: hidden; ");
                                    } else {
                                        $('#yes_no_value_'+id).attr("value", id+"_");
                                    }
                                }
                            </script>    
                        <hr style="padding:1px; background-color:#999">
                        <h3> Please schedule the following additional services </h3>
                            <?php
                                $counter = 0;
                                if(isset($_REQUEST['contactid'])){
                                    $Query = "SELECT a.*, cp.conp_id, ca.act_id AS caact_id FROM activities AS a LEFT OUTER JOIN contact_profiles AS cp ON cp.cont_id=".$_REQUEST['contactid']." LEFT OUTER JOIN contact_activities AS ca ON a.act_id=ca.act_id AND ca.conp_id=cp.conp_id WHERE a.status_id=1 ORDER BY a.act_order ";
                                } else {
                                    $Query = "SELECT a.* FROM activities AS a WHERE a.status_id=1 ORDER BY a.act_order ";
                                }
                                //echo $Query;
                                $rs = mysql_query($Query);
                                if (mysql_num_rows($rs) > 0) {
                                    while ($row = mysql_fetch_object($rs)) {
                                        $counter++;
                            ?>
                                        <div class="form-group">
                                            <label for="site_login" class="col-lg-2 col-md-3 control-label"><?php print($row->act_name);?></label>
                                            <div class="col-lg-10 col-md-9">
                                                <div class="tooltips">
                                                    <div class="list-group">
                                                        <input type="checkbox" name="chkactivites[]" value="<?php echo $row->act_id;?>" <?php echo ((@$row->caact_id=='')?'':"checked='checked'");?> style="float: left;"/> &nbsp;  &nbsp;
                                                        
                                                        <span style="float: left;">   &nbsp;  &nbsp; Activity Info:</span> 
                                                        <a href="javascript:void(0);" data-original-title="<?php echo $row->act_details;?>" data-placement="top" class="btn bg-primary text-white list-group-item" style="width:44px; float: left;"><i class="fa fa-info-circle"></i></a> &nbsp; &nbsp; 
                                                        
                                                        <span style="float: left;">  &nbsp;  Price:</span> 
                                                        <a href="javascript:void(0);" data-original-title="<?php echo $row->act_price;?>" data-placement="top" class="btn bg-primary text-white list-group-item" style="width:44px; float: left;"><i class="fa fa-usd"></i></a> &nbsp; &nbsp; 

                                                        <span style="float: left;">  &nbsp;  Website:</span> 
                                                        <a href="<?php echo $row->act_link;?>" target="_blank" data-placement="top" class="btn bg-primary text-white list-group-item" style="width:44px; float: left;"><i class="fa fa-link"></i></a> &nbsp;


<!--                                                        <a href="<?php echo $row->act_link;?>" target="_blank" style="float: left;"><button type="button" class="btn bg-primary text-white list-group-item"><i class="fa fa-link"></i></button></a>-->
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            <?php
                                    }
                                }
                            ?>
                        <hr style="padding:1px; background-color:#999">
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Any Other Comments</label>
                            <div class="col-lg-10 col-md-9">
                                <textarea type="text" class="form-control form-cascade-control input_wid70 " placeholder="comment.."  id="conp_comments" name="conp_comments"><?php print($conp_comments); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label"> &nbsp; </label>
                            <div class="col-lg-10 col-md-9">
                                <label for="site_login" > &nbsp; (optional) Upload a picture of yourself so our staff can recognize you at the airport and during your stay</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label"> &nbsp; </label>
                            <div class="col-lg-10 col-md-9">
                                <input type="file" name="photo" id="photo" class="form-control form-cascade-control input_wid70"  value="<?php print($cont_image); ?>" style="float:left;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label"> &nbsp; </label>
                            <div class="col-lg-10 col-md-9">
                                Mark if completed: 
                                <input type="checkbox" name="is_completed" id="is_completed" class=""  value="1" <?php echo (($is_completed==1)?"checked='checked'":'');?>>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label"> &nbsp; </label>
                            <div class="col-lg-10 col-md-9">
                                Send Email Notification: 
                                <input type="checkbox" name="send_email" id="send_email" class=""  value="1" >
                            </div>
                        </div>
                        <script>
                            function chkCompletedorNot(){
                                var truFalseVal = null;
                                truFalseVal = $('#is_completed').is(":checked");
                                //alert( truFalseVal );
                                if(truFalseVal==false){
                                    var truTrueVal = null;
                                    truTrueVal = confirm('If your profile is complete, please mark as completed, (Press OK on this POPUP). If your profile is not complete then (Press Cancel on this POPUP).');
                                    if(truTrueVal==true){
                                        return false;
                                    } else {
                                        $('#update1').click();
                                        return true;
                                    }
                                } else {
                                    $('#update1').click();
                                    return true;
                                }
                            }
                        </script>
                        
                        </div>
                        
                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                            <div class="col-lg-10 col-md-9">
    <?php if ($_REQUEST['action'] == 1) { ?>
                                    <button type="submit" name="btnAdd" class="btn btn-primary btn-animate-demo">Submit</button>
    <?php } else { ?>
                                    <input type="hidden" value="<?php print($cont_image); ?>" name="old_img">
                                    
<!--                                <button type="submit" name="btnUpdate" class="btn btn-primary btn-animate-demo">Submit</button>-->

                                    <button type="button" name="btnUpdate" class="btn btn-primary btn-animate-demo" onclick="chkCompletedorNot();">Submit</button>
                                    <span style="visibility: hidden; display: none;"> <input type="submit" id="update1" value="1" name="btnUpdate"> </span>
                                    
                                <?php } ?>
                                <button type="button" name="btnCancel" class="btn btn-default btn-animate-demo" onclick="javascript: window.location = '<?php print($_SERVER['PHP_SELF']); ?>';">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /panel body --> 
            </div>
        </div>
    </div>
<?php } elseif (isset($_REQUEST['show'])) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-cascade">
                <div class="panel-heading">
                    <h3 class="panel-title"> Details </h3>
                </div>


                <div class="panel-body">
                    <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Profile Pic</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <img src="files/contents/<?php echo $cont_image; ?>" alt='Image' width="250" style="width:250px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Contact First Name</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($cont_fname); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact First Name..." value="<?php //print($cont_fname);  ?>" id="cont_fname" name="cont_fname" readonly>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Last Name</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($cont_lname); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact Last Name..." value="<?php //print($cont_lname);  ?>" id="cont_lname" name="cont_lname" readonly>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Email</label>
                            <div class="col-lg-10 col-md- det-display">
    <?php print($cont_emial); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact Email..." value="<?php //print($cont_emial);  ?>" id="cont_email" name="cont_email" readonly>-->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Phone </label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($cont_phone1); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Phone 1..." value="<?php //print($cont_phone1);  ?>" id="cont_phone1" name="cont_phone1" readonly>-->
                            </div>
                        </div>
                        <hr style="padding:1px; background-color:#999">

                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Country</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <!--<select disabled data-placeholder="Choose a Country..." name="countries_id" id="countries_id" class="chosen-select required" style="width:350px;" tabindex="2" readonly>-->
                                <!--<option value=""></option>-->
    <?php print($countries_name); //FillSelected("countries", "countries_id", "countries_name", $countries_id);  ?>
                                <!--</select>-->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Address 1</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($cont_address1); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact Address 1..." value="<?php //print($cont_address1);  ?>" id="cont_address1" name="cont_address1" readonly>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Address 2</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($cont_address2); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact Address 2..." value="<?php //print($cont_address2);  ?>" id="cont_address2" name="cont_address2" readonly>-->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">City</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($cont_city); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="City Name..." value="<?php //print($cont_city);  ?>" id="cont_city" name="cont_city" readonly>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">State</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($cont_state); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="State..." value="<?php //print($cont_state);  ?>" id="cont_state" name="cont_state" readonly>-->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Zip Code</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($cont_zip); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Zip Code..." value="<?php //print($cont_zip);  ?>" id="cont_zip" name="cont_zip" readonly>-->
                            </div>
                        </div>

                        <hr style="padding:1px; background-color:#999">

                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Emergency Contact Name</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($emg_contact_name); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Display Name..." value="<?php //print($emg_contact_name);  ?>" id="emg_contact_name" name="emg_contact_name" readonly>-->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Emergency Contact Phone</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($cont_phone2); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Phone 2..." value="<?php //print($cont_phone2);  ?>" id="cont_phone2" name="cont_phone2" readonly>-->
                            </div>
                        </div>

                        <hr style="padding:1px; background-color:#999">
                        <h3> Travel Information </h3>

                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Mode</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php echo returnName("flight_name", "flight_info", "flight_id", $arr_flight_id);?></div>
                        </div>
                        <?php if($arr_flightn_id!=''&&$arr_flightn_id!=0){?>
                        <?php $val1 = @returnName(" flightn_name ", "flight_no ", "flightn_id", $arr_flightn_id.' AND flightn_status=1 ');?>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Flight Number</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php echo $val1;?></div>
                        </div>
                        <?php }?>
                        <?php if($arr_flight_id==1&&$arr_flightt_id!=0){?>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Flight Time</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php echo $arr_flightt_id;?></div>
                        </div>
                        <?php }?>
                        <?php if($arr_flight_id==2&&$arr_flightt_id!=0){?>
                        <?php $val3 = @returnName(" flightt_name ", " flight_time ", " flightt_id ", $arr_flightt_id.' AND flightt_status=3 ');?>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Flight Time</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php echo $val3;?></div>
                        </div>
                        <?php }?>
                        <?php if($arr_con_private_jet!=''){?>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Private Jet Info</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php echo $arr_con_private_jet;?></div>
                        </div>
                        <?php }?>
                        <?php $val4 = returnName(" hotel_name ", " hotel_info ", " hotel_id ", $arr_hotel_id);?>
                        <?php if($val4!=''){?>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Hotel</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php echo $val4;?></div>
                        </div>
                        <?php }?>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Date</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php echo calendarDateConver2($arrival_flight_data);?></div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Mode</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php echo returnName("flight_name", "flight_info", "flight_id", $dep_flight_id);?></div>
                        </div>
                        <?php $val11 = returnName(" flightn_name ", "flight_no ", "flightn_id", $dep_flightn_id.' AND flightn_status=2 ');?>
                        <?php if($val11!=''){?>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Flight Number</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php echo $val11;?></div>
                        </div>
                        <?php }?>
                        <?php if($dep_flight_id==1&&$dep_flightt_id!=0){?>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Flight Time</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php echo $dep_flightt_id;?></div>
                        </div>
                        <?php }?>
						<?php if($dep_flight_id==2&&$dep_flightt_id!=''){?>
                        <?php $val33 = returnName(" flightt_name ", " flight_time ", " flightt_id ", $dep_flightt_id.' AND flightt_status=3 ');?>
                        <?php if($val33!=''){?>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Flight Time</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php echo $val33;?></div>
                        </div>
                        <?php }?>
                        <?php }?>
                        <?php if($dep_con_private_jet!=''){?>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Private Jet Info</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php echo $dep_con_private_jet;?></div>
                        </div>
                        <?php }?>
                        <?php $val4 = returnName(" hotel_name ", " hotel_info ", " hotel_id ", $dep_hotel_id);?>
                        <?php if($val4!=''){?>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Hotel</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php echo $val4;?></div>
                        </div>
                        <?php }?>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Date</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php echo calendarDateConver2($departure_flight_date);?></div>
                        </div>
                        <hr style="padding:1px; background-color:#999">



                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Boot size</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <!--<select disabled data-placeholder="Choose a Country..." name="bootsize_id" id="bootsize_id" class="chosen-select required" style="width:350px;" tabindex="2">-->
                                <!--<option value=""></option>-->
                                <?php echo returnName("bs.bootsize_name", "contact_profiles AS cp LEFT OUTER JOIN boot_size AS bs ON cp.bootsize_id=bs.bootsize_id", "cp.cont_id", $_REQUEST['contactid']);?>
                                <!--</select>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Jacket Size</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <!--<select disabled data-placeholder="Choose a Country..." name="jacketsize_id" id="jacketsize_id" class="chosen-select required" style="width:350px;" tabindex="2">-->
                                <!--<option value=""></option>-->
                                <?php echo returnName("js.jacketsize_name", "contact_profiles AS cp LEFT OUTER JOIN jacket_size AS js ON cp.jacketsize_id=js.jacketsize_id", "cp.cont_id", $_REQUEST['contactid']);?>
                                <!--</select>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Sex</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <!--<select  disabled data-placeholder="Choose a Country..." name="gen_id" id="gen_id" class="chosen-select required" style="width:350px;" tabindex="2">-->
                                <!--<option value=""></option>-->
    <?php print($gen_name); //FillSelected("gender", "gen_id", "gen_name", $gen_id);  ?>
                                <!--</select>-->

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Age</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($conp_age); ?>
    <!--                                <input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="Age..." value="<?php // print($conp_age);  ?>" id="conp_age" name="conp_age" readonly>-->
                            </div>
                        </div>
                        <hr style="padding:1px; background-color:#999">
                        <h3> Question Answer </h3>
                            <?php
                                $counter_qn=0;
                                $Query = "SELECT q.*, cpd.question_id AS cpdquestion_id, cpd.istrue, cpd.cpd_answer FROM questions AS q, contact_profile_details AS cpd WHERE q.question_id=cpd.question_id AND cpd.cont_id=".$_REQUEST['contactid']." AND cpd.cpd_answer!='' AND q.status_id=1 ORDER BY q.question_id";
                                $rs = mysql_query($Query);
                                if (mysql_num_rows($rs) > 0) {
                                    while ($row = mysql_fetch_object($rs)) {
                                        $counter_qn++;
                            ?>
                                        <div class="form-group">
                                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Question:</label>
                                            <div class="col-lg-10 col-md-9 det-display"><?php print(@$row->question_field);?></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Answer:</label>
                                            <div class="col-lg-10 col-md-9 det-display"><?php echo @$row->cpd_answer;?></div>
                                        </div>
                            <?php
                                    }
                                } else {
                            ?>
                                <div class="form-group">
                                    <label for="site_login" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                                    <div class="col-lg-10 col-md-9 det-display">No Records Found.</div>
                                </div>
                            <?php
                                }
                            ?>
                        <hr style="padding:1px; background-color:#999">
                        <h3> Additional services </h3>
                            <?php
                                $counter = 0;
                                $Query = "SELECT a.*, cp.conp_id, ca.act_id AS caact_id FROM activities AS a LEFT OUTER JOIN contact_profiles AS cp ON cp.cont_id=".$_REQUEST['contactid']." LEFT OUTER JOIN contact_activities AS ca ON a.act_id=ca.act_id AND ca.conp_id=cp.conp_id WHERE ca.act_id!='' AND a.status_id=1 ORDER BY a.act_order ";
                                $rs = mysql_query($Query);
                                if (mysql_num_rows($rs) > 0) {
                                    while ($row = mysql_fetch_object($rs)) {
                                        $counter++;
                            ?>
                                        <div class="form-group">
                                            <label for="site_login" class="col-lg-2 col-md-3 control-label"><?php print($row->act_name);?></label>
                                            <div class="col-lg-10 col-md-9">
                                                <div class="tooltips">
                                                    <div class="list-group">
                                                        <span style="float: left;">   &nbsp;  &nbsp; Activity Info:</span> 
                                                        <a href="javascript:void(0);" data-original-title="<?php echo $row->act_details;?>" data-placement="top" class="btn bg-primary text-white list-group-item" style="width:44px; float: left;"><i class="fa fa-info-circle"></i></a> &nbsp; &nbsp; 
                                                        <span style="float: left;">  &nbsp;  Price:</span> 
                                                        <a href="javascript:void(0);" data-original-title="<?php echo $row->act_price;?>" data-placement="top" class="btn bg-primary text-white list-group-item" style="width:44px; float: left;"><i class="fa fa-usd"></i></a> &nbsp; &nbsp; 
                                                        <span style="float: left;">  &nbsp;  Website:</span> 
                                                        <a href="<?php echo $row->act_link; ?>" target="_blank" data-placement="top" class="btn bg-primary text-white list-group-item" style="width:44px; float: left;"><i class="fa fa-link"></i></a> &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            <?php
                                    }
                                } else {
                            ?>
                                <div class="form-group">
                                    <label for="site_login" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                                    <div class="col-lg-10 col-md-9 det-display">No Records Found.</div>
                                </div>
                            <?php
                                }
                            ?>
                        <hr style="padding:1px; background-color:#999">
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Any Other Comments</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($conp_comments); ?>
                                <!--<textarea type="text" class="form-control form-cascade-control input_wid70 required pickdatetime" placeholder="phone 3..."  id="conp_age" name="conp_comments" readonly><?php print($conp_comments); ?></textarea>-->
                            </div>
                        </div>




                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                            <div class="col-lg-10 col-md-9">
                                <button type="button" name="btnBack" class="btn btn-default btn-animate-demo" onclick="javascript: window.location = '<?php print($_SERVER['PHP_SELF']); ?>';">Back</button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

<?php } else { ?>
    <?php
//        echo '<pre>';
//        print_r( $_REQUEST );
//        echo '</pre>';
    
            try {
                    $cont_id = $total_prof = $consumed_prof = $profiles_remaining = 0;
                    $total_prof = @returnName("grp_total_cust", "groups", "grp_id", @$_SESSION["group_id"]);
                    $consumed_prof = @totalCounts("cont_id", "contacts", " grp_id=" . @$_SESSION["group_id"] . " ");
                    $profiles_remaining = ($total_prof - $consumed_prof);
//                    echo '<br/>T';
//                    echo $total_prof;
//                    echo '<br/>C';
//                    echo $consumed_prof;
//                    echo '<br/>R';
//                    echo $profiles_remaining;
//                    echo '<br/>';
            } catch (Exception $e) { }
	   if($_SESSION["UType"]==2||$_SESSION["UType"]==3){
                $Query = "SELECT p.Package_Name, g.GroupName, g.GroupArrivalDate, g.GroupDepartureDate FROM packages AS p  LEFT OUTER JOIN groups AS g ON p.Pms_Package_ID=g.Pms_Package_ID WHERE g.grp_id=" . $_SESSION["group_id"] . "";
                $count = mysql_num_rows(mysql_query($Query));
                $rs = mysql_query($Query);
                if ($count > 0) {
                     while ($row = mysql_fetch_object($rs)) {
                         $sl_group_name1 = $row->GroupName;
                         $sl_group_name2 = $row->GroupName;
                         $sl_ard_date = calendarDateConver2($row->GroupArrivalDate);
                         $sl_dpd_date = calendarDateConver2($row->GroupDepartureDate);
                         $sl_pk = $row->Package_Name;
                     }
                }
	   }    
	?>
    <?php //if($_SESSION["UType"]!=3){?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-cascade">
                
                <div class="panel-body ">
                    <div class="ro">
                        <div class="col-mol-md-offset-2">
                            <form name="frm22" id="frm22" method="post" class="form-horizontal cascde-forms" action="<?php print($_SERVER['PHP_SELF']); ?>">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label">Search Guest:</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" value="<?php echo @$_SESSION['guest_name'];?>" id="guest_name" name="guest_name" class="form-control form-cascade-control" style="width: 240px;" placeholder=" Enter Guest Name ">
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <label class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                                        <input type="submit" value="Search Profiles" name="filterRecords" class="btn bg-primary text-white btn-lg">
                                    </div>
                                </div>
                            </form>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php //}?>
    <div class="row">
        <div class="col-md-12">
            <div class="<?php print($class); ?>"><?php print($strMSG); ?></div>
            <div class="panel">
                <div class="panel-body">
                    <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                        <?php if($_SESSION["UType"]!=3){?><h3> Completed Profiles </h3><?php }?>
                        <table class="table users-table table-condensed table-hover table-striped display dataTable" id="example" >
                            <thead>
                                <tr>
<!--                                <th><input type="checkbox" name="chkAll" onClick="setAll();" ></th>-->
                                    <th class="visible-xs visible-sm visible-md visible-lg">First Name</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Last Name</th>
                                    <th class="visible-sm visible-md visible-lg">Email</th>
                                    <th class="visible-sm visible-md visible-lg">Emergency Phone</th>
                                    <th class="visible-sm visible-md visible-lg">Flight Arrival</th>
                                    <th class="visible-sm visible-md visible-lg">Flight Departure</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php

//    if ($_SESSION["UType"] == 1) {
//        if ($_SESSION['group_id'] > 0) {
//            $Query = "SELECT gc.*, c.* FROM group_contacts AS gc, contacts AS c WHERE gc.ContactID=c.ContactID AND gc.grp_id=" . $_SESSION['group_id'] . "";
//        } else {
//            $Query = "SELECT gc.*, c.* FROM group_contacts AS gc, contacts AS c WHERE gc.ContactID=c.ContactID";
//        }    
//    } else if($_SESSION["UType"] == 3) {
//            $Query = "SELECT gc.*, c.* FROM group_contacts AS gc LEFT OUTER JOIN contacts as c ON c.ContactID=gc.ContactID WHERE c.ContactID=" . $_SESSION["contact_id"] . "";
//    } else {
//        if ($_SESSION['group_id'] > 0) {
//            $Query = "SELECT gc.*, c.* FROM group_contacts AS gc, contacts AS c WHERE gc.ContactID=c.ContactID AND gc.grp_id=" . $_SESSION['group_id'] . "";
//        } else {
//            $Query = "SELECT gc.*, c.* FROM group_contacts AS gc, contacts AS c WHERE gc.ContactID=c.ContactID";
//        }
//    }

    
    if($_SESSION["UType"] == 3) {
            $Query = "SELECT c.* FROM contacts as c WHERE c.ContactID=".$_SESSION["contact_id"]." ";
    } else {
        if ($_SESSION['guest_name'] != '') {
            $Query = "SELECT gc.*, c.* FROM group_contacts AS gc, contacts AS c WHERE gc.grp_id = c.grp_id AND ( c.cont_fname LIKE '%".$_SESSION['guest_name']."%' OR c.cont_lname LIKE '%".$_SESSION['guest_name']."' OR c.cont_email LIKE '%".$_SESSION['guest_name']."' ) AND c.is_completed>=1 GROUP BY c.cont_id ";
        } else {
            $Query = "SELECT c.* FROM contacts AS c WHERE c.is_completed>=1 ORDER BY c.cont_id ";
        }
    }

    
    
//    echo '<pre>';
//    echo '<br/><br/>';
//    echo $Query;
//    echo '<br/><br/>';
//    print_r( $_REQUEST );
//    echo '<br/><br/>';
//    print_r( $_SESSION );
//    echo '<br/><br/>';
//    echo '</pre>';

    
    $counter = 0;
    $limit = $_SESSION['limit_of_rec'];
    $start = $p->findStart($limit);
    $count = mysql_num_rows(mysql_query($Query));
    $pages = $p->findPages($count, $limit);

    $rs = mysql_query($Query . " LIMIT " . $start . ", " . $limit);
    if (mysql_num_rows($rs) > 0) {
        while ($row = mysql_fetch_object($rs)) {
            $counter++;
            ?>
                                        <tr>
<!--                                        <td><input type="checkbox" name="chkstatus[]" value="<?php print($row->cont_id); ?>" /></td>-->
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->cont_fname); ?></td>
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->cont_lname); ?></td>
                                            <td class="visible-sm visible-md visible-lg"><?php print($row->cont_email); ?></td>
                                            <td class="visible-sm visible-md visible-lg"><?php echo (($row->cont_phone2=='(   )    -    ')?'':$row->cont_phone2);?></td>
                                            <td class="visible-sm visible-md visible-lg"><?php echo (($row->arrival_flight_data=='0000-00-00 00:00:00')?'':calendarDateConver2($row->arrival_flight_data));?></td>
                                            <td class="visible-sm visible-md visible-lg"><?php echo (($row->departure_flight_date=='0000-00-00 00:00:00')?'':calendarDateConver2($row->departure_flight_date));?></td>
                                            <td style="width:180px">
                                                <?php if ($_SESSION["UType"] != 3){?>
                                                    <div class="tooltips"><a href="<?php echo $_SERVER['PHP_SELF']."?contactid=" . $row->ContactID ."&btnDelete=1&chkstatus=".$row->ContactID;?>" data-original-title="Delete Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-minus-circle"></i></a></div>
                                                    <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF'] . "?send=1&cont_id=" . $row->cont_id . "&contactid=" . $row->ContactID);?>" data-original-title="<?php echo "Email has been sent ".$row->is_email.(($row->is_email>1)?' times ':' time ')." ";?>" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-envelope-o"></i></a></div> 
                                                <?php }?>
                                                <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF'] . "?show=1&cont_id=" . $row->cont_id . "&contactid=" . $row->ContactID); ?>" data-original-title="See Details" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-eye"></i></a></div>
                                                <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF'] . "?action=2&cont_id=" . $row->cont_id . "&contactid=" . $row->ContactID); ?>" data-original-title="Update Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-edit"></i></a></div>
                                            </td>    
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    //print('<tr><td colspan="100%" align="center">No record found!</td></tr>');
                                }
                                ?>
                            </tbody>
                        </table>
    <?php if ($counter>0 && $count>20) { ?>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td><?php print("Page <b>" . $_GET['page'] . "</b> of " . $pages); ?></td>
                                    <td align="right"><?php
        //$next_prev = $p->nextPrev($_GET['page'], $pages, "&grp_id=".@$_REQUEST['grp_id']);
        if (isset($_REQUEST['grp_id'])) {
            $param = '&grp_id=' . $_REQUEST['grp_id'];
        } else {
            $param = '';
        }
        $next_prev = $p->nextPrev($_GET['page'], $pages, $param);
        print($next_prev);
        ?></td>
                                </tr>
                            </table>
                        <?php } ?>
    <?php if ($counter > 0) { ?>


                                                        <!--

                                        <?php if (isset($_REQUEST['grp_id'])) { ?>
                                <br>
                                <div style="padding:0px;margin:0px;">


                                            <?php
                                            if ($_SESSION["UType"] > 1) {
                                                //if($_SESSION["UType"]<3){	
                                                ?>
                                        Select Group:
                                        <select name="grp_id" id="a_select" style="width:250px;">
                                            <option value="0"> --Select Group-- </option>
                                                <?php echo FillSelected(" groups WHERE Contact_ID=" . $_SESSION["contact_id"], "grp_id", "GroupName", @$_SESSION['group_id']); ?>
                                        </select>
                                    <?php
                                    //} 
                                } else {
                                    ?>
                                        Select Group:
                                        <select name="grp_id" id="a_select" style="width:250px;">
                                            <?php echo FillSelected(" groups ", "grp_id", "GroupName", @$_SESSION['group_id']);?>
                                        </select>
                                    <?php } ?>


                                    Select Room:
                                    <select name="room_id" id="a_select" style="width:250px;">
                                        <?php echo FillSelected("rooms", "room_id", "room_title", 1); ?>
                                    </select> &nbsp; 
                                    <input type="submit" name="reserveRoom" value="Reserve Selected Members" class="btn btn-primary btn-animate-demo">
                                </div>
                                <?php } ?>   
                
                -->



                                        <!--<input type="submit" name="btnActive" value="Active" class="btn btn-primary btn-animate-demo">
                <input type="submit" name="btnInactive" value="In Active" class="btn btn-danger btn-animate-demo">-->
                            <?php } ?>
                
                
                    <?php if($_SESSION["UType"]!=3){?>
                        <h3> Invited Guests </h3>
                        <table class="table users-table table-condensed table-hover table-striped display dataTable" id="example2" >
                            <thead>
                                <tr>
<!--                                <th><input type="checkbox" name="chkAll" onClick="setAll();" ></th>-->
                                    <th class="visible-xs visible-sm visible-md visible-lg">First Name</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Last Name</th>
                                    <th class="visible-sm visible-md visible-lg">Email</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php

//    if ($_SESSION["UType"] == 1) {
//        if ($_SESSION['group_id'] > 0) {
//            $Query = "SELECT gc.*, c.* FROM group_contacts AS gc, contacts AS c WHERE gc.ContactID=c.ContactID AND gc.grp_id=" . $_SESSION['group_id'] . "";
//        } else {
//            $Query = "SELECT gc.*, c.* FROM group_contacts AS gc, contacts AS c WHERE gc.ContactID=c.ContactID";
//        }    
//    } else if($_SESSION["UType"] == 3) {
//            $Query = "SELECT gc.*, c.* FROM group_contacts AS gc LEFT OUTER JOIN contacts as c ON c.ContactID=gc.ContactID WHERE c.ContactID=" . $_SESSION["contact_id"] . "";
//    } else {
//        if ($_SESSION['group_id'] > 0) {
//            $Query = "SELECT gc.*, c.* FROM group_contacts AS gc, contacts AS c WHERE gc.ContactID=c.ContactID AND gc.grp_id=" . $_SESSION['group_id'] . "";
//        } else {
//            $Query = "SELECT gc.*, c.* FROM group_contacts AS gc, contacts AS c WHERE gc.ContactID=c.ContactID";
//        }
//    }

    
    if($_SESSION["UType"] == 3) {
            $Query = "SELECT c.* FROM contacts as c WHERE c.ContactID=".$_SESSION["contact_id"]." AND c.is_completed<=0 ";
    } else {
        if ($_SESSION['guest_name'] != '') {
            $Query = "SELECT gc.*, c.* FROM group_contacts AS gc, contacts AS c WHERE gc.grp_id = c.grp_id AND ( c.cont_fname LIKE '%".$_SESSION['guest_name']."%' OR c.cont_lname LIKE '%".$_SESSION['guest_name']."' OR c.cont_email LIKE '%".$_SESSION['guest_name']."' ) AND c.is_completed<=0 GROUP BY c.cont_id ";
        } else {
            $Query = "SELECT c.* FROM contacts AS c  WHERE c.is_completed<=0  ORDER BY c.cont_id ";
        }
    }

    
    
//    echo '<pre>';
//    echo '<br/><br/>';
//    echo $Query;
//    echo '<br/><br/>';
//    print_r( $_REQUEST );
//    echo '<br/><br/>';
//    print_r( $_SESSION );
//    echo '<br/><br/>';
//    echo '</pre>';

    
    $counter = 0;
    $limit = $_SESSION['limit_of_rec'];
    $start = $p->findStart($limit);
    $count = mysql_num_rows(mysql_query($Query));
    $pages = $p->findPages($count, $limit);

    $rs = mysql_query($Query . " LIMIT " . $start . ", " . $limit);
    if (mysql_num_rows($rs) > 0) {
        while ($row = mysql_fetch_object($rs)) {
            $counter++;
            ?>
                                        <tr>
<!--                                        <td><input type="checkbox" name="chkstatus[]" value="<?php print($row->cont_id); ?>" /></td>-->
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->cont_fname); ?></td>
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->cont_lname); ?></td>
                                            <td class="visible-sm visible-md visible-lg"><?php print($row->cont_email); ?></td>
                                            <td style="width:180px">
                                                <?php if ($_SESSION["UType"] != 3){?>
                                                    <div class="tooltips"><a href="<?php echo $_SERVER['PHP_SELF']."?contactid=" . $row->ContactID ."&btnDelete=1&chkstatus=".$row->ContactID;?>" data-original-title="Delete Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-minus-circle"></i></a></div>
                                                    <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF'] . "?send=1&cont_id=" . $row->cont_id . "&contactid=" . $row->ContactID);?>" data-original-title="<?php echo "Email has been sent ".$row->is_email.(($row->is_email>1)?' times ':' time ')." ";?>" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-envelope-o"></i></a></div> 
                                                <?php }?>
                                                <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF'] . "?show=1&cont_id=" . $row->cont_id . "&contactid=" . $row->ContactID); ?>" data-original-title="See Details" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-eye"></i></a></div>
                                                <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF'] . "?action=2&cont_id=" . $row->cont_id . "&contactid=" . $row->ContactID); ?>" data-original-title="Update Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-edit"></i></a></div>
                                            </td>    
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    //print('<tr><td colspan="100%" align="center">No record found!</td></tr>');
                                }
                                ?>
                            </tbody>
                        </table>
    <?php if ($counter>0 && $count>20) { ?>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td><?php print("Page <b>" . $_GET['page'] . "</b> of " . $pages); ?></td>
                                    <td align="right"><?php
        //$next_prev = $p->nextPrev($_GET['page'], $pages, "&grp_id=".@$_REQUEST['grp_id']);
        if (isset($_REQUEST['grp_id'])) {
            $param = '&grp_id=' . $_REQUEST['grp_id'];
        } else {
            $param = '';
        }
        $next_prev = $p->nextPrev($_GET['page'], $pages, $param);
        print($next_prev);
        ?></td>
                                </tr>
                            </table>
                        <?php } ?>
                    <?php }?>    

                
                
                
                
                
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</div>
    <?php include("includes/rightsidebar.php"); ?>
</div>
</div>
</div>
<?php include("includes/footer.php"); ?>
