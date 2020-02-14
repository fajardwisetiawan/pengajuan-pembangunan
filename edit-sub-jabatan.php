<?php
include("header.php");
$qy = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM subjabatan WHERE id_subjabatan = '$_POST[id_subjabatan]'"));
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
							<h3 class="panel-title"> <i class="icon-users"></i> Sub-jabatan</h3>
							<p class="panel-subtitle">Halaman untuk mengelola data sub-jabatan</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<form class="" enctype="multipart/form-data" action="update-sub-jabatan.php" method="post">
										<div class="modal-body">
												<div class="form-group">
													<label class="nk-label">Jabatan</label>
													<select class="form-control" name="nama_jabatan">
													<?php $query1 = mysqli_query($connect, "SELECT * FROM subjabatan where id_subjabatan = '$_POST[id_subjabatan]'");
													$nama = mysqli_fetch_object($query1);
													?>
														<option value="<?= $nama->nama_jabatan; ?>" hidden><?=$nama->nama_jabatan; ?></option>
														
														<?php $query = mysqli_query($connect, "SELECT * FROM jabatan");
														while($m = mysqli_fetch_array($query)){ ?>
														<option value="<?= $m['nama_jabatan'] ?>"><?= $m['nama_jabatan'] ?></option>
														<?php } ?>
													</select>
												</div>
												<div class="form-group">
													<label class="nk-label">Sub-jabatan</label>
													<input type="hidden" class="form-control" name="id_subjabatan" value="<?= $qy['id_subjabatan'] ?>" required>
													<input type="text" class="form-control input-md" name="nama_subjabatan" value="<?= $qy['nama_subjabatan'] ?>" placeholder="Nama" required>
												</div>
										</div>
										<div class="modal-footer">
												<button type="submit" class="btn btn-default">Save changes</button>
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
