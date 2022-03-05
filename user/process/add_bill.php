<?php 
session_start();
if(empty($_POST['user_name']) || empty($_POST['user_address']) || empty($_POST['user_phone']) || empty($_POST['user_email'])){
	echo " Vui lòng điền đầy đủ thông tin";
	exit();
}
if(empty($_POST['notes'])){
	$notes=null;
} else{
	$notes=$_POST['notes'];
}
include '../../extra/connect.php';
$id_user=$_SESSION['id'];
$user_name=addslashes($_POST['user_name']);
$user_address=addslashes($_POST['user_address']);
$user_phone=addslashes($_POST['user_phone']);
$user_email=addslashes($_POST['user_email']);


$date_time=date('Y-m-d H:i:s');

$total=$_SESSION['total'];
$sql="insert into bill(user_id,user_name,user_address,user_email,user_phone,note,total,create_at,status) 
values('$id_user','$user_name','$user_address','$user_email','$user_phone','$notes','$total','$date_time','0')";
mysqli_query($connect,$sql);

$id_bill=mysqli_query($connect,"select bill_id from bill where bill_id=(select last_insert_id())")->fetch_array()['bill_id'];

$product_details=$_SESSION['cart'];

foreach ($product_details as $key => $value) {
	$sql1="insert into bill_detail(bill_id,product_id,quantity)
	values('$id_bill','$key','{$value['quantity']}')";
	mysqli_query($connect,$sql1);
}

unset($_SESSION['cart']);
unset($_SESSION['total']);
echo "modal";


