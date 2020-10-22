<?php
	error_reporting(0);
	include('config.php');
	
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
	
	
    if (isset($_REQUEST['add_site'])) 
    {
	   	function random_code()
	    {
			return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 5);
	    }

		$site_name = trim($_REQUEST['site_name']);
		$site_group = trim($_REQUEST['site_group']);       
		$error = 0;
		if($site_name == '')     
		{

			$error = "Site Name are required field";

		}
		/*
		if(!filter_var($_REQUEST['utility_service_capacity'], FILTER_VALIDATE_INT) || !filter_var($_REQUEST['utility_transformer_capacity'], FILTER_VALIDATE_INT) || !filter_var($_REQUEST['panel_rating'], FILTER_VALIDATE_INT)){
			$error = "Utility service capacity, Utility transformer capacity and Panel rating are integer fields";
		}
		*/
	  if($error == 0)
	  {
		
		$site_code = '';
		 while(1){
			 $site_code = random_code();
			 $checkCode = mysqli_query($con, "SELECT id FROM tbl_sites WHERE site_code = '".mysqli_real_escape_string($con,$site_code)."'");
			 if(mysqli_num_rows($checkCode) == 0){
				 break;
			 }
		 }
		
 		
		
		$CheckSiteName=mysqli_query($con,"select * from tbl_sites where site_name='".mysqli_real_escape_string($con,$site_name)."'");
	    //$num = mysqli_num_rows($CheckSiteName);
		
		//if($num == 0)
		//{
		
			if(trim($_REQUEST['latitude']) == ''){
				$address = trim($_REQUEST['address']).",".trim($_REQUEST['city']).",".trim($_REQUEST['state']).",".trim($_REQUEST['zip']).",".trim($_REQUEST['country']);
				$geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false&key=AIzaSyDmwKsMsPiu0rBvEYQeJjbpDSRVU5LXY3g');
				// Convert the JSON to an array
				$geo = json_decode($geo, true);
				if ($geo['status'] == 'OK') {
				  // Get Lat & Long
				  $_REQUEST['latitude'] = $geo['results'][0]['geometry']['location']['lat'];
				  $_REQUEST['longitude'] = $geo['results'][0]['geometry']['location']['lng'];
				  //echo $_REQUEST['latitude']."==".$_REQUEST['longitude'];exit;
				}
			}
			
		mysqli_query($con,"INSERT INTO `tbl_sites` (`site_name`, `site_group`, site_code, address, city, state, zip, country, latitude, longitude, timezone, utility_transformer_capacity, utility_service_capacity, utility_name, meter_number,account_number) VALUES ('".mysqli_real_escape_string($con,$site_name)."','".mysqli_real_escape_string($con,$site_group)."','".mysqli_real_escape_string($con,$site_code)."','".mysqli_real_escape_string($con,$_REQUEST['address'])."','".mysqli_real_escape_string($con,$_REQUEST['city'])."','".mysqli_real_escape_string($con,$_REQUEST['state'])."','".mysqli_real_escape_string($con,$_REQUEST['zip'])."','".mysqli_real_escape_string($con,$_REQUEST['country'])."','".mysqli_real_escape_string($con,$_REQUEST['latitude'])."','".mysqli_real_escape_string($con,$_REQUEST['longitude'])."','".mysqli_real_escape_string($con,$_REQUEST['timezone'])."','".mysqli_real_escape_string($con,$_REQUEST['utility_transformer_capacity'])."','".mysqli_real_escape_string($con,$_REQUEST['utility_service_capacity'])."','".mysqli_real_escape_string($con,$_REQUEST['utility_name'])."','".mysqli_real_escape_string($con,$_REQUEST['meter_number'])."','".mysqli_real_escape_string($con,$_REQUEST['account_number'])."')");
		//exit();

		$id =  mysqli_insert_id($con);
		if($_REQUEST['slots'] != ""){
			$num = $_REQUEST['slots'];
			for($i = 1; $i<=$num; $i++){
				$slot_n = $_REQUEST['slot_'.$i];
				$slot_d = $_REQUEST['slot_desc_'.$i];
				mysqli_query($con,"INSERT INTO site_slots (site_id, slot, description) VALUES ('".$id."','".mysqli_real_escape_string($con,$slot_n)."','".mysqli_real_escape_string($con,$slot_d)."')");
			}
		}
		header("Location:index.php?action=view_sites");
	 //}
	 /*else		
		{
			header("Location:index.php?action=view_site&AlreadyExist=1");
		}*/

	}

   } 
   
   //Edit Site
   if (isset($_REQUEST['edit_site'])) 
   {
		function random_code()
	    {
			return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 5);
	    }
		
		$site_name = trim($_REQUEST['site_name']);
		$site_group = trim($_REQUEST['site_group']);  

		$error = 0;

		if($site_name == ''){  //if($site_name == '' || $site_group == '')      edited on 4-9-2020

			$error = "Site Name are required fields";

		}
		/*
		if(!filter_var($_REQUEST['utility_service_capacity'], FILTER_VALIDATE_INT) || !filter_var($_REQUEST['utility_transformer_capacity'], FILTER_VALIDATE_INT) || !filter_var($_REQUEST['panel_rating'], FILTER_VALIDATE_INT)){
			$error = "Utility service capacity, Utility transformer capacity and Panel rating are integer fields";
		}
		*/
	if($error == 0)
	{
		$site_code = $_REQUEST['site_code'];
		if($site_code == ''){
		 while(1){
			 $site_code = random_code();
			 $checkCode = mysqli_query($con, "SELECT id FROM tbl_sites WHERE site_code = '".mysqli_real_escape_string($con,$site_code)."'");
			 if(mysqli_num_rows($checkCode) == 0){
				 break;
			 }
		 }
		}
		
		$Checksitename=mysqli_query($con,"select * from tbl_sites where site_name='".mysqli_real_escape_string($con,$site_name)."' and id !='".mysqli_real_escape_string($con,$_REQUEST['id'])."'");
	    $num = mysqli_num_rows($Checksitename);
		
		//if($num == 0)
		//{
			
			//if(trim($_REQUEST['latitude']) == ''){
				$address = trim($_REQUEST['address']).",".trim($_REQUEST['city']).",".trim($_REQUEST['state']).",".trim($_REQUEST['zip']).",".trim($_REQUEST['country']);
				$geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false&key=AIzaSyDmwKsMsPiu0rBvEYQeJjbpDSRVU5LXY3g');
				// Convert the JSON to an array
				$geo = json_decode($geo, true);
				if ($geo['status'] == 'OK') {
				  // Get Lat & Long
				  $_REQUEST['latitude'] = $geo['results'][0]['geometry']['location']['lat'];
				  $_REQUEST['longitude'] = $geo['results'][0]['geometry']['location']['lng'];
				  //exit();
				  //echo $_REQUEST['latitude']."==".$_REQUEST['longitude'];exit;
				}
			//}
			
		mysqli_query($con,"UPDATE `tbl_sites` SET `site_code`='".mysqli_real_escape_string($con,$site_code)."',`site_name`='".mysqli_real_escape_string($con,$site_name)."',`site_group`='".mysqli_real_escape_string($con,$site_group)."',`address`='".mysqli_real_escape_string($con,$_REQUEST['address'])."',`city`='".mysqli_real_escape_string($con,$_REQUEST['city'])."',`state`='".mysqli_real_escape_string($con,$_REQUEST['state'])."',`zip`='".mysqli_real_escape_string($con,$_REQUEST['zip'])."',`country`='".mysqli_real_escape_string($con,$_REQUEST['country'])."',`latitude`='".mysqli_real_escape_string($con,$_REQUEST['latitude'])."',`longitude`='".mysqli_real_escape_string($con,$_REQUEST['longitude'])."',`timezone`='".mysqli_real_escape_string($con,$_REQUEST['timezone'])."',`utility_service_capacity`='".mysqli_real_escape_string($con,$_REQUEST['utility_service_capacity'])."',`utility_transformer_capacity`='".mysqli_real_escape_string($con,$_REQUEST['utility_transformer_capacity'])."',`utility_name`='".mysqli_real_escape_string($con,$_REQUEST['utility_name'])."',`meter_number`='".mysqli_real_escape_string($con,$_REQUEST['meter_number'])."',`account_number`='".mysqli_real_escape_string($con,$_REQUEST['account_number'])."' WHERE `id`='".mysqli_real_escape_string($con,$_REQUEST['id'])."'"
		);
		//exit();

		if($_REQUEST['slots'] != ""){
			mysqli_query($con,"DELETE FROM site_slots WHERE site_id = '".mysqli_real_escape_string($con,$_GET['id'])."'");
			$num = $_REQUEST['slots'];
			$id = $_GET['id'];
			for($i = 1; $i<=$num; $i++){
				$slot_n = $_REQUEST['slot_'.$i];
				$slot_d = $_REQUEST['slot_desc_'.$i];
				$slot_dl = $_REQUEST['slot_dialog_'.$i];
				mysqli_query($con,"INSERT INTO site_slots (site_id, slot, description, dialog) VALUES ('".$id."','".mysqli_real_escape_string($con,$slot_n)."','".mysqli_real_escape_string($con,$slot_d)."','".mysqli_real_escape_string($con,$slot_dl)."')");
			}
		}
		
		header("Location:index.php?action=view_sites");
		/*}
		else		
		{
			header("Location:index.php?action=edit_site&AlreadyExist=1&id=".$_REQUEST['id']."");
		}*/

	}

   }
   //End Edit Site
   
   
   //Add Group
   if(isset($_REQUEST['add_group']))
   {
	   $group_name = trim($_REQUEST['group_name']);
	   
	   $division = trim($_REQUEST['division']);
	   /*if(count($_REQUEST['division']) > 0)
	   {
			$division = "'".implode("','",$_REQUEST['division'])."'";
	   }*/
	   
	   $CheckEVSEGroup=mysqli_query($con,"select * from tbl_site_groups where group_name='".mysqli_real_escape_string($con,$group_name)."'");
	    $num = mysqli_num_rows($CheckEVSEGroup);
		
		if($num == 0)
		{
   			mysqli_query($con,"INSERT INTO `tbl_site_groups` (`group_name`,`division`)VALUES('".mysqli_real_escape_string($con,$group_name)."','".mysqli_real_escape_string($con,$division)."')");
	
			header("Location:index.php?action=view_site_group");
		}
   }
   //End Add Group
   
   //Edit Site Group
   if(isset($_REQUEST['edit_group']))
   {
   		$group_name = trim($_REQUEST['group_name']);
		$division = trim($_REQUEST['division']);
	   
		mysqli_query($con,"UPDATE tbl_site_groups SET group_name='".mysqli_real_escape_string($con,$group_name)."', division='".mysqli_real_escape_string($con,$division)."' WHERE id='".mysqli_real_escape_string($con,$_REQUEST['id'])."'");
		//exit();

		header("Location: index.php?action=view_site_group");
   }   
   //End Edit site Group
   
   //Add Division
   if(isset($_REQUEST['add_division']))
   {
   		$division = trim($_REQUEST['division']);
		$region = trim($_REQUEST['region']);
	   /* if(count($_REQUEST['region']) > 0)
	    {
			$region = "'".implode("','",$_REQUEST['region'])."'";
	    }*/
	   
		mysqli_query($con,"INSERT INTO site_division (division,region) VALUES ('".mysqli_real_escape_string($con,$division)."','".mysqli_real_escape_string($con,$region)."')");

		header("Location: index.php?action=view_site_division");
   }
   //End Add Division
   
    //Edit Site Division
   if(isset($_REQUEST['edit_division']))
   {
   		$region = trim($_REQUEST['region']);
		$division = trim($_REQUEST['division']);
	   
		mysqli_query($con,"UPDATE site_division SET division='".mysqli_real_escape_string($con,$division)."', region='".mysqli_real_escape_string($con,$region)."' WHERE id='".mysqli_real_escape_string($con,$_REQUEST['id'])."'");
		//exit();

		header("Location: index.php?action=view_site_division");
   }   
   //End Edit site Division
   
   
   //Add Site Region
   if(isset($_REQUEST['add_region']))
   {
   		$region = trim($_REQUEST['region']);
		$description = trim($_REQUEST['description']);
	   
		mysqli_query($con,"INSERT INTO tbl_site_region (region,description) VALUES ('".mysqli_real_escape_string($con,$region)."','".mysqli_real_escape_string($con,$description)."')");

		header("Location: index.php?action=view_site_region");
   }
   //End Add Site Region
   
   //Edit Site Region
   if(isset($_REQUEST['edit_region']))
   {
   		$region = trim($_REQUEST['region']);
		$description = trim($_REQUEST['description']);
	   
		mysqli_query($con,"UPDATE tbl_site_region SET region='".mysqli_real_escape_string($con,$region)."',description='".mysqli_real_escape_string($con,$description)."' WHERE id='".mysqli_real_escape_string($con,$_REQUEST['id'])."'");
		//exit();

		header("Location: index.php?action=view_site_region");
   }   
   //End Edit site Region
?>