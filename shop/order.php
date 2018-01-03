<?php include('conn.php');
session_start();
if(empty($_SESSION['user_user'])){header('location:login.php');}
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
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bootstrap-responsive.css" rel="stylesheet" />
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="css/material-dashboard.css" rel="stylesheet" />

    <link href="css/style3.css" rel="stylesheet" />
    <link href="css/style_1.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>


<body id="bodyg">

<?php
include('conn.php');
$id = $_SESSION['user_user'];
$query = "SELECT * FROM customer WHERE cus_username='$id'";
$result = mysqli_query($con,$query)  or die(mysqli_error($con));
$row = mysqli_fetch_array($result);
 ?>
    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="img/sidebar.jpg">
          <div class="logo">
             <p class="simple-text"> HI! <?php echo $row['cus_username']; ?></p>
          </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="index.php">
                            <i class="fa fa-shopping-basket"></i>
                            <p>Products</p>
                        </a>
                    </li>

                    <li  class="active">
                        <a href="order.php">
                            <i class="fa fa-shopping-cart"></i>
                            <p>Order</p>
                        </a>
                    </li>

                    <li>
                        <a href="history.php">
                            <i class="fa fa-list-alt"></i>
                            <p>History</p>
                        </a>
                    </li>

                    <li>
                        <a href="logout.php">
                            <i class="fa fa-sign-out"></i>
                            <p>Log Out</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>


                </div>
            </nav>
            <div style="overflow:hidden;">
              <header class="header3" id="header3"><!--header-start-->
                  <div class="container">

                          <a href="#"><img id="imgg" class="img-responsive" src="img/cyocar2.png" alt=""></a>
                          <br />
                          <br />
                          <form class="form3_code" method="post" action="search.php">

                    				<input class="post_code" type="text" placeholder="Search Product" name="term">
                    				<button type="submit">Find Product</button>
                    			</form>

            </div>
          </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <h2 class="title">Check Out</h2>
                                </div>

                                <div class="card-content table-responsive table-bordered">
                                  <table class='table table-bordered'>
                                    <thead class='text-primary'>
                                        <th>Product</th>
                                        <th>Product Description</th>
                                          <th>Product Price</th>
                                          <th>Quantity</th>
                                          <th>Total</th>
                                          <th>Remove Order</th>
                                      </thead>
                                      <?php
                                      include('conn.php');
                                      $cart_cusid = $_SESSION['user_user'];
                                      $query = "SELECT * FROM cart WHERE cart_customer='$cart_cusid'";
                                        $sql=mysqli_query($con,$query) or die(mysqli_error());
                                            while($row = mysqli_fetch_array($sql)){?>

                                      <tr>
                                        <td width="150"> <img src="<?php echo $row['cart_Product'];?>"></td>
                                        <td><center> <?php echo $row['cart_Description']; ?></center></td>
                                        <td><center> Php <?php echo $row['cart_Price']; ?></center></td>
                                        <td><center>  <?php echo $row['cart_Quantity']; ?></center></td>
                                        <td><center> Php <?php echo $row['cart_Total']; ?></center></td>
                                        <td><center> <a href='query.php?query=remorder&ID=<?php echo $row['cart_Description'];?>&quantity=<?php echo $row['cart_Quantity'];?>'><button class="shopBtn"><span class=" glyphicon glyphicon-trash"></span> Remove Order</button></a></center></td>
                                      </tr>
                                      <form method="post" action="buy.php">
                                      <input type="hidden" name="product_Name[]" value="<?php echo $row['cart_Description'];?>" />
                                      <input type="hidden" name="product_Quantity[]" value="<?php echo $row['cart_Quantity'];?>" />
                                      <input type="hidden" name="product_Price[]" value="<?php echo $row['cart_Price'];?>" />
                                      <input type="hidden" name="product_total[]" value="<?php echo $row['cart_Total'];?>" />
                                      <input type="hidden" name="product_pic[]" value="<?php echo $row['cart_Product'];?>" />
                                    <?php } ?>

                                      <tbody>
                                    </table>
                                    <br />
                                    <br />
                                    <form method="post" action="buy.php">

                                    <a href="index.php" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </a>

                                      <button type="submit" class="shopBtn btn-large pull-right">Buy <span class="icon-arrow-right"></span></button>
                                    </form>

                            </div>
                        </div>

                    </div>
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
