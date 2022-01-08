<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source Sans 3">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đăng ký</title>
	<style type="text/css">
		body{
			background-color: skyblue;
		}
		div{

			background-color: whitesmoke;
			width: 30%;
			left: 29.5%;
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
		span{
			color: red;
		}
	</style>
</head>

<body>
	<div>
		
		<header>
			Form đăng ký cho nhân viên
		</header>
		<main  >
			<form  method="post"  action="signup_process.php" >
				<p>
					Tên nhân viên:
					<br>
					<input id="name" type="text" name="staff_name" 
					>
					<span id="name_error"></span>
				</p>
				<p>
					Mật khẩu
					<br>
					<input id="password" type="password" name="password"  >
					<span style="font-size:15px">*Mật khẩu nhiều hơn 6 kí tự và hãy nhập mật khẩu thiệc mạnh</span>
					<span id="password_error"></span>
				</p>
				<p style=" margin-bottom: 0;">
					Giới tính:
					<br>
					<p style="margin: 0;">
						Nam<input style="width:15px;" id="gender" type="radio" name="gender" value="Male" >
						Nữ<input style="width:15px;" id="gender" type="radio" name="gender" value="Female">
						Không muốn nói<input style="width:15px;" id="gender" type="radio" name="gender" value="np2s">
						<br>
						<span id="gender_error"></span></p>

					</p>
					<p>
						Số điện thoại:
						<br>
						<input id="phone" type="number" name="staff_phone" >
						<span id="phone_error"></span>
					</p><p>
						Ngày sinh:
						<br>
						<input id="date" type="date" name="staff_birthday" >
						<span id="date_error"></span>
					</p><p>
						Địa chỉ
						<br>
						<input id="address" type="text" name="staff_address" >
						<span id="addr_error"></span>
					</p><p>
						Email:
						<br>
						<input id="email" type="email" name="staff_email" >
						<span id="mail_error"></span>
					</p>
					<span><?php if(isset($_GET['error'])){	echo $_GET['error']; } ?></span>
					<br>
					<a href="" style="display: flex;justify-content:center;text-decoration: none;">
						<button type="submit"  onclick="return check()">Đăng ký</button>
					</a>

				</form>
				<?php 
				
				?>
			</main>
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
			//check password
			let password=document.getElementById('password').value;
			if(password==''){
				document.getElementById('password_error').innerHTML='Vui lòng nhập mật khẩu';
				check=false;
			} else if(password.length<7){
				document.getElementById('password_error').innerHTML='Mật khẩu yếuuuu, mời nhập mật khẩu mạnh hơn';
				check=false;
			}else
			{
				document.getElementById('password_error').innerHTML='';
				
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
			// let date=document.getElementById('date').value;
			// if(!date){
			// 	document.getElementById('date_error').innerHTML='Vui lòng chọn ngày tháng năm sinh';
			// 	check=false;
			// } else {
			// 	document.getElementById('date_error').innerHTML='';
			
			// }
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
			let mail_regex=/[a-z0-9]+[@]{1}[a-z]+[.][a-z]+/;
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
</div>
</body>
</html>