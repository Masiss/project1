<?php 
if(empty($_POST['name'])
|| empty($_POST['gender'])
|| empty($_POST['phone'])
|| empty($_POST['address'])
|| empty($_POST['email'])
|| empty($_POST['date'])
|| empty($_POST['password'])){
	$error="Vui lòng điền đầy đủ thông tin";
	header("Location: ../register.php?error=$error");
	exit();
}
$name=addslashes($_POST['name']);
$gender=addslashes($_POST['gender']);
$phone=addslashes($_POST['phone']);
$address=addslashes($_POST['address']);
$email=addslashes($_POST['email']);
$password=addslashes($_POST['password']);
$date=$_POST['date'];
include '../../extra/connect.php';
$check=mysqli_query($connect, "select user_email from user where user_email='$email'")->num_rows;
if($check>0){
	$error="Email đã được đăng ký";
	header("Location: ../register.php?error=$error");
	exit();
}
mysqli_query($connect,"insert into user(user_name,gender,user_address,user_phone,user_email,user_password,user_birthday) values('$name','$gender','$address','$phone','$email','$password','$date')");

header("Location: ../login.php");
exit();