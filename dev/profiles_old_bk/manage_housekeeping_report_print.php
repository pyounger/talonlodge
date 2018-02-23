<?php include ('includes/php_includes_top.php'); ?>
<?php
//include ('includes/html_header.php');
?>
<h3 class="page-header"> Housekeeping Report <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
<a href="javascript:void(0);"><h2 onclick="javascript:window.print();">Print this Report</h2></a>
<p><a href="manage_housekeeping_report.php">Back to website</a></p>



<table style="text-align: left;" id="example" width="100%">
<?php
if (isset($_REQUEST['show']) && $_REQUEST['show'] == 1) {
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="<?php print($class); ?>"><?php print($strMSG); ?></div>
            <div class="panel">
                <div class="panel-heading text-primary">
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
                <div class="panel-body">
                    <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">

                        <?php
                            $day_counter = 0;
                            $day_counter1 = 0;
                            $date1 = '';
                            $date1 = returnName("Arrival_Start_Date", "packages", "Pms_Package_ID", $_REQUEST['pms_pak_id']);
                            $days1 = '0';
                            $date1 = strtotime($date1);
                            $date1 = strtotime('-'.$days1.' day', $date1);
                            $date1 = date('Y-m-d', $date1);
                            $date1 = $date1.' 00:00:00';

                            $date2 = '';
                            $date2 = returnName("Arrival_End_Date", "packages", "Pms_Package_ID", $_REQUEST['pms_pak_id']);
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


                        ?>

                                    <?php
                                    $Query = "SELECT
p.Pms_Package_ID, p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, p.Package_Max_Days,
g.grp_id, g.GroupName,
c.ContactID, c.ContactFirstName, c.ContactLastName, c.cont_special_ins, 
cp.conp_id, cp.bootsize_id,
j.jacketsize_name

FROM packages AS p 
LEFT OUTER JOIN groups AS g ON p.Pms_Package_ID= g.Pms_Package_ID 
LEFT OUTER JOIN contacts AS c ON g.grp_id=c.grp_id
LEFT OUTER JOIN contact_profiles AS cp ON c.ContactID=cp.cont_id
LEFT OUTER JOIN jacket_size AS j ON cp.jacketsize_id=j.jacketsize_id

WHERE p.Pms_Package_ID = " . $_REQUEST['pms_pak_id'] . " AND p.Arrival_Start_Date > '2014-05-01' AND g.grp_id=c.grp_id
ORDER BY p.Arrival_Start_Date ASC";
                                    $counter = 0;
                                    $limit = $_SESSION['limit_of_rec'];
                                    $start = $p->findStart($limit);
                                    $count = mysql_num_rows(mysql_query($Query));
                                    $pages = $p->findPages($count, $limit);
                                    $rs = mysql_query($Query . " LIMIT " . $start . ", " . $limit);
                                    if (mysql_num_rows($rs) > 0) {
                                        while ($row = mysql_fetch_object($rs)) {

                                            $Query5=0;
                                            $count5=0;
                                            $count6=0;
                                            foreach( $room_dates as $romd ):
                                                $Query5 = "SELECT
                                                rr.roomr_id, rr.room_id, r.room_title

                                                FROM room_reservation AS rr 
                                                LEFT OUTER JOIN rooms AS r ON rr.room_id=r.room_id

                                                WHERE contact_id=" . $row->ContactID . " 
                                                AND r.room_id=".$row4->room_id." 
                                                AND grp_id=" . $row->grp_id . "
                                                AND Pms_Package_ID=" . $row->Pms_Package_ID . "
                                                AND roomr_startdate= '" . $romd . "' ";
                                                $count5 = mysql_num_rows(mysql_query($Query5));
                                                if($count5!=0){
                                                    $count6=1;
                                                }
                                            endforeach;    

                                            if($count6==1){
                                                $counter++;
                                            ?>







                        <?php //if($counter==1){?>
                        <?php //}?>
                            <?php if($counter==1){?>
                            <thead>
                                <tr><th class="visible-xs visible-sm visible-md visible-lg" colspan="100%" style="text-align: center; border: 0px solid #ddd !important;"> &nbsp; </th>
                                </tr>
                                <tr>
                                    <th class="visible-xs visible-sm visible-md visible-lg" colspan="100%" style="text-align: center; border: 0px solid #ddd !important;">
                                        <span style="text-decoration: underline;"> Room Name: <strong><?php echo returnName("room_title", "rooms", "room_id", $row4->room_id);?></strong></span>
                                    </th>
                                </tr>
                            </thead>
                            <?php }?>
                            <?php if($counter==1){?>
                            <thead>
                                <tr>
                                    <th class="visible-xs visible-sm visible-md visible-lg" style="width: 140px;">
                                        <?php if($counter==1){?>Guest<?php } else {?>&nbsp;<?php }?>
                                    </th>
                                    <th class="visible-xs visible-sm visible-md visible-lg" style="width: 260px;">
                                        <?php if($counter==1){?>Other Things<?php } else {?>&nbsp;<?php }?>
                                    </th>
                                    <th class="visible-xs visible-sm visible-md visible-lg" style="width: 140px;">
                                        <?php if($counter==1){?>Group<?php } else {?>&nbsp;<?php }?>
                                    </th>
                                    <?php
                                    $day_counter = 0;
                                    $day_counter1 = 0;
                                    $date1 = '';
                                    $date1 = returnName("Arrival_Start_Date",
                                            "packages", "Pms_Package_ID",
                                            $_REQUEST['pms_pak_id']);
                                    $days1 = '0';
                                    $date1 = strtotime($date1);
                                    $date1 = strtotime('-' . $days1 . ' day',
                                            $date1);
                                    $date1 = date('Y-m-d', $date1);
                                    $date1 = $date1 . ' 00:00:00';
                                    $date2 = '';
                                    $date2 = returnName("Arrival_End_Date",
                                            "packages", "Pms_Package_ID",
                                            $_REQUEST['pms_pak_id']);
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
                                            ?>
                                                <?php if($counter==1){?>
                                                <?php
                                                if ($day_counter != 1) {
                                                    if ($no_of_days == $day_counter) {
                                                        // echo '<br/>'.$dt->format( "m/d/Y" );
                                                    } else {
                                                        if ($no_of_days != (1 + $day_counter)) {
                                                            echo '<th class="visible-xs visible-sm visible-md visible-lg" style="width: 100px;">';
                                                            $day_counter1++;
                                                            echo 'Night ' . $day_counter1 . '<br/>' . $dt->format("m/d/Y");
                                                            echo '</th>';
                                                        }
                                                    }
                                                } else {
                                                    echo '<th class="visible-xs visible-sm visible-md visible-lg" style="width: 100px;">';
                                                    $day_counter1++;
                                                    echo 'Night ' . $day_counter1 . '<br/>' . $dt->format("m/d/Y");
                                                    echo '</th>';
                                                }
                                                if (($day_counter - $day_counter1) == 1) {
                                                    //echo '<br/> H1: ' . $dt->format("m/d/Y");
                                                }
                                                ?>
                                                <?php } else {?>&nbsp;<?php }?>
                                            </th>
                                        <?php
                                    }
                                endforeach;
                                ?>
                                </tr>
                            </thead>
                            <?php }?>
                                        <tr>
                                            <td class="visible-xs visible-sm visible-md visible-lg" style="width: 140px;"><?php print($row->ContactFirstName.' '.$row->ContactLastName); ?> &nbsp; </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg" style="width: 260px;"><?php echo 'Jacket Size: '.$row->jacketsize_name.'<br>Boot Size: '.$row->bootsize_id.'<br>Instructions: '.$row->cont_special_ins;?> &nbsp; </td>
                                            <td class="visible-xs visible-sm visible-md visible-lg" style="width: 140px;"><?php echo $row->GroupName;?> &nbsp; </td>
                                                <?php
                                                $day_counter = 0;
                                                $day_counter1 = 0;
                                                $date1 = '';
                                                $date1 = returnName("Arrival_Start_Date",
                                                        "packages",
                                                        "Pms_Package_ID",
                                                        $_REQUEST['pms_pak_id']);
                                                $days1 = '0';
                                                $date1 = strtotime($date1);
                                                $date1 = strtotime('-' . $days1 . ' day',
                                                        $date1);
                                                $date1 = date('Y-m-d',
                                                        $date1);
                                                $date1 = $date1 . ' 00:00:00';

                                                $date2 = '';
                                                $date2 = returnName("Arrival_End_Date",
                                                        "packages",
                                                        "Pms_Package_ID",
                                                        $_REQUEST['pms_pak_id']);
                                                $days2 = '2';
                                                $date2 = strtotime($date2);
                                                $date2 = strtotime('+' . $days2 . ' day',
                                                        $date2);
                                                $date2 = date('Y-m-d',
                                                        $date2);
                                                $date2 = $date2 . ' 00:00:00';


                                                $begin = new DateTime($date1);
                                                $end = new DateTime($date2);

                                                $interval = DateInterval::createFromDateString('1 day');
                                                $period = new DatePeriod($begin,
                                                        $interval, $end);
                                                $no_of_days = diffindates($date1,
                                                        $date2);

                                                foreach ($period as $dt):
                                                    $day_counter++;
                                                    if ($no_of_days != $day_counter) {
                                                        ?>
<!--                                                    <td class="visible-xs visible-sm visible-md visible-lg" style="width: 100px;"> -->
                                                        <?php
                                                        if ($day_counter != 1) {
                                                            if ($no_of_days == $day_counter) {
                                                            } else {
                                                                if ($no_of_days != (1 + $day_counter)) {
                                                                    $Query1 = "SELECT
                                                                    rr.roomr_id, rr.room_id, r.room_title

                                                                    FROM room_reservation AS rr 
                                                                    LEFT OUTER JOIN rooms AS r ON rr.room_id=r.room_id

                                                                    WHERE contact_id=" . $row->ContactID . " 
                                                                    AND r.room_id=".$row4->room_id." 
                                                                    AND grp_id=" . $row->grp_id . "
                                                                    AND Pms_Package_ID=" . $row->Pms_Package_ID . "
                                                                    AND roomr_startdate= '" . $dt->format("Y-m-d") . "' ";
                                                                    $count1 = mysql_num_rows(mysql_query($Query1));
                                                                    $rs1 = mysql_query($Query1);
                                                                    if ($count1 > 0) {
                                                                        echo '<td class="visible-xs visible-sm visible-md visible-lg" style="width: 100px;">';
                                                                        while ($row1 = mysql_fetch_object($rs1)) {
                                                                            $day_counter1++;
                                                                            //echo '<a href='.$_SERVER['PHP_SELF']."?show=2&pms_pak_id=".$row->Pms_Package_ID."&contactid=".$row->ContactID."&grp_id=".$row->grp_id."&date=".$dt->format("Y-m-d")."&update=1&roomr_id=".$row1->roomr_id."&room_id=".$row1->room_id.'> '.$row1->room_title.' - Delete </a>';

                                                                            echo 'Reserved';
                                                                            //$row1->room_title . '<br/>' . '<a href=' . $_SERVER['PHP_SELF'] . "?delete=1&roomr_id=" . $row1->roomr_id . "&show=1&pms_pak_id=" . $row->Pms_Package_ID . "&contactid=" . $row->ContactID . '>Unassign</a>' . '<br/><a href=' . $_SERVER['PHP_SELF'] . "?show=3&roomr_id=" . $row1->roomr_id . "&pms_pak_id=" . $row->Pms_Package_ID . "&contactid=" . $row->ContactID . "&grp_id=" . $row->grp_id . "&date=" . $dt->format("Y-m-d") . '>Details</a>'
                                                                            ;
                                                                        }
                                                                        echo '</td>';
                                                                    } else {
                                                                        echo '<td class="visible-xs visible-sm visible-md visible-lg" style="width: 100px;">';
                                                                        $day_counter1++;
                                                                        echo 'Free';
                                                                        echo '</td>';
                                                                        //echo '<br/><a href=' . $_SERVER['PHP_SELF'] . "?show=2&pms_pak_id=" . $row->Pms_Package_ID . "&contactid=" . $row->ContactID . "&grp_id=" . $row->grp_id . "&date=" . $dt->format("Y-m-d") . "&add=1" . '>Not Assigned</a>';
                                                                    }
                                                                }
                                                            }
                                                        } else {
                                                            $Query1 = "SELECT
                                                            rr.roomr_id, rr.room_id, r.room_title

                                                            FROM room_reservation AS rr 
                                                            LEFT OUTER JOIN rooms AS r ON rr.room_id=r.room_id

                                                            WHERE contact_id=" . $row->ContactID . "
                                                                AND r.room_id=".$row4->room_id."  
                                                            AND grp_id=" . $row->grp_id . "
                                                            AND Pms_Package_ID=" . $row->Pms_Package_ID . "
                                                            AND roomr_startdate= '" . $dt->format("Y-m-d") . "' ";
                                                            $count1 = mysql_num_rows(mysql_query($Query1));
                                                            $rs1 = mysql_query($Query1);
                                                            if ($count1 > 0) {
                                                                echo '<td class="visible-xs visible-sm visible-md visible-lg" style="width: 100px;">';
                                                                while ($row1 = mysql_fetch_object($rs1)) {
                                                                    $day_counter1++;
                                                                    //echo '<a href='.$_SERVER['PHP_SELF']."?show=2&pms_pak_id=".$row->Pms_Package_ID."&contactid=".$row->ContactID."&grp_id=".$row->grp_id."&date=".$dt->format("Y-m-d")."&update=1&roomr_id=".$row1->roomr_id."&room_id=".$row1->room_id.'> '.$row1->room_title.' - Delete </a>';
                                                                    echo 'Reserved'; 
                                                                    //$row1->room_title . '<br/><a href=' . $_SERVER['PHP_SELF'] . "?delete=1&roomr_id=" . $row1->roomr_id . "&show=1&pms_pak_id=" . $row->Pms_Package_ID . "&contactid=" . $row->ContactID . '>Unassign</a>' . '<br/><a href=' . $_SERVER['PHP_SELF'] . "?show=3&roomr_id=" . $row1->roomr_id . "&pms_pak_id=" . $row->Pms_Package_ID . "&contactid=" . $row->ContactID . "&grp_id=" . $row->grp_id . "&date=" . $dt->format("Y-m-d") . '>Details</a>';
                                                                }
                                                                echo '</td>';
                                                            } else {
                                                                echo '<td class="visible-xs visible-sm visible-md visible-lg" style="width: 100px;">';
                                                                $day_counter1++;
                                                                echo 'Free';
                                                                //echo '<br/><a href=' . $_SERVER['PHP_SELF'] . "?show=2&pms_pak_id=" . $row->Pms_Package_ID . "&contactid=" . $row->ContactID . "&grp_id=" . $row->grp_id . "&date=" . $dt->format("Y-m-d") . "&add=1" . '>Not Assigned</a>';
                                                                echo '</td>';

                                                            }
                                                        }
                                                        ?> 
                                <?php
                            }
                        endforeach;
                        ?>
                                        </tr>

                        <?php
                                            }
                    }
                } else {
                    //print('<tr><td colspan="100%" align="center">No record found!</td></tr>');
                }
                ?>
                        <?php
                                }
                            }
                        ?>
                                        

                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

                        </table>



</div>
<?php
//include ("includes/rightsidebar.php");
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
