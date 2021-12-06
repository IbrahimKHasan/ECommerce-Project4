<?php 
session_start();
if ($_SESSION['login']=='true'){
    header("Location: http://localhost/pharmacy");
    die();
}
$_SESSION['login']='false';
include("../admin/includes/config.php");
$emailFormat  = "/^[A-ZA-z0-9._-]+@(hotmail|gmail|yahoo|outlook).com$/";
$phoneFormat = "/^07[7-9][0-9]{7}$/";
$numberFormat = "/[-.0-9]+/";
$passFormat   = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
$register1    = "";
$register2    = "";
$register3    = "";
$register4    = "";
$register5    = "";
$error1       = "";
$error2       = "";
$error3       = "";
$error4       = "";
$error5       = "";
$errors       = [];
$registerM    = "";
$register     = "";
//PHP Validation
if (isset($_POST['signup'])) {
//Name Val
if (!preg_match($numberFormat, $_POST['name'])) {
    $register1 = true;
} else {
    $register1 = false;
    $error1    = "- Name must be valid.";
}
//Email Val
if (preg_match($emailFormat, $_POST['email'])) {
    $register2 = true;
} else {
    $register2 = false;
    $error2    = "- Email must be valid.";
}
 //Mobile Val
 if (preg_match($phoneFormat, $_POST['phone'])) {
    $register3 = true;
} else {
    $register3 = false;
    $error3    = "- Phone must be valid.";
}
//Pass Val
if (preg_match($passFormat, $_POST['pass'])) {
    $register4 = true;
} else {
    $register4 = false;
    $error4    = "- Password must be valid.";
}
//Pass Conf
if ($_POST['re-pass'] == $_POST['pass']) {
    $register5 = true;
} else {
    $register5 = false;
    $error5    = "- Your password and confirmation password do not match.";
}
if ($register1 == true && $register2 == true && $register3 == true && $register4 == true && $register5 == true) {
        $users_query        = "SELECT * FROM user";
        $users_query_result = mysqli_query($conn,$users_query);
        $check              = true;
        while($row = mysqli_fetch_assoc($users_query_result)){
        if ($_POST['email']==$row['user_email']){
        $check=false;
        break;
        } 
    }  
        if ($check == false){
        $registerM          = "You are Already Have an Account";
        $register           = "cant";
        $class              = 'false';
        }
        if ($check == true){
        $registerM          = "You Have Register Successfully";
        $register           = "can";
        $class              = 'true';
        $name               = $_POST['name'];
        $email              = $_POST['email'];
        $phone              = $_POST['phone'];
        $pass               = $_POST['pass'];
        $date               = date('Y-m-d');
        $add_users_query    = "INSERT INTO user (user_fullname,user_email,user_phone,user_password,user_date_create) 
                               VALUES ('$name','$email','$phone','$pass','$date')";
        mysqli_query($conn,$add_users_query);
        } 
}
}
array_push($errors, $error1, $error2, $error3, $error4, $error5);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

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
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <!-- Name -->
                            <div id="namediv" class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" required/>
                            </div>
                            <div id="nameMessage"></div>
                            <!-- Email -->
                            <div id="emaildiv" class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>
                            <div id="emailMessage"></div>
                            <!-- Phone -->
                            <div id="phonediv" class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" name="phone" id="phone" placeholder="Your Phone" required/>
                            </div>
                            <div id="phoneMessage"></div>
                            <!-- pass -->
                            <div id="passdiv" class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required/>
                            </div>
                            <div id="passMessage"></div>
                            <!-- re-pass -->
                            <div id="re-passdiv" class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re-pass" id="re-pass" placeholder="Repeat your password" required/>
                            </div>
                            <div id="re-passMessage"></div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Sign Up"/>
                            </div>
                            <?php
                                  if ($register=="can") {
                                    // echo "<div class=$class>";
                                    // echo $registerM . "<br>";
                                    // echo "<a href='login.php' class='true-login'>Log In</a>";
                                    // echo "</div>";
                                    $users_query        = "SELECT * FROM user WHERE user_email='$email'";
                                    $users_query_result = mysqli_query($conn,$users_query);
                                    $row = mysqli_fetch_assoc($users_query_result);
                                    $_SESSION['login']='true';
                                    $_SESSION['users']['id']=$row['user_id'];
                                    header('Location: http://localhost/pharmacy');
                                  } elseif ($register=="cant") {
                                    echo "<div class=$class>";
                                    echo $registerM . "<br>";
                                    echo "<a href='login.php' class='true-login'>Log In</a>";
                                    echo "</div>";
                                  }
                                  else {
                                      foreach ($errors as $value) {
                                          echo "<div class='error'>";
                                          echo $value;
                                          echo "</div>";
                                      }
                                  }
                                  ?>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img width="800px" src="images/signup.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    <!-- JS -->
    <script src="account-js/main.js"></script>
</body>
</html>
<!-- This templates was made by Colorlib (https://colorlib.com) -->