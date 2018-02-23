<?php include ('includes/php_includes_top.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="<?php print($class); ?>"><?php print($strMSG); ?></div>
        <div class="panel">
            <div class="panel-heading text-primary" style="padding-left: 50px;">
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
                                echo $row[0] . ' - ' . calendarDateConver2($row[1]) . ' - ' . calendarDateConver2($row[2]) . ' - ' . $row[3] . ' Days';
                            }
                        }
                    ?>
                    <span class="pull-right" style="width:auto;">
                    </span> 
                </h3>
            </div>
            <div class="panel-body" style="padding-left: 100px;">
                <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                    <table class="table users-table table-condensed table-hover table-striped display dataTable" style="text-align: left;" cellspacing="15">
                        <thead>
                            <tr>
                                <th class="visible-xs visible-sm visible-md visible-lg" style="vertical-align:top; text-align: left;">Name</th>
                                <th class="visible-xs visible-sm visible-md visible-lg" style="vertical-align:top; text-align: left;">
                                    <table width="100%" cellspacing="0" style="vertical-align:top; text-align: left;" border="0">
                                        <tr>
                                            <th style="vertical-align:top; text-align: left;">
                                                Bar Items
                                            </th>
                                            <th style="vertical-align:top; text-align: left;">
                                                Quantity
                                            </th>
                                        </tr>
                                    </table>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $Query = "SELECT
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
                                WHERE 
p.Pms_Package_ID = " . $_REQUEST['pms_pak_id'] . "  
AND p.Arrival_Start_Date > '2014-05-01'  
AND g.grp_id=c.grp_id
AND g.GroupArrivalDate > '2014-05-01' 

                                ORDER BY c.ContactFirstName ASC";
                                $counter = 0;
                                $limit = $_SESSION['limit_of_rec'];
                                $start = $p->findStart($limit);
                                $count = mysql_num_rows(mysql_query($Query));
                                $pages = $p->findPages($count, $limit);
                                $rs = mysql_query($Query . " LIMIT " . $start . ", " . $limit);
                                if (mysql_num_rows($rs) > 0) {
                                    while ($row = mysql_fetch_object($rs)) {
                                        $counter++;
                            ?>
                                    <tr>
                                        <th class="visible-xs visible-sm visible-md visible-lg" style="vertical-align:top; text-align: left;"><div style="padding-top:4px;"><?php echo $row->ContactFirstName.' '.$row->ContactLastName;?></div></th>
                                        <td class="visible-xs visible-sm visible-md visible-lg" style="vertical-align:top; text-align: left;">
                                        <?php 
                                            $total_bottles = 0;
                                            $counter11 = 0;
                                            $Query11 = "
                                            SELECT bo.*, bi.bitem_name
                                            FROM 
                                            bar_orders AS bo 
                                            LEFT OUTER JOIN bar_items AS bi ON bo.bitem_id = bi.bitem_id
                                            WHERE bo.cont_id = ".$row->ContactID."
                                            GROUP BY bi.bitem_name
                                            ORDER BY bi.bitem_name";
                                            $count11 = mysql_num_rows(mysql_query($Query11));
                                            $rs11 = mysql_query($Query11);
                                            if ($count11 > 0) {
                                                while ($row11 = mysql_fetch_object($rs11)) {
                                                    $counter11++;
                                        ?>            
                                                    <table width="100%" cellspacing="0" style="vertical-align:top; text-align: left;" border="0">
                                                        <tr>
                                                            <td style="vertical-align:top; text-align: left; width: 150px;">
                                                                <?php echo $row11->bitem_name;?>
                                                            </td>
                                                            <td style="vertical-align:top; text-align: left; width: 100px;">
                                                                <?php 
                                                                    $Query22 = "SELECT SUM(bord_quatity) AS total_qnty FROM bar_orders WHERE cont_id = ".$row->ContactID." AND bitem_id = ".$row11->bitem_id." ";
                                                                    $rs22 = mysql_query($Query22);
                                                                    $row22 = mysql_fetch_object($rs22);
                                                                    echo $row22->total_qnty;
                                                                    echo '<br/>';
                                                                    $total_bottles += $row22->total_qnty;
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <?php if($count11 == $counter11){?>
                                                        <tr>
                                                            <th style="vertical-align:top; text-align: left; width: 150px;">
                                                                Total
                                                            </th>
                                                            <th style="vertical-align:top; text-align: left; width: 100px;">
                                                                <?php echo $total_bottles;?>
                                                            </th>
                                                        </tr>
                                                        <?php }?>
                                                    </table>
                                        <?php
                                                }
                                            }
                                        ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                //print('<tr><td colspan="100%" align="center">No record found!</td></tr>');
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

