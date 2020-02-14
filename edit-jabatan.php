<?php
include("header.php");
$qy = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jabatan WHERE id_jabatan = '$_POST[id_jabatan]'"));
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
							<h3 class="panel-title"> <i class="icon-users"></i> Jabatan</h3>
							<p class="panel-subtitle">Halaman untuk mengelola data jabatan</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<form class="" enctype="multipart/form-data" action="update-jabatan.php" method="post">
										<div class="modal-body">
												<div class="form-group">
													<label class="nk-label">Nama Jabatan</label>
													<input type="hidden" class="form-control" name="id_jabatan" value="<?= $qy['id_jabatan'] ?>" required>
													<input type="text" class="form-control input-md" name="nama_jabatan" value="<?= $qy['nama_jabatan'] ?>" placeholder="Nama" required>
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
