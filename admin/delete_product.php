<?php 
include 'connect.php';
$id=$_GET['id'];

$sql="delete from product where product_id='$id'";
mysqli_query($connect,$sql);
mysqli_close($connect);
header("Location: /project1/admin/Product.php");