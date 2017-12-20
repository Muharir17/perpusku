<?php
	session_start();
	if(!isset($_SESSION['nama'])){
		echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
		echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
	}else{

		include '../db/koneksi.php';
    
?>
	<!-- ini untuk konten -->
	<div class="content-wrapper">

	<section class="content-header">
		<h1>
			Admin <small>Tambah Buku</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-book"></i>Dashboard</a></li>
			<li class="active">Tambah Buku</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
		
		<?php $status = isset($_GET['status']) ?  $_GET['status']  : ""; ?>
			
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Data Buku</h3>
				</div>

				<form data-toggle="validator" action="simpan_buku.php" method="POST" enctype="multipart/form-data">
					<div class="box-body">
					<?php
						if ($status){
					?>

					<div class="alert alert-danger alert-dismissible">
						<button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-close">Gagal!</i></h4>

						<?php echo $status; ?>
					</div>
					<?php
					}
					?>

					<div class="form-group">
						<div class="col-md-10">
							<label> Judul </label>
							<input type="text" class="form-control" data-minlength ="8" placeholder="Judul Buku" name="judul" data-error="Judul Tidak Boleh Kosong" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>

				<div class="form-group">
						<div class="col-md-10">
							<label> Pengarang </label>
							<input type="text" class="form-control" placeholder="Nama Pengarang" name="pengarang" data-error="wajib di isi" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>

			  <div class="form-group">
						<div class="col-md-10">
							<label> Penerbit </label>
							<input type="text" class="form-control" placeholder="Penerbit" name="penerbit" data-error="wajib di isi" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>


					<div class="form-group">
						<div class="col-md-10">
							<label> Tahun Terbit </label>
							<select required name="tahun" class="form-control">
								<option selected="selected">Tahun</option>
								<?php
									for($i=date('Y'); $i>=date('Y')-32; $i-=1){
										echo "<option value='$i'>$i</option>";
									}
								?>
							</select>
							<div class="help-block with-errors"></div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-10">
							<label> Cover </label>
							<input type="file" class="form-control" placeholder="Cover Buku" name="cover" data-error="wajib di isi" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-10">
							<label> ISBN </label>
							<input type="text" class="form-control" name="isbn" required>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-10">
							<label> Jumlah Buku </label>
							<input type="text" class="form-control" name="jumlah" required>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-10">
							<label> Lokasi </label>
							<select required name="lokasi" class="form-control">
								<option>-----Pilih Lokasi---------</option>
								<option value="rak1">Rak 1</option>
								<option value="rak2">Rak 2</option>
								<option value="rak3">Rak 1</option>
							</select>
						</div>
					</div>


					<div class="form-group">
						<div class="col-md-10">
						<div class="box-footer">
							<input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
						</div>
						</div>
					</div>						
				</form>

			</div>
		</div>	
		</div>
	</section>
</div>

<?php
}
?>