<?php 
session_start();

include '../../extra/connect.php';
$new_token=uniqid('',true).time();
$id=$_SESSION['id'];
$change_token=mysqli_query($connect,"update user set token ='$new_token' where user_id='$id'");
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['cart']);
setcookie('token','',-1,"/");
setcookie('cart',serialize($_SESSION['cart']),time()+(3600*24*100),"/");
header("Location: ../index.php");
exit();