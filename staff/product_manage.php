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
	<?php include 'theme_staff.php'; ?>
	<div class="div-phai"  >
		<head>
			<div class="div-tren">
				<a href="" class="div-tren-trai">Quản lí sản phẩm</a>
				<a href="../in_and_out/signout.php" class="logout">Đăng xuất</a>
			</div>		
		</head>
		
		<main style="padding:1em 0em 0em 1em;height: 100%;">

		<?php
			include '../extra/connect.php';
			require_once '../extra/pagi1.php';


			$result=mysqli_query($connect,"select count(*) as total_product from product where product_name like '%$search%'");
			$result=$result->fetch_array()["total_product"];
			require_once '../extra/pagi2.php';

			$sql="select * from product where product_name like '%$search%' limit $items offset $skip";
					$all_product=mysqli_query($connect,$sql);
			?>

			<p style="font-size: 20px;font-family: Nunito Sans, monospace;">Số lượng đơn hàng: <?php echo $result ?></p>
			<form style="font-size:20px;font-family: Nunito Sans, monospace;">Tìm kiếm đơn hàng
			<input type="text" name="search" placeholder="Nhập tên sản phẩm" value="<?php echo $search ?>">
			</form>
			<table>
				<tr>
					<td>ID</td>
					<td>Tên sản phẩm</td>
					<td>Ảnh sản phẩm</td>
					<td>Nhà sản xuất</td>
					<td>Giá</td>
					<td>Mô tả</td>
					<td>Kích thước</td>
					<td>Loại</td>
				</tr>
				<?php 
					
					
					foreach ($all_product as $each) {
						$id_manu=$each['manufacturer_id'];
						$name_manu=mysqli_query($connect,"select manufacturer_name
						 from manufacturer where manufacturer_id='$id_manu'");
						$name_manu=$name_manu->fetch_array()['manufacturer_name'];
						$each['manufacturer_id']=$name_manu;
						$id_type=$each['type_id'];
						$type=mysqli_query($connect,"select type_name
						 from type where type_id='$id_type'");
						$type=$type->fetch_array()['type_name'];
						$each['type_id']=$type;
					 ?>
				<tr>
					
					 <td><?php echo $each['product_id'] ?></td>
					 <td><?php echo $each['product_name'] ?></td>
					 <td><img src="../admin/pic_product/<?php echo $each['product_image'] ?>" style="height: 100px;width:100px;"></td>
					 <td><?php echo $each['manufacturer_id'] ?></td>
					 <td><?php echo $each['price'] ?></td>
					 <td><?php echo $each['description'] ?></td>
					 <td><?php echo $each['product_size'] ?></td>
					 <td><?php echo $each['type_id'] ?></td>
					<td><a href="./product_process/form_update.php?id=<?php echo $each['product_id']  ?>"><button>Sửa</button></a> </td>				
				</tr>
				<?php } ?>
				
			</table>
			<?php require_once '../extra/pagi3.php'; ?>
		</main>
	</div>

</body>
</html>