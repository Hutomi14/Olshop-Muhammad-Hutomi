
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
