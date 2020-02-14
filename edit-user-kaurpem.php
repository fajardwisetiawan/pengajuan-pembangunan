<?php
include("header-kaurpem.php");
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
										<h3 class="panel-title"> <i class="lnr lnr-cog"></i> Kelola Akun</h3>
										<p class="panel-subtitle">Halaman untuk mengelola akun KAUR Pembangunan</p>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-12">
												<form class="" enctype="multipart/form-data" action="update-user-kaurpem.php" method="post">
													<div class="modal-body">
															<div class="form-group">
																<label class="nk-label">Nama</label>
																<input type="hidden" class="form-control" name="id_perangkat_desa" value="<?= $qy['id_perangkat_desa'] ?>" required>
																<input type="text" class="form-control input-md" name="nama" value="<?= $qy['nama'] ?>" placeholder="Nama" required>
															</div>
															<div class="form-group">
																<label class="nk-label">Username</label>
																<input type="text" class="form-control input-md" name="username" value="<?= $qy['username'] ?>" placeholder="Username" readonly>
															</div>
															<div class="form-group">
																<?php if($qy['foto'] == ''){ ?>
																	<img src="images/avatar0.jpg" class="img-circle" width="100px" alt="image" />
																<?php }else{ ?>
																<div class="hd-message-img">
																	<img src="images/<?= $qy['foto']; ?>" class="img-circle" width="100px" alt="image" />
																</div>
																<?php } ?>
																<br>
																<label class="fancy-checkbox">
																	<input type="checkbox"  id="toggle" name="ubah_foto">
																	<span>Ubah Foto</span>
																</label>
															</div>
															<div class="nk-int-st" style="margin-top:-20px">
																	<input type="file" accept="image/*" name="foto" class="form-control" id="foto" required disabled>
															</div>
													</div>
													<div class="modal-footer">
															<button type="submit" class="btn btn-default"><i class="ft-save"></i> Simpan</button>
															<!-- <button type="button" class="btn btn-default" onclick="window.location.href='pengajuan-kaurper'"><i class="icon-close"></i> Batal</button> -->
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
<?php include('footer.php'); ?>
