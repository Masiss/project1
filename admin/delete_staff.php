<?php 
include 'connect.php';
$id=$_GET['id'];
$sql="delete from staff where staff_id='$id'";
mysqli_query($connect,$sql);
header('Location: /project1/admin/staffmanage.php');