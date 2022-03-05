<?php 
$id=$_POST['id_product'];
if(empty($_POST['name_pro']) || empty($_POST['product_size']) || empty($_POST['price']) || empty($_POST['description'])) {
	$error="Vui lòng nhập đầy đủ thông tin";
	header("Location: ./form_update.php?id=$id&error=$error");
	exit();
} 
else if(empty($_POST['type_id'])){
	$error="Vui lòng chọn loại";
	header("Location: ./form_update.php?id=$id&error=$error");
	exit();	
}

$name=addslashes($_POST['name_pro']);
$manu_id=$_POST['manufacturer_id'];
$description=nl2br(addslashes($_POST['description']));
$pic_old=$_POST['old_image'];
$pic_new=$_FILES['new_image'];
include '../../extra/connect.php';
$size=$_POST['product_size'];
$price=$_POST['price'];
$type=implode(',',$_POST['type_id']);
if(count($size)!=count($price)){
	$error="Kiểm tra lại kích thước và giá";
	header("Location: ./form_update.php?id=$id&error=$error");
	exit();
}
//check pic
if($pic_new["size"]>0){
	$pic=$pic_new;
	$folder='../../admin/pic_product/';
	$file_extension=explode('.', $pic["name"])[1];
	$pic_product=time().'.'.$file_extension;
	$path_file=$folder.$pic_product;
	move_uploaded_file($pic["tmp_name"], $path_file);
//check old pic
	$check=mysqli_query($connect,"select product_image from product where product_image='$pic_old'");
	if($check->num_rows==1){
		//delete old pic
		
		$pic=mysqli_query($connect,"select product_image from product where product_id='$id'")->fetch_array()['product_image'];
		$dir='../pic_product/';
		unlink($dir.$pic);
	}
	
} else{
	$pic_product=$pic_old;
}
if(count($size)!=1){
	for($i=0;$i<count($size);$i++){

		$product_price=$price[$i];
		$product_size=$size[$i];
		$sql="insert into product(product_name,price,description,product_size,manufacturer_id,type_id,product_image) 
		values('$name','$product_price','$description','$product_size','$manu_id','$type','$pic_product')";
		
		mysqli_query($connect,$sql);
		
	}
	$sql1="delete from product where product_id='$id'";
	mysqli_query($connect,$sql1);
	header("Location: ../product_manage.php");
	exit();
} else {
	$price=$price[0];
	$size=$size[0];


	//update
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
	header("Location: ../product_manage.php");

	exit();

}



