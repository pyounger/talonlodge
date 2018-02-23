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

?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="">
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


