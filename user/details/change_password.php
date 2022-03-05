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
	td input{
		width:300px;
		height: 40px;
	}
	td button{
		width: 10%;
		padding: 2px 5px;
		background-color: skyblue;
		color: white;
		font-weight: 800;
		font-size: 15px;
		border: 0;
	}
	#announce{
		color: red;
	}
</style>
<body>
	<?php include '../theme1.php'; ?>
	
	<div class="feature">
		<b></b>
		<p>ĐỔI MẬT KHẨU</p>
		<b></b>
	</div>

	<main>
		
		<?php
		include './details.php';
		if(isset($_SESSION['level'])){ ?>
			<p>
				Nếu muốn thay đổi thông tin, liên hệ admin để thay đổi.
			</p>
		<?php } else { ?>
			<div class="right_column">
				<table>
					<tr><td>Mật khẩu cũ:</td>
						<td><input id="password" type="password" name="password"></td>
					</tr>
					<tr>
						<td>Mật khẩu mới:</td>
						<td><input id="new_password" type="password" name="new_password"></td>
					</tr>
					<tr>
						<td>Nhập lại mật khẩu:</td>
						<td><input id="new_password1" type="password" name="new_password1"></td>
					</tr>
					<tr>
						<td colspan="2">
							<span id="announce"></span>
							<button id="btn-change">Đổi</button>
						</td>
					</tr>
				</table>
			</div>
		<?php } ?>
	</main>
	<?php include '../theme2.php'; ?>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
<script type="text/javascript">
	$("#btn-change").click(function(event) {
		let password=document.getElementById('password').value;
		let new_password=document.getElementById('new_password').value;
		let new_password1=document.getElementById('new_password1').value;
		if(password=="" || new_password=="" || new_password1==""){
			document.getElementById('announce').innerHTML="Vui lòng điền đầy đủ thông tin";
			return;
		}
		if(new_password!=new_password1){
			document.getElementById('announce').innerHTML="Mật khẩu mới và mật khẩu xác nhận không giống nhau, vui lòng nhập lại";
			return;
		} else if(password==new_password){
			document.getElementById('announce').innerHTML="Mật khẩu mới không được giống mật khẩu cũ";
			return;
		}
		$.ajax({
			url: '../process/change_password_process.php',
			type: 'POST',
			data: {password,new_password,new_password1},
		})
		.done(function(check) {
			if(check!=="1"){
				document.getElementById('announce').innerHTML=check;
			} else {
				document.getElementById('announce').innerHTML="Đổi mật khẩu thành công.";
				setTimeout(function() { document.getElementById('announce').hide()},5000);
			}
		})
		
		
	});
</script>

</html>