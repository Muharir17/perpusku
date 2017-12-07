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
			Admin <small>Detail User</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-book"></i>Dashboard</a></li>
			<li class="active">Detail User</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Detail User</h3>
					</div>


					<table class="table table-bordered">
						<?php
							$id = isset($_GET['id']) ? $_GET['id'] : "";
							$query = mysqli_query($link, "SELECT*FROM tb_anggota WHERE id='$id'");
							$data = mysqli_fetch_array($query);
						?>

						<tbody>
							<tr>
								<th width="30%">ID Login</th>
								<td>: <?php echo $data['user_id']; ?></td>
							</tr>
							<tr>
								<th width="30%">Nama</th>
								<td>: <?php echo $data['nama']; ?></td>
							</tr>
							<tr>
								<th width="30%">NPM</th>
								<td>: <?php echo $data['npm']; ?></td>
							</tr>
							<tr>
								<th width="30%">Tempat, Tanggal Lahir</th>
								<td>: <?php
											$tgl_lahir =  $data['tgl_lahir'];
											echo $data['tempat_lahir'].', '.date('d F Y', strtotime($tgl_lahir)); ?>
								</td>
							</tr>
							<tr>
								<th width="30%">Jenis Kelamin</th>
								<td>: <?php 
												if ($data['jk'] == 'L') {
													echo "Laki-Laki";
												}elseif ($data['jk'] == 'P') {
													echo "Perempuan";
												}else{
													echo "";
												}
										 ?>				
								</td>
							</tr>
							<tr>
								<th width="30%">Prodi</th>
								<td>: <?php echo $data['prodi']; ?></td>
							</tr>
							<tr>
								<th width="30%">Tanggal Dibuat</th>
								<td>: <?php echo date('d F Y', strtotime($data['tgl_dibuat'])); ?></td>
							</tr>
							<tr>
								<th width="30%">Tanggal Diubah</th>
								<td>: <?php 
												$tgl_diubah = $data['tgl_diubah'];
												if ($tgl_diubah) {
													echo date('d F Y', strtotime($tgl_diubah));
												}else{
													echo "Belum Pernah Diubah"; 
												}
											?>
												
								</td>
							</tr>
							<tr>
								<td></td>
								<?php $id = $data['id']; ?>
								<td colspan="2"><a href='?page=edit_anggota&id=<?php echo $id; ?>' class="btn btn-info">Edit User</a></td>
							</tr>
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