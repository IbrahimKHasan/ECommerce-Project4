<?php include("../admin/includes/config.php"); ?>
<?php

if ($_SESSION['login'] == 'false') { ?>
  <script>
    alert("Go and Login");
  </script>
  <div>
    <a href="../account/login.php">LOGIN</a>
  </div>
<?php

} else {

  if (isset($_GET['id'])) {
    if (isset($_GET['method'])) {

      unset($_SESSION['cart']['items'][array_search($_GET['id'], $_SESSION['cart']['items'])]);
    }
  }

  $arr = implode(",", ($_SESSION['cart']['items']));
  $number = count($_SESSION['cart']['items']);
  $select = "SELECT * FROM item where item_id in($arr) ";


  $_SESSION['full_price'] = 0;

?>
  <div class="mainContainer">
    <div class="card">
      <div class="row">
        <div class="col-md-10 cart m-auto">
          <div class="title">
            <div class="row">
              <div class="col">
                <h4><b>Shopping Cart</b></h4>
              </div>
              <?php
              echo (count($_SESSION['cart']['items']) == 0) ? " " : " "; ?>
              <div class="col align-self-center text-right text-muted"><?php echo $number ?> items</div>
            </div>
          </div>

          <?php
          if (!($conn->query($select))) {
           echo "<h1>The cart is empty</h1>";
          } else{
          $res = $conn->query($select);
          while ($row = $res->fetch_assoc()) : ?>
            <div class="row border-top border-bottom">
              <div class="row main align-items-center">
                <div class="col-2"><img class="img-fluid" src="../admin/assets/item_images/<?php echo $row['item_image'] ?>" alt=""></div>
                <div class="col">
                  <div class="row text-muted"><?php echo @$row['item_name'] ?></div>
                  <div class="row"><?php echo $row['item_title'] ?></div>
                </div>
                <div class="col"> <a href="#"></a><a href="#" class="border">1</a><a href="#"></a> </div>
                <div class="col"><?php $_SESSION['full_price'] += @$row['item_price'];
                                  echo @$row['item_price'] . " $" ?>
                  <a href="cart.php?method=remove&id=<?php echo @$row['item_id'] ?>">
                    <span class="close">&#10005;</span>
                  </a>
                </div>
              </div>
            </div>
          <?php endwhile; }?>

          <div class="row d.flex justify-content-between">
  
            <div class="back-to-shop"><a href="http://localhost/pharmacy/index.php">&leftarrow; <span class="text-muted">Back to shop</span></a></div>
            
            <div class="back-to-shop"><a href="<?php echo (count($_SESSION['cart']['items'])>0? "checkout.php":"http://localhost/pharmacy/index.php")?>"><span class="text-muted"><?php echo (count($_SESSION['cart']['items'])>0? "Checkout":"Add Items");?></span> &rightarrow;</a></div>
          </div>
        </div>

      </div>
    </div>
  </div>
<?php } ?>