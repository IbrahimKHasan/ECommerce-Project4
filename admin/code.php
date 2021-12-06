<?php 
session_start();
      include('includes/config.php');
      if (isset($_POST['add_admin']))
{  

	$admin_name= $_POST['admin_name'];
	$admin_email= $_POST['admin_email'];
	$admin_password=$_POST['admin_password'];
	$date               = date('Y-m-d');
    $query = "INSERT INTO admin (admin_name,admin_email,admin_password,admin_date_create) VALUES ('$admin_name' , '$admin_email' , '$admin_password','$date' )" ;
    $query_run = mysqli_query($conn , $query);

	if($query_run)
	{
		$_SESSION["status"] = "YOUR DATA IS ADD" ; 
		$_SESSION["status_code"] ="success";
		header("Location: manage_admin.php");

	}
	else
	{
		$_SESSION["status"] = "YOUR DATA IS NOT ADD" ; 
		$_SESSION["status_code"] ="error";
		header("Location: manage_admin.php");
		

	} 
}
if (isset($_POST['update_admin']))
{  
    $id = $_POST['edit_id'];

	$edit_admin_name= $_POST['edit_admin_name'];
	$edit_admin_email= $_POST['edit_admin_email'];
	$edit_admin_password=$_POST['edit_admin_password'];

	$query ="UPDATE admin SET  admin_name='$edit_admin_name' , admin_email= '$edit_admin_email' , admin_password= '$edit_admin_password'   WHERE admin_id= '$id' " ;
	$query_run = mysqli_query($conn , $query);

	if($query_run)
	{
		$_SESSION["status"] = "YOUR DATA IS UPDATED" ; 
		$_SESSION["status_code"] ="success";
		header("Location: manage_admin.php");

	}
	else
	{
		$_SESSION["status"] = "YOUR DATA IS NOT UPDATED" ; 
		$_SESSION["status_code"] ="error";
		header("Location: manage_admin.php");
		

	} 
}
if (isset($_POST['delete_admin']))
{
      $id = $_POST['delete_id'];

      $query = "DELETE FROM admin WHERE admin_id='$id' " ;
      $query_run = mysqli_query($conn , $query);


	if($query_run)
	{
		$_SESSION["status"] = "YOUR DATA IS DELETE" ; 
		$_SESSION["status_code"] ="success";
		header("Location: manage_admin.php");

	}
	else
	{
		$_SESSION["status"] = "YOUR DATA IS NOT DELETE" ; 
		$_SESSION["status_code"] ="error";
		header("Location: manage_admin.php");
		

	} 
}
if (isset($_POST['add_coupon']))
{  

	$coupon_code= $_POST['coupon_code'];
	$coupon_percentage= $_POST['coupon_percentage'];

    $query = "INSERT INTO coupon (coupon_code,coupon_percentage) VALUES ('$coupon_code' , '$coupon_percentage'  )" ;
    $query_run = mysqli_query($conn , $query);

	if($query_run)
	{
		$_SESSION["status"] = "YOUR DATA IS ADD" ; 
		$_SESSION["status_code"] ="success";
		header("Location: manage_coupon.php");

	}
	else
	{
		$_SESSION["status"] = "YOUR DATA IS NOT ADD" ; 
		$_SESSION["status_code"] ="error";
		header("Location: manage_coupon.php");
		

	} 
}
if (isset($_POST['update_coupon']))
{  
    $id = $_POST['edit_id'];

	$edit_coupon_code= $_POST['edit_coupon_code'];
	$edit_coupon_percentage= $_POST['edit_coupon_percentage'];

	$query ="UPDATE coupon SET  coupon_code='$edit_coupon_code' , coupon_percentage= '$edit_coupon_percentage' WHERE coupon_id= '$id' " ;
	$query_run = mysqli_query($conn , $query);

	if($query_run)
	{
		$_SESSION["status"] = "YOUR DATA IS UPDATED" ; 
		$_SESSION["status_code"] ="success";
		header("Location: manage_coupon.php");

	}
	else
	{
		$_SESSION["status"] = "YOUR DATA IS NOT UPDATED" ; 
		$_SESSION["status_code"] ="error";
		header("Location: manage_coupon.php");
		

	} 
}
if (isset($_POST['delete_coupon']))
{
      $id = $_POST['delete_id'];

      $query = "DELETE FROM coupon WHERE coupon_id='$id' " ;
      $query_run = mysqli_query($conn , $query);


	if($query_run)
	{
		$_SESSION["status"] = "YOUR DATA IS DELETE" ; 
		$_SESSION["status_code"] ="success";
		header("Location: manage_coupon.php");

	}
	else
	{
		$_SESSION["status"] = "YOUR DATA IS NOT DELETE" ; 
		$_SESSION["status_code"] ="error";
		header("Location: manage_coupon.php");
		

	} 
}