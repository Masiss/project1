<?php require_once '../extra/check_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Nunito Sans">
	<link rel="stylesheet" type="text/css" href="./admin.css">
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
	img{
		width: 150px;
		height: 150px;
	}
	tr{
		display: table-row;
	}
	tr td{
		text-align: left;
		padding: 10px;
		vertical-align: middle;
		text-overflow: ellipsis;
	}
</style>
<body>
	<?php include './theme.php' ?>
	<div class="div-phai"  >
		<head>
			<div class="div-tren">
				<a href=""class="trai-div-tren">
				Chi tiết đơn hàng</a>
				<a href="../in_and_out/signout.php" class="logout">Đăng xuất</a>
			</div>		
		</head>
		<?php $id=$_GET['id']; 
		include '../extra/connect.php';
		$bill=mysqli_query($connect,"SELECT bill.* from bill
			where bill_id='$id'")->fetch_array();
		

			?>
			<main >
				
				<div style="float: left; width:50%">
					<p>
						Mã đơn hàng:<?php echo $bill['bill_id']; ?>
					</p>
					<p>
						Thời gian tạo đơn: <?php echo $bill['create_at'] ?>
					</p>
					<p>
						Tên khách hàng:<?php echo $bill['user_name'] ?>
					</p>
					<p>
						Số điện thoại: <?php echo '0'.$bill['user_phone'] ?>
					</p>
					<p>
						Địa chỉ:<?php echo $bill['user_address'] ?>
					</p>
					<p>
						Email:<?php echo $bill['user_email'] ?>
					</p>
					<p>
						Ghi chú:<?php echo $bill['note'] ?>
					</p>
				</div>
				<div>
					<table>
						<tr>
							<td></td>
							<td>Thông tin sản phẩm</td>
							<td>Số lượng</td>
							<td>Size</td>
							<td>Tạm tính</td>
						</tr>
						<?php 
						$get_product=mysqli_query($connect,"select bill_detail.*,product.* from bill_detail join product on bill_detail.product_id=product.product_id where bill_detail.bill_id='{$bill['bill_id']}'");
						
						foreach ($get_product as $key) {
							// code...
						
							?>
							<tr>
								<td><img src="./pic_product/<?php echo $key['product_image'] ?>"></td>
								<td>
									
									<?php echo $key['product_name']; ?>
								</td>
								<td><?php echo $key['quantity'] ?></td>
								<td><?php echo $key['product_size'] ?></td>
								<td><?php echo ($key['quantity']*$key['price'])?></td>
							</tr>
						<?php } ?>
						<tr>
							<td>Tổng tiền:</td>
							<td><?php echo $bill['total'] ?></td>

						</tr>
					</table>
				</div>
			</main>
		</div>

	</body>
	</html>