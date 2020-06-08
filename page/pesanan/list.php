
<div class="card-body">
                  
                  <h4>Data Pesanan</h4>
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
                        	<th rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 10px;">ID</th>
                        	<th rowspan="1" colspan="1" aria-label="Status report: activate to sort column ascending" aria-sort="descending" style="width: 177px; ">Nama Pemesan</th>
                        	<th rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 123px; ">Status</th>
                        	<th rowspan="1" colspan="2" aria-label="Date: activate to sort column ascending" style="width: 89px; text-align:center">Aksi</th>
                        </tr>

                      </thead>
                      <tbody>


                      <?php 
                      		$queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id ORDER BY pesanan.tanggal_pemesanan DESC");
                      		while($row=mysqli_fetch_assoc($queryPesanan)){
                      			$status = $row['status'];

                      			echo "
                      				<tr role='row' class='odd'>
			                            <td class=''>$row[pesanan_id]</td>
			                            <td class='sorting_1'>$row[nama]</td>
			                            <td>$arrayStatusPesanan[$status]</td>
			                            
			                            <td><a class='acount-btn' href='admin.php?page=pesanan&action=detail&pesanan_id=$row[pesanan_id]'>Detail Pesanan</a></td>
			                            <td><a class='tombol-action' href='admin.php?page=pesanan&action=status&pesanan_id=$row[pesanan_id]'>Update Status</a></td>
			                        </tr>

                      			";
                      		}
                       ?>
                                  
                      

                    </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
            	<div class="col-sm-12 col-md-5"></div>
            	<div class="col-sm-12 col-md-7"></div>
            </div>
        </div>
    </div>
</div>