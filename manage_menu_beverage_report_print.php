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




        <ul class="nav faq-list">
            <h3>Date: <?php echo calendarDateConver2($_SESSION['asch_start_date']);?></h3>
            
            
            <div style="padding-left: 50px;">
                <h3>Breakfast Items & Count</h3>
            </div>
            <?php
                $Query3 = "
                SELECT 
                ms.msch_id, ms.menu_b, ms.msch_date,
                (SELECT COUNT(msc.menu_b) FROM menu_schedules AS msc WHERE ms.menu_b = msc.menu_b AND msc.msch_date = '".$_SESSION['asch_start_date']."' ) AS total_menu,
                me.menu_item_name
                FROM 
                menu_schedules AS ms
                LEFT OUTER JOIN menus AS me ON ms.menu_b = me.menu_id
                WHERE
                ms.menu_b != '' AND ms.msch_date = '".$_SESSION['asch_start_date']."'
                GROUP BY
                ms.menu_b
                ";
                $count3 = mysql_num_rows(mysql_query($Query3));
                $rs3 = mysql_query($Query3);
                if ($count3 > 0) {
                    while ($row3 = mysql_fetch_object($rs3)) {
            ?>
            <div style="padding-left: 100px;">
                <h4><?php echo $row3->menu_item_name.' - '.$row3->total_menu;?></h4>
            </div>    
            <?php
                    }
                }
            ?>

            <div style="padding-left: 50px;">
                <h3>Lunch Items & Count</h3>
            </div>
            <?php
                $Query1 = "
                SELECT 
                ms.msch_id, ms.menu_l, ms.msch_date,
                (SELECT COUNT(msc.menu_l) FROM menu_schedules AS msc WHERE ms.menu_l = msc.menu_l AND msc.msch_date = '".$_SESSION['asch_start_date']."' ) AS total_menu,
                me.menu_item_name

                FROM 
                menu_schedules AS ms
                LEFT OUTER JOIN menus AS me ON ms.menu_l = me.menu_id
                WHERE
                ms.menu_l != '' AND ms.msch_date = '".$_SESSION['asch_start_date']."'

                GROUP BY
                ms.menu_l
                ";
                $count1 = mysql_num_rows(mysql_query($Query1));
                $rs1 = mysql_query($Query1);
                if ($count1 > 0) {
                    while ($row1 = mysql_fetch_object($rs1)) {
            ?>
            <div style="padding-left: 100px;">
                <h4><?php echo $row1->menu_item_name.' - '.$row1->total_menu;?></h4>
            </div>    
            <?php
                    }
                }
            ?>

            <div style="padding-left: 50px;">
                <h3>Dinner Items & Count</h3>
            </div>
            <?php
                $Query2 = "
                SELECT 
                ms.msch_id, ms.menu_d, ms.msch_date,
                (SELECT COUNT(msc.menu_d) FROM menu_schedules AS msc WHERE ms.menu_d = msc.menu_d AND msc.msch_date = '".$_SESSION['asch_start_date']."' ) AS total_menu,
                me.menu_item_name

                FROM 
                menu_schedules AS ms
                LEFT OUTER JOIN menus AS me ON ms.menu_d = me.menu_id
                WHERE
                ms.menu_d != '' AND ms.msch_date = '".$_SESSION['asch_start_date']."'

                GROUP BY
                ms.menu_d
                ";
                $count2 = mysql_num_rows(mysql_query($Query2));
                $rs2 = mysql_query($Query2);
                if ($count2 > 0) {
                    while ($row2 = mysql_fetch_object($rs2)) {
            ?>
            <div style="padding-left: 100px;">
                <h4><?php echo $row2->menu_item_name.' - '.$row2->total_menu;?></h4>
            </div>    
            <?php
                    }
                }
            ?>
            <hr><br>
            
            
            <table width="100%" cellspacing="15" style="float: left; text-align: left; vertical-align: top;">
                <thead>
                    <tr>
                        <th style="text-align: left; vertical-align: top;"> Guest Name </th>
                        <th style="text-align: left; vertical-align: top;"> Allergy/Special Instructions </th>
                        <th style="text-align: left; vertical-align: top;"> Breakfast </th>
                        <th style="text-align: left; vertical-align: top;"> Lunch </th>
                        <th style="text-align: left; vertical-align: top;"> Dinner </th>
                        <th style="text-align: left; vertical-align: top;"> Beverage Order </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $Query4 = "
                        SELECT 
                        ms.*, c.ContactFirstName, c.ContactLastName, cp.conp_id 
                        FROM 
                        menu_schedules AS ms 
                        LEFT OUTER JOIN contacts AS c ON ms.cont_id = c.ContactID 
                        LEFT OUTER JOIN contact_profiles AS cp ON ms.cont_id = cp.cont_id 
                        WHERE
                        ms.msch_date = '".$_SESSION['asch_start_date']."'
                        GROUP BY 
                        ms.cont_id
                        ORDER BY c.ContactFirstName
                        ";
                        $count4 = mysql_num_rows(mysql_query($Query4));
                        $rs4 = mysql_query($Query4);
                        if ($count4 > 0) {
                            while ($row4 = mysql_fetch_object($rs4)) {
                    ?>
                    <tr>
                        <td style="float: left; text-align: left; vertical-align: top;"> &nbsp;<br/> 
                            <?php echo $row4->ContactFirstName.' '.$row4->ContactLastName;?>
                        </td>
                        <td style="float: left; text-align: left; vertical-align: top; color: #ff3333;"> &nbsp;<br/> 
                            <?php
                                $counter5=0;
                                $Query5 = "
                                SELECT cpd.cpd_answer
                                FROM contact_profile_details AS cpd
                                WHERE cpd.conp_id=".$row4->conp_id." ";
                                $count5 = mysql_num_rows(mysql_query($Query5));
                                $rs5 = mysql_query($Query5);
                                if ($count5 > 0) {
                                    while ($row5 = mysql_fetch_object($rs5)) {
                                        if($row5->cpd_answer != ''){
                                            if($counter5>0){
                                                $comma = ', ';
                                            }
                                            echo $comma.$row5->cpd_answer;
                                            $counter5++;
                                        }    
                                    }
                                }
                            ?>
                        </td>
                        <td style="float: left; text-align: left; vertical-align: top;"> &nbsp;<br/> 
                            <?php
                                $counter=0;
                                $dynmvar = '';
                                $rsM = mysql_query("
                                SELECT 
                                msc.msch_id, msc.msch_type, msc.msch_date, msc.msch_custom_order,
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
                                WHERE msc.cont_id = ".$row4->cont_id." AND msc.msch_date = '".$_SESSION['asch_start_date']."' 
                                ORDER BY msc.msch_date, msc.msch_type ASC ");
                                if(mysql_num_rows($rsM)>0){
                                    while($rsMem = mysql_fetch_object($rsM)){
                                        if($rsMem->msch_type==1){
                                            echo (!empty($rsMem->mib)?'Regular: '.$rsMem->mib:'');
                                            echo (!empty($rsMem->mibd)?'<br/>Custom: '.$rsMem->mibd:'');
                                            echo (!empty($rsMem->msch_custom_order)?'<br/>Extended Custom: '.$rsMem->msch_custom_order:'');
                                        }
                                    }    
                                }
                            ?>
                        </td>
                        <td style="float: left; text-align: left; vertical-align: top;"> &nbsp;<br/> 
                            <?php
                                $counter=0;
                                $dynmvar = '';
                                $rsM = mysql_query("
                                SELECT 
                                msc.msch_id, msc.msch_type, msc.msch_date, msc.msch_custom_order,
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
                                WHERE msc.cont_id = ".$row4->cont_id." AND msc.msch_date = '".$_SESSION['asch_start_date']."' 
                                ORDER BY msc.msch_date, msc.msch_type ASC ");
                                if(mysql_num_rows($rsM)>0){
                                    while($rsMem = mysql_fetch_object($rsM)){
                                        if($rsMem->msch_type==2){
                                            echo (!empty($rsMem->mil)?'Regular: '.$rsMem->mil:'');
                                            echo (!empty($rsMem->mild)?'<br/>Custom: '.$rsMem->mild:'');
                                            echo (!empty($rsMem->msch_custom_order)?'<br/>Extended Custom: '.$rsMem->msch_custom_order:'');
                                        }
                                    }    
                                }
                            ?>
                        </td>
                        <td style="float: left; text-align: left; vertical-align: top;"> &nbsp;<br/> 
                            <?php
                                $counter=0;
                                $dynmvar = '';
                                $rsM = mysql_query("
                                SELECT 
                                msc.msch_id, msc.msch_type, msc.msch_date, msc.msch_custom_order,
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
                                WHERE msc.cont_id = ".$row4->cont_id." AND msc.msch_date = '".$_SESSION['asch_start_date']."' 
                                ORDER BY msc.msch_date, msc.msch_type ASC ");
                                if(mysql_num_rows($rsM)>0){
                                    while($rsMem = mysql_fetch_object($rsM)){
                                        if($rsMem->msch_type==3){
                                            echo (!empty($rsMem->mid)?'Regular: '.$rsMem->mid:'');
                                            echo (!empty($rsMem->mibd)?'<br/>Custom: '.$rsMem->mibd:'');
                                            echo (!empty($rsMem->msch_custom_order)?'<br/>Extended Custom: '.$rsMem->msch_custom_order:'');
                                        }
                                    }    
                                }
                            ?>
                        </td>
                        <td style="float: left; text-align: left; vertical-align: top;"> &nbsp;<br/> 
                            <?php 
                                $counter=0;
                                $rsM = mysql_query("SELECT 
                                bo.*, bi.bitem_name
                                FROM 
                                beverage_order AS bo
                                LEFT OUTER JOIN bar_items AS bi ON bo.bitem_id = bi.bitem_id
                                WHERE 
                                bo.cont_id = ".$row4->cont_id." AND bo.bvo_date = '".$_SESSION['asch_start_date']."' ");
                                if (mysql_num_rows($rsM) > 0) {
                                    while($rsMem = mysql_fetch_object($rsM)){
                                        $counter++;
                                        if($counter>1){
                                            $comma = ', ';

                                        } else {
                                            $comma = '';
                                        }
                                        echo $rsMem->bitem_name.' '.$rsMem->bvo_quantity.'<br/>';
                                    }
                                }
                            ?>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>

            
            
            
        
            
            
        </ul>




