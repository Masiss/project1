<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source Sans 3">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đăng nhập</title>
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
			Đăng nhập:
		</header>
		<main  >
			<form   method="post" action="signin_process.php">
				<p>
					Email:
					<br>
					<input id="email" type="email" name="email" >
					<span id="mail_error"><?php if(isset($mail_error)) echo '$mail_error'; ?> </span>
				</p>
				<p>
					Mật khẩu
					<br>
					<input id="password" type="password" name="password"  >
					<span id="password_error"><?php if(isset($password)) echo '$password'; ?></span>
				</p>
				<span><?php if(!empty($_GET['error'])) {echo $_GET['error'];} ?></span>


				<a href="" style="display: flex;justify-content:center;text-decoration: none;">
					<button type="submit"  >Đăng nhập</button>
				</a>

			</form>
			

		</main>

	</div>
</body>
</html>