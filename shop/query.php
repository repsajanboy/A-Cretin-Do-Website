<?php
include('conn.php');
session_start();
$query_function = $_GET['query'] ;
if($query_function=="login"){

	$uname=$_POST['username'];
	$pass=$_POST['password'];
	$verify = "SELECT * from customer where cus_username= '$uname' and cus_password = '".md5($pass)."'";
	$result = mysqli_query($con,$verify);
	$found_user = mysqli_num_rows($result);
	$theuser = mysqli_fetch_array($result);

	if ($found_user==1){
		$_SESSION['user_user']=$theuser['cus_username'];
		header("location:index.php?p=1");
	}else{
		header("location:login.php?p=1&error=1");
	}
}else if($query_function=="adminlogin"){

	$uname=$_POST['username'];
	$pass=$_POST['password'];
	$verify = "SELECT * from adminuser where admin_user= '$uname' and admin_password = '".md5($pass)."'";
	$result = mysqli_query($con,$verify);
	$found_user = mysqli_num_rows($result);
	$theuser = mysqli_fetch_array($result);

	if ($found_user==1){
		$_SESSION['admin_admin']=$theuser['admin_id'];
		header("location:adminpage.php?p=1");
	}else{
		header("location:adminlogin.php?p=1&error=1");
	}
}else if($query_function=="registernew"){
	$uname=$_POST['username'];
  $pass=$_POST['password'];
	$email=$_POST['email'];
  $fullname=$_POST['fullname'];
  $contact=$_POST['contact'];
	$insert = "INSERT INTO `customer` (`cus_username`, `cus_password`, `cus_email`, `cus_fullname`, `cus_contact`) VALUES ('$uname', '".md5($pass)."', '$email', '$fullname', '$contact')";
	 $result =  mysqli_query($con,$insert) or die(mysqli_error($con));
	 if ($result==1){
	$verify = "SELECT * from customer where cus_username= '$uname' and cus_password = '".md5($pass)."'";
	$result = mysqli_query($con,$verify);
	$found_user = mysqli_num_rows($result);
	$theuser = mysqli_fetch_array($result);
		$_SESSION['user_user']=$theuser['cus_username'];
	 header("location:index.php");}
}else if($query_function=="remorder"){
	$Id = $_GET['ID'];
	$verify = "DELETE FROM `cart` where cart_Description = '$Id' ";
	$result = mysqli_query($con,$verify);
			if($result==1){
			$quantity1 = $_GET['quantity'];
			$stock = "SELECT * FROM product WHERE product_Name ='$Id'";
			$result1 =  mysqli_query($con,$stock) or die(mysqli_error($con));
			while($row1 = mysqli_fetch_array($result1)){
			$number = $row1['product_Stock'];
			}
			$minus = $number + $quantity1;
			$update = "UPDATE product SET product_Stock='$minus' WHERE product_Name='$Id'";
			$result2 = mysqli_query($con,$update);
				header("location:order.php");
			}
}else if($query_function=="removecus"){
	$Id = $_GET['ID'];
	$verify = "DELETE FROM `customer` where cus_username = '$Id' ";
	$result = mysqli_query($con,$verify);
			if($result==1){
				header("location:adminpage.php");
			}
}
else if($query_function=="removeprod"){
	$Id = $_GET['ID'];
	$verify = "DELETE FROM `product` where product_Id = '$Id' ";
	$result = mysqli_query($con,$verify);
			if($result==1){
				header("location:adminpage.php");
			}
}else if($query_function=="neworder"){
	$Id = $_SESSION['user_user'];
	$verify = "DELETE FROM `cart` where cart_customer = '$Id' ";
	$result = mysqli_query($con,$verify);
			if($result==1){
				header("location:index.php");
			}
}else if($query_function=="addprod"){
	$name = $_POST['productname'];
	$price = $_POST['price'];
	$stock = $_POST['stock'];
	$image = $_POST['image'];
	$details = $_POST['details'];
	$verify = "INSERT INTO `product` (`product_Id`, `product_Name`, `product_Stock`, `product_Price`, `product_Picture`, `product_Details`) VALUES (NULL, '$name', '$price', '$stock', 'img/$image', '$details')";
	$result = mysqli_query($con,$verify);
			if($result==1){
				header("location:adminpage.php");
			}
}else if($query_function=="updatecus"){
	$ID = $_GET['ID'];
	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];

	$query = "UPDATE `customer` SET `cus_username`='$username',`cus_email`='$email',`cus_fullname`='$fullname',`cus_contact`='$contact' WHERE cus_username ='$ID'";
	$result = mysqli_query($con,$query);
	if($result==1){
			header("location:adminpage.php");
	}else {
		echo "Failed";
	}
}else if($query_function=="updateprod"){
	$ID = $_GET['ID'];
	$name = $_POST['productname'];
	$price = $_POST['price'];
	$stock = $_POST['stock'];

	$query = "UPDATE `product` SET `product_Name`='$name',`product_Price`='$price',`product_Stock`='$stock' WHERE product_Id ='$ID'";
	$result = mysqli_query($con,$query);
	if($result==1){
			header("location:adminpage.php");
	}else {
		echo "Failed";
	}
}
?>
