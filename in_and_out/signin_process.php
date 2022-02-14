<?php 
include '../extra/connect.php';
//validate
if(empty($_POST['email'])){
	$error="Vui lòng nhập email để được đăng nhập";
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;
} else {
	$email=addslashes($_POST['email']);
	$check_mail=mysqli_query($connect,"select staff_email from staff where staff_email='$email'")->fetch_array()['staff_email'];
	if(!isset($check_mail)){
		$error="Email chưa tồn tại, vui lòng đăng ký !!!";
		header("Location: ../staff/index.php?error=$error");
		exit;
	}
}
if(empty($_POST['password'])){
	$error="Vui lòng nhập mật khẩu";
	header("Location: ../staff/index.php?error=$error");
	exit;
}
else{
	$pass=addslashes($_POST['password']);
	$check_pass=mysqli_query($connect,"select staff_password from staff where staff_email='$email'")->fetch_array()['staff_password'];
	if($check_pass!==$pass){
		$error="Sai mật khẩu !!!";
		header("Location: ../staff/index.php?error=$error");
		exit;
	}
} 
//save access
if(isset($_POST['save_access'])){
	$save=true;
} else {
	$save =false;
}
if($save){
	//$check_token=mysqli_query($connect,"select token from staff where staff_email='$email' and staff_password='$pass'")->fetch_array()['token'];
	//if(!isset($check_token)) {
		$token=uniqid('',true).time();
		$update_token=mysqli_query($connect,"update staff set token='$token' where staff_email='$email' and staff_password='$pass'");
		setcookie('token',$token,time()+(3600*24*100),"/");
//	} 
} else {
	$token=uniqid('',true).time();
	$update_token=mysqli_query($connect,"update staff set token='$token' where staff_email='$email' and staff_password='$pass'");
}

session_start();
$result=mysqli_query($connect,"select staff_id,staff_name from staff where staff_email='$email' and staff_password='$pass'")->fetch_array();
$id=$result['staff_id'];
$name=$result['staff_name'];
$_SESSION['id']=$id;
$_SESSION['name']=$name;
$level=mysqli_query($connect,"select level from staff where staff_email='$email' and staff_password='$pass'")->fetch_array()['level'];
$_SESSION['level']=$level;


if($level==0){
	header("Location: ../staff/Dashboard.php");
	exit;
} else if($level==1){
	header("Location: ../admin/Dashboard.php");
	exit;
} else {header("Location: ../admin/index.php");}



