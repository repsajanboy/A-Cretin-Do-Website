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
$id = $_GET['ID'];
$query = "SELECT * FROM product WHERE product_Id='$id'";
$sql=mysqli_query($con,$query) or die(mysqli_error($con));
$row = mysqli_fetch_array($sql);
 ?>
<div class="col-md-8 col-md-offset-2">
         <div class="form-group">
                      <div class="jumbotron">
                         <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Add Product</h3>
                            </div>
                            <div class="panel-body">
                              <form role="form" method="POST" action="query.php?query=addprod">

                            <div class="form-group">
                                <label>Product Name</label>
                                <input class="form-control"  type="text" name="productname" placeholder="Product Name" required>
                            </div>
                            <div class="form-group">
                                 <label><bold>Product Price</label>
                                <input class="form-control" type="number" name="price" placeholder="Product Price" required>
                            </div>
                            <div class="form-group">
                                  <label><bold>Product Stock</label>
                                <input class="form-control" type="number" name="stock" placeholder="Stock" required>
                            </div>
                            <div class="form-group">
                                  <label><bold>Product Image</label>
                                <input class="form-control" type="file" name="image" placeholder="Path of Image" required>
                            </div>
                            <div class="form-group">
                                  <label><bold>Product Details</label>
                                <input class="form-control" type="text" name="details" placeholder="Details" required>
                            </div>




                            &nbsp;<button type="submit" class="btn btn-primary">Submit</button>
                            <label id="error" class="alert-danger"></label>
                                                                  </div>
                        </form>
                            </div>
                        </div>
                </div>

<script src="js/jquery-1.11.0.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
