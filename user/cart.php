<?php include './process/check_login.php'; ?>
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
	<title>Masiss Pomade</title>
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
		width: 100%;
	}
	td{
		width: 10%px;
	}
	.payment{
		box-sizing: border-box;
		border: 2px solid white;
		background-color: skyblue;
		border-radius: 25px;
		padding: 10px;
		text-decoration: none;
		color: white;
		font-weight: 700;
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
			if(empty($_SESSION['id'])|| empty($_SESSION['name'])){ ?>
				<p style="text-transform: none;font-size: 20px; color:black; margin:100px">
					Tình năng chỉ dành cho khách hàng đã đăng nhập, vui lòng đăng nhập.
				</p>
			<?php } else if(empty($_SESSION['cart'])){?>
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
						<td>Kích thước</td>
						<td class="btn-change"></td>
						<td>Số lượng</td>
						<td class="btn-change"></td>
						<td>Tạm tính</td>
						<td class="btn-change"></td>
					</tr>
					<?php 
					$product=$_SESSION['cart'];
					$sum=0;
					foreach ($product as $each=>$value) {
						
						$info=mysqli_query($connect,"select * from product where product_id='$each'")->fetch_array();
						?>	
						<tr>
							<td class="product_id">
								<?php echo $info['product_id'] ?>
								
							</td>
							<td>
								<?php echo $info['product_name'] ?>
								
							</td>
							<td>
								<img src="../admin/pic_product/<?php echo $info['product_image'] ?>">
							</td>
							<td id="price">
								<?php echo number_format($info['price'],0,",",".") ?>

							</td>
							<td id="product_size">
								<?php echo $value['size']; ?>
							</td>
							<td>
								<a class="btn-change" data-type="dec" data-id="<?php echo $info['product_id'] ?>" href="">
									-
								</a>
							</td>
							<td class="quantity" id="quantity">
								<?php echo $value['quantity'] ?>

							</td>
							<td>
								<a class="btn-change" data-type="inc" data-id="<?php echo $info['product_id'] ?>" href="">
									+
								</a>
							</td>
							<td class="total" name="total">
								<?php
								$sum+=($value['quantity']*$info['price']);
								 echo number_format($value['quantity']*$info['price'],0,",",".");
								  ?>

							</td>
							<td>
								<a class="btn-change" data-type="delete" data-id="<?php echo $info['product_id'] ?>" href="">
									X
								</a>
							</td>
						</tr>
					<?php } ?>
				</table>
				
			<?php } ?>
		</div>
		<?php if(!empty($_SESSION['cart']) && !empty($_SESSION['id'])){ ?>
		<div style="display:block; ">
			<p style="width:fit-content;">Tổng đơn: 
				<span id="all_total">
					<?php
					echo $sum;
					 ?>
				</span>
				<a class="payment" id="payment" href="./payment.php">
					Thanh toán
				</a>
			</p>
		</div>
	<?php } ?>
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
			let size=document.getElementById('product_size').textContent.replace(/\s+/g,'');
			let quantity=parseInt($(this).parents('tr').find('.quantity').text());	
			let parent=$(this).parents('tr');
			
			
			$.ajax({
				url: './process/change_quantity.php',
				data: {id,type,size},
			})
			.done(function(check) {
				if(type==="delete"){
					btn.parents('tr').remove();
					$(".announce").text(check);
				}else {

					if(type=="dec"){
						quantity--;
					} else if(type=="inc"){
						quantity++;
					}
					let price=parseInt(parent.find('#price').text().replace(/\./g,''));
					console.log(price);
					parent.find('.quantity').text(quantity);
					let total=parseInt(quantity)*price;
					
					parent.find(".total").text(total.toLocaleString());
					all_total();
				}
			})
			
		});
	});
	function all_total(){
		let sum=0;
		let all_total=document.getElementsByName('total');
		for(let i=0;i<all_total.length;i++){
			sum+=parseInt(all_total[i].textContent.replace(/\./g,''));
		}
		document.getElementById('all_total').innerHTML=sum;
	}
	
	


</script>

</html>