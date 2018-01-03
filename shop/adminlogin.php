<?php include('conn.php');
session_start();
if(!empty($_SESSION['admin_admin'])){header('location:adminpage.php');}?>
  <!-- Login Page   -->
<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>A Cretin Do CYOCar</title>


  <link rel="stylesheet" href="css/style1.css">
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" >


</head>
<body>
  <img id="imgg" src="img/cyocar2.png" margin="auto"/>
  <div id="login1">
    <form name='form-login1' method="post" action="query.php?query=adminlogin" >
      <span class="fa fa-user"></span>
        <input type="text" id="user" placeholder="Username" name="username">

      <span class="fa fa-lock"></span>
        <input type="password" id"pass" placeholder="Password" name="password">


      <input type="submit" value="Login">

</form>
</div>
<br /><br /><br /><br /><br /><br />
  <!-- jQuery -->
  <script src="js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>

</body>
</html>
