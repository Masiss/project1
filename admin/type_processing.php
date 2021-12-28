<?php 
$id=$_GET['id'];
$type_name=$_POST['type_name'];
$connect=mysqli_connect('localhost','root','','project1');
mysqli_set_charset($connect,'utf8');
$sql="insert into type(type_name) values ('$type_name')";
mysqli_query($connect,$sql);
header("Location: /project1/admin/update_product.php?id=$id");
