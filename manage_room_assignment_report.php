<?php include ('includes/php_includes_top.php'); ?>
<?php
if ((isset($_REQUEST['pk_from'])) && ($_REQUEST['pk_from'] != '')) {
    $_SESSION['pk_from'] = calendarDateConver4($_REQUEST['pk_from']);
} else if (isset($_SESSION['pk_from'])) {
    //$_SESSION['from'] = $_SESSION['from'];
    $_SESSION['pk_from'] = date("Y-m-d"); //use today's date ...
} else {
    //$_SESSION['pk_from'] = $_SESSION['config_date1'];
    //$_SESSION['pk_from'] = $_SESSION['config_date1'];
    $_SESSION['pk_from'] = date("Y-m-d"); //use today's date ...
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
if (isset($_REQUEST['action'])) {
    if (isset($_REQUEST['btnAdd'])) {

        $maxID = getMaximum("act_schedule", "asch_id");
        $asch_start_date = trim(dbStr(calendarDateConver4($_REQUEST['asch_start_date'])) . ' ' . $_REQUEST['asch_start_time']);
        if ($_REQUEST['act_id'] == 1) {
            $asch_end_date = trim(dbStr(calendarDateConver4($_REQUEST['asch_start_date'])));
        } else {
            $asch_end_date = trim(dbStr(calendarDateConver4($_REQUEST['asch_start_date'])) . ' ' . $_REQUEST['asch_end_time']);
        }

        mysql_query("INSERT INTO act_schedule (asch_id, cont_id, grp_id, act_id, ag_id, ad_id, av_id, asch_start_date, asch_end_date, status_id, createdDate, ath_id, atht_id, av_confirmed, av_confirming_person, av_date, av_time, asch_duration, act_boat_id) VALUES(" . $maxID . ", '" . dbStr($_REQUEST['cont_id']) . "', '" . dbStr($_REQUEST['grp_id']) . "', '" . dbStr($_REQUEST['act_id']) . "', '" . @dbStr(@$_REQUEST['ag_id']) . "', '" . @dbStr(@$_REQUEST['ad_id']) . "', '" . @dbStr(@$_REQUEST['av_id']) . "', '" . $asch_start_date . "', '" . $asch_end_date . "',1 , NOW(), '" . dbStr(@$_REQUEST['ath_id']) . "', '" . dbStr(@$_REQUEST['atht_id']) . "', '" . dbStr(@$_REQUEST['av_confirmed']) . "', '" . dbStr(@$_REQUEST['av_confirming_person']) . "', '" . dbStr(calendarDateConver4($_REQUEST['av_date'])) . "', '" . dbStr(@$_REQUEST['av_time']) . "', '" . @dbStr(@$_REQUEST['asch_duration']) . "', '" . @dbStr(@$_REQUEST['act_boat_id']) . "')") or die(mysql_error());

        header("Location: " . $_SERVER['PHP_SELF'] . "?op=1");
    } elseif (isset($_REQUEST['btnUpdate'])) {

        $asch_start_date = trim(dbStr(calendarDateConver4($_REQUEST['asch_start_date'])) . ' ' . $_REQUEST['asch_start_time']);
        if ($_REQUEST['act_id'] == 1) {
            $asch_end_date = trim(dbStr(calendarDateConver4($_REQUEST['asch_start_date'])));
        } else {
            $asch_end_date = trim(dbStr(calendarDateConver4($_REQUEST['asch_start_date'])) . ' ' . $_REQUEST['asch_end_time']);
        }
        $udtQuery = "UPDATE act_schedule SET cont_id='" . dbStr($_REQUEST['cont_id']) . "', grp_id='" . dbStr($_REQUEST['grp_id']) . "', act_id='" . dbStr($_REQUEST['act_id']) . "', ag_id='" . dbStr(@$_REQUEST['ag_id']) . "', ad_id='" . dbStr(@$_REQUEST['ad_id']) . "', av_id='" . dbStr(@$_REQUEST['av_id']) . "', asch_start_date='" . $asch_start_date . "', asch_end_date='" . $asch_end_date . "', updatedDate=NOW(), ath_id='" . dbStr(@$_REQUEST['ath_id']) . "', atht_id='" . dbStr(@$_REQUEST['atht_id']) . "', av_confirmed='" . dbStr(@$_REQUEST['av_confirmed']) . "', av_confirming_person='" . dbStr(@$_REQUEST['av_confirming_person']) . "', av_date='" . dbStr(calendarDateConver4($_REQUEST['av_date'])) . "', av_time='" . dbStr(@$_REQUEST['av_time']) . "', asch_duration='" . dbStr(@$_REQUEST['asch_duration']) . "', act_boat_id='" . dbStr(@$_REQUEST['act_boat_id']) . "' WHERE asch_id=" . $_REQUEST['asch_id'] . " ";
        mysql_query($udtQuery) or die(mysql_error());
        header("Location: " . $_SERVER['PHP_SELF'] . "?op=2");
    } elseif ($_REQUEST['action'] == 2) {

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
        <h3 class="page-header"> Room Assignment Report <?php if(isset($_REQUEST['pms_pak_id'])){?> - <a href="manage_room_assignment_report_print.php?show=1&pms_pak_id=<?php echo $_REQUEST['pms_pak_id'];?>" target="_blank" >Go to Printing Page</a><?php }?> <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b> Room Assignment Report: </b> You can see Room Assignment Report here </p>
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
        $Query = "SELECT 
        p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, p.Package_Max_Days
        FROM packages AS p
        WHERE 
        p.Pms_Package_ID=" . $_REQUEST['pms_pak_id'] . "  LIMIT 1";
        $nResult = mysql_query($Query);
        if (mysql_num_rows($nResult) >= 1) {
            while ($row = mysql_fetch_row($nResult)) {
                echo $row[0] . ' - ' . calendarDateConver2($row[1]) . ' - ' . calendarDateConver2($row[2]) . ' - ' . $row[3] . ' Days';
            }
        }
        ?>
                            <span class="pull-right" style="width:auto;">
                            </span> 
                        </h3>
                    </div>
                    <div class="panel-body">
                        <table class="table users-table table-condensed table-hover table-striped display dataTable" id="" >
                        <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                            
                            <?php
                                $day_counter = 0;
                                $day_counter1 = 0;
                                $date1 = '';
                                $date1 = returnName("Arrival_Start_Date", "packages", "Pms_Package_ID", $_REQUEST['pms_pak_id']);
                                $days1 = '0';
                                $date1 = strtotime($date1);
                                $date1 = strtotime('-'.$days1.' day', $date1);
                                $date1 = date('Y-m-d', $date1);
                                $date1 = $date1.' 00:00:00';

                                $date2 = '';
                                $date2 = returnName("Arrival_End_Date", "packages", "Pms_Package_ID", $_REQUEST['pms_pak_id']);
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
                                        /*$Query = "SELECT
p.Pms_Package_ID, p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, p.Package_Max_Days,
g.grp_id, g.GroupName,
c.ContactID, c.ContactFirstName, c.ContactLastName, c.cont_special_ins, 
cp.conp_id, cp.bootsize_id,
j.jacketsize_name,
b.bootsize_name
							
FROM packages AS p 
LEFT OUTER JOIN groups AS g ON p.Pms_Package_ID= g.Pms_Package_ID 
LEFT OUTER JOIN group_contacts AS gc ON gc.grp_id=g.grp_id
LEFT OUTER JOIN contacts AS c ON c.ContactID=gc.ContactID
LEFT OUTER JOIN contact_profiles AS cp ON c.ContactID=cp.cont_id
LEFT OUTER JOIN jacket_size AS j ON cp.jacketsize_id=j.jacketsize_id
LEFT OUTER JOIN boot_size AS b ON cp.bootsize_id=b.bootsize_id
							
WHERE 
p.Pms_Package_ID = " . $_REQUEST['pms_pak_id'] . "  
AND p.Arrival_Start_Date > '2014-05-01'  
AND g.grp_id=c.grp_id
AND g.GroupArrivalDate > '2014-05-01' 

ORDER BY g.GroupName, c.ContactLastName ASC";*/
mysql_query("SET SQL_BIG_SELECTS=1");
$Query = "SELECT
p.Pms_Package_ID, p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, p.Package_Max_Days,
g.grp_id, g.GroupName,
gc.ContactID, c.ContactFirstName, c.ContactLastName, c.cont_special_ins,
cp.conp_id, cp.bootsize_id,
j.jacketsize_name,
b.bootsize_name
FROM packages AS p 
LEFT OUTER JOIN groups AS g ON g.Pms_Package_ID=p.Pms_Package_ID 
LEFT OUTER JOIN group_contacts AS gc ON gc.grp_id=g.grp_id
LEFT OUTER JOIN contacts AS c ON c.ContactID=gc.ContactID
LEFT OUTER JOIN contact_profiles AS cp ON cp.cont_id=c.ContactID
LEFT OUTER JOIN jacket_size AS j ON j.jacketsize_id=cp.jacketsize_id
LEFT OUTER JOIN boot_size AS b ON b.bootsize_id = cp.bootsize_id
							
WHERE 

p.Pms_Package_ID = " . $_REQUEST['pms_pak_id'] . "  
AND p.Arrival_Start_Date > '2014-05-01'  
AND g.GroupArrivalDate > '2014-05-01' 
ORDER BY g.GroupName,  c.ContactFirstName ASC";
                                        $counter = 0;
                                        $limit = $_SESSION['limit_of_rec'];
                                        $start = $p->findStart($limit);
                                        $count = mysql_num_rows(mysql_query($Query));
                                        $pages = $p->findPages($count, $limit);
                                        $rs = mysql_query($Query . " LIMIT " . $start . ", " . $limit);
                                        if (mysql_num_rows($rs) > 0) {
                                            while ($row = mysql_fetch_object($rs)) {
                                                                        
                                                //echo '<pre>';
                                                //print_r( $room_dates );
                                                
                                                //echo '</pre>';
                                                
                                                $Query5=0;
                                                $count5=0;
                                                $count6=0;
                                                foreach( $room_dates as $romd ):
                                                    $Query5 = "SELECT
                                                    rr.roomr_id, rr.room_id, r.room_title

                                                    FROM room_reservation AS rr 
                                                    LEFT OUTER JOIN rooms AS r ON rr.room_id=r.room_id

                                                    WHERE contact_id=" . $row->ContactID . " 
                                                    AND r.room_id=".$row4->room_id." 
                                                    AND grp_id=" . $row->grp_id . "
                                                    AND Pms_Package_ID=" . $row->Pms_Package_ID . "
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
                                <thead>
                                    <tr><th class="visible-xs visible-sm visible-md visible-lg" colspan="100%" style="text-align: center; border: 0px solid #ddd !important;">&nbsp;  </th>
                                    </tr>
                                    <tr>
                                        <th class="visible-xs visible-sm visible-md visible-lg" colspan="100%" style="text-align: center; border: 0px solid #ddd !important;">
                                            <span style="text-decoration: underline;"> Room Name: <strong><?php echo returnName("room_title", "rooms", "room_id", $row4->room_id);?></strong></span>
                                        </th>
                                    </tr>
                                </thead>
                                <?php }?>
                                <?php if($counter==1){?>
                                <thead>
                                    <tr>
                                        <th class="visible-xs visible-sm visible-md visible-lg" style="width: 140px;">
                                            <?php if($counter==1){?>Guest<?php } else {?>&nbsp;<?php }?>
                                        </th>
                                        <th class="visible-xs visible-sm visible-md visible-lg" style="width: 100px;">
                                            <?php if($counter==1){?>Sizes<?php } else {?>&nbsp;<?php }?>
                                        </th>
                                        <th class="visible-xs visible-sm visible-md visible-lg" style="width: 150px;">
                                            <?php if($counter==1){?>Special Instructions<?php } else {?>&nbsp;<?php }?>
                                        </th>
                                        <th class="visible-xs visible-sm visible-md visible-lg" style="width: 140px;">
                                            <?php if($counter==1){?>Group<?php } else {?>&nbsp;<?php }?>
                                        </th>
                                        <?php
                                        $day_counter = 0;
                                        $day_counter1 = 0;
                                        $date1 = '';
                                        $date1 = returnName("Arrival_Start_Date",
                                                "packages", "Pms_Package_ID",
                                                $_REQUEST['pms_pak_id']);
                                        $days1 = '0';
                                        $date1 = strtotime($date1);
                                        $date1 = strtotime('-' . $days1 . ' day',
                                                $date1);
                                        $date1 = date('Y-m-d', $date1);
                                        $date1 = $date1 . ' 00:00:00';
                                        $date2 = '';
                                        $date2 = returnName("Arrival_End_Date",
                                                "packages", "Pms_Package_ID",
                                                $_REQUEST['pms_pak_id']);
                                        $days2 = '2';
                                        $date2 = strtotime($date2);
                                        $date2 = strtotime('+' . $days2 . ' day',
                                                $date2);
                                        $date2 = date('Y-m-d', $date2);
                                        $date2 = $date2 . ' 00:00:00';
                                        $begin = new DateTime($date1);
                                        $end = new DateTime($date2);
                                        $interval = DateInterval::createFromDateString('1 day');
                                        $period = new DatePeriod($begin,
                                                $interval, $end);
                                        $no_of_days = diffindates($date1, $date2);
                                        foreach ($period as $dt):
                                            $day_counter++;
                                            if ($no_of_days != $day_counter) {
                                                ?>
                                                <th class="visible-xs visible-sm visible-md visible-lg" style="width: 100px;">
                                                    <?php if($counter==1){?>
                                                    <?php
                                                    if ($day_counter != 1) {
                                                        if ($no_of_days == $day_counter) {
                                                            // echo '<br/>'.$dt->format( "m/d/Y" );
                                                        } else {
                                                            if ($no_of_days != (1 + $day_counter)) {
                                                                $day_counter1++;
                                                                echo 'Night ' . $day_counter1 . '<br/>' . $dt->format("m/d/Y");
                                                            }
                                                        }
                                                    } else {
                                                        $day_counter1++;
                                                        echo 'Night ' . $day_counter1 . '<br/>' . $dt->format("m/d/Y");
                                                    }
                                                    if (($day_counter - $day_counter1) == 1) {
                                                        echo '<br/>' . $dt->format("m/d/Y");
                                                    }
                                                    ?>
                                                    <?php } else {?>&nbsp;<?php }?>
                                                </th>
                                            <?php
                                        }
                                    endforeach;
                                    ?>
                                    </tr>
                                </thead>
                                <?php }?>
                                            <tr>
                                                <td class="visible-xs visible-sm visible-md visible-lg" style="width: 140px;"><?php print($row->ContactFirstName.' '.$row->ContactLastName); ?> &nbsp; </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg" style="width: 100px;"><?php echo 'Jacket Size: '.$row->jacketsize_name.'<br>Boot Size: '.  $row->bootsize_name;?> &nbsp; </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg" style="width: 150px;"><?php echo $row->cont_special_ins;?> &nbsp; </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg" style="width: 140px;"><?php echo $row->GroupName;?> &nbsp; </td>
                                                    <?php
                                                    $day_counter = 0;
                                                    $day_counter1 = 0;
                                                    $date1 = '';
                                                    $date1 = returnName("Arrival_Start_Date",
                                                            "packages",
                                                            "Pms_Package_ID",
                                                            $_REQUEST['pms_pak_id']);
                                                    $days1 = '0';
                                                    $date1 = strtotime($date1);
                                                    $date1 = strtotime('-' . $days1 . ' day',
                                                            $date1);
                                                    $date1 = date('Y-m-d',
                                                            $date1);
                                                    $date1 = $date1 . ' 00:00:00';

                                                    $date2 = '';
                                                    $date2 = returnName("Arrival_End_Date",
                                                            "packages",
                                                            "Pms_Package_ID",
                                                            $_REQUEST['pms_pak_id']);
                                                    $days2 = '2';
                                                    $date2 = strtotime($date2);
                                                    $date2 = strtotime('+' . $days2 . ' day',
                                                            $date2);
                                                    $date2 = date('Y-m-d',
                                                            $date2);
                                                    $date2 = $date2 . ' 00:00:00';


                                                    $begin = new DateTime($date1);
                                                    $end = new DateTime($date2);

                                                    $interval = DateInterval::createFromDateString('1 day');
                                                    $period = new DatePeriod($begin,
                                                            $interval, $end);
                                                    $no_of_days = diffindates($date1,
                                                            $date2);

                                                    foreach ($period as $dt):
                                                        $day_counter++;
                                                        if ($no_of_days != $day_counter) {
                                                            ?>
                                                        <td class="visible-xs visible-sm visible-md visible-lg" style="width: 100px;"> 
                                                            <?php
                                                            if ($day_counter != 1) {
                                                                if ($no_of_days == $day_counter) {
                                                                    
                                                                } else {
                                                                    if ($no_of_days != (1 + $day_counter)) {
                                                                        $Query1 = "SELECT
                                                                        rr.roomr_id, rr.room_id, r.room_title

                                                                        FROM room_reservation AS rr 
                                                                        LEFT OUTER JOIN rooms AS r ON rr.room_id=r.room_id

                                                                        WHERE contact_id=" . $row->ContactID . " 
                                                                        AND r.room_id=".$row4->room_id." 
                                                                        AND grp_id=" . $row->grp_id . "
                                                                        AND Pms_Package_ID=" . $row->Pms_Package_ID . "
                                                                        AND roomr_startdate= '" . $dt->format("Y-m-d") . "' ";
                                                                        $count1 = mysql_num_rows(mysql_query($Query1));
                                                                        $rs1 = mysql_query($Query1);
                                                                        if ($count1 > 0) {
                                                                            while ($row1
                                                                            = mysql_fetch_object($rs1)) {
                                                                                $day_counter1++;
                                                                                //echo '<a href='.$_SERVER['PHP_SELF']."?show=2&pms_pak_id=".$row->Pms_Package_ID."&contactid=".$row->ContactID."&grp_id=".$row->grp_id."&date=".$dt->format("Y-m-d")."&update=1&roomr_id=".$row1->roomr_id."&room_id=".$row1->room_id.'> '.$row1->room_title.' - Delete </a>';

                                                                                echo 'Reserved';
                                                                                //$row1->room_title . '<br/>' . '<a href=' . $_SERVER['PHP_SELF'] . "?delete=1&roomr_id=" . $row1->roomr_id . "&show=1&pms_pak_id=" . $row->Pms_Package_ID . "&contactid=" . $row->ContactID . '>Unassign</a>' . '<br/><a href=' . $_SERVER['PHP_SELF'] . "?show=3&roomr_id=" . $row1->roomr_id . "&pms_pak_id=" . $row->Pms_Package_ID . "&contactid=" . $row->ContactID . "&grp_id=" . $row->grp_id . "&date=" . $dt->format("Y-m-d") . '>Details</a>'
                                                                                ;
                                                                            }
                                                                        } else {
                                                                            $day_counter1++;
                                                                            echo 'Free';
                                                                            //echo '<br/><a href=' . $_SERVER['PHP_SELF'] . "?show=2&pms_pak_id=" . $row->Pms_Package_ID . "&contactid=" . $row->ContactID . "&grp_id=" . $row->grp_id . "&date=" . $dt->format("Y-m-d") . "&add=1" . '>Not Assigned</a>';
                                                                        }
                                                                    }
                                                                }
                                                            } else {
                                                                $Query1 = "SELECT
                                                                rr.roomr_id, rr.room_id, r.room_title

                                                                FROM room_reservation AS rr 
                                                                LEFT OUTER JOIN rooms AS r ON rr.room_id=r.room_id

                                                                WHERE contact_id=" . $row->ContactID . "
                                                                    AND r.room_id=".$row4->room_id."  
                                                                AND grp_id=" . $row->grp_id . "
                                                                AND Pms_Package_ID=" . $row->Pms_Package_ID . "
                                                                AND roomr_startdate= '" . $dt->format("Y-m-d") . "' ";
                                                                $count1 = mysql_num_rows(mysql_query($Query1));
                                                                $rs1 = mysql_query($Query1);
                                                                if ($count1 > 0) {
                                                                    while ($row1
                                                                    = mysql_fetch_object($rs1)) {
                                                                        $day_counter1++;
                                                                        //echo '<a href='.$_SERVER['PHP_SELF']."?show=2&pms_pak_id=".$row->Pms_Package_ID."&contactid=".$row->ContactID."&grp_id=".$row->grp_id."&date=".$dt->format("Y-m-d")."&update=1&roomr_id=".$row1->roomr_id."&room_id=".$row1->room_id.'> '.$row1->room_title.' - Delete </a>';
                                                                        echo 'Reserved'; 
                                                                        //$row1->room_title . '<br/><a href=' . $_SERVER['PHP_SELF'] . "?delete=1&roomr_id=" . $row1->roomr_id . "&show=1&pms_pak_id=" . $row->Pms_Package_ID . "&contactid=" . $row->ContactID . '>Unassign</a>' . '<br/><a href=' . $_SERVER['PHP_SELF'] . "?show=3&roomr_id=" . $row1->roomr_id . "&pms_pak_id=" . $row->Pms_Package_ID . "&contactid=" . $row->ContactID . "&grp_id=" . $row->grp_id . "&date=" . $dt->format("Y-m-d") . '>Details</a>';
                                                                    }
                                                                } else {
                                                                    $day_counter1++;
                                                                    echo 'Free';
                                                                    //echo '<br/><a href=' . $_SERVER['PHP_SELF'] . "?show=2&pms_pak_id=" . $row->Pms_Package_ID . "&contactid=" . $row->ContactID . "&grp_id=" . $row->grp_id . "&date=" . $dt->format("Y-m-d") . "&add=1" . '>Not Assigned</a>';
                                                                }
                                                            }
                                                            ?> 
                                                        </td>
                                    <?php
                                }
                            endforeach;
                            ?>
                                            </tr>
                            <?php //if($counter==1){?>
                            <?php //}?>
                            <?php
                                                }
                        }
                    } else {
                        //print('<tr><td colspan="100%" align="center">No record found!</td></tr>');
                    }
                    ?>
                            <?php
                                    }
                                }
                            ?>
                        
                        
                        </form>
                            </table>
                    </div>
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
                                                <?php
                                                $strQuery = "SELECT * FROM 
					(    
					SELECT r.*,
					(
					SELECT  COUNT(DISTINCT rr.contact_id) AS total_res 
					FROM room_reservation AS rr 
					WHERE rr.Pms_Package_ID = " . $_REQUEST['pms_pak_id'] . " AND r.room_id=rr.room_id
					) AS total_rec
					FROM rooms AS r
					ORDER BY r.room_title ASC
					) AS subq
					WHERE total_rec < 2
					ORDER BY room_title ASC";
                                                ?>

                    <div class="panel-body ">
                        <div class="ro">
                            <div class="col-mol-md-offset-2">
                                <form class="form-horizontal cascde-forms" method="post" action="<?php print($_SERVER['PHP_SELF']); ?>" name="frm" id="frm" >
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label">Select Room:</label>
                                        <div class="col-lg-10 col-md-9">
                                            <select name="room_id" id="room_id" data-placeholder="Choose a Room..." class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2">
        <?php
//                                                    $strQuery = "SELECT * FROM 
//                                                    (    
//                                                    SELECT r.*,
//                                                    (
//                                                    SELECT  COUNT(DISTINCT rr.contact_id) AS total_res 
//                                                    FROM room_reservation AS rr 
//                                                    WHERE rr.Pms_Package_ID = ".$_REQUEST['pms_pak_id']." AND r.room_id=rr.room_id
//                                                    ) AS total_rec
//                                                    FROM rooms AS r
//                                                    ORDER BY r.room_title ASC
//                                                    ) AS subq
//                                                    WHERE total_rec < room_mem 
//                                                    ORDER BY room_title ASC";
//                                                    $nResult = mysql_query($strQuery);
//                                                    if (mysql_num_rows($nResult) >= 1) {
//                                                        while ($row = mysql_fetch_row($nResult)) {
//                                                            if ($row[0] == @$_REQUEST['room_id']) {
//                                                                print("<option value=\"$row[0]\" selected>$row[1]</option>");
//                                                            } else {
//                                                                print("<option value=\"$row[0]\">$row[1]</option>");
//                                                            }
//                                                        }
//                                                    }

        $strQuery = "SELECT * FROM rooms ORDER BY room_title ASC";
        $nResult = mysql_query($strQuery);
        if (mysql_num_rows($nResult) >= 1) {
            while ($row = mysql_fetch_row($nResult)) {
                if ($row[0] == @$_REQUEST['room_id']) {
                    print("<option value=\"$row[0]\" selected>$row[1]</option>");
                } else {
                    print("<option value=\"$row[0]\">$row[1]</option>");
                }
            }
        }
        ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label">Special Instructions:</label>
                                        <div class="col-lg-10 col-md-9">
                                            <textarea rows="2"  class="form-control form-cascade-control" id="pk_from" name="cont_special_ins" style="width:240px;"><?php echo @returnName("cont_special_ins",
                                            "contacts", "ContactID",
                                            $_REQUEST['contactid']); ?></textarea>
                                            <p> Special Instructions for this Guest for whole Package </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label">Select for All Package Dates:</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="checkbox" style="width:20px; height:20px;" id="room_all" name="room_all" value="1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label">Select for Individual Dates:</label>
                                        <div class="col-lg-10 col-md-9">
        <?php
        $day_counter = 0;
        $day_counter1 = 0;
        $date1 = '';
        $date1 = returnName("Arrival_Start_Date", "packages", "Pms_Package_ID",
                $_REQUEST['pms_pak_id']);
        $days1 = '0';
        $date1 = strtotime($date1);
        $date1 = strtotime('-' . $days1 . ' day', $date1);
        $date1 = date('Y-m-d', $date1);
        $date1 = $date1 . ' 00:00:00';

        $date2 = '';
        $date2 = returnName("Arrival_End_Date", "packages", "Pms_Package_ID",
                $_REQUEST['pms_pak_id']);
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
            if ($day_counter != 1) {
                if ($no_of_days == $day_counter) {
                    //echo '<br/>'.$dt->format( "m/d/Y" );
                } else {
                    if ($no_of_days != (1 + $day_counter)) {
                        $day_counter1++;
                        echo ' ' . $dt->format("m/d/Y");
                        ?>
                                                            <input type="checkbox" style="width:20px; height:20px;" id="room_all" name="room_all[]" value="<?php echo $dt->format("d/m/Y"); ?>">
                        <?php
                    }
                }
            } else {
                $day_counter1++;
                echo ' ' . $dt->format("m/d/Y");
                ?>
                                                    <input type="checkbox" style="width:20px; height:20px;" id="room_all" name="room_all[]"  value="<?php echo $dt->format("d/m/Y"); ?>">
                <?php
            }
        endforeach;
        ?>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <label class="col-lg-2 col-md-3 control-label">&nbsp;</label>

                                        <input type="hidden" name="chkstatus" value="1">
                                        <input type="hidden" name="pms_pak_id" value="<?php echo $_REQUEST['pms_pak_id']; ?>">
                                        <input type="hidden" name="contactid" value="<?php echo $_REQUEST['contactid']; ?>">
                                        <input type="hidden" name="grp_id" value="<?php echo $_REQUEST['grp_id']; ?>">
                                        <input type="hidden" name="start_date" value="<?php echo $_REQUEST['date']; ?>">

        <?php if (isset($_REQUEST['add'])) { ?>
                                            <input type="hidden" value="1" name="add">
                                            &nbsp; <input type="submit" value="Assign Now" name="reserveRoom" class="btn bg-primary text-white btn-lg">
                                            &nbsp; <button type="button" class="btn btn-default btn-animate-demo" onclick="javascript: window.location = '<?php @print($_SERVER['HTTP_REFERER']); ?>';">Back</button>
        <?php } else { ?>
                                            <input type="hidden" value="1" name="update">
                                            &nbsp; <input type="submit" value="Update Now" name="reserveRoom" class="btn bg-primary text-white btn-lg">
        <?php } ?>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        } else if (isset($_REQUEST['show']) && $_REQUEST['show'] == 3) {
            $rsM = mysql_query("SELECT 
            r.room_title, 
            c.ContactFirstName, c.ContactLastName, c.cont_special_ins,
            g.GroupName,
            p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date,
            rr.roomr_startdate
            FROM room_reservation AS rr
            LEFT OUTER JOIN rooms AS r ON rr.room_id=r.room_id
            LEFT OUTER JOIN contacts AS c ON rr.contact_id=c.ContactID
            LEFT OUTER JOIN groups AS g ON rr.grp_id=g.grp_id
            LEFT OUTER JOIN packages AS p ON rr.Pms_Package_ID=p.Pms_Package_ID
            WHERE rr.roomr_id =".$_REQUEST['roomr_id']);
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
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Guest</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                &nbsp; <?php echo $rsMem->ContactFirstName.' '.$rsMem->ContactLastName; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Special Instructions</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                &nbsp; <?php echo $rsMem->cont_special_ins; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Room</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                &nbsp; <?php echo $rsMem->room_title; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Room Booked Date</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                &nbsp; <?php echo calendarDateConver2($rsMem->roomr_startdate); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Group</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                &nbsp; <?php echo $rsMem->GroupName; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                &nbsp; <?php echo $rsMem->Package_Name; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package Start</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                &nbsp; <?php echo calendarDateConver2($rsMem->Arrival_Start_Date); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Package End</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                &nbsp; <?php echo calendarDateConver2($rsMem->Arrival_End_Date); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label"> &nbsp; </label>
                            <div class="col-lg-10 col-md-9 det-display">  &nbsp; </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                            <div class="col-lg-10 col-md-9">
                                <button type="button" class="btn btn-default btn-animate-demo" onclick="javascript: window.location = '<?php @print($_SERVER['HTTP_REFERER']); ?>';">Back</button>
                            </div>
                        </div>
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
                        <h3 class="panel-title"><i class="fa fa-list"></i> Room Assignment Report
                            <span class="pull-right" style="width:auto;">
                            </span> 
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                            <table class="table users-table table-condensed table-hover table-striped display dataTable" id="example1" >
                                <thead>
                                    <tr>
                                        <th class="visible-xs visible-sm visible-md visible-lg">Package Name</th>
                                        <th class="visible-xs visible-sm visible-md visible-lg">Package Start</th>
                                        <th class="visible-xs visible-sm visible-md visible-lg">Package End</th>
                                        <th class="visible-xs visible-sm visible-md visible-lg">No. of Days</th>
                                    </tr>
                                </thead>
                                <tbody>
        <?php
        //$Query = "SELECT p.* FROM packages AS p WHERE p.Arrival_Start_Date > '2014-05-01' ORDER BY p.Arrival_Start_Date ASC";
	//$Query = "SELECT p.* FROM packages AS p WHERE p.Arrival_Start_Date > '".$_SESSION['config_date1']."' ORDER BY p.Arrival_Start_Date ASC";
        $Query = "SELECT p.* FROM packages AS p WHERE p.Arrival_Start_Date > '".date("Y-m-d",strtotime("-1 week"))."' ORDER BY p.Arrival_Start_Date ASC";
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
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    <a href="<?php print($_SERVER['PHP_SELF'] . "?show=1&pms_pak_id=" . $row->Pms_Package_ID); ?>">
                <?php print($row->Package_Name); ?>
                                                    </a>	 
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg"><?php echo calendarDateConver2($row->Arrival_Start_Date); ?></td>
                                                <td class="visible-xs visible-sm visible-md visible-lg"><?php echo calendarDateConver2($row->Arrival_End_Date); ?></td>
                                                <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->Package_Max_Days); ?></td>
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
