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
	<?php include 'theme.php' ?>
	<div class="div-phai"  >
		<head>
			<div class="div-tren">
				
				<a href="" class="trai-div-tren" >Các đơn hàng đã xóa:</a>
				<a href="../in_and_out/signout.php" class="logout">Đăng xuất</a>
			</div>	
		</head>
		<main>
			<?php 
			include '../extra/connect.php';
			if(isset($_GET['page'])){
				$page=$_GET['page'];
			}else $page=1;
			$count_bill=mysqli_query($connect,"select count(*) as total_bill from bill_detail where status='đã hủy'")->fetch_array()['total_bill'];
			$order_per_page=1;
			$total_page=ceil($count_bill/$order_per_page);
			$skip= $order_per_page*($page-1);


			?>
			<p style="font-size: 19px;">Số lượng đơn hàng đã xóa: <?php echo $count_bill; ?> </p>
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
				$bill_detail=mysqli_query($connect,"select * from bill_detail where status='đã hủy' limit $order_per_page offset $skip");
				foreach ($bill_detail as $each) {
					$id=$each['bill_id'];
					$bill=mysqli_query($connect,"select * from bill where bill_id='$id'")->fetch_array();
					$id_product=$each['product_id'];
					$product=mysqli_query($connect,"select product_name from product where product_id='$id_product'")->fetch_array()['product_name'];
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





					</tr>
				<?php } ?>
			</table>
			<div style="margin-top:1em">
				<?php for($i=1;$i<=$total_page;$i++){ ?>
					<a class="page" href="?page=<?php echo $i ?>">
						<?php  echo $i; ?>	
					</a>			
				<?php	} ?>
			</div>	
		</main>
	</div>

</body>
</html>