<?php include("includes/header.php"); 
      include('includes/config.php');
   ?>



<div class="app-main">
<?php include("includes/sidebar.php"); ?>

    <div class="app-main__outer">

    <?php
	 
     $id = $_POST['userID'];
     $query = "SELECT * FROM coupon WHERE coupon_id = $id ";
     $query_run = mysqli_query($conn , $query) ;
     $row = mysqli_fetch_assoc($query_run)
 
     
 
 
         ?>  
        <div class="app-main__inner">
            <div class="col">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Coupon</h5>
                        <form class="needs-validation" novalidate action="code.php" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row ['coupon_id'] ?>">

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01"> Coupon Code</label>
                                    <input type="text" name='edit_coupon_code' class="form-control" value="<?php echo $row['coupon_code'] ?>" placeholder="Inter Coupon Code" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Coupon Percentage</label>
                                    <input type="text" name='edit_coupon_percentage' class="form-control" value="<?php echo $row['coupon_percentage'] ?>" placeholder="Inter Coupon Percentage"  required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                </div>
                            </div>
                            <div class="card-footer">
                             <a href="manage_coupon.php" class="btn btn-danger btn-sm"> CANCEL </a>
		                     <button type="submit" name="update_coupon" class="btn btn-primary btn-sm">  UPdate  </button>
                           </div>                 
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
     
        </div>
    </div>
</div>