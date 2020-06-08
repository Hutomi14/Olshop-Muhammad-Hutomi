<?php
  include_once "../../function/koneksi.php"; 
  include_once "../../function/helper.php";
?>
<center> <br><h3>Data Pesanan</h3><br>
<table border="1px">
  <th style="padding-right: 30px">No</th>
  <th style="padding-right: 30px">Nama Pemesan</th>
  <th style="padding-right: 30px">Status</th>
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
			                        </tr>

                      			";
                      		}
                       ?>
                                  
                      

                    </tbody>
                    </table>
                </center>

                <script>
    window.print();
  </script>