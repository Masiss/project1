<?php 
include 'connect.php';
$id=$_GET['id'];
$sql="update bill_detail
set 
status='approved'
where bill_id='$id'";
mysqli_query($connect,$sql);
header("Location: /project1/admin/order_manage.php");