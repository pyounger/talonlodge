<?php include('includes/php_includes_top.php');?>
<?php
if(isset($_REQUEST['sync_grp_data'])){
$grp_counter=0;
$live_grp_data = simplexml_load_file('http://private.talonlodge.com/guests/talon_service.asp?function=getGroups');
foreach ($live_grp_data as $details){
    $grp_counter++;
        $existance_of_id = chkExist("pms_booking_id", "groups", " WHERE pms_booking_id=".$details->Pms_Booking_ID." ");
        if(!$existance_of_id){
            $grp_id = getMaximum("groups","grp_id");
            $total_cust = ($details->BYOA_Num_Adults + $details->BYOA_Num_Children);
              mysql_query("INSERT INTO groups (
                grp_id, 
                cont_id, 
                pack_id, 
                grp_arrival,
                grp_departure,
                grp_total_cust,
                createdDate,
                pms_booking_id,
                pms_package_id,
                contact_id,
                groupname,
                grouparrivaldate,
                groupdeparturedate,
                byoa_num_adults,
                byoa_num_children,
                booking_status

                ) 
                VALUES(
                '".dbStr($grp_id)."',
                '".dbStr($details->Contact_ID)."',
                '".dbStr($details->Pms_Package_ID)."',
                '".@calendarDateConver($details->GroupArrivalDate)."',
                '".@calendarDateConver($details->GroupDepartureDate)."',
                '".$total_cust."',
                NOW(),
                '".dbStr($details->Pms_Booking_ID)."',
                '".dbStr($details->Pms_Package_ID)."',
                '".dbStr($details->Contact_ID)."',
                '".dbStr($details->GroupName)."',
                '".@calendarDateConver($details->GroupArrivalDate)."',
                '".@calendarDateConver($details->GroupDepartureDate)."',
                '".dbStr($details->BYOA_Num_Adults)."',
                '".dbStr($details->BYOA_Num_Children)."',
                '".dbStr($details->Booking_Status)."'

                )")
                or die(mysql_error());
        }
}
$class = "alert alert-info";
$strMSG = "Synchronization was successful";
}
?>
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
		$groid = getMaximum("groups","grp_id");
		mysql_query("INSERT INTO groups(grp_id,grp_name,cont_id,pack_id,grp_arrival,grp_departure,createdDate, grp_total_cust) VALUES(".$groid.",'".$_REQUEST['grp_name']."', '".$_REQUEST['cont_id']."','".$_REQUEST['pack_id']."' ,'".calendarDateConver($_REQUEST['grp_arrival'])."','".calendarDateConver($_REQUEST['grp_departure'])."',NOW(),'".$_REQUEST['grp_total_cust']."')") or die(mysql_error());
		$udtQuery = "UPDATE contacts SET grp_id='".$groid."' WHERE cont_id=".$_REQUEST['cont_id'];
		mysql_query($udtQuery) or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?op=1");
	}
	elseif(isset($_REQUEST['btnUpdate'])){
		$udtQuery = "UPDATE groups SET grp_name='".$_REQUEST['grp_name']."', cont_id='".$_REQUEST['cont_id']."',pack_id='".$_REQUEST['pack_id']."', 
		grp_arrival='".calendarDateConver($_REQUEST['grp_arrival'])."' ,grp_departure='".calendarDateConver($_REQUEST['grp_departure'])."', lastUpdated=CURDATE(),grp_total_cust='".$_REQUEST['grp_total_cust']."' WHERE grp_id=".$_REQUEST['grp_id'];
		mysql_query($udtQuery) or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?op=2");
	}
	elseif($_REQUEST['action']==2){
		$rsM = mysql_query("SELECT * FROM groups WHERE grp_id=".$_REQUEST['grp_id']);
		if(mysql_num_rows($rsM)>0){
			$rsMem = mysql_fetch_object($rsM);
			$grp_id= $rsMem->grp_id;
			$grp_name = $rsMem->groupname;
                        $grp_total_cust= $rsMem->grp_total_cust;
			$cont_id = $rsMem->cont_id;
			$pack_id=$rsMem->pack_id;
			//$grp_arrival=$rsMem->grp_arrival;
			$grp_arrival= calendarDateConver2($rsMem->grp_arrival);
			$grp_departure= calendarDateConver2($rsMem->grp_departure);
			$grp_status=$rsMem->grp_status;
		    $status_id = $rsMem->status_id;
			$lastUpdated=$rsMem->lastUpdated;
			//$status_id = $rsMem->status_id;
			//$site_del = $rsMem->site_del;
			$formHead = "Update Info";
		}
	}
	else{
		$grp_id="";
		$grp_name= "";
		$grp_total_cust= "";
		$cont_id= "";
		$pack_id="";
		$grp_arrival="";
		$grp_departure="";
		$grp_status="";
		$status_id = 1;
		$createdDate="";
		$lastUpdated="";
		$formHead = "Add New";
	}
}
if(isset($_REQUEST['show'])){

    
        $rsM = mysql_query("SELECT m.*, s.status_name,c.cont_fname,c.cont_lname, c.cont_email,p.Package_Name FROM groups AS m LEFT OUTER JOIN status AS s ON s.status_id=m.status_id Left Outer join contacts As c on c.cont_id=m.cont_id Left Outer join packages As p on p.pack_id=m.pack_id WHERE m.grp_id=" . $_REQUEST['grp_id']);
    //$rsM = mysql_query("SELECT * FROM groups WHERE grp_id=".$_REQUEST['grp_id']);
    if (mysql_num_rows($rsM) > 0) {
        $rsMem = mysql_fetch_object($rsM);
        $grp_id = $rsMem->grp_id;
        $grp_name = $rsMem->groupname;
        $cont_id = $rsMem->cont_id;
        $cont_fname=$rsMem->cont_fname;
        $cont_lname=$rsMem->cont_lname;
        $cont_email=$rsMem->cont_email;
        $pack_id = $rsMem->pack_id;
        $Package_Name=$rsMem->Package_Name;
        $grp_arrival = $rsMem->grp_arrival;
        $grp_departure = $rsMem->grp_departure;
        $grp_status = $rsMem->grp_status;
        $status_id = $rsMem->status_id;
        $status_name = $rsMem->status_name;
        $lastUpdated = $rsMem->lastUpdated;

        //$status_id = $rsMem->status_id;
        //$site_del = $rsMem->site_del;
        $formHead = "Update Info";
    }

    
}



		
        
        //--------------Button Active--------------------
if(isset($_REQUEST['btnActive'])){
    if (isset($_REQUEST['chkstatus'])) {
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		mysql_query("UPDATE groups SET status_id = 1 WHERE grp_id = ".$_REQUEST['chkstatus'][$i]);
	}
        $class = "alert alert-info";
        $strMSG = "Record(s) updated successfully";
    } else {
        $class = " alert alert-danger ";
        $strMSG = "Please check atleast one checkbox";
    }
}
//--------------Button InActive--------------------
if(isset($_REQUEST['btnInactive'])){
    if (isset($_REQUEST['chkstatus'])) {
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		mysql_query("UPDATE groups SET status_id = 0 WHERE grp_id = ".$_REQUEST['chkstatus'][$i]);
	}
        $class = "alert alert-info";
        $strMSG = "Record(s) updated successfully";
    } else {
        $class = " alert alert-danger ";
        $strMSG = "Please check atleast one checkbox";
    }
}
//--------------Button Delete--------------------

if(isset($_REQUEST['btnDelete'])){
    //if(isset($_RQUEST['chkstatus'])){
    for($i=0; $i<count(@$_REQUEST['chkstatus']); $i++){
        //mysql_query("DELETE FROM mem_sites WHERE site_id = ".$_REQUEST['chkstatus'][$i]);
        @mysql_query("DELETE FROM groups  WHERE grp_id=".$_REQUEST['chkstatus'][$i]) or die(mysql_query());
        $class = "alert alert-success";
        $strMSG = "Record(s) deleted successfully";
    }
    //} else {
        //$class = " alert alert-danger ";
        //$strMSG = "Please check atleast one checkbox";
    //}
}

?>


<?php include('includes/html_header.php');?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
        </ul>
        <!--<div class="form-group hiddn-minibar pull-right">
            <input type="text" class="form-control form-cascade-control nav-input-search" size="20" placeholder="Search through site" />
            <span class="input-icon fui-search"></span>
        </div>-->
        <h3 class="page-header"> Manage Groups <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
        <blockquote class="page-information hidden">
            <p> <b>Manage Groups: </b> You can manage groups here </p>
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
                                        
                                        
                                      <label for="site_login" class="col-lg-2 col-md-3 control-label">Group Name</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Group name..." value="<?php print($grp_name);?>" id="grp_name" name="grp_name">
                                </div>

                                    

                                    
                                    </div>

                                    
                                    
<div class="form-group">
<label for="site_login" class="col-lg-2 col-md-3 control-label">Total Members</label>
<div class="col-lg-10 col-md-9">
<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Total Members..." value="<?php print($grp_total_cust);?>" id="grp_total_cust" name="grp_total_cust">
</div>
</div>
                                                                    
                                                                    
                                                                    
                                                                    
<div class="form-group">
<label for="site_login" class="col-lg-2 col-md-3 control-label">Group Leader</label>
<div class="col-lg-10 col-md-9">

<!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Customer name..." value="<?php print($cont_id);?>" id="grp_name" name="cont_id">-->
                                     
<select data-placeholder="Choose a Contact..." name="cont_id" id="cust_id" class="chosen-select required" style="width:350px;" tabindex="2">
<option value=""></option>
<?php FillSelected(" contacts WHERE ctype_id=2 ", "cont_id", "cont_email" ,@$cont_id);?>
</select>

                                 </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Packages Name</label>
                                 <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Country..." name="pack_id" id="pack_id" class="chosen-select required" style="width:350px;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("packages", "pack_id", "Package_Name" ,@$pack_id);?>
										</select>
                                  </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Group Arrival</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required datetimepicker" placeholder="Arrival.." value="<?php print($grp_arrival);?>" id="grp_arrival" name="grp_arrival">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Group Departure</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required datetimepicker" placeholder="Departure .." value="<?php print($grp_departure);?>" id="grp_departure" name="grp_departure">
                                </div>
                             </div>
                             <div class="form-group">
                              	
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
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Group Name</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <?php print($grp_name); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Customer name..." value="<?php //print($grp_name); ?>" id="grp_name" name="grp_name" readonly>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Leader Name</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <?php print(' '.$cont_fname); ?>
                                <!--<select data-placeholder="Choose a Country..." name="cont_id" id="cont_id" class="chosen-select required" style="width:350px;" tabindex="2" readonly>-->
                                    <!--<option value=""></option>-->
    <?php print($cont_lname);//FillSelected("contacts", "cont_id", "cont_fname", $cont_id); ?>
                                <!--</select>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Leader Email</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <?php print($cont_email).' '; ?>
                                <!--<select data-placeholder="Choose a Country..." name="cont_id" id="cont_id" class="chosen-select required" style="width:350px;" tabindex="2" readonly>-->
                                    <!--<option value=""></option>-->
                                <!--</select>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Packages Name</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <!--<select data-placeholder="Choose a Country..." name="pack_id" id="pack_id" class="chosen-select required" style="width:350px;" tabindex="2">-->
                                    <!--<option value=""></option>-->
    <?php print($Package_Name)//FillSelected("packages", "pack_id", "Package_Name", $pack_id); ?>
                                <!--</select>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Group Arrival</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <?php print($grp_arrival); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="Arrival.." value="<?php //print($grp_arrival); ?>" id="grp_arrival" name="grp_arrival" readonly>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Group Departure</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <?php print($grp_departure); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="Departure .." value="<?php //print($grp_departure); ?>" id="grp_departure" name="grp_departure" readonly>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Group Status</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <?php print($grp_status); ?>
                                <!--<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Departure .." value="<?php //print($grp_status); ?>" id="grp_status" name="grp_status">-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_login" class="col-lg-2 col-md-3 control-label">Status</label>
                            <div class="col-lg-10 col-md-9 det-display">
                                <?php print($status_name); ?>
                                <!--<input type="text" value="<?php //print($status_name); ?>" readonly>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
                            <div class="col-lg-10 col-md-9 ">
                                <button type="button" name="btnBack" class="btn btn-default btn-animate-demo" onclick="javascript: window.location = '<?php print($_SERVER['PHP_SELF']); ?>';">Back</button>
                            </div>
                        </div>					
                    </form>
                </div>

                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
					</div>
				</div>
			</div>
            <?php } else{ ?>
            
            <?php
				//echo '<pre>';
				//print_r( $_SESSION );
				//echo '</pre>';
            ?>
            
            
			<div class="row">
				<div class="col-md-12">
				 <div class="<?php print($class);?>"><?php print($strMSG);?></div>
					<div class="panel">

                                            
                <div class="panel-heading text-primary">
                    <h3 class="panel-title"><i class="fa fa-sitemap"></i> Groups
                        <span class="pull-right" style="width:auto;">
                            <div style="float:right;">
                                <a href="<?php print($_SERVER['PHP_SELF']."?sync_grp_data=1");?>"><i class="fa fa-plus"></i> Synchronize Groups Data With Live Database </a> | 
                                <a href="<?php print($_SERVER['PHP_SELF']."?action=1");?>" title="Add New"><i class="fa fa-plus"></i> Add New</a>
                            </div>
                        </span> 
                    </h3>
                </div>

                                            
                                            <div class="panel-body">
						<?php //print("UType: " . $_SESSION["UType"]);?>
						<form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);?>" class="form-horizontal" role="form">
							<table class="table users-table table-condensed table-hover table-striped" >
								<thead>
									<tr>
										<th class="visible-lg"><input type="checkbox" name="chkAll" onClick="setAll();"></th>
										<th class="visible-lg">Group Name</th>
										<th class="visible-lg">Group Leader</th>
										<th class="visible-lg">Members</th>
                                        <th class="visible-lg">Arrival Date</th>
										<th>Depature Date</th>
                                        <th class="visible-lg">Status</th>
                                        <th class="visible-lg">Last Update</th>
										<th width="140">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
									//if($_SESSION['user_id']>0){
                                                                
                                                                            
									if($_SESSION["UType"]>1){
										$Query="SELECT s.*, st.status_name, c.cont_fname, c.cont_lname, c.cont_email FROM groups as s LEFT OUTER JOIN status st ON st.status_id=s.status_id LEFT OUTER JOIN contacts c ON c.cont_id=s.cont_id WHERE s.cont_id=".$_SESSION["contact_id"];
									}
									else{
										$Query="SELECT s.*, st.status_name, c.cont_fname, c.cont_lname, c.cont_email FROM groups as s LEFT OUTER JOIN status st ON st.status_id=s.status_id LEFT OUTER JOIN contacts c ON c.cont_id=s.cont_id";
									}
									
									
									//SELECT s.*, st.status_name, c.cont_fname FROM groups as s LEFT OUTER JOIN status st ON st.status_id=s.status_id LEFT OUTER JOIN contacts c ON c.cont_id=s.cont_id WHERE s.cont_id=2
									
									//print($Query);
									//die();
									
									
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
										<td class="visible-lg"><input type="checkbox" name="chkstatus[]" value="<?php print($row->grp_id);?>" /></td>
										<td class="visible-lg"><?php print($row->groupname);?> </td>
                                        <td class="visible-lg"><?php print($row->cont_email.'<br/>'.$row->cont_fname.' '.$row->cont_lname);?> </td>
                                        <td class="visible-lg"> <?php print($row->grp_total_cust);?><?php //echo totalCounts(' cont_id ', ' contacts ', "grp_id=".$row->grp_id."" );?></td>
                                        <td class="visible-lg"><?php print($row->grp_arrival);?> </td>
                                        <td class="visible-lg"><?php print($row->grp_departure);?> </td>
                                        <td class="visible-lg"><?php print($row->status_name);?></td>
                                        <td class="visible-lg"><?php print($row->lastUpdated);?> </td>
										
                                        										<td><!--<button type="button" class="btn btn-success"><i class="fa fa-envelope"></i></button>-->
                                                                                
                                          
                                                                                
<!--                                            <a href="manage_group.php?btnDelete=1&chkstatus[]=<?php echo $row->grp_id;?>"><button type="button" class="btn btn-success"><i class="fa fa-sitemap"></i></button></a>-->

                                            
										
											<button type="button" class="btn btn-info" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']."?show=1&grp_id=".$row->grp_id);?>';"><i class="fa fa-eye"></i></button>
											<button type="button" class="btn btn-warning" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']."?action=2&grp_id=".$row->grp_id);?>';"><i class="fa fa-edit"></i></button></td>
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
<!--                                 <input type="submit" name="btnActive" value="Active" class="btn btn-primary btn-animate-demo">
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


