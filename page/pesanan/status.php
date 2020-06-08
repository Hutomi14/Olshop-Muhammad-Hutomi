<?php

	$pesanan_id = $_GET["pesanan_id"];

	$query = mysqli_query($koneksi, "SELECT status FROM pesanan WHERE pesanan_id='$pesanan_id'");
	$row=mysqli_fetch_assoc($query);
	$status = $row['status'];
	
?>


            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              
              <h4>Update Status Pesanan</h4>
              
             <form class="pt-3" action="<?php echo "admin.php?page=pesanan&action=action&pesanan_id=$pesanan_id"; ?>" method="POST">

                <div class="form-group" >
                	
                	<span style="margin-right: 90px">Pesanan Id (Faktur Id)</span> <?php echo $pesanan_id; ?><br><br>

               		<span style="margin-right: 200px">Status</span>
	               <select name="status">
					<?php
					
						foreach($arrayStatusPesanan AS $key => $value){
							if($status == $key){
								echo "<option value='$key' selected='true'>$value</option>";
							}
							else{
								echo "<option value='$key'>$value</option>";
							}
						}
					
					?>
				</select>
                </div>

                <div class="mt-3">
                  
                  <span><input class="btn btn-primary btn-rounded btn-fw" type="submit" value="Edit Status" name="button" /></span>
                </div>
                
                
                
              </form>
            </div>
       