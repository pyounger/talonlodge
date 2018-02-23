<?php include ('includes/php_includes_top.php'); ?>
<?php
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
?>
<?php
//include ('includes/html_header.php');
?>




    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="">
                            <ul class="nav faq-list">
                                <h1>Billing Report for - 
                                    <?php
                                    $Query = "SELECT
                                    c.ContactFirstName, c.ContactLastName, 
                                    g.GroupName,
                                    p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, p.Package_Max_Days
                                    FROM contacts AS c, groups AS g, packages AS p
                                    WHERE p.Pms_Package_ID=" . $_REQUEST['pms_pak_id'] . "  LIMIT 1";
                                    $nResult = mysql_query($Query);
                                    if (mysql_num_rows($nResult) >= 1) {
                                        while ($row = mysql_fetch_row($nResult)) {
                                            echo $row[3];
                                            $start = date('Y-m-d', strtotime($row[4]));
                                            $end = date('Y-m-d', strtotime($row[5]));
                                        }
                                    }
                                    ?>
                                </h1>


            
            <?php
                $counter1 = 0;
                $dynmvar = 0;
                $Query1 = "
                SELECT 
                acts.*, ab.act_boat_name,  abc.actboca_name, abd.actbodh_name,  c.ContactFirstName, c.ContactLastName, cp.conp_id, ac.act_name, ag.ag_name, av.av_name, g.GroupName
                FROM 
                act_schedule AS acts
                LEFT OUTER JOIN groups AS g ON acts.grp_id=g.grp_id
                LEFT OUTER JOIN act_boats AS ab ON acts.act_boat_id=ab.act_boat_id 
                LEFT OUTER JOIN act_boat_captain AS abc ON ab.actboca_id=abc.actboca_id
                LEFT OUTER JOIN act_boat_deckhand AS abd ON ab.actbodh_id=abd.actbodh_id
                LEFT OUTER JOIN contacts AS c ON acts.cont_id=c.ContactID
                LEFT OUTER JOIN contact_profiles AS cp ON acts.cont_id=cp.cont_id
                LEFT OUTER JOIN activities AS ac ON acts.act_id=ac.act_id
                LEFT OUTER JOIN activity_guides AS ag ON acts.ag_id=ag.ag_id
                LEFT OUTER JOIN activity_vendors AS av ON acts.av_id=av.av_id
                WHERE  acts.act_id!=1 AND 
                ( acts.asch_start_date >= '".$start."%' &&  acts.asch_start_date <= '".$end."%' ) 
                ORDER BY g.GroupName,  c.ContactFirstName ASC";
                $limit1 = $_SESSION['limit_of_rec'];
                $start1 = $p->findStart($limit1);
                $count1 = mysql_num_rows(mysql_query($Query1));
                $pages1 = $p->findPages($count1, $limit1);
                $rs1 = mysql_query($Query1 . " LIMIT " . $start1 . ", " . $limit1);
                if (mysql_num_rows($rs1) > 0) {
                    while ($row1 = mysql_fetch_object($rs1)) {
                        $counter1++;
            ?>
                        <div style="padding-left: 50px;">
                            <?php
                                if($counter1==1){
                                    $cont_id = $row1->cont_id;
                                }
                                if($cont_id == $row1->cont_id){
                                    if($counter1==1){
                                        echo '<br/><h3>'.trim($row1->ContactFirstName.' '.$row1->ContactLastName.', '.$row1->GroupName).'</h3>';
                                    }
                                } else {
                                    $cont_id = $row1->cont_id;
                                    echo '<br/><h3>'.trim($row1->ContactFirstName.' '.$row1->ContactLastName.', '.$row1->GroupName).'</h3>';
                                }
                            ?>    
                        </div>
                        <div style="padding-left: 100px;">
                            <?php echo '<br/>'.calendarDateConver2($row1->asch_start_date);?>
                            <?php if($row1->act_boat_id!='' && $row1->act_boat_id!=0){?>
                                <?php echo '<br/>'.$row1->act_boat_name.', '.$row1->actboca_name.', '.$row1->actbodh_name;?>
                            <?php } else {?>
                                <?php echo '<br/>'.$row1->act_name.', '.$row1->ag_name.', '.$row1->av_name;?>
                            <?php }?>
                            <?php
                                $confirmation = '';
                                $Query2 = "
                                SELECT * FROM activity_confirmation
                                WHERE asch_id = ".$row1->asch_id." LIMIT 1";
                                @$count2 = mysql_num_rows(mysql_query($Query2));
                                $rs2 = mysql_query($Query2);
                                if ($count2 > 0) {
                                    while ($row2 = mysql_fetch_object($rs2)) {
                                        if($row2->acco_completed == 1){
                                            $completed = 'Completed';
                                        } else {
                                            $completed = 'Not Completed';
                                        }
                                        $confirmation = $completed.', '.$row2->acco_consumed.' Minutes, '.$row2->acco_comments;
                                    }
                                }
                            ?>
                            <?php echo '<br/>'.$confirmation;?>
                        </div>    
            <?php
                    }
                }
            ?>



                            </ul>
                        </div>
                    </div>
                </div>
            </div>	
        </div>
    </div>


