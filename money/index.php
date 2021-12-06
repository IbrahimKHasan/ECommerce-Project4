<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="style.css">
    <title>Checkout Page</title>
</head>
<body>
    <div class="container mt-4">
    <?php include("../admin/includes/config.php");?>
    <?php
        $user_id = $_SESSION['users']['id'];
        $cities = ['Amman','Irbid','Jarash','Blue City','Ajloun'];
        $select = "SELECT * FROM user where user_id = $user_id";
        $res=$conn->query($select);
        $row= $res->fetch_assoc();

    ?>
       <h1>Checkout</h1>
        <section class="mt-4">
       
            <form name="form">
                <div class="contact">
                    <p class="heading">Contact Information</p>
                    <div class="form-group">
                        <small>E-mail</small>
                        <input type="email" class="form-control" value="<?php echo @$row['user_email'];  ?>" placeholder="Enter you email..." name="email" disabled>
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="form-group">
                        <small>Phone</small>
                        <input type="text" class="form-control" value="<?php echo $row['user_phone'] ?>" placeholder="Enter your phone..." name="phone" required>
                        <i class="fa fa-phone"></i>
                    </div>
                </div>
                <div class="address mt-4">
                    <p class="heading">Shipping Address</p>
                    <div class="form-group">
                        <small>Full name</small>
                        <input type="text" class="form-control" value="<?php echo @$row['user_fullname']?>" placeholder="Enter your name..." name="fullname" required>
                        <i class="fa fa-user-circle"></i>
                    </div>
                    
                    <div class="inline_address">
                        <div class="form-group">
                            <p>Country</p>
                            
                                <select class="dropdown" style="height: 30px;">
                                    <?php foreach ($cities as $value):?>
                                    <option class="dropdown-item"> <?php echo $value?></option>
                                   <?php endforeach;?>
                                    </select>
                          
                            <i class="fa fa-globe-americas"></i>
                        </div>
                        
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" >
                        <label class="form-check-label">
                            Save this information for next time
                        </label>
                    </div>
                </div>
                <a href="http://localhost/pharmacy/">
                <button type="submit" class="btn btn-primary mt-4" onclick="validateForm()">Confirm</button>
                </a>
            </form>
            <?php
                if(isset($_SESSION['cart'])){
                    $NOI=count($_SESSION['cart']['items']);
                    $arr=implode(",",($_SESSION['cart']['items']));
                    $select = "SELECT item_id,item_name,item_price FROM item where item_id in($arr) ";
                    $res = $conn->query($select);
                    
                }
            ?>
            <div class="cart rounded">
                <strong>Order Summary</strong>
                <br>
                <br>
                <strong>Number Of Items = <?php echo $NOI-2;?> </strong>
                <div>
                    <?php while ($row=$res->fetch_assoc()):?>
                    <div class="bottom_row"> <b><?php echo $row['item_name'];?></b> <b><?php echo $row['item_price']." $";?></b></div>
                    <?php endwhile;?>
                </div>   
                <div class="bottom_row" style="display: none;">
                    <p>Shipping</p> 
                    <p>$19</p>
                </div>    
                <div class="bottom_row">
                    <p>Total</p>
                    <p><?php echo $_SESSION['full_price'];?></p>
                </div>    
            </div>
        </section>
        <footer>
            <span></span>
            <span></span>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="app.js"></script>
</body>
</html>