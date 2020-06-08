<?php
  include_once "../../function/koneksi.php"; 
  include_once "../../function/helper.php";
?>
<div class="card-body">
                  <h4>Data Users</h4>
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
                            <th rowspan="1" colspan="1" aria-label="Status report: activate to sort column ascending" aria-sort="descending" style="width: 177px; ">Nama</th>
                            <th rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 123px; ">Email</th>
            
                            <th rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >No Handphone</th>
                            <th rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Level</th>
                            <th rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Status</th>
                        
                            
                        </tr>

                      </thead>
                      <tbody>
<?php
    $no=1;
      
    $queryAdmin = mysqli_query($koneksi, "SELECT * FROM user ORDER BY nama ASC");
      
    if(mysqli_num_rows($queryAdmin) == 0)
    {
        echo "<h3>Saat ini belum ada data user yang dimasukan</h3>";
    }
    else
    {  
            while($rowUser=mysqli_fetch_array($queryAdmin))
            {
                echo "<tr>
                        <td class='kolom-nomor'>$no</td>
                        <td>$rowUser[nama]</td>
                        <td>$rowUser[email]</td>
                        <td>$rowUser[phone]</td>
                        <td>$rowUser[level]</td>
                        <td class='tengah'>$rowUser[status]</td>
                        
                     </tr>";
              
                $no++;
            }
          
        //AKHIR DARI TABLE
        echo "</table>";
    }
?><script>
    window.print();
  </script>