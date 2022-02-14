<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans" rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css2?family=Rowdies" rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="user.css">
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
	main{
		margin: 0px 50px;
		align-content: center;
		display: flex;
	}
	main div{
		
		justify-content: center;
		width: 80%;
		
	}
	.register{
		padding: 20px;
		align-content: center;
		
	}
	.register p{
		font-size: 19px;
		text-transform: none;
		color: black;
		text-align: center;	
		margin: 10px 0;
	}
	.register input{
		width: 50%;
		margin-left: 25%;
		text-align: center;

	}
	.register input[type="radio"]{
		margin-left: 3%;
		width: 30px;
		padding-left: 100px;
	}
	.register button{
		width: 12.5%;
		margin: 30px auto;
		border: 1px solid;
		background-color: black;
		color: white;
		font-size:15px ;
		left: 37%;
		position: relative;
		font-weight: 500;
	}
	button[type="reset"]{
		background-color: white;
		color: black;
	}
</style>
<body>
	<?php include './theme1.php'; ?>
	
	<div class="feature">
		<b></b>
		<p>ĐĂNG KÝ</p>
		<b></b>

	</div>
	<span><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></span>
	<main>
		<div>
			<form class="register" method="POST" action="./process/register_process.php">
				<p>Họ và tên:</p>
				<input type="text" name="name">
				<p>Giới tính:</p>
				<p>
					<input type="radio" name="gender">Nam
					<input type="radio" name="gender">Nữ
					<input type="radio" name="gender">Không tiện nói
				</p>
				<p>Ngày sinh:</p>
				<input type="date" name="date">
				<p>Số điện thoại:</p>
				<input type="number" name="phone">
				<p>Địa chỉ:</p>
				<input type="text" name="address">
				<p>Email:</p>
				<input type="email" name="email">
				<p>Mật khẩu:</p>
				<input type="password" name="password">
				<br>
				<button type="submit">Đăng ký</button>
				<button type="reset">Nhập lại</button>

			</form>
		</div>
	</main>
	<?php include './theme2.php'; ?>

</body>

</html>