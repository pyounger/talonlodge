<?php 
include('includes/php_includes_top.php');
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
        mysql_query("UPDATE contacts SET is_email = (is_email + 1) WHERE ContactID = ".$_REQUEST['contactid']."");
        emailToGroupLeader($row->user_name, $row->user_pasphrase, $row->user_display_name, $_REQUEST['contactid']);
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
                    mysql_query("INSERT INTO users (user_id, user_name, user_pass, user_display_name, utype_id, cust_id, cont_id, createdDate, user_pasphrase) VALUES (".$MaxID.", '".$row->Email."', '".md5($random_password)."', '".$row->ContactFirstName.' '.$row->ContactLastName."', '3', '".$row->cust_id."', '".$row->ContactID."', NOW(), '".$random_password."')");
                    $rs1 = mysql_query("SELECT * FROM users WHERE cont_id=" . $_REQUEST['contactid']);
                    if (mysql_num_rows($rs1) > 0) {
                        $row1 = mysql_fetch_object($rs1);
                        mysql_query("UPDATE contacts SET is_email = (is_email + 1) WHERE ContactID = ".$_REQUEST['contactid']."");
                        emailToGroupLeader($row1->user_name, $row1->user_pasphrase, $row1->user_display_name, $_REQUEST['contactid']);
                    }
                    $strMSG = " Login Info sent ";
                    $class = "alert alert-success";
                } else {
                    mysql_query("INSERT INTO users (user_id, user_name, user_pass, user_display_name, utype_id, cust_id, cont_id, createdDate, user_pasphrase) VALUES (".$MaxID.", '".$row->Email."', '".md5($random_password)."', '".$row->ContactFirstName.' '.$row->ContactLastName."', '2', '".$row->cust_id."', '".$row->ContactID."', NOW(), '".$random_password."')") or die(mysql_error());
                    $rs1 = mysql_query("SELECT * FROM users WHERE cont_id=" . $_REQUEST['contactid']);
                    if (mysql_num_rows($rs1) > 0) {
                        $row1 = mysql_fetch_object($rs1);
                        mysql_query("UPDATE contacts SET is_email = (is_email + 1) WHERE ContactID = ".$_REQUEST['contactid']."");
                        emailToGroupLeader($row1->user_name, $row1->user_pasphrase, $row1->user_display_name, $_REQUEST['contactid']);
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

if((isset($_REQUEST['limit_of_rec']))&&($_REQUEST['limit_of_rec']!='')){
    $_SESSION['limit_of_rec'] = $_REQUEST['limit_of_rec'];
} else if(isset($_SESSION['limit_of_rec'])){
    //$_SESSION['group_name'] = $_SESSION['group_name'];
} else {
    $_SESSION['limit_of_rec'] = '200';
}
if((isset($_REQUEST['from']))&&($_REQUEST['from']!='')){
    $_SESSION['from'] = calendarDateConver4($_REQUEST['from']);
} else if(isset($_SESSION['from'])){
    //$_SESSION['from'] = $_SESSION['from'];
} else {
    $_SESSION['from'] = '2014-05-01';
}
if((isset($_REQUEST['to']))&&($_REQUEST['to']!='')){
    $_SESSION['to'] = calendarDateConver4($_REQUEST['to']);
} else if(isset($_SESSION['to'])){
    //$_SESSION['to'] = $_SESSION['to'];
} else {
    $_SESSION['to'] = '2014-09-15';
}
if((isset($_REQUEST['filtertime']))&&($_REQUEST['filtertime']!='')){
    $_SESSION['filtertime'] = $_REQUEST['filtertime'];
} else if(isset($_SESSION['filtertime'])){
    //$_SESSION['filtertime'] = $_SESSION['filtertime'];
} else {
    $_SESSION['filtertime'] = ' ASC ';
}

?>
<?php include('includes/html_header.php'); ?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
        </ul>
        <h3 class="page-header"> Manage Group Statistics <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b>Manage Group Statistics: </b> You can manage group statistics here </p>
        </blockquote>
    </div>
</div>
<?php if (isset($_REQUEST['action'])) { ?>
<?php } elseif ((isset($_REQUEST['show']))&&($_REQUEST['show']==1)) { ?>
<?php } elseif ((isset($_REQUEST['show']))&&($_REQUEST['show']==2)) { ?>
<?php } else { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="<?php print($class); ?>"><?php print($strMSG); ?></div>
            <div class="panel">
                <?php if($_SESSION["UType"]!=3){?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-cascade">
                            

                            <div class="panel-heading text-primary">
                                <?php if($_SESSION["UType"]==1){?>
                                    <h3 class="panel-title"><i class="fa fa-file-text"></i> Group Statistics
                                        <span class="pull-right" style="width:auto;">
<!--                                            <div style="float:right;"><a href="<?php print($_SERVER['PHP_SELF']."?action=1");?>" title="Add New"><i class="fa fa-plus"></i> Add New</a></div>-->
                                        </span> 
                                    </h3>
                                <?php }?>
                            </div>

                            
                            
                            <div class="panel-body ">
                                <div class="ro">
                                    <div class="col-mol-md-offset-2">
                                        <?php 
                                            if ($_SESSION["UType"] > 1) {
                                                if($_SESSION["UType"]==2){	
                                        ?>
                                                    <form name="frm21" id="frm21" method="post" class="form-horizontal cascde-forms" action="<?php print($_SERVER['PHP_SELF']); ?>">
                                                        <div class="form-group">
                                                            <label class="col-lg-2 col-md-3 control-label">Select Group:</label>
                                                            <div class="col-lg-10 col-md-9">
                                                                <select name="grp_id" id="grp_id" data-placeholder="Choose a Group..." class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2"  onChange="javascript:document.getElementById('frm21').submit()">
                                                                    <?php echo FillSelected3(" groups AS g LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID LEFT OUTER JOIN contacts AS c ON g.Contact_ID=c.ContactID WHERE g.GroupArrivalDate!='0000-00-00' AND g.GroupDepartureDate!='0000-00-00' AND g.Booking_Status='Confirmed' AND c.ContactID=".$_SESSION["contact_id"]." ", " g.grp_id ", " g.GroupName ", " g.GroupArrivalDate ", " p.Package_Name ", @$_SESSION['group_id']);?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </form>    
                                        <?php
                                                }
                                            } else {
                                        ?>
                                                <form name="frm22" id="frm22" method="post" class="form-horizontal cascde-forms" action="<?php print($_SERVER['PHP_SELF']); ?>">
                                                    <div class="form-group">
                                                        <label class="col-lg-2 col-md-3 control-label">Select Group:</label>
                                                        <div class="col-lg-10 col-md-9">
                                                            <select name="grp_id" id="grp_id" data-placeholder="Choose a Group..." class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2"  onChange="javascript:document.getElementById('frm22').submit()">
                                                                <option value="0"> Show All </option>
                                                                <?php echo FillSelected3(" groups AS g LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID LEFT OUTER JOIN contacts AS c ON g.Contact_ID=c.ContactID WHERE g.GroupArrivalDate!='0000-00-00' AND g.Booking_Status='Confirmed' ", " g.grp_id ", " g.GroupName ", " g.GroupArrivalDate ", " p.Package_Name ", @$_SESSION['group_id']);?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </form>    
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
                
                <div class="panel-body">
                <?php //print("UType: " . $_SESSION["UType"]); ?>
                    <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                        <table class="table users-table table-condensed table-hover table-striped" >
                            <thead>
                                <tr>
<!--                                    <th class="visible-lg"><input type="checkbox" name="chkAll" onClick="setAll();"></th>-->
                                    <th class="visible-xs visible-sm visible-md visible-lg">Name</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Leader</th>
                                    <th class="visible-sm visible-md visible-lg">Package</th>
                                    <th class="visible-sm visible-md visible-lg">Adults</th>
                                    <th class="visible-sm visible-md visible-lg">Children</th>
                                    <th class="visible-sm visible-md visible-lg">Total Profiles</th>
                                    <th class="visible-sm visible-md visible-lg">Completed Profiles</th>
                                    <th class="visible-sm visible-md visible-lg">Total Guests</th>
                                    <?php if($_SESSION["UType"]!=2){?>
                                        <th style="text-align:center">Action</th>
                                    <?php }?>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                            $countt=0;
                            if($_SESSION['group_id']>0){
                                //echo '1';
                                $Query = " SELECT g.grp_id, g.Contact_ID AS gContact_ID, g.GroupName, g.BYOA_Num_Adults, g.BYOA_Num_Children, g.grp_total_cust, gc.ContactID, (SELECT COUNT(*) AS total FROM group_contacts AS gc WHERE gc.grp_id=".$_SESSION['group_id'].") AS filled_profiles, c.ContactFirstName, c.ContactLastName, c.is_email, c.is_completed, (SELECT COUNT(*) AS total FROM contacts AS c WHERE c.grp_id=".$_SESSION['group_id']." AND c.is_completed=1) AS completed, p.Pms_Package_ID, p.Package_Name FROM group_contacts AS gc LEFT OUTER JOIN groups AS g ON gc.grp_id=g.grp_id LEFT OUTER JOIN contacts AS c ON c.ContactID=g.Contact_ID LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID WHERE g.GroupArrivalDate!='0000-00-00' AND g.GroupDepartureDate!='0000-00-00' AND g.Booking_Status='Confirmed' AND gc.grp_id=".$_SESSION['group_id']." GROUP BY g.grp_id ORDER BY p.Pms_Package_ID ASC, g.GroupArrivalDate ".$_SESSION['filtertime'].", g.grp_id DESC ";
                                $countt = mysql_num_rows(mysql_query($Query));
                                if($countt==0){
                                    //echo '2';
                                    $Query=" SELECT g.grp_id, g.Contact_ID AS gContact_ID, g.GroupName, g.BYOA_Num_Adults, g.BYOA_Num_Children, g.grp_total_cust, c.ContactFirstName, c.ContactLastName, c.is_email, p.Pms_Package_ID, p.Package_Name FROM groups AS g LEFT OUTER JOIN contacts AS c ON c.ContactID=g.Contact_ID LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID WHERE g.GroupArrivalDate!='0000-00-00' AND g.GroupDepartureDate!='0000-00-00' AND g.Booking_Status='Confirmed' AND g.grp_id=".$_SESSION['group_id']." GROUP BY g.grp_id ORDER BY p.Pms_Package_ID ASC, g.GroupArrivalDate ".$_SESSION['filtertime'].", g.grp_id DESC ";
                                }
                            } else {
                                //echo '3';
                                $Query=" SELECT g.grp_id, g.Contact_ID AS gContact_ID, g.GroupName, g.BYOA_Num_Adults, g.BYOA_Num_Children, g.grp_total_cust, c.ContactFirstName, c.ContactLastName, c.is_email, p.Pms_Package_ID, p.Package_Name FROM groups AS g LEFT OUTER JOIN contacts AS c ON c.ContactID=g.Contact_ID LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID WHERE g.GroupArrivalDate!='0000-00-00' AND g.GroupDepartureDate!='0000-00-00' AND g.Booking_Status='Confirmed' AND (g.GroupArrivalDate >= '".$_SESSION['from']."' AND g.GroupArrivalDate <= '".$_SESSION['to']."') GROUP BY g.grp_id ORDER BY p.Pms_Package_ID ASC, g.GroupArrivalDate ".$_SESSION['filtertime'].", g.grp_id DESC ";
                            }
                    
//echo '<pre>';
//echo '<br/><br/>';
//echo $Query;
//echo '<br/><br/>';
//print_r( $_REQUEST );
//echo '<br/><br/>';
//print_r( $_SESSION );
//echo '<br/><br/>';
//echo '</pre>';
    

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
                                
                                
                                        <?php //print($_SERVER['PHP_SELF'] . "?send=2&contactid=".((@$row->gContact_ID!='' && @$row->gContact_ID!=0)?$row->gContact_ID:$row->ContactID));?>
                                
                                        <tr>
<!--                                            <td class="visible-lg"><input type="checkbox" name="chkstatus[]" value="<?php print($row->grp_id); ?>" /></td>-->
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print(@$row->GroupName);?></td>
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print(@$row->ContactFirstName . ' ' . @$row->ContactLastName); ?> </td>
                                            <td class="visible-sm visible-md visible-lg"><?php print(@$row->Package_Name);?></td>
                                            <td class="visible-sm visible-md visible-lg"><?php print(@$row->BYOA_Num_Adults);?></td>
                                            <td class="visible-sm visible-md visible-lg"><?php echo @$row->BYOA_Num_Children; ?> </td>
                                            <td class="visible-sm visible-md visible-lg"><?php echo ((@$row->filled_profiles>0)?@$row->filled_profiles:'0');; ?> </td>
                                            <td class="visible-sm visible-md visible-lg"><?php echo ((@$row->completed>0)?@$row->completed:'0');; ?> </td>
                                            <td class="visible-sm visible-md visible-lg"><?php echo @$row->grp_total_cust; ?> </td>
                                            <?php if($_SESSION["UType"]!=2 && $row->gContact_ID>0){?>
                                                <td style="width:50px">
                                                    <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF'] . "?send=2&contactid=".$row->gContact_ID);?>" data-original-title="<?php echo "Email has been sent ".$row->is_email.(($row->is_email>1)?' times ':' time ')." ";?>" data-placement="top" class="btn bg-primary text-white" style="float:left;"><i class="fa fa-envelope-o"></i></a></div> 
                                                </td>
                                            <?php }?>
                                        </tr>
            <?php
        }
    } else {
        print('<tr><td colspan="100%" align="center">No record found!</td></tr>');
    }
    ?>
                            </tbody>
                        </table>
                                <?php if ($counter > 0) { ?>
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
<?php include("includes/footer.php"); ?>
