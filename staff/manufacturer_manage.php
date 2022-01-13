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
	.page{
		color: darkturquoise;
		border: 1px solid;
		margin: 3px;
		padding: 1px;
	}
	
</style>
<body>
	<?php include 'theme_staff.php' ?>
	<div class="div-phai"  >
		<head>
			<div class="div-tren">
				<a href="#" class="div-tren-trai">Quản lí nhà sản xuất</a>
				<a href="../in_and_out/signout.php" class="logout">Đăng xuất</a>
			</div>		
		</head>
		<main style="padding:1em;height:100%;font-size: 20px;font-family: Nunito Sans, monospace;">
			<?php 
			
			include '../extra/connect.php';
			require_once '../extra/pagi1.php';


			$result=mysqli_query($connect,"select count(*) as total_manu from manufacturer where manufacturer_name like '%$search%'")->fetch_array()["total_manu"];
			require_once '../extra/pagi2.php';

			
			$sql="select * from manufacturer where manufacturer_name like '%$search%' limit $items offset $skip";
			?>


			<p>
				Số lượng nhà sản xuất: <?php echo $result; ?> 
			</p>
			<form>
				Tìm kiếm nhà sản xuất
				<input type="text" name="search" placeholder="Nhập tên nhà sản xuất" value="<?php echo $search; ?>">
			</form>
			<table>
				<tr>
					<td>ID nhà sản xuất</td>
					<td>Tên nhà sản xuất</td>
				</tr>	
				<?php 
				$all_manu=mysqli_query($connect,$sql);
				foreach ($all_manu as $manu) {
					?>
					<tr>
						<td><?php echo $manu['manufacturer_id'] ?></td>
						<td><?php echo $manu['manufacturer_name'] ?></td>
					</tr>
				<?php } ?>			
			</table>
			<?php require_once '../extra/pagi3.php'; ?>
		</main>	
	</div>

</body>
</html>