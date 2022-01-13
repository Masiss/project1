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
		}
		div{
			background-color: whitesmoke;
			width: 30%;
			left: 30%;
			position: absolute;
			padding: 5em;
			justify-content: center;
			padding-top: 2em;

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
			font-family: 
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
	</style>
</head>
<body>
	<div>
		
		<header>
			Thay đổi thông tin sản phẩm
		</header>
		<main style="height:800px" >
			<form method="post" action="update_processing.php" enctype="multipart/form-data">
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
			<input type="text" name="name_pro" value="<?php echo $each['product_name'] ?>" >
		</p>
		<p>
			Ảnh sản phẩm:
			<br>
			<img src="../../admin/pic_product/<?php echo $each['product_image'] ?>" style="height:200px;width:75%">
			<input type="hidden" name="old_image" value="<?php echo $each['product_image'] ?>">
			<input type="file" style="border:0;" name="new_image">
		</p>
		<p>
			Giá
			<br>
			<input type="number" name="price" value="<?php echo $each['price'] ?>">
		</p>
		<p>
			Kích thước:
			<br>
			<input type="text" name="product_size" value="<?php echo $each['product_size'] ?>">
		</p>
		
		<p>
			Mô tả sản phẩm
			<br>
			<textarea style="width:80%;" name="description"><?php echo $each['description'] ?></textarea>
		</p>
		<?php } ?>
		<p>
			Loại sản phẩm:
			<br>
			<select name='type_id' style="width: 50%; height:30px;">
				<?php 
				$all_type=mysqli_query($connect,"select * from type");
				foreach($all_type as $type){
				 ?>
				 <option style="font-size: 15px" value="<?php echo $type['type_id'] ?>" 
				 	<?php if($each['type_id']===$type['type_id']) echo 'selected="selected"';?>>
				 	<?php echo $type['type_name']; ?></option>
				<?php } ?>
			</select>
			
		</p>
		<p>
			Nhà sản xuất
			<br>
			<select name='manufacturer_id' style="width: 50%; height:30px;">
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
		<a href="update_processing.php" style="display: flex;justify-content:center;text-decoration: none;"><button>Thay đổi</button></a>
	
			</form>

	</main>

	</div>
</body>
</html>