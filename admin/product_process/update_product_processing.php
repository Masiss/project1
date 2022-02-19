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

$manu_id=addslashes($_POST['manufacturer_id']);
$description=nl2br(addslashes($_POST['description']));
$pic_old=$_POST['old_image'];
$pic_new=$_FILES['new_image'];
include '../../extra/connect.php';
$price=explode(',',$_POST['price']);
$size=explode(',',$_POST['product_size']);
$type=implode(',',$_POST['type_id']);
if(count($size)!=1){
	for($i=0;$i<count($size);$i++){
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

		$product_price=$price[$i];
		$product_size=$size[$i];
		$sql="insert into product(product_name,price,description,product_size,manufacturer_id,type_id,product_image) 
		values('$name','$product_price','$description','$product_size','$manu_id','$type','$pic_product')";
		mysqli_query($connect,$sql);
		
	}
	$sql1="delete from product where product_id='$id'";
	mysqli_query($connect,$sql1);
	header("Location: /project1/admin/product_manage.php");
	exit();
} else {
	$price=$price[0];
	$size=$size[0];
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

	$sql="update product
	set 
	product_name='$name',
	manufacturer_id='$manu_id',
	product_image='$pic_product',
	price='$price',
	description='$description',
	product_size='$size',
	type_id='$type'
	where
	product_id='$id'";
	mysqli_query($connect,$sql);
	header("Location: /project1/admin/product_manage.php");
	exit();

}

