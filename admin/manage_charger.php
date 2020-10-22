<?php
	if (!isset($_SESSION['incharge_admin'])) 
	{
       header('location:login.php');
	}
?>
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
<div class="card-header">
<!--<h5>Add Site Region</h5>
<hr>-->
<div class="row">
<div class="col-md-12">

<form method="post" name="form" id="form" action="">
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

