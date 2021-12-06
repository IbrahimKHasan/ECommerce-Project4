<?php include("header.php");
include "admin/includes/config.php";
// session_start();

$id=$_SESSION["users"]["id"];
$select="SELECT * FROM user WHERE user_id=$id";

$query=mysqli_query($conn,$select);
$row=mysqli_fetch_assoc($query);

if(isset($_POST["edit_btn"])){
	
	$u_user_fullname  =$_POST["user_fullname"];
	$u_user_email     =$_POST["user_email"];
	$u_user_phone     =$_POST["user_phone"];
	$u_user_password  =$_POST["user_password"];
	$u_user_city      =$_POST["user_city"];
	
	$edit="UPDATE user SET user_fullname='$u_user_fullname',user_email='$u_user_email',
	                       user_password='$u_user_password',user_phone='$u_user_phone',
						   user_city='$u_user_city'
		                   WHERE user_id=$id" ;

	$queryedit=mysqli_query($conn,$edit);
	echo "<meta http-equiv='refresh' content='0'>";

	
		
}


?>





    <link rel="stylesheet" href="setting.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
	<div class="page-heading about-page-heading" id="top">
      
    </div>
    <!-- ***** Main Banner Area End ***** -->
    
	<form action="" method="post">
<div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
				</div>
				<h5 class="user-name"><?php echo $row["user_fullname"]?></h5>
				<h6 class="user-email"><?php echo $row["user_email"]?></h6>
			</div>
			
		</div>
	</div>
</div>
</div>

<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Personal Details</h6>
			</div>
			
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">Full Name</label>
					<input type="text" name="user_fullname" class="form-control" id="fullName" value="<?php echo $row["user_fullname"]?>" placeholder="Enter full name">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Email</label>
					<input type="email"  name="user_email" class="form-control" id="eMail" value="<?php echo $row["user_email"]?>" placeholder="Enter email ID">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Phone</label>
					<input type="text"  name="user_phone" class="form-control" id="phone" value="<?php echo $row["user_phone"]?>" placeholder="Enter phone number">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">Password</label>
					<input type="password"  name="user_password" class="form-control" id="website" value="<?php echo $row["user_password"]?>" placeholder="password">
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mt-3 mb-2 text-primary">Address</h6>
			</div>
			<!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Street">Street</label>
					<input type="name" class="form-control" id="Street" placeholder="Enter Street">
				</div>
			</div> -->
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="ciTy">City</label>
					<input type="name"  name="user_city" class="form-control"  id="ciTy" value="<?php echo $row["user_city"]?>" placeholder="Enter City">
				</div>
			<!-- </div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="sTate">State</label>
					<input type="text" class="form-control" id="sTate" placeholder="Enter State">
				</div>
			</div> -->
			<!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="zIp">Zip Code</label>
					<input type="text" class="form-control" id="zIp" placeholder="Zip Code">
				</div>
			</div> -->
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
				<a href="index.php"><button type="button" id="submit" name="cancel" class="btn btn-secondary">Cancel</button></a>	
					<button type="submit" id="submit" name="edit_btn" class="btn btn-primary">Update</button>
				</div>
			</div>
			
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include("footer.php");?>