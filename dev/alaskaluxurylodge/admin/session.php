<?php
session_start();
if($_SESSION['username']!='')
{
	
}
else
{
	header("location:index.php");
	
	
}
?>