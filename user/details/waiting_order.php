<?php
include './connect.php';
session_start();
if(!isset($_SESSION['id']) && !isset($_SESSION['name'])){
	header("Location: ../index.php");
	exit();
} ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans" rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css2?family=Rowdies" rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="../user.css">
	<link rel="stylesheet" type="text/css" href="./details.css">
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<title>Masiss Pomade</title>
</head>
<style type="text/css">

	main div{
		overflow: hidden;
	}
	.feature{
		display: flex;
		justify-content: center;
		box-sizing: border-box;
		align-items: center;
		margin-left: auto;
		margin-right: auto;
		height: auto;

	}
	.feature p{
		font-weight: 900;
		font-size: 25px;
		color: black;
	}
	.right_column{
		width:70%
	}
</style>
<body>
	<?php include '../theme1.php'; ?>
	
	<div class="feature">
		<b></b>
		<p>ĐƠN HÀNG ĐANG CHỜ</p>
		<b></b>
	</div>

	<main>
		
		<?php include './details.php'; ?>
		<div class="right_column">
			<?php 
			$get_bill=mysqli_query($connect,"select * from bill where user_id='{$_SESSION['id']}' and status='0'");
			if($get_bill->num_rows==0){
				?>
				<p >
					Bạn chưa có đơn hàng nào.
				</p>
			<?php } else if($get_bill->num_rows>0){ ?>
				<span style="color:gray; font-size: 15px;margin: 10px;">
					*Nếu muốn hủy đơn hàng, vui lòng liên hệ vào thông tin liên lạc ở cuối trang.
				</span>
				<table>
					<tr>
						<td>Mã đơn hàng</td>
						<td>Sản phẩm</td>
						<td>Giá trị đơn hàng</td>
						<td>Thời gian đặt hàng</td>
						<td>Trạng thái</td>
					</tr>
					<?php
					foreach ($get_bill as $each) {
					 	
					 
					 ?>
					<tr>
						<td><?php echo $each['bill_id'] ?></td>
						<td>
							<?php 
							$get_product=mysqli_query($connect,"select product.*, bill_detail.* from product join bill_detail on bill_detail.product_id=product.product_id where bill_detail.bill_id='{$each['bill_id']}'");
							foreach ($get_product as $key) {
								echo $key['product_name'].'.'.'Size'.$key['product_size'];
								?>
								<br>

							<?php } ?>
						</td>
						<td><?php echo $each['total'].'đ' ?></td>
						<td><?php echo $each['create_at'] ?></td>
						<td><?php echo $each['status']=="0"?'đang chờ':($each['status']=="1"?"đã duyệt":($each['status']=="3"?'đã hủy':"")) ?></td>
					</tr>
				<?php } ?>
				</table>
			<?php } ?>
		</div>
		
	</main>
	<?php include '../theme2.php'; ?>

</body>

</html>