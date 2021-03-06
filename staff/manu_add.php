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
					<input id="name" type="text" name="name">
					
				</div>			
				
				<button type="reset">Nhập lại</button>
				<button id="btn-submit" type="submit" onclick="return check()">Thêm</button>
			</form>
			<span id="error"></span>
			<span style="color:green" id="announce"></span>

		</main>
	</div>
	<script type="text/javascript" src="../extra/check.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
	<script type="text/javascript">
		$(document).ready(function() {
			let name=$("#name").val();
			$("#btn-submit").click(function(event) {
				event.preventDefault();

				let name=$('#name').val();
				
				$.ajax({
							url: './manufacturer_process/add_manu.php',
							type: 'POST',
							data: {name},
						})
						.done(function(check) {
							if(check!=="1"){
								console.log(1);
								$("#announce").hide();
								$("#error").show().text(check);

							} else {
								console.log(0);
								$("#error").hide();
								$("#announce").show().text("Thêm nhà sản xuất thành công");
							}
						})
						
								
			});
		});
	</script>
	
</body>
</html>