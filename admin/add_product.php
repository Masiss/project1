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
		height: 800px;
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
		margin: 1em;

	}
	span{
		color: red;
	}
</style>
<body>
	<?php include 'theme.php' ?>
	<div class="div-phai"  >
		<head>
			<div class="div-tren">
				<a href=""class="trai-div-tren">
				Đăng sản phẩm</a>
				<a href="../in_and_out/signout.php" class="logout">Đăng xuất</a>
			</div>		
		</head>
		<main >
			<form method="post" action="./product_process/product-processing.php"  enctype="multipart/form-data">
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
				<div>
				<p>
					Loại sản phẩm:
					<br>
					<select name='type_id' style="width: 50%; height:30px;">
						<?php 
						include 'connect.php';
						$all_type=mysqli_query($connect,"select * from type");
						foreach($all_type as $type){
							?>
							<option style="font-size: 15px" value="<?php echo $type['type_id'] ?>" >
								<?php echo $type['type_name']; ?></option>
							<?php } ?>
						</select>
						<p style="margin: 0;border:0;font-size: 13px;">
							*Nếu không có, nhấn vào <a style="color:red;" href="./product_process/add_type.php">thêm</a> 
						</p>
					</p>
				</div>
				<div >
					<p>
						Nhà sản xuất
						<br>
						<select name='manufacturer_id' style="width: 50%; height:30px;">
							<?php
							$all_manu=mysqli_query($connect,"select * from manufacturer"); 
							foreach ($all_manu as $manu) {
								?>

								<option style="font-size: 15px" value="<?php echo $manu['manufacturer_id'] ?>">

									<?php echo $manu['manufacturer_name']; ?>
								</option>
							<?php } ?>
						</select>
						<p style="margin: 0;border:0;font-size: 13px;">
							*Nếu không có, nhấn vào <a style="color:red;" href="./product_process/add_manu.php">thêm</a> 
						</p>
					</p>
				</div>

				<a href="" ><button type="delete">Nhập lại</button></a>
				<a href="" ><button type="submit" onclick="return check()" >Đăng</button></a>
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
			
			return check;
		}	







	</script>

</body>
</html>