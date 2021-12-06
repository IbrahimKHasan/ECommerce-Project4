<?php 
include("header.php");
include("admin/includes/config.php"); 
?>
    <!-- ***** Header Area End ***** -->
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4 class='p-3 mb-2 bg-white ' style="opacity: .75;">We Are A Pharmacy</h4>
                            </div>
                            <img  src="assets/images/main.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                        <?php
                                //select cat

                                 $select_cat="SELECT * FROM category ";
                                $query_cat=mysqli_query($conn,$select_cat);
                                             
                                while($row_cat=mysqli_fetch_assoc($query_cat)){ ?>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4 class='p-3 mb-2 bg-white ' style="opacity: .75;"><?php echo $row_cat["cat_name"]; ?></h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4 ><?php echo $row_cat["cat_name"]; ?></h4>
                                                <div class="main-border-button">
                                                    <a href="products.php?id=<?php echo $row_cat["cat_id"];?>">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="admin/assets/categories_images/<?php echo $row_cat["cat_image"]; ?>" width="100%" height="255px" style='  border-style: groove;'>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- *****  Area Starts ***** -->
    <section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Proudcts Latest </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                        <?php
                                //select item

                                $select_item="SELECT item_id,item_name,item_price,item_image,item_title FROM item order By item_date DESC limit 7 ";

                                
                                $query_item=mysqli_query($conn,$select_item);
                                             
                                while($row_item=mysqli_fetch_assoc($query_item)){ ?>
                            <div class="item" >
                                <div class="thumb">
                                    <div class="hover-content">
                                        <div class="inner_item" style="background-color:white;opacity:1">
                                        <p style="color:black;font-weight:bolder"><?php echo $row_item['item_title']?></p>
                                        </div>
                                    </div>
                                    <a href="single-product.php?id=<?php echo $row_item['item_id'];?>">
                                    <img  src="admin/assets/item_images/<?php echo $row_item["item_image"]; ?>" alt="">
                                    </a>
                                </div>
                                <div class="down-content">
                                    <a href="single-product.php?id=<?php echo $row_item['item_id'];?>">
                                    <h4><?php echo $row_item["item_name"]; ?></h4>
                                    </a>
                                    <span><?php echo "$". $row_item["item_price"]; ?></span>
                                    <span> <a href=" <?php echo ($_SESSION['login']=='true')?"money/addToCart.php?id={$row_item['item_id']}" :"#"?>"><Button style="background-color:#0096db;color:white" class="btn mt-2">Add to Cart</Button></a></span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <?php }?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Men Area Ends ***** -->

    <!-- ***** Women Area Starts ***** -->
    <section class="section" id="women">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Quit Smoking</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="women-item-carousel">
                        <div class="owl-women-item owl-carousel">
                        <?php
                                //select item

                                $select_item="SELECT item_id,item_name,item_price,item_image,item_title FROM item WHERE cat_id=2  ";
                                $query_item=mysqli_query($conn,$select_item);
                                             
                                while($row_item=mysqli_fetch_assoc($query_item)){ ?>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content" style="background-color:white;opacity:1">
                                    <p style="color:black;font-weight:bolder"><?php echo $row_item['item_title']?></p>
                                    </div>
                                    <a href="single-product.php?id=<?php echo $row_item['item_id'];?>">
                                    <img  src="admin/assets/item_images/<?php echo $row_item["item_image"]; ?>" alt="">
                                    </a>
                                </div>
                                <div class="down-content">
                                    <a href="single-product.php?id=<?php echo $row_item['item_id'];?>">
                                    <h4><?php echo $row_item["item_name"]; ?></h4>
                                    </a>
                                    <span><?php echo "$". $row_item["item_price"]; ?></span>
                                    <span> <a href=" <?php echo ($_SESSION['login']=='true')?"money/addToCart.php?id={$row_item['item_id']}" :"#"?>"><Button style="background-color:#0096db;color:white" class="btn mt-2">Add to Cart</Button></a></span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Women Area Ends ***** -->

    <!-- ***** Kids Area Starts ***** -->
    <section class="section" id="kids">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Product Offer </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="kid-item-carousel">
                        <div class="owl-kid-item owl-carousel">
                        <?php
                                //select item

                                $select_item="SELECT item_id,item_name,item_price,item_image,price_offer,item_title FROM item order By price_offer DESC limit 7  ";
                                $query_item=mysqli_query($conn,$select_item);
                                             
                                while($row_item=mysqli_fetch_assoc($query_item)){ ?>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content" style="background-color:white;opacity:1">
                                    <p style="color:black;font-weight:bolder"><?php echo $row_item['item_title']?></p>
                                    </div>
                                    <div class="product-badge bg-danger border-default text-body">SALE !</div> 
                                    <a href="single-product.php?id=<?php echo $row_item['item_id'];?>">
                                    <img  src="admin/assets/item_images/<?php echo $row_item["item_image"]; ?>" alt="">
                                    </a>
                                </div>
                                <div class="down-content">
                                    <a href="single-product.php?id=<?php echo $row_item['item_id'];?>">
                                    <h4><?php echo $row_item["item_name"]; ?></h4>
                                    </a>
                                    <span style='text-decoration-line: line-through ; display:inline-block'><?php echo "$". $row_item["item_price"];?> </span>
                                    <span style='display:inline-block ; color:black ; font-weight:bold'><?php echo "$". $row_item["price_offer"];?> </span>
                                    <span> <a href=" <?php echo ($_SESSION['login']=='true')?"money/addToCart.php?id={$row_item['item_id']}" :"#"?>"><Button style="background-color:#0096db;color:white" class="btn mt-2">Add to Cart</Button></a></span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>

                                </div>
                                
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Kids Area Ends ***** -->

    <!-- ***** Explore Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h2>COVID-19 vaccines if you live in Jordan</h2>
                        <span>We will update this page when the Government of Jordan announces new information on the national vaccination programme. You can sign up to get email notifications when this page is updated.</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i><p>You are not allowed to redistribute this template ZIP file on any other website.</p>
                        </div>
                        <p>The Jordanian national vaccination programme started in February 2021 and is using several vaccines including AstraZeneca, Pfizer-BioNTech and Sinopharm. </p>
                        <p>If this template is beneficial for your website or business, please kindly <a rel="nofollow" href="https://paypal.me/templatemo" target="_blank">support us</a> a little via PayPal. Please also tell your friends about our great website. Thank you.</p>
                        <div class="main-border-button">
                            <a href="https://www.who.int/ar/emergencies/diseases/novel-coronavirus-2019" target:_blank>Discover More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">

                            <div class="col-lg-12">
                                <div class="first-image">
                                    <img src="assets/images/corona.jpg" alt="">
                                </div>
                            </div>
  

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Explore Area Ends ***** -->


    <!-- ***** Subscribe Area Starts ***** -->
    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2>By Subscribing To Our Newsletter You Can Get 30% Off</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                    <form id="subscribe" action="" method="get">
                        <div class="row">
                          <div class="col-lg-5">
                            <fieldset>
                              <input name="name" type="text" id="name" placeholder="Your Name" required="">
                            </fieldset>
                          </div>
                          <div class="col-lg-5">
                            <fieldset>
                              <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
                            </fieldset>
                          </div>
                          <div class="col-lg-2">
                            <fieldset>
                              <button type="submit" id="form-submit" class="main-dark-button"><i class="fa fa-paper-plane"></i></button>
                            </fieldset>
                          </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <ul>
                                <li>Store Location:<br><span>Tabarbur, Amman, Jordan</span></li>
                                <li>Phone:<br><span>962-787-318-813</span></li>
                                <li>Office Location:<br><span>Tabarbur</span></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul>
                                <li>Work Hours:<br><span>07:30 AM - 9:30 PM Daily</span></li>
                                <li>Email:<br><span>info@Group2.com</span></li>
                                <li>Social Media:<br><span><a href="#">Facebook</a>, <a href="#">Instagram</a>, <a href="#">Behance</a>, <a href="#">Linkedin</a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Subscribe Area Ends ***** -->
    
    <?php include("footer.php");?>