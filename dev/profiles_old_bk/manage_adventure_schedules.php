<?php
include ('includes/php_includes_top.php');
?>
<?php
if ((isset($_REQUEST['pk_from'])) && ($_REQUEST['pk_from'] != '')) {
    $_SESSION['pk_from'] = calendarDateConver4($_REQUEST['pk_from']);
} else if (isset($_SESSION['pk_from'])) {
    //$_SESSION['from'] = $_SESSION['from'];
} else {
    $_SESSION['pk_from'] = '2014-05-01';
}
if ((isset($_REQUEST['pk_to'])) && ($_REQUEST['pk_to'] != '')) {
    $_SESSION['pk_to'] = calendarDateConver4($_REQUEST['pk_to']);
} else if (isset($_SESSION['pk_to'])) {
    //$_SESSION['to'] = $_SESSION['to'];
} else {
    $_SESSION['pk_to'] = '2014-10-01';
}
if ((isset($_REQUEST['limit_of_rec'])) && ($_REQUEST['limit_of_rec'] != '')) {
    $_SESSION['limit_of_rec'] = $_REQUEST['limit_of_rec'];
} else if (isset($_SESSION['limit_of_rec'])) {
    //$_SESSION['group_name'] = $_SESSION['group_name'];
} else {
    $_SESSION['limit_of_rec'] = '200';
}
if (isset($_REQUEST['send'])) {
    if($_REQUEST['act_id']==1){
        $rs = mysql_query("SELECT c.ContactFirstName, c.ContactLastName, c.cont_email, a.asch_start_date, a.asch_end_date, a.asch_duration, a.ath_id, at.ath_name, ac.act_name FROM contacts AS c LEFT OUTER JOIN act_schedule AS a ON c.ContactID=a.cont_id LEFT OUTER JOIN act_therapist AS at ON a.ath_id=at.ath_id LEFT OUTER JOIN activities AS ac ON a.act_id=ac.act_id WHERE a.asch_id=".$_REQUEST['asch_id']."");
        if (mysql_num_rows($rs) > 0) {
            $row = mysql_fetch_object($rs);
            mysql_query("UPDATE act_schedule SET asch_email_counter = (asch_email_counter + 1) WHERE cont_id = ".$_REQUEST['cont_id']."");
            echo activity_schedule_email(dbStr($row->cont_email), dbStr($row->ContactFirstName.' '.$row->ContactLastName), dbStr(calendarDateConver2($row->asch_start_date)), dbStr( date('h:i:s', strtotime($row->asch_start_date))), dbStr($row->asch_duration), dbStr($row->ath_name), dbStr($_REQUEST['act_id']), dbStr($row->act_name));
            $strMSG = " Login Info sent ";
            $class = "alert alert-success";
        }
    } else {
        $rs = mysql_query("SELECT c.ContactFirstName, c.ContactLastName, c.cont_email, a.asch_start_date, a.asch_end_date, a.asch_duration, a.ath_id, at.ath_name, ac.act_name, ac.act_price FROM contacts AS c LEFT OUTER JOIN act_schedule AS a ON c.ContactID=a.cont_id LEFT OUTER JOIN act_therapist AS at ON a.ath_id=at.ath_id LEFT OUTER JOIN activities AS ac ON a.act_id=ac.act_id WHERE a.asch_id=".$_REQUEST['asch_id']."");
        if (mysql_num_rows($rs) > 0) {
            $row = mysql_fetch_object($rs);
            mysql_query("UPDATE act_schedule SET asch_email_counter = (asch_email_counter + 1) WHERE cont_id = ".$_REQUEST['cont_id']."");
            echo activity_schedule_email(dbStr($row->cont_email), dbStr($row->ContactFirstName.' '.$row->ContactLastName), dbStr(calendarDateConver2($row->asch_start_date)), dbStr( date('h:i:s', strtotime($row->asch_start_date))), dbStr( date('h:i:s', strtotime($row->asch_end_date))), dbStr($row->act_price), dbStr($_REQUEST['act_id']), dbStr($row->act_name));
            $strMSG = " Login Info sent ";
            $class = "alert alert-success";
        }
    }
}
if (isset($_REQUEST['action'])) {
    if (isset($_REQUEST['btnAdd'])) {
        
        $maxID = getMaximum("act_schedule", "asch_id");
        $asch_start_date = trim(dbStr(calendarDateConver4($_REQUEST['asch_start_date'])) . ' ' . $_REQUEST['asch_start_time']);
        if ($_REQUEST['act_id'] == 1) {
            $asch_end_date = trim(dbStr(calendarDateConver4($_REQUEST['asch_start_date'])) . ' ' . $_REQUEST['asch_start_time']);
            $duration = ' + '.$_REQUEST['asch_duration'].' minute ';
            $nowtime  = $asch_end_date;
            $date = date('Y-m-d H:i:s', strtotime($nowtime . $duration));
            $asch_end_date = $date;
        } else {
            $asch_end_date = trim(dbStr(calendarDateConver4($_REQUEST['asch_start_date'])) . ' ' . $_REQUEST['asch_end_time']);
        }

        mysql_query("INSERT INTO act_schedule (asch_id, cont_id, grp_id, act_id, ag_id, ad_id, av_id, asch_start_date, asch_end_date, status_id, createdDate, ath_id, atht_id, av_confirmed, av_confirming_person, av_date, av_time, asch_duration, act_boat_id, pms_pak_id) VALUES(" . $maxID . ", '" . dbStr($_REQUEST['cont_id']) . "', '" . dbStr($_REQUEST['grp_id']) . "', '" . dbStr($_REQUEST['act_id']) . "', '" . @dbStr(@$_REQUEST['ag_id']) . "', '" . @dbStr(@$_REQUEST['ad_id']) . "', '" . @dbStr(@$_REQUEST['av_id']) . "', '" . $asch_start_date . "', '" . $asch_end_date . "',1 , NOW(), '" . dbStr(@$_REQUEST['ath_id']) . "', '" . dbStr(@$_REQUEST['atht_id']) . "', '" . dbStr(@$_REQUEST['av_confirmed']) . "', '" . dbStr(@$_REQUEST['av_confirming_person']) . "', '" . dbStr(calendarDateConver4(@$_REQUEST['av_date'])) . "', '" . dbStr(@$_REQUEST['av_time']) . "', '" . @dbStr(@$_REQUEST['asch_duration']) . "', '" . @dbStr(@$_REQUEST['act_boat_id']) . "', '" . @dbStr(@$_REQUEST['pms_pak_id']) . "')") or die(mysql_error());
        
        if($_REQUEST['act_id']==1){
            $rs = mysql_query("SELECT c.ContactFirstName, c.ContactLastName, c.cont_email, a.asch_start_date, a.asch_end_date, a.asch_duration, a.ath_id, at.ath_name, ac.act_name FROM contacts AS c LEFT OUTER JOIN act_schedule AS a ON c.ContactID=a.cont_id LEFT OUTER JOIN act_therapist AS at ON a.ath_id=at.ath_id LEFT OUTER JOIN activities AS ac ON a.act_id=ac.act_id WHERE a.asch_id=".$maxID."");
            if (mysql_num_rows($rs) > 0) {
                $row = mysql_fetch_object($rs);
                mysql_query("UPDATE act_schedule SET asch_email_counter = (asch_email_counter + 1) WHERE cont_id = ".$_REQUEST['cont_id']."");
                activity_schedule_email(dbStr($row->cont_email), dbStr($row->ContactFirstName.' '.$row->ContactLastName), dbStr(calendarDateConver2($row->asch_start_date)), dbStr( date('h:i:s', strtotime($row->asch_start_date))), dbStr($row->asch_duration), dbStr($row->ath_name), dbStr($_REQUEST['act_id']), dbStr($row->act_name));
                $strMSG = " Login Info sent ";
                $class = "alert alert-success";
            }
        } else {
            $rs = mysql_query("SELECT c.ContactFirstName, c.ContactLastName, c.cont_email, a.asch_start_date, a.asch_end_date, a.asch_duration, a.ath_id, at.ath_name, ac.act_name, ac.act_price FROM contacts AS c LEFT OUTER JOIN act_schedule AS a ON c.ContactID=a.cont_id LEFT OUTER JOIN act_therapist AS at ON a.ath_id=at.ath_id LEFT OUTER JOIN activities AS ac ON a.act_id=ac.act_id WHERE a.asch_id=".$maxID."");
            if (mysql_num_rows($rs) > 0) {
                $row = mysql_fetch_object($rs);
                mysql_query("UPDATE act_schedule SET asch_email_counter = (asch_email_counter + 1) WHERE cont_id = ".$_REQUEST['cont_id']."");
                activity_schedule_email(dbStr($row->cont_email), dbStr($row->ContactFirstName.' '.$row->ContactLastName), dbStr(calendarDateConver2($row->asch_start_date)), dbStr( date('h:i:s', strtotime($row->asch_start_date))), dbStr( date('h:i:s', strtotime($row->asch_end_date))), dbStr($row->act_price), dbStr($_REQUEST['act_id']), dbStr($row->act_name));
                $strMSG = " Login Info sent ";
                $class = "alert alert-success";
            }
        }
        
//        echo '<pre>';
//        print_r( $_REQUEST );
//        echo '</pre>';
//        die();

        
        header("Location: " . $_SERVER['PHP_SELF'] . "?op=1");
    } elseif (isset($_REQUEST['btnUpdate'])) {

        $asch_start_date = trim(dbStr(calendarDateConver4($_REQUEST['asch_start_date'])) . ' ' . $_REQUEST['asch_start_time']);
        if ($_REQUEST['act_id'] == 1) {
            $asch_end_date = trim(dbStr(calendarDateConver4($_REQUEST['asch_start_date'])) . ' ' . $_REQUEST['asch_start_time']);
            $duration = ' + '.$_REQUEST['asch_duration'].' minute ';
            $nowtime  = $asch_end_date;
            $date = date('Y-m-d H:i:s', strtotime($nowtime . $duration));
            $asch_end_date = $date;
        } else {
            $asch_end_date = trim(dbStr(calendarDateConver4($_REQUEST['asch_start_date'])) . ' ' . $_REQUEST['asch_end_time']);
        }
        $udtQuery = "UPDATE act_schedule SET cont_id='" . dbStr($_REQUEST['cont_id']) . "', grp_id='" . dbStr($_REQUEST['grp_id']) . "', act_id='" . dbStr($_REQUEST['act_id']) . "', ag_id='" . dbStr(@$_REQUEST['ag_id']) . "', ad_id='" . dbStr(@$_REQUEST['ad_id']) . "', av_id='" . dbStr(@$_REQUEST['av_id']) . "', asch_start_date='" . $asch_start_date . "', asch_end_date='" . $asch_end_date . "', updatedDate=NOW(), ath_id='" . dbStr(@$_REQUEST['ath_id']) . "', atht_id='" . dbStr(@$_REQUEST['atht_id']) . "', av_confirmed='" . dbStr(@$_REQUEST['av_confirmed']) . "', av_confirming_person='" . dbStr(@$_REQUEST['av_confirming_person']) . "', av_date='" . @dbStr(@calendarDateConver4(@$_REQUEST['av_date'])) . "', av_time='" . dbStr(@$_REQUEST['av_time']) . "', asch_duration='" . dbStr(@$_REQUEST['asch_duration']) . "', act_boat_id='" . dbStr(@$_REQUEST['act_boat_id']) . "' WHERE asch_id=" . $_REQUEST['asch_id'] . " ";
        mysql_query($udtQuery) or die(mysql_error());
        
        if($_REQUEST['act_id']==1){
            $rs = mysql_query("SELECT c.ContactFirstName, c.ContactLastName, c.cont_email, a.asch_start_date, a.asch_end_date, a.asch_duration, a.ath_id, at.ath_name, ac.act_name FROM contacts AS c LEFT OUTER JOIN act_schedule AS a ON c.ContactID=a.cont_id LEFT OUTER JOIN act_therapist AS at ON a.ath_id=at.ath_id LEFT OUTER JOIN activities AS ac ON a.act_id=ac.act_id WHERE a.asch_id=".$_REQUEST['asch_id']."");
            if (mysql_num_rows($rs) > 0) {
                $row = mysql_fetch_object($rs);
                mysql_query("UPDATE act_schedule SET asch_email_counter = (asch_email_counter + 1) WHERE cont_id = ".$_REQUEST['cont_id']."");
                activity_schedule_email(dbStr($row->cont_email), dbStr($row->ContactFirstName.' '.$row->ContactLastName), dbStr(calendarDateConver2($row->asch_start_date)), dbStr( date('h:i:s', strtotime($row->asch_start_date))), dbStr($row->asch_duration), dbStr($row->ath_name), dbStr($_REQUEST['act_id']), dbStr($row->act_name));
                $strMSG = " Login Info sent ";
                $class = "alert alert-success";
            }
        } else {
            $rs = mysql_query("SELECT c.ContactFirstName, c.ContactLastName, c.cont_email, a.asch_start_date, a.asch_end_date, a.asch_duration, a.ath_id, at.ath_name, ac.act_name FROM contacts AS c LEFT OUTER JOIN act_schedule AS a ON c.ContactID=a.cont_id LEFT OUTER JOIN act_therapist AS at ON a.ath_id=at.ath_id LEFT OUTER JOIN activities AS ac ON a.act_id=ac.act_id WHERE a.asch_id=".$_REQUEST['asch_id']."");
            if (mysql_num_rows($rs) > 0) {
                $row = mysql_fetch_object($rs);
                mysql_query("UPDATE act_schedule SET asch_email_counter = (asch_email_counter + 1) WHERE cont_id = ".$_REQUEST['cont_id']."");
                activity_schedule_email(dbStr($row->cont_email), dbStr($row->ContactFirstName.' '.$row->ContactLastName), dbStr(calendarDateConver2($row->asch_start_date)), dbStr( date('h:i:s', strtotime($row->asch_start_date))), dbStr( date('h:i:s', strtotime($row->asch_end_date))), 'Cost Per Person', dbStr($_REQUEST['act_id']), dbStr($row->act_name));
                $strMSG = " Login Info sent ";
                $class = "alert alert-success";
            }
        }
        
        header("Location: " . $_SERVER['PHP_SELF'] . "?op=2");
    } elseif ($_REQUEST['action'] == 2) {

        //echo $Query = "SELECT cp.conp_id, cp.cont_id, ca.act_id, a.act_name, g.grp_id, g.GroupName, c.cont_fname, c.cont_lname, asch.asch_id, asch.cont_id AS aschcont_id, asch.asch_start_date, asch.asch_end_date, asch.createdDate, asch.updatedDate, asch.av_confirmed, asch.av_confirming_person, asch.av_date, asch.av_time, asch.asch_duration, asch.act_boat_id, ag.ag_id, ag.ag_name, ad.ad_id, ad.ad_name, av.av_id, av.av_name, thr.ath_id, thr.ath_name, thrt.atht_id, thrt.atht_name FROM contact_profiles AS cp LEFT OUTER JOIN contact_activities AS ca ON cp.conp_id=ca.conp_id LEFT OUTER JOIN activities AS a ON ca.act_id=a.act_id LEFT OUTER JOIN act_schedule AS asch ON asch.grp_id=" . $_REQUEST['grp_id'] . " AND asch.cont_id=" . $_REQUEST['cont_id'] . " AND asch.act_id=a.act_id LEFT OUTER JOIN groups AS g ON g.grp_id=" . $_REQUEST['grp_id'] . " LEFT OUTER JOIN contacts AS c ON c.ContactID=" . $_REQUEST['cont_id'] . " LEFT OUTER JOIN activity_guides AS ag ON asch.ag_id=ag.ag_id LEFT OUTER JOIN activity_destination AS ad ON asch.ad_id=ad.ad_id LEFT OUTER JOIN activity_vendors AS av ON asch.av_id=av.av_id LEFT OUTER JOIN act_therapist AS thr ON asch.ath_id=thr.ath_id LEFT OUTER JOIN act_th_type AS thrt ON asch.atht_id=thrt.atht_id LEFT OUTER JOIN act_boats AS acb ON asch.act_boat_id=acb.act_boat_id WHERE cp.cont_id=" . $_REQUEST['cont_id'] . " AND c.ContactID=" . $_REQUEST['cont_id'] . " AND g.grp_id=" . $_REQUEST['grp_id'] . " AND a.act_id=" . $_REQUEST['act_id'] . " ";


        $Query = "SELECT cp.conp_id, cp.cont_id, ca.act_id, a.act_name, g.grp_id, g.GroupName, c.cont_fname, c.cont_lname, asch.asch_id, asch.cont_id AS aschcont_id, asch.asch_start_date, asch.asch_end_date, asch.createdDate, asch.updatedDate, asch.av_confirmed, asch.av_confirming_person, asch.av_date, asch.av_time, asch.asch_duration, asch.act_boat_id, ag.ag_id, ag.ag_name, ad.ad_id, ad.ad_name, av.av_id, av.av_name, thr.ath_id, thr.ath_name, thrt.atht_id, thrt.atht_name FROM contact_profiles AS cp LEFT OUTER JOIN contact_activities AS ca ON cp.conp_id=ca.conp_id LEFT OUTER JOIN activities AS a ON ca.act_id=a.act_id LEFT OUTER JOIN act_schedule AS asch ON asch.grp_id=" . $_REQUEST['grp_id'] . " AND asch.cont_id=" . $_REQUEST['cont_id'] . " AND asch.act_id=a.act_id LEFT OUTER JOIN groups AS g ON g.grp_id=" . $_REQUEST['grp_id'] . " LEFT OUTER JOIN contacts AS c ON c.ContactID=" . $_REQUEST['cont_id'] . " LEFT OUTER JOIN activity_guides AS ag ON asch.ag_id=ag.ag_id LEFT OUTER JOIN activity_destination AS ad ON asch.ad_id=ad.ad_id LEFT OUTER JOIN activity_vendors AS av ON asch.av_id=av.av_id LEFT OUTER JOIN act_therapist AS thr ON asch.ath_id=thr.ath_id LEFT OUTER JOIN act_th_type AS thrt ON asch.atht_id=thrt.atht_id LEFT OUTER JOIN act_boats AS acb ON asch.act_boat_id=acb.act_boat_id WHERE c.ContactID=" . $_REQUEST['cont_id'] . " AND g.grp_id=" . $_REQUEST['grp_id'] . " AND a.act_id=" . $_REQUEST['act_id'] . " ";

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
if (isset($_REQUEST['show'])) {
   // $Query = "SELECT cp.conp_id, cp.cont_id, ca.act_id, a.act_name, g.grp_id, g.GroupName, c.cont_fname, c.cont_lname, asch.asch_id, asch.cont_id AS aschcont_id, asch.asch_start_date, asch.asch_end_date, asch.createdDate, asch.updatedDate, asch.av_confirmed, asch.av_confirming_person, asch.av_date, asch.av_time, asch.asch_duration, abn.act_boat_name, ag.ag_id, ag.ag_name, ad.ad_id, ad.ad_name, av.av_id, av.av_name, thr.ath_id, thr.ath_name, thrt.atht_id, thrt.atht_name FROM  contact_profiles AS cp LEFT OUTER JOIN contact_activities AS ca ON cp.conp_id=ca.conp_id LEFT OUTER JOIN activities AS a ON ca.act_id=a.act_id LEFT OUTER JOIN act_schedule AS asch ON asch.grp_id=" . $_REQUEST['grp_id'] . " AND asch.cont_id=" . $_REQUEST['cont_id'] . " AND asch.act_id=a.act_id LEFT OUTER JOIN groups AS g ON g.grp_id=" . $_REQUEST['grp_id'] . " LEFT OUTER JOIN contacts AS c ON c.ContactID=" . $_REQUEST['cont_id'] . " LEFT OUTER JOIN activity_guides AS ag ON asch.ag_id=ag.ag_id LEFT OUTER JOIN activity_destination AS ad ON asch.ad_id=ad.ad_id LEFT OUTER JOIN activity_vendors AS av ON asch.av_id=av.av_id LEFT OUTER JOIN act_therapist AS thr ON asch.ath_id=thr.ath_id LEFT OUTER JOIN act_th_type AS thrt ON asch.atht_id=thrt.atht_id LEFT OUTER JOIN act_boats AS abn ON asch.act_boat_id=abn.act_boat_id WHERE cp.cont_id=" . $_REQUEST['cont_id'] . " AND c.ContactID=" . $_REQUEST['cont_id'] . " AND g.grp_id=" . $_REQUEST['grp_id'] . " AND a.act_id=" . $_REQUEST['act_id'] . " ";

    
    $Query = "SELECT cp.conp_id, cp.cont_id, ca.act_id, a.act_name, g.grp_id, g.GroupName, c.cont_fname, c.cont_lname, asch.asch_id, asch.cont_id AS aschcont_id, asch.asch_start_date, asch.asch_end_date, asch.createdDate, asch.updatedDate, asch.av_confirmed, asch.av_confirming_person, asch.av_date, asch.av_time, asch.asch_duration, abn.act_boat_name, ag.ag_id, ag.ag_name, ad.ad_id, ad.ad_name, av.av_id, av.av_name, thr.ath_id, thr.ath_name, thrt.atht_id, thrt.atht_name FROM  contact_profiles AS cp LEFT OUTER JOIN contact_activities AS ca ON cp.conp_id=ca.conp_id LEFT OUTER JOIN activities AS a ON ca.act_id=a.act_id LEFT OUTER JOIN act_schedule AS asch ON asch.grp_id=" . $_REQUEST['grp_id'] . " AND asch.cont_id=" . $_REQUEST['cont_id'] . " AND asch.act_id=a.act_id LEFT OUTER JOIN groups AS g ON g.grp_id=" . $_REQUEST['grp_id'] . " LEFT OUTER JOIN contacts AS c ON c.ContactID=" . $_REQUEST['cont_id'] . " LEFT OUTER JOIN activity_guides AS ag ON asch.ag_id=ag.ag_id LEFT OUTER JOIN activity_destination AS ad ON asch.ad_id=ad.ad_id LEFT OUTER JOIN activity_vendors AS av ON asch.av_id=av.av_id LEFT OUTER JOIN act_therapist AS thr ON asch.ath_id=thr.ath_id LEFT OUTER JOIN act_th_type AS thrt ON asch.atht_id=thrt.atht_id LEFT OUTER JOIN act_boats AS abn ON asch.act_boat_id=abn.act_boat_id WHERE c.ContactID=" . $_REQUEST['cont_id'] . " AND g.grp_id=" . $_REQUEST['grp_id'] . " AND a.act_id=" . $_REQUEST['act_id'] . "  LIMIT 1";

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
            <!--<input type="text" class="form-control form-cascade-control nav-input-search" size="20" placeholder="Search through site" />
            <span class="input-icon fui-search"></span>-->
        </div>
        <h3 class="page-header"> Manage Adventure Schedules <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b>Manage Adventure Schedules: </b> You can manage your Adventure schedules here </p>
        </blockquote>
    </div>
</div>
<?php if (isset($_REQUEST['action'])) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-cascade">
                <div class="panel-heading">
                    <h3 class="panel-title text-primary">
                        <?php print($formHead); ?> - 
                        <?php 
                            $Query = "SELECT
                            c.ContactFirstName, c.ContactLastName, 
                            g.GroupName,
                            p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, p.Package_Max_Days
                            FROM contacts AS c, groups AS g, packages AS p
                            WHERE 
                            c.ContactID=".$_REQUEST['cont_id']." AND
                            g.grp_id=".$_REQUEST['grp_id']." AND 
                            p.Pms_Package_ID=".$_REQUEST['pms_pak_id']."  LIMIT 1";
                            $nResult = mysql_query($Query);
                            if (mysql_num_rows($nResult) >= 1) {
                                while ($row = mysql_fetch_row($nResult)) {
                                    echo $row[0].' '.$row[1].' - '.$row[2].' - '.$row[3].' - '.calendarDateConver2($row[4]).' - '.calendarDateConver2($row[5]);
                                    $_SESSION['pak_start'] = calendarDateConver2($row[4]);
                                    $_SESSION['pak_end'] = calendarDateConver2($row[5]);
                                    }
                            }
                        ?>
                   </h3>
                </div>
                <div class="panel-body panel-border">
                    <form name="frm" id="frm" method="post" class="form-horizontal" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" role="form">
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Activity Name</label>
                            <div class="col-lg-10 col-md-9">
                                <?php echo @returnName('act_name', 'activities', 'act_id', $_REQUEST['act_id']); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Activity Date</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 required datetimepicker" placeholder="Activity Date..." id="asch_start_datetime datepicker" name="asch_start_date" value="<?php echo (($asch_start_date != '') ? calendarDateConver2($asch_start_date) : calendarDateConver2($_REQUEST['date'])); ?>" style="width:240px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Start Time</label>
                            <div class="col-sm-3">
                                <div class="input-group bootstrap-timepicker">
                                    <input id="timepicker2" type="text" class="form-control" name="asch_start_time" value="<?php echo @$asch_start_time; ?>">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>
                                <p> Time Scheme: 24 Hour System </p>
                            </div>
                        </div>
                        <?php if ((isset($_REQUEST['act_id'])) && ($_REQUEST['act_id'] != 1)) { ?>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">End Time</label>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        <input id="timepicker3" type="text" class="form-control" name="asch_end_time" value="<?php echo @$asch_end_time; ?>">
                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                    </div>
                                    <p> Time Scheme: 24 Hour System </p>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ((isset($_REQUEST['act_id'])) && ($_REQUEST['act_id'] == 2 || $_REQUEST['act_id'] == 7 || $_REQUEST['act_id'] == 11)) { ?>
                            <div class="form-group" id="set_guides">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Boat Name</label>
                                <div class="col-lg-10 col-md-9">
                                    <select data-placeholder="Choose a Boat..." name="act_boat_id" id="act_boat_id" class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2">
                                        <?php FillSelected(" act_boats ", "act_boat_id", "act_boat_name", $act_boat_id); ?>
                                    </select>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ((isset($_REQUEST['act_id'])) && ($_REQUEST['act_id'] != 1)) { ?>
                            <div class="form-group" id="set_guides">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Guide</label>
                                <div class="col-lg-10 col-md-9">
                                    <select data-placeholder="Choose a Guide..." name="ag_id" id="ag_id" class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2">
                                        <?php echo FillSelected(" activity_guide_lov AS agl, activity_guides AS ag WHERE agl.ag_id=ag.ag_id AND agl.act_id=" . $_REQUEST['act_id'] . " ", "agl.ag_id", "ag.ag_name", (($ag_id > 0) ? $ag_id : @$_REQUEST['act_id'])); ?>
                                    </select>
                                    <p> NOTE: If you do not see any Guides, then assign Guides to current Activity. </p>
                                </div>
                            </div>
                            <div class="form-group" id="set_guides">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Vendor</label>
                                <div class="col-lg-10 col-md-9">
                                    <select data-placeholder="Choose a Vendor..." name="av_id" id="av_id" class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2">
                                        <?php FillSelected(" activity_vendors ", "av_id", "av_name", $av_id); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="set_guides">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Is Vendor Confirmed</label>
                                <div class="col-lg-10 col-md-9">
                                    <select data-placeholder="Is Vendor Confirmed..." name="av_confirmed" id="av_confirmed" class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2">
                                        <option value="yes" <?php echo(($av_confirmed == 'yes') ? "selected" : ''); ?>>Yes</option>
                                        <option value="no" <?php echo(($av_confirmed == 'no') ? "selected" : ''); ?>>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="set_guides">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Vendor Confirming Person</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" class="form-control form-cascade-control input_wid70" placeholder="Vendor Confirming Person Name..." id="asch_end_datetime" name="av_confirming_person" value="<?php echo $av_confirming_person; ?>" style="width:240px;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Vendor Confirmed Date</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" class="form-control form-cascade-control input_wid70 datetimepicker" placeholder="Vendor Confirming Date..." id="av_date" name="av_date" value="<?php echo(($av_date != '') ? calendarDateConver2($av_date) : ''); ?>" style="width:240px;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Vendor Confirmed Time</label>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        <input id="timepicker4" type="text" class="form-control" name="av_time" id="av_time" value="<?php echo $av_time; ?>">
                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                    </div>
                                    <p> Time Scheme: 24 Hour System </p>
                                </div>
                            </div>
                            <div class="form-group" id="set_guides">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Destination</label>
                                <div class="col-lg-10 col-md-9">
                                    <select data-placeholder="Choose a Destination..." name="ad_id" id="ad_id" class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2">
                                        <?php FillSelected(" activity_destination ", "ad_id", "ad_name", $ad_id); ?>
                                    </select>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Duration</label>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        <select data-placeholder="Duration..." name="asch_duration" id="asch_duration" class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2">
                                            <option value="30" <?php echo (($asch_duration == '30') ? "selected" : '') ?>> 30 Minutes </option>
                                            <option value="50" <?php echo ((@$asch_duration == '50' || $asch_duration == '') ? "selected" : '') ?>> 50 Minutes </option>
                                            <option value="80" <?php echo (($asch_duration == '80') ? "selected" : '') ?>> 80 Minutes </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

<!--
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">End Time</label>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        <input id="timepicker3" type="text" class="form-control" name="asch_end_time" value="<?php echo @$asch_end_time; ?>">
                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>

                                    </div>
                                    <p> Please add end time for Calendar perpose. eg start time: 14:00:00, Duration: 80 Minutes, then End time would be : 15:20:00 </p>
                                    <p> Time Scheme: 24 Hour System </p>
                                </div>
                            </div>
-->

                            <div class="form-group" id="set_guides">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Therapist</label>
                                <div class="col-lg-10 col-md-9">
                                    <select data-placeholder="Choose a Therapist..." name="ath_id" id="ath_id" class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2">
                                        <?php FillSelected("act_therapist", "ath_id", "ath_name", $ath_id); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="set_guides">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Therapy Type</label>
                                <div class="col-lg-10 col-md-9">
                                    <select data-placeholder="Choose a Therapy Type..." name="atht_id" id="atht_id" class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2">
                                        <?php echo FillSelected("act_th_type", "atht_id", "atht_name", $atht_id); ?>
                                    </select>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                            <div class="col-lg-10 col-md-9">
                                <input type="hidden" name="act_id" value="<?php echo @$_REQUEST['act_id']; ?>">
                                <?php if ($_REQUEST['action'] == 1) { ?>
                                    <button type="submit" name="btnAdd" class="btn btn-primary btn-animate-demo">Submit</button> | 
                                <?php } else { ?>
                                    <button type="submit" name="btnUpdate" class="btn btn-primary btn-animate-demo">Update</button> | 
                                    <button type="submit" name="btnDelete" class="btn btn-primary btn-animate-demo">Delete</button> | 
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

    <?php
    $return_array = array();
    $event_array;
    ?>
    
    <div class="row" style="width: 0px;height: 0px;display: none;visibility: hidden;">
        <div class="col-md-12">
            <div class="<?php print($class); ?>"><?php print($strMSG); ?></div>
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="">
                            <ul class="nav faq-list">
                                <?php
                                //if(isset($_REQUEST['act_id']) && $_REQUEST['act_id']==1){
                                    $extra_query1 = " AND cac.act_id = " . $_REQUEST['act_id'] . " ";
                                    $extra_query2 = " AND p.Pms_Package_ID = " . $_REQUEST['pms_pak_id'] . " ";
                                //} else {
                                    //$extra_query1 = '';
                                    //$extra_query2 = '';
                                //}    
                                $counter1 = 0;
                                $Query1 = "
SELECT c.ContactID, c.grp_id, 
g.Contact_ID, g.GroupName,
(SELECT cf.ContactFirstName FROM contacts AS cf WHERE cf.ContactID=g.Contact_ID) AS ContactFirstName, 
(SELECT cl.ContactLastName FROM contacts AS cl WHERE cl.ContactID=g.Contact_ID) AS ContactLastName, p.Pms_Package_ID, p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, cpro.conp_id, cac.act_id
FROM  contacts AS c
LEFT OUTER JOIN groups AS g ON c.grp_id=g.grp_id
LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID
LEFT OUTER JOIN contact_profiles AS cpro ON c.ContactID=cpro.cont_id
LEFT OUTER JOIN contact_activities AS cac ON cpro.conp_id=cac.conp_id
WHERE c.grp_id!=0 AND c.grp_id!='' 
AND p.Arrival_Start_Date>='" . $_SESSION['pk_from'] . "' 
AND cac.act_id!=''  
".$extra_query1." 
 
GROUP BY  c.grp_id ORDER BY p.Arrival_Start_Date ASC";
// AND cac.act_id = " . $_REQUEST['act_id'] . "

                                $count1 = mysql_num_rows(mysql_query($Query1));
                                $rs1 = mysql_query($Query1);
                                if (mysql_num_rows($rs1) > 0) {
                                    while ($row1 = mysql_fetch_object($rs1)) {
                                        $counter1++;
                                        ?>
                                        <?php
                                        $counter2 = 0;
                                        $Query2 = "SELECT c.ContactID, c.grp_id, c.ContactFirstName, c.ContactLastName FROM contacts AS c WHERE c.grp_id=" . $row1->grp_id . " ";
                                        $count2 = mysql_num_rows(mysql_query($Query2));
                                        $rs2 = mysql_query($Query2);
                                        if (mysql_num_rows($rs2) > 0) {
                                            ?>
                                            <li> 
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row1->grp_id ?>">
                                                    <i class="fa fa-plus-square"></i>  <?php echo $row1->GroupName . ' | ' . $row1->ContactFirstName . ' ' . $row1->ContactLastName . ' | ' . $row1->Package_Name . ' | ' . @calendarDateConver2($row1->Arrival_Start_Date) . ' | ' . @calendarDateConver2($row1->Arrival_End_Date); ?> 
                                                </a>
                                                <ul>
                                                    <li id="collapse<?php echo $row1->grp_id ?>" class="panel-collapse collapse" style="list-style-type:none;">
                                                        <p>
                                                        <table class="table users-table table-condensed table-hover table-striped display dataTable">
                                                            <?php
                                                            while ($row2 = mysql_fetch_object($rs2)) {
                                                                $counter2++;
                                                                ?>
                                                                <?php
                                                                //if(isset($_REQUEST['act_id']) && $_REQUEST['act_id']==1){
                                                                    $extra_query = " AND a.act_id = ".$_REQUEST['act_id']." ";
                                                                //} else {
                                                                    //$extra_query = '';
                                                                //}    
                                                                $counter3 = 0;
                                                                $Query3 = "SELECT cp.conp_id, cp.cont_id, ca.act_id, a.act_name, g.grp_id, g.GroupName, c.cont_fname, c.cont_lname, asch.asch_id, asch.cont_id AS aschcont_id, asch.asch_start_date, asch.asch_end_date, asch.asch_duration, asch.av_confirmed, ag.ag_name, asch.av_confirming_person, asch.av_date, asch.av_time, abn.act_boat_name, ad.ad_name, av.av_name, thr.ath_id, thr.ath_name, thrt.atht_id, thrt.atht_name FROM  contact_profiles AS cp LEFT OUTER JOIN contact_activities AS ca ON cp.conp_id=ca.conp_id LEFT OUTER JOIN activities AS a ON ca.act_id=a.act_id LEFT OUTER JOIN act_schedule AS asch ON asch.grp_id=" . $row1->grp_id . " AND asch.cont_id=" . $row2->ContactID . " AND asch.act_id=a.act_id LEFT OUTER JOIN groups AS g ON g.grp_id=" . $row1->grp_id . " LEFT OUTER JOIN contacts AS c ON c.ContactID=" . $row2->ContactID . " LEFT OUTER JOIN activity_guides AS ag ON asch.ag_id=ag.ag_id LEFT OUTER JOIN activity_destination AS ad ON asch.ad_id=ad.ad_id LEFT OUTER JOIN activity_vendors AS av ON asch.av_id=av.av_id LEFT OUTER JOIN act_therapist AS thr ON asch.ath_id=thr.ath_id LEFT OUTER JOIN act_th_type AS thrt ON asch.atht_id=thrt.atht_id LEFT OUTER JOIN act_boats AS abn ON asch.act_boat_id=abn.act_boat_id WHERE cp.cont_id=" . $row2->ContactID . " AND a.act_id !=''  AND asch.asch_id!='' ".$extra_query." ORDER BY a.act_order ASC";
// AND a.act_id = ".$_REQUEST['act_id']."
                                                                $count3 = mysql_num_rows(mysql_query($Query3));
                                                                $rs3 = mysql_query($Query3);
                                                                if (mysql_num_rows($rs3) > 0) {
                                                                    ?>
                                                                    <thead>
                                                                        <tr><th class="visible-xs visible-sm visible-md visible-lg" colspan="100%" style="text-align: center; border: 0px solid #ddd !important;"> &nbsp; </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg" colspan="100%" style="text-align: center; border: 0px solid #ddd !important;">
                                                                                <span style="text-decoration: underline;"> Guest Name: <strong><?php echo $row2->ContactFirstName . ' ' . $row2->ContactLastName; ?></strong></span>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg"> Activity </th>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg"> Start </th>
                                                                            <th class="visible-sm visible-md visible-lg"> End </th>
                                                                            <th class="visible-sm visible-md visible-lg"> Guider<br/> Therapist </th>
                                                                            <th class="visible-sm visible-md visible-lg"> Destination<br/> Therapist Type </th>
                                                                            <th class="visible-sm visible-md visible-lg"> Vendor </th>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg"> Scheduled </th>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg" style="text-align:center"> Action </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <?php
                                                                    while ($row3 = mysql_fetch_object($rs3)) {
                                                                        $activity = '';
                                                                        $counter3++;
                                                                        $act_name = $row3->act_name;
                                                                        $ag_id = @$row3->ag_id;
                                                                        $ad_id = @$row3->ad_id;
                                                                        $av_id = @$row3->av_id;
                                                                        $av_confirmed = $row3->av_confirmed;
                                                                        $av_confirming_person = $row3->av_confirming_person;
                                                                        $av_date = calendarDateConver2($row3->av_date);
                                                                        $av_time = $row3->av_time;
                                                                        $ath_id = $row3->ath_id;
                                                                        $atht_id = $row3->atht_id;
                                                                        $asch_start_date = $row3->asch_start_date;
                                                                        $asch_end_date = $row3->asch_end_date;
                                                                        $asch_duration = $row3->asch_duration;
                                                                        $asch_start_time = calendarTimeConver1($row3->asch_start_date);
                                                                        $asch_end_time = calendarTimeConver1($row3->asch_end_date);


                                                                        $activity .= PHP_EOL;
                                                                        if ($row3->act_name != '') {
                                                                            $activity .= ' AC= ' . $row3->act_name . PHP_EOL;
                                                                        }
                                                                        if ($row3->GroupName != '') {
                                                                            $activity .= 'G.N= ' . $row3->GroupName . PHP_EOL;
                                                                        }
                                                                        if ($row3->cont_fname != '') {
                                                                            $activity .= 'C.N= ' . $row3->cont_fname . ' ' . $row3->cont_lname . PHP_EOL;
                                                                        }
                                                                        if ($row3->asch_start_date != '') {
                                                                            $activity .= 'DA= ' . calendarDateConver2($row3->asch_start_date) . PHP_EOL;
                                                                        }
                                                                        if ($asch_start_time != '' && $asch_start_time != '00:00:00') {
                                                                            $activity .= 'S.T= ' . $asch_start_time . PHP_EOL;
                                                                        }
                                                                        if ($asch_end_time != '' && $asch_end_time != '00:00:00') {
                                                                            $activity .= 'E.T= ' . $asch_end_time . PHP_EOL;
                                                                        }
                                                                        if ($asch_duration != '' && $asch_duration != 0) {
                                                                            $activity .= 'DU= ' . $asch_duration . ' Minutes '. PHP_EOL;
                                                                        }
                                                                        if ($row3->ag_name != '') {
                                                                            $activity .= 'GU= ' . $row3->ag_name . PHP_EOL;
                                                                        }
                                                                        if ($row3->ad_name != '') {
                                                                            $activity .= 'DE= ' . $row3->ad_name . PHP_EOL;
                                                                        }
                                                                        if ($row3->av_name != '') {
                                                                            $activity .= 'V.N= ' . $row3->av_name . PHP_EOL;
                                                                        }
                                                                        if ($row3->av_confirmed != '') {
                                                                            $activity .= 'V.C= ' . $row3->av_confirmed . PHP_EOL;
                                                                        }
                                                                        if ($row3->av_confirming_person != '') {
                                                                            $activity .= 'V.P= ' . $row3->av_confirming_person . PHP_EOL;
                                                                        }
                                                                        if ($av_date != '') {
                                                                            $activity .= 'V.D= ' . $av_date . PHP_EOL;
                                                                        }
                                                                        if ($av_time != '' && $av_time != '0:00:00') {
                                                                            $activity .= 'V.T= ' . $row3->av_time . PHP_EOL;
                                                                        }
                                                                        if ($row3->ath_name != '') {
                                                                            $activity .= 'T.N= ' . $row3->ath_name . PHP_EOL;
                                                                        }
                                                                        if ($row3->atht_name != '') {
                                                                            $activity .= 'T.T= ' . $row3->atht_name . PHP_EOL;
                                                                        }
                                                                        if ($row3->act_boat_name != '') {
                                                                            $activity .= 'B.N= ' . $row3->act_boat_name . PHP_EOL;
                                                                        }
                                                                        $event_array['id'] = $row3->asch_id;
                                                                        $event_array['title'] = $activity;
                                                                        $event_array['start'] = $row3->asch_start_date;
                                                                        $event_array['end'] = $row3->asch_end_date;
                                                                        //$event_array['description'] = 'Des: '.$activity;
                                                                        
                                                                        $event_array['allDay'] = false;
                                                                        $event_array['url'] = $_SERVER['PHP_SELF'] . "?action=2&sch=1&cont_id=" . $row3->cont_id . "&grp_id=" . $row3->grp_id . "&act_id=" . $row3->act_id . "&asch_id=" . $row3->asch_id."&pms_pak_id=".$row1->Pms_Package_ID;

                                                                        array_push($return_array, $event_array);
                                                                        ?>
                                                                        <tr>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php echo $row3->act_name; ?> </td>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php echo(($row3->asch_start_date != '') ? calendarDateConver2($row3->asch_start_date) : ''); ?></td>
                                                                            <td class="visible-sm visible-md visible-lg"><?php echo(($row3->asch_end_date != '') ? calendarDateConver2($row3->asch_end_date) : ''); ?></td>
                                                                            <td class="visible-sm visible-md visible-lg"><?php echo(($row3->act_id == 1) ? $row3->ath_name : $row3->ag_name); ?></td>
                                                                            <td class="visible-sm visible-md visible-lg"><?php echo(($row3->act_id == 1) ? $row3->atht_name : $row3->ad_name); ?></td>
                                                                            <td class="visible-sm visible-md visible-lg"><?php echo $row3->av_name; ?> </td>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                                                <?php
                                                                                if ($row3->asch_id != 0 || $row3->asch_id != '') {
                                                                                    echo "Scheduled - <a href=" . $_SERVER['PHP_SELF'] . "?action=2&sch=1&cont_id=" . $row3->cont_id . "&grp_id=" . $row3->grp_id . "&act_id=" . $row3->act_id . "&asch_id=" . $row3->asch_id . ">Edit</a>";
                                                                                } else {
                                                                                    echo "<a href=" . $_SERVER['PHP_SELF'] . "?action=1&sch=0&cont_id=" . $row3->cont_id . "&grp_id=" . $row3->grp_id . "&act_id=" . $row3->act_id . "&asch_id=" . $row3->asch_id . "> Not Scheduled </a>";
                                                                                }
                                                                                ?>    
                                                                            </td>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg" style="width:50px; text-align: center;">
                                                                                <?php if ($row3->asch_id != 0 && $row3->asch_id != '') { ?>
                                                                                    <div class="tooltips"><a href="<?php echo $_SERVER['PHP_SELF'] . "?show=1&cont_id=" . $row3->cont_id . "&grp_id=" . $row3->grp_id . "&act_id=" . $row3->act_id . "&asch_id=" . $row3->asch_id; ?>" data-original-title="See Details" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-eye"></i></a></div>
                            <?php } ?>    
                                                                            </td>
                                                                        </tr>
                                                                    <?php
                                                                    }
                                                                } else {
                                                                    //print('<tr><td colspan="100%" align="center"><strong> 1 Record Not Found! </strong></td></tr>');
                                                                }
                                                                ?>
                                                            <?php
                                                            }
                                                        } else {
                                                            //print('<tr><td colspan="100%" align="center"><strong> 2 Record Not Found! </strong></td></tr>');
                                                        }
                                                        ?>
                                                    </table>
                                                    </p>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php
                                    }
                                } else {
                                    //print('<tr><td colspan="100%" align="center"><strong> 3 Record Not Found! </strong></td></tr>');
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>	
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <?php
//            echo '<pre>';
//            echo json_encode($return_array);
//            echo '</pre>';
            ?>
            <div class="col-md-3" style="width: 0px;height: 0px;display: none;visibility: hidden;">
                <input type="text" name="createEvent" class="form-control" id="write-event" >
            </div>
            <div>
                <div id='calendar'></div>
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
                        <?php if (@$GroupName != '') { ?>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Group Name</label>
                                <div class="col-lg-10 col-md-9 det-display"><?php echo @$GroupName; ?></div>
                            </div>
    <?php } ?>
                        <?php if (@$cont_fname != '') { ?>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Guest Name</label>
                                <div class="col-lg-10 col-md-9 det-display"><?php echo @$cont_fname . ' ' . @$cont_lname; ?></div>
                            </div>
    <?php } ?>
                        <?php if (@$act_name != '') { ?>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Activity Name</label>
                                <div class="col-lg-10 col-md-9 det-display"><?php echo @$act_name; ?></div>
                            </div>
    <?php } ?>
                        <?php if (@$asch_start_date != '') { ?>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Activity Date</label>
                                <div class="col-lg-10 col-md-9 det-display"><?php echo @calendarDateConver2($asch_start_date); ?></div>
                            </div>
    <?php } ?>
                        <?php if (@$asch_start_time != '') { ?>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Activity Start Time</label>
                                <div class="col-lg-10 col-md-9 det-display"><?php echo @$asch_start_time; ?></div>
                            </div>
    <?php } ?>
                        <?php if (@$asch_end_time != '' && @$asch_end_time != '00:00:00') { ?>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Activity End Time</label>
                                <div class="col-lg-10 col-md-9 det-display"><?php echo @$asch_end_time; ?></div>
                            </div>
    <?php } ?>
                        <?php if (@$asch_duration != '' && @$asch_duration != 0) { ?>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Activity Duration</label>
                                <div class="col-lg-10 col-md-9 det-display"><?php echo @$asch_duration; ?></div>
                            </div>
    <?php } ?>
                        <?php if (@$ag_name != '') { ?>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Activity Guider</label>
                                <div class="col-lg-10 col-md-9 det-display"><?php echo @$ag_name; ?></div>
                            </div>
    <?php } ?>
                        <?php if (@$ad_name != '') { ?>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Activity Destination</label>
                                <div class="col-lg-10 col-md-9 det-display"><?php echo @$ad_name; ?></div>
                            </div>
    <?php } ?>
                        <?php if (@$av_name != '') { ?>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Activity Vendor</label>
                                <div class="col-lg-10 col-md-9 det-display"><?php echo @$av_name; ?></div>
                            </div>
    <?php } ?>
                        <?php if (@$av_confirmed != '') { ?>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Is Vender Confirmed?</label>
                                <div class="col-lg-10 col-md-9 det-display"><?php echo @$av_confirmed; ?></div>
                            </div>
    <?php } ?>
                        <?php if (@$av_confirming_person != '') { ?>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Vendor Confirming Person</label>
                                <div class="col-lg-10 col-md-9 det-display"><?php echo @$av_confirming_person; ?></div>
                            </div>
    <?php } ?>
                        <?php if (@calendarDateConver2($av_date) != '') { ?>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Vendor Confirmed Date</label>
                                <div class="col-lg-10 col-md-9 det-display"><?php echo @calendarDateConver2($av_date); ?></div>
                            </div>
    <?php } ?>
                        <?php if (@$av_time != '') { ?>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-2 control-label">Vendor Confirmed Time</label>
                                <div class="col-lg-10 col-md-9 det-display"><?php echo @$av_time; ?></div>
                            </div>
    <?php } ?>
                        <?php if (@$ath_name != '') { ?>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Therapist</label>
                                <div class="col-lg-10 col-md-9 det-display"><?php echo @$ath_name; ?></div>
                            </div>
    <?php } ?>
                        <?php if (@$atht_name != '') { ?>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Therapy Type</label>
                                <div class="col-lg-10 col-md-9 det-display"><?php echo @$atht_name; ?></div>
                            </div>
    <?php } ?>
                        <?php if (@$act_boat_name != '') { ?>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Boat Name</label>
                                <div class="col-lg-10 col-md-9 det-display"><?php echo @$act_boat_name; ?></div>
                            </div>
    <?php } ?>
                        <?php if (@$createdDate != '') { ?>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Created</label>
                                <div class="col-lg-10 col-md-9 det-display"><?php echo @$createdDate; ?></div>
                            </div>
    <?php } ?>
                        <?php if (@$updatedDate != '') { ?>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Updated</label>
                                <div class="col-lg-10 col-md-9 det-display"><?php echo @$updatedDate; ?></div>
                            </div>
    <?php } ?>
                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                            <div class="col-lg-10 col-md-9">
                                <button type="button" name="btnBack" class="btn btn-default btn-animate-demo" onclick="javascript: window.location = '<?php print(@$_SERVER['PHP_SELF']); ?>';">Back</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>













<div style="visibility: hidden; display: none;">
                                <?php
                                $pkg_completed = array();
                                $counter1 = 0;
                                $compl = 0;
                                $ncompl = 0;
                                $Query1 = "
                                SELECT c.ContactID, c.grp_id, 
                                g.Contact_ID, g.GroupName,
                                (SELECT cf.ContactFirstName FROM contacts AS cf WHERE cf.ContactID=g.Contact_ID) AS ContactFirstName, 
                                (SELECT cl.ContactLastName FROM contacts AS cl WHERE cl.ContactID=g.Contact_ID) AS ContactLastName, p.Pms_Package_ID, p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, cpro.conp_id, cac.act_id
                                FROM  contacts AS c
                                LEFT OUTER JOIN groups AS g ON c.grp_id=g.grp_id
                                LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID
                                LEFT OUTER JOIN contact_profiles AS cpro ON c.ContactID=cpro.cont_id
                                LEFT OUTER JOIN contact_activities AS cac ON cpro.conp_id=cac.conp_id
                                WHERE c.grp_id!=0 AND c.grp_id!='' AND cac.act_id!=''  
                                AND p.Arrival_Start_Date>='" . $_SESSION['pk_from'] . "' 
                                GROUP BY  c.grp_id ORDER BY p.Arrival_Start_Date ASC";
                                
                                $limit1 = $_SESSION['limit_of_rec'];
                                $start1 = $p->findStart($limit1);
                                $count1 = mysql_num_rows(mysql_query($Query1));
                                $pages1 = $p->findPages($count1, $limit1);
                                $rs1 = mysql_query($Query1 . " LIMIT " . $start1 . ", " . $limit1);
                                if (mysql_num_rows($rs1) > 0) {
                                    while ($row1 = mysql_fetch_object($rs1)) {
                                        $compl = 0;
                                        $ncompl = 0;
                                        $counter1++;
                                ?>
                                        <?php
                                        $counter2 = 0;
                                        $total11=0;
                                        $total22=0;
                                        
                                        $Query2 = "SELECT c.ContactID, c.grp_id, c.ContactFirstName, c.ContactLastName FROM contacts AS c WHERE c.grp_id=" . $row1->grp_id . " ";
                                        $count2 = mysql_num_rows(mysql_query($Query2));
                                        $rs2 = mysql_query($Query2);
                                        if (mysql_num_rows($rs2) > 0) {
                                            ?>
                                                        <table class="table users-table table-condensed table-hover table-striped display dataTable">
                                                            <?php
                                                            while ($row2 = mysql_fetch_object($rs2)) {
                                                                $counter2++;
                                                                ?>
                                                                <?php
                                                                $total_completed = 0;
                                                                $counter3 = 0;
                                                                $Query3 = "SELECT cp.conp_id, cp.cont_id, ca.act_id, a.act_name, g.grp_id, g.GroupName, c.cont_fname, c.cont_lname, asch.asch_id, asch.cont_id AS aschcont_id, asch.asch_start_date, asch.asch_end_date, asch.asch_duration, asch.asch_email_counter, ag.ag_name, ad.ad_name, av.av_name, abn.act_boat_name, thr.ath_id, thr.ath_name, thrt.atht_id, thrt.atht_name FROM  contact_profiles AS cp LEFT OUTER JOIN contact_activities AS ca ON cp.conp_id=ca.conp_id LEFT OUTER JOIN activities AS a ON ca.act_id=a.act_id LEFT OUTER JOIN act_schedule AS asch ON asch.grp_id=" . $row1->grp_id . " AND asch.cont_id=" . $row2->ContactID . " AND asch.act_id=a.act_id LEFT OUTER JOIN groups AS g ON g.grp_id=" . $row1->grp_id . " LEFT OUTER JOIN contacts AS c ON c.ContactID=" . $row2->ContactID . " LEFT OUTER JOIN activity_guides AS ag ON asch.ag_id=ag.ag_id LEFT OUTER JOIN activity_destination AS ad ON asch.ad_id=ad.ad_id LEFT OUTER JOIN activity_vendors AS av ON asch.av_id=av.av_id LEFT OUTER JOIN act_therapist AS thr ON asch.ath_id=thr.ath_id LEFT OUTER JOIN act_th_type AS thrt ON asch.atht_id=thrt.atht_id LEFT OUTER JOIN act_boats AS abn ON asch.act_boat_id=abn.act_boat_id WHERE ( cp.cont_id=" . $row2->ContactID . " OR  asch.cont_id=" . $row2->ContactID . " ) AND a.act_id !='' GROUP BY a.act_id ORDER BY a.act_order ASC";
                                                                $count3 = mysql_num_rows(mysql_query($Query3));
                                                                $rs3 = mysql_query($Query3);
                                                                if (mysql_num_rows($rs3) > 0) {
                                                                    ?>
<!--                                                                    <thead>
                                                                        <tr>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg"> Activity </th>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg"> Scheduled </th>
                                                                        </tr>
                                                                    </thead>-->
                        <?php
                        while ($row3 = mysql_fetch_object($rs3)) {
                            $counter3++;
                            ?>
<!--                                                                        <tr>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php echo $row3->act_name; ?> </td>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                                                <?php
                                                                                if ($row3->asch_id != 0 || $row3->asch_id != '') {
                                                                                    $total_completed++;
                                                                                    $compl += 1;
                                                                                    echo "Scheduled - <a href=" . $_SERVER['PHP_SELF'] . "?action=2&sch=1&cont_id=" . $row3->cont_id . "&grp_id=" . $row3->grp_id . "&act_id=" . $row3->act_id . "&asch_id=" . $row3->asch_id . "&pms_pak_id=".$row1->Pms_Package_ID. ">Edit</a>";
                                                                                } else {
                                                                                    $ncompl += 1;
                                                                                    echo "<a href=" . $_SERVER['PHP_SELF'] . "?action=1&sch=0&cont_id=" . $row3->cont_id . "&grp_id=" . $row3->grp_id . "&act_id=" . $row3->act_id . "&asch_id=" . $row3->asch_id . "&pms_pak_id=".$row1->Pms_Package_ID. "> Not Scheduled </a>";
                                                                                }
                                                                                
                                                                                ?>    
                                                                            </td>
                                                                        </tr>-->
                                                                    <?php
                                                                    }
                                                                } else {
                                                                    //print('<tr><td colspan="100%" align="center"><strong> 1 Record Not Found! </strong></td></tr>');
                                                                    //echo "<tr><td colspan='100%' align='center'><a href=" . $_SERVER['PHP_SELF'] . "?action=1&sch=0&cont_id=" . @$row3->cont_id . "&grp_id=" . @$row3->grp_id . "&act_id=" . @$row3->act_id . "&asch_id=" . @$row3->asch_id . "&pms_pak_id=".@$row1->Pms_Package_ID. "> Not Scheduled </a></td></tr>";
                                                                }
                                                                ?>
                <?php
                }
            } else {
                //print('<tr><td colspan="100%" align="center"><strong> 2 Record Not Found! </strong></td></tr>');
            }
            ?>
                                                    </table>
        <?php
        
//        echo '<br/>Package: '.$row1->Pms_Package_ID;
//        echo '<br/>Counter1: '.$counter1;
//        echo '<br/>Count1: '.$count1;
//        echo '<br/>Count2: '.$count2;
//        echo '<br/>Count3: '.$count3;
//        echo '<br/>Completed: '.$compl;
//        echo '<br/>NotCompleted: '.$ncompl;
//        echo '<br/> Total profiles: '.($compl+$ncompl);
//        echo '<br/> Completed profiles: '.($compl);


        if( ($compl+$ncompl) == $compl ){
            //echo $row1->grp_id. ', 1';
            $pkg_completed[] .= $row1->Pms_Package_ID. ', 1';

        } else {
            //echo $row1->grp_id. ', 0';
            $pkg_completed[] .= $row1->Pms_Package_ID. ', 0';
        }

                                                                        
        }
    } else {
        //print('<tr><td colspan="100%" align="center"><strong> 3 Record Not Found! </strong></td></tr>');
    }

   
    echo '<pre>';
    for ($j = 0; $j < count($pkg_completed); $j++) {
        echo $j .'-'. $pkg_completed[$j];
        echo '<br/>';
    }
    echo '</pre>';
    
    ?>
</div>








                                

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-cascade">
                <div class="panel-heading text-primary">
                    <h3 class="panel-title"><i class="fa fa-check"></i> Massage Adventures</h3>
                </div>
                <div class="panel-body ">
                    <div class="ro">
                        <div class="col-mol-md-offset-2">
                            <form class="form-horizontal cascde-forms" method="post" action="<?php print($_SERVER['PHP_SELF']); ?>" name="frm" id="frm11" >
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-3 control-label">Select an Activity:</label>
                                    <div class="col-lg-10 col-md-9">
                                        <select name="act_id" data-placeholder="Choose an Activity..." class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2"  onChange="javascript:document.getElementById('frm11').submit()">
                                            <option value="0"></option>
                                            <?php echo FillSelected(" activities WHERE status_id = 1 AND act_id NOT IN (1,2,7,11) ", "act_id", "act_name", @$_REQUEST['act_id']);?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-3 control-label">Package Arrival Date:</label>
                                    <div class="col-lg-10 col-md-9">
                                        <input type="text" class="form-control form-cascade-control datetimepicker" value="<?php echo calendarDateConver2($_SESSION['pk_from']); ?>" id="pk_from" name="pk_from" style="width: 160px;" title="Date From " placeholder="Package Arrival Date">
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


<?php if(isset($_REQUEST['act_id']) && $_REQUEST['act_id']!=0){?>


    <div class="row">
        <div class="col-md-12">
            <div class="<?php print($class); ?>"><?php print($strMSG); ?></div>
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="">
                            <ul class="nav faq-list">
                                <?php
                                $counter1 = 0;
                                $Query1 = "
                                SELECT c.ContactID, c.grp_id, 
                                g.Contact_ID, g.GroupName,
                                (SELECT cf.ContactFirstName FROM contacts AS cf WHERE cf.ContactID=g.Contact_ID) AS ContactFirstName, 
                                (SELECT cl.ContactLastName FROM contacts AS cl WHERE cl.ContactID=g.Contact_ID) AS ContactLastName, p.Pms_Package_ID, p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, cpro.conp_id, cac.act_id
                                FROM  contacts AS c
                                LEFT OUTER JOIN groups AS g ON c.grp_id=g.grp_id
                                LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID
                                LEFT OUTER JOIN contact_profiles AS cpro ON c.ContactID=cpro.cont_id
                                LEFT OUTER JOIN contact_activities AS cac ON cpro.conp_id=cac.conp_id
                                WHERE c.grp_id!=0 AND c.grp_id!='' AND cac.act_id!=''  
                                AND p.Arrival_Start_Date>='" . $_SESSION['pk_from'] . "' 
                                GROUP BY  c.grp_id ORDER BY p.Arrival_Start_Date ASC ";
                                
                                
                                $limit1 = $_SESSION['limit_of_rec'];
                                $start1 = $p->findStart($limit1);
                                $count1 = mysql_num_rows(mysql_query($Query1));
                                $pages1 = $p->findPages($count1, $limit1);
                                $rs1 = mysql_query($Query1 . " LIMIT " . $start1 . ", " . $limit1);
                                if (mysql_num_rows($rs1) > 0) {
                                    while ($row1 = mysql_fetch_object($rs1)) {
                                        $counter1++;
                                ?>
                                        <?php
                                        $counter2 = 0;
                                        $completed = '';
                                        $Query2 = "SELECT c.ContactID, c.grp_id, c.ContactFirstName, c.ContactLastName FROM contacts AS c WHERE c.grp_id=" . $row1->grp_id . " ";
                                        $count2 = mysql_num_rows(mysql_query($Query2));
                                        $rs2 = mysql_query($Query2);
                                        if (mysql_num_rows($rs2) > 0) {
                                            
                                            
                                            //$completed = '';
                                            //for ($j = 0; $j < count($pkg_completed); $j++) {
                                                $arr = explode(',', $pkg_completed[$counter1-1]);
                                                if($row1->Pms_Package_ID == $arr[0]){
                                                    //echo '<br/>'. $arr[0] .' '. $arr[1];
                                                    if($arr[1]==1){
                                                        $completed = 'background-color:#00b3ee;';
                                                    }    
                                                }
                                            //}
                                            //echo '<br/><br/> <br/><br/>';
                                            //echo $row1->grp_id.' ';
    
                                        ?>
                                            <li> 
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row1->grp_id ?>" style="<?php echo $completed;?>">
                                                    <i class="fa fa-plus-square"></i>  <?php echo $row1->GroupName . ' | ' . $row1->ContactFirstName . ' ' . $row1->ContactLastName . ' | ' . $row1->Package_Name . ' | ' . @calendarDateConver2($row1->Arrival_Start_Date) . ' | ' . @calendarDateConver2($row1->Arrival_End_Date);?> 
                                                </a>
                                                <ul>
                                                    <li id="collapse<?php echo $row1->grp_id ?>" class="panel-collapse collapse" style="list-style-type:none;">
                                                        <p>
                                                        <table class="table users-table table-condensed table-hover table-striped display dataTable">
                                                            <?php
                                                            while ($row2 = mysql_fetch_object($rs2)) {
                                                                $counter2++;
                                                                ?>
                                                                <?php
//                                                                $Query4 = 0;
//                                                                $count4 = 0;
//                                                                $counter4 = 0;
//                                                                $Query4 = "SELECT acti.act_id, acti.act_name FROM activities AS acti ORDER BY  acti.act_name";
//                                                                $count4 = mysql_num_rows(mysql_query($Query3));
//                                                                $rs4 = mysql_query($Query4);
//                                                                    if (mysql_num_rows($rs4) > 0) {
//                                                                        while ($row4 = mysql_fetch_object($rs4)) {
//                                                                            $counter4++;
                                                                
                                                                
                                                                $activities_array = array();
                                                                $counter3 = 0;
                                                                $Query3 = "SELECT cp.conp_id, cp.cont_id, ca.act_id, a.act_name, g.grp_id, g.GroupName, c.cont_fname, c.cont_lname, asch.asch_id, asch.cont_id AS aschcont_id, asch.asch_start_date, asch.asch_end_date, asch.asch_duration, asch.asch_email_counter, ag.ag_name, ad.ad_name, av.av_name, abn.act_boat_name, thr.ath_id, thr.ath_name, thrt.atht_id, thrt.atht_name FROM  contact_profiles AS cp LEFT OUTER JOIN contact_activities AS ca ON cp.conp_id=ca.conp_id LEFT OUTER JOIN activities AS a ON ca.act_id=a.act_id LEFT OUTER JOIN act_schedule AS asch ON asch.grp_id=" . $row1->grp_id . " AND asch.cont_id=" . $row2->ContactID . " AND asch.act_id=a.act_id LEFT OUTER JOIN groups AS g ON g.grp_id=" . $row1->grp_id . " LEFT OUTER JOIN contacts AS c ON c.ContactID=" . $row2->ContactID . " LEFT OUTER JOIN activity_guides AS ag ON asch.ag_id=ag.ag_id LEFT OUTER JOIN activity_destination AS ad ON asch.ad_id=ad.ad_id LEFT OUTER JOIN activity_vendors AS av ON asch.av_id=av.av_id LEFT OUTER JOIN act_therapist AS thr ON asch.ath_id=thr.ath_id LEFT OUTER JOIN act_th_type AS thrt ON asch.atht_id=thrt.atht_id LEFT OUTER JOIN act_boats AS abn ON asch.act_boat_id=abn.act_boat_id WHERE ( cp.cont_id=" . $row2->ContactID . " OR  asch.cont_id=" . $row2->ContactID . " ) AND a.act_id !='' AND a.act_id = ".@$_REQUEST['act_id']." GROUP BY a.act_id ORDER BY a.act_order ASC";
                                                                $count3 = mysql_num_rows(mysql_query($Query3));
                                                                $rs3 = mysql_query($Query3);
                                                                if (mysql_num_rows($rs3) > 0) {
                                                                    ?>
                                                                    <thead>
                                                                        <tr><th class="visible-xs visible-sm visible-md visible-lg" colspan="100%" style="text-align: center; border: 0px solid #ddd !important;"> &nbsp; </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg" colspan="100%" style="text-align: center; border: 0px solid #ddd !important;">
                                                                                <span style="text-decoration: underline;"> Guest Name: <strong><?php echo $row2->ContactFirstName . ' ' . $row2->ContactLastName; ?></strong></span>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <thead>
                                                                        <tr>
<!--                                                                            <th class="visible-xs visible-sm visible-md visible-lg" style="max-width: 100px;"> Activity </th>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg">Selected In Profile</th>-->
                                                                            <?php
                                                                                $day_counter = 0;
                                                                                $day_counter1 = 0;
                                                                                $date1 = '';
                                                                                $date1 = returnName("Arrival_Start_Date", "packages", "Pms_Package_ID", $row1->Pms_Package_ID);
                                                                                $days1 = '0';
                                                                                $date1 = strtotime($date1);
                                                                                $date1 = strtotime('-' . $days1 . ' day', $date1);
                                                                                $date1 = date('Y-m-d', $date1);
                                                                                $date1 = $date1 . ' 00:00:00';
                                                                                $date2 = '';
                                                                                $date2 = returnName("Arrival_End_Date", "packages", "Pms_Package_ID", $row1->Pms_Package_ID);
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
                                                                                    <?php
                                                                                    if ($day_counter != 1) {
                                                                                        if ($no_of_days == $day_counter) {
                                                                                            //echo '<br/>1 '.$dt->format( "m/d/Y" );
                                                                                        } else {
                                                                                            if ($no_of_days != (1 + $day_counter)) {
                                                                                                $day_counter1++;
                                                                                                //echo '<br>2 '.$dt->format("m/d/Y");
                                                                                                echo '<th class="visible-xs visible-sm visible-md visible-lg">';
                                                                                                echo $dt->format("m/d/Y");
                                                                                                echo '</th>';
                                                                                            }
                                                                                        }
                                                                                    } else {
                                                                                        $day_counter1++;
                                                                                        //echo '<br>3 '.$dt->format("m/d/Y");
                                                                                    }
                                                                                    if (($day_counter - $day_counter1) == 1) {
                                                                                        //echo '<br>4 '.$dt->format("m/d/Y");
                                                                                    }
                                                                                    ?> 
                                                                                    <?php
                                                                                }
                                                                                endforeach;
                                                                            ?>
<!--                                                                            <th class="visible-xs visible-sm visible-md visible-lg"> Scheduled </th>-->
<!--                                                                            <th class="visible-xs visible-sm visible-md visible-lg" style="text-align:center"> Action </th>-->
                                                                        </tr>
                                                                    </thead>
                                                                    <?php
                                                                        while ($row3 = mysql_fetch_object($rs3)) {
                                                                            $counter3++;
                                                                            $activities_array[] .= $row3->act_id;
                                                                            if($counter3 == 1){
                                                                                $conpid = $row3->conp_id;
                                                                            }
                                                                    ?>
                                                                        <tr>
<!--                                                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php echo $row3->act_name;?></td>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                                                <?php 
                                                                                    $counter5 = 0;
                                                                                    $Query5 = "SELECT * FROM contact_activities WHERE conp_id =".$conpid."";
                                                                                    $count5 = mysql_num_rows(mysql_query($Query3));
                                                                                    $rs5 = mysql_query($Query5);
                                                                                    if (mysql_num_rows($rs5) > 0) {
                                                                                        while ($row5 = mysql_fetch_object($rs5)) {
                                                                                            $counter5++;
                                                                                            if($row3->act_id == $row5->act_id){
                                                                                                echo 'Yes';
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                ?>    
                                                                            </td>-->
                                                                            <?php
                                                                                $day_counter = 0;
                                                                                $day_counter1 = 0;
                                                                                $date1 = '';
                                                                                $date1 = returnName("Arrival_Start_Date", "packages", "Pms_Package_ID", $row1->Pms_Package_ID);
                                                                                $days1 = '0';
                                                                                $date1 = strtotime($date1);
                                                                                $date1 = strtotime('-' . $days1 . ' day', $date1);
                                                                                $date1 = date('Y-m-d', $date1);
                                                                                $date1 = $date1 . ' 00:00:00';
                                                                                $date2 = '';
                                                                                $date2 = returnName("Arrival_End_Date", "packages", "Pms_Package_ID", $row1->Pms_Package_ID);
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
                                                                                    <?php
                                                                                    if ($day_counter != 1) {
                                                                                        if ($no_of_days == $day_counter) {
                                                                                            //echo '<br/>1 '.$dt->format( "m/d/Y" );
                                                                                        } else {
                                                                                            if ($no_of_days != (1 + $day_counter)) {
                                                                                                $day_counter1++;
                                                                                                //echo '<br>2 '.$dt->format("m/d/Y");
                                                                                                echo '<th class="visible-xs visible-sm visible-md visible-lg">';
                                                                                                if ($row3->asch_id != 0 || $row3->asch_id != '') {
                                                                                                    //echo "Scheduled - <a href=" . $_SERVER['PHP_SELF'] . "?action=2&sch=1&cont_id=" . $row3->cont_id . "&grp_id=" . $row3->grp_id . "&act_id=" . $row3->act_id . "&asch_id=" . $row3->asch_id . "&pms_pak_id=".$row1->Pms_Package_ID. ">Edit</a>";

                                                                                                    $counter5 = 0;
                                                                                                    $Query5 = "SELECT asch.asch_id FROM act_schedule AS asch WHERE asch.act_id=".$row3->act_id." AND asch.cont_id = ".$row3->aschcont_id." AND asch.grp_id = ".$row3->grp_id." AND asch.asch_start_date LIKE '".$dt->format("Y-m-d")."%' AND asch.act_id = ".@$_REQUEST['act_id']." LIMIT 1";
                                                                                                    $count5 = mysql_num_rows(mysql_query($Query3));
                                                                                                    $rs5 = mysql_query($Query5);
                                                                                                    if (mysql_num_rows($rs5) > 0) {
                                                                                                        while ($row5 = mysql_fetch_object($rs5)) {
                                                                                                            $counter5++;
                                                                                                            echo "Scheduled - <a href=" . $_SERVER['PHP_SELF'] . "?action=2&sch=1&cont_id=" . $row3->aschcont_id . "&grp_id=" . $row3->grp_id . "&act_id=" . $row3->act_id . "&asch_id=" . $row3->asch_id . "&pms_pak_id=".$row1->Pms_Package_ID. ">Edit</a> - <a href=".$_SERVER['PHP_SELF'] . "?show=1&cont_id=" . $row3->aschcont_id . "&grp_id=" . $row3->grp_id . "&act_id=" . $row3->act_id . "&asch_id=" . $row3->asch_id."&date=".$dt->format("Y-m-d").">Details</a>";
                                                                                                            
//                                                                                                            - <div class='tooltips'><a href=".$_SERVER['PHP_SELF'] . "?send=1&cont_id=" . $row3->aschcont_id ."&act_id=" . $row3->act_id."&asch_id=" . $row3->asch_id." data-original-title= 'Email has been sent ".$row3->asch_email_counter.(($row3->asch_email_counter>1)?" times ":" time ")."' data-placement='top' class='btn bg-primary text-white' style='float:left; margin-left: 2px; margin-bottom: 2px;'><i class='fa fa-envelope-o'></i></a></div>";
                                                                                                            //echo 'Found ';
                                                                                                        }
                                                                                                    } else {
                                                                                                        //echo $dt->format("m/d/Y");
                                                                                                        echo "<a href=" . $_SERVER['PHP_SELF'] . "?action=1&sch=0&cont_id=" . (($row3->aschcont_id!='')?$row3->aschcont_id:$row3->cont_id) . "&grp_id=" . $row3->grp_id . "&act_id=" . $row3->act_id . "&asch_id=&pms_pak_id=".$row1->Pms_Package_ID."&date=".$dt->format("Y-m-d").">Not Scheduled</a>";
                                                                                                    }
                                                                                                } else {
                                                                                                    echo "<a href=" . $_SERVER['PHP_SELF'] . "?action=1&sch=0&cont_id=" . (($row3->aschcont_id!='')?$row3->aschcont_id:$row3->cont_id) . "&grp_id=" . $row3->grp_id . "&act_id=" . $row3->act_id . "&asch_id=&pms_pak_id=".$row1->Pms_Package_ID."&date=".$dt->format("Y-m-d").">Not Scheduled</a>";
                                                                                                }
                                                                                                echo '</th>';
                                                                                            }
                                                                                        }
                                                                                    } else {
                                                                                        $day_counter1++;
                                                                                        //echo '<br>3 '.$dt->format("m/d/Y");
                                                                                    }
                                                                                    if (($day_counter - $day_counter1) == 1) {
                                                                                        //echo '<br>4 '.$dt->format("m/d/Y");
                                                                                    }
                                                                                    ?> 
                                                                                    <?php
                                                                                }
                                                                                endforeach;
                                                                            ?>
<!--                                                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                                                <?php
                                                                                if ($row3->asch_id != 0 || $row3->asch_id != '') {
                                                                                    //echo "Scheduled - <a href=" . $_SERVER['PHP_SELF'] . "?action=2&sch=1&cont_id=" . $row3->cont_id . "&grp_id=" . $row3->grp_id . "&act_id=" . $row3->act_id . "&asch_id=" . $row3->asch_id . "&pms_pak_id=".$row1->Pms_Package_ID. ">Edit</a>";
                                                                                    //echo "Scheduled - <a href=" . $_SERVER['PHP_SELF'] . "?action=2&sch=1&cont_id=" . $row3->aschcont_id . "&grp_id=" . $row3->grp_id . "&act_id=" . $row3->act_id . "&asch_id=" . $row3->asch_id . "&pms_pak_id=".$row1->Pms_Package_ID. ">Edit</a> - <a href=".$_SERVER['PHP_SELF'] . "?show=1&cont_id=" . $row3->aschcont_id . "&grp_id=" . $row3->grp_id . "&act_id=" . $row3->act_id . "&asch_id=" . $row3->asch_id.">Details</a>";
                                                                                } else {
                                                                                    //echo "<a href=" . $_SERVER['PHP_SELF'] . "?action=1&sch=0&cont_id=" . $row3->cont_id . "&grp_id=" . $row3->grp_id . "&act_id=" . $row3->act_id . "&asch_id=" . $row3->asch_id . "&pms_pak_id=".$row1->Pms_Package_ID. "> Not Scheduled </a>";
                                                                                }
                                                                                ?>    
                                                                            </td>-->
<!--                                                                            <td class="visible-xs visible-sm visible-md visible-lg" style="width:150px;">
                                                                            <?php if ($row3->asch_id != 0 && $row3->asch_id != '') { ?>
                                                                                    <div class="tooltips"><a href="<?php echo $_SERVER['PHP_SELF'] . "?btnDelete=1&asch_id=" . $row3->asch_id; ?>" data-original-title="Delete Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-minus-circle"></i></a></div>
                                                                                    <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF'] . "?send=1&cont_id=" . $row3->aschcont_id ."&act_id=" . $row3->act_id."&asch_id=" . $row3->asch_id);?>" data-original-title="<?php echo "Email has been sent ".$row3->asch_email_counter.(($row3->asch_email_counter>1)?' times ':' time ')." ";?>" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-envelope-o"></i></a></div> 
                                                                                    <div class="tooltips"><a href="<?php echo $_SERVER['PHP_SELF'] . "?show=1&cont_id=" . $row3->aschcont_id . "&grp_id=" . $row3->grp_id . "&act_id=" . $row3->act_id . "&asch_id=" . $row3->asch_id; ?>" data-original-title="See Details" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-eye"></i></a></div>
                                                                            <?php } ?>
                                                                                    
                                                                            </td>-->
                                                                        </tr>
                                                                        
                                                                        <?php /*
                                                                        <?php if($count3 == $counter3){?>
                                                                            <?php 
                                                                                $Query4 = 0;
                                                                                $count4 = 0;
                                                                                $counter4 = 0;
                                                                                $Query4 = "SELECT acti.act_id, acti.act_name FROM activities AS acti ORDER BY  acti.act_name";
                                                                                $count4 = mysql_num_rows(mysql_query($Query3));
                                                                                $rs4 = mysql_query($Query4);
                                                                                    if (mysql_num_rows($rs4) > 0) {
                                                                                        while ($row4 = mysql_fetch_object($rs4)) {
                                                                                            $found = 0;
                                                                                            if (in_array($row4->act_id, @$activities_array)) {
                                                                                                $found = 1;
                                                                                            } else {
                                                                                                $found = 0;
                                                                                            }
                                                                                            $counter4++;
                                                                                            if($found == 0){
                                                                            ?>
                                                                        <tr>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php echo $row4->act_name;?> </td>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg"> &nbsp; </td>
                                                                            <?php
                                                                                $day_counter = 0;
                                                                                $day_counter1 = 0;
                                                                                $date1 = '';
                                                                                $date1 = returnName("Arrival_Start_Date", "packages", "Pms_Package_ID", $row1->Pms_Package_ID);
                                                                                $days1 = '0';
                                                                                $date1 = strtotime($date1);
                                                                                $date1 = strtotime('-' . $days1 . ' day', $date1);
                                                                                $date1 = date('Y-m-d', $date1);
                                                                                $date1 = $date1 . ' 00:00:00';
                                                                                $date2 = '';
                                                                                $date2 = returnName("Arrival_End_Date", "packages", "Pms_Package_ID", $row1->Pms_Package_ID);
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
                                                                                    <?php
                                                                                    if ($day_counter != 1) {
                                                                                        if ($no_of_days == $day_counter) {
                                                                                            //echo '<br/>1 '.$dt->format( "m/d/Y" );
                                                                                        } else {
                                                                                            if ($no_of_days != (1 + $day_counter)) {
                                                                                                $day_counter1++;
                                                                                                //echo '<br>2 '.$dt->format("m/d/Y");
                                                                                                echo '<th class="visible-xs visible-sm visible-md visible-lg">';
                                                                                                echo "<a href=" . $_SERVER['PHP_SELF'] . "?action=1&sch=0&cont_id=" . @$row1->ContactID . "&grp_id=" . @$row1->grp_id . "&act_id=" . @$row4->act_id . "&asch_id=&pms_pak_id=".$row1->Pms_Package_ID. "> Not Scheduled </a>";
                                                                                                //echo $dt->format("m/d/Y");
                                                                                                echo '</th>';
                                                                                            }
                                                                                        }
                                                                                    } else {
                                                                                        $day_counter1++;
                                                                                        //echo '<br>3 '.$dt->format("m/d/Y");
                                                                                    }
                                                                                    if (($day_counter - $day_counter1) == 1) {
                                                                                        //echo '<br>4 '.$dt->format("m/d/Y");
                                                                                    }
                                                                                    ?> 
                                                                                    <?php
                                                                                }
                                                                                endforeach;
                                                                            ?>
<!--                                                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                                                <?php
                                                                                    echo "<a href=" . $_SERVER['PHP_SELF'] . "?action=1&sch=0&cont_id=" . @$row1->ContactID . "&grp_id=" . @$row1->grp_id . "&act_id=" . @$row4->act_id . "&asch_id=" . @$row3->asch_id . "&pms_pak_id=".$row1->Pms_Package_ID. "> Not Scheduled </a>";
                                                                                ?>
                                                                            </td>-->
<!--                                                                            <td class="visible-xs visible-sm visible-md visible-lg" style="width:150px;"> &nbsp; </td>-->
                                                                        </tr>
                                                                            <?php
                                                                                            }
                                                                                        }
                                                                                    }    
                                                                            ?>
                                                                        <?php }?>
                                                                        */
                                                                        ?>
                                                                            
                                                                        <tr> </tr>
                                                                    <?php
                                                                    }
                                                                } else {
                                                                    //print('<tr><td colspan="100%" align="center"><strong> 1 Record Not Found! </strong></td></tr>');
                                                                    //echo "<tr><td colspan='100%' align='center'><a href=" . $_SERVER['PHP_SELF'] . "?action=1&sch=0&cont_id=" . @$row3->cont_id . "&grp_id=" . @$row3->grp_id . "&act_id=" . @$row3->act_id . "&asch_id=" . @$row3->asch_id . "&pms_pak_id=".@$row1->Pms_Package_ID. "> Not Scheduled </a></td></tr>";
                                                                }
                                                                
//                                                                }
//                                                                }
                                                                ?>
                <?php
                }
            } else {
                //print('<tr><td colspan="100%" align="center"><strong> 2 Record Not Found! </strong></td></tr>');
            }
            ?>
                                                    </table>
                                                    </p>
                                                </li>
                                            </ul>
                                        </li>
        <?php
        }
    } else {
        //print('<tr><td colspan="100%" align="center"><strong> 3 Record Not Found! </strong></td></tr>');
    }
    ?>
                            </ul>
                        </div>
                    </div>
                                <?php if ($counter1 > 0) { ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td><?php print("Page <b>" . $_GET['page'] . "</b> of " . $pages1); ?></td>
                                <td align="right">
        <?php
        $next_prev1 = $p->nextPrev($_GET['page'], $pages1, '');
        print($next_prev1);
        ?>
                                </td>
                            </tr>
                        </table>
    <?php } ?>
                </div>
            </div>	
        </div>
    </div>


    <?php }?>
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


<?php if(isset($_REQUEST['action'])){?>
<script>

try {
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
            //contentHeight: 600,
            selectable: true,
            selectHelper: true,
            slotEventOverlap : false,
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
                                        //allDay: allDay
                                        allDay: false
                                    },
                            true // make the event "stick"
                                    );
                        }
                        calendar.fullCalendar('unselect');
                    },
                    events: <?php echo json_encode($return_array); ?>,
                    //eventRender: function(event, element) { 
                       // element.find('.fc-event-title').append("<br/>" + event.description); 
                    //} 
        });

    });
} catch(err) {
    
}

</script>      
<?php }?>





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
                                    
//                                    $(".datetimepicker").datepicker();
//                                    $('.datetimepicker').datepicker({
//                                        dateFormat: 'yy-mm-dd', 
//                                        firstDay: 1,
//                                        minDate: new Date(2014, 1-1, 25), 
//                                        maxDate: -1});
                                      //$(".datetimepicker").datepicker({dateFormat:'yy-mm-dd',minDate:'2014-09-10' ,maxDate:'2014-10-10'});
                                    $('.datetimepicker').datepicker({
                                        //startDate: '05/01/2014',
                                        //endDate: '05/20/2014'
                                        startDate: '<?php echo @$_SESSION['pak_start']?>',
                                        endDate: '<?php echo @$_SESSION['pak_end']?>'
                                    });
                                    //$('#calendar').fullCalendar({
                                       // contentHeight: 600
                                    //});







//
//var startDate = new Date('01/01/2014');
//var FromEndDate = new Date();
//var ToEndDate = new Date();
//
//ToEndDate.setDate(ToEndDate.getDate()+365);
//
//$('.datetimepicker').datepicker({
//
//    weekStart: 1,
//    startDate: '01/01/2014',
//    endDate: FromEndDate, 
//    autoclose: true
//})
//    .on('changeDate', function(selected){
//        startDate = new Date(selected.date.valueOf());
//        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
//        $('.to_date').datepicker('setStartDate', startDate);
//    }); 
//$('.to_date')
//    .datepicker({
//
//        weekStart: 1,
//        startDate: startDate,
//        endDate: ToEndDate,
//        autoclose: true
//    })
//    .on('changeDate', function(selected){
//        FromEndDate = new Date(selected.date.valueOf());
//        FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
//        $('.from_date').datepicker('setEndDate', FromEndDate);
//    });
//    
    
    
  
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
                                    $('#calendar').fullCalendar('option', 'contentHeight', 650);
                                    //$("#txtDate").datepicker({ minDate: 0, maxDate: '+1M', numberOfMonths:2 });
                                    //$('#calendar').fullCalendar({slotEventOverlap : false});
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

<style>
    .fc-agenda-slots td div{height: 250px;}
    #content .eo-fullcalendar tr td{
	padding:0px;
    }
</style>
