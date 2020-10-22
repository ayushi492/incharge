<?php
include('MainClass.php');

$av=0; //avialable charger
$uv=0; // unavialable charger
$chg=0;//chanrging
$fau=0; //faulted

$search['c.is_deleted'] = 0;
$charger = new FetchData();
$charger->set_where($search);

$charger->set_join('tbl_status_notification s','LEFT JOIN', 'c.charger_id = s.charger_id');


$querystring = array('c.charger_id','s.connector1_status','s.connector2_status');
$get_charger = $charger->fetch_data('charger c',$querystring);

$get_chargernum=mysqli_num_rows($get_charger);
if($get_chargernum>0)
{
    while($row=mysqli_fetch_array($get_charger))
    {
        if($row['connector1_status']=='Available')
        {   $av=$av+1; }
        elseif($row['connector1_status']=='Charging')
        {   $chg=$chg+1; }
        elseif($row['connector1_status']=='Unavailable')
        {   $uv=$uv+1; }
        elseif($row['connector1_status']=='Faulted')
        {  $fau=$fau+1; }
        else{
            $uv=$uv+1;
        }
    }
    $output[] = array("count" => $av,
        "status" => 'Available');
    $output[] = array("count" => $chg,
        "status" => 'Charging');
    $output[] = array("count" => $uv,
        "status" => 'Unavailable');
    $output[] = array("count" => $fau,
        "status" => 'Faulted');
}

echo json_encode($output);
