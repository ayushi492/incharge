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
<h5 class="m-b-10">Edit Customer</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Edit Customer</a></li>
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
<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
<label>Customer Name*</label>
<input type="text" class="form-control" id="customer_name" name="customer_name" value="<?php echo $row['customer_name'];?>" placeholder="Customer Name" required>
</div>

<div class="form-group col-md-6">
<label>Master Username*</label>
<input type="text" class="form-control" id="master_username" name="master_username" placeholder="Master Username" value="<?php echo $row['master_username'];?>" required>
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label>Email*</label>
<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $row['email'];?>" required>
</div>

<div class="form-group col-md-6">
<label>Password*</label>
<input type="password" disabled class="form-control" id="password" name="password" value="<?php echo $row['password'];?>" placeholder="Password" required>
</div>
</div>

<div class="form-group">
<label>Address*</label>
<textarea class="form-control" id="address" name="address" placeholder="Address"><?php echo $row['address'];?></textarea>
</div>

<div class="form-row">
<div class="form-group col-md-4">
<label>City*</label>
<input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $row['city'];?>" required>
</div>

<div class="form-group col-md-4">
<label>State*</label>
<input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?php echo $row['state'];?>" required>
</div>

<div class="form-group col-md-4">
<label>Zip*</label>
<input type="text" class="form-control" id="zip" name="zip" placeholder="Zip" value="<?php echo $row['zip'];?>" required>
</div>
</div>

<input type="submit" class="btn btn-primary" value="Update" name="edit_customer">
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

