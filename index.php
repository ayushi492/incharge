<!DOCTYPE html>
<html lang="en">
<style>
.table.table-de td, .table.table-de th {
    padding: 11px !important ;
}
</style>
<head>
<title>Incharge</title>



<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />




<link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">

<link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">

<link rel="stylesheet" href="assets/plugins/notification/css/notification.min.css">

<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/plugins/data-tables/css/datatables.min.css">


</head>
<body class="">

<div class="loader-bg">
<div class="loader-track">
<div class="loader-fill"></div>
</div>
</div>

<?php
include('config.php');
include('functions.php');
include('MainClass.php');
include('action.php');
//check if session set or not
    session_start();
    if (!isset($_SESSION['incharge_ovp'])) {
       header('location:login.php');
    }
    else {
        //if any user logged in
        if($_SESSION['incharge_ovp']!='admin')
        {
            if (isset($_REQUEST['action']) && $_REQUEST['action'] != "")
            {
                // search about the page name in databse of user login
                $geturi=$_REQUEST['action'];
                $user_t = new FetchData();
                $user_t->set_where(array('username' => $_SESSION['incharge_ovp']));
                $usertsql = $user_t->fetch_data('tbl_user_manage',array('*'));
                $rows = mysqli_fetch_assoc($usertsql);
                // if this page name exist in database
                if(isset($rows[$geturi]))
                {
                    if ($rows[$geturi]==1) // if this page is accessable to this user
                    {
                        include('menu.php');
                        include($_REQUEST['action'] . '.php');
                    }
                    else // if this page is not accessable by this user
                    {
                        unset($_SESSION['incharge_ovp']);
                        echo"<script>alert('You are not allowed to access this page');window.location.href='login.php';</script>";
                    }
                }
                else { // if this page is not exist in table
                    unset($_SESSION['incharge_ovp']);
                    echo"<script>alert('You are not allowed to access this page');window.location.href='login.php';</script>";
                }
            }
            //if illegal url hit
            else{
                unset($_SESSION['incharge_ovp']);
                echo"<script>window.location.href='login.php';</script>";
            }
        }
        //if admin logged in
        else {
            if (isset($_REQUEST['action']) && $_REQUEST['action'] != "") {
                include('menu.php');
                include($_REQUEST['action'] . '.php');
            }
            //if illegal url hit
            else {
                unset($_SESSION['incharge_ovp']);
                echo"<script>window.location.href='login.php';</script>";
            }
        }
    }

	include('footer.php');
?>
</body>
</html>
