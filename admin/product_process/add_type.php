<?php require_once '../../extra/check_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source Sans 3">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thêm nhà loại sản phẩm</title>
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
			font-family: 
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
		<?php 
		
		if(isset($_GET['id'])){
			$id=$_GET['id'];
		}
		?>
		
		<header>
			Thêm loại sản phẩm
		</header>
		<main>
			<form method="post" action="type_processing.php?<?php if(isset($id)){
				echo 'id='.$id;} ?>">
				<p>
					Loại sản phẩm
					<br>
					<input type="text" name="type_name" >
				</p>
				<a href="" style="display: flex;justify-content:center;text-decoration: none;"><button>Thêm</button></a>
				
			</form>
			
		</main>
		
	</div>
</body>
</html>