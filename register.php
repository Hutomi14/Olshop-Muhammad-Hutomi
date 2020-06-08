<div class="category-section spad">
<div class="container"><center>
	<div class="col-lg-8 order-2 order-lg-1">
		  	 <form action="proses_register.php" method="POST" class="checkout-form">
	
				<?php
					$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
					$nama_lengkap = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false;
					$email = isset($_GET['email']) ? $_GET['email'] : false;
					$phone = isset($_GET['phone']) ? $_GET['phone'] : false;
					$alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false;
					
					if($notif == "require"){
						echo "<div class='notif'>Maaf, kamu harus melengkapi form dibawah ini</div>";
					}else if($notif == "password"){
						echo "<div class='notif'>Maaf, password yang kamu masukan tidak sama</div>";
					}else if($notif == "email"){
						echo "<div class='notif'>Maaf, email yang kamu masukan sudah terdaftar</div>";
					}
				?>

				<div class="row address-inputs">
							<div class="col-md-12">
								<input type="text" name="nama_lengkap" placeholder="Nama Lengkap">
								<input type="text" name="email" placeholder="Email">
								<input type="text" name="phone" placeholder="No. Handphone">
								<input type="text" name="alamat" placeholder="Alamat">
							</div>
							<div class="col-md-6">
								<input type="password" name="password" placeholder="Password">
							</div>
							<div class="col-md-6">
								<input type="password" name="re_password" placeholder="Re-Type Password">
							</div>
						</div>
				 
				
					<button class="site-btn submit-order-btn" style="height: 80%;">Register</button>
						<p style="margin-bottom: 20px; display: inline-block">  Sudah mempunyai Akun? Silahkan klik <a href="<?php echo BASE_URL."index.php?page=login"; ?>"">Login</a></p>
			
			</form>
		   </div>
		</div>
</div>