<?php include('includes/php_includes_top.php');?>
<?php
if(isset($_REQUEST['action'])){
    if(isset($_REQUEST['btnAdd'])){
		$actid = getMaximum("act_boat_captain","actboca_id");
		mysql_query("INSERT INTO act_boat_captain(actboca_id, actboca_name) VALUES(".$actid.",'".dbStr($_REQUEST['actboca_name'])."')") or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?op=1");
    }
    elseif(isset($_REQUEST['btnUpdate'])){
		$udtQuery = "UPDATE act_boat_captain SET actboca_name='".dbStr($_REQUEST['actboca_name'])."' WHERE actboca_id=".$_REQUEST['actboca_id'];
		mysql_query($udtQuery) or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?op=2");
    }
    elseif($_REQUEST['action']==2){
            $rsM = mysql_query("SELECT * FROM act_boat_captain WHERE actboca_id=".$_REQUEST['actboca_id']);
            if(mysql_num_rows($rsM)>0){
				$rsMem = mysql_fetch_object($rsM);
				$actboca_id= $rsMem->actboca_id;
				$actboca_name = $rsMem->actboca_name;
				$formHead = "Update Info";
            }
	}
	else{
		$actboca_id="";
		$actboca_name = "";
		$formHead = "Add New";
	}
}
if(isset($_REQUEST['show'])){
	$rsM = mysql_query("SELECT * FROM act_boat_captain WHERE actboca_id=".$_REQUEST['actboca_id']);
	if(mysql_num_rows($rsM)>0){
		$rsMem = mysql_fetch_object($rsM);
		$actboca_id= $rsMem->actboca_id;
		$actboca_name = $rsMem->actboca_name;
		$formHead = "Update Info";
	}
}
if(isset($_REQUEST['btnDelete'])){
    @mysql_query("DELETE FROM act_boat_captain  WHERE actboca_id=".$_REQUEST['actboca_id']) or die(mysql_query());
    header("Location: " . $_SERVER['PHP_SELF'] . "?op=3");

    
//    if(isset($_REQUEST['chkstatus'])){
//        for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
//            mysql_query("DELETE FROM act_boat_captain  WHERE actboca_id=".$_REQUEST['chkstatus'][$i]) or die(mysql_query());
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
        <h3 class="page-header"> Manage Boat Captains <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b>Manage Boat Captains: </b> You can manage Boat Captains here </p>
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
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Captain Name</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Captain Name..." value="<?php print($actboca_name);?>" id="actboca_name" name="actboca_name">
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
                                    <label for="site_login" class="col-lg-2 col-md-3 control-label">Captain Name</label>
                                    <div class="col-lg-10 col-md-9 det-display"><?php print($actboca_name); ?></div>
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
							<h3 class="panel-title"><i class="fa fa-flag-checkered"></i> Captains
								<span class="pull-right" style="width:auto;">
									<div style="float:right;"><a href="<?php print($_SERVER['PHP_SELF']."?action=1");?>" title="Add New"><i class="fa fa-plus"></i> Add New</a></div>
								</span> 
							</h3>
						</div>
						<div class="panel-body">
						<form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);?>" class="form-horizontal" role="form">
							<table class="table users-table table-condensed table-hover table-striped display dataTable" id="example" >
								<thead>
									<tr>
										<th class="visible-xs visible-sm visible-md visible-lg">Captain Name</th>
										<th style="text-align:center">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$Query="SELECT * FROM act_boat_captain";
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
										<td class="visible-xs visible-sm visible-md visible-lg"><?php print($row->actboca_name);?> </td>
                                                                                <td style="width:135px">
                                                                                    <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF']."?btnDelete=1&actboca_id=".$row->actboca_id);?>" data-original-title="Delete Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-minus-circle"></i></a></div>
                                                                                    <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF']."?show=1&actboca_id=".$row->actboca_id);?>" data-original-title="See Details" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-eye"></i></a></div>
                                                                                    <div class="tooltips"><a href="<?php print($_SERVER['PHP_SELF']."?action=2&actboca_id=".$row->actboca_id);?>" data-original-title="Update Record" data-placement="top" class="btn bg-primary text-white" style="float:left; margin-left: 2px; margin-bottom: 2px;"><i class="fa fa-edit"></i></a></div>
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

