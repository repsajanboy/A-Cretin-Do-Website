<?php
include('conn.php');
  session_start();
$customer = $_SESSION['user_user'];
$buy_Product = $_POST['product_Name'];
$buy_Quantity = $_POST['product_Quantity'];
$buy_Price = $_POST['product_Price'];
$buy_total = $_POST['product_total'];
$buy_pic = $_POST['product_pic'];
$buy_date = date("Y-m-d H:i:s");

$max = count($buy_Product);
for($i=0; $i<$max; $i++){
  $query = "INSERT INTO `buy` (`buy_Id`, `buy_Product`, `buy_Quantity`, `buy_price`, `buy_total`, `buy_date`, `buy_pic`, `buy_customer`) VALUES (NULL,'$buy_Product[$i]', '$buy_Quantity[$i]', '$buy_Price[$i]', '$buy_total[$i]', '$buy_date',
     '$buy_pic[$i]', '$customer')";
  $result =  mysqli_query($con,$query) or die(mysqli_error($con));
}
if (!$result){
  echo "Failed";
}else {
  echo "Successfully";
}

 ?>
 <!DOCTYPE html>
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
     <!--behavior-->

<style type="text/css">
@media print { .noprint { display: none;} }
</style>
 </head>
 <body id="bodyg">

 <?php
 include('conn.php');
 $id = $_SESSION['user_user'];
 $query = "SELECT * FROM customer WHERE cus_username='$id'";
 $result = mysqli_query($con,$query);
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

                     <li class="active">
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
          <div class="noprint">
            <form class="form3_code" method="post" action="search.php">

              <input class="post_code" type="text" placeholder="Search Product" name="term">
              <button type="submit">Find Product</button>
            </form>
          </div>
             </div>
           </div>
             <div class="content">
              <div class="container-fluid">
  					<div class="row">
                      <div class="col-lg-12">
                          <div class="alert alert-info alert-dismissable">
                            <i class="fa fa-info-circle"></i>  <strong>Your Order has been Successfully Submitted</strong>
                          </div>
                      </div>

                  </div>
            </div>
            <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Reciept</h3>
                                </div>
                                <div class="panel-body">
    							<?php $totalbill = 0;
                  include('conn.php');
                  $buy_cusid = $_SESSION['user_user'];
                  $query = "SELECT * FROM cart WHERE cart_customer='$buy_cusid'";
                    $sql=mysqli_query($con,$query) or die(mysqli_error());
                    while($row = mysqli_fetch_array($sql)){?>

                                    <div class="list-group">
                                       <a href="#" class="list-group-item">
                                            <span class="badge">Php <?php echo $row['cart_Total'];?></span>
                                            <i class="fa fa-fw fa-money"></i> <?php echo $row['cart_Quantity'];?> pc/pcs <strong> <?php echo $row['cart_Product']; ?> </strong> (Php. <?php echo $row['cart_Price']; ?>/pc)
                                        </a>

                                    </div>
    								<?php }?>

                                    <div class="text-right">
                                      <?php
                                      include('conn.php');
                                      $buy_cusid = $_SESSION['user_user'];
                                      $sum = "SELECT SUM(cart_Quantity) AS total_item FROM cart WHERE cart_customer='$buy_cusid'";
                                      $resultsum = mysqli_query($con,$sum) or die(mysqli_error());
                                         while($row = mysqli_fetch_array($resultsum)){?>
                                        <i class="fa fa-arrow-circle-right"></i><?php echo " Total Number of Item = "; echo $row['total_item'];?> <br /> <br />
                                      <?php } ?>
                                      <?php
                                      include('conn.php');
                                      $buy_cusid = $_SESSION['user_user'];
                                      $sum = "SELECT SUM(cart_Total) AS total_expense FROM cart WHERE cart_customer='$buy_cusid'";
                                      $resultsum = mysqli_query($con,$sum) or die(mysqli_error());
                                         while($row = mysqli_fetch_array($resultsum)){?>
                                        <i class="fa fa-arrow-circle-right"></i><?php echo " Total = Php. "; echo $row['total_expense'];?>
                                      <?php } ?>
                                    </div>
                                    <div class="noprint">
                                    <form method="post" action="query.php?query=neworder">
                                      <button type="submit" class="shopBtn btn-large pull-center">New Order <span class="icon-arrow-right"></span></button>
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

 <button style='position: bottom: 20px; right: 20px;' onclick='window.print();' class='btn btn-raised pull-right hidden-print btn-info'><i class='fa fa-print'></i> Print</button>
 </html>
