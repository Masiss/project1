<?php require_once '../../extra/check_staff.php' ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source Sans 3">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thay đổi sản phẩm</title>
	<style type="text/css">
		body{
			background-color: skyblue;
			display: flex;
			justify-content: center;
		}
		div{
			background-color: whitesmoke;
			width: 30%;
			position: relative;
			justify-content: center;
			padding: 100px;

		}
		header{
			font-family: "Source Sans 3",monospace;
			font-size: 30px;
			text-align: center;
			font-weight: 700;
		}
		p{
			font-family: "Source Sans 3",monospace;
			font-size: 20px;
			font-weight: 500;
			color: slategray;
			text-align: center;
		}
		input{
			font-size: 20px;
			background-color: #f2f2f2;
			border: 0;
			outline: 0;
			border-bottom: 1px solid rgba(0,0,0,0.4);
			text-align: center;
			width: 100%;
		}
		button{
			font-size: 20px;
			background-color: skyblue;
			border: 1px solid;
			border-radius: 10px;
			font-family:"Source Sans 3";
			
		}
		form{
		}
		span{
			color: red;
		}
	</style>
</head>
<body>
	<div>
		
		<header>
			Thay đổi thông tin sản phẩm
		</header>
		<main style="height:800px" >
			<form method="post" action="update_processing.php" enctype="multipart/form-data">
				<span style="position:absolute;left:30%; top:5%; font-weight:700;">
					<?php if(isset($_GET['error'])){
						echo $_GET['error'];
					} ?></span>
					<?php 
					$id=$_GET['id'];
					include '../../extra/connect.php';
					$sql="select * from product where product_id='$id'";
					$result=mysqli_query($connect,$sql);
					foreach ($result as $each) {
						?>

						<input type="hidden" name="id_product" value="<?php echo $each['product_id'] ?>" >
						<p>
							Tên sản phẩm:
							<br>
							<input id="name" type="text" name="name_pro" value="<?php echo $each['product_name'] ?>" >
							<span id="name_error"></span>
						</p>
						<p>
							Ảnh sản phẩm:
							<br>
							<img src="../../admin/pic_product/<?php echo $each['product_image'] ?>" style="height:200px;width:75%">
							<input type="hidden" name="old_image" value="<?php echo $each['product_image'] ?>">
							<input type="file" style="border:0;" name="new_image">
						</p>
						<div id="row_add" style="padding:0;display:flex;flex-direction:row;justify-content:space-around;width:100%">
							<div style="padding: 10px;width:100%;">

								Giá
								<br>
								<input id="price" type="number" name="price[]" value="<?php echo $each['price'] ?>">
								<span id="price_error"></span>

							</div>
							<div style="padding: 10px;width:100%">

								Kích thước:
								<br>
								<input id="size" type="text" name="product_size[]" value="<?php echo $each['product_size'] ?>">
								<span id="size_error"></span>

							</div>
							<button type="button" onclick="add()">thêm </button>

						</div>

						<p>
							Mô tả sản phẩm
							<br>
							<textarea id="description" style="width:80%;" name="description"><?php echo $each['description'] ?></textarea>
							<span id="des_error"></span>
						</p>
					<?php } ?>
					<div style="display:flex;flex-direction: row;justify-content:space-between;padding:0;width:100%">
						<p style="display:flex;flex-direction:column;">
							Loại sản phẩm:
							<br>
							<select name='type_id[]' style="width: 50%; height:100px;width:100%" multiple>
								<?php 
								$all_type=mysqli_query($connect,"select * from type");
								$each['type_id']=explode(',',$each['type_id']);
								foreach ($each['type_id'] as $key) {
									foreach($all_type as $type){
										?>
										<option style="font-size: 15px" value="<?php echo $type['type_id'] ?>" 
											<?php if($key===$type['type_id']) echo 'selected="selected"';?>>
											<?php echo $type['type_name']; ?></option>
											<?php 
										} 
									} ?>
								</select>

							</p>
							<p style="display:flex;flex-direction:column;width:25%">
								Nhà sản xuất
								<br>
								<select name='manufacturer_id' style="width: 100%; height:30px;">
									<?php
									$all_manu=mysqli_query($connect,"select * from manufacturer"); 
									foreach ($all_manu as $manu) {
										?>

										<option style="font-size: 15px" value="<?php echo $manu['manufacturer_id'] ?>"
											<?php if($each['manufacturer_id']===$manu['manufacturer_id']) echo 'selected="selected"';?>> 
											<?php echo $manu['manufacturer_name']; ?>
										</option>
									<?php } ?>
								</select>

							</p>
						</div>
						<a href="" style="display: flex;justify-content:center;text-decoration: none;">
							<button onclick="return check_product_update()" type="submit">
								Thay đổi
							</button>
						</a>

					</form>

				</main>
				<script type="text/javascript" src="../../extra/check.js"></script>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
				<script type="text/javascript">
					function add() {
						// let row=document.getElementById('row_add');

						$("#row_add").clone().insertBefore('#row_add',null);
						
						
					};
					
				</script>
			</div>
		</body>
		</html>