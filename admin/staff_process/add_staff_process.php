<?php 
if(
	empty($_POST['staff_name'])||
	empty($_POST['gender'])||
	empty($_POST['email'])||
	empty($_POST['staff_phone'])||
	empty($_POST['staff_birthday'])||
	empty($_POST['staff_address'])||
	empty($_POST['staff_password'])
){
	echo "Hãy điền đầy đủ thông tin trước khi thêm";
	exit();
}
$name=addslashes($_POST['staff_name']);
$gender=addslashes($_POST['gender']);
$phone=addslashes($_POST['staff_phone']);
$address=addslashes($_POST['staff_address']);
$email=addslashes($_POST['email']);
$password=addslashes($_POST['staff_password']);
$date=$_POST['staff_birthday'];
include '../../extra/connect.php';
$sql="insert into staff(staff_name,gender,staff_address,staff_phone,staff_email,staff_password,staff_birthday,level) values('$name','$gender','$address','$phone','$email','$password','$date','0')";
mysqli_query($connect,$sql);
echo "1";
exit();