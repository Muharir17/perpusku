<?php
include '../db/koneksi.php';

$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun'];
$isbn = $_POST['isbn'];
$jumlah = $_POST['jumlah'];
$lokasi = $_POST['lokasi'];
$tgl_input = date('Y-m-d');
$cover = $_POST['cover'];

if ($_POST['simpan']) {
	$extensi_diperbolehkan = array('png','jpg','jpeg');
	$nama = $_FILES['cover']['name'];
	$x = explode('.', $nama);
	$extensi = strtolower(end($x));
	$ukuran = $_FILES['cover']['size'];
	$file_tmp = $_FILES['cover']['tmp_name'];

	if(in_array($extensi, $extensi_diperbolehkan) === true){
		if ($ukuran < 5000000000) {
			move_uploaded_file($file_tmp, '../assets/image/cover/'.$nama);
			$query = mysqli_query($link, "INSERT INTO tb_buku(judul,pengarang,penerbit,thn_terbit,isbn,jumlah_buku,lokasi,tgl_input,cover)VALUES('$judul','$pengarang','$penerbit','$tahun','$isbn','$jumlah', '$lokasi', '$tgl_input', '$nama')");

			if (!$query) {

				$isi = "Gagal Menambahkan Data dengan kesalahan =  ".mysqli_errno($link). " - ".mysqli_error($link);
				echo "<meta http-equiv='refresh' content='0; url=home.php?page=tambah_buku?status=$isi'>";
			}else{
				$query = mysqli_query($link, "SELECT id FROM tb_buku WHERE isbn='$isbn'");
				$data = mysqli_fetch_array($query);
				$id = $data[0];
				echo "<script> alert('Data Berhasil Ditambahkan') </script>";
				echo "<meta http-equiv='refresh' content='0; url=home.php?page=detail_buku&id=$id'>";
			}
		}else{
			$isi = "File terlalu besar =  ".mysqli_errno($link). " - ".mysqli_error($link);
				echo "<meta http-equiv='refresh' content='0; url=home.php?page=tambah_buku&status=$isi'>";
		}
	}else{ 
		$isi = "Extensi File Tidak Diperbolehkan =  ".mysqli_errno($link). " - ".mysqli_error($link);
		die(mysqli_error($link));
			echo "<meta http-equiv='refresh' content='0; url=home.php?page=tambah_buku&status=$isi'>";
	}
}


?>