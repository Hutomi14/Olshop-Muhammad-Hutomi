<?php 

	include_once("../../function/koneksi.php");
	include_once("../../function/helper.php");
	
	$barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;
	$nama_barang = $_POST['nama_barang'];
	$kategori_id = $_POST['kategori_id'];
	$spesifikasi = $_POST['spesifikasi'];
	$status = $_POST['status'];
	$button = $_POST['button'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$update_gambar = "";
	
	if(!empty($_FILES["file"]["name"])){
		$nama_file = $_FILES["file"]["name"];
		move_uploaded_file($_FILES["file"]["tmp_name"], "../../images/barang/".$nama_file);
		
		$update_gambar = ", gambar='$nama_file'";
	}
	
	if($button == "Add"){
		mysqli_query($koneksi, "INSERT INTO barang (nama_barang, kategori_id, spesifikasi, gambar, harga, stok, status) 
											VALUES ('$nama_barang', '$kategori_id', '$spesifikasi', '$nama_file', '$harga', '$stok', '$status')");
	}
	else if($button == "Update"){
		$barang_id = $_GET['barang_id'];
		
		mysqli_query($koneksi, "UPDATE barang SET kategori_id='$kategori_id',
												  nama_barang='$nama_barang',
												  spesifikasi='$spesifikasi',
												  harga='$harga',
												  stok='$stok',
												  status='$status'
												  $update_gambar WHERE barang_id='$barang_id'");
	}
	// if ($barang_id) {
	// 	$query = mysqli_query($koneksi, "DELETE * FROM barang WHERE barang_id='$barang_id'");
	// }

	
	?>
	<meta http-equiv="refresh" content="0.001;url=http://localhost/onlineshop/admin.php?page=barang&action=list">