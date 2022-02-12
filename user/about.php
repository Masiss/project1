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
</style>
<body>
	<?php include './theme1.php'; ?>
	
	<div class="feature">
		<b></b>
		<p>VỀ CHÚNG TÔI</p>
		<b></b>

	</div>

	<main>
		<p>
			Có thể bạn chưa biết, hoặc có thể đã biết rồi, chúng tôi là cửa hàng bán các sản phẩm chăm sóc tóc và tạo kiểu tóc uy tín hàng đầu Việt Nam. Là đại lí phân phối của nhiều hãng sản xuất pomade lớn trên thế giới và các hãng ở Việt Nam, chúng tôi xuất hiện với tham vọng đứng đầu thế giới về lĩnh vực buôn bán các sản phẩm về tóc.
		</p>
		<p>
			Nếu như bạn đã nhấn vào đây và đọc những dòng này thì chúc mừng bạn. Bạn đã có cơ hội theo dõi chúng tôi trên các nền tảng mạng xã hội. Hãy theo dõi chúng tôi bằng các đường dẫn dưới đây:
		</p>
		<div>
			<p>
				<ion-icon name="logo-facebook"></ion-icon>
				<a href="https://www.facebook.com/profile.php?id=100011090085352">Bình Nguyễn</a>
			</p>
			<p>
				<ion-icon name="logo-instagram"></ion-icon>
				<a href="https://www.instagram.com/binhnguyen.03/">binhnguyen.03</a>
			</p>
			<p>
				<ion-icon name="mail-outline"></ion-icon>
				<span>hopelessornohope@gmail.com</span>
			</p>
		</div>

		
	</main>
	<?php include './theme2.php'; ?>

</body>

</html>