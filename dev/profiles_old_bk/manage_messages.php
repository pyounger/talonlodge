<?php include('includes/header.php'); ?>
<?php $formHead = "Add New";
$strMSG = "";
$class = "";

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
		$msgid = getMaximum("messages","msg_id");
		//$staName = returnName("status_name", "status", "status_id", $_REQUEST['status_id']);
		mysql_query("INSERT INTO messages(msg_id, msg_title,msg_details) VALUES(".$msg_id.",'".$_REQUEST['msg_title']."', '".$_REQUEST['msg_details']."')") or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?op=1");
	}
	elseif(isset($_REQUEST['btnUpdate'])){
		//$staName = returnName("status_name", "status", "status_id", $_REQUEST['status_id']);
		$udtQuery = "UPDATE messages SET msg_title='".$_REQUEST['msg_title']."', msg_details='".$_REQUEST['msg_details']."' WHERE msg_id=".$_REQUEST['msg_id'];
		mysql_query($udtQuery) or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?op=2");
	}
	elseif($_REQUEST['action']==2){
		$rsM = mysql_query("SELECT * FROM messages WHERE msg_id=".$_REQUEST['msg_id']);
		if(mysql_num_rows($rsM)>0){
			$rsMem = mysql_fetch_object($rsM);
			$msg_id= $rsMem->msg_id;
			$msg_title = $rsMem->msg_title;
			$msg_details = $rsMem->msg_details;
		   
			$formHead = "Update Info";
		}
	}
	else{
		$msg_id="";
		$msg_title = "";
		$msg_details = "";
		$formHead = "Add New";
	}
}
if(isset($_REQUEST['show'])){
	$rsM = mysql_query("SELECT * from messages where msg_id=".$_REQUEST['msg_id']);
	if(mysql_num_rows($rsM)>0){
		$rsMem = mysql_fetch_object($rsM);
		$msg_id= $rsMem->msg_id;
		$msg_title = $rsMem->msg_title;
		$msg_details = $rsMem->msg_details;
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
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		//mysql_query("DELETE FROM mem_sites WHERE site_id = ".$_REQUEST['chkstatus'][$i]);
		mysql_query("DELETE FROM messages  WHERE msg_id=".$_REQUEST['chkstatus'][$i]) or die(mysql_query());
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
					<h3 class="page-header">  <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>
					<blockquote class="page-information hidden">
						<p> <b>Template Page</b> is the basic page where you can add more pages according to your requirements easily within this division. </p>
					</blockquote>
				</div>
			</div>
			
			<!-- Demo Panel -->
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
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Messages Title</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="messages Title..." value="<?php print($msg_title);?>" id="msg_title" name="msg_title">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Messages Details</label>
                                <div class="col-lg-10 col-md-9">
                            	<textarea type="text" class="form-control form-cascade-control input_wid70 required" placeholder="messages Details.." 
id="msg_details" name="msg_details"><?php print($msg_details);?></textarea>
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
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Messages Title</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="messages Title..." value="<?php print($msg_title);?>" id="msg_title" name="msg_title">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Messages Details</label>
                                <div class="col-lg-10 col-md-9">
                            	<textarea type="text" class="form-control form-cascade-control input_wid70 required" placeholder="messages Details.." 
id="msg_details" name="msg_details"><?php print($msg_details);?></textarea>
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
							<h3 class="panel-title"><i class="fa fa-sitemap"></i> messages
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
										<th class="visible-lg">Messages Title</th>
										<th class="visible-lg">Messages Details</th>
										
										<th width="140">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
									if($_SESSION['user_id']>0){
										$Query="SELECT s.*, st.status_name FROM activities as s LEFT OUTER JOIN status AS st ON st.status_id=s.status_id  WHERE s.user_id=".$_SESSION['user_id']."";
										//$Query="SELECT s.*, st.status_name,  FROM activities as s LEFT OUTER JOIN status st ON st.status_id=s.status_id  WHERE s.user_id='".$_SESSION['user_id']."'";
									}
									else{
										$Query="SELECT * from messages";
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
										<td class="visible-lg"><input type="checkbox" name="chkstatus[]" value="<?php print($row->msg_id);?>" /></td>
										<td class="visible-lg"><?php print($row->msg_title);?> </td>
										<td class="visible-lg"><?php print($row->msg_details);?></td>
                                       
                                        										<td><!--<button type="button" class="btn btn-success"><i class="fa fa-envelope"></i></button>-->

											<button type="submit" class="btn btn-success" onclick="javascript:window.location='manage_rooms.php?msg_id=<?php print($row->msg_id);?>')" name="btnDelete"><i class="fa fa-sitemap"></i></button>
											<button type="button" class="btn btn-info" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']."?show=1&msg_id=".$row->msg_id);?>';"><i class="fa fa-eye"></i></button>
											<button type="button" class="btn btn-warning" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']."?action=2&msg_id=".$row->msg_id);?>';"><i class="fa fa-edit"></i></button></td>
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