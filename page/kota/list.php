<div style="margin-bottom: 20px; margin-left: 820px">
<a href="<?php echo "admin.php?page=kota&action=form"; ?>" class="tombol-action"><input class="btn btn-primary mt-2 mt-xl-0" type="submit" name="button" value="Tambah Kota" />
	</a>

</div>

<div class="card-body">
                  <h4>Data Kota</h4>
                  <div class="table-responsive">
                    <div id="recent-purchases-listing_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    	<div class="row">
                    		<div class="col-sm-12 col-md-6"></div>
                    		<div class="col-sm-12 col-md-6"></div>
                    	</div>
                    	<div class="row">
                    		<div class="col-sm-12"><table id="recent-purchases-listing" class="table dataTable no-footer" role="grid">
                      <thead>
                        <tr role="row">
                        	<th rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 10px;">No</th>
                        	<th rowspan="1" colspan="1" aria-label="Status report: activate to sort column ascending" aria-sort="descending" style="width: 177px; ">Kota</th>
                        	<th rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 123px; ">Tarif</th>
            
                        	<th rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Status</th>
                        
                        	<th rowspan="1" colspan="2" aria-label="Date: activate to sort column ascending" style="width: 89px; text-align:center">Aksi</th>
                        </tr>

                      </thead>
                      <tbody>
<?php

	$queryKota = mysqli_query($koneksi, "SELECT * FROM kota ORDER BY kota ASC");
	
	if(mysqli_num_rows($queryKota) == 0){
		echo "<h3>Saat ini belum ada nama kota yang didalam database.</h3>";
	}
	else{				 
			$no = 1;
			while($rowKota=mysqli_fetch_assoc($queryKota)){
				echo "<tr>
						<td class='kolom-nomor'>$no</td>
						<td>$rowKota[kota]</td>
						<td>".rupiah($rowKota['tarif'])."</td>
						<td class='tengah'>$rowKota[status]</td>
						<td class='tengah'>
							<a class='tombol-action' href='admin.php?page=kota&action=form&kota_id=$rowKota[kota_id]"."'>Edit</a>
						</td>
						<td class='tengah'>
							<a class='tombol-action' href='admin.php?page=kota&action=hapus&kota_id=$rowKota[kota_id]"."'>Hapus</a>
						</td>
					 </tr>";
				
				$no++;
			}
		
		echo "</table>";
	}
?>