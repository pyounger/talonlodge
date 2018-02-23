<?php include('includes/php_includes_top.php'); ?>
<?php
if ((isset($_REQUEST['limit_of_rec'])) && ($_REQUEST['limit_of_rec'] != '')) {
    $_SESSION['limit_of_rec'] = $_REQUEST['limit_of_rec'];
} else if (isset($_SESSION['limit_of_rec'])) {
    //$_SESSION['group_name'] = $_SESSION['group_name'];
} else {
    $_SESSION['limit_of_rec'] = '200';
}

if (isset($_REQUEST['action'])) {
    if (isset($_REQUEST['btnAdd'])) {
        $actid = getMaximum("activity_logs", "actl_id");
        mysql_query("INSERT INTO activity_logs(actl_id, asch_id, actl_details, actl_created) VALUES(" . $actid . ",'" . dbStr($_REQUEST['asch_id']) . "','" . dbStr($_REQUEST['actl_details']) . "', NOW())") or die(mysql_error());
        header("Location: " . $_SERVER['PHP_SELF'] . "?op=1");
    } elseif (isset($_REQUEST['btnUpdate'])) {
        $udtQuery = "UPDATE activity_logs SET actl_details='" . dbStr($_REQUEST['actl_details']) . "', actl_updated=NOW() WHERE actl_id=" . $_REQUEST['actl_id'];
        mysql_query($udtQuery) or die(mysql_error());
        header("Location: " . $_SERVER['PHP_SELF'] . "?op=2");
    } elseif ($_REQUEST['action'] == 2) {
        $rsM = mysql_query("SELECT * FROM activity_logs WHERE actl_id=" . $_REQUEST['actl_id']);
        if (mysql_num_rows($rsM) > 0) {
            $rsMem = mysql_fetch_object($rsM);
            $actl_id = $rsMem->actl_id;
            $asch_id = $rsMem->asch_id;
            $actl_details = $rsMem->actl_details;
            $formHead = "Update Info";
        }
    } else {
        $actl_id = "";
        $asch_id = "";
        $actl_details = "";
        $formHead = "Add New";
    }
}
if (isset($_REQUEST['show'])) {
    $rsM = mysql_query("SELECT * FROM activity_logs WHERE actl_id=" . $_REQUEST['actl_id']);
    if (mysql_num_rows($rsM) > 0) {
        $rsMem = mysql_fetch_object($rsM);
        $actl_id = $rsMem->actl_id;
        $asch_id = $rsMem->asch_id;
        $actl_details = $rsMem->actl_details;
        $formHead = "Update Info";
    }
}
if(isset($_REQUEST['btnDelete'])){
    @mysql_query("DELETE FROM activity_logs  WHERE actl_id=" . $_REQUEST['chkstatus']) or die(mysql_query());
    header("Location: " . $_SERVER['PHP_SELF'] . "?op=3");
}
?>
<?php include('includes/html_header.php'); ?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
        </ul>
        <div class="form-group hiddn-minibar pull-right">
        </div>
        <h3 class="page-header"> Manage Activity Logs <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b> Manage Activity Logs </b> You can  Manage Activity Logs  here </p>
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
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Activity Log Details</label>
                            <div class="col-lg-10 col-md-9">
                                <textarea type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Activity Log Details..." id="actl_details" name="actl_details"><?php print($actl_details);?></textarea>
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
            </div>
        </div>
    </div>
<?php } elseif (isset($_REQUEST['show'])) { ?>
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
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Fish Types</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php print($asch_id); ?></div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Default Fish Weight</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php print($actl_details); ?></div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Default Percent of Recovery</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php print($ftype_recovery); ?></div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                            <div class="col-lg-10 col-md-9">
                                <button type="button" name="btnBack" class="btn btn-default btn-animate-demo" onclick="javascript: window.location = '<?php print($_SERVER['HTTP_REFERER']); ?>';">Back</button>
                            </div>
                        </div>					
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <?php
        if(isset($_REQUEST['start_date'])){
            $date1 = $_REQUEST['start_date'];
            $date2 = calendarDateConver4($_REQUEST['start_date']);
        } else if(isset($_REQUEST['start_date_page'])){
            $date1 = calendarDateConver2($_REQUEST['start_date_page']);
            $date2 = $_REQUEST['start_date_page'];
        } else {
            $date1 = calendarDateConver2(date("Y-m-d"));
            $date2 = date("Y-m-d");
        }
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-cascade">
                <div class="panel-heading text-primary">
                    <h3 class="panel-title"><i class="fa fa-check"></i> Activity Logs </h3>
                </div>
                <div class="panel-body ">
                    <div class="ro">
                        <div class="col-mol-md-offset-2">
                            <form class="form-horizontal cascde-forms" method="post" action="<?php print($_SERVER['PHP_SELF']); ?>" name="frm" id="frm" >
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-3 control-label">Activity Date:</label>
                                    <div class="col-lg-10 col-md-9">
                                        <input type="text" class="form-control form-cascade-control datetimepicker" value="<?php echo $date1;?>" id="asch_start_date" name="start_date" style="width: 160px;" title="Activity Date" placeholder="Activity Date">
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

<div class="row">
        <div class="col-md-12">
            <div class="<?php print($class); ?>"><?php print($strMSG); ?></div>
            <div class="panel">
                <div class="panel-heading text-primary">
                    <h3 class="panel-title"><i class="fa fa-file-text"></i>  Manage Activity Logs 
                        <span class="pull-right" style="width:auto;">
<!--                            <div style="float:right;"><a href="<?php print($_SERVER['PHP_SELF'] . "?action=1"); ?>" title="Add New"><i class="fa fa-plus"></i> Add New</a></div>-->
                        </span> 
                    </h3>
                </div>
                <div class="panel-body">
                    <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                        <table class="table users-table table-condensed table-hover table-striped display dataTable" id="example" >
                            <thead>
                                <tr>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Activity</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Start</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">End</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Therapy/Therapist</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Guide/Vendor</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Captain/Deckhand</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Contact/Group</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Log Details</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $Query = "
                                        SELECT 
                                        asch.*, al.actl_id, al.actl_details, ac.act_name, c.ContactFirstName, c.ContactLastName, g.GroupName, actt.ath_name, actht.atht_name, ab.*, bc.actboca_name, bcd.actbodh_name, ag.ag_name, av.av_name
                                        FROM 
                                        act_schedule AS asch 
                                        LEFT OUTER JOIN activity_logs AS al ON asch.asch_id = al.asch_id
                                        LEFT OUTER JOIN activities AS ac ON asch.act_id = ac.act_id
                                        LEFT OUTER JOIN contacts AS c ON asch.cont_id = c.ContactID
                                        LEFT OUTER JOIN groups AS g ON asch.grp_id = g.grp_id
                                        LEFT OUTER JOIN act_therapist AS actt ON asch.ath_id=actt.ath_id
                                        LEFT OUTER JOIN act_th_type AS actht ON asch.atht_id=actht.atht_id
                                        LEFT OUTER JOIN act_boats AS ab ON asch.act_boat_id = ab.act_boat_id
                                        LEFT OUTER JOIN act_boat_captain AS bc ON ab.actboca_id = bc.actboca_id
                                        LEFT OUTER JOIN act_boat_deckhand AS bcd ON ab.actbodh_id = bcd.actbodh_id
                                        LEFT OUTER JOIN activity_guides AS ag ON asch.ag_id=ag.ag_id
                                        LEFT OUTER JOIN activity_vendors AS av ON asch.av_id=av.av_id
                                        WHERE asch.asch_start_date LIKE '".$date2."%'
                                        ORDER BY asch_start_date ASC
                                    ";
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
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->act_name); ?> </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php 
                                                    echo date("m/d/Y", strtotime($row->asch_start_date));
                                                    echo '<br/>';
                                                    echo date("g:i a", strtotime($row->asch_start_date));
                                                ?> 
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php 
                                                    echo date("m/d/Y", strtotime($row->asch_end_date));
                                                    echo '<br/>';
                                                    echo date("g:i a", strtotime($row->asch_end_date));
                                                ?>
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php echo $row->ath_name.'<br/>'.$row->atht_name; ?> </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php echo $row->ag_name.'<br/>'.$row->av_name; ?> </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php echo $row->actboca_name.'<br/>'.$row->actbodh_name;?> </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php echo $row->ContactFirstName.' '.$row->ContactLastName.'<br/>'.$row->GroupName;?> </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg" style="max-width: 250px;"><?php print($row->actl_details); ?> </td>
                                            <td style="width:110px">
                                                <?php if($row->actl_id!=''){?>
                                                    <div style="float:center;" class="tooltips"><a href="<?php echo $_SERVER['PHP_SELF']."?actl_id=" . $row->actl_id ."&btnDelete=1&chkstatus=".$row->actl_id;?>" data-original-title="Delete Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-minus-circle"></i></a></div>
                                                    <div style="float:center;" class="tooltips"><a href="<?php print($_SERVER['PHP_SELF'] . "?action=2&actl_id=" . $row->actl_id);?>" data-original-title="Update Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-edit"></i></a></div>
                                                <?php } else { ?>
                                                    <div style="float:center;"><a href="<?php print($_SERVER['PHP_SELF'] . "?action=1&asch_id=" . $row->asch_id);?>" title="Add New"><i class="fa fa-plus"></i> Add Log </a></div>
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
                        <?php if ($counter > 0) { ?>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td><?php print("Page <b>" . $_GET['page'] . "</b> of " . $pages); ?></td>
                                    <td align="right">
                                    <?php
                                        $param = '&start_date_page='.$date2;
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

