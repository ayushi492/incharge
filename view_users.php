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
                                            <h5 class="m-b-10">Manage User</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#">Manage User</a></li>
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
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead style="color:#fff;">
                                                <tr style="color:#fff;">
                                                    <th style=" background: #f5f5f5;" ></th>
                                                    <th bgcolor="#38AAFC">Name</th>
                                                    <th bgcolor="#38AAFC">Username</th>
                                                    <th bgcolor="#38AAFC">Email Id</th>
                                                    <th bgcolor="#38AAFC">Password</th>
                                                    <th bgcolor="#38AAFC">Mobile Number</th>
                                                    <th bgcolor="#38AAFC">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $i=1;
                                                $user_t = new FetchData();
                                                $user_t->set_where(array('is_deleted' => 0));
                                                $user_t->set_join('tbl_user_manage tb','LEFT JOIN', 'tb.username = c.username');
                                                $querystring = array('tb.*','c.*');
                                                $usertsql = $user_t->fetch_data('tbl_user c',$querystring);
                                                if ($get_chargernum=mysqli_num_rows($usertsql)) {
                                                    while($row = mysqli_fetch_assoc($usertsql))
                                                    { //print_r($row);
                                                        ?>
                                                        <tr>
                                                            <td bgcolor="" style=" background: #f5f5f5;">
                                                                <div class="action-buttons" id="<?=$i;?>" onclick="showDetails(<?php echo $i;?>)" style="cursor:pointer; ">
                                                                    <img src="assets/images/details_open.png">
                                                                </div>
                                                            </td>
                                                            <td><?php echo ucfirst($row['name']);?></td>
                                                            <td><?php echo $row['username'];?></td>
                                                            <td><?php echo $row['email'];?></td>
                                                            <td><?php echo $row['password'];?></td>
                                                            <td><?php echo $row['mobile'];?></td>
                                                            <td><a class="green tooltipt" href="index.php?action=edit_users&id=<?php echo $row['id'];?>" style="text-decoration:none;"><span class="tooltiptext"><i class="fas fa-edit"></i> <span class="tooltip-top"></span></span> <i class="ace-icon fa fa-pencil bigger-130"></i> </a> &nbsp;&nbsp;&nbsp;
                                                                <!--<a class="red tooltipt" onClick="return confirm('Do you really want to delete this record?')" href="#" ><span class="tooltiptext"><i class="feather icon-trash-2" style="color: red;"></i><span class="tooltip-top"></span></span> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>-->
                                                            </td>

                                                        </tr>

                                                        <tr id="evsediv<?php echo $i;?>" style="display: none;">
                                                            <td colspan="7" style="padding: 0;">
                                                                <div style="width:100%;word-break: break-word !important;white-space: initial; ">
                                                                    <h3>Permissions</h3>
                                                                    <table cellpadding="0" cellspacing="0" border="0"  class="table table-styling table-hover table-striped table-primary">
                                                                        <tbody>
                                                                        <tr>
                                                                            <th colspan="2">Dashboard : <span style="margin-left: 10%; "><?php if($row['dashboard']=='1'){ echo "Yes"; }else{ echo"No"; }?></span></th>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th colspan="4">Charger
                                                                                <table class="table table-styling table-hover table-striped table-primary">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td> View</td>
                                                                                        <td><?php if($row['view_charger']=='1'){ echo "Yes"; }else{ echo"No"; }?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td> Add</td>
                                                                                        <td><?php if($row['add_charger']=='1'){ echo "Yes"; }else{ echo"No"; }?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td> Edit</td>
                                                                                        <td><?php if($row['edit_charger']=='1'){ echo "Yes"; }else{ echo"No"; }?></td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th colspan="1">Site Region
                                                                                <table class="table table-styling table-hover table-striped table-primary">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td> View</td>
                                                                                        <td><?php if($row['view_site_region']=='1'){ echo "Yes"; }else{ echo"No"; }?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td> Add</td>
                                                                                        <td><?php if($row['add_site_region']=='1'){ echo "Yes"; }else{ echo"No"; }?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td> Edit</td>
                                                                                        <td><?php if($row['edit_site_region']=='1'){ echo "Yes"; }else{ echo"No"; }?></td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </th>
                                                                            <th colspan="1">Site Division
                                                                                <table class="table table-styling table-hover table-striped table-primary">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td> View</td>
                                                                                        <td><?php if($row['view_site_division']=='1'){ echo "Yes"; }else{ echo"No"; }?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td> Add</td>
                                                                                        <td><?php if($row['add_site_division']=='1'){ echo "Yes"; }else{ echo"No"; }?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td> Edit</td>
                                                                                        <td><?php if($row['edit_site_division']=='1'){ echo "Yes"; }else{ echo"No"; }?></td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </th>
                                                                            <th colspan="1">Site Group
                                                                                <table class="table table-styling table-hover table-striped table-primary">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td> View</td>
                                                                                        <td><?php if($row['view_site_group']=='1'){ echo "Yes"; }else{ echo"No"; }?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td> Add</td>
                                                                                        <td><?php if($row['add_site_group']=='1'){ echo "Yes"; }else{ echo"No"; }?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td> Edit</td>
                                                                                        <td><?php if($row['edit_site_group']=='1'){ echo "Yes"; }else{ echo"No"; }?></td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </th>
                                                                            <th colspan="1">Site
                                                                                <table class="table table-styling table-hover table-striped table-primary">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td> View</td>
                                                                                        <td><?php if($row['view_sites']=='1'){ echo "Yes"; }else{ echo"No"; }?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td> Add</td>
                                                                                        <td><?php if($row['add_site']=='1'){ echo "Yes"; }else{ echo"No"; }?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td> Edit</td>
                                                                                        <td><?php if($row['edit_site']=='1'){ echo "Yes"; }else{ echo"No"; }?></td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </th>
                                                                        </tr>
                                                                       </tbody>
                                                                    </table>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $i++;
                                                    }
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
        <script>
            function showDetails(num){
                var x = document.getElementById("evsediv"+num);
                if (x.style.display === "none") {
                    $("#evsediv"+num).fadeIn('slow');
                    // x.style.display = "table-row";
                    document.getElementById(num).innerHTML='<img src="assets/images/details_close.png">';
                    for(var i=1; i<=<?=$get_chargernum;?>; i++)
                    {
                        if(i!=num) {
                            var y = document.getElementById("evsediv" + i);
                            $('#evsediv'+i).fadeOut('slow');
                            // y.style.display = "none";
                            document.getElementById(i).innerHTML='<img src="assets/images/details_open.png">';
                        }
                    }
                } else {
                    // x.style.display = "none";
                    $("#evsediv"+num).fadeOut('slow');
                    document.getElementById(num).innerHTML='<img src="assets/images/details_open.png">';
                }
            }
        </script>