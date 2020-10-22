<?php
	if (!isset($_SESSION['incharge_ovp'])) 
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
<h5 class="m-b-10">Edit Site Region</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Edit Site Region</a></li>
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
<div class="col-md-6">
<?php $row=mysqli_fetch_array($siteregsql);?>
<form method="post" name="form" id="form" action="">
<div class="form-group">
<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />
<label>Site Region Name*</label>
<input type="text" class="form-control" id="region" name="region" placeholder="Region Name" value="<?php echo $row['region']?>" required>
</div>

<div class="form-group">
<label>Description</label>
<textarea class="form-control" id="description" name="description" placeholder="Description"><?php echo $row['description']?></textarea>
</div>

<input type="submit" class="btn btn-primary" value="Update" name="edit_region">
<a href="index.php?action=view_site_region"><input type="button" class="btn btn-primary" value="Cancel"></a>
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

