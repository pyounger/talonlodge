<?php include('includes/php_includes_top.php'); ?>
<?php
if (isset($_REQUEST['grp_id'])) {
    $_SESSION['group_id'] = $_REQUEST['grp_id'];
} else {
    if (!isset($_SESSION['group_id'])) {
        $_SESSION['group_id'] = 0;
    }
}
if (isset($_REQUEST['send'])) {
    $rs = mysql_query("SELECT * FROM users WHERE cont_id=" . $_REQUEST['contactid']);
    if (mysql_num_rows($rs) > 0) {
        $row = mysql_fetch_object($rs);
        $cont_email = returnName("cont_email", "contacts", "ContactID", $_REQUEST['contactid'], $extra = '');
        mysql_query("UPDATE contacts SET is_email = (is_email + 1) WHERE ContactID = ".$_REQUEST['contactid']."");
        emailToCustomer(dbStr($cont_email), dbStr($row->user_pasphrase), dbStr($row->user_display_name), dbStr($_REQUEST['contactid']), $row->user_name);
        $strMSG = " Login Info sent ";
        $class = "alert alert-success";
    } else {
        $MaxID = getMaximum("users", "user_id");
        $rs = mysql_query("SELECT * FROM contacts WHERE ContactID=" . $_REQUEST['contactid']);
        if(mysql_num_rows($rs)>0){
            $row = mysql_fetch_object($rs);
            $random_password = substr(number_format(time() * rand(),0,'',''),0,8);
            if($row->cont_email!=''){
                if($_REQUEST['send']==1){
                    //Guest Profile
                    $user_name = dbStr($row->cont_fname).'_'.$row->ContactID;
                    $user_display_name = dbStr($row->cont_fname).' '.dbStr($row->cont_lname);
                    mysql_query("INSERT INTO users (user_id, user_name, user_pass, user_display_name, utype_id, cust_id, cont_id, createdDate, user_pasphrase) VALUES (".$MaxID.", '".dbStr($user_name)."', '".md5($random_password)."', '".$user_display_name."', '3', ".$row->cust_id.", ".$row->ContactID.", NOW(), '".$random_password."')");
                    $rs1 = mysql_query("SELECT * FROM users WHERE cont_id=" . $_REQUEST['contactid']);
                    if (mysql_num_rows($rs1) > 0) {
                        $row1 = mysql_fetch_object($rs1);
                        $cont_email = returnName("cont_email", "contacts", "ContactID", $_REQUEST['contactid'], $extra = '');
                        mysql_query("UPDATE contacts SET is_email = (is_email + 1) WHERE ContactID = ".$_REQUEST['contactid']."");
                        emailToCustomer($cont_email, dbStr($row1->user_pasphrase), dbStr($row1->user_display_name), dbStr($_REQUEST['contactid']), dbStr($row1->user_name));
                    }
                    $strMSG = " Login Info sent ";
                    $class = "alert alert-success";
                } else {
                    //Group Leader Profile
                    $user_name = dbStr($row->cont_fname).'_'.$row->ContactID;
                    $user_display_name = dbStr($row->cont_fname).' '.dbStr($row->cont_lname);
                    mysql_query("INSERT INTO users (user_id, user_name, user_pass, user_display_name, utype_id, cust_id, cont_id, createdDate, user_pasphrase) VALUES (".$MaxID.", '".dbStr($user_name)."', '".md5($random_password)."', '".$user_display_name."', '2', ".$row->cust_id.", ".$row->ContactID.", NOW(), '".$random_password."')") or die(mysql_error());
                    $rs1 = mysql_query("SELECT * FROM users WHERE cont_id=" . $_REQUEST['contactid']);
                    if (mysql_num_rows($rs1) > 0) {
                        $row1 = mysql_fetch_object($rs1);
                        $cont_email = returnName("cont_email", "contacts", "ContactID", $_REQUEST['contactid'], $extra = '');
                        mysql_query("UPDATE contacts SET is_email = (is_email + 1) WHERE ContactID = ".$_REQUEST['contactid']."");
                        emailToCustomer($cont_email, dbStr($row1->user_pasphrase), dbStr($row1->user_display_name), dbStr($_REQUEST['contactid']), dbStr($row1->user_name));
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
if((isset($_REQUEST['from']))&&($_REQUEST['from']!='')){
    $_SESSION['from'] = calendarDateConver4($_REQUEST['from']);
} else if(isset($_SESSION['from'])){
    $_SESSION['from'] = $_SESSION['config_date1'];
} else {
    $_SESSION['from'] = $_SESSION['config_date1'];
}
if((isset($_REQUEST['to']))&&($_REQUEST['to']!='')){
    $_SESSION['to'] = calendarDateConver4($_REQUEST['to']);
} else if(isset($_SESSION['to'])){
    $_SESSION['to'] = $_SESSION['config_date2'];
} else {
    $_SESSION['to'] = $_SESSION['config_date2'];
}
if((isset($_REQUEST['filtertime']))&&($_REQUEST['filtertime']!='')){
    $_SESSION['filtertime'] = $_REQUEST['filtertime'];
} else if(isset($_SESSION['filtertime'])){
    //$_SESSION['filtertime'] = $_SESSION['filtertime'];
} else {
    $_SESSION['filtertime'] = ' ASC ';
}
if((isset($_REQUEST['group_name']))){
    $_SESSION['group_name'] = $_REQUEST['group_name'];
} else if(isset($_SESSION['group_name'])){
    //$_SESSION['group_name'] = $_SESSION['group_name'];
} else {
    $_SESSION['group_name'] = '';
}
if((isset($_REQUEST['limit_of_rec']))&&($_REQUEST['limit_of_rec']!='')){
    $_SESSION['limit_of_rec'] = $_REQUEST['limit_of_rec'];
} else if(isset($_SESSION['limit_of_rec'])){
    //$_SESSION['group_name'] = $_SESSION['group_name'];
} else {
    $_SESSION['limit_of_rec'] = '200';
}

if (isset($_REQUEST['action'])) {
    if(isset($_REQUEST['btnAdd'])){
        $grp_total_cust = (dbStr($_REQUEST['BYOA_Num_Adults']) + dbStr($_REQUEST['BYOA_Num_Children']));
        $qryMaxID = getMaximum("groups","grp_id");
        mysql_query("INSERT INTO groups(grp_id, Pms_Package_ID, Contact_ID, GroupName, GroupArrivalDate, GroupDepartureDate, BYOA_Num_Adults, BYOA_Num_Children, grp_total_cust, Booking_Status, createdDate) VALUES('".$qryMaxID."','".$_REQUEST['Pms_Package_ID']."', '".$_REQUEST['Contact_ID']."','".dbStr($_REQUEST['GroupName'])."' ,'".calendarDateConver($_REQUEST['GroupArrivalDate'])."','".calendarDateConver($_REQUEST['GroupDepartureDate'])."', '".dbStr($_REQUEST['BYOA_Num_Adults'])."', '".dbStr($_REQUEST['BYOA_Num_Children'])."', ".$grp_total_cust.", '".$_REQUEST['Booking_Status']."', NOW() )") or die(mysql_error());
        header("Location: ".$_SERVER['PHP_SELF']."?op=1");
    }
    if (isset($_REQUEST['btnUpdate'])) {
        $total_customers = (dbStr($_REQUEST['BYOA_Num_Adults']) + dbStr($_REQUEST['BYOA_Num_Children']));
        if($total_customers<24){
            $udtQuery = "UPDATE groups SET Pms_Package_ID='" . $_REQUEST['Pms_Package_ID'] . "', Contact_ID='" . $_REQUEST['Contact_ID'] . "', GroupName='" . dbStr($_REQUEST['GroupName']) . "', GroupArrivalDate='" . calendarDateConver4($_REQUEST['GroupArrivalDate']) . "', GroupDepartureDate='" . calendarDateConver4($_REQUEST['GroupDepartureDate']) . "', BYOA_Num_Adults='" . dbStr($_REQUEST['BYOA_Num_Adults']) . "', BYOA_Num_Children='" . dbStr($_REQUEST['BYOA_Num_Children']) . "', grp_total_cust='" . $total_customers . "', lastUpdated=NOW(), Booking_Status='" . $_REQUEST['Booking_Status'] . "' WHERE grp_id=" . $_REQUEST['grp_id'];
            mysql_query($udtQuery) or die(mysql_error());
            header("Location: " . $_SERVER['PHP_SELF'] . "?op=2");
        } else {
            header("Location: " . $_SERVER['PHP_SELF'] . "?op=6");
        }        
    } elseif ($_REQUEST['action'] == 2) {
        $rsM = mysql_query("SELECT * FROM groups WHERE grp_id=" . $_REQUEST['grp_id']);
        if (mysql_num_rows($rsM) > 0) {
            $rsMem = mysql_fetch_object($rsM);
            $grp_id = $rsMem->grp_id;
            $Pms_Booking_ID = $rsMem->Pms_Booking_ID;
            $Pms_Package_ID = $rsMem->Pms_Package_ID;
            $Contact_ID = $rsMem->Contact_ID;
            $GroupName = $rsMem->GroupName;
            $GroupArrivalDate = calendarDateConver2($rsMem->GroupArrivalDate);
            $GroupDepartureDate = calendarDateConver2($rsMem->GroupDepartureDate);
            $BYOA_Num_Adults = $rsMem->BYOA_Num_Adults;
            $BYOA_Num_Children = $rsMem->BYOA_Num_Children;
            $grp_total_cust = $rsMem->grp_total_cust;
            $Booking_Status = $rsMem->Booking_Status;
            $createdDate = $rsMem->createdDate;
            $lastUpdated = $rsMem->lastUpdated;
            $formHead = "Update Info";
        }
    }
}
if ((isset($_REQUEST['show']))&&($_REQUEST['show']==1)) {
    $rsM = mysql_query("SELECT g.*, p.Package_Name, c.ContactFirstName, c.ContactLastName, c.Email FROM groups AS g LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID LEFT OUTER JOIN contacts AS c ON g.Contact_ID=c.ContactID WHERE g.grp_id=" . $_REQUEST['grp_id']);
    if (mysql_num_rows($rsM) > 0) {
        $rsMem = mysql_fetch_object($rsM);
        $GroupName = $rsMem->GroupName;
        $GroupArrivalDate = $rsMem->GroupArrivalDate;
        $GroupDepartureDate = $rsMem->GroupDepartureDate;
        $BYOA_Num_Adults = $rsMem->BYOA_Num_Adults;
        $BYOA_Num_Children = $rsMem->BYOA_Num_Children;
        $grp_total_cust = $rsMem->grp_total_cust;
        $Booking_Status = $rsMem->Booking_Status;
        $createdDate = $rsMem->createdDate;
        $lastUpdated = $rsMem->lastUpdated;
        $Package_Name = $rsMem->Package_Name;
        $ContactFirstName = $rsMem->ContactFirstName;
        $ContactLastName = $rsMem->ContactLastName;
        $Email = $rsMem->Email;
        $formHead = "Details";
    }
}
if (isset($_REQUEST['btnDelete'])) {
    for ($i = 0; $i < count(@$_REQUEST['chkstatus']); $i++) {
        @mysql_query("DELETE FROM groups  WHERE grp_id=" . $_REQUEST['chkstatus'][$i]) or die(mysql_query());
        $class = "alert alert-success";
        $strMSG = "Record(s) deleted successfully";
    }
}
if (isset($_REQUEST['op'])) {
    switch ($_REQUEST['op']) {
        case 1:
            $strMSG = " Record Added Successfully ";
            $class = "alert alert-success";
            break;
        case 2:
            $strMSG = " Record Updated Successfully ";
            $class = " alert alert-info ";
            break;
        case 3:
            $strMSG = " Record Deleted Successfully ";
            $class = " alert alert-info ";
            break;
        case 4:
            $strMSG = " Record Already Exists ";
            $class = "alert alert-danger";
            break;
        case 5:
            $strMSG = " Your Request Can Not Be Fullfill At This Time ";
            $class = "alert alert-danger";
            break;
        case 6:
            $strMSG = " Total members should be less then 24 ";
            $class = "alert alert-danger";
            break;
        case 7:
            $strMSG = " Login Info sent ";
            $class = "alert alert-success";
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
<?php include('includes/html_header.php'); ?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
        </ul>
        <h3 class="page-header"> Manage Past Groups <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b>Manage Past Groups: </b> You can manage past groups or trips information here </p>
        </blockquote>
    </div>
</div>
<?php if (isset($_REQUEST['action'])) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-cascade">
                <div class="panel-heading">
                    <h3 class="panel-title text-primary">
                        <?php print($formHead); ?>
                    </h3>
                </div>
                <div class="panel-body panel-border">
                    <form name="frm" id="frm" method="post" class="form-horizontal" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" role="form">
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Group Name</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Group name..." value="<?php print(@$GroupName); ?>" id="GroupName" name="GroupName">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Date</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70  datetimepicker" placeholder="Arrival Date..." value="<?php echo ((@$GroupArrivalDate=='00/00/0000')?'':@$GroupArrivalDate);?>" id="GroupArrivalDate" name="GroupArrivalDate">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Date</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70  datetimepicker" placeholder="Departure Date..." value="<?php echo ((@$GroupDepartureDate=='00/00/0000')?'':@$GroupDepartureDate);?>" id="GroupDepartureDate" name="GroupDepartureDate">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Number of Adults</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Number of Adults..." value="<?php print(@$BYOA_Num_Adults); ?>" id="BYOA_Num_Adults" name="BYOA_Num_Adults">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Number of Children</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Number of Children..." value="<?php print(@$BYOA_Num_Children); ?>" id="BYOA_Num_Children" name="BYOA_Num_Children">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Booking Status</label>
                            <div class="col-md-6">
                                <select data-placeholder="Choose a Group..." class="chosen-select" style="width:260px; z-index: 9999 !important;" tabindex="2" name="Booking_Status" id="Booking_Status">
                                    <option value="Confirmed" <?php echo ((isset($Booking_Status)&&$Booking_Status=='Confirmed')?"selected='selected'":'');?>>Confirmed</option>
                                    <option value="Hold" <?php echo ((isset($Booking_Status)&&$Booking_Status=='Hold')?"selected='selected'":'');?>>Hold</option>
                                    <option value="" <?php echo ((isset($Booking_Status)&&$Booking_Status=='')?"selected='selected'":'');?>>Deleted</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Group Leader</label>
                            <div class="col-md-6">
                                <select data-placeholder="Choose a Group..." class="chosen-select" style="width:260px; z-index: 9999 !important;" tabindex="2" name="Contact_ID" id="Contact_ID">
                                    <option value=""></option>
                                    <?php FillSelected2(" contacts ", " ContactID ", " ContactFirstName ", " ContactLastName ", @$Contact_ID);?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Packages Name</label>
                            <div class="col-md-6">
                                <select data-placeholder="Choose a Package..." name="Pms_Package_ID" id="Pms_Package_ID" class="chosen-select" style="width:260px; z-index: 9999 !important;" tabindex="2">
                                    <option value=""></option>
    <?php FillSelected("packages", "Pms_Package_ID", "Package_Name", @$Pms_Package_ID); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                            <div class="col-lg-10 col-md-9">
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
<?php } elseif ((isset($_REQUEST['show']))&&($_REQUEST['show']==1)) { ?>
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
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Group Name</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($GroupName); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Customer name..." value="<?php //print($grp_name);  ?>" id="grp_name" name="grp_name" readonly>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Name</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($Package_Name); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Customer name..." value="<?php //print($grp_name);  ?>" id="grp_name" name="grp_name" readonly>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Group Leader Name</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print(ucwords( $ContactFirstName.' '.$ContactLastName )); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Customer name..." value="<?php //print($grp_name);  ?>" id="grp_name" name="grp_name" readonly>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Group Leader Email</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($Email); ?>
                                <!--<select data-placeholder="Choose a Country..." name="cont_id" id="cont_id" class="chosen-select required" style="width:350px;" tabindex="2" readonly>-->
                                <!--<option value=""></option>-->
                                <!--</select>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Date</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php echo calendarDateConver2($GroupArrivalDate); ?>
                                <!--<select data-placeholder="Choose a Country..." name="cont_id" id="cont_id" class="chosen-select required" style="width:350px;" tabindex="2" readonly>-->
                                <!--<option value=""></option>-->
                                <!--</select>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Date</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php echo calendarDateConver2($GroupDepartureDate); ?>
                                <!--<select data-placeholder="Choose a Country..." name="cont_id" id="cont_id" class="chosen-select required" style="width:350px;" tabindex="2" readonly>-->
                                <!--<option value=""></option>-->
                                <!--</select>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Number of Adults</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($BYOA_Num_Adults); ?>
                                <!--<select data-placeholder="Choose a Country..." name="cont_id" id="cont_id" class="chosen-select required" style="width:350px;" tabindex="2" readonly>-->
                                <!--<option value=""></option>-->
                                <!--</select>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Number of Children</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($BYOA_Num_Children); ?>
                                <!--<select data-placeholder="Choose a Country..." name="cont_id" id="cont_id" class="chosen-select required" style="width:350px;" tabindex="2" readonly>-->
                                <!--<option value=""></option>-->
                               <!--</select>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Total Members in This Group</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($grp_total_cust); ?>
                                <!--<select data-placeholder="Choose a Country..." name="cont_id" id="cont_id" class="chosen-select required" style="width:350px;" tabindex="2" readonly>-->
                                <!--<option value=""></option>-->
                                <!--</select>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Created Date</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php echo calendarDateConver2($createdDate); ?>
                                <!--<select data-placeholder="Choose a Country..." name="cont_id" id="cont_id" class="chosen-select required" style="width:350px;" tabindex="2" readonly>-->
                                <!--<option value=""></option>-->
                                <!--</select>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Last Updated</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($lastUpdated); ?>
                                <!--<select data-placeholder="Choose a Country..." name="cont_id" id="cont_id" class="chosen-select required" style="width:350px;" tabindex="2" readonly>-->
                                <!--<option value=""></option>-->
                                <!--</select>-->
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
<?php } elseif ((isset($_REQUEST['show']))&&($_REQUEST['show']==2)) { ?>
<?php
   if($_SESSION["UType"]==2){
       $Query = "SELECT p.Package_Name, g.GroupName, g.GroupArrivalDate, g.GroupDepartureDate FROM packages AS p  LEFT OUTER JOIN groups AS g ON p.Pms_Package_ID=g.Pms_Package_ID WHERE g.grp_id=" . $_SESSION["group_id"] . "";
       $count = mysql_num_rows(mysql_query($Query));
       $rs = mysql_query($Query);
       if ($count > 0) {
           while ($row = mysql_fetch_object($rs)) {
               $sl_group_name1 = $row->GroupName;
               $sl_group_name2 = " <strong>Group:</strong>  " . $row->GroupName . " <br/>";
               $sl_ardp_date = " <strong>Arrival Date:</strong>  " . calendarDateConver2($row->GroupArrivalDate) . " " . " <strong>Departure Date:</strong>  " . calendarDateConver2($row->GroupDepartureDate) . " <br/>";
               $sl_pk = " <strong>Package Name:</strong>  " . $row->Package_Name . " <br/><br/>";
           }
       }
   }    
?>
<div class="row">
        <div class="col-md-12">
            <div class="<?php print($class); ?>"><?php print($strMSG); ?></div>
            <div class="panel">
                <div class="panel-heading text-primary">
                    <h3 class="panel-title"><i class="fa fa-sitemap"></i> Guests in <?php echo returnName("GroupName", "groups", "grp_id", $_REQUEST['grp_id']);?>
                        <span class="pull-right" style="width:auto;">
                            <div style="float:right;">
                                <a href="manage_group.php">Go Back</a>
                            </div>
                        </span> 
                    </h3>
                    <br>
                    <?php if($_SESSION["UType"]==2){
                        echo $sl_group_name2;
                        echo $sl_ardp_date;
                        echo $sl_pk;
                    }?>
                </div>
                <div class="panel-body">
    <?php //print("UType: " . $_SESSION["UType"]); ?>
                    <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                        <table class="table users-table table-condensed table-hover table-striped" >
                            <thead>
                                <tr>
                                    <th class="visible-lg">Guest First Name</th>
                                    <th class="visible-lg">Guest Last Name</th>
                                    <th class="visible-lg">Guest Email</th>
                                    <th class="visible-lg">Emergency Phone</th>
                                    <th class="visible-lg">Group Arrival Date</th>
                                    <th class="visible-lg">Group Departure Date</th>
                                    <th class="visible-lg">Action</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
        //$Query = "SELECT gc.Pms_Booking_ID, c.ContactID, c.ContactFirstName, c.ContactLastName, c.Email, c.cont_phone2, g.GroupArrivalDate, g.GroupDepartureDate FROM group_contacts AS gc LEFT OUTER JOIN contacts AS c ON c.ContactID=gc.ContactID LEFT OUTER JOIN groups AS g ON g.Pms_Booking_ID=gc.Pms_Booking_ID WHERE gc.grp_id=".$_REQUEST['grp_id']."";
        if($_SESSION['group_id']!=''&&$_SESSION['group_id']!=0){
            $Query = "SELECT gc.*, c.*, rr.roomr_id, g.GroupDepartureDate FROM group_contacts AS gc LEFT OUTER JOIN contacts as c ON c.ContactID=gc.ContactID LEFT OUTER JOIN room_reservation AS rr ON gc.ContactID=rr.contact_id LEFT OUTER JOIN groups AS g ON gc.grp_id=g.grp_id WHERE gc.grp_id=".$_SESSION['group_id']."";
        } else {
            $Query = "SELECT gc.Pms_Booking_ID, c.ContactID, c.ContactFirstName, c.ContactLastName, c.Email, c.cont_phone2, g.GroupArrivalDate, g.GroupDepartureDate FROM group_contacts AS gc LEFT OUTER JOIN contacts AS c ON c.ContactID=gc.ContactID LEFT OUTER JOIN groups AS g ON g.Pms_Booking_ID=gc.Pms_Booking_ID WHERE gc.Pms_Booking_ID=".$_REQUEST['pms_booking_id']."";
        }
        //echo $Query;
    $counter = 0;
    $limit = 20;
    $start = $p->findStart($limit);
    $count = mysql_num_rows(mysql_query($Query));
    $pages = $p->findPages($count, $limit);
    $rs = mysql_query($Query . " LIMIT " . $start . ", " . $limit);
    if (mysql_num_rows($rs) > 0) {
        while ($row = mysql_fetch_object($rs)) {
            $counter++;
            ?>
                        <tr>
                            <!--<td class="visible-lg"><input type="checkbox" name="chkstatus[]" value="<?php print($row->grp_id); ?>" /></td>-->
                            <td class="visible-lg"><?php print(ucwords( $row->ContactFirstName ));?> </td>
                            <td class="visible-lg"><?php print(ucwords( $row->ContactLastName ));?></td>
                            <td class="visible-lg"><?php print($row->Email);?> </td>
                            <td class="visible-lg"><?php print($row->cont_phone2);?> </td>
                            <td class="visible-lg"><?php print($row->GroupArrivalDate); ?></td>
                            <td class="visible-lg"><?php print($row->GroupDepartureDate); ?></td>
                            <td class="visible-lg">
                            <?php if($row->Email!=''){?>
                            <button type="button" class="btn btn-success" onclick="javascript: window.location = '<?php print($_SERVER['PHP_SELF'] . "?send=1&contactid=" . $row->ContactID); ?>';"><i class="fa fa-envelope-o"></i></button>
                            <?php }?>
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
                                    <td align="right">
                                        <?php
                                            $next_prev = $p->nextPrev($_GET['page'], $pages, '');
                                            print($next_prev);
                                        ?>
                                    </td>
                                </tr>
                            </table>
                                    <?php } ?>
                                    <?php if ($counter > 0) { ?>
                                        <!--
                                            <input type="submit" name="btnActive" value="Active" class="btn btn-primary btn-animate-demo">
                                            <input type="submit" name="btnInactive" value="In Active" class="btn btn-danger btn-animate-demo">
                                        -->
                                    <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="<?php print($class); ?>"><?php print($strMSG); ?></div>
            <?php
//                if($_SESSION["UType"]==2){
//                     //echo $Query = "SELECT  g.grp_id ,  g.GroupName ,  g.GroupArrivalDate ,  p.Package_Name  FROM  groups AS g LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID LEFT OUTER JOIN contacts AS c ON g.Contact_ID=c.ContactID WHERE g.GroupArrivalDate!='0000-00-00' AND g.GroupDepartureDate!='0000-00-00' AND g.Booking_Status='Confirmed' AND g.grp_id=" . $_SESSION["group_id"]."";
//                    $Query = "SELECT p.Package_Name, g.GroupName, g.GroupArrivalDate, g.GroupDepartureDate FROM packages AS p  LEFT OUTER JOIN groups AS g ON p.Pms_Package_ID=g.Pms_Package_ID WHERE g.grp_id=" . $_SESSION["group_id"]."";
//                    $count = mysql_num_rows(mysql_query($Query));
//                    $rs = mysql_query($Query);
//                    if ($count > 0) {
//                        while ($row = mysql_fetch_object($rs)) {
//                            $sl_group_name1 = $row->GroupName;
//                            $sl_group_name2 = $row->GroupName;
//                            $sl_ard_date = calendarDateConver2($row->GroupArrivalDate);
//                            $sl_dpd_date = calendarDateConver2($row->GroupDepartureDate);
//                            $sl_pk = $row->Package_Name;
//                        }
//                    }
//                }    

                if($_SESSION["UType"]==2 || $_SESSION["UType"]==3){
                     //echo $Query = "SELECT  g.grp_id ,  g.GroupName ,  g.GroupArrivalDate ,  p.Package_Name  FROM  groups AS g LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID LEFT OUTER JOIN contacts AS c ON g.Contact_ID=c.ContactID WHERE g.GroupArrivalDate!='0000-00-00' AND g.GroupDepartureDate!='0000-00-00' AND g.Booking_Status='Confirmed' AND g.grp_id=" . $_SESSION["group_id"]."";
                    ////$Query = "SELECT p.Package_Name, g.GroupName, g.GroupArrivalDate, g.GroupDepartureDate FROM packages AS p  LEFT OUTER JOIN groups AS g ON p.Pms_Package_ID=g.Pms_Package_ID WHERE g.grp_id=" . $_SESSION["group_id"]."";
					$Query = "SELECT gc.grp_id, gr.GroupName, gr.GroupArrivalDate, gr.GroupDepartureDate, gr.Pms_Package_ID, p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, p.Package_Max_Days FROM group_contacts AS gc INNER JOIN groups AS gr ON gr.grp_id = gc.grp_id  INNER JOIN packages AS p ON p.Pms_Package_ID=gr.Pms_Package_ID WHERE gc.ContactID='".$_SESSION["contact_id"]."'";
					//$rs = mysql_query("SELECT gc.grp_id, gr.GroupName, gr.Pms_Package_ID, p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, p.Package_Max_Days FROM group_contacts AS gc INNER JOIN groups AS gr ON gr.grp_id = gc.grp_id  INNER JOIN packages AS p ON p.Pms_Package_ID=gr.Pms_Package_ID WHERE gc.ContactID='".$_REQUEST['contactid']."'");
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
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-cascade">
                        <?php if($_SESSION["UType"]==1){?>
                        <div class="panel-heading text-primary">
                                <h3 class="panel-title"><i class="fa fa-th-large"></i> Groups
                                    <?php if($_SESSION["UType"]==1){?>
                                        <span class="pull-right" style="width:auto;">
                                            <div style="float:right;">
                                                <!--<a href="<?php print($_SERVER['PHP_SELF'].'?action=1'); ?>"><i class="fa fa-plus"></i> Add New Group </a> | -->

                                                <a href="<?php print("sync/contacts.php?getContacts=1"); ?>"><i class="fa fa-plus"></i> Synchronize Contacts </a> | 
                                                <a href="<?php print("sync/groups.php?getGroups=1"); ?>"><i class="fa fa-plus"></i> Synchronize Groups </a> | 
                                                <a href="<?php print("sync/grp_status.php?getGrpStatus=1"); ?>"><i class="fa fa-plus"></i> Synchronize Group Status </a> | 
                                                <a href="<?php print("sync/grp_contacts.php?getGrpContacts=1"); ?>"><i class="fa fa-plus"></i> Synchronize Group Contacts </a>
                                                
                                            </div>
                                        </span>
                                    <?php }?>
                                </h3>
                            
                        </div>
						<?php }?>
                        <?php if($_SESSION["UType"]==1){?>
                        <div class="panel-body ">
                            <div class="ro">
                                <div class="col-mol-md-offset-2">
                                    <?php if($_SESSION["UType"]==1){?>
                                        <form class="form-horizontal cascde-forms" method="post" action="<?php print($_SERVER['PHP_SELF']); ?>" name="frm" id="frm" >
                                            <div class="form-group">
                                                <label class="col-lg-2 col-md-3 control-label">From:</label>
                                                <div class="col-lg-10 col-md-9">
                                                    <input type="text" class="form-control form-cascade-control datetimepicker" value="<?php echo calendarDateConver2($_SESSION['from']);?>" id="from" name="from" style="width: 160px;" title="Please Enter Group Arrival Date" placeholder=" Date From ">


                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 col-md-3 control-label">To:</label>
                                                <div class="col-lg-10 col-md-9">
                                                    <input type="text" class="form-control form-cascade-control datetimepicker" value="<?php echo calendarDateConver2($_SESSION['to']);?>" id="to" name="to"  style="width: 160px;" title="Please Enter Group Departure Date" placeholder=" Date To ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 col-md-3 control-label">Time:</label>
                                                <div class="col-lg-10 col-md-9" style="padding-top:5px;">
                                                    Earliest: <input type="radio" name="filtertime" value="ASC" title="Earliest Group Arrival Dates" <?php echo( ((isset($_SESSION['filtertime']))&&($_SESSION['filtertime']!='')&&($_SESSION['filtertime']=='ASC'))?"checked='checked'":'');?> class="form-cascade-control"> &nbsp; &nbsp; 
                                                    Future: <input type="radio" name="filtertime" value="DESC" title="Future Group Arrival Dates" <?php echo( ((isset($_SESSION['filtertime']))&&($_SESSION['filtertime']!='')&&($_SESSION['filtertime']=='DESC'))?"checked='checked'":'');?> class="form-cascade-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 col-md-3 control-label">Results Per Page:</label>
                                                <div class="col-lg-10 col-md-9">
                                                    <input type="text" value="<?php echo @$_SESSION['limit_of_rec'];?>" id="limit_of_rec" name="limit_of_rec" class="form-control form-cascade-control" style="width: 160px;" placeholder=" Enter Records Limit ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 col-md-3 control-label">Group Name:</label>
                                                <div class="col-lg-10 col-md-9">
                                                    <input type="text" value="<?php echo @$_SESSION['group_name'];?>" id="group_name" name="group_name" class="form-control form-cascade-control" style="width: 240px;" placeholder=" Enter Group Name ">
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <label class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                                                <input type="submit" value="Filter Records" name="filterRecords" class="btn bg-primary text-white btn-lg">
                                            </div>
                                        </form>
                                    <?php } else { ?>
                                        <!--
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
                                        -->
                                    <?php }?>
                                    <?php //if ($_SESSION["UType"] == 2) {?>
                                        <!--<form name="frm21" id="frm21" method="post" class="form-horizontal cascde-forms" action="<?php print($_SERVER['PHP_SELF']); ?>">
                                            <div class="form-group">
                                                <label class="col-lg-2 col-md-3 control-label">Select Group:</label>
                                                <div class="col-lg-10 col-md-9">
                                                    <select name="grp_id" id="grp_id" data-placeholder="Choose a Group..." class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2"  onChange="javascript:document.getElementById('frm21').submit()">
                                                        <?php //echo FillSelected3(" groups AS g LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID LEFT OUTER JOIN contacts AS c ON g.Contact_ID=c.ContactID WHERE g.GroupArrivalDate!='0000-00-00' AND g.GroupDepartureDate!='0000-00-00' AND g.Booking_Status='Confirmed' AND c.ContactID=".$_SESSION["contact_id"]." ", " g.grp_id ", " g.GroupName ", " g.GroupArrivalDate ", " p.Package_Name ", @$_SESSION['group_id']);?>
														<?php //echo FillSelected3(" group_contacts AS gc INNER JOIN groups AS gr ON gr.grp_id = gc.grp_id INNER JOIN packages AS p ON p.Pms_Package_ID=gr.Pms_Package_ID WHERE gr.GroupArrivalDate!='0000-00-00' AND gr.GroupDepartureDate!='0000-00-00' AND gr.Booking_Status='Confirmed' AND gc.ContactID='".$_SESSION["contact_id"]."'", " gc.grp_id ", " gr.GroupName ", " gr.GroupArrivalDate ", " p.Package_Name ", @$_SESSION['group_id']);?>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>    -->
                                    <?php //}?>
                                </div>
                            </div>
                        </div>
					<?php } ?>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-body">
                    <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                        <table class="table users-table table-condensed table-hover table-striped display dataTable" id="example" >
                            <thead>
                                <tr>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Name</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Leader</th>
                                    <th class="visible-sm visible-md visible-lg">Guests</th>
                                    <th class="visible-sm visible-md visible-lg">Arrival</th>
                                    <th class="visible-sm visible-md visible-lg">Departure</th>
                                    <th class="visible-sm visible-md visible-lg">Package</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php

                if($_SESSION["UType"]==1){
                    $Query = "SELECT g.grp_id, g.Contact_ID, g.Pms_Booking_ID, g.GroupName, g.GroupArrivalDate, g.GroupDepartureDate, g.Booking_Status, g.grp_total_cust, c.ContactFirstName, c.ContactLastName, p.Package_Name, c.is_email FROM groups AS g  LEFT OUTER JOIN contacts AS c ON g.Contact_ID=c.ContactID LEFT  OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID WHERE g.GroupArrivalDate!='0000-00-00' AND g.GroupDepartureDate!='0000-00-00' AND g.Booking_Status='Confirmed' AND (g.GroupArrivalDate >= '".$_SESSION['from']."' AND g.GroupArrivalDate <= '".$_SESSION['to']."') AND ( g.GroupName LIKE '%".$_SESSION['group_name']."%' ) ORDER BY g.GroupArrivalDate ".$_SESSION['filtertime']." ";
                } else {
					$Query = "SELECT gc.grp_id, gr.Contact_ID, gr.GroupName, gr.GroupArrivalDate, gr.GroupDepartureDate, gr.Pms_Package_ID, gr.Booking_Status, gr.grp_total_cust, p.Package_Name, c.ContactFirstName, c.ContactLastName, c.is_email FROM group_contacts AS gc INNER JOIN groups AS gr ON gr.grp_id = gc.grp_id  INNER JOIN packages AS p ON p.Pms_Package_ID=gr.Pms_Package_ID LEFT OUTER JOIN contacts AS c ON c.ContactID=gr.Contact_ID WHERE gc.ContactID='".$_SESSION["contact_id"]."' AND gr.GroupDepartureDate < '".date("Y-m-d")."'";
                    /*if((isset($_SESSION['group_id'])) && ($_SESSION['group_id']!=0)){
                        $Query = "SELECT g.grp_id, g.Contact_ID, g.Pms_Booking_ID, g.GroupName, g.GroupArrivalDate, g.GroupDepartureDate, g.Booking_Status, g.grp_total_cust, c.ContactFirstName, c.ContactLastName, p.Package_Name, c.is_email FROM groups AS g  LEFT OUTER JOIN contacts AS c ON g.Contact_ID=c.ContactID LEFT  OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID WHERE g.GroupArrivalDate!='0000-00-00' AND g.GroupDepartureDate!='0000-00-00' AND g.Booking_Status='Confirmed' AND g.grp_id=".$_SESSION['group_id']." ORDER BY g.GroupArrivalDate ".$_SESSION['filtertime']." ";
                    } else {
                        $Query = "SELECT g.grp_id, g.Contact_ID, g.Pms_Booking_ID, g.GroupName, g.GroupArrivalDate, g.GroupDepartureDate, g.Booking_Status, g.grp_total_cust, c.ContactFirstName, c.ContactLastName, p.Package_Name, c.is_email FROM groups AS g  LEFT OUTER JOIN contacts AS c ON g.Contact_ID=c.ContactID LEFT  OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID WHERE g.GroupArrivalDate!='0000-00-00' AND g.GroupDepartureDate!='0000-00-00' AND g.Booking_Status='Confirmed' AND (g.GroupArrivalDate >= '".$_SESSION['from']."' AND g.GroupArrivalDate <= '".$_SESSION['to']."') AND ( g.GroupName LIKE '%".$_SESSION['group_name']."%' ) ORDER BY g.GroupArrivalDate ".$_SESSION['filtertime']."  ";
                    }*/
                }
				//print($Query);
/*
echo '<pre>';
echo '<br/><br/>';
echo $Query;
echo '<br/><br/>';
print_r( $_REQUEST );
echo '<br/><br/>';
print_r( $_SESSION );
echo '<br/><br/>';
echo '</pre>';
*/
    

    $counter = 0;
    $limit = $_SESSION['limit_of_rec'];
    $start = $p->findStart($limit);
    $count = mysql_num_rows(mysql_query($Query));
    $pages = $p->findPages($count, $limit);
    $rs = mysql_query($Query . " LIMIT " . $start . ", " . $limit);
    if (mysql_num_rows($rs) > 0) {
        while ($row = mysql_fetch_object($rs)) {
            $counter++;
			$varArrDate = strtotime($row->GroupArrivalDate);
			$dateToChk = strtotime("2014-01-01");
			$isShow = 1;
			if($varArrDate<$dateToChk){
				$isShow = 0;
			}
   ?>
                                        <tr>
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->GroupName);?></td>
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print(ucwords( $row->ContactFirstName . ' ' . $row->ContactLastName) ); ?></td>
                                            <td class="visible-sm visible-md visible-lg"><?php print($row->grp_total_cust);?></td>
                                            <td class="visible-sm visible-md visible-lg"><?php echo calendarDateConver2($row->GroupArrivalDate); ?> </td>
                                            <td class="visible-sm visible-md visible-lg"><?php echo calendarDateConver2($row->GroupDepartureDate); ?> </td>                                       
                                            <td class="visible-sm visible-md visible-lg"><?php echo $row->Package_Name; ?> </td>
                                            <td style="width:180px">
                                                <?php if ($_SESSION["UType"] == 1){?>
                                                    <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF']."?send=2&contactid=" . $row->Contact_ID);?>" data-original-title="<?php echo "Email has been sent ".$row->is_email.(($row->is_email>1)?' times ':' time ')." ";?>" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-envelope-o"></i></a></div> 
                                                <?php }?>
											<?php if($isShow){ ?>
                                                <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF'] . "?show=1&grp_id=" . $row->grp_id); ?>" data-original-title="See Details" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-eye"></i></a></div>
                                                <?php //if($_SESSION['is_leader']==1){?>
                                                <!--<div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF'] . "?action=2&grp_id=" . $row->grp_id); ?>" data-original-title="Update Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-edit"></i></a></div>-->
                                                <?php //}?>
                                                <div class="tooltips"><a href="manage_profile.php?grp_id=<?php echo $row->grp_id;?>" data-original-title="Profiles Under This Group" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-user"></i></a></div>
											<?php } ?>
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
                                <?php if ($counter>0 && $count>10) { ?>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td><?php print("Page <b>" . $_GET['page'] . "</b> of " . $pages); ?></td>
                                    <td align="right">
                                        <?php
                                            $param = '';
                                            $next_prev = $p->nextPrev($_GET['page'], $pages, $param);
                                            print($next_prev);
                                        ?>
                                    </td>
                                </tr>
                            </table>
                            <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

                    <?php } ?>    


</div>
<?php include("includes/rightsidebar.php"); ?>
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
		<script src="js/forms-custom.js"></script>
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
    #example_filter{display:none;}
    #example_length{display:none;}
    #example_info{display:none;}
    .dataTables_paginate{display:none;}
    th:hover{cursor: pointer;}
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
        "aaSorting": [[ 3, "asc" ]]
    });
});
</script>
