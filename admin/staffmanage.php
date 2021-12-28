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
		height: 1000px;
	}
	table{
		
		width: 100%;
		position: relative;
		background-color: rgba(0, 0, 0, 0.05);
		font-size: 20px;
	}
	main{
		padding: 1em;
	}
	input{
		border-radius: 30px;
		font-size: 19px;
		font-family: "Nunito Sans",monospace;
	}
	button{
		border: 0;
		background-color: skyblue;
		font-size: 15px;
		font-family: "Nunito Sans";
	}
</style>
<body>
	<?php include 'theme.php' ?>
	<div class="div-phai"  >
		<head>
			<div class="div-tren">
				<a href=""class="trai-div-tren">
				Quản lí nhân viên</a>
				<a href="signin.php" class="logout">Đăng xuất</a>
			</div>		
		</head>
		<main style="font-family:Nunito Sans, monospace;font-size: 19px;">
			<?php 
			$connect=mysqli_connect('localhost','root','','project1');
			mysqli_set_charset($connect,'utf8');
			$all_staff=mysqli_query($connect,"select * from staff where level='0'");
			$count_staff=mysqli_query($connect,"select count(*) as total_staff from staff where level='0'")->fetch_array()['total_staff'];
			 ?>
			<p >
				Số lượng nhân viên: <?php echo $count_staff ?>
			</p>
			<form >
				Tìm kiếm nhân viên:
				<input type="text" name="" placeholder="Nhập tên nhân viên">
			</form>
			<table>
				<tr style="font-family:Nunito Sans, monospace;">
					<td>ID nhân viên</td>
					<td>Tên nhân viên</td>
					<td>Giới tính</td>
					<td>Số điện thoại</td>
					<td>Ngày sinh</td>
					<td>Địa chỉ</td>
					<td>Email</td>
					<td>Password</td>
				</tr>

				<?php 
				foreach ($all_staff as $staff) {

				 ?>
				<tr style="font-family:Nunito Sans, monospace;">
					<td><?php echo $staff['staff_id']  ?></td>
					<td><?php echo $staff['staff_name'] ?></td>
					<td><?php echo $staff['gender'] ?></td>
					<td><?php echo '0'.$staff['staff_phone'] ?></td>
					<td><?php echo $staff['staff_birthday'] ?></td>
					<td><?php echo $staff['staff_address'] ?></td>
					<td><?php echo $staff['staff_email'] ?></td>
					<td><?php echo $staff['staff_password'] ?></td>
					<td><a href="form_update_staff.php?id=<?php echo $staff['staff_id'] ?>"><button>Sửa</button></a></td>
					<td><a href="delete_staff.php?id=<?php echo $staff['staff_id'] ?>"><button>Xóa</button></a></td>
				</tr>
				<?php } ?>
			</table>
		</main>
	</div>

</body>
</html>