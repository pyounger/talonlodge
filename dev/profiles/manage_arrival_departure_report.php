<?php
include ('includes/php_includes_top.php');

if ((isset($_REQUEST['arr_dep_date'])) && ($_REQUEST['arr_dep_date'] != '')) {
    $_SESSION['arr_dep_date'] = calendarDateConver4($_REQUEST['arr_dep_date']);
} else if (isset($_SESSION['arr_dep_date'])) {
    $_SESSION['arr_dep_date'] = $_SESSION['config_date1'];
} else {
    $_SESSION['arr_dep_date'] = $_SESSION['config_date1'];
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
        </div>
        <h3 class="page-header"> Arrival & Departure Report <?php if(isset($_SESSION['asch_start_date'])){?> - <a href="manage_arrival_departure_report_print.php" target="_blank" >Go to Printing Page</a><?php }?> <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b> Arrival & Departure  Report: </b> You can see Arrival & Departure Report here </p>
        </blockquote>
    </div>
</div>


    <!--
    <div class="row">
    <div class="col-md-12">
        <div class="panel panel-cascade">
            <div class="panel-heading text-primary">
                <h3 class="panel-title"><i class="fa fa-windows"></i> Room Assigning
                    <span class="pull-right" style="width:auto;">
                        <div style="float:right;">
                            <a href="<?php print($_SERVER['PHP_SELF'] . "?action=1"); ?>" title="Add New"><i class="fa fa-plus"></i> Add New </a>
                        </div>
                    </span>
                </h3>
            </div>
            <div class="panel-body ">
                <div class="ro">
                    <div class="col-mol-md-offset-2">
                        <form class="form-horizontal cascde-forms" method="post" action="<?php print($_SERVER['PHP_SELF']); ?>" name="frm" id="frm" >
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label">Package Arrival Date:</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" class="form-control form-cascade-control datetimepicker" value="<?php echo calendarDateConver2($_SESSION['pk_from']); ?>" id="pk_from" name="pk_from" style="width: 160px;" title="Date From " placeholder="Package Arrival Date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label">Select Room:</label>
                                <div class="col-lg-10 col-md-9">
                                    <select name="room_id" id="room_id" data-placeholder="Choose a Room..." class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2">
                                        <option value="0"> Show All </option>
    <?php echo FillSelected2("rooms",
            "room_id", "room_number", "room_title", @$_SESSION['room_id']); ?>
                                    </select>
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
    -->

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
                        
                        <div class="" style="padding-left: 20px;">
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
		//if($rw1->flight_id==1){
		if($rw1->flight_id==1 || $rw1->flight_id>4){
			//$rs2 = mysql_query("SELECT f.*, t.flightt_name FROM flight_no AS f LEFT OUTER JOIN flight_time AS t ON t.flightt_id=f.flightt_id WHERE f.flightn_status=2 ORDER BY STR_TO_DATE(t.flightt_name,'%h:%i %p')");
			$rs2 = mysql_query("SELECT f.*, t.flightt_name FROM flight_no AS f LEFT OUTER JOIN flight_time AS t ON t.flightt_id=f.flightt_id WHERE f.flightn_status=2 AND f.flight_id=".$rw1->flight_id." ORDER BY STR_TO_DATE(t.flightt_name,'%h:%i %p')");
			if(mysql_num_rows($rs2)>0){
				while($rw2=mysql_fetch_object($rs2)){
					//print('<h4 style="padding-left:80px;">'.$rw2->flightn_id.' - '. $rw2->flightn_name.'&nbsp;&nbsp;&nbsp;&nbsp;'.$rw2->flightt_id.'-'.$rw2->flightt_name.'</h4>');
					print('<h4 style="padding-left:80px;">'.$rw2->flightn_name.'&nbsp;&nbsp;&nbsp;&nbsp;'.$rw2->flightt_name.'</h4>');
					//print("SELECT * FROM contacts WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND arr_flight_id=1 AND arr_flightn_id='".$rw2->flightn_id."' AND arr_flightt_id='".$rw2->flightt_id."'<br>");
					//$rs3 = mysql_query("SELECT * FROM contacts WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND arr_flight_id=1 AND arr_flightn_id='".$rw2->flightn_id."' AND arr_flightt_id='".$rw2->flightt_id."'");
					//echo "SELECT * FROM contacts WHERE departure_flight_date='".$_SESSION['arr_dep_date']."' AND dep_flight_id='".$rw1->flight_id."' AND dep_flightn_id='".$rw2->flightn_id."'";
					//print("SELECT c.ContactFirstName, c.ContactLastName, g.GroupName, t.* FROM contacts AS c LEFT OUTER JOIN groups AS g ON c.grp_id=g.grp_id LEFT OUTER JOIN travel_info AS t ON t.cont_id=c.cont_id AND t.grp_id=g.grp_id WHERE c.departure_flight_date='".$_SESSION['arr_dep_date']."' AND c.dep_flight_id='".$rw1->flight_id."' AND c.dep_flightn_id='".$rw2->flightn_id."' AND c.grp_id>0");
					//$rs3 = mysql_query("SELECT c.*, g.GroupName FROM contacts AS c LEFT OUTER JOIN groups AS g ON c.grp_id=g.grp_id WHERE c.departure_flight_date='".$_SESSION['arr_dep_date']."' AND c.dep_flight_id='".$rw1->flight_id."' AND c.dep_flightn_id='".$rw2->flightn_id."' AND c.grp_id>0");
					$rs3 = mysql_query("SELECT gc.*, c.ContactFirstName, c.ContactLastName, g.GroupName, t.* FROM group_contacts AS gc LEFT OUTER JOIN contacts AS c ON c.ContactID=gc.ContactID LEFT OUTER JOIN groups AS g ON g.grp_id=gc.grp_id LEFT OUTER JOIN travel_info AS t ON t.cont_id=c.cont_id AND t.ContactID=c.ContactID AND t.grp_id=g.grp_id WHERE t.departure_flight_date='".$_SESSION['arr_dep_date']."' AND t.dep_flight_id='".$rw1->flight_id."' AND t.dep_flightn_id='".$rw2->flightn_id."'");
					if(mysql_num_rows($rs3)>0){
						while($rw3=mysql_fetch_object($rs3)){
							$flt_comments = "";
							if(!empty($rw3->con_flight_comments)){
								$flt_comments = ', '.$rw3->con_flight_comments;
							}
							print('<div style="padding-left:160px; font-size:16px; line-height:22px;">'.$rw3->ContactFirstName.' '.$rw3->ContactLastName.' - '.$rw3->GroupName.' '.$flt_comments.'</div>');
						}
					}		
			
				}
			}
		}
		elseif($rw1->flight_id==2){
			$rs2 = mysql_query("SELECT t.* FROM flight_time AS t WHERE t.flightt_status=3 ORDER BY STR_TO_DATE(t.flightt_name,'%h:%i %p')");
			if(mysql_num_rows($rs2)>0){
				while($rw2=mysql_fetch_object($rs2)){
					//print('<h4 style="padding-left:80px;">'.$rw2->flightt_name.'</h4>');
					//$rs3 = mysql_query("SELECT c.*, g.GroupName FROM contacts AS c LEFT OUTER JOIN groups AS g ON c.grp_id=g.grp_id WHERE c.departure_flight_date='".$_SESSION['arr_dep_date']."' AND c.dep_flight_id='".$rw1->flight_id."' AND ( c.dep_flightt_id='".$rw2->flightt_name."' OR c.dep_flightt_id='".$rw2->flightt_id."' ) ");
					$rs3 = mysql_query("SELECT gc.*, c.ContactFirstName, c.ContactLastName, g.GroupName, t.* FROM group_contacts AS gc LEFT OUTER JOIN contacts AS c ON c.ContactID=gc.ContactID LEFT OUTER JOIN groups AS g ON g.grp_id=gc.grp_id LEFT OUTER JOIN travel_info AS t ON t.cont_id=c.cont_id AND t.ContactID=c.ContactID AND t.grp_id=g.grp_id WHERE t.departure_flight_date='".$_SESSION['arr_dep_date']."' AND t.dep_flight_id='".$rw1->flight_id."' AND ( t.dep_flightt_id='".$rw2->flightt_name."' OR t.dep_flightt_id='".$rw2->flightt_id."' ) ");
					if(mysql_num_rows($rs3)>0){
						print('<h4 style="padding-left:80px;">'.$rw2->flightt_name.'</h4>');
						while($rw3=mysql_fetch_object($rs3)){
							$flt_comments = "";
							if(!empty($rw3->con_flight_comments)){
								$flt_comments = ', '.$rw3->con_flight_comments;
							}
							print('<div style="padding-left:160px; font-size:16px; line-height:22px;">'.$rw3->ContactFirstName.' '.$rw3->ContactLastName.' - '.$rw3->GroupName.' '.$flt_comments.'</div>');
						}
					}
				}
			}
		}
		elseif($rw1->flight_id==3){
			//$rs3 = mysql_query("SELECT * FROM contacts WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND arr_flight_id='".$rw1->flight_id."' AND dep_con_private_jet IS NOT NULL");
			//$rs3 = mysql_query("SELECT c.*, g.GroupName FROM contacts AS c LEFT OUTER JOIN groups AS g ON c.grp_id=g.grp_id WHERE c.departure_flight_date='".$_SESSION['arr_dep_date']."' AND c.dep_flight_id='".$rw1->flight_id."'");
			$rs3 = mysql_query("SELECT gc.*, c.ContactFirstName, c.ContactLastName, g.GroupName, t.* FROM group_contacts AS gc LEFT OUTER JOIN contacts AS c ON c.ContactID=gc.ContactID LEFT OUTER JOIN groups AS g ON g.grp_id=gc.grp_id LEFT OUTER JOIN travel_info AS t ON t.cont_id=c.cont_id AND t.ContactID=c.ContactID AND t.grp_id=g.grp_id WHERE t.departure_flight_date='".$_SESSION['arr_dep_date']."' AND t.dep_flight_id='".$rw1->flight_id."'");
			if(mysql_num_rows($rs3)>0){
				while($rw3=mysql_fetch_object($rs3)){
					$flt_comments = "";
					if(!empty($rw3->con_flight_comments)){
						$flt_comments = ', '.$rw3->con_flight_comments;
					}
					print('<h4 style="padding-left:80px;">'.$rw3->dep_con_private_jet.'</h4>');
					print('<div style="padding-left:160px; font-size:16px; line-height:22px;">'.$rw3->ContactFirstName.' '.$rw3->ContactLastName.' - '.$rw3->GroupName.' '.$flt_comments.'</div>');
				}
			}
		}
		elseif($rw1->flight_id==4){
			$rs2 = mysql_query("SELECT h.* FROM hotel_info AS h ORDER BY h.hotel_id");
			if(mysql_num_rows($rs2)>0){
				while($rw2=mysql_fetch_object($rs2)){
					//print('<h4 style="padding-left:80px;">'.$rw2->hotel_name.'</h4>');
					//$rs3 = mysql_query("SELECT c.*, g.GroupName FROM contacts AS c LEFT OUTER JOIN groups AS g ON g.grp_id=c.grp_id WHERE c.departure_flight_date='".$_SESSION['arr_dep_date']."' AND c.dep_flight_id='".$rw1->flight_id."' AND c.dep_hotel_id='".$rw2->hotel_id."'");
					$rs3 = mysql_query("SELECT gc.*, c.ContactFirstName, c.ContactLastName, g.GroupName, t.* FROM group_contacts AS gc LEFT OUTER JOIN contacts AS c ON c.ContactID=gc.ContactID LEFT OUTER JOIN groups AS g ON g.grp_id=gc.grp_id LEFT OUTER JOIN travel_info AS t ON t.cont_id=c.cont_id AND t.ContactID=c.ContactID AND t.grp_id=g.grp_id WHERE t.departure_flight_date='".$_SESSION['arr_dep_date']."' AND t.dep_flight_id='".$rw1->flight_id."' AND t.dep_hotel_id='".$rw2->hotel_id."'");
					if(mysql_num_rows($rs3)>0){
						print('<h4 style="padding-left:80px;">'.@$rw2->hotel_name.'</h4>');
						while($rw3=mysql_fetch_object($rs3)){
							$flt_comments = "";
							if(!empty($rw3->con_flight_comments)){
								$flt_comments = ', '.$rw3->con_flight_comments;
							}
							print('<div style="padding-left:160px; font-size:16px; line-height:22px;">'.$rw3->ContactFirstName.' '.$rw3->ContactLastName.' - '.$rw3->GroupName.' '.$flt_comments.'</div>');
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
		if($rw1->flight_id==1 || $rw1->flight_id>4){
			//$rs2 = mysql_query("SELECT f.*, t.flightt_name FROM flight_no AS f LEFT OUTER JOIN flight_time AS t ON t.flightt_id=f.flightt_id WHERE f.flightn_status=1 ORDER BY STR_TO_DATE(t.flightt_name,'%h:%i %p')");
			$rs2 = mysql_query("SELECT f.*, t.flightt_name FROM flight_no AS f LEFT OUTER JOIN flight_time AS t ON t.flightt_id=f.flightt_id WHERE f.flightn_status=1 AND f.flight_id=".$rw1->flight_id." ORDER BY STR_TO_DATE(t.flightt_name,'%h:%i %p')");
			if(mysql_num_rows($rs2)>0){
				while($rw2=mysql_fetch_object($rs2)){
					//print('<h4 style="padding-left:80px;">'.$rw2->flightn_id.' - '. $rw2->flightn_name.'&nbsp;&nbsp;&nbsp;&nbsp;'.$rw2->flightt_id.'-'.$rw2->flightt_name.'</h4>');
					print('<h4 style="padding-left:80px;">'.$rw2->flightn_name.'&nbsp;&nbsp;&nbsp;&nbsp;'.$rw2->flightt_name.'</h4>');
					//print("SELECT * FROM contacts WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND arr_flight_id=1 AND arr_flightn_id='".$rw2->flightn_id."' AND arr_flightt_id='".$rw2->flightt_id."'<br>");
					//$rs3 = mysql_query("SELECT * FROM contacts WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND arr_flight_id=1 AND arr_flightn_id='".$rw2->flightn_id."' AND arr_flightt_id='".$rw2->flightt_id."'");
					//$rs3 = mysql_query("SELECT c.*, g.GroupName FROM contacts AS c LEFT OUTER JOIN groups AS g ON g.grp_id=c.grp_id WHERE c.arrival_flight_data='".$_SESSION['arr_dep_date']."' AND c.arr_flight_id='".$rw1->flight_id."' AND c.arr_flightn_id='".$rw2->flightn_id."' AND c.grp_id>0");
					$rs3 = mysql_query("SELECT gc.*, c.ContactFirstName, c.ContactLastName, g.GroupName, t.* FROM group_contacts AS gc LEFT OUTER JOIN contacts AS c ON c.ContactID=gc.ContactID LEFT OUTER JOIN groups AS g ON g.grp_id=gc.grp_id LEFT OUTER JOIN travel_info AS t ON t.cont_id=c.cont_id AND t.ContactID=c.ContactID AND t.grp_id=g.grp_id WHERE t.arrival_flight_data='".$_SESSION['arr_dep_date']."' AND t.arr_flight_id='".$rw1->flight_id."' AND t.arr_flightn_id='".$rw2->flightn_id."'");
					if(mysql_num_rows($rs3)>0){
						while($rw3=mysql_fetch_object($rs3)){
							$flt_comments = "";
							if(!empty($rw3->con_flight_comments)){
								$flt_comments = ', '.$rw3->con_flight_comments;
							}
							print('<div style="padding-left:160px; font-size:16px; line-height:22px;">'.$rw3->ContactFirstName.' '.$rw3->ContactLastName.' - '.$rw3->GroupName.' '.
                                                                $flt_comments.'</div>');
						}
					}		
			
				}
			}
		}
		elseif($rw1->flight_id==2){
			$rs2 = mysql_query("SELECT t.* FROM flight_time AS t WHERE t.flightt_status=3 ORDER BY STR_TO_DATE(t.flightt_name,'%h:%i %p')");
			if(mysql_num_rows($rs2)>0){
				while($rw2=mysql_fetch_object($rs2)){
					//print('<h4 style="padding-left:80px;">'.$rw2->flightt_name.'</h4>');
					//$rs3 = mysql_query("SELECT c.*, g.GroupName FROM contacts AS c LEFT OUTER JOIN groups AS g ON c.grp_id=g.grp_id WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND arr_flight_id='".$rw1->flight_id."' AND ( c.arr_flightt_id='".$rw2->flightt_name."' OR c.arr_flightt_id='".$rw2->flightt_id."' ) ");
					$rs3 = mysql_query("SELECT gc.*, c.ContactFirstName, c.ContactLastName, g.GroupName, t.* FROM group_contacts AS gc LEFT OUTER JOIN contacts AS c ON c.ContactID=gc.ContactID LEFT OUTER JOIN groups AS g ON g.grp_id=gc.grp_id LEFT OUTER JOIN travel_info AS t ON t.cont_id=c.cont_id AND t.ContactID=c.ContactID AND t.grp_id=g.grp_id WHERE t.arrival_flight_data='".$_SESSION['arr_dep_date']."' AND t.arr_flight_id='".$rw1->flight_id."' AND ( t.arr_flightt_id='".$rw2->flightt_name."' OR t.arr_flightt_id='".$rw2->flightt_id."' ) ");
					if(mysql_num_rows($rs3)>0){
						print('<h4 style="padding-left:80px;">'.$rw2->flightt_name.'</h4>');
						while($rw3=mysql_fetch_object($rs3)){
							$flt_comments = "";
							if(!empty($rw3->con_flight_comments)){
								$flt_comments = ', '.$rw3->con_flight_comments;
							}
							print('<div style="padding-left:160px; font-size:16px; line-height:22px;">'.$rw3->ContactFirstName.' '.$rw3->ContactLastName.' - '.$rw3->GroupName.' '.$flt_comments.'</div>');
						}
					}
				}
			}
		}
		elseif($rw1->flight_id==3){
			//$rs3 = mysql_query("SELECT * FROM contacts WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND arr_flight_id='".$rw1->flight_id."' AND dep_con_private_jet IS NOT NULL");
			//$rs3 = mysql_query("SELECT c.*, g.GroupName FROM contacts AS c LEFT OUTER JOIN groups AS g ON c.grp_id=g.grp_id  WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND arr_flight_id='".$rw1->flight_id."'");
			$rs3 = mysql_query("SELECT gc.*, c.ContactFirstName, c.ContactLastName, g.GroupName, t.* FROM group_contacts AS gc LEFT OUTER JOIN contacts AS c ON c.ContactID=gc.ContactID LEFT OUTER JOIN groups AS g ON g.grp_id=gc.grp_id LEFT OUTER JOIN travel_info AS t ON t.cont_id=c.cont_id AND t.ContactID=c.ContactID AND t.grp_id=g.grp_id WHERE t.arrival_flight_data='".$_SESSION['arr_dep_date']."' AND t.arr_flight_id='".$rw1->flight_id."'");
			if(mysql_num_rows($rs3)>0){
				while($rw3=mysql_fetch_object($rs3)){
					$flt_comments = "";
					if(!empty($rw3->con_flight_comments)){
						$flt_comments = ', '.$rw3->con_flight_comments;
					}
					print('<h4 style="padding-left:80px;">'.$rw3->arr_con_private_jet.'</h4>');
					print('<div style="padding-left:160px; font-size:16px; line-height:22px;">'.$rw3->ContactFirstName.' '.$rw3->ContactLastName.' - '.$rw3->GroupName.' '.$flt_comments.'</div>');
				}
			}
		}
		elseif($rw1->flight_id==4){
			$rs2 = mysql_query("SELECT h.* FROM hotel_info AS h ORDER BY h.hotel_id");
			if(mysql_num_rows($rs2)>0){
				while($rw2=mysql_fetch_object($rs2)){
					//print('<h4 style="padding-left:80px;">'.$rw2->hotel_name.'</h4>');
					//$rs3 = mysql_query("SELECT c.*, g.GroupName FROM contacts AS c LEFT OUTER JOIN groups AS g ON c.grp_id=g.grp_id  WHERE arrival_flight_data='".$_SESSION['arr_dep_date']."' AND arr_flight_id='".$rw1->flight_id."' AND arr_hotel_id='".$rw2->hotel_id."'");
					$rs3 = mysql_query("SELECT gc.*, c.ContactFirstName, c.ContactLastName, g.GroupName, t.* FROM group_contacts AS gc LEFT OUTER JOIN contacts AS c ON c.ContactID=gc.ContactID LEFT OUTER JOIN groups AS g ON g.grp_id=gc.grp_id LEFT OUTER JOIN travel_info AS t ON t.cont_id=c.cont_id AND t.ContactID=c.ContactID AND t.grp_id=g.grp_id WHERE t.arrival_flight_data='".$_SESSION['arr_dep_date']."' AND t.arr_flight_id='".$rw1->flight_id."' AND t.arr_hotel_id='".$rw2->hotel_id."'");
					if(mysql_num_rows($rs3)>0){
						print('<h4 style="padding-left:80px;">'.@$rw2->hotel_name.'</h4>');
						while($rw3=mysql_fetch_object($rs3)){
							$flt_comments = "";
							if(!empty($rw3->con_flight_comments)){
								$flt_comments = ', '.$rw3->con_flight_comments;
							}
							print('<div style="padding-left:160px; font-size:16px; line-height:22px;">'.$rw3->ContactFirstName.' '.$rw3->ContactLastName.' - '.$rw3->GroupName.' '.$flt_comments.'</div>');
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


<!--
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
                                        selectable: true,
                                        selectHelper: true,
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
                                                                    allDay: allDay
                                                                },
                                                        true // make the event "stick"
                                                                );
                                                    }
                                                    calendar.fullCalendar('unselect');
                                                },
                                                events: <?php echo @json_encode($return_array); ?>
                                                                                                        });

                                                                                                        });

</script>      
-->




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
                                    $(".datetimepicker").datepicker();
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

                                    //$("#txtDate").datepicker({ minDate: 0, maxDate: '+1M', numberOfMonths:2 });

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
