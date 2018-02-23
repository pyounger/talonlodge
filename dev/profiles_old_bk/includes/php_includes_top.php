<?php
ob_start();
@error_reporting(0);
@ini_set("display_errors", 0);

include("../lib/openCon.php");
session_start();
include("../lib/functions.php");
include("../lib/functions_mail.php");
require_once("../lib/class.pager1.php");
$p = new Pager1;
@$_SESSION['referer_url'] = $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];

if (!isset($_SESSION["UserID"])) {
    header("Location: login/login.php");
}
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 1) {
    $formHead = " Add New ";
} else {
    $formHead = " Update Details ";
}
$strMSG = "";
$class = "";
if (isset($_REQUEST['op'])) {
    switch ($_REQUEST['op']) {
        case 1:
            $strMSG = " Record Added Successfully ";
            $class = "alert alert-success";
            break;
        case 2:
            $strMSG = " Record Updated Successfully ";
            $class = " alert alert-info ";
            break;
        case 3:
            $strMSG = " Record Deleted Successfully ";
            $class = " alert alert-info ";
            break;
        case 4:
            $strMSG = " Record Already Exists ";
            $class = "alert alert-danger";
            break;
        case 5:
            $strMSG = " Your Request Can Not Be Fullfill At This Time ";
            $class = "alert alert-danger";
            break;
        case 6:
            $strMSG = " Total members should be less then 24 ";
            $class = "alert alert-danger";
            break;
        case 7:
            $strMSG = " Login Info sent ";
            $class = "alert alert-success";
            break;
    }
}
?>