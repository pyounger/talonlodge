<?php

include ('includes/php_includes_top.php');
//include ('../lib/database.pdo.php');
//Return List of Packages
if ((isset($_REQUEST['pk_from'])) && ($_REQUEST['pk_from'] != '')) {
    $pk_from = $_REQUEST['pk_from'];
} else {
    $pk_from = date("Y-m-d");
}
$Query1 = "SELECT
                                p.Pms_Package_ID, p.Package_Name, p.Arrival_Start_Date, 
                                p.Arrival_End_Date, p.Package_Max_Days,
                                g.grp_id, g.GroupName, g.GroupArrivalDate,
                                (select count(gcont_id) from group_contacts gc where gc.grp_id = g.grp_id) as TotalGuests
                                FROM packages AS p 
                                LEFT OUTER JOIN groups AS g ON g.Pms_Package_ID=p.Pms_Package_ID 
                                WHERE g.grp_id > 0 AND p.Arrival_Start_Date > ? 
                                GROUP BY g.grp_id 
                                ORDER BY p.Arrival_Start_Date ASC ";
$params = array($pk_from);
$packages = SelectRecordSet($Query1, $params);


/**
 * Return List of Contacts.
 * Note - we are only concerned with contacts who have 
 * completed a profile.  We don't care about anyone else.
 */
$Query2 = "SELECT gc.grp_id, c.ContactID,c.cont_id, c.ContactFirstName, c.ContactLastName
                                                ,c.is_completed, cp.lastUpdated
                                                FROM group_contacts AS gc
                                                INNER JOIN contacts AS c ON c.ContactID = gc.ContactID
                                                INNER JOIN groups AS g ON g.grp_id = gc.grp_id
                                                INNER JOIN packages AS p ON g.Pms_Package_ID = p.Pms_Package_ID 
                                                LEFT JOIN contact_profiles as cp ON cp.cont_id = c.ContactID
                                                WHERE g.grp_id > 0 AND p.Arrival_Start_Date > ? 
                                                GROUP BY c.cont_id ";

$params = array($pk_from);
$contacts = SelectRecordSet($Query2, $params);

//Return a list of Activities
$Query3 = "SELECT a.act_id,a.act_name, c.cont_id, c.ContactID,g.grp_id 
                                                ,sch.asch_id,sch.asch_start_date,sch.asch_end_date
                                                    FROM  
                                            activities AS a      
                                            INNER JOIN contact_activities AS ca ON ca.act_id = a.act_id 
                                            INNER JOIN contact_profiles AS cp ON cp.conp_id=ca.conp_id
                                            INNER JOIN contacts AS c  ON c.ContactID = cp.cont_id
                                            INNER JOIN group_contacts AS gc ON gc.ContactID = c.ContactID
                                            INNER JOIN groups AS g ON g.grp_id = gc.grp_id                                            
                                            INNER JOIN packages AS p ON g.Pms_Package_ID = p.Pms_Package_ID 
                                            LEFT JOIN act_schedule as sch ON sch.cont_id = cp.cont_id and sch.grp_id = g.grp_id and sch.act_id = a.act_id
                                            WHERE
                                            g.grp_id > 0 AND p.Arrival_Start_Date > ?
                                            ORDER BY a.act_order ASC";
$params = array($pk_from);
$activities = SelectRecordSet($Query3, $params);

$package_count = 0;

//Loop Through Packages.
$events = array();
$counter = 0;

foreach ($packages as $package) {
    if ($package["GroupArrivalDate"] == "0000-00-00") {
        
    } else {
        //Loop Through Contacts
        foreach ($contacts as $contact) {
            //Does this contact belongs to current package.
            if ($contact["grp_id"] == $package["grp_id"]) {

                //Loop Through Activities
                foreach ($activities as $activity) {
                    if ($contact["cont_id"] == $activity["cont_id"] && $activity["grp_id"] == $package["grp_id"]) {
                        $counter++;
                        if ($contact["is_completed"] <> "1") {    //show incomplete but invited guests.                
                            $display = 0;
                        } else {
                            $display = 1;
                        }
                        if ($display == 1) { //show incomplete but invited guests.
                            switch ($activity["act_id"]) {

                                case "1": //massage

                                    $edit_link = "/profiles/manage_massage_assignment.php?show=1&pms_pak_id=" . $package["Pms_Package_ID"];
                                    break;

                                case "5": //Float plane
                                case "3": //ATV Tour
                                case "4": //Kayak
                                case "2": //Freshwater Fishing
                                case "6": //Cooking Class
                                case "7": //Fishing by ATV
                                case "8": //Photography Tour
                                case "10": //Hiking
                                case "11": //Freshwater Fishing by Boat Approach

                                    $edit_link = "/profiles/manage_advent_activity_assignment.php?show=1&pms_pak_id=" . $package["Pms_Package_ID"];
                                    break;

                                default:
                                    $edit_link = "#unknown activity please contact support. ";
                                    break;
                            }

                            if ($activity["asch_id"] > 0) { // if scheduled date available
                                $eventStartDate = date('Y-m-d H:i:s', strtotime($activity["asch_start_date"]));
                                $eventEndDate = date('Y-m-d H:i:s', strtotime($activity["asch_end_date"]));
                                $eventColor = "#378006"; // Set event color to green, leave blank if not required
                                $allDay = false;
                            } else {
                                $eventStartDate = date('Y-m-d', strtotime($package["Arrival_Start_Date"]));
                                $eventEndDate = "";
                                $eventColor = "";
                                $allDay = true;
                            }
                      
                            $e['title'] = $activity['act_name'] . " - " . $contact["ContactFirstName"] . " " . $contact["ContactLastName"];
                            $e['url'] = $edit_link;
                            $e['start'] = $eventStartDate;
                            $e['end'] = $eventEndDate;
                            $e['color'] = $eventColor;
                            $e['allDay'] = $allDay;

                            array_push($events, $e);
                        }
                    }
                }
            }
        }
    }
}
echo json_encode($events);

