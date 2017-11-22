<?php
	include 'koneksi.php';
	if (isset($_POST['log'])) {
		$user = mysqli_real_escape_string($link, $_POST['username']);
		$pass = mysqli_real_escape_string($link, $_POST['password']);
		$pass = md5($pass);
		
		$query = mysqli_query($link, "SELECT * FROM tb_user WHERE username='$user' AND password='$pass'");
		$data = mysqli_fetch_array($query);
		$username = $data['username'];
		$password = $data['password'];
		$level    = $data['level'];

		if ($user==$username && $pass ==$password) {
			session_start();
			$_SESSION['nama']	=$username;
			$_SESSION['level'] 	=$level;
			if ($level == 1) {
				echo "<script>alert('Anda berhasil login. Sebagai : admin');</script>";
				echo "<meta http-equiv='refresh' content='0; url=../admin/home.php'>";
			}else{
				echo "<script>alert('Anda berhasil Log In. Sebagai : Anggota');</script>";
				echo "<meta http-equiv='refresh' content='0; url=../guest/home.php'>";
			}
		}else{
			echo "<script>alert('Username dan Password Tidak Ditemukan');</script>";
			echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
		}
	}
?>
