<?php 
	include('config.php');
	include('db.php');

	
	$filename = $selected_emp."export_charger.csv";
	$file = '';
	$line='';
	//$fp = fopen('php://output', 'w');
	
	//echo urldecode($_REQUEST['qSql']);
	
		$line = "Charger ID, OCPP Chargebox ID, Station ID, Site, Charge Group, Connector Type, Connector Category, Installed Date, Lat/Long";
	
	$file .=  $line . PHP_EOL;
	
	//fputcsv($fp, $header);
	
	
	 //$param=array("is_deleted"=>"0");
	// $result=SelectQuery('tbl_sites',$param,"site_name",$con);
	  
	  $i = 1;
	  $field1 = ''; //array for field you need to fetch from table if any
	  $conkey1 = array('is_deleted'); //array for field of condition you need if any
	  $conval1 = array('0'); //array for value of condition you need if any
	  //if charger_id serached
	 
		  if ($_REQUEST['form_chargerid'] != '') {
			  $conkey1[] = ('charger_id'); //array for field of condition you need if any
			  $conval1[] = (mysqli_real_escape_string($con, $_REQUEST['form_chargerid'])); //array for value of condition you need if any
			  $row1 = Selectdata('charger', $field1, $conkey1, $conval1);
		  }
	  
	  //if station id searched
	  
		  else if ($_REQUEST['station_id'] != '') {
			  $conkey1[] = ('station_id'); //array for field of condition you need if any
			  $conval1[] = (mysqli_real_escape_string($con, $_REQUEST['station_id'])); //array for value of condition you need if any
			  $row1 = Selectdata('charger', $field1, $conkey1, $conval1);
		  }
	  
	  //if site searched
	 
		  if ($_REQUEST['site'] != '') {
			  $conkey1[] = ('site_id'); //array for field of condition you need if any
			  $conval1[] = (mysqli_real_escape_string($con, $_REQUEST['site'])); //array for value of condition you need if any
		  }
	  
	  //if charger group searched
	  
		  else if ($_REQUEST['chargegroup'] != '') {
			  $conkey1[] = ('chargegroup_id'); //array for field of condition you need if any
			  $conval1[] = (mysqli_real_escape_string($con, $_REQUEST['chargegroup'])); //array for value of condition you need if any
			  $row1 = Selectdata('charger', $field1, $conkey1, $conval1);
		  }
	  
	  //if connector id searched
	  
		  else if ($_REQUEST['connector_id'] != '') {
			  $conkey1[] = ('connector_id'); //array for field of condition you need if any
			  $conval1[] = (mysqli_real_escape_string($con, $_REQUEST['connector_id'])); //array for value of condition you need if any
			  $row1 = Selectdata('charger', $field1, $conkey1, $conval1);
		  }
	  
	  //if connector capabilities searched
	 
		  else if ($_REQUEST['connector_capabilities'] != '') {
			  $conkey1[] = ('charger_capability_id'); //array for field of condition you need if any
			  $conval1[] = (mysqli_real_escape_string($con, $_REQUEST['connector_capabilities'])); //array for value of condition you need if any
			  $row1 = Selectdata('charger', $field1, $conkey1, $conval1);
		  }
	  
	  //if transacrion type searched
	  
		  else if ($_REQUEST['transaction_type'] != '') {
			  $conkey1[] = ('transaction_type'); //array for field of condition you need if any
			  $conval1[] = (mysqli_real_escape_string($con, $_REQUEST['transaction_type'])); //array for value of condition you need if any
			  $row1 = Selectdata('charger', $field1, $conkey1, $conval1);
		  }
	  
	  //if connector type searched
	 
		  else if ($_REQUEST['connector_type'] != '') {
			  $conkey1[] = ('connector_type'); //array for field of condition you need if any
			  $conval1[] = (mysqli_real_escape_string($con, $_REQUEST['connector_type'])); //array for value of condition you need if any
			  $row1 = Selectdata('charger', $field1, $conkey1, $conval1);
		  }
	  
	  //if connector_category searched
	 
		  else if ($_POST['connector_category'] != '') {
			  $conkey1[] = ('connector_category'); //array for field of condition you need if any
			  $conval1[] = (mysqli_real_escape_string($con, $_POST['connector_category'])); //array for value of condition you need if any
		 	  $row1 = Selectdata('charger', $field1, $conkey1, $conval1);	
		  }
	  
	  
	  //fetch from function
	  
	  
	  
	  //if no filter is there
	  else {
	  $i = 1;
	  $field1 = ''; //array for field you need to fetch from table if any
	  $conkey1 = array('is_deleted'); //array for field of condition you need if any
	  $conval1 = array('0'); //array for value of condition you need if any
	  $row1 = Selectdata('charger', $field1, $conkey1, $conval1);
	  }
	  if($row1==0){
	  echo"<script>alert('No data found');window.location.href='index.php?action=view_charger';</script>";
	  }
	  else{
	  foreach($row1 as $row)
	  {
	  //fetch site name
	  $fiel = array('site_name'); //array for field you need to fetch from table if any
	  $con1 = array('id','is_deleted'); //array for field of condition you need if any
	  $conval1 = array($row['site_id'],'0'); //array for value of condition you need if any
	  $var = Selectdata('tbl_sites', $fiel, $con1, $conval1);
	  
	  //fetch charger group name
	  $fiela = array('group_name'); //array for field you need to fetch from table if any
	  $con2 = array('id','is_deleted'); //array for field of condition you need if any
	  $conval2 = array($row['chargegroup_id'],'0'); //array for value of condition you need if any
	  $varg = Selectdata('tbl_site_groups', $fiela, $con2, $conval2);
	 // }
	  
	  //while($row=mysqli_fetch_array($result))
	  //{
		  $line='';
		  
		  $line .=trim($row['charger_id']).",";
		  $line .=trim($row['ocpp_cb_id']).",";
		  $line .=trim($row['station_id']).",";
		  foreach ($var as $vv)
		  {  
			$line .=trim(ucwords($vv['site_name'])).",";
		  }
		  foreach ($varg as $vv1)
		  {
			$line .=trim(ucwords($vv1['group_name'])).","; 
		  }
		  $line .=trim($row['connector_type']).",";
		  $line .=trim($row['connector_category']).",";
		  $line .=trim($row['install_date']).",";
		  $line .=trim($row['latitude']."/".$row['latitude']).",";
		  $file .=  $line . "\n";
		  
		  //fputcsv($fp, $data);
		  //$dur+=abs(strtotime($row1['duration']));
	  }
	}
	  /*if($dur==true)
	  {
		 $add_dur=($dur);  
	  }*/
	 // echo $time_calc = "Total".",".",".",".",".date("H:i",($add_dur).",")."\n";
	 header("content-type:application/csv;charset=UTF-8");
	 header('Content-Disposition: attachment; filename="'.$filename.'"');
	 echo $file;
	 exit();
	
  
	
?>