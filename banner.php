<div class="hero-section">
		<div class="hero-slider owl-carousel">
			<?php 		
				$queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE status='on' ORDER BY banner_id DESC LIMIT 2");
				while($rowBanner=mysqli_fetch_assoc($queryBanner)){
					echo "
						<div class='hs-item set-bg' data-setbg='images/slide/$rowBanner[gambar]'> 
							<div class='container'>
								<div class='row'>
									<div class='col-xl-6 col-lg-7 text-white'>
										<br><br><br><br><br><br><br><br><br>
										<span>New Arrivals</span>
										<h2>$rowBanner[banner]</h2>
										
										<a href='$rowBanner[link]' class='site-btn sb-line'>DETAIL</a>
										<a href='$rowBanner[link]' class='site-btn sb-white'>ADD TO CART</a>
									</div>
								</div>
							</div>
						</div>";
				}
			?>
							
												
		</div>
		<div class="container">
			<div class="slide-num-holder" id="snh-1"></div>
		</div>
	</div>