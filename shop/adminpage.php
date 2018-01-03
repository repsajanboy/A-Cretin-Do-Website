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
$id = $_SESSION['user_user'];
$query = "SELECT * FROM customer WHERE cus_username='$id'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
 ?>
 <nav class="navbar" role="navigation">

         <div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse">
                 <span class="sr-only">Toggle navigation</span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
             </button>
         </div>

                 <div class="navbar-collapse collapse pull-right">
                     <ul class="nav navbar-nav">
                         <li ><a href="#customer">Customer</a>
                         </li>
          <li><a href="#order">Order</a>
                         </li>
          <li><a href="#sale">Sale</a>
                         </li>
          <li ><a href="#products">Products</a>
                         </li>
          <li>
                          <a href="logout.php">Logout</a>
                     </li>
                     </ul>
                 </div>
                 </nav>
    <div class="wrapper">


            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" id="customer">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title">List of Customer</h4>
                                </div>
                                <div class="card-content table-responsive table-bordered">
                                  <table class='table table-bordered'>
                                    <thead class='text-primary'>

                                        <th>Customer Name</th>
                                          <th>Customer Username</th>
                                          <th>Customer Email</th>
                                          <th>Customer Contact Number</th>
                                          <th>Action</th>

                                      </thead>
                                      <?php
                                      include('conn.php');
                                      $cart_cusid = $_SESSION['user_user'];
                                      $query = "SELECT * FROM customer";
                                        $sql=mysqli_query($con,$query) or die(mysqli_error($con));
                                            while($row = mysqli_fetch_array($sql)){?>

                                      <tr>


                                        <td><center><?php echo $row['cus_fullname']; ?></center></td>
                                        <td><center><?php echo $row['cus_username']; ?></center></td>
                                        <td><center><?php echo $row['cus_email']; ?></center></td>
                                        <td><center><?php echo $row['cus_contact']; ?></center></td>
                                        <td><center>

                                        <a href='query.php?query=removecus&ID=<?php echo $row['cus_username'];?>'><button class="shopBtn"><span class=" glyphicon glyphicon-trash"></span></button></a>
                                                      <a href='editcustomer.php?ID=<?php echo $row['cus_username'];?>'><button class="shopBtn"><span class='glyphicon glyphicon-pencil'></span></button></a></td>
                                                      </center>
                                      </tr>

                                    <?php } ?>
                                      <tbody>
                                    </table>
                                    <br />
                                    <br />

                                    </form>

                            </div>
                        </div>
                        <div class="card" id="order">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title">List of Orders</h4>
                            </div>
                            <div class="card-content table-responsive table-bordered">
                              <table class='table table-bordered'>
                                <thead class='text-primary'>
                                    <th>Order ID</th>
                                    <th>Product Name</th>
                                      <th>Product Price</th>
                                      <th>Order Quantity</th>
                                      <th>Order Total Amount</th>
                                      <th>Order Date</th>
                                      <th>Customer</th>

                                  </thead>
                                  <?php
                                  include('conn.php');
                                  $cart_cusid = $_SESSION['user_user'];
                                  $query = "SELECT * FROM buy";
                                    $sql=mysqli_query($con,$query) or die(mysqli_error($con));
                                        while($row = mysqli_fetch_array($sql)){?>

                                  <tr>

                                    <td><center><?php echo $row['buy_Id']; ?></center></td>
                                    <td><center><?php echo $row['buy_Product']; ?></center></td>
                                    <td><center>Php <?php echo $row['buy_price']; ?></center></td>
                                    <td><center><?php echo $row['buy_Quantity']; ?></center></td>
                                    <td><center>Php <?php echo $row['buy_total']; ?></center></td>
                                    <td><center><?php echo $row['buy_date']; ?></center></td>
                                    <td><center><?php echo $row['buy_customer']; ?></center></td>


                                  </tr>

                                <?php } ?>
                                  <tbody>
                                </table>
                                <br />
                                <br />

                                </form>

                        </div>
                    </div>
                    <div class="card" id="sale">
                        <div class="card-header" data-background-color="blue">
                            <h4 class="title">Sales</h4>
                        </div>
                        <div class="card-content table-responsive table-bordered">
                          <table class='table table-bordered'>
                            <thead class='text-primary'>
                                <th>Total Item Sold</th>
                                <th>Total Sales</th>


                              </thead>
                              <?php
                              include('conn.php');
                              $cart_cusid = $_SESSION['user_user'];
                              $query = "SELECT SUM(buy_Quantity) AS total_itemsale FROM buy";
                              $query1 = "SELECT SUM(buy_total) AS total_sale FROM buy";
                                $sql=mysqli_query($con,$query) or die(mysqli_error($con));
                                $sql1=mysqli_query($con,$query1) or die(mysqli_error($con));
                                 $row1 = mysqli_fetch_array($sql1);
                                    while($row = mysqli_fetch_assoc($sql)){?>

                              <tr>

                                <td><center><?php echo $row['total_itemsale']; ?></center></td>
                                <td><center>Php <?php echo $row1['total_sale']; ?></center></td>


                              </tr>

                            <?php } ?>
                              <tbody>
                            </table>
                            <br />
                            <br />

                            </form>

                    </div>
                </div>
                <div class="card" id="products">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">List of Products</h4>
                    </div>
                    <div class="card-content table-responsive table-bordered">
                      <a href='addproduct.php'><button class="shopBtn btn-large pull-right"><span class=" glyphicon glyphicon-plus"></span>Add Product</button></a><br /><br />
                      <table class='table table-bordered'>
                        <thead class='text-primary'>
                            <th>Product Id</th>
                            <th>Product Name</th>
                              <th>Product Price</th>
                              <th>Product Stock</th>
                              <th>Action</th>


                          </thead>
                          <?php
                          include('conn.php');
                          $cart_cusid = $_SESSION['user_user'];
                          $query = "SELECT * FROM product";
                            $sql=mysqli_query($con,$query) or die(mysqli_error($con));
                                while($row = mysqli_fetch_array($sql)){?>

                          <tr>

                            <td><center><?php echo $row['product_Id']; ?></center></td>
                            <td><center><?php echo $row['product_Name']; ?></center></td>
                            <td><center>Php <?php echo $row['product_Price']; ?></center></td>
                            <td><center><?php echo $row['product_Stock']; ?></center></td>
                            <td><center> &nbsp;&nbsp;&nbsp;
                                          <a href='query.php?query=removeprod&ID=<?php echo $row['product_Id'];?>'><button class="shopBtn" style="width:30%"><span class=" glyphicon glyphicon-trash"></span>Delete</button></a>&nbsp;&nbsp;&nbsp;
                                          <a href='editproduct.php?ID=<?php echo $row['product_Id'];?>'><button class="shopBtn" style="width:30%"><span class='glyphicon glyphicon-pencil'></span>Edit</button></a></td></center>
                          </tr>

                        <?php } ?>
                          <tbody>
                        </table>
                        <br />
                        <br />

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
