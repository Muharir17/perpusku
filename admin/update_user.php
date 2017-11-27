<?php
include '../db/koneksi.php';

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$foto = $_FILES['foto']['name'];
$level = $_POST['level'];
$pass = md5($password);

$query_gmbr = mysqli_query($link, "SELECT foto FROM tb_user WHERE id='$id'");
$gambarlama = mysqli_fetch_array($query_gmbr); // query untuk mengecek gambar lawas

if ($_POST['update']) {
    if($foto)
    {
        $extensi_diperbolehkan = array('png','jpg','jpeg');
        $nama = $_FILES['foto']['name'];
        $x = explode('.', $nama);
        $extensi = strtolower(end($x));
        $ukuran = $_FILES['foto']['size'];
        $file_tmp = $_FILES['foto']['tmp_name'];

        if(in_array($extensi, $extensi_diperbolehkan) === true){
            if ($ukuran < 5000000000) {
                move_uploaded_file($file_tmp, '../assets/image/'.$nama);
                $target = $gambarlama['foto'];
                if(file_exists('../assets/image/'.$target)){ //mengecek apakah file terdahulu ada ?
                    unlink('../assets/image/'.$target);   // jika ada maka hapus filenya gantikan dengan yang baru
                }
                $query = mysqli_query($link,
                    "UPDATE tb_user SET username = '$username', password = '$pass',
                    email = '$email', foto = '$nama', level = '$level' WHERE id = '$id'");

                if (!$query) {
                    $isi = "Gagal Menambahkan Data dengan kesalahan =  ".mysqli_errno($link). " - ".mysqli_error($link);
                    echo "<meta http-equiv='refresh' content='0; url=home.php?page=tambah_user.php?status=$isi'>";
                }else{
                    $query = mysqli_query($link, "SELECT id FROM tb_user WHERE username='$username'");
                    $data = mysqli_fetch_array($query);
                    $id = $data[0];
                    echo "<script> alert('Data Berhasil Diupdate') </script>";
                    echo "<meta http-equiv='refresh' content='0; url=home.php?page=detail_user&id=$id'>";
                }
            }else{
                $isi = "File terlalu besar =  ".mysqli_errno($link). " - ".mysqli_error($link);
                echo "<meta http-equiv='refresh' content='0; url=home.php?page=edit_user&status=$isi'>";
            }
        }else{
    }

		$isi = "Extensi File Tidak Diperbolehkan =  ".mysqli_errno($link). " - ".mysqli_error($link);
		die(mysqli_error($link));
			echo "<meta http-equiv='refresh' content='0; url=home.php?page=tambah_user&status=$isi'>";
	}else{
        $query = mysqli_query($link,
        "UPDATE tb_user SET username = '$username', password = '$pass',
        email = '$email', level = '$level' WHERE id = '$id'");
        if (!$query) {
            $isi = "Gagal Menambahkan Data dengan kesalahan =  ".mysqli_errno($link). " - ".mysqli_error($link);
            echo "<meta http-equiv='refresh' content='0; url=home.php?page=tambah_user.php?status=$isi'>";
        }else{
            echo "<script> alert('Data Berhasil DiUpdate') </script>";
            echo "<meta http-equiv='refresh' content='0; url=home.php?page=detail_user&id=$id'>";
        }
    }
}


?>