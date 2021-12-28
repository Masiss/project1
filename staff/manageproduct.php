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
	<?php include 'theme_staff.php' ?>
	<div class="div-phai"  >
		<head>
			<div class="div-tren">
				<a href="" class="div-tren-trai">Quản lí sản phẩm</a>
				<a href="signin.html" class="logout">Đăng xuất</a>
			</div>		
		</head>
		<?php 
		include 'connect.php';
		$count_product=mysqli_query($connect,"select count(*) as total_product from product")->fetch_array()['total_product'];
		 ?>
		<main style="padding:1em 0em 0em 1em;height: 100%;">
			<p style="font-size: 20px;font-family: Nunito Sans, monospace;">Số lượng đơn hàng: <?php echo $count_product ?></p>
			<div style="font-size:20px;font-family: Nunito Sans, monospace;">Tìm kiếm đơn hàng
			<input type="text" name="" placeholder="Nhập tên sản phẩm">
			</div>
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
					$sql="select * from product";
					$all_product=mysqli_query($connect,$sql);
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
					<td><a href="update_product.php?id=<?php echo $each['product_id']  ?>"><button>Sửa</button></a> </td>				
				</tr>
				<?php } ?>
				
			</table>
		</main>
	</div>

</body>
</html>