<?php require_once '../extra/check_admin.php'; ?>
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
		height: 1000px;
	}
	main{
		padding: 2em;
		font-size: 19px;
	}
	table{
		position: relative;
		border: 1px solid darkgrey;
		border-collapse: collapse;
		width: 100%;
		font-weight: bold;
		font-family: Nunito Sans, monospace;
	}
	td{
		border: 1px solid;
	}
	.page{
		color: darkturquoise;
		border: 1px solid;
		margin: 3px;
		padding: 1px;
	}
	
</style>
<body>
	<?php include 'theme.php' ?>
	<div class="div-phai"  >
		<head>
			<div class="div-tren">
				<a href=""class="trai-div-tren">
				Các đơn hàng chờ duyệt</a>
				<a href="../in_and_out/signout.php" class="logout">Đăng xuất</a>
			</div>
		</head>
		<main >
			<?php 
			include '../extra/connect.php';
			require_once '../extra/pagi1.php';
				$result=mysqli_query($connect,"select count(*) as total_bill from bill_detail where status='đang đợi'")->fetch_array()['total_bill'];
			require_once '../extra/pagi2.php';
			?>

			<p style="font-family: Nunito Sans, monospace;font-weight: 700;">Số hóa đơn chờ duyệt: <?php echo $result ?> </p>
			<table>
				<tr>
					<td>Mã đơn</td>
					<td>Tên mặt hàng</td>
					<td>Số lượng</td>
					<td>Người mua</td>
					<td>Địa chỉ</td>
					<td>Số điện thoại</td>
					<td>Ghi chú</td>
				</tr>
				<?php 
				$bill=mysqli_query($connect,"select * from bill_detail where status='đang đợi' limit $items offset $skip");
				foreach ($bill as $each) {
					//get product_name
					$id=$each['bill_id'];
					$bill=mysqli_query($connect,"select * from bill where bill_id='$id'")->fetch_array();
					$id_product=$each['product_id'];
					$product=mysqli_query($connect,"select product_name from product where product_id='$id_product'")->fetch_array()['product_name'];
					//get user_name
					$id_user=$bill['user_id'];
					$user_name=mysqli_query($connect,"select user_name from user where user_id='$id_user'")
					->fetch_array()['user_name'];
					


				 ?>
				<tr>
					<td><?php echo $bill['bill_id'] ?></td>
					<td><?php echo $product ?></td>
					<td><?php echo $each['quantity'] ?></td>
					<td><?php echo $user_name ?></td>
					<td><?php echo $bill['user_address'] ?></td>
					<td><?php echo $bill['user_phone'] ?></td>
					<td><?php echo $bill['note'] ?></td>
					<td><a href="./bill_process/bill_approve.php?id=<?php echo $bill['bill_id'] ?>" style="color: darkred;">Duyệt</a></td>
					<td><a href="./bill_process/bill_cancel.php?id=<?php echo $bill['bill_id'] ?>"  style="color: darkred;">Hủy</a></td>
				</tr>
			<?php } ?>
			</table>
			
			<?php require_once '../extra/pagi3.php'; ?>
	
		</main>
	</div>

</body>
</html>