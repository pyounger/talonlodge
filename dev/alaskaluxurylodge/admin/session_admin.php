<?php
session_start();
if($_SESSION['username']!='' && $_SESSION['user_type']=='admin')
{
	
	
}
else
{
	header("location:index.php");
	
}

?>