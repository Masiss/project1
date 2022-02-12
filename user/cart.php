<?php include './process/check_login.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans" rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css2?family=Rowdies" rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="user.css">
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<title></title>
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
	main{
		margin: 0px 50px;
	}
	main div{
		display: flex;
		
	}
	main p{
		font-size: 20px;
		text-transform: none;
		text-align: left;
		color: black;
		
	}
	img{
		width: 250px;
		height: 250px;
	}
	a{
		text-decoration: none;
	}
	table{
		text-align: center;
	}
</style>
<body>
	<?php include './theme1.php'; ?>
	
	<div class="feature">
		<b></b>
		<p>GIỎ HÀNG</p>
		<b></b>
		<span class="announce" style="position: absolute;right: 10%; font-size:20px; color:green;"></span>
	</div>

	<main>
		<div style="justify-content: center;display:flex; margin-top:30px">
			<?php 
			include '../extra/connect.php';
			
			if(empty($_SESSION['cart'])){?>
				<p style="text-transform: none;font-size: 20px; color:black; margin:100px">
					Bạn chưa thêm sản phẩm vào giỏ hàng,hãy thêm sản phẩm vào giỏ hàng rồi quay lại trang này sau.
				</p>
			<?php } else{ ?>
				<table>
					<tr>
						<td>Mã sản phẩm</td>
						<td>Tên sản phẩm</td>
						<td>Ảnh</td>
						<td>Giá</td>
						<td></td>
						<td>Số lượng</td>
						<td></td>
						<td>Tạm tính</td>
					</tr>
					<?php 
					$product=$_SESSION['cart'];
					foreach ($product as $each=>$value) {
						$id=$each;
						$info=mysqli_query($connect,"select * from product where product_id='$id'")->fetch_array();
						?>	
						<tr>
							<td class="product_id"><?php echo $info['product_id'] ?></td>
							<td><?php echo $info['product_name'] ?></td>
							<td><img src="../admin/pic_product/<?php echo $info['product_image'] ?>"></td>
							<td class="price"><?php echo $info['price'] ?></td>
							<td><a class="btn-change" data-type="dec" data-id="<?php echo $info['product_id'] ?>" href="">-</a></td>
							<td class="quantity"><?php echo $value['quantity'] ?></td>
							<td><a class="btn-change" data-type="inc" data-id="<?php echo $info['product_id'] ?>" href="">+</a></td>
							<td class="total"></td>
							<td><a class="btn-change" data-type="delete" data-id="<?php echo $info['product_id'] ?>" href="">X</a></td>
						</tr>
					<?php } ?>
				</table>
			<?php } ?>
		</div>
	</main>
	<?php include './theme2.php'; ?>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".btn-change").click(function(event) {
			let btn=$(this);
			event.preventDefault();
			let type=btn.data('type');
			let id=btn.data('id');

			$.ajax({
				url: './process/change_quantity.php',
				data: {id,type},
			})
			.done(function(check) {
				if(check!=="1"){
					btn.parents('tr').remove();
					$(".announce").text(check);
				}else {
					let quantity=$(".quantity").html();	
					if(type=="dec"){
						quantity--;
					} else if(type=="inc"){
						quantity++;
					}
					$(".quantity").text(quantity);
				}
			})
			
		});
	});


</script>

</html>