<?php
if (!isset($_SESSION['incharge_ovp'])) {
    header('location:login.php');
}
//function files
include('db1.php'); ?>
<style>
    /*style for calender datepicker*/
    .ui-datepicker {
        text-align: center;
    }

    .ui-datepicker-trigger {
        margin: 0 0 0 5px;
        vertical-align: text-top;
    }

    .ui-datepicker {
        font-family: Open Sans, Arial, sans-serif;
        margin-top: 2px;
        padding: 0 !important;
        border-color: #c9f0f5 !important;
    }

    .ui-datepicker {
        width: 256px;
    }

    .openemr-calendar .ui-datepicker {
        width: 191px;
    }

    .ui-datepicker table {
        width: 256px;
        table-layout: fixed;
        background:whitesmoke;
        border-radius: 11px;
    }

    .openemr-calendar .ui-datepicker table {
        width: 191px;
        table-layout: fixed;
    }

    .ui-datepicker-header {
        background-color: #3e9aba !important;
        background-image: none !important;
        border-radius: 0;
    }

    .openemr-calendar .ui-datepicker-header {
        background-color: #e6f7f9 !important;
        border-width: 1px;
        border-color: #c9f0f5;
        border-style: solid;
    }

    .ui-datepicker-title {
        line-height: 35px !important;
        margin: 0 10px !important;
    }

    .openemr-calendar .ui-datepicker-title {
        line-height: 20px !important;
    }

    .ui-datepicker-prev span {
        display: none !important;
    }

    .ui-datepicker-next {
        text-align: center;
    }

    .ui-datepicker-next span {
        display: none !important;
    }

    .ui-datepicker-prev {
        background-color: transparent !important;
        background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAcAAAAMCAYAAACulacQAAAAUklEQVQYlXWPwQnAMAwDj9IBOlpH8CjdJLNksuujFIJjC/w6WUioFBcqJ7sGEAD5Y/hpqLRghRv4YQlUjqXI3Kql2MixraGbEhVcDXcFUR/1egEHNuTBpFW0NgAAAABJRU5ErkJggg==') !important;
        height: 12px !important;
        width: 7px !important;
        margin: 14px 12px;
        display: inline-block;
        left: 0 !important;
        top: 0 !important;
        float:left;
    }

    .openemr-calendar .ui-datepicker-prev {
        background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAkAAAAOCAYAAAD9lDaoAAAAuUlEQVQokXXRsUtCYRAA8J8pDQ1CVIgIgtBU2NDiZIuDS4uLf6WDS1O0tLREEE8icBNKS3lTs8/B78XHw3dwcHA/juOuqjzucYJVrQQMcYctvo4OgEFIeMK6iPphCjzjEWLUC3vACx7yRo5uMUIFr5gii1EL41AvMIkBVPGH04DrSLEsIvjEOZq4wi9+iijDR0ANXOMbmxjlcIY2LtANO6YxymGCDs5wg/ciYv+KBJeY4+2A+Y9j4Y47RtUkrNXeDxUAAAAASUVORK5CYII=') !important;
        height: 14px !important;
        width: 9px !important;
        margin: 5px !important;
    }

    .ui-datepicker-next {
        cursor: pointer;
    }

    .ui-datepicker-prev {
        cursor: pointer;
    }

    .ui-datepicker-next {
        background-color: transparent !important;
        background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAMCAYAAABfnvydAAAAVUlEQVQYlXWQ0Q3AIAhEL07gKI7kKN2kI3Wk1w9to3KQEELucQEECOizhhTQGHFnwOdgobWx0GkZILfYBhXl0STVbPoBarbkL7ozN/F8VBBXh8uJgF5r2hrI4GHUkAAAAABJRU5ErkJggg==') !important;
        height: 12px !important;
        width: 8px !important;
        margin: 14px 12px;
        display: inline-block;
        right: 0 !important;
        top: 0 !important;
        float:right;
    }

    .openemr-calendar .ui-datepicker-next {
        background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAOCAYAAAASVl2WAAAAtElEQVQYlXXQsUpCcRQH4I97EQyHa1pgIEE0hBGYL+BjNLRFjxXh4rM4F21BS4S4FAgqQioOngt/RM/6+zi/w4EanlA4MDkecYsO3vG/D8a4Rx03eMMqBQt8oodTXAdalwBm+IpNDVxG3aYEMMU3ujjDBT5SAH9R2cE58mwPFOgneJSCGp7RjLoXTEtQjbCFOV7xCxkqdp9sYxnhpFyb4QFXdh8c4Cc9Ko++OwzjFwfn5FiwBVeuI/K2UCkSAAAAAElFTkSuQmCC') !important;
        height: 14px !important;
        width: 8px !important;
        margin: 5px;
    }

    .ui-datepicker-month {
        border-radius: 2px;
        /*background-color: #3985a0;*/
        width: 110px !important;
        height: 22px;
        font-family: Open Sans !important;
        color: #fff;
        font-size: 14px !important;
        font-weight: 600;
        text-align: left;
        border: none !important;
        margin-right: 17px !important;
        vertical-align: text-top;
    }

    .openemr-calendar .ui-datepicker-month {
        font-family: Open Sans, Arial, sans-serif;
        color: rgba(34, 34, 34, 0.87);
        font-size: 12px !important;
        font-weight: 700;
        text-align: center;
        transform: scaleX(1.0029)
    }

    .ui-datepicker-year {
        border-radius: 2px;
        /*background-color: #3985a0;*/
        width: 61px !important;
        height: 22px;
        border: none !important;
        font-family: Open Sans !important;
        color: #fff;
        font-size: 14px !important;
        font-weight: 600;
        text-align: left;
        vertical-align: text-top;
    }

    .openemr-calendar .ui-datepicker-year {
        font-family: Open Sans, Arial, sans-serif;
        color: rgba(34, 34, 34, 0.87);
        font-size: 12px !important;
        font-weight: 700;
        text-align: center;
        transform: scaleX(1.0029)
    }

    .ui-datepicker-month option,
    .ui-datepicker-year option {
        color: #3985a0 !important;
        background-color: #fff !important;
        font-family: Open Sans !important;
        font-size: 14px !important;
        font-weight: 600;
    }

    .ui-datepicker-month option[selected],
    .ui-datepicker-year option[selected] {
        background-color: #e5edf0 !important;
    }

    .ui-datepicker .ui-state-hover {
        /*background: none !important;*/
        border: 0 !important;
    }

    .ui-datepicker td {
        vertical-align: top;
    }

    .ui-datepicker .ui-state-default {
        border-radius: 2px;
        border-color: #edebeb !important;
        width: 120px;
        height: 32px;
        padding: 6px !important;
        line-height: 24px;
        text-align: center !important;
        font-family: Open Sans, Arial, sans-serif;
        color: #707070;
        font-size: 13px;
        font-weight: 400 !important;
        margin: 7px 0 0 4px;
        text-decoration: none;
        border-radius: 50%;
    }

    .ui-datepicker .ui-state-default.ui-state-highlight{
        border-color: #dcdcdc;
        background-color: #3e9aba !important;
        color: #dee1df !important;
    }

    .openemr-calendar .ui-state-default {
        font-size: 10px;
        margin: 0;
    }

    .ui-datepicker td {
        width: 33px;
    }

    .openemr-calendar .ui-datepicker td {
        width: 26px;
    }

    .openemr-calendar .ui-state-default {
        width: 26px;
        height: 20px;
        line-height: 20px;
    }
    .ui-state-default.ui-state-hover {
        border-color: #dcdcdc;
        background-color: #cff3f8 !important;
    }

    .ui-datepicker .ui-state-active {
        border-color: #dcdcdc;
        background-color: #cff3f8 !important;
        color: #3e9aba !important;
    }

    .ui-datepicker-calendar thead tr th {
        font-family: Open Sans, Arial, sans-serif;
        color: #549fa8;
        font-size: 12px;
        font-weight: 400;
        padding: 0.45em 0.3em !important;
        /*   width: 15px !important; */
    }

    .openemr-calendar .ui-datepicker-calendar thead tr th {
        font-size: 10px;
    }

    .ui-datepicker-close {
        display: none;
    }

    .ui-datepicker thead {
        background-color: #f5f5f5;
    }

    .openemr-calendar .ui-datepicker thead {
        background: none;
    }

    .ui-state-default.ui-datepicker-current {
        float: none !important;
        font-family: Open Sans, Arial, sans-serif;
        color: #fff;
        font-size: 14px;
        font-weight: 400;
        text-align: left;
        border-width: 0 !important;
        border: none;
        vertical-align: top;
        margin: 0 !important;
        background-color: transparent !important;
    }

    .ui-datepicker-buttonpane.ui-widget-content {
        text-align: center;
        background-color: #3e9aba;
        margin: 0 !important;
        height: 28px;
        padding: 0 !important;
    }

    .openemr-calendar .ui-datepicker-year {
        background-color: transparent;
    }

    .openemr-calendar .ui-datepicker-month {
        background-color: transparent;
    }

    .openemr-calendar .ui-state-default {
        border: 0 !important;
    }

    .openemr-calendar .ui-datepicker-month {
        margin-right: 10px !important;
    }
</style>
<!--End of datepicker style-->
<!--form section starts-->
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
                                            <h5 class="m-b-10">Add Charger
                                            </h5>
                                        </div>
                                        <!--breadcrumb-->
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#">Add Charger</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <!--<h5>Add</h5>
                                        <hr>-->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!--form starts-->
                                                <?php
                                                //                                                print_r($_POST);
                                                //                                                print_r($_SESSION);
                                                if(isset($_SESSION['error'])) {
                                                    echo "<div class='col-md-4 alert alert-danger' style='font-weight: 900;font-size: 16px;'>" . $_SESSION['error'] . "</div>";
                                                    unset($_SESSION['error']);
                                                }
                                                ?>
                                                <form method="post" name="form" id="form" action="addcharge.php"><!--addcharge.php action page-->
                                                    <!--first half of the form left side-->
                                                    <div class="col-md-6" style="float: left">
                                                        <div class="form-group">
                                                            <label>Charger Id</label>
                                                            <input type="text" class="form-control" name="charger_id" placeholder="Charger Id" value="<?php if(isset($_POST['charger_id'])){ echo $_POST['charger_id']; }?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Installed Date</label>
                                                            <input type="text" class="dateselect form-control" id="email" name="install_date" placeholder="Installed Date" value="<?php if(isset($_POST['install_date'])){ echo $_POST['install_date']; }?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Latitude</label>
                                                            <input type="text" class="form-control" id="password" name="latitude" placeholder="Latitude" value="<?php if(isset($_POST['latitude'])){ echo $_POST['latitude']; }?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Site</label>
                                                            <!--fetch from evse_sites table-->
                                                            <?php
                                                            $field=array('id','site_name'); //array for field you need to fetch from table if any
                                                            $conkey=array('is_deleted'); //array for field of condition you need if any
                                                            $conval=array('0'); //array for value of condition you need if any
                                                            $row=Selectdata('tbl_sites',$field,$conkey,$conval);
                                                            ?>
                                                            <select name="site_id" class="form-control" required>
                                                                <option value="">Select Site</option>
                                                                <?php
                                                                foreach ($row as $val)
                                                                {
                                                                    echo"<option value='".$val['id']."'";if (isset($_POST['site_id'])) { if($_POST['site_id']==$val['id']){ echo"Selected"; } } echo">".ucwords($val['site_name'])."</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Connector Type</label>
                                                            <select name="connector_type" class="form-control" onchange="conectype()" id="conn_type" required>
                                                                <option value="">Select Connector Type</option>
                                                                <option value='AC' <?php if(isset($_POST['connector_type'])){ if($_POST['connector_type']=='AC'){ echo"Selected"; } }?>>AC</option>
                                                                <option value='DC' <?php if(isset($_POST['connector_type'])){ if($_POST['connector_type']=='DC'){ echo"Selected"; } }?>>DC</option>
                                                            </select>
                                                        </div>
                                                        <!--                                                        Charger Capabilities-->
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
                                                                    echo"<option value='".$val['id']."'";if (isset($_POST['charger_capability_id'])) { if($_POST['charger_capability_id']==$val['id']){ echo"Selected"; } } echo">".ucwords($val['name'])."</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
<!--                                                        <div class="form-group">-->
<!--                                                            <label>Activate</label>-->
<!--                                                            <span style="display:flex;">-->
<!--                                                                    <input type="hidden" name="activate" value="0"/>-->
<!--                                                                     <input type="checkbox" --><?php //if(isset($_POST['activate'])){ if($_POST['activate']=='1'){ echo "checked";}} ?><!-- class="form-control" name="activate" style="width:12px;margin: 0 10px 0 0;" value="1">-->
<!--                                                                    <label>Yes</label>-->
<!--                                                                </span>-->
<!--                                                        </div>-->
                                                        <div class="form-group">
                                                            <label>Connector ID</label>
                                                            <input type="text" class="form-control" name="connector_id" placeholder="Connector ID" value="<?php if(isset($_POST['connector_id'])){ echo $_POST['connector_id']; }?>" required>
                                                        </div>
                                                    </div>
                                                    <!--second half of the form right side-->
                                                    <div class="col-md-6" style="float:right">
                                                        <div class="form-group">
                                                            <label>OCPP Chargebox ID</label>
                                                            <input type="text" class="form-control" name="ocpp_cb_id" placeholder="OCPP Chargebox ID" required value="<?php if(isset($_POST['ocpp_cb_id'])){ echo $_POST['ocpp_cb_id']; }?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Station ID</label>
                                                            <input type="text" class="form-control" name="station_id" placeholder="Station ID" required value="<?php if(isset($_POST['station_id'])){ echo $_POST['station_id']; }?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Longitude</label>
                                                            <input type="text" class="form-control" name="longitude" placeholder="Longitude" value="<?php if(isset($_POST['longitude'])){ echo $_POST['longitude']; }?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Charge Group</label>
                                                            <!--fetch from evse_groups table-->
                                                            <?php
                                                            $field1=array('id','group_name'); //array for field you need to fetch from table if any
                                                            $conkey1=array('is_deleted'); //array for field of condition you need if any
                                                            $conval1=array('0'); //array for value of condition you need if any
                                                            $row1=Selectdata('tbl_site_groups',$field1,$conkey1,$conval1);
                                                            ?>
                                                            <select name="chargegroup_id" class="form-control" required>
                                                                <option value="">Select Charge Group</option>
                                                                <?php
                                                                foreach ($row1 as $val)
                                                                {
                                                                    echo"<option value='".$val['id']."'";if (isset($_POST['chargegroup_id'])) { if($_POST['chargegroup_id']==$val['id']){ echo Selected; } } echo">".ucwords($val['group_name'])."</option>";
                                                                } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Connector Category <span id="conn_of"><?php if(isset($_POST['connector_type'])){ echo $_POST['connector_type']; }?></span></label>
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
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Charger Floor</label>
                                                            <input type="text" class="form-control" name="charger_floor" placeholder="Charger Floor" value="<?php if(isset($_POST['charger_floor'])){ echo $_POST['charger_floor']; }?>" required>
                                                        </div>

                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-6">
                                                        <input type="submit" class="btn btn-primary" name="sub" value="Add">
                                                        <!-- need to send it in dashboard-->
                                                        <input type="reset" class="btn btn-primary" value="Cancel">
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
</html>
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