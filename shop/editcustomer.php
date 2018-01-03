<?php include('conn.php');
session_start();
if(empty($_SESSION['admin_admin'])){header('location:adminlogin.php');}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicon.png" />
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>A Cretin Do CYOCAR</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap-responsive.css" rel="stylesheet" />


    <!--  Material Dashboard CSS    -->

<link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/style3.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>


<body id="bodyg">
  <div style="overflow:hidden;">
    <header class="header3" id="header3"><!--header-start-->
        <div class="container">

                <a href="#"><img id="imgg" class="img-responsive" src="img/cyocar2.png" alt=""></a>
                <br />
                <br />
                <br />
                <br />


  </div>
</div>
<?php
include('conn.php');
$id = $_GET['ID'];
$query = "SELECT * FROM customer WHERE cus_username='$id'";
$sql=mysqli_query($con,$query) or die(mysqli_error($con));
$row = mysqli_fetch_array($sql);
 ?>
<div class="col-md-8 col-md-offset-2">
  <div class="jumbotron">
           <div class="panel panel-info">
              <div class="panel-heading">
                  <h3 class="panel-title">Edit User</h3>
              </div>
              <div class="panel-body">
                <form method="post" action="query.php?query=updatecus&ID=<?php echo $row['cus_username'];?>">


              <div class="form-group">
                  <label>Customer Name</label>
                  <input class="form-control"  type="text" name="fullname" placeholder="Customer Name" required value="<?php echo $row['cus_fullname'];?>">
              </div>
              <div class="form-group">
                  <label>Customer Username</label>
                  <input class="form-control" type="text" name="username" placeholder="Customer Username" required value="<?php echo $row['cus_username'];?>">
              </div>
              <div class="form-group">
                  <label>Customer Email</label>
                  <input class="form-control" type="text" name="email" placeholder="Customer Email" required value="<?php echo $row['cus_email'];?>">
              </div>
              <div class="form-group">
                  <label>Customer Contact Number</label>
                  <input class="form-control" type="text" name="contact" placeholder="Customer Contact Number" required value="<?php echo $row['cus_contact'];?>">
              </div>

              <input type="submit" class="btn btn-primary" value="Update">
              <label id="error" class="alert-danger"></label>

          </form>
              </div>
          </div>
  </div>

  </div>




  <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing-1.3.min.js"></script>
  <script src="js/jquery.scrollTo-1.4.3.1-min.js"></script>
  <script src="js/cyocar.js"></script>
</body>

<!--   Core JS Files   -->
<script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="js/material.min.js" type="text/javascript"></script>
<script src="js/jquery.js"></script>


<!--  Charts Plugin -->
<script src="js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Material Dashboard javascript methods -->
<script src="js/material-dashboard.js"></script>




</html>
