<?php 
include '../extra/connect.php';
if(empty($_POST['email'])){
	$error="Vui lòng nhập email để được đăng nhập";
	header("Location: ./signin.php?error=$error");
	exit;
} else {
	$email=$_POST['email'];
	$check_mail=mysqli_query($connect,"select staff_email from staff where staff_email='$email'")->fetch_array()['staff_email'];
	if(!isset($check_mail)){
		$error="Email chưa tồn tại, vui lòng đăng ký !!!";
		header("Location:./signin.php?error=$error");
		exit;
	}
}
if(empty($_POST['password'])){
	$error="Vui lòng nhập mật khẩu";
	header("Location: ./signin.php?error=$error");
	exit;
}
else{
	$pass=$_POST['password'];
	$check_pass=mysqli_query($connect,"select staff_password from staff where staff_email='$email'")->fetch_array()['staff_password'];
	if($check_pass!==$pass){
		$error="Sai mật khẩu !!!";
		header("Location: ./signin.php?error=$error");
		exit;
	}
} 

$check_level=mysqli_query($connect,"select level from staff where staff_email='$email' and staff_password='$pass'")->fetch_array()['level'];
session_start();
$result=mysqli_query($connect,"select staff_id,staff_name from staff where staff_email='$email' and staff_password='$pass'")->fetch_array();
$id=$result['staff_id'];
$name=$result['staff_name'];
$_SESSION['id']=$id;
$_SESSION['name']=$name;
if($check_level==0){
	header("Location: ../staff/Dashboard.php");
	exit;
} else if($check_level==1){
	header("Location: ../admin/Dashboard.php");
	exit;
}



