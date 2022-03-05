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
	.right_column{
		padding: 30px;
	}
</style>
<body>
	<?php include '../theme1.php'; ?>
	
	<div class="feature">
		<b></b>
		<p>THÔNG TIN CÁ NHÂN</p>
		<b></b>
	</div>

	<main>
		
		<?php 
		include './details.php';
		if(isset($_SESSION['level'])){
			?>
			<p>
				Nếu muốn thay đổi thông tin, liên hệ admin để thay đổi.
			</p>
		<?php	} else {
			$get_info=mysqli_query($connect,"select * from user where user_id='{$_SESSION['id']}' and user_name='{$_SESSION['name']}'")->fetch_array();
		
		?>
		<div class="right_column">
			<span style="position: relative;width:fit-content; font-weight:700;">
				<a style="color: skyblue;" href="./change_info.php">Thay đổi</a>
			</span>
			<p>
				Họ và tên: <?php echo $get_info['user_name']; ?>
			</p>
			<p>
				Giới tính: <?php echo $get_info['gender']; ?>
			</p>
			<p>
				Số điện thoại: <?php echo '0'.$get_info['user_phone']; ?>
			</p>
			<p>
				Địa chỉ: <?php echo $get_info['user_address']; ?>
			</p>
			<p>
				Email: <?php echo $get_info['user_email']; ?>
			</p>
			<p>
				Ngày tháng năm sinh: <?php echo date_format(date_create($get_info['user_birthday']),"d/m/Y"); ?>
			</p>
		</div>
		<?php } ?>
	</main>
	<?php include '../theme2.php'; ?>

</body>

</html>