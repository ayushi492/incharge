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
<h5 class="m-b-10">Add Site Division</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Add Site Division</a></li>
</ul>
</div> 
</div>
</div>
</div>


<div class="row">

<div class="col-sm-12">
<div class="card">
<div class="card-header">
<!--<h5>Add Site Division</h5>
<hr>-->
<div class="row">
<div class="col-md-6">

<form method="post" name="form" id="form" action="">

<div class="form-group">
<label>Region*</label>
  <select name="region" class="form-control" required>
    <option value=""> Select</option>
    <?php
    //$sqlkiosk = "SELECT DISTINCT (region),id FROM tbl_site_region WHERE is_deleted=0";
	$addSitediv = new FetchData();
	$addSitediv->set_where(array('is_deleted'=>0));
	$addSitedivSql = $addSitediv->fetch_data('tbl_site_region',array('id','region'));
    while($r = mysqli_fetch_assoc($addSitedivSql))
    {
    ?>
    <option value="<?php echo $r['id']; ?>"> <?php echo $r['region']; ?> </option>
    <?php
    }
    ?>
  </select>
 
</div>

<div class="form-group">
<label>Site Division Name*</label>
<input type="text" class="form-control" id="division" name="division" placeholder="Division Name" required>
</div>

<input type="submit" class="btn btn-primary" value="Add" name="add_division">
<a href="index.php?action=view_site_division"><input type="button" class="btn btn-primary" value="Cancel"></a>
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

