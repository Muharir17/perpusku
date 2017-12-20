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
		$idUser = $data['user_id'];
		$queryUser = mysqli_query($link, "SELECT*FROM tb_user WHERE id='$idUser'");

    
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
					
					<input type="text" name="id"  value="<?php echo $data['id'] ?>" hidden>
					<div class="form-group">
						<div class="col-md-10">
							<label> NPM </label>
							<input type="text" class="form-control" data-minlength ="8" value="<?php echo $data['npm'] ?>" placeholder="npm" name="npm" data-error="Tidak Boleh Kurang dari 8" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>

				<div class="form-group">
						<div class="col-md-10">
							<label> Nama </label>
							<input type="text" class="form-control" value="<?php echo $data['nama'] ?>" placeholder="Nama Anda" name="nama" data-error="wajib di isi" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>

			  <div class="form-group">
						<div class="col-md-10">
							<label> Tempat  Lahir </label>
							<input type="text" class="form-control" placeholder="Tempat Lahir" value="<?php echo $data['tempat_lahir'] ?>" name="tempat_lahir" data-error="wajib di isi" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>


					<div class="form-group">
						<div class="col-md-10">
							<label> Tanggal Lahir </label>
							<input type="date" value="<?php echo $data['tgl_lahir'] ?>" class="form-control" placeholder="Tanggal Lahir" name="tgl_lahir" data-error="wajib di isi" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-10">
							<label> Jenis Kelamin </label>
							<select name="jk" class="form-control">
								<option>-----Pilih Gender---------</option>
								<option value="L" <?php if($data['jk'] == 'L'){echo "selected"; } ?>>Laki-Laki</option>
								<option value="P" <?php if ($data['jk'] == 'P'){echo "selected"; }?>>Perempuan</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-10">
							<label> Prodi </label>
							<select name="prodi" class="form-control">
								<option>-----Pilih Prodi---------</option>
								<option value="Teknik Informatika" <?php if($data['prodi'] == 'Teknik Informatika'){echo "selected"; } ?>>Teknik Informatika</option>
								<option value="Sistem Informasi" <?php if($data['prodi'] == 'Sistem Informasi'){echo "selected"; } ?>>Sistem Informasi</option>
								<option value="Managemen Informasi" <?php if($data['prodi'] == 'Managemen Informasi'){echo "selected"; } ?>>Managemen Informasi</option>
								<option value="Kesehatan Masyarakat" <?php if($data['prodi'] == 'Kesehatan Masyarakat'){echo "selected"; } ?>>Kesehatan Masyarakat</option>
								<option value="Kimia" <?php if($data['prodi'] == 'Kimia'){echo "selected"; } ?>>Kimia</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-10">
							<label> User Id </label>
							<select name="user_id" required class="form-control">
								<option>-----Pilih User Login---------</option>
								<?php
										while ($dataUser= mysqli_fetch_array($queryUser)) {
											echo "<option value=$dataUser[id] > $dataUser[username]</option>";
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