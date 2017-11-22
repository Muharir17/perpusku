<?php
include '../db/koneksi.php';

	$id= $_GET['id'];
	$query = mysqli_query($link, "DELETE FROM tb_user WHERE id='$id'");
if ($query) {
		echo "<script>alert('Data berhasil dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=list_user'>";
	} else {
		echo "Data anda gagal dihapus. Ulangi sekali lagi";
		echo "<meta http-equiv='refresh' content='0; url=?page=list_user'>";
	}


?>