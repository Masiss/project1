<?php 
if(empty($_POST['name_pro']) || empty($_FILES['image']) || empty($_POST['price'])|| empty ($_POST['description']) || empty($_POST['size'])) {
	echo "Vui lòng nhập đầy đủ";
	exit();
} else if(count(explode(',',$_POST['size'])) !=count(explode(',',$_POST['price']))){
	echo "Kiểm tra lại giá và kích thước";
	exit();
}
$name_pro=addslashes($_POST['name_pro']);
$manu_id=addslashes($_POST['manufacturer_id']);
$pic=$_FILES['image'];
$price=explode(',',$_POST['price']);
$description=nl2br(addslashes($_POST['description']));
$size=explode(',',$_POST['size']);
$type_id=addslashes($_POST['type_id']);
include '../../extra/connect.php';

//save pic
//
$folder='../../admin/pic_product/';
$file_extension=explode('.', $pic["name"])[1];
$pic_product=time().'.'.$file_extension;
$path_file=$folder.$pic_product;

move_uploaded_file($pic["tmp_name"], $path_file);



if(count($size)!=1){
	for($i=0;$i<count($size);$i++){
		//save pic

		$folder='../pic_product/';
		$file_extension=explode('.', $pic["name"])[1];
		$pic_product=time().'.'.$file_extension;
		$path_file=$folder.$pic_product;

		move_uploaded_file($pic["tmp_name"], $path_file);

		$product_price=$price[$i];
		$product_size=$size[$i];
		$sql="insert into product(product_name,price,description,product_size,manufacturer_id,type_id,product_image) 
		values('$name_pro','$product_price','$description','$product_size','$manu_id','$type_id','$pic_product')";
		$result=mysqli_query($connect,$sql);
	}
} else {
//save pic

	$folder='../pic_product/';
	$file_extension=explode('.', $pic["name"])[1];
	$pic_product=time().'.'.$file_extension;
	$path_file=$folder.$pic_product;

	move_uploaded_file($pic["tmp_name"], $path_file);

	$sql="insert into product(product_name,price,description,product_size,manufacturer_id,type_id,product_image) 
	values('$name_pro','$price','$description','$size','$manu_id','$type_id','$pic_product')";
	$result=mysqli_query($connect,$sql);
}

echo "1";
exit();