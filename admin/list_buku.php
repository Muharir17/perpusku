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
						<h3 class="box-title">Daftar Anggota</h3>
					</div>

					<a href="?page=tambah_anggota" class="btn btn-primary">Tambah Anggota</a>

					<table class="table table-bordered">
					<?php
						$halaman = 5;
						$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
						$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
						$result = mysqli_query($link, "SELECT*FROM tb_anggota");

						$total = mysqli_num_rows($result);
						$pages = ceil($total/$halaman);
						$query = mysqli_query($link, "SELECT*FROM tb_anggota LIMIT $mulai, $halaman") or die(mysqli_error);

					?>
					<thead>
						<tr>
							<th>ID</th>
							<th>NPM</th>
							<th>Nama</th>
							<th>TTL</th>
							<th>Jenis Kelamin</th>
							<th>Prodi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$i = 1;
							while ($anggota=mysqli_fetch_array($query)) {
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><a href="?page=detail_anggota&id=<?php echo $anggota['id']; ?>"><?php echo $anggota['npm']; ?></a></td>
									<td><?php echo $anggota['nama']; ?></td>
									<td><?php echo $anggota['tempat_lahir'].", ". date('d F Y', strtotime($anggota['tgl_lahir'])); ?></td>
									<td>
										<?php
											if ($anggota['jk'] == 'L') {
												echo "Laki-Laki";
											}elseif ($anggota['jk'] == 'P') {
												echo "Perempuan";
											}
										?>			
									</td>

									<td><?php echo $anggota['prodi']; ?></td>

									<td>
										<a href="?page=edit_anggota&id=<?php echo $anggota[0]; ?>"><i class="fa fa-edit"></i></a> || <a href="?page=hapus_anggota&id=<?php echo $anggota[0]; ?>" onclick="return confirm('Anda yakin ingin menghapus Anggota <?php echo $anggota['nama']; ?> ?')"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
						<?php
						$i++;
							}
						?>
					</tbody>
						
					</table>
					<div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
              <li><a href="#">Halaman</a></li>
              <?php for($i=1; $i<=$pages; $i++) { ?>
                <li><a href="?page=list_anggota&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
              <?php } ?>
              </ul>
            </div>
            </div>


				</div>
			</div>
		</div>
	</section>

		
	</div>
<?php
}
?>