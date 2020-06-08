<?php

	if($user_id){
		header("location: ".BASE_URL);
	}

?>
<div class="category-section spad">
<div class="container"><center>
	<div class="col-lg-4 order-1 order-lg-2">
					
					<form action="<?php echo BASE_URL."proses_login.php"; ?>" method="POST" class="checkout-form">
	
						<?php
						
							$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
							
							if($notif == true){
								echo "<div class='notif'>Maaf, email atau password yang kamu masukan tidak cocok</div>";
							}
						
						?>
												
			 			<div class="row address-inputs" style="margin-bottom: 4px;">
							<div class="col-md-12">
								<input type="text" name="email" placeholder="Email">
								<input type="password" name="password" placeholder="Password">
							</div>
							
						</div>
						
						<button class="site-btn submit-order-btn" style="height: 80%;">Login</button>
						<p style="margin-bottom: 20px; display: inline-block">  Belum mempunyai Akun? Silahkan klik <a href="<?php echo BASE_URL."index.php?page=register"; ?>"">Register</a></p>
					</form>
				</div>

				
				</div>
			</center>

</div>

