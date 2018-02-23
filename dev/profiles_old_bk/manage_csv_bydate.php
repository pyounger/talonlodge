<?php 
include ('includes/php_includes_top.php');
?>
<?php


if((isset($_REQUEST['from_csv']))&&($_REQUEST['from_csv']!='')){
    $_SESSION['from_csv'] = calendarDateConver4($_REQUEST['from_csv']);
} else if(isset($_SESSION['from_csv'])){
    //$_SESSION['from'] = $_SESSION['from'];
} else {
    $_SESSION['from_csv'] = '2014-05-01';
}
if((isset($_REQUEST['to_csv']))&&($_REQUEST['to_csv']!='')){
    $_SESSION['to_csv'] = calendarDateConver4($_REQUEST['to_csv']);
} else if(isset($_SESSION['to_csv'])){
    //$_SESSION['to'] = $_SESSION['to'];
} else {
    $_SESSION['to_csv'] = '2014-05-30';
}



if ((isset($_REQUEST['pk_from'])) && ($_REQUEST['pk_from'] != '')) {
    $_SESSION['pk_from'] = calendarDateConver4($_REQUEST['pk_from']);
} else if (isset($_SESSION['pk_from'])) {
    //$_SESSION['from'] = $_SESSION['from'];
} else {
    $_SESSION['pk_from'] = '2014-05-01';
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

if(isset($_REQUEST['addMenuRec'])){
    $isexist = chkExist("md_pkg_id", "menu_default_pkg", " WHERE pms_pak_id=".$_REQUEST['pms_pak_id']." ");
    if($isexist>0){
        mysql_query("UPDATE menu_default_pkg SET menu_b=".@dbStr(@$_REQUEST['menu_id_b']) . ", menu_l=" . @dbStr(@$_REQUEST['menu_id_l']).", menu_d=" . @dbStr(@$_REQUEST['menu_id_d'])."  WHERE pms_pak_id=".$_REQUEST['pms_pak_id']." AND md_pkg_id = ".$_REQUEST['md_pkg_id']." ");
        header("Location: manage_eating_schedule.php?op=2");
    } else {
        $maxID = getMaximum("menu_default_pkg", "md_pkg_id");
        mysql_query("INSERT INTO menu_default_pkg (md_pkg_id, pms_pak_id, menu_b, menu_l, menu_d) VALUES (".$maxID.", ".@dbStr(@$_REQUEST['pms_pak_id']) . ", ".@dbStr(@$_REQUEST['menu_id_b']) . ", " . @dbStr(@$_REQUEST['menu_id_l']).", " . @dbStr(@$_REQUEST['menu_id_d']).") ");
        header("Location: manage_eating_schedule.php?op=1");
    }
}

if(isset($_REQUEST['addCustMenuRec'])){
    $isexist = chkExist("md_pkg_id", "menu_default_pkg", " WHERE pms_pak_id=".$_REQUEST['pms_pak_id']." AND cont_id=".$_REQUEST['cont_id']." ");
    if($isexist>0){
        mysql_query("UPDATE menu_default_pkg SET menu_b=".@dbStr(@$_REQUEST['menu_id_b']) . ", menu_l=" . @dbStr(@$_REQUEST['menu_id_l']).", menu_d=" . @dbStr(@$_REQUEST['menu_id_d'])."  WHERE pms_pak_id=".$_REQUEST['pms_pak_id']." AND cont_id=".$_REQUEST['cont_id']." ");
        header("Location: manage_eating_schedule.php?show=1&pms_pak_id=".$_REQUEST['pms_pak_id']."&op=2");
    } else {
        $maxID = getMaximum("menu_default_pkg", "md_pkg_id");
        mysql_query("INSERT INTO menu_default_pkg (md_pkg_id, pms_pak_id, menu_b, menu_l, menu_d, cont_id) VALUES (".$maxID.", ".@dbStr(@$_REQUEST['pms_pak_id']) . ", ".@dbStr(@$_REQUEST['menu_id_b']) . ", " . @dbStr(@$_REQUEST['menu_id_l']).", " . @dbStr(@$_REQUEST['menu_id_d']).", " . @dbStr(@$_REQUEST['cont_id']).") ");
        header("Location: manage_eating_schedule.php?show=1&pms_pak_id=".$_REQUEST['pms_pak_id']."&op=1");
    }
}

if(isset($_REQUEST['btnAddCustom'])){
    for($i=0; $i<count($_REQUEST['msch_custom_order']); $i++){
        if($_REQUEST['msch_custom_order'][$i]!=''){
            mysql_query("UPDATE menu_schedules SET msch_custom_order = '" . @dbStr(@$_REQUEST['msch_custom_order'][$i]) . "' WHERE cont_id=".$_REQUEST['cont_id'][$i]."");
        }    
    }
    header("Location: manage_eating_schedule.php?show=1&pms_pak_id=" . $_REQUEST['pms_pak_id'] . "&op=2");
}

if (isset($_REQUEST['btnAdd'])) {
    
//    echo '<pre>';
//    print_r( $_REQUEST );
//    echo '</pre>';
//    die();
   
    $isexist = chkExist("msch_id", "menu_schedules", " WHERE cont_id=".$_REQUEST['cont_id']." AND grp_id=".$_REQUEST['grp_id']." AND pms_pak_id=".$_REQUEST['pms_pak_id']." AND msch_date='".$_REQUEST['date']."' AND msch_type='".$_REQUEST['msch_type']."' ");
    if($isexist>0){
        $msch_id = $_REQUEST['msch_id'];
        mysql_query("UPDATE menu_schedules SET menu_b='" . @dbStr(@$_REQUEST['menu_b']) . "', menu_l='" . @dbStr(@$_REQUEST['menu_l']) . "', menu_d='" . @dbStr(@$_REQUEST['menu_d']) . "',menu_b_default='" . @dbStr(@$_REQUEST['menu_b_default']) . "', menu_l_default='" . @dbStr(@$_REQUEST['menu_l_default']) . "', menu_d_default='" . @dbStr(@$_REQUEST['menu_d_default']) . "', msch_updated=NOW(), msch_custom_order='" . @dbStr(@$_REQUEST['msch_custom_order']) . "' WHERE msch_id=".$_REQUEST['msch_id']."");
        //header("Location: manage_eating_schedule.php?show=1&pms_pak_id=" . $_REQUEST['pms_pak_id'] . "&op=2");
    } else {
        $maxID = getMaximum("menu_schedules", "msch_id");
        $msch_id = $maxID;
        mysql_query("INSERT INTO menu_schedules (msch_id, cont_id, grp_id, pms_pak_id, menu_b, menu_l, menu_d, menu_b_default, menu_l_default, menu_d_default, msch_type, msch_date, msch_created, msch_custom_order) VALUES(" . $maxID . ", '" . dbStr($_REQUEST['cont_id']) . "', '" . dbStr($_REQUEST['grp_id']) . "', '" . @dbStr(@$_REQUEST['pms_pak_id']) . "', '" . @dbStr(@$_REQUEST['menu_b']) . "', '" . @dbStr(@$_REQUEST['menu_l']) . "', '" . @dbStr(@$_REQUEST['menu_d']) . "', '" . @dbStr(@$_REQUEST['menu_b_default']) . "', '" . @dbStr(@$_REQUEST['menu_l_default']) . "', '" . @dbStr(@$_REQUEST['menu_d_default']) . "', '" . @dbStr(@$_REQUEST['msch_type']) . "', '" . @dbStr(@($_REQUEST['date'])) . "', NOW(), '" . @dbStr(@($_REQUEST['msch_custom_order'])) . "')") or die(mysql_error());
        //header("Location: manage_eating_schedule.php?show=1&pms_pak_id=" . $_REQUEST['pms_pak_id'] . "&op=1");
    }
    
    mysql_query("DELETE FROM beverage_order WHERE cont_id = ".$_REQUEST['contactid']." AND grp_id = ".$_REQUEST['grp_id']." AND pms_pak_id = ".$_REQUEST['pms_pak_id']." AND bvo_date = '".$_REQUEST['date']."' ");
    for($i=0; $i<count($_REQUEST['bitem_id']); $i++){
        $maxID = getMaximum("beverage_order", "bvo_id");
        mysql_query("INSERT INTO beverage_order (bvo_id, cont_id, grp_id, pms_pak_id, msch_id, bitem_id, bvo_date, bvo_quantity) VALUES(".$maxID.", '".@dbStr($_REQUEST['contactid'])."', '".@dbStr($_REQUEST['grp_id'])."', '".@dbStr($_REQUEST['pms_pak_id'])."', '".@dbStr($msch_id)."', '".@dbStr($_REQUEST['bitem_id'][$i])."', '".@dbStr($_REQUEST['date'])."', '".@dbStr($_REQUEST['bvo_quantity'])."')") or die(mysql_error());
    }
    
    if(isset($_REQUEST['btnAdd'])){
        header("Location: manage_eating_schedule.php?show=1&pms_pak_id=" . $_REQUEST['pms_pak_id'] . "&op=1");
    } else {
        header("Location: manage_eating_schedule.php?show=1&pms_pak_id=" . $_REQUEST['pms_pak_id'] . "&op=2");
    }
    
    
//    echo '<pre>';
//    print_r( $_REQUEST );
//    echo '</pre>';
//    die();
    
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




if (isset($_REQUEST['op'])) {
    switch ($_REQUEST['op']) {
        case 1:
            $strMSG = " Record Added Successfully ";
            $class = "alert alert-success";
            break;
        case 2:
            $strMSG = " Record Updated Successfully ";
            $class = " alert alert-info ";
            break;
        case 3:
            $strMSG = " Record Deleted Successfully ";
            $class = " alert alert-info ";
            break;
        case 4:
            $strMSG = " Record Already Exists ";
            $class = "alert alert-danger";
            break;
        case 5:
            $strMSG = " Your Request Can Not Be Fullfill At This Time ";
            $class = "alert alert-danger";
            break;
        case 6:
            $strMSG = " Total members should be less then 24 ";
            $class = "alert alert-danger";
            break;
        case 7:
            $strMSG = " Login Info sent ";
            $class = "alert alert-success";
            break;
        case 8:
            $strMSG = " Room was Assigned Successfully ";
            $class = "alert alert-success";
            break;
        case 9:
            $strMSG = " Room assignment was Updated Successfully ";
            $class = " alert alert-info ";
            break;
        case 10:
            $strMSG = " Room is already booked or This member is already added in another room! ";
            $class = "alert alert-danger";
            break;
    }
}
if (isset($_REQUEST['delete']) && $_REQUEST['delete'] == 1) {
    @mysql_query("DELETE FROM room_reservation  WHERE roomr_id = " . $_REQUEST['roomr_id'] . " ");

    $day_counter = 0;
    $day_counter1 = 0;
    $date1 = '';
    $date1 = returnName("Arrival_Start_Date", "packages", "Pms_Package_ID",
            $_REQUEST['pms_pak_id']);
    $days1 = '2';
    $date1 = strtotime($date1);
    $date1 = strtotime('-' . $days1 . ' day', $date1);
    $date1 = date('Y-m-d', $date1);
    $date1 = $date1 . ' 00:00:00';

    $date2 = '';
    $date2 = returnName("Arrival_End_Date", "packages", "Pms_Package_ID",
            $_REQUEST['pms_pak_id']);
    $days2 = '0';
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
        if ($day_counter != 1) {
            if ($no_of_days == $day_counter) {
                
            } else {
                $day_counter1++;
                //@mysql_query("DELETE FROM room_reservation  WHERE contact_id = " . $_REQUEST['contactid']." AND roomr_startdate='".$dt->format("Y-m-d")."' ");
            }
        } else {
            $day_counter1++;
            //@mysql_query("DELETE FROM room_reservation  WHERE contact_id = " . $_REQUEST['contactid']." AND roomr_startdate='".$dt->format("Y-m-d")."' ");
        }
    endforeach;
    header("Location: manage_rooms_assignment.php?show=1&pms_pak_id=" . $_REQUEST['pms_pak_id'] . "&op=3");
}
if (isset($_REQUEST['reserveRoom'])) {

    //echo '<pre>';
    //print_r( $_REQUEST );

    $room_dates = array();
    if (isset($_REQUEST['room_all'])) {
        if (($_REQUEST['room_all']) == 1) {
            $room_for_all_dates = 1;
        } else {
            $room_for_all_dates = 0;
            for ($j = 0; $j < count($_REQUEST['room_all']); $j++) {
                $room_dates[] .= $_REQUEST['room_all'][$j];
            }
        }
    }

    //print_r( $room_dates );
    //echo '</pre>';

    if (isset($_REQUEST['chkstatus'])) {
        for ($i = 0; $i < count($_REQUEST['chkstatus']); $i++) {

            /*
              $tot_mem_in_room = totalCounts("roomr_id", "room_reservation", " room_id=" .
              $_REQUEST['room_id'] . " AND grp_id=" .
              $_REQUEST['grp_id'] . " AND Pms_Package_ID=" .
              $_REQUEST['pms_pak_id'] . " AND roomr_startdate='".
              $_REQUEST['start_date'] ."' ");
             */

            $tot_mem_in_room = totalCounts("roomr_id", "room_reservation",
                    " room_id=" .
                    $_REQUEST['room_id'] . "  AND Pms_Package_ID=" .
                    $_REQUEST['pms_pak_id'] . " AND roomr_startdate='" .
                    $_REQUEST['start_date'] . "' ");

            //echo $tot_mem_in_room;
            //echo ' total mem in room <br/>';

            if ($tot_mem_in_room == returnName("room_mem", "rooms", "room_id",
                            $_REQUEST['room_id'])) {
                $class = " alert alert-danger ";
                $strMSG = "This Room Is Already Full, Please Select Another Room!";
                header("Location: manage_rooms_assignment.php?show=1&pms_pak_id=" . $_REQUEST['pms_pak_id'] . "&op=10");
            } else {
                $same_mem_again = returnName("roomr_id", "room_reservation",
                        "room_id",
                        $_REQUEST['room_id'] . " AND  contact_id=" .
                        $_REQUEST['contactid'] . " AND grp_id=" .
                        $_REQUEST['grp_id'] . " AND Pms_Package_ID=" .
                        $_REQUEST['pms_pak_id'] . " AND roomr_startdate='" .
                        $_REQUEST['start_date'] . "' ");

                //echo $same_mem_again;
                //echo ' same mem in room <br/>';

                if ($same_mem_again != '') {
                    $class = " alert alert-danger ";
                    $strMSG = "Selected Member(s) Already Exists In Selected Room!";
                    header("Location: manage_rooms_assignment.php?show=1&pms_pak_id=" . $_REQUEST['pms_pak_id'] . "&op=10");
                } else {
                    $same_mem_again_another_room = returnName("roomr_id",
                            "room_reservation", "contact_id",
                            $_REQUEST['contactid'] . " AND grp_id=" .
                            $_REQUEST['grp_id'] . " AND Pms_Package_ID=" .
                            $_REQUEST['pms_pak_id'] . " AND roomr_startdate='" .
                            $_REQUEST['start_date'] . "' ");

                    //echo $same_mem_again_another_room;
                    //echo ' same mem in another room <br/>';

                    if ($same_mem_again_another_room != '') {
                        $class = " alert alert-danger ";
                        $strMSG = "Selected Member(s) Already Exists In Another Room!";
                        header("Location: manage_rooms_assignment.php?show=1&pms_pak_id=" . $_REQUEST['pms_pak_id'] . "&op=10");
                    } else {
                        if (isset($_REQUEST['add'])) {
                            $day_counter = 0;
                            $day_counter1 = 0;
                            $date1 = '';
                            $date1 = returnName("Arrival_Start_Date",
                                    "packages", "Pms_Package_ID",
                                    $_REQUEST['pms_pak_id']);
                            $days1 = '0';
                            $date1 = strtotime($date1);
                            $date1 = strtotime('-' . $days1 . ' day', $date1);
                            $date1 = date('Y-m-d', $date1);
                            $date1 = $date1 . ' 00:00:00';

                            $date2 = '';
                            $date2 = returnName("Arrival_End_Date", "packages",
                                    "Pms_Package_ID", $_REQUEST['pms_pak_id']);
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
                                if ($no_of_days != $day_counter) {
                                    $day_counter++;
                                    if ($day_counter != 1) {
                                        if ($no_of_days == $day_counter) {
                                            //echo '<br/> '.$dt->format( "d/m/Y" );
                                        } else {
                                            if ($no_of_days != (1 + $day_counter)) {
                                                if ($room_for_all_dates == 1) {
                                                    echo $exist = chkExist("roomr_id",
                                                    "room_reservation",
                                                    " WHERE contact_id=" .
                                                    $_REQUEST['contactid'] . " AND grp_id=" .
                                                    $_REQUEST['grp_id'] . " AND Pms_Package_ID=" .
                                                    $_REQUEST['pms_pak_id'] . " AND roomr_startdate='" .
                                                    $dt->format("Y-m-d") . "' ");
                                                    echo '<br/>' . $exist . '<br/>';
                                                    if ($exist == 0) {
                                                        $day_counter1++;
                                                        echo '<br/> 1 ' . $dt->format("d/m/Y") . '<br/>';
                                                        $roomr_id = getMaximum("room_reservation",
                                                                "roomr_id");
                                                        mysql_query("INSERT INTO room_reservation (roomr_id, room_id, contact_id, grp_id, Pms_Package_ID, roomr_startdate, roomr_enddate) VALUES ('" . $roomr_id . "', '" . $_REQUEST['room_id'] . "', '" . $_REQUEST['contactid'] . "', '" . $_REQUEST['grp_id'] . "', '" . $_REQUEST['pms_pak_id'] . "', '" . $dt->format("Y-m-d") . "', '" . $dt->format("Y-m-d") . "')");
                                                        mysql_query("UPDATE contacts SET cont_special_ins='" . $_REQUEST['cont_special_ins'] . "' WHERE ContactID=" . $_REQUEST['contactid'] . " ");
                                                    }
                                                } else {
                                                    if (in_array($dt->format("d/m/Y"),
                                                                    $room_dates)) {
                                                        echo $exist = chkExist("roomr_id",
                                                        "room_reservation",
                                                        " WHERE contact_id=" .
                                                        $_REQUEST['contactid'] . " AND grp_id=" .
                                                        $_REQUEST['grp_id'] . " AND Pms_Package_ID=" .
                                                        $_REQUEST['pms_pak_id'] . " AND roomr_startdate='" .
                                                        $dt->format("Y-m-d") . "' ");
                                                        echo '<br/>' . $exist . '<br/>';
                                                        if ($exist == 0) {
                                                            $day_counter1++;
                                                            echo '<br/> 1.1 ' . $dt->format("d/m/Y") . '<br/>';
                                                            $roomr_id = getMaximum("room_reservation",
                                                                    "roomr_id");
                                                            mysql_query("INSERT INTO room_reservation (roomr_id, room_id, contact_id, grp_id, Pms_Package_ID, roomr_startdate, roomr_enddate) VALUES ('" . $roomr_id . "', '" . $_REQUEST['room_id'] . "', '" . $_REQUEST['contactid'] . "', '" . $_REQUEST['grp_id'] . "', '" . $_REQUEST['pms_pak_id'] . "', '" . $dt->format("Y-m-d") . "', '" . $dt->format("Y-m-d") . "')");
                                                            mysql_query("UPDATE contacts SET cont_special_ins='" . $_REQUEST['cont_special_ins'] . "' WHERE ContactID=" . $_REQUEST['contactid'] . " ");
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    } else {
                                        if ($room_for_all_dates == 1) {
                                            echo $exist = chkExist("roomr_id",
                                            "room_reservation",
                                            " WHERE contact_id=" .
                                            $_REQUEST['contactid'] . " AND grp_id=" .
                                            $_REQUEST['grp_id'] . " AND Pms_Package_ID=" .
                                            $_REQUEST['pms_pak_id'] . " AND roomr_startdate='" .
                                            $dt->format("Y-m-d") . "' ");
                                            echo '<br/>' . $exist . '<br/>';
                                            if ($exist == 0) {
                                                $day_counter1++;
                                                echo '<br/> 2 ' . $dt->format("d/m/Y") . '<br/>';
                                                $roomr_id = getMaximum("room_reservation",
                                                        "roomr_id");
                                                mysql_query("INSERT INTO room_reservation (roomr_id, room_id, contact_id, grp_id, Pms_Package_ID, roomr_startdate, roomr_enddate) VALUES ('" . $roomr_id . "', '" . $_REQUEST['room_id'] . "', '" . $_REQUEST['contactid'] . "', '" . $_REQUEST['grp_id'] . "', '" . $_REQUEST['pms_pak_id'] . "', '" . $dt->format("Y-m-d") . "', '" . $dt->format("Y-m-d") . "')");
                                                mysql_query("UPDATE contacts SET cont_special_ins='" . $_REQUEST['cont_special_ins'] . "' WHERE ContactID=" . $_REQUEST['contactid'] . " ");
                                            }
                                        } else {
                                            if (in_array($dt->format("d/m/Y"),
                                                            $room_dates)) {
                                                echo $exist = chkExist("roomr_id",
                                                "room_reservation",
                                                " WHERE contact_id=" .
                                                $_REQUEST['contactid'] . " AND grp_id=" .
                                                $_REQUEST['grp_id'] . " AND Pms_Package_ID=" .
                                                $_REQUEST['pms_pak_id'] . " AND roomr_startdate='" .
                                                $dt->format("Y-m-d") . "' ");
                                                echo '<br/>' . $exist . '<br/>';
                                                if ($exist == 0) {
                                                    $day_counter1++;
                                                    echo '<br/> 2.2 ' . $dt->format("d/m/Y") . '<br/>';
                                                    $roomr_id = getMaximum("room_reservation",
                                                            "roomr_id");
                                                    mysql_query("INSERT INTO room_reservation (roomr_id, room_id, contact_id, grp_id, Pms_Package_ID, roomr_startdate, roomr_enddate) VALUES ('" . $roomr_id . "', '" . $_REQUEST['room_id'] . "', '" . $_REQUEST['contactid'] . "', '" . $_REQUEST['grp_id'] . "', '" . $_REQUEST['pms_pak_id'] . "', '" . $dt->format("Y-m-d") . "', '" . $dt->format("Y-m-d") . "')");
                                                    mysql_query("UPDATE contacts SET cont_special_ins='" . $_REQUEST['cont_special_ins'] . "' WHERE ContactID=" . $_REQUEST['contactid'] . " ");
                                                }
                                            }
                                        }
                                    }
                                }
                            endforeach;
                            header("Location: manage_rooms_assignment.php?show=1&pms_pak_id=" . $_REQUEST['pms_pak_id'] . "&op=8");
                        } else {
                            mysql_query("UPDATE room_reservation SET room_id='" . $roomr_id . "', contact_id='" . $_REQUEST['contactid'] . "', grp_id='" . $_REQUEST['grp_id'] . "', Pms_Package_ID='" . $_REQUEST['pms_pak_id'] . "', roomr_startdate='" . $_REQUEST['start_date'] . "', roomr_enddate='" . $_REQUEST['start_date'] . "' WHERE roomr_id=" . $_REQUEST['roomr_id'] . " ");
                            header("Location: manage_rooms_assignment.php?show=1&pms_pak_id=" . $_REQUEST['pms_pak_id'] . "&op=9");
                        }
                    }
                }
            }
        }
    } else {
        $class = " alert alert-danger ";
        $strMSG = "Please check atleast one checkbox";
    }
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
        <h3 class="page-header"> 
            Manage CSV content generation 
            <strong>
            <?php
                if(isset($_REQUEST['show'])){
            ?>
                    - <a href="generate_csv_bydate.php?from_csv=<?php echo $_REQUEST['from_csv'];?>&to_csv=<?php echo $_REQUEST['to_csv'];?>&show=1" target="_blank">CLICK HERE FOR CSV OUTPUT</a> 
            <?php
                }
            ?>
            </strong>
            <i class="fa fa-info-circle animated bounceInDown show-info"></i>
        </h3>
        <blockquote class="page-information hidden">
            <p> <b>  Manage CSV content generation : </b> You can   Manage CSV content  here </p>
        </blockquote>
    </div>
</div>
<?php if (isset($_REQUEST['action'])) { ?>

<?php } elseif (isset($_REQUEST['show']) && $_REQUEST['show'] == 10) { ?>

<?php } else { ?>

    <!--
    <div class="row">
    <div class="col-md-12">
        <div class="panel panel-cascade">
            <div class="panel-heading text-primary">
                <h3 class="panel-title"><i class="fa fa-windows"></i> Room Assigning
                    <span class="pull-right" style="width:auto;">
                        <div style="float:right;">
                            <a href="<?php print($_SERVER['PHP_SELF'] . "?action=1"); ?>" title="Add New"><i class="fa fa-plus"></i> Add New </a>
                        </div>
                    </span>
                </h3>
            </div>
            <div class="panel-body ">
                <div class="ro">
                    <div class="col-mol-md-offset-2">
                        <form class="form-horizontal cascde-forms" method="post" action="<?php print($_SERVER['PHP_SELF']); ?>" name="frm" id="frm" >
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label">Package Arrival Date:</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" class="form-control form-cascade-control datetimepicker" value="<?php echo calendarDateConver2($_SESSION['pk_from']); ?>" id="pk_from" name="pk_from" style="width: 160px;" title="Date From " placeholder="Package Arrival Date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label">Select Room:</label>
                                <div class="col-lg-10 col-md-9">
                                    <select name="room_id" id="room_id" data-placeholder="Choose a Room..." class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2">
                                        <option value="0"> Show All </option>
    <?php echo FillSelected2("rooms",
            "room_id", "room_number", "room_title", @$_SESSION['room_id']); ?>
                                    </select>
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
    -->


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
                                echo 'From: '.$_SESSION['from_csv'].' To: '.$_SESSION['to_csv'];
                            ?>                            
                            <span class="pull-right" style="width:auto;">
                            </span> 
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                            <table class="table users-table table-condensed table-hover table-striped display dataTable" id="" >
                                <thead>
                                    <tr>
                                        <th class="visible-xs visible-sm visible-md visible-lg">First Name<br/><br/>Last Name<br/><br/>Group Name</th>
                                        <th class="visible-xs visible-sm visible-md visible-lg">Arrival Date<br/><br/>Address 1<br/><br/>Address 2</th>
                                        <th class="visible-xs visible-sm visible-md visible-lg">City<br/><br/>State<br/><br/>Zip</th>
                                        <th class="visible-xs visible-sm visible-md visible-lg">Phone<br/><br/>E-Mail</th>
                                        <th class="visible-xs visible-sm visible-md visible-lg">Medical Condition</th>
                                        <th class="visible-xs visible-sm visible-md visible-lg">Food Allergy</th>
                                        <th class="visible-xs visible-sm visible-md visible-lg">Boat<br/><br/>Captain<br/><br/>Deckhand</th>
                                        <th class="visible-xs visible-sm visible-md visible-lg">Room<br/><br/>Log</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $Query = "
                                        SELECT
                                        p.Pms_Package_ID, p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, p.Package_Max_Days,
                                        g.grp_id, g.GroupName, 
                                        c.ContactID, c.cont_fname, c.ContactFirstName, cont_lname, ContactLastName, cont_address1, Address1, cont_address2, Address2, c.cont_image, c.arrival_flight_data, cont_city, City, cont_state, State, cont_zip, ZIP, cont_phone1, Phone1, cont_email, Email, 
                                        cp.conp_id, cp.bootsize_id, 
                                        j.jacketsize_name, 
                                        mpd.menu_b, mpd.menu_l, mpd.menu_d 
                                        FROM packages AS p 
                                        LEFT OUTER JOIN groups AS g ON p.Pms_Package_ID= g.Pms_Package_ID 
                                        LEFT OUTER JOIN contacts AS c ON g.grp_id=c.grp_id 
                                        LEFT OUTER JOIN contact_profiles AS cp ON c.ContactID=cp.cont_id 
                                        LEFT OUTER JOIN jacket_size AS j ON cp.jacketsize_id=j.jacketsize_id 
                                        LEFT OUTER JOIN menu_default_pkg AS mpd ON p.Pms_Package_ID=mpd.pms_pak_id AND mpd.cont_id=0 
                                        WHERE 
                                        c.arrival_flight_data >= '". $_SESSION['from_csv'] ."' 
                                        AND c.arrival_flight_data <= '". $_SESSION['to_csv'] ."' 
                                        AND p.Arrival_Start_Date > '2014-05-01' 
                                        AND g.grp_id=c.grp_id 
                                        AND g.GroupArrivalDate > '2014-05-01' 
                                        ORDER BY g.GroupName, c.ContactFirstName "; 
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
                                                <td class="visible-xs visible-sm visible-md visible-lg" style="max-width: 20px;">
                                                    <?php echo $row->ContactFirstName;?><br/><br/>
                                                    <?php echo $row->ContactLastName;?><br/><br/>
                                                    <?php echo $row->GroupName;?>
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg" style="max-width: 20px;">
                                                    <?php echo (($row->arrival_flight_data=='0000-00-00 00:00:00')?'':calendarDateConver2($row->arrival_flight_data));?><br/><br/>
                                                    <?php echo $row->Address1;?><br/><br/>
                                                    <?php echo $row->Address2;?>
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg" style="max-width: 20px;">
                                                    <?php echo $row->cont_city;?><br/><br/>
                                                    <?php echo $row->cont_state;?><br/><br/>
                                                    <?php echo $row->cont_zip;?>
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg" style="max-width: 120px;">
                                                    <?php echo $row->cont_phone1;?><br/><br/>
                                                    <?php echo $row->cont_email;?>
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg" style="max-width: 20px;">
                                                    <?php echo 'medical';?>
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg"  style="max-width: 20px;">
                                                    <?php
                                                        $Query33 = "SELECT
                                                        cpd. cpd_id, cpd.question_id, q.question_field, cpd.cpd_answer
                                                        FROM contact_profile_details AS cpd
                                                        LEFT OUTER JOIN questions AS q ON cpd.question_id = q.question_id
                                                        WHERE cpd.question_id IN (1,2) AND cpd.istrue = 'yes' AND cpd.cont_id=".$row->ContactID." ";
                                                        $count33 = mysql_num_rows(mysql_query($Query33));
                                                        $rs33 = mysql_query($Query33);
                                                        if ($count33 > 0) {
                                                            while ($row33 = mysql_fetch_object($rs33)) {
                                                                echo '<br/>'.$row33->cpd_answer;
                                                            }
                                                        }
                                                    ?>
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg" style="max-width: 20px;">
                                                    <?php
                                                        $boat = '';
                                                        $captain = '';
                                                        $deckhand = '';
                                                        
                                                        $cont_id = array();
                                                        $counter1 = 0;
                                                        $dynmvar = 0;
                                                        $Query1 = "
                                                        SELECT asch.asch_id, asch.act_boat_id, asch.asch_start_date, ac.act_name, acb.act_boat_name, 
                                                        abc.actboca_id, abd.actbodh_id,
                                                        abc.actboca_name, abd.actbodh_name,
                                                        abcn.actboca_id AS new_caption_id, abdn.actbodh_id AS new_deckhand_id, 
                                                        abcn.actboca_name AS new_caption, abdn.actbodh_name AS new_deckhand, 
                                                        c.ContactFirstName, c.ContactLastName, cp.conp_id  
                                                        FROM act_schedule AS asch 
                                                        LEFT OUTER JOIN activities AS ac ON asch.act_id = ac.act_id
                                                        LEFT OUTER JOIN act_boats AS acb ON asch.act_boat_id = acb.act_boat_id
                                                        LEFT OUTER JOIN act_boat_captain AS abc ON acb.actboca_id = abc.actboca_id
                                                        LEFT OUTER JOIN act_boat_deckhand AS abd ON acb.actbodh_id = abd.actbodh_id
                                                        LEFT OUTER JOIN act_new_boats AS anb ON anb.act_boat_id = acb.act_boat_id  
                                                        LEFT OUTER JOIN act_boat_captain AS abcn ON  abcn.actboca_id = anb.actboca_id 
                                                        LEFT OUTER JOIN act_boat_deckhand AS abdn ON  abdn.actbodh_id = anb.actbodh_id 
                                                        LEFT OUTER JOIN act_boats AS acbn ON anb.act_boat_id  = acbn.act_boat_id
                                                        LEFT OUTER JOIN contact_profiles AS cp ON asch.cont_id = cp.cont_id 
                                                        LEFT OUTER JOIN contacts AS c ON asch.cont_id=c.ContactID 
                                                        WHERE ((asch.act_boat_id != '' OR asch.act_id IN (2, 7, 11))) AND asch.cont_id = ".$row->ContactID."
                                                        GROUP BY asch.act_boat_id 
                                                        ORDER BY asch.act_boat_id DESC 
                                                        ";
                                                        $count1 = mysql_num_rows(mysql_query($Query1));
                                                        $rs1 = mysql_query($Query1);
                                                        if ($count1 > 0) {
                                                            while ($row1 = mysql_fetch_object($rs1)) {
                                                                $counter1++;
                                                                echo $boat = $row1->act_boat_name.'<br/><br/>';
                                                                echo $captain = (($row1->new_caption!='')?$row1->new_caption:$row1->actboca_name).'<br/><br/>';
                                                                echo $deckhand = (($row1->new_deckhand!='')?$row1->new_deckhand:$row1->actbodh_name);
                                                    ?>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg" style="max-width: 20px;">
                                                    <?php 
                                                        $day_counter = 0;
                                                        $day_counter1 = 0;
                                                        $date1 = '';
                                                        $date1 = $_SESSION['from_csv']; 
                                                               //returnName("Arrival_Start_Date", "packages", "Pms_Package_ID", $_REQUEST['pms_pak_id']);
                                                        $days1 = '0';
                                                        $date1 = strtotime($date1);
                                                        $date1 = strtotime('-'.$days1.' day', $date1);
                                                        $date1 = date('Y-m-d', $date1);
                                                        $date1 = $date1.' 00:00:00';

                                                        $date2 = '';
                                                        $date2 = $_SESSION['to_csv']; 
                                                               //returnName("Arrival_End_Date", "packages", "Pms_Package_ID", $_REQUEST['pms_pak_id']);
                                                        $days2 = '2';
                                                        $date2 = strtotime($date2);
                                                        $date2 = strtotime('+'.$days2.' day', $date2);
                                                        $date2 = date('Y-m-d', $date2);
                                                        $date2 = $date2.' 00:00:00';

                                                        $begin = new DateTime(  $date1 );
                                                        $end   = new DateTime(  $date2 );

                                                        $interval = DateInterval::createFromDateString('1 day');
                                                        $period = new DatePeriod($begin, $interval, $end);
                                                        $room_dates = array();
                                                        foreach ($period as $dt):
                                                            $room_dates[] .= $dt->format("Y-m-d");
                                                        endforeach;

                                                        $Query4 = "SELECT * FROM rooms ORDER BY room_title ASC";
                                                            $nResult4 = mysql_query($Query4);
                                                            if (mysql_num_rows($nResult4) >= 1) {
                                                                while ($row4 = mysql_fetch_object($nResult4)) {


                                                    ?>


                                        <?php
                                        $Query111 = "SELECT
p.Pms_Package_ID, p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, p.Package_Max_Days,
g.grp_id, g.GroupName,
c.ContactID, c.ContactFirstName, c.ContactLastName, c.cont_special_ins, 
cp.conp_id, cp.bootsize_id,
j.jacketsize_name,
b.bootsize_name
							
FROM packages AS p 
LEFT OUTER JOIN groups AS g ON p.Pms_Package_ID= g.Pms_Package_ID 
LEFT OUTER JOIN contacts AS c ON g.grp_id=c.grp_id
LEFT OUTER JOIN contact_profiles AS cp ON c.ContactID=cp.cont_id
LEFT OUTER JOIN jacket_size AS j ON cp.jacketsize_id=j.jacketsize_id
LEFT OUTER JOIN boot_size AS b ON cp.bootsize_id=b.bootsize_id 
WHERE 
c.arrival_flight_data >= '". $_SESSION['from_csv'] ."' 
AND c.arrival_flight_data <= '". $_SESSION['to_csv'] ."' 
AND p.Arrival_Start_Date > '2014-05-01'  
AND g.grp_id=c.grp_id
AND g.GroupArrivalDate > '2014-05-01' 
AND c.ContactID = ".$row->ContactID." 
ORDER BY g.GroupName, c.ContactFirstName, c.ContactLastName "; 
                                        
                                        $counter = 0;
                                        $count111 = mysql_num_rows(mysql_query($Query111));
                                        $rs111 = mysql_query($Query111);
                                        if ($count111 > 0) {
                                            while ($row111 = mysql_fetch_object($rs111)) {
                                                                        
                                                $Query5=0;
                                                $count5=0;
                                                $count6=0;
                                                foreach( $room_dates as $romd ):
                                                    $Query5 = "SELECT
                                                    rr.roomr_id, rr.room_id, r.room_title

                                                    FROM room_reservation AS rr 
                                                    LEFT OUTER JOIN rooms AS r ON rr.room_id=r.room_id

                                                    WHERE contact_id=" . $row111->ContactID . " 
                                                    AND r.room_id=".$row4->room_id." 
                                                    AND grp_id=" . $row111->grp_id . "
                                                    AND Pms_Package_ID=" . $row111->Pms_Package_ID . "
                                                    AND roomr_startdate= '" . $romd . "' ";
                                                    $count5 = mysql_num_rows(mysql_query($Query5));
                                                    if($count5!=0){
                                                        $count6=1;
                                                    }
                                                endforeach;    
                                                
                                                if($count6==1){
                                                    $counter++;
                                                ?>
                            
                            

                            
                            
                            
                            
                                                        <?php if($counter==1){?>
                                                            <?php echo returnName("room_title", "rooms", "room_id", $row4->room_id);?><br/><br/>
                                                        <?php }?>                                                    
                                                    
                                                    <?php 
                                                }
                                            }
                                        }
                                                                }
                                                            }
                                                    
                                                    ?>
                                                    <?php 
                                                        $Query22 = "
                                                        SELECT 
                                                        al.*, asch.asch_id 
                                                        FROM 
                                                        activity_logs AS al , 
                                                        act_schedule AS asch
                                                        WHERE
                                                        al.asch_id = asch.asch_id 
                                                        AND asch.cont_id = ".$row->ContactID." 
                                                        ";
                                                        $count22 = mysql_num_rows(mysql_query($Query22));
                                                        $rs22 = mysql_query($Query22);
                                                        if ($count22 > 0) {
                                                            while ($row22 = mysql_fetch_object($rs22)) {
                                                                print($row22->actl_details);
                                                            }
                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                            <?php
                        }
                    } else {
                        // print('<tr><td colspan="100%" align="center">No record found!</td></tr>');
                    }
                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else if (isset($_REQUEST['show']) && $_REQUEST['show'] == 2) {
        
        if (isset($_REQUEST['show'])) {
            $Query = "SELECT msch.* FROM menu_schedules AS msch WHERE msch.msch_id =  ".$_REQUEST['msch_id']." ";
            $rsM = mysql_query($Query);
            if (@mysql_num_rows($rsM) > 0) {
                $rsMem = mysql_fetch_object($rsM);
                $menu_b = $rsMem->menu_b;
                $menu_l = $rsMem->menu_l;
                $menu_d = $rsMem->menu_d;
                $menu_b_default = $rsMem->menu_b_default;
                $menu_l_default = $rsMem->menu_l_default;
                $menu_d_default = $rsMem->menu_d_default;
                $msch_custom_order = $rsMem->msch_custom_order;
                $msch_date = $rsMem->msch_date;
            } else {
                $menu_b = "";
                $menu_l = "";
                $menu_d = "";
                $menu_b_default = "";
                $menu_l_default = "";
                $menu_d_default = "";
                $msch_custom_order = "";
                $msch_date = "";
            }
        }
        
        if(isset($_REQUEST['pkg']) && $_REQUEST['pkg']!=''){
            if($_REQUEST['pkg'] == 4){
                $pkg = 1;
            } else if($_REQUEST['pkg'] == 5){
                $pkg = 2;
            }
        } else {
            $pkg = 1;
        }
        
        ?>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-cascade">
                    <div class="panel-heading">
                        <h3 class="panel-title">
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
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Serving Date:</label>
                                <div class="col-lg-10 col-md-9 det-display">
                                    <?php echo calendarDateConver2($_REQUEST['date']);?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Serving Day:</label>
                                <div class="col-lg-10 col-md-9 det-display">
                                    <?php echo $_REQUEST['day'];?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Serving Time:</label>
                                <div class="col-lg-10 col-md-9 det-display">
                                    <?php 
                                        if($_REQUEST['type']==1){
                                            echo 'Breakfast';
                                        }
                                        if($_REQUEST['type']==2){
                                            echo 'Lunch';
                                        }
                                        if($_REQUEST['type']==3){
                                            echo 'Dinner';
                                        }
                                    ?>
                                </div>
                            </div>
                            
                            <?php if($_REQUEST['type']==1){?>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label">Breakfast:</label>
                                <div class="col-lg-10 col-md-9">
                                    <select name="menu_b" style="width: 250px;" >
                                        <option value="0">Select</option>
                                        <?php echo FillSelected("menus WHERE menu_type=1 AND menu_package = ".$pkg." AND menu_package_day = ".($_REQUEST['day']+1)." AND menu_is_custom = 0 ", "menu_id", "menu_item_name", @$menu_b);?>
                                    </select>
                                </div>
                            </div>
                            <?php } else if($_REQUEST['type']==2){ ?>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label">Lunch:</label>
                                <div class="col-lg-10 col-md-9">
                                    <select name="menu_l" style="width: 250px;" >
                                        <option value="0">Select</option>
                                        <?php echo FillSelected("menus WHERE menu_type=2 AND menu_package = ".$pkg." AND menu_package_day = ".($_REQUEST['day']+1)." AND menu_is_custom = 0 ", "menu_id", "menu_item_name", @$menu_l);?>
                                    </select>
                                </div>
                            </div>
                            <?php } else if($_REQUEST['type']==3){ ?>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label">Dinner:</label>
                                <div class="col-lg-10 col-md-9">
                                    <select name="menu_d" style="width: 250px;" >
                                        <option value="0">Select</option>
                                        <?php echo FillSelected("menus WHERE menu_type=3 AND menu_package = ".$pkg." AND menu_package_day = ".($_REQUEST['day']+1)." AND menu_is_custom = 0 ", "menu_id", "menu_item_name", @$menu_d);?>
                                    </select>
                                </div>
                            </div>
                            <?php }?>

                            <hr>
                            <?php if($_REQUEST['type']==1){?>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label">Custom Breakfast:</label>
                                <div class="col-lg-10 col-md-9">
                                    <select name="menu_b_default" style="width: 250px;" >
                                        <option value="0">Select</option>
                                        <?php echo FillSelected("menus WHERE menu_type=1 AND menu_package = ".$pkg." AND menu_package_day = ".($_REQUEST['day']+1)." AND menu_is_custom = 1 ", "menu_id", "menu_item_name", @$menu_b_default);?>
                                    </select>
                                </div>
                            </div>
                            <?php } else if($_REQUEST['type']==2){ ?>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label">Custom Lunch:</label>
                                <div class="col-lg-10 col-md-9">
                                    <select name="menu_l_default" style="width: 250px;" >
                                        <option value="0">Select</option>
                                        <?php echo FillSelected("menus WHERE menu_type=2 AND menu_package = ".$pkg." AND menu_package_day = ".($_REQUEST['day']+1)." AND menu_is_custom = 1 ", "menu_id", "menu_item_name", @$menu_l_default);?>
                                    </select>
                                </div>
                            </div>
                            <?php } else if($_REQUEST['type']==3){ ?>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label">Custom Dinner:</label>
                                <div class="col-lg-10 col-md-9">
                                    <select name="menu_d_default" style="width: 250px;" >
                                        <option value="0">Select</option>
                                        <?php echo FillSelected("menus WHERE menu_type=3 AND menu_package = ".$pkg." AND menu_package_day = ".($_REQUEST['day']+1)." AND menu_is_custom = 1 ", "menu_id", "menu_item_name", @$menu_d_default);?>
                                    </select>
                                </div>
                            </div>
                            <?php }?>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label"> &nbsp; </label>
                                <div class="col-lg-10 col-md-9">
                                    <p>If you don't see the menu items then you have to add Menus first from menu section for current Day and Serving Time</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label">Extended Custom Order:</label>
                                <div class="col-lg-10 col-md-9">
                                    <textarea type="text" class="form-control form-cascade-control input_wid70" id="msch_custom_order" name="msch_custom_order" ><?php echo @$msch_custom_order;?></textarea>
                                </div>
                            </div>
                            <hr>
                            
                            <div class="form-group">
                                <?php @$bvo_id = returnName("bvo_id", "beverage_order", "cont_id", $_REQUEST['contactid']." AND grp_id=".$_REQUEST['grp_id']." AND pms_pak_id=".$_REQUEST['pms_pak_id']." AND bvo_date = '".$_REQUEST['date']."' ");?>
                                <label class="col-lg-2 col-md-3 control-label">Boat or Activity Beverage Order:</label>
                                <div class="col-lg-10 col-md-9">
                                    <select name="bitem_id[]" id="bitem_id" data-placeholder="Choose Beverage(s)..." class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2" multiple="multiple">
                                        <?php 
                                            $strQuery = "
                                            SELECT bi.*, 
                                            ( SELECT bo.bvo_id FROM beverage_order AS bo WHERE bo.bitem_id = bi.bitem_id AND bo.cont_id = ".$_REQUEST['contactid']." AND bo.grp_id=".$_REQUEST['grp_id']." AND bo.pms_pak_id = ".$_REQUEST['pms_pak_id']." AND bo.bvo_date = '".$_REQUEST['date']."' ) AS selected_item 
                                            FROM bar_items AS bi WHERE bi.bitem_type = 2";
                                            $nResult = mysql_query($strQuery);
                                            if (mysql_num_rows($nResult) >= 1) {
                                                while ($row = mysql_fetch_object($nResult)) {
                                                    if (@$row->selected_item != '') {
                                                        print("<option value=\"$row->bitem_id\" selected>$row->bitem_name</option>");
                                                    } else {
                                                        print("<option value=\"$row->bitem_id\">$row->bitem_name</option>");
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                    <br/><p>You can select multiple options.</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label">Quantity:</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" class="form-control form-cascade-control input_wid70 required" id="bvo_quantity" name="bvo_quantity" value="<?php echo returnName("bvo_quantity", "beverage_order", "cont_id", $_REQUEST['contactid']." AND grp_id=".$_REQUEST['grp_id']." AND pms_pak_id=".$_REQUEST['pms_pak_id']." AND bvo_date = '".$_REQUEST['date']."'");?>" style="max-width: 60px;" maxlength="3" />
                                </div>
                            </div>
                            
                            <div class="form-actions">
                                <label class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                                <input type="hidden" name="pms_pak_id" value="<?php echo $_REQUEST['pms_pak_id']; ?>">
                                <input type="hidden" name="cont_id" value="<?php echo $_REQUEST['contactid']; ?>">
                                <input type="hidden" name="grp_id" value="<?php echo $_REQUEST['grp_id']; ?>">
                                <input type="hidden" name="date" value="<?php echo $_REQUEST['date']; ?>">
                                <input type="hidden" name="msch_id" value="<?php echo @$_REQUEST['msch_id']; ?>">
                                <input type="hidden" name="day" value="<?php echo @$_REQUEST['day']; ?>">
                                <input type="hidden" name="msch_type" value="<?php echo @$_REQUEST['type']; ?>">

                                <?php if ( !(isset($_REQUEST['msch_id']) && $_REQUEST['msch_id']!='') && (isset($_REQUEST['add'])) ) { ?>
                                    &nbsp; <input type="submit" value="Add" name="btnAdd" class="btn bg-primary text-white">
                                <?php } else { ?>
                                    &nbsp; <input type="submit" value="Update" name="btnAdd" class="btn bg-primary text-white">
                                <?php } ?>
                                &nbsp; <button type="button" class="btn btn-default btn-animate-demo" onclick="javascript: window.location = '<?php @print($_SERVER['HTTP_REFERER']); ?>';">Back</button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
            } else if (isset($_REQUEST['show']) && $_REQUEST['show'] == 3) {
                $rsM = mysql_query("
SELECT 
msc.msch_id, msc.msch_custom_order,
mib.menu_item_name AS mib, mibd.menu_item_name AS mibd, 
mil.menu_item_name AS mil, mild.menu_item_name AS mild,
mid.menu_item_name AS mid, midd.menu_item_name AS midd
FROM menu_schedules AS msc
LEFT OUTER JOIN menus AS mib ON msc.menu_b=mib.menu_id AND mib.menu_type=1
LEFT OUTER JOIN menus AS mibd ON msc.menu_b_default=mibd.menu_id AND mibd.menu_type=1
LEFT OUTER JOIN menus AS mil ON msc.menu_l=mil.menu_id AND mil.menu_type=2
LEFT OUTER JOIN menus AS mild ON msc.menu_l_default=mild.menu_id AND mild.menu_type=2
LEFT OUTER JOIN menus AS mid ON msc.menu_d=mid.menu_id AND mid.menu_type=3
LEFT OUTER JOIN menus AS midd ON msc.menu_d_default=midd.menu_id AND midd.menu_type=3
WHERE msc.msch_id = ".$_REQUEST['msch_id']);
                if(mysql_num_rows($rsM)>0){
                    $rsMem = mysql_fetch_object($rsM);
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
                        <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Serving Date:</label>
                                <div class="col-lg-10 col-md-9 det-display">
                                    <?php echo calendarDateConver2($_REQUEST['date']);?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Serving Day:</label>
                                <div class="col-lg-10 col-md-9 det-display">
                                    <?php echo $_REQUEST['day'];?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Serving Time:</label>
                                <div class="col-lg-10 col-md-9 det-display">
                                    <?php 
                                        if($_REQUEST['type']==1){
                                            echo 'Breakfast';
                                        }
                                        if($_REQUEST['type']==2){
                                            echo 'Lunch';
                                        }
                                        if($_REQUEST['type']==3){
                                            echo 'Dinner';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Serving Items:</label>
                                <div class="col-lg-10 col-md-9 det-display">
                                    <?php 
                                        echo 'Regular: '.$rsMem->mib.$rsMem->mil.$rsMem->mid.'<br/>';
                                        echo 'Custom: '.$rsMem->mibd.$rsMem->mild.$rsMem->midd.'<br/>';
                                        echo 'Extended Custom: '.$rsMem->msch_custom_order.'<br/>';
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                                <div class="col-lg-10 col-md-9">
                                    <button type="button" name="btnCancel" class="btn btn-default btn-animate-demo" onclick="javascript: window.location = '<?php print($_SERVER['HTTP_REFERER']); ?>';">Back</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        
                }
        } else {
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="<?php print($class); ?>"><?php print($strMSG); ?></div>
                <div class="panel">
                    <div class="panel-heading text-primary">
                        <h3 class="panel-title"><i class="fa fa-glass"></i>  Manage CSV content generation  
                            <span class="pull-right" style="width:auto;">
                            </span> 
                        </h3>
                    </div>
                    
                    <div class="panel-body ">
                        <div class="ro">
                            <div class="col-mol-md-offset-2">
                                <form class="form-horizontal cascde-forms" method="get" action="<?php print($_SERVER['PHP_SELF']); ?>" name="frm" id="frm" >
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label">From:</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control form-cascade-control datetimepicker" value="<?php echo calendarDateConver2($_SESSION['from_csv']);?>" id="from_csv" name="from_csv" style="width: 160px;" title="Please Enter Group Arrival Date" placeholder=" Date From ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label">To:</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" class="form-control form-cascade-control datetimepicker" value="<?php echo calendarDateConver2($_SESSION['to_csv']);?>" id="to_csv" name="to_csv"  style="width: 160px;" title="Please Enter Group Departure Date" placeholder=" Date To ">
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <label class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                                        <input type="hidden" value="1" name="show">
                                        <input type="submit" value="Submit" name="filterRecords" class="btn bg-primary text-white btn-lg">
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <?php
    //                        echo '<pre>';
    //                        print_r( $_SESSION );
    //                        echo '</pre>';
                        ?>
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

