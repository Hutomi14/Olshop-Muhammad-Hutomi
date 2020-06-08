<!-- <div class="page-top-info">
		<div class="container">
			<h4>CAtegory PAge</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Shop</a> /
			</div>
		</div>
</div> -->

	<div class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Categories</h2>
						<ul class="category-menu">
							<!-- <?php 
				      		$query=mysqli_query($koneksi,"Select * from kategori where status='on'");
				      		while($row=mysqli_fetch_assoc($query)){
				      			echo "<li><a href='".BASE_URL,"index.php?kategori_id=$row[kategori_id]'>$row[kategori]</a></li>";
				      		}
				      		
				      	 ?> -->
							<li><a href="index.php?kategori_id=1">Smartphone</a>
								<ul class="sub-menu">
									<li><a href="index.php?search=apple">Apple</a></li>
									<li><a href="index.php?search=samsung">Samsung</a></li>
									<li><a href="index.php?search=lenovo">Lenovo</a></li>
									<li><a href="index.php?search=xiaomi">Xiaomi</a></li>
									<li><a href="index.php?search=asus">Asus</a></li>
								</ul>
							</li>

							<li><a href="index.php?kategori_id=2">Televisi</a>
								<ul class="sub-menu">
									<li><a href="index.php?search=lg">LG</a></li>
									<li><a href="index.php?search=sharp">Sharp</a></li>
								</ul>
							</li>

							<li><a href="index.php?kategori_id=3">Kamera</a>
								<ul class="sub-menu">
									<li><a href="index.php?search=nikon">Nikon</a></li>
									<li><a href="index.php?search=canon">Canon</a></li>
								</ul>
							</li>

						</ul>
					</div>
				</div>


	<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">

						<?php
									$page = $_GET['page'] == "all";
									$kategori_id=$_GET['kategori_id'];
									
									$search = $_GET['search'];
								
									if($kategori_id){
										$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' AND kategori_id='$kategori_id'");
									}elseif ($search){
										$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' AND nama_barang like '%".$search."%'");
										$jumlah = mysqli_num_rows($query);
										if ($jumlah==0) {
											echo '<p>Pencarian <font color="brown" size=4>"'.$search.'"</font>, tidak ditemukan.</p>'; 
										}
                                                
									}elseif ($page){
										$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on'");
									}else{
										include_once("homke.php");
									}
									
									$no=1;
									while($row=mysqli_fetch_assoc($query)){
										
										
										
									echo " 	<div class='col-lg-4 col-sm-6'>
												<div class='product-item'>
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
										</div>";
									}
								
								?>


			</div>
		</div>	
</div>
