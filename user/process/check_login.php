<?php 
session_start();
include '../extra/connect.php';
if(!empty($_COOKIE['token'])){
	$token=$_COOKIE['token'];
	$user_info=mysqli_query($connect,"select * from user where token='$token'")->fetch_array();
	$_SESSION['id']=$user_info['user_id'];
	$_SESSION['name']=$user_info['user_name'];
}
