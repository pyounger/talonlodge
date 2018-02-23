<?php
include("../lib/openCon.php");
include("../lib/functions.php");
$list = array();

$Food_alergy = '';
$Room = '';
$comma = '';
$Boat = '';
$Captain = '';
$Deckhand = '';
$Log = '';
$final_array = '';

$final_array = ' , , , , , , , , , , , , , , , , , '.',';
$final_array = trim($final_array);
$final_array = preg_replace('/\s+/', ' ', $final_array);
array_push($list, $final_array);

if((isset($_REQUEST['from_csv']))&&($_REQUEST['from_csv']!='')){
    $_SESSION['from_csv'] = calendarDateConver4($_REQUEST['from_csv']);
} else if(isset($_SESSION['from_csv'])){
} else {
    $_SESSION['from_csv'] = '2014-05-01';
}
if((isset($_REQUEST['to_csv']))&&($_REQUEST['to_csv']!='')){
    $_SESSION['to_csv'] = calendarDateConver4($_REQUEST['to_csv']);
} else if(isset($_SESSION['to_csv'])){
} else {
    $_SESSION['to_csv'] = '2014-05-30';
}
$Query = "SELECT
		p.Pms_Package_ID, p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, p.Package_Max_Days,
		g.grp_id, g.GroupName,
		c.ContactID, c.cont_fname, c.ContactFirstName, cont_lname, ContactLastName, cont_address1, Address1, cont_address2, Address2, c.cont_image, c.arrival_flight_data, cont_city, City, cont_state, State, cont_zip, ZIP, cont_phone1, Phone1, cont_email, Email, 
		cp.conp_id, cp.bootsize_id,
		j.jacketsize_name,
		mpd.menu_b, mpd.menu_l, mpd.menu_d
		FROM packages AS p 
		LEFT OUTER JOIN groups AS g ON p.Pms_Package_ID= g.Pms_Package_ID 
		LEFT OUTER JOIN contacts AS c ON g.grp_id=c.grp_id
		LEFT OUTER JOIN contact_profiles AS cp ON c.ContactID=cp.cont_id
		LEFT OUTER JOIN jacket_size AS j ON cp.jacketsize_id=j.jacketsize_id
		LEFT OUTER JOIN menu_default_pkg AS mpd ON p.Pms_Package_ID=mpd.pms_pak_id AND mpd.cont_id=0 
		WHERE 
		c.arrival_flight_data >= '". $_SESSION['from_csv'] ."' 
		AND c.arrival_flight_data <= '". $_SESSION['to_csv'] ."' 
		AND p.Arrival_Start_Date > '2014-05-01'  
		AND g.grp_id=c.grp_id
		AND g.GroupArrivalDate > '2014-05-01' 
		ORDER BY g.GroupName, c.ContactFirstName ";
		$counter99 = 0;
		$count = mysql_num_rows(mysql_query($Query));
		$rs = mysql_query($Query);
		if ($count > 0) {
			while ($row = mysql_fetch_object($rs)) {
				$Query33 = "SELECT
				cpd. cpd_id, cpd.question_id, q.question_field, cpd.cpd_answer
				FROM contact_profile_details AS cpd
				LEFT OUTER JOIN questions AS q ON cpd.question_id = q.question_id
				WHERE cpd.question_id IN (1,2) AND cpd.istrue = 'yes' AND cpd.cont_id=".$row->ContactID;
				$count33 = mysql_num_rows(mysql_query($Query33));
				$rs33 = mysql_query($Query33);
				$Food_alergy = '';
				$Room = '';
				$comma = '';
				$Boat = '';
				$Captain = '';
				$Deckhand = '';
				$Log = '';
				if ($count33 > 0) {
					while ($row33 = mysql_fetch_object($rs33)) {
						$Food_alergy = $row33->cpd_answer;
						$Food_alergy = @str_replace(',', ' - ', $Food_alergy);
					}
				}
				$day_counter = 0;
				$day_counter1 = 0;
				$date1 = '';
				$date1 = $_SESSION['from_csv']; 
				//returnName("Arrival_Start_Date", "packages", "Pms_Package_ID", $_REQUEST['pms_pak_id']);
				$days1 = '0';
				$date1 = strtotime($date1);
				$date1 = strtotime('-'.$days1.' day', $date1);
				$date1 = date('Y-m-d', $date1);
				$date1 = $date1.' 00:00:00';

				$date2 = '';
				$date2 = $_SESSION['to_csv']; 
				//returnName("Arrival_End_Date", "packages", "Pms_Package_ID", $_REQUEST['pms_pak_id']);
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

				$Query4 = "SELECT * FROM rooms ORDER BY room_title ASC";
					$nResult4 = mysql_query($Query4);
					if (mysql_num_rows($nResult4) >= 1) {
						while ($row4 = mysql_fetch_object($nResult4)) {
	                      $Query111 = "SELECT
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
							c.arrival_flight_data >= '". $_SESSION['from_csv'] ."' 
							AND c.arrival_flight_data <= '". $_SESSION['to_csv'] ."' 
							AND p.Arrival_Start_Date > '2014-05-01'  
							AND g.grp_id=c.grp_id
							AND g.GroupArrivalDate > '2014-05-01' 
							AND c.ContactID = ".$row->ContactID." 
							ORDER BY g.GroupName, c.ContactFirstName, c.ContactLastName "; 
							$counter = 0;
							$count111 = mysql_num_rows(mysql_query($Query111));
							$rs111 = mysql_query($Query111);
							if ($count111 > 0) {
								while ($row111 = mysql_fetch_object($rs111)) {

									$Query5=0;
									$count5=0;
									$count6=0;
									foreach( $room_dates as $romd ):
										$Query5 = "SELECT
										rr.roomr_id, rr.room_id, r.room_title

										FROM room_reservation AS rr 
										LEFT OUTER JOIN rooms AS r ON rr.room_id=r.room_id

										WHERE contact_id=" . $row111->ContactID . " 
										AND r.room_id=".$row4->room_id." 
										AND grp_id=" . $row111->grp_id . "
										AND Pms_Package_ID=" . $row111->Pms_Package_ID . "
										AND roomr_startdate= '" . $romd . "' ";
										$count5 = mysql_num_rows(mysql_query($Query5));
										if($count5!=0){
											$count6=1;
										}
									endforeach;    
							if($count6==1){
								$counter++;
								?>
								<?php if($counter==1){?>
                                <?php 
									$Room = returnName("room_title", "rooms", "room_id", $row4->room_id);
									$Room = @str_replace(',', ' - ', $Room);
								?>
                                <?php }?>
                                <?php 
							}
						}
					}
				}
			}
			$cont_id = array();
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
			LEFT OUTER JOIN act_new_boats AS anb ON anb.act_boat_id = acb.act_boat_id  
			LEFT OUTER JOIN act_boat_captain AS abcn ON  abcn.actboca_id = anb.actboca_id 
			LEFT OUTER JOIN act_boat_deckhand AS abdn ON  abdn.actbodh_id = anb.actbodh_id 
			LEFT OUTER JOIN act_boats AS acbn ON anb.act_boat_id  = acbn.act_boat_id
			LEFT OUTER JOIN contact_profiles AS cp ON asch.cont_id = cp.cont_id 
			LEFT OUTER JOIN contacts AS c ON asch.cont_id=c.ContactID 
			WHERE ((asch.act_boat_id != '' OR asch.act_id IN (2, 7, 11))) AND asch.cont_id = ".$row->ContactID."
			GROUP BY asch.act_boat_id 
			ORDER BY asch.act_boat_id DESC 
			";
			$count1 = mysql_num_rows(mysql_query($Query1));
			$rs1 = mysql_query($Query1);
			if ($count1 > 0) {
				while ($row1 = mysql_fetch_object($rs1)) {
					$counter1++;
					$Boat = $row1->act_boat_name;
					$Boat = @str_replace(',', ' - ', $Boat);
					
					$Captain = (($row1->new_caption!='')?$row1->new_caption:$row1->actboca_name);
					$Captain = @str_replace(',', ' - ', $Captain);
					
					$Deckhand = (($row1->new_deckhand!='')?$row1->new_deckhand:$row1->actbodh_name);
					$Deckhand = @str_replace(',', ' - ', $Deckhand);
				}
			}
			$Query22 = "
			SELECT 
			al.*, asch.asch_id 
			FROM 
			activity_logs AS al , 
			act_schedule AS asch
			WHERE
			al.asch_id = asch.asch_id 
			AND asch.cont_id = ".$row->ContactID." 
			";
			$count22 = mysql_num_rows(mysql_query($Query22));
			$rs22 = mysql_query($Query22);
			if ($count22 > 0) {
				while ($row22 = mysql_fetch_object($rs22)) {
					$Log = $row22->actl_details;
				}
			}
			
			$First_Name 	= @str_replace(',', ' - ', dbStr($row->ContactFirstName));
			$Last_Name 		= @str_replace(',', ' - ', dbStr($row->ContactLastName));
			$Group_Name 	= @str_replace(',', ' - ', dbStr($row->GroupName));
			$Arrival_Date	= (($row->arrival_flight_data=='0000-00-00 00:00:00')?'':calendarDateConver2($row->arrival_flight_data));
			$Address1 		= @str_replace(',', ' - ', dbStr($row->Address1));
			$Address2 		= @str_replace(',', ' - ', dbStr($row->Address2));
			$City 			= @str_replace(',', ' - ', dbStr($row->cont_city));
			$State 			= @str_replace(',', ' - ', dbStr($row->cont_state));
			$Zip 			= @str_replace(',', ' - ', dbStr($row->cont_zip));
			$Phone1 		= @str_replace(',', ' - ', dbStr($row->cont_phone1));
			$Email 			= @str_replace(',', ' - ', dbStr($row->cont_email));
			$Food_alergy 	= @str_replace(',', ' - ', dbStr($Food_alergy));
			$Room 			= @str_replace(',', ' - ', dbStr($Room));
			$Boat 			= @str_replace(',', ' - ', dbStr($Boat));
			$Captain 		= @str_replace(',', ' - ', dbStr($Captain));
			$Deckhand 		= @str_replace(',', ' - ', dbStr($Deckhand));
			$Log 			= @str_replace(',', ' - ', dbStr($Log));
			
            $final_array = "".$First_Name.','.$Last_Name.','.$Group_Name.','.$Arrival_Date.','.$Address1.','.$Address2.','.$City.','.$State.','.$Zip.','.$Phone1.','.$Email.',Medical'.','.$Food_alergy.','.$Room.','.$Boat.','.$Captain.','.$Deckhand.','.$Log."".',';
            $final_array = trim($final_array);
            $final_array = preg_replace( '/\s+/', ' ', $final_array);
            array_push($list, $final_array);
            $counter99++;
        }
    }
$filename = 'contacts.csv';
header('Content-Type: application/csv');
header('Content-Disposition: attachment;filename='.$filename);
$fp = fopen('php://output', 'w');
foreach ( $list as $line ) {
    $val = explode(",", $line);
    fputcsv($fp, $val);
}
fclose($fp);
exit();
?>