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
                            
                            




                            
                            
                            
                            
                            
            <?php
                $counter=0;
                $dynmvar = '';
		$rsM = mysql_query("
		SELECT 
		msc.msch_id, msc.msch_type, msc.msch_date,
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
		WHERE msc.cont_id = ".$_REQUEST['cont_id']." ORDER BY msc.msch_date, msc.msch_type ASC ");
		if(mysql_num_rows($rsM)>0){
                    while($rsMem = mysql_fetch_object($rsM)){
                        $counter++;
                        echo '<div style="padding-left: 25px;">';
                            if($counter==1){
                                $dynmvar = $rsMem->msch_date;
                            }
                            if($dynmvar == $rsMem->msch_date){
                                if($counter==1){
                                    echo '<h3>'.$rsMem->msch_date.'</h3>';
                                }
                                echo '<div style="padding-left: 25px;">';
                                    if($rsMem->msch_type==1){
                                        echo 'Breakfast:';
                                        echo '<div style="padding-left: 25px;">';
                                        echo 'Regular: '.$rsMem->mib;
                                        echo '<br/>Custom: '.$rsMem->mibd;
                                        echo '</div>';
                                    }
                                    if($rsMem->msch_type==2){
                                        echo 'Lunch:';
                                        echo '<div style="padding-left: 25px;">';
                                        echo 'Regular: '.$rsMem->mil;
                                        echo '<br/>Custom: '.$rsMem->mild;
                                        echo '</div>';
                                    }
                                    if($rsMem->msch_type==3){
                                        echo 'Dinner:';
                                        echo '<div style="padding-left: 25px;">';
                                        echo 'Regular: '.$rsMem->mid;
                                        echo '<br/>Custom: '.$rsMem->midd;
                                        echo '</div>';
                                    }
                                echo '</div>';
                            } else { 
                                echo '<h3>'.$rsMem->msch_date.'</h3>';
                                echo '<div style="padding-left: 25px;">';
                                    if($rsMem->msch_type==1){
                                        echo 'Breakfast:';
                                        echo '<div style="padding-left: 25px;">';
                                        echo 'Regular: '.$rsMem->mib;
                                        echo '<br/>Custom: '.$rsMem->mibd;
                                        echo '</div>';
                                    }
                                    if($rsMem->msch_type==2){
                                        echo 'Lunch:';
                                        echo '<div style="padding-left: 25px;">';
                                        echo 'Regular: '.$rsMem->mil;
                                        echo '<br/>Custom: '.$rsMem->mild;
                                        echo '</div>';
                                    }
                                    if($rsMem->msch_type==3){
                                        echo 'Dinner:';
                                        echo '<div style="padding-left: 25px;">';
                                        echo 'Regular: '.$rsMem->mid;
                                        echo '<br/>Custom: '.$rsMem->midd;
                                        echo '</div>';
                                    }
                                echo '</div>';
                                $dynmvar = $rsMem->msch_date;
                            }
                        echo '</div>';
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
