<?php include('includes/php_includes_top.php'); ?>
<?php
$isLeader = 1;

if((isset($_REQUEST['limit_of_rec']))&&($_REQUEST['limit_of_rec']!='')){
    $_SESSION['limit_of_rec'] = $_REQUEST['limit_of_rec'];
} else if(isset($_SESSION['limit_of_rec'])){
    //$_SESSION['group_name'] = $_SESSION['group_name'];
} else {
    $_SESSION['limit_of_rec'] = '200';
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
	<?php
		 $rsM = mysql_query("SELECT c.*, t.*, d.* ,cu.countries_name,f.flight_name ,n.flightn_name,fd.flight_name As depature_flight,
        nd.flightn_name AS depature_flight_no,j.jacketsize_name,b.bootsize_name,g.gen_name 
        FROM 
        contacts As c 
        LEFT OUTER JOIN contact_profiles AS t ON c.ContactID=t.cont_id
        LEFT OUTER JOIN contact_profile_details AS d ON d.cont_id=c.cont_id left outer join countries As cu on cu.countries_id=c.countries_id
        Left Outer Join flight_info As f on f.flight_id=c.arrival_airline_id Left Outer Join flight_no As n on n.flightn_id=c.arrival_flight_no_id
        Left Outer join flight_info As fd on fd.flight_id=c.departure_airline_id Left outer join flight_no As nd on nd.flightn_id=c.departure_flight_no_id
        Left Outer join jacket_size  As j  On j.jacketsize_id=t.jacketsize_id  Left outer Join boot_size As b on b.bootsize_id=t.bootsize_id
        Left Outer join gender  As g on g.gen_id=c.gen_id 
        WHERE c.ContactID=" . $_SESSION["contact_id"]);

    if (mysql_num_rows($rsM) > 0) {
        $rsMem = mysql_fetch_object($rsM);
        $cont_id = $rsMem->cont_id;
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
        $countries_name = $rsMem->countries_name;
        $cont_phone1 = $rsMem->cont_phone1;
        $cont_phone2 = $rsMem->cont_phone2;

        
        $jacketsize_name = $rsMem->jacketsize_name;
        $bootsize_name = $rsMem->bootsize_name;
        
        $gen_id = $rsMem->gen_id;
        $gen_name = $rsMem->gen_name;
        //$flightn_id=$rsMem->flightn_id;

        $arrival_flight_data = $rsMem->arrival_flight_data;
        $departure_flight_date = $rsMem->departure_flight_date;
        $arrival_airline_id = $rsMem->arrival_airline_id;
        $flight_name = $rsMem->flight_name;
        $departure_airline_id = $rsMem->departure_airline_id;
        $flight_named = $rsMem->depature_flight;
        $arrival_flight_no_id = $rsMem->arrival_flight_no_id;
        $flightn_name = $rsMem->flightn_name;
        $departure_flight_no_id = $rsMem->departure_flight_no_id;
        $depature_flight_no = $rsMem->depature_flight_no;
        $conp_id = $rsMem->conp_id;
        $conp_age = $rsMem->conp_age;

        $bootsize_id = $rsMem->bootsize_id;
        $jacketsize_id = $rsMem->jacketsize_id;
        $conp_comments = $rsMem->conp_comments;
        $cont_image = $rsMem->cont_image;
        //$question_id=$rsMem->question_id;
        //$question_field=$rsMem->question_field;
        //$cpd_answer=$rsMem->cpd_answer;
        //$status_id = $rsMem->status_id;
        //$site_del = $rsMem->site_del;
        $conp_comments = $rsMem->conp_comments;
        $formHead = "Update Info";
    }

?>
	<div class="row">
		<div class="col-md-12">
		<div class="<?php print($class); ?>"><?php print($strMSG); ?></div>
			<div class="panel panel-cascade">
				<div class="panel-heading">
					<h3 class="panel-title"> Details </h3>
				</div>
				<div class="panel-body">
					<form name="frm" id="frm" method="post" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" class="form-horizontal" role="form">
					<div class="form-group">
						<label for="site_login" class="col-lg-2 col-md-3 control-label">Profile Pic</label>
						<div class="col-lg-10 col-md-9 det-display"> <img src="files/contents/<?php echo $cont_image; ?>" alt='Image' width="250" style="width:250px;"> </div>
					</div>
					<div class="form-group">
						<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact First Name</label>
						<div class="col-lg-10 col-md-9 det-display" style="text-transform:capitalize;"> <?php print($cont_fname); ?> </div>
					</div>
					<div class="form-group">
						<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Last Name</label>
						<div class="col-lg-10 col-md-9 det-display" style="text-transform:capitalize;"> <?php print($cont_lname); ?> </div>
					</div>
					<div class="form-group">
						<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Email</label>
						<div class="col-lg-10 col-md- det-display"> <?php print($cont_emial); ?> </div>
					</div>
					<div class="form-group">
						<label for="site_login" class="col-lg-2 col-md-3 control-label">Contact Phone </label>
						<div class="col-lg-10 col-md-9 det-display"> <?php print($cont_phone1); ?> </div>
					</div>
					<hr style="padding:1px; background-color:#999">
					<div class="form-group">
						<label for="site_login" class="col-lg-2 col-md-3 control-label">Country</label>
						<div class="col-lg-10 col-md-9 det-display"> <?php print($countries_name); ?></div>
					</div>
					<div class="form-group">
						<label for="site_login" class="col-lg-2 col-md-3 control-label">Address 1</label>
						<div class="col-lg-10 col-md-9 det-display"> <?php print($cont_address1); ?> </div>
					</div>
					<div class="form-group">
						<label for="site_login" class="col-lg-2 col-md-3 control-label">Address 2</label>
						<div class="col-lg-10 col-md-9 det-display"> <?php print($cont_address2); ?> </div>
					</div>
					<div class="form-group">
						<label for="site_login" class="col-lg-2 col-md-3 control-label">City</label>
						<div class="col-lg-10 col-md-9 det-display"> <?php print($cont_city); ?> </div>
					</div>
					<div class="form-group">
						<label for="site_login" class="col-lg-2 col-md-3 control-label">State</label>
						<div class="col-lg-10 col-md-9 det-display"> <?php print($cont_state); ?> </div>
					</div>
					<div class="form-group">
						<label for="site_login" class="col-lg-2 col-md-3 control-label">Zip Code</label>
						<div class="col-lg-10 col-md-9 det-display"> <?php print($cont_zip); ?> </div>
					</div>
					<hr style="padding:1px; background-color:#999">
					<div class="form-group">
						<label for="site_login" class="col-lg-2 col-md-3 control-label">Emergency Contact Name</label>
						<div class="col-lg-10 col-md-9 det-display"> <?php print($emg_contact_name); ?> </div>
					</div>
					<div class="form-group">
						<label for="site_login" class="col-lg-2 col-md-3 control-label">Emergency Contact Phone</label>
						<div class="col-lg-10 col-md-9 det-display"> <?php print($cont_phone2); ?> </div>
					</div>
					<hr style="padding:1px; background-color:#999">
					<div class="form-group">
						<label for="site_login" class="col-lg-2 col-md-3 control-label">Boot size</label>
						<div class="col-lg-10 col-md-9 det-display"> <?php echo returnName("bs.bootsize_name", "contact_profiles AS cp LEFT OUTER JOIN boot_size AS bs ON cp.bootsize_id=bs.bootsize_id", "cp.cont_id", $_SESSION["contact_id"]);?> </div>
					</div>
					<div class="form-group">
						<label for="site_login" class="col-lg-2 col-md-3 control-label">Jacket Size</label>
						<div class="col-lg-10 col-md-9 det-display"><?php echo returnName("js.jacketsize_name", "contact_profiles AS cp LEFT OUTER JOIN jacket_size AS js ON cp.jacketsize_id=js.jacketsize_id", "cp.cont_id", $_SESSION["contact_id"]);?> </div>
					</div>
					<div class="form-group">
						<label for="site_login" class="col-lg-2 col-md-3 control-label">Sex</label>
						<div class="col-lg-10 col-md-9 det-display"> <?php print($gen_name); ?></div>
					</div>
					<div class="form-group">
						<label for="site_login" class="col-lg-2 col-md-3 control-label">Age</label>
						<div class="col-lg-10 col-md-9 det-display"> <?php print($conp_age); ?></div>
					</div>
					<hr style="padding:1px; background-color:#999">
					<h3>Medical conditions / Food allergies </h3>
					<?php
						$counter_qn=0;
						$Query = "SELECT q.*, cpd.question_id AS cpdquestion_id, cpd.istrue, cpd.cpd_answer FROM questions AS q, contact_profile_details AS cpd WHERE q.question_id=cpd.question_id AND cpd.cont_id=".$_SESSION["contact_id"]." AND cpd.cpd_answer!='' AND q.status_id=1 AND q.question_id<3 ORDER BY q.question_id";
						//$Query = "SELECT q.*, cpd.question_id AS cpdquestion_id, cpd.istrue, cpd.cpd_answer FROM questions AS q, contact_profile_details AS cpd WHERE q.question_id=cpd.question_id AND cpd.cont_id=".$_REQUEST['contactid']." AND grp_id=".$_REQUEST['grp_id']." AND cpd.cpd_answer!='' AND q.status_id=1 ORDER BY q.question_id";
						$rs = mysql_query($Query);
						if (mysql_num_rows($rs) > 0) {
							while ($row = mysql_fetch_object($rs)) {
								$counter_qn++;
					?>
							<div class="form-group">
								<label for="site_login" class="col-lg-2 col-md-3 control-label">Question:</label>
								<div class="col-lg-10 col-md-9 det-display"><?php print(@$row->question_field);?></div>
							</div>
							<div class="form-group">
								<label for="site_login" class="col-lg-2 col-md-3 control-label">Answer:</label>
								<div class="col-lg-10 col-md-9 det-display"><?php echo @$row->cpd_answer;?></div>
							</div>
					<?php
							}
						} else {
					?>
							<div class="form-group">
								<label for="site_login" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
								<div class="col-lg-10 col-md-9 det-display">No Records Found.</div>
							</div>
					<?php
						}
					?>
						<hr style="padding:1px; background-color:#999">
						<div class="form-group">
							<label for="site_login" class="col-lg-2 col-md-3 control-label">Any Other Comments</label>
							<div class="col-lg-10 col-md-9 det-display"> <?php print($conp_comments); ?> </div>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 col-md-3 control-label">&nbsp;</label>
							<div class="col-lg-10 col-md-9"><button type="button" name="btnBack" class="btn btn-default btn-animate-demo" onclick="javascript: window.location = 'profile_update.php';">Edit</button></div>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php include("includes/rightsidebar.php"); ?>
	</div>
		</div>
</div>
<?php include("includes/footer.php"); ?>
