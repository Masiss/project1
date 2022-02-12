<?php 
session_start();
$id=$_GET['id'];
$type=$_GET['type'];
$quantity=$_SESSION['cart'][$id]['quantity'];
if(($_SESSION['cart'][$id]['quantity']==1 && $type=="dec") || $type="delete"){
	unset($_SESSION['cart'][$id]);
	echo "Đã xóa sản phẩm khỏi giỏ hàng";
	exit();
} else{
	if($type=="dec"){
		$quantity--;
	} else if($type=="inc"){
		$quantity++;
	}
	$_SESSION['cart'][$id]['quantity']=$quantity;
	echo "1";
	exit();
}