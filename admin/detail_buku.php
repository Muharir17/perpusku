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
			Admin <small>Detail Buku</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-book"></i>Dashboard</a></li>
			<li class="active">Detail Buku</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Detail Buku</h3>
					</div>


					<table class="table table-bordered">
						<?php
							$id = isset($_GET['id']) ? $_GET['id'] : "";
							$query = mysqli_query($link, "SELECT*FROM tb_buku WHERE id='$id'");
							$data = mysqli_fetch_array($query);
						?>

						<tbody>
							<tr>
								<th width="30%">ID</th>
								<td>: <?php echo $data['judul']; ?></td>
							</tr>
							<tr>
								<th width="30%">Pengarang</th>
								<td>: <?php echo $data['pengarang']; ?></td>
							</tr>
							<tr>
								<th width="30%">Penerbit</th>
								<td>: <?php echo $data['penerbit']; ?></td>
							</tr>
							<tr>
								<th width="30%">ISBN</th>
								<td>: <?php echo $data['isbn']; ?></td>
							</tr>
							<tr>
								<th width="30%">Cover</th>
								<td> 
									<?php
										$cek =  $data['cover'];
										if (isset($data['cover'])) {
											 echo ": <img src='../assets/image/cover/$cek', alt='' width='200' height='250'>";
										} else {
											echo ": tidak ada data";
										}
									?>
										
								</td>
							</tr>
							<tr>
								<th width="30%">Tahun Terbit</th>
								<td>: <?php echo $data['thn_terbit']?>
								</td>
							</tr>
							<tr>
								<th width="30%">Jumlah Buku</th>
								<td>: <?php echo $data['jumlah_buku']?>
								</td>
							</tr>
							<tr>
								<th width="30%">Lokasi Buku</th>
								<td>: <?php echo $data['lokasi']?>
								</td>
							</tr>
							<tr>
								<th width="30%">Tanggal Input</th>
								<td>: <?php echo date('d-m-Y', strtotime($data['tgl_input'])); ?></td>
							</tr>
							<tr>
								<?php $id = $data['id']; ?>
								<td></td>
								<td colspan="2">
									<a href='?page=edit_buku&id=<?php echo $id; ?>' class="btn btn-info">Edit Buku</a> &nbsp;
									<a href='?page=list_buku' class="btn btn-warning">Daftar Buku</a>
								</td>
								
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