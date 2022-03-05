<?php 
session_start();
if(empty($_GET['size'])){
	echo "Vui lòng chọn kích thước sản phẩm";
	exit();
}
include '../details/connect.php';
$check=mysqli_query($connect,"select * from product where product_id='{$_GET['id']}' and product_size='{$_GET['size']}'");

if(empty(mysqli_query($connect,"select * from product where product_id='{$_GET['id']}' and product_size='{$_GET['size']}'")->num_rows))
{
	echo "Nghịch ít thôi alooo";
	exit();
}
$id=$_GET['id'];
$size=$_GET['size'];
$exist=false;
if(!empty($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
		
}
else{
	
	$_SESSION['cart'][$id]=['size'=>$size,'quantity'=>1];
}
setcookie("cart",json_encode($_SESSION['cart']),time()+(3600*24*365),"/");
exit();
