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
	p{
		font-family: "Nunito Sans",monospace;
		font-size: 20px;
		border: 1px solid;
		width: 70%;
		padding: 20px;
		border-radius: 30px;		
	}	
	.div-duoi{
		display: grid;
		grid-template-columns: repeat(2, 1fr);
		display: grid;
		padding-top: 5em;
		padding-left: 6em;
	}
	
</style>
<body>
	<?php include 'theme.php' ?>
	<div class="div-phai"  >
		<head>
			<div class="div-tren">
				<a href="" class="trai-div-tren" >Dashboard</a>
				<a href="signin.php" class="logout">Đăng xuất</a>
			</div>	
		</head>
		<main>
			<?php 
			include 'connect.php';
			$count_product=mysqli_query($connect,"select count(*) as total_product from product")->fetch_array()['total_product'];
			$count_user=mysqli_query($connect,"select count(*) as total_user from user")->fetch_array()['total_user'];
			$count_staff=mysqli_query($connect,"select count(*) as total_staff from staff")->fetch_array()['total_staff'];

			$count_bill_approved=mysqli_query($connect,"select count(*) as total_approved from bill_detail where status='approved'")->fetch_array()['total_approved'];
			$count_bill_waiting=mysqli_query($connect,"select count(*) as total_waiting from bill_detail where status='waiting'")->fetch_array()['total_waiting'];
			$count_bill_canceled=mysqli_query($connect,"select count(*) as total_canceled from bill_detail where status='canceled'")->fetch_array()['total_canceled'];
			
			 ?>
			<div class="div-duoi">
				<p>Số lượng người dùng: <?php echo $count_user ?></p>
				<p>Số lượng nhân viên: <?php echo $count_user ?></p>
				<p>Số lượng sản phẩm được đăng: <?php echo $count_product ?> </p>
				<p>Số lượng đơn tồn: <?php echo $count_bill_waiting ?></p>
				<p>Số lượng đơn hàng đã duyệt: <?php echo $count_bill_approved ?> </p>
				<p>Số lượng đơn hàng đã hủy: <?php echo $count_bill_canceled ?> </p>
				
			</div>
		</main>
	</div>

</body>
</html>