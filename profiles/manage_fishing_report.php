<?php include ('includes/php_includes_top.php'); ?>
<?php
if ((isset($_REQUEST['pk_from'])) && ($_REQUEST['pk_from'] != '')) {
    $_SESSION['pk_from'] = calendarDateConver4($_REQUEST['pk_from']);
} else if (isset($_SESSION['pk_from'])) {
    //$_SESSION['from'] = $_SESSION['from'];
} else {
    $_SESSION['pk_from'] = '2014-05-01';
}
if ((isset($_REQUEST['room_id'])) && ($_REQUEST['room_id'] != '')) {
    $_SESSION['room_id'] = $_REQUEST['room_id'];
} else if (isset($_SESSION['room_id'])) {
    //$_SESSION['to'] = $_SESSION['to'];
} else {
    $_SESSION['room_id'] = '0';
}
if ((isset($_REQUEST['limit_of_rec'])) && ($_REQUEST['limit_of_rec'] != '')) {
    $_SESSION['limit_of_rec'] = $_REQUEST['limit_of_rec'];
} else if (isset($_SESSION['limit_of_rec'])) {
    //$_SESSION['group_name'] = $_SESSION['group_name'];
} else {
    $_SESSION['limit_of_rec'] = '200';
}
if (isset($_REQUEST['grp_id'])) {
    $_SESSION['group_id'] = $_REQUEST['grp_id'];
} else {
    if (!isset($_SESSION['group_id'])) {
        $_SESSION['group_id'] = 0;
    } else if (isset($_REQUEST['contactid'])) {
        $_SESSION['group_id'] = returnName("grp_id", "contacts", "ContactID",
                $_REQUEST['contactid']);
    }
}
?>
<?php
include ('includes/html_header.php');
?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
        </ul>
        <div class="form-group hiddn-minibar pull-right">
        </div>
        <h3 class="page-header"> Manage Fishing Report <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b>Manage Bar Tab: </b> You can  Manage Fishing Report here </p>
        </blockquote>
    </div>
</div>
<?php if (isset($_REQUEST['action'])) { ?>

<?php } elseif (isset($_REQUEST['show']) && $_REQUEST['show'] == 10) { ?>

<?php } else { ?>

    <!--
    <div class="row">
    <div class="col-md-12">
        <div class="panel panel-cascade">
            <div class="panel-heading text-primary">
                <h3 class="panel-title"><i class="fa fa-windows"></i> Room Assigning
                    <span class="pull-right" style="width:auto;">
                        <div style="float:right;">
                            <a href="<?php print($_SERVER['PHP_SELF'] . "?action=1"); ?>" title="Add New"><i class="fa fa-plus"></i> Add New </a>
                        </div>
                    </span>
                </h3>
            </div>
            <div class="panel-body ">
                <div class="ro">
                    <div class="col-mol-md-offset-2">
                        <form class="form-horizontal cascde-forms" method="post" action="<?php print($_SERVER['PHP_SELF']); ?>" name="frm" id="frm" >
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label">Package Arrival Date:</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" class="form-control form-cascade-control datetimepicker" value="<?php echo calendarDateConver2($_SESSION['pk_from']); ?>" id="pk_from" name="pk_from" style="width: 160px;" title="Date From " placeholder="Package Arrival Date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label">Select Room:</label>
                                <div class="col-lg-10 col-md-9">
                                    <select name="room_id" id="room_id" data-placeholder="Choose a Room..." class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2">
                                        <option value="0"> Show All </option>
    <?php echo FillSelected2("rooms",
            "room_id", "room_number", "room_title", @$_SESSION['room_id']); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-actions">
                                <label class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                                &nbsp; <input type="submit" value="Filter Records" name="filterRecords" class="btn bg-primary text-white btn-lg">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    -->


    <?php
    if (isset($_REQUEST['show']) && $_REQUEST['show'] == 1) {
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="<?php print($class); ?>"><?php print($strMSG); ?></div>
                <div class="panel">
                    <div class="panel-heading text-primary">
                        <h3 class="panel-title"><i class="fa fa-windows"></i> 
                                <?php
                                    $Query = "SELECT
                                    p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, p.Package_Max_Days
                                    FROM packages AS p
                                    WHERE 
                                    p.Pms_Package_ID=" . $_REQUEST['pms_pak_id'] . "  LIMIT 1";
                                    $nResult = mysql_query($Query);
                                    if (mysql_num_rows($nResult) >= 1) {
                                        while ($row = mysql_fetch_row($nResult)) {
                                            echo $row[0] . ' - ' . calendarDateConver2($row[1]) . ' - ' . calendarDateConver2($row[2]) . ' - ' . $row[3] . ' Days';
                                        }
                                    }
                                ?>
                            <span class="pull-right" style="width:auto;">
                            </span> 
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                            <table class="table users-table table-condensed table-hover table-striped display dataTable" id="example" >
                                <thead>
                                    <tr>
                                        <th class="visible-xs visible-sm visible-md visible-lg">First Name</th>
                                        <th class="visible-xs visible-sm visible-md visible-lg">Last Name</th>
                                        <th class="visible-xs visible-sm visible-md visible-lg">Group</th>
                                        <th class="visible-xs visible-sm visible-md visible-lg">Report</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                        $Query = "SELECT
                                        p.Pms_Package_ID, p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, p.Package_Max_Days,
                                        g.grp_id, g.GroupName,
                                        c.ContactID, c.ContactFirstName, c.ContactLastName, c.cont_image,
                                        cp.conp_id, cp.bootsize_id,
                                        j.jacketsize_name
                                        FROM packages AS p 
                                        LEFT OUTER JOIN groups AS g ON p.Pms_Package_ID= g.Pms_Package_ID 
                                        LEFT OUTER JOIN contacts AS c ON g.grp_id=c.grp_id
                                        LEFT OUTER JOIN contact_profiles AS cp ON c.ContactID=cp.cont_id
                                        LEFT OUTER JOIN jacket_size AS j ON cp.jacketsize_id=j.jacketsize_id
                                        WHERE 
										p.Pms_Package_ID = " . $_REQUEST['pms_pak_id'] . "  
AND p.Arrival_Start_Date > '2014-05-01'  
AND g.grp_id=c.grp_id
AND g.GroupArrivalDate > '2014-05-01' 

ORDER BY c.ContactFirstName ASC";
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
                                                <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->ContactFirstName); ?></td>
                                                <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->ContactLastName); ?></td>
                                                <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->GroupName); ?></td>
                                                <td class="visible-xs visible-sm visible-md visible-lg"><a href="<?php echo "manage_fishing_report_print.php?pms_pak_id=".$_REQUEST['pms_pak_id']."&cont_id=".$row->ContactID."&grp_id=".$row->grp_id;?>" target="_blank" >Click for Report</a></td>
                                            </tr>
                            <?php
                        }
                    } else {
                        //print('<tr><td colspan="100%" align="center">No record found!</td></tr>');
                    }
                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else if (isset($_REQUEST['show']) && $_REQUEST['show'] == 2) {
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-cascade">
                    <div class="panel-heading text-primary">
                        <h3 class="panel-title"><i class="fa fa-windows"></i>
                                                <?php
                                                $Query = "SELECT
							c.ContactFirstName, c.ContactLastName, 
							g.GroupName,
							p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, p.Package_Max_Days
							FROM contacts AS c, groups AS g, packages AS p
							WHERE 
							c.ContactID=" . $_REQUEST['contactid'] . " AND
							g.grp_id=" . $_REQUEST['grp_id'] . " AND 
							p.Pms_Package_ID=" . $_REQUEST['pms_pak_id'] . "  LIMIT 1";
                                                $nResult = mysql_query($Query);
                                                if (mysql_num_rows($nResult) >= 1) {
                                                    while ($row = mysql_fetch_row($nResult)) {
                                                        echo $row[0] . ' ' . $row[1] . ' - ' . $row[2] . ' - ' . $row[3] . ' - ' . calendarDateConver2($row[4]) . ' - ' . calendarDateConver2($row[5]) . ' - ' . $row[6] . ' Days';
                                                    }
                                                }
                                                ?>
                            <span class="pull-right" style="width:auto;">
                                <div style="float:right;">
                                    <!-- <a href="<?php print($_SERVER['PHP_SELF'] . "?action=1"); ?>" title="Add New"><i class="fa fa-plus"></i> Add New </a> -->
                                </div>
                            </span>
                        </h3>
                    </div>
                    <div class="panel-body ">
                        <div class="ro">
                            <div class="col-mol-md-offset-2">
                                <form class="form-horizontal cascde-forms" method="post" action="<?php print($_SERVER['PHP_SELF']); ?>" name="frm" id="frm" >
                                    <div class="form-group">
                                        <label for="site_login" class="col-lg-2 col-md-3 control-label">Activity Name</label>
                                        <div class="col-lg-10 col-md-9">
                                            <?php echo @returnName('act_name', 'activities', 'act_id', $_REQUEST['act_id']); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="site_login" class="col-lg-2 col-md-3 control-label">Order Beverage(s) for the Date:</label>
                                        <div class="col-lg-10 col-md-9">
                                            <?php echo @calendarDateConver2($_REQUEST['date']); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <?php @$bvo_id = returnName("bvo_id", "beverage_order", "cont_id", $_REQUEST['contactid']." AND grp_id=".$_REQUEST['grp_id']." AND pms_pak_id=".$_REQUEST['pms_pak_id']." AND asch_id=".$_REQUEST['asch_id']);?>
                                        <label class="col-lg-2 col-md-3 control-label">Select Beverage(s):</label>
                                        <div class="col-lg-10 col-md-9">
                                            <select name="bitem_id[]" id="bitem_id" data-placeholder="Choose Beverage(s)..." class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2" multiple="multiple">
                                                <?php echo FillMultiple("bar_items WHERE bitem_type=2 ", "bitem_id", "bitem_name", "beverage_order_list", "bitem_id", "bvo_id", @$bvo_id) ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <label class="col-lg-2 col-md-3 control-label">&nbsp;</label>
        
                                        <input type="hidden" name="pms_pak_id" value="<?php echo $_REQUEST['pms_pak_id']; ?>">
                                        <input type="hidden" name="cont_id" value="<?php echo $_REQUEST['contactid']; ?>">
                                        <input type="hidden" name="grp_id" value="<?php echo $_REQUEST['grp_id']; ?>">
                                        <input type="hidden" name="act_id" value="<?php echo $_REQUEST['act_id']; ?>">
                                        <input type="hidden" name="asch_id" value="<?php echo $_REQUEST['asch_id']; ?>">
                                        <input type="hidden" name="act_date" value="<?php echo $_REQUEST['date']; ?>">
                                        <input type="hidden" name="bvo_id" value="<?php echo @$_REQUEST['bvo_id']; ?>">

                                        <?php if ( !(isset($_REQUEST['bvo_id']) && $_REQUEST['bvo_id']!='') && (isset($_REQUEST['add'])) ) { ?>
                                            &nbsp; <input type="submit" value="Order Now" name="btnAdd" class="btn bg-primary text-white btn-lg">
                                            &nbsp; <button type="button" class="btn btn-default btn-animate-demo" onclick="javascript: window.location = '<?php @print($_SERVER['HTTP_REFERER']); ?>';">Back</button>
                                        <?php } else { ?>
                                            &nbsp; <input type="submit" value="Update Now" name="btnAdd" class="btn bg-primary text-white btn-lg">
                                        <?php } ?>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            } else if (isset($_REQUEST['show']) && $_REQUEST['show'] == 3) {
                if( isset($_REQUEST['bvo_id']) && $_REQUEST['bvo_id']!='' ){
                    
                $rsM = mysql_query("SELECT 
                bvo.act_date, bvo.bvo_created, bvo.bvo_updated, c.ContactFirstName, c.ContactLastName, g.GroupName, p.Package_Name, ac.act_name
                FROM beverage_order AS bvo
                LEFT OUTER JOIN contacts AS c ON bvo.cont_id=c.ContactID
                LEFT OUTER JOIN groups AS g ON bvo.grp_id=g.grp_id
                LEFT OUTER JOIN packages AS p ON bvo.pms_pak_id=p.Pms_Package_ID
                LEFT OUTER JOIN activities AS ac ON bvo.act_id=ac.act_id
                WHERE bvo.bvo_id=".$_REQUEST['bvo_id']);
                if(mysql_num_rows($rsM)>0){
                    $rsMem = mysql_fetch_object($rsM);
        ?>
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
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Guest</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                &nbsp; <?php echo $rsMem->ContactFirstName.' '.$rsMem->ContactLastName; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Group</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                &nbsp; <?php echo $rsMem->GroupName; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                &nbsp; <?php echo $rsMem->Package_Name; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Activity</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                &nbsp; <?php echo $rsMem->act_name; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Beverage Order Date</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                &nbsp; <?php echo calendarDateConver2($rsMem->act_date); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Ordered Beverages Are</label>
                            <div class="col-lg-10 col-md-9 det-display"> &nbsp; 
                                <?php 
                                    $counter=0;
                                    $Query = "SELECT 
                                    bol.bitem_id, bi.bitem_name
                                    FROM beverage_order_list AS bol
                                    LEFT OUTER JOIN bar_items AS bi ON bol.bitem_id=bi.bitem_id
                                    WHERE bol.bvo_id=".$_REQUEST['bvo_id']." ORDER BY bi.bitem_name ASC";
                                    $count = mysql_num_rows(mysql_query($Query));
                                    $rs = mysql_query($Query);
                                    if ($count>0) {
                                        while ($row = mysql_fetch_object($rs)) {
                                            $counter++;
                                            if($counter>1){
                                                $comma = ', ';
                                            } else {
                                                $comma = '';
                                            }
                                            echo $comma.$row->bitem_name;
                                        }
                                    }    
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label"> &nbsp; </label>
                            <div class="col-lg-10 col-md-9 det-display">  &nbsp; </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                            <div class="col-lg-10 col-md-9">
                                <button type="button" class="btn btn-default btn-animate-demo" onclick="javascript: window.location = '<?php @print($_SERVER['HTTP_REFERER']); ?>';">Back</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                <?php } } else {?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-cascade">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Details
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label"> Order Does Not Exists </label>
                            <div class="col-lg-10 col-md-9 det-display">  Order Does Not Exists </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                            <div class="col-lg-10 col-md-9">
                                <button type="button" class="btn btn-default btn-animate-demo" onclick="javascript: window.location = '<?php @print($_SERVER['HTTP_REFERER']); ?>';">Back</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }
            
        } else {
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="<?php print($class); ?>"><?php print($strMSG); ?></div>
                <div class="panel">
                    <div class="panel-heading text-primary">
                        <h3 class="panel-title"><i class="fa fa-glass"></i>  Fishing Report 
                            <span class="pull-right" style="width:auto;">
                            </span> 
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                            <table class="table users-table table-condensed table-hover table-striped display dataTable" id="example" >
                                <thead>
                                    <tr>
                                        <th class="visible-xs visible-sm visible-md visible-lg">Package Name</th>
                                        <th class="visible-xs visible-sm visible-md visible-lg">Package Start</th>
                                        <th class="visible-xs visible-sm visible-md visible-lg">Package End</th>
                                        <th class="visible-xs visible-sm visible-md visible-lg">No. of Days</th>
                                    </tr>
                                </thead>
                                <tbody>
        <?php
        $Query = "SELECT p.* FROM packages AS p WHERE p.Arrival_Start_Date > '2014-05-01' ORDER BY p.Arrival_Start_Date ASC";
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
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    <a href="<?php print($_SERVER['PHP_SELF'] . "?show=1&pms_pak_id=" . $row->Pms_Package_ID); ?>">
                <?php print($row->Package_Name); ?>
                                                    </a>	 
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg"><?php echo calendarDateConver2($row->Arrival_Start_Date); ?></td>
                                                <td class="visible-xs visible-sm visible-md visible-lg"><?php echo calendarDateConver2($row->Arrival_End_Date); ?></td>
                                                <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->Package_Max_Days); ?></td>
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
            $next_prev = $p->nextPrev($_GET['page'], $pages, '');
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
        <?php
    }
    ?>















<?php } ?>    

</div>
<?php
include ("includes/rightsidebar.php");
?>
</div> </div> </div>










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
<script src="js/dataTables-custom.js"></script>

<script src="js/bootstrap-timepicker-edited.js"></script>
<script src="js/bootstrap-timepicker-custom.js"></script>

<script src="js/fullcalendar.min.js"></script>
<!--    <script src="js/fullcalendar-custom.js"></script>-->
<!--    <script src="js/fullcalendar-custom-ck.js"></script>-->


<!--
<script>



                                        $(document).ready(function() {


// Create Event manually 

                                    $('#create-event').click(function() {
                                        var vj = $('#write-event').val();
                                        add_event(vj);
                                    });

                                    document.getElementById('write-event').onkeypress = function(e)
                                    {
                                        var event = e || window.event;
                                        var charCode = event.which || event.keyCode;

                                        if (charCode == '13')
                                        {
                                            var vj = $('#write-event').val();
                                            add_event(vj);

                                        }
                                    }

                                    function add_event(vj)
                                    {
                                        if (vj == "")
                                        {
                                            return;
                                        }
                                        var eventColor = $('.event-color').val();
                                        $('#external-events ul').prepend('<li data-class="' + eventColor + '" class="external-event list-group-item ' + eventColor + ' list-group-item">' + vj + ' </li>')
                                        $('#write-event').val('');

                                        initialize_events();

                                    }


                                    /* initialize the external events
                                     -----------------------------------------------------------------*/
                                    function initialize_events()
                                    {
                                        $('#external-events ul li.external-event').each(function() {

                                            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                                            // it doesn't need to have a start or end
                                            var eventObject = {
                                                title: $.trim($(this).text()) // use the element's text as the event title
                                            };

                                            // store the Event Object in the DOM element so we can get to it later
                                            $(this).data('eventObject', eventObject);

                                            // make the event draggable using jQuery UI
                                            $(this).draggable({
                                                zIndex: 999,
                                                revert: true, // will cause the event to go back to its
                                                revertDuration: 0  //  original position after the drag
                                            });

                                        });
                                    }

                                    initialize_events();
                                    var date = new Date();
                                    var d = date.getDate();
                                    var m = date.getMonth();
                                    var y = date.getFullYear();

                                    var calendar = $('#calendar').fullCalendar({
                                        header: {
                                            left: 'prev,next today',
                                            center: 'title',
                                            right: 'month,agendaWeek,agendaDay'
                                        },
                                        selectable: true,
                                        selectHelper: true,
                                        select: function(start, end, allDay) {

                                            //var start = $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss");
                                            //var end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");


                                            var title = prompt('Event Title:');
                                            if (title) {
                                                calendar.fullCalendar('renderEvent',
                                                        {
                                                            title: title,
                                                            start: start,
                                                            end: end,
                                                            allDay: allDay
                                                        },
                                                true // make the event "stick"
                                                        );
                                            }
                                            calendar.fullCalendar('unselect');
                                        },
                                        editable: false,
                                        droppable: false, // this allows things to be dropped onto the calendar !!!
                                        drop: function(date, allDay) { // this function is called when something is dropped

                                            // retrieve the dropped element's stored Event Object
                                            var originalEventObject = $(this).data('eventObject');

                                            // we need to copy it, so that multiple events don't have a reference to the same object
                                            var copiedEventObject = $.extend({}, originalEventObject);

                                            // assign it the date that was reported
                                            copiedEventObject.start = date;
                                            copiedEventObject.allDay = allDay;
                                            copiedEventObject.className = $(this).data('class');


                                            // render the event on the calendar
                                            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                                            $('#calendar').fullCalendar('renderEvent', copiedEventObject, false);

                                            // is the "remove after drop" checkbox checked?
                                            if ($('#drop-remove').is(':checked')) {
                                                // if so, remove the element from the "Draggable Events" list
                                                $(this).remove();
                                            }

                                        },
                                        selectable: false,
                                                selectHelper: false,
                                                select: function(start, end, allDay) {
                                                    var title = prompt('Event Title:');
                                                    if (title) {
                                                        calendar.fullCalendar('renderEvent',
                                                                {
                                                                    title: title,
                                                                    start: start,
                                                                    end: end,
                                                                    allDay: allDay
                                                                },
                                                        true // make the event "stick"
                                                                );
                                                    }
                                                    calendar.fullCalendar('unselect');
                                                },
                                                events: <?php echo @json_encode($return_array); ?>
                                                                                                        });

                                                                                                        });

</script>      
-->




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
                                    // $(".datepicker").datepicker();
                                    // $(".datetimepicker").datetimepicker();
                                    $(".datetimepicker").datepicker();
                                    //$.datepicker.setDefaults({dateFormat: 'yy-mm-dd'});
                                    //$.datepicker.setDefaults({defaultDate: '+6w'});
                                });
</script>
<script src="js/validate.js"></script>
<script language="javascript">
                                $(document).ready(function() {
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
    #example_filter {
        display: none;
    }
    #example_length {
        display: none;
    }
    #example_info {
        display: none;
    }
    .dataTables_paginate {
        display: none;
    }
    th:hover {
        cursor: pointer;
    }
    /*
     .chosen-container{z-index: 99999 !important;}
     .chosen-container-single{z-index: 99999 !important;}
     .chosen-results{z-index: 99999 !important;}
    */
</style>
<link href="css/fullcalendar.css" rel="stylesheet"  title="lessCss" id="lessCss">
<link href="css/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="css/chosen.css" rel="stylesheet">

<?php //include("includes/footer.php");  ?>

<script language="javascript">
                                $(document).ready(function() {
                                    //$(".datetimepicker").datepicker();

                                    //        $('.datetimepicker').datepicker({
                                    //            defaultDate: '+6w',
                                    //            changeMonth: true,
                                    //            changeYear: true
                                    //        });
                                    //        $.datepicker.setDefaults({defaultDate: '+6w'});

                                    //        $(".datetimepicker").datepicker( {
                                    //        defaultDate: '+6w'
                                    //    } );
                                });

                                jQuery(document).ready(function($) {
                                    // $( '.datetimepicker' ).datepicker({
                                    //   defaultDate: '+6w'
                                    //});
                                });

                                $(document).ready(function() {

                                    //$("#txtDate").datepicker({ minDate: 0, maxDate: '+1M', numberOfMonths:2 });

                                });

                                $(function() {
                                    //      $.datepicker.setDefaults({showOn: 'both', buttonImage: 'img/calendar.gif',
                                    //            buttonImageOnly: true});
                                    //      $('#startDate').datepicker({onSelect: function(dateStr) {
                                    //                  $('#endDate').datepicker('option', 'minDate', $(this).datepicker('getDate'));
                                    //            }, onClose: function() {
                                    //                  $('#endDate').focus();
                                    //            }});
                                    //      $('#endDate').datepicker({onSelect: function(dateStr) {
                                    //                  $('#startDate').datepicker('option', 'maxDate', $(this).datepicker('getDate'));
                                    //            }});
                                });

</script>
