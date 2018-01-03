<?php
include('conn.php');
  session_start();
$customer = $_SESSION['user_user'];
$product_Picture = $_POST['product_Pic'];
$product_Name =$_POST['product_Name'];
$product_Price = $_POST['product_Price'];
$quantity = $_POST['quantity'];
$total = $_POST['product_Price']*$_POST['quantity'];
$stock2 = "SELECT * FROM product WHERE product_Name ='$product_Name'";
$result2 =  mysqli_query($con,$stock2) or die(mysqli_error($con));
while($row2 = mysqli_fetch_array($result2)){
$number2 = $row2['product_Stock'];
}
if($quantity > $number2){
  echo "<script>
      alert(\"Invalid number of quantity!\");
      window.location.href = \"index.php\";
  </script>";
}else{
$query = "INSERT INTO `cart` (`cart_Product`, `cart_Description`, `cart_Price`, `cart_Quantity`, `cart_Total`, `cart_customer`) VALUES ('$product_Picture', '$product_Name', '$product_Price', '$quantity', '$total', '$customer')";
$result =  mysqli_query($con,$query);
if ($result==1){
$quantity1 = $_POST['quantity'];
$product_Name1 =$_POST['product_Name'];
$stock = "SELECT * FROM product WHERE product_Name ='$product_Name1'";
$result1 =  mysqli_query($con,$stock) or die(mysqli_error($con));
while($row1 = mysqli_fetch_array($result1)){
$number = $row1['product_Stock'];
}
$minus = $number - $quantity1;
$update = "UPDATE product SET product_Stock='$minus' WHERE product_Name='$product_Name1'";
$result2 = mysqli_query($con,$update);
echo "<script>
    alert(\"Order Added!\");
    window.location.href = \"index.php\";
</script>";

}else {
  echo "not successful";
}
}
 ?>
