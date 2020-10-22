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
<h5 class="m-b-10">Add Vendor</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Add Vendor</a></li>
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
<p class="m-0">Vendor Details</p>
</a></li>
<li><a href="#step-2">
<h6>Step 2</h6>
<p class="m-0">Charger Module</p>
</a></li>
</ul>
<div>
<div id="step-1">
<h5>Vendor Details</h5>
<hr>

<form method="post" name="form" id="form" action="">
<div class="form-row">
<div class="form-group col-md-6" >
<label>Vendor Name*</label>
<input type="text" class="form-control" id="vendor_name" name="vendor_name" placeholder="Vendor Name"  required>
</div>

<div class="form-group col-md-6">
<label>Vendor Email*</label>
<input type="email" class="form-control" id="email" name="email" placeholder="Vendor Email"  required>
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6" >
<label>Vendor Contact*</label>
<input type="text" class="form-control" id="contact" name="contact" placeholder="Vendor Contact"  required>
</div>

<div class="form-group col-md-6">
<label>Address*</label>
<textarea class="form-control" name="address" id="address" required></textarea>
</div>
</div>

</div>

<div id="step-2">
<h5>Charger Module</h5>
<hr>

<div class="form-row">
<div class="form-group col-md-6" >
<label>Module Name*</label>
<input type="text" class="form-control" id="module_name" name="module_name" placeholder="Module Name" required>
</div>

<div class="form-group col-md-6">
<label>Module Type*</label>
<select class="form-control" id="module_type" name="module_type" required>
	<option value="">Select</option>
	<option value="AC">AC</option>
    <option value="DC">DC</option>
</select>
</div>
</div>


<div class="form-row">
<div class="form-group col-md-6">
<label>Module Voltage*</label>
<input type="text" class="form-control" id="module_voltage" name="module_voltage" placeholder="Module Voltage" required>
</div>

<div class="form-group col-md-6">
<label>Nick Name*</label>
<input type="text" class="form-control" id="nick_name" name="nick_name" placeholder="Nick Name" required>
</div>
</div>


<div class="form-row">
<div class="form-group col-md-6">
<label>Data Sheet *</label>
<input type="file" class="form-control" id="data_sheet" name="data_sheet" placeholder="Data Sheet" required>
</div>

<div class="form-group col-md-6">
<label>Photo of Module*</label>
<input type="file" class="form-control" id="photo_of_module" name="photo_of_module" placeholder="Photo of Module" required>
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