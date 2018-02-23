<?php
include ('includes/php_includes_top.php');

if ((isset($_REQUEST['asch_start_date'])) && ($_REQUEST['asch_start_date'] != '')) {
    $_SESSION['asch_start_date'] = calendarDateConver4($_REQUEST['asch_start_date']);
} else if (isset($_SESSION['asch_start_date'])) {
    //$_SESSION['from'] = $_SESSION['from'];
} else {
    $_SESSION['asch_start_date'] = '2014-05-01';
}

if ((isset($_REQUEST['limit_of_rec'])) && ($_REQUEST['limit_of_rec'] != '')) {
    $_SESSION['limit_of_rec'] = $_REQUEST['limit_of_rec'];
} else if (isset($_SESSION['limit_of_rec'])) {
    //$_SESSION['group_name'] = $_SESSION['group_name'];
} else {
    $_SESSION['limit_of_rec'] = '200';
}


?>
                
    <div class="">
        <ul class="nav faq-list">
            <h1>Boat and Activity Schedule</h1>
            <h3>Date: <?php echo calendarDateConver2($_SESSION['asch_start_date']);?></h3>
            
            <h3><strong>Boats</strong></h3>
            <?php
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
                LEFT OUTER JOIN act_new_boats AS anb ON anb.asch_id = asch.asch_id AND asch.act_boat_id = anb.act_boat_id AND anb.asch_id = asch.asch_id
                LEFT OUTER JOIN act_boat_captain AS abcn ON  abcn.actboca_id = anb.actboca_id 
                LEFT OUTER JOIN act_boat_deckhand AS abdn ON  abdn.actbodh_id = anb.actbodh_id 
                LEFT OUTER JOIN act_boats AS acbn ON anb.act_boat_id  = acbn.act_boat_id
                LEFT OUTER JOIN contact_profiles AS cp ON asch.cont_id = cp.cont_id 
                LEFT OUTER JOIN contacts AS c ON asch.cont_id=c.ContactID 
                WHERE  asch.act_boat_id != ''  AND asch.asch_start_date LIKE '".$_SESSION['asch_start_date']."%' 
                GROUP BY asch.act_boat_id     
                ";
                $count1 = mysql_num_rows(mysql_query($Query1));
                $rs1 = mysql_query($Query1);
                if ($count1 > 0) {
                    while ($row1 = mysql_fetch_object($rs1)) {
                        $counter1++;
                        echo '<div class="" style="padding-left: 50px;">';
                        echo '<h4>'.$row1->act_boat_name.'</h4>';
                        echo '<h4>'.(($row1->new_caption!='')?$row1->new_caption:$row1->actboca_name).'</h4>';
                        echo '<h4>'.(($row1->new_deckhand!='')?$row1->new_deckhand:$row1->actbodh_name).'</h4>';
                        echo '</div>';
                        echo '<div class="" style="padding-left: 100px;">';
            ?>
            
                        <?php
                            $counter2=0;
                            $comma2='';
                            $Query2 = "
                            SELECT 
                            asch.asch_id, asch.cont_id, asch.act_boat_id, 
                            c.ContactFirstName, c.ContactLastName,
                            cp.conp_id  

                            FROM 
                            act_schedule AS asch 
                            LEFT OUTER JOIN contacts AS c ON asch.cont_id = c.ContactID 
                            LEFT OUTER JOIN contact_profiles AS cp ON asch.cont_id = cp.cont_id 

                            WHERE  
                            asch_start_date LIKE '".$_SESSION['asch_start_date']."%' AND asch.act_boat_id IS NOT NULL AND asch.act_boat_id = ".$row1->act_boat_id."  

                            ORDER BY 
                            asch.act_boat_id 
                            ";
                            $count2 = mysql_num_rows(mysql_query($Query2));
                            $rs2 = mysql_query($Query2);
                            if ($count2 > 0) {
                                while ($row2 = mysql_fetch_object($rs2)) {
                                    echo 'Guest: '.$row2->ContactFirstName.' '.$row2->ContactLastName;
                                    $counter3=0;
                                    $comma3='';
                                    $concat3 = '';
                                    $Query3 = "
                                    SELECT cpd.cpd_answer
                                    FROM contact_profile_details AS cpd
                                    WHERE cpd.conp_id=".$row2->conp_id." ";
                                    $count3 = mysql_num_rows(mysql_query($Query3));
                                    $rs3 = mysql_query($Query3);
                                    if ($count3 > 0) {
                                        while ($row3 = mysql_fetch_object($rs3)) {
                                            if(!empty($row3->cpd_answer)){
                                                if($counter3>0){
                                                    $comma3 = ', ';
                                                } else {
                                                    $comma3 = '';
                                                }
                                                $concat3 .= trim($comma3.$row3->cpd_answer);
                                                $counter3++;
                                            }
                                        }
                                        if($concat3 != ''){
                                            echo '<br/>Special Instructions: '.$concat3;
                                        }
                                    }
                                    $Query4 = "
                                    SELECT cp.jacketsize_id, cp.bootsize_id, js.jacketsize_name, bs.bootsize_name
                                    FROM contact_profiles AS cp
                                    LEFT OUTER JOIN jacket_size AS js ON cp.jacketsize_id = js.jacketsize_id
                                    LEFT OUTER JOIN boot_size AS bs ON cp.bootsize_id = bs.bootsize_id
                                    WHERE cp.conp_id=".$row2->conp_id." ";
                                    $count4 = mysql_num_rows(mysql_query($Query4));
                                    $rs4 = mysql_query($Query4);
                                    if ($count4 > 0) {
                                        while ($row4 = mysql_fetch_object($rs4)) {
                                            echo '<br/>Jacket Size: '.$row4->jacketsize_name;
                                            echo '<br/>Boot Size: '.$row4->bootsize_name;
                                        }
                                    }
                                echo '<br/><br/>';    
                                }
                            }
                        ?>
            
            
            <?php
                        echo '</div>';
                    }
                }
            ?>

            <h3><strong> Massage </strong></h3>
            <?php
                $counter1 = 0;
                $dynmvar = 0;
                $Query1 = "
                SELECT 
                acts.*, c.ContactFirstName, c.ContactLastName, cp.conp_id, ac.act_name, ag.ag_name, av.av_name, actt.ath_name, acttt.atht_name
                FROM 
                act_schedule AS acts
                LEFT OUTER JOIN contacts AS c ON acts.cont_id=c.ContactID
                LEFT OUTER JOIN contact_profiles AS cp ON acts.cont_id=cp.cont_id
                LEFT OUTER JOIN activities AS ac ON acts.act_id=ac.act_id
                LEFT OUTER JOIN activity_guides AS ag ON acts.ag_id=ag.ag_id
                LEFT OUTER JOIN activity_vendors AS av ON acts.av_id=av.av_id
                LEFT OUTER JOIN act_therapist AS actt ON acts.ath_id=actt.ath_id
                LEFT OUTER JOIN act_th_type AS acttt ON acts.atht_id=acttt.atht_id
                WHERE  acts.asch_duration!='' AND acts.asch_start_date LIKE '".$_SESSION['asch_start_date']."%' ORDER BY acts.ag_id ASC";
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
                                $dynmvar = $row1->ag_id;
                            }
                            //echo $dynmvar.','.$row1->act_boat_id;
                            if($dynmvar == $row1->ag_id){
                                //echo 'IF: ';
                                //echo '<br/>';
                                if($counter1==1){
                        ?>
                                    <div style="padding-left: 50px;">
                                        <h3><?php echo $row1->act_name;?></h3>
                                        <h3><?php echo $row1->ath_name;?></h3>
                                        <h3><?php echo $row1->atht_name;?></h3>
                                    </div>    
                        <?php
                                }
                        ?>
                                    <div style="padding-left: 100px;">
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
                                    <h3><?php echo $row1->act_name;?></h3>
                                    <h3><?php echo $row1->ath_name;?></h3>
                                    <h3><?php echo $row1->atht_name;?></h3>
                                </div>
                                    
                                <div style="padding-left: 100px;">
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
                                $dynmvar = $row1->ag_id;
                                //echo '<br/>';
                              }
                        ?>    
            <?php
                    }
                }
            ?>

                                
                                
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
                WHERE  acts.ag_id!='' AND acts.asch_start_date LIKE '".$_SESSION['asch_start_date']."%' ORDER BY acts.ag_id ASC";
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
                                $dynmvar = $row1->ag_id;
                            }
                            //echo $dynmvar.','.$row1->act_boat_id;
                            if($dynmvar == $row1->ag_id){
                                //echo 'IF: ';
                                //echo '<br/>';
                                if($counter1==1){
                        ?>
                                    <div style="padding-left: 50px;">
                                        <h3><?php echo $row1->act_name;?></h3>
                                        <h3><?php echo $row1->ag_name;?></h3>
                                        <h3><?php echo $row1->av_name;?></h3>
                                    </div>    
                        <?php
                                }
                        ?>
                                    <div style="padding-left: 100px;">
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
                                    <h3><?php echo $row1->act_name;?></h3>
                                    <h3><?php echo $row1->ag_name;?></h3>
                                    <h3><?php echo $row1->av_name;?></h3>
                                </div>
            
                                    <div style="padding-left: 100px;">
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
                                $dynmvar = $row1->ag_id;
                                //echo '<br/>';
                              }
                        ?>    
            <?php
                    }
                }
            ?>

        </ul>
    </div>
                

