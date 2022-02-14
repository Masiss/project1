<?php 

include '../../extra/connect.php';

if(empty($_POST['manu_name'])){
	echo "Nhập nhẹ cái tên nhà sản xuất đê aloooo";
	exit();
} else{
	$manu_name=addslashes($_POST['manu_name']);

	$sql="insert into manufacturer(manufacturer_name) values ('$manu_name')";
	mysqli_query($connect,$sql);
	echo "1";
	exit();
}

