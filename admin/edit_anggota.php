<?php
	session_start();
	if(!isset($_SESSION['nama'])){
		echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
		echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
	}else{

    include '../db/koneksi.php';
    
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    $query = mysqli_query($link, "SELECT*FROM tb_anggota WHERE id='$id'");
		$data = mysqli_fetch_array($query);

    
?>
	<!-- ini untuk konten -->
	<div class="content-wrapper">

	<section class="content-header">
		<h1>
			Admin <small>Edit Anggota</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-book"></i>Dashboard</a></li>
			<li class="active">Edit Anggota</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
		
		<?php $status = isset($_GET['status']) ?  $_GET['status']  : ""; ?>
			
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Data Anggota</h3>
				</div>

				<form data-toggle="validator" action="?page=update_anggota" method="POST">
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
							<label> NPM </label>
							<input type="text" class="form-control" data-minlength ="8" placeholder="npm" name="npm" data-error="Tidak Boleh Kurang dari 8" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>

				<div class="form-group">
						<div class="col-md-10">
							<label> Nama </label>
							<input type="text" class="form-control" placeholder="Nama Anda" name="nama" data-error="wajib di isi" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>

			  <div class="form-group">
						<div class="col-md-10">
							<label> Tempat  Lahir </label>
							<input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" data-error="wajib di isi" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>


					<div class="form-group">
						<div class="col-md-10">
							<label> Tanggal Lahir </label>
							<input type="date" class="form-control" placeholder="Tanggal Lahir" name="tgl_lahir" data-error="wajib di isi" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-10">
							<label> Jenis Kelamin </label>
							<select name="jk" class="form-control">
								<option>-----Pilih Gender---------</option>
								<option value="L">Laki-Laki</option>
								<option value="P">Perempuan</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-10">
							<label> Prodi </label>
							<select name="prodi" class="form-control">
								<option>-----Pilih Prodi---------</option>
								<option value="Teknik Informatika">Teknik Informatika</option>
								<option value="Sistem Informasi">Sistem Informasi</option>
								<option value="Sistem Informasi">Sistem Informasi</option>
								<option value="Kesehatan Masyarakat">Kesehatan Masyarakat</option>
								<option value="Kimia">Kimia</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-10">
							<label> User Id </label>
							<select name="user_id" required name="level" class="form-control">
								<option>-----Pilih User Login---------</option>
								<?php
										while ($data= mysqli_fetch_array($query)) {
											echo "<option value=$data[id]> $data[username]</option>";
										}
									?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-10">
						<div class="box-footer">
							<input type="submit" class="btn btn-primary" value="Ubah" name="ubah">
							<a href="?page=list_anggota" class="btn btn-danger">Kembali</a>
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