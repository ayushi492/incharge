<?php
include('config.php');
error_reporting(0);
session_start();

if(isset($_REQUEST['login']))
{
    $loginqry="Select * from `tbl_ovplogin` WHERE `username`='".mysqli_real_escape_string($con,$_REQUEST['username'])."' AND `password`='".mysqli_real_escape_string($con,$_REQUEST['password'])."' AND is_deleted=0";
    $logqry=mysqli_query($con,$loginqry);
    $row=mysqli_fetch_array($logqry);

    if($row==true)
    {
        $_SESSION['incharge_ovp']=$row['username'];
        //exit();
        $_SESSION['timestamp'] = time();
        if(isset($_COOKIE["user_login"]) || ($_COOKIE["user_pass"]))
        {
            setcookie ("user_login","");
            setcookie ("user_pass","");
        }
        //exit();
        header('location: index.php?action=dashboard');

    }
    else
    {
        $error="Invalid Username OR Password";
    }
}
?>