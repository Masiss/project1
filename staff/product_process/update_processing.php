<?php 
if(empty($_POST['name_pro']) || empty($_POST['product_size']) || empty($_POST['price']) || empty($_POST['description'])) {
	echo "Vui lòng nhập đầy đủ thông tin";
	exit;
} else if(strlen($_POST['product_size'])>20){
	echo "Size lừa à alooooo";
	exit;
}
$id=$_POST['id_product'];

$name=addslashes($_POST['name_pro']);
$price=addslashes($_POST['price']);
$product_size=addslashes($_POST['product_size']);
$type=$_POST['type_id'];
$manu_id=$_POST['manufacturer_id'];
$description=nl2br(addslashes($_POST['description']));
$pic_old=$_POST['old_image'];
$pic_new=$_FILES['new_image'];
include '../../extra/connect.php';

//check pic
if($pic_new["size"]>0){
	$pic=$pic_new;
	$folder='../../admin/pic_product/';
	$file_extension=explode('.', $pic["name"])[1];
	$pic_product=time().'.'.$file_extension;
	$path_file=$folder.$pic_product;
	move_uploaded_file($pic["tmp_name"], $path_file);
//delete old pic
	$pic=mysqli_query($connect,"select product_image from product where product_id='$id'")->fetch_array()['product_image'];
	$dir='../../admin/pic_product/';
	unlink($dir.$pic);
} else{
	$pic_product=$pic_old;
}


//update
$sql="update product
set 
product_name='$name',
manufacturer_id='$manu_id',
product_image='$pic_product',
price='$price',
description='$description',
product_size='$product_size',
type_id='$type'
where
product_id='$id'";

mysqli_query($connect,$sql);
header("Location: ../product_manage.php");
