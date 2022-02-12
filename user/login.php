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
	<title></title>
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
		text-align: center;
		
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
		
		text-align: center;

	}
	input[type="checkbox"]{
		margin-left: 3%;
		width: 30px;
		padding-left: 100px;
	}
	.register button{
		width: 25%;
		margin: 30px auto;
		border: 1px solid;
		background-color: black;
		color: white;
		font-size:15px ;

		position: relative;
		font-weight: 500;
	}
	
</style>
<body>
	<?php include './theme1.php'; ?>
	
	<div class="feature">
		<b></b>
		<p>ĐĂNG KÝ</p>
		<b></b>

	</div>

	<main>
		<div>
			<form class="register" method="post" action="./process/login_process.php">
				<span style="color:red" id="announce"></span>
				<p>Email:</p>
				<input id="email" type="email" name="email">
				<p>Mật khẩu:</p>
				<input id="password" type="password" name="password">
				<br>
				<input type="checkbox" name="save_access">Ghi nhớ đăng nhập
				<br>
				<button class="btn-submit" type="submit" onclick="return check()">Đăng nhập</button>
				
			</form>
			<span style="margin-left:35%">
				*Nếu chưa có tài khoản, hãy nhấn
				<a href="./register.php">đăng ký</a>
			</span>
		</div>
	</main>
	<?php include './theme2.php'; ?>

</body>
<script type="text/javascript">
	function check() {
		let email=document.getElementById("email").value;
		let password=document.getElementById('password').value;
		
		let check=true;
		if(email==""){
			document.getElementById('announce').innerHTML="Vui lòng nhập email";
			console.log(1);
			check=false;
		} else{
			document.getElementById('announce').innerHTML="";
		}
		if(password==""){
			document.getElementById('announce').innerHTML="Vui lòng nhập mật khẩu";
			check=false;
		} else {
			document.getElementById('announce').innerHTML="";
		}
		return check;
	}
</script>

</html>