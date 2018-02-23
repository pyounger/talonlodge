<?php 
include('includes/header.php'); 
$formHead = "Add New";
$strMSG = "";
$class = "";

if(isset($_REQUEST['bsite_id'])){
	$_SESSION['bsite_id'] = $_REQUEST['bsite_id'];
}
else{
	if(!isset($_SESSION['bsite_id'])){
		$_SESSION['bsite_id']=0;
	}
	$site_id = $_SESSION['bsite_id'];
}

if(isset($_REQUEST['action'])){
	if(isset($_REQUEST['btnAdd'])){
		$msb_id = getMaximum("msite_beacons","msb_id");
		mysql_query("INSERT INTO msite_beacons(msb_id, site_id, msb_name, msb_details, msb_location, msb_datecreated, status_id, msb_uuid) VALUES(".$msb_id.", '".$_REQUEST['site_id']."', '".$_REQUEST['msb_name']."', '".$_REQUEST['msb_details']."', '".$_REQUEST['msb_location']."', '".date("Y-m-d")."', '1', '".$_REQUEST['msb_uuid']."')") or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?member_id=".$_REQUEST['member_id']."&op=1");
	}
	elseif(isset($_REQUEST['btnUpdate'])){
		$udtQuery = "UPDATE msite_beacons SET msb_name='".$_REQUEST['msb_name']."', msb_details='".$_REQUEST['msb_details']."', msb_location='".$_REQUEST['msb_location']."', msb_lastupdated='".date("Y-m-d")."', msb_uuid='".$_REQUEST['msb_uuid']."' WHERE msb_id=".$_REQUEST['msb_id'];
		mysql_query($udtQuery) or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?member_id=".$_REQUEST['member_id']."&op=2");
	}
	elseif($_REQUEST['action']==2){
		$rsM = mysql_query("SELECT * FROM msite_beacons WHERE msb_id=".$_REQUEST['msb_id']);
		if(mysql_num_rows($rsM)>0){
			$rsMem = mysql_fetch_object($rsM);
			$msb_id = $rsMem->msb_id;
			$site_id = $rsMem->site_id;
			$msb_name = $rsMem->msb_name;
			$msb_details = $rsMem->msb_details;
			$msb_location = $rsMem->msb_location;
			$msb_uuid = $rsMem->msb_uuid;
			$formHead = "Update Info";
		}
	}
	else{
		$msb_id = 0;
		$site_id = 0;
		$msb_name = "";
		$msb_details = "";
		$msb_location = "";
		$msb_uuid = "";
		$formHead = "Add New";
	}
}
if(isset($_REQUEST['show'])){
	$rsM = mysql_query("SELECT * FROM msite_beacons WHERE msb_id=".$_REQUEST['msb_id']);
	if(mysql_num_rows($rsM)>0){
		$rsMem = mysql_fetch_object($rsM);
		$msb_id = $rsMem->msb_id;
		$site_id = $rsMem->site_id;
		$msb_name = $rsMem->msb_name;
		$msb_details = $rsMem->msb_details;
		$msb_location = $rsMem->msb_location;
		$msb_uuid = $rsMem->msb_uuid;
		$formHead = "Update Info";
	}
}
//--------------Button Active--------------------
if(isset($_REQUEST['btnActive'])){
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		mysql_query("UPDATE msite_beacons SET status_id=1 WHERE msb_id=".$_REQUEST['chkstatus'][$i]);
	}
	$class = "alert alert-success";
	$strMSG = "Record(s) updated successfully";
}
//--------------Button InActive--------------------
if(isset($_REQUEST['btnInactive'])){
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		mysql_query("UPDATE msite_beacons SET status_id=0 WHERE msb_id=".$_REQUEST['chkstatus'][$i]);
	}
	$class = "alert alert-success";
	$strMSG = "Record(s) updated successfully";
}
//--------------Button Delete--------------------
if(isset($_REQUEST['btnDelete'])){
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		//mysql_query("DELETE FROM mem_sites WHERE site_id = ".$_REQUEST['chkstatus'][$i]);
		mysql_query("UPDATE msite_beacons SET site_del=1 WHERE msb_id=".$_REQUEST['chkstatus'][$i]) or die(mysql_query());
	}
	$class = "alert alert-success";
	$strMSG = "Record(s) deleted successfully";
}
if(isset($_REQUEST['op'])){
	switch ($_REQUEST['op']) {
		case 1:
			$class = "alert alert-success";
			$strMSG = "Record Added Successfully";
			break;
		case 2:
			$strMSG = " Record Updated Successfully";
			$class = "alert alert-success";
			break;
		case 4:
			$class = "notification success";
			$strMSG = "Please Select Checkbox to Add or Subtract Credits";
			break;
	}
}
?>
			<!-- /header -->
			<div class="row">
				<div class="col-mod-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Dashboard</a></li>
						<!--<li><a href="template.php">Basic Template</a></li>
						<li class="active">BreadCrumb</li>-->
					</ul>
					<div class="form-group hiddn-minibar pull-right">
						<!--<input type="text" class="form-control form-cascade-control nav-input-search" size="20" placeholder="Search through site" />
						<span class="input-icon fui-search"></span>--> </div>
					<h3 class="page-header"> Site Beacons Management <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>
					<blockquote class="page-information hidden">
						<p> <b>Site Beacons Management</b> is the section where you can Add / Update / Remove / Activate or Inactivate beacons of your site. </p>
					</blockquote>
				</div>
			</div>
			<div class="<?php print($class);?>"><?php print($strMSG);?></div>
		<?php if(isset($_REQUEST['action'])){ ?>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-cascade">
						<div class="panel-heading">
							<h3 class="panel-title">
								<?php print($formHead);?>
								<!--<span class="pull-right">
									<a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
									<a  href="#"  class="panel-close"><i class="fa fa-times"></i></a>
								</span>-->
							</h3>
						</div>
						<div class="panel-body">
							<form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);?>" class="form-horizontal" role="form">
								<div class="form-group">
									<label for="site_login" class="col-lg-2 col-md-3 control-label">Site:</label>
									<div class="col-lg-10 col-md-9">
										<select name="site_id" id="site_id" class="chosen-select" style="width:150px;">
											<?php FillSelected2("mem_sites", "site_id", "site_title", $site_id, "mem_id=2");?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="site_login" class="col-lg-2 col-md-3 control-label">Beacon UUID:</label>
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control form-cascade-control input_wid70 required" name="msb_uuid" id="msb_uuid" value="<?php print($msb_uuid);?>" placeholder="Beacon UUID">
									</div>
								</div>
								<div class="form-group">
									<label for="site_login" class="col-lg-2 col-md-3 control-label">Beacon Title:</label>
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control form-cascade-control input_wid70 required" name="msb_name" id="msb_name" value="<?php print($msb_name);?>" placeholder="Beacon Title">
									</div>
								</div>
								<div class="form-group">
									<label for="site_fname" class="col-lg-2 col-md-3 control-label">Details:</label>
									<div class="col-lg-10 col-md-9"> 
										<input type="text" class="form-control form-cascade-control input_wid70 required" name="msb_details" id="msb_details" value="<?php print($msb_details);?>" placeholder="Details">
									</div>
								</div>
								<div class="form-group">
									<label for="site_address" class="col-lg-2 col-md-3 control-label">Location:</label>
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control form-cascade-control input_wid70" name="msb_location" id="msb_location" value="<?php print($msb_location);?>" placeholder="Location">
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
										<button type="button" name="btnCancel" class="btn btn-default btn-animate-demo" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']."?member_id=".$_REQUEST['member_id']);?>';">Cancel</button>
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
							<form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);?>" class="form-horizontal" role="form">
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Beacon UUID:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($msb_uuid);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Beacon Title:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($msb_name);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Details:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($msb_details);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Location:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($msb_location);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
									<div class="col-lg-10 col-md-9">
										<button type="button" name="btnBack" class="btn btn-default btn-animate-demo" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']."?member_id=".$_REQUEST['member_id']);?>';">Back</button>
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
					<div>
						<form method="post" name="frmSites" action="<?php print($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);?>">
						Sites:  
						<select name="bsite_id" id="bsite_id" class="chosen-select" style="width:150px;" onChange="javascript: frmSites.submit();">
							<option value="0">All</option>
							<?php FillSelected2("mem_sites", "site_id", "site_title", $_SESSION['bsite_id'], "mem_id=".$_REQUEST['member_id']);?>
						</select>
						</form>
					</div>
					<div class="panel">
						<div class="panel-heading text-primary">
							<h3 class="panel-title"><i class="fa fa-sitemap"></i> Beacons 
								<span class="pull-right" style="width:auto;">
								<!--<div class="btn-group code"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Classes used"><i class="fa fa-code"></i></a>
									<ul class="dropdown-menu pull-right list-group" role="menu">
										<li class="list-group-item"><code>.table-condensed</code></li>
										<li class="list-group-item"><code>.table-hover</code></li>
									</ul>
								</div>
								<a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a> <a  href="#"  class="panel-close"><i class="fa fa-times"></i></a> -->
									<div style="float:right;"><a href="<?php print($_SERVER['PHP_SELF']."?action=1&member_id=".$_REQUEST['member_id']);?>" title="Add New"><i class="fa fa-plus"></i> Add New</a></div>
								</span> 
							</h3>
						</div>
						<div class="panel-body">
						<form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);?>" class="form-horizontal" role="form">
							<table class="table users-table table-condensed table-hover table-striped" >
								<thead>
									<tr>
										<th class="visible-lg"><input type="checkbox" name="chkAll" onClick="setAll();"></th>
										<th class="visible-lg">UUID</th>
										<th class="visible-lg">Title</th>
										<th class="visible-lg">Location</th>
										<th class="visible-lg">Date</th>
										<th>Last Updated</th>
										<th>Status</th>
										<th width="140">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
									if($_SESSION['bsite_id']>0){
										$Query="SELECT b.*, st.status_name FROM msite_beacons AS b LEFT OUTER JOIN status st ON st.status_id=b.status_id WHERE b.site_id='".$_SESSION['bsite_id']."'";
									}
									else{
										$Query="SELECT b.*, st.status_name FROM msite_beacons AS b LEFT OUTER JOIN status st ON st.status_id=b.status_id";
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
										<td class="visible-lg"><input type="checkbox" name="chkstatus[]" value="<?php print($row->site_id);?>" /></td>
										<td class="visible-lg"><?php print($row->msb_uuid);?> </td>
										<td class="visible-lg"><?php print($row->msb_name);?> </td>
										<td class="visible-lg"><?php print($row->msb_location);?></td>
										<td class="visible-lg"><?php print($row->msb_datecreated);?></td>
										<td><?php print($row->msb_lastupdated);?></td>
										<td><?php print($row->status_name);?></td>
										<td><button type="button" class="btn btn-success" onclick="javascript: window.location='<?php print("beacon_contents.php?member_id=".$_REQUEST['member_id']."&msb_id=".$row->msb_id);?>';"><i class="fa fa-comment"></i></button>
											<button type="button" class="btn btn-info" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']."?show=1&member_id=".$_REQUEST['member_id']."&msb_id=".$row->msb_id);?>';"><i class="fa fa-eye"></i></button>
											<button type="button" class="btn btn-warning" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']."?action=2&member_id=".$_REQUEST['member_id']."&msb_id=".$row->msb_id);?>';"><i class="fa fa-edit"></i></button></td>
									</tr>
								<?php
										}
									}
									else{
										print('<tr><td colspan="100%" align="center">No record found!</td></tr>');
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
                                 <input type="submit" name="btnActive" value="Active" class="btn btn-primary btn-animate-demo">
                                 <input type="submit" name="btnInactive" value="In Active" class="btn btn-danger btn-animate-demo">
							<?php }?>
							</form>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
			<!-- Demo Panel -->
<!--			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-cascade">
						<div class="panel-heading">
							<h3 class="panel-title text-primary"> Demo Panel <span class="pull-right"> <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a> <a href="#" class="panel-close"><i class="fa fa-times"></i></a> </span> </h3>
						</div>
						<div class="panel-body panel-border"> This is a basic template page to quick start your project. </div>
					</div>
				</div>
			</div>-->
		</div>
		<!-- /.content --> 
		
		<!-- .right-sidebar -->
		<?php include("includes/rightsidebar.php")?>
	</div>
	<!-- /.right-sidebar --> 
	
	<!-- /rightside bar --> 
	
</div>
<!-- /.box-holder -->
</div>
<!-- /.site-holder -->

<?php include("includes/bottom_js.php")?>
</body>
</html>
<?php include("../lib/closeCon.php"); ?>