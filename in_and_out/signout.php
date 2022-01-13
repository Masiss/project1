<?php 
session_start();

include '../extra/connect.php';
$new_token=uniqid('',true).time();
$id=$_SESSION['id'];
$change_token=mysqli_query($connect,"update staff set token ='$new_token' where staff_id='$id'");
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['level']);
setcookie('token','',-1,"/");
header("Location: ../userview/index.html");