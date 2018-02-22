<?php include('includes/php_includes_top.php');?>
<?php
if(isset($_REQUEST['btnOrder'])){
    for($i=0; $i<count($_REQUEST['act_id']); $i++){
        mysql_query("UPDATE activities SET act_order=".$_REQUEST['act_ord'][$i]." WHERE act_id=".$_REQUEST['act_id'][$i]);
    }
    $class = "alert alert-info";
    $strMSG = "Record(s) updated successfully";
}

if(isset($_REQUEST['action'])){
    if(isset($_REQUEST['btnAdd'])){
        $actid = getMaximum("activities","act_id");
        mysql_query("INSERT INTO activities(act_id, act_name, act_details, status_id, act_price, act_link) VALUES(".$actid.",'".dbStr($_REQUEST['act_name'])."', '".dbStr($_REQUEST['act_det'])."', '1', '".dbStr($_REQUEST['act_price'])."', '".dbStr($_REQUEST['act_link'])."')") or die(mysql_error());
        header("Location: ".$_SERVER['PHP_SELF']."?op=1");
    }
    elseif(isset($_REQUEST['btnUpdate'])){
        $udtQuery = "UPDATE activities SET act_name='".dbStr($_REQUEST['act_name'])."', act_details='".dbStr($_REQUEST['act_det'])."', act_price ='".dbStr($_REQUEST['act_price'])."', act_link ='".dbStr($_REQUEST['act_link'])."' WHERE act_id=".$_REQUEST['act_id'];
        mysql_query($udtQuery) or die(mysql_error());
        header("Location: ".$_SERVER['PHP_SELF']."?op=2");
    }
    elseif($_REQUEST['action']==2){
            $rsM = mysql_query("SELECT * FROM activities WHERE act_id=".$_REQUEST['act_id']);
            if(mysql_num_rows($rsM)>0){
                $rsMem = mysql_fetch_object($rsM);
                $act_id= $rsMem->act_id;
                $act_name = $rsMem->act_name;
                $act_details = $rsMem->act_details;
                $act_price = $rsMem->act_price;
                $act_link = $rsMem->act_link;
                $formHead = "Update Info";
            }
        }
	else{
		$act_id="";
		$act_name = "";
		$act_details  = "";
		$act_price = "";
		$act_link = "";
		$formHead = "Add New";
	}
}
if(isset($_REQUEST['show'])){
	$rsM = mysql_query("SELECT m.*, s.status_name FROM activities AS m LEFT OUTER JOIN status AS s ON s.status_id=m.status_id WHERE m.act_id=".$_REQUEST['act_id']);
	if(mysql_num_rows($rsM)>0){
		$rsMem = mysql_fetch_object($rsM);
		$act_id= $rsMem->act_id;
		$act_name = $rsMem->act_name;
		$act_details = $rsMem->act_details;
		$act_price = $rsMem->act_price;
		$act_link = $rsMem->act_link;
		$status_id = $rsMem->status_id;
		$status_name = $rsMem->status_name;
		$formHead = "Update Info";
	}
}
if(isset($_REQUEST['btnActive'])){
    if (isset($_REQUEST['chkstatus'])) {
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		mysql_query("UPDATE activities SET status_id = 1 WHERE act_id = ".$_REQUEST['chkstatus'][$i]);
	}
        $class = "alert alert-info";
        $strMSG = "Record(s) updated successfully";
    } else {
        $class = " alert alert-danger ";
        $strMSG = "Please check atleast one checkbox";
    }
}
if(isset($_REQUEST['btnInactive'])){
    if (isset($_REQUEST['chkstatus'])) {
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		mysql_query("UPDATE activities SET status_id = 0 WHERE act_id = ".$_REQUEST['chkstatus'][$i]);
	}
        $class = "alert alert-info";
        $strMSG = "Record(s) updated successfully";
    } else {
        $class = " alert alert-danger ";
        $strMSG = "Please check atleast one checkbox";
    }
	
}
if(isset($_REQUEST['btnDelete'])){
    @mysql_query("DELETE FROM activities  WHERE act_id=".$_REQUEST['chkstatus']) or die(mysql_query());
    header("Location: " . $_SERVER['PHP_SELF'] . "?op=3");
//
//    
//    if(isset($_REQUEST['chkstatus'])){
//        for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
//            mysql_query("DELETE FROM activities  WHERE act_id=".$_REQUEST['chkstatus'][$i]) or die(mysql_query());
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
        <h3 class="page-header"> Manage Activities <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b>Manage Activities: </b> You can manage your activities here </p>
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
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Activity Name</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Activity Name..." value="<?php print($act_name);?>" id="act_name" name="act_name">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Activity Details</label>
                                <div class="col-lg-10 col-md-9">
                            	<textarea type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Activity Details.." 
id="act_det" name="act_det"><?php print($act_details);?></textarea>
                                </div>
                             </div>
                              <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Activity Price</label>
                                <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Activity Price..." value="<?php print($act_price);?>" id="act_price" name="act_price">
                                </div>
                             </div>
                              <div class="form-group">
                                <label for="site_login" class="col-lg-2 col-md-3 control-label">Activity Link</label>
                                <div class="col-lg-10 col-md-9">
                                <input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Activity Link..." value="<?php print($act_link);?>" id="act_link" name="act_link">
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
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Activity Name</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($act_name); ?>
                            <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Activites Name..." value="<?php //print($act_name); ?>" id="act_name" name="act_name" readonly>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Activity Details</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <?php print($act_details); ?>
                            <!--<textarea type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Activites Details.."  id="act_det" name="act_det" readonly><?php //print($act_details);?></textarea>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Activity Price</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($act_price); ?>
                            <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Activites Name..." value="<?php //print($act_name); ?>" id="act_name" name="act_name" readonly>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Activity Link</label>
                            <div class="col-lg-10 col-md-9 det-display">
    <?php print($act_link); ?>
                            <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Activites Name..." value="<?php //print($act_name); ?>" id="act_name" name="act_name" readonly>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Status</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <?php print ($status_name); ?>
                           <!--<input type="text" value="<?php //print ($status_name); ?>" name="status_id" readonly>-->
                            </div>
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
				 <div class="<?php print($class);?>"><?php print($strMSG);?></div>
					<div class="panel">
						<div class="panel-heading text-primary">
							<h3 class="panel-title"><i class="fa fa-eye"></i> Activities
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
                                                                            <th class="visible-xs visible-sm visible-md visible-lg"><input type="checkbox" name="chkAll" onClick="setAll();" ></th>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg">Name</th>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg">Details</th>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg">Price</th>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg">Link</th>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg">Status</th>
                                                                            <th class="visible-xs visible-sm visible-md visible-lg">Order</th>
                                                                            <th style="text-align:center">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
                                                                        $Query="SELECT s.*, st.status_name FROM activities as s LEFT OUTER JOIN status as st ON st.status_id=s.status_id ORDER BY s.act_order ASC";
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
                                                                            <td class="visible-xs visible-sm visible-md visible-lg"><input type="checkbox" name="chkstatus[]" value="<?php print($row->act_id);?>" /></td>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->act_name);?> </td>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->act_details);?> </td>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->act_price);?> </td>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->act_link);?> </td>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->status_name);?> </td>
                                                                            <td class="visible-xs visible-sm visible-md visible-lg"> 
                                                                                <input type="text" id="a_text" name="act_ord[]" value="<?php @print($row->act_order);?>" class="form-control form-cascade-control" style="width:60px;" maxlength="3" />
                                                                                <input type="hidden" name="act_id[]" value="<?php @print($row->act_id);?>" />
                                                                            </td>
                                                                            <td style="width:140px">
                                                                                <div class="tooltips"><a href="manage_activities.php?act_id=<?php print($row->act_id);?>&btnDelete=1&chkstatus=<?php print($row->act_id);?>" data-original-title="Delete Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-minus-circle"></i></a></div>
                                                                                <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF']."?show=1&act_id=".$row->act_id);?>" data-original-title="See Details" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-eye"></i></a></div>
                                                                                <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF']."?action=2&act_id=".$row->act_id);?>" data-original-title="Update Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-edit"></i></a></div>
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
                                <input type="submit" name="btnActive" value="Active" class="btn btn-primary btn-animate-demo">
                                <input type="submit" name="btnInactive" value="In Active" class="btn btn-danger btn-animate-demo">
                                <input type="submit" id="btnOrder" name="btnOrder" value="Update Order" class="btn btn-primary btn-animate-demo">
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

