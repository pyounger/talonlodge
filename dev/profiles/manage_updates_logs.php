<?php include('includes/php_includes_top.php'); ?>
<?php
if ((isset($_REQUEST['limit_of_rec'])) && ($_REQUEST['limit_of_rec'] != '')) {
    $_SESSION['limit_of_rec'] = $_REQUEST['limit_of_rec'];
} else if (isset($_SESSION['limit_of_rec'])) {
    //$_SESSION['group_name'] = $_SESSION['group_name'];
} else {
    $_SESSION['limit_of_rec'] = '200';
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
        <h3 class="page-header"> Manage Profile Logs <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b> Manage Profile Logs </b> You can  Manage Profile Logs here </p>
        </blockquote>
    </div>
</div>
<?php if (isset($_REQUEST['action'])) { ?>
<?php } elseif (isset($_REQUEST['show'])) { ?>
<?php } else { ?>
    <?php
        if(isset($_REQUEST['start_date'])){
            $date1 = $_REQUEST['start_date'];
            $date2 = calendarDateConver4($_REQUEST['start_date']);
        } else if(isset($_REQUEST['start_date_page'])){
            $date1 = calendarDateConver2($_REQUEST['start_date_page']);
            $date2 = $_REQUEST['start_date_page'];
        } else {
            $date1 = calendarDateConver2($_SESSION['config_date1']);
            $date2 = $_SESSION['config_date1'];
        }
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-cascade">
                <div class="panel-heading text-primary">
                    <h3 class="panel-title"><i class="fa fa-check"></i> Profile Logs </h3>
                </div>
                <div class="panel-body ">
                    <div class="ro">
                        <div class="col-mol-md-offset-2">
                            <form class="form-horizontal cascde-forms" method="post" action="<?php print($_SERVER['PHP_SELF']); ?>" name="frm" id="frm" >
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-3 control-label">Date Filter:</label>
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
                    <h3 class="panel-title"><i class="fa fa-file-text"></i> Profile Logs 
                        <span class="pull-right" style="width:auto;">
                        </span> 
                    </h3>
                </div>
                <div class="panel-body">
                    <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                        <table class="table users-table table-condensed table-hover table-striped display dataTable" id="" >
                            <thead>
                                <tr>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Contact</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Group</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Updated By</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Action</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $strQuery = "";
                                    if((isset($date2)) && ($date2!='')){
                                        $strQuery = " AND (lo.log_datetime >= '".$date2."') ";
                                    }
                                    $Query = "SELECT lo.*, c.cont_id, c.ContactID, c.cont_fname, c.cont_lname, c.cont_email, uc.cont_fname AS ucont_fname, uc.cont_lname AS ucont_lname, uc.cont_email AS ucont_email, g.GroupName  FROM logs AS lo LEFT OUTER JOIN contacts AS c ON lo.cont_id = c.cont_id LEFT OUTER JOIN contacts AS uc ON lo.user_id = uc.ContactID LEFT OUTER JOIN groups AS g ON lo.grp_id = g.grp_id WHERE lo.ContactID = c.ContactID ".$strQuery." ORDER BY lo.log_id ";
                                    $counter = 0;
                                    $limit = $_SESSION['limit_of_rec'];
                                    $start = $p->findStart($limit);
                                    $count = mysql_num_rows(mysql_query($Query));
                                    $pages = $p->findPages($count, $limit);
                                    $rs = mysql_query($Query . " LIMIT " . $start . ", " . $limit);
                                    if (mysql_num_rows($rs) > 0) {
                                        while ($row = mysql_fetch_object($rs)) {
                                            $cont_id = returnName("cont_id", "contacts", "ContactID", $row->user_id);
                                            $counter++;
                                ?>
                                        <tr>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php echo $row->cont_fname.' '.$row->cont_lname.' ('.$row->cont_email.')';?>
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php echo $row->GroupName;?>
                                            </td>
<!--

<a href="manage_profile.php?show=1&cont_id=<?php print($row->cont_id);?>&contactid=<?php print($row->ContactID);?>" target="_blank"><?php print($row->cont_fname.' '.$row->cont_lname);?></a>

<a href="manage_profile.php?show=1&cont_id=<?php print($cont_id);?>&contactid=<?php print($row->user_id);?>" target="_blank"><?php echo $row->ucont_fname.' '.$row->ucont_lname;?></a>

-->
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php 
                                                    if($cont_id==0){
                                                        echo 'Admin';
                                                    }
                                                    else {
                                                        echo $row->ucont_fname.' '.$row->ucont_lname.' ('.$row->ucont_email.')';
                                                    }
                                                ?>
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php 
                                                    if($row->log_type==0){
                                                        echo 'Updated';
                                                    }
                                                    else {
                                                        echo 'Added';
                                                    }
                                                ?>
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->log_datetime);?></td>
                                        </tr>
            <?php
        }
    }
    else {
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

