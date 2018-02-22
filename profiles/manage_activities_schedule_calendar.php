<?php
include ('includes/php_includes_top.php');
?>
<link href="css/timeline.css" rel="stylesheet">
<?php
include ('includes/html_header.php');
?>    
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-cascade">
            <div class="panel-heading text-primary">
                <h3 class="panel-title"><i class="fa fa-check"></i> Activity Schedule Calendar </h3>

            </div>
            <div> <a href="manage_activities_schedule.php" class="btn bg-primary text-white btn-lg">LIST</a> <div> 
                    <div class="panel-body ">
                        <div class="ro">
                            <div class="col-mol-md-offset-2">

                                <div id='calendar'><span id="loaderMessage"><strong>Please wait.. while calender is being loaded.</strong></span></div>                            

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        /**
         * RESCONSTRUCTED BLOCK OF CODE.
         */
        ?>
        <style>
            .scheduled {
                background-color:#ccff99;
            }
            .not-scheduled {
                background-color:#00b3ee;
                color:#fff;
            }
            .no-profile {
                font-style:italic;
                color:#ccc;
            }
            .no-profile a {
                color:#ccc;
            }    
            .cancelled {
                color:red;
                text-decoration: line-through;
            }
        </style>

        <?php
        include ("includes/rightsidebar.php");
        ?>
        <div id='calendar'></div>


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
<?php if (isset($_GET['pk_from'])) { ?>
                var filterDate = "<?php echo $_GET['pk_from']; ?>";
<?php } else { ?>
                var filterDate = "<?php echo date('Y-m-d'); ?>";
<?php } ?>

            $(document).ready(function() {


                $.ajax({
                    url: 'manage_activities_schedule_calendar_events.php',
                    type: 'POST',
                    data: 'pk_from=' + filterDate,
                    async: false,
                    success: function(response) {
                        $('#loaderMessage').hide();
                        json_events = response;
                        $('#calendar').fullCalendar({
                            header: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'month,agendaWeek,agendaDay'
                            },
                            events: JSON.parse(json_events),
 eventClick: function(event) {
        if (event.url) {
            window.open(event.url);
            return false;
        }
    }
                        });
                    },
                    error:function(){
                        
                    }
                });



            });


        </script>
