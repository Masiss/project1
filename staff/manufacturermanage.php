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
	
	table{
		width: 100%;
		border-collapse: collapse;
		font-size: 18px;
		font-weight: bold;
		font-family: "Nunito Sans", monospace;
	}
	td{
		border: 1px solid darkgrey;
	}
	input{
		font-size: 17px;
		font-family: "Nunito Sans", monospace;
		margin: 1em;
	}
	
</style>
<body>
	<?php include 'theme_staff.php' ?>
	<div class="div-phai"  >
		<head>
			<div class="div-tren">
				<a href="#" class="div-tren-trai">Quản lí nhà sản xuất</a>
				<a href="signin.html" class="logout">Đăng xuất</a>
			</div>		
		</head>
		<main style="padding:1em;height:100%;font-size: 20px;font-family: Nunito Sans, monospace;">
			<?php 
			include 'connect.php';
			$count_manu=mysqli_query($connect,"select count(*) as total_manu from manufacturer")->fetch_array()['total_manu'];

			 ?>



			<p>Số lượng nhà sản xuất: <?php echo $count_manu; ?> </p>
			<div>Tìm kiếm nhà sản xuất
			<input type="text" name="" placeholder="Nhập tên nhà sản xuất">
			</div>
			<table>
				<tr>
					<td>ID nhà sản xuất</td>
					<td>Tên nhà sản xuất</td>
				</tr>	
				<?php 
				$all_manu=mysqli_query($connect,"select * from manufacturer");
				foreach ($all_manu as $manu) {
				 ?>
				<tr>
					<td><?php echo $manu['manufacturer_id'] ?></td>
					<td><?php echo $manu['manufacturer_name'] ?></td>
				</tr>
				<?php } ?>			
			</table>
		</main>	
	</div>

</body>
</html>