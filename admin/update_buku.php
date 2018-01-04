<?php
include '../db/koneksi.php';

$id     = $_POST['id'];
$judul  = $_POST['judul'];
$pengarang  = $_POST['pengarang'];
$penerbit   = $_POST['penerbit'];
$tahun      = $_POST['tahun'];
$isbn       = $_POST['isbn'];
$jumlah     = $_POST['jumlah'];
$lokasi     = $_POST['lokasi'];
$cover      = $_POST['cover'];

$query_gmbr = mysqli_query($link, "SELECT cover FROM tb_buku WHERE id='$id'");
$gambarlama = mysqli_fetch_array($query_gmbr); // query untuk mengecek gambar lawas

if ($_POST['update']) {
    if($cover)
    {
        $extensi_diperbolehkan = array('png','jpg','jpeg');
        $nama = $_FILES['cover']['name'];
        $x = explode('.', $nama);
        $extensi = strtolower(end($x));
        $ukuran = $_FILES['cover']['size'];
        $file_tmp = $_FILES['cover']['tmp_name'];

        if(in_array($extensi, $extensi_diperbolehkan) === true){
            $query = mysqli_query($link, "SELECT id FROM tb_buku WHERE isbn='$isbn'");
            $data = mysqli_fetch_array($query);
            $id = $data[0];


            if ($ukuran < 5000000000) {
                move_uploaded_file($file_tmp, '../assets/image/cover/'.$nama);
                $target = $gambarlama['cover'];
                if(file_exists('../assets/image/cover/'.$target)){ //mengecek apakah file terdahulu ada ?
                    unlink('../assets/image/cover/'.$target);   // jika ada maka hapus filenya gantikan dengan yang baru
                }
                $query = mysqli_query($link,
                    "UPDATE tb_buku SET judul = '$judul', pengarang = '$pengarang',
                    penerbit = '$penerbit', thn_terbit = '$tahun', isbn = '$isbn', jumlah_buku = '$jumlah', lokasi = '$lokasi', cover = '$nama' WHERE id = '$id'");

                if (!$query) {
                    $isi = "Gagal Menambahkan Data dengan kesalahan =  ".mysqli_errno($link). " - ".mysqli_error($link);
                    echo "<meta http-equiv='refresh' content='0; url=home.php?page=edit_buku.php?status=$isi&id=$id''>";
                }else{
                    echo "<script> alert('Data Berhasil Diupdate') </script>";
                    echo "<meta http-equiv='refresh' content='0; url=home.php?page=detail_buku&id=$id'>";
                }
            }else{
                $isi = "File terlalu besar =  ".mysqli_errno($link). " - ".mysqli_error($link);
                echo "<meta http-equiv='refresh' content='0; url=home.php?page=edit_buku&status=$isi&id=$id'>";
            }
        }else{
    }

		$isi = "Extensi File Tidak Diperbolehkan =  ".mysqli_errno($link). " - ".mysqli_error($link);
		die(mysqli_error($link));
			echo "<meta http-equiv='refresh' content='0; url=home.php?page=edit_buku&status=$isi&id=$id'>";
	}else{
        $query = mysqli_query($link,
        "UPDATE tb_buku SET judul = '$judul', pengarang = '$pengarang',
                    penerbit = '$penerbit', thn_terbit = '$tahun', isbn = '$isbn', jumlah_buku = '$jumlah', lokasi = '$lokasi' WHERE id = '$id'");
        if (!$query) {
            $isi = "Gagal Mengedit Data dengan kesalahan =  ".mysqli_errno($link). " - ".mysqli_error($link);
            echo "<meta http-equiv='refresh' content='0; url=home.php?page=edit_buku.php?status=$isi&id=$id'>";
        }else{
            echo "<script> alert('Data Berhasil Diupdate') </script>";
            echo "<meta http-equiv='refresh' content='0; url=home.php?page=detail_buku&id=$id'>";
        }
    }
}


?>