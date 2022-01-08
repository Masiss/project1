<?php 

$name_pro=$_POST['name_pro'];
$name_manu=$_POST['name_manu'];
$pic=$_FILES['image'];
$price=$_POST['price'];
$description=$_POST['description'];
$size=$_POST['size'];
$type=$_POST['type'];
include '../../extra/connect.php';
//check manufacturer
$manu_check="select manufacturer_id from manufacturer where manufacturer_name='$name_manu'";
if(!isset($manu_check)){
	$manu_id=mysqli_query($connect,$manu_check);
} else {
	$push_manu=mysqli_query($connect,"insert into manufacturer(manufacturer_name) values('$name_manu')");
	$manu_id=mysqli_query($connect,$manu_check);
}
$manu_id=$manu_id->fetch_array()["manufacturer_id"];
//check type
$type_check="select type_id from type where type_name='$type'";
if(!isset($type_check)){
	$type_id=mysqli_query($connect,$type_check);
} else {
	$push_type=mysqli_query($connect,"insert into type(type_name) values('$type')");
	$type_id=mysqli_query($connect,$type_check);
}
$type_id=$type_id->fetch_array()["type_id"];
//save pic
//
$folder='pic_product/';
$file_extension=explode('.', $pic["name"])[1];
$pic_product=time().'.'.$file_extension;
$path_file=$folder.$pic_product;

move_uploaded_file($pic["tmp_name"], $path_file);




$sql="insert into product(product_name,price,description,product_size,manufacturer_id,type_id,product_image) 
values('$name_pro','$price','$description','$size','$manu_id','$type_id','$pic_product')";
$result=mysqli_query($connect,$sql);
 header("Location: ../product_manage.php");