<?php
	//Code for View Customer
	if(isset($_GET['action']) && $_GET['action']='view_customer')
	{
		$viewCustomer = new FetchData();
		
		#SET WHERE CONDITIONS.
		$viewCustomer->set_where(array('is_deleted'=>"0"));
		
		#QUERY FOR PAGINATION
		$total_pages = $viewCustomer->total_count('tbl_customer');
	
		$limit = 20; 
		$stages = 3;
	
		$page = isset($_GET['page'])?$_GET['page']:1;
		if($page){
			$start = ($page - 1) * $limit; 
		}else{
			$start = 0;	
		}
		
		#GET RECORD
		$fetchClms = array('id','customer_name','master_username','email','password','address','city','state','zip');
		$viewCustomerqry = $viewCustomer->fetch_data('tbl_customer',$fetchClms);	
	}
	//End Code for View Customer
	
	//Code for Edit Customer
	if(isset($_GET['action']) && $_GET['action']='edit_customer')
	{
		$editCustomer = new FetchData();
		$editCustomer->set_where(array('id'=>$_REQUEST['id']));
		$fetchClms = array('id','customer_name','master_username','email','password','address','city','state','zip');
		$editCustomerqry = $editCustomer->fetch_data('tbl_customer',$fetchClms);	
		$row=mysqli_fetch_array($editCustomerqry);
		
		if(isset($_REQUEST['edit_customer']))
		{
			mysqli_query($con,"UPDATE tbl_customer SET customer_name='".mysqli_real_escape_string($con,$_REQUEST['customer_name'])."', master_username='".mysqli_real_escape_string($con,$_REQUEST['master_username'])."',email='".mysqli_real_escape_string($con,$_REQUEST['email'])."',address='".mysqli_real_escape_string($con,$_REQUEST['address'])."',city='".mysqli_real_escape_string($con,$_REQUEST['city'])."',state='".mysqli_real_escape_string($con,$_REQUEST['state'])."',zip='".mysqli_real_escape_string($con,$_REQUEST['zip'])."' WHERE id='".mysqli_real_escape_string($con,$_REQUEST['id'])."'");
			//exit();
	
			header("Location: index.php?action=view_customer&u=1");
		}
	}
	//End Code for Edit Customer
	
	//Code for Add Customer
	
	if(isset($_GET['action']) && $_GET['action']='edit_customer')
	{
		if(isset($_REQUEST['add_customer']))
		{
			mysqli_query($con,"INSERT INTO tbl_customer (customer_name,master_username,email,password,address,city,state,zip)VALUES('".mysqli_real_escape_string($con,$_REQUEST['customer_name'])."','".mysqli_real_escape_string($con,$_REQUEST['master_username'])."','".mysqli_real_escape_string($con,$_REQUEST['email'])."','".mysqli_real_escape_string($con,$_REQUEST['password'])."','".mysqli_real_escape_string($con,$_REQUEST['address'])."','".mysqli_real_escape_string($con,$_REQUEST['city'])."','".mysqli_real_escape_string($con,$_REQUEST['state'])."','".mysqli_real_escape_string($con,$_REQUEST['zip'])."')");
			header("Location:index.php?action=view_customer&a=1");	
		}
	}
	//End Code for Add Customer
	
	//Code for View Manage Charger
	if(isset($_GET['action']) && $_GET['action']='view_manage_charger')
	{
		$viewchar = new FetchData();
		
		#SET WHERE CONDITIONS.
		$viewchar->set_where(array('is_deleted'=>"0"));
		
		#QUERY FOR PAGINATION
		$total_pages = $viewchar->total_count('tbl_manage_charger');
	
		$limit = 20; 
		$stages = 3;
	
		$page = isset($_GET['page'])?$_GET['page']:1;
		if($page){
			$start = ($page - 1) * $limit; 
		}else{
			$start = 0;	
		}
		
		#GET RECORD
		$fetchClms = array('id','vendor_name','connector_no','connector_type','connector','charger_capabilities','connector_section','make_of_display_for_charger','charger_serial_number');
		$viewCharqry = $viewchar->fetch_data('tbl_manage_charger',$fetchClms);	
	}
	//End Code for Manage Charger
	
	//Code for Add Manage Charger
	
	if(isset($_GET['action']) && $_GET['action']='add_charger')
	{
		if(isset($_REQUEST['manage_charger']))
		{
			mysqli_query($con,"INSERT INTO tbl_manage_charger (vendor_name,connector_no,connector_type,connector,charger_capabilities,connector_section,make_of_display_for_charger,charger_serial_number)VALUES('".mysqli_real_escape_string($con,$_REQUEST['vendor_name'])."','".mysqli_real_escape_string($con,$_REQUEST['connector_no'])."','".mysqli_real_escape_string($con,$_REQUEST['connector_type'])."','".mysqli_real_escape_string($con,$_REQUEST['connector'])."','".mysqli_real_escape_string($con,$_REQUEST['charger_capabilities'])."','".mysqli_real_escape_string($con,$_REQUEST['connector_section'])."','".mysqli_real_escape_string($con,$_REQUEST['make_of_display_for_charger'])."','".mysqli_real_escape_string($con,$_REQUEST['charger_serial_number'])."')");
			header("Location:index.php?action=view_manage_charger&a=1");	
		}
	}
	//End Code for Add Manage Charger
	
	//Code for Edit Charger
	if(isset($_GET['action']) && $_GET['action']='edit_manage_charger')
	{
		$editManagechargr = new FetchData();
		$editManagechargr->set_where(array('id'=>$_REQUEST['id']));
		$fetchClms = array('id','vendor_name','connector_no','connector_type','connector','charger_capabilities','connector_section','make_of_display_for_charger','charger_serial_number');
		$editManagechargrqry = $editManagechargr->fetch_data('tbl_manage_charger',$fetchClms);	
		$fetchrow=mysqli_fetch_array($editManagechargrqry);
		
		if(isset($_REQUEST['edit_manage_charger']))
		{
			mysqli_query($con,"UPDATE tbl_manage_charger SET supplier_name='".mysqli_real_escape_string($con,$_REQUEST['vendor_name'])."',connector_no='".mysqli_real_escape_string($con,$_REQUEST['connector_no'])."', connector_type='".mysqli_real_escape_string($con,$_REQUEST['connector_type'])."',connector='".mysqli_real_escape_string($con,$_REQUEST['connector'])."',charger_capabilities='".mysqli_real_escape_string($con,$_REQUEST['charger_capabilities'])."',connector_section='".mysqli_real_escape_string($con,$_REQUEST['connector_section'])."',make_of_display_for_charger='".mysqli_real_escape_string($con,$_REQUEST['make_of_display_for_charger'])."',charger_serial_number='".mysqli_real_escape_string($con,$_REQUEST['charger_serial_number'])."' WHERE id='".mysqli_real_escape_string($con,$_REQUEST['id'])."'");
			//exit();
	
			header("Location: index.php?action=view_manage_charger&u=1");
		}
	}
	//End Code for Edit Charger
		
?>		