<?php 
include('includes/header.php'); 
$formHead = "Add New";
$strMSG = "";
$class = "";
if(isset($_REQUEST['action'])){
	if(isset($_REQUEST['btnAdd'])){
		if(IsExist("mem_id", "members", "mem_login", $_REQUEST['mem_login'])){
			$strMSG = "Username already exist";
		}
		else{
			$memid = getMaximum("members","mem_id");
			mysql_query("INSERT INTO members(mem_id, mem_login, mem_password, mem_fname, mem_lname, mem_company, mem_phone, mem_mobile, mem_address, mem_city, mem_state, mem_pcode, countries_id, mem_datecreated, mem_confirm, status_id, mem_isadmin, utype_id) VALUES(".$memid.", '".$_REQUEST['mem_login']."', '".md5($_REQUEST['mem_password'])."', '".$_REQUEST['mem_fname']."', '".$_REQUEST['mem_lname']."', '".$_REQUEST['mem_company']."', '".$_REQUEST['mem_phone']."', '".$_REQUEST['mem_mobile']."', '".$_REQUEST['mem_address']."', '".$_REQUEST['mem_city']."', '".$_REQUEST['mem_state']."', '".$_REQUEST['mem_pcode']."', '".$_REQUEST['countries_id']."', '".date("Y-m-d")."', '1', '1', '0', '3')") or die(mysql_error());
			header("Location: ".$_SERVER['PHP_SELF']."?op=1");
		}
	}
	elseif(isset($_REQUEST['btnUpdate'])){
		$udtQuery = "UPDATE members SET mem_fname='".$_REQUEST['mem_fname']."', mem_lname='".$_REQUEST['mem_lname']."', mem_company='".$_REQUEST['mem_company']."', mem_address='".$_REQUEST['mem_address']."', mem_pcode='".$_REQUEST['mem_pcode']."', mem_city='".$_REQUEST['mem_city']."', mem_state='".$_REQUEST['mem_state']."', countries_id=".$_REQUEST['countries_id'].", mem_phone='".$_REQUEST['mem_phone']."', mem_mobile='".$_REQUEST['mem_mobile']."', mem_lastupdated='".date("Y-m-d")."' WHERE mem_id=".$_REQUEST['mem_id'];
		mysql_query($udtQuery) or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?op=2");
	}
	elseif($_REQUEST['action']==2){
		$rsM = mysql_query("SELECT * FROM members WHERE mem_id=".$_REQUEST['mem_id']);
		if(mysql_num_rows($rsM)>0){
			$rsMem = mysql_fetch_object($rsM);
			$mem_id = $rsMem->mem_id;
			$mem_login = $rsMem->mem_login;
			$mem_fname = $rsMem->mem_fname;
			$mem_lname = $rsMem->mem_lname;
			$mem_company = $rsMem->mem_company;
			$mem_email = $rsMem->mem_email;
			$mem_phone = $rsMem->mem_phone;
			$mem_mobile = $rsMem->mem_mobile;
			$mem_address = $rsMem->mem_address;
			$mem_city = $rsMem->mem_city;
			$mem_state = $rsMem->mem_state;
			$mem_pcode = $rsMem->mem_pcode;
			$countries_id = $rsMem->countries_id;
			//$status_id = $rsMem->status_id;
			//$mem_del = $rsMem->mem_del;
			$mem_isadmin = $rsMem->mem_isadmin;
			$utype_id = $rsMem->utype_id;
			$formHead = "Update Info";
		}
	}
	else{
		$mem_id = "";
		$mem_login = "";
		$mem_fname = "";
		$mem_lname = "";
		$mem_company = "";
		$mem_email = "";
		$mem_phone = "";
		$mem_mobile = "";
		$mem_address = "";
		$mem_city = "";
		$mem_state = "";
		$mem_pcode = "";
		$countries_id = 0;
		$status_id = "";
		$mem_del = "";
		$mem_isadmin = "";
		$utype_id = "";
		$formHead = "Add New";
	}
}
if(isset($_REQUEST['show'])){
	$rsM = mysql_query("SELECT m.*, c.countries_name FROM members AS m LEFT OUTER JOIN countries AS c ON c.countries_id=m.countries_id WHERE m.mem_id=".$_REQUEST['mem_id']);
	if(mysql_num_rows($rsM)>0){
		$rsMem = mysql_fetch_object($rsM);
		$mem_id = $rsMem->mem_id;
		$mem_login = $rsMem->mem_login;
		$mem_fname = $rsMem->mem_fname;
		$mem_lname = $rsMem->mem_lname;
		$mem_company = $rsMem->mem_company;
		$mem_email = $rsMem->mem_email;
		$mem_phone = $rsMem->mem_phone;
		$mem_mobile = $rsMem->mem_mobile;
		$mem_address = $rsMem->mem_address;
		$mem_city = $rsMem->mem_city;
		$mem_state = $rsMem->mem_state;
		$mem_pcode = $rsMem->mem_pcode;
		$countries_id = $rsMem->countries_id;
		$countries_name = $rsMem->countries_name;
		//$status_id = $rsMem->status_id;
		//$mem_del = $rsMem->mem_del;
		$mem_isadmin = $rsMem->mem_isadmin;
		$utype_id = $rsMem->utype_id;
		$formHead = "Update Info";
	}
}
//--------------Button Active--------------------
if(isset($_REQUEST['btnActive'])){
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		mysql_query("UPDATE members SET status_id = 1 WHERE mem_id = ".$_REQUEST['chkstatus'][$i]);
	}
	$class = "alert alert-success";
	$strMSG = "Record(s) updated successfully";
}
//--------------Button InActive--------------------
if(isset($_REQUEST['btnInactive'])){
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		mysql_query("UPDATE members SET status_id = 0 WHERE mem_id = ".$_REQUEST['chkstatus'][$i]);
	}
	$class = "alert alert-success";
	$strMSG = "Record(s) updated successfully";
}
//--------------Button Confirm--------------------
if(isset($_REQUEST['btnConfirm'])){
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		mysql_query("UPDATE members SET mem_confirm = 1 WHERE mem_id = ".$_REQUEST['chkstatus'][$i]);
	}
	$class = "alert alert-success";
	$strMSG = "Record(s) updated successfully";
}
//--------------Button Not Confirm--------------------
if(isset($_REQUEST['btnNotConfirm'])){
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		mysql_query("UPDATE members SET mem_confirm = 0 WHERE mem_id = ".$_REQUEST['chkstatus'][$i]);
	}
	$class = "alert alert-success";
	$strMSG = "Record(s) updated successfully";
}
//--------------Button Delete--------------------
if(isset($_REQUEST['btnDelete'])){
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		//mysql_query("DELETE FROM members WHERE mem_id = ".$_REQUEST['chkstatus'][$i]);
		mysql_query("UPDATE members SET mem_del=1 WHERE mem_id=".$_REQUEST['chkstatus'][$i]) or die(mysql_query());
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
					<h3 class="page-header"> Users Management <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>
					<blockquote class="page-information hidden">
						<p> <b>Users Management</b> is the section where where you can Add / Update / Activate / Inactivate any user. </p>
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
						<?php if($_REQUEST['action']==1){ ?>	
								<div class="form-group">
									<label for="mem_login" class="col-lg-2 col-md-3 control-label">Email/Login:</label>
									<div class="col-lg-10 col-md-9">
										<input type="email" class="form-control form-cascade-control input_wid70 required email" name="mem_login" id="mem_login" value="<?php print($mem_login);?>" placeholder="Email/Login">
									</div>
								</div>
								<div class="form-group">
									<label for="mem_password" class="col-lg-2 col-md-3 control-label">Password:</label>
									<div class="col-lg-10 col-md-9">
										<input type="password" class="form-control form-cascade-control input_wid70 required" name="mem_password" id="mem_password" placeholder="Password">
									</div>
								</div>
						<?php } else{ ?>
								<div class="form-group">
									<label for="mem_login" class="col-lg-2 col-md-3 control-label">Email/Login:</label>
									<div class="col-lg-10 col-md-9">
										<input type="email" class="form-control form-cascade-control input_wid70 required email" name="mem_login" id="mem_login" value="<?php print($mem_login);?>" placeholder="Email/Login" disabled="disabled">
									</div>
								</div>
						<?php } ?>
								<div class="form-group">
									<label for="mem_fname" class="col-lg-2 col-md-3 control-label">First Name:</label>
									<div class="col-lg-10 col-md-9"> 
										<input type="text" class="form-control form-cascade-control input_wid70 required" name="mem_fname" id="mem_fname" value="<?php print($mem_fname);?>" placeholder="First Name">
									</div>
								</div>
								<div class="form-group">
									<label for="mem_lname" class="col-lg-2 col-md-3 control-label">Last Name:</label>
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control form-cascade-control input_wid70 required" name="mem_lname" id="mem_lname" value="<?php print($mem_lname);?>" placeholder="Last Name">
									</div>
								</div>
								<div class="form-group">
									<label for="mem_company" class="col-lg-2 col-md-3 control-label">Company:</label>
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control form-cascade-control input_wid70" name="mem_company" id="mem_company" value="<?php print($mem_company);?>" placeholder="Company">
									</div>
								</div>
								<div class="form-group">
									<label for="mem_phone" class="col-lg-2 col-md-3 control-label">Phone:</label>
									<div class="col-lg-10 col-md-9">
										<input type="tel" class="form-control form-cascade-control input_wid70" name="mem_phone" id="mem_phone" value="<?php print($mem_phone);?>" placeholder="Phone">
									</div>
								</div>
								<div class="form-group">
									<label for="mem_mobile" class="col-lg-2 col-md-3 control-label">Mobile:</label>
									<div class="col-lg-10 col-md-9">
										<input type="tel" class="form-control form-cascade-control input_wid70" name="mem_mobile" id="mem_mobile" value="<?php print($mem_mobile);?>" placeholder="Mobile">
									</div>
								</div>
								<div class="form-group">
									<label for="mem_address" class="col-lg-2 col-md-3 control-label">Address:</label>
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control form-cascade-control input_wid70" name="mem_address" id="mem_address" value="<?php print($mem_address);?>" placeholder="Address">
									</div>
								</div>
								<div class="form-group">
									<label for="mem_city" class="col-lg-2 col-md-3 control-label">City:</label>
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control form-cascade-control input_wid70 required" name="mem_city" id="mem_city" value="<?php print($mem_city);?>" placeholder="City">
									</div>
								</div>
								<div class="form-group">
									<label for="mem_state" class="col-lg-2 col-md-3 control-label">State:</label>
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control form-cascade-control input_wid70" name="mem_state" id="mem_state" value="<?php print($mem_state);?>" placeholder="State">
									</div>
								</div>
								<div class="form-group">
									<label for="mem_pcode" class="col-lg-2 col-md-3 control-label">Zip:</label>
									<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control form-cascade-control input_wid70 required" name="mem_pcode" id="mem_pcode" value="<?php print($mem_pcode);?>" placeholder="Zip">
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
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Email/Login:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($mem_login);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">First Name:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($mem_fname);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Last Name:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($mem_lname);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Company:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($mem_company);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Phone:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($mem_phone);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Mobile:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($mem_mobile);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Address:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($mem_address);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">City:</label>
									<div class="col-lg-10 col-md-9"><?php print($mem_city);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">State:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($mem_state);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Zip:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($mem_pcode);?></div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">Country:</label>
									<div class="col-lg-10 col-md-9 padTop7"><?php print($countries_name);?></div>
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
					<div class="panel">
						<div class="panel-heading text-primary">
							<h3 class="panel-title"><i class="fa fa-user"></i> Users / Members 
								<span class="pull-right" style="width:auto;">
								<!--<div class="btn-group code"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Classes used"><i class="fa fa-code"></i></a>
									<ul class="dropdown-menu pull-right list-group" role="menu">
										<li class="list-group-item"><code>.table-condensed</code></li>
										<li class="list-group-item"><code>.table-hover</code></li>
									</ul>
								</div>
								<a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a> <a  href="#"  class="panel-close"><i class="fa fa-times"></i></a> -->
									<div><a href="<?php print($_SERVER['PHP_SELF']."?action=1");?>" title="Add New"><i class="fa fa-plus"></i> Add New</a></div>
								</span> 
							</h3>
						</div>
						<div class="panel-body">
						<form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);?>" class="form-horizontal" role="form">
							<table class="table users-table table-condensed table-hover table-striped" >
								<thead>
									<tr>
										<th class="visible-lg"><input type="checkbox" name="chkAll" onClick="setAll();"></th>
										<th class="visible-lg">First Name</th>
										<th class="visible-lg">Last Name</th>
										<th class="visible-lg">Email</th>
										<th>Company</th>
										<th>Status</th>
										<th width="140">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$Query="SELECT m.*, st.status_name FROM members as m left outer join status st on st.status_id=m.status_id where m.utype_id='3'";
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
										<td class="visible-lg"><input type="checkbox" name="chkstatus[]" value="<?php print($row->mem_id);?>" /></td>
										<td class="visible-lg"><?php print($row->mem_fname);?> </td>
										<td class="visible-lg"><?php print($row->mem_lname);?></td>
										<td class="visible-lg"><?php print($row->mem_login);?></td>
										<td><?php print($row->mem_company);?></td>
										<td><?php print($row->status_name);?></td>
										<td><button type="button" class="btn btn-success" onclick="javascript: window.location='manage_sites.php?member_id=<?php print($row->mem_id);?>';"><i class="fa fa-sitemap"></i></button>
											<button type="button" class="btn btn-info" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']."?show=1&mem_id=".$row->mem_id);?>';"><i class="fa fa-eye"></i></button>
											<button type="button" class="btn btn-warning" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']."?action=2&mem_id=".$row->mem_id);?>';"><i class="fa fa-edit"></i></button></td>
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