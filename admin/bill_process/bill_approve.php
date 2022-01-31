<?php 
include '../../extra/connect.php';
$id=$_GET['id'];
$sql="update bill_detail
set 
status='đã duyệt'
where bill_id='$id'";
mysqli_query($connect,$sql);

echo "1"; 