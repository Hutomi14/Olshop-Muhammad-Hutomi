<?php
  include_once "../../function/koneksi.php"; 
  include_once "../../function/helper.php";
?>

<div class="card-body">
                  <h4>Data Banner</h4>
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
                            <th rowspan="1" colspan="1" aria-label="Status report: activate to sort column ascending" aria-sort="descending" style="width: 177px; ">Banner</th>
                            <th rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 123px; ">Link</th>
            
                            <th rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Status</th>
                        
                           
                        </tr>

                      </thead>
                      <tbody>
<?php
    $no=1;
        
    $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner ORDER BY banner_id DESC");
        
    if(mysqli_num_rows($queryBanner) == 0)
    {
        echo "<h3>Saat ini belum ada banner di dalam database</h3>";
    }
    else
    {
    
            while($rowBanner=mysqli_fetch_array($queryBanner))
            {
                echo "<tr>
                        <td class='kolom-nomor'>$no</td>
                        <td>$rowBanner[banner]</td>
                        <td><a target='blank' href='".BASE_URL."$rowBanner[link]'>$rowBanner[link]</a></td>
                        <td class='tengah'>$rowBanner[status]</td>
                        
                     </tr>";
                
                $no++;
            }
            
        echo "</table>";
    }
?><script>
    window.print();
  </script>