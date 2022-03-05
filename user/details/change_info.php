<?php
include './connect.php';
session_start();
if(!isset($_SESSION['id']) && !isset($_SESSION['name'])){
	header("Location: ../index.php");
	exit();
} ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans" rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css2?family=Rowdies" rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="../user.css">
	<link rel="stylesheet" type="text/css" href="./details.css">
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<title>Masiss Pomade</title>
</head>
<style type="text/css">

	main div{
		overflow: hidden;
	}

	.feature{
		display: flex;
		justify-content: center;
		box-sizing: border-box;
		align-items: center;
		margin-left: auto;
		margin-right: auto;
		height: auto;

	}
	.feature p{
		font-weight: 900;
		font-size: 25px;
		color: black;
	}
	.right_column p{
		padding: 10px;
		margin: 10px 50px;

	}
	.right_column p input{
		padding: 10px;
		margin: 0 10px;
		width: 100%;
	}
	.right_column p input[type="radio"]{
		width: 10%;
	}
	.right_column div button{
		width: 20%;
		background-color: skyblue;
		color: white;
		font-weight: 800;
		font-size: 15px;
		border: 0;
	}
	.right_column{
		padding: 30px;
	}
</style>
<body>
	<?php include '../theme1.php'; ?>
	
	<div class="feature">
		<b></b>
		<p>THAY ĐỔI THÔNG TIN</p>
		<b></b>
	</div>

	<main>
		
		<?php 
		include './details.php';
		$get_info=mysqli_query($connect,"select * from user where user_id='{$_SESSION['id']}' and user_name='{$_SESSION['name']}'")->fetch_array();
		?>
		<div class="right_column">
			<p>
				Họ và tên: 
				<input id="name" type="text" name="name" value="<?php echo $get_info['user_name'] ?>">
			</p>
			<p>
				Giới tính:
				<input type="radio" name="gender" value="Male" <?php if($get_info['gender']=="Male") { echo "checked"; } ?>>Nam
				<input type="radio" name="gender" value="Female" <?php if($get_info['gender']=="Female") { echo "checked"; } ?> >Nữ
				<input type="radio" name="gender" value="np2s" <?php if($get_info['gender']=="np2s") { echo "checked"; } ?> >Khác
			</p>
			<p>
				Số điện thoại: <input id="phone" type="number" name="phone" value="<?php echo '0'.$get_info['user_phone'] ?>">
			</p>
			<p>
				Địa chỉ: <input id="address" type="text" name="address" value="<?php echo $get_info['user_address']; ?>">
			</p>
			<p>
				Email:<input id="email" type="email" name="email" value="<?php echo $get_info['user_email'] ?>">
			</p>
			<p>
				Ngày tháng năm sinh:
				<input id="date" type="date" name="date" value="<?php echo $get_info['user_birthday']; ?>">
			</p>

			<div style="display:flex;justify-content: center; margin-top: 20px;">
				<span id="announce" style="color:red;position: relative;">
					<?php if(isset($_GET['error'])){ echo $_GET['error'] ;} ?>
				</span>
				<button id="btn-change">Thay đổi</button>
			</div>
			
		</div>
	</main>
	<?php include '../theme2.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#btn-change").click(function(event) {
			let name=document.getElementById('name').value;
			let gender=document.querySelector('input[name=gender]:checked').value;
			let email=document.getElementById('email').value;
			let phone=document.getElementById('phone').value;
			let address=document.getElementById('address').value;
			let date=document.getElementById('date').value;
			if(name=="" || gender=="" || email=="" || phone=="" || address=="" || date==""){
				document.getElementById('announce').innerHTML="Vui lòng điền đầy đủ thông tin";
				return;
			}
			$.ajax({
				url: '../process/change_info_process.php',
				type: 'POST',
				data: {name,gender,email,phone,address,date},
			})
			.done(function(check) {
				if(check!=="1"){
					document.getElementById('announce').innerHTML=check;
				} else if(check==="1"){
					document.getElementById('announce').style.color='green';
					document.getElementById('announce').innerHTML="Thay đổi thông tin thành công. Bạn sẽ được điều hướng sang Thông tin cá nhân trong 3s";
					setTimeout(function() {
						document.getElementById('announce').style.visibility='hidden';
						window.location.href='./user_info.php';
					},5000);
				}
			})
						
		});
	});
</script>
</body>

</html>