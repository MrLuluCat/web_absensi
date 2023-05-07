@extends('admin.templateAdmin')
<!-- START DATA -->
@section('konten')
<!-- End Sidebar -->
			<div class="row mt-2">
				<div class="col-md-6">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title">
								<center>
									<img src="{{ asset('assets/img/logo1.jpg') }}" width="100">
									<br>
									<b>LAB ICT UBL</b>
								</center>
							</div>
							<div class="card-category">
								<center>
									Jl. Ciledug raya - petukangan utara daerah khusus ibukota jakarta Kode Pos 12260
									<br>unit 7 lantai 4 Universitas Budi Luhur
								</center>
							</div>

						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
							<div class="card-header">
									<h4 class="card-title">Data</h4>
								</div>
						<div class="card-body">

							<div class="row">

								<div class="col-sm-6 col-md-6">
									<div class="card card-stats card-secondary card-round">
										<div class="card-body">
											<div class="row">
												<div class="col-5">
													<div class="icon-big text-center">
														<i class="flaticon-users"></i>
													</div>
												</div>
												<div class="col-7 col-stats" onclick="location.href='/*arahin ke halaman presensi asisten hari ini*/'">
													<div class="numbers">
														<p class="card-category">Total Kehadiran Calas</p>
														<h4 class="card-title">
															
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="card card-stats card-secondary card-round">
										<div class="card-body">
											<div class="row">
												<div class="col-5">
													<div class="icon-big text-center">
														<i class="flaticon-users"></i>
													</div>
												</div>
												<div class="col-1 col-stats" onclick="location.href='#'">
													<div class="numbers">
														<p class="card-category">Total Kehadiran Asisten</p>
														<h4 class="card-title">
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="card card-stats card-default card-round">
										<div class="card-body">
											<div class="row">
												<div class="col-5">
													<div class="icon-big text-center">
														<i class="fas fa-user-tie"></i>
													</div>
												</div>
												<div class="col-7 col-stats" onclick="location.href='dashboard.php?page=siswa#'">
													<div class="numbers">
														<p class="card-category">Total Calas</p>
														<h4 class="card-title">
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="card card-stats card-default card-round">
										<div class="card-body">
											<div class="row">
												<div class="col-5">
													<div class="icon-big text-center">
														<i class="fas fa-user-tie"></i>
													</div>
												</div>
												<div class="col-7 col-stats" onclick="location.href='dashboard.php?page=guru#'">
													<div class="numbers">
														<p class="card-category">Total Asisten</p>
														<h4 class="card-title">
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								



								<!-- end -->

							</div>


							<!-- modal ganti password -->
							<div class="modal fade bs-example-modal-sm" id="gantiPassword" tabindex="-1" role="dialog" aria-labelledby="gantiPass">
								<div class="modal-dialog modal-sm" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="gantiPass">Ganti Password</h4>
										</div>
										<form action="#" method="post">
											<div class="modal-body">
												<div class="form-group">
													<label class="control-label">Password Lama</label>
													<input name="pass" type="text" class="form-control" placeholder="Password Lama">
												</div>
												<div class="form-group">
													<label class="control-label">Password Baru</label>
													<input name="pass1" type="text" class="form-control" placeholder="Password Baru">
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button name="changePassword" type="submit" class="btn btn-primary">Ganti Password</button>
											</div>
										</form>



									</div>
								</div>
							</div>

							<!--end modal ganti password -->

							<!-- Modal pengaturan akun-->
							<div class="modal fade" id="pengaturanAkun" tabindex="-1" role="dialog" aria-labelledby="akunAtur">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h3 class="modal-title" id="akunAtur"><i class="fas fa-user-cog"></i> Pengaturan Akun</h3>
										</div>
										<form action="" method="post" enctype="multipart/form-data">
											<div class="modal-body">
												<div class="form-group">
													<label>Nama Lengkap</label>
													<input type="text" name="nama" class="form-control" value="<? //= $data['nama_lengkap'] 
																												?>">
													<input type="hidden" name="id" value="<? //= $data['id_admin'] 
																							?>">
												</div>
												<div class="form-group">
													<label>Email</label>
													<input type="text" name="username" class="form-control" value="<? //= $data['username'] 
																													?>">
												</div>
												<div class="form-group">
													<label>Foto Profile</label>
													<p>
														<img src="../assets/img/user/<? //= $data['foto'] 
																						?>" class="img-thumbnail" style="height: 50px;width: 50px;">
													</p>
													<input type="file" name="foto">
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button name="updateProfile" type="submit" class="btn btn-primary">Simpan</button>
											</div>
										</form>
										<? //php
										// if (isset($_POST['updateProfile'])) {

										// 	$gambar = @$_FILES['foto']['name'];
										// 	if (!empty($gambar)) {
										// 		move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/img/user/$gambar");
										// 		$ganti = mysqli_query($con, "UPDATE tb_admin SET foto='$gambar' WHERE id_admin='$_POST[id]' ");
										// 	}

										// 	$sqlEdit = mysqli_query($con, "UPDATE tb_admin SET nama_lengkap='$_POST[nama]',username='$_POST[username]' WHERE id_admin='$_POST[id]' ") or die(mysqli_error($konek));

										// 	if ($sqlEdit) {
										// 		echo "<script>
										// alert('Sukses ! Data berhasil diperbarui');
										// window.location='dashboard.php';
										// </script>";
										// 	}
										// }
										?>
									</div>
								</div>
							</div>
@endsection