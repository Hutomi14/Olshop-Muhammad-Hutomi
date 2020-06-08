<?php
      
    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";
      
	$button = "Update";
	$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");
	 
	$row=mysqli_fetch_array($queryUser);
	  
	$nama = $row["nama"];
	$email = $row["email"];
	$phone = $row["phone"];
	$alamat = $row["alamat"];
	$status = $row["status"];
	$level = $row["level"];
?>
<form action="<?php echo "admin.php?page=user&action=action&user_id=$user_id"?>" method="POST">
		
				<div class="col-md-8">
					<div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>" >
                          </div>
                        </div>
                    </div>

                    <div class="col-md-8">
						<div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" >
                          </div>
                        </div>
                    </div>
					<div class="col-md-8">
                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label">No Hp</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>" >
                          </div>
                        </div>
                    </div>

                    <div class="col-md-8">
						<div class="form-group row">
                          <label class="col-sm-3 col-form-label">Alamat</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>" >
                          </div>
                        </div>
                    </div>

                    <div class="col-md-8">
					<div class="form-group row">
                          <label class="col-sm-3 col-form-label">Level</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="superadmin" name="level" <?php if($level == "superadmin"){ echo "checked"; } ?> /> Superadmin
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                               <input type="radio" value="customer" name="level" <?php if($level == "customer"){ echo "checked"; } ?> /> Customer			
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-8">
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