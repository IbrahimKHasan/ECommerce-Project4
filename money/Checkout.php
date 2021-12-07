<?php 
include "../admin/includes/config.php";
session_start();
echo "<pre>";
// print_r($_SESSION);
echo "</pre>";
if ($_SESSION['login']=='true'){
    $display = 'none';
}
if ($_SESSION['login']=='false'){
    $display2 = 'none';
}
if ($_SESSION['login']=='true'){
    $id                 = $_SESSION['users']['id'];
    $users_query        = "SELECT * FROM user WHERE user_id=$id";
    $users_query_result = mysqli_query($conn,$users_query);
    $row                = mysqli_fetch_assoc($users_query_result);
    $row['user_fullname'] = explode(" ",$row['user_fullname']);
    $row['user_fullname'] = $row['user_fullname'][0];
}
if (isset($_POST['logout'])){
    $_SESSION['login']='false';
    header('Location:http://localhost/pharmacy/account/login.php');
}
function addToCart($item_id,$link){
    array_push($_SESSION['cart']['items'],$item_id);
    
    if (isset($_SESSION['cat_id'])) {
        if ($link=='s') {
        header("Location:http://localhost/pharmacy/products.php?id={$_SESSION['cat_id']}");
        die;
        }
    }

    if ($link!='no') {
        header("Location:http://localhost/pharmacy/index.php");
    }else header("Location:http://localhost/pharmacy/single-product.php?added=yes&id=$item_id");

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
                            <li>
                            <a href="http://localhost/pharmacy/money/cart.php">
                                Cart
                             <i style="padding-top: 13px;"  class="fa fa-shopping-cart"></i>
                             </a>
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
    <!-- ***** Header Area End ***** -->


<div class="container mt-5">
  <main>
    <div class="py-5 text-center">
      <br>
      <h2>Checkout</h2>
    </div>
    <?php include("../admin/includes/config.php"); ?>
    <?php
   
      $_SESSION['itemat'] = " ";
    

    $_SESSION['full_price'] = 0;
    if (isset($_SESSION['login'])) {
      if ($_SESSION['login'] == 'true') {
        $user_id = $_SESSION['users']['id'];
        $cities = ['Amman', 'Irbid', 'Jarash', 'Blue City', 'Ajloun'];
      } else header("Location:http://localhost/pharmacy/account/signup.php");
    } else header("Location:http://localhost/pharmacy/account/signup.php");

    if (isset($_SESSION['cart'])) {

      $NOI = count($_SESSION['cart']['items']);
      $arr = implode(",", ($_SESSION['cart']['items']));

      $select = "SELECT item_id,item_name,item_price, item_title FROM item where item_id in($arr) ";
      $res = $conn->query($select);
    }

    ?>
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div style="display:none;" id="myP1" class="alert alert-success fade show mt-4" role="alert">
          <strong>Your Order Has been taken We will contact you within 2 days </strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
      <div class="col-md-2 mt-2"></div>
    </div>
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span style="color: #0096db;">Your cart</span>
          <span class="badge  rounded-pill" style="background-color: #0096db; color:white"><?php echo $NOI; ?></span>
        </h4>
        <ul class="list-group mb-3">
          <?php while ($row = $res->fetch_assoc()) :
            $_SESSION['itemat'] .= "-" . $row['item_name'];

          ?>

            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0"><?php echo $row['item_name']; ?></h6>
                <small class="text-muted"><?php echo $row['item_title']; ?></small>
              </div>
              <span class="text-muted"><?php $_SESSION['full_price'] += $row['item_price'];
                                        echo "$" . $row['item_price']; ?></span>
            </li>
          <?php endwhile; ?>
          <?php

          if (isset($_POST['promo'])) {
            $promo = $_POST['promo'];
            $select = "SELECT * FROM coupon WHERE coupon_code = '$promo'";

            if ($conn->query($select)) {
              $res_co = $conn->query($select);
              $coupon = $promo;
              $co = $res_co->fetch_assoc();

              $cop_id = $co['coupon_id'];
              $_SESSION['cop_id'] = $cop_id;
              $_SESSION['percent'] = $co['coupon_percentage'];
            }
          }

          ?>

          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Promo code</h6>
              <small><?php echo @$coupon ?></small>
            </div>
            
            <span class="text-success"><?php echo @$_SESSION['percent'] . " %"; ?></span>
          </li>
          <?php $_SESSION['dis'] = $_SESSION['full_price'] * @$_SESSION['percent'] / 100; ?>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$<?php
            $fp = $_SESSION['full_price'] - $_SESSION['dis'];
             echo ( $fp ); ?></strong>
          </li>
        </ul>

        <form class="card p-2" method="POST">
          <div class="input-group">
            <input type="text" name="promo" class="form-control" placeholder="Promo code">
            <button type="submit" class="btn " style="background-color: #0096db;color:white">Redeem</button>
          </div>
        </form>
      </div>
      <?php

      $select = "SELECT * FROM user where user_id = $user_id";
      $res = $conn->query($select);
      $row = $res->fetch_assoc();
      $row['user_fullname'] = explode(" ", $row['user_fullname']);
      $last_name = $row['user_fullname'][1];
      $row['user_fullname'] = $row['user_fullname'][0];

      ?>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3 mt-2">Billing address</h4>
        <form class="needs-validation" method="POST" novalidate="">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo @$row['user_fullname']; ?>" required="">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="<?php echo @$last_name; ?>" required="">
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12 mt-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" value="<?php echo @$row['user_email']; ?>" id="email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12 mt-3">
              <label for="address" class="form-label">City</label>
              <input type="text" class="form-control" value="<?php echo @$row['user_city']?>" name="city" id="address" placeholder="Amman, Irbid, Bluecity" required="">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>


            <hr class="my-4">


            <div class="mt-5" style="width: 90%;"></div>

            <hr class="my-4">

            <h4 class="mb-3">Payment</h4>
            <div style="width: 90%;"></div>
            <div class="my-3">
              <div class="form-check">
                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="" required="">
                <label class="form-check-label" for="credit">Cash On Delivery</label>
              </div>

              <div class="form-check">
                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" disabled>
                <label class="form-check-label" for="paypal">PayPal <small class="text-muted"> (Coming Soon)</small></label>
              </div>
            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-md" style="background-color: #0096db;" name="submit_payment" type="submit_payment">Confirm to checkout</button>
        </form>
        <a class="w-100 btn btn-primary btn-md mt-1" style="background-color: #0096db;" href="http://localhost/pharmacy/index.php">
          Continue Shopping
        </a>
      </div>
    </div>
  </main>
</div>
<?php
$SixDigitRandomNumber = rand(100000, 999999);
// echo $_SESSION['dis']."<br>";
// echo $_SESSION['full_price']."<br>";
// echo $fp;
if (isset($_REQUEST['submit_payment'])) { ?>
  <script>
    document.getElementById("myP1").style.display = "block";
  </script>
<?php

  $date  = date('Y-m-d');
  unset($_SESSION['cart']['items']);
  $_SESSION['cart']['items'] = [];
  $arr = $_SESSION['itemat'];

  unset($_SESSION['itemat']);
  unset($_SESSION['dis']);
  unset($_SESSION['percent']);
  $update  = "UPDATE user set user_city ='{$_POST['city']}' where user_id = $user_id ";
  $arr1=str_replace("'"," ",$arr);
  if (isset($_SESSION['cop_id'])) {
    $cop_id = $_SESSION['cop_id'];
  } else $cop_id = 0;

  if (!empty($cop_id)) {
    $insert  = "INSERT INTO history(history_id,user_id,item_id,history_date,coupon_id,order_price)
                    VALUES ($SixDigitRandomNumber,$user_id,'$arr1','$date',$cop_id,$fp)";
  } else {

    $insert  = "INSERT INTO history(history_id,user_id,item_id,history_date,coupon_id,order_price)
                    VALUES ($SixDigitRandomNumber,$user_id,'$arr1','$date',0,$fp)";
  }
  unset($_SESSION['cop_id']);
  $conn->query($update);
  $conn->query($insert);

  echo "<meta http-equiv='refresh' content='0; URL=  http://localhost/pharmacy/money/thanks.php?order_it=$SixDigitRandomNumber&price=$fp'>";

}
include("footerMoney.php"); ?>