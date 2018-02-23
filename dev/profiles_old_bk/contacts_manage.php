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
	
	//photo
	
//	if(move_uploaded_file($_FILES['photo']['tmp_name'], "images/".$_FILES['photo']['name'])){ echo 'done';} 
	
	//print_r( $_FILES );
	//die();
   $contid = getMaximum("contacts","cont_id");
		//$staName = returnName("status_name", "status", "status_id", $_REQUEST['status_id']);
   $target = "images/"; 
   $target = $target . basename( $_FILES['photo']['name']); 
   $pic=($_FILES['photo']['name']);
		mysql_query("INSERT INTO contacts(cont_id, cont_fname,cont_lname,cont_display_name,cust_id ,ctype_id,cont_email,cont_address1,cont_address2 ,cont_city ,cont_state,cont_zip ,countries_id, cont_phone1, cont_phone2 ,cont_phone3 ,createdDate,cont_image,gen_id) VALUES(".$contid.",'".$_REQUEST['cont_fname']."', '".$_REQUEST['cont_lname']."', '".$_REQUEST['cont_display_name']."','".$_REQUEST['cust_id']."','".$_REQUEST['ctype_id']."','".$_REQUEST['cont_email']."','".$_REQUEST['cont_address1']."','".$_REQUEST['cont_address2']."','".$_REQUEST['cont_city']."','".$_REQUEST['cont_state']."','".$_REQUEST['cont_zip']."','".$_REQUEST['countries_id']."','".$_REQUEST['cont_phone1']."','".$_REQUEST['cont_phone2']."','".$_REQUEST['cont_phone3']."',NOW(),'".$pic."','".$_REQUEST['gen_id']."')")or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?op=1");
		
if(move_uploaded_file($_FILES['photo']['tmp_name'], "images/".$_FILES['photo']['name']))
 { 
   
 //Tells you if its all ok 
// echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded, and your information has been added to the directory"; 
 } 
 else { 
 
 //Gives and error if its not 
 echo "Sorry, there was a problem uploading your file."; 
 } 
		
	}
	elseif(isset($_REQUEST['btnUpdate'])){
	
		//$staName = returnName("status_name", "status", "status_id", $_REQUEST['status_id']);
		
		$udtQuery = "UPDATE contacts SET cont_fname='".$_REQUEST['cont_fname']."',cont_lname='".$_REQUEST['cont_lname']."',cont_display_name='".$_REQUEST['cont_display_name']."',cust_id='".$_REQUEST['cust_id']."',ctype_id='".$_REQUEST['ctype_id']."',cont_email='".$_REQUEST['cont_email']."',cont_address1='".$_REQUEST['cont_address1']."',cont_address2='".$_REQUEST['cont_address2']."',cont_city='".$_REQUEST['cont_city']."',cont_state='".$_REQUEST['cont_state']."',cont_zip='".$_REQUEST['cont_zip']."',countries_id='".$_REQUEST['countries_id']."',cont_phone1='".$_REQUEST['cont_phone1']."',cont_phone2='".$_REQUEST['cont_phone2']."',cont_phone3='".$_REQUEST['cont_phone3']."',lastUpdated=NOW(),cont_image='".$pic."',gen_id='".$_REQUEST['gen_id']."' WHERE cont_id=".$_REQUEST['cont_id'];
		mysql_query($udtQuery) or die(mysql_error());
		header("Location: ".$_SERVER['PHP_SELF']."?op=2");
	}
	elseif($_REQUEST['action']==2){
		$rsM = mysql_query("SELECT * FROM contacts WHERE cont_id=".$_REQUEST['cont_id']);
		if(mysql_num_rows($rsM)>0){
			$rsMem = mysql_fetch_object($rsM);
			$cont_id= $rsMem->cont_id;
			$cont_fname = $rsMem->cont_fname;
			$cont_lname = $rsMem->cont_lname;
			$cont_display_name=$rsMem->cont_display_name;
			$cust_id=$rsMem->cust_id;
			$ctype_id=$rsMem->ctype_id;
			$cont_emial=$rsMem->cont_email;
			$cont_address1=$rsMem->cont_address1;
			$cont_address2=$rsMem->cont_address2;
			$cont_city=$rsMem->cont_city;
			$cont_state=$rsMem->cont_state;
			$cont_zip=$rsMem->cont_zip;
			$countries_id=$rsMem->countries_id;
			$cont_phone1=$rsMem->cont_phone1;
			$cont_phone2=$rsMem->cont_phone2;
			$cont_phone3=$rsMem->cont_phone3;
			$gen_id=$rsMem->gen_id;
			$cont_image=$rsMem->cont_image;
			
		    //$status_id = $rsMem->status_id;
			//$status_id = $rsMem->status_id;
			//$site_del = $rsMem->site_del;
			$formHead = "Update Info";
		}
	}
	else{
		$cont_id="";
		$cont_fname = "";
		$cont_lname  = "";
        $cont_display_name = "";
		$cust_id="";
		$ctype_id="";
		$cont_emial="";
		$cont_address1="";
		$cont_address2="";
		$cont_city="";
		$cont_state="";
		$cont_zip="";
		$countries_id="";
		$cont_phone1="";
		$cont_phone2="";
		$cont_phone3="";
		$gen_id="";
		$cont_image="";
		$formHead = "Add New";
	}
}
if(isset($_REQUEST['show'])){
	$rsM = mysql_query("SELECT * FROM contacts  WHERE cont_id=".$_REQUEST['cont_id']);
	if(mysql_num_rows($rsM)>0){
		$rsMem = mysql_fetch_object($rsM);
		$cont_id= $rsMem->cont_id;
			$cont_fname = $rsMem->cont_fname;
			$cont_lname = $rsMem->cont_lname;
			$cont_display_name=$rsMem->cont_display_name;
			$cust_id=$rsMem->cust_id;
			$ctype_id=$rsMem->ctype_id;
			$cont_emial=$rsMem->cont_email;
			$cont_address1=$rsMem->cont_address1;
			$cont_address2=$rsMem->cont_address2;
			$cont_city=$rsMem->cont_city;
			$cont_state=$rsMem->cont_state;
			$cont_zip=$rsMem->cont_zip;
			$countries_id=$rsMem->countries_id;
			$cont_phone1=$rsMem->cont_phone1;
			$cont_phone2=$rsMem->cont_phone2;
			$cont_phone3=$rsMem->cont_phone3;
			$gen_id=$rsMem->gen_id;
	        $cont_image=$rsMem->cont_image;
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
	if(isset($_REQUEST['chkstatus'])){
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		//mysql_query("DELETE FROM mem_sites WHERE site_id = ".$_REQUEST['chkstatus'][$i]);
		mysql_query("DELETE FROM contacts  WHERE cont_id=".$_REQUEST['chkstatus'][$i]) or die(mysql_query());
	
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
                        	<form name="frm" id="frm" method="post" class="form-horizontal" action="<?php print($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);?>" role="form" enctype="multipart/form-data">
                            
                          	  <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact First Name</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact First Name..." value="<?php print($cont_fname);?>" id="cont_fname" name="cont_fname">
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Last Name</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact Last Name..." value="<?php print($cont_lname);?>" id="cont_lname" name="cont_lname">
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Display Name</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Display Name..." value="<?php print($cont_display_name);?>" id="cont_display_name" name="cont_display_name">
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Customer Name</label>
                                 <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Country..." name="cust_id" id="cust_id" class="chosen-select required" style="width:350px;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("customers", "cust_id", "cust_name", $cust_id);?>
										</select>
                                  </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Customer Type</label>
                                 <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Country..." name="ctype_id" id="ctype_id" class="chosen-select required" style="width:350px;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("contact_type", "ctype_id", "ctype_name", $ctype_id);?>
										</select>
                                  </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Email</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact Email..." value="<?php print($cont_emial);?>" id="cont_email" name="cont_email">
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Address 1</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact Address 1..." value="<?php print($cont_address1);?>" id="cont_address1" name="cont_address1">
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Address 2</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact Address 2..." value="<?php print($cont_address2);?>" id="cont_address2" name="cont_address2">
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">City Name</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="City Name..." value="<?php print($cont_city);?>" id="cont_city" name="cont_city">
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">State</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="State..." value="<?php print($cont_state);?>" id="cont_state" name="cont_state">
                                </div>
                             </div>
                             
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Zip Code</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Zip Code..." value="<?php print($cont_zip);?>" id="cont_zip" name="cont_zip">
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Countries Name</label>
                                 <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Country..." name="countries_id" id="countries_id" class="chosen-select required" style="width:350px;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("countries", "countries_id", "countries_name", $countries_id);?>
										</select>
                                  </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Phone 1</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Phone 1..." value="<?php print($cont_phone1);?>" id="cont_phone1" name="cont_phone1">
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Phone 2</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Phone 2..." value="<?php print($cont_phone2);?>" id="cont_phone2" name="cont_phone2">
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Phone 3</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="phone 3..." value="<?php print($cont_phone3);?>" id="cont_phone3" name="cont_phone3">
                                </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Sex</label>
                                 <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Country..." name="gen_id" id="gen_id" class="chosen-select required" style="width:350px;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("gender", "gen_id", "gen_name", $gen_id);?>
										</select>
                                  </div>
                             </div>
							  <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Picture</label>
                                <div class="col-lg-10 col-md-9">
                             <input type="file" name="photo" id="photo" class="form-control form-cascade-control input_wid70 required"  value="<?php 
print($cont_image); ?>">
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
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Profile Pic</label>
                                <div class="col-lg-10 col-md-9">
                                <img src="images/<?php echo $cont_image;?>" alt='Image' width="150" height="150">
                            	
                                </div>
                             </div>
                             
								<div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact First Name</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact First Name..." value="<?php print($cont_fname);?>" id="cont_fname" name="cont_fname" readonly>
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Last Name</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact Last Name..." value="<?php print($cont_lname);?>" id="cont_lname" name="cont_lname" readonly>
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Display Name</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Display Name..." value="<?php print($cont_display_name);?>" id="cont_display_name" name="cont_display_name" readonly>
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Customer Name</label>
                                 <div class="col-lg-10 col-md-9">
                                <select  disabled data-placeholder="Choose a Country..." name="cust_id" id="cust_id" class="chosen-select required" style="width:350px;" tabindex="2" readonly> 
											<option value=""></option>
											<?php FillSelected("customers", "cust_id", "cust_name", $cust_id);?>
										</select>
                                  </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Customer Type</label>
                                 <div class="col-lg-10 col-md-9">
                                <select disabled data-placeholder="Choose a Country..." name="ctype_id" id="ctype_id" class="chosen-select required" style="width:350px;" tabindex="2" readonly>
											<option value=""></option>
											<?php FillSelected("contact_type", "ctype_id", "ctype_name", $ctype_id);?>
										</select>
                                  </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Email</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact Email..." value="<?php print($cont_emial);?>" id="cont_email" name="cont_email" readonly>
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Address 1</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact Address 1..." value="<?php print($cont_address1);?>" id="cont_address1" name="cont_address1" readonly>
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Address 2</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact Address 2..." value="<?php print($cont_address2);?>" id="cont_address2" name="cont_address2" readonly>
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">City Name</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="City Name..." value="<?php print($cont_city);?>" id="cont_city" name="cont_city" readonly>
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">State</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="State..." value="<?php print($cont_state);?>" id="cont_state" name="cont_state" readonly>
                                </div>
                             </div>
                             
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Zip Code</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Zip Code..." value="<?php print($cont_zip);?>" id="cont_zip" name="cont_zip" readonly>
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Countries Name</label>
                                 <div class="col-lg-10 col-md-9">
                                <select  disabled data-placeholder="Choose a Country..." name="countries_id" id="countries_id" class="chosen-select required" style="width:350px;" tabindex="2" readonly>
											<option value=""></option>
											<?php FillSelected("countries", "countries_id", "countries_name", $countries_id);?>
										</select>
                                  </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Phone 1</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Phone 1..." value="<?php print($cont_phone1);?>" id="cont_phone1" name="cont_phone1" readonly>
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Phone 2</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Phone 2..." value="<?php print($cont_phone2);?>" id="cont_phone2" name="cont_phone2" readonly>
                                </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Phone 3</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="phone 3..." value="<?php print($cont_phone3);?>" id="cont_phone3" name="cont_phone3" readonly>
                                </div>
                             </div>
                             
                              <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Sex</label>
                                 <div class="col-lg-10 col-md-9">
                                <select disabled data-placeholder="Choose a Country..." name="gen_id" id="gen_id" class="chosen-select required" style="width:350px;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("gender", "gen_id", "gen_name", $gen_id);?>
										</select>
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
							<h3 class="panel-title"><i class="fa fa-sitemap"></i> Contacts
								<!--<div class="btn-group code"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Classes used"><i class="fa fa-code"></i></a>
								<span class="pull-right" style="width:auto;">
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
										<th class="visible-lg">First Name</th>
										<th class="visible-lg"> Last Name</th>
									<!--	<th>Display Name</th>-->
                                        <th>Created Date</th>
                                        <th>Last Updated</th>
										<th width="140">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
									if($_SESSION['user_id']>0){
										$Query="SELECT s.*, st.status_name FROM contacts as s LEFT OUTER JOIN status AS st ON st.status_id=s.status_id  WHERE s.user_id=".$_SESSION['user_id']."";
										//$Query="SELECT s.*, st.status_name,  FROM activities as s LEFT OUTER JOIN status st ON st.status_id=s.status_id  WHERE s.user_id='".$_SESSION['user_id']."'";
									}
									else{
										$Query="SELECT * FROM contacts ";
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
										<td class="visible-lg"><input type="checkbox" name="chkstatus[]" value="<?php print($row->cont_id);?>" /></td>
										<td class="visible-lg"><?php print($row->cont_fname);?> </td>
										<td class="visible-lg"><?php print($row->cont_lname);?></td>
                                       <!-- <td class="visible-lg"><?php //print($row->cont_display_name);?> </td>-->
                                        <td class="visible-lg"><?php print($row->createdDate);?> </td>
                                        <td class="visible-lg"><?php print($row->lastUpdated);?> </td>
                                        										<td><!--<button type="button" class="btn btn-success"><i class="fa fa-envelope"></i></button>-->

												<button type="submit" class="btn btn-success" onclick="javascript: window.location='contacts_manage.php?&cont_id=<?php print($row->cont_id);?>';" name="btnDelete"><i class="fa fa-sitemap"></i></button>
											<button type="button" class="btn btn-info" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']."?show=1&cont_id=".$row->cont_id);?>';"><i class="fa fa-eye"></i></button>
											<button type="button" class="btn btn-warning" onclick="javascript: window.location='<?php print($_SERVER['PHP_SELF']."?action=2&cont_id=".$row->cont_id);?>';"><i class="fa fa-edit"></i></button></td>
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


