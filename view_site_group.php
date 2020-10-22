<?php
	if (!isset($_SESSION['incharge_ovp'])) 
	{
       header('location:login.php');
	   exit();
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
<h5 class="m-b-10">Site Group</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Site Group</a></li>
</ul>
</div> 
</div>
</div>
</div>



<div class="row">

<div class="col-sm-12">
<div class="card">
<div class="card-header">
<!--<h5>Site Group</h5>
<hr>-->
    <?php
    if($_SESSION['incharge_ovp']!='admin')
    {
        if($rows['add_site_group']==1)
        { echo'<div style="float:right;"><a href="index.php?action=add_site_group"><button type="button" class="btn btn-gradient-primary" title="" data-toggle="tooltip"><i class="feather icon-plus"></i>Add Site Group</button></a></div>'; }
    }
    else{
        echo'<div style="float:right;"><a href="index.php?action=add_site_group"><button type="button" class="btn btn-gradient-primary" title="" data-toggle="tooltip"><i class="feather icon-plus"></i>Add Site Group</button></a></div>';
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
	<table class="table table-bordered">
		<thead style="color:#fff;">
		  <tr style="color:#fff;">
            <th style=" background: #f5f5f5; width: 4%;" ></th>		
			<th bgcolor="#38AAFC" style="width:44%">Divison </th>
            <th bgcolor="#38AAFC" style="width:44%">Site Group Name</th>
              <?php
              if($_SESSION['incharge_ovp']!='admin')
              {
                  if($rows['edit_site_group']==1)
                  { echo'<th bgcolor="#38AAFC" style="min-width: 67px; width:8%;">Action</th>'; }
              }
              else{ echo'<th bgcolor="#38AAFC" style="min-width: 67px; width:8%;">Action</th>'; } ?>
          </tr>
		</thead>
		<tbody>
<?php
		
		$getRecordQryNum=mysqli_num_rows($GetDetail1);
				
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
		
		//echo "hh";
        $ctr = 1;
		while($row = mysqli_fetch_assoc($GetDetail1))
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
				<img src="assets/images/details_open.png">
				
			</div></td>
            <td>
			<?php
			
			$sitegView = new FetchData();
			$sitegView->set_where(array('id'=>$row['division']));
			$sitegsqlview = $sitegView->fetch_data('tbl_site_division',array('id','division'));
			if(mysqli_num_rows($sitegsqlview) > 0)
			{
				$grpRow = mysqli_fetch_assoc($sitegsqlview);
				echo $grpRow['division'];
			}
?>
            </td>
            <td><?php echo $row['group_name'];?></td>
              <?php
            if ($_SESSION['incharge_ovp'] != 'admin')
              {
                  if ($rows['edit_site_group'] == 1)
                  { ?>
                    <td><a class="green tooltipt" href="index.php?action=edit_site_group&id=<?php echo $row['id'];?>" style="text-decoration:none;"><span class="tooltiptext"><i class="fas fa-edit"></i><span class="tooltip-top"></span></span> <i class="ace-icon fa fa-pencil bigger-130"></i> </a> &nbsp;&nbsp;&nbsp;
                  <?php
                    }
              }
            else{ ?>
                <td><a class="green tooltipt" href="index.php?action=edit_site_group&id=<?php echo $row['id'];?>" style="text-decoration:none;"><span class="tooltiptext"><i class="fas fa-edit"></i><span class="tooltip-top"></span></span> <i class="ace-icon fa fa-pencil bigger-130"></i> </a> &nbsp;&nbsp;&nbsp;
                    <?php
                    }
                    ?>

		<!--<a class="red tooltipt" onClick="return confirm('Do you really want to delete this record?')" href="#" ><span class="tooltiptext"><i class="feather icon-trash-2" style="color: red;"></i><span class="tooltip-top"></span></span> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>-->
		</td>

		  </tr>
          
          <tr id="evsediv<?php echo $row['id'];?>" style="display: none;">
				<td colspan="4" style="padding: 0;">
				 <div style="width:100%;word-break: break-word !important;white-space: initial; ">
					<table cellpadding="0" cellspacing="0" border="0"  class="table table-styling table-hover table-striped table-primary">
                    	<tbody>
                    		<tr>
                            	<td width="50%">Site Name:</td>
					  			<td width="50%">test</td>
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
			$targetpage="index.php?action=view_site_group";
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

<script>
    function showDetails(num){
        var x = document.getElementById("evsediv"+num);
        if (x.style.display === "none") {
            x.style.display = "table-row";
            document.getElementById(num).innerHTML='<img src="assets/images/details_close.png">';
            for(var i=1; i<=num; i++)
            {
                if(i!=num) {
                    var y = document.getElementById("evsediv" + i);
                    y.style.display = "none";
                    document.getElementById(i).innerHTML='<img src="assets/images/details_open.png">';
                }
            }
        } else {
            x.style.display = "none";
            document.getElementById(num).innerHTML='<img src="assets/images/details_open.png">';
        }
    }
</script>


