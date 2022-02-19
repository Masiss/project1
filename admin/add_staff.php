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
		height: 500px;
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
	input[type=radio]{
		width: fit-content;
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
</style>
<body>
	<?php include 'theme.php' ?>
	<div class="div-phai"  >
		<head>
			<div class="div-tren">
				<a href=""class="trai-div-tren">
				Thêm nhân viên mới</a>
				<a href="../in_and_out/signout.php" class="logout">Đăng xuất</a>
			</div>		
		</head>
		<main >
			<form method="post" action="./staff_manage.php" >
				
				<div >Tên nhân viên:
					<br>
					<input id="staff_name"  type="text" name="staff_name">
					<span id="name_error"></span>
				</div>
				<div >Giới tính
					<br>
					<input   type="radio" name="gender" value="Male">Nam
					<input   type="radio" name="gender" value="Female">Nữ
					<input   type="radio" name="gender" value="np2s">Không tiện nói
					<span id="gender_error"></span>
				</div>
				<div >Email:
					<br>
					<input id="email"  type="email" name="email">
					<span id="mail_error"></span>

				</div>
				<div >Số điện thoại:
					<br>
					<input id="staff_phone"  type="number" name="staff_phone">
					<span id="phone_error"></span>

				</div>
				<div >Ngày sinh:
					<br>
					<input id="staff_birthday"  type="date" name="staff_birthday">
					<span id="date_error"></span>

				</div>
				<div >Địa chỉ:
					<br>
					<input id="staff_address"  type="text" name="staff_address">
					<span id="addr_error"></span>

				</div>
				<div >Mật khẩu:
					<br>
					<input id="staff_password"  type="password" name="staff_password">
					<span id="password_error"></span>

				</div>
				<button type="reset">Nhập lại</button>
				<button id="btn-submit"   type="submit" onclick="return check()" >Thêm</button>
			</form>
			<span style="color:red" id="error"></span>
			<span style="color:green" id="announce"></span>
		</main>
	</div>
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("form").submit(function(event) {
				event.preventDefault();
				let staff_name=document.getElementById('staff_name').value;
				let email=document.getElementById('email').value;
				let staff_phone=document.getElementById('staff_phone').value;
				let staff_birthday=document.getElementById('staff_birthday').value;
				let staff_address=document.getElementById('staff_address').value;
				let staff_password=document.getElementById('staff_password').value;
				let gender=document.getElementsByName('gender');
				for(let i=0;i<gender.length;i++){
					if(gender[i].checked){
						gender=gender[i].value;
						break;
					}
				}
				
				$.ajax({
					url: './staff_process/add_staff_process.php',
					type: 'POST',
					data: {staff_name,email,staff_phone,staff_birthday,staff_address,staff_password,gender},
				})
				.done(function(check) {
					if(check!=="1"){
						console.log(1);
						$("#announce").hide();
						$("#error").show().text(check);

					} else {
						console.log(0);
						$("#error").hide();
						$("#announce").show().text("Thêm nhân viên thành công");
					}
				})


			});
		});
		function check()
		{
			let check=true;
			//check name
			let name=document.getElementById('staff_name').value;
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
			let phone=document.getElementById('staff_phone').value;
			let phone_regex=/[0]+[0-9]{9}/;
			if(!phone_regex.test(phone)){
				document.getElementById('phone_error').innerHTML='Số điện thoại không hợp lệ';
				check=false;
			} else {
				document.getElementById('phone_error').innerHTML='';
				
			}
			//check date
			let date=document.getElementById('staff_birthday').value;
			if(!date){
				document.getElementById('date_error').innerHTML='Vui lòng chọn ngày tháng năm sinh';
				check=false;
			} else {
				document.getElementById('date_error').innerHTML='';
				
			}
			//check address
			let address=document.getElementById('staff_address').value;
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