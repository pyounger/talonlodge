<?php include('includes/php_includes_top.php');?>
<?php 
if(isset($_REQUEST['user_id'])){
    $_SESSION['user_id'] = $_REQUEST['user_id'];
}
else{
    if(!isset($_SESSION['user_id'])){
        $_SESSION['user_id']=0;
    }
}

if(isset($_REQUEST['action'])){
	if(isset($_REQUEST['btnAdd'])){
		$romid = getMaximum("rooms","room_id");
		//$staName = returnName("status_name", "status", "status_id", $_REQUEST['status_id']);
		mysql_query("INSERT INTO rooms(room_id, room_title, room_mem, room_details) VALUES(".$romid.",'".$_REQUEST['room_title']."','".$_REQUEST['room_mem']."', '".$_REQUEST['room_details']."')") or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?op=1");
	}
	elseif(isset($_REQUEST['btnUpdate'])){
		//$staName = returnName("status_name", "status", "status_id", $_REQUEST['status_id']);
		$udtQuery = "UPDATE rooms SET room_title='".$_REQUEST['room_title']."', room_mem='".$_REQUEST['room_mem']."', room_details='".$_REQUEST['room_details']."' WHERE room_id=".$_REQUEST['room_id'];
		mysql_query($udtQuery) or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?op=2");
	}
	elseif($_REQUEST['action']==2){
		$rsM = mysql_query("SELECT * FROM rooms WHERE room_id=".$_REQUEST['room_id']);
		if(mysql_num_rows($rsM)>0){
			$rsMem = mysql_fetch_object($rsM);
			$room_id= $rsMem->room_id;
			$room_mem = $rsMem->room_mem;
			$room_title = $rsMem->room_title;
			$room_details = $rsMem->room_details;
		   
			$formHead = "Update Info";
		}
	}
	else{
		$room_id="";
		$room_title = "";
		$room_mem = "";
		$room_details = "";
		$formHead = "Add New";
	}
}
if(isset($_REQUEST['show'])){
	$rsM = mysql_query("SELECT * from rooms where room_id=".$_REQUEST['room_id']);
	if(mysql_num_rows($rsM)>0){
		$rsMem = mysql_fetch_object($rsM);
		$room_id= $rsMem->room_id;
		$room_title = $rsMem->room_title;
		$room_mem = $rsMem->room_mem;
		$room_details = $rsMem->room_details;
		$formHead = "Update Info";
	}
}
        
        //--------------Button Active--------------------
if(isset($_REQUEST['btnActive'])){
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		mysql_query("UPDATE activities SET status_id = 1 WHERE act_id = ".$_REQUEST['chkstatus'][$i]);
	}
	$class = "alert alert-success";
	$strMSG = "Record(s) updated successfully";
}
//--------------Button InActive--------------------
if(isset($_REQUEST['btnInactive'])){
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		mysql_query("UPDATE activities SET status_id = 0 WHERE act_id = ".$_REQUEST['chkstatus'][$i]);
	}
	$class = "alert alert-success";
	$strMSG = "Record(s) updated successfully";
}
//--------------Button Delete--------------------
if(isset($_REQUEST['btnDelete'])){
	if(isset($_REQUEST['chkstatus'])){
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		//mysql_query("DELETE FROM mem_sites WHERE site_id = ".$_REQUEST['chkstatus'][$i]);
		mysql_query("DELETE FROM rooms  WHERE room_id=".$_REQUEST['chkstatus'][$i]) or die(mysql_query());
	
	$class = "alert alert-success";
	$strMSG = "Record(s) deleted successfully";
	}
	}
	else{
		$msg_class='msg_box msg_alert';
		$strMSG = "Please check atleast one checkbox";
	}
}






?>

<?php include('includes/html_header.php');?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
        </ul>
        <div class="form-group hiddn-minibar pull-right">
            <!--<input type="text" class="form-control form-cascade-control nav-input-search" size="20" placeholder="Search through site" />
            <span class="input-icon fui-search"></span>-->
        </div>
        <h3 class="page-header"> Manage Rooms <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b>Manage Rooms: </b> You can manage your rooms here </p>
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
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Room Title</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Rooms Title..." value="<?php print($room_title);?>" id="room_title" name="room_title">
                                </div>
                             </div>
                          	  <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Room Max Members</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Rooms Max Members..." value="<?php print($room_mem);?>" id="room_mem" name="room_mem">
                                </div>
                             </div>                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Room Details</label>
                                <div class="col-lg-10 col-md-9">
                            	<textarea type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Rooms Details.." 
id="room_details" name="room_details"><?php print($room_details);?></textarea>
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
						<!-- /panel body --> 
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
            <label for="site_login" class="col-lg-2 col-md-3 control-label">Room Title</label>
            <div class="col-lg-10 col-md-9 det-display">
                <?php print($room_title); ?>
                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Rooms Title..." value="<?php //print($room_title); ?>" id="room_title" name="room_title" readonly>-->
            </div>
        </div>
        <div class="form-group">
            <label for="site_login" class="col-lg-2 col-md-3 control-label">Room Max Members</label>
            <div class="col-lg-10 col-md-9 det-display">
                <?php print($room_mem); ?>
                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Rooms Title..." value="<?php //print($room_title); ?>" id="room_title" name="room_title" readonly>-->
            </div>
        </div>
        <div class="form-group">
            <label for="site_login" class="col-lg-2 col-md-3 control-label">Room Details</label>
            <div class="col-lg-10 col-md-9 det-display">
                <?php print($room_details); ?>
                <!--<textarea type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Rooms Details.." id="room_details" name="room_details" readonly><?php //print($room_details); ?></textarea>-->
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
            <div class="col-lg-10 col-md-9">
                <button type="button" name="btnBack" class="btn btn-default btn-animate-demo" onclick="javascript: window.location = '<?php print($_SERVER['PHP_SELF']); ?>';">Back</button>
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
				 <div class="<?php print($class);?>"><?php print($strMSG);?></div>
					<div class="panel">
						<div class="panel-heading text-primary">
							<h3 class="panel-title"><i class="fa fa-windows"></i> Rooms
								<span class="pull-right" style="width:auto;">
								<!--<div class="btn-group code"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Classes used"><i class="fa fa-code"></i></a>
									<ul class="dropdown-menu pull-right list-group" role="menu">
										<li class="list-group-item"><code>.table-condensed</code></li>
										<li class="list-group-item"><code>.table-hover</code></li>
									</ul>
								</div>
								<a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a> <a  href="#"  class="panel-close"><i class="fa fa-times"></i></a> -->
                                                                    
                                                                        <?php 
                                                                            $total_rooms = totalCounts(" room_id ", " rooms ", ""); 
                                                                            if($total_rooms<12){
                                                                        ?>
									<div style="float:right;"><a href="<?php print($_SERVER['PHP_SELF']."?action=1");?>" title="Add New"><i class="fa fa-plus"></i> Add New</a></div>
                                                                        <?php
                                                                            }
                                                                        ?>
								</span> 
							</h3>
						</div>
						<div class="panel-body">
						<form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);?>" class="form-horizontal" role="form">
							<table class="table users-table table-condensed table-hover table-striped display dataTable" id="example" >
								<thead>
									<tr>
                                        <th class="visible-xs visible-sm visible-md visible-lg">Room Title</th>
                                        <th class="visible-xs visible-sm visible-md visible-lg">Room Max Members</th>
                                        <th class="visible-xs visible-sm visible-md visible-lg">Room Details</th>
                                        <th style="text-align:center">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
									if($_SESSION['user_id']>0){
										$Query="SELECT s.*, st.status_name FROM activities as s LEFT OUTER JOIN status AS st ON st.status_id=s.status_id  WHERE s.user_id=".$_SESSION['user_id']."";
										//$Query="SELECT s.*, st.status_name,  FROM activities as s LEFT OUTER JOIN status st ON st.status_id=s.status_id  WHERE s.user_id='".$_SESSION['user_id']."'";
									}
									else{
										$Query="SELECT * from rooms";
									}
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
		                                <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->room_title);?> </td>
		                                <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->room_mem);?></td>
		                                <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->room_details);?></td>
		                                <td style="width:100px">
		                                    <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF']."?show=1&room_id=".$row->room_id);?>" data-original-title="See Details" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-eye"></i></a></div>
		                                    <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF']."?action=2&room_id=".$row->room_id);?>" data-original-title="Update Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-edit"></i></a></div>
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
							<?php if($counter > 0) {?>
                                 <!--<input type="submit" name="btnActive" value="Active" class="btn btn-primary btn-animate-demo">
                                 <input type="submit" name="btnInactive" value="In Active" class="btn btn-danger btn-animate-demo">-->
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


