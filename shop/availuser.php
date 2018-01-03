<?php
include('conn.php');
if(isset($_POST) & !empty($_POST))
{
 $username = mysqli_real_escape_string($con, $_POST['username']);
 $check = "SELECT * FROM customer WHERE cus_username = '$username'";
 $res = mysqli_query($con,$check) or die(mysqli_error($con));
 $count = mysqli_num_rows($res);
 if($count>0){
   echo "<div style=\"color:red;\">$username is not available</div>";
   echo "<script>
       alert(\"username exist!\");
   </script>";
 }else {
   echo "<div style=\"color:green;\">$username is available</div>";

 }
}
?>
