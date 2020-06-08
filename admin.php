<?php 
  
  session_start();

  include_once("function/koneksi.php");
  include_once("function/helper.php");

  $page = isset($_GET['page']) ? $_GET['page'] : false;
  $kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
  $action = isset($_GET['action']) ? $_GET['action'] : false;
  $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
  $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
  $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
  $keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
  $totalBarang = count($keranjang);
  
 ?>
 <?PHP error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Administrator</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style1.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
           <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="admin.php"><img src="images/logos.png" alt="logo"></a>
          <a class="navbar-brand brand-logo-mini" href="admin.php"><img src="images/-mini.svg" alt="logo"></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <form action="">
                <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search" name="search1">
              </form>
              
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
           <li class="nav-item dropdown mr-4">
            
                <a class="mdi mdi-logout text-primary" href="logout.php">Logout </a>
                         
            
          </li>
       </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">


<!-- 
          <li class="nav-item">
            <a class="nav-link" href="admin.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
 -->
         <!--  <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Barang</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic" style="">
                <ul class="nav flex-column sub-menu">
                   <li class="nav-item">
                    <a class="nav-link" href="index.html">
                     
                      <span class="menu-title">Smartphone</span>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="index.html">
                    
                      <span class="menu-title">Televisi</span>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="index.html">
                     
                      <span class="menu-title">Kamera</span>
                    </a>
                  </li>
    
                </ul>
            </div>
          </li> -->

          <!-- <li class="nav-item ">
            <a class="nav-link" href="admin.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li> -->

          <li class="nav-item ">
            <a class="nav-link" href="?page=pesanan&action=list">
              <i class="mdi mdi-collage menu-icon"></i>
              <span class="menu-title">Pesanan</span>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="?page=barang&action=list">
              <i class="mdi mdi-database-plus menu-icon"></i>
              <span class="menu-title">Barang</span>
            </a>
          </li>

           <li class="nav-item ">
            <a class="nav-link" href="?page=kota&action=list">
              <i class="mdi mdi-openid menu-icon"></i>
              <span class="menu-title">Kota</span>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="?page=banner&action=list">
              <i class="mdi mdi-book-multiple-variant menu-icon"></i>
              <span class="menu-title">Banner</span>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="?page=user&action=list">
              <i class="mdi mdi-account-circle menu-icon"></i>
              <span class="menu-title">User</span>
            </a>
          </li>

          
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5">
                    <h2>Welcome back,</h2>
                    <h5 class="mb-md-0">
                        <?php
                            if($user_id){
                              echo "<b>$nama</b>.";

                            }else{
                              header("location: index.php?page=login");
                            }
                          ?>
                    </h5>
                  </div>
                  
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap" style="margin-right: 25px">
                  <?php 
                    if ($page) {echo "
                      <a href='page/laporan/cetak$page.php'>
                        <span><input class='btn btn-primary mt-2 mt-xl-0' type='submit' name='button' value='Cetak laporan $page'/>
                    </span>
                  </a>";
                    } else{
                      header("location:admin.php");
                    }
                   ?>
                  
                  <!-- <button class="btn btn-primary mt-2 mt-xl-0" value="Download report"></button> -->
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  

<!-- <form class="header-search-form">
              <input type="text" name="hut" placeholder="Search">
              <button><i class="flaticon-search"></i></button>
            </form> -->



                  <!-- ini tuk mainnya -->
                  <?php
                      $filename = "page/$page/$action.php";
                      $search1 = $_GET['search1'];
                     
                      if(file_exists($filename)){
                        include "$filename";
                      }

                      if ($search1) {
                        $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' AND nama_barang like '%".$search1."%'");
                        $query1 = mysqli_query($koneksi, "SELECT * FROM banner WHERE status='on' AND banner like '%".$search1."%'");
                        $query2 = mysqli_query($koneksi, "SELECT * FROM kota WHERE status='on' AND kota like '%".$search1."%'");
                        $query3 = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE status='on' AND nama_penerima like '%".$search1."%'");
                        $query4 = mysqli_query($koneksi, "SELECT * FROM user WHERE status='on' AND nama like '%".$search1."%'");
                        $q = mysqli_num_rows($query);
                        $q1 = mysqli_num_rows($query1);
                        $q2 = mysqli_num_rows($query2);
                        $q3 = mysqli_num_rows($query3);
                        $q4 = mysqli_num_rows($query4);

                        $jumlah = $q + $q1 + $q2 + $q3 + $q4;
                          echo "<h3>Ada ".$jumlah." data ditemukan dengan kata kunci ".$search1.".</h3>";
                          echo "<hr>" ?>
                          <div class='card-body'>
                                 
                                  <div class='table-responsive'>
                                    <div id='recent-purchases-listing_wrapper' class='dataTables_wrapper container-fluid dt-bootstrap4 no-footer'>
                                      <div class='row'>
                                        <div class='col-sm-12 col-md-6'></div>
                                        <div class='col-sm-12 col-md-6'></div>
                                      </div>
                                      <div class='row'>
                                        <div class='col-sm-12'><table id='recent-purchases-listing' class='table dataTable no-footer' role='grid'>
                                      <thead>
                                        <tr role='row'>
                                          <th style='width: 1px; text-align: center;'>No</th>
                                          <th rowspan='1' colspan='1' aria-label='Status report: activate to sort column ascending' aria-sort='descending' style='width: 177px; '>Data</th>
                                          <th rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 123px; '>Lokasi</th>
                                          
                                        </tr>

                                      </thead>
                                      <tbody>
                            <?php
                          $no=1;
                        while($row=mysqli_fetch_assoc($query)){
                         
                          echo "<tr>
                                    <td style='width: 1px; text-align: center;' class='kolom-nomor'>$no</td>
                                    <td class='kiri'>$row[nama_barang]</td>
                                    <td class='kiri'>Data Barang</td>
                                    
                                </tr>";
                                $no++;
                        }

                         while($row=mysqli_fetch_assoc($query1)){
                         
                           echo "<tr>
                                    <td style='width: 1px; text-align: center;' class='kolom-nomor'>$no</td>
                                    <td class='kiri'>$row[banner]</td>
                                    <td class='kiri'>Data Banner</td>
                                    
                                </tr>";
                                $no++;
                        }

                        while($row=mysqli_fetch_assoc($query2)){
                        
                           echo "<tr>
                                    <td style='width: 1px; text-align: center;' class='kolom-nomor'>$no</td>
                                    <td class='kiri'>$row[kota]</td>
                                    <td class='kiri'>Data Kota</td>
                                    
                                </tr>";
                                $no++;
                        }

                        while($row=mysqli_fetch_assoc($query3)){
                         
                           echo "<tr>
                                    <td style='width: 1px; text-align: center;' class='kolom-nomor'>$no</td>
                                    <td class='kiri'>$row[nama_penerima]</td>
                                    <td class='kiri'>Data Pesanan</td>
                                    
                                </tr>";
                                $no++;
                        }

                        while($row=mysqli_fetch_assoc($query4)){
                          
                           echo "<tr>
                                    <td style='width: 1px; text-align: center;' class='kolom-nomor'>$no</td>
                                    <td class='kiri'>$row[nama]</td>
                                    <td class='kiri'>Data User</td>
                                    
                                </tr>";
                                $no++;
                        }


                    }
                
                      

                      ?>
                       </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer> -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/data-table.js"></script>
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

