<?php
include 'header-sekdes.php';
$qy = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM perangkat_desa WHERE id_perangkat_desa = '$_SESSION[id_perangkat_desa]'"));
?>
		<div class="app-content content">
		<div class="content-wrapper">
			<div class="content-header row"></div>
					<div class="content-body"><!-- Stats -->
							<section id="base-style">
									<div class="row">
										<div class="col-12">
												<div class="card">
														<div class="card-header">
							<h3 class="panel-title"> <i class="icon-users"></i> Ubah Password Sekertaris Desa</h3>
							<p class="panel-subtitle">Halaman untuk mengubah password Sekertaris Desa</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<form class="" enctype="multipart/form-data" action="update-password-sekdes.php" method="post">
										<div class="modal-body">
												<div class="form-group">
													<label class="nk-label">Username</label>
													<input type="text" class="form-control input-md" name="username" value="<?= $qy_user['username']; ?>" placeholder="Masukkan Username" required readonly>
												</div>
												<div class="form-group">
													<label class="nk-label">Password Lama</label>
													<input type="password" class="form-control input-md" name="password_lama" placeholder="Masukkan Password Lama" required>
												</div>
												<div class="form-group">
													<label class="nk-label">Password Baru</label>
													<input type="password" class="form-control input-md" id="password1" name="password_baru" placeholder="Masukkan Password Baru" required>
												</div>
												<div class="form-group">
													<label class="nk-label">Konfirmasi Password</label>
													<input type="password" class="form-control input-md" id="password2" name="konfirmasi_password" placeholder="Masukkan Kembali Password Baru" required>
												</div>
										</div>
										<div class="modal-footer">
												<button type="submit" class="btn btn-default">Save changes</button>
												<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		</div>
						  </div>
					  </div>
					</div>
				</section>
			</div>
		</div>
	  </div>
		<!-- END MAIN -->

		<?php include('footer.php'); ?>
