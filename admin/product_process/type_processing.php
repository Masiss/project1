<?php 

$type_name=$_POST['type_name'];
include '../../extra/connect.php';
$sql="insert into type(type_name) values ('$type_name')";
mysqli_query($connect,$sql);
if(isset($_GET['id']))
{
$id=$_GET['id'];
header("Location: /project1/admin/product_process/update_product.php?id=$id");
exit;
}
else{
	header("Location: /project1/admin/add_product.php");
	exit;
}