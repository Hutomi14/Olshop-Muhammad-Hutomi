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