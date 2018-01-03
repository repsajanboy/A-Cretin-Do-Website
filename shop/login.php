<?php include('conn.php');
session_start();
if(!empty($_SESSION['user_user'])){header('location:index.php');}?>
  <!-- Login Page   -->
<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>A Cretin Do CYOCar</title>

  <link rel="stylesheet" href="css/style1.css">
  <link rel="stylesheet" href="css/style_1.css">
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" >


</head>
<body>
  <img id="imgg" class="img-responsive" src="img/cyocar2.png"/>
  <div id="login1">
    <form name='form-login1' method="post" action="query.php?query=login" >
      <span class="fa fa-user"></span>
        <input type="text" id="user" placeholder="Username" name="username" required>

      <span class="fa fa-lock"></span>
        <input type="password" id"pass" placeholder="Password" name="password" required>

        <div id="center">
        <p><font color="white">Don't have an account?</font></p>
        <p><font color="white">Click here to </font><a href=signup.php><font color="#01c7e3">Sign Up</font></a></p>
        </div>
      <input type="submit" value="Login">
      <br />
      <br />
      <a href="../index.html"><font color="#01c7e3"><center>Back to Homepage</center></font></a>

</form>
<br />
<br />
<br />
<br />
<br />
  <!-- jQuery -->
  <script src="js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>

</body>
</html>
