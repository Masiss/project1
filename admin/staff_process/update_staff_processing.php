<?php 
include '../../extra/connect.php';
$staff_id=$_POST['staff_id'];
$staff_name=$_POST['staff_name'];
$gender=$_POST['gender'];
$staff_phone=$_POST['staff_phone'];
$staff_birthday=$_POST['staff_birthday'];
$staff_address=$_POST['staff_address'];
$staff_email=$_POST['staff_email'];
$staff_password=$_POST['staff_password'];
$level=$_POST['level'];

$sql="update staff
set 
staff_name='$staff_name',
gender='$gender',
staff_phone='$staff_phone',
staff_birthday='$staff_birthday',
staff_address='$staff_address',
staff_email='$staff_email',
staff_password='$staff_password',
level='$level'
where staff_id='$staff_id'";
mysqli_query($connect,$sql);
header("Location: ../staff_manage.php");