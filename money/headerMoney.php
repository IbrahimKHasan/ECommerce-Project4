<?php 
include "../admin/includes/config.php";
session_start();
echo "<pre>";
// print_r($_SESSION);
echo "</pre>";

if(isset($_SESSION['login'])){
    if ($_SESSION['login']=='false') {
        unset($_SESSION['cart']);
        $display2 = 'none';
    }  
}else{  $display2 = 'none';
    unset($_SESSION['cart']);
}

if (isset($_SESSION['login'])) {

if ($_SESSION['login']=='true'){
    $display = 'none';
}

if ($_SESSION['login']=='true'){
    $id                 = $_SESSION['users']['id'];
    $users_query        = "SELECT * FROM user WHERE user_id=$id";
    $users_query_result = mysqli_query($conn,$users_query);
    $row                = mysqli_fetch_assoc($users_query_result);
    $row['user_fullname'] = explode(" ",$row['user_fullname']);
    $row['user_fullname'] = $row['user_fullname'][0];
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart']=['user_id'=>$id,'items'=>[0,-1]];
    }
}
if (isset($_POST['logout'])){
    $_SESSION['login']='false';
    header('Location:http://localhost/pharmacy/account/login.php');
}
}
function addToCart($item_id){
    array_push($_SESSION['cart']['items'],$item_id);
    print_r($_SESSION['cart']['items']);
    header("Location:http://localhost/pharmacy/index.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop - Product Detail Page</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="../assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="../assets/css/owl-carousel.css">

    <link rel="stylesheet" href="../assets/css/lightbox.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="http://localhost/pharmacy/index.php" class="logo">
                            <img src="../assets/images/logoo2.png" width="100px" height="80px">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="../index.php" class="active">Home</a></li>
                           
                            <li class="submenu">
                                <a href="javascript:;">Products</a>
                                <ul>
                                <li class="scroll-to-section"><a href="../products.php?id=1">COVID Testing Kits</a></li>
                            <li class="scroll-to-section"><a href="../products.php?id=2">Quit Smoking</a></li>
                            <li class="scroll-to-section"><a href="../products.php?id=3">Face Coverings & Masks</a></li>
                            <li class="scroll-to-section"><a href="../products.php?id=4">children Health</a></li>
                                </ul>
                            </li>
                         <li><a href="about.php">About Us</a></li>
                                   <li><a href="contact.php">Contact Us</a></li>
                                   <li style="display:<?php echo@$display; ?> ;"><a href="account/signup.php">Sign Up</a></li>
                                   <li style="display:<?php echo@$display; ?> ;"><a href="account/login.php">Log In</a></li>

                            <li style="display:<?php echo@$display2; ?> ;" class="submenu">
                                <a href="javascript:;"><?php echo @$row['user_fullname'] ?></a>
                                  <ul>
                                    <li class="scroll-to-section"><a href="http://localhost/pharmacy/setting.php">User Profile</a></li>
                                    <li class="scroll-to-section">
                                      <a href="products.php?id=2">
                                        <form action="" method="POST">
                                          <button name="logout" style="border: none;background-color:inherit">Logout</button>
                                        </form>
                                      </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>        
        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>