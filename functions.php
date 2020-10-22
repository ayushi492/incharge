<?php
error_reporting(0);
include('config.php');

function SelectQuery($tbl_name,$param,$orderby,$con)
{
    $cnt='';
    $fields='';
    $feild_value='';
    foreach($param as $key => $value)
    {
        $cnt++;
        if($cnt==1)
        {
            $fields.="`".$key."`"."="."'".$value."'" ;
        }
        else
        {
            $feild_value.=" AND `".$key."`='".$value."'";
        }
    }
    if($orderby!="")
    {
        $query=mysqli_query($con,"SELECT * FROM " .$tbl_name ." WHERE ".$fields .$feild_value ." ORDER BY ". $orderby);
    }
    else
    {
        $query=mysqli_query($con,"SELECT * FROM " .$tbl_name ." WHERE ".$fields .$feild_value);
    }

    return($query);
}




//Edit Site

//End Edit Site


//Add Group

//End Add Group

//Edit Site Group

//End Edit site Group

//Add Division

//End Add Division

//Edit Site Division

//End Edit site Division


//Add Site Region

//End Add Site Region

//Edit Site Region

//End Edit site Region
?>