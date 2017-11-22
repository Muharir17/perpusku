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
			Admin <small>Tambah User</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-book"></i>Dashboard</a></li>
			<li class="active">Tambah User</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
		
		<?php $status = isset($_GET['status']) ?  $_GET['status']  : ""; ?>
			
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Data User</h3>
				</div>

				<form action="simpan_user.php" method="POST" enctype="multipart/form-data">
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
						<div class="col-md-10">
							<label> Username </label>
							<input type="text" class="form-control" placeholder="username" name="username" required>
						</div>
					</div>


					<div class="box-body">
						<div class="col-md-10">
							<label> Password </label>
							<input type="password" class="form-control" placeholder="password" name="password" required>
						</div>
					</div>


					<div class="box-body">
						<div class="col-md-10">
							<label> Email</label>
							<input type="email" class="form-control" placeholder="email" name="email" required>
						</div>
					</div>


					<div class="box-body">
						<div class="col-md-10">
							<label> Foto </label>
							<input type="file" class="form-control" name="foto">
						</div>
					</div>

					<div class="box-body">
						<div class="col-md-10">
							<label> Level </label>
							<select name="level" class="form-control">
								<option value=1>Admin</option>
								<option value=2>User</option>
							</select>
						</div>
					</div>

					<div class="box-body">
						<div class="box-footer">
							<input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
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