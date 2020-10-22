<?php
if (!isset($_SESSION['incharge_ovp'])) {
    header('location:login.php');
}?>
<style>
    .form-control:disabled, .form-control[readonly]{
        background-color: #cacccd;
        cursor: no-drop;
    }
</style>
<section class="pcoded-main-container">
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
                                            <h5 class="m-b-10">Edit Charger
                                            </h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#">Edit Charger</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <?php
                                        //fetch dat afrom database
                                        $thischarger = new FetchData();
                                        $thischarger->set_where(array('is_deleted'=>0));
                                        $thischarger->set_where(array('id'=>$_REQUEST['id']));
                                        $chsql = $thischarger->fetch_data('charger',array('*'));
                                        if(mysqli_num_rows($chsql)) {
                                            $fetch = mysqli_fetch_assoc($chsql);
                                         }


                                        //update data into databse
                                        if (isset($_POST['update'])) {
                                            foreach($_POST as $field => $value)
                                            {
                                                if($field!='update') {
                                                    $params[$field] = $value;
                                                }
                                            }
                                            $editDetails = new EditDetails();
                                            $res = $editDetails->edit_details('charger', $params,$_REQUEST['id']);
                                            if ($res == false) {
                                                $error = "Something Went Wrong. Please Try Again Later";
                                            } else {
                                                echo"<script>alert('Charger Updated');window.location.href='index.php?action=view_charger';</script>";

                                            }
                                        }

                                        ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form method="post" name="form" id="form">
                                                    <div class="col-md-6" style="float: left">
                                                        <div class="form-group">
                                                            <label>Charger Id</label>
                                                            <input readonly type="text" class="form-control" placeholder="Charger Id" value="<?=$fetch['charger_id'];?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Installed Date</label>
                                                            <input readonly type="text" class="form-control" placeholder="Installed Date" value="<?=$fetch['install_date'];?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Latitude</label>
                                                            <input  type="text" class="form-control" name="latitude" placeholder="Latitude" value="<?=$fetch['latitude'];?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Site</label><!-- need to fetch from db-->
                                                            <select readonly disabled class="form-control" required>
                                                                <option value="">Select Site</option>
                                                                <?php
                                                                $siteList = new FetchData();
                                                                $siteList->set_where(array('is_deleted'=>0));
                                                                $sitesql = $siteList->fetch_data('tbl_sites',array('id','site_name'));
                                                                if(mysqli_num_rows($sitesql)) {
                                                                    while ($site = mysqli_fetch_assoc($sitesql)) {
                                                                        echo '<option value="' . $site['id'] . '"';
                                                                        if (isset($_POST['site'])) {
                                                                            if ($_POST['site'] == $site['id']) {
                                                                                echo "selected";
                                                                            }
                                                                        }
                                                                        elseif($fetch['site_id']==$site['id']){ echo"Selected";}
                                                                        echo '>' . ucwords($site['site_name']) . '</option>';
                                                                    }
                                                                } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Connector Type</label>
                                                            <select name="connector_type" class="form-control" onchange="conectype()" id="conn_type" required>
                                                                <option value="">Select Connector Type</option>
                                                                <option value='AC' <?php if(isset($_POST['connector_type'])){ if($_POST['connector_type']=='AC'){ echo"Selected"; } }else{ if($fetch['connector_type']=='AC'){ echo"Selected";}}?>>AC</option>
                                                                <option value='DC' <?php if(isset($_POST['connector_type'])){ if($_POST['connector_type']=='DC'){ echo"Selected"; } }else{ if($fetch['connector_type']=='DC'){ echo"Selected";}}?>>DC</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Charger Capabilities</label>
                                                            <!--fetch from evse_sites table-->
                                                            <select name="charger_capability_id" class="form-control" required>
                                                                <option value="">Select Charger Capabilities</option>
                                                                <?php
                                                                $charger_cp = new FetchData();
                                                                $charger_cp->set_where(array('is_deleted'=>0));
                                                                $charger_cpsql = $charger_cp->fetch_data('charger_capabilities',array('id','charge_cp_name'));
                                                                if(mysqli_num_rows($charger_cpsql)) {
                                                                    while ($charger_cprow = mysqli_fetch_assoc($charger_cpsql)) {
                                                                        echo '<option value="' . $charger_cprow['id'] . '"';
                                                                        if (isset($_POST['charger_capability_id'])) {
                                                                            if ($_POST['charger_capability_id'] == $charger_cprow['id']) {
                                                                                echo "selected";
                                                                            }
                                                                        }
                                                                        elseif($fetch['charger_capability_id']==$charger_cprow['id']){ echo"Selected";}
                                                                        echo '>' . ucwords($charger_cprow['charge_cp_name']) . '</option>';
                                                                    }
                                                                } ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Connector ID</label>
                                                            <input type="text" class="form-control" name="connector_id" placeholder="Connector ID" value="<?php if(isset($_POST['connector_id'])){ echo $_POST['connector_id']; }else{ echo $fetch['connector_id']; }?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" style="float:right">
                                                        <div class="form-group">
                                                            <label>OCPP Chargebox ID</label>
                                                            <input readonly type="text" class="form-control" placeholder="OCPP Chargebox ID" value="<?=$fetch['ocpp_cb_id'];?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Station ID</label>
                                                            <input readonly type="text" class="form-control" placeholder="Station ID" value="<?=$fetch['station_id'];?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Longitude</label>
                                                            <input type="text" class="form-control" name="longitude" placeholder="Longitude" value="<?=$fetch['longitude'];?>" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Charger Group</label><!-- need to fetch from db-->
                                                            <input type="text" class="form-control" name="chargegroup_id" aria-describedby="emailHelp" placeholder="Charger Group" value="<?=$fetch['chargegroup_id'];?>">
<!--                                                            <select name="chargegroup_id" class="form-control" required>-->
<!--                                                                <option value="">Select Charge Group</option>-->
<!--                                                                --><?php
//                                                                $charger_gp = new FetchData();
//                                                                $charger_gp->set_where(array('is_deleted' => 0));
//                                                                $charger_cpsql = $charger_gp->fetch_data('tbl_site_groups', array('id', 'group_name'));
//                                                                if (mysqli_num_rows($charger_cpsql)) {
//                                                                    while ($rowg = mysqli_fetch_assoc($charger_cpsql)) {
//                                                                        echo '<option value="' . $rowg['id'] . '"';
//                                                                        if (isset($_POST['chargegroup_id'])) {
//                                                                            if ($_POST['chargegroup_id'] == $rowg['id']) {
//                                                                                echo "selected";
//                                                                            }
//                                                                        } elseif ($fetch['chargegroup_id'] == $rowg['id']) {
//                                                                            echo "Selected";
//                                                                        }
//                                                                        echo '>' . ucwords($rowg['group_name']) . '</option>';
//                                                                    }
//                                                                } ?>
<!--                                                            </select>-->
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Connector Category <span id="conn_of"><?php if(isset($_POST['connector_type'])){ echo" of ".$_POST['connector_type']; }else{ echo" of ".$fetch['connector_type']; }?></span></label>
                                                            <select name="connector_category" id="connector_category" class="form-control" required>
                                                                <option value="">Select Connector Category</option>
                                                                <?php
                                                                if(isset($_POST['connector_type']))
                                                                {
                                                                    if($_POST['connector_type']=='AC')
                                                                    {
                                                                        $concat='';
                                                                        if(isset($_POST['connector_category'])){ $concat=$_POST['connector_category']; }
                                                                        echo"<option value='J1772'"; if($concat=='J1772'){ echo"selected";} echo">J1772</option><option value='Menekes Type 2'"; if($concat=='Menekes Type 2'){ echo"selected";} echo">Menekes Type 2</option><option value='GB/T'"; if($concat=='GB/T'){ echo"selected";} echo">GB/T</option>";
                                                                    }
                                                                    elseif($_POST['connector_type']=='DC')
                                                                    {
                                                                        $concat='';
                                                                        if(isset($_POST['connector_category'])){ $concat=$_POST['connector_category']; }
                                                                        echo"<option value='CCS'"; if($concat=='CCS'){ echo"selected";} echo">CCS</option><option value='CHADemo'"; if($concat=='CHADemo'){ echo"selected";} echo">CHADemo</option><option value='CCS2'"; if($concat=='CCS2'){ echo"selected";} echo">CCS2</option><option value='GB/T'"; if($concat=='GB/T'){ echo"selected";} echo">GB/T</option>";
                                                                    }
                                                                }
                                                                else{
                                                                    if($fetch['connector_type']=='AC')
                                                                    {
                                                                        $concat=$fetch['connector_category'];
                                                                        echo"<option value='J1772'"; if($concat=='J1772'){ echo"selected";} echo">J1772</option><option value='Menekes Type 2'"; if($concat=='Menekes Type 2'){ echo"selected";} echo">Menekes Type 2</option><option value='GB/T'"; if($concat=='GB/T'){ echo"selected";} echo">GB/T</option>";
                                                                    }
                                                                    elseif($fetch['connector_type']=='DC')
                                                                    {
                                                                        $concat=$fetch['connector_category'];
                                                                        echo"<option value='CCS'"; if($concat=='CCS'){ echo"selected";} echo">CCS</option><option value='CHADemo'"; if($concat=='CHADemo'){ echo"selected";} echo">CHADemo</option><option value='CCS2'"; if($concat=='CCS2'){ echo"selected";} echo">CCS2</option><option value='GB/T'"; if($concat=='GB/T'){ echo"selected";} echo">GB/T</option>";
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Charger Floor</label>
                                                            <input type="text" class="form-control" name="charger_floor" placeholder="Charger Floor" value="<?php if(isset($_POST['charger_floor'])){ echo $_POST['charger_floor']; }else{ echo $fetch['charger_floor'];}?>" required>
                                                        </div>

                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-6">
                                                        <input type="submit" class="btn btn-primary" name="update" value="Update">
                                                        <a href="index.php?action=view_charger"><input type="button" class="btn btn-primary" value="Cancel"></a>
                                                    </div>
                                                </form>


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
</section>
</body>
<script>
    function conectype()
    {
        d = document.getElementById("conn_type").value;
        $('#conn_of').empty();
        document.getElementById('connector_category').innerHTML="<option value=''>Select Connector Category</option>";
        if(d!='')
        {
            document.getElementById("conn_of").innerHTML=' of '+d;
            if(d=='AC')
            {
                document.getElementById('connector_category').innerHTML="<option value=''>Select Connector Category</option><option value='J1772'>J1772</option><option value='Menekes Type 2'>Menekes Type 2</option><option value='GB/T'>GB/T</option>";
            }
            else if(d=='DC')
            {
                document.getElementById('connector_category').innerHTML="<option value=''>Select Connector Category</option><option value='CCS'>CCS</option><option value='CHADemo'>CHADemo</option><option value='CCS2'>CCS2</option><option value='GB/T'>GB/T</option>";
            }
        }
    }
</script>
</html>
