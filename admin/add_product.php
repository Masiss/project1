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
		height: 900px;
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
	select{
		width: 200px;
		height: 30px;

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
			<span id="alert"></span>
			<span id="announce" style="color:green"></span>
			<form method="post"  enctype="multipart/form-data">
				<div >Tên sản phẩm:
					<br>
					<input  type="text" name="name_pro" id="name">
					<span id="name_error"></span>
				</div>
				<div >Ảnh sản phẩm:
					<br>
					<input  type="file" name="image" style="border:0;" id="image">
					<span id="image_error"></span>
				</div>
				<div id="row_add" style="display:flex;flex-direction:row;">
					<div  >
						Giá
						<br>
						<input  type="text" name="price" id="price">
						<span id="price_error"></span>
					</div>

					<div  style="margin-left: 100px;">
						Kích thước:

						<br>
						<input  type="text" name="size" id="size">

						<span id="size_error"></span>

					</div>
					<button type="button" id="btn-add" onclick="add()">Thêm</button>
				</div>
				<div >Mô tả: 
					<br>
					<textarea  name="description" id="description"></textarea>
					<span id="des_error"></span>
				</div>
				<div style="display:flex; flex-direction:row">
					<div style="display: flex;width:25%;flex-direction: column;">
						<p id="type_list">
							Loại sản phẩm:
							<br>
							<select id="type" class="type" name="type_id" onchange="change()">
								<option></option>
								<?php 
								include '../extra/connect.php';
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
						<div style="display:flex;width:50%;flex-direction:column" >
							<p>
								Nhà sản xuất
								<br>
								<select id="manufacturer" name='manufacturer_id' style="height:50px;font-size:15px;text-align: center;" >
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
					</div>

					<a href="" ><button type="reset">Nhập lại</button></a>
					<a href="" ><button id="btn-submit" type="submit" onclick="return check_product()" >Đăng</button></a>
				</form>
			</main>
		</div>
		<script type="text/javascript" src="../extra/check.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("form").submit(function(event) {
					event.preventDefault();
					let size=[];
					let size_arr=document.getElementsByName("size").forEach(function(each) {
						size.push(each.value);
					});
					let price=[];
					let price_arr=document.getElementsByName("price").forEach(function(each) {
						price.push(each.value);
					});		
					let type_id=[];
					let arr=$(".type option:selected");

					for(let i=0;i<arr.length;i++){
						if(arr[i].value !=''){
							type_id.push(arr[i].value);
						}
					}
					if(!Array.isArray(type_id)){
						$("#announce").text("Lỗi loại sản phẩm, vui lòng kiểm tra lại");
						return;
					}
					var formData = new FormData(this);
					// Attach file
					formData.append('image', $('input[type=file]')[0].files[0]); 
					formData.append('type_id',type_id);
					formData.append('size',size);
					formData.append('price',price);
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
			function change(){

				let type=document.getElementById('type');
				if(type.options[type.selectedIndex].text==""){
					return;
				}
				$("#type").clone().appendTo('#type_list');
			}
			function add() {
				$("#row_add").clone().insertBefore('#row_add',null);
			};
			
			

		</script>

	</body>
	</html>