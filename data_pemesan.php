<?php
	if($user_id == false){
		$_SESSION["proses_pesanan"] = true;
		
		header("location: ".BASE_URL."index.php?page=login");
		exit;
	}
?>
<section class="checkout-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form class="checkout-form" action="<?php echo BASE_URL."proses_pemesanan.php"; ?>" method="POST">
						<div class="cf-title">Alamat Pengiriman</div>
						
						<div class="row address-inputs" style="margin-bottom: 20px">
							<div class="col-md-12">
								<input type="text" placeholder="Nama Penerima" name="nama_penerima">
								<input type="text" placeholder="Alamat" name="alamat">
								<input type="text" placeholder="Alamat 2">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Kode Pos">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="No. HP" name="nomor_telepon">
							</div>
						</div>
						<div class="cf-title">Pengiriman</div>
						<div class="row shipping-btns">		
								<div class="col-6">
									<h4 style="margin-left: 30px">Kota Tujuan</h4>
								</div>
							<div class="col-6">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<select name="kota">
						<?php
							$query = mysqli_query($koneksi, "SELECT * FROM kota");
							
							while($row=mysqli_fetch_assoc($query)){
								echo "<option value='$row[kota_id]'>$row[kota] (".rupiah($row["tarif"]).")</option>";
							}
						?>
					</select>
									</div>
								</div>
							</div>
						</div>
						<div class="cf-title">Pembayaran</div>
						<ul class="payment-list" style="margin-left: 30px">
							<p>Silahkan Lakukan pembayaran ke Bank BRI<br/>
							   Nomor Rekening : <b>0700-1404-9798 (A/N Muhammad Hutomi)</b>.<br/>
							  </p>
						</ul>
						<button class="site-btn submit-order-btn">Submit Pesanan</button>
					</form>
				</div>
				

	<div class="col-lg-4 order-1 order-lg-2">
					<div class="checkout-cart">
						<h3>Your Cart</h3>
		
		<table class="table-list">
			
			
			<?php
				$subtotal = 0;
				foreach($keranjang AS $key => $value){
					
					$barang_id = $key;
					
					$nama_barang = $value['nama_barang'];
					$harga = $value['harga'];
					$quantity = $value['quantity'];
					$gambar = $value["gambar"];
					
					$total = $quantity * $harga;
					$subtotal = $subtotal + $total;
					
					echo "<tr>
							<td class='tengah'><img src='".BASE_URL."images/barang/$gambar' alt='' style='height: 20%;'></td>
							<td class='kiri'>$nama_barang <br> ".rupiah($total)."</td>
						</tr>";
				}
				echo "<tr style='margin-top:20px'>
						<td class='kanan'><b>Sub Total</b></td>
						<td class='kanan'><b>".rupiah($subtotal)."</b></td>
					 </tr>";				
				
			?>
			
		</table>
		
	</div>
</div>







			</div>
		</div>
	</section>