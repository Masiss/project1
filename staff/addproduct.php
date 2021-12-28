<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Nunito Sans">
	<link rel="stylesheet" type="text/css" href="staff.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đây là giao diện Nhân viên!</title>
</head>
<style type="text/css">
	body {
		height: 1000px;
	}
	main{
		
		font-size: 20px;
		padding: 3em 0em 0em 3em;
		font-weight: bold;
	}	
	input, textarea{
		width: 50%;
		height: 30px;
		border: 1px solid;
		border-color: dimgray;
		font-size: 19px;
		font-family: "Nunito Sans",monospace;
	}
	button{
		border: 0;
		background-color: skyblue;
		font-size: 18px;
		border-radius: 20%;
		font-weight: 500;
		font-family: "Nunito Sans",monospace;
		
	}
	form {
		margin-left: 4em;
		margin-top: 3em;
	}
	span{	
		color: red;
	}
</style>
<body>
	<?php include 'theme_staff.php' ?>
	<div class="div-phai"  >
		<head>
			<div class="div-tren">
				<a href="" class="div-tren-trai" >Đăng sản phẩm</a>
				<a href="signin.php" class="logout">Đăng xuất</a>
			</div>		
		</head>
		<form method="post" action="product-processing.php"  enctype="multipart/form-data">
				<div >Tên mặt hàng:
					<br>
					<input type="text" name="name_pro" id="name">
					<span id="name_error"></span>
				</div>
				<div >Ảnh sản phẩm:
					<br>
					<input type="file" name="image" style="border:0;" id="image">
					<span id="image_error"></span>
				</div>
				<div>Nhà sản xuất
					<br>
					<input type="text" name="name_manu" id="name_manu">
					<span id="manu_error"></span>
				</div>
				<div  >Giá
					<br>
					<input type="number" name="price" id="price">
					<span id="price_error"></span>
				</div>
				<div >Mô tả: 
					<br>
					<textarea name="description" id="description"></textarea>
					<span id="des_error"></span>
				</div>
				<div >Kích thước: 
					<br>
					<input type="text" name="size" id="size">
					<span id="size_error"></span>
				</div>
				<div >Loại sản phẩm:
					<br>
					<input type="text" name="type" id="type">
					<span id="type_error"></span>
				</div>
				
				<input style="width:5%; border:0;border-radius:20%;background-color:skyblue;" type="reset" name="" value="Reset">
				<a href=""><button type="submit" onclick="return check()" >Đăng</button></a>
			</form>
		</main>
	</div>
	<script type="text/javascript">
		function check()
		{
			let check=true;
			//check name
			let name = document.getElementById('name').value;
			if(name==='')
			{
				document.getElementById('name_error').innerHTML='Vui lòng điền tên';
				check=false;
			}else {
					document.getElementById('name_error').innerHTML='';
				}
			//check image
			let image=document.getElementById('image').value;
			if(image===''){
				document.getElementById('image_error').innerHTML='Vui lòng thêm ảnh';
				check = false;
			}	else {
				document.getElementById('image_error').innerHTML='';

			}
			//check manufacturer name
			let manu=document.getElementById('name_manu').value;
			if(manu===''){
				document.getElementById('manu_error').innerHTML='Vui lòng nhập tên nhà sản xuất';
				check=false;
			} else {
				document.getElementById('manu_error').innerHTML='';

			}
			//check price
			let price=document.getElementById('price').value;
			if(price<1000){
				document.getElementById('price_error').innerHTML='Giá không hợp lệ';
				check=false;
			}
			else {
				document.getElementById('price_error').innerHTML='';

			}
			//check description 
			let description=document.getElementById('description').value;
			if(description===''){
				document.getElementById('des_error').innerHTML='Vui lòng nhập mô tả';
				check = false;
			}	else {
				document.getElementById('des_error').innerHTML='';

			}
			//check size
			let size=document.getElementById('size').value;
			if(size===''){
				document.getElementById('size_error').innerHTML='Vui lòng nhập kích thước';
				check = false;
			}	else {
				document.getElementById('size_error').innerHTML='';

			}
			//check type
			let type=document.getElementById('type').value;
			if(type===''){
				document.getElementById('type_error').innerHTML='Vui lòng nhập loại';
				check = false;
			}	else {
				document.getElementById('type_error').innerHTML='';

			}
			return check;
		}	







	</script>

</body>
</html>