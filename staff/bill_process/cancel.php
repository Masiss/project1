<?php 
$id=$_GET['id'];
include '../../extra/connect.php';
$sql="update bill_detail
set status='đã hủy'
where bill_id='$id'";
mysqli_query($connect,$sql);
echo "1";