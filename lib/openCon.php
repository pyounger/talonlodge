<?php
error_reporting(E_ALL ^ E_DEPRECATED);	
$dbServer = "localhost";
	
	/*$dbDatabase = "talonlod_db";
	$dbUserName = "talonlod_db";
	$dbPassword = "Lodge123";*/
	
	$dbDatabase = "talonlod_newDB";
	$dbUserName = "talonlod_newDB";
	$dbPassword = "Lodge123";
	$conn = mysql_connect("$dbServer","$dbUserName","$dbPassword") or die("<h1>Unable 2 Connect 2 Database Server</h1>"); 
	$db = mysql_select_db("$dbDatabase")  or die("Unable 2 Connect 2 Database"); 
        
        $DEBUG = true;
        $LOGFILE = "/home2/talonlod/logs/profiles_".date("YmdH").".log";;
        
        $setupMySql = mysql_query(" SET SQL_BIG_SELECTS=1 " );
        
?>
