<?php 
if(empty($_POST['type_name'])){
	echo "Nhập nhẹ cái tên đê aloooooooo";
	exit();
} else {
$type_name=addslashes($_POST['type_name']);
include '../../extra/connect.php';
$sql="insert into type(type_name) values('$type_name')";
mysqli_query($connect,$sql);
echo "1";
}