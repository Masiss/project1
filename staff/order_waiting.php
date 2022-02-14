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
					<td>Giá trị</td>
					<td>Người mua</td>
					<td>Địa chỉ</td>
					<td>Số điện thoại</td>
					<td>Thời gian</td>
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
						<td><?php echo $each['total'] ?></td>
						<td><?php echo $each['user_name'] ?></td>
						<td><?php echo $each['user_address'] ?></td>
						<td><?php echo $each['user_phone'] ?></td>
						<td><?php echo $each['create_at'] ?></td>
						<td><?php echo $each['note'] ?></td>
						<td style="width:7%">
							<a target="_blank"  href="./view_bill.php?id=<?php echo $each['bill_id'] ?>">
								<button >Chi tiết</button>
							</a>
						</td>
						<td><button class="change" data-id="<?php echo $each['bill_id'] ?>" data-type="Duyệt" >Duyệt</button></td>
						<td><button class="change" data-id="<?php echo $each['bill_id'] ?>" data-type="Hủy"  >Hủy</button></td>
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