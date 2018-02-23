<?php
	$dbDatabase = "talonlod_db";
	$dbServer = "localhost";
	$dbUserName = "talonlod_db";
	$dbPassword = "Lodge123";
	$conn = mysql_connect("$dbServer","$dbUserName","$dbPassword") or die("<h1>Unable 2 Connect 2 Database Server</h1>"); 
	$db = mysql_select_db("$dbDatabase")  or die("Unable 2 Connect 2 Database"); 
?>
