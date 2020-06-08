<?php 
	include_once("../../function/koneksi.php");
	include_once("../../function/helper.php");	

	$get = $_GET['banner_id'];
	mysqli_query($koneksi, "DELETE from banner where banner_id='$get'");

 ?>
 <meta http-equiv="refresh" content="0.001;url=http://localhost/onlineshop/admin.php?page=banner&action=list">