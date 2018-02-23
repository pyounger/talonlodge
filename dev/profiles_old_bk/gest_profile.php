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
		
	//photo
	
//	if(move_uploaded_file($_FILES['photo']['tmp_name'], "images/".$_FILES['photo']['name'])){ echo 'done';} 
	
	//print_r( $_FILES );
	//die();
   $contid = getMaximum("contacts","cont_id");
   $contpid=getMaximum("contact_profiles","conp_id");
   $cpdid=getMaximum("contact_profile_details","cpd_id"); 
  //$staName = returnName("status_name", "status", "status_id", $_REQUEST['status_id']);
   $target = "images/"; 
   $target = $target . basename( $_FILES['photo']['name']); 
   $pic=($_FILES['photo']['name']);
   
   //insert values in contacts table
		
		mysql_query("INSERT INTO contacts(cont_id, cont_fname,cont_lname,emg_contact_name,cust_id ,ctype_id,cont_email,cont_address1,cont_address2 ,cont_city ,cont_state,cont_zip ,countries_id, cont_phone1, cont_phone2 ,createdDate,cont_image,gen_id,arrival_flight_data,departure_flight_date,arrival_airline_id,departure_airline_id,arrival_flight_no_id, 	departure_flight_no_id) VALUES(".$contid.",'".$_REQUEST['cont_fname']."', '".$_REQUEST['cont_lname']."', '".$_REQUEST['emg_contact_name']."','".$_REQUEST['cust_id']."','".$_REQUEST['ctype_id']."','".$_REQUEST['cont_email']."','".$_REQUEST['cont_address1']."','".$_REQUEST['cont_address2']."','".$_REQUEST['cont_city']."','".$_REQUEST['cont_state']."','".$_REQUEST['cont_zip']."','".$_REQUEST['countries_id']."','".$_REQUEST['cont_phone1']."','".$_REQUEST['cont_phone2']."',NOW(),'".$pic."','".$_REQUEST['gen_id']."','".$_REQUEST['arrival_flight_data']."','".$_REQUEST['departure_flight_date']."','".$_REQUEST['arrival_airline_id']."','".$_REQUEST['departure_airline_id']."','".$_REQUEST['arrival_flight_no_id']."','".$_REQUEST['departure_flight_no_id']."')");
		
		// query of insrt values in contact_profile Table
		
		mysql_query("INSERT INTO contact_profiles(conp_id,createdDate,conp_age,bootsize_id,jacketsize_id,conp_comments,cont_id)VALUES('".$contpid."',NOW(),'".$_REQUEST['conp_age']."','".$_REQUEST['bootsize_id']."','".$_REQUEST['jacketsize_id']."','".$_REQUEST['conp_comments']."','".$contid."')");
		
		
		//query for  insert values in contact_activites
		for($i=0; $i<count($_REQUEST['chkactivites']); $i++){
   
		mysql_query("INSERT INTO contact_activities(conp_id,act_id,date_added) values('".$contpid."','".$_REQUEST['chkactivites'][$i]."',CURDATE())") ;
		
		
		}
		
		//query for insert values in contact profile table

		
		for($ii=0; $ii<count($_REQUEST['quest']); $ii++){
		$contpid11 = getMaximum("contact_profile_details","cpd_id");
			mysql_query("INSERT INTO contact_profile_details (cpd_id,conp_id,question_id,cpd_answer,cont_id) VALUES (".$contpid11.", ".$contpid.", '".$_REQUEST['quest'][$ii]."' , '".$_REQUEST['ans'][$ii]."',".$contid." ) ") or die(mysql_error());
			header("Location: ".$_SERVER['PHP_SELF']."?op=1");
			}
			
			
		
if(move_uploaded_file($_FILES['photo']['tmp_name'], "images/".$_FILES['photo']['name']))
 { 
  
 } 
 else { 
 
 //Gives and error if its not 
 echo "Sorry, there was a problem uploading your file."; 
 } 
		
	}
	elseif(isset($_REQUEST['btnUpdate'])){
	
		//$staName = returnName("status_name", "status", "status_id", $_REQUEST['status_id']);
		
		// contacts table update query 
		$udtQuery = "UPDATE contacts
		 SET
			cont_fname='".$_REQUEST['cont_fname']."',
			cont_lname='".$_REQUEST['cont_lname']."',
			emg_contact_name='".$_REQUEST['emg_contact_name']."',
			cust_id='".$_REQUEST['cust_id']."',
			ctype_id='".$_REQUEST['ctype_id']."',
			cont_email='".$_REQUEST['cont_email']."',
			cont_address1='".$_REQUEST['cont_address1']."',
			cont_address2='".$_REQUEST['cont_address2']."',
			cont_city='".$_REQUEST['cont_city']."',
			cont_state='".$_REQUEST['cont_state']."',
			cont_zip='".$_REQUEST['cont_zip']."',
			countries_id='".$_REQUEST['countries_id']."',
			cont_phone1='".$_REQUEST['cont_phone1']."',
			cont_phone2='".$_REQUEST['cont_phone2']."',
			lastUpdated=NOW(),
			cont_image='".$pic."',
			gen_id='".$_REQUEST['gen_id']."',
			arrival_flight_data='".$_REQUEST['arrival_flight_data']."',
			departure_flight_date='".$_REQUEST['departure_flight_date']."',
			arrival_airline_id='".$_REQUEST['arrival_airline_id']."',
			departure_airline_id='".$_REQUEST['departure_airline_id']."',
			arrival_flight_no_id='".$_REQUEST['arrival_flight_no_id']."',
			departure_flight_no_id='".$_REQUEST['departure_flight_no_id']."' 
		  WHERE
		  cont_id=".$_REQUEST['cont_id'];
		  mysql_query($udtQuery);
		
		//update query of contant profile table 
		 $udtQuery1="UPDATE contact_profiles
		 	SET
				conp_comments='".$_REQUEST['conp_comments']."',
				lastUpdated=NOW(),
				conp_age='".$_REQUEST['conp_age']."',
				bootsize_id='".$_REQUEST['bootsize_id']."',
				jacketsize_id='".$_REQUEST['jacketsize_id']."'
				
		  WHERE
		  cont_id=".$_REQUEST['cont_id'];
		
		mysql_query($udtQuery1);
		//update query of contact_profile_details
		for($ii=0; $ii<count($_REQUEST['quest']); $ii++){
		$udtQuery2="UPDATE contact_profile_details
		SET
				question_id='".$_REQUEST['quest'][$ii]."',
				cpd_answer='".$_REQUEST['ans'][$ii]."',
				lastUpdated=NOW()
				
				
		 WHERE
		 cont_id=".$_REQUEST['cont_id'];
		
		mysql_query($udtQuery2)
		
		 or die(mysql_error());
		 }
		header("Location: ".$_SERVER['PHP_SELF']."?op=2");
	}
	elseif($_REQUEST['action']==2){
		//$rsM = mysql_query("SELECT * FROM contacts WHERE cont_id=".$_REQUEST['cont_id']);
		//$rsM = mysql_query("SELECT s.*, st*,  FROM contacts as s LEFT OUTER JOIN contact_profiles st ON st.conp_id=s.conp_id LEFT OUTER JOIN countries c ON c.countries_id=s.countries_id");
		
		
		//echo "SELECT c.*, t.conp_age FROM contacts As c LEFT OUTER JOIN contact_profiles AS t ON t.conp_id=c.conp_id WHERE c.cont_id=".$_REQUEST['cont_id'];
		
		//die();contact_profile_details
	//	SELECT c.*, t.conp_age FROM contacts As c LEFT OUTER JOIN contact_profiles AS t ON t.cont_id=c.cont_id WHERE c.cont_id=14
		

//Query  SELECT c.cont_id AS cont_a_id, cp.conp_id
/*FROM contacts AS c
LEFT OUTER JOIN contact_profiles AS cp ON c.cont_id = cp.cont_id
WHERE c.cont_id =4
LIMIT 0 , 30
*/
//{
	//contact 
	//contact profiles
	
	//Query2 cont_id pic data from cpd based on cont_id
	//{
		
	//}
	
//}	

		//echo "SELECT c.*, t.*, d.* FROM contacts As c LEFT OUTER JOIN contact_profiles AS t ON t.cont_id=c.cont_id 
		//LEFT OUTER JOIN contact_profile_details AS d ON d.cont_id=c.cont_id  WHERE c.cont_id=".$_REQUEST['cont_id'];
/*		
		$rsM = mysql_query("SELECT c.*, t.*, d.* FROM contacts As c LEFT OUTER JOIN contact_profiles AS t ON t.cont_id=c.cont_id 
		LEFT OUTER JOIN contact_profile_details AS d ON d.cont_id=c.cont_id  WHERE c.cont_id=".$_REQUEST['cont_id']." LIMIT 1");
*/		
		
		$rsM = mysql_query("SELECT c.*, t.* FROM contacts As c LEFT OUTER JOIN contact_profiles AS t ON t.cont_id=c.cont_id 
		 WHERE c.cont_id=".$_REQUEST['cont_id']." LIMIT 1");
		if(mysql_num_rows($rsM)>0){
			$rsMem = mysql_fetch_object($rsM);
			$cont_id= $rsMem->cont_id;
			$cont_fname = $rsMem->cont_fname;
			$cont_lname = $rsMem->cont_lname;
			$emg_contact_name=$rsMem->emg_contact_name;
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
		
			$gen_id=$rsMem->gen_id;
			$arrival_flight_data=$rsMem->arrival_flight_data;
			$departure_flight_date=$rsMem->departure_flight_date;
			$arrival_airline_id=$rsMem->arrival_airline_id;
			$departure_airline_id=$rsMem->departure_airline_id;
			$arrival_flight_no_id=$rsMem->arrival_flight_no_id;
			$departure_flight_no_id=$rsMem->departure_flight_no_id;
			$cont_image=$rsMem->cont_image;
			$conp_id=$rsMem->conp_id;
			$conp_age=$rsMem->conp_age;
			$bootsize_id=$rsMem->bootsize_id;
			$jacketsize_id=$rsMem->jacketsize_id;
			$conp_comments=$rsMem->conp_comments;
			//$question_id=$rsMem->question_id;
			//$question_field=$rsMem->question_field;
			//$cpd_answer=$rsMem->cpd_answer;
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
        $emg_contact_name = "";
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
	
		$gen_id="";
		$arrival_flight_data="";
		$departure_flight_date="";
		$arrival_airline_id="";
		$departure_airline_id="";
		$arrival_flight_no_id="";
		$departure_flight_no_id="";
		$conp_id="";
		$createdDate="";
		$cont_image="";
		$conp_id="";
		$conp_age="";
		$bootsize_id="";
		$jacketsize_id="";
		$conp_comments="";
		//$cpd_answer="";
		$formHead = "Add New";
	}
}
if(isset($_REQUEST['show'])){
	$rsM = mysql_query("SELECT c.*, t.*, d.* FROM contacts As c LEFT OUTER JOIN contact_profiles AS t ON t.cont_id=c.cont_id 
		LEFT OUTER JOIN contact_profile_details AS d ON d.cont_id=c.cont_id  WHERE c.cont_id=".$_REQUEST['cont_id']);
	if(mysql_num_rows($rsM)>0){
		$rsMem = mysql_fetch_object($rsM);
		$cont_id= $rsMem->cont_id;
			$cont_fname = $rsMem->cont_fname;
			$cont_lname = $rsMem->cont_lname;
			$emg_contact_name=$rsMem->emg_contact_name;
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
	
			$gen_id=$rsMem->gen_id;
			//$flightn_id=$rsMem->flightn_id;
			
			$arrival_flight_data=$rsMem->arrival_flight_data;
			$departure_flight_date=$rsMem->departure_flight_date;
			$arrival_airline_id=$rsMem->arrival_airline_id;
			$departure_airline_id=$rsMem->departure_airline_id;
			$arrival_flight_no_id=$rsMem->arrival_flight_no_id;
			$departure_flight_no_id=$rsMem->departure_flight_no_id;
			$conp_id=$rsMem->conp_id;
			$conp_age=$rsMem->conp_age;
			
			$bootsize_id=$rsMem->bootsize_id;
			$jacketsize_id=$rsMem->jacketsize_id;
			$conp_comments=$rsMem->conp_comments;
	        $cont_image=$rsMem->cont_image;
			//$question_id=$rsMem->question_id;
		//	$question_field=$rsMem->question_field;
		//	$cpd_answer=$rsMem->cpd_answer;
			
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
	for($i=0; $i<count($_REQUEST['chkstatus']); $i++){
		//mysql_query("DELETE FROM mem_sites WHERE site_id = ".$_REQUEST['chkstatus'][$i]);
		mysql_query("DELETE FROM contacts  WHERE cont_id=".$_REQUEST['chkstatus'][$i]) or die(mysql_query());
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
                        	<form name="frm" id="frm" method="post" class="form-horizontal" action="<?php print($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);?>"  enctype="multipart/form-data"  role="form">
                            
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
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Email</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact Email..." value="<?php print($cont_emial);?>" id="cont_email" name="cont_email">
                                </div>
                             </div>  
							 
                            
                              <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Phone </label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Phone 1..." value="<?php print($cont_phone1);?>" id="cont_phone1" name="cont_phone1">
                                </div>
                             </div>
                             <hr style="padding:1px; background-color:#999">
							 
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
							 
							  <hr style="padding:1px; background-color:#999">
                             
							  <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Emergency Contact Name</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Display Name..." value="<?php print($emg_contact_name);?>" id="emg_contact_name" name="emg_contact_name">
                                </div>
                             </div>
							 
							 
							 <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Emergency Contact Phone</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Phone 2..." value="<?php print($cont_phone2);?>" id="cont_phone2" name="cont_phone2">
                                </div>
                             </div>
							 
							  <hr style="padding:1px; background-color:#999">
							  
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Airline</label>
                                 <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Country..." name="arrival_airline_id" id="arrival_airline_id" class="chosen-select required" style="width:350px;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("flight_info", "flight_id", "flight_name", $arrival_airline_id);?>
										</select>
                                  </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Flight Number</label>
                                 <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Country..." name="arrival_flight_no_id" id="arrival_flight_no_id" class="chosen-select required" style="width:350px;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("flight_no", "flightn_id", "flightn_name", $arrival_flight_no_id);?>
										</select>
                                  </div>
                             </div>
                             
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Flight Date</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required datetimepicker" placeholder="phone 3..." value="<?php print($arrival_flight_data);?>" id="arrival_flight_data" name="arrival_flight_data">
                                </div>
                             </div>
                            
                             
							 <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Airline</label>
                                 <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Country..." name="departure_airline_id" id="departure_airline_id" class="chosen-select required" style="width:350px;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("flight_info", "flight_id", "flight_name", $departure_airline_id);?>
										</select>
                                  </div>
                             </div>
							 
							 
							 
							 <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Flight Number</label>
                                 <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Country..." name="departure_flight_no_id" id="departure_flight_no_id" class="chosen-select required" style="width:350px;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("flight_no", "flightn_id", "flightn_name", $departure_flight_no_id);?>
										</select>
                                  </div>
                             </div>
                             
                            
							<div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Flight Date</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required datetimepicker" placeholder="phone 3..." value="<?php print($departure_flight_date);?>" id="departure_flight_date" name="departure_flight_date">
                                </div>
                             </div>
                             
                             <hr style="padding:1px; background-color:#999">
                             
                             
							 
							  <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Boot size</label>
                                 <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Country..." name="bootsize_id" id="bootsize_id" class="chosen-select required" style="width:350px;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("boot_size", "bootsize_id", "bootsize_name", $bootsize_id);?>
										</select>
                                  </div>
                             </div>
							  <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Jacket Size</label>
                                 <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Country..." name="jacketsize_id" id="jacketsize_id" class="chosen-select required" style="width:350px;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("jacket_size", "jacketsize_id", "jacketsize_name", $jacketsize_id);?>
										</select>
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
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Age</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="Age..." value="<?php print($conp_age);?>" id="conp_age" name="conp_age">
                                </div>
                             </div>
                             
                                <hr style="padding:1px; background-color:#999">
                             
                           
                             <div class="form-group">
                              <div class="col-lg-10 col-md-9">
                                 <table class="table">
								
								<tbody>
        <?php
        	$Query="SELECT question_field ,question_id FROM questions ";
									
									$counter=0;
									$limit = 25;
									$start = $p->findStart($limit); 
									$count = mysql_num_rows(mysql_query($Query)); 
									$pages = $p->findPages($count, $limit); 

									$rs = mysql_query($Query." LIMIT ".$start.", ".$limit);
									if(mysql_num_rows($rs)>0){
										while($row=mysql_fetch_object($rs)){	
											$counter++;?>
                        
                        <?php 
						//echo"SELECT  c.*, d.cpd_answer FROM contacts As c LEFT OUTER JOIN contact_profile_details AS t ON d.cont_id=c.cont_id 
	//	 WHERE c.cont_id=".$_REQUEST['cont_id']."" ;
	
	
		 
		 
		 
                         if($_REQUEST['action']==1){?>
                         
                         
                         <tr>
					       <td class="visible-lg"><?php print($row->question_field);?> </td>
                           <td class="visible-lg"><input type="checkbox" name="quest[]" value="<?php print($row->question_id);?>" />&nbsp; &nbsp;Yes
                           <input type="checkbox" value="No"  name="istrue[]"/> &nbsp; &nbsp; N0</td>
                         <!--  <td class="visible-lg"><input type="checkbox" value="No"  name="istrue[]"/> N0 </td>-->
                        </tr>
                        <tr>
                                        <td class="visible-lg">If yes pleas Describr </td>
                                        <td class="visible-lg"><textarea name="ans[]" id="ans[]" class="form-control form-cascade-control input_wid70 required "></textarea> 
                                        </td>
                                      <!--  <td>&nbsp;</td>-->
                                        </tr>
                                        <?php }  }
			}?>
                                        
                        
                                       <?php if($_REQUEST['action']==2){
										   
						$Query2="SELECT  c.*, d.cpd_answer,d.question_id, qn.question_field FROM contacts As c LEFT OUTER JOIN contact_profile_details AS d ON d.cont_id=c.cont_id LEFT OUTER JOIN questions AS qn ON d.question_id=qn.question_id WHERE c.cont_id=".$_REQUEST['cont_id']."";
		 
		                           $counter=0;
									$limit = 25;
									$start = $p->findStart($limit); 
									$count = mysql_num_rows(mysql_query($Query2)); 
									$pages = $p->findPages($count, $limit); 

									$rs = mysql_query($Query2." LIMIT ".$start.", ".$limit);
									if(mysql_num_rows($rs)>0){
										while($row=mysql_fetch_object($rs)){	
											$counter++;?>
                                       <tr>
					       <td class="visible-lg"><?php print($row->question_field);?> </td>
                           <td class="visible-lg"><input type="checkbox" name="quest[]" value="<?php print($row->question_id);?>" />&nbsp; &nbsp;Yes
                           <input type="checkbox" value="No"  name="istrue[]"/> &nbsp; &nbsp; N0</td>
                         <!--  <td class="visible-lg"><input type="checkbox" value="No"  name="istrue[]"/> N0 </td>-->
                        </tr>
                                       
                                       <tr>
                                        <td class="visible-lg">If yes pleas Describr </td>
                                        <td class="visible-lg"><textarea name="ans[]" id="ans[]" class="form-control form-cascade-control input_wid70 required "><?php  print($row->cpd_answer);  ?> </textarea> 
                                        </td>
                                      <!--  <td>&nbsp;</td>-->
                                        </tr>
                                        
                                       
           
        <?php }
										}
									}// action 2 ends
       
           
			else{
										print('<tr><td colspan="100%" align="center">No record found!</td></tr>');
									}
        ?>
    </tbody>
                   </div></div>    
                    
           </table>          
                     
                           
                        
                                
                              
                     
                     
                     
                    
                             
                             
                             
                             
                             
                              <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">While at Talon</label>
                                <div class="col-lg-10 col-md-9">
                           <table border="0"  align="center">
								
								
        <?php
        	$Query="SELECT act_name ,act_id FROM activities ";
									
									$counter=0;
									$limit = 25;
									$start = $p->findStart($limit); 
									$count = mysql_num_rows(mysql_query($Query)); 
									$pages = $p->findPages($count, $limit); 

									$rs = mysql_query($Query." LIMIT ".$start.", ".$limit);
									if(mysql_num_rows($rs)>0){
										while($row=mysql_fetch_object($rs)){	
											$counter++;?>
                                            <tr>
										<td class="visible-lg"><input type="checkbox" name="chkactivites[]" value="<?php print($row->act_id);?>" /></td>
										<td class="visible-lg"><?php print($row->act_name);?> </td>
                                        </tr>
           
        <?php
       
            }
			}
			else{
										print('<tr><td colspan="100%" align="center">No record found!</td></tr>');
									}
        ?>
    </table>
                              
                                </div>
                             </div>
                             
                              <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Any Other Comments</label>
                                <div class="col-lg-10 col-md-9">
                            	<textarea type="text" class="form-control form-cascade-control input_wid70 required pickdatetime" placeholder="comment.."  id="conp_comments" name="conp_comments"><?php print($conp_comments);?></textarea>
                                </div>
                             </div>
                             
							 
							  <div class="form-group">
                              	<label for="site_login" >(optional) Uploade a picture of yourself so our staff can recognize you at the airport and during your stay</label>
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
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Email</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact Email..." value="<?php print($cont_emial);?>" id="cont_email" name="cont_email" readonly>
                                </div>
                             </div>  
							 
                            
                              <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Phone </label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Phone 1..." value="<?php print($cont_phone1);?>" id="cont_phone1" name="cont_phone1" readonly>
                                </div>
                             </div>
                             <hr style="padding:1px; background-color:#999">
							 
							 <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Countries Name</label>
                                 <div class="col-lg-10 col-md-9">
                                <select data-placeholder="Choose a Country..." name="countries_id" id="countries_id" class="chosen-select required" style="width:350px;" tabindex="2" readonly>
											<option value=""></option>
											<?php FillSelected("countries", "countries_id", "countries_name", $countries_id);?>
										</select>
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
							 
							  <hr style="padding:1px; background-color:#999">
                             
							  <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Emergency Contact Name</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Display Name..." value="<?php print($emg_contact_name);?>" id="emg_contact_name" name="emg_contact_name" readonly>
                                </div>
                             </div>
							 
							 
							 <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Emergency Contact Phone</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Phone 2..." value="<?php print($cont_phone2);?>" id="cont_phone2" name="cont_phone2" readonly>
                                </div>
                             </div>
							 
							  <hr style="padding:1px; background-color:#999">
							  
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Airline</label>
                                 <div class="col-lg-10 col-md-9">
                                <select disabled data-placeholder="Choose a Country..." name="arrival_airline_id" id="arrival_airline_id" class="chosen-select required" style="width:350px;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("flight_info", "flight_id", "flight_name", $arrival_airline_id);?>
										</select>
                                  </div>
                             </div>
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Flight Number</label>
                                 <div class="col-lg-10 col-md-9">
                                <select disabled data-placeholder="Choose a Country..." name="arrival_flight_no_id" id="arrival_flight_no_id" class="chosen-select required" style="width:350px;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("flight_no", "flightn_id", "flightn_name", $arrival_flight_no_id);?>
										</select>
                                  </div>
                             </div>
                             
                             
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Arrival Flight Date</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required datetimepicker" placeholder="phone 3..." value="<?php print($arrival_flight_data);?>" id="arrival_flight_data" name="arrival_flight_data" readonly>
                                </div>
                             </div>
                            
                             
							 <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Airline</label>
                                 <div class="col-lg-10 col-md-9">
                                <select disabled data-placeholder="Choose a Country..." name="departure_airline_id" id="departure_airline_id" class="chosen-select required" style="width:350px;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("flight_info", "flight_id", "flight_name", $departure_airline_id);?>
										</select>
                                  </div>
                             </div>
							 
							 
							 
							 <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Flight Number</label>
                                 <div class="col-lg-10 col-md-9">
                                <select  disabled data-placeholder="Choose a Country..." name="departure_flight_no_id" id="departure_flight_no_id" class="chosen-select required" style="width:350px;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("flight_no", "flightn_id", "flightn_name", $departure_flight_no_id);?>
										</select>
                                  </div>
                             </div>
                             
                            
							<div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Departure Flight Date</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required datetimepicker" placeholder="phone 3..." value="<?php print($departure_flight_date);?>" id="departure_flight_date" name="departure_flight_date" readonly>
                                </div>
                             </div>
                             
                             <hr style="padding:1px; background-color:#999">
                             
                             
							 
							  <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Boot size</label>
                                 <div class="col-lg-10 col-md-9">
                                <select disabled data-placeholder="Choose a Country..." name="bootsize_id" id="bootsize_id" class="chosen-select required" style="width:350px;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("boot_size", "bootsize_id", "bootsize_name", $bootsize_id);?>
										</select>
                                  </div>
                             </div>
							  <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Jacket Size</label>
                                 <div class="col-lg-10 col-md-9">
                                <select disabled data-placeholder="Choose a Country..." name="jacketsize_id" id="jacketsize_id" class="chosen-select required" style="width:350px;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("jacket_size", "jacketsize_id", "jacketsize_name", $jacketsize_id);?>
										</select>
                                  </div>
                             </div>
                             <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Sex</label>
                                 <div class="col-lg-10 col-md-9">
                                <select  disabled data-placeholder="Choose a Country..." name="gen_id" id="gen_id" class="chosen-select required" style="width:350px;" tabindex="2">
											<option value=""></option>
											<?php FillSelected("gender", "gen_id", "gen_name", $gen_id);?>
										</select>
                                        
                                  </div>
                             </div>
							 
							 <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Age</label>
                                <div class="col-lg-10 col-md-9">
                            	<input type="text" class="form-control form-cascade-control input_wid70 required " placeholder="Age..." value="<?php print($conp_age);?>" id="conp_age" name="conp_age" readonly>
                                </div>
                             </div>
                             <hr style="padding:1px; background-color:#999">
                            
                          
                          
                          
                            <div class="form-group">
                             <div class="col-lg-10 col-md-9">
                           <table class="table"> 
                           <tbody>
                           <?php 
                           $Query2="SELECT  c.*, d.cpd_answer,d.question_id, qn.question_field FROM contacts As c LEFT OUTER JOIN contact_profile_details AS d ON d.cont_id=c.cont_id LEFT OUTER JOIN questions AS qn ON d.question_id=qn.question_id WHERE c.cont_id=".$_REQUEST['cont_id']."";
		 
		                           $counter=0;
									$limit = 25;
									$start = $p->findStart($limit); 
									$count = mysql_num_rows(mysql_query($Query2)); 
									$pages = $p->findPages($count, $limit); 

									$rs = mysql_query($Query2." LIMIT ".$start.", ".$limit);
									if(mysql_num_rows($rs)>0){
										while($row=mysql_fetch_object($rs)){	
											$counter++;?>
                                       <tr>
					       <td class="visible-lg"><?php print($row->question_field);?> </td>
                           <td class="visible-lg"><!--<input type="checkbox" name="quest[]" value="<?php //print($row->question_id);?>" />&nbsp; &nbsp;Yes-->
                      <!--     <input type="checkbox" value="No"  name="istrue[]"/> &nbsp; &nbsp; N0--></td>
                         <!--  <td class="visible-lg"><input type="checkbox" value="No"  name="istrue[]"/> N0 </td>-->
                        </tr>
                                       
                                       <tr>
                                        <td class="visible-lg">If yes pleas Describr </td>
                                        <td class="visible-lg"><textarea name="ans[]" id="ans[]" class="form-control form-cascade-control input_wid70 required " readonly><?php  print($row->cpd_answer);  ?> </textarea> 
                                        </td>
                                      <!--  <td>&nbsp;</td>-->
                                        </tr>
                                        
                                       
           
        <?php }
										}
									// action 2 ends
       
           
			else{
										print('<tr><td colspan="100%" align="center">No record found!</td></tr>');
									}
        ?>
    </tbody>
                   </div></div>    
                    
           </table>          
                                
                         
                                
                              
                          
                          
                          
                          
                              <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">While at Talon</label>
                                <div class="col-lg-10 col-md-9">
                           <table border="0"  align="center">
								<thead>
									
								</thead>
								<tbody>
                
        <?php
		
		
        	$Query="SELECT * from activities";
									
									$counter=0;
									$limit = 25;
									$start = $p->findStart($limit); 
									$count = mysql_num_rows(mysql_query($Query)); 
									$pages = $p->findPages($count, $limit); 

									$rs = mysql_query($Query." LIMIT ".$start.", ".$limit);
									if(mysql_num_rows($rs)>0){
										while($row=mysql_fetch_object($rs)){	
											$counter++;?>
                                            <tr>
										<td class="visible-lg"><input type="checkbox" name="act_id" value="<?php print($row->act_id);?>" /></td>
										<td class="visible-lg"><?php print($row->act_name);?> </td>
                                        </tr>
           
        <?php
       
            }
			}
			else{
										print('<tr><td colspan="100%" align="center">No record found!</td></tr>');
									}
        ?>
    </table>
                              
                                </div>
                             </div>
                             
                              <div class="form-group">
                              	<label for="site_login" class="col-lg-2 col-md-3 control-label">Any Other Comments</label>
                                <div class="col-lg-10 col-md-9">
                            	<textarea type="text" class="form-control form-cascade-control input_wid70 required pickdatetime" placeholder="phone 3..."  id="conp_age" name="conp_comments" readonly><?php print($conp_comments);?></textarea>
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
							<h3 class="panel-title"><i class="fa fa-sitemap"></i> Contacts Profile
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
										<th class="visible-lg">First Name</th>
										<th class="visible-lg"> Last Name</th>
										<th>Display Name</th>
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
                                        <td class="visible-lg"><?php print($row->emg_contact_name);?> </td>
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