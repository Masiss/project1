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
	.page{
		color: darkturquoise;
		border: 1px solid;
		margin: 3px;
		padding: 1px;
	}
</style>
<body>
	<?php include 'theme.php' ?>
	<div class="div-phai"  >
		<head>
			<div class="div-tren">
				<a href=""class="trai-div-tren">
				Quản lí nhân viên</a>
				<a href="../in_and_out/signout.php" class="logout">Đăng xuất</a>
			</div>		
		</head>
		<main style="font-family:Nunito Sans, monospace;font-size: 19px;">
			<?php 
			include '../extra/connect.php';
			include '../extra/pagi1.php';
			$result=mysqli_query($connect,"select count(*) as total_staff from staff where level='0' and staff_name like '%$search%'")->fetch_array()['total_staff'];
			include '../extra/pagi2.php';

			
			$all_staff=mysqli_query($connect,"select * from staff where level='0' and staff_name like '%$search%' limit $items offset $skip");

			 ?>
			<p >
				Số lượng nhân viên: <?php echo $result ?>
			</p>
			<form >
				Tìm kiếm nhân viên:
				<input type="text" name="search" placeholder="Nhập tên nhân viên" value="<?php echo $search ?>">
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
					<td><a href="./staff_process/form_update_staff.php?id=<?php echo $staff['staff_id'] ?>"><button>Sửa</button></a></td>
					<td><a href="./staff_process/delete_staff.php?id=<?php echo $staff['staff_id'] ?>"><button>Xóa</button></a></td>
				</tr>
				<?php } ?>
			</table>
					<?php include '../extra/pagi3.php' ?>
		</main>
	</div>

</body>
</html>