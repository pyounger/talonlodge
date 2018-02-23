<?php
if (isset($_SESSION["UType"])) {
    if ($_SESSION["UType"] == 3) {
        $menuList = Array(
            1 => Array(
                'title' => 'My Profile',
                'link' => 'manage_profile.php',
                'icon' => 'th-large',
                'children' => Array()
            ),
            2 => Array(
                'title' => 'Log Out',
                'link' => 'logout.php',
                'icon' => 'user',
                'children' => Array()
            )
        );
    } elseif ($_SESSION["UType"] == 2) {
        $menuList = Array(
            0 => Array(
                'title' => 'Dashboard',
                'link' => 'index.php',
                'icon' => 'dashboard',
                'children' => Array()
            ),
            /*1 => Array(
                'title' => 'Group Management',
                'link' => 'javascript:void(0);',
                'icon' => 'indent',
                'children' => Array(
                    0 => Array(
                        'title' => 'Group',
                        'link' => 'manage_group.php',
                        'icon' => 'th-large',
                        'children' => Array()
                    ),
//                    1 => Array(
//                        'title' => 'Guest Profiles',
//                        'link' => 'manage_profile.php',
//                        'icon' => 'th-large',
//                        'children' => Array()
//                    )
                )
            ),*/
			1 => Array(
                'title' => 'My Profile',
                'link' => 'javascript:void(0);',
                'icon' => 'indent',
                'children' => Array(
                    0 => Array(
                        'title' => 'View',
                        'link' => 'profile_view.php',
                        'icon' => 'th-large',
                        'children' => Array()
                    ),
                    1 => Array(
                        'title' => 'Update',
                        'link' => 'profile_update.php',
                        'icon' => 'th-large',
                        'children' => Array()
                    )
                )
            ),
			2 => Array(
                'title' => 'My Trips',
                'link' => 'javascript:void(0);',
                'icon' => 'indent',
                'children' => Array(
                    0 => Array(
                        'title' => 'Upcoming',
                        'link' => 'manage_up_group.php',
                        'icon' => 'th-large',
                        'children' => Array()
                    ),
                    1 => Array(
                        'title' => 'Past',
                        'link' => 'manage_past_group.php',
                        'icon' => 'th-large',
                        'children' => Array()
                    )
                )
            ),
            /*3 => Array(
                'title' => 'Profile Report',
                'link' => 'javascript:void(0);',
                'icon' => 'indent',
                'children' => Array(
                    1 => Array(
                        'title' => 'Profile Report',
                        'link' => 'manage_pr_stats.php',
                        'icon' => 'file-text',
                        'children' => Array()
                    )
                )
            ),*/
			3 => Array(
                'title' => 'My Account',
                'link' => 'javascript:void(0);',
                'icon' => 'indent',
                'children' => Array(
                    1 => Array(
                        'title' => 'Change Password',
                        'link' => 'change_pass.php',
                        'icon' => 'lock',
                        'children' => Array()
                    ),
					2 => Array(
                        'title' => 'Log Out',
                        'link' => 'logout.php',
                        'icon' => 'power-off',
                        'children' => Array()
                    )
                )
            )
        );
    } else {
        $menuList = Array(
            0 => Array(
                'title' => 'Dashboard',
                'link' => 'index.php',
                'icon' => 'dashboard',
                'children' => Array()
            ),
            1 => Array(
                'title' => 'Group Management',
                'link' => 'javascript:void(0);',
                'icon' => 'indent',
                'children' => Array(
                    1 => Array(
                        'title' => 'Confirmed Groups',
                        'link' => 'manage_group.php',
                        'icon' => 'th-large',
                        'children' => Array()
                    ),
                    2 => Array(
                        'title' => 'Unconfirmed Groups',
                        'link' => 'manage_uc_group.php',
                        'icon' => 'th-large',
                        'children' => Array()
                    ),
                    3 => Array(
                        'title' => 'Guest Profiles',
                        'link' => 'manage_profile.php',
                        'icon' => 'user',
                        'children' => Array()
                    ),
                    4 => Array(
                        'title' => 'Guest Profile Pictures',
                        'link' => 'manage_profile_pictures.php',
                        'icon' => 'user',
                        'children' => Array()
                    )
                )
            ),
            3 => Array(
                'title' => 'Flight Information',
                'link' => 'javascript:void(0);',
                'icon' => 'indent',
                'children' => Array(
                    1 => Array(
                        'title' => 'Flight Name',
                        'link' => 'manage_flight_name.php',
                        'icon' => 'file-text',
                        'children' => Array()
                    ),
                    2 => Array(
                        'title' => 'Flight Time',
                        'link' => 'manage_flight_time.php',
                        'icon' => 'clock-o',
                        'children' => Array()
                    ),
                    3 => Array(
                        'title' => 'Flight Number',
                        'link' => 'manage_flight_number.php',
                        'icon' => 'sort-numeric-asc',
                        'children' => Array()
                    ),
                    4 => Array(
                        'title' => 'Hotels',
                        'link' => 'manage_hotels.php',
                        'icon' => 'cutlery',
                        'children' => Array()
                    )
                )
            ),
            4 => Array(
                'title' => 'Activity Boats',
                'link' => 'javascript:void(0);',
                'icon' => 'indent',
                'children' => Array(
                    11 => Array(
                        'title' => 'Activity Boat Captains',
                        'link' => 'manage_boat_captains.php',
                        'icon' => 'flag-checkered',
                        'children' => Array()
                    ),
                    12 => Array(
                        'title' => 'Activity Boat Deckhands',
                        'link' => 'manage_boat_deckhands.php',
                        'icon' => 'flag-checkered',
                        'children' => Array()
                    ),
                    13 => Array(
                        'title' => 'Activity Boats',
                        'link' => 'manage_boats.php',
                        'icon' => 'flag-checkered',
                        'children' => Array()
                    )
                )
            ),
            5 => Array(
                'title' => 'All Activity Schedules',
                'link' => 'javascript:void(0);',
                'icon' => 'indent',
                'children' => Array(
                    5 => Array(
                        'title' => 'Activities',
                        'link' => 'manage_activities.php',
                        'icon' => 'eye',
                        'children' => Array()
                    ),
                    6 => Array(
                        'title' => 'Activity Guides',
                        'link' => 'manage_activity_guides.php',
                        'icon' => 'map-marker',
                        'children' => Array()
                    ),
                    7 => Array(
                        'title' => 'Activity Destinations',
                        'link' => 'manage_activity_destination.php',
                        'icon' => 'globe',
                        'children' => Array()
                    ),
                    8 => Array(
                        'title' => 'Activity Vendors',
                        'link' => 'manage_activity_vendor.php',
                        'icon' => 'user',
                        'children' => Array()
                    ),
                    9 => Array(
                        'title' => 'Activity Therapist',
                        'link' => 'manage_act_therapist.php',
                        'icon' => 'medkit',
                        'children' => Array()
                    ),
                    10 => Array(
                        'title' => 'Activity Therapy Type',
                        'link' => 'manage_act_therapy_type.php',
                        'icon' => 'medkit',
                        'children' => Array()
                    ),
                    14 => Array(
                        'title' => 'Activities Schedules',
                        'link' => 'manage_activities_schedule.php',
                        'icon' => 'check',
                        'children' => Array()
                    )
                )
            ),
            6 => Array(
                'title' => 'Specific Schedules',
                'link' => 'javascript:void(0);',
                'icon' => 'indent',
                'children' => Array(
//                    14 => Array(
//                        'title' => 'Massage Schedules',
//                        'link' => 'manage_massage_schedules.php',
//                        'icon' => 'check',
//                        'children' => Array()
//                    ),
                    15 => Array(
                        'title' => 'Massage Schedules',
                        'link' => 'manage_massage_assignment.php',
                        'icon' => 'check',
                        'children' => Array()
                    ),
//                    15 => Array(
//                        'title' => 'Adventure Schedules',
//                        'link' => 'manage_adventure_schedules.php',
//                        'icon' => 'check',
//                        'children' => Array()
//                    ),
//                    16 => Array(
//                        'title' => 'Boat Schedules',
//                        'link' => 'manage_boat_schedules.php',
//                        'icon' => 'check',
//                        'children' => Array()
//                    ),
                    17 => Array(
                        'title' => 'Boat Schedules',
                        'link' => 'manage_boat_assignment.php',
                        'icon' => 'check',
                        'children' => Array()
                    ),
                    18 => Array(
                        'title' => 'Boat Captain/Deckhand',
                        'link' => 'manage_boat_captain_deckhand.php',
                        'icon' => 'check',
                        'children' => Array()
                    ),
                    25 => Array(
                        'title' => 'Activity Schedules',
                        'link' => 'manage_advent_activity_assignment.php',
                        'icon' => 'check',
                        'children' => Array()
                    )
                )
            ),
//            7 => Array(
//                'title' => 'Activity Agendas',
//                'link' => 'javascript:void(0);',
//                'icon' => 'indent',
//                'children' => Array(
//                    5 => Array(
//                        'title' => 'Master Activity Agenda',
//                        'link' => 'manage_master_activity_agenda.php',
//                        'icon' => 'eye',
//                        'children' => Array()
//                    ),
//                    6 => Array(
//                        'title' => 'Guest Activity Agenda',
//                        'link' => 'manage_guest_activity_agenda.php',
//                        'icon' => 'map-marker',
//                        'children' => Array()
//                    ),
//                    20 => Array(
//                        'title' => 'Master Activities Calendar',
//                        'link' => 'manage_activity_calendar.php',
//                        'icon' => 'check',
//                        'children' => Array()
//                    )
//                )
//            ),
            8 => Array(
                'title' => 'Rooms Management',
                'link' => 'javascript:void(0);',
                'icon' => 'indent',
                'children' => Array(
                    1 => Array(
                        'title' => 'Rooms',
                        'link' => 'manage_rooms.php',
                        'icon' => 'windows',
                        'children' => Array()
                    ),
                    10 => Array(
                        'title' => 'Room Assignment',
                        'link' => 'manage_rooms_assignment.php',
                        'icon' => 'windows',
                        'children' => Array()
                    )
                )
            ),
            9 => Array(
                'title' => 'Bar Tab',
                'link' => 'javascript:void(0);',
                'icon' => 'indent',
                'children' => Array(
                    1 => Array(
                        'title' => 'Bar Items',
                        'link' => 'manage_bar_items.php',
                        'icon' => 'glass',
                        'children' => Array()
                    ),
                    2 => Array(
                        'title' => 'Bar Orders',
                        'link' => 'manage_bar_orders.php',
                        'icon' => 'glass',
                        'children' => Array()
                    )
                )
            ),
            10 => Array(
                'title' => 'Beverage Order',
                'link' => 'javascript:void(0);',
                'icon' => 'indent',
                'children' => Array(
                    1 => Array(
                        'title' => 'Beverage Items',
                        'link' => 'manage_beverage_items.php',
                        'icon' => 'glass',
                        'children' => Array()
                    ),
//                    2 => Array(
//                        'title' => 'Beverage Orders',
//                        'link' => 'manage_beverage_orders.php',
//                        'icon' => 'glass',
//                        'children' => Array()
//                    )
                )
            ),
            11 => Array(
                'title' => 'Food Management',
                'link' => 'javascript:void(0);',
                'icon' => 'indent',
                'children' => Array(
                    10 => Array(
                        'title' => 'Menu Items',
                        'link' => 'manage_menu_items.php',
                        'icon' => 'list',
                        'children' => Array(),
                    ),
                    11 => Array(
                        'title' => 'Create Menus',
                        'link' => 'manage_assign_menu_items.php',
                        'icon' => 'list',
                        'children' => Array(),
                    ),
                    12 => Array(
                        'title' => 'Menu/Beverage Order Schedule',
                        'link' => 'manage_eating_schedule.php',
                        'icon' => 'list',
                        'children' => Array(),
                    )
                )
            ),
            12 => Array(
                'title' => 'Fish Processing',
                'link' => 'javascript:void(0);',
                'icon' => 'indent',
                'children' => Array(
                    1 => Array(
                        'title' => 'Fish Types',
                        'link' => 'manage_fish_types.php',
                        'icon' => 'glass',
                        'children' => Array()
                    ),
                    2 => Array(
                        'title' => 'Manage Fish Processing',
                        'link' => 'manage_fish_processing.php',
                        'icon' => 'glass',
                        'children' => Array()
                    )
                )
            ),
            16 => Array(
                'title' => 'Generate CSV',
                'link' => 'javascript:void(0);',
                'icon' => 'indent',
                'children' => Array(
                    1 => Array(
                        'title' => 'By Group',
                        'link' => 'manage_csv.php',
                        'icon' => 'glass',
                        'children' => Array()
                    ),
                    2 => Array(
                        'title' => 'By Date Range',
                        'link' => 'manage_csv_bydate.php',
                        'icon' => 'glass',
                        'children' => Array()
                    )
                )
            ),
            17 => Array(
                'title' => 'Logs',
                'link' => 'javascript:void(0);',
                'icon' => 'indent',
                'children' => Array(
                    1 => Array(
                        'title' => 'Activity Logs',
                        'link' => 'manage_activity_logs.php',
                        'icon' => 'glass',
                        'children' => Array()
                    ),
                    2 => Array(
                        'title' => 'Profile Logs',
                        'link' => 'manage_updates_logs.php',
                        'icon' => 'glass',
                        'children' => Array()
                    )
                )
            ),
            18 => Array(
                'title' => 'Confirmations',
                'link' => 'javascript:void(0);',
                'icon' => 'indent',
                'children' => Array(
                    1 => Array(
                        'title' => 'Manage Confirmations',
                        'link' => 'manage_confirmations.php',
                        'icon' => 'file-text',
                        'children' => Array()
                    )
                )
            ),
            19 => Array(
                'title' => 'Reports',
                'link' => 'javascript:void(0);',
                'icon' => 'indent',
                'children' => Array(
                    1 => Array(
                        'title' => 'Profile Report',
                        'link' => 'manage_pr_stats.php',
                        'icon' => 'file-text',
                        'children' => Array()
                    ),
                    2 => Array(
                        'title' => 'Room Assignment Report',
                        'link' => 'manage_room_assignment_report.php',
                        'icon' => 'list',
                        'children' => Array(),
                    ),
                    3 => Array(
                        'title' => 'Boat and Activity Report',
                        'link' => 'manage_boat_activity_report.php',
                        'icon' => 'list',
                        'children' => Array(),
                    ),
                    5 => Array(
                        'title' => 'Arrival & Departure Report',
                        'link' => 'manage_arrival_departure_report.php',
                        'icon' => 'list',
                        'children' => Array(),
                    ),
                    6 => Array(
                        'title' => 'Guest Agenda Report',
                        'link' => 'manage_guest_agenda_report.php',
                        'icon' => 'list',
                        'children' => Array(),
                    ),
                    7 => Array(
                        'title' => 'Billing Report',
                        'link' => 'manage_billing_report.php',
                        'icon' => 'list',
                        'children' => Array(),
                    ),
                    8 => Array(
                        'title' => 'Menu/Beverage Order Report',
                        'link' => 'manage_menu_beverage_report.php',
                        'icon' => 'list',
                        'children' => Array(),
                    ),
                    9 => Array(
                        'title' => 'Bar Items Report',
                        'link' => 'manage_bar_item_report.php',
                        'icon' => 'list',
                        'children' => Array(),
                    ),
                    17 => Array(
                        'title' => 'Guest Fishing Report',
                        'link' => 'manage_fishing_guest_report.php',
                        'icon' => 'list',
                        'children' => Array(),
                    ),
                    18 => Array(
                        'title' => 'Group Fishing Report',
                        'link' => 'manage_fishing_group_report.php',
                        'icon' => 'list',
                        'children' => Array(),
                    ),
                    19 => Array(
                        'title' => 'Fishing Report for Processing Company',
                        'link' => 'manage_fishing_company_report.php',
                        'icon' => 'list',
                        'children' => Array(),
                    )
                )
            ),
            20 => Array(
                'title' => 'Management',
                'link' => 'javascript:void(0);',
                'icon' => 'indent',
                'children' => Array(
                    11 => Array(
                        'title' => 'Packages Management',
                        'link' => 'manage_packages.php',
                        'icon' => 'list',
                        'children' => Array(),
                    ),
                    13 => Array(
                        'title' => 'Question',
                        'link' => 'manage_questions.php',
                        'icon' => 'question',
                        'children' => Array()
                    ),
                    14 => Array(
                        'title' => 'Manage Contacts/Users',
                        'link' => 'manage_users.php',
                        'icon' => 'user',
                        'children' => Array()
                    ),
                    15 => Array(
                        'title' => 'Search Guest',
                        'link' => 'manage_profiles.php',
                        'icon' => 'user',
                        'children' => Array()
                    ),
                    16 => Array(
                        'title' => 'Auto Emails',
                        'link' => 'manage_auto_emails.php',
                        'icon' => 'envelope',
                        'children' => Array()
                    ),
                    17 => Array(
                        'title' => 'System Configurations',
                        'link' => 'manage_site_config.php',
                        'icon' => 'gears',
                        'children' => Array()
                    ),
					20 => Array(
                        'title' => 'Change Password',
                        'link' => 'change_pass.php',
                        'icon' => 'lock',
                        'children' => Array()
                    ),
                    21 => Array(
                        'title' => 'Log Out',
                        'link' => 'logout.php',
                        'icon' => 'power-off',
                        'children' => Array()
                    )
                )
            )
        );
    }
}

function buildMenu($menuList) {
    $pieces = explode('/', $_SERVER['REQUEST_URI']);
    $page = end($pieces);
    foreach ($menuList as $val => $node) {
        $active = (strpos($page, $node['link']) !== false) ? "active" : " ";
        if (!empty($node['children'])) {
            echo " <li class='submenu " . $active . "'><a class='dropdown' href='" . $node['link'] . "' data-original-title='" . $node['title'] . "'><i class='fa fa-" . $node['icon'] . "'></i><span class='hidden-minibar'> " . $node['title'] . "  <span class='badge bg-primary pull-right'>" . sizeof($node['children']) . "</span></span></a>";
        } else {
            echo "<li class='" . $active . "' ><a href='" . $node['link'] . "' data-original-title='" . $node['title'] . "'><i class='fa fa-" . $node['icon'] . "'></i><span class='hidden-minibar'> " . $node['title'] . "</span></a>";
        }
        if (!empty($node['children'])) {
            echo "<ul>";
            buildMenu($node['children']);
            echo "</ul>";
        }
        echo "</li>";
    }
}

function totalCounts($field, $from, $where) {
    if ($where != '') {
        $Query = "SELECT $field FROM $from WHERE $where ";
    } else {
        $Query = "SELECT $field FROM $from ";
    }
    $pro = mysql_query($Query);
    return $total_rec = mysql_num_rows($pro);
}

function FillSelected($Table, $IDField, $TextField, $ID) {
    $strQuery = "SELECT $IDField, $TextField FROM $Table ORDER BY $IDField";
    $nResult = mysql_query($strQuery);
    if (mysql_num_rows($nResult) >= 1) {
        while ($row = mysql_fetch_row($nResult)) {
            if ($row[0] == $ID) {
                print("<option value=\"$row[0]\" selected>$row[1]</option>");
            } else {
                print("<option value=\"$row[0]\">$row[1]</option>");
            }
        }
    }
}

function FillSelected2($Table, $IDField, $TextField1, $TextField2, $ID) {
    $strQuery = "SELECT $IDField, $TextField1, $TextField2 FROM $Table ORDER BY $IDField";
    $nResult = mysql_query($strQuery);
    if (mysql_num_rows($nResult) >= 1) {
        while ($row = mysql_fetch_row($nResult)) {
            if ($row[0] == $ID) {
                print("<option value=\"$row[0]\" selected>$row[1]" . " " . "$row[2]</option>");
            } else {
                print("<option value=\"$row[0]\">$row[1]" . " " . "$row[2]</option>");
            }
        }
    }
}

function FillSelected3($Table, $IDField, $TextField1, $TextField2, $TextField3, $ID) {
    $strQuery = "SELECT $IDField, $TextField1, $TextField2, $TextField3 FROM $Table ORDER BY $IDField";
    $nResult = mysql_query($strQuery);
    if (mysql_num_rows($nResult) >= 1) {
        while ($row = mysql_fetch_row($nResult)) {
            if ($row[0] == $ID) {
                echo "<option value=" . $row[0] . " selected>" . $row[1] . " - " . calendarDateConver2($row[2]) . " - " . $row[3] . "</option>";
            } else {
                echo "<option value=" . $row[0] . ">" . $row[1] . " - " . calendarDateConver2($row[2]) . " - " . $row[3] . "</option>";
            }
        }
    }
}

function getMaximum($Table, $Field) {
    $maxID = 0;
    $strQry = "SELECT MAX(" . $Field . ")+1 as CID FROM " . $Table . " ";
    $nResult = mysql_query($strQry);
    if (mysql_num_rows($nResult) >= 1) {
        while ($row = mysql_fetch_object($nResult)) {
            if (@$row->CID)
                $maxID = $row->CID;
            else
                $maxID = 1;
        }
    }
    return $maxID;
}

function getMaxValue($Table, $Field) {
    $maxID = 0;
    $strQry = "SELECT MAX(" . $Field . ") as CID FROM " . $Table . " ";
    $nResult = mysql_query($strQry);
    if (mysql_num_rows($nResult) >= 1) {
        while ($row = mysql_fetch_object($nResult)) {
            if (@$row->CID)
                $maxID = $row->CID;
            else
                $maxID = 1;
        }
    }
    return $maxID;
}

function chkExist($Field, $Table, $WHERE) {
    $retRes = 0;
    $strQry = "SELECT $Field FROM $Table $WHERE";
    $nResult = mysql_query($strQry) or die("Unable 2 Work");
    if (mysql_num_rows($nResult) >= 1) {
        $row = mysql_fetch_row($nResult);
        $retRes = $row[0];
        //$retRes=1;
    }
    return $retRes;
}

function returnName($Field, $Table, $IDField, $ID, $extra = '') {
    $retRes = "";
    $strQry = "SELECT $Field FROM $Table WHERE $IDField = $ID LIMIT 1";
    //$nResult = mysql_query($strQry) or die(mysql_error()."Unable 2 Work");
    $nResult = mysql_query($strQry);
    if (mysql_num_rows($nResult) >= 1) {
        $row = mysql_fetch_row($nResult);
        $retRes = $row[0];
    }
    return $retRes;
}

function returnName2($Field, $Table, $IDField, $ID, $extra = '') {
    $retRes = "";
    $strQry = "SELECT $Field FROM $Table WHERE $IDField = $ID $extra LIMIT 1";
    //$nResult = mysql_query($strQry) or die(mysql_error()."Unable 2 Work");
    $nResult = mysql_query($strQry);
    if (mysql_num_rows($nResult) >= 1) {
        $row = mysql_fetch_row($nResult);
        $retRes = $row[0];
    }
    return $retRes;
}

function calendarDateConver($date) {
    if ($date != '') {
        $arrDate = explode('/', $date);
        return $arrDate[2] . '-' . $arrDate[0] . '-' . $arrDate[1] . ' 00:00:00';
    } else {
        return '00-00-00' . ' 00:00:00';
    }
}

function calendarDateConver4($date) {
    if ($date != '') {
        $arrDate = explode('/', $date);
        return $arrDate[2] . '-' . $arrDate[0] . '-' . $arrDate[1];
    } else {
        return '0000-00-00';
    }
}

function calendarDateConver3($date) {
    if ($date != '') {
        $arrDate1 = explode(' ', $date);
        $arrDate2 = explode('/', $arrDate1[0]);
        return $arrDate2[2] . '-' . $arrDate2[0] . '-' . $arrDate2[1] . ' ' . @$arrDate1[1];
    } else {
        return '';
    }
}

function calendarDateConver2($date) {
    if ($date != '' && $date != '0000-00-00') {
        $arrDate = explode(' ', $date);
        $arrDate = explode('-', $arrDate[0]);
        return $arrDate[1] . '/' . $arrDate[2] . '/' . $arrDate[0];
    } else {
        return '';
    }
}
function calendarTimeConver1($time) {
    if ($time != '') {
        $arrTime = explode(' ', $time);
        return $arrTime[1];
    } else {
        return '00:00:00';
    }
}

function dbStr($str) {
    $string = str_replace("'", "''", $str); // Converts ' to ' in database, but ' to '' in the static page
    return $string;
}

function FillMultiple($Table, $IDField, $TextField, $SelTbl, $Field1, $Field2, $SelID) {
    $strQuery = "SELECT $IDField, $TextField FROM $Table";
    $nResult = mysql_query($strQuery);
    if (mysql_num_rows($nResult) >= 1) {
        while ($row = mysql_fetch_row($nResult)) {
            $strQuery1 = "SELECT * FROM $SelTbl WHERE $Field1=$row[0] AND $Field2=$SelID";
            $nResult1 = mysql_query($strQuery1);
            if (mysql_num_rows($nResult1) >= 1) {
                print("<option value=\"$row[0]\" selected>$row[1]</option>");
            } else {
                print("<option value=\"$row[0]\">$row[1]</option>");
            }
        }
    }
}

// New Dates
function calendarDateConver22($date) {
    if ($date != '' && $date != '0000-00-00') {
        $arrDate = explode(' ', $date);
        $arrDate = explode('-', $arrDate[0]);
        return $arrDate[2] . '/' . $arrDate[1] . '/' . $arrDate[0];
    } else {
        return '';
    }
}


function diffindates($date1, $date2){
	$diff	 = abs(strtotime($date2) - strtotime($date1)); 
	$years    = floor($diff / (365*60*60*24)); 
	$months   = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
	$days     = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
	$hours    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
	$minuts   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
	$seconds  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 
	return $days;
}


?>