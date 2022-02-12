<?php 
session_start();
$id=$_GET['id'];

$exist=false;
if(!empty($_SESSION['cart'][$id])){
	$_SESSION['cart'][$id]['quantity']++;
	$exist=true;

}
else{
	
	$_SESSION['cart'][$id]['quantity']=1;
}
$_COOKIE['cart']=$_SESSION['cart'];
