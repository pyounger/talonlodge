<?php
include ('includes/php_includes_top.php');
?>
<?php
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
        <h3 class="page-header"> Master Activities Schedules <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b>Master Activities Schedules: </b> You can see your Master activity schedules here </p>
        </blockquote>
    </div>
</div>

    <?php
    $return_array = array();
    $event_array;
    ?>
    
    <div class="row" style="width: 0px;height: 0px;display: none;visibility: hidden;">
        <div class="col-md-12">
            <div class="<?php print($class); ?>"><?php print($strMSG); ?></div>
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="">
                            <ul class="nav faq-list">
                                <?php
                                //if(isset($_REQUEST['act_id']) && $_REQUEST['act_id']==1){
                                    $extra_query1 = " AND cac.act_id = " . $_REQUEST['act_id'] . " ";
                                    $extra_query2 = " AND p.Pms_Package_ID = " . $_REQUEST['pms_pak_id'] . " ";
                                //} else {
                                    //$extra_query1 = '';
                                    //$extra_query2 = '';
                                //}    
                                $counter1 = 0;
                                $Query1 = "
SELECT c.ContactID, c.grp_id, 
g.Contact_ID, g.GroupName,
(SELECT cf.ContactFirstName FROM contacts AS cf WHERE cf.ContactID=g.Contact_ID) AS ContactFirstName, 
(SELECT cl.ContactLastName FROM contacts AS cl WHERE cl.ContactID=g.Contact_ID) AS ContactLastName, p.Pms_Package_ID, p.Package_Name, p.Arrival_Start_Date, p.Arrival_End_Date, cpro.conp_id, cac.act_id
FROM  contacts AS c
LEFT OUTER JOIN groups AS g ON c.grp_id=g.grp_id
LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID
LEFT OUTER JOIN contact_profiles AS cpro ON c.ContactID=cpro.cont_id
LEFT OUTER JOIN contact_activities AS cac ON cpro.conp_id=cac.conp_id
WHERE c.grp_id!=0 AND c.grp_id!='' 
 
AND cac.act_id!=''  
 
 
GROUP BY  c.grp_id ORDER BY p.Arrival_Start_Date ASC";
// AND cac.act_id = " . $_REQUEST['act_id'] . "

                                $count1 = mysql_num_rows(mysql_query($Query1));
                                $rs1 = mysql_query($Query1);
                                if (mysql_num_rows($rs1) > 0) {
                                    while ($row1 = mysql_fetch_object($rs1)) {
                                        $counter1++;
                                        ?>
                                        <?php
                                        $counter2 = 0;
                                        $Query2 = "SELECT c.ContactID, c.grp_id, c.ContactFirstName, c.ContactLastName FROM contacts AS c WHERE c.grp_id=" . $row1->grp_id . " ";
                                        $count2 = mysql_num_rows(mysql_query($Query2));
                                        $rs2 = mysql_query($Query2);
                                        if (mysql_num_rows($rs2) > 0) {
                                            ?>
                                            <li> 
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row1->grp_id ?>">
                                                    <i class="fa fa-plus-square"></i>  <?php echo $row1->GroupName . ' | ' . $row1->ContactFirstName . ' ' . $row1->ContactLastName . ' | ' . $row1->Package_Name . ' | ' . @calendarDateConver2($row1->Arrival_Start_Date) . ' | ' . @calendarDateConver2($row1->Arrival_End_Date); ?> 
                                                </a>
                                                <ul>
                                                    <li id="collapse<?php echo $row1->grp_id ?>" class="panel-collapse collapse" style="list-style-type:none;">
                                                        <p>
                                                        <table class="table users-table table-condensed table-hover table-striped display dataTable">
                                                            <?php
                                                            while ($row2 = mysql_fetch_object($rs2)) {
                                                                $counter2++;
                                                                ?>
                                                                <?php
                                                                //if(isset($_REQUEST['act_id']) && $_REQUEST['act_id']==1){
                                                                    $extra_query = " AND a.act_id = ".$_REQUEST['act_id']." ";
                                                                //} else {
                                                                    //$extra_query = '';
                                                                //}    
                                                                $counter3 = 0;
                                                                $Query3 = "SELECT cp.conp_id, cp.cont_id, ca.act_id, a.act_name, g.grp_id, g.GroupName, c.cont_fname, c.cont_lname, asch.asch_id, asch.cont_id AS aschcont_id, asch.asch_start_date, asch.asch_end_date, asch.asch_duration, asch.av_confirmed, ag.ag_name, asch.av_confirming_person, asch.av_date, asch.av_time, abn.act_boat_name, ad.ad_name, av.av_name, thr.ath_id, thr.ath_name, thrt.atht_id, thrt.atht_name FROM  contact_profiles AS cp LEFT OUTER JOIN contact_activities AS ca ON cp.conp_id=ca.conp_id LEFT OUTER JOIN activities AS a ON ca.act_id=a.act_id LEFT OUTER JOIN act_schedule AS asch ON asch.grp_id=" . $row1->grp_id . " AND asch.cont_id=" . $row2->ContactID . " AND asch.act_id=a.act_id LEFT OUTER JOIN groups AS g ON g.grp_id=" . $row1->grp_id . " LEFT OUTER JOIN contacts AS c ON c.ContactID=" . $row2->ContactID . " LEFT OUTER JOIN activity_guides AS ag ON asch.ag_id=ag.ag_id LEFT OUTER JOIN activity_destination AS ad ON asch.ad_id=ad.ad_id LEFT OUTER JOIN activity_vendors AS av ON asch.av_id=av.av_id LEFT OUTER JOIN act_therapist AS thr ON asch.ath_id=thr.ath_id LEFT OUTER JOIN act_th_type AS thrt ON asch.atht_id=thrt.atht_id LEFT OUTER JOIN act_boats AS abn ON asch.act_boat_id=abn.act_boat_id WHERE cp.cont_id=" . $row2->ContactID . " AND a.act_id !=''  AND asch.asch_id!='' ORDER BY a.act_order ASC";
// AND a.act_id = ".$_REQUEST['act_id']."
                                                                $count3 = mysql_num_rows(mysql_query($Query3));
                                                                $rs3 = mysql_query($Query3);
                                                                if (mysql_num_rows($rs3) > 0) {
                                                                    ?>
                                                                    <thead>
                                                                        <tr><th class="visible-xs visible-sm visible-md visible-lg" colspan="100%" style="text-align: center; border: 0px solid #ddd !important;"> &nbsp; </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg" colspan="100%" style="text-align: center; border: 0px solid #ddd !important;">
                                                                                <span style="text-decoration: underline;"> Guest Name: <strong><?php echo $row2->ContactFirstName . ' ' . $row2->ContactLastName; ?></strong></span>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg"> Activity </th>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg"> Start </th>
                                                                            <th class="visible-sm visible-md visible-lg"> End </th>
                                                                            <th class="visible-sm visible-md visible-lg"> Guider<br/> Therapist </th>
                                                                            <th class="visible-sm visible-md visible-lg"> Destination<br/> Therapist Type </th>
                                                                            <th class="visible-sm visible-md visible-lg"> Vendor </th>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg"> Scheduled </th>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg" style="text-align:center"> Action </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <?php
                                                                    while ($row3 = mysql_fetch_object($rs3)) {
                                                                        $activity = '';
                                                                        $counter3++;
                                                                        $act_name = $row3->act_name;
                                                                        $ag_id = @$row3->ag_id;
                                                                        $ad_id = @$row3->ad_id;
                                                                        $av_id = @$row3->av_id;
                                                                        $av_confirmed = $row3->av_confirmed;
                                                                        $av_confirming_person = $row3->av_confirming_person;
                                                                        $av_date = calendarDateConver2($row3->av_date);
                                                                        $av_time = $row3->av_time;
                                                                        $ath_id = $row3->ath_id;
                                                                        $atht_id = $row3->atht_id;
                                                                        $asch_start_date = $row3->asch_start_date;
                                                                        $asch_end_date = $row3->asch_end_date;
                                                                        $asch_duration = $row3->asch_duration;
                                                                        $asch_start_time = calendarTimeConver1($row3->asch_start_date);
                                                                        $asch_end_time = calendarTimeConver1($row3->asch_end_date);


                                                                        $activity .= PHP_EOL;
                                                                        if ($row3->act_name != '') {
                                                                            $activity .= ' AC= ' . $row3->act_name . PHP_EOL;
                                                                        }
                                                                        if ($row3->GroupName != '') {
                                                                            $activity .= 'G.N= ' . $row3->GroupName . PHP_EOL;
                                                                        }
                                                                        if ($row3->cont_fname != '') {
                                                                            $activity .= 'C.N= ' . $row3->cont_fname . ' ' . $row3->cont_lname . PHP_EOL;
                                                                        }
                                                                        if ($row3->asch_start_date != '') {
                                                                            $activity .= 'DA= ' . calendarDateConver2($row3->asch_start_date) . PHP_EOL;
                                                                        }
                                                                        if ($asch_start_time != '' && $asch_start_time != '00:00:00') {
                                                                            $activity .= 'S.T= ' . $asch_start_time . PHP_EOL;
                                                                        }
                                                                        if ($asch_end_time != '' && $asch_end_time != '00:00:00') {
                                                                            $activity .= 'E.T= ' . $asch_end_time . PHP_EOL;
                                                                        }
                                                                        if ($asch_duration != '' && $asch_duration != 0) {
                                                                            $activity .= 'DU= ' . $asch_duration . ' Minutes '. PHP_EOL;
                                                                        }
                                                                        if ($row3->ag_name != '') {
                                                                            $activity .= 'GU= ' . $row3->ag_name . PHP_EOL;
                                                                        }
                                                                        if ($row3->ad_name != '') {
                                                                            $activity .= 'DE= ' . $row3->ad_name . PHP_EOL;
                                                                        }
                                                                        if ($row3->av_name != '') {
                                                                            $activity .= 'V.N= ' . $row3->av_name . PHP_EOL;
                                                                        }
                                                                        if ($row3->av_confirmed != '') {
                                                                            $activity .= 'V.C= ' . $row3->av_confirmed . PHP_EOL;
                                                                        }
                                                                        if ($row3->av_confirming_person != '') {
                                                                            $activity .= 'V.P= ' . $row3->av_confirming_person . PHP_EOL;
                                                                        }
                                                                        if ($av_date != '') {
                                                                            $activity .= 'V.D= ' . $av_date . PHP_EOL;
                                                                        }
                                                                        if ($av_time != '' && $av_time != '0:00:00') {
                                                                            $activity .= 'V.T= ' . $row3->av_time . PHP_EOL;
                                                                        }
                                                                        if ($row3->ath_name != '') {
                                                                            $activity .= 'T.N= ' . $row3->ath_name . PHP_EOL;
                                                                        }
                                                                        if ($row3->atht_name != '') {
                                                                            $activity .= 'T.T= ' . $row3->atht_name . PHP_EOL;
                                                                        }
                                                                        if ($row3->act_boat_name != '') {
                                                                            $activity .= 'B.N= ' . $row3->act_boat_name . PHP_EOL;
                                                                        }
                                                                        $event_array['id'] = $row3->asch_id;
                                                                        $event_array['title'] = $activity;
                                                                        $event_array['start'] = $row3->asch_start_date;
                                                                        $event_array['end'] = $row3->asch_end_date;
                                                                        //$event_array['description'] = 'Des: '.$activity;
                                                                        
                                                                        $event_array['allDay'] = false;
                                                                        $event_array['url'] = "manage_activities_schedule.php?action=2&sch=1&cont_id=" . $row3->cont_id . "&grp_id=" . $row3->grp_id . "&act_id=" . $row3->act_id . "&asch_id=" . $row3->asch_id."&pms_pak_id=".$row1->Pms_Package_ID;

                                                                        array_push($return_array, $event_array);
                                                                        ?>
                                                                        <tr>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php echo $row3->act_name; ?> </td>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php echo(($row3->asch_start_date != '') ? calendarDateConver2($row3->asch_start_date) : ''); ?></td>
                                                                            <td class="visible-sm visible-md visible-lg"><?php echo(($row3->asch_end_date != '') ? calendarDateConver2($row3->asch_end_date) : ''); ?></td>
                                                                            <td class="visible-sm visible-md visible-lg"><?php echo(($row3->act_id == 1) ? $row3->ath_name : $row3->ag_name); ?></td>
                                                                            <td class="visible-sm visible-md visible-lg"><?php echo(($row3->act_id == 1) ? $row3->atht_name : $row3->ad_name); ?></td>
                                                                            <td class="visible-sm visible-md visible-lg"><?php echo $row3->av_name; ?> </td>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg">
                                                                                <?php
                                                                                if ($row3->asch_id != 0 || $row3->asch_id != '') {
                                                                                    echo "<a href=" . $_SERVER['PHP_SELF'] . "?action=2&sch=1&cont_id=" . $row3->cont_id . "&grp_id=" . $row3->grp_id . "&act_id=" . $row3->act_id . "&asch_id=" . $row3->asch_id . "> Scheduled </a>";
                                                                                } else {
                                                                                    echo "<a href=" . $_SERVER['PHP_SELF'] . "?action=1&sch=0&cont_id=" . $row3->cont_id . "&grp_id=" . $row3->grp_id . "&act_id=" . $row3->act_id . "&asch_id=" . $row3->asch_id . "> Not Scheduled </a>";
                                                                                }
                                                                                ?>    
                                                                            </td>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg" style="width:50px; text-align: center;">
                                                                                <?php if ($row3->asch_id != 0 && $row3->asch_id != '') { ?>
                                                                                    <div class="tooltips"><a href="<?php echo $_SERVER['PHP_SELF'] . "?show=1&cont_id=" . $row3->cont_id . "&grp_id=" . $row3->grp_id . "&act_id=" . $row3->act_id . "&asch_id=" . $row3->asch_id; ?>" data-original-title="See Details" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-eye"></i></a></div>
                            <?php } ?>    
                                                                            </td>
                                                                        </tr>
                                                                    <?php
                                                                    }
                                                                } else {
                                                                    //print('<tr><td colspan="100%" align="center"><strong> 1 Record Not Found! </strong></td></tr>');
                                                                }
                                                                ?>
                                                            <?php
                                                            }
                                                        } else {
                                                            //print('<tr><td colspan="100%" align="center"><strong> 2 Record Not Found! </strong></td></tr>');
                                                        }
                                                        ?>
                                                    </table>
                                                    </p>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php
                                    }
                                } else {
                                    //print('<tr><td colspan="100%" align="center"><strong> 3 Record Not Found! </strong></td></tr>');
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>	
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <?php
//            echo '<pre>';
//            echo json_encode($return_array);
//            echo '</pre>';
            ?>
            <div class="col-md-3" style="width: 0px;height: 0px;display: none;visibility: hidden;">
                <input type="text" name="createEvent" class="form-control" id="write-event" >
            </div>
            <div>
                <div id='calendar'></div>
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
                                        startDate: '<?php echo @$_SESSION['pak_start']?>',
                                        endDate: '<?php echo @$_SESSION['pak_end']?>'
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
