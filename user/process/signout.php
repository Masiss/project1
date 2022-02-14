<?php 
session_start();

include '../../extra/connect.php';
$new_token=uniqid('',true).time();
$id=$_SESSION['id'];
$change_token=mysqli_query($connect,"update user set token ='$new_token' where user_id='$id'");
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['cart']);
if(isset($_SESSION['level'])){
	unset($_SESSION['level']);
}
setcookie('token','',-1,"/");

header("Location: ../index.php");
exit();