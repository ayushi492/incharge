<!DOCTYPE html>

<html>
<?php 
	include('functions.php');
?>
<head>
<title>Project Management | Login</title>


<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->



<link rel="stylesheet" href="../assets/fonts/fontawesome/css/fontawesome-all.min.css">

<link rel="stylesheet" href="../assets/plugins/animation/css/animate.min.css">

<link rel="stylesheet" href="../assets/css/style.css">
</head>

<div class="auth-wrapper">
<div class="auth-content container">
<div class="card">
<div class="row align-items-center">
<div class="col-md-6">
<div class="card-body">
<img src="assets/images/logo.png" alt="" class="img-fluid mb-4">
<h4 class="mb-3 f-w-400">Login into your account</h4>
<div>
	 <? if($error!="")
	   {
		  ?>
		  <p style="color:#FF0206"><?=$error;?>
		  <?
	   }
	 ?>	
</div>
<form method="post" action="login.php">
<div class="input-group mb-2">
<div class="input-group-prepend">
<span class="input-group-text"><i class="feather icon-user"></i></span>
</div>
<input type="text" class="form-control" name="username" placeholder="Username" value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>">
</div>
<div class="input-group mb-3">
<div class="input-group-prepend">
<span class="input-group-text"><i class="feather icon-lock"></i></span>
</div>
<input type="password" class="form-control" name="password" placeholder="Password" value="<?php if(isset($_COOKIE["user_pass"])) { echo $_COOKIE["user_pass"]; } ?>">
</div>
<!--<div class="saprator"><span>OR</span></div>
<button class="btn btn-facebook mb-2 mr-2"><i class="fab fa-facebook-f"></i>facebook</button>
<button class="btn btn-googleplus mb-2 mr-2"><i class="fab fa-google-plus-g"></i>Google</button>
<button class="btn btn-twitter mb-2 mr-2"><i class="fab fa-twitter"></i>Twitter</button>-->
<div class="form-group text-left mt-2">
<div class="checkbox checkbox-primary d-inline">
<input type="checkbox" id="checkbox-fill-a1" checked="checked" name="remember">
<label for="checkbox-fill-a1" class="cr"> Save credentials</label>
</div>
</div>
<input type="submit" class="btn btn-primary mb-4" name="login" value="Login">
</form>
<!--<p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html" class="f-w-400">Reset</a></p>
<p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html" class="f-w-400">Signup</a></p>-->
</div>
</div>
<!--<div class="col-md-6 d-none d-md-block">
<img src="assets/images/auth-bg.jpg" alt="" class="img-fluid">
</div>-->
</div>
</div>
</div>
</div>


<script src="../assets/js/vendor-all.min.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!--<div class="footer-fab">
<div class="b-bg">
<i class="fas fa-question"></i>
</div>
<div class="fab-hover">
<ul class="list-unstyled">
<li><a href="http://html.codedthemes.com/flash-able/bootstrap/doc/index-bc-package.html" data-text="UI Kit" class="btn btn-icon btn-rounded btn-info m-0"><i class="feather icon-layers"></i></a></li>
<li><a href="http://html.codedthemes.com/flash-able/bootstrap/doc/index.html" data-text="Document" class="btn btn-icon btn-rounded btn-primary m-0"><i class="feather icon feather icon-book"></i></a></li>
</ul>
</div>-->
</div>
</body>

<!-- Mirrored from html.codedthemes.com/flash-able/bootstrap/default/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Mar 2020 12:21:13 GMT -->
</html>
