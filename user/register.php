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
		align-content: center;
		display: flex;
	}
	main div{
		
		justify-content: center;
		width: 80%;
		
	}
	main span{
		display: flex;
		justify-content: center;
		color: red;
		font-weight: 800;
		font-size: 25px;
		
	}
	.register{
		padding: 20px;
		align-content: center;
		
	}
	.register p{
		font-size: 19px;
		text-transform: none;
		color: black;
		text-align: center;	
		margin: 10px 0;
	}
	.register input{
		width: 50%;
		margin-left: 25%;
		text-align: center;

	}
	.register input[type="radio"]{
		margin-left: 3%;
		width: 30px;
		padding-left: 100px;
	}
	.register button{
		width: 12.5%;
		margin: 30px auto;
		border: 1px solid;
		background-color: black;
		color: white;
		font-size:15px ;
		left: 37%;
		position: relative;
		font-weight: 500;
	}
	button[type="reset"]{
		background-color: white;
		color: black;
	}
</style>
<body>
	<?php include './theme1.php'; ?>
	
	<div class="feature">
		<b></b>
		<p>ĐĂNG KÝ</p>
		<b></b>

	</div>
	
	<main>
		<div>
			<span><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></span>
			<form class="register" method="POST" action="./process/register_process.php">
				<p>Họ và tên:</p>
				<input id="name" type="text" name="name">
				<span id="name_error"></span>
				<p>Giới tính:</p>
				<p>
					<input type="radio" name="gender" value="Male">Nam
					<input type="radio" name="gender" value="Female">Nữ
					<input type="radio" name="gender" value="np2s">Không tiện nói
				</p>
				<span id="gender_error"></span>
				<p>Ngày sinh:</p>
				<input id="date" type="date" name="date">
				<span id="date_error"></span>

				<p>Số điện thoại:</p>
				<input id="phone" type="number" name="phone">
				<span id="phone_error"></span>

				<p>Địa chỉ:</p>
				<input id="address" type="text" name="address">
				<span id="addr_error"></span>

				<p>Email:</p>
				<input id="email" type="email" name="email">
				<span id="mail_error"></span>

				<p>Mật khẩu:</p>
				<input id="password" type="password" name="password">
				<span id="password_error"></span>

				<br>
				<button onclick="return check()" type="submit">
					Đăng ký
				</button>
				<button type="reset">Nhập lại</button>

			</form>
		</div>
	</main>
	<?php include './theme2.php'; ?>
	<script type="text/javascript">
		function check()
		{
			let check=true;
			//check name
			let name=document.getElementById('name').value;
			let regex_name=/^([A-ZĂẮẰẲẴẶÂẤẦẨẪẬĐÉÈẺẼẸÊẾỀỂỄỆÓÒỎÕỌÔỐỒỔỖỘƠỚỜỞỠỢÍÌỈĨỊÚÙỦŨỤỨỪỬỮỰÝỲỶỸỴ][a-zăắằẳẵặâấầẩẫậđéèẻẽẹêếềểễệóòỏõọôốồổỗộơớờởỡợíìỉĩịúùủũụứừửữựýỳỷỹỵ]{1,6}\s?)+$/;
			if(name===''){
				document.getElementById('name_error').innerHTML='Vui lòng nhập tên';
				check=false;
			}
			else if(!regex_name.test(name)){
				document.getElementById('name_error').innerHTML='Tên không hợp lệ';
				check=false;
			} else {
				document.getElementById('name_error').innerHTML='';
			}
			//check gender
			let gender_check=false;
			let gender=document.getElementsByName('gender');
			for(let i=0;i<gender.length;i++){
				if(gender[i].checked){
					gender_check=true;
				}
			}
			if(gender_check==false){
				document.getElementById('gender_error').innerHTML='Vui lòng chọn giới tính';
				check=false;
			} else {
				document.getElementById('gender_error').innerHTML='';
			}
			
			//check phone number
			let phone=document.getElementById('phone').value;
			let phone_regex=/[0]+[0-9]{9}/;
			if(!phone_regex.test(phone)){
				document.getElementById('phone_error').innerHTML='Số điện thoại không hợp lệ';
				check=false;
			} else {
				document.getElementById('phone_error').innerHTML='';
				
			}
			//check date
			let date=document.getElementById('date').value;
			if(!date){
				document.getElementById('date_error').innerHTML='Vui lòng chọn ngày tháng năm sinh';
				check=false;
			} else {
				document.getElementById('date_error').innerHTML='';
				
			}
			//check address
			let address=document.getElementById('address').value;
			if(address==''){
				document.getElementById('addr_error').innerHTML='Vui lòng nhập địa chỉ';
				check=false;
			} else {
				document.getElementById('addr_error').innerHTML='';
				
			}
			//check email
			let email=document.getElementById('email').value;
			let mail_regex=/[a-z]+[@]{1}[a-z]+[.][a-z]+/;
			if(email==''){
				document.getElementById('mail_error').innerHTML='Vui lòng nhập email';
				check=false;
			} else
			if(!mail_regex.test(email)){
				document.getElementById('mail_error').innerHTML='Email không hợp lệ';
				check=false;
			} else {
				document.getElementById('mail_error').innerHTML='';
				
			}
			return check;
		}









	</script>

</body>

</html>