<?php 
include 'connect.php';
$id=$_GET['id'];

$delete="delete from manufacturer where manufacturer_id='$id'";
mysqli_query($connect,$delete);
$insert="insert into product(manufacturer_id) values (' ') where manufacturer_id='$id'";
mysqli_query($connect,$insert);
header("Location: /project1/admin/ManufacturerManage.php");