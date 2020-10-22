<?php
	if (!isset($_SESSION['incharge_admin'])) 
	{
       header('location:login.php');
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
<h5 class="m-b-10">Customer</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Customer</a></li>
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
	<!--<div style="float:right;"><a href="index.php?action=add_customer"><button type="button" class="btn btn-gradient-primary" title="" data-toggle="tooltip"><i class="feather icon-plus"></i>Add Customer</button></a></div>-->
    
    <?php if(isset($_REQUEST['a']))
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
			<th bgcolor="#38AAFC">Customer Name </th>
            <th bgcolor="#38AAFC">Master Username </th>
            <th bgcolor="#38AAFC">Email </th>
            <th bgcolor="#38AAFC">Address </th>
			<th bgcolor="#38AAFC" style="min-width: 67px;">Action</th>
		  </tr>
		</thead>
		<tbody>
<?php
			
		
		$getRecordQryNum=mysqli_num_rows($viewCustomerqry);
				
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
		while($row = mysqli_fetch_assoc($viewCustomerqry))
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
			<td><?php echo $row['customer_name'];?></td>
			<td><?php echo $row['master_username'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['address'].", ".$row['city'].", ".$row['state'].", ".$row['zip'];?></td>
            
			
		<td><a class="green tooltipt" href="index.php?action=edit_customer&id=<?php echo $row['id'];?>" style="text-decoration:none;"><span class="tooltiptext"><i class="fas fa-edit"></i> <span class="tooltip-top"></span></span> <i class="ace-icon fa fa-pencil bigger-130"></i> </a> &nbsp;&nbsp;&nbsp;
		<!--<a class="red tooltipt" onClick="return confirm('Do you really want to delete this record?')" href="#" ><span class="tooltiptext"><i class="feather icon-trash-2" style="color: red;"></i><span class="tooltip-top"></span></span> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>-->
		</td>

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
		$targetpage="index.php?action=view_customer";
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
</div>


