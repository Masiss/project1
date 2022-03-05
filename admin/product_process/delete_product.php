<?php 
include '../../extra/connect.php';
$id=$_POST['id'];
$check=mysqli_query($connect,"select bill_detail.product_id,bill.status from bill_detail join bill on bill_detail.bill_id=bill.bill_id where bill_detail.product_id='$id' and bill.status='0'");
if($check->num_rows>0){
	
			echo 'Đã xảy ra lỗi! Sản phẩm đang tồn tại trong đơn hàng đang đợi, hãy xử lí đơn hàng trước ';
			exit();
		
}

$get_info=mysqli_query($connect,"select * from product where product_id='$id'")->fetch_array();
$check_product=mysqli_query($connect,"select * from product where product_name='{$get_info['product_name']}' and description='{$get_info['description']}' and product_id!={$get_info['product_id']}");
if(!empty($check_product)){
	if($check_product->num_rows==0){
		$pic=mysqli_query($connect,"select product_image from product where product_id='$id'")->fetch_array()['product_image'];
		$dir='../pic_product/';
		unlink($dir.$pic);
	}
}

$sql="delete from product where product_id='$id'";
mysqli_query($connect,$sql);
echo "1";
