<?php
include ('includes/php_includes_top.php');

if ((isset($_REQUEST['arr_dep_date'])) && ($_REQUEST['arr_dep_date'] != '')) {
    $_SESSION['arr_dep_date'] = calendarDateConver4($_REQUEST['arr_dep_date']);
} else if (isset($_SESSION['arr_dep_date'])) {
    //$_SESSION['from'] = $_SESSION['from'];
} else {
    $_SESSION['arr_dep_date'] = '2014-05-01';
}
if ((isset($_REQUEST['limit_of_rec'])) && ($_REQUEST['limit_of_rec'] != '')) {
    $_SESSION['limit_of_rec'] = $_REQUEST['limit_of_rec'];
} else if (isset($_SESSION['limit_of_rec'])) {
    //$_SESSION['group_name'] = $_SESSION['group_name'];
} else {
    $_SESSION['limit_of_rec'] = '200';
}

include ('includes/html_header.php');
?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
        </ul>
        <div class="form-group hiddn-minibar pull-right">
            <!--<input type="text" class="form-control form-cascade-control nav-input-search" size="20" placeholder="Search through site" />
            <span class="input-icon fui-search"></span>-->
        </div>

        <h3 class="page-header">  Manage Arrival and Departure Schedule Report <?php if(isset($_SESSION['arr_dep_date'])){?> - <a href="manage_arrival_departure_report_print.php" target="_blank" >Go to Printing Page</a><?php }?> <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>

        <blockquote class="page-information hidden">
            <p> <b>Manage Arrival and Departure Schedule Report: </b> You can manage your Arrival and Departure Schedule Report here </p>
        </blockquote>
    </div>
</div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-cascade">
                <div class="panel-heading text-primary">
                    <h3 class="panel-title"><i class="fa fa-check"></i> Arrival and Departure Schedule Report</h3>
                </div>
                <div class="panel-body ">
                    <div class="ro">
                        <div class="col-mol-md-offset-2">
                            <form class="form-horizontal cascde-forms" method="post" action="<?php print($_SERVER['PHP_SELF']); ?>" name="frm" id="frm" >
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-3 control-label">Date:</label>
                                    <div class="col-lg-10 col-md-9">
                                        <input type="text" class="form-control form-cascade-control datetimepicker" value="<?php echo calendarDateConver2($_SESSION['arr_dep_date']); ?>" id="arr_dep_date" name="arr_dep_date" style="width: 160px;" title="Date" placeholder="Date">
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

<div class="row" >
        <div class="col-md-12">
            <div class="<?php print($class); ?>"><?php print($strMSG); ?></div>
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="" style="padding-left: 20px;">
                            <ul class="nav faq-list">
                                <h1>Arrival and Departure Schedule</h1>
                                Date: <?php echo calendarDateConver2($_SESSION['arr_dep_date']);?>
                                
                                
                                <h3><strong>Departures</strong></h3>
                                <?php
                                    $counter1 = 0;
                                    $dynmvar = 0;
                                    $Query1 = "
SELECT 
c.ContactID, c.ContactFirstName, c.ContactLastName, c.con_flight_comments, c.arr_flight_id, c.arr_flightn_id, c.arr_flightt_id, c.arr_hotel_id, c.arr_con_private_jet, c.dep_flight_id, c.dep_flightn_id, c.dep_flightt_id, c.dep_hotel_id, c.dep_con_private_jet, c.arrival_flight_data, c.departure_flight_date,arrfna.flight_name AS arr_flight_name,
arrfno.flightn_name AS arr_flight_number,
arrfti.flightt_name AS arr_flight_time,
arrhot.hotel_name AS arr_hotel_name,
depfna.flight_name AS dep_flight_name,
depfno.flightn_name AS dep_flight_number,
depfti.flightt_name AS dep_flight_time,
dephot.hotel_name AS dep_hotel_name
FROM 
contacts AS c 
LEFT OUTER JOIN flight_info AS arrfna ON c.arr_flight_id = arrfna.flight_id
LEFT OUTER JOIN flight_no AS arrfno ON c.arr_flightn_id = arrfno.flightn_id
LEFT OUTER JOIN flight_time AS arrfti ON c.arr_flightt_id = arrfti.flightt_id
LEFT OUTER JOIN hotel_info AS arrhot ON c.arr_hotel_id = arrhot.hotel_id
LEFT OUTER JOIN flight_info AS depfna ON c.dep_flight_id = depfna.flight_id
LEFT OUTER JOIN flight_no AS depfno ON c.dep_flightn_id = depfno.flightn_id
LEFT OUTER JOIN flight_time AS depfti ON c.dep_flightt_id = depfti.flightt_id
LEFT OUTER JOIN hotel_info AS dephot ON c.dep_hotel_id = dephot.hotel_id
WHERE c.departure_flight_date LIKE '".$_SESSION['arr_dep_date']."%' AND c.dep_flight_id ='1' ORDER BY c.dep_flightn_id
";
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
                                            ?>
                                                        <h3><?php echo '&nbsp; &nbsp; '.$row1->dep_flight_name;?></h3>
                                            <?php
                                                    }
                                                    if(!empty($row1->dep_flightn_id)){
                                                        if($counter1 == 1){
                                                            $dynmvar = $row1->dep_flightn_id;
                                                        }
                                                        if( $dynmvar == $row1->dep_flightn_id ){
                                                            echo '<br>';
                                                            echo '<br/>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; '.$row1->ContactFirstName.' '.$row1->ContactLastName.' '.(($row1->con_flight_comments!='')?', '.$row1->con_flight_comments:'');
                                                        } else {
                                                            $dynmvar = $row1->dep_flightn_id;
                                                            echo '<h3>&nbsp; &nbsp; &nbsp; &nbsp; '.$row1->dep_flight_time.'</h3>';
                                                            echo '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; '.$row1->ContactFirstName.' '.$row1->ContactLastName.' '.(($row1->con_flight_comments!='')?', '.$row1->con_flight_comments:'');
                                                        }
                                                    }
                                                    
                                            ?>
                                <?php
                                        }
                                    }
                                ?>
                                                        
                                <h4><strong>Hotel/B&B</strong></h4>
                                <?php
                                    $counter1 = 0;
                                    $dynmvar = 0;
                                    $Query1 = "
SELECT 
c.ContactID, c.ContactFirstName, c.ContactLastName, c.con_flight_comments, c.arr_flight_id, c.arr_flightn_id, c.arr_flightt_id, c.arr_hotel_id, c.arr_con_private_jet, c.dep_flight_id, c.dep_flightn_id, c.dep_flightt_id, c.dep_hotel_id, c.dep_con_private_jet, c.arrival_flight_data, c.departure_flight_date,arrfna.flight_name AS arr_flight_name,
arrfno.flightn_name AS arr_flight_number,
arrfti.flightt_name AS arr_flight_time,
arrhot.hotel_name AS arr_hotel_name,
depfna.flight_name AS dep_flight_name,
depfno.flightn_name AS dep_flight_number,
depfti.flightt_name AS dep_flight_time,
dephot.hotel_name AS dep_hotel_name
FROM 
contacts AS c 
LEFT OUTER JOIN flight_info AS arrfna ON c.arr_flight_id = arrfna.flight_id
LEFT OUTER JOIN flight_no AS arrfno ON c.arr_flightn_id = arrfno.flightn_id
LEFT OUTER JOIN flight_time AS arrfti ON c.arr_flightt_id = arrfti.flightt_id
LEFT OUTER JOIN hotel_info AS arrhot ON c.arr_hotel_id = arrhot.hotel_id
LEFT OUTER JOIN flight_info AS depfna ON c.dep_flight_id = depfna.flight_id
LEFT OUTER JOIN flight_no AS depfno ON c.dep_flightn_id = depfno.flightn_id
LEFT OUTER JOIN flight_time AS depfti ON c.dep_flightt_id = depfti.flightt_id
LEFT OUTER JOIN hotel_info AS dephot ON c.dep_hotel_id = dephot.hotel_id
WHERE c.departure_flight_date LIKE '".$_SESSION['arr_dep_date']."%' AND c.dep_flight_id='4' ORDER BY c.dep_flightn_id
";
                                    $limit1 = $_SESSION['limit_of_rec'];
                                    $start1 = $p->findStart($limit1);
                                    $count1 = mysql_num_rows(mysql_query($Query1));
                                    $pages1 = $p->findPages($count1, $limit1);
                                    $rs1 = mysql_query($Query1 . " LIMIT " . $start1 . ", " . $limit1);
                                    if (mysql_num_rows($rs1) > 0) {
                                        while ($row1 = mysql_fetch_object($rs1)) {
                                            $counter1++;
                                ?>
                                            <?php if($counter1==1){ ?>
                                                <h3><?php echo '&nbsp; &nbsp; '.$row1->dep_flight_time;?></h3>
                                            <?php }?>        
                                            <?php
                                                echo '<br/><br/> &nbsp; &nbsp; &nbsp; &nbsp; '.$row1->ContactFirstName.' '.$row1->ContactLastName.' '.(($row1->con_flight_comments!='')?', '.$row1->con_flight_comments:'');
                                            ?>
                                <?php
                                        }
                                    }
                                ?>
          
                                                        
                                <h4><strong>Private Jet</strong></h4>                     
                                <?php
                                    $counter1 = 0;
                                    $dynmvar = 0;
                                    $Query1 = "
SELECT 
c.ContactID, c.ContactFirstName, c.ContactLastName, c.con_flight_comments, c.arr_flight_id, c.arr_flightn_id, c.arr_flightt_id, c.arr_hotel_id, c.arr_con_private_jet, c.dep_flight_id, c.dep_flightn_id, c.dep_flightt_id, c.dep_hotel_id, c.dep_con_private_jet, c.arrival_flight_data, c.departure_flight_date,arrfna.flight_name AS arr_flight_name,
arrfno.flightn_name AS arr_flight_number,
arrfti.flightt_name AS arr_flight_time,
arrhot.hotel_name AS arr_hotel_name,
depfna.flight_name AS dep_flight_name,
depfno.flightn_name AS dep_flight_number,
depfti.flightt_name AS dep_flight_time,
dephot.hotel_name AS dep_hotel_name
FROM 
contacts AS c 
LEFT OUTER JOIN flight_info AS arrfna ON c.arr_flight_id = arrfna.flight_id
LEFT OUTER JOIN flight_no AS arrfno ON c.arr_flightn_id = arrfno.flightn_id
LEFT OUTER JOIN flight_time AS arrfti ON c.arr_flightt_id = arrfti.flightt_id
LEFT OUTER JOIN hotel_info AS arrhot ON c.arr_hotel_id = arrhot.hotel_id
LEFT OUTER JOIN flight_info AS depfna ON c.dep_flight_id = depfna.flight_id
LEFT OUTER JOIN flight_no AS depfno ON c.dep_flightn_id = depfno.flightn_id
LEFT OUTER JOIN flight_time AS depfti ON c.dep_flightt_id = depfti.flightt_id
LEFT OUTER JOIN hotel_info AS dephot ON c.dep_hotel_id = dephot.hotel_id
WHERE c.departure_flight_date LIKE '".$_SESSION['arr_dep_date']."%' AND c.dep_flight_id='3' ORDER BY c.dep_flightn_id
";
                                    $limit1 = $_SESSION['limit_of_rec'];
                                    $start1 = $p->findStart($limit1);
                                    $count1 = mysql_num_rows(mysql_query($Query1));
                                    $pages1 = $p->findPages($count1, $limit1);
                                    $rs1 = mysql_query($Query1 . " LIMIT " . $start1 . ", " . $limit1);
                                    if (mysql_num_rows($rs1) > 0) {
                                        while ($row1 = mysql_fetch_object($rs1)) {
                                            $counter1++;
                                ?>
                                            <?php if($counter1==1){ ?>
                                                <h3><?php echo '&nbsp; &nbsp; '.$row1->dep_flight_time;?></h3>
                                            <?php }?>        
                                            <?php
                                                echo '<br/><br/> &nbsp; &nbsp; &nbsp; &nbsp; '.$row1->ContactFirstName.' '.$row1->ContactLastName.' '.(($row1->con_flight_comments!='')?', '.$row1->con_flight_comments:'');
                                            ?>
                                <?php
                                        }
                                    }
                                ?>

                                                        
                                <h4><strong>Ferry/Alaska Marine Highway</strong></h4>                     
                                <?php
                                    $counter1 = 0;
                                    $dynmvar = 0;
                                    $Query1 = "
SELECT 
c.ContactID, c.ContactFirstName, c.ContactLastName, c.con_flight_comments, c.arr_flight_id, c.arr_flightn_id, c.arr_flightt_id, c.arr_hotel_id, c.arr_con_private_jet, c.dep_flight_id, c.dep_flightn_id, c.dep_flightt_id, c.dep_hotel_id, c.dep_con_private_jet, c.arrival_flight_data, c.departure_flight_date,arrfna.flight_name AS arr_flight_name,
arrfno.flightn_name AS arr_flight_number,
arrfti.flightt_name AS arr_flight_time,
arrhot.hotel_name AS arr_hotel_name,
depfna.flight_name AS dep_flight_name,
depfno.flightn_name AS dep_flight_number,
depfti.flightt_name AS dep_flight_time,
dephot.hotel_name AS dep_hotel_name
FROM 
contacts AS c 
LEFT OUTER JOIN flight_info AS arrfna ON c.arr_flight_id = arrfna.flight_id
LEFT OUTER JOIN flight_no AS arrfno ON c.arr_flightn_id = arrfno.flightn_id
LEFT OUTER JOIN flight_time AS arrfti ON c.arr_flightt_id = arrfti.flightt_id
LEFT OUTER JOIN hotel_info AS arrhot ON c.arr_hotel_id = arrhot.hotel_id
LEFT OUTER JOIN flight_info AS depfna ON c.dep_flight_id = depfna.flight_id
LEFT OUTER JOIN flight_no AS depfno ON c.dep_flightn_id = depfno.flightn_id
LEFT OUTER JOIN flight_time AS depfti ON c.dep_flightt_id = depfti.flightt_id
LEFT OUTER JOIN hotel_info AS dephot ON c.dep_hotel_id = dephot.hotel_id
WHERE c.departure_flight_date LIKE '".$_SESSION['arr_dep_date']."%' AND c.dep_flight_id='2' ORDER BY c.dep_flightn_id
";
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
                                                    $dynmvar = $row1->dep_flightn_id;
                                                }
                                                if($dynmvar == $row1->dep_flightn_id){
                                                    if($counter1==1){
                                                        echo '<h3>&nbsp; &nbsp; &nbsp; &nbsp; '.$row1->dep_flight_time.'</h3>';
                                            ?>
                                            <?php
                                                    }
                                            ?>
                                                        <?php echo '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; '.$row1->ContactFirstName.' '.$row1->ContactLastName.' '.(($row1->con_flight_comments!='')?', '.$row1->con_flight_comments:'');?>
                                                        <br><br>
                                            <?php } else { 
                                                    echo '<h3>&nbsp; &nbsp; &nbsp; &nbsp; '.$row1->dep_flight_time.'</h3>';
                                                    echo '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; '.$row1->ContactFirstName.' '.$row1->ContactLastName.' '.(($row1->con_flight_comments!='')?', '.$row1->con_flight_comments:'');
                                            ?>
                                            <?php
                                                    $dynmvar = $row1->dep_flightn_id;
                                                  }
                                            ?>
                                <?php
                                        }
                                    }
                                ?>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                <br/><br/><br/><br/>                                        
                                <h3><strong>Arrivals</strong></h3>
                                <?php
                                    $counter1 = 0;
                                    $dynmvar = 0;
                                    $Query1 = "
SELECT 
c.ContactID, c.ContactFirstName, c.ContactLastName, c.con_flight_comments, c.arr_flight_id, c.arr_flightn_id, c.arr_flightt_id, c.arr_hotel_id, c.arr_con_private_jet, c.dep_flight_id, c.dep_flightn_id, c.dep_flightt_id, c.dep_hotel_id, c.dep_con_private_jet, c.arrival_flight_data, c.departure_flight_date,arrfna.flight_name AS arr_flight_name,
arrfno.flightn_name AS arr_flight_number,
arrfti.flightt_name AS arr_flight_time,
arrhot.hotel_name AS arr_hotel_name,
depfna.flight_name AS dep_flight_name,
depfno.flightn_name AS dep_flight_number,
depfti.flightt_name AS dep_flight_time,
dephot.hotel_name AS dep_hotel_name
FROM 
contacts AS c 
LEFT OUTER JOIN flight_info AS arrfna ON c.arr_flight_id = arrfna.flight_id
LEFT OUTER JOIN flight_no AS arrfno ON c.arr_flightn_id = arrfno.flightn_id
LEFT OUTER JOIN flight_time AS arrfti ON c.arr_flightt_id = arrfti.flightt_id
LEFT OUTER JOIN hotel_info AS arrhot ON c.arr_hotel_id = arrhot.hotel_id
LEFT OUTER JOIN flight_info AS depfna ON c.dep_flight_id = depfna.flight_id
LEFT OUTER JOIN flight_no AS depfno ON c.dep_flightn_id = depfno.flightn_id
LEFT OUTER JOIN flight_time AS depfti ON c.dep_flightt_id = depfti.flightt_id
LEFT OUTER JOIN hotel_info AS dephot ON c.dep_hotel_id = dephot.hotel_id
WHERE c.arrival_flight_data LIKE '".$_SESSION['arr_dep_date']."%' AND c.arr_flight_id='1' ORDER BY c.arr_flightn_id
";
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
                                                        if(!empty($row1->arr_flight_name)){
                                            ?>
                                                            <h3><?php echo '&nbsp; &nbsp; '.$row1->arr_flight_name;?></h3>
                                            <?php
                                                        }
                                                    }
                                                    if(!empty($row1->arr_flightn_id)){
                                                        if($counter1 == 1){
                                                            $dynmvar = $row1->arr_flightn_id;
                                                        }
                                                        if( $dynmvar == $row1->arr_flightn_id ){
                                                            echo '<br>';
                                                            echo '<br/>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; '.$row1->ContactFirstName.' '.$row1->ContactLastName.' '.(($row1->con_flight_comments!='')?', '.$row1->con_flight_comments:'');
                                                        } else {
                                                            $dynmvar = $row1->arr_flightn_id;
                                                            echo '<h3>&nbsp; &nbsp; &nbsp; &nbsp; '.$row1->arr_flight_time.'</h3>';
                                                            echo '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; '.$row1->ContactFirstName.' '.$row1->ContactLastName.' '.(($row1->con_flight_comments!='')?', '.$row1->con_flight_comments:'');
                                                        }
                                                    }
                                                    
                                            ?>
                                <?php
                                        }
                                    }
                                ?>
                                                        

                                <h4><strong>Hotel/B&B</strong></h4>
                                <?php
                                    $counter1 = 0;
                                    $dynmvar = 0;
                                    $Query1 = "
SELECT 
c.ContactID, c.ContactFirstName, c.ContactLastName, c.con_flight_comments, c.arr_flight_id, c.arr_flightn_id, c.arr_flightt_id, c.arr_hotel_id, c.arr_con_private_jet, c.dep_flight_id, c.dep_flightn_id, c.dep_flightt_id, c.dep_hotel_id, c.dep_con_private_jet, c.arrival_flight_data, c.departure_flight_date,arrfna.flight_name AS arr_flight_name,
arrfno.flightn_name AS arr_flight_number,
arrfti.flightt_name AS arr_flight_time,
arrhot.hotel_name AS arr_hotel_name,
depfna.flight_name AS dep_flight_name,
depfno.flightn_name AS dep_flight_number,
depfti.flightt_name AS dep_flight_time,
dephot.hotel_name AS dep_hotel_name
FROM 
contacts AS c 
LEFT OUTER JOIN flight_info AS arrfna ON c.arr_flight_id = arrfna.flight_id
LEFT OUTER JOIN flight_no AS arrfno ON c.arr_flightn_id = arrfno.flightn_id
LEFT OUTER JOIN flight_time AS arrfti ON c.arr_flightt_id = arrfti.flightt_id
LEFT OUTER JOIN hotel_info AS arrhot ON c.arr_hotel_id = arrhot.hotel_id
LEFT OUTER JOIN flight_info AS depfna ON c.dep_flight_id = depfna.flight_id
LEFT OUTER JOIN flight_no AS depfno ON c.dep_flightn_id = depfno.flightn_id
LEFT OUTER JOIN flight_time AS depfti ON c.dep_flightt_id = depfti.flightt_id
LEFT OUTER JOIN hotel_info AS dephot ON c.dep_hotel_id = dephot.hotel_id
WHERE c.arrival_flight_data LIKE '".$_SESSION['arr_dep_date']."%' AND c.arr_flight_id='4' ORDER BY c.arr_flightn_id
";
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
                                            ?>
                                                        <h3><?php echo '&nbsp; &nbsp; '.$row1->arr_flight_name;?></h3>
                                            <?php
                                                    }
                                                    //if(!empty($row1->arr_flightn_id)){
                                                        if($counter1 == 1){
                                                            $dynmvar = $row1->arr_flightn_id;
                                                        }
                                                        if( $dynmvar == $row1->arr_flightn_id ){
                                                            echo '<br>';
                                                            echo '<br/>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; '.$row1->ContactFirstName.' '.$row1->ContactLastName.' '.(($row1->con_flight_comments!='')?', '.$row1->con_flight_comments:'');
                                                        } else {
                                                            $dynmvar = $row1->arr_flightn_id;
                                                            echo '<h3>&nbsp; &nbsp; &nbsp; &nbsp; '.$row1->arr_flight_time.'</h3>';
                                                            echo '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; '.$row1->ContactFirstName.' '.$row1->ContactLastName.' '.(($row1->con_flight_comments!='')?', '.$row1->con_flight_comments:'');
                                                        }
                                                    //}
                                                    
                                            ?>
                                <?php
                                        }
                                    }
                                ?>

                                
                                <h4><strong>Private Jet</strong></h4>
                                <?php
                                    $counter1 = 0;
                                    $dynmvar = 0;
                                    $Query1 = "
SELECT 
c.ContactID, c.ContactFirstName, c.ContactLastName, c.con_flight_comments, c.arr_flight_id, c.arr_flightn_id, c.arr_flightt_id, c.arr_hotel_id, c.arr_con_private_jet, c.dep_flight_id, c.dep_flightn_id, c.dep_flightt_id, c.dep_hotel_id, c.dep_con_private_jet, c.arrival_flight_data, c.departure_flight_date,arrfna.flight_name AS arr_flight_name,
arrfno.flightn_name AS arr_flight_number,
arrfti.flightt_name AS arr_flight_time,
arrhot.hotel_name AS arr_hotel_name,
depfna.flight_name AS dep_flight_name,
depfno.flightn_name AS dep_flight_number,
depfti.flightt_name AS dep_flight_time,
dephot.hotel_name AS dep_hotel_name
FROM 
contacts AS c 
LEFT OUTER JOIN flight_info AS arrfna ON c.arr_flight_id = arrfna.flight_id
LEFT OUTER JOIN flight_no AS arrfno ON c.arr_flightn_id = arrfno.flightn_id
LEFT OUTER JOIN flight_time AS arrfti ON c.arr_flightt_id = arrfti.flightt_id
LEFT OUTER JOIN hotel_info AS arrhot ON c.arr_hotel_id = arrhot.hotel_id
LEFT OUTER JOIN flight_info AS depfna ON c.dep_flight_id = depfna.flight_id
LEFT OUTER JOIN flight_no AS depfno ON c.dep_flightn_id = depfno.flightn_id
LEFT OUTER JOIN flight_time AS depfti ON c.dep_flightt_id = depfti.flightt_id
LEFT OUTER JOIN hotel_info AS dephot ON c.dep_hotel_id = dephot.hotel_id
WHERE c.arrival_flight_data LIKE '".$_SESSION['arr_dep_date']."%' AND c.arr_flight_id='3' ORDER BY c.arr_flightn_id
";
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
                                            ?>
                                                        <h3><?php echo '&nbsp; &nbsp; '.$row1->arr_flight_name;?></h3>
                                            <?php
                                                    }
                                                    //if(!empty($row1->arr_flightn_id)){
                                                        if($counter1 == 1){
                                                            $dynmvar = $row1->arr_flightn_id;
                                                        }
                                                        if( $dynmvar == $row1->arr_flightn_id ){
                                                            echo '<br>';
                                                            echo '<br/>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; '.$row1->ContactFirstName.' '.$row1->ContactLastName.' '.(($row1->con_flight_comments!='')?', '.$row1->con_flight_comments:'');
                                                        } else {
                                                            $dynmvar = $row1->arr_flightn_id;
                                                            echo '<h3>&nbsp; &nbsp; &nbsp; &nbsp; '.$row1->arr_flight_time.'</h3>';
                                                            echo '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; '.$row1->ContactFirstName.' '.$row1->ContactLastName.' '.(($row1->con_flight_comments!='')?', '.$row1->con_flight_comments:'');
                                                        }
                                                    //}
                                                    
                                            ?>
                                <?php
                                        }
                                    }
                                ?>

                                                        
                                <h4><strong>Ferry/Alaska Marine Highway</strong></h4>
                                <?php
                                    $counter1 = 0;
                                    $dynmvar = 0;
                                    $Query1 = "
SELECT 
c.ContactID, c.ContactFirstName, c.ContactLastName, c.con_flight_comments, c.arr_flight_id, c.arr_flightn_id, c.arr_flightt_id, c.arr_hotel_id, c.arr_con_private_jet, c.dep_flight_id, c.dep_flightn_id, c.dep_flightt_id, c.dep_hotel_id, c.dep_con_private_jet, c.arrival_flight_data, c.departure_flight_date,arrfna.flight_name AS arr_flight_name,
arrfno.flightn_name AS arr_flight_number,
arrfti.flightt_name AS arr_flight_time,
arrhot.hotel_name AS arr_hotel_name,
depfna.flight_name AS dep_flight_name,
depfno.flightn_name AS dep_flight_number,
depfti.flightt_name AS dep_flight_time,
dephot.hotel_name AS dep_hotel_name
FROM 
contacts AS c 
LEFT OUTER JOIN flight_info AS arrfna ON c.arr_flight_id = arrfna.flight_id
LEFT OUTER JOIN flight_no AS arrfno ON c.arr_flightn_id = arrfno.flightn_id
LEFT OUTER JOIN flight_time AS arrfti ON c.arr_flightt_id = arrfti.flightt_id
LEFT OUTER JOIN hotel_info AS arrhot ON c.arr_hotel_id = arrhot.hotel_id
LEFT OUTER JOIN flight_info AS depfna ON c.dep_flight_id = depfna.flight_id
LEFT OUTER JOIN flight_no AS depfno ON c.dep_flightn_id = depfno.flightn_id
LEFT OUTER JOIN flight_time AS depfti ON c.dep_flightt_id = depfti.flightt_id
LEFT OUTER JOIN hotel_info AS dephot ON c.dep_hotel_id = dephot.hotel_id
WHERE c.arrival_flight_data LIKE '".$_SESSION['arr_dep_date']."%' AND c.arr_flight_id='2' ORDER BY c.arr_flightn_id
";
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
                                                    $dynmvar = $row1->arr_flightn_id;
                                                }
                                                if($dynmvar == $row1->arr_flightn_id){
                                                    if($counter1==1){
                                                        echo '<h3>&nbsp; &nbsp; &nbsp; &nbsp; '.$row1->arr_flight_time.'</h3>';
                                            ?>
                                            <?php
                                                    }
                                            ?>
                                                        <?php echo '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; '.$row1->ContactFirstName.' '.$row1->ContactLastName.' '.(($row1->con_flight_comments!='')?', '.$row1->con_flight_comments:'');?>
                                                        <br><br>
                                            <?php } else { 
                                                    echo '<h3>&nbsp; &nbsp; &nbsp; &nbsp; '.$row1->arr_flight_time.'</h3>';
                                                    echo '&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; '.$row1->ContactFirstName.' '.$row1->ContactLastName.' '.(($row1->con_flight_comments!='')?', '.$row1->con_flight_comments:'');
                                            ?>
                                            <?php
                                                    $dynmvar = $row1->arr_flightn_id;
                                                  }
                                            ?>    
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
                                        //contentHeight: 600,
                                        selectable: true,
                                        selectHelper: true,
                                        slotEventOverlap : false,
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
                                                                    //allDay: allDay
                                                                    allDay: false
                                                                },
                                                        true // make the event "stick"
                                                                );
                                                    }
                                                    calendar.fullCalendar('unselect');
                                                },
                                                events: <?php echo json_encode($return_array); ?>,
                                                //eventRender: function(event, element) { 
                                                   // element.find('.fc-event-title').append("<br/>" + event.description); 
                                                //} 
                                    });

                                });

</script>      





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
                                    
//                                    $(".datetimepicker").datepicker();
//                                    $('.datetimepicker').datepicker({
//                                        dateFormat: 'yy-mm-dd', 
//                                        firstDay: 1,
//                                        minDate: new Date(2014, 1-1, 25), 
//                                        maxDate: -1});
                                      //$(".datetimepicker").datepicker({dateFormat:'yy-mm-dd',minDate:'2014-09-10' ,maxDate:'2014-10-10'});
                                    $('.datetimepicker').datepicker({
                                        //startDate: '05/01/2014',
                                        //endDate: '05/20/2014'
                                        //startDate: '<?php echo @$_SESSION['pak_start']?>',
                                        //endDate: '<?php echo @$_SESSION['pak_end']?>'
                                    });
                                    //$('#calendar').fullCalendar({
                                       // contentHeight: 600
                                    //});







//
//var startDate = new Date('01/01/2014');
//var FromEndDate = new Date();
//var ToEndDate = new Date();
//
//ToEndDate.setDate(ToEndDate.getDate()+365);
//
//$('.datetimepicker').datepicker({
//
//    weekStart: 1,
//    startDate: '01/01/2014',
//    endDate: FromEndDate, 
//    autoclose: true
//})
//    .on('changeDate', function(selected){
//        startDate = new Date(selected.date.valueOf());
//        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
//        $('.to_date').datepicker('setStartDate', startDate);
//    }); 
//$('.to_date')
//    .datepicker({
//
//        weekStart: 1,
//        startDate: startDate,
//        endDate: ToEndDate,
//        autoclose: true
//    })
//    .on('changeDate', function(selected){
//        FromEndDate = new Date(selected.date.valueOf());
//        FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
//        $('.from_date').datepicker('setEndDate', FromEndDate);
//    });
//    
    
    
  
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
                                    $('#calendar').fullCalendar('option', 'contentHeight', 650);
                                    //$("#txtDate").datepicker({ minDate: 0, maxDate: '+1M', numberOfMonths:2 });
                                    //$('#calendar').fullCalendar({slotEventOverlap : false});
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

<style>
    .fc-agenda-slots td div{height: 250px;}
    #content .eo-fullcalendar tr td{
	padding:0px;
    }
</style>
