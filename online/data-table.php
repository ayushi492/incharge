<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>In-Charge</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />



<link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">

<link rel="stylesheet" href="assets/css/style.css">

<style>
.custom-select, .form-control {
    background: #eff3f6;
    padding: 5px;
    font-size: 12px;
    height: auto;
}
label {
    display: inline-block;
    margin-bottom: 6px;
    font-size: 12px;
}
</style>
</head>
<body class="">

<div class="loader-bg">
<div class="loader-track">
<div class="loader-fill"></div>
</div>
</div>


<nav class="pcoded-navbar menupos-fixed menu-light brand-blue ">
<div class="navbar-wrapper ">
<div class="navbar-brand header-logo">
<a href="#" class="b-brand">
<img src="assets/images/logo-dashbig.png" alt="" class="logo images">
<img src="assets/images/logo-dashsmall.png" alt="" class="logo-thumb images">
</a>
<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
</div>
<div class="navbar-content scroll-div">
<ul class="nav pcoded-inner-navbar ">



<li class="nav-item">
<a href="#" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext"> Dashboard </span></a>

</li>
<li data-username="vertical horizontal box layout RTL fixed static collapse menu color icon dark background image" class="nav-item pcoded-hasmenu">
<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Charger</span></a>
<ul class="pcoded-submenu">
<li class=""><a href="#" class=""> Station Locator </a></li>
<li class=""><a href="#" class="">View Chargers </a></li>
<li class=""><a href="#" class="">View Chargers </a></li>
<li class=""><a href="#" class="">View Site Summary</a></li>
<li class=""><a href="#" class=""> View Charger Sites</a></li>



</ul>
</li>







 







</ul>

</div>
</div>
</nav>


<header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed">
<div class="m-header">
<a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>

</div>
<a class="mobile-menu" id="mobile-header" href="#!">
<i class="feather icon-more-horizontal"></i>
</a>
<div class="collapse navbar-collapse">
<a href="#!" class="mob-toggler"></a>
<ul class="navbar-nav mr-auto">
<li class="nav-item">

</li>
</ul>
<ul class="navbar-nav ml-auto">

<li></li>
<li>
<div class="dropdown drp-user">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<i class="icon feather icon-settings"></i>
</a>
<div class="dropdown-menu dropdown-menu-right profile-notification">
<div class="pro-head">
<span>Welcome Administrator</span>
<a href="auth-signin.html" class="dud-logout" title="Logout">
<i class="feather icon-log-out"></i>
</a>
</div>

</div>
</div>
</li>
</ul>
</div>
</header>








<section class="pcoded-main-container">
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
<h5 class="m-b-10">View Chargers 
</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index-2.html"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="#!">View Chargers 
</a></li>

</ul>
</div>
</div>
</div>
</div>


<div class="row">












<div class="col-xl-12">
<div class="card">
<div class="card-header">
<h5>Filters</h5>

<div class="clearfix"></div>
<div class="form-row " style="margin:0; padding:5px;">

<div class="form-group col-md-2">
<label for="exampleInputEmail1">Email address</label>
<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

</div>
<div class="form-group col-md-2">
<label for="exampleInputEmail1">First Name</label>
<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

</div>
<div class="form-group col-md-2">
<label for="exampleInputEmail1">Last Name</label>
<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

</div>
<div class="form-group col-md-2">
<br>
<button type="button" style="    padding: 5px;
    margin: 0;
    margin-top: 3px;" class="btn btn-outline-secondary" title="" data-toggle="tooltip" data-original-title="btn btn-outline-secondary" aria-describedby="tooltip322126">Search</button>

</div>



</div>
</div>

<div class="card-body table-border-style">
<div class="table-responsive">
<table class="table">
        <thead style="color:#fff;">
          <tr style="color:#fff;">
            <th style=" background: #f5f5f5;" ><img src="assets/images/details_open.png"> </th>
            <th>Last Name</th>
            <th >First Name</th>
            <th >Email Address</th>
            <th >Template</th>
             <th >Action</th>
            <!--<th bgcolor="#38AAFC">Last time user accessed portal</th>--> </tr>
        </thead>
        <tbody>
        
                   <tr>
            <td bgcolor="" style=" background: #f5f5f5;"> 	<div class="action-buttons" onclick="showDetails(1)" style="cursor:pointer; ">
				<img src="assets/images/details_open.png">
				
			</div></td>
            <td bgcolor="">wilson</td>
            <td bgcolor="">James&nbsp;</td>
            <td bgcolor="">James.wilson@xyz.com</td>
            <td bgcolor="">2</td>
            <td bgcolor=""><a class="green tooltipt" href="index.php?action=edit-user&amp;id=53" style="text-decoration:none;"> 
            <a href="#"><span class="feather icon-edit"></span></a>
            
             <i class="ace-icon fa fa-pencil bigger-130"></i> </a> &nbsp;&nbsp;&nbsp;
		<form name="form_53" method="post" style="display:inline-block">
		<input type="hidden" value="53" name="group_id">
		<input type="hidden" name="frm_button">
		<a class="red tooltipt" onclick="return confirm('Do you really want to delete this record?')" href="index.php?action=delete-user&amp;id=53"> 
        
 <a href="#"><span class="feather icon-trash-2"></span></a>

        <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
		</form>
		</td>
          
          </tr>
		  <tr id="evsediv1" style="display: none;">
				<td colspan="6" style="padding: 0;">
				 <div style="width:100%;word-break: break-word !important;white-space: initial; ">
					<table cellpadding="0" cellspacing="0" border="0"  class="table table-styling table-hover table-striped table-primary"><tbody><tr><td>Full name:</td>
					  <td>James wilson</td></tr><tr><td>Extension number:</td><td>5407</td></tr><tr><td>Extra info:</td><td>And any further details here (images etc)...</td></tr></tbody></table>
				</td>
			</tr>
             <tr>
            <td bgcolor="" style=" background: #f5f5f5;"> 	<div class="action-buttons" onclick="showDetails(2)" style="cursor:pointer; ">
				<img src="assets/images/details_open.png">
				
			</div></td>
            <td bgcolor="">wilson</td>
            <td bgcolor="">James&nbsp;</td>
            <td bgcolor="">James.wilson@xyz.com</td>
            <td bgcolor="">2</td>
            <td bgcolor=""><a class="green tooltipt" href="index.php?action=edit-user&amp;id=53" style="text-decoration:none;"> 
            <a href="#"><span class="feather icon-edit"></span></a>
            
             <i class="ace-icon fa fa-pencil bigger-130"></i> </a> &nbsp;&nbsp;&nbsp;
		<form name="form_53" method="post" style="display:inline-block">
		<input type="hidden" value="53" name="group_id">
		<input type="hidden" name="frm_button">
		<a class="red tooltipt" onclick="return confirm('Do you really want to delete this record?')" href="index.php?action=delete-user&amp;id=53"> 
        
 <a href="#"><span class="feather icon-trash-2"></span></a>

        <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
		</form>
		</td>
          
          </tr>
		  <tr id="evsediv2" style="display: none;">
				<td colspan="6" style="padding: 0;">
				 <div style="width:100%;word-break: break-word !important;white-space: initial; ">
					<table cellpadding="0" cellspacing="0" border="0"  class="table table-styling table-hover table-striped table-primary"><tbody><tr><td>Full name:</td>
					  <td>James wilson</td></tr><tr><td>Extension number:</td><td>5407</td></tr><tr><td>Extra info:</td><td>And any further details here (images etc)...</td></tr></tbody></table>
				</td>
			</tr>
             <tr>
            <td bgcolor="" style=" background: #f5f5f5;"> 	<div class="action-buttons" onclick="showDetails(3)" style="cursor:pointer; ">
				<img src="assets/images/details_open.png">
				
			</div></td>
            <td bgcolor="">wilson</td>
            <td bgcolor="">James&nbsp;</td>
            <td bgcolor="">James.wilson@xyz.com</td>
            <td bgcolor="">2</td>
            <td bgcolor=""><a class="green tooltipt" href="index.php?action=edit-user&amp;id=53" style="text-decoration:none;"> 
            <a href="#"><span class="feather icon-edit"></span></a>
            
             <i class="ace-icon fa fa-pencil bigger-130"></i> </a> &nbsp;&nbsp;&nbsp;
		<form name="form_53" method="post" style="display:inline-block">
		<input type="hidden" value="53" name="group_id">
		<input type="hidden" name="frm_button">
		<a class="red tooltipt" onclick="return confirm('Do you really want to delete this record?')" href="index.php?action=delete-user&amp;id=53"> 
        
 <a href="#"><span class="feather icon-trash-2"></span></a>

        <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
		</form>
		</td>
          
          </tr>
		  <tr id="evsediv3" style="display: none;">
				<td colspan="6" style="padding: 0;">
				 <div style="width:100%;word-break: break-word !important;white-space: initial; ">
					<table cellpadding="0" cellspacing="0" border="0"  class="table table-styling table-hover table-striped table-primary"><tbody><tr><td>Full name:</td>
					  <td>James wilson</td></tr><tr><td>Extension number:</td><td>5407</td></tr><tr><td>Extra info:</td><td>And any further details here (images etc)...</td></tr></tbody></table>
				</td>
			</tr>
             <tr>
            <td bgcolor="" style=" background: #f5f5f5;"> 	<div class="action-buttons" onclick="showDetails(4)" style="cursor:pointer; ">
				<img src="assets/images/details_open.png">
				
			</div></td>
            <td bgcolor="">wilson</td>
            <td bgcolor="">James&nbsp;</td>
            <td bgcolor="">James.wilson@xyz.com</td>
            <td bgcolor="">2</td>
            <td bgcolor=""><a class="green tooltipt" href="index.php?action=edit-user&amp;id=53" style="text-decoration:none;"> 
            <a href="#"><span class="feather icon-edit"></span></a>
            
             <i class="ace-icon fa fa-pencil bigger-130"></i> </a> &nbsp;&nbsp;&nbsp;
		<form name="form_53" method="post" style="display:inline-block">
		<input type="hidden" value="53" name="group_id">
		<input type="hidden" name="frm_button">
		<a class="red tooltipt" onclick="return confirm('Do you really want to delete this record?')" href="index.php?action=delete-user&amp;id=53"> 
        
 <a href="#"><span class="feather icon-trash-2"></span></a>

        <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
		</form>
		</td>
          
          </tr>
		  <tr id="evsediv4" style="display: none;">
				<td colspan="6" style="padding: 0;">
				 <div style="width:100%;word-break: break-word !important;white-space: initial; ">
					<table cellpadding="0" cellspacing="0" border="0"  class="table table-styling table-hover table-striped table-primary"><tbody><tr><td>Full name:</td>
					  <td>James wilson</td></tr><tr><td>Extension number:</td><td>5407</td></tr><tr><td>Extra info:</td><td>And any further details here (images etc)...</td></tr></tbody></table>
				</td>
			</tr>
             <tr>
            <td bgcolor="" style=" background: #f5f5f5;"> 	<div class="action-buttons" onclick="showDetails(5)" style="cursor:pointer; ">
				<img src="assets/images/details_open.png">
				
			</div></td>
            <td bgcolor="">wilson</td>
            <td bgcolor="">James&nbsp;</td>
            <td bgcolor="">James.wilson@xyz.com</td>
            <td bgcolor="">2</td>
            <td bgcolor=""><a class="green tooltipt" href="index.php?action=edit-user&amp;id=53" style="text-decoration:none;"> 
            <a href="#"><span class="feather icon-edit"></span></a>
            
             <i class="ace-icon fa fa-pencil bigger-130"></i> </a> &nbsp;&nbsp;&nbsp;
		<form name="form_53" method="post" style="display:inline-block">
		<input type="hidden" value="53" name="group_id">
		<input type="hidden" name="frm_button">
		<a class="red tooltipt" onclick="return confirm('Do you really want to delete this record?')" href="index.php?action=delete-user&amp;id=53"> 
        
 <a href="#"><span class="feather icon-trash-2"></span></a>

        <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
		</form>
		</td>
          
          </tr>
		  <tr id="evsediv5" style="display: none;">
				<td colspan="6" style="padding: 0;">
				 <div style="width:100%;word-break: break-word !important;white-space: initial; ">
					<table cellpadding="0" cellspacing="0" border="0"  class="table table-styling table-hover table-striped table-primary"><tbody><tr><td>Full name:</td>
					  <td>James wilson</td></tr><tr><td>Extension number:</td><td>5407</td></tr><tr><td>Extra info:</td><td>And any further details here (images etc)...</td></tr></tbody></table>
				</td>
			</tr>
             <tr>
            <td bgcolor="" style=" background: #f5f5f5;"> 	<div class="action-buttons" onclick="showDetails(6)" style="cursor:pointer; ">
				<img src="assets/images/details_open.png">
				
			</div></td>
            <td bgcolor="">wilson</td>
            <td bgcolor="">James&nbsp;</td>
            <td bgcolor="">James.wilson@xyz.com</td>
            <td bgcolor="">2</td>
            <td bgcolor=""><a class="green tooltipt" href="index.php?action=edit-user&amp;id=53" style="text-decoration:none;"> 
            <a href="#"><span class="feather icon-edit"></span></a>
            
             <i class="ace-icon fa fa-pencil bigger-130"></i> </a> &nbsp;&nbsp;&nbsp;
		<form name="form_53" method="post" style="display:inline-block">
		<input type="hidden" value="53" name="group_id">
		<input type="hidden" name="frm_button">
		<a class="red tooltipt" onclick="return confirm('Do you really want to delete this record?')" href="index.php?action=delete-user&amp;id=53"> 
        
 <a href="#"><span class="feather icon-trash-2"></span></a>

        <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
		</form>
		</td>
          
          </tr>
		  <tr id="evsediv6" style="display: none;">
				<td colspan="6" style="padding: 0;">
				 <div style="width:100%;word-break: break-word !important;white-space: initial; ">
					<table cellpadding="0" cellspacing="0" border="0"  class="table table-styling table-hover table-striped table-primary"><tbody><tr><td>Full name:</td>
					  <td>James wilson</td></tr><tr><td>Extension number:</td><td>5407</td></tr><tr><td>Extra info:</td><td>And any further details here (images etc)...</td></tr></tbody></table>
				</td>
			</tr>
             <tr>
            <td bgcolor="" style=" background: #f5f5f5;"> 	<div class="action-buttons" onclick="showDetails(7)" style="cursor:pointer; ">
				<img src="assets/images/details_open.png">
				
			</div></td>
            <td bgcolor="">wilson</td>
            <td bgcolor="">James&nbsp;</td>
            <td bgcolor="">James.wilson@xyz.com</td>
            <td bgcolor="">2</td>
            <td bgcolor=""><a class="green tooltipt" href="index.php?action=edit-user&amp;id=53" style="text-decoration:none;"> 
            <a href="#"><span class="feather icon-edit"></span></a>
            
             <i class="ace-icon fa fa-pencil bigger-130"></i> </a> &nbsp;&nbsp;&nbsp;
		<form name="form_53" method="post" style="display:inline-block">
		<input type="hidden" value="53" name="group_id">
		<input type="hidden" name="frm_button">
		<a class="red tooltipt" onclick="return confirm('Do you really want to delete this record?')" href="index.php?action=delete-user&amp;id=53"> 
        
 <a href="#"><span class="feather icon-trash-2"></span></a>

        <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
		</form>
		</td>
          
          </tr>
		  <tr id="evsediv7" style="display: none;">
				<td colspan="6" style="padding: 0;">
				 <div style="width:100%;word-break: break-word !important;white-space: initial; ">
					<table cellpadding="0" cellspacing="0" border="0"  class="table table-styling table-hover table-striped table-primary"><tbody><tr><td>Full name:</td>
					  <td>James wilson</td></tr><tr><td>Extension number:</td><td>5407</td></tr><tr><td>Extra info:</td><td>And any further details here (images etc)...</td></tr></tbody></table>
				</td>
			</tr>
             <tr>
            <td bgcolor="" style=" background: #f5f5f5;"> 	<div class="action-buttons" onclick="showDetails(8)" style="cursor:pointer; ">
				<img src="assets/images/details_open.png">
				
			</div></td>
            <td bgcolor="">wilson</td>
            <td bgcolor="">James&nbsp;</td>
            <td bgcolor="">James.wilson@xyz.com</td>
            <td bgcolor="">2</td>
            <td bgcolor=""><a class="green tooltipt" href="index.php?action=edit-user&amp;id=53" style="text-decoration:none;"> 
            <a href="#"><span class="feather icon-edit"></span></a>
            
             <i class="ace-icon fa fa-pencil bigger-130"></i> </a> &nbsp;&nbsp;&nbsp;
		<form name="form_53" method="post" style="display:inline-block">
		<input type="hidden" value="53" name="group_id">
		<input type="hidden" name="frm_button">
		<a class="red tooltipt" onclick="return confirm('Do you really want to delete this record?')" href="index.php?action=delete-user&amp;id=53"> 
        
 <a href="#"><span class="feather icon-trash-2"></span></a>

        <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
		</form>
		</td>
          
          </tr>
		  <tr id="evsediv8" style="display: none;">
				<td colspan="6" style="padding: 0;">
				 <div style="width:100%;word-break: break-word !important;white-space: initial; ">
					<table cellpadding="0" cellspacing="0" border="0"  class="table table-styling table-hover table-striped table-primary"><tbody><tr><td>Full name:</td>
					  <td>James wilson</td></tr><tr><td>Extension number:</td><td>5407</td></tr><tr><td>Extra info:</td><td>And any further details here (images etc)...</td></tr></tbody></table>
				</td>
			</tr>
             <tr>
            <td bgcolor="" style=" background: #f5f5f5;"> 	<div class="action-buttons" onclick="showDetails(9)" style="cursor:pointer; ">
				<img src="assets/images/details_open.png">
				
			</div></td>
            <td bgcolor="">wilson</td>
            <td bgcolor="">James&nbsp;</td>
            <td bgcolor="">James.wilson@xyz.com</td>
            <td bgcolor="">2</td>
            <td bgcolor=""><a class="green tooltipt" href="index.php?action=edit-user&amp;id=53" style="text-decoration:none;"> 
            <a href="#"><span class="feather icon-edit"></span></a>
            
             <i class="ace-icon fa fa-pencil bigger-130"></i> </a> &nbsp;&nbsp;&nbsp;
		<form name="form_53" method="post" style="display:inline-block">
		<input type="hidden" value="53" name="group_id">
		<input type="hidden" name="frm_button">
		<a class="red tooltipt" onclick="return confirm('Do you really want to delete this record?')" href="index.php?action=delete-user&amp;id=53"> 
        
 <a href="#"><span class="feather icon-trash-2"></span></a>

        <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
		</form>
		</td>
          
          </tr>
		  <tr id="evsediv9" style="display: none;">
				<td colspan="6" style="padding: 0;">
				 <div style="width:100%;word-break: break-word !important;white-space: initial; ">
					<table cellpadding="0" cellspacing="0" border="0"  class="table table-styling table-hover table-striped table-primary"><tbody><tr><td>Full name:</td>
					  <td>James wilson</td></tr><tr><td>Extension number:</td><td>5407</td></tr><tr><td>Extra info:</td><td>And any further details here (images etc)...</td></tr></tbody></table>
				</td>
			</tr>
             <tr>
            <td bgcolor="" style=" background: #f5f5f5;"> 	<div class="action-buttons" onclick="showDetails(10)" style="cursor:pointer; ">
				<img src="assets/images/details_open.png">
				
			</div></td>
            <td bgcolor="">wilson</td>
            <td bgcolor="">James&nbsp;</td>
            <td bgcolor="">James.wilson@xyz.com</td>
            <td bgcolor="">2</td>
            <td bgcolor=""><a class="green tooltipt" href="index.php?action=edit-user&amp;id=53" style="text-decoration:none;"> 
            <a href="#"><span class="feather icon-edit"></span></a>
            
             <i class="ace-icon fa fa-pencil bigger-130"></i> </a> &nbsp;&nbsp;&nbsp;
		<form name="form_53" method="post" style="display:inline-block">
		<input type="hidden" value="53" name="group_id">
		<input type="hidden" name="frm_button">
		<a class="red tooltipt" onclick="return confirm('Do you really want to delete this record?')" href="index.php?action=delete-user&amp;id=53"> 
        
 <a href="#"><span class="feather icon-trash-2"></span></a>

        <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>
		</form>
		</td>
          
          </tr>
		  <tr id="evsediv10" style="display: none;">
				<td colspan="6" style="padding: 0;">
				 <div style="width:100%;word-break: break-word !important;white-space: initial; ">
					<table cellpadding="0" cellspacing="0" border="0"  class="table table-styling table-hover table-striped table-primary"><tbody><tr><td>Full name:</td>
					  <td>James wilson</td></tr><tr><td>Extension number:</td><td>5407</td></tr><tr><td>Extra info:</td><td>And any further details here (images etc)...</td></tr></tbody></table>
				</td>
			</tr>

        </tbody>
      </table>
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
</section>




<script>
function showDetails(num){
	var x = document.getElementById("evsediv"+num);
	if (x.style.display === "none") {
			x.style.display = "table-row";
	} else {
			x.style.display = "none";
	 }
}
</script>

<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/pcoded.min.js"></script>


</body>


</html>
