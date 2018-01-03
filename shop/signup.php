<?php include('conn.php');
session_start();
if(!empty($_SESSION['user_user'])){header('location:index.php');}
?>
<!-- Sign Up Page   -->
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>A Cretin Do CYOCar</title>


<link rel="stylesheet" href="css/style2.css">
<link rel="stylesheet" href="css/style_1.css">
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" >
  <script type="text/javascript" src="js/jquery.js"></script>
  <script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('#username').keyup(function(){
      $.post("availuser.php",
    {username : $('#username').val()
    },function(response){
      $('#usernameResult').fadeOut();
      setTimeout("Userresult('usernameResult','"+escape(response)+"')",350);
    });
    return false;
    });
  });
  function Userresult(id,response)
  {
    $('#usernameLoading').hide();
    $('#'+ id).html(unescape(response));
    $('#'+ id).fadeIn();
  }
  </script>

</head>
<body>
<img id="imgg" src="img/cyocar2.png" margin="auto"/>
<div id="login">
  <form name='form-login' method="post" action="query.php?query=registernew">
    <div id="usernameLoading"></div>
    <div id="usernameResult"></div>
    <span class="fa fa-user"></span>
      <input type="text" id="username" placeholder="Username" name="username" required>

    <span class="fa fa-lock"></span>
      <input type="password" id"pass" placeholder="Password" name="password" required>
    <span class="fa fa-envelope"></span>
      <input type="email" id="email" placeholder="youremail@example.com" name="email" required>
    <span class="fa fa-user"></span>
      <input type="text" id="email" placeholder="Enter Your Full Name" name="fullname" required>
    <span class="fa fa-phone"></span>
      <input type="number" id="email" placeholder="Contact Number" name="contact" required>

      <div id="center">
      <p>Already have an account?</p>
      <p>Click here to <a href=login.php><font color="#01c7e3">Log In</font></a></p>
      </div>
    <input type="submit" value="Sign Up">

</form>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing-1.3.min.js"></script>
<script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>


</body>
</html>
