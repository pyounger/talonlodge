<?php
include ('includes/php_includes_top.php');
?>
<?php
if (isset($_REQUEST['action'])) {
    if (isset($_REQUEST['btnAdd'])) {
        $actid = getMaximum("act_boats", "act_boat_id");
        mysql_query("INSERT INTO act_boats(act_boat_id, act_boat_name, actboca_id, actbodh_id) VALUES(" . $actid . ", '" . dbStr($_REQUEST['act_boat_name']) . "', '" . dbStr($_REQUEST['actboca_id']) . "', '" . dbStr($_REQUEST['actbodh_id']) . "')") or die(mysql_error());
        header("Location: " . $_SERVER['PHP_SELF'] . "?op=1");
    } elseif (isset($_REQUEST['btnUpdate'])) {
        $udtQuery = "UPDATE act_boats SET act_boat_name='" . dbStr($_REQUEST['act_boat_name']) . "', actboca_id='" . dbStr($_REQUEST['actboca_id']) . "', actbodh_id='" . dbStr($_REQUEST['actbodh_id']) . "' WHERE act_boat_id=" . $_REQUEST['act_boat_id'];
        mysql_query($udtQuery) or die(mysql_error());
        header("Location: " . $_SERVER['PHP_SELF'] . "?op=2");
    } elseif ($_REQUEST['action'] == 2) {
        $rsM = mysql_query("SELECT * FROM act_boats WHERE act_boat_id=" . $_REQUEST['act_boat_id']);
        if (mysql_num_rows($rsM) > 0) {
            $rsMem = mysql_fetch_object($rsM);
            $act_boat_id = $rsMem->act_boat_id;
            $act_boat_name = $rsMem->act_boat_name;
            $actboca_id = $rsMem->actboca_id;
            $actbodh_id = $rsMem->actbodh_id;
            $formHead = "Update Info";
        }
    } else {
        $act_boat_id = "";
        $act_boat_name = "";
        $actboca_id = "";
        $actbodh_id = "";
        $formHead = "Add New";
    }
}
if (isset($_REQUEST['show'])) {
    $rsM = mysql_query("SELECT ab.*, ac.actboca_name, ad.actbodh_name FROM act_boats AS ab LEFT OUTER JOIN act_boat_captain AS ac ON ab.actboca_id=ac.actboca_id LEFT OUTER JOIN act_boat_deckhand AS ad ON ab.actbodh_id=ad.actbodh_id WHERE ab.act_boat_id=" . $_REQUEST['act_boat_id']);
    if (mysql_num_rows($rsM) > 0) {
        $rsMem = mysql_fetch_object($rsM);
        $act_boat_id = $rsMem->act_boat_id;
        $act_boat_name = $rsMem->act_boat_name;
        $actboca_name = $rsMem->actboca_name;
        $actbodh_name = $rsMem->actbodh_name;
        $formHead = "Update Info";
    }
}
if (isset($_REQUEST['btnDelete'])) {
    @mysql_query("DELETE FROM act_boats  WHERE act_boat_id=" . $_REQUEST['act_boat_id']) or die(mysql_query());
    header("Location: " . $_SERVER['PHP_SELF'] . "?op=3");

    //    if(isset($_REQUEST['chkstatus'])){
    //        for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
    //            mysql_query("DELETE FROM act_boats  WHERE act_boat_id=".$_REQUEST['chkstatus'][$i]) or die(mysql_query());
    //        }
    //        $class = "alert alert-info";
    //        $strMSG = "Deleted Successfully";
    //    } else {
    //         $class = " alert alert-danger ";
    //        $strMSG = "Please check atleast one checkbox";
    //    }
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
        <h3 class="page-header"> Manage Boats <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b>Manage Boats: </b> You can manage Boats here </p>
        </blockquote>
    </div>
</div>

<?php if (isset($_REQUEST['action'])) {
    ?>

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
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Boat Name</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Boat Name..." value="<?php print($act_boat_name); ?>" id="act_boat_name" name="act_boat_name">
                            </div>
                        </div>
                        <div class="form-group" id="set_guides">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Boat Captain</label>
                            <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Boat Captain..." name="actboca_id" id="atht_id" class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2">
                                    <?php echo FillSelected("act_boat_captain", "actboca_id", "actboca_name", $actboca_id); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="set_guides">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Boat Duckhand</label>
                            <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Boat Duckhand..." name="actbodh_id" id="atht_id" class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2">
                                    <?php echo FillSelected("act_boat_deckhand", "actbodh_id", "actbodh_name", $actbodh_id); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                            <div class="col-lg-10 col-md-9">
                                <?php if ($_REQUEST['action'] == 1) {
                                    ?>
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
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Boat Name</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php print($act_boat_name); ?></div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Boat Captain</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php print($actboca_name); ?></div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Boat Duckhand</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php print($actbodh_name); ?></div>
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
    <div class="row">
        <div class="col-md-12">
            <div class="<?php print($class); ?>"><?php print($strMSG); ?></div>
            <div class="panel">
                <div class="panel-heading text-primary">
                    <h3 class="panel-title"><i class="fa fa-flag-checkered"></i> Boats
                        <span class="pull-right" style="width:auto;">
                            <div style="float:right;"><a href="<?php print($_SERVER['PHP_SELF'] . "?action=1"); ?>" title="Add New"><i class="fa fa-plus"></i> Add New</a></div>
                        </span>
                    </h3>
                </div>
                <div class="panel-body">
                    <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                        <table class="table users-table table-condensed table-hover table-striped display dataTable" id="example" >
                            <thead>
                                <tr>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Boat Name</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Captain</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Deckhand</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
//$Query = "SELECT * FROM act_boats";
                                $Query = " SELECT ab.*, ac.actboca_name, ad.actbodh_name FROM act_boats AS ab LEFT OUTER JOIN act_boat_captain AS ac ON ab.actboca_id=ac.actboca_id LEFT OUTER JOIN act_boat_deckhand AS ad ON ab.actbodh_id=ad.actbodh_id ";

                                $counter = 0;
                                $limit = 25;
                                $start = $p->findStart($limit);
                                $count = mysql_num_rows(mysql_query($Query));
                                $pages = $p->findPages($count, $limit);
                                $rs = mysql_query($Query . " LIMIT " . $start . ", " . $limit);
                                if (mysql_num_rows($rs) > 0) {
                                    while ($row = mysql_fetch_object($rs)) {
                                        $counter++;
                                        ?>
                                        <tr>
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->act_boat_name); ?>
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->actboca_name); ?>
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->actbodh_name); ?>
                                            </td>
                                            <td style="width:135px">
                                                <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF'] . "?btnDelete=1&act_boat_id=" . $row->act_boat_id); ?>" data-original-title="Delete Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-minus-circle"></i></a></div>
                                                <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF'] . "?show=1&act_boat_id=" . $row->act_boat_id); ?>" data-original-title="See Details" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-eye"></i></a></div>
                                                <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF'] . "?action=2&act_boat_id=" . $row->act_boat_id); ?>" data-original-title="Update Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-edit"></i></a></div>
                                        </tr>
                                        <?php
                                    }
                                } else {
//print('<tr><td colspan="100%" align="center">No record found!</td></tr>');
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php if ($counter > 0) {
                            ?>
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
<?php } ?>

</div>
<?php
include ("includes/rightsidebar.php");
?>
</div> </div> </div>
<?php
include ("includes/footer.php");
?>