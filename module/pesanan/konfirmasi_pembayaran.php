<div class="category-section spad">
<div class="container"><center>
	<div class="col-lg-4 order-1 order-lg-2">
						<h3>Konfirmasi Pembayaran</h3><br>
<?php

	$pesanan_id = $_GET["pesanan_id"];

?>



	<form action="<?php echo BASE_URL."module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="POST" class="checkout-form">

		<div class="row address-inputs" style="margin-bottom: 4px;">
			<div class="col-md-12">
				<input type="text" name="nomor_rekening" placeholder="No Rekening">
				<input type="text" name="nama_account" placeholder="Nama Akun">
				<input type="text" name="tanggal_transfer" placeholder="Tanggal Transfer">
			</div>
						
		</div>
			<button class="site-btn submit-order-btn" style="height: 80%;">Konfirmasi</button>
		
	
	</form>

</div>
			</center>

</div>
					