<?php 
$id_user=$_POST['id_user'];
$id_product=$_POST['id_product'];
$note=$_POST['notes'];
$quantity=$_POST['quantity'];

$connect=mysqli_connect('localhost','root','','18');
mysqli_set_charset($connect,'utf8');

$get_user=mysqli_query($connect,"select * from user where user_id='$id_user'")->fetch_array();
$user_name=$get_user['user_name'];
$user_address=$get_user['user_address'];
$user_phone=$get_user['user_phone'];

$get_product=mysqli_query($connect,"select * from product where product_id='$id_product'")->fetch_array();
$date_time=date('Y-m-d H:i:s');


$total=$quantity*$get_product['price'];

$sql="insert into bill(user_id,user_name,user_address,user_phone,note) 
values('$id_user','$user_name','$user_address','$user_phone','$note')";
mysqli_query($connect,$sql);

$id_bill=mysqli_query($connect,"select bill_id from bill where bill_id=(select last_insert_id())")->fetch_array()['bill_id'];

$sql1="insert into bill_detail(bill_id,product_id,quantity,total,create_at,status)
values('$id_bill','$id_product','$quantity','$total','$date_time','đang đợi')";
mysqli_query($connect,$sql1);
