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
        <h3 class="page-header"> Boat & Activity Report <?php if(isset($_SESSION['asch_start_date'])){?> - <a href="manage_boat_activity_report_print.php" target="_blank" >Go to Printing Page</a><?php }?> <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b> Boat & Activity Report: </b> You can see Boat & Activity Report here </p>
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
                    <h3 class="panel-title"><i class="fa fa-check"></i> Activity and Boat Schedule Report</h3>
                </div>
                <div class="panel-body ">
                    <div class="ro">
                        <div class="col-mol-md-offset-2">
                            <form class="form-horizontal cascde-forms" method="post" action="<?php print($_SERVER['PHP_SELF']); ?>" name="frm" id="frm" >
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-3 control-label">Activity Date:</label>
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
            <h1>Boat and Activity Schedule</h1>
            <h3>Date: <?php echo calendarDateConver2($_SESSION['asch_start_date']);?></h3>
            
            <h3><strong>Boats</strong></h3>
            <?php
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
                LEFT OUTER JOIN act_new_boats AS anb ON anb.act_boat_id = acb.act_boat_id AND anb.asch_start_date LIKE '".$_SESSION['asch_start_date']."%' 
                LEFT OUTER JOIN act_boat_captain AS abcn ON  abcn.actboca_id = anb.actboca_id 
                LEFT OUTER JOIN act_boat_deckhand AS abdn ON  abdn.actbodh_id = anb.actbodh_id 
                LEFT OUTER JOIN act_boats AS acbn ON anb.act_boat_id  = acbn.act_boat_id
                LEFT OUTER JOIN contact_profiles AS cp ON asch.cont_id = cp.cont_id 
                LEFT OUTER JOIN contacts AS c ON asch.cont_id=c.ContactID 
                WHERE (asch.act_boat_id != '' OR asch.act_id IN (2, 7, 11)) AND asch.asch_start_date LIKE '".$_SESSION['asch_start_date']."%' 
                GROUP BY asch.act_boat_id 
                ORDER BY asch.act_boat_id DESC 
                ";
                $count1 = mysql_num_rows(mysql_query($Query1));
                $rs1 = mysql_query($Query1);
                if ($count1 > 0) {
                    while ($row1 = mysql_fetch_object($rs1)) {
                        $counter1++;
                        echo '<div class="" style="padding-left: 50px;">';
                        echo '<h4>'.$row1->act_boat_name.'</h4>';
                        echo '<h4>'.(($row1->new_caption!='')?$row1->new_caption:$row1->actboca_name).'</h4>';
                        echo '<h4>'.(($row1->new_deckhand!='')?$row1->new_deckhand:$row1->actbodh_name).'</h4>';
                        echo '</div>';
                        echo '<div class="" style="padding-left: 100px;">';
            ?>
                        <?php
                            $counter2=0;
                            $comma2='';
                            $Query2 = "
                            SELECT 
                            asch.asch_id, asch.cont_id, asch.act_boat_id, asch.grp_id, asch.cont_id, asch.av_date, 
                            c.ContactFirstName, c.ContactLastName,
                            cp.conp_id  
                            FROM 
                            act_schedule AS asch 
                            LEFT OUTER JOIN contacts AS c ON asch.cont_id = c.ContactID 
                            LEFT OUTER JOIN contact_profiles AS cp ON asch.cont_id = cp.cont_id 
                            WHERE  
                            asch_start_date LIKE '".$_SESSION['asch_start_date']."%' AND asch.act_boat_id IS NOT NULL AND asch.act_boat_id = ".$row1->act_boat_id."  
                            ORDER BY 
                            asch.act_boat_id, asch.cont_id 
                            ";
							//print($Query2);
							//die();
                            $count2 = mysql_num_rows(mysql_query($Query2));
                            $rs2 = mysql_query($Query2);
                            if ($count2 > 0) {
                                while ($row2 = mysql_fetch_object($rs2)) {
									print("<div>");
									if (!in_array($row2->cont_id, $cont_id)) {
                                        $cont_id[] .= $row2->cont_id;
                                        echo 'Guest: '.$row2->ContactFirstName.' '.$row2->ContactLastName;
                                        $counter=0;
                                        $rsM = mysql_query("SELECT 
                                        bo.*, bi.bitem_name
                                        FROM 
                                        beverage_order AS bo
                                        LEFT OUTER JOIN bar_items AS bi ON bo.bitem_id = bi.bitem_id
                                        WHERE 
                                        bo.cont_id = ".$row2->cont_id." AND bo.bvo_date = '".$_SESSION['asch_start_date']."%' ");
                                        if (mysql_num_rows($rsM) > 0) {
                                            echo '<br/>Beverage Order: ';
                                            while($rsMem = mysql_fetch_object($rsM)){
                                                $counter++;
                                                if($counter>1){
                                                    $comma = ', ';
                                                } else {
                                                    $comma = '';
                                                }
                                                echo $comma.$rsMem->bitem_name.' - '.$rsMem->bvo_quantity;
                                            }
                                        }
                                        echo '<br/>';    
                                    } else {
                                        //echo 'No Boat Assigned<br/>';
										echo '<br/>';
                                    }
									print("</div>");
                                }
                            }
                        ?>
            <?php
                        echo '</div>';
                    }
                }
            ?>

            <h3><strong> Massage </strong></h3>
            <?php
                $counter1 = 0;
                $dynmvar = 0;
                $Query1 = "
                SELECT 
                acts.*, c.ContactFirstName, c.ContactLastName, cp.conp_id, ac.act_name, ag.ag_name, av.av_name, actt.ath_name, acttt.atht_name
                FROM 
                act_schedule AS acts
                LEFT OUTER JOIN contacts AS c ON acts.cont_id=c.ContactID
                LEFT OUTER JOIN contact_profiles AS cp ON acts.cont_id=cp.cont_id
                LEFT OUTER JOIN activities AS ac ON acts.act_id=ac.act_id
                LEFT OUTER JOIN activity_guides AS ag ON acts.ag_id=ag.ag_id
                LEFT OUTER JOIN activity_vendors AS av ON acts.av_id=av.av_id
                LEFT OUTER JOIN act_therapist AS actt ON acts.ath_id=actt.ath_id
                LEFT OUTER JOIN act_th_type AS acttt ON acts.atht_id=acttt.atht_id
                WHERE  acts.asch_duration!='' AND acts.asch_start_date LIKE '".$_SESSION['asch_start_date']."%' 
                ORDER BY time(acts.asch_start_date), c.ContactFirstName ASC ";
                $limit1 = $_SESSION['limit_of_rec'];
                $start1 = $p->findStart($limit1);
                $count1 = mysql_num_rows(mysql_query($Query1));
                $pages1 = $p->findPages($count1, $limit1);
                $rs1 = mysql_query($Query1 . " LIMIT " . $start1 . ", " . $limit1);
                if (mysql_num_rows($rs1) > 0) {
                    while ($row1 = mysql_fetch_object($rs1)) {
                        $counter1++;
            ?>
                        <?php
                            if($counter1==1){
                                $dynmvar = calendarTimeConver1($row1->asch_start_date);
                            }
                            //echo $dynmvar.','.$row1->act_boat_id;
                            if($dynmvar == calendarTimeConver1($row1->asch_start_date)){
                                //echo 'IF: ';
                                //echo '<br/>';
                                if($counter1==1){
                        ?>
                                    <div style="padding-left: 50px;">
                                        <h4><?php  echo date("g:i a", strtotime($row1->asch_start_date) );?></h4>
                                    </div>
                        <?php
                                }
                        ?>
                                    <div style="padding-left: 100px;">
                                        <?php echo ''.trim($row1->ContactFirstName.' '.$row1->ContactLastName);?>
                                        <?php echo '<br/> '.$row1->ath_name;?>
                                        <?php echo '<br/> '.$row1->atht_name;?>
                                        <br/><br/>
                                    </div>
                        <?php } else { 
                                //echo 'ELSE: ';
                                //echo '<br/>';
                        ?>
                                <div style="padding-left: 50px;">
                                    <h4><?php  echo date("g:i a", strtotime($row1->asch_start_date) );?></h4>
                                </div>
                                <div style="padding-left: 100px;">
                                    <?php echo ''.trim($row1->ContactFirstName.' '.$row1->ContactLastName);?>
                                    <?php echo '<br/> '.$row1->ath_name;?>
                                    <?php echo '<br/> '.$row1->atht_name;?>
                                    <br/><br/>
                                </div>
                        <?php
                                $dynmvar = calendarTimeConver1($row1->asch_start_date);
                                //echo '<br/>';
                              }
                        ?>    
            <?php
                    }
                }
            ?>

            
            <h3><strong> Adventure Activities </strong></h3>
            <?php
                $counter1 = 0;
                $dynmvar = 0;
                $Query1 = " 
                SELECT 
                acts.*, c.ContactFirstName, c.ContactLastName, cp.conp_id, ac.act_name, ag.ag_name, av.av_name
                FROM 
                act_schedule AS acts
                LEFT OUTER JOIN contacts AS c ON acts.cont_id=c.ContactID
                LEFT OUTER JOIN contact_profiles AS cp ON acts.cont_id=cp.cont_id
                LEFT OUTER JOIN activities AS ac ON acts.act_id=ac.act_id
                LEFT OUTER JOIN activity_guides AS ag ON acts.ag_id=ag.ag_id
                LEFT OUTER JOIN activity_vendors AS av ON acts.av_id=av.av_id
                # acts.act_boat_id = 0 
                # acts.act_id != 1
                # WHERE acts.act_id NOT IN (1, 2, 7, 11) AND acts.act_boat_id = 0 AND acts.asch_start_date LIKE '".$_SESSION['asch_start_date']."%' 
                WHERE acts.act_id NOT IN (0,1) AND acts.asch_start_date LIKE '".$_SESSION['asch_start_date']."%' 
                GROUP BY acts.cont_id 
                ORDER BY acts.ag_id ASC";
                $limit1 = $_SESSION['limit_of_rec'];
                $start1 = $p->findStart($limit1);
                $count1 = mysql_num_rows(mysql_query($Query1));
                $pages1 = $p->findPages($count1, $limit1);
                $rs1 = mysql_query($Query1 . " LIMIT " . $start1 . ", " . $limit1);
                if (mysql_num_rows($rs1) > 0) {
                    while ($row1 = mysql_fetch_object($rs1)) {
                        $counter1++;
            ?>
                        <?php
                            if($counter1==1){
                                $dynmvar = $row1->ag_id;
                            }
                            //echo $dynmvar.','.$row1->act_boat_id;
                            if($dynmvar == $row1->ag_id){
                                //echo 'IF: ';
                                //echo '<br/>';
                                if($counter1==1){
                        ?>
                                    <div style="padding-left: 50px;">
                                        <h4><?php echo $row1->act_name;?></h4>
                                        <h4><?php echo $row1->ag_name;?></h4>
                                        <h4><?php echo $row1->av_name;?></h4>
                                    </div>    
                        <?php
                                }
                        ?>
                                    <div style="padding-left: 100px;">
                                        <?php
                                            echo 'Guest: '.$row1->ContactFirstName.' '.$row1->ContactLastName;
                                            $counter=0;
                                            $rsM = mysql_query("SELECT 
                                            bo.*, bi.bitem_name
                                            FROM 
                                            beverage_order AS bo
                                            LEFT OUTER JOIN bar_items AS bi ON bo.bitem_id = bi.bitem_id
                                            WHERE 
                                            bo.cont_id = ".$row1->cont_id." AND bo.bvo_date = '".$_SESSION['asch_start_date']."%' ");
                                            if (mysql_num_rows($rsM) > 0) {
                                                echo '<br/>Beverage Order: ';
                                                while($rsMem = mysql_fetch_object($rsM)){
                                                    $counter++;
                                                    if($counter>1){
                                                        $comma = ', ';
                                                    } else {
                                                        $comma = '';
                                                    }
                                                    echo $comma.$rsMem->bitem_name.' - '.$rsMem->bvo_quantity;
                                                }
                                            }
                                            $Query2 = "
                                            SELECT cp.jacketsize_id, cp.bootsize_id, js.jacketsize_name, bs.bootsize_name
                                            FROM contact_profiles AS cp
                                            LEFT OUTER JOIN jacket_size AS js ON cp.jacketsize_id=js.jacketsize_id
                                            LEFT OUTER JOIN boot_size AS bs ON cp.bootsize_id=bs.bootsize_id
                                            WHERE cp.conp_id=".$row1->conp_id." ";
                                            $count2 = mysql_num_rows(mysql_query($Query2));
                                            $rs2 = mysql_query($Query2);
                                            if ($count2 > 0) {
                                                while ($row2 = mysql_fetch_object($rs2)) {
                                                    echo '<br/>Jacket Size: '.$row2->jacketsize_name;
                                                    echo '<br/>Boot Size: '.$row2->bootsize_name;
                                                }
                                            }
                                            echo '<br/><br/>';
                                        ?>    
                                    </div>
                        <?php } else { 
                                //echo 'ELSE: ';
                                //echo '<br/>';
                        ?>
                                <div style="padding-left: 50px;">
                                    <h4><?php echo $row1->act_name;?></h4>
                                    <h4><?php echo $row1->ag_name;?></h4>
                                    <h4><?php echo $row1->av_name;?></h4>
                                </div>
                                    <div style="padding-left: 100px;">
                                        <?php
                                            echo 'Guest: '.$row1->ContactFirstName.' '.$row1->ContactLastName;
                                            $counter=0;
                                            $rsM = mysql_query("SELECT 
                                            bo.*, bi.bitem_name
                                            FROM 
                                            beverage_order AS bo
                                            LEFT OUTER JOIN bar_items AS bi ON bo.bitem_id = bi.bitem_id
                                            WHERE 
                                            bo.cont_id = ".$row1->cont_id." AND bo.bvo_date = '".$_SESSION['asch_start_date']."%' ");
                                            if (mysql_num_rows($rsM) > 0) {
                                                echo '<br/>Beverage Order: ';
                                                while($rsMem = mysql_fetch_object($rsM)){
                                                    $counter++;
                                                    if($counter>1){
                                                        $comma = ', ';
                                                    } else {
                                                        $comma = '';
                                                    }
                                                    echo $comma.$rsMem->bitem_name.' - '.$rsMem->bvo_quantity;
                                                }
                                            }
                                            $Query2 = "
                                            SELECT cp.jacketsize_id, cp.bootsize_id, js.jacketsize_name, bs.bootsize_name
                                            FROM contact_profiles AS cp
                                            LEFT OUTER JOIN jacket_size AS js ON cp.jacketsize_id=js.jacketsize_id
                                            LEFT OUTER JOIN boot_size AS bs ON cp.bootsize_id=bs.bootsize_id
                                            WHERE cp.conp_id=".$row1->conp_id." ";
                                            $count2 = mysql_num_rows(mysql_query($Query2));
                                            $rs2 = mysql_query($Query2);
                                            if ($count2 > 0) {
                                                while ($row2 = mysql_fetch_object($rs2)) {
                                                    echo '<br/>Jacket Size: '.$row2->jacketsize_name;
                                                    echo '<br/>Boot Size: '.$row2->bootsize_name;
                                                }
                                            }
                                            echo '<br/><br/>';
                                        ?>    
                                    </div>
                        <?php
                                $dynmvar = $row1->ag_id;
                                //echo '<br/>';
                              }
                        ?>    
            <?php
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
<link href="css/bootstrap-datepaginator.min.css" rel="stylesheet"  title="lessCss" id="lessCss">
<link href="css/bootstrap-datepaginator.css" rel="stylesheet"  title="lessCss" id="lessCss">

