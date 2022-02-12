	<header>
		<div >
			<div class="top_line">
				<p >
					Website bán sáp, pomade uy tín vcl
				</p>
			</div>

			<div class="header_top">
				<p class="logo">
					<a style="text-decoration:none; color:black;" href="./index.php">Masiss</a>
				</p>
				<div  class="search_bar">
					<form method="GET" action="./search.php?tim_kiem=">
						<input type="" name="search" placeholder="Nhập tên sản phẩm cần tìm ..."> 
						<button class="btn-search" href=""><ion-icon style="color:black;font-size: 32px;" name="search-outline"></ion-icon></button>
					</form>
				</div>
				<?php 
				if(empty($_SESSION['id']) || empty($_SESSION['name'])){
					?>
					<div class="top_right">
						<a  href="./login.php">Đăng nhập</a>
					</div>
				<?php } else { ?>
					<p style="position: absolute;margin:0;font-size:19px;
					text-transform: none; right: 10%;top:5%;color:black"> Chào bạn <?php echo $_SESSION['name']; ?>,</p>
					<div class="top_right">
						<a href="./process/signout.php">Đăng xuất</a>
					</div>
				<?php } ?>
				

				<div class="top_right">

					<a href="./cart.php">
						<ion-icon name="cart-outline"></ion-icon>
						Giỏ hàng
					</a>
				</div>
			</div>
			<div class="navbar">
				<ul>
					<li>
						<a href="./index.php">
							Trang chủ
						</a>
					</li>	
					<li>
						<a href="./wax.php">
							Sáp
						</a>
					</li>	
					<li>
						<a href="./pomade.php">
							Pomade
						</a>
					</li>	
					<li>
						<a href="./prestyler.php">
							Sản phẩm hỗ trợ
						</a>
					</li>	
					<li>
						<a href="./accessories.php">
							Dụng cụ hỗ trợ
						</a>
					</li>
					<li>
						<a href="./about.php">
							Giới thiệu
						</a>
					</li>	


				</ul>
			</div>
		</div>
	</header>
