<?php 
include('includes/header.php'); 
$formHead = "Add New";
$strMSG = "";
$class = "";

if(isset($_REQUEST['action'])){
	if(isset($_REQUEST['btnAdd'])){
		$msb_id = getMaximum("beacon_contents","bcnt_id");
		$mfileName = "";
		$dirName = "files/contents/";
		if (!empty($_FILES["mFile"]["name"])){
			$mfileName = $msb_id."_".$_FILES["mFile"]["name"];
			if(move_uploaded_file($_FILES['mFile']['tmp_name'], $dirName.$mfileName)){
				//createThumbnail2($dirName, $mfileName, $dirName."th/", "200", "200");
			}
		}
		mysql_query("INSERT INTO beacon_contents(bcnt_id, msb_id, bcnt_title, bcnt_details, bcnt_type_id, bcnt_file) VALUES(".$msb_id.", '".$_REQUEST['msb_id']."', '".$_REQUEST['bcnt_title']."', '".$_REQUEST['bcnt_details']."', '".$_REQUEST['bcnt_type_id']."', '".$mfileName."')") or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?member_id=".$_REQUEST['member_id']."&msb_id=".$_REQUEST['msb_id']."&op=1");
	}
	elseif(isset($_REQUEST['btnUpdate'])){
		$dirName = "files/contents/";
		$mfileName = $_REQUEST['mfileName'];
		if (!empty($_FILES["mFile"]["name"])){
			@unlink($dirName.$_REQUEST['mfileName']);
			$mfileName = $_REQUEST['bcnt_id']."_".$_FILES["mFile"]["name"];
			if(move_uploaded_file($_FILES['mFile']['tmp_name'], $dirName.$mfileName)) {
				//createThumbnail2($dirName, $mfileName, $dirName."th/", "200", "200");
			}
		}
		$udtQuery = "UPDATE beacon_contents SET bcnt_title='".$_REQUEST['bcnt_title']."', bcnt_details='".$_REQUEST['bcnt_details']."', bcnt_type_id='".$_REQUEST['bcnt_type_id']."', bcnt_file='".$mfileName."' WHERE bcnt_id=".$_REQUEST['bcnt_id'];
		mysql_query($udtQuery) or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?member_id=".$_REQUEST['member_id']."&msb_id=".$_REQUEST['msb_id']."&op=2");
	}
	elseif($_REQUEST['action']==2){
		$rsM = mysql_query("SELECT c.*, t.bcnt_type_name FROM beacon_contents As c LEFT OUTER JOIN beacon_content_type AS t ON t.bcnt_type_id=c.bcnt_type_id WHERE c.bcnt_id=".$_REQUEST['bcnt_id']);
		if(mysql_num_rows($rsM)>0){
			$rsMem = mysql_fetch_object($rsM);
			$bcnt_id = $rsMem->bcnt_id;
			$bcnt_title = $rsMem->bcnt_title;
			$bcnt_details = $rsMem->bcnt_details;
			$bcnt_type_id = $rsMem->bcnt_type_id;
			$bcnt_type_name = $rsMem->bcnt_type_name;
			$mfileName = $rsMem->bcnt_file;
			$formHead = "Update Info";
		}
	}
	else{
		$bcnt_id = 0;
		$bcnt_title = "";
		$bcnt_details = "";
		$bcnt_type_id = "";
		$bcnt_type_name = "";
		$mfileName = "";
		$formHead = "Add New";
	}
}
if(isset($_REQUEST['show'])){
	$rsM = mysql_query("SELECT c.*, t.bcnt_type_name FROM beacon_contents As c LEFT OUTER JOIN beacon_content_type AS t ON t.bcnt_type_id=c.bcnt_type_id WHERE c.bcnt_id=".$_REQUEST['bcnt_id']);
	if(mysql_num_rows($rsM)>0){
		$rsMem = mysql_fetch_object($rsM);
		$bcnt_id = $rsMem->bcnt_id;
		$bcnt_title = $rsMem->bcnt_title;
		$bcnt_details = $rsMem->bcnt_details;
		$bcnt_type_id = $rsMem->bcnt_type_id;
		$bcnt_type_name = $rsMem->bcnt_type_name;
		$mfileName = $rsMem->bcnt_file;
		$formHead = "Update Info";
	}
}
//--------------Button Active--------------------
if(isset($_REQUEST['btnActive'])){
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		mysql_query("UPDATE beacon_contents SET status_id=1 WHERE msb_id=".$_REQUEST['chkstatus'][$i]);
	}
	$class = "alert alert-success";
	$strMSG = "Record(s) updated successfully";
}
//--------------Button InActive--------------------
if(isset($_REQUEST['btnInactive'])){
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		mysql_query("UPDATE beacon_contents SET status_id=0 WHERE msb_id=".$_REQUEST['chkstatus'][$i]);
	}
	$class = "alert alert-success";
	$strMSG = "Record(s) updated successfully";
}
//--------------Button Delete--------------------
if(isset($_REQUEST['btnDelete'])){
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		//mysql_query("DELETE FROM mem_sites WHERE site_id = ".$_REQUEST['chkstatus'][$i]);
		mysql_query("UPDATE beacon_contents SET site_del=1 WHERE msb_id=".$_REQUEST['chkstatus'][$i]) or die(mysql_query());
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
					<h3 class="page-header"> Site Beacon Contents Management <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>
					<blockquote class="page-information hidden">
						<p> <b>Site Beacon Contents Management</b> is the section where you can manage the contents of specific beacon. </p>
					</blockquote>
				</div>
			</div>
			<div"><div class="<?php print($class);?>"><?php print($strMSG);?></div>
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
									<label for="bcnt_type_id" class="col-lg-2 col-md-3 control-label">Content Type:</label>
									<div class="col-lg-10 col-md-9">
										<select name="bcnt_type_id" id="bcnt_type_id" class="chosen-select" style="width:150px;">
											<?php FillSelected("beacon_content_type", "bcnt_type_id", "bcnt_type_name", $bcnt_type_id);?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="bcnt_title" class="col-lg-2 col-md-3 control-label">Title:</label>
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control form-cascade-control input_wid70 required" name="bcnt_title" id="bcnt_title" value="<?php print($bcnt_title);?>" placeholder="Title">
									</div>
								</div>
								<div class="form-group">
									<label for="bcnt_details" class="col-lg-2 col-md-3 control-label">Details:</label>
									<div class="col-lg-10 col-md-9"> 
										<input type="text" class="form-control form-cascade-control input_wid70 required" name="bcnt_details" id="bcnt_details" value="<?php print($bcnt_details);?>" placeholder="Details">
									</div>
								</div>
								<div class="form-group">
									<label for="mFile" class="col-lg-2 col-md-3 control-label">File:</label>
									<div class="col-lg-10 col-md-9" align="left">
										<input id="mFile" name="mFile" type="file" style="float:left;" class="required" />
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
									<div class="col-lg-10 col-md-9">
										<input type="hidden" name="mfileName" value="<?php print($mfileName);?>" />
									<?php if($_REQUEST['action']==1){ ?>
										<button type="submit" name="btnAdd" class="btn btn-primary btn-animate-demo">Submit</button>
									<?php } else{ ?>
										<button type="submit" name="btnUpdate" class="btn btn-primary btn-animate-demo">Submit</button>
									<?php } ?>
										<button type="button" name="btnCancel" class="btn btn-default btn-animate-demo" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']."?member_id=".$_REQUEST['member_id']."&msb_id=".$_REQUEST['msb_id']);?>';">Cancel</button>
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
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Content Type::</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($bcnt_type_name);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Title:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($bcnt_location);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Details:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($bcnt_details);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
									<div class="col-lg-10 col-md-9">
										<button type="button" name="btnBack" class="btn btn-default btn-animate-demo" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']."?member_id=".$_REQUEST['member_id']."&msb_id=".$_REQUEST['msb_id']);?>';">Back</button>
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
					<div class="panel">
						<div class="panel-heading text-primary">
							<h3 class="panel-title"><i class="fa fa-sitemap"></i> Beacons Contents
								<span class="pull-right" style="width:auto;">
								<!--<div class="btn-group code"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Classes used"><i class="fa fa-code"></i></a>
									<ul class="dropdown-menu pull-right list-group" role="menu">
										<li class="list-group-item"><code>.table-condensed</code></li>
										<li class="list-group-item"><code>.table-hover</code></li>
									</ul>
								</div>
								<a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a> <a  href="#"  class="panel-close"><i class="fa fa-times"></i></a> -->
									<div style="float:right;"><a href="<?php print($_SERVER['PHP_SELF']."?action=1&member_id=".$_REQUEST['member_id']."&msb_id=".$_REQUEST['msb_id']);?>" title="Add New"><i class="fa fa-plus"></i> Add New</a></div>
								</span> 
							</h3>
						</div>
						<div class="panel-body">
						<form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);?>" class="form-horizontal" role="form">
							<table class="table users-table table-condensed table-hover table-striped" >
								<thead>
									<tr>
										<th width="30" class="visible-lg"><input type="checkbox" name="chkAll" onClick="setAll();"></th>
										<th class="visible-lg">Title</th>
										<th class="visible-lg">Details</th>
										<th width="120" class="visible-lg">Type</th>
										<th width="50">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$Query="SELECT c.*, t.bcnt_type_name FROM beacon_contents As c LEFT OUTER JOIN beacon_content_type AS t ON t.bcnt_type_id=c.bcnt_type_id WHERE c.msb_id=".$_REQUEST['msb_id'];
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
										<td class="visible-lg"><input type="checkbox" name="chkstatus[]" value="<?php print($row->bcnt_id);?>" /></td>
										<td class="visible-lg"><?php print($row->bcnt_title);?> </td>
										<td class="visible-lg"><?php print($row->bcnt_details);?></td>
										<td class="visible-lg"><?php print($row->bcnt_type_name);?></td>
										<td>
											<button type="button" class="btn btn-warning" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']."?action=2&member_id=".$_REQUEST['member_id']."&msb_id=".$row->msb_id."&bcnt_id=".$row->bcnt_id);?>';"><i class="fa fa-edit"></i></button>
										</td>
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
                                <!-- <input type="submit" name="btnActive" value="Active" class="btn btn-primary btn-animate-demo">
                                 <input type="submit" name="btnInactive" value="In Active" class="btn btn-danger btn-animate-demo">-->
							<?php }?>
							</form>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
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