<?php
	include('config.php');
	error_reporting(0);
	session_start();
	
	if(isset($_REQUEST['login']))
	{
	    //if admin logged in
	    if($_REQUEST['username']=='admin') {
            $loginqry = "Select * from `tbl_admin` WHERE `username`='" . mysqli_real_escape_string($con, $_REQUEST['username']) . "' AND `password`='" . mysqli_real_escape_string($con, $_REQUEST['password']) . "' AND is_deleted=0";
            $logqry = mysqli_query($con, $loginqry);
            $row = mysqli_fetch_array($logqry);

            if ($row == true) {
                $_SESSION['incharge_admin'] = $row['username'];
                //exit();
                $_SESSION['timestamp'] = time();
                if (!empty($_POST["remember"])) {
                    setcookie("user_login", $_REQUEST["username"], time() + (10 * 365 * 24 * 60 * 60));
                    setcookie("user_pass", $_REQUEST["password"], time() + (10 * 365 * 24 * 60 * 60));
                } else {
                    if (isset($_COOKIE["user_login"]) || ($_COOKIE["user_pass"])) {
                        setcookie("user_login", "");
                        setcookie("user_pass", "");
                    }
                }
                //exit();
                header('location: index.php?action=view_customer');

            } else {
                $error = "Invalid Username OR Password";
            }
        }
	    // if user logged in
	    else{
	        $sql=mysqli_query($con,"select * from tbl_user where username='" . mysqli_real_escape_string($con, $_REQUEST['username']) . "' AND `password`='" . mysqli_real_escape_string($con, $_REQUEST['password']) . "'");
            $row = mysqli_fetch_array($sql);

            if ($row == true) {
                $_SESSION['incharge_admin'] = $row['username'];
                header('location: index.php?action=dashboard');
            }
        }
	}
	
	function SelectQuery($tbl_name,$param,$orderby,$con)
	{
		$cnt='';
		$fields='';
		$feild_value='';
		foreach($param as $key => $value)
		{ 
			$cnt++;
			if($cnt==1)
			{
				$fields.="`".$key."`"."="."'".$value."'" ;
			}
			else
			{
				$feild_value.=" AND `".$key."`='".$value."'";
			}
		}
		if($orderby!="")
		{
			$query=mysqli_query($con,"SELECT * FROM " .$tbl_name ." WHERE ".$fields .$feild_value ." ORDER BY ". $orderby);
		}
		else
		{
			$query=mysqli_query($con,"SELECT * FROM " .$tbl_name ." WHERE ".$fields .$feild_value);
		}

		return($query);	
	}

	//Add Customer
	
	//End Add Customer
	
	//Edit Customer
	/*if(isset($_REQUEST['edit_customer']))
	{
		mysqli_query($con,"UPDATE tbl_customer SET customer_name='".mysqli_real_escape_string($con,$_REQUEST['customer_name'])."', master_username='".mysqli_real_escape_string($con,$_REQUEST['master_username'])."',email='".mysqli_real_escape_string($con,$_REQUEST['email'])."',address='".mysqli_real_escape_string($con,$_REQUEST['address'])."',city='".mysqli_real_escape_string($con,$_REQUEST['city'])."',state='".mysqli_real_escape_string($con,$_REQUEST['state'])."',zip='".mysqli_real_escape_string($con,$_REQUEST['zip'])."' WHERE id='".mysqli_real_escape_string($con,$_REQUEST['id'])."'");
		//exit();

		header("Location: index.php?action=view_customer");
	}*/
	//End Edit Customer
?>