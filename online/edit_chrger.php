<?php
if (!isset($_SESSION['incharge_ovp'])) {
    header('location:login.php');
}
include('db1.php');?>
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
                                        $mysqli=mysqli_query($con,"select * from charger where id='".$_REQUEST['id']."'");
                                        $fetch=mysqli_fetch_assoc($mysqli); ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form method="post" name="form" id="form" action="addcharge.php">
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
                                                                $mysql=mysqli_query($con,"select * from tbl_sites");
                                                                while($row=mysqli_fetch_assoc($mysql))
                                                                { ?>
                                                                    <option value="<?=$row['id'];?>" <?php if($fetch['site_id']==$row['id']){ echo"selected";}?>><?=ucwords($row['site_name']);?></option>
                                                                    <?php
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
                                                            <?php
                                                            $field=array('id','name'); //array for field you need to fetch from table if any
                                                            $conkey=array('is_deleted'); //array for field of condition you need if any
                                                            $conval=array('0'); //array for value of condition you need if any
                                                            $row=Selectdata('charger_capabilities',$field,$conkey,$conval);
                                                            ?>
                                                            <select name="charger_capability_id" class="form-control" required>
                                                                <option value="">Select Charger Capabilities</option>
                                                                <?php
                                                                foreach ($row as $val)
                                                                {
                                                                    echo"<option value='".$val['id']."'";if (isset($_POST['charger_capability_id'])) { if($_POST['charger_capability_id']==$val['id']){ echo"Selected"; } }else{ if($fetch['charger_capability_id']==$val['id']){echo"Selected";}} echo">".ucwords($val['name'])."</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>

<!--                                                        <div class="form-group">-->
<!--                                                            <label>Activate</label>-->
<!--                                                            <span style="display:flex;">-->
<!--                                                                    <input type="hidden" name="activate" value="0"/>-->
<!--                                                                    <input type="checkbox" class="form-control" --><?php //if($fetch['activate']==1){ echo"checked";}?><!-- name="activate" style="width:12px;margin: 0 10px 0 0;" value="1">-->
<!--                                                                    <label>Yes</label>-->
<!--                                                                </span>-->
<!--                                                        </div>-->
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
                                                            <label>Charge Group</label><!-- need to fetch from db-->
                                                            <select name="chargegroup_id" class="form-control" required>
                                                                <option value="">Select Charge Group</option>
                                                                <?php
                                                                $mysqlg=mysqli_query($con,"select * from tbl_site_groups");
                                                                while($rowg=mysqli_fetch_assoc($mysqlg))
                                                                { ?>
                                                                    <option value="<?=$rowg['id'];?>" <?php if($fetch['chargegroup_id']==$rowg['id']){ echo"selected";}?>><?=ucwords($rowg['group_name']);?></option>
                                                                    <?php
                                                                } ?>
                                                            </select>
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
                                                        <input type="hidden" name="id" value="<?=$_REQUEST['id'];?>"/>
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
