<?php
	if (!isset($_SESSION['incharge_ovp'])) 
	{
       header('location:login.php');
	}
?>
<style>
.result{
	    position: absolute;
    z-index: 500;
    background: #BCBCBC;
    
    max-height: 200px;
    overflow: auto;
	color:#2D2D2D;
	width: 97%;
	min-height:0px
	
}

.result p{
	border-bottom:solid 1px #E8E8E8;
	display:block;
	cursor:pointer;
	padding:5px;
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
<h5 class="m-b-10">Add Site</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Add Site</a></li>
</ul>
</div> 
</div>
</div>
</div>
<script src="assets/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
		    $('.search-box input[type="text"]').on("keyup input", function(){
		        /* Get input value on change */
		        var inputVal = $(this).val();
		        var resultDropdown = $(this).siblings(".result");
		        if(inputVal.length){
		            $.get("state_search.php", {term: inputVal}).done(function(data){
		                // Display the returned data in browser
		                resultDropdown.html(data);
		            });
		        } else{
		            resultDropdown.empty();
		        }
		    });
		    
		    // Set search input value on click of result item
		    $(document).on("click", ".result p", function(){
		        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
		        $(this).parent(".result").empty();
		    });
		});
</script>

<div class="row">




<div class="col-md-12">


<div class="card">
<div class="card-header">

<div class="row">




<div class="col-md-12">

<div class="card">
<div class="card-header">
<h5>Site</h5>
</div>
<div class="form-row">
<form method="post" name="form" id="form" action="" class="row" style=" width:100%; padding:24px;">
<div class="form-group col-md-6" >
<label>Site Group*</label>
  <select class="form-control" name="site_group" id="site_group" required>
      <option value="">Select</option>
      <?php
				
				$siteAdd = new FetchData();
				$siteAdd->set_where(array('is_deleted'=>0));
				$sitesqlAdd = $siteAdd->fetch_data('tbl_site_groups',array('id','group_name'));
				while($grprow = mysqli_fetch_assoc($sitesqlAdd)){
?>
					<option value='<?= $grprow['id'] ?>'><?= $grprow['group_name'] ?></option>
<?php					
				}
?>	
  </select>
 
</div>

<div class="form-group col-md-6">
<label>Site Name*</label>
<input type="text" class="form-control" id="site_name" name="site_name" placeholder="Site Name" required>
</div>
</div>

</div>
<div class="card">
<div class="card-header">
<h5>Location</h5>

</div>
  

<div style="padding:24px;">
<div class="form-group">
<label>Address*</label>
<input type="text" class="form-control" id="address" name="address" placeholder="Address" required="required">
</div>

<div class="form-row">
<div class="form-group col-md-4">
<label>City*</label>
<input type="text" class="form-control" id="city" name="city" placeholder="City" required="required">
</div>

<!--<div class="form-group">-->
<div class="search-box form-group col-md-4">
<label>State*</label>
<input type="text" autocomplete="off" class="form-control" id="state" name="state" placeholder="State" required="required">
<div class="result"></div>
<!--</div>-->
</div>

<div class="form-group col-md-4">
<label>Zip Code*</label>
<input type="text" class="form-control" id="zip" name="zip" placeholder="Zip Code" required="required">
</div>
</div>


<input type="hidden" class="form-control" id="country" name="country" value="US">

<div class="form-row">
<div class="form-group col-md-4">
<label>Latitude</label>
<input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude" >
</div>

<div class="form-group col-md-4">
<label>Longitude</label>
<input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude" >
</div>

<div class="form-group col-md-4">
<label>Timezone</label>
  <select class="form-control" name="timezone" id="timezone">
      <option value="">Select</option>
      <option value="America/New_York">EST (GMT - 4)</option>
      <option value="America/Atikokan">EST (NO DST)</option>
      <option value="America/Chicago">CST (GMT - 5)</option>
      <option value="America/Regina">CST (NO DST)</option>
      <option value="America/Denver">MST (GMT -7)</option>
      <option value="America/Creston">MST (NO DST)</option>
      <option value="America/Los_Angeles">PST (GMT -7)</option>
  </select>
 
</div>
</div>
</div>
</div>
<div class="">
<div class="card">
<div class="card-header">
<h5>Utilities</h5>

</div>
<div style="padding:24px;">
<div class="form-row">
<div class="form-group col-md-6">
<label>Utility Name</label>
<input type="text" class="form-control" id="utility_name" name="utility_name" placeholder="Utility Name" >
</div>

<div class="form-group col-md-6">
<label>Meter Number</label>
<input type="text" class="form-control" id="meter_number" name="meter_number" placeholder="Meter Number" >
</div>
</div>

<div class="form-row">
<div class="form-group col-md-4">
<label>Account Number</label>
<input type="text" class="form-control" id="account_number" name="account_number" placeholder="Account Number" >
</div>

<div class="form-group col-md-4">
<label>Utility Service Capacity (Amps)</label>
<input type="text" class="form-control" id="utility_service_capacity" name="utility_service_capacity" placeholder="Utility Service Capacity In Amps" >
</div>


<div class="form-group col-md-4">
<label>Utility Transformer Capacity (kVA)</label>
<input type="number" class="form-control" id="utility_transformer_capacity" name="utility_transformer_capacity" placeholder="Utility Transformer Capacity In kVA" >
</div>
</div>

</div>
</div>
</div>






<input type="submit" class="btn btn-primary" value="Add" name="add_site">
<a href="index.php?action=view_sites"><input type="button" class="btn btn-primary" value="Cancel"></a>
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

