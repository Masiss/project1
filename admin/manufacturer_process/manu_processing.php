<?php 
$id=$_GET['id'];
include '../../extra/connect.php';
if(isset($id)){
$manu_name=$_POST['manu_name'];
$sql="insert into manufacturer(manufacturer_name) values ('$manu_name')";
mysqli_query($connect,$sql);
header("Location: /project1/admin/product_process/update_product.php?id=$id");
} 

else{
$manu_name=$_POST['manu_name'];

$sql="insert into manufacturer(manufacturer_name) values ('$manu_name')";
mysqli_query($connect,$sql);
header("Location: /project1/admin/manufacturer_manage.php");
}