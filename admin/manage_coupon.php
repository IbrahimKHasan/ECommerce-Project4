<?php include("includes/header.php"); 
      include('includes/config.php');
   ?>



<div class="app-main">
<?php include("includes/sidebar.php"); ?>

    <div class="app-main__outer">


        <div class="app-main__inner">
            <div class="col">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Coupon</h5>
                        <form class="needs-validation" novalidate action="code.php" method="POST">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01"> Coupon Code</label>
                                    <input type="text" name='coupon_code' class="form-control" id="validationCustom01" placeholder="Inter coupon code" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Poupon Percentage</label>
                                    <input type="text" name='coupon_percentage' class="form-control" id="validationCustom02" placeholder="Inter coupon percentage"  required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-primary" type="submit"  name='add_coupon'>ADD</button>
                        </form>

                        <script>
                            // Example starter JavaScript for disabling form submissions if there are invalid fields
                            (function() {
                                'use strict';
                                window.addEventListener('load', function() {
                                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                    var forms = document.getElementsByClassName('needs-validation');
                                    // Loop over them and prevent submission
                                    var validation = Array.prototype.filter.call(forms, function(form) {
                                        form.addEventListener('submit', function(event) {
                                            if (form.checkValidity() === false) {
                                                event.preventDefault();
                                                event.stopPropagation();
                                            }
                                            form.classList.add('was-validated');
                                        }, false);
                                    });
                                }, false);
                            })();
                        </script>
                    </div>

                </div>
            </div>
            <?php

$query = "SELECT * FROM coupon";
$query_run = mysqli_query($conn, $query);
?>

            <div class="col-lg-12">

                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Coupon Data</h5>
                        <table class="mb-0 table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Coupon Code</th>
                                    <th>Coupon Percentage</th>
                                    <th>Edit </th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php
         if (mysqli_num_rows($query_run) > 0)
          {
            while ($row = mysqli_fetch_assoc($query_run))
             {
              ?>
                                <tr>
                                    <th scope="row"><?php echo $row ['coupon_id'];?></th>
                                    <td><?php echo $row ['coupon_code'];?></td>
                                    <td><?php echo $row ['coupon_percentage'];?>%</td>

                                    <td>
                        <form action="edit_coupon.php" method="post">
                  <input type="hidden" name = "userID" value="<?php echo $row['coupon_id']?>" >
                    <button  type="submit" name="edit_btn" class="btn btn-success btn-sm"> EDIT</button>
                </form>
                             
                        </td>
                        <td>
                        <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['coupon_id']?>">
                  <button type="submit" name="delete_coupon" class="btn btn-danger btn-sm"> DELETE</button>
                </form>
                           
                        </td>


                                </tr>
                                <?php
             }
           }
            else  {
            echo "NO Record Found";
          }
         ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("manage-coupon").classList.add("mm-active")
</script>
<script type="text/javascript" src="./assets/scripts/main.js"></script>