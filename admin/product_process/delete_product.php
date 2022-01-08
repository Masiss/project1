<?php 
include '../../extra/connect.php';
$id=$_GET['id'];
$check=mysqli_query($connect,"select product_id from bill_detail where product_id='$id'")->fetch_array()['product_id'];
if(isset($check)){
	echo '<h1 style="color: red;">Đã xảy ra lỗi! Sản phẩm đang tồn tại trong đơn hàng, hãy xử lí đơn hàng trước </h1>';
	echo '<a href="../order_manage.php">Nhấn vào đây để kiểm tra đơn hàng </a>';
	die();
}else {
$sql="delete from product where product_id='$id'";
mysqli_query($connect,$sql);
header("Location: /project1/admin/product_manage.php");
}