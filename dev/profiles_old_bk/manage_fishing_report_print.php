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
                            
                            
            <h3><strong> Fishing Report </strong></h3>
            <?php
                $gfrec_count = 0;
                $gfrec_weight = 0;
                $gfrec_recovery = 0;
                $gfrec_filets_weight = 0;
                $counter1 = 0;
                $dynmvar = 0;
                $Query1 = "
                SELECT fr.* 
                FROM fish_record AS fr
                WHERE fr.cont_id = " . $_REQUEST['cont_id'] . " 
                GROUP BY frec_date 
                ORDER BY frec_date 
                ";
                $count1 = mysql_num_rows(mysql_query($Query1));
                $rs1 = mysql_query($Query1);
                if ($count1 > 0) {
                    while ($row1 = mysql_fetch_object($rs1)) {
                        $counter1++;
            ?>
                <div style="padding-left: 50px;">
                    <h3><?php echo calendarDateConver2($row1->frec_date);?></h3>
                </div>
                <div style="padding-left: 100px;">
                    <table style="text-align: left;" cellpadding="4">
                                        <thead>
                                            <tr>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Species</th>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Count</th>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Average Weight</th>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Percentage of Recovery</th>
                                                <th class="visible-xs visible-sm visible-md visible-lg">Average Weight of Filets</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $counter = 0;
                                            $count = 0;
                                            $frec_count = 0;
                                            $frec_weight = 0;
                                            $frec_recovery = 0;
                                            $frec_filets_weight = 0;
                                            
                                            $Query = "SELECT
                                            fr.*, ft.ftype_name
                                            FROM 
                                            fish_record AS fr
                                            LEFT OUTER JOIN fish_types AS ft ON fr.ftype_id=ft.ftype_id
                                            WHERE 
                                            fr.frec_date =  '" . $row1->frec_date . "'
                                            AND fr.cont_id=" . $_REQUEST['cont_id'] . "
                                            AND fr.grp_id=" . $_REQUEST['grp_id'] . "
                                            AND fr.pms_pak_id=" . $_REQUEST['pms_pak_id'] . "  ORDER BY ft.ftype_name  ";
                                            $count = mysql_num_rows(mysql_query($Query));
                                            $rs = mysql_query($Query);
                                            if ($count > 0) {
                                                while ($row = mysql_fetch_object($rs)) {
                                                    $counter++;
                                        ?>
                                        <tr>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                <?php 
                                                    print($row->ftype_name);
                                                ?>
                                            </th>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php 
                                                    echo @$row->frec_count;
                                                    $frec_count += $row->frec_count;
                                                ?>
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php 
                                                    echo @$row->frec_weight;
                                                    $frec_weight += $row->frec_weight;
                                                ?>
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php 
                                                    echo @$row->frec_recovery;
                                                    $frec_recovery += $row->frec_recovery;
                                                ?>
                                            </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                <?php 
                                                    echo @$row->frec_filets_weight;
                                                    $frec_filets_weight += $row->frec_filets_weight;
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                                }
                                            }
                                        ?>
                                        <tr>
                                            <td colspan="100">
                                                &nbsp; 
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                Total
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                <?php echo $frec_count; $gfrec_count += $frec_count;?>
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                <?php echo $frec_weight; $gfrec_weight += $frec_weight;?>
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                <?php echo $frec_recovery; $gfrec_recovery += $frec_recovery;?>
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                <?php echo $frec_filets_weight; $gfrec_filets_weight += $frec_filets_weight;?>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                Day Total
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                &nbsp; 
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                &nbsp; 
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                &nbsp; 
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                <?php echo $frec_filets_weight . ' / '.@returnName("Package_Max_Days", "packages", "Pms_Package_ID", $_REQUEST['pms_pak_id']);?>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                Total Per Split
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                &nbsp; 
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                &nbsp; 
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                &nbsp; 
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                <?php echo round(($frec_filets_weight/@returnName("Package_Max_Days", "packages", "Pms_Package_ID", $_REQUEST['pms_pak_id'])),2);?>
                                            </th>
                                        </tr>
                                        </tbody>
                                        <tr>
                                            <td colspan="100">
                                                &nbsp; 
                                            </td>
                                        </tr>
                    <?php
                        if($count1 == $counter1){
                    ?>
                                        <tr>
                                            <td colspan="100">
                                                &nbsp; 
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                Grand Total
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                <?php echo $gfrec_count;?>
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                <?php echo $gfrec_weight;?>
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                <?php echo $gfrec_recovery;?>
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                <?php echo $gfrec_filets_weight;?>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                Grand Day Total
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                &nbsp; 
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                &nbsp; 
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                &nbsp; 
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                <?php echo $gfrec_filets_weight . ' / '.@returnName("Package_Max_Days", "packages", "Pms_Package_ID", $_REQUEST['pms_pak_id']);?>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                Grand Total Per Split
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                &nbsp; 
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                &nbsp; 
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                &nbsp; 
                                            </th>
                                            <th class="visible-xs visible-sm visible-md visible-lg">
                                                <?php echo round(($gfrec_filets_weight/@returnName("Package_Max_Days", "packages", "Pms_Package_ID", $_REQUEST['pms_pak_id'])),2);?>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td colspan="100">
                                                &nbsp; 
                                            </td>
                                        </tr>
                    
                    <?php
                        }
                    ?>
                    </table>
                </div>
            <?php
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
