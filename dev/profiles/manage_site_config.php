<?php include('includes/php_includes_top.php'); ?>
<?php
if ((isset($_REQUEST['limit_of_rec'])) && ($_REQUEST['limit_of_rec'] != '')) {
    $_SESSION['limit_of_rec'] = $_REQUEST['limit_of_rec'];
}
else {
    $_SESSION['limit_of_rec'] = '200';
}
if (isset($_REQUEST['action'])) {
    if (isset($_REQUEST['btnUpdate'])) {
        $udtQuery = "UPDATE site_config SET config_date ='".calendarDateConver($_REQUEST['config_date'])."' WHERE config_id='1' ";
        mysql_query($udtQuery);
        header("Location: " . $_SERVER['PHP_SELF'] . "?op=2");
    } 
	if ($_REQUEST['action'] == 2) {
        $rsMem = mysql_query("SELECT con.* FROM site_config AS con WHERE config_id='1' ");
        if (mysql_num_rows($rsMem) > 0) {
            $rsM = mysql_fetch_object($rsMem);
            $config_id = $rsM->config_id;
            $config_date = $rsM->config_date;
            $formHead = "Update Info";
        }
    }
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
        <h3 class="page-header"> Manage System Configurations <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b> Manage System Configurations </b> You can  Manage System Configurations here </p>
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
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Date</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 required datetimepicker" value="<?php echo calendarDateConver2($config_date);?>" id="config_date" name="config_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                            <div class="col-lg-10 col-md-9">
                                <button type="submit" name="btnUpdate" class="btn btn-primary btn-animate-demo">Submit</button>
                                <button type="button" name="btnCancel" class="btn btn-default btn-animate-demo" onclick="javascript: window.location = '<?php print($_SERVER['HTTP_REFERER']);?>';">Cancel</button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
<?php } elseif (isset($_REQUEST['show'])) { ?>
<?php } else { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="<?php print($class); ?>"><?php print($strMSG); ?></div>
            <div class="panel">
                <div class="panel-heading text-primary">
                    <h3 class="panel-title"><i class="fa fa-file-text"></i> System Configurations 
                        <span class="pull-right" style="width:auto;">
                        </span> 
                    </h3>
                </div>
                <div class="panel-body">
                    <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                        <table class="table users-table table-condensed table-hover table-striped display dataTable" id="" >
                            <thead>
                                <tr>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Config Date</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $Query = "SELECT con.* FROM site_config AS con";
                                    $counter = 0;
                                    $limit = 1;
                                    $start = $p->findStart($limit);
                                    $count = mysql_num_rows(mysql_query($Query));
                                    $pages = $p->findPages($count, $limit);
                                    $rs = mysql_query($Query . " LIMIT " . $start . ", " . $limit);
                                    if (mysql_num_rows($rs) > 0) {
                                        while ($row = mysql_fetch_object($rs)) {
                                            $counter++;
                                ?>
                                        <tr>
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php echo $row->config_date;?></td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <div class="tooltips">
                                                	<a href="<?php print($_SERVER['PHP_SELF'] . "?action=2&config_id=".$row->config_id);?>" data-original-title="Update Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;">
                                                    	<i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                            </td>    
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

