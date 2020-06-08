<?php 
	
	session_start();

	include_once("function/koneksi.php");
	include_once("function/helper.php");

	$page = isset($_GET['page']) ? $_GET['page'] : false;
	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
	
	$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
	$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
	$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
	$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
	$totalBarang = count($keranjang);
	
 ?>
 <?PHP error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>


<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>MH-Tronics</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="<?php echo BASE_URL."index.php"; ?>"><img src="images/logo.png" alt=""></a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form">
							<input type="text" name="search" placeholder="Search">
							<button><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								<i class="flaticon-profile"></i>
								<?php
								if($user_id){
									echo "Hi <b>$nama</b>,<br>
										  <a href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=list'>My Orders</a>
										  <a href='".BASE_URL."logout.php'>Logout</a>";
								}else{
									echo "<a href='".BASE_URL."index.php?page=login'>Login</a> <span>or</span>
										 <a href='".BASE_URL."index.php?page=register'>Register</a>";
								}
							?>
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<a href="<?php echo BASE_URL."index.php?page=keranjang"; ?>" id="button-keranjang">
									<i class="flaticon-bag"></i>
									<!-- <span>0</span> -->
									<?php
									if($totalBarang != 0){
										echo "<span class='total-barang'>$totalBarang</span>";
										}
									?>
								</div>
								<span>Shopping Cart</span>
							</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					 <li class=" grid"><a  href="<?php echo BASE_URL."index.php"; ?>">Beranda</a></li>	
					  <li class=" grid"><a  href="<?php echo BASE_URL."index.php?page=all"; ?>">Semua Produk</a></li>	
				      
				      	<?php 
				      		$query=mysqli_query($koneksi,"Select * from kategori where status='on'");
				      		while($row=mysqli_fetch_assoc($query)){
				      			echo "<li><a href='".BASE_URL,"index.php?kategori_id=$row[kategori_id]'>$row[kategori]</a></li>";
				      		}
				      		
				      	 ?>
					<!-- <li><a href="#">Pages</a>
						<ul class="sub-menu">
							<li><a href="./product.html">Product Page</a></li>
							<li><a href="./category.html">Category Page</a></li>
							<li><a href="./cart.html">Cart Page</a></li>
							<li><a href="./checkout.html">Checkout Page</a></li>
							<li><a href="./contact.html">Contact Page</a></li>
						</ul>
					</li> -->
					
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->



	<!-- Hero section  banner-->
	
	<!-- Hero section end -->

	<section class="top-letest-product-section">
		<?php
					$filename = "$page.php";
					$search = $_GET['search'];
					
					if(file_exists($filename)){
						include_once($filename);

					}elseif ($kategori_id or $page or $search){
						include_once ("main.php");
					}
					else{

						include_once("home.php");
					}
					
				?> 
	</section>


	<!-- letest product section -->
	<!-- <section class="top-letest-product-section">
		<?php include_once ("banner.php"); ?>
		<div class="container">
			<div class="section-title">
				<h2>LATEST PRODUCTS</h2>
			</div>
			<div class="product-slider owl-carousel">
				
						<?php 

						$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' ORDER BY rand() DESC LIMIT 8"); 
						while($row=mysqli_fetch_assoc($query)){
							echo"<div class='product-item'>
									<div class='pi-pic'>
										<a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>
											<img class='img-responsive' src='".BASE_URL."images/barang/$row[gambar]' />
										</a>
										<div class='pi-links'>
											<a href='".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]' class='add-card'>
											<i class='flaticon-bag'></i><span>ADD TO CART</span></a>
										</div>
									</div>
									<a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>
									<div class='pi-text'>
										<h5>$row[nama_barang]</h5>
										<span>".rupiah($row['harga'])."</span>
									</div>
									</a>
								</div>
							";
						}
						?>		
				
			</div>
		</div>
	</section> -->
	<!-- letest product section end -->


	<!-- Footer section -->
	<section class="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<a href="index.php"><h3><font color="#ff0000">MH-Tronics</font></h3></a>
					<p><font color="white">Desa Blang Pulo, Kec. Muara Satu, <br>Kota Lhokseumawe Aceh, <br>Indonesia Muhammad Hutomi <br>+6287891788296</font></p>
						<img src="img/cards.png" alt="">
					</div>
				</div>
				
			</div>
		</div>
		<div class="social-links-warp">
			<div class="container">
				<div class="social-links">
					<a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
					<a href="" class="google-plus"><i class="fa fa-google-plus"></i><span>g+plus</span></a>
					<a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
					<a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
					<a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
					<a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
					<a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
				</div>

<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> 
<p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

			</div>
		</div>
	</section>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
