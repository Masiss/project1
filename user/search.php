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

	.blog-list{
		display: block;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;

	}
	.blog-list-inner{
		position: relative;
		padding: 10px;
		align-content: center;
		justify-content: center;
		background-color: rgba(0,0,0,.05);
		margin: 50px;
	}
	article:nth-child(3n+1){
		width: 66.7%;
		clear: both;
		font-size: 2.1vw;
	}
	article:nth-child(3n+2),
	article:nth-child(3n+3){
		width: 33.3%;
		font-size: 1.1vw;
	}

	article:nth-child(6n+4){
		float: right;
		width: 66.7%;
		clear: both;
	}


	article{
		display: block;
		float: left;
		box-sizing: border-box;
		padding-top: 30px;
		padding-left: 30px;
	}

	article div {
		position: relative;
		overflow: hidden;

		margin: auto;
		padding: 10px;

	}

	img{
		position: relative;
		overflow: hidden;
		height: 700px;
		background-color: #fff;
		border: 0;
		width: 100%;
		height: 100%;
		object-fit: contain;


	}


	.text-container{
		position: absolute;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		padding: 60px;

		display: flex;
		justify-content: center;
		align-items: center;
		justify-content: flex-end;
		flex-direction: column;
	}
	.blog-list-items:nth-child(3n+1){
		padding: 60px;
	}
	.blog-list-items:nth-child(3n+2),
	.blog-list-items:nth-child(3n+3){
		padding: 30px;
	}
</style>
<body>
	<?php include './theme1.php'; ?>
	
	<div class="feature">
		<b></b>
		<p>KẾT QUẢ TÌM KIẾM</p>
		<b></b>

	</div>
<?php if(empty($_GET['search'])){
	header("Location './index.php'");
} 
$search=$_GET['search'];
?>
	<main>
		<div  class="blog-list" > 
			<div class="blog-list-inner">
				<?php include '../extra/connect.php';
				$result=mysqli_query($connect,"select * from product where product_name like '%$search%'");
				foreach ($result as $each) {
					?>
					<article class="blog-list-items">
						<div>


							<figure>
								<img src="../admin/pic_product/<?php echo $each['product_image'] ?>">
							</figure>
							<div class="text-container">
								<a style="width:100%;height:100%" href="./view_product.php?id=<?php echo $each['product_id'] ?>"></a>
								<p ><?php echo $each['product_name'] ?></p>
							</div>
						</div>
					</article>
					
				<?php } ?>
			</div>
		</div>
	</main>
	<?php include './theme2.php'; ?>

</body>

</html>