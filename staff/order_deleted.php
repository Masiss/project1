<?php require_once '../extra/check_staff.php' ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Nunito Sans">
	<link rel="stylesheet" type="text/css" href="staff.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đây là giao diện admin!</title>
</head>
<style type="text/css">
	body {
		height: 1000px;
	}
	table{
		font-family: Nunito Sans, monospace;
		width: 100%;
		position: relative;
		background-color: rgba(0, 0, 0, 0.05);
		font-size: 20px;
	}
	main{
		padding: 1em;
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
				
				<a href="" class="div-tren-trai" >Các đơn hàng đã xóa:</a>
				<a href="../in_and_out/signout.php" class="logout">Đăng xuất</a>
			</div>	
		</head>
		<main>
			<?php 
			include '../extra/connect.php';
			require_once '../extra/pagi1.php';
			$result=mysqli_query($connect,"select count(*) as total_bill from bill where status='3'")->fetch_array()['total_bill'];
			require_once '../extra/pagi2.php';


			?>
			<p style="font-size: 19px;">Số lượng đơn hàng đã xóa: <?php echo $result; ?> </p>
			<table>
				<tr>
					<td>Mã đơn</td>
					<td>Tên mặt hàng</td>
					<td>Số lượng</td>
					<td>Người mua</td>
					<td>Địa chỉ</td>
					<td>Số điện thoại</td>
					<td>Ghi chú</td>
					<td>Tình trạng</td>
				</tr>
				
				<?php 
				$bill_detail=mysqli_query($connect,"SELECT bill.*,user.* from bill
					JOIN user on bill.user_id=user.user_id
					where bill.status='3'
					order by bill.create_at desc  limit $items offset $skip");
				foreach ($bill_detail as $each) {
					?>

					
					<tr>
						<td><?php echo $each['bill_id'] ?></td>
						<td>
							<?php 
							$get_product=mysqli_query($connect,"select product.*,bill_detail.* from product join bill_detail on bill_detail.product_id=product.product_id where bill_detail.bill_id='{$each['bill_id']}'");
							foreach ($get_product as $key ) {
								echo $key['product_name'];
								?>
								<?php echo 'size: '.$key['product_size'] ?>
								<br>							
							<?php } ?>

						</td>
						<td><?php echo $each['user_name'] ?></td>
						<td><?php echo $each['user_address'] ?></td>
						<td><?php echo '0'.$each['user_phone'] ?></td>
						<td><?php echo $each['note'] ?></td>
						<td><?php echo $each['status'] ?></td>
						<td style="width:7%">
							<a target="_blank"  href="./view_bill.php?id=<?php echo $each['bill_id'] ?>">
								<button >Chi tiết</button>
							</a>
						</td>




					</tr>
				<?php } ?>
			</table>
			<?php require_once '../extra/pagi3.php'; ?>
		</main>
	</div>

</body>
</html>