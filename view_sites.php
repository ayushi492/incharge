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

                                        <h5>Filters</h5>


                                        <form action="" method="post">
                                            <div class="form-row " style="margin:0; padding:5px;">

                                                <?php if(!isset($SelClms) || (isset($SelClms) && in_array('group_name',$SelClms))){ ?>
                                                    <div class="form-group col-md-2">
                                                        <label for="exampleInputEmail1">Site Group Name</label>
                                                        <select class="form-control" name="site_group" id="site_group">
                                                            <option value="">Select</option>
                                                            <?php
                                                            $siteList = new FetchData();
                                                            $siteList->set_where(array('is_deleted'=>0));
                                                            $sitesql = $siteList->fetch_data('tbl_site_groups',array('id','group_name'));
                                                            if(mysqli_num_rows($sitesql))
                                                            {
                                                                while($grprow = mysqli_fetch_assoc($sitesql))
                                                                {
                                                                    ?>

                                                                    <option value="<?= $grprow['id'] ?>" <?= isset($_REQUEST['site_group'])&& $_REQUEST['site_group'] == $grprow['id']?'selected':'' ?> ><?= $grprow['group_name'] ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                <?php }if(!isset($SelClms) || (isset($SelClms) && in_array('site_name',$SelClms))){?>
                                                    <div class="form-group col-md-2">
                                                        <label for="exampleInputEmail1">Site Name</label>
                                                        <input type="text" name="site_name" class="form-control" aria-describedby="emailHelp" placeholder="Site Name" value="<?php if(isset($_POST['site_name'])){ echo $_POST['site_name'];} ?>">
                                                    </div>
                                                <?php } if(!isset($SelClms) || (isset($SelClms) && in_array('address',$SelClms))){?>
                                                    <div class="form-group col-md-2">
                                                        <label for="exampleInputEmail1">Address</label>
                                                        <input type="text" name="address" class="form-control" aria-describedby="emailHelp" placeholder="Address" value="<?php if(isset($_POST['address'])){ echo $_POST['address'];} ?>">
                                                    </div>
                                                <?php } if(!isset($SelClms) || (isset($SelClms) && in_array('lat_long',$SelClms))){?>
                                                    <div class="form-group col-md-2">
                                                        <label for="exampleInputEmail1">Latitude</label>
                                                        <input type="text" name="latitude" class="form-control" aria-describedby="emailHelp" placeholder="Latitude" value="<?php if(isset($_POST['latitude'])){ echo $_POST['latitude'];} ?>">
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        <label for="exampleInputEmail1">Longitude</label>
                                                        <input type="text" name="longitude" class="form-control" aria-describedby="emailHelp" placeholder="Longitude" value="<?php if(isset($_POST['longitude'])){ echo $_POST['longitude'];} ?>">
                                                    </div>
                                                <?php } if(!isset($SelClms) || (isset($SelClms) && in_array('timezone',$SelClms))){?>
                                                    <div class="form-group col-md-2">
                                                        <label for="exampleInputEmail1">Timezone</label>
                                                        <input type="text" name="timezone" class="form-control" aria-describedby="emailHelp" placeholder="Timezone" value="<?php if(isset($_POST['timezone'])){ echo $_POST['timezone'];} ?>">
                                                    </div>
                                                <?php }?>


                                                <div class="form-group col-md-2">
                                                    <br>
                                                    <input type="submit" name="search" class="btn btn-outline-secondary" style="padding: 5px;margin: 0;margin-top: 4px;width: 91px;" value="Search">
                                                </div>

                                            </div>
                                        </form>
                                    </div>



                                    <!--<h5>Site</h5>
                                    <hr>-->




                                    <div class="card-body" style="float:right; text-align: right;">



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
                                                    $('<form action="site_export_csv.php" method="POST" target="_blank"><input type="hidden" name="export" value="1"><input type="hidden" name="site_group" value="<?php echo isset($_POST['site_group'])?$_POST['site_group']:'';?>"><input type="hidden" name="site_name" value="<?php echo isset($_POST['site_name'])?$_POST['site_name']:'';?>"><input type="hidden" name="address" value="<?php echo isset($_POST['address'])?$_POST['address']:'';?>"><input type="hidden" name="latitude" value="<?php echo isset($_POST['latitude'])?$_POST['latitude']:'';?>"><input type="hidden" name="longitude" value="<?php echo isset($_POST['longitude'])?$_POST['longitude']:'';?>"><input type="hidden" name="timezone" value="<?php echo isset($_POST['timezone'])?$_POST['timezone']:'';?>"><\/form>').appendTo('body').submit().remove();

                                                }
                                                else
                                                if(export_type=="PDF")
                                                {
                                                    $('<form action="site_export_pdf.php" method="POST" target="_blank"><input type="hidden" name="export" value="1"><input type="hidden" name="site_group" value="<?php echo isset($_POST['site_group'])?$_POST['site_group']:'';?>"><input type="hidden" name="site_name" value="<?php echo isset($_POST['site_name'])?$_POST['site_name']:'';?>"><input type="hidden" name="address" value="<?php echo isset($_POST['address'])?$_POST['address']:'';?>"><input type="hidden" name="latitude" value="<?php echo isset($_POST['latitude'])?$_POST['latitude']:'';?>"><input type="hidden" name="longitude" value="<?php echo isset($_POST['longitude'])?$_POST['longitude']:'';?>"><input type="hidden" name="timezone" value="<?php echo isset($_POST['timezone'])?$_POST['timezone']:'';?>"><\/form>').appendTo('body').submit().remove();

                                                }
                                                else
                                                {
                                                    $('<form action="site_export_excel.php" method="POST" target="_blank"><input type="hidden" name="export" value="1"><input type="hidden" name="site_group" value="<?php echo isset($_POST['site_group'])?$_POST['site_group']:'';?>"><input type="hidden" name="site_name" value="<?php echo isset($_POST['site_name'])?$_POST['site_name']:'';?>"><input type="hidden" name="address" value="<?php echo isset($_POST['address'])?$_POST['address']:'';?>"><input type="hidden" name="latitude" value="<?php echo isset($_POST['latitude'])?$_POST['latitude']:'';?>"><input type="hidden" name="longitude" value="<?php echo isset($_POST['longitude'])?$_POST['longitude']:'';?>"><input type="hidden" name="timezone" value="<?php echo isset($_POST['timezone'])?$_POST['timezone']:'';?>"><\/form>').appendTo('body').submit().remove();
                                                }
                                            }
                                        </script>



                                        <button class="btn btn-gradient-success"  onclick="exportOption()" > Export</button>






                                        <?php
                                        if($_SESSION['incharge_ovp']!='admin')
                                        {
                                            if($rows['add_site']==1)
                                            { ?>
                                                <a href="index.php?action=add_site"><button type="button" class="btn btn-gradient-primary" title="" data-toggle="tooltip"><i class="feather icon-plus"></i>Add Site</button></a>
                                        <?php
                                            }
                                        }
                                        else{
                                            echo'<a href="index.php?action=add_site"><button type="button" class="btn btn-gradient-primary" title="" data-toggle="tooltip"><i class="feather icon-plus"></i>Add Site</button></a>';
                                        }
                                        ?>
                                        <button class="btn btn-gradient-primary" data-toggle="modal" data-target="#exampleModal1"> Manage Columns</button>


                                    </div>
                                    <div class="clearfix"></div>
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
                                                            <?php if(!isset($SelClms) || (isset($SelClms) && in_array('group_name',$SelClms))){ ?>
                                                                <th bgcolor="#38AAFC">Site Group Name</th>
                                                            <?php }if(!isset($SelClms) || (isset($SelClms) && in_array('site_name',$SelClms))){?>
                                                                <th bgcolor="#38AAFC">Site Name</th>
                                                            <?php } if(!isset($SelClms) || (isset($SelClms) && in_array('address',$SelClms))){?>
                                                                <th bgcolor="#38AAFC">Address </th>
                                                            <?php } if(!isset($SelClms) || (isset($SelClms) && in_array('lat_long',$SelClms))){?>
                                                                <th bgcolor="#38AAFC">Lat/Long </th>
                                                            <?php } if(!isset($SelClms) || (isset($SelClms) && in_array('timezone',$SelClms))){?>
                                                                <th bgcolor="#38AAFC">Timezone </th>
                                                            <?php }?>
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


                                                        $getRecordQryNum=mysqli_num_rows($GetDetail);

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
                                                            while($row = mysqli_fetch_assoc($GetDetail))
                                                            {
                                                                $class = '';
                                                                if($ctr%2 == 0)
                                                                {
                                                                    $class = 'class="bluetd"';
                                                                }
                                                                ?>
                                                                <tr <?php echo $class ?>>
                                                                    <!--<td><?php echo $ctr;?></td>-->
                                                                    <td bgcolor="" style=" background: #f5f5f5;">
                                                                        <div class="action-buttons" id="<?=$row['id'];?>" onclick="showDetails(<?php echo $row['id'];?>)" style="cursor:pointer; ">
                                                                            <img src="assets/images/details_open.png"></div>
                                                                    </td>
                                                                    <?php if(!isset($SelClms) || (isset($SelClms) && in_array('group_name',$SelClms))){ ?>
                                                                        <td>
                                                                            <?php
                                                                            //$grpSql = mysqli_query($con,"SELECT group_name FROM tbl_site_groups WHERE id = '".mysqli_real_escape_string($con,$row['site_group'])."'");
                                                                            //$param1=array("id"=>$row['site_group']);
                                                                            //$grpSql=SelectQuery('tbl_site_groups',$param1,"",$con);
                                                                            $siteView = new FetchData();
                                                                            $siteView->set_where(array('is_deleted'=>0,'id'=>$row['site_group']));
                                                                            $sitesqlview = $siteView->fetch_data('tbl_site_groups',array('id','group_name'));
                                                                            if(mysqli_num_rows($sitesqlview) > 0)
                                                                            {
                                                                                $grpRow = mysqli_fetch_assoc($sitesqlview);
                                                                                echo $grpRow['group_name'];
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                    <?php }if(!isset($SelClms) || (isset($SelClms) && in_array('site_name',$SelClms))){?>
                                                                        <td><?php echo $row['site_name'];?></td>
                                                                    <?php } if(!isset($SelClms) || (isset($SelClms) && in_array('address',$SelClms))){?>
                                                                        <td><?php echo $row['address'].", ".$row['city'].", ".$row['state'].", ".$row['zip'];?></td>
                                                                    <?php } if(!isset($SelClms) || (isset($SelClms) && in_array('lat_long',$SelClms))){?>
                                                                        <td><?php echo $row['latitude']."/".$row['longitude'];?></td>
                                                                    <?php } if(!isset($SelClms) || (isset($SelClms) && in_array('timezone',$SelClms))){?>
                                                                        <td><?php echo $row['timezone'];?></td>
                                                                    <?php }?>
                                                                    <td>
                                                                    <?php
                                                                    if($_SESSION['incharge_ovp']!='admin')
                                                                    {
                                                                        if($rows['edit_site']==1)
                                                                        { ?>
                                                                            <a class="green tooltipt" href="index.php?action=edit_site&id=<?php echo $row['id'];?>" style="text-decoration:none;" title="Edit"><span class="tooltiptext"><i class="fas fa-edit"></i> <span class="tooltip-top"></span></span> <i class="ace-icon fa fa-pencil bigger-130"></i> </a> &nbsp;&nbsp;&nbsp;
                                                                            <?php
                                                                        }
                                                                    }
                                                                    else{ ?>
                                                                    <a class="green tooltipt" href="index.php?action=edit_site&id=<?php echo $row['id'];?>" style="text-decoration:none;" title="Edit"><span class="tooltiptext"><i class="fas fa-edit"></i> <span class="tooltip-top"></span></span> <i class="ace-icon fa fa-pencil bigger-130"></i> </a> &nbsp;&nbsp;&nbsp;
                                                                        <?php
                                                                    }
                                                                    ?>

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
                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                    <?php
                                                    // Initial page num setup
                                                    $targetpage="index.php?action=view_sites".$Filters;
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
                        <form action="" method="POST">
                            <tr style="border-bottom:solid 1px #ccc">
                                <td height="20" width="50%">Site Group Name</td>
                                <td align="right"><input type="checkbox" <?php  if(!isset($SelClms) || (isset($SelClms) && in_array('group_name',$SelClms))) echo 'checked' ?> name="group_name" /></td>
                            </tr>
                            <tr style="border-bottom:solid 1px #ccc">
                                <td height="20" width="50%">Site Name</td>
                                <td align="right"><input type="checkbox" <?php  if(!isset($SelClms) || (isset($SelClms) && in_array('site_name',$SelClms))) echo 'checked' ?> name="site_name" /></td>
                            </tr>
                            <tr style="border-bottom:solid 1px #ccc">
                                <td height="20" width="50%">Address</td>
                                <td align="right"><input type="checkbox" <?php  if(!isset($SelClms) || (isset($SelClms) && in_array('address',$SelClms))) echo 'checked' ?> name="address" /></td>
                            </tr>
                            <tr style="border-bottom:solid 1px #ccc">
                                <td height="20" width="50%">Lat/Long</td>
                                <td align="right"><input type="checkbox" <?php  if(!isset($SelClms) || (isset($SelClms) && in_array('lat_long',$SelClms))) echo 'checked' ?> name="lat_long"  /></td>
                            </tr>
                            <tr style="border-bottom:solid 1px #ccc">
                                <td height="20" width="50%">Timezone</td>
                                <td align="right"><input type="checkbox" <?php  if(!isset($SelClms) || (isset($SelClms) && in_array('timezone',$SelClms))) echo 'checked' ?> name="timezone" /></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="manage_site" class="btn btn-primary">Save</button>
                </form>
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



