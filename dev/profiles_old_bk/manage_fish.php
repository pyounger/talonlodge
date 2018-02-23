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
		$romid = getMaximum("fish_record","rfec_id");
		//$staName = returnName("grp_name", "status", "status_id", $_REQUEST['status_id']);
		mysql_query("INSERT INTO fish_record(rfec_id,grp_id,cont_id,ftype_id,rfec_weight,rfec_date,createdDate) 
		VALUES(".$romid.",'".$_REQUEST['grp_id']."','".$_REQUEST['cont_id']."','".$_REQUEST['ftype_id']."','".$_REQUEST['rfec_weight']."',
		'".$_REQUEST['rfec_date']."',NOW()
)") or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?op=1");
	}
	elseif(isset($_REQUEST['btnUpdate'])){
		//$staName = returnName("grp_name", "status", "status_id", $_REQUEST['status_id']);
		$udtQuery = "UPDATE fish_record SET grp_id='".$_REQUEST['grp_id']."',cont_id='".$_REQUEST['cont_id']."',ftype_id='".$_REQUEST['ftype_id']."'
		,rfec_weight='".$_REQUEST['rfec_weight']."',lastUpdated=NOW() WHERE rfec_id=".$_REQUEST['rfec_id'];
		mysql_query($udtQuery) or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?op=2");
	}
	elseif($_REQUEST['action']==2){
		$rsM = mysql_query("SELECT * FROM fish_record WHERE rfec_id=".$_REQUEST['rfec_id']);
		if(mysql_num_rows($rsM)>0){
			$rsMem = mysql_fetch_object($rsM);
			$rfec_id= $rsMem->rfec_id;
			$grp_id = $rsMem->grp_id;
			$cont_id = $rsMem->cont_id;
			$ftype_id=$rsMem->ftype_id;
			$rfec_weight=$rsMem->rfec_weight;
			$rfec_date=$rsMem->rfec_date;
			$createdDate=$rsMem->createdDate;
			$lastUpdated=$rsMem->lastUpdated;
		   
			$formHead = "Update Info";
		}
	}
	else{
		$rfec_id="";
		$grp_id = "";
		$cont_id = "";
		$ftype_id = "";
		$cont_id = "";
		$rfec_weight = "";
		$rfec_date = "";
		$createdDate="";
		$lastUpdated="";
		$formHead = "Add New";
	}
}
if(isset($_REQUEST['show'])){
	$rsM = mysql_query("SELECT * from fish_record where rfec_id=".$_REQUEST['rfec_id']);
	if(mysql_num_rows($rsM)>0){
		$rsMem = mysql_fetch_object($rsM);
		$rfec_id= $rsMem->rfec_id;
		$grp_id = $rsMem->grp_id;
		$cont_id = $rsMem->cont_id;
		$ftype_id=$rsMem->ftype_id;
		$rfec_weight=$rsMem->rfec_weight;
		$rfec_date=$rsMem->rfec_date;
		$createdDate=$rsMem->createdDate;
		$lastUpdated=$rsMem->lastUpdated;
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
		mysql_query("DELETE FROM fish_record  WHERE rfec_id=".$_REQUEST['chkstatus'][$i]) or die(mysql_query());
	
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
        <h3 class="page-header"> Manage Packages <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b>Manage Packages: </b> You can manage your packages here </p>
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
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Groups</label>
                                 <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Country..." name="grp_id" id="grp_id" class="chosen-select" style="width:350px; z-index: 9999 !important;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("groups", "grp_id", "grp_name", $grp_id);?>
										</select>
                                  </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact</label>
                                <div class="col-lg-10 col-md-9">
                            	<select data-placeholder="Choose a Country..." name="cont_id" id="cont_id" class="chosen-select" style="width:350px; z-index: 9999 !important;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("contacts", "cont_id", "cont_fname", $cont_id);?>
										</select>
                             </div>
                             </div>
							 <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Fish Type</label>
                                <div class="col-lg-10 col-md-9">
                            	<select data-placeholder="Choose a Country..." name="ftype_id" id="ftype_id" class="chosen-select" style="width:350px; z-index: 9999 !important;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("fish_types", "ftype_id", "ftype_name", $ftype_id);?>
										</select>
                             </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Weight</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="fish_record Title..." value="<?php print($rfec_weight);?>" id="rfec_weight" name="rfec_weight">
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
							<form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);?>" class="form-horizontal" role="form">
								 <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Groups</label>
                                 <div class="col-lg-10 col-md-9">
                                <select disabled data-placeholder="Choose a Country..." name="grp_id" id="grp_id" class="chosen-select" style="width:350px; z-index: 9999 !important;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("groups", "grp_id", "grp_name", $grp_id);?>
										</select>
                                  </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact</label>
                                <div class="col-lg-10 col-md-9">
                            	<select disabled data-placeholder="Choose a Country..." name="cont_id" id="cont_id" class="chosen-select" style="width:350px; z-index: 9999 !important;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("contacts", "cont_id", "cont_fname", $cont_id);?>
										</select>
                             </div>
                             </div>
							 <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Fish Type</label>
                                <div class="col-lg-10 col-md-9">
                            	<select  disabled data-placeholder="Choose a Country..." name="ftype_id" id="ftype_id" class="chosen-select" style="width:350px; z-index: 9999 !important;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("fish_types", "ftype_id", "ftype_name", $ftype_id);?>
										</select>
                             </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Weight</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="fish_record Title..." value="<?php print($rfec_weight);?>" id="rfec_weight" name="rfec_weight" readonly>
                             </div>
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
				 <div class="<?php print($class);?>"><?php print($strMSG);?></div>
					<div class="panel">
						<div class="panel-heading text-primary">
							<h3 class="panel-title"><i class="fa fa-sitemap"></i> Fish Record
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
										<th class="visible-lg"><input type="checkbox" name="chkAll" onClick="setAll();" ></th>
										<th class="visible-lg">Group Name</th>
										<th class="visible-lg">Contact Name</th>
										<th class="visible-lg">Last UPDATE</th>
										
										<th width="140">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
									if($_SESSION['user_id']>0){
										$Query="SELECT s.*, st.grp_name FROM fish_record as s LEFT OUTER JOIN status AS st ON st.grp_id=s.grp_id  WHERE s.user_id=".$_SESSION['user_id']."";
										//$Query="SELECT s.*, st.grp_name,  FROM activities as s LEFT OUTER JOIN groups st ON st.status_id=s.status_id  WHERE s.user_id='".$_SESSION['user_id']."'";
									}
									else{
										//$Query="SELECT * from fish_record";
										$Query="SELECT s.*, st.grp_name, c.cont_fname FROM fish_record as s LEFT OUTER JOIN groups st ON st.grp_id=s.grp_id LEFT OUTER JOIN contacts c ON c.cont_id=s.cont_id";
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
										<td class="visible-lg"><input type="checkbox" name="chkstatus[]" value="<?php print($row->rfec_id);?>" /></td>
										<td class="visible-lg"><?php print($row->grp_name);?> </td>
										<td class="visible-lg"><?php print($row->cont_fname);?></td>
										<td class="visible-lg"><?php print($row->lastUpdated);?></td>
                                       
                                        										<td><!--<button type="button" class="btn btn-success"><i class="fa fa-envelope"></i></button>-->

											<button type="submit" class="btn btn-success" onclick="javascript:window.location='manage_rooms.php?rfec_id=<?php print($row->rfec_id);?>')" name="btnDelete"><i class="fa fa-sitemap"></i></button>
											<button type="button" class="btn btn-info" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']."?show=1&rfec_id=".$row->rfec_id);?>';"><i class="fa fa-eye"></i></button>
											<button type="button" class="btn btn-warning" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']."?action=2&rfec_id=".$row->rfec_id);?>';"><i class="fa fa-edit"></i></button></td>
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


