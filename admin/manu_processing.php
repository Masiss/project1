<?php 
$id=$_GET['id'];
include 'connect.php';
if(isset($id)){

$manu_name=$_POST['manu_name'];

$sql="insert into manufacturer(manufacturer_name) values ('$manu_name')";
mysqli_query($connect,$sql);
header("Location: /project1/admin/update_product.php?id=$id");


} else{
$manu_name=$_POST['manu_name'];

$sql="insert into manufacturer(manufacturer_name) values ('$manu_name')";
mysqli_query($connect,$sql);
header("Location: /project1/admin/ManufacturerManage.php");
}