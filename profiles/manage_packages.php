<?php include('includes/php_includes_top.php');?>
<?php 
if (isset($_REQUEST['action'])) {
if (isset($_REQUEST['btnAdd'])) {
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
        '" . dbStr($_REQUEST['Pms_Package_ID']) . "',
        '" . dbStr($_REQUEST['State_Code']) . "',
        '" . dbStr($_REQUEST['Status_Code']) . "',
        '" . dbStr($_REQUEST['Account_ID']) . "',
        '" . dbStr($_REQUEST['sforce_pricebookentryid']) . "',
        '" . dbStr($_REQUEST['sforce_product2id']) . "',
        '" . dbStr($_REQUEST['Package_Name']) . "',
        '" . dbStr($_REQUEST['Pricebook_Name']) . "',
        '" . dbStr($_REQUEST['Web_Package']) . "',
        '" . dbStr($_REQUEST['Package_Details']) . "',
        '" . dbStr($_REQUEST['Package_Notes']) . "',
        '" . dbStr($_REQUEST['Package_Terms']) . "',
        '" . dbStr($_REQUEST['Package_Fees']) . "',
        '" . dbStr($_REQUEST['Package_Includes']) . "',
        '" . dbStr($_REQUEST['Package_DoesNot_Include']) . "',
        '" . dbStr($_REQUEST['Associated_Species']) . "',
        '" . dbStr($_REQUEST['Type_Of_Adventure']) . "',
        '" . dbStr($_REQUEST['Package_Min_Days']) . "',
        '" . dbStr($_REQUEST['Package_Min_Adults']) . "',
        '" . dbStr($_REQUEST['Package_Min_Children']) . "',
        '" . dbStr($_REQUEST['Package_Min_People']) . "',
        '" . dbStr($_REQUEST['Package_Max_Days']) . "',
        '" . dbStr($_REQUEST['Package_Max_Adults']) . "',
        '" . dbStr($_REQUEST['Package_Max_Children']) . "',
        '" . dbStr($_REQUEST['Package_Max_People']) . "',
        '" . calendarDateConver4($_REQUEST['Arrival_Start_Date']) . "',
        '" . calendarDateConver4($_REQUEST['Arrival_End_Date']) . "',
        '" . dbStr($_REQUEST['Arrival_Travel_Days']) . "',
        '" . dbStr($_REQUEST['Departure_Travel_Days']) . "',
        '" . dbStr($_REQUEST['Arrival_Time_Min']) . "',
        '" . dbStr($_REQUEST['Departure_Time_Min']) . "',
        '" . dbStr($_REQUEST['Arrival_Time_Max']) . "',
        '" . dbStr($_REQUEST['Departure_Time_Max']) . "',
        '" . calendarDateConver4($_REQUEST['Booking_Start_Date']) . "',
        '" . calendarDateConver4($_REQUEST['Booking_End_Date']) . "',
        '" . dbStr($_REQUEST['Bookdays_Arrival_Min']) . "',
        '" . dbStr($_REQUEST['Bookdays_Arrival_Max']) . "',
        '" . dbStr($_REQUEST['Adult_Cost']) . "',
        '" . dbStr($_REQUEST['Child_Cost']) . "',
        '" . dbStr($_REQUEST['People_Cost']) . "',
        '" . dbStr($_REQUEST['Adult_Deposit']) . "',
        '" . dbStr($_REQUEST['Child_Deposit']) . "',
        '" . dbStr($_REQUEST['People_Deposit']) . "',
        '" . dbStr($_REQUEST['People_Fees']) . "',
        '" . dbStr($_REQUEST['Sunday_Arrive_On']) . "',
        '" . dbStr($_REQUEST['Monday_Arrive_On']) . "',
        '" . dbStr($_REQUEST['Tuesday_Arrive_On']) . "',
        '" . dbStr($_REQUEST['Wednesday_Arrive_On']) . "',
        '" . dbStr($_REQUEST['Thursday_Arrive_On']) . "',
        '" . dbStr($_REQUEST['Friday_Arrive_On']) . "',
        '" . dbStr($_REQUEST['Saturday_Arrive_On']) . "'
        )"
    );
}
            
            
if (isset($_REQUEST['btnUpdate'])) {
       $udtQuery = "UPDATE packages SET
		Pms_Package_ID='" . $_REQUEST['Pms_Package_ID'] . "',
		State_Code='" . $_REQUEST['State_Code'] . "',
		Account_ID='" . $_REQUEST['Account_ID'] . "',
		sforce_pricebookentryid='" . $_REQUEST['sforce_pricebookentryid'] . "',
		sforce_product2id='" . $_REQUEST['sforce_product2id'] . "',
		Package_Name='" . $_REQUEST['Package_Name'] . "',
		Pricebook_Name='" . $_REQUEST['Pricebook_Name'] . "',
		Web_Package='" . $_REQUEST['Web_Package'] . "',
		Package_Details='" . $_REQUEST['Package_Details'] . "',
		Package_Notes='" . $_REQUEST['Package_Notes'] . "',
		Package_Terms='" . $_REQUEST['Package_Terms'] . "',
		Package_Fees='" . $_REQUEST['Package_Fees'] . "',
		Package_Includes='" . $_REQUEST['Package_Includes'] . "',
		Package_DoesNot_Include='" . $_REQUEST['Package_DoesNot_Include'] . "',
		Associated_Species='" . $_REQUEST['Associated_Species'] . "',
		Type_Of_Adventure='" . $_REQUEST['Type_Of_Adventure'] . "',
		Package_Min_Days='" . $_REQUEST['Package_Min_Days'] . "',
		Package_Min_Adults='" . $_REQUEST['Package_Min_Adults'] . "',
		Package_Min_Children='" . $_REQUEST['Package_Min_Children'] . "',
		Package_Min_People='" . $_REQUEST['Package_Min_People'] . "',
		Package_Max_Days='" . $_REQUEST['Package_Max_Days'] . "',
		Package_Max_Adults='" . $_REQUEST['Package_Max_Adults'] . "',
		Package_Max_Children='" . $_REQUEST['Package_Max_Children'] . "',
		Package_Max_People='" . $_REQUEST['Package_Max_People'] . "',
		Arrival_Start_Date='" . calendarDateConver4($_REQUEST['Arrival_Start_Date']). "',
		Arrival_End_Date='" . calendarDateConver4($_REQUEST['Arrival_End_Date']). "',
		Arrival_Travel_Days='" . $_REQUEST['Arrival_Travel_Days'] . "',
		Departure_Travel_Days='" . $_REQUEST['Departure_Travel_Days'] . "',
		Arrival_Time_Min='" . $_REQUEST['Arrival_Time_Min'] . "',
		Departure_Time_Min='" . $_REQUEST['Departure_Time_Min'] . "',
		Arrival_Time_Max='" . $_REQUEST['Arrival_Time_Max'] . "',
		Departure_Time_Max='" . $_REQUEST['Departure_Time_Max'] . "',
		Booking_Start_Date='" . calendarDateConver4($_REQUEST['Booking_Start_Date']) . "',
		Booking_End_Date='" . calendarDateConver4($_REQUEST['Booking_End_Date']) . "',
		Bookdays_Arrival_Min='" . $_REQUEST['Bookdays_Arrival_Min'] . "',
		Bookdays_Arrival_Max='" . $_REQUEST['Bookdays_Arrival_Max'] . "',
		Adult_Cost='" . $_REQUEST['Adult_Cost'] . "',
		Child_Cost='" . $_REQUEST['Child_Cost'] . "',
		People_Cost='" . $_REQUEST['People_Cost'] . "',
		Adult_Deposit='" . $_REQUEST['Adult_Deposit'] . "',
		Child_Deposit='" . $_REQUEST['Child_Deposit'] . "',
		People_Deposit='" . $_REQUEST['People_Deposit'] . "',
		People_Fees='" . $_REQUEST['People_Fees'] . "',
		Sunday_Arrive_On='" . $_REQUEST['Sunday_Arrive_On'] . "',
		Monday_Arrive_On='" . $_REQUEST['Monday_Arrive_On'] . "',
		Tuesday_Arrive_On='" . $_REQUEST['Tuesday_Arrive_On'] . "',
		Wednesday_Arrive_On='" . $_REQUEST['Wednesday_Arrive_On'] . "',
		Thursday_Arrive_On='" . $_REQUEST['Thursday_Arrive_On'] . "',
		Friday_Arrive_On='" . $_REQUEST['Friday_Arrive_On'] . "',
		Saturday_Arrive_On='" . $_REQUEST['Saturday_Arrive_On'] . "'
		WHERE pack_id=" . $_REQUEST['pack_id'];
        mysql_query($udtQuery) or die(mysql_error());
        header("Location: " . $_SERVER['PHP_SELF'] . "?op=2");
    } elseif ($_REQUEST['action'] == 2) {
        $rsM = mysql_query("SELECT * FROM packages WHERE pack_id=" . $_REQUEST['pack_id']);
        if (mysql_num_rows($rsM) > 0) {
            $rsMem = mysql_fetch_object($rsM);
            $pack_id = $rsMem->pack_id;
            $Pms_Package_ID = $rsMem->Pms_Package_ID;
            $State_Code = $rsMem->State_Code;
            $Status_Code = $rsMem->Status_Code;
            $Account_ID = $rsMem->Account_ID;
            $sforce_pricebookentryid = $rsMem->sforce_pricebookentryid;
            $sforce_product2id = $rsMem->sforce_product2id;
            $Package_Name = $rsMem->Package_Name;
            $Pricebook_Name = $rsMem->Pricebook_Name;
            $Web_Package = $rsMem->Web_Package;
            $Package_Details = $rsMem->Package_Details;
            $Package_Notes = $rsMem->Package_Notes;
            $Package_Terms = $rsMem->Package_Terms;
            $Package_Fees = $rsMem->Package_Fees;
            $Package_Includes = $rsMem->Package_Includes;
            $Package_DoesNot_Include = $rsMem->Package_DoesNot_Include;
            $Associated_Species = $rsMem->Associated_Species;
            $Type_Of_Adventure = $rsMem->Type_Of_Adventure;
            $Package_Min_Days = $rsMem->Package_Min_Days;
            $Package_Min_Adults = $rsMem->Package_Min_Adults;
            $Package_Min_Children = $rsMem->Package_Min_Children;
            $Package_Min_People = $rsMem->Package_Min_People;
            $Package_Max_Days = $rsMem->Package_Max_Days;
            $Package_Max_Adults = $rsMem->Package_Max_Adults;
            $Package_Max_Children = $rsMem->Package_Max_Children;
            $Package_Max_People = $rsMem->Package_Max_People;
            $Arrival_Start_Date = calendarDateConver2($rsMem->Arrival_Start_Date);
            $Arrival_End_Date = calendarDateConver2($rsMem->Arrival_End_Date);
            $Arrival_Travel_Days = $rsMem->Arrival_Travel_Days;
            $Departure_Travel_Days = $rsMem->Departure_Travel_Days;
            $Arrival_Time_Min = $rsMem->Arrival_Time_Min;
            $Departure_Time_Min = $rsMem->Departure_Time_Min;
            $Arrival_Time_Max = $rsMem->Arrival_Time_Max;
            $Departure_Time_Max = $rsMem->Departure_Time_Max;
            $Booking_Start_Date = calendarDateConver2($rsMem->Booking_Start_Date);
            $Booking_End_Date = calendarDateConver2($rsMem->Booking_End_Date);
            $Bookdays_Arrival_Min = $rsMem->Bookdays_Arrival_Min;
            $Bookdays_Arrival_Max = $rsMem->Bookdays_Arrival_Max;
            $Adult_Cost = $rsMem->Adult_Cost;
            $Child_Cost = $rsMem->Child_Cost;
            $People_Cost = $rsMem->People_Cost;
            $Adult_Deposit = $rsMem->Adult_Deposit;
            $Child_Deposit = $rsMem->Child_Deposit;
            $People_Deposit = $rsMem->People_Deposit;
            $People_Fees = $rsMem->People_Fees;
            $Sunday_Arrive_On = $rsMem->Sunday_Arrive_On;
            $Monday_Arrive_On = $rsMem->Monday_Arrive_On;
            $Tuesday_Arrive_On = $rsMem->Tuesday_Arrive_On;
            $Wednesday_Arrive_On = $rsMem->Wednesday_Arrive_On;
            $Thursday_Arrive_On = $rsMem->Thursday_Arrive_On;
            $Friday_Arrive_On = $rsMem->Friday_Arrive_On;
            $Saturday_Arrive_On = $rsMem->Saturday_Arrive_On;
            $formHead = "Update Info";
        }
    } else {
            $pack_id = "";
            $Pms_Package_ID ="";
            $State_Code = "";
            $Status_Code = "";
            $Account_ID =""; 
            $sforce_pricebookentryid = "";
            $sforce_product2id = "";
            $Package_Name ="";
            $Pricebook_Name = "";
            $Web_Package = "";
            $Package_Details =""; 
            $Package_Notes = "";
            $Package_Terms = "";
            $Package_Fees = "";
            $Package_Includes = "";
            $Package_DoesNot_Include = "";
            $Associated_Species = "";
            $Type_Of_Adventure ="";
            $Package_Min_Days = "";
            $Package_Min_Adults ="";
            $Package_Min_Children = "";
            $Package_Min_People ="";
            $Package_Max_Days = "";
            $Package_Max_Adults = "";
            $Package_Max_Children = "";
            $Package_Max_People = "";
            $Arrival_Start_Date ="";
            $Arrival_End_Date = "";
            $Arrival_Travel_Days =""; 
            $Departure_Travel_Days = "";
            $Arrival_Time_Min = "";
            $Departure_Time_Min = "";
            $Arrival_Time_Max = "";
            $Departure_Time_Max =""; 
            $Booking_Start_Date ="";
            $Booking_End_Date = "";
            $Bookdays_Arrival_Min = "";
            $Bookdays_Arrival_Max = "";
            $Adult_Cost = "";
            $Child_Cost ="";
            $People_Cost = "";
            $Adult_Deposit = "";
            $Child_Deposit = "";
            $People_Deposit = "";
            $People_Fees = "";
            $Sunday_Arrive_On = "";
            $Monday_Arrive_On = "";
            $Tuesday_Arrive_On ="";
            $Wednesday_Arrive_On ="";
            $Thursday_Arrive_On = "";
            $Friday_Arrive_On = "";
            $Saturday_Arrive_On ="";
            $formHead = "Add New";
    }
}
if (isset($_REQUEST['show'])) {
    $rsM = mysql_query("SELECT * FROM packages WHERE pack_id=" . $_REQUEST['pack_id']);
    if (mysql_num_rows($rsM) > 0) {
        $rsMem = mysql_fetch_object($rsM);
        $pack_id = $rsMem->pack_id;
            $Pms_Package_ID = $rsMem->Pms_Package_ID;
            $State_Code = $rsMem->State_Code;
            $Status_Code = $rsMem->Status_Code;
            $Account_ID = $rsMem->Account_ID;
            $sforce_pricebookentryid = $rsMem->sforce_pricebookentryid;
            $sforce_product2id = $rsMem->sforce_product2id;
            $Package_Name = $rsMem->Package_Name;
            $Pricebook_Name = $rsMem->Pricebook_Name;
            $Web_Package = $rsMem->Web_Package;
            $Package_Details = $rsMem->Package_Details;
            $Package_Notes = $rsMem->Package_Notes;
            $Package_Terms = $rsMem->Package_Terms;
            $Package_Fees = $rsMem->Package_Fees;
            $Package_Includes = $rsMem->Package_Includes;
            $Package_DoesNot_Include = $rsMem->Package_DoesNot_Include;
            $Associated_Species = $rsMem->Associated_Species;
            $Type_Of_Adventure = $rsMem->Type_Of_Adventure;
            $Package_Min_Days = $rsMem->Package_Min_Days;
            $Package_Min_Adults = $rsMem->Package_Min_Adults;
            $Package_Min_Children = $rsMem->Package_Min_Children;
            $Package_Min_People = $rsMem->Package_Min_People;
            $Package_Max_Days = $rsMem->Package_Max_Days;
            $Package_Max_Adults = $rsMem->Package_Max_Adults;
            $Package_Max_Children = $rsMem->Package_Max_Children;
            $Package_Max_People = $rsMem->Package_Max_People;
            $Arrival_Start_Date = $rsMem->Arrival_Start_Date;
            $Arrival_End_Date = $rsMem->Arrival_End_Date;
            $Arrival_Travel_Days = $rsMem->Arrival_Travel_Days;
            $Departure_Travel_Days = $rsMem->Departure_Travel_Days;
            $Arrival_Time_Min = $rsMem->Arrival_Time_Min;
            $Departure_Time_Min = $rsMem->Departure_Time_Min;
            $Arrival_Time_Max = $rsMem->Arrival_Time_Max;
            $Departure_Time_Max = $rsMem->Departure_Time_Max;
            $Booking_Start_Date = $rsMem->Booking_Start_Date;
            $Booking_End_Date = $rsMem->Booking_End_Date;
            $Bookdays_Arrival_Min = $rsMem->Bookdays_Arrival_Min;
            $Bookdays_Arrival_Max = $rsMem->Bookdays_Arrival_Max;
            $Adult_Cost = $rsMem->Adult_Cost;
            $Child_Cost = $rsMem->Child_Cost;
            $People_Cost = $rsMem->People_Cost;
            $Adult_Deposit = $rsMem->Adult_Deposit;
            $Child_Deposit = $rsMem->Child_Deposit;
            $People_Deposit = $rsMem->People_Deposit;
            $People_Fees = $rsMem->People_Fees;
            $Sunday_Arrive_On = $rsMem->Sunday_Arrive_On;
            $Monday_Arrive_On = $rsMem->Monday_Arrive_On;
            $Tuesday_Arrive_On = $rsMem->Tuesday_Arrive_On;
            $Wednesday_Arrive_On = $rsMem->Wednesday_Arrive_On;
            $Thursday_Arrive_On = $rsMem->Thursday_Arrive_On;
            $Friday_Arrive_On = $rsMem->Friday_Arrive_On;
            $Saturday_Arrive_On = $rsMem->Saturday_Arrive_On;
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
if (isset($_REQUEST['btnDelete'])) {
    if (isset($_REQUEST['chkstatus'])) {
        for ($i = 0; $i < count($_REQUEST['chkstatus']); $i++) {
            //mysql_query("DELETE FROM mem_sites WHERE site_id = ".$_REQUEST['chkstatus'][$i]);
            mysql_query("DELETE FROM packages  WHERE pack_id=" . $_REQUEST['chkstatus'][$i]) or die(mysql_query());

            $class = "alert alert-success";
            $strMSG = "Record(s) deleted successfully";
        }
    } else {
        $msg_class = 'msg_box msg_alert';
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
        case 4:
            $class = "notification success";
            $strMSG = "Please Select Checkbox to Add or Subtract Credits";
            break;
        case 8:
            if(@$_REQUEST['imp'] == 0){
                $strMSG = "No More Records To Import.";
            } else {
                $strMSG = "Data Syncronized Successfully, ".@$_REQUEST['imp']." Records Were Imported.";
            }
            $class = "alert alert-success";
            break;
    }
}

?>
<?php include('includes/html_header.php');?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
        </ul>
        <div class="form-group hiddn-minibar pull-right">
            <!--<input type="text" class="form-control form-cascade-control nav-input-search" size="20" placeholder="Search through site" />
            <span class="input-icon fui-search"></span>-->
        </div>
        <h3 class="page-header"> Manage Packages <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b>Manage Packages: </b> You can manage your packages here </p>
        </blockquote>
    </div>
</div>


			
<?php if(isset($_REQUEST['action'])){ ?>

        <div class="row">
                <div class="col-md-12">
                        <div class="panel panel-cascade">
                                <div class="panel-heading">
                                        <h3 class="panel-title text-primary">
            <?php print($formHead);?>

            </h3>
                                </div>

                            
                            
                            
                <div class="panel-body panel-border">
                    <form name="frm" id="frm" method="post" class="form-horizontal" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" role="form">
                        
                        
                        
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package ID</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Package ID..." value="<?php print($Pms_Package_ID);?>" name="Pms_Package_ID">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">State Code</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <input type="text" class="form-control form-cascade-control input_wid70" placeholder="State Code..." value="<?php print($State_Code);?>" name="State_Code">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Status Code</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Status Code..." value="<?php print($Status_Code);?>" name="Status_Code">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Account ID</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Account ID..." value="<?php print($Account_ID);?>" name="Account_ID">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Sforce Pricebookentry id</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Sforce Pricebookentry id..." value="<?php print($sforce_pricebookentryid);?>" name="sforce_pricebookentryid" >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Sforce Product2 id</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Sforce Product2 id..." value="<?php print($sforce_product2id);?>" name="sforce_product2id" >
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Packages  Name</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Package Name..." value="<?php print($Package_Name);?>" name="Package_Name">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Pricebook Name</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Pricebook Name..." value="<?php print($Pricebook_Name);?>" name="Pricebook_Name">
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Web Package</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Web Package..." value="<?php print($Web_Package);?>" name="Web_Package">
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Details</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Package Details..." value="<?php print($Package_Details);?>" name="Package_Details" >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Notes</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Package Notes..." value="<?php print($Package_Notes);?>" name="Package_Notes">
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Terms</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Package Terms..." value="<?php print($Package_Terms);?>" name="Package_Terms" >
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Fees</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Package Fees..." value="<?php print($Package_Fees);?>" name="Package_Fees">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Includes</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Package Includes..." value="<?php print($Package_Includes);?>" name="Package_Includes">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package DoesNot Include</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Package DoesNot Include..." value="<?php print($Package_DoesNot_Include);?>" name="Package_DoesNot_Include">
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Associated Species</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Associated Species.." value="<?php print($Associated_Species);?> " name="Associated_Species">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Type Of Adventure</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Type Of Adventure..." value="<?php print($Type_Of_Adventure);?>" name="Type_Of_Adventure" >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Min Days</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Package Min Days.." value="<?php print($Package_Min_Days);?>" name="Package_Min_Days">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Min Adults</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Package Min Adults..." value="<?php print($Package_Min_Adults);?>" name="Package_Min_Adults">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Min Children</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Package Min Children..." value="<?php print($Package_Min_Children);?>" name="Package_Min_Children">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Min People</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Package Min People..." value="<?php print($Package_Min_People);?>" name="Package_Min_People">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Max Days</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Package Max Days..." value="<?php print($Package_Max_Days);?>" name="Package_Max_Days">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Max Adults</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Package Max Adults..." value="<?php print($Package_Max_Adults);?>" name="Package_Max_Adults">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Max Children</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Package Max Children..." value="<?php print($Package_Max_Children);?>" name="Package_Max_Children">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Max People</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Package Max People..." value="<?php print($Package_Max_People);?>" name="Package_Max_People">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Start Date</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="orm-control form-cascade-control input_wid70 datetimepicker" placeholder="Arrival Start Date..." value="<?php print($Arrival_Start_Date);?>" id="Arrival_Start_Date" name="Arrival_Start_Date">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival End Date</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="orm-control form-cascade-control input_wid70  datetimepicker" placeholder="Arrival End Date..." value="<?php print($Arrival_End_Date);?>" id="Arrival_End_Date" name="Arrival_End_Date">
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Travel Days</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Arrival Travel Days..." value="<?php print($Arrival_Travel_Days);?>" name="Arrival_Travel_Days">
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Travel Days</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Departure Travel Days..." value="<?php print($Departure_Travel_Days);?>" name="Departure_Travel_Days">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Time Min</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Arrival Time Min..." value="<?php print($Arrival_Time_Min);?>" name="Arrival_Time_Min">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Time Min</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Departure Time Min..." value="<?php print($Departure_Time_Min);?>" name="Departure_Time_Min">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Time Max</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Arrival Time Max..." value="<?php print($Arrival_Time_Max);?>" name="Arrival_Time_Max">
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Time Max</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Departure Time Max..." value="<?php print($Departure_Time_Max);?>" name="Departure_Time_Max">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Booking Start Date</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="orm-control form-cascade-control input_wid70  datetimepicker" placeholder="Booking Start Date..." value="<?php print($Booking_Start_Date);?>" id="Booking_Start_Date" name="Booking_Start_Date">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Booking End Date</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="orm-control form-cascade-control input_wid70  datetimepicker" placeholder="Booking End Date..." value="<?php print($Booking_End_Date);?>" id="Booking_End_Date" name="Booking_End_Date">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Bookdays Arrival Min</label>
                            <div class="col-lg-10 col-md-9 det-display">
                           <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Bookdays Arrival Min..." value="<?php print($Bookdays_Arrival_Min);?>" name="Bookdays_Arrival_Min">
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Bookdays Arrival Max</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Bookdays Arrival Max..." value="<?php print($Bookdays_Arrival_Max);?>" name="Bookdays_Arrival_Max">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Adult Cost</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Adult Cost..." value="<?php print($Adult_Cost);?>" name="Adult_Cost">
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Child Cost</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Child Cost..." value="<?php print($Child_Cost);?>" name="Child_Cost">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">People Cost</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="People Cost..." value="<?php print($People_Cost);?>" name="People_Cost">
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Adult Deposit</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Adult Deposit..." value="<?php print($Adult_Deposit);?>" name="Adult_Deposit">
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Child Deposit</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Child Deposit..." value="<?php print($Child_Deposit);?>" name="Child_Deposit">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">People Deposit</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="People Deposit..." value="<?php print($People_Deposit);?>" name="People_Deposit">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">People Fees</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="People Fees..." value="<?php print($People_Fees);?>" name="People_Fees">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Sunday Arrive On</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Sunday Arrive On..." value="<?php print($Sunday_Arrive_On);?>" name="Sunday_Arrive_On">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Monday Arrive On</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Monday Arrive On..." value="<?php print($Monday_Arrive_On);?>" name="Monday_Arrive_On">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Tuesday Arrive On</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Tuesday Arrive On..." value="<?php print($Tuesday_Arrive_On);?>" name="Tuesday_Arrive_On">
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Wednesday Arrive On</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Wednesday Arrive On..." value="<?php print($Wednesday_Arrive_On);?>" name="Wednesday_Arrive_On">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Thursday Arrive On</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Thursday Arrive On.." value="<?php print($Thursday_Arrive_On);?>" name="Thursday_Arrive_On">
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Friday Arrive On</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Friday Arrive On..." value="<?php print($Friday_Arrive_On);?>" name="Friday_Arrive_On">
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Saturday Arrive On</label>
                            <div class="col-lg-10 col-md-9 det-display">
                            <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Saturday Arrive On..." value="<?php print($Saturday_Arrive_On);?>" name="Saturday_Arrive_On">
                            </div>
                        </div>
                     
                        
                        

                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <?php if ($_REQUEST['action'] == 1) { ?>
                                    <button type="submit" name="btnAdd" class="btn btn-primary btn-animate-demo">Submit</button>
    <?php } else { ?>
                                    <button type="submit" name="btnUpdate" class="btn btn-primary btn-animate-demo">Submit</button>
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
<?php } elseif(isset($_REQUEST['show'])){ ?>
        <div class="row">
                <div class="col-md-12">
                        <div class="panel panel-cascade">
                                <div class="panel-heading">
                                        <h3 class="panel-title">
                                                Details
                                        </h3>
                                </div>



                <div class="panel-body">
                    <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Packages ID</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Pms_Package_ID); ?> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">State Code</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($State_Code); ?> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Status Code</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Status_Code); ?> 
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Account ID</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Account_ID); ?> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Sforce Pricebooken try id</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($sforce_pricebookentryid); ?> 
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Sforce product2 id</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($sforce_product2id); ?> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package  Name</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Package_Name); ?> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Pricebook Name</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Pricebook_Name); ?> 
                            </div>
                        </div>
                       
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Web Package</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Web_Package); ?> 
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Details</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Package_Details); ?> 
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Notes</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Package_Notes); ?> 
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Terms</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Package_Terms); ?> 
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Fees</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Package_Fees); ?> 
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Includes</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Package_Includes); ?> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package DoesNot Include</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Package_DoesNot_Include); ?> 
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Associated Species</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Associated_Species); ?> 
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Type Of Adventure</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Type_Of_Adventure); ?> 
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Min Days</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Package_Min_Days); ?> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Min Adults</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Package_Min_Adults); ?> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Min Children</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Package_Min_Children); ?> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Min People</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Package_Min_People); ?> 
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Max Days</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Package_Max_Days); ?> 
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Max Adults</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Package_Max_Adults); ?> 
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Max Children</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Package_Max_Children); ?> 
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Max People</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Package_Max_People); ?> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Start Date</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php echo calendarDateConver2($Arrival_Start_Date); ?> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival End Date</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php echo calendarDateConver2($Arrival_End_Date); ?> 
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Travel Days</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Arrival_Travel_Days); ?> 
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Travel Days</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Departure_Travel_Days); ?> 
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Time Min</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Arrival_Time_Min); ?> 
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Time Min</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Departure_Time_Min); ?> 
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Time Max</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Arrival_Time_Max); ?> 
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Time Max</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Departure_Time_Max); ?> 
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Booking Start Date</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php echo calendarDateConver2($Booking_Start_Date); ?> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Booking End Date</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php echo calendarDateConver2($Booking_End_Date); ?> 
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Book days Arrival Min</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Bookdays_Arrival_Min); ?> 
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Book days Arrival Max</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Bookdays_Arrival_Max); ?> 
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Adult Cost</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Adult_Cost); ?> 
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Child Cost</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Child_Cost); ?> 
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">People Cost</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($People_Cost); ?> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Adult Deposit</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Adult_Deposit); ?> 
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Child Deposit</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Child_Deposit); ?> 
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">People Deposit</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($People_Deposit); ?> 
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">People Fees</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($People_Fees); ?> 
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Sunday Arrive On</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Sunday_Arrive_On); ?> 
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Monday Arrive On</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Monday_Arrive_On); ?> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Tuesday Arrive On</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Tuesday_Arrive_On); ?> 
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Wednesday Arrive On</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Wednesday_Arrive_On); ?> 
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Thursday Arrive On</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Thursday_Arrive_On); ?> 
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Friday Arrive On</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Friday_Arrive_On); ?> 
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Saturday Arrive On</label>
                            <div class="col-lg-10 col-md-9 det-display">
                             <?php print($Saturday_Arrive_On); ?> 
                            </div>
                        </div>
                      
                        
                        
                       
                       
                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <button type="button" name="btnBack" class="btn btn-default btn-animate-demo" onclick="javascript: window.location = '<?php print($_SERVER['PHP_SELF']); ?>';">Back</button>
                            </div>
                        </div>					
                    </form>
                </div>





                        </div>
                </div>
        </div>
<?php } else{ ?>
    <div class="row">
        <div class="col-md-12">
            <div class="<?php print($class);?>"><?php print($strMSG);?></div>
            <div class="panel">
                <div class="panel-heading text-primary">
                    <h3 class="panel-title"><i class="fa fa-list"></i> Packages
                        <span class="pull-right" style="width:auto;">
                            <div style="float:right;">
                                <a href="<?php print("sync/packages.php?get_packages=1");?>"><i class="fa fa-plus"></i>Synchronize Packages</a> 
<!--                                <a href="<?php print($_SERVER['PHP_SELF']."?action=1");?>" title="Add New"><i class="fa fa-plus"></i> Add New</a>-->
                            </div>
                        </span> 
                    </h3>
                </div>
                <div class="panel-body">
                    <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);?>" class="form-horizontal" role="form">
                        <table class="table users-table table-condensed table-hover table-striped display dataTable" id="example" >
                            <thead>
                                <tr>
<!--                                    <th class="visible-lg"><input type="checkbox" name="chkAll" onClick="setAll();"></th>-->
                                    <th class="visible-xs visible-sm visible-md visible-lg">Package Name</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Start Date</th>
                                    <th class="visible-sm visible-md visible-lg">End Date</th>
                                    <th class="visible-sm visible-md visible-lg">Booking Start</th>
                                    <th class="visible-sm visible-md visible-lg">Booking End</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    //$Query="SELECT * from packages WHERE Arrival_Start_Date>='2014-05-01'  ORDER BY Arrival_Start_Date ";
                                    $Query="SELECT * from packages WHERE Arrival_Start_Date>='2014-05-01' ORDER BY Arrival_Start_Date ";
                                    $counter=0;
                                    $limit = 50;
                                    $start = $p->findStart($limit); 
                                    $count = mysql_num_rows(mysql_query($Query)); 
                                    $pages = $p->findPages($count, $limit); 
                                    $rs = mysql_query($Query." LIMIT ".$start.", ".$limit);
                                    if(mysql_num_rows($rs)>0){
                                        while($row=mysql_fetch_object($rs)){	
                                            $counter++;
                                ?>
                                <tr>
<!--
                                    <td class="visible-lg"><input type="checkbox" name="chkstatus[]" value="<?php print($row->pack_id);?>" /></td>
-->
                                    <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->Package_Name);?> </td>
                                    <td class="visible-xs visible-sm visible-md visible-lg"><?php echo calendarDateConver2($row->Arrival_Start_Date);?></td>
                                    <td class="visible-sm visible-md visible-lg"><?php echo calendarDateConver2($row->Arrival_End_Date);?></td>
                                    <td class="visible-sm visible-md visible-lg"><?php echo calendarDateConver2($row->Booking_Start_Date);?></td>
                                    <td class="visible-sm visible-md visible-lg"><?php echo calendarDateConver2($row->Booking_End_Date);?></td>
                                    <td style="width:100px">
                                        <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF']."?show=1&pack_id=".$row->pack_id);?>" data-original-title="See Details" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-eye"></i></a></div>
                                        <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF']."?action=2&pack_id=".$row->pack_id);?>" data-original-title="Update Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-edit"></i></a></div>
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
                        <?php if($counter > 0) {?>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td><?php print("Page <b>".$_GET['page']."</b> of ".$pages);?></td>
                                    <td align="right">
                                        <?php	
                                            $next_prev = $p->nextPrev($_GET['page'], $pages, '');
                                            print($next_prev);
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        <?php }?>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>    
            


</div>
<?php include("includes/rightsidebar.php");?>
</div> </div> </div>
<?php //include("includes/footer.php"); ?>
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="js/less-1.5.0.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/bootstrap-switch.js"></script>
    <script src="js/jquery.tagsinput.js"></script>
    <script src="js/jquery.placeholder.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    <script src="js/application.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/jquery.sortable.js"></script>
    <script type="text/javascript" src="js/jquery.gritter.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/skylo.js"></script>
    <script src="js/prettify.min.js"></script>
    <script src="js/jquery.noty.js"></script>
    <script src="js/bic_calendar.js"></script>
    <script src="js/jquery.accordion.js"></script>
    <script src="js/theme-options.js"></script>
    <script src="js/failsafe.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/bootstrap-progressbar.js"></script>
    <script src="js/bootstrap-progressbar-custom.js"></script>
    <script src="js/bootstrap-colorpicker.min.js"></script>
    <script src="js/bootstrap-colorpicker-custom.js"></script>
    <script src="js/tooltips-popovers.js"></script>
    <script src="js/chosen.jquery.js"></script>
    <script src="js/jquery.pulsate.min.js"></script>
    <script src="js/bootstrap-datatables.js"></script>

    <script src="js/bootstrap-timepicker-edited.js"></script>
    <script src="js/bootstrap-timepicker-custom.js"></script>

<!--    <script src="js/fullcalendar.min.js"></script>-->
<!--    <script src="js/fullcalendar-custom.js"></script>-->
<!--    <script src="js/fullcalendar-custom-ck.js"></script>-->
    
    
    <script src="js/forms-custom.js"></script>
	<script>
        $(function() {
            //$(".datepicker").datepicker();
            //$.datepicker.setDefaults({dateFormat: 'yy-mm-dd'});
        });
    </script>
    <script src="js/bootstrap-datetimepicker.js"></script>
    <script>
        $(function() {
            //$(".datepicker").datepicker();
            //$(".datetimepicker").datetimepicker();
            $(".datetimepicker").datepicker();
            //$.datepicker.setDefaults({dateFormat: 'yy-mm-dd'});
        });
    </script>
    <script src="js/validate.js"></script>
    <script language="javascript">
        $(document).ready(function(){
            $("#frm").validate();
        });
    </script>
    <script src="js/validation-custom.js"></script>
    <script src="js/core.js"></script>
    </body>
</html>
<style>
/*
    .panel > .panel-heading a{
        height: 32px !important;
    }
    .chosen-container-single .chosen-single{
        height: 32px !important;
    }
    .chosen-container-multi .chosen-choices li.search-field input[type="text"]{
        height: 32px;
    }
*/
    #example_filter{display:none;}
    #example_length{display:none;}
    #example_info{display:none;}
    .dataTables_paginate{display:none;}
    th:hover{cursor: pointer;}
/*
    .chosen-container{z-index: 99999 !important;}
    .chosen-container-single{z-index: 99999 !important;}
    .chosen-results{z-index: 99999 !important;}
*/
</style>

<script type="text/javascript">
$('document').ready(function(){
    $('#example').dataTable({
        "sPaginationType": "bootstrap",
        "bSearchable":false,
        "bInfo":false,
        "bPaginate": false,
        "bFilter": false,
        "bSort": true,
        "aaSorting": [[ 1, "asc" ]]
    });
});
</script>
