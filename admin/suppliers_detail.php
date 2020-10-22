<?php
	if (!isset($_SESSION['incharge_admin'])) 
	{
       header('location:login.php');
	}
?>

<style>
	.sw-theme-dots>ul.step-anchor:before {
	content: " ";
	position: absolute;
	top: 77px;
	bottom: 0;
	width: 100%;
	height: 5px;
	background-color: #f5f5f5;
	border-radius: 3px;
	z-order: 0;
	z-index: 95;
	}
	.sw-theme-dots>ul.step-anchor>li>a:before {
	content: ' ';
	position: absolute;
	bottom: 2px;
	left: 61px;
	margin-top: 10px;
	display: block;
	border-radius: 50%;
	color: #428bca;
	background: #f5f5f5;
	border: none;
	width: 30px;
	height: 30px;
	text-decoration: none;
	z-index: 98;
	top: 54px;
	}
</style>

<div class="pcoded-main-container">
<div class="pcoded-wrapper">
<div class="pcoded-content">
<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="page-block">
<div class="row align-items-center">
<div class="col-md-12">
<div class="page-header-title">
<h5 class="m-b-10">Add Charger</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Add Charger</a></li>
</ul>
</div> 
</div>
</div>
</div>


<div class="row">


<div class="col-sm-12">
<div class="card">
<!--<div class="card-header">
<h5>Suppliers Detail</h5>
</div>-->
<div class="card-body">
<!--<div class="row">

<div class="col-12">
<select id="theme_selector" class="form-control custom-select col-lg-6 col-sm-12">
<option value="default">default</option>
<option value="arrows">arrows</option>
<option value="dots">dots</option>
</select>
</div>

</div>-->

<div id="smartwizard" class="sw-main sw-theme-default" >
<ul>
<li><a href="#step-1">
<h6>Step 1</h6>
<p class="m-0">Suppliers Details</p>
</a></li>
<li><a href="#step-2">
<h6>Step 2</h6>
<p class="m-0">Charger Details</p>
</a></li>
</ul>
<div>
<div id="step-1">
<h5>Suppliers Details</h5>
<hr>

<form method="post" name="form" id="form" action="">
<div class="form-row">
<div class="form-group col-md-6" >
<label>Supplier Name*</label>
<input type="text" class="form-control" id="supplier_name" name="supplier_name" placeholder="Supplier Name"  required>
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label>Address*</label>
<textarea class="form-control" placeholder="Address" name="address" id="address" required></textarea>
</div>
</div>

<!--<h6 class="mt-3">Sub title 2</h6>
<p><strong>@Title content 2!.. </strong> Lorem Ipsum is simply dummy text and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>-->
</div>
<div id="step-2">
<h5>Charger Details</h5>
<hr>

<div class="form-row">
<div class="form-group col-md-6" >
<label>No. of Connectors Connected to Charger*</label>
<input type="text" class="form-control" id="connector_no" name="connector_no" placeholder="Connectors Connected to Charger" required>
</div>

<div class="form-group col-md-6">
<label>Type of Connector*</label>
<select class="form-control" id="connector_type" name="connector_type" onchange="connector_list(this)" required>
	<option value="">Select</option>
	<option value="AC">AC</option>
    <option value="DC">DC</option>
</select>
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label>Connector*</label>
<select class="form-control" id="connector" name="connector" required>
	<option value="">Select</option>
</select>
</div>

<div class="form-group col-md-6">
<label>Charger Capabilities*</label>
<select class="form-control" id="charger_capabilities" name="charger_capabilities" required>
	<option value="">Select</option>
	<option value="Payment Capable">Payment Capable</option>
    <option value="Reserve Capable">Reserve Capable</option>
    <option value="Charging Profile Capable">Charging Profile Capable</option>
    <option value="Remote Start/Stop Capable">Remote Start/Stop Capable</option>
    <option value="RFID Reader Capable">RFID Reader Capable</option>
</select>
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label>Connector Section*</label>
<select class="form-control" id="connector_section" name="connector_section" required>
	<option value="">Select</option>
	<option value="Connector Voltage">Connector Voltage</option>
    <option value="Connector Amperage">Connector Amperage</option>
</select>
</div>

<div class="form-group col-md-6">
<label>Make of display for charger*</label>
<input type="text" class="form-control" id="make_of_display_for_charger" name="make_of_display_for_charger" placeholder="Make of display for charger" required>
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label>Charger Serial Number *</label>
<input type="text" class="form-control" id="charger_serial_number" name="charger_serial_number" placeholder="Charger Serial Number " required>
</div>
</div>




<input type="submit" class="btn btn-primary" value="Add" name="manage_charger">
<a href="index.php?action=view_manage_charger"><input type="button" class="btn btn-primary" value="Cancel"></a>
</form>
</div>

</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>


<script>
function connector_list(sel){
	var type = sel.value;
	if(type != '')
	{
		$.ajax({
			   type: "POST",
			   data: {type:type},
			   url: "ajax_connector.php",
			   success: function(data){  
				 $("#connector").html(data);  
			   }
			});
	}
}
</script>