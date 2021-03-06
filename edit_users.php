<?php
if (!isset($_SESSION['incharge_ovp']))
{
    header('location:login.php');
}
?>
<style>
    /* The message box is shown when the user clicks on the password field */
    h3 {
        font-size: 17px;
    }
    #message {
        display:none;
        background: #f1f1f1;
        color: #000;
        position: relative;
        padding: 16px;
        margin-top: 0px;
        border: 1px solid #000;
        border-bottom-left-radius: 38px;
        border-bottom-right-radius: 38px
    }

    #message p {
        padding: 0px 53px;
        font-size: 18px;
    }

    /* Add a green text color and a checkmark when the requirements are right */
    .valid {
        color: green;
    }

    .valid:before {
        position: relative;
        left: -35px;
        content: "\2713";
    }

    /* Add a red text color and an "x" when the requirements are wrong */
    .invalid {
        color: red;
    }

    .invalid:before {
        position: relative;
        left: -35px;
        content: "X ";
    }
</style>
<div class="pcoded-main-container">
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
                                            <h5 class="m-b-10">Edit User</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#">Edit User</a></li>
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
                                        //fetch data from user and permission table
                                        $user_t = new FetchData();
                                        $user_t->set_where(array('is_deleted' => 0));
                                        $user_t->set_join('tbl_user_manage tb','LEFT JOIN', 'tb.username = c.username');
                                        $querystring = array('tb.*','c.*');
                                        $usertsql = $user_t->fetch_data('tbl_user c',$querystring);
                                        if ($get_chargernum=mysqli_num_rows($usertsql)) {
                                            while($row = mysqli_fetch_assoc($usertsql))
                                            {
                                                if($row['id']==$_REQUEST['id'])
                                                {
                                                    $rows=$row;
                                                }
                                            }
                                        }

                                        //if update user form submitted
                                        if(isset($_POST['add_user']))
                                        {
                                            $error=''; $ferror='';
                                           // print_r($_POST);
                                            foreach ($_POST as $k =>$val)
                                            {
                                                //check the email validation
                                                if($k=='email')
                                                {
                                                    if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $val))
                                                    {
                                                        $error='Please Fill A Valid Email Id';
                                                    }
                                                }
                                                //check the mobile number validation
                                                if($k=='mobile')
                                                {
                                                    if(strlen($val)!=10 || !is_numeric($val))
                                                    {
                                                        $error='Please Fill A Valid Mobile Number';
                                                    }
                                                }
                                                // make array for user table updted
                                                if($k!='add_user'&& ($k=='name' || $k =='username' || $k=='mobile' || $k=='email' || $k=='password') ){
                                                    if($val!='') { $params[$k] = $val; }
                                                    //if any feild is empty
                                                    else{ $error='Please Fill All Fields'; }
                                                }
                                            }

                                            //check the user already exist
                                            if($error=='') {
                                                $user_name = preg_replace('/\s/', '',trim($_REQUEST['username']));
                                                $user = new FetchData();
                                                $user->set_where(array('is_deleted' => 0, 'username' => $user_name));
                                                $user->set_notwhere(array('id' => $_REQUEST['id']));
                                                $userFind = $user->fetch_data('tbl_user', array('id'));
                                                if (mysqli_num_rows($userFind) > 0) {
                                                    $ferror="This User Is Already Added";
                                                }
                                                else {
                                                    // check password validation
                                                    $pass=trim($_REQUEST['password']);
                                                    $ucl = preg_match('/[A-Z]/', $pass); // Uppercase Letter
                                                    $lcl = preg_match('/[a-z]/', $pass); // Lowercase Letter
                                                    $dig = preg_match('/\d/', $pass); // Numeral
                                                    $nos = preg_match('/\W/', $pass); // Non-alpha/num characters (allows underscore)
                                                    $spe= preg_match('/^(?=.*[!@#*()-_+=$%^&]).*$/',$pass);
                                                    if($ucl && $lcl && $dig && $nos && $spe) {
                                                        $user_mobile = preg_replace('/\s+/', '',trim($_REQUEST['mobile']));
                                                        $user = new FetchData();
                                                        $user->set_where(array('is_deleted' => 0, 'mobile' => $user_mobile));
                                                        $user->set_notwhere(array('id' => $_REQUEST['id']));
                                                        $userFind = $user->fetch_data('tbl_user', array('id'));
                                                        if (mysqli_num_rows($userFind) > 0) {
                                                            $ferror="This Mobile Number Is Already Registered";
                                                        }
                                                        else{
                                                            // check the email id exist validation
                                                            $user_email = preg_replace('/\s/', '', $_REQUEST['email']);
                                                            $user = new FetchData();
                                                            $user->set_where(array('is_deleted' => 0, 'email' => $user_email));
                                                            $user->set_notwhere(array('id' => $_REQUEST['id']));
                                                            $userFind = $user->fetch_data('tbl_user', array('id'));
                                                            if (mysqli_num_rows($userFind) > 0) {
                                                                $ferror="This Email Id Is Already Registered";
                                                            }
                                                            else{
                                                                //update into user table
                                                                $editDetails = new EditDetails();
                                                                $res = $editDetails->edit_details('tbl_user', $params,$_REQUEST['id']);

                                                                if($res == false){
                                                                    echo "<p style='color:red'>Something Went Wrong. Please Try Again Later1</p>";

                                                                }
                                                                else{
                                                                    // make the array for permission table
                                                                    if(isset($_REQUEST['view_dashboard']))
                                                                    { $para['dashboard']=$_REQUEST['view_dashboard']; }
                                                                    else{ $para['dashboard']=0; }

                                                                    if(isset($_REQUEST['view_charger']))
                                                                    { $para['view_charger']=$_REQUEST['view_charger']; }
                                                                    else{ $para['view_charger']=0; }
                                                                    if(isset($_REQUEST['edit_charger']))
                                                                    { $para['edit_charger']=$_REQUEST['edit_charger']; }
                                                                    else{ $para['edit_charger']=0; }
                                                                    if(isset($_REQUEST['add_charger']))
                                                                    { $para['add_charger']=$_REQUEST['add_charger']; }
                                                                    else{ $para['add_charger']=0; }

                                                                    if(isset($_REQUEST['view_sites']))
                                                                    { $para['view_sites']=$_REQUEST['view_sites']; }
                                                                    else{ $para['view_sites']=0; }
                                                                    if(isset($_REQUEST['add_sites']))
                                                                    { $para['add_site']=$_REQUEST['add_sites']; }
                                                                    else{ $para['add_site']=0; }
                                                                    if(isset($_REQUEST['edit_sites']))
                                                                    { $para['edit_site']=$_REQUEST['edit_sites']; }
                                                                    else{ $para['edit_site']=0; }

                                                                    if(isset($_REQUEST['view_site_region']))
                                                                    { $para['view_site_region']=$_REQUEST['view_site_region']; }
                                                                    else{ $para['view_site_region']=0; }
                                                                    if(isset($_REQUEST['add_site_regions']))
                                                                    { $para['add_site_region']=$_REQUEST['add_site_regions']; }
                                                                    else{ $para['add_site_region']=0; }
                                                                    if(isset($_REQUEST['edit_site_regions']))
                                                                    { $para['edit_site_region']=$_REQUEST['edit_site_regions']; }
                                                                    else{ $para['edit_site_region']=0; }

                                                                    if(isset($_REQUEST['view_site_division']))
                                                                    { $para['view_site_division']=$_REQUEST['view_site_division']; }
                                                                    else{ $para['view_site_division']=0; }
                                                                    if(isset($_REQUEST['add_site_divisions']))
                                                                    { $para['add_site_division']=$_REQUEST['add_site_divisions']; }
                                                                    else{ $para['add_site_division']=0; }
                                                                    if(isset($_REQUEST['edit_site_divisions']))
                                                                    { $para['edit_site_division']=$_REQUEST['edit_site_divisions']; }
                                                                    else{ $para['edit_site_division']=0; }

                                                                    if(isset($_REQUEST['view_site_group']))
                                                                    { $para['view_site_group']=$_REQUEST['view_site_group']; }
                                                                    else{ $para['view_site_group']=0; }
                                                                    if(isset($_REQUEST['add_site_groups']))
                                                                    { $para['add_site_group']=$_REQUEST['add_site_groups']; }
                                                                    else{ $para['add_site_group']=0; }
                                                                    if(isset($_REQUEST['edit_site_groups']))
                                                                    { $para['edit_site_group']=$_REQUEST['edit_site_groups']; }
                                                                    else{ $para['edit_site_group']=0; }

                                                                    //get the id of permission table
                                                                    $user_t1 = new FetchData();
                                                                    $user_t1->set_where(array('username'=>$rows['username']));
                                                                    $usertsql1 = $user_t1->fetch_data('tbl_user_manage',array('id','username'));
                                                                    if ($get_chargernum=mysqli_num_rows($usertsql1)) {
                                                                        $rowid = mysqli_fetch_assoc($usertsql1);
                                                                    }
//                                                                    print_r($para);

                                                                    //update in permission table
                                                                    $editDetails = new EditDetails();
                                                                    $res1 = $editDetails->edit_details('tbl_user_manage', $para,$rowid['id']);
                                                                    if($res1 == false){
                                                                        echo "<p style='color:red'>Something Went Wrong. Please Try Again Later</p>";
                                                                    }
                                                                    else {
                                                                        echo"<script>alert('User Updated');window.location.href='index.php?action=view_users';</script>";
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                    else{ $ferror='The Password Pattern Is Incorrect'; }
                                                }
                                            }
                                            if($error!='' || $ferror!=''){
                                                echo"<p style='color:red'>".$error.$ferror. "</p>";
                                            }
                                        }

                                        ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form method="post" name="form" id="form">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Name*</label>
                                                            <input type="text" class="form-control" id="customer_name" name="name" placeholder="Name" required value="<?php if(isset($_REQUEST['name'])){ echo $_REQUEST['name']; }else{ echo $rows['name']; } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Username*</label>
                                                            <input type="text" class="form-control" readonly id="master_username" name="username" placeholder="Username" required value="<?php if(isset($_REQUEST['username'])){ echo $_REQUEST['username']; }else{ echo $rows['username']; } ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Mobile*</label>
                                                            <div style="display:flex;">
                                                                <input style="width: 10%;margin-right: 13px;" type="text" readonly="" value="+91" class="form-control"/>
                                                                <input type="text" class="form-control" name="mobile" placeholder="Mobile" maxlength="10" required value="<?php if(isset($_REQUEST['mobile'])){ echo $_REQUEST['mobile']; }else{ echo $rows['mobile']; } ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Email*</label>
                                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="<?php if(isset($_REQUEST['email'])){ echo $_REQUEST['email']; }else{ echo $rows['email'];} ?>">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label>Password*</label>
<!--                                                            <span class="pull-right" onclick="show()">Show Password</span>-->
                                                            <input type="password" class="form-control" id="psw" placeholder="Password" name="password" required value="<?php if(isset($_REQUEST['password'])){ echo $_REQUEST['password']; }else{ echo $rows['password'];}?>">
                                                            <div id="message">
                                                                <h3>Password must contain the following:</h3>
                                                                <p id="special" class="invalid">A <b>special</b> character</p>
                                                                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                                                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                                                <p id="number" class="invalid">A <b>number</b></p>
                                                                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                                            </div>
                                                            <script>
                                                                function show()
                                                                {

                                                                }
                                                                var myInput = document.getElementById("psw");
                                                                var letter = document.getElementById("letter");
                                                                var capital = document.getElementById("capital");
                                                                var number = document.getElementById("number");
                                                                var length = document.getElementById("length");
                                                                var special = document.getElementById("special");
                                                                var sh=0;

                                                                // When the user clicks on the password field, show the message box
                                                                myInput.onfocus = function() {
                                                                    document.getElementById("message").style.display = "block";
                                                                }

                                                                // When the user clicks outside of the password field, hide the message box
                                                                myInput.onblur = function() {
                                                                    document.getElementById("message").style.display = "none";
                                                                }

                                                                // When the user starts to type something inside the password field
                                                                myInput.onkeyup = function() {
                                                                    // Validate lowercase letters
                                                                    var lowerCaseLetters = /[a-z]/g;
                                                                    if(myInput.value.match(lowerCaseLetters)) {
                                                                        letter.classList.remove("invalid");
                                                                        letter.classList.add("valid");
                                                                    } else {
                                                                        letter.classList.remove("valid");
                                                                        letter.classList.add("invalid");
                                                                    }

                                                                    // Validate capital letters
                                                                    var upperCaseLetters = /[A-Z]/g;
                                                                    if(myInput.value.match(upperCaseLetters)) {
                                                                        capital.classList.remove("invalid");
                                                                        capital.classList.add("valid");
                                                                    } else {
                                                                        capital.classList.remove("valid");
                                                                        capital.classList.add("invalid");
                                                                    }

                                                                    // Validate numbers
                                                                    var numbers = /[0-9]/g;
                                                                    if(myInput.value.match(numbers)) {
                                                                        number.classList.remove("invalid");
                                                                        number.classList.add("valid");
                                                                    } else {
                                                                        number.classList.remove("valid");
                                                                        number.classList.add("invalid");
                                                                    }

                                                                    //special
                                                                    var spe=/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
                                                                    if(myInput.value.match(spe)) {
                                                                        special.classList.remove("invalid");
                                                                        special.classList.add("valid");
                                                                    } else {
                                                                        special.classList.remove("valid");
                                                                        special.classList.add("invalid");
                                                                    }
                                                                    // Validate length
                                                                    if(myInput.value.length >= 8) {
                                                                        length.classList.remove("invalid");
                                                                        length.classList.add("valid");
                                                                    } else {
                                                                        length.classList.remove("valid");
                                                                        length.classList.add("invalid");
                                                                    }

                                                                    if((myInput.value.length >= 8) && (myInput.value.match(spe)) && (myInput.value.match(numbers)) && (myInput.value.match(upperCaseLetters)) && (myInput.value.match(lowerCaseLetters)))
                                                                    {
                                                                        document.getElementById("sub").disabled = false; document.getElementById("message").style.display = "none";
                                                                    }
                                                                    else{
                                                                        document.getElementById("sub").disabled = true;
                                                                    }
                                                                }
                                                            </script>
                                                        </div>
                                                    </div>
                                                    <!--Permissions-->
                                                    <div class="form-row">
                                                        <h3>Page Access</h3>
                                                    </div>
                                                    <!--Dashboard-->
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <input type="checkbox" style="margin-right:10px" value="1" <?php if(isset($_REQUEST['view_dashboard'])){ echo"Checked"; }else{ if($rows['dashboard']==1){ echo"Checked"; }}?> name="view_dashboard">Dashboard
                                                        </div>
                                                    </div>
                                                    <!--Chargers-->
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <input type="checkbox" style="margin-right:10px" value="1" <?php if(isset($_REQUEST['view_charger'])){ echo"Checked"; }else{ if($rows['view_charger']==1){ echo"Checked"; }}?> name="view_charger">View Charger
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <input type="checkbox" style="margin-right:10px" value="1" <?php if(isset($_REQUEST['add_charger'])){ echo"Checked"; }else{ if($rows['add_charger']==1){ echo"Checked"; }}?> name="add_charger">Add Charger
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <input type="checkbox" style="margin-right:10px" value="1" <?php if(isset($_REQUEST['edit_charger'])){ echo"Checked"; }else{ if($rows['edit_charger']==1){ echo"Checked"; }}?> name="edit_charger">Edit Charger
                                                        </div>
                                                    </div>
                                                    <!--Site Regions-->
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <input type="checkbox" style="margin-right:10px" value="1" <?php if(isset($_REQUEST['view_site_region'])){ echo"Checked"; }else{ if($rows['view_site_region']==1){ echo"Checked"; }}?> name="view_site_region">View Site Region
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <input type="checkbox" style="margin-right:10px" value="1" <?php if(isset($_REQUEST['add_site_regions'])){ echo"Checked"; }else{ if($rows['add_site_region']==1){ echo"Checked"; }}?> name="add_site_regions">Add Site Region
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <input type="checkbox" style="margin-right:10px" value="1" <?php if(isset($_REQUEST['edit_site_regions'])){ echo"Checked"; }else{ if($rows['edit_site_region']==1){ echo"Checked"; }}?> name="edit_site_regions">Edit Site Region
                                                        </div>
                                                    </div>
                                                    <!--Site Division-->
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <input type="checkbox" style="margin-right:10px" value="1" <?php if(isset($_REQUEST['view_site_division'])){ echo"Checked"; }else{ if($rows['view_site_division']==1){ echo"Checked"; }}?> name="view_site_division">View Site Division
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <input type="checkbox" style="margin-right:10px" value="1" <?php if(isset($_REQUEST['add_site_divisions'])){ echo"Checked"; }else{ if($rows['add_site_division']==1){ echo"Checked"; }}?> name="add_site_divisions">Add Site Division
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <input type="checkbox" style="margin-right:10px" value="1" <?php if(isset($_REQUEST['edit_site_divisions'])){ echo"Checked"; }else{ if($rows['edit_site_division']==1){ echo"Checked"; }}?> name="edit_site_divisions">Edit Site Division
                                                        </div>
                                                    </div>
                                                    <!--Site group-->
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <input type="checkbox" style="margin-right:10px" value="1" <?php if(isset($_REQUEST['view_site_group'])){ echo"Checked"; }else{ if($rows['view_site_group']==1){ echo"Checked"; }}?> name="view_site_group">View Site Group
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <input type="checkbox" style="margin-right:10px" value="1" <?php if(isset($_REQUEST['add_site_groups'])){ echo"Checked"; }else{ if($rows['add_site_group']==1){ echo"Checked"; }}?> name="add_site_groups">Add Site Group
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <input type="checkbox" style="margin-right:10px" value="1" <?php if(isset($_REQUEST['edit_site_groups'])){ echo"Checked"; }else{ if($rows['edit_site_group']==1){ echo"Checked"; }}?> name="edit_site_groups">Edit Site Groups
                                                        </div>
                                                    </div>

                                                    <!--Site-->
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <input type="checkbox" style="margin-right:10px" value="1" <?php if(isset($_REQUEST['view_sites'])){ echo"Checked"; }else{ if($rows['view_sites']==1){ echo"Checked"; }}?> name="view_sites">View Sites
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <input type="checkbox" style="margin-right:10px" value="1" <?php if(isset($_REQUEST['add_sites'])){ echo"Checked"; }else{ if($rows['add_site']==1){ echo"Checked"; }}?> name="add_sites">Add Sites
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <input type="checkbox" style="margin-right:10px" value="1" <?php if(isset($_REQUEST['edit_sites'])){ echo"Checked"; }else{ if($rows['edit_site']==1){ echo"Checked"; }}?> name="edit_sites">Edit Sites
                                                        </div>
                                                    </div>

                                                    <!--buttons-->
                                                    <input type="submit" id="sub" class="btn btn-primary" value="Update" name="add_user">
                                                    <a href="index.php?action=view_users"><input type="button" class="btn btn-primary" value="Cancel"></a>
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

