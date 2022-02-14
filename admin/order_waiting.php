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
	button{
		background-color: skyblue;
		color: white;
		font-weight: 700;
		border: none;
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

			<p style="font-family: Nunito Sans, monospace;font-weight: 700;">
				Số hóa đơn chờ duyệt: <?php echo $result ?> 
			</p>
			<span id="announce" style="display: none;color:green; position:absolute;top:20%;right:30%">
				Xử lí thành công
			</span>
			<table>
				<tr>
					<td>Mã đơn</td>
					<td>Tên mặt hàng</td>
					<td>Người mua</td>
					<td>Địa chỉ</td>
					<td>Số điện thoại</td>
					<td>Thời gian tạo đơn</td>
					<td>Ghi chú</td>
				</tr>
				<?php 
				$get_bill=mysqli_query($connect,"select bill_detail.*,bill.* from bill_detail join bill on bill_detail.bill_id=bill.bill_id where bill_detail.status='đang đợi' order by bill_detail.create_at desc limit $items offset $skip");
				foreach ($get_bill as $each) {
?>
					<tr>
						<td><?php echo $each['bill_id'] ?></td>
						<td>
							<?php 
							$product_details=json_decode($each['product_details'],true);
							foreach ($product_details as $key => $value) {
								$product_name=mysqli_query($connect,"select product_name from product where product_id='$key'")->fetch_array()['product_name'];
								echo $product_name;
							 ?>
							 <?php echo 'size: '.$value['size'] ?>
							 <br>							
							<?php } ?>
						</td>
						<td><?php echo $each['user_name'] ?></td>
						<td><?php echo $each['user_address'] ?></td>
						<td><?php echo $each['user_phone'] ?></td>
						<td><?php echo $each['create_at'] ?></td>
						<td><?php echo $each['note'] ?></td>
						<td>
							<a target="_blank" href="./view_bill.php?id=<?php echo $each['bill_id'] ?>">
								<button>
									Chi tiết
								</button>
							</a>
						</td>
						<td><a class="change_status" data-type="Duyệt" data-id="<?php echo $each['bill_id'] ?>" href="" style="color: darkred;">Duyệt</a></td>
						<td><a class="change_status" data-type="Hủy" data-id="<?php echo $each['bill_id'] ?>" href=""  style="color: darkred;">Hủy</a></td>
					</tr>
				<?php } ?>
			</table>
			
			<?php require_once '../extra/pagi3.php'; ?>

		</main>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".change_status").click(function(event) {
				event.preventDefault();
				let btn=$(this);
				let url;
				let a=btn.data('type');
				let id=btn.data('id');
				switch(a){
					case ("Duyệt"): url="./bill_process/bill_approve.php";
					break;
					case ("Hủy"): url="./bill_process/bill_cancel.php";
					break;
				}


				$.ajax({
					url: url,
					data: {id},
				})
				.done(function(check) {
					btn.parents('tr').remove(),4000;
					$("#announce").toggle("slow");
					setTimeout(function(){
						$("#announce").hide();}
						,2000);

				})
				.fail(function() {
					console.log("error");
				})


			});
		});



	</script>

</body>
</html>