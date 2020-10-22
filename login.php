<?php
//update later on
include('MainClass.php');?>

<!DOCTYPE html>
<html lang="en">


<head>
    <title>In-Charge</title>




    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />




    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">

    <link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body style="background: url(assets/images/login-bg.jpg);">
<div class="auth-wrapper">
    <div class="auth-content container">
        <div class=" text-align:center;">
            <img src="assets/images/logo.png" alt="" class="" style="display:block; margin:auto;">
            <div class="clearfix"></div>

            <h4 class="mb-3 f-w-400" style="text-align: center;
        padding: 39px 0px 0px;
    color: #000;">Login into Account</h4>

            <div class="col-md-5" style="background:#fff;border-radius: 15px; margin:23px auto;">
                <div class="card-body">

                    <div>
                        <?php
                        if(isset($_REQUEST['login']))
                        {
                            if($_POST['username']=='admin') {
                                $siteList = new FetchData();
                                $siteList->set_where(array('is_deleted' => 0));
                                $siteList->set_where(array('username' => $_POST['username']));
                                $siteList->set_where(array('password' => $_POST['password']));
                                $sitesql = $siteList->fetch_data('tbl_ovplogin', array('id', 'username'));
                                if (mysqli_num_rows($sitesql)) {
                                    $site = mysqli_fetch_assoc($sitesql);
                                    session_start();
                                    $_SESSION['incharge_ovp'] = $site['username'];

                                    //exit();
                                    header('location: index.php?action=dashboard');
                                } else {
                                    echo '<p style="color:#FF0206" align="center">Invalid Username OR Password</p>';
                                }
                            }
                            else{
                                $siteList = new FetchData();
                                $siteList->set_where(array('is_deleted' => 0));
                                $siteList->set_where(array('username' => $_POST['username']));
                                $siteList->set_where(array('password' => $_POST['password']));
                                $sitesql = $siteList->fetch_data('tbl_user', array('id', 'username'));
                                if (mysqli_num_rows($sitesql)) {
                                    $site = mysqli_fetch_assoc($sitesql);
                                    session_start();
                                    $_SESSION['incharge_ovp'] = $site['username'];

                                    $getpage = new FetchData();
                                    $getpage->set_where(array('username' => $_POST['username']));
                                    $getpagesql = $getpage->fetch_data('tbl_user_manage',array('*'));
                                    if (mysqli_num_rows($getpagesql))
                                    {
                                        $get=0; $uri='';
                                        $rows=mysqli_fetch_assoc($getpagesql);
                                        foreach ($rows as $k=> $vv)
                                        {
                                            if($k!='id' && $vv==1)
                                            {
                                                if($get==0)
                                                {
                                                    $uri=$k; $get++;
                                                }
                                            }
                                        }
                                       header('location: index.php?action='.$uri);
                                    }
                                } else {
                                    echo '<p style="color:#FF0206" align="center">Invalid Username OR Password</p>';
                                }
                            }

                        }         ?>
                    </div>
                    <form method="post" action="login.php">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
<span class="input-group-text"><i class="fa fa-user-check" style="
    color: #a9a9a9;
"></i></span>
                            </div>
                            <input type="text" class="form-control" name="username" placeholder="Username" value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
<span class="input-group-text" style="width: 52px;"><i class="fa fa-lock" style="
    color: #a9a9a9;
"></i></span>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="Password" value="<?php if(isset($_COOKIE["user_pass"])) { echo $_COOKIE["user_pass"]; } ?>">
                        </div>


<!--                        <div class="form-group text-left mt-2">-->
<!--                            <div class="checkbox checkbox-primary d-inline">-->
<!--                                <a href="#">Forgot Password</a>-->
<!--                            </div>-->
<!--                        </div>-->

                        <input type="submit" class="btn btn-primary" name="login" value="Login" style="width: 100%">
                        <div class="d-inline" style="margin: 0 0 0 85px">
                            <a href="#">Forgot Password</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

</body>


</html>
