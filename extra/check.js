function check_signin()
{
	let check=true;
	let email=document.getElementById('email').value;
	let regex_mail=/[a-zA-Z0-9]@[a-z].[a-z]/;
	if(email===""){
		document.getElementById("mail_error").innerHTML="Nhập mẹ email đi duma, vào chức này rồi còn éo có ý thức à???";
		check=false;
	} else if(!regex_mail.test(email)) {
		document.getElementById("mail_error").innerHTML="Nhập đàng hoàng vào duma";
		check=false;
	}
	let password=document.getElementById("password").value;
	if(password===""){
		document.getElementById("password_error").innerHTML="Nhập mật khẩu đi duma, làm thì làm đàng hoàng không thì nghỉ việc mẹ đi :))))))))))))";
		check=false;
	}
	return check;


}
function check_product()
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
			} else if(size.length>5) {
				document.getElementById('size_error').innerHTML='Size lừa à duma, nhập đàng hoàng coi';
				check=false;
			}
			else {
				document.getElementById('size_error').innerHTML='';

			}
			
			return check;
		}
		function check(){
			let name=document.getElementById("name").value;
			let check=true;
			if(name=="") {
				document.getElementById('error').innerHTML="Thêm thì nhập cái tên đi trứ, aloooooo";
				check=false;
			}
			return check;
		}
		function check_product_update()
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