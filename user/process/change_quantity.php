<?php 
session_start();
$id=$_GET['id'];
$type=$_GET['type'];
$quantity=$_SESSION['cart'][$id]['quantity'];
	
if(($_SESSION['cart'][$id]['quantity']==1 && $type=="dec") || $type=="delete"){
	unset($_SESSION['cart'][$id]);
	echo "Đã xóa sản phẩm khỏi giỏ hàng";
	
} else{
	if($type=="dec"){
		$quantity--;
	} else if($type=="inc"){
		$quantity++;
	}
	$_SESSION['cart'][$id]['quantity']=$quantity;
	echo "1";
	
}
setcookie("cart",json_encode($_SESSION['cart']),time()+(3600*24*365),"/");
exit();