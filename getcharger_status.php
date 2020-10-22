<?php
include('MainClass.php');

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
        $output[] = array("id" => $row['charger_id'],
            "status" => $row['connector1_status']);
    }
}

echo json_encode($output);
