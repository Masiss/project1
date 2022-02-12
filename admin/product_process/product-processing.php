<?php 
//validation
if(empty($_POST['name_pro']) || empty($_POST['size']) || empty($_FILES['image']) || empty($_POST['price']) || empty($_POST['description'])) {
	echo "Nhập thiếu kìa, nhập đầy đủ vào dumamay :))))))))))";
	exit;
} else if(strlen($_POST['size'])>10){
	echo "Size lừa à dumamay";
	exit;
}

$name_pro=$_POST['name_pro'];
$manufacturer_id=$_POST['manufacturer_id'];
$pic=$_FILES['image'];
$price=$_POST['price'];
$description=nl2br(addslashes($_POST['description']));
$size=$_POST['size'];
$type_id=$_POST['type_id'];
include '../../extra/connect.php';
//save pic
//
$folder='../pic_product/';
$file_extension=explode('.', $pic["name"])[1];
$pic_product=time().'.'.$file_extension;
$path_file=$folder.$pic_product;

move_uploaded_file($pic["tmp_name"], $path_file);




$sql="insert into product(product_name,price,description,product_size,manufacturer_id,type_id,product_image) 
values('$name_pro','$price','$description','$size','$manufacturer_id','$type_id','$pic_product')";
	
$result=mysqli_query($connect,$sql);
echo "1";