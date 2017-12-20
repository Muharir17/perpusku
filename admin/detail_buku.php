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
							$query = mysqli_query($link, "SELECT*FROM tb_buku WHERE id='$id'");
							$data = mysqli_fetch_array($query);
						?>

						<tbody>
							<tr>
								<th width="30%">ID</th>
								<td>: <?php echo $data[0]; ?></td>
							</tr>
							<tr>
								<th width="30%">Username</th>
								<td>: <?php echo $data[1]; ?></td>
							</tr>
							<tr>
								<th width="30%">Password</th>
								<td>: <?php echo $data['password']; ?></td>
							</tr>
							<tr>
								<th width="30%">Email</th>
								<td>: <?php echo $data['email']; ?></td>
							</tr>
							<tr>
								<th width="30%">Foto</th>
								<td> 
									<?php
										$cek =  $data['foto'];
										if (isset($data['foto'])) {
											 echo ": <img src='../assets/image/$cek', alt='' width='200' height='250'>";
										} else {
											echo ": tidak ada data";
										}
									?>
										
								</td>
							</tr>
							<tr>
								<th width="30%">Level</th>
								<td>: <?php 
												if ($data['level'] == 1) {
													echo "Admin";
												}elseif ($data['level'] == 2) {
													echo "Pengguna";
												}else{
													echo "";
												}
										 ?>
													
								</td>
							</tr>
							<tr>
								<td></td>
								<?php $id = $data['id']; ?>
								<td colspan="2"><a href='?page=edit_user&id=<?php echo $id; ?>' class="btn btn-info">Edit User</a></td>
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