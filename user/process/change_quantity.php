<?php 
session_start();
include '../details/connect.php';

$check=mysqli_query($connect,"select * from product where product_id='{$_GET['id']}' and product_size='{$_GET['size']}'")->num_rows;
if(empty($check) || ($_GET['type']!="inc" && $_GET['type']!="dec" && $_GET['type']!="delete")){
	echo "Đừng có nghịch mà aloooooo";
	exit();
}

$id=$_GET['id'];
$type=$_GET['type'];
$size=$_GET['size'];
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