<?php 
include './connect.php';
$gpfd=mysqli_query($connect,"select product_image from product");
$dir=scandir('../admin/pic_product/');
$path='../admin/pic_product/';

foreach ($dir as $image) {
	if($image!=="." && $image!==".."){
		$check=mysqli_query($connect,"select product_image from product where product_image='$image'")->num_rows;
		if($check<1){
			unlink($path.$image);
		}
	}
}



