
<!DOCTYPE html>
<html lang="en">

<head>
<title>Incharge-Admin</title>

<meta charset="utf-8">

<style>
.table.table-de td, .table.table-de th {
   padding: 11px !important ;
}
</style>


<link rel="stylesheet" href="../assets/fonts/fontawesome/css/fontawesome-all.min.css">

<link rel="stylesheet" href="../assets/plugins/animation/css/animate.min.css">

<link rel="stylesheet" href="../assets/plugins/notification/css/notification.min.css">

<link rel="stylesheet" href="../assets/css/style.css">

<link rel="stylesheet" href="../assets/plugins/smart-wizard/css/smart_wizard.min.css">
<link rel="stylesheet" href="../assets/plugins/smart-wizard/css/smart_wizard_theme_arrows.min.css">
<link rel="stylesheet" href="../assets/plugins/smart-wizard/css/smart_wizard_theme_circles.min.css">
<link rel="stylesheet" href="../assets/plugins/smart-wizard/css/smart_wizard_theme_dots.min.css">


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
	
	if(!isset($_SESSION['incharge_admin']))
	{
		header('location: login.php');
	}

	include('menu.php');
	
	if(isset($_REQUEST['action']) && $_REQUEST['action'] != "")
	{
		include($_REQUEST['action'].'.php');
	}
	else
	{
		header('location: login.php');
	}

	include('footer.php');
?>












</body>



</html>
