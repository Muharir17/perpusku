<?php
	
	$db_host		= "localhost";
	$db_user		= "root";
	$db_password	= "";
	$db_name 		= "perpusku";

	$link = mysqli_connect($db_host, $db_user, $db_password, $db_name);

	if (!$link) {
		die("Gagal Terkoneksi".mysqli_connect_errno()." - ". mysqli_connect_error());
		exit();
	}
?>
