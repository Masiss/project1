<?php include './process/check_login.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans" rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css2?family=Rowdies" rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="./user.css">
	

	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<title>Masiss Pomade</title>
</head>
<style type="text/css">
	body{
		height: 100%;
	}
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
		align-content: center;
		display: flex;
	}
	main div{
		height: 100%;
		justify-content: center;
		width: 50%;
		float: left;
	}
	.register{
		padding: 20px;
		position: relative;
		left: 0;
		
	}
	.register p{
		font-size: 19px;
		text-transform: none;
		color: black;
		margin: 10px 0;
		text-align: left;
	}
	.register input{
		width: 100%;
		/*margin-left: 25%;*/
		/*text-align: center;*/

	}
	.register input[type="radio"]{
		margin-left: 3%;
		width: 30px;
		/*padding-left: 100px;*/
	}
	.register button{
		width: 16%;
		margin: 30px auto;
		border: 1px solid;
		background-color: black;
		color: white;
		font-size:15px ;
		/*left: 37%;*/
		position: relative;
		font-weight: 500;
	}
	button[type="reset"]{
		background-color: white;
		color: black;
	}
	img{
		float: left;
		width: 100px;
		height: 100px;
	}
	
	table{
		text-align: center;
		width: 100%;
	}
	td{
		width: 10%px;
		box-sizing: border-box;
	}
	td.product_name{
		word-break: break-word;

		text-overflow: ellipsis;
	}
	#bill_info{
		position: relative;
		height: auto;
	}
	#payment{
		text-decoration: none;
		color: white;
	}
</style>
<body>
	<?php include './theme1.php'; ?>
	
	<div class="feature">
		<b></b>
		<p>THANH TO??N</p>
		<b></b>

	</div>
	<?php 
	$id=$_SESSION['id'];
	if(isset($_SESSION['level'])){ ?>
		<div style="padding:100px;justify-content:center;display:flex;">
			<p style="font-size:20px; text-transform:none;text-align:center;color:black; margin:100px">
				N???u l?? b???n l?? nh??n vi??n, h??y t???o t??i kho???n kh??ch h??ng.
				<br>
				N???u b???n l?? kh??ch h??ng v?? ??ang ?????c nh???ng d??ng n??y, h??y li??n h??? cho shop theo c??c ph????ng th???c ??? cu???i trang ????? b??o l???i.
			</p>
		</div>
	<?php	} else{
		$get_info=mysqli_query($connect,"select * from user where user_id='$id'")->fetch_array();
		?>
		<main>
			<div>
				<span style="color:red;font-weight:800;font-size: 20px;" id="announce"></span>
				<form class="register">
					<input id="user_id" type="hidden" name="" value="<?php echo $id; ?>">
					<p>H??? v?? t??n:</p>
					<input id="user_name" type="text" name="user_name" value="<?php echo $get_info['user_name'] ?>">

					<p>S??? ??i???n tho???i:</p>
					<input id="user_phone" type="number" name="user_phone" value="<?php echo '0'.$get_info['user_phone'] ?>">
					<p>?????a ch???:</p>
					<input id="user_address" type="text" name="user_address" value="<?php echo $get_info['user_address'] ?>">
					<p>Email:</p>
					<input id="user_email" type="email" name="user_email" value="<?php echo $get_info['user_email'] ?>">
					<p>Ghi ch??:</p>
					<input id="notes" type="text" name="notes" >

					<br>
					<button type="submit" onclick="return check()" >
						<a id="payment" >
							Thanh to??n
						</a>
					</button>
					<button type="reset" onclick="location.href='./cart.php'" >Quay l???i</button>

				</form>
			</div>
			<div id="bill_info">
				<table>
					<tr>
						<td>
							T??n s???n ph???m
						</td>
						<td>
							K??ch th?????c
						</td>
						<td>
							Gi??
						</td>
						<td>
							S??? l?????ng
						</td>
						<td>
							T???m t??nh
						</td>


					</tr>
					<?php 
					$product=$_SESSION['cart'];
					$sum=0;
					foreach ($product as $each=>$value) {
						$id=$each;
						$info=mysqli_query($connect,"select * from product where product_id='$id'")->fetch_array();
						?>	
						<tr>

							<td class="product_name">

								<img src="../admin/pic_product/<?php echo $info['product_image'] ?>">
								<?php echo $info['product_name'] ?>
							</td>
							<td >

								<?php 
								echo $value['size'];
								?>
							</td>

							<td id="price">
								<?php echo number_format($info['price'],0,".",",") ?>

							</td>


							<td class="quantity" id="quantity"><?php echo $value['quantity'] ?> </td>

							<td class="total" name="total">
								<?php
								$sum+=($value['quantity']*$info['price']);
								$_SESSION['total']=$sum;
								echo number_format($value['quantity']*$info['price'],0,",",".");
								?>

							</td>

						</tr>
					<?php } ?>
					<tr>
						<td>T???ng ti???n</td>
						<td><?php echo number_format($sum,0,",","."); ?></td>

					</tr>
				</table>
			</div>
		</main>
	<?php } ?>
	<div id="popup">
		<h2 id="popup-content">Xin c???m ??n qu?? kh??ch!</h2>
		<p id="popup-content">C???m ??n b???n ???? mua h??ng ??? website c???a ch??ng t??i. N???u b???n c?? v???n ????? g?? v??? s???n ph???m hay c???n t?? v???n l???a ch???n s???n ph???m, h??y nh???n tin cho ch??ng t??i qua th??ng tin li??n l???c ???????c ?????t ??? cu???i website. Ch??ng t??i lu??n s???n s??ng h??? tr??? b???n!</p>
		<a href="./index.php">Tr??? v??? trang ch??? </a>
	</div>

	<?php include './theme2.php'; ?>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
<script type="text/javascript">
	function check(){
		let user_name=document.getElementById('user_name').value;
		let user_phone=document.getElementById('user_phone').value;
		let user_address=document.getElementById('user_address').value;
		let user_email=document.getElementById('user_email').value;

		let check=true;
		if(user_name=="" || user_phone=="" || user_address==""|| user_email==""){
			document.getElementById("announce").innerHTML="Vui l??ng ??i???n ?????y ????? th??ng tin";
			check=false;
		}
		return check;
	}
	$(document).ready(function() {
		$("#payment").click(function(event) {
			event.preventDefault();
			let user_name=document.getElementById('user_name').value;
			let user_phone=document.getElementById('user_phone').value;
			let user_address=document.getElementById('user_address').value;
			let user_email=document.getElementById('user_email').value;
			let notes=document.getElementById('notes').value;
			$.ajax({
				url: './process/add_bill.php',
				type: 'POST',
				data: {user_name,user_email,user_address,user_phone,notes},
			})
			.done(function(check) {
				if(check!=="modal"){
					$("#announce").text(check);
				} else if(check=="modal"){
					popupToggle();
				}
			})


		});
	});
	function popupToggle(){
		let popup=document.getElementById('popup');
		$('main').addClass('blur');
		popup.classList.toggle('active');

	}
</script>

</html>