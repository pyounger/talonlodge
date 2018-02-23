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
		$barid = getMaximum("bar_items","bitem_id");
		//$staName = returnName("status_name", "status", "status_id", $_REQUEST['status_id']);
		mysql_query("INSERT INTO bar_items(bitem_id,bitem_name,bitem_details, bitem_type) VALUES(".$barid.",'".$_REQUEST['bitem_name']."', '".$_REQUEST['bitem_details']."', '2')") or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?op=1");
	}
	elseif(isset($_REQUEST['btnUpdate'])){
		//$staName = returnName("status_name", "status", "status_id", $_REQUEST['status_id']);
		$udtQuery = "UPDATE bar_items SET bitem_name='".$_REQUEST['bitem_name']."', bitem_details='".$_REQUEST['bitem_details']."' WHERE bitem_id=".$_REQUEST['bitem_id'];
		mysql_query($udtQuery) or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?op=2");
	}
	elseif($_REQUEST['action']==2){
		$rsM = mysql_query("SELECT * FROM bar_items WHERE bitem_id=".$_REQUEST['bitem_id']);
		if(mysql_num_rows($rsM)>0){
			$rsMem = mysql_fetch_object($rsM);
			$bitem_id= $rsMem->bitem_id;
			$bitem_name = $rsMem->bitem_name;
			$bitem_details = $rsMem->bitem_details;
		 
			//$status_id = $rsMem->status_id;
			//$site_del = $rsMem->site_del;
			$formHead = "Update Info";
		}
	}
	else{
		$bitem_id="";
		$bitem_name = "";
		$bitem_details  = "";
		//$status_id = 0;
		$formHead = "Add New";
	}
}
if(isset($_REQUEST['show'])){
	$rsM = mysql_query("SELECT * FROM bar_items WHERE bitem_id=".$_REQUEST['bitem_id']);
	if(mysql_num_rows($rsM)>0){
		$rsMem = mysql_fetch_object($rsM);
		$bitem_id= $rsMem->bitem_id;
			$bitem_name = $rsMem->bitem_name;
			$bitem_details = $rsMem->bitem_details;
	
		//$status_id = $rsMem->status_id;
		//$site_del = $rsMem->site_del;
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
    @mysql_query("DELETE FROM bar_items  WHERE bitem_id=".$_REQUEST['chkstatus']) or die(mysql_query());
    header("Location: " . $_SERVER['PHP_SELF'] . "?op=3");
//
//    
//    if(isset($_REQUEST['chkstatus'])){
//        for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
//            mysql_query("DELETE FROM bar_items  WHERE bitem_id=".$_REQUEST['chkstatus'][$i]) or die(mysql_query());
//        }
//        $class = "alert alert-success";
//        $strMSG = "Record(s) deleted successfully";
//    }
//    else{
//        $class = "alert alert-danger";
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
            <!--<input type="text" class="form-control form-cascade-control nav-input-search" size="20" placeholder="Search through site" />
            <span class="input-icon fui-search"></span>-->
        </div>
        <h3 class="page-header"> Manage Beverage Items <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b>Manage Beverage Items: </b> You can manage your Beverage Items here </p>
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
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Beverage Name</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Beverage Name..." value="<?php print($bitem_name);?>" id="act_name" name="bitem_name">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Beverage Details</label>
                                <div class="col-lg-10 col-md-9">
                            	<textarea type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Beverage Details.."  id="bitem_details" name="bitem_details"><?php print($bitem_details);?></textarea>
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
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Beverage Name</label>
                                <div class="col-lg-10 col-md-9 det-display">
                                    <?php print($bitem_name);?>
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Beverage Details</label>
                                <div class="col-lg-10 col-md-9 det-display"><?php print($bitem_details);?>
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
							<h3 class="panel-title"><i class="fa fa-glass"></i> Beverages 
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
							<table class="table users-table table-condensed table-hover table-striped display dataTable" id="example" >
								<thead>
									<tr>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg">Name</th>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg">Details</th>
                                                                            <th style="text-align:center">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
									if($_SESSION['user_id']>0){
										$Query="SELECT * from bar_items  wher user_id=".$_SESSION['user_id']."";
										//$Query="SELECT s.*, st.status_name,  FROM activities as s LEFT OUTER JOIN status st ON st.status_id=s.status_id  WHERE s.user_id='".$_SESSION['user_id']."'";
									}
									else{
										$Query="SELECT * FROM bar_items WHERE bitem_type=2";
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
                                                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->bitem_name);?> </td>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->bitem_details);?></td>
                                                                            <td style="width:135px">
                                                                                <div class="tooltips"><a href="manage_beverage_items.php?act_id=<?php print($row->bitem_id);?>&btnDelete=1&chkstatus=<?php print($row->bitem_id);?>" data-original-title="Delete Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-minus-circle"></i></a></div>
                                                                                <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF']."?show=1&bitem_id=".$row->bitem_id);?>" data-original-title="See Details" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-eye"></i></a></div>
                                                                                <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF']."?action=2&bitem_id=".$row->bitem_id);?>" data-original-title="Update Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-edit"></i></a></div>
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
<?php include("includes/rightsidebar.php");?>
</div> </div> </div>
<?php include("includes/footer.php");?>

