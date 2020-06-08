<?php

	$barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;
	
	$nama_barang = "";
	$kategori_id = "";
	$spesifikasi = "";
	$gambar = "";
	$stok = "";
	$harga = "";
	$status = "";
	$keterangan_gambar = "";
	$button = "Add";
	
	if($barang_id){
		$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id'");
		$row = mysqli_fetch_assoc($query);
		
		$nama_barang = $row['nama_barang'];
		$kategori_id = $row['kategori_id'];
		$spesifikasi = $row['spesifikasi'];
		$gambar = $row['gambar'];
		$harga = $row['harga'];
		$stok = $row['stok'];
		$status = $row['status'];
		$button = "Update";
		
		$keterangan_gambar = "(Klik pilih gambar jika ingin mengganti gambar disamping)";
		$gambar = "<img src='".BASE_URL."images/barang/$gambar' style='width: 200px;vertical-align: middle;' />";
	}

?>

<script src="<?php echo BASE_URL."js/ckeditor/ckeditor.js"; ?>"></script>

<form action="<?php echo "admin.php?page=barang&action=action&barang_id=$barang_id"; ?>" method="POST" enctype="multipart/form-data">
<div class="container"><h4>Update Data Barang</h4></div>
					<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kategori</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="kategori_id">
                              <?php
									$query = mysqli_query($koneksi, "SELECT kategori_id, kategori FROM kategori WHERE status='on' ORDER BY kategori ASC");
									while($row=mysqli_fetch_assoc($query)){
										if($kategori_id == $row['kategori_id']){
											echo "<option value='$row[kategori_id]' selected='true'>$row[kategori]</option>";
										}else{
											echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
										}
									}
								?>
                            </select>
                          </div>
                        </div>
                      </div>

					<div class="col-md-6">
						<div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama Barang</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_barang" value="<?php echo $nama_barang; ?>">
                          </div>
                        </div>
                    </div>

					<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Spesifikasi</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" id="exampleTextarea1" rows="6" name="spesifikasi" id="editor"><?php echo $spesifikasi; ?></textarea>
                          </div>
                        </div>
                    </div>
					
					<div class="col-md-6">
						<div class="form-group row">
                          <label class="col-sm-3 col-form-label">Stok</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="stok" value="<?php echo $stok; ?>">
                          </div>
                        </div>
                    </div>

                    <div class="col-md-6">
						<div class="form-group row">
                          <label class="col-sm-3 col-form-label">Harga</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="harga" value="<?php echo $harga; ?>">
                          </div>
                        </div>
                    </div>


					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Gambar Produk <?php echo $keterangan_gambar; ?></label>
						<div class="col-sm-9">
                           <?php echo $gambar; ?><input type="file" name="file" /> 
                          </div>						
					</div>	
				</div>	
	


					<div class="col-md-6">
					<div class="form-group row">
                          <label class="col-sm-3 col-form-label">Status</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" value="on" <?php if($status == "on"){ echo "checked='true'"; } ?> /> On
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                               <input type="radio" name="status" value="off" <?php if($status == "off"){ echo "checked='true'"; } ?> /> Off
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div>
                    </div>

	<span><input type="submit" class="btn btn-primary mr-2" name="button" value="<?php echo $button; ?>" /></span>

</form>

<script>
	CKEDITOR.replace("editor");
</script>