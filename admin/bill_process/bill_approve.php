<?php 
include '../../extra/connect.php';
$id=$_GET['id'];
$sql="update bill
set 
status='1'
where bill_id='$id'";
mysqli_query($connect,$sql);

echo "1"; 