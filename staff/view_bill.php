<?php require_once '../extra/check_staff.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Nunito Sans">
	<link rel="stylesheet" type="text/css" href="./staff.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đây là giao diện staff!</title>
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
	<?php include './theme_staff.php' ?>
	<div class="div-phai"  >
		<head>
			<div class="div-tren">
				<a href="#" class="div-tren-trai">Chi tiết hóa đơn</a>
				<a href="../in_and_out/signout.php" class="logout">Đăng xuất</a>
			</div>		
		</head>
		<?php $id=$_GET['id']; 
		include '../extra/connect.php';
		$bill=mysqli_query($connect,"SELECT bill_detail.*,bill.* from bill
			JOIN bill_detail on bill.bill_id=bill_detail.bill_id 
			where bill.bill_id='$id'")->fetch_array();
		
		

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
						$bill_detail=mysqli_query($connect,"select * from bill_detail where bill_id='$id'")->fetch_array();

						$product_details=json_decode($bill_detail['product_details'],true);

						foreach ($product_details as $key=> $value) {

							$product=mysqli_query($connect,"select * from product where product_id='$key'")->fetch_array();


							?>
							<tr>
								<td><img src="../admin/pic_product/<?php echo $product['product_image'] ?>"></td>
								<td>
									
									<?php echo $product['product_name']; ?>
								</td>
								<td><?php echo $value['quantity'] ?></td>
								<td><?php echo $value['size'] ?></td>
								<td><?php echo ($value['quantity']*$product['price'])?></td>
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