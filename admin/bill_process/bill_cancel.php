<?php 
$id=$_GET['id'];
include '../../extra/connect.php';
$sql="update bill_detail
set status='đã hủy'
where bill_id='$id'";
mysqli_query($connect,$sql);
header("Location: /project1/admin/order_manage.php");