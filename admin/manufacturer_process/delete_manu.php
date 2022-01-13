<?php 
session_start();
include '../../extra/connect.php';
$id=$_GET['id'];
$check_exist=mysqli_query($connect,"select manufacturer_id from product where manufacturer_id='$id'")->num_rows;
if($check_exist>0){
echo "Có ít nhất 1 sản phẩm đang bán thuộc nhà sản xuất này.";
} else {
	echo '';
$delete="delete from manufacturer where manufacturer_id='$id'";
mysqli_query($connect,$delete);
}
