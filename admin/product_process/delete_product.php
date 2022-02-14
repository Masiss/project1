<?php 
include '../../extra/connect.php';
$id=$_POST['id'];

$get_bill=json_decode(mysqli_query($connect,"select product_details from bill_detail where status='đang đợi'")->fetch_array()['product_details'],true);
foreach ($get_bill as $key => $value) {
	if($id==$key){
		echo 'Đã xảy ra lỗi! Sản phẩm đang tồn tại trong đơn hàng đang đợi, hãy xử lí đơn hàng trước ';
		exit();
	}
}




$pic=mysqli_query($connect,"select product_image from product where product_id='$id'")->fetch_array()['product_image'];
$dir='../pic_product/';
unlink($dir.$pic);
$sql="delete from product where product_id='$id'";
mysqli_query($connect,$sql);
echo "1";
