<?php 
session_start();
include '../extra/connect.php';
// unset($_SESSION['cart']);
// var_dump($_SESSION['cart']);
// $cart=$_SESSION['cart'];
// setcookie('cart',0,-1,"/");
// $_COOKIE['cart']=$_SESSION['cart'];
// echo json_encode($_SESSION['cart']);
// unset($_SESSION['cart']["5"]);
// echo json_encode($_SESSION['cart']);
// setcookie('cart',json_encode($_SESSION['cart']),time()+(3600*24),"/");
// $_COOKIE['cart']="dddddddd";
// echo $_COOKIE['cart'];
// unset($_SESSION['cart']);
// echo json_encode($_COOKIE['cart'])
// $arr="4oz,2oz";
// echo json_encode(explode(',',$arr));
// $result=mysqli_query($connect,"SELECT bill_detail.*,bill.*,product.*,user.* from bill_detail
// JOIN bill on bill_detail.bill_id=bill.bill_id 
// JOIN user on bill.user_id=user.user_id
// join product on bill_detail.product_id=product.product_id;");
// foreach ($result as $each) {
// 	var_dump($each);
// $arr=[];
// foreach ($_SESSION['cart'] as $id => $value) {
// 	$arr[]=$id;
// }
// var_dump((implode('|',$arr)));
// $get_bill=json_decode(mysqli_query($connect,"select product_details from bill_detail where status='đang đợi'")->fetch_array()['product_details'],true);
// var_dump($get_bill);
// foreach ($get_bill as $key =>$value) {
// 	echo $key;
echo $_SESSION['total'];