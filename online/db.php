<?php
//insert function
function Insertdata($table,$field,$data)
{
    include('config.php');

    //field name array for insertion
    $field_values= implode(",",$field);
    //values array for insertion
    $data_values=implode(",",$data);

    $sql= "INSERT INTO $table (".$field_values.") VALUES (".$data_values.")"; // query
    $result=mysqli_query($con,$sql)or die(mysqli_error($con)); //query execution
    if($result){ return 1; }
}

//update
function Updatedata($table,$field,$data,$conkey,$conval)
{
    include('config.php');
    $j=1;
    //query string starts
    $ssql="UPDATE $table SET ";
    for($i=0;$i<count($field); $i++)
    {
        //set of field=value for update
        $ssql.=$field[$i]."=".$data[$i];
        if($j < count($field))
        {
            $ssql.=", ";
        }
        $j++;
    }
    // if the contion exist
    if($conkey!='')
    {
        //if there is more than 1 where clause
        if(count($conkey)>1)
        {
            $ssql.=' WHERE ';
            $k=1;
            for($i=0;$i<count($conkey); $i++)
            {
                $ssql.=$conkey[$i]."=".$conval[$i];
                if($k<count($conkey))
                {
                    $ssql.=' and ';
                }
                $k++;
            }
        }
        //if only one where clause
        else {
            $ssql .= ' WHERE '.$conkey[0].'='.$conval[0];
        }
    }
    //query execution
    $result=mysqli_query($con,$ssql)or die(mysqli_error($con));
    if($result){ return 1; }
}

//Setjoin
function Setjoin($fields,$table,$join_type,$joincondition)
{
    $join.='';
    print_r($table);
    if($fields!='')
    {
        $join.=implode(", ",$fields);
    }
    if($table!='')
    {
        $join.=implode(", ",)
    }
    echo $join;
}

//select
function Selectdata($table,$field,$conkey)//$conval
{
    include('config.php');

    //query string
    $sql="SELECT ";

    //if any specific field need to select
    if ($field != '')
    {
        $field_values= implode(", ",$field);
        $sql.=mysqli_real_escape_string($con,$field_values);
    }
    else{
        $sql.="* ";
    }
    $sql.=" FROM `".mysqli_real_escape_string($con,$table)."`";

    //Conditoon if any
    if($conkey!='') {
        $l=1;
        $sql.=" Where ";
        foreach ($conkey as $cond => $cond_val)
        {
            $sql.="`".mysqli_real_escape_string($con,$cond)."` = '".mysqli_real_escape_string($con,$cond_val)."'";
            if($l<count($conkey))
            {
                $sql.=' AND ';
            }
            $l++;
        }
    }
    $mysql=mysqli_query($con,$sql) or die(mysqli_query($con));
    if(mysqli_num_rows($mysql)>0)
    {
        $result=mysqli_fetch_all($mysql, MYSQLI_ASSOC);
        return $result;
    }
    else{
        return 0;
    }
}
?>