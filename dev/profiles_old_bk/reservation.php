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
		$resid = getMaximum("reservation_request","resr_id");
		//$staName = returnName("status_name", "status", "status_id", $_REQUEST['status_id']);
	




		
	mysql_query("INSERT INTO reservation_request(resr_id,resr_date,resr_award_number,resr_arrival,resr_departure,resr_flight_info,
		resr_fname,resr_lname,resr_num_adults ,resr_num_children ,resr_address,resr_city ,resr_state, resr_zip,
		countries_id ,resr_daytime_phone ,resr_work_phone,resr_cell,resr_email,resr_cardholder,resr_cc_num,
		resr_expdate,resr_special_request,resr_isviewed) VALUES(".$resid.",'".$_REQUEST['resr_date']."', '".$_REQUEST['resr_award_number']."', '".$_REQUEST['resr_arrival']."','".$_REQUEST['resr_departure']."','".$_REQUEST['resr_flight_info']."','".$_REQUEST['resr_fname']."','".$_REQUEST['resr_lname']."','".$_REQUEST['resr_num_adults']."','".$_REQUEST['resr_num_children']."','".$_REQUEST['resr_address']."','".$_REQUEST['resr_city']."','".$_REQUEST['resr_state']."','".$_REQUEST['resr_zip']."','".$_REQUEST['countries_id']."','".$_REQUEST['resr_daytime_phone']."','".$_REQUEST['resr_work_phone']."','".$_REQUEST['resr_cell']."','".$_REQUEST['resr_email']."','".$_REQUEST['resr_cardholder']."','".$_REQUEST['resr_cc_num']."','".$_REQUEST['resr_expdate']."','".$_REQUEST['resr_special_request']."','".$_REQUEST['resr_isviewed']."')") or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?op=1");
	}
	elseif(isset($_REQUEST['btnUpdate'])){
		//$staName = returnName("status_name", "status", "status_id", $_REQUEST['status_id']);
		$udtQuery = "UPDATE reservation_request SET resr_date='".$_REQUEST['resr_date']."',resr_award_number='".$_REQUEST['resr_award_number']."'
		,resr_arrival='".$_REQUEST['resr_arrival']."',resr_departure='".$_REQUEST['resr_departure']."'
		,resr_flight_info='".$_REQUEST['resr_flight_info']."',resr_fname='".$_REQUEST['resr_fname']."',resr_num_adults='".$_REQUEST['resr_num_adults']."',
		resr_num_children='".$_REQUEST['resr_num_children']."',resr_address='".$_REQUEST['resr_address']."',resr_city='".$_REQUEST['resr_city']."'
		,resr_state='".$_REQUEST['resr_state']."',resr_zip='".$_REQUEST['resr_zip']."',countries_id='".$_REQUEST['countries_id']."'
		,resr_daytime_phone='".$_REQUEST['resr_daytime_phone']."',resr_work_phone='".$_REQUEST['resr_work_phone']."',
		resr_cell='".$_REQUEST['resr_cell']."',resr_email='".$_REQUEST['resr_email']."',resr_cardholder='".$_REQUEST['resr_cardholder']."'
		,resr_cc_num='".$_REQUEST['resr_cc_num']."',resr_expdate='".$_REQUEST['resr_expdate']."',resr_special_request='".$_REQUEST['resr_special_request']."'
		,resr_isviewed='".$_REQUEST['resr_isviewed']."' WHERE resr_id=".$_REQUEST['resr_id'];
		mysql_query($udtQuery) or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?op=2");
	}
	elseif($_REQUEST['action']==2){
		$rsM = mysql_query("SELECT * FROM reservation_request WHERE resr_id=".$_REQUEST['resr_id']);
		if(mysql_num_rows($rsM)>0){
			$rsMem = mysql_fetch_object($rsM);
			$resr_id= $rsMem->resr_id;
			$resr_date= $rsMem->resr_date;
			$resr_award_number= $rsMem->resr_award_number;
			$resr_arrival=$rsMem->resr_arrival;
			$resr_departure=$rsMem->resr_departure;
			$resr_flight_info=$rsMem->resr_flight_info;
			$resr_fname=$rsMem->resr_fname;
			$resr_lname=$rsMem->resr_lname;
			$resr_num_adults=$rsMem->resr_num_adults;
			$resr_num_children=$rsMem->resr_num_children;
			$resr_address=$rsMem->resr_address;
			$resr_city=$rsMem->resr_city;
			$resr_state=$rsMem->resr_state;
			$resr_zip=$rsMem->resr_zip;
			$countries_id=$rsMem->countries_id;
			$resr_daytime_phone=$rsMem->resr_daytime_phone;
			$resr_work_phone=$rsMem->resr_work_phone;
			$resr_cell=$rsMem->resr_cell;
			$resr_email=$rsMem->resr_email;
			$resr_cardholder=$rsMem->resr_cardholder;
			$resr_cc_num=$rsMem->resr_cc_num;
			$resr_expdate=$rsMem->resr_expdate;
			$resr_special_request=$rsMem->resr_special_request;
			$resr_isviewed=$rsMem->resr_isviewed;
			
			
			
		    //$status_id = $rsMem->status_id;
			//$status_id = $rsMem->status_id;
			//$site_del = $rsMem->site_del;
			$formHead = "Update Info";
		}
	}


	else{
		$resr_id="";
		$resr_date= "";
		$resr_award_number= "";
        $resr_arrival= "";
		$resr_departure="";
		$resr_flight_info="";
		$resr_fname="";
		$resr_lname="";
		$resr_num_adults="";
		$resr_num_children="";
		$resr_address="";
		$resr_city="";
		$resr_state="";
		$resr_zip="";
		$countries_id="";
		$resr_daytime_phone="";
		$resr_work_phone="";
		$resr_cell="";
		$resr_email="";
		$resr_cardholder="";
		$resr_cc_num="";
		$resr_expdate="";
		$resr_special_request="";
		$resr_isviewed="";
		$formHead = "Add New";
	}
}
if(isset($_REQUEST['show'])){
	$rsM = mysql_query("SELECT * FROM reservation_request  WHERE resr_id=".$_REQUEST['resr_id']);
	if(mysql_num_rows($rsM)>0){
		$rsMem = mysql_fetch_object($rsM);
		    $resr_id=$rsMem->resr_id;
			$resr_date=$rsMem->resr_date;
			$resr_award_number=$rsMem->resr_award_number;
			$resr_arrival=$rsMem->resr_arrival;
			$resr_departure=$rsMem->resr_departure;
			$resr_flight_info=$rsMem->resr_flight_info;
			$resr_fname=$rsMem->resr_fname;
			$resr_lname=$rsMem->resr_lname;
			$resr_num_adults=$rsMem->resr_num_adults;
			$resr_num_children=$rsMem->resr_num_children;
			$resr_address=$rsMem->resr_address;
			$resr_city=$rsMem->resr_city;
			$resr_state=$rsMem->resr_state;
			$resr_zip=$rsMem->resr_zip;
			$countries_id=$rsMem->countries_id;
			$resr_daytime_phone=$rsMem->resr_daytime_phone;
			$resr_work_phone=$rsMem->resr_work_phone;
			$resr_cell=$rsMem->resr_cell;
			$resr_email=$rsMem->resr_email;
			$resr_cardholder=$rsMem->resr_cardholder;
			$resr_cc_num=$rsMem->resr_cc_num;
			$resr_expdate=$rsMem->resr_expdate;
			$resr_special_request=$rsMem->resr_special_request;
			$resr_isviewed=$rsMem->resr_isviewed;
			
		//$status_id = $rsMem->status_id;
		//$site_del = $rsMem->site_del;
		$formHead = "Update Info";
	}
}



		
        
        //--------------Button Active--------------------
if(isset($_REQUEST['btnActive'])){
	if(isset($_REQUEST['chkstatus'])){
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		mysql_query("UPDATE activities SET status_id = 1 WHERE act_id = ".$_REQUEST['chkstatus'][$i]);
	
	$class = "alert alert-success";
	$strMSG = "Record(s) updated successfully";
	}
	}
	else{
		$msg_class='msg_box msg_alert';
		$strMSG = "Please check atleast one checkbox";
	}
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
		mysql_query("DELETE FROM contacts  WHERE cont_id=".$_REQUEST['chkstatus'][$i]) or die(mysql_query());
	
	$class = "alert alert-success";
	$strMSG = "Record(s) deleted successfully";
	}}
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
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Reservation Date</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required datetimepicker" placeholder="Reservation Date..." value="<?php print($resr_date);?>" id="resr_date" name="resr_date">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Reservation Awarad Number</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Awarad numbe..." value="<?php print($resr_award_number);?>" id="resr_award_number" name="resr_award_number">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Date</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required datetimepicker" placeholder="Arrival Date..." value="<?php print($resr_arrival);?>" id="resr_arrival" name="resr_arrival">
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Date</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required datetimepicker" placeholder="Departure Date..." value="<?php print($resr_departure);?>" id="resr_departure" name="resr_departure">
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Flight Info</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Flight info..." value="<?php print($resr_flight_info);?>" id="resr_flight_info" name="resr_flight_info">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">First Name</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="First Name..." value="<?php print($resr_fname);?>" id="resr_fname" name="resr_fname">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Last Name</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Last Name..." value="<?php print($resr_lname);?>" id="resr_lname" name="resr_lname">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">No of Adults</label>
                                 <div class="col-lg-10 col-md-9">
								<?php if($_REQUEST['action']==1){?>
								<select data-placeholder="Choose a Country..." name="resr_num_adults" id="resr_num_adults" class="chosen-select required" style="width:350px;" tabindex="2" >
											<option value="">Select adults</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
											<option value="2">2</option>
										
										</select>
								
								<?php } ?>
                                <?php if($_REQUEST['action']==2){?>
										 <select data-placeholder="Choose a Country..." name="resr_num_adults" id="resr_num_adults" class="chosen-select required" style="width:350px;" tabindex="2" >
											<option value=""></option>
                                            <?php FillSelected("reservation_request", "resr_id", "resr_num_adults", $resr_id);?>
										
										</select>
										<?php }?>
                                  </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">No of Children</label>
                                <div class="col-lg-10 col-md-9">
								<?php if($_REQUEST['action']==1){?>
                            	 <select data-placeholder="Choose a Country..." name="resr_num_children" id="resr_num_children" class="chosen-select required" style="width:350px;" tabindex="2" >
											<option value="">Select Children</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
											<option value="2">2</option>
											
										
										</select>
										<?php } ?>
										<?php if($_REQUEST['action']==2){?>
										
										<select data-placeholder="Choose a Country..." name="resr_num_children" id="resr_num_children" class="chosen-select required" style="width:350px;" tabindex="2" >
											<option value=""></option>
                                            <?php FillSelected("reservation_request", "resr_id", "resr_num_children", $resr_id);?>
										
										</select>
										<?php }?>
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Address</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="Address..." value="<?php print($resr_address);?>" id="resr_address" name="resr_address">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">City</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="City..." value="<?php print($resr_city);?>" id="resr_city" name="resr_city">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">State</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="State..." value="<?php print($resr_state);?>" id="resr_state" name="resr_state">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Zip Code</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="Zip Code..." value="<?php print($resr_zip);?>" id="resr_zip" name="resr_zip">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Countries Name</label>
                                 <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Country..." name="countries_id" id="countries_id" class="chosen-select required" style="width:350px;" tabindex="2" >
											<option value=""></option>
											<?php FillSelected("countries", "countries_id", "countries_name", $countries_id);?>
										</select>
                                  </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Day Phone </label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="Day Phone..." value="<?php print($resr_daytime_phone);?>" id="resr_daytime_phone" name="resr_daytime_phone">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Work phone</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder=" Work phone..." value="<?php print($resr_work_phone);?>" id="resr_work_phone" name="resr_work_phone">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Cell </label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Cell..." value="<?php print($resr_cell);?>" id="resr_cell" name="resr_cell">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Email</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="Email..." value="<?php print($resr_email);?>" id="resr_email" name="resr_email">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Card Holder</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="Card holder..." value="<?php print($resr_cardholder);?>" id="resr_cardholder" name="resr_cardholder">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Card No</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="Contact First Name..." value="<?php print($resr_cc_num);?>" id="resr_cc_num" name="resr_cc_num">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Exp Date</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Exp Date..." value="<?php print($resr_expdate);?>" id="resr_expdate" name="resr_expdate">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Special Request</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="Contact First Name..." value="<?php print($resr_special_request);?>" id="resr_special_request" name="resr_special_request">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Viewed</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact First Name..." value="<?php print($resr_isviewed);?>" id="resr_isviewed" name="resr_isviewed">
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
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Reservation Date</label>
								          <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required datetimepicker" placeholder="Reservation Date..." value="<?php print($resr_date);?>" id="resr_date" name="resr_date" readonly>
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Reservation Awarad Number</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Awarad numbe..." value="<?php print($resr_award_number);?>" id="resr_award_number" name="resr_award_number" readonly>
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Date</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required datetimepicker" placeholder="Arrival Date..." value="<?php print($resr_arrival);?>" id="resr_arrival" name="resr_arrival" readonly>
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Date</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required datetimepicker" placeholder="Departure Date..." value="<?php print($resr_departure);?>" id="resr_departure" name="resr_departure" readonly>
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Flight Info</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Flight info..." value="<?php print($resr_flight_info);?>" id="resr_flight_info" name="resr_flight_info" readonly>
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">First Name</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="First Name..." value="<?php print($resr_fname);?>" id="resr_fname" name="resr_fname" readonly>
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Last Name</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Last Name..." value="<?php print($resr_lname);?>" id="resr_lname" name="resr_lname" readonly>
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">No of Adults</label>
                                 <div class="col-lg-10 col-md-9">
                                <select disabled data-placeholder="Choose a Country..." name="resr_num_adults" id="resr_num_adults" class="chosen-select required" style="width:350px;" tabindex="2" readonly>
											<option value=""></option>
                                            <?php FillSelected("reservation_request", "resr_id", "resr_num_adults", $resr_id);?>
										
										</select>
                                  </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">No of Children</label>
                                <div class="col-lg-10 col-md-9">
                            	 <select  disabled data-placeholder="Choose a Country..." name="resr_num_children" id="resr_num_children" class="chosen-select required" style="width:350px;" tabindex="2" readonly >
											<option value=""></option>
                                            <?php FillSelected("reservation_request", "resr_id", "resr_num_children", $resr_id);?>
										
										</select>
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Address</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="Address..." value="<?php print($resr_address);?>" id="resr_address" name="resr_address" readonly>
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">City</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="City..." value="<?php print($resr_city);?>" id="resr_city" name="resr_city" readonly>
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">State</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="State..." value="<?php print($resr_state);?>" id="resr_state" name="resr_state" readonly>
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Zip Code</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="Zip Code..." value="<?php print($resr_zip);?>" id="resr_zip" name="resr_zip" readonly>
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Countries Name</label>
                                 <div class="col-lg-10 col-md-9">
                                <select disabled data-placeholder="Choose a Country..." name="countries_id" id="countries_id" class="chosen-select required" style="width:350px;" tabindex="2" readonly >
											<option value=""></option>
											<?php FillSelected("countries", "countries_id", "countries_name", $countries_id);?>
										</select>
                                  </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Day Phone </label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="Day Phone..." value="<?php print($resr_daytime_phone);?>" id="resr_daytime_phone" name="resr_daytime_phone" readonly>
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Work phone</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder=" Work phone..." value="<?php print($resr_work_phone);?>" id="resr_work_phone" name="resr_work_phone" readonly>
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Cell </label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Cell..." value="<?php print($resr_cell);?>" id="resr_cell" name="resr_cell" readonly>
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Email</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="Email..." value="<?php print($resr_email);?>" id="resr_email" name="resr_email" readonly>
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Card Holder</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="Card holder..." value="<?php print($resr_cardholder);?>" id="resr_cardholder" name="resr_cardholder" readonly>
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Card No</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="Contact First Name..." value="<?php print($resr_cc_num);?>" id="resr_cc_num" name="resr_cc_num" readonly>
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Exp Date</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Exp Date..." value="<?php print($resr_expdate);?>" id="resr_expdate" name="resr_expdate" readonly>
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Special Request</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="Contact First Name..." value="<?php print($resr_special_request);?>" id="resr_special_request" name="resr_special_request" readonly>
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Viewed</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact First Name..." value="<?php print($resr_isviewed);?>" id="resr_isviewed" name="resr_isviewed" readonly>
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
							<h3 class="panel-title"><i class="fa fa-sitemap"></i> Reservation Request
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
										<th class="visible-lg">Reservation</th>
										<th class="visible-lg"> First Name</th>
										<th>Flight Info</th>
                                        <th>Created Date</th>
                                        <th>Arrival Date</th>
										<th width="140">Departure Date</th>
									</tr>
								</thead>
								<tbody>
								<?php
									if($_SESSION['user_id']>0){
										$Query="SELECT s.*, st.status_name FROM reservation_request as s LEFT OUTER JOIN status AS st ON st.status_id=s.status_id  WHERE s.user_id=".$_SESSION['user_id']."";
										//$Query="SELECT s.*, st.status_name,  FROM activities as s LEFT OUTER JOIN status st ON st.status_id=s.status_id  WHERE s.user_id='".$_SESSION['user_id']."'";
									}
									else{
										$Query="SELECT * FROM reservation_request ";
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
										<td class="visible-lg"><input type="checkbox" name="chkstatus[]" value="<?php print($row->resr_id);?>" /></td>
										<td class="visible-lg"><?php print($row->resr_date);?> </td>
										<td class="visible-lg"><?php print($row->resr_fname);?></td>
                                        <td class="visible-lg"><?php print($row->resr_flight_info);?> </td>
                                        <td class="visible-lg"><?php print($row->resr_arrival);?> </td>
                                        <td class="visible-lg"><?php print($row->resr_departure);?> </td>
                                        										<td><!--<button type="button" class="btn btn-success"><i class="fa fa-envelope"></i></button>-->

												<button type="submit" class="btn btn-success" onclick="javascript: window.location='reservation.php?&cont_id=<?php print($row->resr_id);?>';" name="btnDelete"><i class="fa fa-sitemap"></i></button>
											<button type="button" class="btn btn-info" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']."?show=1&resr_id=".$row->resr_id);?>';"><i class="fa fa-eye"></i></button>
											<button type="button" class="btn btn-warning" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']."?action=2&resr_id=".$row->resr_id);?>';"><i class="fa fa-edit"></i></button></td>
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


