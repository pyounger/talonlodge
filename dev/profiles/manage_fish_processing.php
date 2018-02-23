<?php include ('includes/php_includes_top.php'); ?>
<?php
if(isset($_REQUEST['btnCalculate'])){
    $frec_filets_weight = array();
    for($i=0; $i<count($_REQUEST['frec_count']); $i++){
        if($_REQUEST['frec_count'][$i] != ''){
            if($_REQUEST['frec_count'][$i] == ''){
               $frec_count = 1; 
            } else {
               $frec_count = $_REQUEST['frec_count'][$i];
            }
            if($_REQUEST['frec_weight'][$i] == ''){
               $frec_weight = 1; 
            } else {
               $frec_weight = $_REQUEST['frec_weight'][$i];
            }
            if($_REQUEST['frec_recovery'][$i] == ''){
               $frec_recovery = 1; 
            } else {
               $frec_recovery = $_REQUEST['frec_recovery'][$i];
            }
            $frec_filet_weight = round((($frec_count * $frec_weight) * ($frec_recovery / 100)),2);
            $frec_filets_weight[] .= $frec_filet_weight;
        } else {
            $frec_filets_weight[] .= 0;
        }
    }

    //echo '<pre>';
    //print_r( $_REQUEST );
    //echo '</pre>';
    //echo '<pre>';
    //print_r( $frec_filets_weight );
    //echo '</pre>';

    $strMSG = " Record Updated Successfully ";
    $class = " alert alert-info ";
    
}

            
if ((isset($_REQUEST['pk_from'])) && ($_REQUEST['pk_from'] != '')) {
    $_SESSION['pk_from'] = calendarDateConver4($_REQUEST['pk_from']);
} else if (isset($_SESSION['pk_from'])) {
    //$_SESSION['from'] = $_SESSION['from'];
} else {
    //$_SESSION['pk_from'] = '2014-05-01';
	$_SESSION['pk_from'] = $_SESSION['config_date1'];
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
if((isset($_REQUEST['from']))&&($_REQUEST['from']!='')){
    $_SESSION['from'] = calendarDateConver4($_REQUEST['from']);
} else if(isset($_SESSION['from'])){
    $_SESSION['from'] = $_SESSION['config_date1'];
} else {
    $_SESSION['from'] = $_SESSION['config_date1'];
}
if (isset($_REQUEST['btnAdd'])) {
    $exist = chkExist("frec_id", "fish_record", " WHERE cont_id != '' AND grp_id = ".$_REQUEST['grp_id']." AND frec_date = '".$_REQUEST['date']."' ");
    if($exist==0){
        for($i=0; $i<count($_REQUEST['cont_id']); $i++){
            $maxID = getMaximum("fish_record", "frec_id");
            mysql_query("INSERT INTO fish_record (frec_id, grp_id, cont_id, pms_pak_id, frec_split, frec_special_ins, frec_date) VALUES( '" . $maxID . "', '" . dbStr($_REQUEST['grp_id']) . "', '" . dbStr($_REQUEST['cont_id'][$i]) . "', '" . dbStr($_REQUEST['pms_pak_id']) . "', '" . dbStr($_REQUEST['frec_split']) . "', '" . dbStr($_REQUEST['frec_special_ins']) . "', '" . dbStr($_REQUEST['date']) . "')");
        }
    } else {
        mysql_query("Delete From fish_record WHERE cont_id != '' AND grp_id = ".$_REQUEST['grp_id']." AND frec_date = '".$_REQUEST['date']."' ");
        for($i=0; $i<count($_REQUEST['cont_id']); $i++){
            $maxID = getMaximum("fish_record", "frec_id");
            mysql_query("INSERT INTO fish_record (frec_id, grp_id, cont_id, pms_pak_id, frec_split, frec_special_ins, frec_date) VALUES( '" . $maxID . "', '" . dbStr($_REQUEST['grp_id']) . "', '" . dbStr($_REQUEST['cont_id'][$i]) . "', '" . dbStr($_REQUEST['pms_pak_id']) . "', '" . dbStr($_REQUEST['frec_split']) . "', '" . dbStr($_REQUEST['frec_special_ins']) . "', '" . dbStr($_REQUEST['date']) . "')");
        }
    }
    
    
    if(isset($_REQUEST['add'])){
        $add_update = "&add=1";
    } else {
        $add_update = "&update=1";
    }

    
//    echo '<pre>';
//        echo '<pre>';
//            print_r( $_REQUEST );
//        echo '</pre>';
//    echo '</pre>';
//    die();
//    
//    
    
    
    header("Location: manage_fish_processing.php?show=1&pms_pak_id=" . $_REQUEST['pms_pak_id'] . "&grp_id=".$_REQUEST['grp_id']."&date=".$_REQUEST['date']."&op=1".$add_update);
    
} 

if (isset($_REQUEST['action'])) {
    if ($_REQUEST['action'] == 2) {

        $Query = "SELECT cp.conp_id, cp.cont_id, ca.act_id, a.act_name, g.grp_id, g.GroupName, c.cont_fname, c.cont_lname, asch.asch_id, asch.cont_id AS aschcont_id, asch.asch_start_date, asch.asch_end_date, asch.createdDate, asch.updatedDate, asch.av_confirmed, asch.av_confirming_person, asch.av_date, asch.av_time, asch.asch_duration, asch.act_boat_id, ag.ag_id, ag.ag_name, ad.ad_id, ad.ad_name, av.av_id, av.av_name, thr.ath_id, thr.ath_name, thrt.atht_id, thrt.atht_name FROM contact_profiles AS cp LEFT OUTER JOIN contact_activities AS ca ON cp.conp_id=ca.conp_id LEFT OUTER JOIN activities AS a ON ca.act_id=a.act_id LEFT OUTER JOIN act_schedule AS asch ON asch.grp_id=" . $_REQUEST['grp_id'] . " AND asch.cont_id=" . $_REQUEST['cont_id'] . " AND asch.act_id=a.act_id LEFT OUTER JOIN groups AS g ON g.grp_id=" . $_REQUEST['grp_id'] . " LEFT OUTER JOIN contacts AS c ON c.ContactID=" . $_REQUEST['cont_id'] . " LEFT OUTER JOIN activity_guides AS ag ON asch.ag_id=ag.ag_id LEFT OUTER JOIN activity_destination AS ad ON asch.ad_id=ad.ad_id LEFT OUTER JOIN activity_vendors AS av ON asch.av_id=av.av_id LEFT OUTER JOIN act_therapist AS thr ON asch.ath_id=thr.ath_id LEFT OUTER JOIN act_th_type AS thrt ON asch.atht_id=thrt.atht_id LEFT OUTER JOIN act_boats AS acb ON asch.act_boat_id=acb.act_boat_id WHERE cp.cont_id=" . $_REQUEST['cont_id'] . " AND c.ContactID=" . $_REQUEST['cont_id'] . " AND g.grp_id=" . $_REQUEST['grp_id'] . " AND a.act_id=" . $_REQUEST['act_id'] . " ";

        $rsM = mysql_query($Query);
        if (mysql_num_rows($rsM) > 0) {
            $rsMem = mysql_fetch_object($rsM);
            $act_name = $rsMem->act_name;
            $ag_id = $rsMem->ag_id;
            $ad_id = $rsMem->ad_id;
            $av_id = $rsMem->av_id;
            $av_confirmed = $rsMem->av_confirmed;
            $av_confirming_person = $rsMem->av_confirming_person;
            $av_date = $rsMem->av_date;
            $av_time = $rsMem->av_time;
            $ath_id = $rsMem->ath_id;
            $atht_id = $rsMem->atht_id;
            $asch_start_date = $rsMem->asch_start_date;
            $asch_end_date = $rsMem->asch_end_date;
            $asch_duration = $rsMem->asch_duration;
            $asch_start_time = calendarTimeConver1($rsMem->asch_start_date);
            $asch_end_time = calendarTimeConver1($rsMem->asch_end_date);
            $act_boat_id = $rsMem->act_boat_id;
            $formHead = "Update Info";
        }
    } else {
        $ath_id = "";
        $atht_id = "";
        $ag_id = "";
        $ad_id = "";
        $av_id = "";
        $av_confirmed = "";
        $av_confirming_person = "";
        $av_date = "";
        $av_time = "00:00:00";
        $asch_start_date = "";
        $asch_end_date = "";
        $asch_start_time = "00:00:00";
        $asch_end_time = "00:00:00";
        $asch_duration = "50";
        $act_boat_id = '';
        $formHead = "Add New";
    }
}
if (isset($_REQUEST['show']) && $_REQUEST['show'] == 10) {
    $Query = "SELECT cp.conp_id, cp.cont_id, ca.act_id, a.act_name, g.grp_id, g.GroupName, c.cont_fname, c.cont_lname, asch.asch_id, asch.cont_id AS aschcont_id, asch.asch_start_date, asch.asch_end_date, asch.createdDate, asch.updatedDate, asch.av_confirmed, asch.av_confirming_person, asch.av_date, asch.av_time, asch.asch_duration, abn.act_boat_name, ag.ag_id, ag.ag_name, ad.ad_id, ad.ad_name, av.av_id, av.av_name, thr.ath_id, thr.ath_name, thrt.atht_id, thrt.atht_name FROM  contact_profiles AS cp LEFT OUTER JOIN contact_activities AS ca ON cp.conp_id=ca.conp_id LEFT OUTER JOIN activities AS a ON ca.act_id=a.act_id LEFT OUTER JOIN act_schedule AS asch ON asch.grp_id=" . $_REQUEST['grp_id'] . " AND asch.cont_id=" . $_REQUEST['cont_id'] . " AND asch.act_id=a.act_id LEFT OUTER JOIN groups AS g ON g.grp_id=" . $_REQUEST['grp_id'] . " LEFT OUTER JOIN contacts AS c ON c.ContactID=" . $_REQUEST['cont_id'] . " LEFT OUTER JOIN activity_guides AS ag ON asch.ag_id=ag.ag_id LEFT OUTER JOIN activity_destination AS ad ON asch.ad_id=ad.ad_id LEFT OUTER JOIN activity_vendors AS av ON asch.av_id=av.av_id LEFT OUTER JOIN act_therapist AS thr ON asch.ath_id=thr.ath_id LEFT OUTER JOIN act_th_type AS thrt ON asch.atht_id=thrt.atht_id LEFT OUTER JOIN act_boats AS abn ON asch.act_boat_id=abn.act_boat_id WHERE cp.cont_id=" . $_REQUEST['cont_id'] . " AND c.ContactID=" . $_REQUEST['cont_id'] . " AND g.grp_id=" . $_REQUEST['grp_id'] . " AND a.act_id=" . $_REQUEST['act_id'] . " ";

    $rsM = mysql_query($Query);
    if (mysql_num_rows($rsM) > 0) {
        $rsMem = mysql_fetch_object($rsM);
        $cont_fname = $rsMem->cont_fname;
        $cont_lname = $rsMem->cont_lname;
        $GroupName = $rsMem->GroupName;
        $act_name = $rsMem->act_name;
        $asch_start_date = $rsMem->asch_start_date;
        $asch_end_date = $rsMem->asch_end_date;
        $asch_start_time = calendarTimeConver1($rsMem->asch_start_date);
        $asch_end_time = calendarTimeConver1($rsMem->asch_end_date);
        $asch_duration = $rsMem->asch_duration;
        $ag_name = $rsMem->ag_name;
        $ad_name = $rsMem->ad_name;
        $av_name = $rsMem->av_name;
        $av_confirmed = $rsMem->av_confirmed;
        $av_confirming_person = $rsMem->av_confirming_person;
        $av_date = $rsMem->av_date;
        $av_time = $rsMem->av_time;
        $ath_name = $rsMem->ath_name;
        $atht_name = $rsMem->atht_name;
        $createdDate = $rsMem->createdDate;
        $updatedDate = $rsMem->updatedDate;
        $act_boat_name = $rsMem->act_boat_name;
        $formHead = "Details";
    }
}
if (isset($_REQUEST['btnDelete'])) {
    @mysql_query("DELETE FROM act_schedule  WHERE asch_id = " . $_REQUEST['asch_id']);
    header("Location: " . $_SERVER['PHP_SELF'] . "?op=3");
}

if (isset($_REQUEST['delete']) && $_REQUEST['delete'] == 1) {
    @mysql_query("DELETE FROM fish_record  WHERE grp_id = " . $_REQUEST['grp_id'] . " AND cont_id =".$_REQUEST['contactid']." AND pms_pak_id=".$_REQUEST['pms_pak_id']." AND frec_date = '".$_REQUEST['date']."'");
    header("Location: manage_fish_processing.php?show=1&pms_pak_id=" . $_REQUEST['pms_pak_id'] . "&op=3");
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
        <h3 class="page-header"> Manage Fish Processing <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b>Manage Fish Processing: </b> You can manage your Fish Processing here </p>
        </blockquote>
    </div>
</div>
<?php if (isset($_REQUEST['action'])) { ?>

<?php } elseif (isset($_REQUEST['show']) && $_REQUEST['show'] == 10) { ?>

<?php } else { ?>

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
                                        echo '<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;'.returnName("GroupName", "groups", "grp_id", $_REQUEST['grp_id']);
                                    }
                                }
                            ?>
                            <span class="pull-right" style="width:auto;"></span> 
                        </h3>
                    </div>
                    
                    <div class="panel-body panel-border">
                        <form name="frm" id="frm" method="post" class="form-horizontal" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" role="form">
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Total Guests</label>
                                <div class="col-lg-10 col-md-9">
                                    <?php echo totalCounts("ContactID", "contacts", "grp_id=".$_REQUEST['grp_id']);?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Split Fish Count By</label>
                                <div class="col-lg-10 col-md-9">
                                    <?php 
                                        if(isset($_REQUEST['frec_split'])){
                                           $frec_split =  $_REQUEST['frec_split'];
                                        } else {
                                           $frec_split = @returnName("frec_split", "fish_record", "grp_id", $_REQUEST['grp_id'].' AND cont_id != "" AND frec_date = '."'".$_REQUEST['date']."'");
                                        }
                                    ?>
                                    <input type="text" class="form-control form-cascade-control input_wid70 required" value="<?php echo @$frec_split;?>" id="frec_split" name="frec_split" style='width:50px;' size='2' maxlength='2'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Guests Receiving this Split</label>
                                <div class="col-lg-10 col-md-9">
                                    <?php
                                        $counter=0;
                                        /*$Query = "
SELECT
p.Pms_Package_ID, p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, p.Package_Max_Days,
g.grp_id, g.GroupName,
c.ContactID, c.ContactFirstName, c.ContactLastName, c.cont_image,
cp.conp_id, cp.bootsize_id,
j.jacketsize_name, ( SELECT fr.cont_id FROM fish_record AS fr WHERE c.ContactID = fr.cont_id AND fr.grp_id = ".$_REQUEST['grp_id']." AND fr.pms_pak_id = " . $_REQUEST['pms_pak_id'] . " AND fr.frec_date = '".$_REQUEST['date']."' ) AS selected
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

 AND g.grp_id = ".$_REQUEST['grp_id']."
ORDER BY c.ContactFirstName ASC
";*/
mysql_query("SET SQL_BIG_SELECTS=1");
$Query = "
SELECT
p.Pms_Package_ID, p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, p.Package_Max_Days,
g.grp_id, g.GroupName,
c.ContactID, c.ContactFirstName, c.ContactLastName, c.cont_image,
cp.conp_id, cp.bootsize_id,
j.jacketsize_name, ( SELECT fr.cont_id FROM fish_record AS fr WHERE c.ContactID = fr.cont_id AND fr.grp_id = ".$_REQUEST['grp_id']." AND fr.pms_pak_id = " . $_REQUEST['pms_pak_id'] . " AND fr.frec_date = '".$_REQUEST['date']."' ) AS selected
FROM packages AS p 
LEFT OUTER JOIN groups AS g ON p.Pms_Package_ID= g.Pms_Package_ID 
LEFT OUTER JOIN group_contacts AS gc ON gc.grp_id=g.grp_id
LEFT OUTER JOIN contacts AS c ON c.ContactID=gc.ContactID
LEFT OUTER JOIN contact_profiles AS cp ON c.ContactID=cp.cont_id
LEFT OUTER JOIN jacket_size AS j ON cp.jacketsize_id=j.jacketsize_id
WHERE 
p.Pms_Package_ID = " . $_REQUEST['pms_pak_id'] . "  
AND p.Arrival_Start_Date > '2014-05-01'  
AND g.GroupArrivalDate > '2014-05-01' 
AND g.grp_id = ".$_REQUEST['grp_id']."
ORDER BY c.ContactFirstName ASC
";
                                        $counter = 0;
                                        $limit = $_SESSION['limit_of_rec'];
                                        $count = mysql_num_rows(mysql_query($Query));
                                        $rs = mysql_query($Query);
                                        if ($count > 0) {
                                            while ($row = mysql_fetch_object($rs)) {
                                                if($counter==3){ echo '<br/><br/>'; }
                                                $counter++;
                                                if($row->ContactID == $row->selected){
                                                    $selected = "checked='checked'";
                                                } else {
                                                    $selected = "";
                                                }
                                                echo $row->ContactFirstName.' '.$row->ContactLastName;
                                                echo " <input type='checkbox' class='' value=".$row->ContactID." style='width:20px; height:20px;' id='ftype_weight' name='cont_id[]' ".$selected." > &nbsp; &nbsp; ";
                                            }
                                        }
                                        echo '<br/><br/>';
                                    
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Special Instructions </label>
                                <div class="col-lg-10 col-md-9">
                                    <?php 
                                        if(isset($_REQUEST['frec_special_ins'])){
                                           $frec_special_ins =  $_REQUEST['frec_special_ins'];
                                        } else {
                                           $frec_special_ins = @returnName("frec_special_ins", "fish_record", "grp_id", $_REQUEST['grp_id'].' AND cont_id != "" AND frec_date = '."'".$_REQUEST['date']."'");
                                        }
                                    ?>
                                    <textarea type="text" class="form-control form-cascade-control input_wid70" id="" name="frec_special_ins" ><?php echo @$frec_special_ins;?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                                <div class="col-lg-10 col-md-9">
                                    <button type="submit" name="btnAdd" class="btn btn-primary btn-animate-demo">Submit</button>
                                    <?php if ($_REQUEST['add'] == 1) { ?>
<!--                                        <button type="submit" name="btnAdd" class="btn btn-primary btn-animate-demo">Submit</button>-->
                                    <?php } else { ?>
<!--                                        <button type="submit" name="btnUpdate" class="btn btn-primary btn-animate-demo">Submit</button>-->
                                    <?php } ?>
                                </div>
                            </div>
                        </form> 
                    </div>

                    
                    <?php                    
                    if(isset($_REQUEST['btnCalculate'])){
                        $frec_filets_weight = array();
                        for($i=0; $i<count($_REQUEST['frec_count']); $i++){
                            if($_REQUEST['frec_count'][$i] != ''){
                                if($_REQUEST['frec_count'][$i] == ''){
                                   $frec_count = 1; 
                                } else {
                                   $frec_count = $_REQUEST['frec_count'][$i];
                                }
                                if($_REQUEST['frec_weight'][$i] == ''){
                                   $frec_weight = 1; 
                                } else {
                                   $frec_weight = $_REQUEST['frec_weight'][$i];
                                }
                                if($_REQUEST['frec_recovery'][$i] == ''){
                                   $frec_recovery = 1; 
                                } else {
                                   $frec_recovery = $_REQUEST['frec_recovery'][$i];
                                }
                                $frec_filet_weight = round((($frec_count * $frec_weight) * ($frec_recovery / 100)),2);
                                $frec_filets_weight[] .= $frec_filet_weight;
                            } else {
                                $frec_filets_weight[] .= 0;
                            }
                        }

                    //echo '<pre>';
                    //print_r( $_REQUEST );
                    //echo '</pre>';
                    //echo '<pre>';
                    //print_r( $frec_filets_weight );
                    //echo '</pre>';

                        $exist = chkExist("frec_id", "fish_record", " WHERE ( cont_id = '' OR  cont_id  IS NULL ) AND ( frec_special_ins = '' OR frec_special_ins IS NULL ) AND grp_id = ".$_REQUEST['grp_id']." AND frec_date = '".$_REQUEST['date']."' ");
                        if($exist==0){
                            for($i=0; $i<count($_REQUEST['frec_count']); $i++){
                                $maxID = getMaximum("fish_record", "frec_id");
                                mysql_query("INSERT INTO fish_record (frec_id, grp_id, pms_pak_id, ftype_id, frec_count, frec_weight, frec_recovery, frec_filets_weight, frec_split, frec_date) VALUES( '" . $maxID . "', '" . dbStr($_REQUEST['grp_id']) . "', '" . dbStr($_REQUEST['pms_pak_id']) . "', '" . dbStr($_REQUEST['ftype_id'][$i]) . "', '" . dbStr($_REQUEST['frec_count'][$i]) . "', '" . dbStr($_REQUEST['frec_weight'][$i]) . "', '" . dbStr($_REQUEST['frec_recovery'][$i]) . "', '" . dbStr($frec_filets_weight[$i]) . "', '" . dbStr($_REQUEST['frec_split']) . "', '" . dbStr($_REQUEST['date']) . "')");
                            }
                        } else {
                            mysql_query("Delete From fish_record WHERE ( cont_id = '' OR  cont_id  IS NULL ) AND ( frec_special_ins = '' OR frec_special_ins IS NULL ) AND grp_id = ".$_REQUEST['grp_id']." AND frec_date = '".$_REQUEST['date']."' ");
                            for($i=0; $i<count($_REQUEST['frec_count']); $i++){
                                $maxID = getMaximum("fish_record", "frec_id");
                                mysql_query("INSERT INTO fish_record (frec_id, grp_id, pms_pak_id, ftype_id, frec_count, frec_weight, frec_recovery, frec_filets_weight, frec_split, frec_date) VALUES( '" . $maxID . "', '" . dbStr($_REQUEST['grp_id']) . "', '" . dbStr($_REQUEST['pms_pak_id']) . "', '" . dbStr($_REQUEST['ftype_id'][$i]) . "', '" . dbStr($_REQUEST['frec_count'][$i]) . "', '" . dbStr($_REQUEST['frec_weight'][$i]) . "', '" . dbStr($_REQUEST['frec_recovery'][$i]) . "', '" . dbStr($frec_filets_weight[$i]) . "', '" . dbStr($_REQUEST['frec_split']) . "', '" . dbStr($_REQUEST['date']) . "')");
                            }
                        }

                    }
                    ?>
                    <hr>
                    <hr>
                    <div class="panel-body ">
                        <div class="ro">
                            <div class="col-mol-md-offset-2">
                        <form name="frm1" id="frm1" method="post" class="form-horizontal" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" role="form">
                            
                                    <table class="table users-table table-condensed table-hover table-striped display dataTable" id="" >
                                        <thead>
                                            <tr>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Species</th>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Count</th>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Average Weight</th>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Percentage of Recovery</th>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Average Weight of Filets</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $split = '';
                                            $frec_filets_weight_count = 0.00;
                                            $counter_arr = 0;
                                            $counter = 0;
                                            $count = 0;
                                            $Query = "
SELECT ft.*, fr.frec_count, fr.frec_weight, fr.frec_recovery, fr.frec_filets_weight, fr.frec_split
FROM fish_types AS ft 
LEFT OUTER JOIN fish_record AS fr ON ft.ftype_id = fr.ftype_id AND fr.grp_id = ".$_REQUEST['grp_id']." AND fr.pms_pak_id = ".$_REQUEST['pms_pak_id']." AND fr.frec_date =  '".$_REQUEST['date']."'
ORDER BY ft.ftype_name ASC
";                                                    
                                            $count = mysql_num_rows(mysql_query($Query));
                                            $rs = mysql_query($Query);
                                            if ($count > 0) {
                                                while ($row = mysql_fetch_object($rs)) {
                                                    $counter++;
                                                    $split = @returnName("frec_split", "fish_record", "grp_id", $_REQUEST['grp_id'].' AND cont_id != "" AND frec_date = '."'".$_REQUEST['date']."'");
                                                    if($split == ''){
                                                        $split = $row->frec_split;
                                                    }
                                        ?>
                                        <tr>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php print($row->ftype_name); ?>
                                                <input type="hidden" name="ftype_id[]" value="<?php echo $row->ftype_id; ?>">
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <input type="text" class="form-control form-cascade-control input_wid70" value="<?php  echo $row->frec_count;//echo @$_REQUEST['frec_count'][$counter_arr]; //echo @$row->frec_count;?>" id="frec_count[]" name="frec_count[]">
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <input type="text" class="form-control form-cascade-control input_wid70" value="<?php 
                                                    if(isset($_REQUEST['add'])){
                                                        echo $row->ftype_weight;
                                                    } else {
                                                        echo $row->frec_weight; 
                                                    }
                                                    //echo @$row->ftype_weight;
                                                ?>" id="frec_weight[]" name="frec_weight[]">
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <input type="text" class="form-control form-cascade-control input_wid70" value="<?php 
                                                    if(isset($_REQUEST['add'])){
                                                        echo $row->ftype_recovery;
                                                    } else {
                                                        echo $row->frec_recovery; 
                                                    }
                                                    //echo $row->frec_recovery; //echo @$row->ftype_recovery;?>" id="frec_recovery[]" name="frec_recovery[]">
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <input type="text" class="form-control form-cascade-control input_wid70" value="<?php echo $row->frec_filets_weight; //echo $frec_filets_weight[$counter_arr]; //echo @$row->frec_filets_weight;?>" id="frec_filets_weight[]" name="frec_filets_weight[]">
                                                <?php
                                                    //$frec_filets_weight_count += $frec_filets_weight[$counter_arr];
                                                    $frec_filets_weight_count += $row->frec_filets_weight;;
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                                    $counter_arr++;
                                                }
                                            }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td class="visible-xs visible-sm visible-md visible-lg">&nbsp;
                                                     
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">&nbsp;
                                                     
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">&nbsp;
                                                     
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">&nbsp;
                                                     
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">&nbsp;
                                                     
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    Split Fish Count By: 
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    <input type="text" class="form-control form-cascade-control input_wid70 required" value="<?php echo @$split; //echo @$_REQUEST['frec_split'];?>" name="frec_split">
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">&nbsp;
                                                     
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">&nbsp;
                                                     
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">&nbsp;
                                                     
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="visible-xs visible-sm visible-md visible-lg" style="width:200px;">
                                                    Total = (Average Weight of Filets / Split Fish Count By):
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    <?php 
                                                        echo round($frec_filets_weight_count,2).' / '.@$split;
                                                    ?>                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    For the Date:
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    <?php echo @calendarDateConver2($_REQUEST['date']);?>
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">&nbsp;
                                                     
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    Every Person Will Receive:
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    <?php 
                                                        echo round(($frec_filets_weight_count / @$split),2);
                                                    ?>
                                                <td class="visible-xs visible-sm visible-md visible-lg">&nbsp;
                                                     
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">&nbsp;
                                                     
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">&nbsp;
                                                     
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="" colspan="100%" rowspan="100%" style="vertical-align: left; text-align: left;">
                                                    <br/>
                                                    <input type="hidden" name="pms_pak_id" value="<?php echo $_REQUEST['pms_pak_id']; ?>">
                                                    <input type="hidden" name="cont_id" value="<?php echo @$_REQUEST['contactid']; ?>">
                                                    <input type="hidden" name="grp_id" value="<?php echo $_REQUEST['grp_id']; ?>">
                                                    <input type="hidden" name="act_date" value="<?php echo $_REQUEST['date']; ?>">
                                                    <input type="hidden" name="frec_id" value="<?php echo @$_REQUEST['frec_id']; ?>">

                                                    &nbsp; <input type="submit" value="Calculate" name="btnCalculate" class="btn bg-primary text-white btn-lg" style="vertical-align: center;">
                                                    <?php if ( !(isset($_REQUEST['frec_id']) && $_REQUEST['frec_id']!='') && (isset($_REQUEST['add'])) ) { ?>
<!--                                                        &nbsp; <input type="submit" value="Submit" name="btnAdd" class="btn bg-primary text-white btn-lg" style="vertical-align: center;">-->
                                                    <?php } else { ?>
<!--                                                        &nbsp; <input type="submit" value="Update" name="btnAdd" class="btn bg-primary text-white btn-lg" style="vertical-align: center;">-->
                                                    <?php } ?>
<!--                                                    &nbsp; <button type="button" class="btn btn-default btn-animate-demo" onclick="javascript: window.location = '//<?php @print($_SERVER['HTTP_REFERER']); ?>';" style="vertical-align: center;">Back</button>-->
                                                    
                                                    <br/><br/><br/>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                            
                                </form>
                            </div>
                        </div>
                    </div>

                    

                    
                    
                    
                    <?php
                    /*
                    <hr>
                    <hr>
                    <div class="panel-body">
                        <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                            <table class="table users-table table-condensed table-hover table-striped display dataTable" id="example" >
                                <thead>
                                    <tr>
<!--                                        <th class="visible-xs visible-sm visible-md visible-lg">First Name</th>
                                        <th class="visible-xs visible-sm visible-md visible-lg">Last Name</th>-->
                                        <th class="visible-xs visible-sm visible-md visible-lg">Group</th>
<!--                                        <th class="visible-xs visible-sm visible-md visible-lg">Face Image</th>-->
                                        <?php
                                        $day_counter = 0;
                                        $day_counter1 = 0;
                                        $date1 = '';
                                        $date1 = returnName("Arrival_Start_Date", "packages", "Pms_Package_ID", $_REQUEST['pms_pak_id']);
                                        $days1 = '0';
                                        $date1 = strtotime($date1);
                                        $date1 = strtotime('-' . $days1 . ' day', $date1);
                                        $date1 = date('Y-m-d', $date1);
                                        $date1 = $date1 . ' 00:00:00';
                                        $date2 = '';
                                        $date2 = returnName("Arrival_End_Date", "packages", "Pms_Package_ID", $_REQUEST['pms_pak_id']);
                                        $days2 = '2';
                                        $date2 = strtotime($date2);
                                        $date2 = strtotime('+' . $days2 . ' day', $date2);
                                        $date2 = date('Y-m-d', $date2);
                                        $date2 = $date2 . ' 00:00:00';
                                        $begin = new DateTime($date1);
                                        $end = new DateTime($date2);
                                        $interval = DateInterval::createFromDateString('1 day');
                                        $period = new DatePeriod($begin, $interval, $end);
                                        $no_of_days = diffindates($date1, $date2);
                                        foreach ($period as $dt):
                                            $day_counter++;
                                            if ($no_of_days != $day_counter) {
                                                ?>
                                                <th class="visible-xs visible-sm visible-md visible-lg"> 
                                            <?php
                                            if ($day_counter != 1) {
                                                if ($no_of_days == $day_counter) {
                                                     //echo '<br/>'.$dt->format( "m/d/Y" );
                                                } else {
                                                    if ($no_of_days != (1 + $day_counter)) {
                                                        $day_counter1++;
                                                        //echo 'Night ' . $day_counter1 . '<br/>' . $dt->format("m/d/Y");
                                                    }
                                                }
                                            } else {
                                                $day_counter1++;
                                                //echo 'Night ' . $day_counter1 . '<br/>' . $dt->format("m/d/Y");
                                            }
                                            if (($day_counter - $day_counter1) == 1) {
                                                echo '<br/>' . $dt->format("m/d/Y");
                                            }
                                            if($day_counter1>1 && $day_counter1==$day_counter){
                                                echo 'Day '.($day_counter1-1).'<br/>'.$dt->format( "m/d/Y" );
                                            }
                                            if($day_counter1 == 1){
                                                echo '<br/>'.$dt->format( "m/d/Y" );
                                            }
                                            ?> 
                                                </th>
                                            <?php
                                        }
                                    endforeach;
                                    ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $Query = "
                                        SELECT
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
                                        WHERE p.Pms_Package_ID = " . $_REQUEST['pms_pak_id'] . " AND p.Arrival_Start_Date > '2014-05-01' AND g.grp_id=c.grp_id AND g.grp_id=".$_REQUEST['grp_id']."
                                            
                                        GROUP BY g.grp_id 
                                        
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
<!--                                                <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->ContactFirstName); ?></td>
                                                <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->ContactLastName); ?></td>-->
                                                <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->GroupName); ?></td>
<!--                                                <td class="visible-xs visible-sm visible-md visible-lg"><img src="files/contents/<?php print($row->cont_image); ?>" width="250" style="width: 250px;" /></td>-->
                                                    <?php
                                                    $day_counter = 0;
                                                    $day_counter1 = 0;
                                                    $date1 = '';
                                                    $date1 = returnName("Arrival_Start_Date", "packages", "Pms_Package_ID", $_REQUEST['pms_pak_id']);
                                                    $days1 = '0';
                                                    $date1 = strtotime($date1);
                                                    $date1 = strtotime('-' . $days1 . ' day', $date1);
                                                    $date1 = date('Y-m-d', $date1);
                                                    $date1 = $date1 . ' 00:00:00';

                                                    $date2 = '';
                                                    $date2 = returnName("Arrival_End_Date", "packages", "Pms_Package_ID", $_REQUEST['pms_pak_id']);
                                                    $days2 = '2';
                                                    $date2 = strtotime($date2);
                                                    $date2 = strtotime('+' . $days2 . ' day', $date2);
                                                    $date2 = date('Y-m-d', $date2);
                                                    $date2 = $date2 . ' 00:00:00';

                                                    $begin = new DateTime($date1);
                                                    $end = new DateTime($date2);

                                                    $interval = DateInterval::createFromDateString('1 day');
                                                    $period = new DatePeriod($begin, $interval, $end);
                                                    $no_of_days = diffindates($date1, $date2);

                                                    foreach ($period as $dt):
                                                        $day_counter++;
                                                        if ($no_of_days != $day_counter) {
                                                            ?>
                                                        <td class="visible-xs visible-sm visible-md visible-lg"> 
                                                            <?php
                                                            if ($day_counter != 1) {
                                                                if ($no_of_days == $day_counter) {
                                                                    
                                                                } else {
                                                                    if ($no_of_days != (1 + $day_counter)) {
                                                                        $Query1 = "SELECT
                                                                        fr.*
                                                                        FROM 
                                                                        fish_record AS fr
                                                                        WHERE 
                                                                        fr.frec_date =  '" . $dt->format("Y-m-d") . "'
                                                                        AND fr.cont_id=" . $row->ContactID . "
                                                                        AND fr.grp_id=" . $row->grp_id . "
                                                                        AND fr.pms_pak_id=" . $row->Pms_Package_ID . " LIMIT 1";
                                                                        $count1 = mysql_num_rows(mysql_query($Query1));
                                                                        $rs1 = mysql_query($Query1);
                                                                        if ($count1 > 0) {
                                                                            while ($row1 = mysql_fetch_object($rs1)) {
                                                                                $day_counter1++;
                                                                                echo 'Processed' .
                                                                                     '<br/><a href='.$_SERVER['PHP_SELF']."?delete=1&pms_pak_id=".$row->Pms_Package_ID."&contactid=".$row->ContactID."&grp_id=".$row->grp_id."&date=".$dt->format("Y-m-d").'>Delete</a>' .
                                                                                     '<br/><a href='.$_SERVER['PHP_SELF']."?show=3&pms_pak_id=".$row->Pms_Package_ID . "&contactid=" . $row->ContactID . "&grp_id=" . $row->grp_id . "&date=" . $dt->format("Y-m-d") . '>Details</a>';
                                                                            }
                                                                        } else {
                                                                            $day_counter1++;
                                                                            echo '<a href=' . $_SERVER['PHP_SELF'] . "?show=2&pms_pak_id=" . $row->Pms_Package_ID . "&contactid=" . $row->ContactID . "&grp_id=" . $row->grp_id . "&date=" . $dt->format("Y-m-d") . "&add=1" . '>Not Processed</a>';
                                                                        }
                                                                    }
                                                                }
                                                            } else {
                                                            }
                                                            ?> 
                                                        </td>
                                    <?php
                                }
                            endforeach;
                            ?>
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
                    
                    */
                    ?>
                    
                    
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
                                <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">

                                    
                                    <table class="table users-table table-condensed table-hover table-striped display dataTable" id="" >
                                        <thead>
                                            <tr>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Species</th>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Count</th>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Average Weight</th>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Percentage of Recovery</th>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Average Weight of Filets</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $frec_filets_weight_count = 0.00;
                                            $counter_arr = 0;
                                            $counter = 0;
                                            $count = 0;
                                            $Query = "SELECT * FROM fish_types ORDER BY ftype_name ASC";
                                            $count = mysql_num_rows(mysql_query($Query));
                                            $rs = mysql_query($Query);
                                            if ($count > 0) {
                                                while ($row = mysql_fetch_object($rs)) {
                                                    $counter++;
                                        ?>
                                        <tr>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php print($row->ftype_name); ?>
                                                <input type="hidden" name="ftype_id[]" value="<?php echo $row->ftype_id; ?>">
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <input type="text" class="form-control form-cascade-control input_wid70" value="<?php  echo @$_REQUEST['frec_count'][$counter_arr]; //echo @$row->frec_count;?>" id="frec_count[]" name="frec_count[]">
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <input type="text" class="form-control form-cascade-control input_wid70" value="<?php echo @$row->ftype_weight;?>" id="frec_weight[]" name="frec_weight[]">
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <input type="text" class="form-control form-cascade-control input_wid70" value="<?php echo @$row->ftype_recovery;?>" id="frec_recovery[]" name="frec_recovery[]">
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <input type="text" class="form-control form-cascade-control input_wid70" value="<?php echo $frec_filets_weight[$counter_arr]; //echo @$row->frec_filets_weight;?>" id="frec_filets_weight[]" name="frec_filets_weight[]">
                                                <?php
                                                    $frec_filets_weight_count += $frec_filets_weight[$counter_arr];
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                                    $counter_arr++;
                                                }
                                            }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td class="" colspan="100%" rowspan="100%" style="vertical-align: center; text-align: center;">
                                                    <br/>
                                                    
                                                    <input type="hidden" name="pms_pak_id" value="<?php echo $_REQUEST['pms_pak_id']; ?>">
                                                    <input type="hidden" name="cont_id" value="<?php echo $_REQUEST['contactid']; ?>">
                                                    <input type="hidden" name="grp_id" value="<?php echo $_REQUEST['grp_id']; ?>">
                                                    <input type="hidden" name="act_date" value="<?php echo $_REQUEST['date']; ?>">
                                                    <input type="hidden" name="frec_id" value="<?php echo @$_REQUEST['frec_id']; ?>">

                                                    
                                                    
                                                        Total = <?php echo round($frec_filets_weight_count,2);?>
                                                        &nbsp; <input type="submit" value="Calculate" name="btnCalculate" class="btn bg-primary text-white btn-lg" style="vertical-align: center;">
                                                    <?php if ( !(isset($_REQUEST['frec_id']) && $_REQUEST['frec_id']!='') && (isset($_REQUEST['add'])) ) { ?>
                                                        &nbsp; <input type="submit" value="Submit" name="btnAdd" class="btn bg-primary text-white btn-lg" style="vertical-align: center;">
                                                    <?php } else { ?>
                                                        &nbsp; <input type="submit" value="Update" name="btnAdd" class="btn bg-primary text-white btn-lg" style="vertical-align: center;">
                                                    <?php } ?>
                                                    &nbsp; <button type="button" class="btn btn-default btn-animate-demo" onclick="javascript: window.location = '<?php @print($_SERVER['HTTP_REFERER']); ?>';" style="vertical-align: center;">Back</button>
                                                    
                                                    <br/><br/><br/>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            } else if (isset($_REQUEST['show']) && $_REQUEST['show'] == 3) {
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
                                <form class="form-horizontal cascde-forms" method="post" action="<?php print($_SERVER['PHP_SELF']); ?>" name="frm" id="frm" >
                                    <table class="table users-table table-condensed table-hover table-striped display dataTable" id="" >
                                        <thead>
                                            <tr>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Species</th>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Count</th>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Average Weight</th>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Percentage of Recovery</th>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Average Weight of Filets</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $counter = 0;
                                            $count = 0;
                                            $frec_count = 0;
                                            $frec_weight = 0;
                                            $frec_recovery = 0;
                                            $frec_filets_weight = 0;
                                            $Query = "SELECT
                                            fr.*, ft.ftype_name
                                            FROM 
                                            fish_record AS fr
                                            LEFT OUTER JOIN fish_types AS ft ON fr.ftype_id=ft.ftype_id
                                            WHERE 
                                            fr.frec_date =  '" . $_REQUEST['date'] . "'
                                            AND fr.cont_id=" . $_REQUEST['contactid'] . "
                                            AND fr.grp_id=" . $_REQUEST['grp_id'] . "
                                            AND fr.pms_pak_id=" . $_REQUEST['pms_pak_id'] . "  ORDER BY ft.ftype_name  ";
                                            $count = mysql_num_rows(mysql_query($Query));
                                            $rs = mysql_query($Query);
                                            if ($count > 0) {
                                                while ($row = mysql_fetch_object($rs)) {
                                                    $counter++;
                                        ?>
                                        <tr>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                <?php 
                                                    print($row->ftype_name);
                                                ?>
                                            </th>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php 
                                                    echo @$row->frec_count;
                                                    $frec_count += $row->frec_count;
                                                ?>
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php 
                                                    echo @$row->frec_weight;
                                                    $frec_weight += $row->frec_weight;
                                                ?>
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php 
                                                    echo @$row->frec_recovery;
                                                    $frec_recovery += $row->frec_recovery;
                                                ?>
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php 
                                                    echo @$row->frec_filets_weight;
                                                    $frec_filets_weight += $row->frec_filets_weight;
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                                }
                                            }
                                        ?>
                                        <tr>
                                            <td colspan="100">&nbsp;
                                                 
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                Total
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                <?php echo $frec_count;?>
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                <?php echo $frec_weight;?>
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                <?php echo $frec_recovery;?>
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                <?php echo $frec_filets_weight;?>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                Day Total
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">&nbsp;
                                                 
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">&nbsp;
                                                 
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">&nbsp;
                                                 
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                <?php echo $frec_filets_weight . ' / '.@returnName("Package_Max_Days", "packages", "Pms_Package_ID", $_REQUEST['pms_pak_id']);?>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                Total Per Split
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">&nbsp;
                                                 
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">&nbsp;
                                                 
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">&nbsp;
                                                 
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                <?php echo round(($frec_filets_weight/@returnName("Package_Max_Days", "packages", "Pms_Package_ID", $_REQUEST['pms_pak_id'])),2);?>
                                            </th>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="100" style="vertical-align: center; text-align: center;">
                                                    <br/>
                                                    
                                                    &nbsp; <button type="button" class="btn btn-default btn-animate-demo" onclick="javascript: window.location = '<?php @print($_SERVER['HTTP_REFERER']); ?>';" style="vertical-align: center;">Back</button>
                                                    
                                                    <br/><br/><br/>
                                                </td>
                                            </tr>
                                        </tfoot>
                                        <tr>
                                            <td colspan="100">&nbsp;
                                                 
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        } else {
        ?>
        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-cascade">
                    <div class="panel-body ">
                        <div class="ro">
                            <div class="col-mol-md-offset-2">
                                <form class="form-horizontal cascde-forms" method="post" action="<?php print($_SERVER['PHP_SELF']); ?>" name="frm" id="frm" >
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label">From:</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control form-cascade-control datetimepicker" value="<?php echo calendarDateConver2($_SESSION['from']);?>" id="from" name="from" style="width: 160px;" title="Please Enter Group Arrival Date" placeholder=" Date From ">
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <label class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                                        <input type="submit" value="Filter Records" name="filterRecords" class="btn bg-primary text-white btn-lg">
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
                        <h3 class="panel-title"><i class="fa fa-glass"></i> Fish Processing 
                            <span class="pull-right" style="width:auto;">
                            </span> 
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                            <table class="table users-table table-condensed table-hover table-striped display dataTable" id="" >
                                <thead>
                                    <tr>
                                        <th class="visible-xs visible-sm visible-md visible-lg"><strong>Package Name</strong></th>
<!--                                        <th class="visible-xs visible-sm visible-md visible-lg">Package Start</th>
                                        <th class="visible-xs visible-sm visible-md visible-lg">Package End</th>
                                        <th class="visible-xs visible-sm visible-md visible-lg">No. of Days</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                            </table>        
        <?php
        $Query = "SELECT p.* FROM packages AS p WHERE p.Arrival_Start_Date > '".$_SESSION['from']."' ORDER BY p.Arrival_Start_Date ASC";
		//print($Query);
		//print("<br>");
        $counter = 0;
        $limit = $_SESSION['limit_of_rec'];
        $start = $p->findStart($limit);
        $count = mysql_num_rows(mysql_query($Query));
        $pages = $p->findPages($count, $limit);
        $rs = mysql_query($Query . " LIMIT " . $start . ", " . $limit);
        if (mysql_num_rows($rs) > 0) {
            while ($row = mysql_fetch_object($rs)) {
                $counter++;
                    echo '<table class="table users-table table-condensed table-hover table-striped display dataTable" >';
                        echo '<tr>';
                            echo '<th>';
                                echo '<div style="text-decoration: underline; text-align: center;">'.$row->Package_Name.'</div>';
                            echo '</th>';
                        echo '</tr>';
                    echo '</table>';

                                                                        
                                                                        
                                        echo '<table class="table users-table table-condensed table-hover table-striped display dataTable" >';
                ?>
<!--                                            <tr>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    -->
                                                    <?php
                                                        $Query11 = " 
                                                        SELECT
                                                        p.Pms_Package_ID, p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, p.Package_Max_Days,
                                                        g.grp_id, g.GroupName, g.GroupArrivalDate, g.GroupDepartureDate,
                                                        c.ContactID, c.ContactFirstName, c.ContactLastName, c.cont_image,
                                                        cp.conp_id, cp.bootsize_id,
                                                        j.jacketsize_name
                                                        FROM packages AS p 
														LEFT OUTER JOIN groups AS g ON g.Pms_Package_ID=p.Pms_Package_ID 
														LEFT OUTER JOIN group_contacts AS gc ON gc.grp_id=g.grp_id
														LEFT OUTER JOIN contacts AS c ON c.ContactID=gc.ContactID
														LEFT OUTER JOIN contact_profiles AS cp ON cp.cont_id=c.ContactID
                                                        LEFT OUTER JOIN jacket_size AS j ON cp.jacketsize_id=j.jacketsize_id
                                                        WHERE p.Pms_Package_ID = ".$row->Pms_Package_ID." AND p.Arrival_Start_Date > '".$_SESSION['from']."'  AND p.Arrival_Start_Date = g.GroupArrivalDate AND p.Arrival_End_Date = g.GroupDepartureDate
                                                        GROUP BY g.grp_id 
                                                        ORDER BY g.GroupName, c.ContactFirstName ASC";
                                                        $count11 = mysql_num_rows(mysql_query($Query11));
                                                        $rs11 = mysql_query($Query11);
                                                        if ($count11 > 0) {
                                                            while ($row11 = mysql_fetch_object($rs11)) {
                                                                
                                                                
                                                                    echo '<tr>';
                                                                        echo '<th>';
                                                                            //echo "<a href=".$_SERVER['PHP_SELF'] . "?show=1&add=1&pms_pak_id=".$row->Pms_Package_ID."&grp_id=".$row11->grp_id."><br/>".$row11->GroupName."</a>";
                                                                            echo $row11->GroupName;
                                                                        echo '</th>';
                                                                        $day_counter = 0;
                                                                        $day_counter1 = 0;
                                                                        $date1 = '';
                                                                        $date1 = returnName("Arrival_Start_Date", "packages", "Pms_Package_ID", $row->Pms_Package_ID);
                                                                        $days1 = '0';
                                                                        $date1 = strtotime($date1);
                                                                        $date1 = strtotime('-' . $days1 . ' day', $date1);
                                                                        $date1 = date('Y-m-d', $date1);
                                                                        $date1 = $date1 . ' 00:00:00';
                                                                        $date2 = '';
                                                                        $date2 = returnName("Arrival_End_Date", "packages", "Pms_Package_ID", $row->Pms_Package_ID);
                                                                        $days2 = '2';
                                                                        $date2 = strtotime($date2);
                                                                        $date2 = strtotime('+' . $days2 . ' day', $date2);
                                                                        $date2 = date('Y-m-d', $date2);
                                                                        $date2 = $date2 . ' 00:00:00';
                                                                        $begin = new DateTime($date1);
                                                                        $end = new DateTime($date2);
                                                                        $interval = DateInterval::createFromDateString('1 day');
                                                                        $period = new DatePeriod($begin, $interval, $end);
                                                                        $no_of_days = diffindates($date1, $date2);
                                                                        foreach ($period as $dt):
                                                                            $day_counter++;
                                                                            if ($no_of_days != $day_counter) {
                                                                                if ($day_counter != 1) {
                                                                                    if ($no_of_days == $day_counter) {
                                                                                         //echo '<br/>'.$dt->format( "m/d/Y" );
                                                                                    } else {
                                                                                        if ($no_of_days != (1 + $day_counter)) {
                                                                                            $day_counter1++;
                                                                                            //echo 'Night ' . $day_counter1 . '<br/>' . $dt->format("m/d/Y");
                                                                                        }
                                                                                    }
                                                                                } else {
                                                                                    $day_counter1++;
                                                                                    //echo 'Night ' . $day_counter1 . '<br/>' . $dt->format("m/d/Y");
                                                                                }
                                                                                if (($day_counter - $day_counter1) == 1) {
                                                                                    //echo '<br/>' . $dt->format("m/d/Y");
                                                                                }
                                                                                if($day_counter1>1 && $day_counter1==$day_counter){
                                                                                    echo '<th class="visible-xs visible-sm visible-md visible-lg">';
                                                                                        echo 'Day '.($day_counter1-1).'<br/>'.$dt->format( "m/d/Y" );

                                                                                        
                                                                                        $Query22 = "
                                                                                        SELECT fr.frec_id FROM fish_record AS fr WHERE fr.grp_id = ".$row11->grp_id." AND fr.frec_date = '".$dt->format( "Y-m-d" )."' LIMIT 1";
                                                                                        $count22 = mysql_num_rows(mysql_query($Query22));
                                                                                        $rs22 = mysql_query($Query22);
                                                                                        if ($count22 > 0) {
                                                                                            while ($row22 = mysql_fetch_object($rs22)) {
                                                                                                echo '<br/>Processed - ';
                                                                                                echo "<a href=".$_SERVER['PHP_SELF'] . "?show=1&add=1&pms_pak_id=".$row->Pms_Package_ID."&grp_id=".$row11->grp_id."&date=".$dt->format( "Y-m-d" )."&update=1>Update</a>";
                                                                                            }
                                                                                        } else {
                                                                                            echo '<br/>Not Processed - ';
                                                                                            echo "<a href=".$_SERVER['PHP_SELF'] . "?show=1&add=1&pms_pak_id=".$row->Pms_Package_ID."&grp_id=".$row11->grp_id."&date=".$dt->format( "Y-m-d" )."&add=1>Set</a>";
                                                                                        }                        
                                                                                        
                                                                                    echo '</th>';
                                                                                }
                                                                                if($day_counter1 == 1){
                                                                                    //echo '<br/>'.$dt->format( "m/d/Y" );
                                                                                }
                                                                            }
                                                                        endforeach;
                                                                    echo '</tr>';
                                                                
                                                                
                                                                
                                                            }
                                                        }
                                                    ?>
<!--                                                </td>-->
<!--                                                <td class="visible-xs visible-sm visible-md visible-lg"><?php echo calendarDateConver2($row->Arrival_Start_Date); ?></td>
                                                <td class="visible-xs visible-sm visible-md visible-lg"><?php echo calendarDateConver2($row->Arrival_End_Date); ?></td>
                                                <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->Package_Max_Days); ?></td>-->
<!--                                            </tr>-->
                <?php
            }
        } else {
            //print('<tr><td colspan="100%" align="center">No record found!</td></tr>');
        }
                                                                echo '</table>';
        ?>
<!--                                </tbody>
                            </table>-->
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
