<?php include("includes/config.php"); ?>
<?php include("includes/header.php"); ?>

<div class="app-main">
    <?php include("includes/sidebar.php"); ?>

    <div class="app-main__outer">
        <?php
        $user = array();
        
        if (isset($_POST['submit'])) {
            $item_date= date('Y-m-d');
            $user = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'phone' => $_POST['phone'],
                'city' => $_POST['city']

            ];
            if (isset($_GET['method'])) {
               
            if($_GET['method']=='edit'){
               
            $insert = "UPDATE user SET user_fullname = '{$user['name']}',
                                        user_email  = '{$user['email']}',
                                        user_password = '{$user['password']}',
                                        user_phone = {$user['phone']},
                                        user_city = '{$user['city']}' where user_id = {$_GET['id']}";
            if($conn->query($insert)){
                echo "";  
            } else echo $insert." -- ".$conn->error;  
        }
            }else{
           
            $insert = "INSERT INTO user(user_fullname,user_email,user_password,user_phone,user_city,user_date_create)
                              VALUES ('{$user['name']}','{$user['email']}','{$user['password']}',{$user['phone']},'{$user['city']}','$item_date')";
            if($conn->query($insert)){
                echo "";  
            } else echo $insert." -- ".$conn->error;  
        }

           
        }
        if(isset($_GET['method'])){
            if($_GET['method']=='edit'){
               
               $select = "SELECT * FROM user where user_id = {$_GET['id']}";
               
                $res=$conn->query($select);
                $result=$res->fetch_assoc();
                
             
            }else{
                $del = "Delete from user where user_id ={$_GET['id']} ";
                $conn->query($del);
            }
        }

        ?>

        <div class="app-main__inner">
            <div class="col">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Add New User</h5>
                        <form method="POST" class="needs-validation" novalidate>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">Email</label>
                                    <input type="email" name="email" value="<?php echo @$result['user_email'];?>" class="form-control" id="validationCustom03" placeholder="E-mail" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Email
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Name</label>
                                    <input type="text" name="name"  value="<?php echo @$result['user_fullname'];?>" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>


                            </div>
                            <div class="form-row">

                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04">Password</label>
                                    <input type="password" name="password"  value="<?php echo @$result['user_password'];?>" class="form-control" id="validationCustom04" placeholder="Password" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid password.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04">Phone</label>
                                    <input type="text" name="phone"  value="<?php echo @$result['user_phone'];?>" class="form-control" id="validationCustom04" placeholder="Phone" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Phone.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04">City</label>
                                    <input type="text" name="city"  value="<?php echo @$result['user_city'];?>" class="form-control" id="validationCustom04" placeholder="City" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>

                            </div>

                            <button class="btn btn-primary" type="submit" name="submit">Add</button>
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


            <div class="col-lg-12">
                <?php
                
                $select = "SELECT * FROM user";
                $res=$conn->query($select);
              
                ?>
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">User Data</h5>
                        <table class="mb-0 table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>City</th>
                                    <th>Last-Login</th>
                                    <th>Date-Created</th>
                                    <th> Edit  </th>
                                    <th> Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row =$res->fetch_assoc()):?>
                                <tr>
                                    <th scope="row"><?php echo $row['user_id']?></th>
                                    <td><?php echo $row['user_fullname']?></td>
                                    <td><?php echo $row['user_email']?></td>
                                    <td><?php echo $row['user_phone']?></td>
                                    <td><?php echo $row['user_city']?></td>
                                    <td><?php echo $row['user_last_login']?></td>
                                    <td><?php echo $row['user_date_create']?></td>
                                    <td>
                                        <a href="manage_users.php?method=edit&&id=<?php echo $row['user_id'];?>">
                                        <button class="btn btn-success btn-sm">
                                            Edit
                                        </button>
                                        </a>
                                        
                                    </td>
                                    <td>
                                    <a href="manage_users.php?method=del&&id=<?php echo $row['user_id'];?>">
                                        <button class="btn btn-danger btn-sm">
                                            Delete
                                        </button>
                                        </a>
                                    </td>
                                </tr>
                                <?php endwhile;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("manage-users").classList.add("mm-active")
</script>
<script type="text/javascript" src="./assets/scripts/main.js"></script>