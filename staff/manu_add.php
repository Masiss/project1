<?php require_once '../extra/check_staff.php' ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Nunito Sans">
	<link rel="stylesheet" type="text/css" href="staff.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đây là giao diện Nhân viên!</title>
</head>
<style type="text/css">
	body {
		height: 1000px;
	}
	main{
		
		font-size: 20px;
		padding: 3em 0em 0em 3em;
		font-weight: bold;
	}	
	input, textarea{
		width: 50%;
		height: 30px;
		border: 1px solid;
		border-color: dimgray;
		font-size: 19px;
		font-family: "Nunito Sans",monospace;
	}
	button{
		border: 0;
		background-color: skyblue;
		font-size: 18px;
		border-radius: 20%;
		font-weight: 500;
		font-family: "Nunito Sans",monospace;
		margin-top: 1em;
		
	}
</style>
<body>
	<?php 
	include 'theme_staff.php' ?>
	<div class="div-phai"  >
		<head>
			<div class="div-tren">
				<a href="" class="div-tren-trai" >Thêm nhà sản xuất</a>
				<a href="../in_and_out/signout.php" class="logout">Đăng xuất</a>
			</div>		
		</head>
		<main >
			<form method="post" action="./manufacturer_process/add_manu.php">
				<div >
					Tên nhà sản xuất:
					<br>
					<input id="name" type="text" name="">
					<span id="name_error"></span>
				</div>			
				<button type="submit" onclick="return check()">Đăng</button>
				<button type="reset">Nhập lại</button>
			</form>
		</main>
	</div>
	<script type="text/javascript">
			function check(){
				let check=true;
				let name=document.getElementById('name').value;
				if(name==''){
					document.getElementById('name_error').innerHTML='Vui lòng nhập tên nhà sản xuất';
					check=false;
				} 
				return check;
			}



	</script>

</body>
</html>