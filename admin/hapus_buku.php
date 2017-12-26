<?php
include '../db/koneksi.php';

	$id= $_GET['id'];
	$query_gmbr = mysqli_query($link, "SELECT cover FROM tb_buku WHERE id='$id'");
	$gambarlama = mysqli_fetch_array($query_gmbr); // 

	$target = $gambarlama['cover'];
	if(file_exists('../assets/image/cover/'.$target)){ //mengecek apakah file terdahulu ada ?
		unlink('../assets/image/cover/'.$target);   // jika ada maka hapus filenya gantikan dengan yang baru
	}
	$query = mysqli_query($link, "DELETE FROM tb_buku WHERE id='$id'");
if ($query) {
		echo "<script>alert('Data berhasil dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=list_buku'>";
	} else {
		echo "Data anda gagal dihapus. Ulangi sekali lagi";
		echo "<meta http-equiv='refresh' content='0; url=?page=list_buku'>";
	}

?>