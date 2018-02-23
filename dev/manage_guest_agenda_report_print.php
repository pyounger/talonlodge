<?php
include ('includes/php_includes_top.php');
if ((isset($_REQUEST['limit_of_rec'])) && ($_REQUEST['limit_of_rec'] != '')) {
    $_SESSION['limit_of_rec'] = $_REQUEST['limit_of_rec'];
} else if (isset($_SESSION['limit_of_rec'])) {
    //$_SESSION['group_name'] = $_SESSION['group_name'];
} else {
    $_SESSION['limit_of_rec'] = '200';
}
if ((isset($_REQUEST['asch_start_date'])) && ($_REQUEST['asch_start_date'] != '')) {
    $_SESSION['asch_start_date'] = calendarDateConver4($_REQUEST['asch_start_date']);
} else if (isset($_SESSION['asch_start_date'])) {
    //$_SESSION['from'] = $_SESSION['from'];
} else {
    $_SESSION['asch_start_date'] = '2014-05-01';
}


?>
    <div class="">
        <ul class="nav faq-list">
            
            
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-cascade">
            <div class="panel-heading text-primary">
                <h2 class="panel-title"><i class="fa fa-windows"></i>
                    <?php
                    $Query = "SELECT
                    c.ContactFirstName, c.ContactLastName, 
                    g.GroupName,
                    p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, p.Package_Max_Days
                    FROM contacts AS c, groups AS g, packages AS p
                    WHERE 
                    c.ContactID=" . $_REQUEST['cont_id'] . " AND
                    g.grp_id=" . $_REQUEST['grp_id'] . " AND 
                    p.Pms_Package_ID=" . $_REQUEST['pms_pak_id'] . "  LIMIT 1";
                    $nResult = mysql_query($Query);
                    if (mysql_num_rows($nResult) >= 1) {
                        while ($row = mysql_fetch_row($nResult)) {
                            echo $row[0] . ' ' . $row[1] . ', ' . $row[2] . ', ' . $row[3] ;
                        }
                    }
                    ?>
                </h2>
            </div>
            <div class="panel-body ">
                <div class="ro">
                    <div class="col-mol-md-offset-2">
                        <form class="form-horizontal cascde-forms" method="post" action="<?php print($_SERVER['PHP_SELF']); ?>" name="frm" id="frm" >
                            

            <h3><strong> Adventure Activities </strong></h3>
            <?php
                $counter1 = 0;
                $dynmvar = 0;
                $Query1 = "
                SELECT 
                acts.*, c.ContactFirstName, c.ContactLastName, cp.conp_id, ac.act_name, ag.ag_name, av.av_name
                FROM 
                act_schedule AS acts
                LEFT OUTER JOIN contacts AS c ON acts.cont_id=c.ContactID
                LEFT OUTER JOIN contact_profiles AS cp ON acts.cont_id=cp.cont_id
                LEFT OUTER JOIN activities AS ac ON acts.act_id=ac.act_id
                LEFT OUTER JOIN activity_guides AS ag ON acts.ag_id=ag.ag_id
                LEFT OUTER JOIN activity_vendors AS av ON acts.av_id=av.av_id
                WHERE  acts.ag_id!='' AND acts.act_boat_id=0 AND acts.cont_id = ".$_REQUEST['cont_id']." ORDER BY acts.act_id ASC";
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
                            if($counter1==1){
                                $dynmvar = $row1->asch_id;
                            }
                            //echo $dynmvar.','.$row1->act_boat_id;
                            if($dynmvar == $row1->asch_id){
                                //echo 'IF: ';
                                //echo '<br/>';
                                if($counter1==1){
                        ?>
                                    <div style="padding-left: 50px;">
                                        <h3><?php echo calendarDateConver2($row1->asch_start_date).', '.date('H:i:s', strtotime($row1->asch_start_date . '0 minute')).', '.date('H:i:s', strtotime($row1->asch_end_date . '0 minute'));?></h3>
                                    </div>    
                                    <div style="padding-left: 100px;">
                                        <h3><?php echo $row1->act_name.', '.$row1->ag_name.', '.$row1->av_name;?></h3>
                                    </div>    
                        <?php
                                }
                        ?>
                                    <div style="padding-left: 150px;">
                                    <?php echo '<br/>Guest: '.trim($row1->ContactFirstName.' '.$row1->ContactLastName);?>
                                    <?php
                                        echo '<br/>Special Instructions: ';
                                        $counter2=0;
                                        $comma2='';
                                        $Query2 = "
                                        SELECT cpd.cpd_answer
                                        FROM contact_profile_details AS cpd
                                        WHERE cpd.conp_id=".$row1->conp_id." ";
                                        $count2 = mysql_num_rows(mysql_query($Query2));
                                        $rs2 = mysql_query($Query2);
                                        if ($count2 > 0) {
                                            while ($row2 = mysql_fetch_object($rs2)) {
                                                if(!empty($row2->cpd_answer)){
                                                    if($counter2>0){
                                                        $comma2 = ', ';
                                                    } else {
                                                        $comma2 = '';
                                                    }
                                                    echo trim($comma2.$row2->cpd_answer);
                                                    $counter2++;
                                                }
                                            }
                                        }
                                    ?>
                                    <?php
                                        $Query2 = "
                                        SELECT cp.jacketsize_id, cp.bootsize_id, js.jacketsize_name, bs.bootsize_name
                                        FROM contact_profiles AS cp
                                        LEFT OUTER JOIN jacket_size AS js ON cp.jacketsize_id=js.jacketsize_id
                                        LEFT OUTER JOIN boot_size AS bs ON cp.bootsize_id=bs.bootsize_id
                                        WHERE cp.conp_id=".$row1->conp_id." ";
                                        $count2 = mysql_num_rows(mysql_query($Query2));
                                        $rs2 = mysql_query($Query2);
                                        if ($count2 > 0) {
                                            while ($row2 = mysql_fetch_object($rs2)) {
                                                echo '<br/>Jacket Size: '.$row2->jacketsize_name;
                                                echo '<br/>Boot Size: '.$row2->bootsize_name;
                                            }
                                        }
                                    ?>
                                    </div>
                        <?php } else { 
                                //echo 'ELSE: ';
                                //echo '<br/>';
                        ?>
                                <div style="padding-left: 50px;">
                                    <h3><?php echo calendarDateConver2($row1->asch_start_date).', '.date('H:i:s', strtotime($row1->asch_start_date . '0 minute')).', '.date('H:i:s', strtotime($row1->asch_end_date . '0 minute'));?></h3>
                                </div>    
                                <div style="padding-left: 100px;">
                                    <h3><?php echo $row1->act_name.', '.$row1->ag_name.', '.$row1->av_name;?></h3>
                                </div>    
            
                                    <div style="padding-left: 150px;">
                                    <?php echo '<br/>Guest: '.trim($row1->ContactFirstName.' '.$row1->ContactLastName);?>
                                    <?php
                                        echo '<br/>Special Instructions: ';
                                        $counter2=0;
                                        $comma2='';
                                        $Query2 = "
                                        SELECT cpd.cpd_answer
                                        FROM contact_profile_details AS cpd
                                        WHERE cpd.conp_id=".$row1->conp_id." ";
                                        $count2 = mysql_num_rows(mysql_query($Query2));
                                        $rs2 = mysql_query($Query2);
                                        if ($count2 > 0) {
                                            while ($row2 = mysql_fetch_object($rs2)) {
                                                if(!empty($row2->cpd_answer)){
                                                    if($counter2>0){
                                                        $comma2 = ', ';
                                                    } else {
                                                        $comma2 = '';
                                                    }
                                                    echo trim($comma2.$row2->cpd_answer);
                                                    $counter2++;
                                                }
                                            }
                                        }
                                    ?>
                                    <?php
                                        $Query2 = "
                                        SELECT cp.jacketsize_id, cp.bootsize_id, js.jacketsize_name, bs.bootsize_name
                                        FROM contact_profiles AS cp
                                        LEFT OUTER JOIN jacket_size AS js ON cp.jacketsize_id=js.jacketsize_id
                                        LEFT OUTER JOIN boot_size AS bs ON cp.bootsize_id=bs.bootsize_id
                                        WHERE cp.conp_id=".$row1->conp_id." ";
                                        $count2 = mysql_num_rows(mysql_query($Query2));
                                        $rs2 = mysql_query($Query2);
                                        if ($count2 > 0) {
                                            while ($row2 = mysql_fetch_object($rs2)) {
                                                echo '<br/>Jacket Size: '.$row2->jacketsize_name;
                                                echo '<br/>Boot Size: '.$row2->bootsize_name;
                                            }
                                        }
                                    ?>
                                    </div>
                        <?php
                                $dynmvar = $row1->asch_id;
                                //echo '<br/>';
                              }
                        ?>    
            <?php
                    }
                }
            ?>

            
            
            <h3><strong> Boats </strong></h3>
            <?php
                $counter1 = 0;
                $dynmvar = 0;
                $Query1 = "
SELECT 
acts.*, c.ContactFirstName, c.ContactLastName, cp.conp_id, ac.act_name, ag.ag_name, av.av_name, ab.*, bc.actboca_name, bcd.actbodh_name
FROM 
act_schedule AS acts
LEFT OUTER JOIN contacts AS c ON acts.cont_id=c.ContactID
LEFT OUTER JOIN contact_profiles AS cp ON acts.cont_id=cp.cont_id
LEFT OUTER JOIN activities AS ac ON acts.act_id=ac.act_id
LEFT OUTER JOIN activity_guides AS ag ON acts.ag_id=ag.ag_id
LEFT OUTER JOIN activity_vendors AS av ON acts.av_id=av.av_id
LEFT OUTER JOIN act_boats AS ab ON acts.act_boat_id = ab.act_boat_id
LEFT OUTER JOIN act_boat_captain AS bc ON ab.actboca_id = bc.actboca_id
LEFT OUTER JOIN act_boat_deckhand AS bcd ON ab.actbodh_id = bcd.actbodh_id
WHERE  acts.act_boat_id!=0 AND acts.cont_id = ".$_REQUEST['cont_id']." ORDER BY acts.act_id ASC";
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
                            if($counter1==1){
                                $dynmvar = $row1->asch_id;
                            }
                            //echo $dynmvar.','.$row1->act_boat_id;
                            if($dynmvar == $row1->asch_id){
                                //echo 'IF: ';
                                //echo '<br/>';
                                if($counter1==1){
                        ?>
                                    <div style="padding-left: 50px;">
                                        <h3><?php echo calendarDateConver2($row1->asch_start_date).', '.date('H:i:s', strtotime($row1->asch_start_date . '0 minute')).', '.date('H:i:s', strtotime($row1->asch_end_date . '0 minute'));?></h3>
                                    </div>    
                                    <div style="padding-left: 100px;">
                                        <h3><?php echo $row1->act_name.', '.$row1->ag_name.', '.$row1->av_name;?></h3>
                                    </div>    
                        <?php
                                }
                        ?>
                                    <div style="padding-left: 150px;">
                                    <?php echo '<br/>Guest: '.trim($row1->ContactFirstName.' '.$row1->ContactLastName);?>
                                    <?php
                                        echo '<br/>Special Instructions: ';
                                        $counter2=0;
                                        $comma2='';
                                        $Query2 = "
                                        SELECT cpd.cpd_answer
                                        FROM contact_profile_details AS cpd
                                        WHERE cpd.conp_id=".$row1->conp_id." ";
                                        $count2 = mysql_num_rows(mysql_query($Query2));
                                        $rs2 = mysql_query($Query2);
                                        if ($count2 > 0) {
                                            while ($row2 = mysql_fetch_object($rs2)) {
                                                if(!empty($row2->cpd_answer)){
                                                    if($counter2>0){
                                                        $comma2 = ', ';
                                                    } else {
                                                        $comma2 = '';
                                                    }
                                                    echo trim($comma2.$row2->cpd_answer);
                                                    $counter2++;
                                                }
                                            }
                                        }
                                    ?>
                                    <?php
                                        $Query2 = "
                                        SELECT cp.jacketsize_id, cp.bootsize_id, js.jacketsize_name, bs.bootsize_name
                                        FROM contact_profiles AS cp
                                        LEFT OUTER JOIN jacket_size AS js ON cp.jacketsize_id=js.jacketsize_id
                                        LEFT OUTER JOIN boot_size AS bs ON cp.bootsize_id=bs.bootsize_id
                                        WHERE cp.conp_id=".$row1->conp_id." ";
                                        $count2 = mysql_num_rows(mysql_query($Query2));
                                        $rs2 = mysql_query($Query2);
                                        if ($count2 > 0) {
                                            while ($row2 = mysql_fetch_object($rs2)) {
                                                echo '<br/>Jacket Size: '.$row2->jacketsize_name;
                                                echo '<br/>Boot Size: '.$row2->bootsize_name;
                                            }
                                        }
                                    ?>
                                    </div>
                        <?php } else { 
                                //echo 'ELSE: ';
                                //echo '<br/>';
                        ?>
                                <div style="padding-left: 50px;">
                                    <h3><?php echo calendarDateConver2($row1->asch_start_date).', '.date('H:i:s', strtotime($row1->asch_start_date . '0 minute')).', '.date('H:i:s', strtotime($row1->asch_end_date . '0 minute'));?></h3>
                                </div>    
                                <div style="padding-left: 100px;">
                                    <h3><?php echo $row1->act_name.', '.$row1->ag_name.', '.$row1->av_name;?></h3>
                                </div>    
            
                                    <div style="padding-left: 150px;">
                                    <?php echo '<br/>Guest: '.trim($row1->ContactFirstName.' '.$row1->ContactLastName);?>
                                    <?php
                                        echo '<br/>Special Instructions: ';
                                        $counter2=0;
                                        $comma2='';
                                        $Query2 = "
                                        SELECT cpd.cpd_answer
                                        FROM contact_profile_details AS cpd
                                        WHERE cpd.conp_id=".$row1->conp_id." ";
                                        $count2 = mysql_num_rows(mysql_query($Query2));
                                        $rs2 = mysql_query($Query2);
                                        if ($count2 > 0) {
                                            while ($row2 = mysql_fetch_object($rs2)) {
                                                if(!empty($row2->cpd_answer)){
                                                    if($counter2>0){
                                                        $comma2 = ', ';
                                                    } else {
                                                        $comma2 = '';
                                                    }
                                                    echo trim($comma2.$row2->cpd_answer);
                                                    $counter2++;
                                                }
                                            }
                                        }
                                    ?>
                                    <?php
                                        $Query2 = "
                                        SELECT cp.jacketsize_id, cp.bootsize_id, js.jacketsize_name, bs.bootsize_name
                                        FROM contact_profiles AS cp
                                        LEFT OUTER JOIN jacket_size AS js ON cp.jacketsize_id=js.jacketsize_id
                                        LEFT OUTER JOIN boot_size AS bs ON cp.bootsize_id=bs.bootsize_id
                                        WHERE cp.conp_id=".$row1->conp_id." ";
                                        $count2 = mysql_num_rows(mysql_query($Query2));
                                        $rs2 = mysql_query($Query2);
                                        if ($count2 > 0) {
                                            while ($row2 = mysql_fetch_object($rs2)) {
                                                echo '<br/>Jacket Size: '.$row2->jacketsize_name;
                                                echo '<br/>Boot Size: '.$row2->bootsize_name;
                                            }
                                        }
                                    ?>
                                    </div>
                        <?php
                                $dynmvar = $row1->asch_id;
                                //echo '<br/>';
                              }
                        ?>    
            <?php
                    }
                }
            ?>
            
                                        
                                        
            <h3><strong> Massage </strong></h3>
            <?php
                $counter1 = 0;
                $dynmvar = 0;
                $Query1 = "
                SELECT 
                acts.*, c.ContactFirstName, c.ContactLastName, cp.conp_id, ac.act_name, ag.ag_name, av.av_name, actt.ath_name, actht.atht_name
                FROM 
                act_schedule AS acts
                LEFT OUTER JOIN contacts AS c ON acts.cont_id=c.ContactID
                LEFT OUTER JOIN contact_profiles AS cp ON acts.cont_id=cp.cont_id
                LEFT OUTER JOIN activities AS ac ON acts.act_id=ac.act_id
                LEFT OUTER JOIN activity_guides AS ag ON acts.ag_id=ag.ag_id
                LEFT OUTER JOIN activity_vendors AS av ON acts.av_id=av.av_id
                LEFT OUTER JOIN act_therapist AS actt ON acts.ath_id=actt.ath_id
                LEFT OUTER JOIN act_th_type AS actht ON acts.atht_id=actht.atht_id
                WHERE  acts.ath_id!='' AND acts.cont_id = ".$_REQUEST['cont_id']." ORDER BY acts.ath_id ASC";
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
                            if($counter1==1){
                                $dynmvar = $row1->asch_id;
                            }
                            //echo $dynmvar.','.$row1->act_boat_id;
                            if($dynmvar == $row1->asch_id){
                                //echo 'IF: ';
                                //echo '<br/>';
                                if($counter1==1){
                        ?>
                                    <div style="padding-left: 50px;">
                                        <h3><?php echo calendarDateConver2($row1->asch_start_date).', '.date('H:i:s', strtotime($row1->asch_start_date . '0 minute')).', '.$row1->asch_duration;?></h3>
                                    </div>    
                                    <div style="padding-left: 100px;">
                                        <h3><?php echo $row1->act_name.', '.$row1->ath_name.', '.$row1->atht_name;?></h3>
                                    </div>    
                        <?php
                                }
                        ?>
                                    <div style="padding-left: 150px;">
                                    <?php echo '<br/>Guest: '.trim($row1->ContactFirstName.' '.$row1->ContactLastName);?>
                                    <?php
                                        echo '<br/>Special Instructions: ';
                                        $counter2=0;
                                        $comma2='';
                                        $Query2 = "
                                        SELECT cpd.cpd_answer
                                        FROM contact_profile_details AS cpd
                                        WHERE cpd.conp_id=".$row1->conp_id." ";
                                        $count2 = mysql_num_rows(mysql_query($Query2));
                                        $rs2 = mysql_query($Query2);
                                        if ($count2 > 0) {
                                            while ($row2 = mysql_fetch_object($rs2)) {
                                                if(!empty($row2->cpd_answer)){
                                                    if($counter2>0){
                                                        $comma2 = ', ';
                                                    } else {
                                                        $comma2 = '';
                                                    }
                                                    echo trim($comma2.$row2->cpd_answer);
                                                    $counter2++;
                                                }
                                            }
                                        }
                                    ?>
                                    <?php
                                        $Query2 = "
                                        SELECT cp.jacketsize_id, cp.bootsize_id, js.jacketsize_name, bs.bootsize_name
                                        FROM contact_profiles AS cp
                                        LEFT OUTER JOIN jacket_size AS js ON cp.jacketsize_id=js.jacketsize_id
                                        LEFT OUTER JOIN boot_size AS bs ON cp.bootsize_id=bs.bootsize_id
                                        WHERE cp.conp_id=".$row1->conp_id." ";
                                        $count2 = mysql_num_rows(mysql_query($Query2));
                                        $rs2 = mysql_query($Query2);
                                        if ($count2 > 0) {
                                            while ($row2 = mysql_fetch_object($rs2)) {
                                                echo '<br/>Jacket Size: '.$row2->jacketsize_name;
                                                echo '<br/>Boot Size: '.$row2->bootsize_name;
                                            }
                                        }
                                    ?>
                                    </div>
                        <?php } else { 
                                //echo 'ELSE: ';
                                //echo '<br/>';
                        ?>
                                <div style="padding-left: 50px;">
                                    <h3><?php echo calendarDateConver2($row1->asch_start_date).', '.date('H:i:s', strtotime($row1->asch_start_date . '0 minute')).', '.$row1->asch_duration;?></h3>
                                </div>    
                                <div style="padding-left: 100px;">
                                    <h3><?php echo $row1->act_name.', '.$row1->ath_name.', '.$row1->atht_name;?></h3>
                                </div>    
                                    <div style="padding-left: 150px;">
                                    <?php echo '<br/>Guest: '.trim($row1->ContactFirstName.' '.$row1->ContactLastName);?>
                                    <?php
                                        echo '<br/>Special Instructions: ';
                                        $counter2=0;
                                        $comma2='';
                                        $Query2 = "
                                        SELECT cpd.cpd_answer
                                        FROM contact_profile_details AS cpd
                                        WHERE cpd.conp_id=".$row1->conp_id." ";
                                        $count2 = mysql_num_rows(mysql_query($Query2));
                                        $rs2 = mysql_query($Query2);
                                        if ($count2 > 0) {
                                            while ($row2 = mysql_fetch_object($rs2)) {
                                                if(!empty($row2->cpd_answer)){
                                                    if($counter2>0){
                                                        $comma2 = ', ';
                                                    } else {
                                                        $comma2 = '';
                                                    }
                                                    echo trim($comma2.$row2->cpd_answer);
                                                    $counter2++;
                                                }
                                            }
                                        }
                                    ?>
                                    <?php
                                        $Query2 = "
                                        SELECT cp.jacketsize_id, cp.bootsize_id, js.jacketsize_name, bs.bootsize_name
                                        FROM contact_profiles AS cp
                                        LEFT OUTER JOIN jacket_size AS js ON cp.jacketsize_id=js.jacketsize_id
                                        LEFT OUTER JOIN boot_size AS bs ON cp.bootsize_id=bs.bootsize_id
                                        WHERE cp.conp_id=".$row1->conp_id." ";
                                        $count2 = mysql_num_rows(mysql_query($Query2));
                                        $rs2 = mysql_query($Query2);
                                        if ($count2 > 0) {
                                            while ($row2 = mysql_fetch_object($rs2)) {
                                                echo '<br/>Jacket Size: '.$row2->jacketsize_name;
                                                echo '<br/>Boot Size: '.$row2->bootsize_name;
                                            }
                                        }
                                    ?>
                                    </div>
                        <?php
                                $dynmvar = $row1->asch_id;
                                //echo '<br/>';
                              }
                        ?>    
            <?php
                    }
                }
            ?>

            
            



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    

        </ul>
    </div>
