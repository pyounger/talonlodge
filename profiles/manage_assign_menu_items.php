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
        $MaxID = getMaximum("menus", "menu_id");
        mysql_query("INSERT INTO menus(menu_id, menu_item_name, menu_type, menu_package, menu_package_day, menu_is_custom) VALUES(" . $MaxID . ", '" . dbStr($_REQUEST['menu_item_name']) . "', '" . dbStr($_REQUEST['menu_type']) . "', '" . dbStr($_REQUEST['menu_package']) . "', '" . dbStr($_REQUEST['menu_package_day']) . "', '" . dbStr(@$_REQUEST['menu_is_custom']) . "')") or die(mysql_error());

//        mysql_query("DELETE FROM menus_lov WHERE menu_id = ".$MaxID." ");
//        for($i=0; $i<count($_REQUEST['bitem_id']); $i++){
//            mysql_query("INSERT INTO menus_lov (bitem_id, menu_id) VALUES (".$_REQUEST['bitem_id'][$i].", ".$MaxID." )");
//        }
        
        header("Location: " . $_SERVER['PHP_SELF'] . "?op=1");
    } elseif (isset($_REQUEST['btnUpdate'])) {
        
//        echo '<pre>';
//        print_r( $_REQUEST );
//        echo '</pre>';
//        die();
        
        
        $udtQuery = "UPDATE menus SET menu_item_name='" . dbStr($_REQUEST['menu_item_name']) . "', menu_type='" . dbStr($_REQUEST['menu_type']) . "', menu_package='" . dbStr($_REQUEST['menu_package']) . "', menu_package_day='" . dbStr($_REQUEST['menu_package_day']) . "', menu_is_custom='" . dbStr(@$_REQUEST['menu_is_custom']) . "' WHERE menu_id=" . $_REQUEST['menu_id'];
        mysql_query($udtQuery) or die(mysql_error());

//        mysql_query("DELETE FROM menus_lov WHERE menu_id = ".$_REQUEST['menu_id']." ");
//        for($i=0; $i<count($_REQUEST['bitem_id']); $i++){
//            mysql_query("INSERT INTO menus_lov (bitem_id, menu_id) VALUES (".$_REQUEST['bitem_id'][$i].", ".$_REQUEST['menu_id']." )");
//        }

        header("Location: " . $_SERVER['PHP_SELF'] . "?op=2");
    } elseif ($_REQUEST['action'] == 2) {
        $rsM = mysql_query("SELECT * FROM menus WHERE menu_id=" . $_REQUEST['menu_id']);
        if (mysql_num_rows($rsM) > 0) {
            $rsMem = mysql_fetch_object($rsM);
            $menu_id = $rsMem->menu_id;
            $menu_item_name = $rsMem->menu_item_name;
            $menu_type = $rsMem->menu_type;
            $menu_package = $rsMem->menu_package;
            $menu_package_day = $rsMem->menu_package_day;
            $menu_is_custom = $rsMem->menu_is_custom;
            $formHead = "Update Info";
        }
    } else {
        $menu_id = "";
        $menu_item_name = "";
        $menu_type = "";
        $menu_package = "";
        $menu_package_day = "";
        $menu_is_custom = 0;
        $formHead = "Add New";
    }
}
if (isset($_REQUEST['show'])) {
    $rsM = mysql_query("SELECT * FROM menus WHERE menu_id=" . $_REQUEST['menu_id']);
    if (mysql_num_rows($rsM) > 0) {
        $rsMem = mysql_fetch_object($rsM);
        $menu_id = $rsMem->menu_id;
        $menu_item_name = $rsMem->menu_item_name;
        $menu_type = $rsMem->menu_type;
        $menu_package = $rsMem->menu_package;
        $menu_package_day = $rsMem->menu_package_day;
        $menu_is_custom = $rsMem->menu_is_custom;
        $formHead = "Update Info";
    }
}
if(isset($_REQUEST['btnDelete'])){
    @mysql_query("DELETE FROM menus  WHERE menu_id=" . $_REQUEST['chkstatus']) or die(mysql_query());
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
        <h3 class="page-header"> Manage Create Menu Items <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b>Manage Create Menu Items: </b> You can manage Create Menu Items here </p>
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
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Menu Name</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Menu Name..." value="<?php print($menu_item_name);?>" id="menu_item_name" name="menu_item_name">
                            </div>
                        </div>
<!--                        <div class="form-group" id="set_guides">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Menu Items</label>
                            <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose Items..." name="bitem_id[]" id="bitem_id[]" class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2" multiple="">
                                    <?php echo FillMultiple("bar_items", "bitem_id", "bitem_name", "menus_lov", "bitem_id", "menu_id", $menu_id)?>
                                </select>
                            </div>
                        </div>-->
                        <div class="form-group" id="set_guides">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Menu Type</label>
                            <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Type..." name="menu_type" id="menu_type" class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2">
                                    <option value="1" <?php echo ((@$menu_type!='' && $menu_type==1)?'selected':'');?>>Breakfast</option>
                                    <option value="2" <?php echo ((@$menu_type!='' && $menu_type==2)?'selected':'');?>>Lunch</option>
                                    <option value="3" <?php echo ((@$menu_type!='' && $menu_type==3)?'selected':'');?>>Dinner</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="set_guides">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Menu Package</label>
                            <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Package..." name="menu_package" id="menu_package" class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2">
                                    <option value="1" <?php echo ((@$menu_package!='' && $menu_package==1)?'selected':'');?>>4 Day</option>
                                    <option value="2" <?php echo ((@$menu_package!='' && $menu_package==2)?'selected':'');?>>5 Day</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="set_guides">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Menu Package Day</label>
                            <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Package Day..." name="menu_package_day" id="menu_package_day" class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2">
                                    <option value="1" <?php echo ((@$menu_package_day!='' && @$menu_package_day==1)?'selected':'');?>>Night 1</option>
                                    <option value="2" <?php echo ((@$menu_package_day!='' && @$menu_package_day==2)?'selected':'');?>>Day 1</option>
                                    <option value="3" <?php echo ((@$menu_package_day!='' && @$menu_package_day==3)?'selected':'');?>>Day 2</option>
                                    <option value="4" <?php echo ((@$menu_package_day!='' && @$menu_package_day==4)?'selected':'');?>>Day 3</option>
                                    <option value="5" <?php echo ((@$menu_package_day!='' && @$menu_package_day==5)?'selected':'');?>>Day 4</option>
                                    <option value="6" <?php echo ((@$menu_package_day!='' && @$menu_package_day==6)?'selected':'');?>>Day 5</option>
                                    <option value="7" <?php echo ((@$menu_package_day!='' && @$menu_package_day==7)?'selected':'');?>>Day 6</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Regular/Custom</label>
                            <div class="col-lg-10 col-md-9">
                                Regular:
                                <input type="radio" class="" value="0" <?php echo ((@$menu_is_custom==0)?"checked":'');?> id="menu_is_custom" name="menu_is_custom" style="width:20px; height:20px;">
                                &nbsp;
                                Custom:
                                <input type="radio" class="" value="1" <?php echo ((@$menu_is_custom==1)?"checked":'');?> id="menu_is_custom" name="menu_is_custom" style="width:20px; height:20px;">
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
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Menu Name</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php print($menu_item_name); ?></div>
                        </div>
<!--                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Menu Items</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <?php 
                                    $counter=0;
                                    $rsM = mysql_query("SELECT b.bitem_name FROM bar_items AS b LEFT OUTER JOIN menus_lov AS ml ON b.bitem_id=ml.bitem_id WHERE ml.menu_id=" . $_REQUEST['menu_id']);
                                    if (mysql_num_rows($rsM) > 0) {
                                        while($rsMem = mysql_fetch_object($rsM)){
                                            $counter++;
                                            if($counter>1){
                                                $comma = ', ';

                                            } else {
                                                $comma = '';
                                            }
                                            echo $comma.$rsMem->bitem_name;
                                        }
                                    }
                                ?>
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Menu type</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <?php 
                                    if($menu_type==1){
                                        echo 'Breakfast';
                                    } else if($menu_type==2){
                                        echo 'Lunch';
                                    } else {
                                        echo 'Dinner';
                                    }
                                ?> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Menu Package</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <?php 
                                    if($menu_package==1){
                                        echo '4 Day';
                                    } else {
                                        echo '5 Day';
                                    }
                                ?> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Menu Package Day</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <?php 
                                    if($menu_package_day==1){
                                        echo 'Night 1';
                                    } else if($menu_package_day==2){
                                        echo 'Day 1';
                                    } else if($menu_package_day==3){
                                        echo 'Day 2';
                                    } else if($menu_package_day==4){
                                        echo 'Day 3';
                                    } else if($menu_package_day==5){
                                        echo 'Day 4';
                                    } else if($menu_package_day==6){
                                        echo 'Day 5';
                                    } else if($menu_package_day==7){
                                        echo 'Day 6';
                                    }
                                ?> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Regular/Custom</label>
                            <div class="col-lg-10 col-md-9 det-display"><?php echo (($menu_is_custom==0)?'Regular':'Custom'); ?></div>
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
                    <h3 class="panel-title"><i class="fa fa-file-text"></i> Create Menu Items
                        <span class="pull-right" style="width:auto;">
                            <div style="float:right;"><a href="<?php print($_SERVER['PHP_SELF'] . "?action=1"); ?>" title="Add New"><i class="fa fa-plus"></i> Add New</a></div>
                        </span> 
                    </h3>
                </div>
                <div class="panel-body">
                    <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                        <table class="table users-table table-condensed table-hover table-striped display dataTable" id="" >
                            <thead>
                                <tr>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Menu Name</th>
<!--                                    <th class="visible-xs visible-sm visible-md visible-lg">Menu Items</th>-->
                                    <th class="visible-xs visible-sm visible-md visible-lg">Menu Type</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Menu Package</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Menu Package Day</th>
                                    <th class="visible-xs visible-sm visible-md visible-lg">Regular/Custom</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
    $Query = "SELECT * FROM menus ORDER BY menu_package, menu_package_day, menu_type, menu_is_custom";
    $counter = 0;
    $limit = 500;
    $start = $p->findStart($limit);
    $count = mysql_num_rows(mysql_query($Query));
    $pages = $p->findPages($count, $limit);
    $rs = mysql_query($Query . " LIMIT " . $start . ", " . $limit);
    if (mysql_num_rows($rs) > 0) {
        while ($row = mysql_fetch_object($rs)) {
            $counter++;
            ?>
                                        <tr>
                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->menu_item_name); ?> </td>
<!--                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php 
                                                    $counter=0;
                                                    $rsM = mysql_query("SELECT b.bitem_name FROM bar_items AS b LEFT OUTER JOIN menus_lov AS ml ON b.bitem_id=ml.bitem_id WHERE ml.menu_id=" . $row->menu_id);
                                                    if (mysql_num_rows($rsM) > 0) {
                                                        while($rsMem = mysql_fetch_object($rsM)){
                                                            $counter++;
                                                            if($counter>1){
                                                                $comma = ', ';

                                                            } else {
                                                                $comma = '';
                                                            }
                                                            echo $comma.$rsMem->bitem_name;
                                                        }
                                                    }
                                                ?>
                                            </td>    -->
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php 
                                                    if($row->menu_type==1){
                                                        echo 'Breakfast';
                                                    } else if($row->menu_type==2){
                                                        echo 'Lunch';
                                                    } else {
                                                        echo 'Dinner';
                                                    }
                                                ?> 
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php 
                                                    if($row->menu_package==1){
                                                        echo '4 Day';
                                                    } else {
                                                        echo '5 Day';
                                                    }
                                                ?> 
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php 
                                                    if($row->menu_package_day==1){
                                                        echo 'Night 1';
                                                    } else if($row->menu_package_day==2){
                                                        echo 'Day 1';
                                                    } else if($row->menu_package_day==3){
                                                        echo 'Day 2';
                                                    } else if($row->menu_package_day==4){
                                                        echo 'Day 3';
                                                    } else if($row->menu_package_day==5){
                                                        echo 'Day 4';
                                                    } else if($row->menu_package_day==6){
                                                        echo 'Day 5';
                                                    } else if($row->menu_package_day==7){
                                                        echo 'Day 6';
                                                    }
                                                ?> 
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php 
                                                    if($row->menu_is_custom==0){
                                                        echo 'Regular';
                                                    } else {
                                                        echo 'Custom';
                                                    }
                                                ?> 
                                            </td>
                                            <td style="width:135px">
<!--                                                <div class="tooltips"><a href="manage_menu_items.php?menu_id=<?php print($row->menu_id);?>&btnDelete=1&chkstatus=<?php print($row->menu_id);?>" data-original-title="Delete Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-minus-circle"></i></a></div>-->
                                                <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF'] . "?show=1&menu_id=" . $row->menu_id); ?>" data-original-title="See Details" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-eye"></i></a></div>
                                                <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF'] . "?action=2&menu_id=" . $row->menu_id);?>" data-original-title="Update Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-edit"></i></a></div>
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

