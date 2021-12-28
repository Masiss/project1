<?php 
$id=$_GET['id'];
$product=$_POST['product_name'];
$quantity=$_POST['quantity'];
$user_name=$_POST['user_name'];
$bill_address=$_POST['bill_address'];
$bill_phone=$_POST['bill_phone'];
$note=$_POST['note'];
include 'connect.php';
$check=false;
$check_user=mysqli_query($connect,"select user_name,user_phone from user")->fetch_array();
foreach($check_user as $each){
	if($each['user_name']==$user_name && $each['user_phone']==$bill_phone){
		$check= true;
	}
}