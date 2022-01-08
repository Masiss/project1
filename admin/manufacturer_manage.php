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
		height: 700px;
	}
	table{
		
		width: 100%;
		position: relative;
		background-color: rgba(0, 0, 0, 0.05);
		font-size: 20px;
	}
	main{
		padding: 1em;
	}
	input{
		border-radius: 30px;
		font-size: 19px;
		font-family: "Nunito Sans",monospace;
	}
	button{
		border: 0;
		background-color: skyblue;
	}
	
</style>
<body>
	<?php include 'theme.php' ?>
	<div class="div-phai"  >
		<head>
			<div class="div-tren">
				<a href=""class="trai-div-tren">
				Quản lí nhà sản xuất</a>
				<a href="../in_and_out/signout.php" class="logout">Đăng xuất</a>
			</div>		
		</head>
		<main style="font-family:Nunito Sans, monospace;font-size: 19px;">
			<?php
			include '../extra/connect.php';
			require_once '../extra/pagi1.php';

			$result=mysqli_query($connect,"select count(*) as total_manu from manufacturer where manufacturer_name like '%$search%'");
			$result=$result->fetch_array()["total_manu"];
			require_once '../extra/pagi2.php';

			
			$sql="select * from manufacturer where manufacturer_name like '%$search%' limit $items offset $skip";
			?>
			<p >
				Số lượng nhà sản xuất: <?php echo $result ?>
			</p>
			<form >
				Tìm kiếm nhà sản xuất:
				<input type="text" name="search" placeholder="Nhập tên nhà sản xuất" value="<?php echo $search; ?>">
			</form>
			<br>
			<table>
				<tr style="font-family:Nunito Sans, monospace;">
					<td>ID nhà sản xuất</td>
					<td>Tên nhà sản xuất</td>
					<td></td>
					<td></td>
				</tr>
				<?php 

				$all_manu=mysqli_query($connect,$sql);
				foreach ($all_manu as $each) {
					?>
					<tr>
						<td><?php echo $each['manufacturer_id'] ?></td>
						<td><?php echo $each['manufacturer_name'] ?></td>
						<td><a href="./manufacturer_process/rename_manu.php?id=<?php echo $each['manufacturer_id'] ?>"><button>Sửa</button></a> </td>
						<td><a href="./manufacturer_process/delete_manu.php?id=<?php echo $each['manufacturer_id'] ?>"><button>Xóa</button></a> </td>					
					</tr>
				<?php } ?>
			</table>
			<?php require_once '../extra/pagi3.php' ?>
		</main>
	</div>

</body>
</html>