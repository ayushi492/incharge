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
<h5 class="m-b-10">Edit Site Division</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Edit Site Division</a></li>
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
<?php $row=mysqli_fetch_array($sitedivsql); ?>
<form method="post" name="form" id="form" action="">

<div class="form-group">
<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />
<label>Region*</label>
  <select name="region" class="form-control" required>
    <option value=""> Select</option>
    <?php
	$siteEditdiv1 = new FetchData();
	$siteEditdiv1->set_where(array('is_deleted'=>0));
	$sitedivsql1 = $siteEditdiv1->fetch_data('tbl_site_region',array('id','region'));
    while($r = mysqli_fetch_assoc($sitedivsql1))
    {
    ?>
    <option value="<?php echo $r['id'];?>"<?php if($row['region']==$r['id']){?> selected="selected" <?php }?>> <?php echo $r['region']; ?> </option>
    
    <?php
    }
    ?>
  </select>
 
</div>

<div class="form-group">
<label>Site Division Name*</label>
<input type="text" class="form-control" id="division" name="division" placeholder="Division Name" value="<?php echo $row['division']?>" required>
</div>

<input type="submit" class="btn btn-primary" value="Update" name="edit_division">
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

