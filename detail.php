<!-- <div class="container">
	<div class="register">
		<div class="account_grid">
	<?php
		$barang_id = $_GET['barang_id'];
		
		$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id' AND status='on'");
		$row = mysqli_fetch_assoc($query);
		
		echo "<div class='col-md-5 login-right'>
					
					<div id='frame-gambar'>
						<img src='".BASE_URL."images/barang/$row[gambar]' />
					</div> 
			   </div>
					<div class='col-md-6 login-left kat'>
						<h2>$row[nama_barang]</h2>
						<span>".rupiah($row['harga'])."</span><div class='clearfix'></div>
						<a class='acount-btn' href='".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]'>+ add to cart</a>
				
						<br><br><b>Keterangan : </b> $row[spesifikasi]
					</div>
				</div>";				
		
	?>
</div>
</div>
</div> -->
<section class="product-section">
	<div class="container">
<div class="back-link">
				<a href="index.php"> &lt;&lt; Back to Home</a>
			</div>

<div class='row'>
				<div class='col-lg-6'>
					
<?php
		$barang_id = $_GET['barang_id'];
		
		$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id' AND status='on'");
		$row = mysqli_fetch_assoc($query);
		
		echo "<div  style='position: relative; overflow: hidden;'>


						<img  src='".BASE_URL."images/barang/$row[gambar]' />
							
						</div>
					
				</div>
				<div class='col-lg-6 product-details'>
					<h2 class='p-title'>$row[nama_barang]</h2>
					<h3 class='p-price'>".rupiah($row[harga])."</h3>
					<h4 class='p-stock'>Available: <span>In Stock</span></h4>
					<div class='p-rating'>
						<i class='fa fa-star-o'></i>
						<i class='fa fa-star-o'></i>
						<i class='fa fa-star-o'></i>
						<i class='fa fa-star-o'></i>
						<i class='fa fa-star-o fa-fade'></i>
					</div>
					<div class='p-review'>
						<a href=''>3 reviews</a>|<a href=''>Add your review</a>
					</div>
					
					<a href='".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]' class='site-btn'>Add To Cart</a>
					<div id='accordion' class='accordion-area'>
						

						<div class='panel'>
							<div class='panel-header' id='headingTwo'>
								<button class='panel-link' data-toggle='collapse' data-target='#collapse2' aria-expanded='false' aria-controls='collapse2'>Keterangan </button>
							</div>
							<div id='collapse2' class='collapse' aria-labelledby='headingTwo' data-parent='#accordion'>
								<div class='panel-body'>
									<p>$row[spesifikasi]</p>
								</div>
							</div>
						</div>
						";?>
						
					</div>
					
				</div>
			</div></div>
</section>