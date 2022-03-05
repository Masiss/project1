<?php
session_start();
include '../../extra/connect.php';
if(empty($_POST['password']) || empty($_POST['new_password']) || empty($_POST['new_password1'])){
	echo "Vui lòng điền đẩy đủ thông tin";
	exit();
}
$id=$_SESSION['id'];
$password=addslashes($_POST['password']);
$new_password=addslashes($_POST['new_password']);
$new_password1=addslashes($_POST['new_password1']);
if($new_password!=$new_password1){
	echo "Mật khẩu mới và mật khẩu xác nhận không giống nhau, vui lòng nhập lại";
	exit();
}
mysqli_query($connect,"update user set user_password='$new_password1' where user_id='$id'");
echo "1";
exit();