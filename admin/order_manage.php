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
		height: 700px;
	}
	table{
		
		width: 100%;
		position: relative;
		background-color: rgba(0, 0, 0, 0.05);
		font-size: 20px;
	}
	
	input{
		font-size: 17px;
		font-family: "Nunito Sans", monospace;
		margin: 1em;
	}
	
	button{
		
		background-color: skyblue;
		width: auto;
		height: auto;
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


			<p style="font-size: 20px;font-family: Nunito Sans, monospace;">
				<span id="announce"></span>
				Số lượng đơn hàng: <?php echo $result; ?>
			</p>

			<table>
				<tr>
					<td>Mã đơn</td>
					<td>Tên mặt hàng</td>
					<td>Giá trị</td>
					<td>Tên người đặt</td>
					<td>Số điện thoại</td>
					<td>Ghi chú</td>
					<td>Thời gian tạo đơn</td>
					<td>Tình trạng</td>
				</tr>
				<?php 
				$sql="SELECT bill_detail.*,bill.*,user.* from bill_detail
				JOIN bill on bill_detail.bill_id=bill.bill_id 
				JOIN user on bill.user_id=user.user_id
				order by bill_detail.create_at desc limit $items offset $skip";

				$all_bill=mysqli_query($connect,$sql);
				foreach ($all_bill as $each) {
					$product_details=json_decode($each['product_details'],true);

					?>
					<tr>

						<td><?php echo $each['bill_id']; ?></td>
						<td><?php foreach ($product_details as $key => $value) { 
							$product_name=mysqli_query($connect,"select product_name from product where product_id='$key'")->fetch_array()['product_name'];
							
							?>

							<?php echo $product_name.'.'; ?>
							
							<?php echo "size".' '.$value['size'] ?>
							<br>

						<?php } ?>
						</td>
						<td><?php echo $each['total'] ;?></td>
						<td><?php echo $each['user_name']; ?></td>
						<td><?php echo '0'. $each['user_phone']; ?></td>
						<td><?php echo $each['note']; ?></td>
						<td><?php echo $each['create_at']; ?></td>
						<td id="<?php echo $each['bill_id'] ?>"><?php echo $each['status']; ?></td>
						<td style="width:7%">
							<a target="_blank"  href="./view_bill.php?id=<?php echo $each['bill_id'] ?>">
							<button >Chi tiết</button>
						</a>
						</td>
						<?php if($each['status']=='đang đợi') { ?>
							<td>
								<button  data-id="<?php echo $each['bill_id'] ?>" data-type="Duyệt" ><?php echo 'Duyệt'; ?></button>

							</td>	
							<td>
								<button  data-id="<?php echo $each['bill_id'] ?>" data-type="Hủy" ><?php echo 'Hủy'; ?></button>

							</td>
						<?php } else if($each['status']=='đã duyệt'){ ?>	

							<td>
								<button  data-id="<?php echo $each['bill_id'] ?>" data-type="Hủy" ><?php echo 'Hủy'; ?></button>

							</td>
						<?php } else { ?>
							<td>

								<button data-id="<?php echo $each['bill_id'] ?>" data-type="Duyệt" ><?php echo 'Duyệt'; ?></button>

							</td>		
						<?php } ?>
					</tr>
				<?php } ?>


			</table>
			<?php require_once '../extra/pagi3.php'; ?>
		</main>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("button").click(function(event) {
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
						if(url=="./bill_process/bill_approve.php"){
							document.getElementById(id).innerHTML="đã duyệt";
							btn.html('Hủy');
							btn.data('type',"Hủy");

							console.log(1);
						} else if(url=="./bill_process/bill_cancel.php"){
							document.getElementById(id).innerHTML="đã hủy";
							btn.html("Duyệt");
							btn.data('type',"Duyệt");

							console.log(0);
						}
					})
					.fail(function() {
						console.log("error");
					})
					.always(function() {
						console.log("complete");
					});

				});
			});



		</script>
	</div>

</body>
</html>