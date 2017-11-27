<?php
include '../db/koneksi.php';

	$id= $_GET['id'];
	$query_gmbr = mysqli_query($link, "SELECT foto FROM tb_user WHERE id='$id'");
	$gambarlama = mysqli_fetch_array($query_gmbr); // 

	$target = $gambarlama['foto'];
	if(file_exists('../assets/image/'.$target)){ //mengecek apakah file terdahulu ada ?
		unlink('../assets/image/'.$target);   // jika ada maka hapus filenya gantikan dengan yang baru
	}
	$query = mysqli_query($link, "DELETE FROM tb_user WHERE id='$id'");
if ($query) {
		echo "<script>alert('Data berhasil dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=list_user'>";
	} else {
		echo "Data anda gagal dihapus. Ulangi sekali lagi";
		echo "<meta http-equiv='refresh' content='0; url=?page=list_user'>";
	}

?>