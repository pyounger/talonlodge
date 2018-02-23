<?php 
include('includes/php_includes_top.php');
if (isset($_REQUEST['grp_id'])) {
    $_SESSION['group_id'] = $_REQUEST['grp_id'];
} else {
    if (!isset($_SESSION['group_id'])) {
		if($_SESSION["UType"]>1){
			$_SESSION['group_id'] = $_SESSION["asLeader"];
		}
		else{
        	$_SESSION['group_id'] = 0;
		}
    }
}

if ((isset($_REQUEST['pk_from'])) && ($_REQUEST['pk_from'] != '')) {
    $_SESSION['pk_from'] = calendarDateConver4($_REQUEST['pk_from']);
} else if (isset($_SESSION['pk_from'])) {
    //$_SESSION['from'] = $_SESSION['from'];
} else {
    $_SESSION['pk_from'] = $_SESSION['config_date1'];
}

if (isset($_REQUEST['send'])) {
    $rs = mysql_query("SELECT * FROM users WHERE cont_id=" . $_REQUEST['contactid']);
    if (mysql_num_rows($rs) > 0) {
        $row = mysql_fetch_object($rs);
        mysql_query("UPDATE contacts SET is_email = (is_email + 1) WHERE ContactID = ".$_REQUEST['contactid']."");
        emailToGroupLeader(dbStr($row->user_name), dbStr($row->user_pasphrase), dbStr($row->user_display_name), dbStr($_REQUEST['contactid']));
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
                    $contact_name = dbStr($row->ContactFirstName).' '.dbStr($row->ContactLastName);
                    mysql_query("INSERT INTO users (user_id, user_name, user_pass, user_display_name, utype_id, cust_id, cont_id, createdDate, user_pasphrase) VALUES (".$MaxID.", '".dbStr($row->Email)."', '".md5($random_password)."', '".$contact_name."', '3', '".$row->cust_id."', '".$row->ContactID."', NOW(), '".$random_password."')");
                    $rs1 = mysql_query("SELECT * FROM users WHERE cont_id=" . $_REQUEST['contactid']);
                    if (mysql_num_rows($rs1) > 0) {
                        $row1 = mysql_fetch_object($rs1);
                        mysql_query("UPDATE contacts SET is_email = (is_email + 1) WHERE ContactID = ".$_REQUEST['contactid']."");
                        emailToGroupLeader(dbStr($row1->user_name), dbStr($row1->user_pasphrase), dbStr($row1->user_display_name), dbStr($_REQUEST['contactid']));
                    }
                    $strMSG = " Login Info sent ";
                    $class = "alert alert-success";
                } else {
                    $contact_name = dbStr($row->ContactFirstName).' '.dbStr($row->ContactLastName);
                    mysql_query("INSERT INTO users (user_id, user_name, user_pass, user_display_name, utype_id, cust_id, cont_id, createdDate, user_pasphrase) VALUES (".$MaxID.", '".dbStr($row->Email)."', '".md5($random_password)."', '".$contact_name."', '2', '".$row->cust_id."', '".$row->ContactID."', NOW(), '".$random_password."')") or die(mysql_error());
                    $rs1 = mysql_query("SELECT * FROM users WHERE cont_id=" . $_REQUEST['contactid']);
                    if (mysql_num_rows($rs1) > 0) {
                        $row1 = mysql_fetch_object($rs1);
                        mysql_query("UPDATE contacts SET is_email = (is_email + 1) WHERE ContactID = ".$_REQUEST['contactid']."");
                        emailToGroupLeader(dbStr($row1->user_name), dbStr($row1->user_pasphrase), dbStr($row1->user_display_name), dbStr($_REQUEST['contactid']));
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
    $_SESSION['from'] = '2014-05-23';
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
                                                                    <?php //echo FillSelected3(" groups AS g LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID LEFT OUTER JOIN contacts AS c ON g.Contact_ID=c.ContactID WHERE g.GroupArrivalDate!='0000-00-00' AND g.GroupDepartureDate!='0000-00-00' AND g.Booking_Status='Confirmed' AND c.ContactID=".$_SESSION["contact_id"]." ", " g.grp_id ", " g.GroupName ", " g.GroupArrivalDate ", " p.Package_Name ", @$_SESSION['group_id']);?>
																	<?php echo FillSelected3(" group_contacts AS gc INNER JOIN groups AS gr ON gr.grp_id = gc.grp_id INNER JOIN packages AS p ON p.Pms_Package_ID=gr.Pms_Package_ID WHERE gr.GroupArrivalDate!='0000-00-00' AND gr.GroupDepartureDate!='0000-00-00' AND gr.Booking_Status='Confirmed' AND gc.ContactID='".$_SESSION["contact_id"]."'", " gc.grp_id ", " gr.GroupName ", " gr.GroupArrivalDate ", " p.Package_Name ", @$_SESSION['group_id']);?>
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
                                                                <?php echo FillSelected3(" groups AS g LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID LEFT OUTER JOIN contacts AS c ON g.Contact_ID=c.ContactID WHERE g.GroupArrivalDate!='0000-00-00' AND g.GroupArrivalDate > '".$_SESSION['pk_from']."' AND g.Booking_Status='Confirmed' ", " g.grp_id ", " g.GroupName ", " g.GroupArrivalDate ", " p.Package_Name ", @$_SESSION['group_id']);?>
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
                        <table class="table users-table table-condensed table-hover table-striped display dataTable" id="example1" >
                            <thead>
                                <tr>
<!--                                <th class="visible-lg"><input type="checkbox" name="chkAll" onClick="setAll();"></th>-->
                                    <th class="visible-xs visible-sm visible-md visible-lg">Name</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Leader</th>
                                    <th class="visible-sm visible-md visible-lg">Package</th>
                                    <th class="visible-sm visible-md visible-lg">Adults</th>
                                    <th class="visible-sm visible-md visible-lg">Children</th>
                                    <th class="visible-sm visible-md visible-lg">Total Profiles</th>
                                    <th class="visible-sm visible-md visible-lg">Completed Profiles</th>
                                    <th class="visible-sm visible-md visible-lg">Total Guests</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                            $countt=0;
                            if($_SESSION['group_id']>0){
                                $Query  = "SELECT g.grp_id, g.Contact_ID, g.GroupName, g.BYOA_Num_Adults, g.BYOA_Num_Children, g.grp_total_cust, p.Package_Name, p.Arrival_Start_Date, c.ContactFirstName, c.ContactLastName, c.is_email FROM  groups AS g LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID LEFT OUTER JOIN contacts AS c ON c.ContactID=g.Contact_ID WHERE g.grp_id=".$_SESSION['group_id']." ORDER BY g.grp_id DESC";
                            } else {
                                //$Query  = "SELECT g.grp_id, g.Contact_ID, g.GroupName, g.BYOA_Num_Adults, g.BYOA_Num_Children, g.grp_total_cust, p.Package_Name, p.Arrival_Start_Date, c.ContactFirstName, c.ContactLastName, c.is_email FROM  groups AS g LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID LEFT OUTER JOIN contacts AS c ON c.ContactID=g.Contact_ID WHERE  g.GroupArrivalDate!='0000-00-00' AND g.GroupDepartureDate!='0000-00-00' AND g.Booking_Status='Confirmed' AND (g.GroupArrivalDate >= '".$_SESSION['pk_from']."' AND g.GroupArrivalDate <= '".$_SESSION['to']."') GROUP BY g.grp_id ORDER BY p.Arrival_Start_Date ASC, g.GroupArrivalDate ".$_SESSION['filtertime'].", g.grp_id DESC";
								$Query  = "SELECT g.grp_id, g.Contact_ID, g.GroupName, g.BYOA_Num_Adults, g.BYOA_Num_Children, g.grp_total_cust, p.Package_Name, p.Arrival_Start_Date, c.ContactFirstName, c.ContactLastName, c.is_email FROM  groups AS g LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID LEFT OUTER JOIN contacts AS c ON c.ContactID=g.Contact_ID WHERE  g.GroupArrivalDate!='0000-00-00' AND g.GroupDepartureDate!='0000-00-00' AND g.Booking_Status='Confirmed' AND (g.GroupArrivalDate >= '".$_SESSION['pk_from']."') GROUP BY g.grp_id ORDER BY p.Arrival_Start_Date ASC, g.GroupArrivalDate ".$_SESSION['filtertime'].", g.grp_id DESC";
                            }
							//print($Query);
                            
//                            if($_SESSION['group_id']>0){
//                                echo '1';
//                                $Query = " SELECT g.grp_id, g.Contact_ID AS gContact_ID, g.GroupName, g.BYOA_Num_Adults, g.BYOA_Num_Children, g.grp_total_cust, gc.ContactID, (SELECT COUNT(*) AS total FROM group_contacts AS gc WHERE gc.grp_id=".$_SESSION['group_id'].") AS filled_profiles, c.ContactFirstName, c.ContactLastName, c.is_email, c.is_completed, (SELECT COUNT(*) AS total FROM contacts AS c WHERE c.grp_id=".$_SESSION['group_id']." AND c.is_completed=1) AS completed, p.Pms_Package_ID, p.Package_Name FROM group_contacts AS gc LEFT OUTER JOIN groups AS g ON gc.grp_id=g.grp_id LEFT OUTER JOIN contacts AS c ON c.ContactID=g.Contact_ID LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID WHERE g.GroupArrivalDate!='0000-00-00' AND g.GroupDepartureDate!='0000-00-00' AND g.Booking_Status='Confirmed' AND gc.grp_id=".$_SESSION['group_id']." GROUP BY g.grp_id ORDER BY p.Pms_Package_ID ASC, g.GroupArrivalDate ".$_SESSION['filtertime'].", g.grp_id DESC ";
//                                $countt = mysql_num_rows(mysql_query($Query));
//                                if($countt==0){
//                                    echo '2';
//                                    $Query=" SELECT g.grp_id, g.Contact_ID AS gContact_ID, g.GroupName, g.BYOA_Num_Adults, g.BYOA_Num_Children, g.grp_total_cust, c.ContactFirstName, c.ContactLastName, c.is_email, p.Pms_Package_ID, p.Package_Name FROM groups AS g LEFT OUTER JOIN contacts AS c ON c.ContactID=g.Contact_ID LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID WHERE g.GroupArrivalDate!='0000-00-00' AND g.GroupDepartureDate!='0000-00-00' AND g.Booking_Status='Confirmed' AND g.grp_id=".$_SESSION['group_id']." GROUP BY g.grp_id ORDER BY p.Pms_Package_ID ASC, g.GroupArrivalDate ".$_SESSION['filtertime'].", g.grp_id DESC ";
//                                }
//                            } else {
//                                echo '3';
//                                $Query=" SELECT g.grp_id, g.Contact_ID AS gContact_ID, g.GroupName, g.BYOA_Num_Adults, g.BYOA_Num_Children, g.grp_total_cust, c.ContactFirstName, c.ContactLastName, c.is_email, p.Pms_Package_ID, p.Package_Name FROM groups AS g LEFT OUTER JOIN contacts AS c ON c.ContactID=g.Contact_ID LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID WHERE g.GroupArrivalDate!='0000-00-00' AND g.GroupDepartureDate!='0000-00-00' AND g.Booking_Status='Confirmed' AND (g.GroupArrivalDate >= '".$_SESSION['from']."' AND g.GroupArrivalDate <= '".$_SESSION['to']."') GROUP BY g.grp_id ORDER BY p.Pms_Package_ID ASC, g.GroupArrivalDate ".$_SESSION['filtertime'].", g.grp_id DESC ";
//                            }
                    
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
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php echo @$row->GroupName;?></td>
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php echo @$row->ContactFirstName . ' ' . @$row->ContactLastName;?></td>
                                            <td class="visible-sm visible-md visible-lg"><?php echo @calendarDateConver2($row->Arrival_Start_Date).'<br/>'.@$row->Package_Name;?></td>
                                            <td class="visible-sm visible-md visible-lg"><?php echo @$row->BYOA_Num_Adults;?></td>
                                            <td class="visible-sm visible-md visible-lg"><?php echo @$row->BYOA_Num_Children; ?></td>
                                            <td class="visible-sm visible-md visible-lg">
                                                <?php 
                                                    // echo @totalCounts("ContactID", "contacts", " grp_id=".$row->grp_id." ");
                                                    echo @totalCounts("c.ContactID", "contacts AS c LEFT OUTER JOIN group_contacts AS gc ON gc.ContactID = c.ContactID", " gc.grp_id =".$row->grp_id." ");
                                                ?>
                                            </td>
                                            <td class="visible-sm visible-md visible-lg">
                                                <?php
                                                    // echo @totalCounts("ContactID", "contacts", " grp_id=".$row->grp_id." AND is_completed=1 ");
                                                    echo @totalCounts("c.ContactID", "contacts AS c LEFT OUTER JOIN group_contacts AS gc ON gc.ContactID = c.ContactID", " gc.grp_id =".$row->grp_id." AND c.is_completed=1 ");
                                                ?>
                                            </td>
                                            <td class="visible-sm visible-md visible-lg"><?php echo @$row->grp_total_cust; ?></td>
                                            <td style="width:100px">
                                                <?php if($_SESSION["UType"]!=2 && $row->Contact_ID>0){?>
                                                    <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF'] . "?send=2&contactid=".$row->Contact_ID);?>" data-original-title="<?php echo "Email has been sent ".$row->is_email.(($row->is_email>1)?' times ':' time ')." ";?>" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-envelope-o"></i></a></div> 
                                                <?php }?>
                                                <div class="tooltips"><a href="manage_profile.php?grp_id=<?php echo $row->grp_id;?>" data-original-title="Profiles Under This Group" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-user"></i></a></div>
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
        "aaSorting": [[ 2, "asc" ]]
    });
});
</script>
