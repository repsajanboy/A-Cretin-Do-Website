<?php
error_reporting (E_ALL ^ E_NOTICE);

$servername = "localhost";
$username = "root";
$password = "";
$database = "cyocar";
//create connection
$con = new mysqli($servername, $username, $password, $database);
//check connection
if($con->connect_error){
	die("Connection failed: " . $con->connect_error);
}


?>
