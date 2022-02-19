<?php 
session_start();
if(empty($_GET['size'])){
	echo "Vui lòng chọn kích thước sản phẩm";
	exit();
}
$id=$_GET['id'];
$size=$_GET['size'];
$exist=false;
if(!empty($_SESSION['cart'][$id])){
	// if(isset($_SESSION['cart'][$id]['size'])){
		$_SESSION['cart'][$id]['quantity']++;
		
	// } else{
		// $_SESSION['cart'][$id][$size]['quantity']=1;
	// }
}
else{
	
	$_SESSION['cart'][$id]=['size'=>$size,'quantity'=>1];
}
setcookie("cart",json_encode($_SESSION['cart']),time()+(3600*24*365),"/");
exit();
