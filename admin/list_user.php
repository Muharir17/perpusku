<?php
	session_start();
	if(!isset($_SESSION['nama'])){
		echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
		echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
	}else{
?>
	<!-- ini untuk konten -->
	<div class="content-wrapper">

	<section class="content-header">
		<h1>
			Admin <small>Daftar User</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-book"></i>Dashboard</a></li>
			<li class="active">Daftar User</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Daftar User</h3>
					</div>

					<a href="?page=tambah_user" class="btn btn-primary">Tambah User</a>

					<table class="table table-bordered">
					<?php
						$halaman = 10;
						$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
						$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
						$result = mysqli_query($link, "SELECT*FROM tb_user");

						$total = mysqli_num_rows($result);
						$pages = ceil($total/$halaman);
						$query = mysqli_query($link, "SELECT*FROM tb_user LIMIT $mulai, $halaman") or die(mysqli_error);

					?>
					<thead>
						<tr>
							<th>ID</th>
							<th>Username</th>
							<th>Password</th>
							<th>Email</th>
							<th>Foto</th>
							<th>Level</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							while ($user=mysqli_fetch_array($query)) {
								?>
								<tr>
									<td><?php echo $user[0]; ?></td>
									<td><a href="?page=detail_user&id=<?php echo $user[0]; ?>"><?php echo $user[1]; ?></a></td>
									<td><?php echo $user[2]; ?></td>
									<td><?php echo $user[3]; ?></td>
									<td><?php echo $user[4]; ?></td>
									<td>
										<?php
											if ($user[5] == 1) {
												echo "Admin";
											}elseif ($user[5] == 2) {
												echo "Pengguna";
											}
										?>
											
										</td>
									<td>
										<a href="#"><i class="fa fa-edit"></i></a> || <a href="?page=hapus_user&id=<?php echo $user[0]; ?>" onclick="return confirm('Anda yakin ingin menghapus Anggota <?php echo $user[1]; ?> ?')"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
						<?php
							}
						?>
					</tbody>
						
					</table>



				</div>
			</div>
		</div>
	</section>

		
	</div>
<?php
}
?>