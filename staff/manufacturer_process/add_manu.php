<?php
if(empty($_POST['name'])){
	echo "Nhập tên nhà sản xuất đê alooooooo";
	exit();
} else {
	$name=addslashes($_POST['name']);
	include '../../extra/connect.php';


	$sql="insert into manufacturer(manufacturer_name) values('$name')";

	mysqli_query($connect,$sql);
	echo "1";
}
