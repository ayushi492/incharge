<?php
include('config.php');
error_reporting(0);
session_start();
print_r($_REQUEST);
if(isset($_REQUEST['login']))
{
    if($_REQUEST['username']=='admin')
    {
        echo $loginqry="Select * from `tbl_ovplogin` WHERE `username`='".mysqli_real_escape_string($con,$_REQUEST['username'])."' AND `password`='".mysqli_real_escape_string($con,$_REQUEST['password'])."' AND is_deleted=0";
        $logqry=mysqli_query($con,$loginqry);
        $row=mysqli_fetch_array($logqry);

        if($row==true)
        {
            $_SESSION['incharge_ovp']=$row['username'];
            //exit();
            $_SESSION['timestamp'] = time();
            if(isset($_COOKIE["user_login"]) || ($_COOKIE["user_pass"]))
            {
                setcookie ("user_login","");
                setcookie ("user_pass","");
            }
            //exit();
            //header('location: index.php?action=dashboard');

        }
        else
        {
            $error="Invalid Username OR Password";
        }
    }
    else{
       echo $loginqry="Select * from `tbl_user` WHERE `username`='".$_REQUEST['username']."' AND `password`='".$_REQUEST['password']."' AND is_deleted=0";
//        $logqry=mysqli_query($con,$loginqry);
//        $row=mysqli_fetch_array($logqry);
//        echo mysqli_num_rows($con);
//        if($row==true)
//        {
//            $_SESSION['incharge_ovp']=$row['username'];
//            //exit();
//            $_SESSION['timestamp'] = time();
//            if(isset($_COOKIE["user_login"]) || ($_COOKIE["user_pass"]))
//            {
//                setcookie ("user_login","");
//                setcookie ("user_pass","");
//            }
//            //exit();
//            $ssql=mysqli_query($con,"select * from tbl_user_manage where username='".$_REQUEST['username']."'");
//            $rows=mysqli_fetch_assoc($ssql);
//            $get=0; $uri='';
//            foreach ($rows as $k=> $vv)
//            {
//                if($vv==1)
//                {
//                    if($get==0)
//                    {
//                        $uri=$k; $get++;
//                    }
//                }
//            }
//            echo $uri;
//            //header('location: index.php?action='.$uri.');

        }
        else
        {
            $error="Invalid Username OR Password";
        }


    }
}

?>