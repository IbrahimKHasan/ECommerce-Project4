<?php include("../admin/includes/config.php");?>	
<?php

	if ($_SESSION['login']=='false') {
	?><script>
	alert("Go and Login");
	
</script>
<div>
	<a href="../account/login.php">LOGIN</a>
</div>
<?php
	}else{
	if (isset($_GET['id'])) {
		if (isset($_GET['method'])) {
		unset($_SESSION['cart']['items'][array_search($_GET['id'],$_SESSION['cart']['items'])]);
	}
}
		
	$arr=implode(",",($_SESSION['cart']['items']));

	$select = "SELECT * FROM item where item_id in($arr) ";
	$res = $conn->query($select);
	
	 $_SESSION['full_price']=0;
	
	?>

    <div class="container">
		<div style="margin-top: 100px;">
		<h1>Shopping Cart</h1>
		</div>
	<?php while($row=$res->fetch_assoc()):?>
		<section id="cart"> 
			<article class="product">
				<header id="ImgCart">
				
						<img src="../admin/assets/item_images/<?php echo $row['item_image']?>" alt="">

	</header>

				<div class="content">

					<h1 style="color:#0096db"><?php echo $row['item_name']?></h1>

					<p><?php echo $row['item_title']?></p>

				</div>

				<footer class="content">
					<span class="qt-minus">-</span>
					<span class="qt">1</span>
					<span class="qt-plus">+</span>
					<a href="cart.php?method=remove&id=<?php echo $row['item_id']?>">
					<button type="button" style="width: 70; height:48px;" class="btn btn-outline-danger qt"><i class="bi bi-trash"></i></button>
					</a>

					<h2 class="full-price" style="color:white;background-color:#0096db">
						<?php $_SESSION['full_price'] += $row['item_price']; echo $row['item_price']." $"?>
					</h2>

					<h2 class="price">
						<?php echo $row['item_price']." $ "?>
					</h2>
				</footer>
			</article>

			
        </section>
		<?php endwhile;?>
		<footer id="site-footer">
		<div class="container clearfix">

			<div class="left">
				<h3 style="display: none;" class="tax">Taxes (5%): <span>0</span>$</h3>
				<h3 class="shipping"style="display: none;" >Shipping: <span>0.00</span>$</h3>
			</div>

			<div class="right">
				<h1 class="total">Total: <span><?php echo $_SESSION['full_price'];?></span>$</h1>
				<Button style="background-color:#0096db;color:white;width:100%" class="btn mt-2">
				<a style="color:white" href="checkout.php" >Checkout</a>
				</Button>
			</div>

		</div>
	</footer>

	</div>

	
	<?php }?>
	