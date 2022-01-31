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
	main{
		padding: 2em;
		font-size: 19px;
	}
	table{
		
		width: 100%;
		position: relative;
		background-color: rgba(0, 0, 0, 0.05);
		font-size: 20px;
	}
	
	
	
	button{
		border: none;
		background-color: skyblue;
		width: auto;
		height: auto;
	}
	
</style>
<body>
	<?php include 'theme_staff.php' ?>
	<div class="div-phai"  >
		<head>
			<div class="div-tren">
				<a href=""class="div-tren-trai">
				Các đơn hàng chờ duyệt</a>
				<a href="../in_and_out/signout.php" class="logout">Đăng xuất</a>
			</div>
		</head>
		<main >
			<?php 
			include '../extra/connect.php';
			require_once '../extra/pagi1.php';
			$result=mysqli_query($connect,"select count(*) as total_bill from bill_detail where status='đang đợi'")->fetch_array()['total_bill'];
			require_once '../extra/pagi2.php';;
			?>

			<p style="font-family: Nunito Sans, monospace;font-weight: 700;">
				Số hóa đơn chờ duyệt:
				<span id="total"> <?php echo $result ?> </span>
			</p>
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
						<td><button class="change" data-id="<?php echo $bill['bill_id'] ?>" data-type="Duyệt" >Duyệt</button></td>
						<td><button class="change" data-id="<?php echo $bill['bill_id'] ?>" data-type="Hủy"  >Hủy</button></td>
					</tr>
				<?php } ?>
			</table>
			<?php require_once '../extra/pagi3.php'; ?>
		</main>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".change").click(function(event) {
				let a=$(this);
				let get_type=a.data('type');
				let id=a.data('id');
				let url;
				let total=$("#total").html();
				total--;
				switch(get_type){
					case ("Duyệt"): url="./bill_process/approve.php";
					break;
					case("Hủy"): url="./bill_process/cancel.php";
					break;
				}
				$.ajax({
					url: url,
					data: {id},
				})
				.done(function(check) {
					if(check=="1"){					
						a.parents('tr').remove();
						$("#total").text(total);

					}
				})
				
				
			});
		});
	</script>
</body>
</html>