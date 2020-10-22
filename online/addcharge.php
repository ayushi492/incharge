<?php

include('config.php'); //connection file
include('db.php'); //function file for database queries
//print_r($_POST);

//insert data in database
if(isset($_POST['sub']))
{
    $eror=0;
    //validation
    //print_r($_POST);
    //table name
    $table=mysqli_real_escape_string($con,'charger');

    //validation
    foreach($_POST as $key => $val) {
        if($key!='sub')
        {
            // if any required feild empty
            if($val=='')
            {
                $eror=1;
                session_start();
                $_SESSION['error']="Please fill all Entries";
                echo"<script>window.history.back();</script>>";
                //header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    //if no error then
    if($eror==0) {
        foreach ($_POST as $key => $val) {
            if ($key != 'sub') {
                //field array for databses
                $field[] = mysqli_real_escape_string($con, $key);
                //vales for the fields
                $value = mysqli_real_escape_string($con, $val);
                $data[] = "'$value'";
            }
        }
        //call of function for insterion
        // $table for tablename, $field for table columns and $data for values to be inserted
        $result = Insertdata($table, $field, $data);
        if ($result == 1) {
            echo "<script type='text/javascript'>alert('Charger Added');window.location.href='index.php?action=view_charger';</script>";
        }
    }
}

//update data
if(isset($_POST['update'])) {
    //table name
    $table = mysqli_real_escape_string($con,'charger');

    $eror=0;
    //validation
    foreach($_POST as $key => $val) {
        if($key!='update')
        {
            // if any required feild empty
            if($val=='')
            {
                $eror=1;
                session_start();
                $_SESSION['error']="Please fill all Entries";
                echo"<script>window.history.back();</script>>";
                //header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    //if no error then
    if($eror==0){

        //condition array declaration for database
        $conkey = array();

        //condition values array declaration for the fields
        $conval = array();

        foreach ($_POST as $key => $val) {
            //setting up the fields which need to update exclude the condition variables
            if ($key != 'update' && $key != 'id') {
                $field[] = $key; // fields array
                $data[] = "'$val'"; // values for the fields array
            }
            //setting up the fields and values for conditions if any
            if ($key == 'id') {
                $conkey[] = $key; //fields for condition array
                $conval[] = "'$val'"; // values for the fields array
            }
        }
        // call of the update function
        $result = Updatedata($table, $field, $data, $conkey, $conval);
        if ($result == 1) {
            echo "<script type='text/javascript'>alert('Charger Updated');window.location.href='index.php?action=view_charger';</script>";
        }
    }

}
