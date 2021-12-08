<?php
include("includes/config.php");

$query_user = "SELECT * FROM user" ;
$query_run1=mysqli_query($conn , $query_user);
$users= mysqli_num_rows($query_run1);

$query_order = "SELECT * FROM history" ;
$query_run2=mysqli_query($conn , $query_order);
$orders= mysqli_num_rows($query_run2);

$query_item = "SELECT * FROM item" ;
$query_run3=mysqli_query($conn , $query_item);
$items= mysqli_num_rows($query_run3);

$sales="SELECT SUM(order_price) FROM history";
$row=mysqli_query($conn , $sales);
$sum = mysqli_fetch_assoc($row);
?>
<?php
//Header of the Page
include("includes/header.php");
?>
<!-- Main Content -->
<div class="app-main">
  <?php include("includes/sidebar.php"); ?>
  <div class="app-main__outer">
    <div class="app-main__inner">
      <div class="row">

        <div class="col-md-4 col-xl-4">
          <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
              <div class="widget-content-left">
                <div class="widget-heading">Total Orders</div>
              </div>
              <div class="widget-content-right">
                <div class="widget-numbers text-white"><span><?php echo $orders; ?></span></div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-xl-4">
          <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
              <div class="widget-content-left">
                <div class="widget-heading">Total Sales</div>
              </div>
              <div class="widget-content-right">
                <div class="widget-numbers text-white"><span><?php echo"$".ceil($sum['SUM(order_price)']) ; ?></span></div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-xl-4">
          <div class="card mb-3 widget-content bg-grow-early">
            <div class="widget-content-wrapper text-white">
              <div class="widget-content-left">
                <div class="widget-heading">Total Users Rigestered</div>
              </div>
              <div class="widget-content-right">
                <div class="widget-numbers text-white"><span><?php echo $users; ?></span></div>
              </div>
            </div>
          </div>
        </div>

      </div>
<!-- 
      <div class="row">
        <div class="card-header-tab card-header-tab-animation card-header col-md-11 col-xl-11 m-auto ">
          <div class="card-header-title">
            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
            Sales Report
          </div>
          <ul class="nav">
          </ul>
        </div>
        <div class="card mb-3 widget-chart widget-chart2 text-left w-100 col-md-11 col-xl-11 m-auto">
          <div class="widget-chat-wrapper-outer">
            <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
              <canvas id="canvas"></canvas>
            </div>
          </div>
        </div>
      </div> -->





















































    </div>
  </div>
  <script>
    document.getElementById("manage-dash").classList.add("mm-active")
  </script>
  <script type="text/javascript" src="./assets/scripts/main.js"></script>