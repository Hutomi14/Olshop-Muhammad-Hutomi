<?php 
	include_once("../../function/koneksi.php");
	include_once("../../function/helper.php");	

	$get = $_GET['barang_id'];
	mysqli_query($koneksi, "DELETE from barang where barang_id='$get'");

 ?>
 <meta http-equiv="refresh" content="0.001;url=http://localhost/onlineshop/admin.php?page=barang&action=list">