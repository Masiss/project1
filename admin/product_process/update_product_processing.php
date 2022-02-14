<?php 
$id=$_POST['id_product'];
if(empty($_POST['name_pro']) || empty($_POST['product_size']) || empty($_POST['price']) || empty($_POST['description'])) {
	$error= "Vui lòng nhập đầy đủ thông tin";
	
	header("Location: ./update_product.php?id=$id&error=$error");
	exit;
} else if(strlen($_POST['product_size'])>20){
	$error="Size lừa à alooo";
	header("Location: ./update_product.php?id=$id&error=$error");
	exit;
}

$id=addslashes($_POST['id_product']);

$name=addslashes($_POST['name_pro']);
$price=addslashes($_POST['price']);
$product_size=addslashes($_POST['product_size']);
$type=addslashes($_POST['type_id']);
$manu_id=addslashes($_POST['manufacturer_id']);
$description=nl2br(addslashes($_POST['description']));
$pic_old=$_POST['old_image'];
$pic_new=$_FILES['new_image'];
include '../../extra/connect.php';
//check pic
if($pic_new["size"]>0){
	$pic=$pic_new;
	$folder='../pic_product/';
	$file_extension=explode('.', $pic["name"])[1];
	$pic_product=time().'.'.$file_extension;
	$path_file=$folder.$pic_product;
	move_uploaded_file($pic["tmp_name"], $path_file);
	//delete old pic
	$pic=mysqli_query($connect,"select product_image from product where product_id='$id'")->fetch_array()['product_image'];
	$dir='../pic_product/';
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
header("Location: /project1/admin/product_manage.php");
