<?php    
session_start();
unset($_SESSION['incharge_ovp']);
header('location:login.php');  
 ?>