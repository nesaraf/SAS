<?php

$barcode = 12345;

$hostname ="localhost";
$username = "root";
$password = "";
$database = "pharmacy";

$con  = mysqli_connect($hostname,$username,$password,$database);
$sql = "SELECT * FROM products  WHERE barcode = $barcode";
$result = mysqli_query($con,$sql);  // this query reads all rows in users tabele 

$row = mysqli_fetch_assoc($result);
 echo  $row['name'];

?>