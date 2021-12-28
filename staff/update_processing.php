<?php 

$id=$_POST['id_product'];

$name=$_POST['name_pro'];
$price=$_POST['price'];
$product_size=$_POST['product_size'];
$type=$_POST['type_id'];
$manu_id=$_POST['manufacturer_id'];
$description=$_POST['description'];
$pic_old=$_POST['old_image'];
$pic_new=$_FILES['new_image'];
$connect=mysqli_connect('localhost','root','','project1');
mysqli_set_charset($connect,'utf8');

//check pic
if($pic_new["size"]>0){
	$pic=$pic_new;
	$folder='pic_product/';
	$file_extension=explode('.', $pic["name"])[1];
	$pic_product=time().'.'.$file_extension;
	$path_file=$folder.$pic_product;
	move_uploaded_file($pic["tmp_name"], $path_file);

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
header("Location: /project1/staff/manageproduct.php");
