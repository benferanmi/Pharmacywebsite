<!doctype html>
<html>
    <head>
    <title>Login - Waqar pharmacy</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="shortcut icon" href="image/favicon.PNG" sizes="16x16" type="image/png">
    <link rel="stylesheet" href="style1.css">
    </head>
    <body>
    <div class="container">
        <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
        <div class="login_form">
        <img src="image/logo.JPG" alt="waqar pharmacy" class="logo img-fluid">
            <?php
            if(isset($_GET['loginerror'])) {
                $loginerror=$_GET['loginerror'];
            }
            if(!empty($loginerror)){
                echo '<p class="errmsg">Invalid login credentials, Please try again..</p>';
            }
            ?>
        <form action="login_process.php" method="POST">
            <div class="form-group">
            <label class="label-txt">Email</label>
            <input type="email" name="login_var" value="<?php if(!empty($loginerror)){ echo  $loginerror; } ?>" class="form-control">
            </div>
            <div class="form-group">
            <label class="label-txt">Password</label>
            <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" name="sublogin" class="form_btn btn btn-primary">login</button>
        </form>
        <p style="font-size:12px; text-align:center; margin-top:10px; "><a href="forget-password.php" style="color:blue;">Forgot password</a></p>
        <br>
        <p>Don't have an account? <a href="signup.php">Signup</a></p>
        </div>
        </div>
        <div class="col-sm-4"></div>
        </div>
        </div>
        </div>
        <script src="jquery-3.5.1.min.js"></script>
        <script src="bootstrap.min.js"></script>
    </body>
</html>