<?php 
$name=$_POST['name'];
include '../../extra/connect.php';


$sql="insert into manufacturer(manufacturer_name) values ('$manu_name')";
mysqli_query($connect,$sql);
header("Location: /project1/staff/manufacturer_manage.php");