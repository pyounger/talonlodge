<?php include('includes/php_includes_top.php'); ?>
<?php
if (isset($_REQUEST['action'])) {
    if (isset($_REQUEST['btnAdd'])) {
        $romrid = getMaximum("room_reservation", "roomr_id");
        //$staName = returnName("status_name", "status", "status_id", $_REQUEST['status_id']);
        mysql_query("INSERT INTO room_reservation(roomr_id, room_id,contact_id,roomr_startdate,roomr_enddate) VALUES(" . $romrid . ",'" . $_REQUEST['room_id'] . "',
		'" . $_REQUEST['contact_id'] . "','" . $_REQUEST['roomr_startdate'] . "','" . $_REQUEST['roomr_enddate'] . "')") or die(mysql_error());
        header("Location: " . $_SERVER['PHP_SELF'] . "?op=1");
    } elseif (isset($_REQUEST['btnUpdate'])) {
        //$staName = returnName("status_name", "status", "status_id", $_REQUEST['status_id']);

        $udtQuery = "UPDATE room_reservation SET room_id='" . $_REQUEST['room_id'] . "',contact_id='" . $_REQUEST['contact_id'] . "',
		roomr_startdate='" . $_REQUEST['roomr_startdate'] . "', roomr_enddate='" . $_REQUEST['roomr_enddate'] . "' WHERE roomr_id=" . $_REQUEST['roomr_id'];
        mysql_query($udtQuery) or die(mysql_error());
        header("Location: " . $_SERVER['PHP_SELF'] . "?op=2");
    } elseif ($_REQUEST['action'] == 2) {
        $rsM = mysql_query("SELECT * FROM room_reservation WHERE roomr_id=" . $_REQUEST['roomr_id']);
        if (mysql_num_rows($rsM) > 0) {
            $rsMem = mysql_fetch_object($rsM);
            $roomr_id = $rsMem->roomr_id;
            $room_id = $rsMem->room_id;
            $contact_id = $rsMem->contact_id;
            $roomr_startdate = $rsMem->roomr_startdate;
            $roomr_enddate = $rsMem->roomr_enddate;
            //$site_del = $rsMem->site_del;
            $formHead = "Update Info";
        }
    } else {
        $roomr_id = "";
        $room_id = "";
        $contact_id = "";
        $roomr_startdate = "";
        $roomr_enddate = "";
        //$status_id = 0;
        $formHead = "Add New";
    }
}
if (isset($_REQUEST['show'])) {
    $rsM = mysql_query("SELECT rm.*,r.room_title,c.cont_fname FROM room_reservation As rm Left Outer join rooms As r on r.room_id=rm.room_id Left Outer join contacts As c on c.cont_id=rm.contact_id WHERE rm.roomr_id=" . $_REQUEST['roomr_id']);
    if (mysql_num_rows($rsM) > 0) {
        $rsMem = mysql_fetch_object($rsM);
        $roomr_id = $rsMem->roomr_id;
        $room_id = $rsMem->room_id;
        $room_title = $rsMem->room_title;
        $cont_id = $rsMem->contact_id;
        $cont_fname = $rsMem->cont_fname;
        $roomr_startdate = $rsMem->roomr_startdate;
        $roomr_enddate = $rsMem->roomr_enddate;

        //$status_id = $rsMem->status_id;
        //$site_del = $rsMem->site_del;
        $formHead = "Update Info";
    }
}

if (isset($_REQUEST['btnDelete'])) {
    @mysql_query("DELETE FROM room_reservation  WHERE roomr_id=" . $_REQUEST['chkstatus']) or die(mysql_query());
    header("Location: " . $_SERVER['PHP_SELF'] . "?op=3");

//    if (isset($_REQUEST['chkstatus'])) {
//		for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
//			mysql_query("DELETE FROM room_reservation  WHERE roomr_id=".$_REQUEST['chkstatus'][$i]) or die(mysql_query());
//		}
//        $class = "alert alert-info";
//        $strMSG = "Record(s) updated successfully";
//    } else {
//        $class = " alert alert-danger ";
//        $strMSG = "Please check atleast one checkbox";
//    }
}
?>



<?php include('includes/html_header.php'); ?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
        </ul>
        <div class="form-group hiddn-minibar pull-right">
            <!--<input type="text" class="form-control form-cascade-control nav-input-search" size="20" placeholder="Search through site" />
            <span class="input-icon fui-search"></span>-->
        </div>
        <h3 class="page-header"> Manage Rooms Reservation <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b> Manage Rooms Reservation: </b> You can manage your room reservation here </p>
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
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Rooms</label>
                            <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Country..." name="room_id" id="room_id" class="chosen-select" style="width:350px; z-index: 9999 !important;" tabindex="2">
                                    <option value=""></option>
    <?php FillSelected("rooms", "room_id", "room_title", $room_id); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Contact First Name</label>
                            <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Country..." name="contact_id" id="contact_id" class="chosen-select" style="width:350px; z-index: 9999 !important;" tabindex="2">
                                    <option value=""></option>
    <?php FillSelected("contacts", "cont_id", "cont_fname",
            $contact_id); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Start Date</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 required datetimepicker" placeholder="Activites Details.." 
                                       id="roomr_startdate" name="roomr_startdate" value="<?php print($roomr_startdate); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">End Date</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 required datetimepicker" placeholder="Activites Details.." 
                                       id="roomr_enddate" name="roomr_enddate" value="<?php print($roomr_enddate); ?>">
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
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Room Name</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <!--<select disabled data-placeholder="Choose a Country..." name="room_id" id="room_id" class="chosen-select required" style="width:350px;" tabindex="2">-->
                                <!--<option value=""></option>-->
    <?php print($room_title); //FillSelected("rooms", "room_id", "room_title", $room_id);  ?>
                                <!--</select>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Contact First Name</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <!--<select disabled data-placeholder="Choose a Country..." name="contact_id" id="contact_id" class="chosen-select required" style="width:350px;" tabindex="2">-->
                                <!--<option value=""></option>-->
    <?php print($cont_fname); //FillSelected("contacts", "cont_id", "cont_fname", $contact_id);  ?>
                                <!--</select>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Reservation Start Date</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($roomr_startdate); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="Activites Details.." id="roomr_startdate" name="roomr_startdate" value="<?php //print($roomr_startdate);  ?>" readonly>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Reservationi End Date</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($roomr_enddate); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Activites Details.." id="roomr_enddate" name="roomr_enddate" value="<?php //print($roomr_enddate);  ?>" readonly>-->
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
    <div class="row">
        <div class="col-md-12">
            <div class="<?php print($class); ?>"><?php print($strMSG); ?></div>
            <div class="panel">
                <div class="panel-heading text-primary">
                    <h3 class="panel-title"><i class="fa fa-windows"></i> Room Reservation
                        <span class="pull-right" style="width:auto;">
                        <!--<div class="btn-group code"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Classes used"><i class="fa fa-code"></i></a>
                                <ul class="dropdown-menu pull-right list-group" role="menu">
                                        <li class="list-group-item"><code>.table-condensed</code></li>
                                        <li class="list-group-item"><code>.table-hover</code></li>
                                </ul>
                        </div>
                        <a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a> <a  href="#"  class="panel-close"><i class="fa fa-times"></i></a> -->
                                <!--<div style="float:right;"><a href="<?php print($_SERVER['PHP_SELF'] . "?action=1"); ?>" title="Add New"><i class="fa fa-plus"></i> Add New</a></div>-->
                        </span> 
                    </h3>
                </div>
                <div class="panel-body">
                    <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                        <table class="table users-table table-condensed table-hover table-striped display dataTable" id="example" >
                            <thead>
                                <tr>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Contact Name</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Start Date</th>
                                    <th class="visible-sm visible-md visible-lg">End Date</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
    if ($_SESSION['user_id'] > 0) {
        $Query = "SELECT s.*, st.cont_fname FROM room_reservation as s LEFT OUTER JOIN contacts AS st ON st.cont_id=s.cont_id  WHERE s.contact_id=" . $_SESSION["contact_id"] . "";
    } else {
        $Query = "SELECT s.*, st.cont_fname FROM room_reservation  as s LEFT OUTER JOIN contacts as st ON st.cont_id=s.contact_id";
    }
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
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->cont_fname); ?> </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->roomr_startdate); ?> </td>
                                            <td class="visible-sm visible-md visible-lg"><?php print($row->roomr_enddate); ?> </td>
                                            <td style="width:100px">
                                                <div class="tooltips"><a href="manage_rooms_reservation.php?roomr_id=<?php print($row->roomr_id); ?>&btnDelete=1&chkstatus=<?php print($row->roomr_id); ?>" data-original-title="Delete Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-minus-circle"></i></a></div>
                                                <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF'] . "?show=1&roomr_id=" . $row->roomr_id); ?>" data-original-title="See Details" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-eye"></i></a></div>
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
                            $next_prev = $p->nextPrev($_GET['page'], $pages, '');
                            print($next_prev);
                            ?>
                                    </td>
                                </tr>
                            </table>
                                    <?php } ?>
                                    <?php if ($counter > 0) { ?>
        <!--<input type="submit" name="btnActive" value="Active" class="btn btn-primary btn-animate-demo">
        <input type="submit" name="btnInactive" value="In Active" class="btn btn-danger btn-animate-demo">-->
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



