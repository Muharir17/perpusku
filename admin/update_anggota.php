<?php
include '../db/koneksi.php';

$user_id 	= $_POST['user_id'];
$npm 			= $_POST['npm'];
$nama 		= $_POST['nama'];
$tmp_lahir= $_POST['tempat_lahir'];
$tgl_lahir= $_POST['tgl_lahir'];
$jk 			= $_POST['jk'];
$prodi 		= $_POST['prodi'];
$tgl_dibuat = date('Y-m-d');

if ($_POST['ubah']) {
	$query = mysqli_query($link, "UPDATE tb_anggota SET(user_id, npm, nama, tempat_lahir, tgl_lahir, jk, prodi, tgl_dibuat) VALUES('$user_id','$npm','$nama','$tmp_lahir','$tgl_lahir','$jk', '$prodi', '$tgl_dibuat')");

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