<?php include ('includes/php_includes_top.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Talon Lodge Fish Processing Report - <?php echo date("Y-m-d Hi A"); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap-modal-bs3fix.css" rel="stylesheet" type="text/css">
        <link href="less/style.less" rel="stylesheet"  title="lessCss" id="lessCss">
        <link href="less/style.less" rel="stylesheet"  title="lessCss" id="lessCss">
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/jquery.periodpicker.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="favicon.ico">

        <link href="css/chosen.css" rel="stylesheet" type="text/css">

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <![endif]-->
        <script language="javascript">
            function setAll() {
                if (frm.chkAll.checked == true) {
                    checkAll("frm", "chkstatus[]");
                }
                else {
                    clearAll("frm", "chkstatus[]");
                }
            }
            function checkAll(TheForm, Field) {
                var obj = document.forms[TheForm].elements[Field];
                if (obj.length > 0) {
                    for (var i = 0; i < obj.length; i++) {
                        obj[i].checked = true;
                    }
                }
                else {
                    obj.checked = true;
                }
            }
            function clearAll(TheForm, Field) {
                var obj = document.forms[TheForm].elements[Field];
                if (obj.length > 0) {
                    for (var i = 0; i < obj.length; i++) {
                        obj[i].checked = false;
                    }
                }
                else {
                    obj.checked = false;
                }
            }
        </script>
    </head>
    <body>
       
                
        <div>
            <div class="col-md-12">
               
                        <h3 ><i class="fa fa-glass"></i> Talon Lodge Fish Processing Report
                           
                        </h3>
                    </div>
                   
                        <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
        <?php
        $Query99 = "SELECT p.* FROM packages AS p WHERE p.Pms_Package_ID = ".$_REQUEST['pms_pak_id']." ORDER BY p.Arrival_Start_Date ASC";
        $counter99 = 0;
        $count99 = mysql_num_rows(mysql_query($Query99));
        $rs99 = mysql_query($Query99);
        if ($count99 > 0) {
            while ($row99 = mysql_fetch_object($rs99)) {
                $counter99++;
                    echo '<table style="vertical-align:top; text-align: left;" width="100%" >';
                        echo '<tr>';
                            echo '<th style="vertical-align:top; text-align: left;" >';
                                echo '<div style="padding-left:2%; text-align: left;">'.$row99->Package_Name.', '.calendarDateConver2($row99->Arrival_Start_Date).', '.calendarDateConver2($row99->Arrival_End_Date).'</div>';
                            echo '</th>';
                        echo '</tr>';
                    echo '</table>';

                                                                        
                                                                        
                                        echo '<table class="table users-table table-condensed table-hover table-striped display dataTable" style="vertical-align:top; text-align: left;" width="100%">';
                ?>
                                                    <?php
                                                        $Query88 = " 
                                                        SELECT
                                                        p.Pms_Package_ID, p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, p.Package_Max_Days,
                                                        g.grp_id, g.GroupName,
                                                        c.ContactID, c.ContactFirstName, c.ContactLastName, c.cont_image,
                                                        cp.conp_id, cp.bootsize_id,
                                                        j.jacketsize_name
                                                        FROM packages AS p 
                                                        LEFT OUTER JOIN groups AS g ON p.Pms_Package_ID= g.Pms_Package_ID 
                                                        LEFT OUTER JOIN contacts AS c ON g.grp_id=c.grp_id
                                                        LEFT OUTER JOIN contact_profiles AS cp ON c.ContactID=cp.cont_id
                                                        LEFT OUTER JOIN jacket_size AS j ON cp.jacketsize_id=j.jacketsize_id
                                                        WHERE p.Pms_Package_ID = ".$row99->Pms_Package_ID." 
                                                        AND g.GroupArrivalDate!='0000-00-00'    
                                                        GROUP BY g.grp_id 
                                                        ORDER BY g.GroupName ASC  ";
                                                        
                                                        //echo $Query88;
                                                        
                                                        $count88 = mysql_num_rows(mysql_query($Query88));
                                                        $rs88 = mysql_query($Query88);
                                                        if ($count88 > 0) {
                                                            while ($row88 = mysql_fetch_object($rs88)) {
                                                                echo '<tr>';
                                                                    //echo '<th style="vertical-align:top; text-align: left;" >';
                                                                        echo '<td style="vertical-align:top; padding-left:5%; padding-top:10px; text-align: left;" class="visible-xs visible-sm visible-md visible-lg">';
//                                                                            echo $row88->GroupName." - <a href=manage_fishing_group_report_print.php?pms_pak_id=".$row99->Pms_Package_ID."&grp_id=".$row88->grp_id." target='_blank'>Report</a>";
                                                        ?>                    
                                                                            
                                                                            
                            

                                                                            
<div style="page-break-before:always;">
    <div class="col-md-12">
        <div class="panel panel-cascade">
            <div class="panel-heading text-primary">
                <h2 class="panel-title"><i class="fa fa-windows"></i>
                    <?php
                        $Query = "SELECT
                        g.GroupName,
                        p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, p.Package_Max_Days
                        FROM groups AS g, packages AS p
                        WHERE 
                        g.grp_id=" . $row88->grp_id . " AND 
                        p.Pms_Package_ID=" . $row99->Pms_Package_ID . "  LIMIT 1";
                        $nResult = mysql_query($Query);
                        if (mysql_num_rows($nResult) >= 1) {
                            while ($row = mysql_fetch_row($nResult)) {
                                echo $row[0];
                            }
                        }
                    ?>
                </h2>
            </div>
            <div class="panel-body ">
                <div class="ro">
                    <div class="col-mol-md-offset-2">
                        <form class="form-horizontal cascde-forms" method="post" action="<?php print($_SERVER['PHP_SELF']); ?>" name="frm" id="frm" >
                               
                            <div>
			
			<table class="table users-table table-condensed table-hover table-striped display dataTable" style="vertical-align:top; text-align: left;" width="100%">
			<thead>
			<tr>
			<th class="visible-xs visible-sm visible-md visible-lg"  style="vertical-align:top; text-align: left;">Species</th>
			
			<?php
				$insSplit = $insSpecials = $arrRowTotal = array();
				$columnCount = 0;
				$day_counter = 0;
				$day_counter1 = 0;
				$date1 = '';
				$date1 = returnName("Arrival_Start_Date", "packages", "Pms_Package_ID", $row99->Pms_Package_ID);
				$days1 = '0';
				$date1 = strtotime($date1);
				$date1 = strtotime('-' . $days1 . ' day', $date1);
				$date1 = date('Y-m-d', $date1);
				$date1 = $date1 . ' 00:00:00';
				$date2 = '';
				$date2 = returnName("Arrival_End_Date", "packages", "Pms_Package_ID", $row99->Pms_Package_ID);
				$days2 = '2';
				$date2 = strtotime($date2);
				$date2 = strtotime('+' . $days2 . ' day', $date2);
				$date2 = date('Y-m-d', $date2);
				$date2 = $date2 . ' 00:00:00';
				$begin = new DateTime($date1);
				$end = new DateTime($date2);
				$interval = DateInterval::createFromDateString('1 day');
				$period = new DatePeriod($begin, $interval, $end);
				$no_of_days = diffindates($date1, $date2);
				foreach ($period as $dt):
				    $day_counter++;
				    if ($no_of_days != $day_counter) {
				        if ($day_counter != 1) {
				            if ($no_of_days == $day_counter) {
				                 //echo '<br/>'.$dt->format( "m/d/Y" );
				            } else {
				                if ($no_of_days != (1 + $day_counter)) {
				                    $day_counter1++;
				                    //echo 'Night ' . $day_counter1 . '<br/>' . $dt->format("m/d/Y");
				                }
				            }
				        } else {
				            $day_counter1++;
				            //echo 'Night ' . $day_counter1 . '<br/>' . $dt->format("m/d/Y");
				        }
				        if (($day_counter - $day_counter1) == 1) {
				            //echo '<br/>' . $dt->format("m/d/Y");
				        }
				        if($day_counter1>1 && $day_counter1==$day_counter){
							$columnCount++;
				            echo '<th class="visible-xs visible-sm visible-md visible-lg" style="vertical-align:top; text-align: left;" >';
				                echo 'Day '.($day_counter1-1).'<br/>'.$dt->format( "m/d/Y" );
				            echo '</th>';
				        }
				        if($day_counter1 == 1){
				            //echo '<br/>'.$dt->format( "m/d/Y" );
				        }
				    }
				endforeach;
				?>
			<th class="visible-xs visible-sm visible-md visible-lg" style="vertical-align:top; text-align: left;">Total Fish Count</th>
			</tr>
			</thead>
			
			<tbody>
			<?php
				$gfrec_count = 0;
				$gfrec_weight = 0;
				$gfrec_recovery = 0;
				$gfrec_filets_weight = 0;
				$gfrec_split = 0;
				            
				            $counter = 0;
				            $count = 0;
				            $frec_count = 0;
				            $frec_weight = 0;
				            $frec_recovery = 0;
				            $frec_filets_weight = 0;
				
				            $Query = "
				            SELECT
				            fr.*, ft.ftype_name
				            FROM 
				            fish_record AS fr
				            LEFT OUTER JOIN fish_types AS ft ON fr.ftype_id=ft.ftype_id
				            WHERE 
				            fr.grp_id=" . $row88->grp_id . "
				            AND fr.pms_pak_id=" . $row99->Pms_Package_ID ." 
				            AND fr.frec_count > 0  
				            GROUP BY fr.ftype_id
				            ORDER BY fr.frec_date, ft.ftype_name
				            ";
				            $count = mysql_num_rows(mysql_query($Query));
				            $rs = mysql_query($Query);
				            if ($count > 0) {
				                while ($row = mysql_fetch_object($rs)) {
				                    $counter++;
				        ?>
			<tr>
			<th class="visible-xs visible-sm visible-md visible-lg" style="vertical-align:top; text-align: left;" >
			<?php 
				print($row->ftype_name);
				?>
			</th>
			
			<?php
				$day_counter = 0;
				$day_counter1 = 0;
				$date1 = '';
				$date1 = returnName("Arrival_Start_Date", "packages", "Pms_Package_ID", $row99->Pms_Package_ID);
				$days1 = '0';
				$date1 = strtotime($date1);
				$date1 = strtotime('-' . $days1 . ' day', $date1);
				$date1 = date('Y-m-d', $date1);
				$date1 = $date1 . ' 00:00:00';
				$date2 = '';
				$date2 = returnName("Arrival_End_Date", "packages", "Pms_Package_ID", $row99->Pms_Package_ID);
				$days2 = '2';
				$date2 = strtotime($date2);
				$date2 = strtotime('+' . $days2 . ' day', $date2);
				$date2 = date('Y-m-d', $date2);
				$date2 = $date2 . ' 00:00:00';
				$begin = new DateTime($date1);
				$end = new DateTime($date2);
				$interval = DateInterval::createFromDateString('1 day');
				$period = new DatePeriod($begin, $interval, $end);
				$no_of_days = diffindates($date1, $date2);
				foreach ($period as $dt):
				    $day_counter++;
				    if ($no_of_days != $day_counter) {
				        if ($day_counter != 1) {
				            if ($no_of_days == $day_counter) {
				                 
				            } else {
				                if ($no_of_days != (1 + $day_counter)) {
				                    $day_counter1++;
				                    
				                }
				            }
				        } else {
				            $day_counter1++;
				            
				        }
				        if($day_counter1>1 && $day_counter1==$day_counter){
							
				            echo '<td style="vertical-align:top; text-align: left;" >';
				                
				                $Query11 = "
				                SELECT SUM(fr.frec_count) AS total_rec FROM fish_record AS fr
				                WHERE 
				                fr.grp_id = " . $row88->grp_id . "
				                AND fr.pms_pak_id = " . $row99->Pms_Package_ID ." 
				                AND fr.frec_count > 0
				                AND fr.frec_date = '".$dt->format( "Y-m-d" )."'
				                AND fr.ftype_id = ".$row->ftype_id." ";
				                $count11 = mysql_query($Query11);
				                $row11 = mysql_fetch_object($count11);
				                echo $row11->total_rec;								
								$arrRowTotal[$day_counter1][$row->ftype_name] = intval($row11->total_rec);
				            echo '</td>';

							   $Query12 = "SELECT fr.frec_split FROM fish_record AS fr
				                                    WHERE 
				                                    fr.grp_id = " . $row88->grp_id . "
				                                    AND fr.pms_pak_id = " . $row99->Pms_Package_ID ." 
				                                    AND fr.cont_id != ''
				                                    AND fr.frec_date = '".$dt->format( "Y-m-d" )."'
				                                    LIMIT 1
				                                    ";
				                                    $res12 = mysql_query($Query12);
				                                    $total12 = mysql_num_rows($res12);
													if( $total12 > 0){
														$row12 = mysql_fetch_object($res12);
														if(!array_key_exists($day_counter1, $insSplit )){
															$insSplit[$day_counter1] = $row12->frec_split;
														}
													}
													
								$QuerySpecial = "    
				                                    SELECT fr.frec_special_ins FROM fish_record AS fr
				                                    WHERE 
				                                    fr.grp_id = " . $row88->grp_id . "
				                                    AND fr.pms_pak_id = " . $row99->Pms_Package_ID ." 
				                                    AND fr.cont_id != ''
				                                    AND fr.frec_date = '".$dt->format( "Y-m-d" )."'
				                                    LIMIT 1
				                                    ";
				                                    $resSpecial = mysql_query($QuerySpecial);
				                                    $totalSpecial = mysql_num_rows($resSpecial);
				                                    if($totalSpecial > 0){
				                                        $rowSpecial = mysql_fetch_object($resSpecial);
				                                        if(!array_key_exists($day_counter1, $insSpecials )){
															$insSpecials[$day_counter1] = $rowSpecial->frec_special_ins;
														}
				                                    }					
				        }
				        if (($day_counter - $day_counter1) == 1) {
				
				        }
				        if($day_counter1 == 1){
				           
				        }
				    }
									                                 
				endforeach;
				?>
				<th style="vertical-align:top; text-align: left;" >
			<?php 
				$Query11 = "
				SELECT SUM(fr.frec_count) AS total_rec FROM fish_record AS fr
				WHERE 
				fr.grp_id = " . $row88->grp_id . "
				AND fr.pms_pak_id = " . $row99->Pms_Package_ID ." 
				AND fr.frec_count > 0
				AND fr.ftype_id = ".$row->ftype_id." ";
				$count11 = mysql_query($Query11);
				$row11 = mysql_fetch_object($count11);
				echo $row11->total_rec;
				?>
			</th>			
			</tr>			
				<?php }}?>
			<tr>
			<th class="visible-xs visible-sm visible-md visible-lg"  style="vertical-align:top; text-align:left;">Total Species: <?php echo $count;?></th>
			<?php
				foreach($arrRowTotal as $k => $v){
					$count = 0;
					foreach($v as $key => $num){
						$count += $num;
					}
					echo '<th style="vertical-align:top; text-align: left;">'.$count.'</th>';
				}
				?>				
			<th>&nbsp;</th>
			</tr>
			<tr><th colspan="100">&nbsp;</th></tr>
			<tr>
			<th class="visible-xs visible-sm visible-md visible-lg"  style="vertical-align:top; text-align:left;">Split Instructions</th>
			<?php
				foreach($insSplit as $insSplit){
					echo '<th style="vertical-align:top; text-align: left;">'.$insSplit.'</th>';
				}
				?>				
			<th>&nbsp;</th>
			</tr>
			<tr>
			<th class="visible-xs visible-sm visible-md visible-lg"  style="vertical-align:top; text-align: left;">Special Instructions</th>
			<?php
				foreach($insSpecials as $insSpecial){
					echo '<th style="vertical-align:top; text-align: left;">'.wordwrap($insSpecial,25,"<br>\n").'</th>';
				}
				?>
			<th>&nbsp;</th>
			</tr>
			</tbody>			
			</table>
			<?php
			//$dynamicWidth = 100/($columnCount+2);
			?>
			<table class="table users-table table-condensed table-hover table-striped display dataTable" style="vertical-align:top; text-align: left;" width="100%">		
			<tr>
			<th class="visible-xs visible-sm visible-md visible-lg"  style="vertical-align:top; text-align: left;">Total Fish Count</th>
			<th style="vertical-align:top; text-align: left;">
			<?php
				$Query12 = "SELECT SUM(fr.frec_count) AS total_rec FROM fish_record AS fr WHERE 
				fr.grp_id = " . $row88->grp_id . "
				AND fr.pms_pak_id = " . $row99->Pms_Package_ID ." 
				AND fr.frec_count > 0";
				$res12 = mysql_query($Query12);
				$row12 = mysql_fetch_object($res12);
				echo $row12->total_rec;
			?>
			</th>			
			</tr>
			
			<tr>
			<th class="visible-xs visible-sm visible-md visible-lg"  style="vertical-align:top; text-align: left;">Average Weight of Filets</th>
			<th style="vertical-align:top; text-align: left;">
			<?php
				$Query12 = "SELECT SUM(fr.frec_filets_weight) AS total_rec FROM fish_record AS fr WHERE 
				fr.grp_id = " . $row88->grp_id . "
				AND fr.pms_pak_id = " . $row99->Pms_Package_ID ." 
				AND fr.frec_count > 0";
				$res12 = mysql_query($Query12);
				$row12 = mysql_fetch_object($res12);
				echo $row12->total_rec;
				echo ' / ';
				echo totalCounts(" DISTINCT cont_id", "fish_record", " grp_id = " . $row88->grp_id . " AND pms_pak_id = " . $row99->Pms_Package_ID ." AND cont_id != '' ");
				$avg_for_all_guests = ($row12->total_rec/totalCounts(" DISTINCT cont_id", "fish_record", " grp_id = " . $row88->grp_id . " AND pms_pak_id = " . $row99->Pms_Package_ID ." AND cont_id != '' "));
				?>
			</th>			
			</tr>
			
			<tr>
			<th class="visible-xs visible-sm visible-md visible-lg"  style="vertical-align:top; text-align: left;">Average for all Guests</th>
			<th style="vertical-align:top; text-align: left;">
			<?php echo round($avg_for_all_guests,2);?>
			</th>			
			</tr>
			</table>
			<!-- Our div-->
			</form>
			</div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div  >
    <table class="table users-table table-condensed table-hover table-striped display dataTable">
        <tr>
            <th>
                Guest
            </th>
            <th>
                Total for Guest
            </th>
            <th>
                Shipping Preference
            </th>
            <th>
                Flight/Shipping Info
            </th>
            <th>
                Special Instructions
            </th>
            <th>
                Smoked
            </th>
        </tr>
        <?php
            /*$Query77 = "
            SELECT 
            DISTINCT fr.cont_id  AS frcont_id, c.ContactID, c.ContactFirstName, c.ContactLastName, c.departure_flight_date, c.dep_flightn_id, dep.flightn_name, depft.flightt_name
            FROM fish_record AS fr
            LEFT OUTER JOIN contacts AS c ON fr.cont_id = c.ContactID
            LEFT OUTER JOIN flight_no AS dep ON c.dep_flightn_id = dep.flightn_id AND dep.flightn_status = 2 
            LEFT OUTER JOIN flight_time AS depft ON c.dep_flightt_id = depft.flightt_id AND depft.flightt_status = 2
            WHERE fr.grp_id = ".$row88->grp_id."
            AND fr.pms_pak_id = ".$row99->Pms_Package_ID." 
            AND fr.cont_id != '' 
            ORDER BY c.ContactFirstName ASC";*/
			$Query77 = "
            SELECT 
            DISTINCT fr.cont_id  AS frcont_id, c.cont_id, c.ContactID, c.ContactFirstName, c.ContactLastName, c.departure_flight_date, c.dep_flightn_id, dep.flightn_name, depft.flightt_name, fp.*
            FROM fish_record AS fr
            LEFT OUTER JOIN contacts AS c ON fr.cont_id = c.ContactID
            LEFT OUTER JOIN flight_no AS dep ON c.dep_flightn_id = dep.flightn_id AND dep.flightn_status = 2 
            LEFT OUTER JOIN flight_time AS depft ON c.dep_flightt_id = depft.flightt_id AND depft.flightt_status = 2
            LEFT JOIN fish_processing AS fp ON c.cont_id = fp.profile_id
            WHERE fr.grp_id = ".$row88->grp_id."
            AND fr.pms_pak_id = ".$row99->Pms_Package_ID." 
            AND fr.cont_id != '' 
            ORDER BY c.ContactFirstName ASC";
            $count77 = mysql_num_rows(mysql_query($Query77));
            if($count77>0){
                $rs77 = mysql_query($Query77);
                while($row77 = mysql_fetch_object($rs77)){
                    $total_per_person = 0;
                    
            //var_dump($row77);

        ?> 
        <tr>
            <th>
                <?php
                $url = "/profiles/manage_profile.php?action=2&cont_id=".$row77->cont_id."&contactid=".$row77->ContactID."&grp_id=".$row88->grp_id."#fish";
                    echo $row77->ContactFirstName.' '.$row77->ContactLastName. " <span class\"hidden-print\"><a href=\"$url\" target=\"_blank\"><i class=\"fa fa-edit\"></i></a></span>";
                ?>
            </th>
            <td  style="vertical-align:top; text-align: left;" >
                <?php
                

                
                    $day_counter = 0;
                    $day_counter1 = 0;
                    $date1 = '';
                    $date1 = returnName("Arrival_Start_Date", "packages", "Pms_Package_ID", $row99->Pms_Package_ID);
                    $days1 = '0';
                    $date1 = strtotime($date1);
                    $date1 = strtotime('-' . $days1 . ' day', $date1);
                    $date1 = date('Y-m-d', $date1);
                    $date1 = $date1 . ' 00:00:00';
                    $date2 = '';
                    $date2 = returnName("Arrival_End_Date", "packages", "Pms_Package_ID", $row99->Pms_Package_ID);
                    $days2 = '2';
                    $date2 = strtotime($date2);
                    $date2 = strtotime('+' . $days2 . ' day', $date2);
                    $date2 = date('Y-m-d', $date2);
                    $date2 = $date2 . ' 00:00:00';
                    $begin = new DateTime($date1);
                    $end = new DateTime($date2);
                    $interval = DateInterval::createFromDateString('1 day');
                    $period = new DatePeriod($begin, $interval, $end);
                    $no_of_days = diffindates($date1, $date2);
                    foreach ($period as $dt):
                        $day_counter++;
                        if ($no_of_days != $day_counter) {
                            if ($day_counter != 1) {
                                if ($no_of_days == $day_counter) {
                                     //echo '<br/>'.$dt->format( "m/d/Y" );
                                } else {
                                    if ($no_of_days != (1 + $day_counter)) {
                                        $day_counter1++;
                                        //echo 'Night ' . $day_counter1 . '<br/>' . $dt->format("m/d/Y");
                                    }
                                }
                            } else {
                                $day_counter1++;
                                //echo 'Night ' . $day_counter1 . '<br/>' . $dt->format("m/d/Y");
                            }
                            if($day_counter1>1 && $day_counter1==$day_counter){
                                //echo '<th class="visible-xs visible-sm visible-md visible-lg">';
                                    //echo 'Day '.($day_counter1-1).'<br/>'.$dt->format( "m/d/Y" );

                                    //echo '<br/><br/>';
                                    //echo 'ID:'.$row77->cont_id;
                                    $Query25 = "
                                    SELECT fr.*
                                    FROM fish_record AS fr
                                    WHERE  fr.cont_id = ".$row77->ContactID." AND fr.frec_date ='".$dt->format( "Y-m-d" )."' ";
                                    $count25 = mysql_num_rows(mysql_query($Query25));
                                    $rs25 = mysql_query($Query25);
                                    if ($count25 > 0) {
                                        while ($row25 = mysql_fetch_object($rs25)) {
                                            //echo '<br/>Processed<br/>',$dt->format( "Y-m-d" ).'<br/>'.$row77->ContactID;
                                        ?>
                


                
                

                                        <?php
                                            $split999 = '';
                                            $frec_filets_weight_count999 = 0.00;
                                            $counter_arr999 = 0;
                                            $counter999 = 0;
                                            $count999 = 0;
                                            $Query999 = "
                                            SELECT ft.*, fr.frec_count, fr.frec_weight, fr.frec_recovery, fr.frec_filets_weight, fr.frec_split
                                            FROM fish_types AS ft 
                                            LEFT OUTER JOIN fish_record AS fr ON ft.ftype_id = fr.ftype_id AND fr.grp_id = ".$row88->grp_id." AND fr.pms_pak_id = ".$row99->Pms_Package_ID." AND fr.frec_date =  '".$dt->format( "Y-m-d" )."'
                                            ORDER BY ft.ftype_name ASC
                                            ";
                                            $count999 = mysql_num_rows(mysql_query($Query999));
                                            $rs999 = mysql_query($Query999);
                                            if ($count999 > 0) {
                                                while ($row999 = mysql_fetch_object($rs999)) {
                                                    $counter999++;
                                                    $split999 = @returnName("frec_split", "fish_record", "grp_id", $row88->grp_id.' AND cont_id != "" AND frec_date = '."'".$dt->format( "Y-m-d" )."'");
                                                    if($split999 == ''){
                                                        $split999 = $row999->frec_split;
                                                    }
                                        ?>
<!--                                        <tr>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php print($row999->ftype_name); ?>
                                                <input type="hidden" name="ftype_id[]" value="<?php echo $row999->ftype_id; ?>">
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <input type="text" class="form-control form-cascade-control input_wid70" value="<?php  echo $row999->frec_count;//echo @$_REQUEST['frec_count'][$counter_arr]; //echo @$row->frec_count;?>" id="frec_count[]" name="frec_count[]">
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <input type="text" class="form-control form-cascade-control input_wid70" value="<?php 
                                                    if(isset($_REQUEST['add'])){
                                                        //echo $row999->ftype_weight;
                                                    } else {
                                                        //echo $row999->frec_weight; 
                                                    }
                                                    //echo @$row->ftype_weight;
                                                ?>" id="frec_weight[]" name="frec_weight[]">
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <input type="text" class="form-control form-cascade-control input_wid70" value="" id="frec_recovery[]" name="frec_recovery[]">
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <input type="text" class="form-control form-cascade-control input_wid70" value="<?php echo $row999->frec_filets_weight; //echo $frec_filets_weight[$counter_arr]; //echo @$row->frec_filets_weight;?>" id="frec_filets_weight[]" name="frec_filets_weight[]">-->
                                                <?php
                                                    //$frec_filets_weight_count += $frec_filets_weight[$counter_arr];
                                                    $frec_filets_weight_count999 += $row999->frec_filets_weight;;
                                                ?>

                                        <?php
                                                    $counter_arr999++;
                                                }
                                            }
                                        ?>

                                                    <?php 
                                                        //echo '<br/>';
                                                        //echo round(($frec_filets_weight_count999 / @$split999),2);
                                                        //echo '<br/>';
                                                        //echo '<br/>';
                                                        $total_per_person += round(($frec_filets_weight_count999 / @$split999),2);
                                                        //echo '<br/>';
                                                        
                                                    ?>

                
                
                                            
                                        <?php
                            
                                        }
                                    } else {
                                            //echo '<br/>Not Processed<br/>',$dt->format( "Y-m-d" ).'<br/>'.$row77->ContactID;
                                    }                        
                               
                            }
                            if (($day_counter - $day_counter1) == 1) {
                                //echo '<br/>' . $dt->format("m/d/Y");
                                //echo '<br/>2: ';
                                echo $total_per_person;
                                //echo '<br/>2: ';
                            }
                            if($day_counter1 == 1){
                            }
                        }
                    endforeach;
                
                
                ?>
            </td>
            <td  style="vertical-align:top; text-align: left;" >
                <?php
                    if ($row77->delivery_type_id > 0) {
                        
                        switch($row77->delivery_type_id) {
                            
                            case "1":
                                
                                echo "Carry On (Flight)";
                                break;
                            
                            case "2":
                                
                                echo "Ship via FedEx";
                                break;
                            
                            case "3":
                                
                                echo "Guest does not want fish";
                                break;
                            
                            case "4":
                                
                                echo "Consolidated Share with ... (see special instructions)";
                                break;
                            
                            default:
                                
                                echo "Preference not setup";
                                break;
                            
                        }
                        
                    } else {
                        
                        echo "Preference not setup";
                        
                    }
                ?>
            </td>
            <td  style="vertical-align:top; text-align: left;" >
                <?php
                
                
                //This may need to be expaned to be a switch in future... 
                
                if ($row77->delivery_type_id == "2") {
                    
                    $rsShipState = mysql_query("SELECT abbrev FROM states where id = '".$row77->shipping_state_id."' ");
                    $rowShipState = mysql_fetch_object($rsShipState);
                    
                    //SHIP VIA FEDEX.
                    echo "Name: <b>" . $row77->shipping_contact_name . "</b><br />";
                    echo "Address: <b>" . $row77->shipping_address1 . " ";
                    echo $row77->shipping_address2 . "<br />";
                    echo $row77->shipping_city . ", ";
                    if($rowShipState){
						echo $rowShipState->abbrev . " ";
					}
                    echo $row77->shipping_zip . "</b><br />";
                    echo "Phone: <b>" . $row77->shipping_contact_phone . "</b><br />";
					echo "Arrival Date: <b>" . calendarDateConver2($row77->shipping_arrival_date) . "</b><br />";
					echo "Tracking Number: <b>" . $row77->shipping_tracking_number . "</b><br />";
                    
                } else {
                    
                    //DISPLAY FLIGHT INFO.
                
                
                    echo "Departure Date: <b>" . calendarDateConver2($row77->departure_flight_date) . "</b><br />";
                    echo "Flight:  <b>".$row77->flightn_name . "</b><br />";
                    echo "Time: <b> ";
                    $rs1 = mysql_query("SELECT ft.flightt_name FROM flight_time AS ft LEFT OUTER JOIN flight_no AS fn ON fn.flightt_id = ft.flightt_id WHERE fn.flightn_name = '".$row77->flightn_name."' AND fn.flightn_status = '2'");
                    if(mysql_num_rows($rs1)>0){
                        while($rw1=mysql_fetch_object($rs1)){
							print($rw1->flightt_name);
                        }
                    }
                    echo "</b>";
                    }
                ?>
            </td>
            <td  style="vertical-align:top; text-align: left;" >
                <?php
                    if ($row77->special_instructions <> "") {
                        echo $row77->special_instructions."<br/>";
                    }
                   
                   
                ?>
            </td>
            <td  style="vertical-align:top; text-align: left;" >
                <?php
                   
                    if ($row77->smoked == "1") {
                        echo "<b>YES</b>";
                         if ($row77->smoking_instructions <> "") {
                            echo "<br />".$row77->smoking_instructions;
                        }
                    } elseif ($row77->smoked == "0") {
                        echo "<b>NO</b>";
                    } else {
                        echo "N/A";
                    }
                   
                ?>
            </td>
            
        </tr>
        <?php 
                }
            }
        ?>
    </table>    
</div>    
<hr/>


                            
                            
                                                                            
                                                    <?php   
                                                                        echo '</td>';
                                                                    //echo '</th>';
                                                                echo '</tr>';
                                                            }
                                                        }
                                                    ?>
                <?php
            }
        } else {
            //print('<tr><td colspan="100%" align="center">No record found!</td></tr>');
        }
                                                                echo '</table>';
        ?>
                        </form>
                    </div>
                
          