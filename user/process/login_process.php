<?php 
if(empty($_POST['email']) || empty($_POST['password'])){
	echo "Vui lòng nhập đầy đủ thông tin";
	exit();
}
$email=$_POST['email'];
$password=$_POST['password'];
include '../../extra/connect.php';	
$check_email=mysqli_query($connect,"select user_email from user where user_email='$email'")->num_rows;
if($check_email==1){
	$check_password=mysqli_query($connect,"select user_password from user where user_email='$email'")->fetch_array()['user_password'];
	if($password==$check_password){
		$done=true;
		
	} else{
		echo "Sai mật khẩu, vui lòng kiểm tra và nhập lại mật khẩu";
		exit();
	}
} else{
	echo "Email có vấn đề, vui lòng kiểm tra và nhập lại email";
	exit();
}
//save access
if(isset($_POST['save_access'])){
	$save=true;
} else {
	$save =false;
}
if($save){
		$token=uniqid('',true).time();
		$update_token=mysqli_query($connect,"update user set token='$token' where user_email='$email' and user_password='$password'");
		setcookie('token',$token,time()+(3600*24*100),"/");

} else {
	$token=uniqid('',true).time();
	$update_token=mysqli_query($connect,"update user set token='$token' where user_email='$email' and user_password='$password'");
}
session_start();
$result=mysqli_query($connect,"select user_id,user_name from user where user_email='$email' and user_password='$password'")->fetch_array();
$id=$result['user_id'];
$name=$result['user_name'];
$_SESSION['id']=$id;
$_SESSION['name']=$name;

header('Location: ../index.php');
exit();

