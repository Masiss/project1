<?php require_once '../../extra/check_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source Sans 3">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đổi tên nhà sản xuất</title>
	<style type="text/css">
		body{
			background-color: skyblue;
		}
		div{
			background-color: whitesmoke;
			width: 23%;
			top: 20%;
			left: 34%;
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
			position: relative;
			left: 35%;	
		}
	</style>
</head>
<body>
	<div>
		<header>
			Thay đổi tên nhà sản xuất
		</header>	
		<?php $id=$_GET['id'] ;
		include '../../extra/connect.php';
		$getname=mysqli_query($connect,"select manufacturer_name from manufacturer where manufacturer_id='$id'")
		->fetch_array()["manufacturer_name"];
		?>
	<form action="manu_processing1.php?id=<?php echo $id ?>" method="post">
		
		<main>
			<input type="hidden" name="id" value="<?php echo $id ?>">
		<p>
			Tên nhà sản xuất
			<br>
			<input type="text" name="manu_name" value="<?php echo $getname ?>">
		</p>
		
	</main>
		<a href="">
			<button type="submit" >
					Thay đổi
			</button>
		</a>
	</form>
	
	</div>
</body>
</html>