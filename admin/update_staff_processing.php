<?php 
$connect=mysqli_connect('localhost','root','','project1');
mysqli_set_charset($connect,'utf8');
$staff_id=$_POST['staff_id'];
$staff_name=$_POST['staff_name'];
$gender=$_POST['gender'];
var_dump($gender);
$staff_phone=$_POST['staff_phone'];
$staff_birthday=$_POST['staff_birthday'];
$staff_address=$_POST['staff_address'];
$staff_email=$_POST['staff_email'];
$level=$_POST['level'];

$sql="update staff
set 
staff_name='$staff_name',
gender='$gender',
staff_phone='$staff_phone',
staff_birthday='$staff_birthday',
staff_address='$staff_address',
staff_email='$staff_email',
level='$level'
where staff_id='$staff_id'";
mysqli_query($connect,$sql);
header("Location: /project1/admin/staffmanage.php");