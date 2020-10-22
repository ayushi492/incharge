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
<h5 class="m-b-10">Add Customer</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Add Customer</a></li>
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

<form method="post" name="form" id="form" action="functions.php">
<div class="form-row">
<div class="form-group col-md-6" >
<label>Customer Name*</label>
<input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Customer Name" required>
</div>

<div class="form-group col-md-6">
<label>Master Username*</label>
<input type="text" class="form-control" id="master_username" name="master_username" placeholder="Master Username" required>
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label>Email*</label>
<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
</div>

<div class="form-group col-md-6">
<label>Password*</label>
<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
</div>
</div>

<div class="form-group">
<label>Address*</label>
<textarea class="form-control" id="address" name="address" placeholder="Address"></textarea>
</div>

<div class="form-row">
<div class="form-group col-md-4">
<label>City*</label>
<input type="text" class="form-control" id="city" name="city" placeholder="City" required>
</div>

<div class="form-group col-md-4">
<label>State*</label>
<input type="text" class="form-control" id="state" name="state" placeholder="State" required>
</div>

<div class="form-group col-md-4">
<label>Zip*</label>
<input type="text" class="form-control" id="zip" name="zip" placeholder="Zip" required>
</div>
</div>



<input type="submit" class="btn btn-primary" value="Add" name="add_customer">
<a href="index.php?action=view_customer"><input type="button" class="btn btn-primary" value="Cancel"></a>
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

