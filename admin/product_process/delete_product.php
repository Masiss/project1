<?php 
include '../../extra/connect.php';
$id=$_POST['id'];
$check=mysqli_query($connect,"select product_id from bill_detail where product_id='$id'")->num_rows;
if($check>0){
	echo 'Đã xảy ra lỗi! Sản phẩm đang tồn tại trong đơn hàng, hãy xử lí đơn hàng trước ';
	
}else {
$pic=mysqli_query($connect,"select product_image from product where product_id='$id'")->fetch_array()['product_image'];
$dir='../pic_product/';
unlink($dir.'/'.$pic);
$sql="delete from product where product_id='$id'";
mysqli_query($connect,$sql);
echo "1";
}