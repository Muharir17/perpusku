<?php
	session_start();
	if(!isset($_SESSION['nama'])){
		echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
		echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
	}else{

    include '../db/koneksi.php';
    
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    $query = mysqli_query($link, "SELECT*FROM tb_user WHERE id='$id'");
		$data = mysqli_fetch_array($query);

    
?>
	<!-- ini untuk konten -->
	<div class="content-wrapper">

	<section class="content-header">
		<h1>
			Admin <small>Edit User</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-book"></i>Dashboard</a></li>
			<li class="active">Edit User</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
		
		<?php $status = isset($_GET['status']) ?  $_GET['status']  : ""; ?>
			
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Data User</h3>
				</div>

				<form action="?page=update_user" method="POST" enctype="multipart/form-data">
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
						<div class="col-md-10">
							<label> Username </label>
							<input type="text" class="form-control" placeholder="username" name="username" required  value="<?php echo $data['username'] ?>">
						</div>
					</div>


					<div class="box-body">
						<div class="col-md-10">
							<label> Password </label>
							<input type="password" class="form-control" placeholder="password" name="password" required value="">
						</div>
					</div>


					<div class="box-body">
						<div class="col-md-10">
							<label> Email</label>
							<input type="email" class="form-control" placeholder="email" name="email" required value="<?php echo $data['email'] ?>">
						</div>
					</div>

					<div class="box-body">
						<div class="col-md-10">
							<label> Foto </label><br>
							<img src="../assets/image/<?php echo $data['foto'] ?>" width="190" height="170"><br>
              <input type="file" name="foto">
						</div>
					</div>

					<div class="box-body">
						<div class="col-md-10">
							<label> Level </label>
							<select name="level" class="form-control">
								<option value="">Pilih Level</option>
								<option value=1 <?php if($data['level'] == 1){echo "selected"; } ?>>Admin</option>
								<option value=2 <?php if ($data['level'] == 2){echo "selected"; }?>>Pengguna</option>
							</select>
						</div>
					</div>

					<div class="box-body">
						<div class="box-footer">
							<input type="submit" class="btn btn-primary" value="Update" name="update">
							<a href="javascript:history.back()" class="btn btn-danger">Kembali</a>
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