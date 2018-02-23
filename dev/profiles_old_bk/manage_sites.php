<?php 
include('includes/header.php'); 
$formHead = "Add New";
$strMSG = "";
$class = "";

if(isset($_REQUEST['member_id'])){
	$_SESSION['member_id'] = $_REQUEST['member_id'];
}
else{
	if(!isset($_SESSION['member_id'])){
		$_SESSION['member_id']=0;
	}
}

if(isset($_REQUEST['action'])){
	if(isset($_REQUEST['btnAdd'])){
		$siteid = getMaximum("mem_sites","site_id");
	//	$cntName = returnName("countries_name", "countries", "countries_id", $_REQUEST['countries_id']);
		$address = $_REQUEST['site_address'].",".$_REQUEST['site_city'].",".$_REQUEST['site_state'].",".$cntName.",".$_REQUEST['site_pcode'];
		$loc = getLnt($address);
		$lat = $loc['lat'];
		$lon = $loc['lng'];
		mysql_query("INSERT INTO mem_sites(site_id, mem_id, site_title, site_details, site_phone, site_mobile, site_address, site_city, site_state, site_pcode, countries_id, site_datecreated, status_id, site_long, site_lat) VALUES(".$siteid.", '".$_SESSION['member_id']."', '".$_REQUEST['site_title']."', '".$_REQUEST['site_details']."', '".$_REQUEST['site_phone']."', '".$_REQUEST['site_mobile']."', '".$_REQUEST['site_address']."', '".$_REQUEST['site_city']."', '".$_REQUEST['site_state']."', '".$_REQUEST['site_pcode']."', '".$_REQUEST['countries_id']."', '".date("Y-m-d")."', '1', '".$lon."', '".$lat."')") or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?op=1");
	}
	elseif(isset($_REQUEST['btnUpdate'])){
		$cntName = returnName("countries_name", "countries", "countries_id", $_REQUEST['countries_id']);
		$address = $_REQUEST['site_address'].",".$_REQUEST['site_city'].",".$_REQUEST['site_state'].",".$cntName.",".$_REQUEST['site_pcode'];
		$loc = getLnt($address);
		$lat = $loc['lat'];
		$lon = $loc['lng'];
		$udtQuery = "UPDATE mem_sites SET site_title='".$_REQUEST['site_title']."', site_details='".$_REQUEST['site_details']."', site_address='".$_REQUEST['site_address']."', site_pcode='".$_REQUEST['site_pcode']."', site_city='".$_REQUEST['site_city']."', site_state='".$_REQUEST['site_state']."', countries_id=".$_REQUEST['countries_id'].", site_phone='".$_REQUEST['site_phone']."', site_mobile='".$_REQUEST['site_mobile']."', site_lastupdated='".date("Y-m-d")."', site_long='".$lon."', site_lat='".$lat."' WHERE site_id=".$_REQUEST['site_id'];
		mysql_query($udtQuery) or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?op=2");
	}
	elseif($_REQUEST['action']==2){
		$rsM = mysql_query("SELECT * FROM mem_sites WHERE site_id=".$_REQUEST['site_id']);
		if(mysql_num_rows($rsM)>0){
			$rsMem = mysql_fetch_object($rsM);
			$site_id = $rsMem->site_id;
			$site_title = $rsMem->site_title;
			$site_details = $rsMem->site_details;
			$site_phone = $rsMem->site_phone;
			$site_mobile = $rsMem->site_mobile;
			$site_address = $rsMem->site_address;
			$site_city = $rsMem->site_city;
			$site_state = $rsMem->site_state;
			$site_pcode = $rsMem->site_pcode;
			$countries_id = $rsMem->countries_id;
			$site_long = $rsMem->site_long;
			$site_lat = $rsMem->site_lat;
			//$status_id = $rsMem->status_id;
			//$site_del = $rsMem->site_del;
			$formHead = "Update Info";
		}
	}
	else{
		$site_id = "";
		$site_title = "";
		$site_details = "";
		$site_phone = "";
		$site_mobile = "";
		$site_address = "";
		$site_city = "";
		$site_state = "";
		$site_pcode = "";
		$countries_id = 0;
		$site_long = "";
		$site_lat = "";
		$status_id = "";
		$formHead = "Add New";
	}
}
if(isset($_REQUEST['show'])){
	$rsM = mysql_query("SELECT m.*, c.countries_name FROM mem_sites AS m LEFT OUTER JOIN countries AS c ON c.countries_id=m.countries_id WHERE m.site_id=".$_REQUEST['site_id']);
	if(mysql_num_rows($rsM)>0){
		$rsMem = mysql_fetch_object($rsM);
		$site_id = $rsMem->site_id;
		$site_title = $rsMem->site_title;
		$site_details = $rsMem->site_details;
		$site_phone = $rsMem->site_phone;
		$site_mobile = $rsMem->site_mobile;
		$site_address = $rsMem->site_address;
		$site_city = $rsMem->site_city;
		$site_state = $rsMem->site_state;
		$site_pcode = $rsMem->site_pcode;
		$countries_id = $rsMem->countries_id;
		$countries_name = $rsMem->countries_name;
		$site_long = $rsMem->site_long;
		$site_lat = $rsMem->site_lat;
		//$status_id = $rsMem->status_id;
		//$site_del = $rsMem->site_del;
		$formHead = "Update Info";
	}
}
//--------------Button Active--------------------
if(isset($_REQUEST['btnActive'])){
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		mysql_query("UPDATE mem_sites SET status_id = 1 WHERE site_id = ".$_REQUEST['chkstatus'][$i]);
	}
	$class = "alert alert-success";
	$strMSG = "Record(s) updated successfully";
}
//--------------Button InActive--------------------
if(isset($_REQUEST['btnInactive'])){
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		mysql_query("UPDATE mem_sites SET status_id = 0 WHERE site_id = ".$_REQUEST['chkstatus'][$i]);
	}
	$class = "alert alert-success";
	$strMSG = "Record(s) updated successfully";
}
//--------------Button Delete--------------------
if(isset($_REQUEST['btnDelete'])){
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		//mysql_query("DELETE FROM mem_sites WHERE site_id = ".$_REQUEST['chkstatus'][$i]);
		mysql_query("UPDATE mem_sites SET site_del=1 WHERE site_id=".$_REQUEST['chkstatus'][$i]) or die(mysql_query());
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
					<h3 class="page-header"> Sites Management <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>
					<blockquote class="page-information hidden">
						<p> <b>Sites Management</b> is the section where you can Add / Update / Remove / Activate or Inactivate any site (Physical Location). </p>
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
									<label for="site_login" class="col-lg-2 col-md-3 control-label">Site Title:</label>
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control form-cascade-control input_wid70 required" name="site_title" id="site_title" value="<?php print($site_title);?>" placeholder="Site Title">
									</div>
								</div>
								<div class="form-group">
									<label for="site_fname" class="col-lg-2 col-md-3 control-label">Details:</label>
									<div class="col-lg-10 col-md-9"> 
										<input type="text" class="form-control form-cascade-control input_wid70 required" name="site_details" id="site_details" value="<?php print($site_details);?>" placeholder="Details">
									</div>
								</div>
								<div class="form-group">
									<label for="site_phone" class="col-lg-2 col-md-3 control-label">Phone:</label>
									<div class="col-lg-10 col-md-9">
										<input type="tel" class="form-control form-cascade-control input_wid70" name="site_phone" id="site_phone" value="<?php print($site_phone);?>" placeholder="Phone">
									</div>
								</div>
								<div class="form-group">
									<label for="site_mobile" class="col-lg-2 col-md-3 control-label">Mobile:</label>
									<div class="col-lg-10 col-md-9">
										<input type="tel" class="form-control form-cascade-control input_wid70" name="site_mobile" id="site_mobile" value="<?php print($site_mobile);?>" placeholder="Mobile">
									</div>
								</div>
								<div class="form-group">
									<label for="site_address" class="col-lg-2 col-md-3 control-label">Address:</label>
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control form-cascade-control input_wid70" name="site_address" id="site_address" value="<?php print($site_address);?>" placeholder="Address">
									</div>
								</div>
								<div class="form-group">
									<label for="site_city" class="col-lg-2 col-md-3 control-label">City:</label>
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control form-cascade-control input_wid70 required" name="site_city" id="site_city" value="<?php print($site_city);?>" placeholder="City">
									</div>
								</div>
								<div class="form-group">
									<label for="site_state" class="col-lg-2 col-md-3 control-label">State:</label>
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control form-cascade-control input_wid70" name="site_state" id="site_state" value="<?php print($site_state);?>" placeholder="State">
									</div>
								</div>
								<div class="form-group">
									<label for="site_pcode" class="col-lg-2 col-md-3 control-label">Zip:</label>
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control form-cascade-control input_wid70 required" name="site_pcode" id="site_pcode" value="<?php print($site_pcode);?>" placeholder="Zip">
									</div>
								</div>
								<div class="form-group">
									<label for="countries_id" class="col-lg-2 col-md-3 control-label">Country:</label>
									<div class="col-lg-10 col-md-9">
										<select data-placeholder="Choose a Country..." name="countries_id" id="countries_id" class="chosen-select required" style="width:350px;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("countries", "countries_id", "countries_name", $countries_id);?>
										</select>
									</div>
								</div>
                                <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Status</label>
                                 <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Country..." name="status_id" id="status_id" class="chosen-select required" style="width:350px;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("status", "status_id", "status_name", $status_id);?>
										</select>
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
							<form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);?>" class="form-horizontal" role="form">
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Site Title:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($site_title);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Details:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($site_details);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Phone:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($site_phone);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Mobile:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($site_mobile);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Address:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($site_address);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">City:</label>
									<div class="col-lg-10 col-md-9"><?php print($site_city);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">State:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($site_state);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Zip:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($site_pcode);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Country:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($countries_name);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Latitude:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($site_lat);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Longitude:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($site_long);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
									<div class="col-lg-10 col-md-9">
										<button type="button" name="btnBack" class="btn btn-default btn-animate-demo" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']);?>';">Back</button>
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
					<form method="post" name="frmMember" action="<?php print($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);?>">
					Client:  
					<select name="member_id" id="member_id" class="chosen-select" style="width:150px;" onChange="javascript: frmMember.submit();">
						<option value="0">All</option>
						<?php FillSelected2("members", "mem_id", "mem_fname", $_SESSION['member_id'], "utype_id=3");?>
					</select>
					</form>
				</div>
					<div class="panel">
						<div class="panel-heading text-primary">
							<h3 class="panel-title"><i class="fa fa-sitemap"></i> Sites 
								<span class="pull-right" style="width:auto;">
								<!--<div class="btn-group code"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Classes used"><i class="fa fa-code"></i></a>
									<ul class="dropdown-menu pull-right list-group" role="menu">
										<li class="list-group-item"><code>.table-condensed</code></li>
										<li class="list-group-item"><code>.table-hover</code></li>
									</ul>
								</div>
								<a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a> <a  href="#"  class="panel-close"><i class="fa fa-times"></i></a> -->
									<div style="float:right;"><a href="<?php print($_SERVER['PHP_SELF']."?action=1");?>" title="Add New"><i class="fa fa-plus"></i> Add New</a></div>
								</span> 
							</h3>
						</div>
						<div class="panel-body">
						<form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);?>" class="form-horizontal" role="form">
							<table class="table users-table table-condensed table-hover table-striped" >
								<thead>
									<tr>
										<th class="visible-lg"><input type="checkbox" name="chkAll" onClick="setAll();"></th>
										<th class="visible-lg">Title</th>
										<th class="visible-lg">Address</th>
										<th class="visible-lg">Date</th>
										<th>Last Updated</th>
										<th>Status</th>
										<th width="140">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
									if($_SESSION['member_id']>0){
										$Query="SELECT s.*, st.status_name, c.countries_name FROM mem_sites as s LEFT OUTER JOIN status st ON st.status_id=s.status_id LEFT OUTER JOIN countries c ON c.countries_id=s.countries_id WHERE s.mem_id='".$_SESSION['member_id']."'";
									}
									else{
										$Query="SELECT s.*, st.status_name, c.countries_name FROM mem_sites as s LEFT OUTER JOIN status st ON st.status_id=s.status_id LEFT OUTER JOIN countries c ON c.countries_id=s.countries_id";
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
										<td class="visible-lg"><?php print($row->site_title);?> </td>
										<td class="visible-lg"><?php print($row->site_address.", ".$row->site_city.", ".$row->site_state.", ".$row->site_pcode." - ".$row->countries_name);?></td>
										<td class="visible-lg"><?php print($row->site_datecreated);?></td>
										<td><?php print($row->site_lastupdated);?></td>
										<td><?php print($row->status_name);?></td>
										<td><!--<button type="button" class="btn btn-success"><i class="fa fa-envelope"></i></button>-->
											<button type="button" class="btn btn-success" onclick="javascript: window.location='manage_beacons.php?member_id=<?php print($row->mem_id);?>&bsite_id=<?php print($row->site_id);?>';"><i class="fa fa-sitemap"></i></button>
											<button type="button" class="btn btn-info" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']."?show=1&site_id=".$row->site_id);?>';"><i class="fa fa-eye"></i></button>
											<button type="button" class="btn btn-warning" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']."?action=2&site_id=".$row->site_id);?>';"><i class="fa fa-edit"></i></button></td>
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