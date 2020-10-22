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
</head>
<body class="">

<div class="loader-bg">
<div class="loader-track">
<div class="loader-fill"></div>
</div>
</div>

<?php 
    //include config file
    include('config.php');
	include('functions.php');
    //check if session set or not
    session_start();
    if (!isset($_SESSION['incharge_ovp'])) {
       header('location:login.php');
    }
    else {

        if (isset($_REQUEST['action']) && $_REQUEST['action'] != "") {
            include('menu.php'); include($_REQUEST['action'] . '.php');
        }
        //if illegal url hit
        else {
            unset($_SESSION['incharge_ovp']);
            echo"<script>window.location.href='login.php';</script>";
        }
    }

	include('footer.php');
?>












</body>

    <script src="assets/js/jquery-1.9.1.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script>
    $('.dateselect').datepicker({
        format: 'mm/dd/yyyy',
        // startDate: '-3d'
    });
    </script>
<!--<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/pcoded.min.js"></script>-->


</html>
