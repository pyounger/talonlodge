<?php include('includes/php_includes_top.php'); ?>
<?php
if((isset($_REQUEST['limit_of_rec']))&&($_REQUEST['limit_of_rec']!='')){
    $_SESSION['limit_of_rec'] = $_REQUEST['limit_of_rec'];
} else if(isset($_SESSION['limit_of_rec'])){
    //$_SESSION['group_name'] = $_SESSION['group_name'];
} else {
    $_SESSION['limit_of_rec'] = '200';
}

if((isset($_REQUEST['search_name']))&&($_REQUEST['search_name']!='')){
    $_SESSION['search_name'] = $_REQUEST['search_name'];
} else if(isset($_SESSION['search_name'])){
    //$_SESSION['group_name'] = $_SESSION['group_name'];
} else {
    $_SESSION['search_name'] = '';
}


if (isset($_REQUEST['action'])) {
    if (isset($_REQUEST['btnAdd'])) {
        $actid = getMaximum("flight_info", "flight_id");
        mysql_query("INSERT INTO flight_info(flight_id, flight_name) VALUES(" . $actid . ",'" . dbStr($_REQUEST['flight_name']) . "')") or die(mysql_error());
        header("Location: " . $_SERVER['PHP_SELF'] . "?op=1");
    } elseif (isset($_REQUEST['btnUpdate'])) {
        $udtQuery = "UPDATE users SET user_name ='" . dbStr($_REQUEST['user_name']) . "', user_pass ='" . dbStr(md5($_REQUEST['user_pass'])) . "', user_display_name ='" . dbStr($_REQUEST['user_display_name']) . "', user_pasphrase ='" . dbStr($_REQUEST['user_pass']) . "', lastUpdated=NOW() WHERE cont_id=" . $_REQUEST['cont_id'];
        mysql_query($udtQuery);

        $udtQuery = "UPDATE contacts SET cont_email ='" . dbStr($_REQUEST['user_name']) . "', Email ='" . dbStr($_REQUEST['user_name']) . "', LastUpdated=NOW() WHERE ContactID=" . $_REQUEST['cont_id'];
        mysql_query($udtQuery);

        profile_change_email(dbStr($_REQUEST['user_name']), dbStr($_REQUEST['user_display_name']), dbStr($_REQUEST['user_pass']), dbStr($_REQUEST['cont_id']));
        
        header("Location: " . $_SERVER['PHP_SELF'] . "?op=2");
    } elseif ($_REQUEST['action'] == 2) {
        $rsMem = mysql_query("SELECT u.*, c.ContactFirstName, c.ContactLastName FROM users AS u LEFT OUTER JOIN contacts AS c ON u.cont_id=c.ContactID WHERE c.ContactID=".$_REQUEST['cont_id']."");
        if (mysql_num_rows($rsMem) > 0) {
            $rsM = mysql_fetch_object($rsMem);
            $user_id = $rsM->user_id;
            $user_name = $rsM->user_name;
            $user_pasphrase = $rsM->user_pasphrase;
            $user_display_name = $rsM->user_display_name;
            $createdDate = $rsM->createdDate;
            $lastUpdated = $rsM->lastUpdated;
            $ContactFirstName = $rsM->ContactFirstName;
            $ContactLastName = $rsM->ContactLastName;
            $formHead = "Update Info";
        } else {
            $user_id = '';
            $user_name = '';
            $user_pasphrase = '';
            $user_display_name = '';
            $createdDate = '';
            $lastUpdated = '';
            $ContactFirstName = '';
            $ContactLastName = '';
        }
    } else {
        $user_id = '';
        $user_name = '';
        $user_pasphrase = '';
        $user_display_name = '';
        $createdDate = '';
        $lastUpdated = '';
        $ContactFirstName = '';
        $ContactLastName = '';
        $formHead = "Add New";
    }
}
if (isset($_REQUEST['show'])) {
    $rsM = mysql_query("SELECT u.*, c.ContactFirstName, c.ContactLastName FROM users AS u LEFT OUTER JOIN contacts AS c ON u.cont_id=c.ContactID WHERE c.ContactID=".$_REQUEST['cont_id']." ");
    if (mysql_num_rows($rsM) > 0) {
        $rsMem = mysql_fetch_object($rsM);
        $user_id = $rsMem->user_id;
        $user_name = $rsMem->user_name;
        $user_pasphrase = $rsMem->user_pasphrase;
        $user_display_name = $rsMem->user_display_name;
        $createdDate = $rsMem->createdDate;
        $lastUpdated = $rsMem->lastUpdated;
        $ContactFirstName = $rsMem->ContactFirstName;
        $ContactLastName = $rsMem->ContactLastName;
        $formHead = "Details";
    } else {
        $user_id = '';
        $user_name = '';
        $user_pasphrase = '';
        $user_display_name = '';
        $createdDate = '';
        $lastUpdated = '';
        $ContactFirstName = '';
        $ContactLastName = '';
    }
}
if (isset($_REQUEST['btnDelete'])) {
    @mysql_query("DELETE FROM users  WHERE cont_id=" . $_REQUEST['chkstatus']) or die(mysql_query());
    header("Location: " . $_SERVER['PHP_SELF'] . "?op=3");

//    if (isset($_REQUEST['chkstatus'])) {
//        for ($i = 0; $i < count($_REQUEST['chkstatus']); $i++) {
//            
//        }
//        $class = "alert alert-info";
//        $strMSG = "Deleted Successfully";
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
        </div>
        <h3 class="page-header"> Manage Contacts <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="">
            <strong>NOTE:</strong>
            <p> Change in the Email will change the email in the Contact's table as well </p>
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
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">User Display Name</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="User Display Name..." value="<?php echo (($_REQUEST['cont_id']!=0)?$user_display_name:$_SESSION['user_display_name']);?>" id="user_display_name" name="user_display_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Email</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Email..." value="<?php echo (($_REQUEST['cont_id']!=0)?$user_name:$_SESSION['UserName']);?>" id="user_name" name="user_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Password</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Password..." value="<?php echo @$user_pasphrase;?>" id="user_pass" name="user_pass">
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
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Email</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php echo (($_REQUEST['cont_id']!=0)?$user_name:$_SESSION['UserName']);?></div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Password</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php echo @$user_pasphrase;?></div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">User Display Name</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php echo (($_REQUEST['cont_id']!=0)?$user_display_name:$_SESSION['user_display_name']);?></div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Name</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php echo $ContactFirstName.' '.$ContactLastName; ?></div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Created</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php echo $createdDate; ?></div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Updated</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php echo $lastUpdated; ?></div>
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
            <div class="panel panel-cascade">
                <div class="panel-heading text-primary">
                    <h3 class="panel-title"><i class="fa fa-user"></i> Manage Contacts
                        <span class="pull-right" style="width:auto;">
                        </span> 
                    </h3>
                </div>
                <div class="panel-body ">
                    <div class="ro">
                        <div class="col-mol-md-offset-2">
                            <form class="form-horizontal cascde-forms" method="post" action="<?php print($_SERVER['PHP_SELF']); ?>" name="frm" id="frm" >
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-3 control-label">Email or Display Name:</label>
                                    <div class="col-lg-10 col-md-9">
                                        <input type="text" class="form-control form-cascade-control" value="<?php echo $_SESSION['search_name'];?>" id="search_name" name="search_name" style="width: 200px;"  placeholder="Email or Display Name">
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
                <div class="panel-body">
                    <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                        <table class="table users-table table-condensed table-hover table-striped display dataTable" id="" >
                            <thead>
                                <tr>
                                    <th class="visible-xs visible-sm visible-md visible-lg">User Name</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Display Name</th>
                                    <th class="visible-sm visible-md visible-lg">Email</th>
                                    <th class="visible-sm visible-md visible-lg">Password</th>
                                    <th class="visible-sm visible-md visible-lg">Type</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $Query = "
SELECT DISTINCT 
u.*, 
c.ContactFirstName, c.ContactLastName

FROM 
users AS u 
LEFT OUTER JOIN contacts AS c ON u.cont_id = c.ContactID 

WHERE 
u.user_id != '1' AND 
( u.user_name LIKE '%".$_SESSION['search_name']."%' OR u.user_display_name LIKE '%".$_SESSION['search_name']."%' ) 

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
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php echo $row->ContactFirstName.' '.$row->ContactLastName;?> </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php echo $row->user_display_name;?> </td>
                                            <td class="visible-sm visible-md visible-lg"><?php echo $row->user_name;?> </td>
                                            <td class="visible-sm visible-md visible-lg"><?php echo $row->user_pasphrase;?> </td>
                                            <td class="visible-sm visible-md visible-lg"><?php echo (($row->utype_id==2)?'Group Leader':'Guest');?> </td>
                                            <td style="width:135px">
                                                <?php if ($row->cont_id!=0){?><div class="tooltips"><a href="manage_users.php?cont_id=<?php echo $row->cont_id;?>&btnDelete=1&chkstatus=<?php print($row->cont_id);?>" data-original-title="Delete Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-minus-circle"></i></a></div><?php }?>
                                                <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF']."?show=1&cont_id=".$row->cont_id);?>" data-original-title="See Details" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-eye"></i></a></div>
                                                <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF']."?action=2&cont_id=".$row->cont_id);?>" data-original-title="Update Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-edit"></i></a></div>
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
<?php } ?>    



</div>
<?php include("includes/rightsidebar.php"); ?>
</div> </div> </div>
<?php include("includes/footer.php"); ?>

