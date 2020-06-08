<?php
  include_once "../../function/koneksi.php"; 
  include_once "../../function/helper.php";
?>

<center><br><br>
                 <center> <h3>Data Barang</h3></center>
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
                        	<th rowspan="1" colspan="1" aria-label="Status report: activate to sort column ascending" aria-sort="descending" style="width: 277px; ">Barang</th>
                        	<th rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 100px;">Kategori</th>
                        	<th rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width:100px;">Harga</th>
                        	<th rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 50px;">Status</th>
                        	<th rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 50px;">Stok</th>
                        	
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
					<td class='kolom-nomor' style='width: 10px;'>$no</td>
					<td class='kiri' style='width: 10px;'>$row[nama_barang]</td>
					<td class='kiri'style='margin-right: 10px;'>$row[kategori]</td>
					<td style='width: 100px;margin-left:20px'>".rupiah($row['harga'])."</td>
					<td class='tengah' style='width: 10px;'>$row[status]</td>
					<td style='width: 10px;'>$row[stok]</td>
					
				  </tr>";
				  
			$no++;
		}
		
		echo "</table>";
	
	}

?></center>

<script>
    window.print();
  </script>