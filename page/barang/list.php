<div style="margin-bottom: 20px; margin-left: 820px">
<a href="<?php echo "admin.php?page=barang&action=form"; ?>" class="tombol-action"><input class="btn btn-primary mt-2 mt-xl-0" type="submit" name="button" value="Tambah Barang" />
	</a>

</div>

 

<div class="card-body">
                  <h4>Data Barang</h4>
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
                        	<th rowspan="1" colspan="1" aria-label="Status report: activate to sort column ascending" aria-sort="descending" style="width: 177px; ">Barang</th>
                        	<th rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 123px; ">Kategori</th>
                        	<th rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 123px; ">Harga</th>
                        	<th rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Status</th>
                        	<th rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Stok</th>
                        	<th rowspan="1" colspan="2" aria-label="Date: activate to sort column ascending" style="width: 89px; text-align:center">Aksi</th>
                        </tr>

                      </thead>
                      <tbody>


<?php

	$query = mysqli_query($koneksi, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori ON barang.kategori_id=kategori.kategori_id");
	
	if(mysqli_num_rows($query) == 0){
		echo "<h3>Saat ini belum ada barang di dalam table barang</h3>";
	}else{
	
		$no=1;
		while($row=mysqli_fetch_assoc($query)){
			
			echo "<tr>
					<td class='kolom-nomor'>$no</td>
					<td class='kiri'>$row[nama_barang]</td>
					<td class='kiri'>$row[kategori]</td>
					<td>".rupiah($row['harga'])."</td>
					<td class='tengah'>$row[status]</td>
					<td>$row[stok]</td>
					<td class='tengah'>
						<a class='tombol-action' href='admin.php?page=barang&action=form&barang_id=$row[barang_id]'>Edit</a>
					</td>
					<td class='tengah'>
						<a class='tombol-action' href='admin.php?page=barang&action=hapus&barang_id=$row[barang_id]'>Hapus</a>
					</td>
				  </tr>";
				  
			$no++;
		}
		
		echo "</table>";
	
	}

?>