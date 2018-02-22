<?php include('includes/php_includes_top.php'); ?>
<?php
$isLeader = 1;
if (isset($_REQUEST['grp_id'])) {
    $_SESSION['group_id'] = $_REQUEST['grp_id'];
	if($_SESSION["UType"]>1){
		$isLeader = chkExist("Contact_ID", "groups", " WHERE grp_id='".$_REQUEST['grp_id']."' AND Contact_ID='".$_SESSION["contact_id"]."'");
	}
} else {
    if (!isset($_SESSION['group_id'])) {
        $_SESSION['group_id'] = 0;
    } else if(isset($_SESSION["contact_id"])){
        $_SESSION['group_id'] = returnName("grp_id", "contacts", "ContactID", $_SESSION["contact_id"]);
    }
}

if((isset($_REQUEST['limit_of_rec']))&&($_REQUEST['limit_of_rec']!='')){
    $_SESSION['limit_of_rec'] = $_REQUEST['limit_of_rec'];
} else if(isset($_SESSION['limit_of_rec'])){
    //$_SESSION['group_name'] = $_SESSION['group_name'];
} else {
    $_SESSION['limit_of_rec'] = '200';
}

    if (isset($_REQUEST['btnUpdate'])) {
        $pic = @$_REQUEST['old_img'];
        if($_FILES['photo']['name']!=''){
            $target = "files/contents/";
            @unlink($target . $_REQUEST['old_img']);
            $target = $target . basename($_FILES['photo']['name']);
            $pic = ($_SESSION["contact_id"] . '_' . $_FILES['photo']['name']);
            if (move_uploaded_file($_FILES['photo']['tmp_name'], "files/contents/" . $_SESSION["contact_id"] . '_' . $_FILES['photo']['name'])) {

            }
        }
        if(isset($_REQUEST['is_completed'])){
            $is_completed = $_REQUEST['is_completed'];
        } else {
            $is_completed = '0';
        }
        if($_REQUEST['countries_id']==223){
            $state_name = $_REQUEST['cont_state1'];
        } else {
            $state_name = $_REQUEST['cont_state2'];
        }
        $country_name = returnName("countries_name", "countries", "countries_id", $_REQUEST['countries_id']);
        $udtQuery = "UPDATE contacts SET 
            cont_fname='" . dbStr($_REQUEST['cont_fname']) . "',
            cont_lname='" . dbStr($_REQUEST['cont_lname']) . "',
            emg_contact_name='" . dbStr($_REQUEST['emg_contact_name']) . "',
            cont_email='" . dbStr($_REQUEST['cont_email']) . "',
            cont_address1='" . dbStr($_REQUEST['cont_address1']) . "',
            cont_address2='" . dbStr($_REQUEST['cont_address2']) . "',
            cont_city='" . dbStr($_REQUEST['cont_city']) . "',
            cont_state='" . dbStr($state_name) . "',
            cont_zip='" . dbStr($_REQUEST['cont_zip']) . "',
            countries_id='" . dbStr($_REQUEST['countries_id']) . "',
            cont_phone1='" . dbStr($_REQUEST['cont_phone1']) . "',
            cont_phone2='" . dbStr($_REQUEST['cont_phone2']) . "',
            lastUpdated=NOW(),
            cont_image = '".$pic."', 
            gen_id='" . dbStr($_REQUEST['gen_id']) . "',
            ContactFirstName='" . dbStr(@$_REQUEST['cont_fname']) . "',
            ContactLastName='" . dbStr(@$_REQUEST['cont_lname']) . "',
            Email='" . dbStr(@$_REQUEST['cont_email']) . "',
            Address1='" . dbStr(@$_REQUEST['cont_address1']) . "',
            Address2='" . dbStr(@$_REQUEST['cont_address2']) . "',
            City='" . dbStr(@$_REQUEST['cont_city']) . "',
            State='" . dbStr($state_name) . "',
            ZIP='" . dbStr(@$_REQUEST['cont_zip']) . "',
            Country='" . dbStr($country_name) . "',
            Phone1='" . dbStr(@$_REQUEST['cont_phone1']) . "',
            Phone2='" . dbStr(@$_REQUEST['cont_phone2']) . "'
        WHERE
        ContactID=" . $_SESSION["contact_id"];
        mysql_query($udtQuery);

        
		$conp_id = chkExist("conp_id", "contact_profiles", " WHERE cont_id=".$_SESSION["contact_id"]."");
		if($conp_id>0){
			mysql_query("UPDATE contact_profiles SET conp_comments='" . dbStr($_REQUEST['conp_comments']) . "', lastUpdated=NOW(), conp_age='" . $_REQUEST['conp_age'] . "', bootsize_id='" . $_REQUEST['bootsize_id'] . "', jacketsize_id='" . $_REQUEST['jacketsize_id'] . "' WHERE cont_id=" . $_SESSION["contact_id"]) or die(mysql_error());
		} else {
			$conp_id = getMaximum("contact_profiles", "conp_id");
			mysql_query("INSERT INTO contact_profiles (conp_id, cont_id, conp_comments, createdDate, conp_age, bootsize_id, jacketsize_id) VALUES (".$conp_id.", '".$_SESSION["contact_id"]."', '".dbStr($_REQUEST['conp_comments'])."', NOW(), '".$_REQUEST['conp_age']."', '".$_REQUEST['bootsize_id']."', '".$_REQUEST['jacketsize_id']."')") or die(mysql_error());
		}
		mysql_query("DELETE FROM contact_profile_details WHERE conp_id=".$conp_id."");
		for ($i=0; $i<count($_REQUEST['quest']); $i++) {
			@$yes_no_val = explode('_',$_REQUEST['yes_no_value'][$i]);
			$MaxID = getMaximum("contact_profile_details", "cpd_id");
			$udtQuery2 = "INSERT INTO contact_profile_details (cpd_id, conp_id, question_id, istrue, cpd_answer, createdDate, cont_id)
			VALUES (".$MaxID.", '".$conp_id."', '".dbStr($_REQUEST['quest'][$i])."', '".(($yes_no_val[1]!='')?$yes_no_val[1]:'')."', '".dbStr($_REQUEST['ans'][$i])."', NOW(), '".$_SESSION["contact_id"]."')";
			mysql_query($udtQuery2);
		}
		$contact_name = dbStr($_REQUEST['cont_fname']).' '.dbStr($_REQUEST['cont_lname']);
        //mysql_query("UPDATE users SET user_name='" . dbStr($_REQUEST['cont_email']) . "', user_display_name='" .$contact_name. "', lastUpdated=NOW() WHERE cont_id = '".$_SESSION["contact_id"]."' ");
		mysql_query("UPDATE users SET user_display_name='" .$contact_name. "', lastUpdated=NOW() WHERE cont_id = '".$_SESSION["contact_id"]."' ");

		
		// UPDATE LOG ENTRY
		$MaxID = getMaximum("logs", "log_id");
		mysql_query("INSERT INTO logs (log_id, cont_id, ContactID, user_id, log_datetime, log_type) VALUES ('".$MaxID."', '".$_REQUEST['cont_id']."', '".$_SESSION["contact_id"]."', '".$_SESSION["contact_id"]."', NOW(), '0')");
		
		/*$url = $_SERVER['PHP_SELF'] . "?op=2";
		if($_SESSION["UType"]>1){
			$url = $_SERVER['PHP_SELF'] . "?op=2&grp_id=".$_REQUEST['grp_id'];
		}*/
		$url = "profile_view.php?op=2";
		header("Location: ".$url);
		
    } else {
        $rsM = mysql_query("SELECT c.cont_fname, c.cont_lname, c.emg_contact_name, c.cust_id, c.ctype_id, c.cont_email, c.cont_address1, c.cont_address2, 
		c.cont_city, c.cont_state, c.cont_zip, c.countries_id, c.cont_phone1, c.cont_phone2, c.cont_image, c.gen_id, cp.*, t.* FROM contacts As c LEFT OUTER JOIN contact_profiles AS cp ON c.ContactID=cp.cont_id LEFT OUTER JOIN travel_info AS t ON c.cont_id = t.cont_id AND c.ContactID = t.ContactID AND c.grp_id = t.grp_id WHERE c.ContactID = " . $_SESSION["contact_id"] . " LIMIT 1");
         
        if (mysql_num_rows($rsM) > 0) {
            $rsMem = mysql_fetch_object($rsM);
            $cont_id = $rsMem->cont_id;
            $ContactID = $rsMem->ContactID;
            $grp_id = $rsMem->grp_id;
            $cont_fname = $rsMem->cont_fname;
            $cont_lname = $rsMem->cont_lname;
            $emg_contact_name = $rsMem->emg_contact_name;
            $cust_id = $rsMem->cust_id;
            $ctype_id = $rsMem->ctype_id;
            $cont_emial = $rsMem->cont_email;
            $cont_address1 = $rsMem->cont_address1;
            $cont_address2 = $rsMem->cont_address2;
            $cont_city = $rsMem->cont_city;
            $cont_state = $rsMem->cont_state;
            $cont_zip = $rsMem->cont_zip;
            $countries_id = $rsMem->countries_id;
            $cont_phone1 = $rsMem->cont_phone1;
            $cont_phone2 = $rsMem->cont_phone2;
            $con_flight_comments = $rsMem->con_flight_comments;

            $gen_id = $rsMem->gen_id;
            $arrival_flight_data = calendarDateConver2($rsMem->arrival_flight_data);
            $departure_flight_date = calendarDateConver2($rsMem->departure_flight_date);
            $arrival_airline_id = $rsMem->arrival_airline_id;
            $departure_airline_id = $rsMem->departure_airline_id;
            $arrival_flight_no_id = $rsMem->arrival_flight_no_id;
            $departure_flight_no_id = $rsMem->departure_flight_no_id;
            $cont_image = $rsMem->cont_image;
            $conp_id = $rsMem->conp_id;
            $conp_age = $rsMem->conp_age;
            $bootsize_id = $rsMem->bootsize_id;
            $jacketsize_id = $rsMem->jacketsize_id;

            $conp_comments = $rsMem->conp_comments;
            $arr_flight_id = $rsMem->arr_flight_id;
            $arr_flightn_id = $rsMem->arr_flightn_id;
            $arr_flightt_id = $rsMem->arr_flightt_id;
            $arr_hotel_id = $rsMem->arr_hotel_id;
            $arr_con_private_jet = $rsMem->arr_con_private_jet;
            $dep_flight_id = $rsMem->dep_flight_id;
            $dep_flightn_id = $rsMem->dep_flightn_id;
            $dep_flightt_id = $rsMem->dep_flightt_id;
            $dep_hotel_id = $rsMem->dep_hotel_id;
            $dep_con_private_jet = $rsMem->dep_con_private_jet;
            $is_completed = $rsMem->is_completed;

            //$question_id=$rsMem->question_id;
            //$question_field=$rsMem->question_field;
            //$cpd_answer=$rsMem->cpd_answer;
            //$status_id = $rsMem->status_id;
            //$status_id = $rsMem->status_id;
            //$site_del = $rsMem->site_del;
            $formHead = "Update Info";
		}
    }

if (isset($_REQUEST['op'])) {
    switch ($_REQUEST['op']) {
        case 1:
            $class = "alert alert-success";
            $strMSG = "Record Added Successfully";
            break;
        case 2:
            $strMSG = " Record Updated Successfully";
            $class = "alert alert-success";
            break;
        case 7:
            //$class = "notification success";
            $class = "alert alert-success";
            $strMSG = "Data Syncronized Successfully";
            break;
    }
}
?>
<?php include('includes/html_header.php'); ?>
					<div class="row">
				<div class="col-mod-12">
							<ul class="breadcrumb">
						<li> <a href="index.php">Dashboard</a></li>
					</ul>
							<h3 class="page-header"> My Profile <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
		<blockquote class="page-information hidden">
			<p> <b>My Profile: </b> You can manage your profile here </p>
		</blockquote>
						</div>
			</div>
					<div class="row">
				<div class="col-md-12">
							<div class="panel panel-cascade">
						<div class="panel-heading">
									<h3 class="panel-title text-primary"><?php print($formHead); ?></h3>
								</div>
						<div class="panel-body panel-border">
									<form name="frm" id="frm" method="post" class="form-horizontal" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>"  enctype="multipart/form-data"  role="form">
								<?php //if ($_SESSION["UType"]!=3){?>
								<div class="form-group">
											<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact First Name</label>
											<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact First Name..." value="<?php print($cont_fname);?>" id="cont_fname" name="cont_fname">
									</div>
										</div>
								<div class="form-group">
											<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Last Name</label>
											<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact Last Name..." value="<?php print($cont_lname); ?>" id="cont_lname" name="cont_lname">
									</div>
										</div>
								<div class="form-group">
											<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Email</label>
											<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control form-cascade-control input_wid70 required" placeholder="Contact Email..." value="<?php print($cont_emial); ?>" id="cont_email" name="cont_email">
									</div>
										</div>
								<div class="form-group">
											<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Phone </label>
											<div class="col-lg-10 col-md-9">
										<input type="text" class="form-control form-cascade-control input_wid70" placeholder="Phone Number..." value="<?php print($cont_phone1); ?>" id="phone-input1" name="cont_phone1">
									</div>
										</div>
								<hr style="padding:1px; background-color:#999">
								<?php 
                            if(!isset($_REQUEST['invite_guest'])){
                                $guest_display = 'block';
                            } else {
                                $guest_display = 'none';
                            }
                        ?>
								<div style="display: <?php echo $guest_display;?>">
											<div class="form-group">
										<label for="site_login" class="col-lg-2 col-md-3 control-label">Country Name</label>
										<div class="col-lg-10 col-md-9">
													<select data-placeholder="Choose a Country..." name="countries_id" id="countries_id" class="chosen-select" style="width:260px; z-index: 9999 !important;" tabindex="2" onchange="javascript: get_states(this.value);">
												<option value=""></option>
												<?php echo FillSelected("countries", "countries_id", "countries_name", (($countries_id==0||$countries_id=='')?'223':$countries_id)); ?>
											</select>
												</div>
									</div>
											<div class="form-group" id="with_states">
										<label for="site_login" class="col-lg-2 col-md-3 control-label">State Name</label>
										<div class="col-lg-10 col-md-9">
													<select data-placeholder="Choose a State..." name="cont_state1" class="chosen-" tabindex="2" style=" width:260px; ">
												<?php echo FillSelected("states", "name", "name", $cont_state);?>
											</select>
												</div>
									</div>
											<div class="form-group" id="without_states">
										<label for="site_login" class="col-lg-2 col-md-3 control-label">State Name</label>
										<div class="col-lg-10 col-md-9">
													<input type="text" id="without_states_val" class="form-control form-cascade-control input_wid70" placeholder="State..." value="<?php print($cont_state);?>" name="cont_state2" style= " ">
												</div>
									</div>
											<script>
                            var coid = '<?php echo (($countries_id==0||$countries_id=='')?'223':$countries_id);?>';
                            if(coid=='223'){
                                document.getElementById('with_states').style.display='block';
                                document.getElementById('without_states').style.display='none';
                                document.getElementById('without_states_val').value='';
                            } else {
                                document.getElementById('without_states').style.display='block';
                                document.getElementById('with_states').style.display='none';
                            }
                            function get_states( coid ){
                                if(coid=='223'){
                                    document.getElementById('with_states').style.display='block';
                                    document.getElementById('without_states').style.display='none';
                                } else {
                                    document.getElementById('without_states').style.display='block';
                                    document.getElementById('with_states').style.display='none';
                                    document.getElementById('without_states_val').value='';
                                }
                            }
                        </script>
											<div class="form-group">
										<label for="site_login" class="col-lg-2 col-md-3 control-label">City</label>
										<div class="col-lg-10 col-md-9">
													<input type="text" class="form-control form-cascade-control input_wid70" placeholder="City Name..." value="<?php print($cont_city); ?>" id="cont_city" name="cont_city">
												</div>
									</div>
											<div class="form-group">
										<label for="site_login" class="col-lg-2 col-md-3 control-label">Zip Code</label>
										<div class="col-lg-10 col-md-9">
													<input type="text" class="form-control form-cascade-control input_wid70" placeholder="Zip Code..." value="<?php print($cont_zip); ?>" id="cont_zip" name="cont_zip">
												</div>
									</div>
											<div class="form-group">
										<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Address 1</label>
										<div class="col-lg-10 col-md-9">
													<input type="text" class="form-control form-cascade-control input_wid70" placeholder="Contact Address 1..." value="<?php print($cont_address1); ?>" id="cont_address1" name="cont_address1">
												</div>
									</div>
											<div class="form-group">
										<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Address 2</label>
										<div class="col-lg-10 col-md-9">
													<input type="text" class="form-control form-cascade-control input_wid70" placeholder="Contact Address 2..." value="<?php print($cont_address2); ?>" id="cont_address2" name="cont_address2">
												</div>
									</div>
											<hr style="padding:1px; background-color:#999">
											<div class="form-group">
										<label for="site_login" class="col-lg-2 col-md-3 control-label">Emergency Contact Name</label>
										<div class="col-lg-10 col-md-9">
													<input type="text" class="form-control form-cascade-control input_wid70" placeholder="Emergency Contact Name..." value="<?php print($emg_contact_name); ?>" id="emg_contact_name" name="emg_contact_name">
												</div>
									</div>
											<div class="form-group">
										<label for="site_login" class="col-lg-2 col-md-3 control-label">Emergency Contact Phone</label>
										<div class="col-lg-10 col-md-9">
													<input type="text" class="form-control form-cascade-control input_wid70" placeholder="Emergency Contact Phone..." value="<?php print($cont_phone2); ?>" id="phone-input2" name="cont_phone2">
													<script src="http://firstopinion.github.io/formatter.js/javascripts/formatter.js"></script> 
													<script>
                                    var phoneInput1 = document.getElementById('phone-input1');
                                    if (phoneInput1) {
                                        new Formatter(phoneInput1, {
                                            'pattern': '({{999}}) {{999}}-{{9999}}',
                                            'persistent': true
                                        });
                                    }
                                    var phoneInput2 = document.getElementById('phone-input2');
                                    if (phoneInput2) {
                                        new Formatter(phoneInput2, {
                                            'pattern': '({{999}}) {{999}}-{{9999}}',
                                            'persistent': true
                                        });
                                    }
                                </script> 
												</div>
									</div>
											<hr style="padding:1px; background-color:#999">
											<div class="form-group">
										<label for="site_login" class="col-lg-2 col-md-3 control-label">Boot size</label>
										<div class="col-lg-10 col-md-9">
													<select data-placeholder="Boot Size..." name="bootsize_id" id="bootsize_id" class="chosen-select" style="width:260px; z-index: 9999 !important;" tabindex="2">
												<option value=""></option>
												<?php FillSelected("boot_size", "bootsize_id", "bootsize_name", $bootsize_id); ?>
											</select>
												</div>
									</div>
											<div class="form-group">
										<label for="site_login" class="col-lg-2 col-md-3 control-label">Jacket Size</label>
										<div class="col-lg-10 col-md-9">
													<select data-placeholder="Jacket Size..." name="jacketsize_id" id="jacketsize_id" class="chosen-select " style="width:260px; z-index: 9999 !important;" tabindex="2">
												<option value=""></option>
												<?php FillSelected("jacket_size", "jacketsize_id", "jacketsize_name", $jacketsize_id); ?>
											</select>
												</div>
									</div>
											<div class="form-group">
										<label for="site_login" class="col-lg-2 col-md-3 control-label">Gender</label>
										<div class="col-lg-10 col-md-9">
													<select data-placeholder="Select your Gender..." name="gen_id" id="gen_id" class="chosen-select " style="width:260px; z-index: 9999 !important;" tabindex="2">
												<option value=""></option>
												<?php FillSelected("gender", "gen_id", "gen_name", $gen_id); ?>
											</select>
												</div>
									</div>
											<div class="form-group">
										<label for="site_login" class="col-lg-2 col-md-3 control-label">Age</label>
										<div class="col-lg-10 col-md-9">
													<input type="text" class="form-control form-cascade-control input_wid70  " placeholder="Age..." value="<?php print($conp_age); ?>" id="conp_age" name="conp_age">
												</div>
									</div>
											<hr style="padding:1px; background-color:#999">
											<h3> Question Answer </h3>
											<?php
                                    $counter_qn=0;
                                    /*if($_REQUEST['action']==1){
                                        $Query = "SELECT q.* FROM questions AS q WHERE q.status_id=1 ORDER BY q.question_id";
                                    } else {*/
                                        $Query = "SELECT q.*, cpd.question_id AS cpdquestion_id, cpd.istrue, cpd_answer FROM questions AS q LEFT OUTER JOIN contact_profile_details AS cpd ON q.question_id=cpd.question_id AND cpd.cont_id=".$_SESSION["contact_id"]." WHERE q.status_id=1 ORDER BY q.question_id";
                                    //}
                                    //echo $Query;
                                    $rs = mysql_query($Query);
                                    if (mysql_num_rows($rs) > 0) {
                                        while ($row = mysql_fetch_object($rs)) {
                                            $counter_qn++;
                                ?>
											<div class="form-group">
										<label for="site_login" class="col-lg-2 col-md-3 control-label"><?php print($row->question_field);?></label>
										<div class="col-lg-10 col-md-9">
													<input type="hidden" name="quest[]" value="<?php print($row->question_id); ?>"/>
													<input type="checkbox" id="<?php echo $counter_qn;?>" value="1" name="istrue[]" onchange="javascript: makeAnsRequired('<?php echo $counter_qn;?>');" <?php echo ((@$row->istrue=='yes')?"checked":'');?> />
													Yes &nbsp; &nbsp;
													<input type="checkbox" id="no_<?php echo $counter_qn;?>" value="0" name="istrue_false[]" onchange="javascript: makeQueUnchk('<?php echo $counter_qn;?>');" <?php echo ((@$row->istrue=='no')?"checked":'');?> />
													No &nbsp; &nbsp; </div>
										<input type="hidden" id="yes_no_value_<?php print($row->question_id);?>" value="<?php print($row->question_id);?>_<?php echo ((@$row->istrue=='yes')?"yes":'');?><?php echo ((@$row->istrue=='no')?"no":'');?>" name="yes_no_value[]" >
									</div>
											<div class="form-group">
										<label for="ans_<?php echo $counter_qn;?>" class="col-lg-2 col-md-3 control-label">If yes please describe</label>
										<div class="col-lg-10 col-md-9">
													<textarea name="ans[]" id="ans_<?php echo $counter_qn;?>" class=" form-control form-cascade-control input_wid70 ans "><?php echo @$row->cpd_answer;?></textarea>
												</div>
									</div>
											<script type="text/javascript">
                                                var id_of_true = '<?php echo $counter_qn;?>';
                                                var truFalseVal = null;
                                                truFalseVal = document.getElementById(id_of_true).checked;
                                                if(truFalseVal==true){
                                                    var addd_class = document.getElementById('ans_'+id_of_true);
                                                    addd_class.classList.add("required");
                                                }
                                            </script>
											<?php
                                    }
                                ?>
											<script>
                                    function makeAnsRequired( id ){
                                        var truFalseVal = null;
                                        truFalseVal =  $('#'+id).is(":checked");
                                        if(truFalseVal==true){
                                            $('#no_'+id).attr('checked', false);
                                            $('#yes_no_value_'+id).attr("value", id+"_yes");
                                            $('#ans_'+id).attr("class", " form-control form-cascade-control input_wid70 ans required error ");
                                            $('#err_'+id).attr("style", " visibility: visible; ");
                                        } else {
                                            $('#yes_no_value_'+id).attr("value", id+"_");
                                            $('#ans_'+id).attr("class", " form-control form-cascade-control input_wid70 ans ");
                                            $('#err_'+id).attr("style", " visibility: hidden; ");
                                        }
                                    }
                                    function makeQueUnchk( id ){
                                        var truFalseVal = null;
                                        truFalseVal =  $('#no_'+id).is(":checked");
                                        if(truFalseVal==true){
                                            $('#'+id).attr('checked', false);
                                            $('#yes_no_value_'+id).attr("value", id+"_no");
                                            $('#ans_'+id).attr("class", " form-control form-cascade-control input_wid70 ans ");
                                            $('#err_'+id).attr("style", " visibility: hidden; ");
                                        } else {
                                            $('#yes_no_value_'+id).attr("value", id+"_");
                                        }
                                    }
                                </script>
											<?php }?>
											<hr style="padding:1px; background-color:#999">
											<div class="form-group">
										<label for="site_login" class="col-lg-2 col-md-3 control-label">Any Other Comments</label>
										<div class="col-lg-10 col-md-9">
													<textarea type="text" class="form-control form-cascade-control input_wid70 " placeholder="comment.."  id="conp_comments" name="conp_comments"><?php print($conp_comments); ?></textarea>
												</div>
									</div>
											<div class="form-group">
										<label for="site_login" class="col-lg-2 col-md-3 control-label"> &nbsp; </label>
										<div class="col-lg-10 col-md-9">
													<label for="site_login" > &nbsp; (optional) Upload a picture of yourself so our staff can recognize you at the airport and during your stay</label>
												</div>
									</div>
											<div class="form-group">
										<label for="site_login" class="col-lg-2 col-md-3 control-label"> &nbsp; </label>
										<div class="col-lg-10 col-md-9">
													<input type="file" name="photo" id="photo" class="form-control form-cascade-control input_wid70" style="float:left;">
												</div>
									</div>
											<!--<div class="form-group">
										<label for="site_login" class="col-lg-2 col-md-3 control-label"> &nbsp; </label>
										<div class="col-lg-10 col-md-9"> Mark if completed:
													<input type="checkbox" name="is_completed" id="is_completed" class=""  value="1" <?php echo (($is_completed==1)?"checked='checked'":'');?>>
												</div>
									</div>
											<div class="form-group">
										<label for="site_login" class="col-lg-2 col-md-3 control-label"> &nbsp; </label>
										<div class="col-lg-10 col-md-9"> Send Email Notification:
													<input type="checkbox" name="send_email" id="send_email" class=""  value="1" >
												</div>
									</div>-->
											<script>
                            function chkCompletedorNot(){
                                var truFalseVal = null;
                                truFalseVal = $('#is_completed').is(":checked");
                                //alert( truFalseVal );
                                if(truFalseVal==false){
                                    var truTrueVal = null;
                                    truTrueVal = confirm('If your profile is complete, please mark as completed, (Press OK on this POPUP). If your profile is not complete then (Press Cancel on this POPUP).');
                                    if(truTrueVal==true){
                                        return false;
                                    } else {
                                        $('#update1').click();
                                        return true;
                                    }
                                } else {
                                    $('#update1').click();
                                    return true;
                                }
                            }
                        </script> 
										</div>
								<div class="form-group">
											<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
											<div class="col-lg-10 col-md-9">
										<input type="hidden" value="<?php print($cont_image); ?>" name="old_img">
										<!--<button type="button" name="btnUpdate" class="btn btn-primary btn-animate-demo" onclick="chkCompletedorNot();">Submit</button>-->
										<button type="submit" name="btnUpdate" class="btn btn-primary btn-animate-demo">Submit</button>
										<!--<span style="visibility: hidden; display: none;">
												<input type="submit" id="update1" value="1" name="btnUpdate">
												</span>-->
										<button type="button" name="btnCancel" class="btn btn-default btn-animate-demo" onclick="javascript: window.location = '<?php print($_SERVER['PHP_SELF']); ?>';">Cancel</button>
									</div>
										</div>
							</form>
								</div>
						<!-- /panel body --> 
					</div>
						</div>
			</div>
				</div>
		<?php include("includes/rightsidebar.php"); ?>
	</div>
		</div>
</div>
<?php include("includes/footer.php"); ?>
