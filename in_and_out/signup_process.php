<?php session_start();
$staff_name=$_POST['staff_name'];
$staff_phone=$_POST['staff_phone'];
$staff_email=$_POST['staff_email'];
$staff_address=$_POST['staff_address'];
$staff_birthday=$_POST['staff_birthday'];
$gender=$_POST['gender'];
$password=$_POST['password'];


include '../extra/connect.php';
//validate
$_SESSION['staff_name']=isset($_POST['staff_name'])? $_POST['staff_name']: '';
$_SESSION['password']=isset($_POST['password'])? $_POST['password']: '';
$_SESSION['gender']=isset($_POST['gender'])? $_POST['gender']: '';
$_SESSION['staff_phone']=isset($_POST['staff_phone'])? $_POST['staff_phone']: '';
$_SESSION['staff_birthday']=isset($_POST['staff_birthday'])? $_POST['staff_birthday']: '';
$_SESSION['staff_address']=isset($_POST['staff_address'])? $_POST['staff_address']: '';
$_SESSION['staff_email']=isset($_POST['staff_email'])? $_POST['staff_email']: '';

if(empty($staff_name) ||
empty($staff_phone)||
empty($password)||
empty($staff_email)||
empty($staff_address)||
empty($staff_birthday)||
empty($gender)){
	header("Location: signup.php?error=Vui lòng điền đầy đủ thông tin");
	exit;

}
$all=mysqli_query($connect,"select * from staff");
foreach ($all as $each) {
	if($each['staff_phone']==$staff_phone ){
		
		header("Location: ./signup.php?error=Số điện thoại đã được sử dụng");
		exit;
	} else if( $each['staff_email']==$staff_email){

		header("Location: ./signup.php?error=Email đã được sử dụng");
		exit;
	}
}






$sql="insert into staff(staff_name,gender,staff_birthday,staff_email,staff_address,staff_phone,staff_password,level) 
				values('$staff_name','$gender','$staff_birthday','$staff_email','$staff_address','$staff_phone','$password','0')";
mysqli_query($connect,$sql);
session_destroy();
header('Location: ../staff/index.php');