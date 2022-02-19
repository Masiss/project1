<?php require_once '../extra/check_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Nunito Sans">
	<link rel="stylesheet" type="text/css" href="admin.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đây là giao diện admin!</title>
</head>

<style type="text/css">
	body {
		height: 500px;
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
		margin: 1em;

	}
</style>
<body>
	<?php include 'theme.php' ?>
	<div class="div-phai"  >
		<head>
			<div class="div-tren">
				<a href=""class="trai-div-tren">
				Thêm nhà sản xuất</a>
				<a href="../in_and_out/signout.php" class="logout">Đăng xuất</a>
			</div>		
		</head>
		<main >
			<form method="post" >
				
				<div >Tên nhà sản xuất:
					<br>
					<input id="name" type="text" name="manu_name">
				</div>
				<button type="reset">Nhập lại</button>
				<button id="btn-submit"  onclick="return check()" type="submit" >Thêm</button>
			</form>
			<span style="color:red" id="error"></span>
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

				let manu_name=$('#name').val();
				
				$.ajax({
							url: './manufacturer_process/manu_processing.php',
							type: 'POST',
							data: {manu_name},
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