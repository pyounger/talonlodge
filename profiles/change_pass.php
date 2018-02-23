<?php include('includes/php_includes_top.php'); ?>
<?php
if (isset($_REQUEST['updatepass'])) {

    $rs = mysql_query("SELECT * FROM users WHERE user_pass='" . md5($_REQUEST['txt_old_password']) . "' AND user_id='" . $_SESSION['UserID'] . "'") or die(mysql_error());
    if (mysql_num_rows($rs) > 0) {
        if ($_REQUEST['txt_password'] != $_REQUEST['txt_re_password']) {
           header("Location: " . $_SERVER['PHP_SELF'] . "?" . $qryStrURL . "op=3"); 
        }  else {
            $strQry="UPDATE users SET user_pass = '".md5($_REQUEST['txt_password'])."' WHERE user_id = ".$_SESSION['UserID'];
            mysql_query($strQry) or die(mysql_error());
            header("Location: " . $_SERVER['PHP_SELF'] . "?" . $qryStrURL . "op=2"); 
        }
    } else {
        header("Location: " . $_SERVER['PHP_SELF'] . "?" . $qryStrURL . "op=4");
    }
}
if(isset($_REQUEST['op'])){
	switch ($_REQUEST['op']) {
		case 1:
			$class = "alert alert-success";
			$strMSG = "Record Added Successfully";
			break;
		case 2:
			$strMSG = "Password Changed Successfully";
			$class = "alert alert-success";
			break;
		case 3:
			$class = " alert alert-danger ";
			$strMSG = "New Password Don't Match With Re-Enter Password Field!";
			break;
		case 4:
			$class = "alert alert-danger";
			$strMSG = "You have Entered Wrong Old Password!";
			break;
	}
}
?>
<?php include('includes/html_header.php'); ?>
					<div class="row">
				<div class="col-mod-12">
							<ul class="breadcrumb">
						<li><a href="index.php">Dashboard</a></li>
					</ul>
							<div class="form-group hiddn-minibar pull-right"> </div>
							<h3 class="page-header"> Change Password <i class="fa fa-info-circle animated bounceInDown show-info"></i></h3>
							<blockquote class="page-information hidden">
						<p> <b>Change Password: </b> You can change your password. </p>
					</blockquote>
						</div>
			</div>
					<div class="row">
					<?php if ($class != "") { ?>
					<div class="<?php print($class); ?>"><?php print($strMSG); ?><a class="close" data-dismiss="alert">×</a></div>
					<?php } ?>
				<div class="col-md-12">
							<div class="panel panel-cascade">
						<div class="panel-heading">
									<h3 class="panel-title text-primary"> <?php print($formHead); ?> </h3>
								</div>
						<div class="panel-body panel-border">
									<form name="frm" id="frm" method="post" class="form-horizontal" action="<?php print($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']); ?>" role="form">
									<div class="form-group">
											<label  class="col-lg-3 col-md-3 control-label">Old password:</label>
											<div class="col-lg-4 col-md-9">
												<input type="password" class="form-control form-cascade-control required " name="txt_old_password" id="txt_old_password"  placeholder="Old password"/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-3 col-md-3 control-label">New password:</label>
											<div class="col-lg-4 col-md-9">
												<input type="password" class="form-control form-cascade-control required " name="txt_password" id="txt_password" placeholder="New password"/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-3 col-md-3 control-label">Re-Enter New password::</label>
											<div class="col-lg-4 col-md-9">
												<input type="password" class="form-control form-cascade-control  required" name="txt_re_password" id="txt_re_password" placeholder="Re-Enter New Password"/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-3 col-md-3 control-label"></label>
											<div class="col-lg-4 col-md-9">
												<button type="submit" name="updatepass" class="btn btn-primary btn-animate-demo">Update</button>
												<?php $link="index.php";?>
												<button type="button" name="back" class="btn btn-default btn-animate-demo" onclick="javascript: window.location='<?php print($link);?>';">Cancel</button>
											</div>
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
