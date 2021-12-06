<?php include("./admin/includes/config.php"); ?>

<?php
$fetch_query = "SELECT * FROM item WHERE item_id=" . $_GET["id"];
$result = $conn->query($fetch_query);

?>

<?php include("header.php"); ?>

<!-- ***** Main Banner Area Start ***** -->
<div class="page-heading" id="top">
  <div class="container">
    <div class="row">
     
    </div>
  </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<?php

$row = $result->fetch_assoc();

?>
    <div class="row">
      <div class="col-md-2"></div>
      <div  class="col-md-8">
        <div style="display: none;" id="myP1" class="alert alert-success alert-dismissible fade show mt-4" role="alert">
          <strong>The item Added Successfully </strong> 
          <button   type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
      <div class="col-md-2"></div>
    </div>
<!-- ***** Product Area Starts ***** -->
<section class="section mt-0" id="product">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="left-images">
          <img src="admin/assets/item_images/<?php echo $row["item_image"]; ?>" alt="">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="right-content">
          <h4><?php echo $row["item_name"]; ?></h4>
          <span class="price"><?php echo "$" . $row["item_price"]; ?></span>
          <ul class="stars">
            <li><i class="fa fa-star"></i></li>
            <li><i class="fa fa-star"></i></li>
            <li><i class="fa fa-star"></i></li>
            <li><i class="fa fa-star"></i></li>
            <li><i class="fa fa-star"></i></li>
          </ul>
          <span><?php echo $row["item_desc"]; ?></span>
          <div class="quantity-content">
            <div class="left-content">
              <h6>No. of Orders</h6>
            </div>
            <div class="right-content">
              <div class="quantity buttons_added">
                <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
              </div>
            </div>
          </div>
          <div class="total">
            <h4>Total: <?php echo "$" . $row["item_price"]; ?></h4>
          </div>
          <Button  class="btn ml-3 mt-1" style="background-color:#0096db;"><a style="color:white" href="<?php echo ($_SESSION['login'] == 'true') ? "money/addToCart.php?m=no&id={$_GET['id']}" : "#" ?>">Add To Cart</a></Button>
        </div>
      </div>
    </div>
   

    <?php

    if (isset($_POST["publish-comment"])) {

      $comment_statment = $_POST["comment-input"];

      $add_query = "INSERT INTO comments (user_id,comment_statment,item_id) VALUES ('{$_SESSION['users']['id']}','$comment_statment',{$_GET['id']})";

      $res = mysqli_query($conn, $add_query);

      echo "<meta http-equiv='refresh' content='0'>";
    }

    ?>

    <div class="row">
      <div class="col-md-12 pt-3 pb-3">
        <h5 class="mb-2">Add Comment</h5>
        <form method="POST" class="needs-validation" novalidate>
          <div class="form-row">
            <div class="col-md-12 mb-8">
              <textarea name="comment-input" class="form-control" id="validationCustom01" placeholder="Write Comment" cols="600" rows="7"></textarea>
              <!-- <input type="text"  id="validationCustom01"  value="" required name="comment-input"> -->
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <button class="btn mt-2" style="background-color:#0096db;color:white" type="submit" name="publish-comment">Publish Comment</button>
        </form>
        <br><br>
        <h5 class="mb-2">Reviews</h5>
      <hr>
      <?php
      $fetch_query = "SELECT user_fullname,comment_statment FROM comments,user where comments.user_id = user.user_id and item_id = {$_GET['id']} ";
      $result = $conn->query($fetch_query);
      ?>

      <?php while ($row = $result->fetch_assoc()) : ?>
        <div class="col-md-12 d-flex pt-2 pb-2 mb-1" style="background-color: #e9e9e9; border-radius: 6px">
          <div class="user-img-container">
            <img class="user-img" style="width: 70px;" src="assets/images/user-1.png" alt="">
          </div>
          <div class="user-comment-container d-flex flex-column" style="padding: 10px;">
            <h5 class="username"><?php echo $row["user_fullname"] ?></h5>
            <p class="user-comment">
              <?php echo $row["comment_statment"] ?>
            </p>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
  </div>
</section>
<!-- ***** Product Area Ends ***** -->
<!-- ***** Subscribe Area Ends ***** -->
<?php include("footer.php");
if (isset($_GET['added'])) {?>
  <script>
 
      document.getElementById("myP1").style.display = "block";
     
  </script>
   <?php
 }
 ?>