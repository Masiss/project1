<?php 
$id=$_GET['id'];
include '../../extra/connect.php';
$sql="update bill
set status='3'
where bill_id='$id'";
mysqli_query($connect,$sql);
echo "1";