<?php 
include("../admin/includes/config.php");
session_start();
if (isset($_SESSION['login'])) {
   

if ($_SESSION['login']=='true'){
    header("Location: http://localhost/pharmacy");
    die();
}
}
unset($_SESSION['users']);
// unset($_SESSION['admins']);
$_SESSION['admin']='false';
$_SESSION['login']='false';

if (isset($_POST['login'])) {
    $admins_query        = "SELECT * FROM admin";
    $admins_query_result = mysqli_query($conn,$admins_query);
    $num_rows = mysqli_num_rows($admins_query_result);
    while($row = mysqli_fetch_assoc($admins_query_result)){
    if ($num_rows>0 && $_POST['email']==$row['admin_email']){
        $user = false;
        $pass               = $_POST['pass'];
        $email              = $_POST['email'];
        $id                 = $row['admin_id'];
        if ($pass==$row['admin_password']){
            $date               = date('Y-m-d');
            $add_date_query     = "UPDATE admin SET admin_last_login = '$date' WHERE admin_id = $id";
            mysqli_query($conn,$add_date_query);
            $_SESSION['admin']='true';
            $_SESSION['admins']['id']=$id;
            header("Location: http://localhost/pharmacy/admin");
         
    }else{
        $passC = false;     
        $passM="Your Password Incorrect";
        }
        break;
    }
    else{
    $users_query        = "SELECT * FROM user";
    $users_query_result = mysqli_query($conn,$users_query);
    $check              = false;
    while($row = mysqli_fetch_assoc($users_query_result)){
    if ($_POST['email']==$row['user_email']){
        $check              = true;
        $pass               = $_POST['pass'];
        $email              = $_POST['email'];
        $id                 = $row['user_id'];
        if ($pass==$row['user_password']){
            $id                 = $row['user_id'];
            $date               = date('Y-m-d');
            $add_date_query     = "UPDATE user SET user_last_login = '$date' WHERE user_id = $id";
            mysqli_query($conn,$add_date_query);
            $_SESSION['login']='true';
            $_SESSION['users']['id']=$id;
            header("Location: http://localhost/pharmacy");
        }else{
        $passC = false;     
        $passM="Your Password Incorrect";
        }
        break;
    } }
    if ($check==false) {
        $registerM = "You Dont Have an Account, Pleas Creat an Account";
        $class     = 'false';
    }}
}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .error{
             width: 100%;
             color: red;
             font-weight: bold;
             }
        .true{
             width: 90%;
             color: rgb(0, 212, 0);
             font-weight: bold;}
        .false{
        width: 90%;
        color: red;
        font-weight: bold;}
        .true-login{
            color: rgb(109,171,228);
        }  
    </style>
</head>
<body>
        <!-- Sing in  Form -->
        <section  class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/login.jpg" alt="sing up image"></figure>
                        <a href="signup.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="signin" class="form-submit" value="Log in"/>
                            </div>
                            <?php
                                  if (@$check==false) {
                                      echo "<div class='false'>";
                                      echo @$registerM . "<br>";
                                      echo "</div>";
                                  }
                                  if (@$passC==false) {
                                    echo "<div class='false'>";
                                    echo @$passM . "<br>";
                                    echo "</div>";
                                }  
                                  ?>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    i
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>