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
                                <h3>Date: <?php echo calendarDateConver2($_SESSION['arr_dep_date']);?></h3>
                                
                                
                                <h3><strong>Departures</strong></h3>
<?php
$rs1 = mysql_query("SELECT * FROM flight_info ORDER BY flight_id");
if(mysql_num_rows($rs1)>0){
	while($rw1=mysql_fetch_object($rs1)){
		$fltName = $rw1->flight_name;
		if($rw1->flight_id==2){
			$fltName = $rw1->flight_name." / Ferry";
		}
		print('<h3 style="padding-left:20px;">'.$fltName.'</h3>');
		if($rw1->flight_id==1){
			$rs2 = mysql_query("SELECT f.*, t.flightt_name FROM flight_no AS f LEFT OUTER JOIN flight_time AS t ON t.flightt_id=f.flightt_id WHERE f.flightn_status=2 ORDER BY f.flightt_id");
			if(mysql_num_rows($rs2)>0){
				while($rw2=mysql_fetch_object($rs2)){
					//print('<h4 style="padding-left:80px;">'.$rw2->flightn_id.' - '. $rw2->flightn_name.'&nbsp;&nbsp;&nbsp;&nbsp;'.$rw2->flightt_id.'-'.$rw2->flightt_name.'</h4>');
					print('<h4 style="padding-left:80px;">'.$rw2->flightn_name.'&nbsp;&nbsp;&nbsp;&nbsp;'.$rw2->flightt_name.'</h4>');
					//print("SELECT * FROM contacts WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND arr_flight_id=1 AND arr_flightn_id='".$rw2->flightn_id."' AND arr_flightt_id='".$rw2->flightt_id."'<br>");
					//$rs3 = mysql_query("SELECT * FROM contacts WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND arr_flight_id=1 AND arr_flightn_id='".$rw2->flightn_id."' AND arr_flightt_id='".$rw2->flightt_id."'");
					$rs3 = mysql_query("SELECT * FROM contacts WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND dep_flight_id='".$rw1->flight_id."' AND dep_flightn_id='".$rw2->flightn_id."'");
					if(mysql_num_rows($rs3)>0){
						while($rw3=mysql_fetch_object($rs3)){
							$flt_comments = "";
							if(!empty($rw3->con_flight_comments)){
								$flt_comments = ', '.$rw3->con_flight_comments;
							}
							print('<div style="padding-left:160px; font-size:16px; line-height:22px;">'.$rw3->ContactFirstName.' '.$rw3->ContactLastName.' '.$flt_comments.'</div>');
						}
					}		
			
				}
			}
		}
		elseif($rw1->flight_id==2){
			$rs2 = mysql_query("SELECT t.* FROM flight_time AS t WHERE t.flightt_status=3 ORDER BY t.flightt_name");
			if(mysql_num_rows($rs2)>0){
				while($rw2=mysql_fetch_object($rs2)){
					//print('<h4 style="padding-left:80px;">'.$rw2->flightt_name.'</h4>');
					$rs3 = mysql_query("SELECT * FROM contacts WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND dep_flight_id='".$rw1->flight_id."' AND dep_flightt_id='".$rw2->flightt_name."'");
					if(mysql_num_rows($rs3)>0){
						print('<h4 style="padding-left:80px;">'.$rw2->flightt_name.'</h4>');
						while($rw3=mysql_fetch_object($rs3)){
							$flt_comments = "";
							if(!empty($rw3->con_flight_comments)){
								$flt_comments = ', '.$rw3->con_flight_comments;
							}
							print('<div style="padding-left:160px; font-size:16px; line-height:22px;">'.$rw3->ContactFirstName.' '.$rw3->ContactLastName.' '.$flt_comments.'</div>');
						}
					}
				}
			}
		}
		elseif($rw1->flight_id==3){
			//$rs3 = mysql_query("SELECT * FROM contacts WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND arr_flight_id='".$rw1->flight_id."' AND dep_con_private_jet IS NOT NULL");
			$rs3 = mysql_query("SELECT * FROM contacts WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND dep_flight_id='".$rw1->flight_id."'");
			if(mysql_num_rows($rs3)>0){
				while($rw3=mysql_fetch_object($rs3)){
					$flt_comments = "";
					if(!empty($rw3->con_flight_comments)){
						$flt_comments = ', '.$rw3->con_flight_comments;
					}
					print('<h4 style="padding-left:80px;">'.$rw3->dep_con_private_jet.'</h4>');
					print('<div style="padding-left:160px; font-size:16px; line-height:22px;">'.$rw3->ContactFirstName.' '.$rw3->ContactLastName.' '.$flt_comments.'</div>');
				}
			}
		}
		elseif($rw1->flight_id==4){
			$rs2 = mysql_query("SELECT h.* FROM hotel_info AS h ORDER BY h.hotel_id");
			if(mysql_num_rows($rs2)>0){
				while($rw2=mysql_fetch_object($rs2)){
					//print('<h4 style="padding-left:80px;">'.$rw2->hotel_name.'</h4>');
					$rs3 = mysql_query("SELECT * FROM contacts WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND dep_flight_id='".$rw1->flight_id."' AND dep_hotel_id='".$rw2->hotel_id."'");
					if(mysql_num_rows($rs3)>0){
						print('<h4 style="padding-left:80px;">'.@$rw2->flightt_name.'</h4>');
						while($rw3=mysql_fetch_object($rs3)){
							$flt_comments = "";
							if(!empty($rw3->con_flight_comments)){
								$flt_comments = ', '.$rw3->con_flight_comments;
							}
							print('<div style="padding-left:160px; font-size:16px; line-height:22px;">'.$rw3->ContactFirstName.' '.$rw3->ContactLastName.' '.$flt_comments.'</div>');
						}
					}
				}
			}
		}
		else{
			
		}
	}
}
?>
                                                        
                                                        
                                                        
                                <br/><br/><br/><br/>                                        
                                <h3><strong>Arrivals</strong></h3>

<?php
$rs1 = mysql_query("SELECT * FROM flight_info ORDER BY flight_id");
if(mysql_num_rows($rs1)>0){
	while($rw1=mysql_fetch_object($rs1)){
		$fltName = $rw1->flight_name;
		if($rw1->flight_id==2){
			$fltName = $rw1->flight_name." / Ferry";
		}
		print('<h3 style="padding-left:20px;">'.$fltName.'</h3>');
		if($rw1->flight_id==1){
			$rs2 = mysql_query("SELECT f.*, t.flightt_name FROM flight_no AS f LEFT OUTER JOIN flight_time AS t ON t.flightt_id=f.flightt_id WHERE f.flightn_status=1 ORDER BY f.flightt_id");
			if(mysql_num_rows($rs2)>0){
				while($rw2=mysql_fetch_object($rs2)){
					//print('<h4 style="padding-left:80px;">'.$rw2->flightn_id.' - '. $rw2->flightn_name.'&nbsp;&nbsp;&nbsp;&nbsp;'.$rw2->flightt_id.'-'.$rw2->flightt_name.'</h4>');
					print('<h4 style="padding-left:80px;">'.$rw2->flightn_name.'&nbsp;&nbsp;&nbsp;&nbsp;'.$rw2->flightt_name.'</h4>');
					//print("SELECT * FROM contacts WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND arr_flight_id=1 AND arr_flightn_id='".$rw2->flightn_id."' AND arr_flightt_id='".$rw2->flightt_id."'<br>");
					//$rs3 = mysql_query("SELECT * FROM contacts WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND arr_flight_id=1 AND arr_flightn_id='".$rw2->flightn_id."' AND arr_flightt_id='".$rw2->flightt_id."'");
					$rs3 = mysql_query("SELECT * FROM contacts WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND arr_flight_id='".$rw1->flight_id."' AND arr_flightn_id='".$rw2->flightn_id."'");
					if(mysql_num_rows($rs3)>0){
						while($rw3=mysql_fetch_object($rs3)){
							$flt_comments = "";
							if(!empty($rw3->con_flight_comments)){
								$flt_comments = ', '.$rw3->con_flight_comments;
							}
							print('<div style="padding-left:160px; font-size:16px; line-height:22px;">'.$rw3->ContactFirstName.' '.$rw3->ContactLastName.' '.$flt_comments.'</div>');
						}
					}		
			
				}
			}
		}
		elseif($rw1->flight_id==2){
			$rs2 = mysql_query("SELECT t.* FROM flight_time AS t WHERE t.flightt_status=3 ORDER BY t.flightt_name");
			if(mysql_num_rows($rs2)>0){
				while($rw2=mysql_fetch_object($rs2)){
					//print('<h4 style="padding-left:80px;">'.$rw2->flightt_name.'</h4>');
					$rs3 = mysql_query("SELECT * FROM contacts WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND arr_flight_id='".$rw1->flight_id."' AND arr_flightt_id='".$rw2->flightt_name."'");
					if(mysql_num_rows($rs3)>0){
						print('<h4 style="padding-left:80px;">'.$rw2->flightt_name.'</h4>');
						while($rw3=mysql_fetch_object($rs3)){
							$flt_comments = "";
							if(!empty($rw3->con_flight_comments)){
								$flt_comments = ', '.$rw3->con_flight_comments;
							}
							print('<div style="padding-left:160px; font-size:16px; line-height:22px;">'.$rw3->ContactFirstName.' '.$rw3->ContactLastName.' '.$flt_comments.'</div>');
						}
					}
				}
			}
		}
		elseif($rw1->flight_id==3){
			//$rs3 = mysql_query("SELECT * FROM contacts WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND arr_flight_id='".$rw1->flight_id."' AND dep_con_private_jet IS NOT NULL");
			$rs3 = mysql_query("SELECT * FROM contacts WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND arr_flight_id='".$rw1->flight_id."'");
			if(mysql_num_rows($rs3)>0){
				while($rw3=mysql_fetch_object($rs3)){
					$flt_comments = "";
					if(!empty($rw3->con_flight_comments)){
						$flt_comments = ', '.$rw3->con_flight_comments;
					}
					print('<h4 style="padding-left:80px;">'.$rw3->arr_con_private_jet.'</h4>');
					print('<div style="padding-left:160px; font-size:16px; line-height:22px;">'.$rw3->ContactFirstName.' '.$rw3->ContactLastName.' '.$flt_comments.'</div>');
				}
			}
		}
		elseif($rw1->flight_id==4){
			$rs2 = mysql_query("SELECT h.* FROM hotel_info AS h ORDER BY h.hotel_id");
			if(mysql_num_rows($rs2)>0){
				while($rw2=mysql_fetch_object($rs2)){
					//print('<h4 style="padding-left:80px;">'.$rw2->hotel_name.'</h4>');
					$rs3 = mysql_query("SELECT * FROM contacts WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND arr_flight_id='".$rw1->flight_id."' AND arr_hotel_id='".$rw2->hotel_id."'");
					if(mysql_num_rows($rs3)>0){
						print('<h4 style="padding-left:80px;">'.@$rw2->flightt_name.'</h4>');
						while($rw3=mysql_fetch_object($rs3)){
							$flt_comments = "";
							if(!empty($rw3->con_flight_comments)){
								$flt_comments = ', '.$rw3->con_flight_comments;
							}
							print('<div style="padding-left:160px; font-size:16px; line-height:22px;">'.$rw3->ContactFirstName.' '.$rw3->ContactLastName.' '.$flt_comments.'</div>');
						}
					}
				}
			}
		}
		else{
			
		}
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


