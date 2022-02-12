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
	p{
		font-family: "Nunito Sans",monospace;
		font-size: 20px;
		border: 1px solid;
		width: 70%;
		padding: 20px;
		border-radius: 30px;		
	}	
	.div-duoi{
		display: grid;
		grid-template-columns: repeat(2, 1fr);
		display: grid;
		padding-top: 5em;
		padding-left: 6em;
	}
	
</style>
<body>
	<?php include 'theme.php' ?>
	<div class="div-phai"  >
		<head>
			<div class="div-tren">
				<a href="" class="trai-div-tren" >Trang chủ</a>
				<a href="../in_and_out/signout.php" class="logout">Đăng xuất</a>
			</div>	
		</head>
		<main>
			<?php 
			include '../extra/connect.php';
			$count_product=mysqli_query($connect,"select count(*) as total_product from product")->fetch_array()['total_product'];
			$count_user=mysqli_query($connect,"select count(*) as total_user from user")->fetch_array()['total_user'];
			$count_staff=mysqli_query($connect,"select count(*) as total_staff from staff")->fetch_array()['total_staff'];

			$count_bill_approved=mysqli_query($connect,"select count(*) as total_approved from bill_detail where status='đã duyệt'")->fetch_array()['total_approved'];
			$count_bill_waiting=mysqli_query($connect,"select count(*) as total_waiting from bill_detail where status='đang đợi'")->fetch_array()['total_waiting'];
			$count_bill_canceled=mysqli_query($connect,"select count(*) as total_canceled from bill_detail where status='đã hủy'")->fetch_array()['total_canceled'];
			$today=date('Y-m-d');
			$check_revenue=mysqli_query($connect,"select total from bill_detail where date(create_at)='$today'")->fetch_array();
		
			if(empty($check_revenue)){
				$day_revenue=0;
			} else {
				$day_revenue=mysqli_query($connect,"select sum(total) as 'revenue' from bill_detail where date(create_at)='$today' group by day(create_at)")->fetch_array()['revenue'];
			}
		
			
			$date=date('d');
			$date_of_weeks=date('N');
			$this_month=date('m');
			$year=date('Y');
			if($date-$date_of_weeks<0){
				$need_date=$date-$date_of_weeks;
				$last_month=date('m',strtotime("-3 month"));
				if($last_month>$this_month)
				{
					$year=date('Y',strtotime("-1 year"));
				}
				$days_last_month=(new Datetime(date('d-m-y',strtotime("-1 month"))))->format('t');
				$start_day=$days_last_month-($date_of_weeks-$date);
				$start_day++;
				$date_for_data=$year.'-'.$last_month.'-'.$start_day;
				
			} else{
				$start_day=$date-$date_of_weeks;
				$start_day++;
				$date_for_data=$year.'-'.$this_month.'-'.$start_day;

			}
			$sql="select sum(total) as 'week_revenue'from bill_detail where date(create_at) between '$date_for_data' and '$today'";
			$week_revenue=mysqli_query($connect,$sql)->fetch_array()['week_revenue'];
				
			if(empty($week_revenue)){
				$week_revenue=0;
			} else {
				$week_revenue=$week_revenue->fetch_array()['week_revenue'];
			}

			
			?>
			<div class="div-duoi">
				<p>Số lượng người dùng: <?php echo $count_user ?></p>
				<p>Số lượng nhân viên: <?php echo $count_user ?></p>
				<p>Số lượng sản phẩm được đăng: <?php echo $count_product ?> </p>
				<p>Số lượng đơn tồn: <?php echo $count_bill_waiting ?></p>
				<p>Số lượng đơn hàng đã duyệt: <?php echo $count_bill_approved ?> </p>
				<p>Số lượng đơn hàng đã hủy: <?php echo $count_bill_canceled ?> </p>
				<p>Doanh thu hôm nay: <?php echo $day_revenue ?> </p>
				<p>Doanh thu tuần này: <?php echo $week_revenue ?> </p>
				
				
			</div>
		</main>
	</div>

</body>
</html>