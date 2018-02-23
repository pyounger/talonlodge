<?php
include ('includes/php_includes_top.php');


if ((isset($_REQUEST['asch_start_date'])) && ($_REQUEST['asch_start_date'] != '')) {
    $_SESSION['asch_start_date'] = date("Y-m-d",strtotime($_REQUEST['asch_start_date']));
} else {
    $_SESSION['asch_start_date'] = date("Y-m-d"); //current date.
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
        <h3 class="page-header"> Menu/Beverage Order Report <?php if(isset($_SESSION['asch_start_date'])){?> - <a href="manage_menu_beverage_report_print.php" target="_blank" >Go to Printing Page</a><?php }?> <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b>  Menu/Beverage Order Report : </b> You can  Menu/Beverage Order Report  here </p>
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
                    <h3 class="panel-title"><i class="fa fa-check"></i>  Menu/Beverage Order Report </h3>
                </div>
                <div class="panel-body ">
                    <div class="ro">
                        <div class="col-mol-md-offset-2">
                            <form class="form-horizontal cascde-forms" method="post" action="<?php print($_SERVER['PHP_SELF']); ?>" name="frm" id="frm" >
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-3 control-label">Schedule Date:</label>
                                    <div class="col-lg-10 col-md-9">
                                        <input type="text" class="form-control form-cascade-control datetimepicker" value="<?php echo calendarDateConver2($_SESSION['asch_start_date']); ?>" id="asch_start_date" name="asch_start_date" style="width: 160px;" title="Activity Date" placeholder="Activity Date">
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



    <div class="row">
        <div class="col-md-12">
            <div class="<?php print($class); ?>"><?php print($strMSG); ?></div>
            <div class="panel">
                <div class="panel-body">
                    <div class="" style="padding-left: 20px;">


        <ul class="nav faq-list">
            <h3>Date: <?php echo calendarDateConver2($_SESSION['asch_start_date']);?></h3>
            
            
            <div style="padding-left: 50px;">
                <h3>Breakfast Items & Count</h3>
            </div>
            <?php
                $Query3 = "
                SELECT 
                ms.msch_id, ms.menu_b, ms.msch_date,
                (SELECT COUNT(msc.menu_b) FROM menu_schedules AS msc WHERE ms.menu_b = msc.menu_b AND msc.msch_date = '".$_SESSION['asch_start_date']."' ) AS total_menu,
                me.menu_item_name
                FROM 
                menu_schedules AS ms
                LEFT OUTER JOIN menus AS me ON ms.menu_b = me.menu_id
                WHERE
                ms.menu_b != '' AND ms.msch_date = '".$_SESSION['asch_start_date']."'
                GROUP BY
                ms.menu_b
                ";
                $count3 = mysql_num_rows(mysql_query($Query3));
                $rs3 = mysql_query($Query3);
                if ($count3 > 0) {
                    while ($row3 = mysql_fetch_object($rs3)) {
            ?>
            <div style="padding-left: 100px;">
                <h4><?php echo $row3->menu_item_name.' - '.$row3->total_menu;?></h4>
            </div>    
            <?php
                    }
                }
            ?>

            <div style="padding-left: 50px;">
                <h3>Lunch Items & Count</h3>
            </div>
            <?php
                $Query1 = "
                SELECT 
                ms.msch_id, ms.menu_l, ms.msch_date,
                (SELECT COUNT(msc.menu_l) FROM menu_schedules AS msc WHERE ms.menu_l = msc.menu_l AND msc.msch_date = '".$_SESSION['asch_start_date']."' ) AS total_menu,
                me.menu_item_name

                FROM 
                menu_schedules AS ms
                LEFT OUTER JOIN menus AS me ON ms.menu_l = me.menu_id
                WHERE
                ms.menu_l != '' AND ms.msch_date = '".$_SESSION['asch_start_date']."'

                GROUP BY
                ms.menu_l
                ";
                $count1 = mysql_num_rows(mysql_query($Query1));
                $rs1 = mysql_query($Query1);
                if ($count1 > 0) {
                    while ($row1 = mysql_fetch_object($rs1)) {
            ?>
            <div style="padding-left: 100px;">
                <h4><?php echo $row1->menu_item_name.' - '.$row1->total_menu;?></h4>
            </div>    
            <?php
                    }
                }
            ?>

            <div style="padding-left: 50px;">
                <h3>Dinner Items & Count</h3>
            </div>
            <?php
                $Query2 = "
                SELECT 
                ms.msch_id, ms.menu_d, ms.msch_date,
                (SELECT COUNT(msc.menu_d) FROM menu_schedules AS msc WHERE ms.menu_d = msc.menu_d AND msc.msch_date = '".$_SESSION['asch_start_date']."' ) AS total_menu,
                me.menu_item_name

                FROM 
                menu_schedules AS ms
                LEFT OUTER JOIN menus AS me ON ms.menu_d = me.menu_id
                WHERE
                ms.menu_d != '' AND ms.msch_date = '".$_SESSION['asch_start_date']."'

                GROUP BY
                ms.menu_d
                ";
                $count2 = mysql_num_rows(mysql_query($Query2));
                $rs2 = mysql_query($Query2);
                if ($count2 > 0) {
                    while ($row2 = mysql_fetch_object($rs2)) {
            ?>
            <div style="padding-left: 100px;">
                <h4><?php echo $row2->menu_item_name.' - '.$row2->total_menu;?></h4>
            </div>    
            <?php
                    }
                }
            ?>
            <hr><br>
            
            
            <table width="100%" cellpadding="15" cellspacing="15" style="text-align: left; vertical-align: top;">
                <thead>
                    <tr>
                        <th style="text-align: left; vertical-align: top;"> Guest Name </th>
                        <th style="text-align: left; vertical-align: top;"> Allergy/Special Instructions </th>
                        <th style="text-align: left; vertical-align: top;"> Breakfast </th>
                        <th style="text-align: left; vertical-align: top;"> Lunch </th>
                        <th style="text-align: left; vertical-align: top;"> Dinner </th>
                        <th style="text-align: left; vertical-align: top;"> Beverage Order </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $Query4 = "

SELECT 
ms.*, 
c.ContactFirstName, 
c.ContactLastName, 
cp.conp_id, g.GroupName 

FROM menu_schedules AS ms 
LEFT OUTER JOIN contacts AS c ON ms.cont_id = c.ContactID 
LEFT OUTER JOIN contact_profiles AS cp ON ms.cont_id = cp.cont_id 
LEFT OUTER JOIN groups AS g ON ms.grp_id = g.grp_id 

WHERE ms.msch_date = '".$_SESSION['asch_start_date']."' 
GROUP BY ms.cont_id 
ORDER BY g.GroupName, c.ContactFirstName ASC";

                        $count4 = mysql_num_rows(mysql_query($Query4));
                        $rs4 = mysql_query($Query4);
                        if ($count4 > 0) {
                            while ($row4 = mysql_fetch_object($rs4)) {
                    ?>
                    <tr>
                        <td style="text-align: left; vertical-align: top;"> &nbsp;<br/> 
                            <?php echo $row4->ContactFirstName.' '.$row4->ContactLastName;?>
                        </td>
                        <td style="text-align: left; vertical-align: top; color: #ff3333;"> &nbsp;<br/> 
                            <?php
                                $counter5=0;
                                $Query5 = "
                                SELECT cpd.cpd_answer
                                FROM contact_profile_details AS cpd
                                WHERE cpd.conp_id=".$row4->conp_id." ";
                                $count5 = mysql_num_rows(mysql_query($Query5));
                                $rs5 = mysql_query($Query5);
                                if ($count5 > 0) {
                                    while ($row5 = mysql_fetch_object($rs5)) {
                                        if($row5->cpd_answer != ''){
                                            $comma = '';
                                            if($counter5>0){
                                                $comma = ', ';
                                            }
                                            echo $comma.$row5->cpd_answer;
                                            $counter5++;
                                        }    
                                    }
                                }
                            ?>
                        </td>
                        <td style="text-align: left; vertical-align: top;"> &nbsp;<br/> 
                            <?php
                                $counter=0;
                                $dynmvar = '';
                                $rsM = mysql_query("
                                SELECT 
                                msc.msch_id, msc.msch_type, msc.msch_date, msc.msch_custom_order,
                                mib.menu_item_name AS mib, mibd.menu_item_name AS mibd, 
                                mil.menu_item_name AS mil, mild.menu_item_name AS mild,
                                mid.menu_item_name AS mid, midd.menu_item_name AS midd
                                FROM menu_schedules AS msc
                                LEFT OUTER JOIN menus AS mib ON msc.menu_b=mib.menu_id AND mib.menu_type=1
                                LEFT OUTER JOIN menus AS mibd ON msc.menu_b_default=mibd.menu_id AND mibd.menu_type=1
                                LEFT OUTER JOIN menus AS mil ON msc.menu_l=mil.menu_id AND mil.menu_type=2
                                LEFT OUTER JOIN menus AS mild ON msc.menu_l_default=mild.menu_id AND mild.menu_type=2
                                LEFT OUTER JOIN menus AS mid ON msc.menu_d=mid.menu_id AND mid.menu_type=3
                                LEFT OUTER JOIN menus AS midd ON msc.menu_d_default=midd.menu_id AND midd.menu_type=3
                                WHERE msc.cont_id = ".$row4->cont_id." AND msc.msch_date = '".$_SESSION['asch_start_date']."' 
                                ORDER BY msc.msch_date, msc.msch_type ASC ");
                                if(mysql_num_rows($rsM)>0){
                                    while($rsMem = mysql_fetch_object($rsM)){
                                        if($rsMem->msch_type==1){
                                            echo (!empty($rsMem->mib)?'Regular: '.$rsMem->mib:'');
                                            echo (!empty($rsMem->mibd)?'<br/>Custom: '.$rsMem->mibd:'');
                                            echo (!empty($rsMem->msch_custom_order)?'<br/>Extended Custom: '.$rsMem->msch_custom_order:'');
                                        }
                                    }    
                                }
                            ?>
                        </td>
                        <td style="text-align: left; vertical-align: top;"> &nbsp;<br/> 
                            <?php
                                $counter=0;
                                $dynmvar = '';
                                $rsM = mysql_query("
                                SELECT 
                                msc.msch_id, msc.msch_type, msc.msch_date, msc.msch_custom_order,
                                mib.menu_item_name AS mib, mibd.menu_item_name AS mibd, 
                                mil.menu_item_name AS mil, mild.menu_item_name AS mild,
                                mid.menu_item_name AS mid, midd.menu_item_name AS midd
                                FROM menu_schedules AS msc
                                LEFT OUTER JOIN menus AS mib ON msc.menu_b=mib.menu_id AND mib.menu_type=1
                                LEFT OUTER JOIN menus AS mibd ON msc.menu_b_default=mibd.menu_id AND mibd.menu_type=1
                                LEFT OUTER JOIN menus AS mil ON msc.menu_l=mil.menu_id AND mil.menu_type=2
                                LEFT OUTER JOIN menus AS mild ON msc.menu_l_default=mild.menu_id AND mild.menu_type=2
                                LEFT OUTER JOIN menus AS mid ON msc.menu_d=mid.menu_id AND mid.menu_type=3
                                LEFT OUTER JOIN menus AS midd ON msc.menu_d_default=midd.menu_id AND midd.menu_type=3
                                WHERE msc.cont_id = ".$row4->cont_id." AND msc.msch_date = '".$_SESSION['asch_start_date']."' 
                                ORDER BY msc.msch_date, msc.msch_type ASC ");
                                if(mysql_num_rows($rsM)>0){
                                    while($rsMem = mysql_fetch_object($rsM)){
                                        if($rsMem->msch_type==2){
                                            echo (!empty($rsMem->mil)?'Regular: '.$rsMem->mil:'');
                                            echo (!empty($rsMem->mild)?'<br/>Custom: '.$rsMem->mild:'');
                                            echo (!empty($rsMem->msch_custom_order)?'<br/>Extended Custom: '.$rsMem->msch_custom_order:'');
                                        }
                                    }    
                                }
                            ?>
                        </td>
                        <td style="text-align: left; vertical-align: top;"> &nbsp;<br/> 
                            <?php
                                $counter=0;
                                $dynmvar = '';
                                $rsM = mysql_query("
                                SELECT 
                                msc.msch_id, msc.msch_type, msc.msch_date, msc.msch_custom_order,
                                mib.menu_item_name AS mib, mibd.menu_item_name AS mibd, 
                                mil.menu_item_name AS mil, mild.menu_item_name AS mild,
                                mid.menu_item_name AS mid, midd.menu_item_name AS midd
                                FROM menu_schedules AS msc
                                LEFT OUTER JOIN menus AS mib ON msc.menu_b=mib.menu_id AND mib.menu_type=1
                                LEFT OUTER JOIN menus AS mibd ON msc.menu_b_default=mibd.menu_id AND mibd.menu_type=1
                                LEFT OUTER JOIN menus AS mil ON msc.menu_l=mil.menu_id AND mil.menu_type=2
                                LEFT OUTER JOIN menus AS mild ON msc.menu_l_default=mild.menu_id AND mild.menu_type=2
                                LEFT OUTER JOIN menus AS mid ON msc.menu_d=mid.menu_id AND mid.menu_type=3
                                LEFT OUTER JOIN menus AS midd ON msc.menu_d_default=midd.menu_id AND midd.menu_type=3
                                WHERE msc.cont_id = ".$row4->cont_id." AND msc.msch_date = '".$_SESSION['asch_start_date']."' 
                                ORDER BY msc.msch_date, msc.msch_type ASC ");
                                if(mysql_num_rows($rsM)>0){
                                    while($rsMem = mysql_fetch_object($rsM)){
                                        if($rsMem->msch_type==3){
                                            echo (!empty($rsMem->mid)?'Regular: '.$rsMem->mid:'');
                                            echo (!empty($rsMem->mibd)?'<br/>Custom: '.$rsMem->mibd:'');
                                            echo (!empty($rsMem->msch_custom_order)?'<br/>Extended Custom: '.$rsMem->msch_custom_order:'');
                                        }
                                    }    
                                }
                            ?>
                        </td>
                        <td style="text-align: left; vertical-align: top;"> &nbsp;<br/> 
                            <?php 
                                $counter=0;
                                $rsM = mysql_query("SELECT 
                                bo.*, bi.bitem_name
                                FROM 
                                beverage_order AS bo
                                LEFT OUTER JOIN bar_items AS bi ON bo.bitem_id = bi.bitem_id
                                WHERE 
                                bo.cont_id = ".$row4->cont_id." AND bo.bvo_date = '".$_SESSION['asch_start_date']."' ");
                                if (mysql_num_rows($rsM) > 0) {
                                    while($rsMem = mysql_fetch_object($rsM)){
                                        $counter++;
                                        if($counter>1){
                                            $comma = ', ';

                                        } else {
                                            $comma = '';
                                        }
                                        echo $rsMem->bitem_name.' '.$rsMem->bvo_quantity.'<br/>';
                                    }
                                }
                            ?>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>

            
            
            
        
            
            
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
<link href="css/bootstrap-datepaginator.min.css" rel="stylesheet"  title="lessCss" id="lessCss">
<link href="css/bootstrap-datepaginator.css" rel="stylesheet"  title="lessCss" id="lessCss">

