<?php
include("../lib/openCon.php");
include("../lib/functions.php");
session_start();
require_once("../lib/class.pager1.php");
$p = new Pager1;
if (!isset($_SESSION["UserID"])) {
    print("Session not found");
    //header("location: login/login.php");
}

$strMSG = "";
$FormHead = "";
?>