<?php include ('includes/php_includes_top.php');?>
        <div class="row">
            <div class="col-md-12">
                <div class="<?php print($class); ?>"><?php print($strMSG); ?></div>
                <div class="panel">
                    <div class="panel-heading text-primary">
                        <h3 class="panel-title"><i class="fa fa-glass"></i> Fishing Report for Company
                            <span class="pull-right" style="width:auto;">
                            </span> 
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
        <?php
        $Query99 = "SELECT p.* FROM packages AS p WHERE p.Arrival_Start_Date > '2014-05-01' AND p.Pms_Package_ID = ".$_REQUEST['pms_pak_id']." ORDER BY p.Arrival_Start_Date ASC";
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
                                                        WHERE p.Pms_Package_ID = ".$row99->Pms_Package_ID." AND p.Arrival_Start_Date > '2014-05-01' AND g.grp_id=c.grp_id
                                                        GROUP BY g.grp_id 
                                                        ORDER BY g.GroupName ASC  ";
                                                        
                                                        $count88 = mysql_num_rows(mysql_query($Query88));
                                                        $rs88 = mysql_query($Query88);
                                                        if ($count88 > 0) {
                                                            while ($row88 = mysql_fetch_object($rs88)) {
                                                                echo '<tr>';
                                                                    //echo '<th style="vertical-align:top; text-align: left;" >';
                                                                        echo '<td style="vertical-align:top; padding-left:5%; padding-top:10px; text-align: left;" class="visible-xs visible-sm visible-md visible-lg">';
//                                                                            echo $row88->GroupName." - <a href=manage_fishing_group_report_print.php?pms_pak_id=".$row99->Pms_Package_ID."&grp_id=".$row88->grp_id." target='_blank'>Report</a>";
                                                        ?>                    
                                                                            
                                                                            
                            

                                                                            
<div class="row">
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
                                    <table style="text-align: left;" cellpadding="15" cellspacing="15" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="visible-xs visible-sm visible-md visible-lg"  style="vertical-align:top; text-align: left;">Species</th>
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
                                                            if (($day_counter - $day_counter1) == 1) {
                                                                //echo '<br/>' . $dt->format("m/d/Y");
                                                            }
                                                            if($day_counter1>1 && $day_counter1==$day_counter){
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
                                                                    echo '<td style="vertical-align:top; text-align: left;" >';
                                                                        //echo 'Day10 '.($day_counter1-1).'<br/>'.$dt->format( "m/d/Y" );
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
                                                                        
                                                                    echo '</td>';
                                                                }
                                                                if (($day_counter - $day_counter1) == 1) {
//                                                                    echo '<td>';
//                                                                        echo '<br/>11' . $dt->format("m/d/Y");
//                                                                    echo '</td>';
                                                                }
                                                                if($day_counter1 == 1){
                                                                    //echo '<br/>'.$dt->format( "m/d/Y" );
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
                                                    <?php
                                                                if($count == $counter){
                                                    ?>
                                                                    <tr>
                                                                        <td colspan="100" style="vertical-align:top; text-align: left;" >
                                                                            <table style="text-align: left;" cellpadding="15" cellspacing="15" width="100%">

                                                                                
                                                                    <tr>
                                                                        <th style="vertical-align:top; text-align: left;" >
                                                                            <table style="vertical-align:top; text-align: left;" width="100%">
                                                                                <tr>
                                                                                    <th>
                                                                                        Total<br/>Species
                                                                                    </th>
                                                                                </tr>    
                                                                                <tr>
                                                                                    <th style="vertical-align:top; text-align: left;">
                                                                                        <br/>
                                                                                        <?php echo $count;?>
                                                                                    </th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th style="vertical-align:top; text-align: left;">
                                                                                        <br/>
                                                                                        Split<br/>Instructions
                                                                                    </th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th style="vertical-align:top; text-align: left;">
                                                                                        <br/>
                                                                                        Special<br/>Instructions
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
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
                                                                                        echo '<th class="visible-xs visible-sm visible-md visible-lg" style="vertical-align:top; text-align: left;" >';
                                                                                            echo " 
                                                                                                <table style='text-align: left;'>
                                                                                                    <tr>
                                                                                                        <th style='vertical-align:top; text-align: left;' >
                                                                                                            Day ".($day_counter1-1).'<br/>'.$dt->format( "m/d/Y" )." 
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th style='vertical-align:top; text-align: left;' >
                                                                                                            <br/> &nbsp; ";
                                                                                                            $Query12 = "    
                                                                                                            SELECT SUM(fr.frec_count) AS total_rec FROM fish_record AS fr
                                                                                                            WHERE 
                                                                                                            fr.grp_id = " . $row88->grp_id . "
                                                                                                            AND fr.pms_pak_id = " . $row99->Pms_Package_ID ." 
                                                                                                            AND fr.frec_count > 0
                                                                                                            AND fr.frec_date = '".$dt->format( "Y-m-d" )."'
                                                                                                            ";
                                                                                                            $res12 = mysql_query($Query12);
                                                                                                            $row12 = mysql_fetch_object($res12);
                                                                                                            echo $row12->total_rec;
                                                                                                    echo "</th>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th style='vertical-align:top; text-align: left;' >
                                                                                                            <br/> &nbsp; ";
                                                                                            
                                                                                                                $Query12 = "    
                                                                                                                SELECT fr.frec_split FROM fish_record AS fr
                                                                                                                WHERE 
                                                                                                                fr.grp_id = " . $row88->grp_id . "
                                                                                                                AND fr.pms_pak_id = " . $row99->Pms_Package_ID ." 
                                                                                                                AND fr.cont_id != ''
                                                                                                                AND fr.frec_date = '".$dt->format( "Y-m-d" )."'
                                                                                                                LIMIT 1
                                                                                                                ";
                                                                                                                $res12 = mysql_query($Query12);
                                                                                                                $total12 = mysql_num_rows($res12);
                                                                                                                if($total12 > 0){
                                                                                                                    $row12 = mysql_fetch_object($res12);
                                                                                                                    echo $row12->frec_split;
                                                                                                                }    
                                                                                                                
                                                                                                    echo "</th>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th style='vertical-align:top; text-align: left;' >
                                                                                                            <br/><br/> &nbsp; ";
                                                                                                
                                                                                                                $Query12 = "    
                                                                                                                SELECT fr.frec_special_ins FROM fish_record AS fr
                                                                                                                WHERE 
                                                                                                                fr.grp_id = " . $row88->grp_id . "
                                                                                                                AND fr.pms_pak_id = " . $row99->Pms_Package_ID ." 
                                                                                                                AND fr.cont_id != ''
                                                                                                                AND fr.frec_date = '".$dt->format( "Y-m-d" )."'
                                                                                                                LIMIT 1
                                                                                                                ";
                                                                                                                $res12 = mysql_query($Query12);
                                                                                                                $total12 = mysql_num_rows($res12);
                                                                                                                if($total12 > 0){
                                                                                                                    $row12 = mysql_fetch_object($res12);
                                                                                                                    echo $row12->frec_special_ins;
                                                                                                                }    
                                                                                                        echo "</th>
                                                                                                    </tr>
                                                                                                </table>
                                                                                                ";
                                                                                    }
                                                                                    if($day_counter1 == 1){
                                                                                        //echo '<br/>'.$dt->format( "m/d/Y" );
                                                                                    }
                                                                                }
                                                                            endforeach;
                                                                        ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="vertical-align:top; text-align: left;" >
                                                                            Total Fish Count
                                                                        </th>
                                                                        <th colspan="100" style="vertical-align:top; text-align: left;" >
                                                                             &nbsp; 
                                                                            <?php
                                                                                $Query12 = "    
                                                                                SELECT SUM(fr.frec_count) AS total_rec FROM fish_record AS fr
                                                                                WHERE 
                                                                                fr.grp_id = " . $row88->grp_id . "
                                                                                AND fr.pms_pak_id = " . $row99->Pms_Package_ID ." 
                                                                                AND fr.frec_count > 0
                                                                                ";
                                                                                $res12 = mysql_query($Query12);
                                                                                $row12 = mysql_fetch_object($res12);
                                                                                echo $row12->total_rec;
                                                                            ?>
                                                                        </th>    
                                                                    </tr>
                                                                    <tr>
                                                                        <th style='vertical-align:top; text-align: left;' >
                                                                            Average Weight of Filets
                                                                        </th>
                                                                        <th colspan="100" style='vertical-align:top; text-align: left;' >
                                                                             &nbsp; 
                                                                        <?php
                                                                            $Query12 = "    
                                                                            SELECT SUM(fr.frec_filets_weight) AS total_rec FROM fish_record AS fr
                                                                            WHERE 
                                                                            fr.grp_id = " . $row88->grp_id . "
                                                                            AND fr.pms_pak_id = " . $row99->Pms_Package_ID ." 
                                                                            AND fr.frec_count > 0
                                                                            ";
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
                                                                        <th style="vertical-align:top; text-align: left;" >
                                                                            Average for all Guests
                                                                        </th>
                                                                        <th colspan="100" style="vertical-align:top; text-align: left;" >
                                                                             &nbsp; 
                                                                            <?php
                                                                                echo round($avg_for_all_guests,2);
                                                                            ?>
                                                                        </th>    
                                                                    </tr>
                                                                                
                                                                                

                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                    <?php
                                                                }
                                                            }
                                                        }
                                                    ?>
                                        
                    </table>
                </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="padding-left:0%; padding-top: 20px; padding-bottom: 20px; text-align: left;" >
    <table style="text-align: left;" cellpadding="15" cellspacing="15" width="100%">
        <tr>
            <th>
                Guest
            </th>
            <th>
                Total for Guest
            </th>
            <th>
                Departure Date
            </th>
            <th>
                Departure Flight #
            </th>
            <th>
                Departure Flight Time
            </th>
        </tr>
        <?php
            $Query77 = "
            SELECT 
            DISTINCT fr.cont_id  AS frcont_id, c.ContactID, c.ContactFirstName, c.ContactLastName, c.departure_flight_date, c.dep_flightn_id, dep.flightn_name, depft.flightt_name
            FROM fish_record AS fr
            LEFT OUTER JOIN contacts AS c ON fr.cont_id = c.ContactID
            LEFT OUTER JOIN flight_no AS dep ON c.dep_flightn_id = dep.flightn_id AND dep.flightn_status = 2 
            LEFT OUTER JOIN flight_time AS depft ON c.dep_flightt_id = depft.flightt_id AND depft.flightt_status = 2
            WHERE fr.grp_id = ".$row88->grp_id."
            AND fr.pms_pak_id = ".$row99->Pms_Package_ID." 
            AND fr.cont_id != '' 
            ORDER BY c.ContactFirstName ASC";
            $count77 = mysql_num_rows(mysql_query($Query77));
            if($count77>0){
                $rs77 = mysql_query($Query77);
                while($row77 = mysql_fetch_object($rs77)){
                    $total_per_person = 0;

        ?> 
        <tr>
            <th>
                <?php
                    echo $row77->ContactFirstName.' '.$row77->ContactLastName;
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
                


                
                
<!--                                    <table class="table users-table table-condensed table-hover table-striped display dataTable" id="" >
                                        <thead>
                                            <tr>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Species</th>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Count</th>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Average Weight</th>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Percentage of Recovery</th>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Average Weight of Filets</th>
                                            </tr>
                                        </thead>
                                        <tbody>-->
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
<!--                                            </td>
                                        </tr>-->
                                        <?php
                                                    $counter_arr999++;
                                                }
                                            }
                                        ?>
<!--                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    &nbsp; 
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    &nbsp; 
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    &nbsp; 
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    &nbsp; 
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    &nbsp; 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    Split Fish Count By: 
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    <input type="text" class="form-control form-cascade-control input_wid70 required" value="<?php echo @$split999; //echo @$_REQUEST['frec_split'];?>" name="frec_split">
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    &nbsp; 
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    &nbsp; 
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    &nbsp; 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="visible-xs visible-sm visible-md visible-lg" style="width:200px;">
                                                    Total = (Average Weight of Filets / Split Fish Count By):
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    <?php 
                                                        echo round($frec_filets_weight_count999,2).' / '.@$split999;
                                                    ?>                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    For the Date:
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    <?php echo @calendarDateConver2($dt->format( "Y-m-d" ));?>
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    &nbsp; 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    Every Person Will Receive:
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">-->
                                                    <?php 
                                                        //echo '<br/>';
                                                        //echo round(($frec_filets_weight_count999 / @$split999),2);
                                                        //echo '<br/>';
                                                        //echo '<br/>';
                                                        $total_per_person += round(($frec_filets_weight_count999 / @$split999),2);
                                                        //echo '<br/>';
                                                        
                                                    ?>
<!--                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    &nbsp; 
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    &nbsp; 
                                                </td>
                                                <td class="visible-xs visible-sm visible-md visible-lg">
                                                    &nbsp; 
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                
                -->
                
                
                                            
                                        <?php
                            
                                        }
                                    } else {
                                            //echo '<br/>Not Processed<br/>',$dt->format( "Y-m-d" ).'<br/>'.$row77->ContactID;
                                    }                        
                                //echo '</th>';
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
                    echo calendarDateConver2($row77->departure_flight_date);
                ?>
            </td>
            <td  style="vertical-align:top; text-align: left;" >
                <?php
                    echo $row77->flightn_name;
                ?>
            </td>
            <td  style="vertical-align:top; text-align: left;" >
                <?php
                    $rs1 = mysql_query("SELECT * FROM flight_info ORDER BY flight_id");
                    if(mysql_num_rows($rs1)>0){
                        while($rw1=mysql_fetch_object($rs1)){
                            if($rw1->flight_id==1){
                                $rs2 = mysql_query("SELECT f.*, t.flightt_name FROM flight_no AS f LEFT OUTER JOIN flight_time AS t ON t.flightt_id=f.flightt_id WHERE f.flightn_status=2 ORDER BY STR_TO_DATE(t.flightt_name,'%h:%i %p')");
                                if(mysql_num_rows($rs2)>0){
                                    while($rw2=mysql_fetch_object($rs2)){
                                        $next_res = mysql_query("SELECT c.*, g.GroupName FROM contacts AS c LEFT OUTER JOIN groups AS g ON c.grp_id=g.grp_id WHERE c.dep_flight_id='".$rw1->flight_id."' AND c.dep_flightn_id='".$rw2->flightn_id."' AND c.grp_id>0 AND c.ContactID = ".$row77->ContactID."  ");
                                        if(mysql_num_rows($next_res)>0){
                                            print($rw2->flightt_name);
                                        }        
                                    }
                                }
                            }
                            elseif($rw1->flight_id==2){
                                $rs2 = mysql_query("SELECT t.* FROM flight_time AS t WHERE t.flightt_status=3 ORDER BY STR_TO_DATE(t.flightt_name,'%h:%i %p')");
                                if(mysql_num_rows($rs2)>0){
                                    while($rw2=mysql_fetch_object($rs2)){
                                        $rs3 = mysql_query("SELECT c.*, g.GroupName FROM contacts AS c LEFT OUTER JOIN groups AS g ON c.grp_id=g.grp_id WHERE c.dep_flight_id='".$rw1->flight_id."' AND c.dep_flightt_id='".$rw2->flightt_name."'");
                                        if(mysql_num_rows($rs3)>0){
                                            print($rw2->flightt_name);
                                        }
                                    }
                                }
                            }
                            elseif($rw1->flight_id==3){
                                $rs3 = mysql_query("SELECT c.*, g.GroupName FROM contacts AS c LEFT OUTER JOIN groups AS g ON c.grp_id=g.grp_id WHERE  c.dep_flight_id='".$rw1->flight_id."' AND c.ContactID = ".$row77->ContactID." ");
                                if(mysql_num_rows($rs3)>0){
                                    while($rw3=mysql_fetch_object($rs3)){
                                        print($rw3->dep_con_private_jet);
                                    }
                                }
                            }
                            elseif($rw1->flight_id==4){
                                $rs2 = mysql_query("SELECT h.* FROM hotel_info AS h ORDER BY h.hotel_id");
                                if(mysql_num_rows($rs2)>0){
                                    while($rw2=mysql_fetch_object($rs2)){
                                        $rs3 = mysql_query("SELECT c.*, g.GroupName FROM contacts AS c LEFT OUTER JOIN groups AS g ON g.grp_id=c.grp_id WHERE c.dep_flight_id='".$rw1->flight_id."' AND c.dep_hotel_id='".$rw2->hotel_id."' AND c.ContactID = ".$row77->ContactID." ");
                                        if(mysql_num_rows($rs3)>0){
                                            print(@$rw2->hotel_name);
                                        }
                                    }
                                }
                            }
                            else{

                            }
                        }
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
                </div>
            </div>
        </div>
