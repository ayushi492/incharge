<?php
	if (!isset($_SESSION['incharge_ovp'])) 
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
<h5 class="m-b-10">Site</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Site</a></li>
</ul>
</div> 
</div>
</div>
</div>




<div class="">

<div class="col-mx-12">
<div class="card">
<div class="card-header">
    <!--filter-->
    <h5>Filters</h5>

    
    <form method="post">
        <div class="form-row " style="margin:0; padding:5px;">
                
        <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Site Group Name</label>
            <select class="form-control" name="site_group_name" id="site_group_name">
              <option value="">Select</option>
              <?php
                        //$grpSql = mysqli_query($con,"SELECT id, group_name FROM tbl_site_groups WHERE is_deleted=0");
                        $param1=array("is_deleted"=>"0");
                        $grpSql=SelectQuery('tbl_site_groups',$param1,"",$con);
                        while($grprow = mysqli_fetch_assoc($grpSql)){
        ?>
                            <option value='<?= $grprow['id'] ?>'><?= $grprow['group_name'] ?></option>
        <?php					
                        }
        ?>	
          </select>
        </div>
        
        <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Site Name</label>
            <input type="text" name="site_name" class="form-control" aria-describedby="emailHelp" placeholder="Site Name" value="<?php if(isset($_POST['site_name'])){ echo $_POST['site_name'];} ?>">
        </div>
        
        <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" name="address" class="form-control" aria-describedby="emailHelp" placeholder="Address" value="<?php if(isset($_POST['address'])){ echo $_POST['address'];} ?>">
        </div>
        
        <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Latitude</label>
            <input type="text" name="latitude" class="form-control" aria-describedby="emailHelp" placeholder="Latitude" value="<?php if(isset($_POST['latitude'])){ echo $_POST['latitude'];} ?>">
        </div>
        
        <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Longitude</label>
            <input type="text" name="longitude" class="form-control" aria-describedby="emailHelp" placeholder="Longitude" value="<?php if(isset($_POST['longitude'])){ echo $_POST['longitude'];} ?>">
        </div>
        
        <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Timezone</label>
            <input type="text" name="timezone" class="form-control" aria-describedby="emailHelp" placeholder="Timezone" value="<?php if(isset($_POST['timezone'])){ echo $_POST['timezone'];} ?>">
        </div>
        
        

        <div class="form-group col-md-2">
            <br>
            <button type="submit" style="padding: 5px;margin: 0;margin-top: 4px;width: 91px;" class="btn btn-outline-secondary" title="" data-toggle="tooltip" aria-describedby="tooltip322126">Search</button>
        </div>
        
    </div>
    </form>
</div>
	
<?php
	if($_REQUEST['site_group_name']!="")
	{
		$param=array("is_deleted"=>"0", "site_group"=>$_REQUEST['site_group_name']);
		$result=SelectQuery('tbl_sites',$param,"site_name",$con);
	}
	else if($_REQUEST['site_name']!="")
	{
		$param=array("is_deleted"=>"0", "site_name"=>$_REQUEST['site_name']);
		$result=SelectQuery('tbl_sites',$param,"site_name",$con);
	}
	else if($_REQUEST['address']!="")
	{
		$param=array("is_deleted"=>"0", "address"=>$_REQUEST['address']);
		$result=SelectQuery('tbl_sites',$param,"site_name",$con);
	}
	else if($_REQUEST['latitude']!="")
	{
		$param=array("is_deleted"=>"0", "latitude"=>$_REQUEST['latitude']);
		$result=SelectQuery('tbl_sites',$param,"site_name",$con);
	}
	else if($_REQUEST['longitude']!="")
	{
		$param=array("is_deleted"=>"0", "longitude"=>$_REQUEST['longitude']);
		$result=SelectQuery('tbl_sites',$param,"site_name",$con);
	}
	else if($_REQUEST['timezone']!="")
	{
		$param=array("is_deleted"=>"0", "longitude"=>$_REQUEST['timezone']);
		$result=SelectQuery('tbl_sites',$param,"site_name",$con);
	}
	else
	{
		$param=array("is_deleted"=>"0");
		$result=SelectQuery('tbl_sites',$param,"site_name",$con);	
	}
	
?>   
    
<!--<h5>Site</h5>
<hr>-->
	
    
    
    
	<div class="card-body" style="float:right; padding-left: 520px;">
    
   		
        
          <select class="btn btn-glow-light btn-light" name="export_type" id="export_type">
            <option value="CSV"> CSV</option>
            <option value="Excel"> Excel</option>
            <option value="PDF"> PDF</option>
          </select>
          <script type="text/javascript">
   function exportOption()
   {
	   var export_type=document.getElementById('export_type').value;
	   //alert(export_type);
	
	   
	   
	   
	  if(export_type=="CSV")
	   {
		
		//alert(<?php echo urlencode($result);?>);
		$('<form action="site_export_csv.php" method="POST" target="_blank"><input type="hidden" name="qSql" value="<?php echo urlencode($result);?>"></form>').appendTo('body').submit().remove();
		
	   }
	   else
	   if(export_type=="PDF")
	   {
		  $('<form action="site_export_pdf.php" method="POST" target="_blank"><input type="hidden" name="qSql" value="<?php echo urlencode($result);?>"></form>').appendTo('body').submit().remove();
		  
	   }
	   else
	   {		  
		 
		 
		 $('<form action="site_export_excel.php" method="POST" target="_blank"><input type="hidden" name="qSql" value="<?php echo urlencode($result);?>"></form>').appendTo('body').submit().remove();
	   }
   }
   </script> 
        
        
        
          <button class="btn btn-gradient-success"  onclick="exportOption()" > Export</button>
        
        
        
       
         
       
    
    	<a href="index.php?action=add_site"><button type="button" class="btn btn-gradient-primary" title="" data-toggle="tooltip"><i class="feather icon-plus"></i>Add Site</button></a>
        
        <button class="btn btn-gradient-primary" data-toggle="modal" data-target="#exampleModal1"> Manage Columns</button>
        
        
    </div>
	<div class="clearfix"></div>
	<div class"row">
	<div class="">
<div class="card">
	<div class="">
	<div class="table-responsive">
		
	<table class="table table-de ">
		<thead style="color:#fff;">
		  <tr style="color:#fff;" >
			<!--<th bgcolor="#38AAFC">ID </th>-->
            <!--<th bgcolor="#38AAFC">Site Code</th>-->
            <th style=" background: #f5f5f5; width: 5%;" ></th>
            <th bgcolor="#38AAFC">Site Group Name</th>
			<th bgcolor="#38AAFC">Site Name</th>
			<th bgcolor="#38AAFC">Address </th>
            <th bgcolor="#38AAFC">Lat/Long </th>
            <th bgcolor="#38AAFC">Timezone </th>
			<th bgcolor="#38AAFC" style="min-width: 67px;">Action</th>
<?php
		//}
	//}
?>
		  </tr>
		</thead>
		<tbody>
<?php
		//$query = "SELECT * FROM tbl_sites WHERE is_deleted=0 order by site_name";
        //$result = mysqli_query($con,$query);
		
		
		$getRecordQryNum=mysqli_num_rows($result);
				
		/*if($getRecordQryNum==0)
		{
			
			?>
          <tr>
            <td colspan="20" align="center"> No result found for selected filter.</td>
          </tr>
          <?
		}
		else
		{*/
		
		
        $ctr = 1;
		while($row = mysqli_fetch_assoc($result))
		{
			$class = '';
			if($ctr%2 == 0)
			{
				$class = 'class="bluetd"';
			}
?>
		  <tr <?php echo $class ?>>
			<!--<td><?php echo $ctr;?></td>-->
			<!--<td><?php echo $row['site_code'];?></td>-->
			
			<!--<td><?php echo $row['host_name'];?></td>-->
            <td bgcolor="" style=" background: #f5f5f5;">
   				<div class="action-buttons" id="<?=$row['id'];?>" onclick="showDetails(<?php echo $row['id'];?>)" style="cursor:pointer; ">
                <img src="assets/images/details_open.png"></div>
            </td>
            <td>
<?php
				//$grpSql = mysqli_query($con,"SELECT group_name FROM tbl_site_groups WHERE id = '".mysqli_real_escape_string($con,$row['site_group'])."'");
				$param1=array("id"=>$row['site_group']);
				$grpSql=SelectQuery('tbl_site_groups',$param1,"",$con);
				if(mysqli_num_rows($grpSql) > 0)
				{
					$grpRow = mysqli_fetch_assoc($grpSql);
					echo $grpRow['group_name'];
				}
?>
			</td>
            <td><?php echo $row['site_name'];?></td>
			<td><?php echo $row['address'].", ".$row['city'].", ".$row['state'].", ".$row['zip'];?></td>
			<td><?php echo $row['latitude']."/".$row['longitude'];?></td>
			<td><?php echo $row['timezone'];?></td>
		                                  
			<td><a class="green tooltipt" href="index.php?action=edit_site&id=<?php echo $row['id'];?>" style="text-decoration:none;" title="Edit"><span class="tooltiptext"><i class="fas fa-edit"></i> <span class="tooltip-top"></span></span> <i class="ace-icon fa fa-pencil bigger-130"></i> </a> &nbsp;&nbsp;&nbsp;
            <a class="green tooltipt" href="#" data-toggle="modal" onClick="ajaxNew('<?php echo $row['id'];?>')" data-target="#exampleModal" data-whatever="<?php echo $row['id'];?>" style="text-decoration:none;" title="Utilities"><span class="tooltiptext"><i class="fas fa-align-justify"></i> <span class="tooltip-top"></span></span> <i class="ace-icon fa fa-pencil bigger-130"></i> </a>
            
            
		<!--<a class="red tooltipt" onClick="return confirm('Do you really want to delete this record?')" href="#" ><span class="tooltiptext"><i class="feather icon-trash-2" style="color: red;"></i><span class="tooltip-top"></span></span> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>-->
			</td>
		  </tr>
          
          <tr id="evsediv<?php echo $row['id'];?>" style="display: none;">
				<td colspan="7" style="padding: 0;">
				 <div style="width:100%;word-break: break-word !important;white-space: initial; ">
					<table cellpadding="0" cellspacing="0" border="0"  class="table table-styling table-hover table-striped table-primary">
                    	<tbody>
                    		<tr>
                            	<td width="50%">Utility Name:</td>
					  			<td width="50%"><?php echo $row['utility_name'];?></td>
                            </tr>
                            
                            <tr>
                            	<td width="50%">Meter Number:</td>
					  			<td width="50%"><?php echo $row['meter_number'];?></td>
                            </tr>
                            
                            <tr>
                            	<td width="50%">Account Number:</td>
					  			<td width="50%"><?php echo $row['account_number'];?></td>
                            </tr>
                            
                            <tr>
                            	<td width="50%">Utility Service Capacity (Amps):</td>
					  			<td width="50%"><?php echo $row['utility_service_capacity'];?></td>
                            </tr>
                            
                            <tr>
                            	<td width="50%">Utility Transformer Capacity (kVA):</td>
					  			<td width="50%"><?php echo $row['utility_transformer_capacity'];?></td>
                            </tr>
                           
                         </tbody>
                      </table>
				</td>
			</tr>
<?php
			$ctr++;
		}
?>                                                      
		</tbody>
	  </table>
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
</div>
</div>
</div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document" style="max-width:1000px;">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Utilities</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
	<div id="popupContent">
	
    </div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

</div>
</div>
</div>
</div>


<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Manage Columns</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
	<div id="">
		<table class="table">
        	<tbody>
            	<tr style="border-bottom:solid 1px #ccc">
                	<td height="20" width="50%">Site Group Name</td>
                    <td align="right"><img src="assets/images/lock.png" style="max-width:18px;"></td>
                </tr>
                <tr style="border-bottom:solid 1px #ccc">
                	<td height="20" width="50%">Site Name</td>
                    <td align="right"><img src="assets/images/lock.png" style="max-width:18px;"></td>
                </tr>
                <tr style="border-bottom:solid 1px #ccc">
                	<td height="20" width="50%">Address</td>
                    <td align="right"><input type="checkbox" checked="checked" /></td>
                </tr>
                <tr style="border-bottom:solid 1px #ccc">
                	<td height="20" width="50%">Lat/Long</td>
                    <td align="right"><input type="checkbox" checked="checked" /></td>
                </tr>
                <tr style="border-bottom:solid 1px #ccc">
                	<td height="20" width="50%">Timezone</td>
                    <td align="right"><input type="checkbox" checked="checked" /></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="button" name="manage_site" class="btn btn-primary" >Save</button>

</div>
</div>
</div>
</div>



<script>
	function ajaxNew(siteId)
	{
		 var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			 document.getElementById("popupContent").innerHTML = this.responseText;
			 $( "#d_today" ).datepicker();
			}
		  };
		  xhttp.open("GET", "utilities.php?siteId="+siteId, true);
		  xhttp.send();
	}
</script>


<!--<script>
    function showDetails(num){
        var x = document.getElementById("evsediv"+num);
        if (x.style.display === "none") {
            x.style.display = "table-row";
        } else {
            x.style.display = "none";
        }
    }
</script>-->

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



