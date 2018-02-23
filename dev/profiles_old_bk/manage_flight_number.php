<?php include('includes/php_includes_top.php');?>
<?php
if (isset($_REQUEST['flightn_status'])) {
    $_SESSION['flightn_status'] = $_REQUEST['flightn_status'];
} else {
    if (!isset($_SESSION['flightn_status'])) {
        $_SESSION['flightn_status'] = 1;
    }
}
if(isset($_REQUEST['action'])){
    if(isset($_REQUEST['btnAdd'])){
		$actid = getMaximum("flight_no","flightn_id");
		mysql_query("INSERT INTO flight_no(flightn_id, flightn_name, flightn_status, flightt_id) VALUES (".$actid.",'".dbStr($_REQUEST['flightn_name'])."','".dbStr($_SESSION['flightn_status'])."','".dbStr($_REQUEST['flightt_id'])."')") or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?op=1");
    }
    elseif(isset($_REQUEST['btnUpdate'])){
		$udtQuery = "UPDATE flight_no SET flightn_name='".dbStr($_REQUEST['flightn_name'])."', flightt_id='".dbStr($_REQUEST['flightt_id'])."' WHERE flightn_id=".$_REQUEST['flightn_id'];
		mysql_query($udtQuery) or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?op=2");
    }
    elseif($_REQUEST['action']==2){
            $rsM = mysql_query("SELECT * FROM flight_no WHERE flightn_id=".$_REQUEST['flightn_id']);
            if(mysql_num_rows($rsM)>0){
				$rsMem = mysql_fetch_object($rsM);
				$flightn_id= $rsMem->flightn_id;
				$flightn_name = $rsMem->flightn_name;
				$flightt_id = $rsMem->flightt_id;
				$formHead = "Update Info";
            }
	}
	else{
		$flightn_id="";
		$flightn_name = "";
		$flightt_id = "";
		$formHead = "Add New";
	}
}
if(isset($_REQUEST['show'])){
	$rsM = mysql_query("SELECT fn.*, ft.flightt_name FROM flight_no AS fn LEFT OUTER JOIN flight_time AS ft ON fn.flightt_id=ft.flightt_id WHERE fn.flightn_id=".$_REQUEST['flightn_id']);
	if(mysql_num_rows($rsM)>0){
		$rsMem = mysql_fetch_object($rsM);
		$flightn_id= $rsMem->flightn_id;
		$flightn_name = $rsMem->flightn_name;
		$flightt_id = $rsMem->flightt_id;
		$flightt_name = $rsMem->flightt_name;
		$formHead = "Update Info";
	}
}
if(isset($_REQUEST['btnDelete'])){
    @mysql_query("DELETE FROM flight_no  WHERE flightn_id=".$_REQUEST['chkstatus']) or die(mysql_query());
    header("Location: " . $_SERVER['PHP_SELF'] . "?op=3");

    
//    if(isset($_REQUEST['chkstatus'])){
//        for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
//            mysql_query("DELETE FROM flight_no  WHERE flightn_id=".$_REQUEST['chkstatus'][$i]) or die(mysql_query());
//        }
//        $class = "alert alert-info";
//        $strMSG = "Deleted Successfully";
//    } else {
//         $class = " alert alert-danger ";
//        $strMSG = "Please check atleast one checkbox";
//    }
}
?>
<?php include('includes/html_header.php');?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
        </ul>
        <div class="form-group hiddn-minibar pull-right">
        </div>
        <h3 class="page-header"> Manage Flight Numbers <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b>Manage Flight Numbers: </b> You can manage Flight Numbers here </p>
        </blockquote>
    </div>
</div>

            <?php if(isset($_REQUEST['action'])){ ?>
           
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-cascade">
						<div class="panel-heading">
							<h3 class="panel-title text-primary">
                            <?php print($formHead);?>
 
                            </h3>
						</div>
						<div class="panel-body panel-border">
                        	<form name="frm" id="frm" method="post" class="form-horizontal" action="<?php print($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);?>" role="form">
                          	  <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Flight Number</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Flight Number..." value="<?php print($flightn_name);?>" id="flightn_name" name="flightn_name">
                                </div>
                             </div>
                            <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Flight Time (Assign time to the above flight number)</label>
                                <div class="col-lg-10 col-md-9 det-display">
                                    <div style="padding:0px;margin:0px;width:30%;">
                                        <select name="flightt_id" id="flightt_id" data-placeholder="Choose a Flight Time..." class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2">
                                            <?php if($flightt_id>0){?>
                                                    <?php echo FillSelected("flight_time WHERE flightt_status=".$_SESSION['flightn_status']."", "flightt_id", "flightt_name", $flightt_id);?>
                                            <?php } else {?>
                                                    <?php echo FillSelected("flight_time WHERE flightt_status=".$_SESSION['flightn_status']."", "flightt_id", "flightt_name", $_SESSION['flightt_status']);?>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                             <div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
									<div class="col-lg-10 col-md-9">
									<?php if($_REQUEST['action']==1){ ?>
										<button type="submit" name="btnAdd" class="btn btn-primary btn-animate-demo">Submit</button>
									<?php } else{ ?>
										<button type="submit" name="btnUpdate" class="btn btn-primary btn-animate-demo">Submit</button>
									<?php } ?>
										<button type="button" name="btnCancel" class="btn btn-default btn-animate-demo" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']);?>';">Cancel</button>
									</div>
								</div>
                            </form> 
                         </div>
					</div>
				</div>
			</div>
            <?php } elseif(isset($_REQUEST['show'])){ ?>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-cascade">
						<div class="panel-heading">
							<h3 class="panel-title">
								Details
							</h3>
						</div>
                        <div class="panel-body">
                            <form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="site_login" class="col-lg-2 col-md-3 control-label">Flight Number</label>
                                    <div class="col-lg-10 col-md-9 det-display"><?php print($flightn_name); ?></div>
                                </div>
                                <div class="form-group">
                                    <label for="site_login" class="col-lg-2 col-md-3 control-label">Flight Time</label>
                                    <div class="col-lg-10 col-md-9 det-display"><?php print($flightt_name); ?></div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                                    <div class="col-lg-10 col-md-9">
                                        <button type="button" name="btnBack" class="btn btn-default btn-animate-demo" onclick="javascript: window.location = '<?php print($_SERVER['HTTP_REFERER']); ?>';">Back</button>
                                    </div>
                                </div>					
                            </form>
                        </div>
                    </div>
				</div>
			</div>
            <?php } else{ ?>












    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-cascade">

                <div class="panel-heading text-primary">
                    <?php if($_SESSION["UType"]==1){?>
                        <h3 class="panel-title"><i class="fa fa-sort-numeric-asc"></i> Flight Numbers 
                            <span class="pull-right" style="width:auto;">
                                <div style="float:right;"><a href="<?php print($_SERVER['PHP_SELF']."?action=1");?>" title="Add New"><i class="fa fa-plus"></i> Add New</a></div>
                            </span> 
                        </h3>
                    <?php }?>
                </div>

                <div class="panel-body ">
                    <div class="ro">
                        <div class="col-mol-md-offset-2">
                            <form name="frm21" id="frm21" method="post" class="form-horizontal cascde-forms" action="<?php print($_SERVER['PHP_SELF']); ?>">
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-3 control-label">Select Mode:</label>
                                    <div class="col-lg-10 col-md-9">
                                        <select name="flightn_status" id="flightn_status" data-placeholder="Choose a Mode..." class="chosen-select" style="width:240px; z-index: 9999 !important;" tabindex="2"  onChange="javascript:document.getElementById('frm21').submit()">
                                            <option value="1" <?php echo (($_SESSION['flightn_status']==1)?"selected='selected'":'');?>> Arrival </option>
                                            <option value="2" <?php echo (($_SESSION['flightn_status']==2)?"selected='selected'":'');?>> Departure </option>
                                        </select>
                                    </div>
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
				 <div class="<?php print($class);?>"><?php print($strMSG);?></div>
                                 

                                 
                                 
                                 
					<div class="panel">
                                            
                                            
              
                                            

						<div class="panel-body">
						<form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);?>" class="form-horizontal" role="form">
							<table class="table users-table table-condensed table-hover table-striped display dataTable" id="example" >
								<thead>
									<tr>
										<th class="visible-xs visible-sm visible-md visible-lg">Flight Number</th>
										<th class="visible-xs visible-sm visible-md visible-lg">Flight Time</th>
										<th style="text-align:center">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
                                                                        $Query="SELECT fn.*, ft.flightt_name FROM flight_no AS fn LEFT OUTER JOIN flight_time AS ft ON fn.flightt_id=ft.flightt_id  WHERE fn.flightn_status=".$_SESSION['flightn_status']."";
									$counter=0;
									$limit = 25;
									$start = $p->findStart($limit); 
									$count = mysql_num_rows(mysql_query($Query)); 
									$pages = $p->findPages($count, $limit); 
									$rs = mysql_query($Query." LIMIT ".$start.", ".$limit);
									if(mysql_num_rows($rs)>0){
										while($row=mysql_fetch_object($rs)){	
											$counter++;
								?>
									<tr>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->flightn_name);?> </td>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->flightt_name);?> </td>
                                                                            <td style="width:135px">
                                                                                <div class="tooltips"><a href="manage_flight_number.php?flightn_id=<?php print($row->flightn_id);?>&btnDelete=1&chkstatus=<?php print($row->flightn_id);?>" data-original-title="Delete Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-minus-circle"></i></a></div>
                                                                                <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF']."?show=1&flightn_id=".$row->flightn_id);?>" data-original-title="See Details" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-eye"></i></a></div>
                                                                                <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF']."?action=2&flightn_id=".$row->flightn_id);?>" data-original-title="Update Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-edit"></i></a></div>
                                        </td>
									</tr>
								<?php
										}
									}
									else{
										//print('<tr><td colspan="100%" align="center">No record found!</td></tr>');
									}
								?>
								</tbody>
							</table>
							<?php if($counter > 0) {?>
								<table width="100%" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td><?php print("Page <b>".$_GET['page']."</b> of ".$pages);?></td>
										<td align="right">
										<?php	
											$next_prev = $p->nextPrev($_GET['page'], $pages, '');
											print($next_prev);
										?>
										</td>
									</tr>
								</table>
							<?php }?>
							</form>
						</div>
					</div>
				</div>
			</div>






















        	<?php } ?>    
            


</div>
<?php include("includes/rightsidebar.php"); ?>
</div> </div> </div>
<?php include("includes/footer.php"); ?>

