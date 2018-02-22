<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();
include("../lib/openCon.php");
session_start();
require_once("../lib/database.pdo.php");
include("../lib/functions.php");
include("../lib/functions_mail.php");
require_once("../lib/class.pager1.php");
$p = new Pager1;

@$_SESSION['referer_url'] = $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
if (!isset($_SESSION["UserID"])) {
    header("Location: login/login.php");
}
$_SESSION['config_date1'] = returnName("config_date", "site_config", "config_id", '1', $extra = '');
$_SESSION['config_date2'] = date("Y-m-d", strtotime("+365 days")) ;
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