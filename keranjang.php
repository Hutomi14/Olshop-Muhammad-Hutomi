<section class='cart-section spad'>
		<div class='container'>
			<div class='row'>
				<div class='col-lg-8'>
					<div class='cart-table'>
						<h3>Keranjang</h3>
						<div class='cart-table-warp' tabindex='1' style='overflow: hidden; outline: none;'>
	<?php
	if($totalBarang == 0){
		echo "<center><h5>Saat ini belum ada data di dalam keranjang belanja anda</h5></center><br><br>";
	}else{
	
		$no=1;
		
		echo "<table>
							<thead>
								<tr>
									<th class='product-th'>Produk</th>
									<th class='quy-th'>Quantity</th>
									<th class='total-th'>Total</th>
									
								</tr>
							</thead>";
		
		$subtotal = 0;		
		foreach($keranjang AS $key => $value){
			$barang_id = $key;
			
			$nama_barang = $value["nama_barang"];
			$quantity = $value["quantity"];
			$gambar = $value["gambar"];
			$harga = $value["harga"];
			
			$total = $quantity * $harga;
			$subtotal = $subtotal + $total;
			
			echo "<tbody>
					<tr>
					<td class='product-col'>
						<img src='".BASE_URL."images/barang/$gambar'  />
						<div class='pc-title'>
							<h5 style='font-size: 14px;'>$nama_barang</h5>
							<p>".rupiah($harga)."</p>
						</div>
					</td>
					<td class='quy-col'>
						<div class='quantity'>
					        <div class='pro-qty'><span class='dec qtybtn'></span>
								<input type='text' name='$barang_id' value='$quantity' class='update-quantity'>
								<span class='inc qtybtn'></span>
							</div>
                    	</div>
					</td>
					<td class='total-col'><h4 >".rupiah($total)."</h4><a href='".BASE_URL."hapus_item.php?barang_id=$barang_id'>    X</a></td>
					</tr>";
				
			$no++;	
		
	}
		
	// 	echo "<tr>
	// 			<td colspan='2' class='kanan'><b>Sub Total</b></td>
	// 			<td class='kanan'><b>".rupiah($subtotal)."</b></td>
	// 		  </tr>";
		
	 	echo "</tbody></table>";
	
	// 	echo "<div id='frame-button-keranjang'>
	// 			<a class='acount-btn' id='lanjut-belanja' href='".BASE_URL."index.php'>< Lanjut Belanja</a>
	// 			<a class='acount-btn' id='lanjut-pemesanan' href='".BASE_URL."index.php?page=data_pemesan'>Lanjut Pemesanan ></a>
	// 		  </div>";
	
	// }

?>
</div>

				<div class='total-cost'>
							<h6>Total <span><?php echo rupiah($subtotal); ?></span></h6>
						</div>
					</div>
				</div>
				


<?php }?>
				<div class='col-lg-4 card-right'>
					<form class='promo-code-form'>
						<input type='text' placeholder='Enter promo code'>
						<button>Submit</button>
					</form>
					<a href='index.php?page=data_pemesan' class='site-btn'>Proceed to checkout</a>
					<a href='index.php' class='site-btn sb-dark'>Continue shopping</a>
				</div>
			</div>
		</div>
	</section>

<script>

	$(".update-quantity").on("input", function(e){
		var barang_id = $(this).attr("name");
		var value = $(this).val();
		
		$.ajax({
			method: "POST",
			url: "update_keranjang.php",
			data: "barang_id="+barang_id+"&value="+value
		})
		.done(function(data){
			location.reload();
		});
		
	});

</script>
