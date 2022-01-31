<?php 
if(empty($_POST['name_pro']) || empty($_FILES['image']) || empty($_POST['price'])|| empty ($_POST['description']) || empty($_POST['size'])) {
	echo "Vui lòng nhập đầy đủ";
	exit();
} else {
$name_pro=$_POST['name_pro'];
$manu_id=$_POST['manufacturer_id'];
$pic=$_FILES['image'];
$price=$_POST['price'];
$description=$_POST['description'];
$size=$_POST['size'];
$type_id=$_POST['type_id'];
include '../../extra/connect.php';

//save pic
//
$folder='../../admin/pic_product/';
$file_extension=explode('.', $pic["name"])[1];
$pic_product=time().'.'.$file_extension;
$path_file=$folder.$pic_product;

move_uploaded_file($pic["tmp_name"], $path_file);




$sql="insert into product(product_name,price,description,product_size,manufacturer_id,type_id,product_image) 
values('$name_pro','$price','$description','$size','$manu_id','$type_id','$pic_product')";
$result=mysqli_query($connect,$sql);
echo "1";
}