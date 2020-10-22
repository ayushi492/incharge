<?php
	if (!isset($_SESSION['incharge_admin'])) 
	{
       header('location:login.php');
	}print_r($_SESSION);
	if($_SESSION['incharge_admin']!='admin')
	{
		$chrger_t = new FetchData();
		$chargertsql = $chrger_t->fetch_data('tbl_user_manage', array('*'));
		if (mysqli_num_rows($chargertsql)>0)
		{
			$rows=mysqli_fetch_assoc(chargertsql);
		}
                                                        
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
<h5 class="m-b-10">Manage Charger</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Manage Charger</a></li>
</ul>
</div> 
</div>
</div>
</div>


<div class="row">

<div class="col-sm-12">
<div class="card">
<div class="card-header">
<!--<h5>Site Region</h5>
<hr>-->
<?php
if($rows['add_charger']=='1')
{ ?>
	<div style="float:right;"><a href="index.php?action=add_charger"><button type="button" class="btn btn-gradient-primary" title="" data-toggle="tooltip"><i class="feather icon-plus"></i>Add Charger</button></a></div>
    
    <?php
}
	if(isset($_REQUEST['a']))
	  {
		  ?>
          <div class="row" style="text-align:center; padding-left:20px; color:#4CBF0E"><?php echo "Record Added Successfully.."; ?></div>
          <?php
	  }
	  
	  if(isset($_REQUEST['u']))
	  {
		  ?>
          <div class="row" style="text-align:center; padding-left:20px; color:#4CBF0E"><?php echo "Record Updated Successfully.."; ?></div>
          <?php
	  }
	  if(isset($_REQUEST['d']))
	  {
		  ?>
          <div class="row" style="text-align:center; padding-left:20px; color:#4CBF0E"><?php echo "Record Deleted Successfully.."; ?></div>
          <?php
	  }
	  if(isset($_REQUEST['e']))
	  {
		  ?>
          <div class="row" style="text-align:center; padding-left:20px; color:red"><?php echo "Somthing is worng please try again"; ?></div>
          <?php
	  }
	  ?>
     <div class="table-responsive">
	<table class="table table-bordered">
		<thead style="color:#fff;">
		  <tr style="color:#fff;">
          	<th style=" background: #f5f5f5;" ></th>
            <th bgcolor="#38AAFC">Vendor Name</th>
			<th bgcolor="#38AAFC">Number of Connectors</th>
            <th bgcolor="#38AAFC">Type of Connector </th>
            <th bgcolor="#38AAFC">Connector </th>
            <th bgcolor="#38AAFC">Charger Capabilities </th>
			<th bgcolor="#38AAFC">Connector section</th>
            <th bgcolor="#38AAFC">Make of Display for Charger</th>
            <th bgcolor="#38AAFC">Charger Serial Number</th>
            <?php
			if($rows['edit_charger']=='1') { ?>
			<th bgcolor="#38AAFC">Action</th>
			<?php } ?>
		  </tr>
		</thead>
		<tbody>
<?php
			
		
		$getRecordQryNum=mysqli_num_rows($viewCharqry);
				
		if($getRecordQryNum==0)
		{
			
			?>
          <tr>
            <td colspan="20" align="center"> No result found for selected filter.</td>
          </tr>
          <?php
		}
		else
		{
		
        $ctr = 1;
		while($row = mysqli_fetch_assoc($viewCharqry))
		{
			$class = '';
			if($ctr%2 == 0)
			{
				$class = 'class="bluetd"';
			}
?>
		  <tr <?php echo $class ?>>
			<!--<td><?php echo $ctr;?></td>-->
            <td bgcolor="" style=" background: #f5f5f5;"> 	<div class="action-buttons" id="<?=$row['id'];?>" onclick="showDetails(<?php echo $row['id'];?>)" style="cursor:pointer; ">
				<img src="../assets/images/details_open.png">
				
			</div></td>
            <td><?php echo $row['vendor_name'];?></td>
			<td><?php echo $row['connector_no'];?></td>
            <td><?php echo $row['connector_type'];?></td>
            <td><?php echo $row['connector'];?></td>
            <td><?php echo $row['charger_capabilities'];?></td>
            <td><?php echo $row['connector_section'];?></td>
            <td><?php echo $row['make_of_display_for_charger'];?></td>
            <td><?php echo $row['charger_serial_number'];?></td>
            <?php
			if($rows['edit_charger']=='1') { ?>
		<td><a class="green tooltipt" href="index.php?action=edit_manage_charger&id=<?php echo $row['id'];?>" style="text-decoration:none;"><span class="tooltiptext"><i class="fas fa-edit"></i> <span class="tooltip-top"></span></span> <i class="ace-icon fa fa-pencil bigger-130"></i> </a> &nbsp;&nbsp;&nbsp;
		<!--<a class="red tooltipt" onClick="return confirm('Do you really want to delete this record?')" href="#" ><span class="tooltiptext"><i class="feather icon-trash-2" style="color: red;"></i><span class="tooltip-top"></span></span> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>-->
		</td>
			<?php  } ?>        	

		  </tr>
          
          <tr id="evsediv<?php echo $row['id'];?>" style="display: none;">
				<td colspan="6" style="padding: 0;">
				 <div style="width:100%;word-break: break-word !important;white-space: initial; ">
					<table cellpadding="0" cellspacing="0" border="0"  class="table table-styling table-hover table-striped table-primary">
                    	<tbody>
                    		<tr>
                            	<td></td>
					  			
                            </tr>
                           
                         </tbody>
                      </table>
				</td>
			</tr>
<?php
			$ctr++;
		}
	 }
?>                                                      
		</tbody>
	  </table>
       <?php
		// Initial page num setup
		$targetpage="index.php?action=view_manage_charger";
		#PAGINATION CODE
		include('pagination.php');
	  ?>	


</div>
</div>

</div>

</div>
</div>
</div>
</div>
</div>
</div>


