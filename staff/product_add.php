<?php require_once '../extra/check_staff.php' ?>
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
		height: 700px;
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
				<a href="../in_and_out/signout.php" class="logout">Đăng xuất</a>
			</div>		
		</head>
		<main>
			<span id="error"></span>
			<span id="announce" style="color:green"></span>
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
						include '../extra/connect.php';
						$all_type=mysqli_query($connect,"select * from type");
						foreach($all_type as $type){
							?>
							<option style="font-size: 15px" value="<?php echo $type['type_id'] ?>" >
								<?php echo $type['type_name']; ?></option>
							<?php } ?>
						</select>
						
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
						
					</p>
				</div>
				
				<input style="width:5%; border:0;border-radius:20%;background-color:skyblue;" type="reset" name="" value="Reset">
				<a href=""><button id="btn-submit" type="submit" onclick="return check_product()" >Đăng</button></a>
			</form>
		</main>
	</div>
	<script type="text/javascript" src="../extra/check.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("form").submit(function(event) {
					event.preventDefault();
					var formData = new FormData(this);
					// Attach file
					formData.append('image', $('input[type=file]')[0].files[0]); 
					$.ajax({
						url: './product_process/product-processing.php',
						data: formData,
   						type: "POST", //ADDED THIS LINE
					    // THIS MUST BE DONE FOR FILE UPLOADING
					    contentType: false,
					    processData: false,
					    
					})
					.done(function(check){
						if(check !=="1"){
							
							$("#alert").text(check);
						} else {$("#announce").text("Đăng sản phẩm thành công");}
			

							})
				});
			})
		</script>

</body>
</html>