<?php include('includes/php_includes_top.php'); ?>
<?php
if (isset($_REQUEST['user_id'])) {
    $_SESSION['user_id'] = $_REQUEST['user_id'];
} else {
    if (!isset($_SESSION['user_id'])) {
        $_SESSION['user_id'] = 0;
    }
}
if (isset($_REQUEST['action'])) {
    if (isset($_REQUEST['btnAdd'])) {
	$chk = chkExist("user_id", "users", " WHERE user_name='".$_REQUEST['user_name']."'");
	if($chk>=1){
            header("Location: ".$page_name."?op=4");
	} else {
            $custid = getMaximum("customers", "cust_id");
            mysql_query("INSERT INTO customers(cust_id, cust_name,cust_code,cust_display_name,createdDate) VALUES(" . $custid . ",'" . $_REQUEST['cust_name'] . "', '" . $_REQUEST['cust_code'] . "','" . $_REQUEST['cust_display_name'] . "' ,NOW())");

            $userid = getMaximum("users", "user_id");
			$contid = getMaximum("contacts", "cont_id");
            mysql_query("INSERT INTO users(user_id, user_name, user_pass, user_display_name, utype_id, cust_id, cont_id, createdDate) VALUES(" . $userid . ",'" . $_REQUEST['user_name'] . "', '" . md5($_REQUEST['user_pass']) . "','" . $_REQUEST['cust_display_name'] . "', '2','".$custid."', '".$contid."',NOW())");
            
            mysql_query("INSERT INTO contacts(cont_id, cont_email, cust_id, ctype_id, createdDate) VALUES(" . $contid. ",'" . $_REQUEST['user_name'] . "', ".$custid.", '2', NOW())");

            $conpid = getMaximum("contact_profiles", "conp_id");
            mysql_query("INSERT INTO contact_profiles(conp_id, cont_id, createdDate) VALUES(".$conpid.",  ". $contid. ", NOW())");

            emailToCustomer($_REQUEST['user_name'],  $_REQUEST['user_pass'], $_REQUEST['cust_display_name']);
            header("Location: " . $_SERVER['PHP_SELF'] . "?op=1");
        }
    } elseif (isset($_REQUEST['btnUpdate'])) {
        $udtQuery = "UPDATE customers SET cust_name='" . $_REQUEST['cust_name'] . "', cust_code='" . $_REQUEST['cust_code'] . "',cust_display_name='" . $_REQUEST['cust_display_name'] . "', lastUpdated=NOW() WHERE cust_id=" . $_REQUEST['cust_id'];
        mysql_query($udtQuery) or die(mysql_error());

        $udtQuery1 = "UPDATE users SET user_name='" . $_REQUEST['user_name'] . "', user_pass='" . md5($_REQUEST['user_pass']) . "',user_display_name='" . $_REQUEST['cust_display_name'] . "' ,lastUpdated=NOW() WHERE cust_id=" . $_REQUEST['cust_id'];
        mysql_query($udtQuery1) or die(mysql_error());
        
        header("Location: " . $_SERVER['PHP_SELF'] . "?op=2");
    } elseif ($_REQUEST['action'] == 2) {
        $rsM = mysql_query("SELECT * FROM customers WHERE cust_id=" . $_REQUEST['cust_id']);
        if (mysql_num_rows($rsM) > 0) {
            $rsMem = mysql_fetch_object($rsM);
            $cust_id = $rsMem->cust_id;
            $cust_name = $rsMem->cust_name;
            $cust_code = $rsMem->cust_code;
            $cust_display_name = $rsMem->cust_display_name;
            $status_id = $rsMem->status_id;
            $lastUpdated = $rsMem->lastUpdated;
            $formHead = "Update Info";
        }
    } else {
        $cust_id = "";
        $cust_name = "";
        $cust_code = "";
        $cust_display_name = "";
        $status_id = 1;
        $lastUpdated = "";
        $formHead = "Add New";
    }
}
if (isset($_REQUEST['show'])) {
    $rsM = mysql_query("SELECT m.*, s.status_name FROM customers AS m LEFT OUTER JOIN status AS s ON s.status_id=m.status_id WHERE m.cust_id=" . $_REQUEST['cust_id']);
    if (mysql_num_rows($rsM) > 0) {
        $rsMem = mysql_fetch_object($rsM);
        $act_id = $rsMem->cust_id;
        $cust_name = $rsMem->cust_name;
        $cust_code = $rsMem->cust_code;
        $cust_display_name = $rsMem->cust_display_name;
        $status_id = $rsMem->status_id;
        $createdDate = $rsMem->createdDate;
        $lastUpdated = $rsMem->lastUpdated;
        $status_name = $rsMem->status_name;

        //$status_id = $rsMem->status_id;
        //$site_del = $rsMem->site_del;
        $formHead = "Update Info";
    }
}

if (isset($_REQUEST['btnActive'])) {
    if (isset($_REQUEST['chkstatus'])) {
        for ($i = 0; $i < count($_REQUEST['chkstatus']); $i++) {
            mysql_query("UPDATE customers SET status_id = 1 WHERE cust_id = " . $_REQUEST['chkstatus'][$i]);
        }
        $class = "alert alert-info";
        $strMSG = "Record(s) updated successfully";
    } else {
        $class = " alert alert-danger ";
        $strMSG = "Please check atleast one checkbox";
    }
}

if (isset($_REQUEST['btnInactive'])) {
    if (isset($_REQUEST['chkstatus'])) {
        for ($i = 0; $i < count($_REQUEST['chkstatus']); $i++) {
            mysql_query("UPDATE customers SET status_id = 0 WHERE cust_id = " . $_REQUEST['chkstatus'][$i]);
        }
        $class = "alert alert-info";
        $strMSG = "Record(s) updated successfully";
    } else {
        $class = " alert alert-danger ";
        $strMSG = "Please check atleast one checkbox";
    }
}

if (isset($_REQUEST['btnDelete'])) {
    if (isset($_REQUEST['chkstatus'])) {
        for ($i = 0; $i < count($_REQUEST['chkstatus']); $i++) {
            $cont_id = returnName("cont_id", "users", "cust_id", $_REQUEST['chkstatus'][$i]);
            @mysql_query("DELETE FROM groups  WHERE cont_id=" . $_REQUEST['chkstatus'][$i]);
            @mysql_query("DELETE FROM contact_profiles  WHERE cont_id=" . $_REQUEST['chkstatus'][$i]);
            @mysql_query("DELETE FROM users  WHERE cust_id=" . $_REQUEST['chkstatus'][$i]);
            @mysql_query("DELETE FROM customers  WHERE cust_id=" . $_REQUEST['chkstatus'][$i]);
            @mysql_query("DELETE FROM contacts WHERE cust_id=" . $_REQUEST['chkstatus'][$i]);

            $class = "alert alert-info";
            $strMSG = "Deleted Successfully";
        }
    } else {
         $class = " alert alert-danger ";
        $strMSG = "Please check atleast one checkbox";
    }
}
?>


<?php include('includes/html_header.php'); ?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
        </ul>
        <!--<div class="form-group hiddn-minibar pull-right">
            <input type="text" class="form-control form-cascade-control nav-input-search" size="20" placeholder="Search through site" />
            <span class="input-icon fui-search"></span>
        </div>-->
        <h3 class="page-header"> Manage Customers <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b>Manage Customers: </b> Here you can manage customer profiles </p>
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
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Customer Name</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Customer name..." value="<?php print($cust_name); ?>" id="act_name" name="cust_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Customer Code</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Customer code.." value="<?php print($cust_code); ?>" id="act_det" name="cust_code">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Display name</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Dispaly Name.." value="<?php print($cust_display_name); ?>" id="cust_display_name" name="cust_display_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Login Email</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Login Email.." value="" id="user_name" name="user_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Login Password</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="password" class="form-control form-cascade-control input_wid70 required" placeholder="Login Password.." value="" id="user_pass" name="user_pass">
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
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Customers Name</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <?php print($cust_name); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Customer name..." value="<?php //print($cust_name); ?>" id="act_name" name="cust_name" readonly>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Customer code</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <?php print($cust_code); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Customer code.." value="<?php //print($cust_code); ?>" id="act_det" name="cust_code" readonly>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">display name</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <?php print($cust_display_name); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Dispaly Name.." value="<?php //print($cust_display_name); ?>" id="act_det" name="cust_display_name" readonly>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Status</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <?php print ($status_name); ?>
                                <!--<input type="text" value="<?php //print ($status_name); ?>" name="status_id" readonly>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Created Date </label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <?php print ($createdDate); ?>
                                <!--<input type="text" value="<?php //print ($status_name); ?>" name="status_id" readonly>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Last Updated </label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <?php print ($lastUpdated); ?>
                                <!--<input type="text" value="<?php //print ($status_name); ?>" name="status_id" readonly>-->
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
                    <h3 class="panel-title"><i class="fa fa-sitemap"></i> Customers Management
                        <span class="pull-right" style="width:auto;">
                        <!--<div class="btn-group code"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Classes used"><i class="fa fa-code"></i></a>
                                <ul class="dropdown-menu pull-right list-group" role="menu">
                                        <li class="list-group-item"><code>.table-condensed</code></li>
                                        <li class="list-group-item"><code>.table-hover</code></li>
                                </ul>
                        </div>
                        <a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a> <a  href="#"  class="panel-close"><i class="fa fa-times"></i></a> -->
                            <div style="float:right;"><a href="<?php print($_SERVER['PHP_SELF'] . "?action=1"); ?>" title="Add New"><i class="fa fa-plus"></i> Add New</a></div>
                        </span> 
                    </h3>
                </div>
                <div class="panel-body">
                    <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                        <table class="table users-table table-condensed table-hover table-striped" >
                            <thead>
                                <tr>
                                    <th class="visible-lg"><input type="checkbox" name="chkAll" onClick="setAll();"></th>
                                    <th class="visible-lg">Customer Name</th>
                                    <th class="visible-lg">Customer Code</th>
                                    <th class="visible-lg">Display Name</th>
                                    <th class="visible-lg">Status</th>
                                    <th class="visible-lg">Created Date</th>
                                    <th class="visible-lg">Last Update</th>
                                    <th width="140">Action</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
    if ($_SESSION['user_id'] > 0) {
        $Query = "SELECT s.*, st.status_name FROM customers as s LEFT OUTER JOIN status AS st ON st.status_id=s.status_id  WHERE s.user_id=" . $_SESSION['user_id'] . "";
        //$Query="SELECT s.*, st.status_name,  FROM activities as s LEFT OUTER JOIN status st ON st.status_id=s.status_id  WHERE s.user_id='".$_SESSION['user_id']."'";
    } else {
        $Query = "SELECT s.*, st.status_name FROM customers as s LEFT OUTER JOIN status as st ON st.status_id=s.status_id";
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
                                            <td class="visible-lg"><input type="checkbox" name="chkstatus[]" value="<?php print($row->cust_id); ?>" /></td>
                                            <td class="visible-lg"><?php print($row->cust_name); ?> </td>
                                            <td class="visible-lg"><?php print($row->cust_code); ?></td>
                                            <td class="visible-lg"><?php print($row->cust_display_name); ?> </td>
                                            <td class="visible-lg"><?php print($row->status_name); ?> </td>
                                            <td class="visible-lg"><?php print($row->createdDate); ?> </td>
                                            <td class="visible-lg"><?php print($row->lastUpdated); ?> </td>
                                                                                                                            <td><!--<button type="button" class="btn btn-success"><i class="fa fa-envelope"></i></button>-->

                                                <button type="submit" class="btn btn-success" onclick="javascript: window.location = 'manage_customers.php?&cust_id=<?php print($row->cust_id); ?>';" name="btnDelete"><i class="fa fa-sitemap"></i></button>


                                                <button type="button" class="btn btn-info" onclick="javascript: window.location = '<?php print($_SERVER['PHP_SELF'] . "?show=1&cust_id=" . $row->cust_id); ?>';"><i class="fa fa-eye"></i></button>
                                                <button type="button" class="btn btn-warning" onclick="javascript: window.location = '<?php print($_SERVER['PHP_SELF'] . "?action=2&cust_id=" . $row->cust_id); ?>';"><i class="fa fa-edit"></i></button></td>
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
        $next_prev = $p->nextPrev($_GET['page'], $pages, '');
        print($next_prev);
        ?>
                                    </td>
                                </tr>
                            </table>
                                    <?php } ?>
                                    <?php if ($counter > 0) { ?>
                            <input type="submit" name="btnActive" value="Active" class="btn btn-primary btn-animate-demo">
                            <input type="submit" name="btnInactive" value="In Active" class="btn btn-danger btn-animate-demo">
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


