<?php
//Code for View Site
if(isset($_GET['action']) && $_GET['action']='view_site')
{
    $site = new FetchData();
    $search = array(); $Filters = '';
    if(isset($_REQUEST['search']))
    {
        #SEARCH CODE
        $Filters.="&search=".$_REQUEST['search'];
        if($_REQUEST['site_group']!="")
        {
            $search['site_group'] = trim($_REQUEST['site_group']);
            $Filters.="&site_group=".$_REQUEST['site_group'];
        }
        if($_REQUEST['site_name']!="")
        {
            $search['site_name'] = trim($_REQUEST['site_name']);
            $Filters.="&site_name=".$_REQUEST['site_name'];
        }

        if($_REQUEST['address']!="")
        {
            $search['address'] = trim($_REQUEST['address']);
            $Filters.="&address=".$_REQUEST['address'];
        }

        if($_REQUEST['latitude']!="")
        {
            $search['latitude'] = trim($_REQUEST['latitude']);
            $Filters.="&latitude=".$_REQUEST['latitude'];
        }

        if($_REQUEST['longitude']!="")
        {
            $search['longitude'] = trim($_REQUEST['longitude']);
            $Filters.="&longitude=".$_REQUEST['longitude'];
        }

        if($_REQUEST['timezone']!="")
        {
            $search['timezone'] = trim($_REQUEST['timezone']);
            $Filters.="&timezone=".$_REQUEST['timezone'];
        }
    }

    #SET WHERE CONDITIONS.
    $site->set_where_like($search);
    $site->set_where(array('is_deleted'=>0));

    #QUERY FOR PAGINATION
    $total_pages = $site->total_count('tbl_sites');

    $limit = 20;
    $stages = 3;

    $page = isset($_GET['page'])?$_GET['page']:1;
    if($page){
        $start = ($page - 1) * $limit;
    }else{
        $start = 0;
    }

    #GET RECORD
    $fetchClms = array('id','site_name','site_group','site_code','address','city','state','zip','country','latitude','longitude','timezone','utility_transformer_capacity','utility_service_capacity','utility_name','meter_number','account_number');
    $GetDetail = $site->fetch_data('tbl_sites',$fetchClms,$limit,$start);



    if(isset($_REQUEST['manage_site']))
    {

        $clms = implode(',',array_keys($_POST));
        $clms = preg_replace('/,selected_clm/','',$clms);
        $check = mysqli_query($con,"SELECT id from tbl_manage_column WHERE page_name = 'view_site'");
        if(mysqli_num_rows($check) > 0)
        {
            mysqli_query($con,"UPDATE tbl_manage_column SET columns = '".mysqli_real_escape_string($con,$clms)."' WHERE page_name = 'view_site'");
        }
        else
        {
            mysqli_query($con,"INSERT INTO tbl_manage_column (page_name, columns) VALUE('view_site','".mysqli_real_escape_string($con,$clms)."')");
        }
    }

    $SelClmSql = mysqli_query($con,"SELECT columns from tbl_manage_column WHERE page_name = 'view_site'");
    if(mysqli_num_rows($SelClmSql) > 0)
    {
        $SelClmRow = mysqli_fetch_assoc($SelClmSql);
        $SelClms = explode(',',$SelClmRow['columns']);
    }

}
//End Code for View Site


//Code for Add Site
if(isset($_GET['action']) && $_GET['action']='add_site')
{
    if (isset($_REQUEST['add_site']))
    {
        function random_code()
        {
            return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 5);
        }

        $site_name = trim($_REQUEST['site_name']);
        $site_group = trim($_REQUEST['site_group']);
        $error = 0;
        if($site_name == '')
        {

            $error = "Site Name are required field";

        }

        if($error == 0)
        {

            $site_code = '';
            while(1){
                $site_code = random_code();
                $checkCode = mysqli_query($con, "SELECT id FROM tbl_sites WHERE site_code = '".mysqli_real_escape_string($con,$site_code)."'");
                if(mysqli_num_rows($checkCode) == 0){
                    break;
                }
            }



            $CheckSiteName=mysqli_query($con,"select * from tbl_sites where site_name='".mysqli_real_escape_string($con,$site_name)."'");
            //$num = mysqli_num_rows($CheckSiteName);

            //if($num == 0)
            //{

            if(trim($_REQUEST['latitude']) == ''){
                $address = trim($_REQUEST['address']).",".trim($_REQUEST['city']).",".trim($_REQUEST['state']).",".trim($_REQUEST['zip']).",".trim($_REQUEST['country']);
                $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false&key=AIzaSyDmwKsMsPiu0rBvEYQeJjbpDSRVU5LXY3g');
                // Convert the JSON to an array
                $geo = json_decode($geo, true);
                if ($geo['status'] == 'OK') {
                    // Get Lat & Long
                    $_REQUEST['latitude'] = $geo['results'][0]['geometry']['location']['lat'];
                    $_REQUEST['longitude'] = $geo['results'][0]['geometry']['location']['lng'];
                    //echo $_REQUEST['latitude']."==".$_REQUEST['longitude'];exit;
                }
            }

            mysqli_query($con,"INSERT INTO `tbl_sites` (`site_name`, `site_group`, site_code, address, city, state, zip, country, latitude, longitude, timezone, utility_transformer_capacity, utility_service_capacity, utility_name, meter_number,account_number) VALUES ('".mysqli_real_escape_string($con,$site_name)."','".mysqli_real_escape_string($con,$site_group)."','".mysqli_real_escape_string($con,$site_code)."','".mysqli_real_escape_string($con,$_REQUEST['address'])."','".mysqli_real_escape_string($con,$_REQUEST['city'])."','".mysqli_real_escape_string($con,$_REQUEST['state'])."','".mysqli_real_escape_string($con,$_REQUEST['zip'])."','".mysqli_real_escape_string($con,$_REQUEST['country'])."','".mysqli_real_escape_string($con,$_REQUEST['latitude'])."','".mysqli_real_escape_string($con,$_REQUEST['longitude'])."','".mysqli_real_escape_string($con,$_REQUEST['timezone'])."','".mysqli_real_escape_string($con,$_REQUEST['utility_transformer_capacity'])."','".mysqli_real_escape_string($con,$_REQUEST['utility_service_capacity'])."','".mysqli_real_escape_string($con,$_REQUEST['utility_name'])."','".mysqli_real_escape_string($con,$_REQUEST['meter_number'])."','".mysqli_real_escape_string($con,$_REQUEST['account_number'])."')");
            //exit();

            $id =  mysqli_insert_id($con);
            if($_REQUEST['slots'] != ""){
                $num = $_REQUEST['slots'];
                for($i = 1; $i<=$num; $i++){
                    $slot_n = $_REQUEST['slot_'.$i];
                    $slot_d = $_REQUEST['slot_desc_'.$i];
                    mysqli_query($con,"INSERT INTO site_slots (site_id, slot, description) VALUES ('".$id."','".mysqli_real_escape_string($con,$slot_n)."','".mysqli_real_escape_string($con,$slot_d)."')");
                }
            }
            header("Location:index.php?action=view_sites&a=1");

        }

    }
}
//End Code for Add Site

//Code for Edit Site
if(isset($_GET['action']) && $_GET['action']='edit_site')
{
    $siteEdit1 = new FetchData();
    $siteEdit1->set_where(array('id'=>$_REQUEST['id']));
    $fetchClms = array('id','site_name','site_group','site_code','address','city','state','zip','country','latitude','longitude','timezone','utility_transformer_capacity','utility_service_capacity','utility_name','meter_number','account_number');
    $sitesql = $siteEdit1->fetch_data('tbl_sites',$fetchClms);



    if (isset($_REQUEST['edit_site']))
    {
        function random_code()
        {
            return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 5);
        }

        $updated_date=date('Y-m-d h:i:s');

        $site_name = trim($_REQUEST['site_name']);
        $site_group = trim($_REQUEST['site_group']);

        $error = 0;

        if($site_name == ''){  //if($site_name == '' || $site_group == '')      edited on 4-9-2020

            $error = "Site Name are required fields";

        }

        if($error == 0)
        {
            $site_code = $_REQUEST['site_code'];
            if($site_code == ''){
                while(1){
                    $site_code = random_code();
                    $checkCode = mysqli_query($con, "SELECT id FROM tbl_sites WHERE site_code = '".mysqli_real_escape_string($con,$site_code)."'");
                    if(mysqli_num_rows($checkCode) == 0){
                        break;
                    }
                }
            }

            $Checksitename=mysqli_query($con,"select * from tbl_sites where site_name='".mysqli_real_escape_string($con,$site_name)."' and id !='".mysqli_real_escape_string($con,$_REQUEST['id'])."'");
            $num = mysqli_num_rows($Checksitename);

            //if($num == 0)
            //{

            //if(trim($_REQUEST['latitude']) == ''){
            $address = trim($_REQUEST['address']).",".trim($_REQUEST['city']).",".trim($_REQUEST['state']).",".trim($_REQUEST['zip']).",".trim($_REQUEST['country']);
            $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false&key=AIzaSyDmwKsMsPiu0rBvEYQeJjbpDSRVU5LXY3g');
            // Convert the JSON to an array
            $geo = json_decode($geo, true);
            if ($geo['status'] == 'OK') {
                // Get Lat & Long
                $_REQUEST['latitude'] = $geo['results'][0]['geometry']['location']['lat'];
                $_REQUEST['longitude'] = $geo['results'][0]['geometry']['location']['lng'];
                //exit();
                //echo $_REQUEST['latitude']."==".$_REQUEST['longitude'];exit;
            }
            //}

            mysqli_query($con,"UPDATE `tbl_sites` SET `site_code`='".mysqli_real_escape_string($con,$site_code)."',`site_name`='".mysqli_real_escape_string($con,$site_name)."',`site_group`='".mysqli_real_escape_string($con,$site_group)."',`address`='".mysqli_real_escape_string($con,$_REQUEST['address'])."',`city`='".mysqli_real_escape_string($con,$_REQUEST['city'])."',`state`='".mysqli_real_escape_string($con,$_REQUEST['state'])."',`zip`='".mysqli_real_escape_string($con,$_REQUEST['zip'])."',`country`='".mysqli_real_escape_string($con,$_REQUEST['country'])."',`latitude`='".mysqli_real_escape_string($con,$_REQUEST['latitude'])."',`longitude`='".mysqli_real_escape_string($con,$_REQUEST['longitude'])."',`timezone`='".mysqli_real_escape_string($con,$_REQUEST['timezone'])."',`utility_service_capacity`='".mysqli_real_escape_string($con,$_REQUEST['utility_service_capacity'])."',`utility_transformer_capacity`='".mysqli_real_escape_string($con,$_REQUEST['utility_transformer_capacity'])."',`utility_name`='".mysqli_real_escape_string($con,$_REQUEST['utility_name'])."',`meter_number`='".mysqli_real_escape_string($con,$_REQUEST['meter_number'])."',`account_number`='".mysqli_real_escape_string($con,$_REQUEST['account_number'])."',`updated_date`='".mysqli_real_escape_string($con,$updated_date)."' WHERE `id`='".mysqli_real_escape_string($con,$_REQUEST['id'])."'"
            );
            //exit();

            if($_REQUEST['slots'] != ""){
                mysqli_query($con,"DELETE FROM site_slots WHERE site_id = '".mysqli_real_escape_string($con,$_GET['id'])."'");
                $num = $_REQUEST['slots'];
                $id = $_GET['id'];
                for($i = 1; $i<=$num; $i++){
                    $slot_n = $_REQUEST['slot_'.$i];
                    $slot_d = $_REQUEST['slot_desc_'.$i];
                    $slot_dl = $_REQUEST['slot_dialog_'.$i];
                    mysqli_query($con,"INSERT INTO site_slots (site_id, slot, description, dialog) VALUES ('".$id."','".mysqli_real_escape_string($con,$slot_n)."','".mysqli_real_escape_string($con,$slot_d)."','".mysqli_real_escape_string($con,$slot_dl)."')");
                }
            }

            header("Location:index.php?action=view_sites&u=1");

        }

    }
}
//End Code for Edit Site


//Code for View Site Group
if(isset($_GET['action']) && $_GET['action']='view_site_group')
{
    $sitegroup = new FetchData();

    #SET WHERE CONDITIONS.
    //$site->set_where_like($search);
    $sitegroup->set_where(array('is_deleted'=>0));

    #QUERY FOR PAGINATION
    $total_pages = $sitegroup->total_count('tbl_site_groups');

    $limit = 20;
    $stages = 3;

    $page = isset($_GET['page'])?$_GET['page']:1;
    if($page){
        $start = ($page - 1) * $limit;
    }else{
        $start = 0;
    }

    #GET RECORD
    $fetchClms = array('id','division','group_name');
    $GetDetail1 = $sitegroup->fetch_data('tbl_site_groups',$fetchClms,$limit,$start);
}

//End Code for View Site Group

//Code for Add Site Group

if(isset($_GET['action']) && $_GET['action']='add_site_group')
{
    if(isset($_REQUEST['add_group']))
    {
        $group_name = trim($_REQUEST['group_name']);

        $division = trim($_REQUEST['division']);
        /*if(count($_REQUEST['division']) > 0)
        {
             $division = "'".implode("','",$_REQUEST['division'])."'";
        }*/

        $CheckEVSEGroup=mysqli_query($con,"select * from tbl_site_groups where group_name='".mysqli_real_escape_string($con,$group_name)."'");
        $num = mysqli_num_rows($CheckEVSEGroup);

        if($num == 0)
        {
            mysqli_query($con,"INSERT INTO `tbl_site_groups` (`group_name`,`division`)VALUES('".mysqli_real_escape_string($con,$group_name)."','".mysqli_real_escape_string($con,$division)."')");

            header("Location:index.php?action=view_site_group&a=1");
        }
    }
}
//End Code for Site Group

//Code for Edit Site Group

if(isset($_GET['action']) && $_GET['action']='edit_site_group')
{
    $siteEditgrp = new FetchData();
    $siteEditgrp->set_where(array('id'=>$_REQUEST['id']));
    $sitegrpsql = $siteEditgrp->fetch_data('tbl_site_groups',array('id','group_name','division'));


    if(isset($_REQUEST['edit_group']))
    {
        $group_name = trim($_REQUEST['group_name']);
        $division = trim($_REQUEST['division']);

        mysqli_query($con,"UPDATE tbl_site_groups SET group_name='".mysqli_real_escape_string($con,$group_name)."', division='".mysqli_real_escape_string($con,$division)."' WHERE id='".mysqli_real_escape_string($con,$_REQUEST['id'])."'");
        //exit();

        header("Location: index.php?action=view_site_group&u=1");
    }
}

//End Code for Edit Site Group

//Code for View Site Division
if(isset($_GET['action']) && $_GET['action']='view_site_division')
{
    $sitedivision = new FetchData();

    #SET WHERE CONDITIONS.
    //$site->set_where_like($search);
    $sitedivision->set_where(array('is_deleted'=>0));

    #QUERY FOR PAGINATION
    $total_pages = $sitedivision->total_count('tbl_site_division');

    $limit = 20;
    $stages = 3;

    $page = isset($_GET['page'])?$_GET['page']:1;
    if($page){
        $start = ($page - 1) * $limit;
    }else{
        $start = 0;
    }

    #GET RECORD
    $fetchClms = array('id','division','region');
    $GetDetail2 = $sitedivision->fetch_data('tbl_site_division',$fetchClms,$limit,$start);
}

//End Code for View Site Division

//Code for Add Site Division

if(isset($_GET['action']) && $_GET['action']='add_site_division')
{
    if(isset($_REQUEST['add_division']))
    {
        $division = trim($_REQUEST['division']);
        $region = trim($_REQUEST['region']);

        mysqli_query($con,"INSERT INTO tbl_site_division (division,region) VALUES ('".mysqli_real_escape_string($con,$division)."','".mysqli_real_escape_string($con,$region)."')");

        header("Location: index.php?action=view_site_division&a=1");
    }
}
//End Code for Add Site Division

//Code for Edit Site Division

if(isset($_GET['action']) && $_GET['action']='edit_site_division')
{
    $siteEditdiv = new FetchData();
    $siteEditdiv->set_where(array('id'=>$_REQUEST['id']));
    $sitedivsql = $siteEditdiv->fetch_data('tbl_site_division',array('id','division','region'));


    if(isset($_REQUEST['edit_division']))
    {
        $region = trim($_REQUEST['region']);
        $division = trim($_REQUEST['division']);

        mysqli_query($con,"UPDATE tbl_site_division SET division='".mysqli_real_escape_string($con,$division)."', region='".mysqli_real_escape_string($con,$region)."' WHERE id='".mysqli_real_escape_string($con,$_REQUEST['id'])."'");
        //exit();

        header("Location: index.php?action=view_site_division&u=1");
    }
}
//End Code for Edit Site Division

//Code for View Site Region

if(isset($_GET['action']) && $_GET['action']='view_site_region')
{
    $siteregion = new FetchData();

    #SET WHERE CONDITIONS.
    //$site->set_where_like($search);
    $siteregion->set_where(array('is_deleted'=>0));

    #QUERY FOR PAGINATION
    $total_pages = $siteregion->total_count('tbl_site_region');

    $limit = 20;
    $stages = 3;

    $page = isset($_GET['page'])?$_GET['page']:1;
    if($page){
        $start = ($page - 1) * $limit;
    }else{
        $start = 0;
    }

    #GET RECORD
    $fetchClms = array('id','region','description');
    $GetDetail3 = $siteregion->fetch_data('tbl_site_region',$fetchClms,$limit,$start);
}

//End Code for View Site Region

//Code for Add Site Region

if(isset($_GET['action']) && $_GET['action']='add_site_region')
{
    if(isset($_REQUEST['add_region']))
    {
        $region = trim($_REQUEST['region']);
        $description = trim($_REQUEST['description']);

        mysqli_query($con,"INSERT INTO tbl_site_region (region,description) VALUES ('".mysqli_real_escape_string($con,$region)."','".mysqli_real_escape_string($con,$description)."')");

        header("Location: index.php?action=view_site_region&a=1");
    }
}

//End Code for Add Site Region


//Code for Edit Site Region

if(isset($_GET['action']) && $_GET['action']='edit_site_region')
{
    $siteEditreg = new FetchData();
    $siteEditreg->set_where(array('id'=>$_REQUEST['id']));
    $siteregsql = $siteEditreg->fetch_data('tbl_site_region',array('id','region','description'));


    if(isset($_REQUEST['edit_region']))
    {
        $region = trim($_REQUEST['region']);
        $description = trim($_REQUEST['description']);

        mysqli_query($con,"UPDATE tbl_site_region SET region='".mysqli_real_escape_string($con,$region)."',description='".mysqli_real_escape_string($con,$description)."' WHERE id='".mysqli_real_escape_string($con,$_REQUEST['id'])."'");
        //exit();

        header("Location: index.php?action=view_site_region&u=1");
    }
}
//End Code for Edit Site Region


//Code for View Charger
if(isset($_GET['action']) && $_GET['action']='view_charger')
{
    if(isset($_REQUEST['manage_charger']))
    {

        $clms1 = implode(',',array_keys($_POST));
        $clms1 = preg_replace('/,selected_clm/','',$clms1);
        $check1 = mysqli_query($con,"SELECT id from tbl_manage_column WHERE page_name = 'view_charger'");
        if(mysqli_num_rows($check1) > 0)
        {
            mysqli_query($con,"UPDATE tbl_manage_column SET columns = '".mysqli_real_escape_string($con,$clms1)."' WHERE page_name = 'view_charger'");
        }
        else
        {
            mysqli_query($con,"INSERT INTO tbl_manage_column (page_name, columns) VALUE('view_charger','".mysqli_real_escape_string($con,$clms1)."')");
        }
    }

    $SelClmSql1 = mysqli_query($con,"SELECT columns from tbl_manage_column WHERE page_name = 'view_charger'");
    if(mysqli_num_rows($SelClmSql1) > 0)
    {
        $SelClmRow1 = mysqli_fetch_assoc($SelClmSql1);
        $SelClms1 = explode(',',$SelClmRow1['columns']);
    }
}
//End Code for View Charger
?>