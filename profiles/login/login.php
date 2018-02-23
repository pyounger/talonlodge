<?php
ob_start();
include("../../lib/openCon.php");
include("../../lib/functions.php");
session_start();
$strMSG = "";
if (isset($_POST['btnLogin'])) {
    $rs = mysql_query("SELECT * FROM users WHERE user_pass='" . md5($_REQUEST['mem_password']) . "' AND user_name='" . $_REQUEST['mem_login'] . "'");
    if (mysql_num_rows($rs) > 0) {
        $row = mysql_fetch_object($rs);
        $_SESSION["UserID"] = $row->user_id;
        
        //$_SESSION["UType"] = $row->utype_id;
		
		if($row->utype_id>1){
			$_SESSION["UType"] = '2';
		}
		else{
			$_SESSION["UType"] = '1';
		}
        
        $_SESSION["UserName"] = $row->user_name;
        $_SESSION["cust_id"] = $row->cust_id;

        $_SESSION["cont_id"] = $row->cont_id;
        $_SESSION["contact_id"] = $row->cont_id;
        $_SESSION["user_display_name"] = $row->user_display_name;
        $_SESSION['limit_of_rec'] = '200';

        
        $exist = returnName("grp_id", "groups", "Contact_ID", $row->cont_id);
        if($exist > 0){
            $_SESSION['is_leader'] = 1;
        }
        else {
            $_SESSION['is_leader'] = 0;
        }
        
        $_SESSION['group_id'] = 0;
        if($row->utype_id == 3){
//            $Query = "SELECT c.cont_id AS ccont_id, c.ContactID AS cContactID, gc.grp_id, g.GroupName, g.GroupArrivalDate, g.GroupDepartureDate, p.Package_Name FROM contacts AS c LEFT OUTER JOIN group_contacts AS gc ON c.ContactID=gc.ContactID LEFT OUTER JOIN groups AS g ON gc.grp_id=g.grp_id LEFT OUTER JOIN packages AS p ON g.Pms_Package_ID=p.Pms_Package_ID WHERE c.ContactID=".$_SESSION["cont_id"]." AND c.grp_id=gc.grp_id";

            $Query = "SELECT gc.grp_id, con.ContactID FROM group_contacts AS gc LEFT OUTER JOIN contacts AS con ON gc.ContactID = con.ContactID WHERE (gc.ContactID = '".$_SESSION["contact_id"]."') AND (con.ContactID = '".$_SESSION["contact_id"]."') ";
            $count = mysql_num_rows(mysql_query($Query));
            $rs = mysql_query($Query);
            if ($count > 0) {
                while ($row = mysql_fetch_object($rs)) {
                    $_SESSION['group_id'] = $row->grp_id;
                }
            }
        } else {
            $_SESSION['group_id'] =  returnName("grp_id", "groups", "Contact_ID", $row->cont_id." AND GroupArrivalDate!='0000-00-00' AND GroupDepartureDate!='0000-00-00' AND Booking_Status!='Hold' AND Booking_Status!='' ");
        }
        
        if($_SESSION['group_id'] == ''){
            $Query = "SELECT gc.grp_id, con.ContactID FROM group_contacts AS gc LEFT OUTER JOIN contacts AS con ON gc.ContactID = con.ContactID WHERE (gc.ContactID = '".$_SESSION["contact_id"]."') AND (con.ContactID = '".$_SESSION["contact_id"]."') ";
            $count = mysql_num_rows(mysql_query($Query));
            $rs = mysql_query($Query);
            if ($count > 0) {
                while ($row = mysql_fetch_object($rs)) {
                    $_SESSION['group_id'] = $row->grp_id;
                }
            }
        }
        
        
        if(isset($_SESSION['referer_url'])&&($_SESSION['referer_url']!='')&&($_SESSION['referer_url']!='http://talonlodge.websitedesigninhouston.net/admin/login/login.php')){
            header("Location: ".$_SESSION['referer_url']."");
        } else {
            header("Location: ../index.php");
        }

    } else {
        $strMSG = '<div class="alert alert-danger" style="width:90%; margin-left:5%;"> Invalid Login or Password </div>';
    }
}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Talon Lodge Guest Portal </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="css/login.css" rel="stylesheet">
    </head>
    <body >
        <div class="login-box">
            <h1> <img src="../images/logo.png" width="250"> </h1>
            <hr>
            <h5>LOGIN</h5>
            <?php print($strMSG); ?>
            <div class="input-box">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
                        <form role="form" method="post" action="<?php print($_SERVER['PHP_SELF']); ?>">
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class='fa fa-envelope'></i></span>
                                <input type="text" class="form-control" placeholder="Username" name="mem_login">
                            </div>
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class='fa fa-key'></i></span>
                                <input type="password" class="form-control" placeholder="Password" name="mem_password">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="btnLogin" class="btn  btn-block  btn-submit pull-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>