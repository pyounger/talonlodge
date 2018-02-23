<?php 
include ('includes/php_includes_top.php'); 
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
            <h1>Room Assignment Report</h1>


<table style="text-align: left;" id="example" width="100%">
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
                                    echo $row[0];
                                }
                            }
                        ?>
                        <span class="pull-right" style="width:auto;">
                        </span> 
                    </h3>
                </div>
                <div class="panel-body">
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

                            $gcounter=0;
                            $Query4 = "SELECT * FROM rooms ORDER BY room_title ASC";
                                $nResult4 = mysql_query($Query4);
                                if (mysql_num_rows($nResult4) >= 1) {
                                    while ($row4 = mysql_fetch_object($nResult4)) {
                                            $gcounter++;


                        ?>

                                    <?php
                                    $Query = "SELECT
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
									p.Pms_Package_ID = " . $_REQUEST['pms_pak_id'] . "  
AND p.Arrival_Start_Date > '2014-05-01'  
AND g.grp_id=c.grp_id
AND g.GroupArrivalDate > '2014-05-01' 

ORDER BY p.Arrival_Start_Date ASC";
                                    $counter = 0;
                                    $limit = $_SESSION['limit_of_rec'];
                                    $start = $p->findStart($limit);
                                    $count = mysql_num_rows(mysql_query($Query));
                                    if($gcounter==1){
                                        echo "<h3>Guest Count: ".$count."</h3>";
                                    }
                                    $pages = $p->findPages($count, $limit);
                                    $rs = mysql_query($Query . " LIMIT " . $start . ", " . $limit);
                                    if (mysql_num_rows($rs) > 0) {
                                        while ($row = mysql_fetch_object($rs)) {
                                            

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

                                            if($count6 == 1){
                                                $counter++;
                                            ?>


                        
                        
                        
                                <?php
                                    $Query11 = "SELECT
                                    p.Pms_Package_ID, p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, p.Package_Max_Days,
                                    g.grp_id, g.GroupName,
                                    c.ContactID, c.ContactFirstName, c.ContactLastName, c.cont_special_ins, 
                                    cp.conp_id, cp.bootsize_id,
                                    j.jacketsize_name

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


                                    ORDER BY p.Arrival_Start_Date ASC";
                                    $counter11 = 0;
                                    $limit11 = $_SESSION['limit_of_rec'];
                                    $start11 = $p->findStart($limit11);
                                    $count11 = mysql_num_rows(mysql_query($Query11));
                                    $pages11 = $p->findPages($count11, $limit11);
                                    $rs11 = mysql_query($Query11 . " LIMIT " . $start11 . ", " . $limit11);
                                    if (mysql_num_rows($rs11) > 0) {
                                        while ($row11 = mysql_fetch_object($rs11)) {
                                            $Query511=0;
                                            $count511=0;
                                            $count611=0;
                                            foreach( $room_dates as $romd ):
                                                $Query511 = "SELECT
                                                rr.roomr_id, rr.room_id, r.room_title

                                                FROM room_reservation AS rr 
                                                LEFT OUTER JOIN rooms AS r ON rr.room_id=r.room_id

                                                WHERE contact_id=" . $row->ContactID . " 
                                                AND r.room_id=".$row4->room_id." 
                                                AND grp_id=" . $row->grp_id . "
                                                AND Pms_Package_ID=" . $row->Pms_Package_ID . "
                                                AND roomr_startdate= '" . $romd . "' ";
                                                $count511 = mysql_num_rows(mysql_query($Query511));
                                                if($count511!=0){
                                                    $count611=1;
                                                }
                                            endforeach;    

                                            if($count611 == 1){
                                                $counter11++;
                                                //echo '<br/><br/>First: ' . $count511 . ' ' . $counter11 . ' ' . $count611 . ' ' . $day_counter . ' ' . $day_counter1 . ' <br/><br/>';
                                                
                                            }
                                            
                                            
                                        }
                                    }
                                ?>
                                <?php //echo '<br/><br/>First: ' . $gcounter . ' ' . $count511 . ' ' . $counter11 . ' ' . $count611 . ' ' . $day_counter . ' ' . $day_counter1 . ' <br/><br/>';?>


                                <div style="padding-left: 50px;">
                                <?php if($counter==1){?>
                                    <h3><?php echo returnName("room_title", "rooms", "room_id", $row4->room_id);?></h3>
                                <?php }?>
                                </div>    
                                
                                <div style="padding-left: 100px;">
                                <?php print($row->ContactFirstName.' '.$row->ContactLastName.', '.$row->GroupName.', Jacket Size: '.$row->jacketsize_name.', Boot Size: '.$row->bootsize_name.(($row->cont_special_ins!='')?', '.$row->cont_special_ins:''));?><br/><br/>
                                
                                <?php //echo '<br/><br/>Second: ' . $gcounter . ' ' . $count5 . ' ' . $counter . ' ' . $count6 . ' ' . $day_counter . ' ' . $day_counter1 . ' <br/><br/>';?>
                                </div>
                                

                                
                                <!--
                                <h3 style="text-decoration: underline;">Special Instructions</h3>
                                <?php 
                                    if($row->cont_special_ins!=''){
                                        @$special_ins .= "".$row->ContactFirstName.' '.$row->ContactLastName.', '.$row->cont_special_ins."<br/><br/>";
                                    }
                                ?>
                                -->

                                
                                
                                
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
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

                        </table>



        </ul>
    </div>

