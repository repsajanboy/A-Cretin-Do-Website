<?php
session_start();
$customer = $_SESSION['user_user'];
$verify = "DELETE FROM `cart` where cart_Id = '$customer' ";
$result = mysqli_query($con,$verify);
if($result==1){
  header("location:index.php");
}
 ?>
