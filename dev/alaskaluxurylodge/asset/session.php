<?php
 
session_start();

if($_SESSION['uname']=='')
{
header("location:home.php");

}

?>