<?php

	$kota_id = isset($_GET['kota_id']) ? $_GET['kota_id'] : false;
	
	$kota = "";
	$tarif = "";
	$status = "";
	$button = "Add";

	if($kota_id){
		$queryKota = mysqli_query($koneksi, "SELECT * FROM kota WHERE kota_id='$kota_id'");
		$row=mysqli_fetch_assoc($queryKota);
		
		$kota = $row['kota'];
		$tarif = $row['tarif'];
		$status = $row['status'];
		
		$button = "Update";
	}
		
?>		
<form action="<?php echo "admin.php?page=kota&action=action&kota_id=$kota_id"?>" method="post">
					<div class="col-md-6">
						<div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kota</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="kota" value="<?php echo $kota; ?>" >
                          </div>
                        </div>
                    </div>

                    <div class="col-md-6">
						<div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tarif</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="tarif" value="<?php echo $tarif; ?>">
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