<?php include("headerCArt.php"); ?>

<div class="container mt-5">
  <main>
    <div class="py-5 text-center">
      <br>
      <h2>Checkout</h2>
    </div>
    <?php include("../admin/includes/config.php"); ?>
    <?php
    $_SESSION['full_price']=0;
    if (isset($_SESSION['login'])) {
      if ($_SESSION['login'] == 'true') {
        $user_id = $_SESSION['users']['id'];
        $cities = ['Amman', 'Irbid', 'Jarash', 'Blue City', 'Ajloun'];
       
      } else header("Location:http://localhost/pharmacy/account/signup.php");
    } else header("Location:http://localhost/pharmacy/account/signup.php");

    if (isset($_SESSION['cart'])) {
      $NOI = count($_SESSION['cart']['items'])-2;
      $arr = implode(",", ($_SESSION['cart']['items']));
      $select = "SELECT item_id,item_name,item_price, item_title FROM item where item_id in($arr) ";
      $res = $conn->query($select);
    }
    
    ?>
     <div class="row">
      <div class="col-md-2"></div>
      <div  class="col-md-8">
        <div style="display:none;"  id="myP1" class="alert alert-success fade show mt-4"  role="alert">
          <strong>Your Order Has been taken We will contact you within  2 days </strong> 
          <button   type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
      <div class="col-md-2 mt-2"></div>
    </div>
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span  style="color: #0096db;">Your cart</span>
          <span class="badge  rounded-pill" style="background-color: #0096db; color:white"><?php echo $NOI;?></span>
        </h4>
        <ul class="list-group mb-3">
          <?php while($row= $res->fetch_assoc()):?>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><?php echo $row['item_name'];?></h6>
              <small class="text-muted"><?php echo $row['item_title'];?></small>
            </div>
            <span class="text-muted"><?php $_SESSION['full_price']+=$row['item_price']; echo "$".$row['item_price'];?></span>
          </li>
          <?php endwhile;?>
          <?php 
          if (isset($_POST['promo'])) {
            $promo = $_POST['promo'];
              $select = "SELECT * FROM coupon WHERE coupon_code = '$promo'";
             
              if ($conn->query($select)) {
                $res_co=$conn->query($select);
                $coupon = $promo;
                $percent = $res_co->fetch_assoc()['coupon_percentage'];
              }
           
          }
          ?>
          
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Promo code</h6>
              <small><?php echo @$coupon?></small>
            </div>
            <span class="text-success"><?php echo @$percent." %";?></span>
          </li>
          <?php $dis= $_SESSION['full_price']*@$percent/100;?>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$<?php echo ($_SESSION['full_price']-$dis);?></strong>
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
              <input type="text" class="form-control" name="city" id="address" placeholder="Amman, Irbid, Bluecity" required="">
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

            <button class="w-100 btn btn-primary btn-md"style="background-color: #0096db;" name="submit_payment" type="submit_payment">Confirm to checkout</button>
        </form>
        <a class="w-100 btn btn-primary btn-md mt-1" style="background-color: #0096db;" href="http://localhost/pharmacy/index.php">
        Continue Shopping
        </a>
      </div>
    </div>
  </main>
</div>
<?php
if (isset($_REQUEST['submit_payment'])){?>
      <script>
          document.getElementById("myP1").style.display = "block";
      </script>   
<?php 
$update  = "UPDATE user set user_city ='{$_POST['city']}' where user_id = $user_id ";
$conn->query($update);


}
 include("footerMoney.php"); ?>