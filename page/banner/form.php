<?php
       
    $banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : "";
       
    $banner = "";
    $link = "";
    $gambar = "";
	$keterangan_gambar = "";
    $status = "";
       
    $button = "Add";
       
    if($banner_id != "")
    {
        $button = "Update";
		
        $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE banner_id='$banner_id'");
        $row=mysqli_fetch_array($queryBanner);
           
		$banner = $row["banner"];
		$link = $row["link"];
		$gambar = "<img src='". BASE_URL."images/slide/$row[gambar]' style='width: 200px;vertical-align: middle;' />";
		$keterangan_gambar = "(klik 'Pilih Gambar' hanya jika tidak ingin mengganti gambar)";
		$status = $row["status"];
    }   
?>

<form action="<?php echo "admin.php?page=banner&action=action&banner_id=$banner_id"?>" method="post" enctype="multipart/form-data">
	
	<div class="col-md-6">
						<div class="form-group row">
                          <label class="col-sm-3 col-form-label">Banner</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="banner" value="<?php echo $banner; ?>" >
                          </div>
                        </div>
                    </div>

                    <div class="col-md-6">
						<div class="form-group row">
                          <label class="col-sm-3 col-form-label">Link</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="link" value="<?php echo $link; ?>">
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