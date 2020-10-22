<?php
if (!isset($_SESSION['incharge_ovp'])) {
    header('location:login.php');
}
include('db.php');
?>
<style>
    .fa, .fas {
        font-weight: 900;
        color: #fff;
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
                                            <h5 class="m-b-10">View Chargers
                                            </h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#">View Chargers
                                                </a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <!--filter-->
                                        <h5>Filters</h5>

                                        <div class="clearfix"></div>
                                        <form method="post">
                                            <div class="form-row " style="margin:0; padding:5px;">
                                                <!--charger id-->
                                                <div class="form-group col-md-2">
                                                    <label for="exampleInputEmail1">Charger ID</label>
                                                    <input type="text" name="form_chargerid" class="form-control" aria-describedby="emailHelp" placeholder="Charger ID" value="<?php if(isset($_POST['form_chargerid'])){ echo $_POST['form_chargerid'];} ?>">
                                                </div>
                                                <!--Station ID-->
                                                <div class="form-group col-md-2">
                                                    <label for="exampleInputEmail1">Station ID</label>
                                                    <input type="text" name="station_id" class="form-control" aria-describedby="emailHelp" placeholder="Station ID" value="<?php if(isset($_POST['station_id'])){ echo $_POST['station_id'];} ?>">
                                                </div>
                                                <!--site  fetched from evse_sites table-->
                                                <div class="form-group col-md-2">
                                                    <label for="exampleInputEmail1">Site</label>
                                                    <select name="site" class="form-control" aria-describedby="emailHelp">
                                                        <option value="">Select Site</option>
                                                        <?php
                                                        $field=array('id','site_name'); //array for field you need to fetch from table if any
                                                        $conkey=array('is_deleted'=>'0'); //array for field of condition you need if any
                                                        $row=Selectdata('tbl_sites',$field,$conkey);
                                                        foreach ($row as $site)
                                                        {
                                                            echo'<option value="'.$site['id'].'"'; if(isset($_POST['site'])){ if($_POST['site']==$site['id']){ echo"selected";}} echo'>'.ucwords($site['site_name']).'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <!--site  fetched from evse_groups table-->
                                                <div class="form-group col-md-2">
                                                    <label for="exampleInputEmail1">Charge Group</label>
                                                    <select class="form-control" name="chargegroup" aria-describedby="emailHelp">
                                                        <option value="">Select Charge Group</option>
                                                        <?php
                                                        $field = array('id', 'group_name'); //array for field you need to fetch from table if any
                                                        $conkey = array('is_deleted'=>'0'); //array for field of condition you need if any
                                                        $row = Selectdata('tbl_site_groups', $field, $conkey);
                                                        foreach ($row as $siteg)
                                                        {
                                                            echo'<option value="'.$siteg['id'].'"'; if(isset($_POST['chargegroup'])){ if($_POST['chargegroup']==$siteg['id']){ echo"selected";}} echo'>'.ucwords($siteg['group_name']).'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <!--Connector ID-->
                                                <div class="form-group col-md-2">
                                                    <label for="exampleInputEmail1">Connector ID</label>
                                                    <input type="text" name="connector_id" class="form-control" aria-describedby="emailHelp" placeholder="Connector ID" value="<?php if(isset($_POST['connector_id'])){ echo $_POST['connector_id'];}?>">
                                                </div>
                                                <!--Connector Status filter-->
                                                <div class="form-group col-md-2">
                                                    <label for="exampleInputEmail1">Connector Status</label>
                                                    <select class="form-control" aria-describedby="emailHelp">
                                                        <option value="">Select Connector Status</option>
                                                        <option value="Unavailable">Unavailable</option>
                                                        <option value="Available">Available</option>
                                                        <option value="Faulted">Faulted</option>
                                                        <option value="Preparing">Preparing</option>
                                                        <option value="Charging">Charging</option>
                                                        <option value="Finishing">Finishing</option>
                                                        <option value="Unknown">Unknown</option>
                                                    </select>
                                                </div>
                                                <!--Connector Capabilities filter-->
                                                <div class="form-group col-md-2">
                                                    <label for="exampleInputEmail1">Connector Capabilities</label>
                                                    <select class="form-control" name="connector_capabilities" aria-describedby="emailHelp">
                                                        <option value="">Select Connector Capabilities</option>
                                                        <?php
                                                        $field = array('id', 'name'); //array for field you need to fetch from table if any
                                                        $conkey = array('is_deleted'=>'0'); //array for field of condition you need if any
                                                        $row = Selectdata('charger_capabilities', $field, $conkey);
                                                        foreach ($row as $siteg)
                                                        {
                                                            echo'<option value="'.$siteg['id'].'"'; if(isset($_POST['connector_capabilities'])){ if($_POST['connector_capabilities']==$siteg['id']){ echo"Selected"; }}echo'>'.ucwords($siteg['name']).'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <!--Connector Transaction filter-->
                                                <div class="form-group col-md-2">
                                                    <label for="exampleInputEmail1">Charger Transaction</label>
                                                    <select class="form-control" name="transaction_type" aria-describedby="emailHelp">
                                                        <option value="">Select Charger Transaction</option>
                                                        <?php
                                                        $field = array('id', 'name'); //array for field you need to fetch from table if any
                                                        $conkey = array('is_deleted'=>'0'); //array for field of condition you need if any
                                                        $row = Selectdata('transaction_type', $field, $conkey);
                                                        foreach ($row as $siteg)
                                                        {
                                                            echo'<option value="'.$siteg['id'].'"'; if(isset($_POST['transaction_type'])){ if($_POST['transaction_type']==$siteg['id']){ echo"Selected"; }}echo'>'.ucwords($siteg['name']).'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <!--Connector Type filter-->
                                                <div class="form-group col-md-2">
                                                    <label for="exampleInputEmail1">Connector Type</label>
                                                    <select class="form-control" name="connector_type" aria-describedby="emailHelp" onchange="conectype()" id="conn_type">
                                                        <option value="">Select Connector Type</option>
                                                        <option value="AC"<?php if(isset($_POST['connector_type'])){ if($_POST['connector_type']=='AC'){ echo"Selected";}} ?>>AC</option>
                                                        <option value="DC" <?php if(isset($_POST['connector_type'])){ if($_POST['connector_type']=='DC'){ echo"Selected";}} ?>>DC</option>
                                                    </select>
                                                </div>
                                                <!--Connector Category filter-->
                                                <div class="form-group col-md-2">
                                                    <label for="exampleInputEmail1">Connector Category <span id="conn_of"><?php if(isset($_POST['connector_type'])){ if($_POST['connector_type']=='AC'){ echo" of AC";}elseif($_POST['connector_type']=='DC'){ echo" of DC";}}?></label>
                                                    <select class="form-control" name="connector_category" aria-describedby="emailHelp" id="connector_category">
                                                        <option value="">Select Connector Category</option>
                                                        <?php
                                                        if(isset($_POST['connector_type'])){
                                                            $conect='';
                                                            if(isset($_POST['connector_category'])){ $conect=$_POST['connector_category'];}
                                                            if($_POST['connector_type']=='AC'){ ?>
                                                                <option value='J1772' <?php if($conect=='J1772'){ echo"Selected"; } ?>>J1772</option>
                                                                <option value='Menekes Type 2'<?php if($conect=='Menekes Type 2'){ echo"Selected"; } ?>>Menekes Type 2</option>
                                                                <option value='GB/T' <?php if($conect=='GB/T'){ echo"Selected"; } ?>>GB/T</option>
                                                                <?php
                                                            }
                                                            elseif($_POST['connector_type']=='DC'){ ?>
                                                                <option value='CCS' <?php if($conect=='CCS'){ echo"Selected"; } ?>>CCS</option>
                                                                <option value='CHADemo' <?php if($conect=='CHADemo'){ echo"Selected"; } ?>>CHADemo</option>
                                                                <option value='CCS2' <?php if($conect=='CCS2'){ echo"Selected"; } ?>>CCS2</option>
                                                                <option value='GB/T' <?php if($conect=='GB/T'){ echo"Selected"; } ?>>GB/T</option>
                                                            <?php }
                                                        }
                                                        ?>

                                                    </select>
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <br>
                                                    <button type="submit" style="padding: 5px;margin: 0;margin-top: 4px;width: 91px;" class="btn btn-outline-secondary" title="" data-toggle="tooltip" aria-describedby="tooltip322126">Search</button>
                                                </div>
                                                <!-- filter is for show only-->
                                            </div>
                                        </form>
                                    </div>

                                    <div class="card-body" style="float:right; padding-left: 650px;">

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
                                                    $('<form action="charger_export_csv.php" method="POST" target="_blank"><input type="hidden" name="export" value="1"><input type="hidden" name="form_chargerid" value="<?php echo isset($_POST['form_chargerid'])?$_POST['form_chargerid']:'';?>"><input type="hidden" name="station_id" value="<?php echo isset($_POST['station_id'])?$_POST['station_id']:'';?>"><input type="hidden" name="site" value="<?php echo isset($_POST['site'])?$_POST['site']:'';?>"><input type="hidden" name="chargegroup" value="<?php echo isset($_POST['chargegroup'])?$_POST['chargegroup']:'';?>"><input type="hidden" name="connector_id" value="<?php echo isset($_POST['connector_id'])?$_POST['connector_id']:'';?>"><input type="hidden" name="connector_capabilities" value="<?php echo isset($_POST['connector_capabilities'])?$_POST['connector_capabilities']:'';?>"><input type="hidden" name="transaction_type" value="<?php echo isset($_POST['transaction_type'])?$_POST['transaction_type']:'';?>"><input type="hidden" name="connector_type" value="<?php echo isset($_POST['connector_type'])?$_POST['connector_type']:'';?>"><input type="hidden" name="connector_category" value="<?php echo isset($_POST['connector_category'])?$_POST['connector_category']:'';?>"><\/form>').appendTo('body').submit().remove();
                                                }
                                                else
                                                if(export_type=="PDF")
                                                {
                                                    $('<form action="charger_export_excel.php" method="POST" target="_blank"><input type="hidden" name="export" value="1"><input type="hidden" name="form_chargerid" value="<?php echo isset($_POST['form_chargerid'])?$_POST['form_chargerid']:'';?>"><input type="hidden" name="station_id" value="<?php echo isset($_POST['station_id'])?$_POST['station_id']:'';?>"><input type="hidden" name="site" value="<?php echo isset($_POST['site'])?$_POST['site']:'';?>"><input type="hidden" name="chargegroup" value="<?php echo isset($_POST['chargegroup'])?$_POST['chargegroup']:'';?>"><input type="hidden" name="connector_id" value="<?php echo isset($_POST['connector_id'])?$_POST['connector_id']:'';?>"><input type="hidden" name="connector_capabilities" value="<?php echo isset($_POST['connector_capabilities'])?$_POST['connector_capabilities']:'';?>"><input type="hidden" name="transaction_type" value="<?php echo isset($_POST['transaction_type'])?$_POST['transaction_type']:'';?>"><input type="hidden" name="connector_type" value="<?php echo isset($_POST['connector_type'])?$_POST['connector_type']:'';?>"><input type="hidden" name="connector_category" value="<?php echo isset($_POST['connector_category'])?$_POST['connector_category']:'';?>"><\/form>').appendTo('body').submit().remove();
                                                }
                                                else
                                                {
                                                    $('<form action="charger_export_pdf.php" method="POST" target="_blank"><input type="hidden" name="export" value="1"><input type="hidden" name="form_chargerid" value="<?php echo isset($_POST['form_chargerid'])?$_POST['form_chargerid']:'';?>"><input type="hidden" name="station_id" value="<?php echo isset($_POST['station_id'])?$_POST['station_id']:'';?>"><input type="hidden" name="site" value="<?php echo isset($_POST['site'])?$_POST['site']:'';?>"><input type="hidden" name="chargegroup" value="<?php echo isset($_POST['chargegroup'])?$_POST['chargegroup']:'';?>"><input type="hidden" name="connector_id" value="<?php echo isset($_POST['connector_id'])?$_POST['connector_id']:'';?>"><input type="hidden" name="connector_capabilities" value="<?php echo isset($_POST['connector_capabilities'])?$_POST['connector_capabilities']:'';?>"><input type="hidden" name="transaction_type" value="<?php echo isset($_POST['transaction_type'])?$_POST['transaction_type']:'';?>"><input type="hidden" name="connector_type" value="<?php echo isset($_POST['connector_type'])?$_POST['connector_type']:'';?>"><input type="hidden" name="connector_category" value="<?php echo isset($_POST['connector_category'])?$_POST['connector_category']:'';?>"><\/form>').appendTo('body').submit().remove();
                                                }
                                            }
                                        </script>
                                        <button class="btn btn-gradient-success"  onclick="exportOption()" > Export</button>
                                        <button class="btn btn-gradient-primary" data-toggle="modal" data-target="#exampleModal1"> Manage Columns</button>
                                    </div>

                                    <!--Table for chargers-->
                                    <div class="card-body table-border-style">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th style=" background: #f5f5f5;" ></th>
                                                    <th>Charger Id</th>
                                                    <th>OCPP Chargebox ID</th>
                                                    <th>Station ID</th>
                                                    <th>Site</th>
                                                    <th>Charge Group</th>
                                                    <th>Connector Type</th>
                                                    <th>Connector Category</th>
                                                    <th>Installed Date</th>
                                                    <th>Lat/Long</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                if(isset($_POST['form_chargerid']) || isset($_POST['station_id']) || isset($_POST['site']) || isset($_POST['chargegroup']) || isset($_POST['connector_id']) || isset($_POST['connector_capabilities']) || isset($_POST['transaction_type']) || isset($_POST['connector_type']) || isset($_POST['connector_category']) )
                                                {
                                                    $i = 1;
                                                    $field1 = ''; //array for field you need to fetch from table if any
                                                    $conkey1 = array('is_deleted'=>'0'); //array for field of condition you need if any
                                                    //if charger_id serached
                                                    if (isset($_POST['form_chargerid'])) {
                                                        if ($_POST['form_chargerid'] != '') {
                                                            $conkey1['charger_id'] = $_POST['form_chargerid']; //array for field of condition and value you need if any
                                                        }
                                                    }
                                                    //if station id searched
                                                    if (isset($_POST['station_id'])) {
                                                        if ($_POST['station_id'] != '') {
                                                            $conkey1['station_id'] = $_POST['station_id']; //array for value of condition and value you need if any
                                                        }
                                                    }
                                                    //if site searched
                                                    if (isset($_POST['site'])) {
                                                        if ($_POST['site'] != '') {
                                                            $conkey1['site_id'] = $_POST['site']; //array for value of condition you need if any
                                                        }
                                                    }
                                                    //if charger group searched
                                                    if (isset($_POST['chargegroup'])) {
                                                        if ($_POST['chargegroup'] != '') {
                                                            $conkey1['chargegroup_id'] = $_POST['chargegroup']; //array for value of condition you need if any
                                                        }
                                                    }
                                                    //if connector id searched
                                                    if (isset($_POST['connector_id'])) {
                                                        if ($_POST['connector_id'] != '') {
                                                            $conkey1['connector_id'] =$_POST['connector_id']; //array for value of condition you need if any
                                                        }
                                                    }
                                                    //if connector capabilities searched
                                                    if (isset($_POST['connector_capabilities'])) {
                                                        if ($_POST['connector_capabilities'] != '') {
                                                            $conkey1['charger_capability_id'] = $_POST['connector_capabilities']; //array for value of condition you need if any
                                                        }
                                                    }
                                                    //if transacrion type searched
                                                    if (isset($_POST['transaction_type'])) {
                                                        if ($_POST['transaction_type'] != '') {
                                                            $conkey1['transaction_type'] =$_POST['transaction_type']; //array for value of condition you need if any
                                                        }
                                                    }
                                                    //if connector type searched
                                                    if (isset($_POST['connector_type'])) {
                                                        if ($_POST['connector_type'] != '') {
                                                            $conkey1['connector_type'] = $_POST['connector_type']; //array for value of condition you need if any
                                                        }
                                                    }
                                                    //if connector_category searched
                                                    if (isset($_POST['connector_category'])) {
                                                        if ($_POST['connector_category'] != '') {
                                                            $conkey1['connector_category'] = $_POST['connector_category']; //array for value of condition you need if any
                                                        }
                                                    }

                                                    //fetch from function
                                                    $row1 = Selectdata('charger', $field1, $conkey1);

                                                }
                                                //if no filter is there
                                                else {
                                                    $i = 1;
                                                    $field1 = ''; //array for field you need to fetch from table if any
                                                    $conkey1 = array('is_deleted'=>'0'); //array for field of condition you need if any
                                                    //$charger=Setjoin('tbl_sites s','LEFT JOIN', 'c.siteID = s.id');

                                                    $row1 = Selectdata('charger', $field1, $conkey1);
                                                }
                                                if($row1==0){
                                                    echo"<script>alert('No data found');window.location.href='index.php?action=view_charger';</script>";
                                                }
                                                else{
                                                    foreach($row1 as $row)
                                                    {
                                                        //fetch site name
                                                        $fiel = array('site_name'); //array for field you need to fetch from table if any
                                                        $con1 = array('id'=>$row['site_id'],'is_deleted'=>'0'); //array for field of condition you need if any
                                                        $var = Selectdata('tbl_sites', $fiel, $con1);

                                                        //fetch charger group name
                                                        $fiela = array('group_name'); //array for field you need to fetch from table if any
                                                        $con2 = array('id'=>$row['chargegroup_id'],'is_deleted'=>'0'); //array for field of condition you need if any
                                                        $varg = Selectdata('tbl_site_groups', $fiela, $con2);
                                                        ?>
                                                        <tr class="text-white" <?php if($i==1){ echo'style="background:#ffa600"';} elseif($i==2){ echo'style="background:#204406"'; }elseif($i==3){ echo'style="background:#909090"'; }elseif($i==4){ echo'style="background:#c3150f"'; }?>>
                                                            <td bgcolor="" style=" background: #f5f5f5;">
                                                                <div class="action-buttons" id="<?=$row['id'];?>" onclick="showDetails(<?php echo $row['id'];?>)" style="cursor:pointer; ">
                                                                    <img src="assets/images/details_open.png"></div>
                                                            </td>
                                                            <td><?=$row['charger_id'];?></td>
                                                            <td><?=$row['ocpp_cb_id'];?></td>
                                                            <td><?=$row['station_id'];?></td>
                                                            <td><?php foreach ($var as $vv){ echo ucwords($vv['site_name']); }?></td>
                                                            <td><?php foreach ($varg as $vv1){ echo ucwords($vv1['group_name']); }?></td>
                                                            <td><?=$row['connector_type'];?></td>
                                                            <td><?=$row['connector_category'];?></td>
                                                            <td><?=$row['install_date'];?></td>
                                                            <td><?=$row['latitude']."/".$row['longitude'];?></td>
                                                            <td>
                                                                <a href="index.php?action=edit_chrger&id=<?=$row['id'];?>" > &nbsp;&nbsp;<i class="fas fa-edit"></i></a>
                                                                <!--<a href="addcharge.php?id=<?=$row['id'];?>" onclick="confirm('Are you sure to delete this charger')" style="padding-left: 11px;"> <i class="fas fa-trash-alt" style="color: #ff0909;"></i></a>-->
                                                            </td>
                                                        </tr>
                                                        <tr id="evsediv<?php echo $row['id'];?>" style="display: none;">
                                                            <td colspan="11" style="padding: 0;">
                                                                <div style="width:100%;word-break: break-word !important;white-space: initial; ">
                                                                    <table cellpadding="0" cellspacing="0" border="0"  class="table table-styling table-hover table-striped table-primary">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>Charger Floor :</td>
                                                                            <td><?=$row['charger_floor'];?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Charger Transaction :</td>
                                                                            <td><?php
                                                                                $fiel_t = array('name'); //array for field you need to fetch from table if any
                                                                                $con_t = array('id'=>$row['transaction_type'],'is_deleted'=>'0'); //array for field of condition you need if any
                                                                                $row_t = Selectdata('transaction_type', $fiel_t, $con_t);

                                                                                foreach ($row_t as $ro_t){ echo ucwords($ro_t['name']); }?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Charger Capapbility :</td>
                                                                            <td><?php
                                                                                $fiel_cp = array('name'); //array for field you need to fetch from table if any
                                                                                $con_cp = array('id'=>$row['charger_capability_id'],'is_deleted'=>'0'); //array for field of condition you need if any
                                                                                $row_cp = Selectdata('charger_capabilities', $fiel_cp, $con_cp);

                                                                                foreach ($row_cp as $ro_cp){ echo ucwords($ro_cp['name']); }
                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Connector Id :</td>
                                                                            <td><?php echo $row['connector_id'];?></td>
                                                                        </tr>
                                                                        <!--connector id-->
                                                                        <?php
                                                                        $conec=1;
                                                                        $fiel_con = ''; //array for field you need to fetch from table if any
                                                                        $con_con = array('charger_id'=>$row['id'],'is_deleted'=>'0'); //array for field of condition you need if any
                                                                        $ro_s = Selectdata('charger_connector', $fiel_con, $con_con);

                                                                        foreach ($ro_s as $row_s){ ?>
                                                                            <tr>
                                                                                <td>Connector <?=$conec++;?></td>
                                                                                <td><b>Connector Voltage:- </b><?=$row_s['connector_voltage'];?>,&nbsp;<b>Connector Amperage:- </b><?=$row_s['connector_amperage'];?></td>
                                                                            </tr>
                                                                            <?php
                                                                        } ?>

                                                                        </tbody>
                                                                    </table>
                                                            </td>
                                                        </tr>
                                                        <?php $i++;
                                                    }
                                                } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                    <div class="card-body table-border-style" style="font-weight: bolder;">
                                        <font color="#ffa600">* For Charging.</font><br/>
                                        <font color="#204406">* For Available.</font><br/>
                                        <font color="#909090">* For Unavialable.</font><br/>
                                        <font color="#c3150f">* For Faulty.</font><br/>
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
    function showDetails(num){
        var x = document.getElementById("evsediv"+num);
        if (x.style.display === "none") {
            $("#evsediv"+num).fadeIn('slow');
            // x.style.display = "table-row";
            document.getElementById(num).innerHTML='<img src="assets/images/details_close.png">';
            for(var i=1; i<=<?=$row['id'];?>; i++)
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