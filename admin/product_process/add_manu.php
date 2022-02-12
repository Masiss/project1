<?php require_once '../../extra/check_admin.php'; 
include '../../extra/connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source Sans 3">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thêm nhà sản xuất</title>
	<style type="text/css">
		body{
			background-color: skyblue;
		}
		div{
			background-color: whitesmoke;
			width: 30%;
			top: 5%;
			left: 30%;
			position: absolute;
			padding: 5em;
			justify-content: center;
			padding-top: 2em;
		}
		header{
			font-family: "Source Sans 3",monospace;
			font-size: 30px;
			text-align: center;
			font-weight: 700;
		}
		p{
			font-family: "Source Sans 3",monospace;
			font-size: 20px;
			font-weight: 500;
			 color: slategray;
			 text-align: center;
		}
		input{
			
			font-size: 20px;
			background-color: #f2f2f2;
			border: 0;
			outline: 0;
			border-bottom: 1px solid rgba(0,0,0,0.4);
			text-align: center;
			width: 100%;
		}
		button{
			font-size: 20px;
			background-color: skyblue;
			border: 1px solid;
			border-radius: 10px;
			font-family:"Source Sans 3";
			
		} 
		
	</style>
</head>
<body>
	<div>
		
		<header>
			Thêm nhà sản xuất
		</header>
		<main>
		<form method="post" >
			<p>
			Nhà sản xuất
			<br>
			<input id="name" type="text" name="manu_name" >
		</p>
		<a href="" style="display: flex;justify-content:center;text-decoration: none;"><button id="btn-submit" onclick="return check()">Thêm</button></a>
		<span id="error"></span>
		</form>
		
	</main>
	<script src="../../extra/check.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>

		<script type="text/javascript">
			$(document).ready(function() {
				$("#btn-submit").click(function(event) {
					event.preventDefault();
					let btn=$(this);
					let manu_name=$("#name").val();
					
					$.ajax({
						url: '../manufacturer_process/manu_processing.php',
						type: 'POST',
						
						data: {manu_name},
					})
					.done(function(sth) {
						if(sth!=="1"){
							$("#error").text(sth);
						} else {
							history.go(-1);
						}
					})
					.fail(function() {
						console.log("error");
					})
					.always(function() {
						console.log("complete");
					});
					
				});
			});
		</script>
	
	</div>
</body>
</html>