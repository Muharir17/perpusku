<?php
include '../db/koneksi.php';

$id 			= $_POST['id'];
$user_id 	= $_POST['user_id'];
$npm 			= $_POST['npm'];
$nama 		= $_POST['nama'];
$tmp_lahir= $_POST['tempat_lahir'];
$tgl_lahir= $_POST['tgl_lahir'];
$jk 			= $_POST['jk'];
$prodi 		= $_POST['prodi'];
$tgl_diubah = date('Y-m-d');

if ($_POST['ubah']) {
	$query = mysqli_query($link, "UPDATE tb_anggota SET npm='$npm', nama='$nama', tempat_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', jk='$jk', prodi='$prodi', tgl_diubah='$tgl_diubah', user_id='$user_id' WHERE id='$id'");

	if (!$query) {
		$isi = "Gagal Menambahkan Data dengan kesalahan =  ".mysqli_errno($link). " - ".mysqli_error($link);
		echo "<meta http-equiv='refresh' content='0; url=home.php?page=tambah_anggota?status=$isi'>";
	}else{
		$queryku = mysqli_query($link, "SELECT*FROM tb_anggota WHERE npm=$npm");
		$data = mysqli_fetch_array($queryku);
		$id = $data[0];
		echo "<script> alert('Data berhasil ditambahkan ') </script>";
		echo "<meta http-equiv='refresh' content='0; url=home.php?page=detail_anggota&id=$id'>";
	}
}


?>