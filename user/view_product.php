<?php session_start(); ?>
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
	body{
		height: 1000px;

	}
	main{
		margin: 100px;
		margin-top: 0;
	}
	img{
		max-width: 100%;
		max-height: 100%;
			
	}
	.product_info{
		display: inline-block;
		width:50%;
		height:fit-content;
	}
	.product_info p{
		font-weight: 300;
		color: black;
		font-size: 19px;
		height: 300px;
	}
	.product_info div {

		margin: 30px;
		width: 100%;

	}
	.product_info div p{
		text-align: left;
		text-transform: none;
		width: auto;
		height: fit-content;

	}
	span{
		color: black;
		font-size: 30px;
		font-weight: 700;
		margin-left: 30px;

	}
	button{
		box-sizing: border-box;
		border-radius: 25px;
		padding: 10px;
		font-size: 15px;
		background-color: skyblue;
	}
	#announce{
		font-size: 19px;
		position: absolute;
		top: 250px;
		color: green;
	}
</style>
<body>
	<?php include 'theme1.php'; ?>
	<main style="display:flex;">
		<?php 
		include '../extra/connect.php';
		if(empty($_GET['id'])){
			header('Location:./test.php');
			exit();
		}
		$id=$_GET['id'];
		$get_info=mysqli_query($connect,"select product.*, manufacturer.manufacturer_name as 'manufacturer_name' from product join manufacturer on product.manufacturer_id=manufacturer.manufacturer_id where product_id='$id'")->fetch_array();
		


		?>
		<div style="display: inline-block; width:60%;height: fit-content;margin-left: 150px;">
			<input id="id_product" type="hidden" name="" value="<?php echo $get_info['product_id'] ?>">
			<span>
				<?php echo $get_info['product_name']; ?>
			</span>
			<figure>
				<img src="../admin/pic_product/<?php echo $get_info['product_image'] ?>">

			</figure>
		</div>
		<div  class="product_info">
			<div>
				<span id="announce"></span>
				<p>Giá:
					<?php echo $get_info['price'] ?>đ
				</p>
				<br>
				<p> Nhà sản xuất:
					<?php echo $get_info['manufacturer_name'] ?>
				</p>
				<br>
				<p>
					<a href="">
						<button class="btn-add">Thêm vào giỏ hàng</button>
					</a>
				</p>
			</div>
			<p style="text-align: left;padding: 60px 30px;text-transform:none">
				Thông tin sản phẩm:
				<br>
				<br>
				<?php echo $get_info['description'] ?>
			</p>
		</div>
	</main>
	<?php include './theme2.php'; ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".btn-add").click(function(event) {
			event.preventDefault();
			let btn=$(this);
			let id=$("#id_product").val();
			$.ajax({
				url: './process/add_cart.php',
				data: {id},
			})
			.done(function() {
				$("#announce").text("Thêm vào giỏ hàng thành công");
			})
			
			
		});
	});
</script>
</html>