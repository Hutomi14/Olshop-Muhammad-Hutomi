<?php 
	include_once("../../function/koneksi.php");
	include_once("../../function/helper.php");	

	$get = $_GET['user_id'];
	mysqli_query($koneksi, "DELETE from user where user_id='$get'");

 ?>
 <meta http-equiv="refresh" content="0.001;url=http://localhost/onlineshop/admin.php?page=user&action=list">