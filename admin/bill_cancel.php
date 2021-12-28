<?php 
$id=$_GET['id'];
include 'connect.php';
$sql="update bill_detail
set status='canceled'
where bill_id='$id'";
mysqli_query($connect,$sql);
header("Location: /project1/admin/order_manage.php");