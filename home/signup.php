<!doctype html>
<?php require_once("config.php"); ?>
<html>
    <head>
    <title>Login - Waqar pharmacy</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="image/favicon.PNG" sizes="16x16" type="image/png">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style1.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php
                if(isset($_POST['signup']))
                {
                    extract($_POST);
                    if(strlen($fname)<3)
                        {
                            $error[]= 'Please Enter first name using three character at least';
                        }
                        if(strlen($fname)>20)
                        {
                            //max
                            $error[]= 'First Name: Max length 20 character Not allowed';
                        }
                        if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $fname)){
                        $error[] = 'Invalid Entry First Name. Please Enter Letters without any Digit or Special Symbols like (1,2,3#,$,%,&,*,!,~,^,-,)';                        
                        }
                if(strlen($lname)<3) //minimum
                        {
                            $error[]= 'Please Enter last name using three character at least';
                        }
                        if(strlen($lname)>20)
                        {
                            //max
                            $error[]= 'First Name: Max length 20 character Not allowed';
                        }
                    if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $lname)){
                    $error[] = 'Invalid Entry Last Name. Please Enter Letters without any Digit or Special Symbols like (1,2,3#,$,%,&,*,!,~,^,-,)';                        
                    }
                if(strlen($username)<3) // change minimum length 
                        {
                            $error[]= 'Please Enter Username name using three character at least';
                        }
                        if(strlen($username)>30)
                        {
                            //change max length
                            $error[]= 'Username Name: Max length 30 character Not allowed';
                        }
                    if(!preg_match("/^^[^0-9][a-z0-9]+([_-]?[a-z0-9])*$/", $username)){
                    $error[] = 'Invalid Entry User Name. Enter Lowercase Letters without any space and no number at the start- Eg - myusername, okunisratan, myusername123';                        
                    }
                    if(strlen($email)>50)
                        {
                            $error[]= 'Email: Max length 50 character Not allowed';
                        }
                        if($passwordConfirm ==''){
                            $error[] = 'Please confirm the password.';
                        }
                        if($password != $passwordConfirm){
                            $error[] = 'password do not match.';
                        }

                        if(strlen($password)<5)
                        {
                            //min
                            $error[]= 'Password should be more than 5';
                        }
                        if(strlen($password)>20)
                        {
                            // max
                            $error[]= 'Password: Max length 20 character Not allowed';
                        }
                        $sql= " select * from users where (username='$username' or email='$email');";
                        $res=mysqli_query($dbc,$sql);
                    if (mysqli_num_rows($res) > 0) {
                        $row = mysqli_fetch_assoc($res);

                            if($username==$row['username'])
                            {
                                $error[] ='Username already Exists.';
                            }
                            if($email==$row['email']){
                                $error[] ='Email already Exists.';
                            }
                    }
                if(!isset($error)){
                    $date=date('Y-m-d');
                                $options = array("cost"=>4);
                    $password = password_hash($password,PASSWORD_BCRYPT,$options);

                    $results = mysqli_query($dbc,"INSERT into users
                    values('','$fname','$lname','$username','$email','$password','$date')");

                        if(!isset($result))
                        {
                            $done=2;
                        }
                        else{
                            $error[] ='Failed : Something went wrong';
                        }
                }
                }
                ?>
                <div class="col-sm-4">
                    <?php
                    if(isset($error))
                    {
                        foreach($error as $error)
                        {
                            echo '<p class="errmsg">&#x26A0;'.$error.'</p>';
                        }
                    }
                    ?>
                </div>
                <div class="col-sm-4">
                <img src="logo.JPG" alt="waqar pharmacy" class="logo1 img-fluid">
                </div>
                <div class="col-sm-4">
                </div>
            </div>
            <div class="row">
            <div class="col-sm-4">
                </div>
            <div class="col-sm-4">
                <?php if(isset($done))
                { ?>
                <div class="successmsg"><span style="font-size:100px">&#9989;</span><br>
                    You have sucessfully register . <br> <a href="login.php" style="color:#fff;">Login here...</a>
                </div>
                <?php }else{ ?>
                <div class="signup_form">
                    <form action="" method="POST">
                        <div class="form-group">
                        <label class="label-txt">First Name</label>
            <input type="text" class="form-control" name="fname" value="<?php if(isset($error)) { echo $fname;}?>" required="">
                        </div>
                        <div class="form-group">
                        <label class="label-txt">Last Name</label>
            <input type="text" class="form-control" name="lname" value="<?php if(isset($error)) { echo $lname;}?>" required="">
                        </div>
                        <div class="form-group">
                        <label class="label-txt">Username</label>
            <input type="text" class="form-control" name="username" value="<?php if(isset($error)) { echo $username;}?>" required="">
                        </div>
                        <div class="form-group">
                        <label class="label-txt">Email</label>
            <input type="email" class="form-control" name="email" value="<?php if(isset($error)) { echo $email;}?>" required>
                        </div>
                        <div class="form-group">
                        <label class="label-txt">Password</label>
            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                        <label class="label-txt">Confirm Password</label>
            <input type="password" class="form-control" name="passwordConfirm" required="">
                        </div>
                        <button  type="submit" name="signup" class="btn btn-primary btn-group-lg form_btn">
                            Signup
                        </button>
                        <p>Have an account? <a href="login.php">Login</a></p>
                        <?php } ?>
                    </form>
                </div>
                </div>
                    <div class="col-md-4">
                    </div>
            </div>
        </div>
    
        <script src="jquery-3.5.1.min.js"></script>
        <script src="bootstrap.min.js"></script>
    </body>
</html>