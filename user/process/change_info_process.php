<?php 
session_start();
include '../../extra/connect.php';
if(empty($_POST['name']) || empty($_POST['gender']) || empty($_POST['phone']) || empty($_POST['email']) || empty($_POST['date']) || empty($_POST['address'])){
	echo "Vui lòng điền đầy đủ thông tin";
	exit();
}
$name=addslashes($_POST['name']);
$gender=addslashes($_POST['gender']);
$phone=addslashes($_POST['phone']);
$email=addslashes($_POST['email']);
$date=$_POST['date'];
$address=addslashes($_POST['address']);

mysqli_query($connect,"update user set 
	user_name='$name',gender='$gender',user_phone='$phone',user_email='$email',user_birthday='$date',user_address='$address' where user_id='{$_SESSION['id']}'");
echo "1";
exit();