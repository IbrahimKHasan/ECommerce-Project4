<?php include("includes/config.php  ");?>
<?php include("includes/header.php"); ?>

<div class="app-main">
<?php include("includes/sidebar.php"); 

$selectx = "SELECT * from history,user where user.user_id = history.user_id;";
$rowx = $conn->query($selectx);

?>

    <div class="app-main__outer">
        <div class="app-main__inner">
        <div class="col-lg-12">
        <div class="main-card mb-3 card">
          <div class="card-body">
            <h5 class="card-title">Orders History</h5>
            <table class="mb-0 table table-striped">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>User Name</th>
                  <th>Items</th>
                  <th>Order Date</th>
                  <th>Order Price</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while($row = $rowx->fetch_assoc()){?>
                <tr>
                  <th scope="row"><?php echo $row["history_id"]; ?></th>
                  <td><?php echo $row["user_fullname"]; ?></td>
                  <td><?php echo str_replace("-","<br>",substr($row["item_id"],2)); ?></td>
                  <td><?php echo $row["history_date"]; ?></td>
                  <td><?php echo "$".$row["order_price"];?></td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("manage-history").classList.add("mm-active")
</script>
<script type="text/javascript" src="./assets/scripts/main.js"></script>