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
	
	.click {
		color: red;
	}
	
</style>
<body>
	<?php include 'theme.php' ?>
	<div class="div-phai"  >
		<head>
			<div class="div-tren">
				<a href=""class="trai-div-tren">
				Quản lí hóa đơn</a>
				<a href="../in_and_out/signout.php" class="logout">Đăng xuất</a>
			</div>		
		</head>
		<main style="padding:2em;height:100%">

			<?php

			include '../extra/connect.php';
			require_once '../extra/pagi1.php';
			$result=mysqli_query($connect,'select count(*) as total_bill from bill');
			$result=$result->fetch_array()["total_bill"];
			require_once '../extra/pagi2.php';

			?>


			<p style="font-size: 20px;font-family: Nunito Sans, monospace;">Số lượng đơn hàng: <?php echo $result; ?>
		</p>

		<table>
			<tr>
				<td>Mã đơn</td>
				<td>Tên mặt hàng</td>
				<td>Số lượng</td>
				<td>Tên người đặt</td>
				<td>Địa chỉ</td>
				<td>Số điện thoại</td>
				<td>Ghi chú</td>
				<td>Tình trạng</td>
			</tr>
			<?php 
			$sql="select * from bill limit $items offset $skip";
			$all_bill=mysqli_query($connect,$sql);
			foreach ($all_bill as $each) {
				//get user_name
				$user0=$each['user_id'];
				$user1="select user_name from user where user_id='$user0'";
				$user=mysqli_query($connect,$user1)->fetch_array()['user_name'];
				//get bill_details
				$bill0=$each['bill_id'];
				$bill1="select product_id,quantity,status from bill_detail where bill_id='$bill0'";
				$bill_detail=mysqli_query($connect,$bill1)->fetch_array();
				//get product_name
				$product0=$bill_detail['product_id'];
				$product1="select product_name from product where product_id='$product0'";
				$product=mysqli_query($connect,$product1)->fetch_array()['product_name'];
				?>
				<tr>
					
					<td><?php echo $each['bill_id']; ?></td>
					<td><?php echo $product; ?></td>
					<td><?php echo $bill_detail['quantity'] ;?></td>
					<td><?php echo $user; ?></td>
					<td><?php echo $each['user_address']; ?></td>
					<td><?php echo '0'. $each['user_phone']; ?></td>
					<td><?php echo $each['note']; ?></td>
					<td><?php echo $bill_detail['status']; ?></td>
					<?php if($bill_detail['status']=='đang đợi') { ?>
						<td><a class="click"  href="./bill_process/bill_approve.php?id=<?php echo $each['bill_id'] ?>"><?php echo 'Duyệt'; ?></a></td>	
						<td><a class="click"  href="./bill_process/bill_cancel.php?id=<?php echo $each['bill_id'] ?>"><?php echo 'Hủy'; ?></a></td>
					<?php } else if($bill_detail['status']=='đã duyệt'){ ?>	
						
						<td><a class="click"  href="./bill_process/bill_cancel.php?id=<?php echo $each['bill_id'] ?>"><?php echo 'Hủy'; ?></a></td>
					<?php } else { ?>
						<td><a  class="click" href="./bill_process/bill_approve.php?id=<?php echo $each['bill_id'] ?>"><?php echo 'Duyệt'; ?></a></td>	
					<?php } ?>
				</tr>
			<?php } ?>


		</table>
		<?php require_once '../extra/pagi3.php'; ?>
	</main>

</div>

</body>
</html>