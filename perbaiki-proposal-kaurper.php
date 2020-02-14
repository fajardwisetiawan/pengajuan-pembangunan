<?php
include("header-kaurper.php");
$qy = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM proposal_pengajuan WHERE id_proposal = '$_POST[id]'"));
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
										<h3 class="panel-title"> <i class="icon-users"></i> Perbaiki Pengajuan</h3>
										<p class="panel-subtitle">Halaman untuk memperbaiki pengajuan yang kurang sesuai atau salah</p>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-12">
												<form class="" enctype="multipart/form-data" action="simpan-perbaikan-kaurper.php" method="post">
													<div class="modal-body">
															<div class="form-group">
																<label class="nk-label">Tanggal Proposal</label>
																<input type="hidden" class="form-control" name="id_proposal" value="<?= $qy['id_proposal'] ?>" required>
																<input type="date" class="form-control input-md" name="tanggal_proposal" value="<?= date('Y-m-d') ?>" required readonly>
															</div>
															<div class="form-group">
																<label class="nk-label">Judul Kegiatan</label>
																<input type="text" class="form-control input-md" name="judul_kegiatan" value="<?= $qy['judul_kegiatan'] ?>" placeholder="Judul Kegiatan" required>
															</div>
															<div class="form-group">
																<label class="nk-label">Deskripsi Kegiatan</label>
																<textarea class="form-control" name="deskripsi_kegiatan" id="descTextarea" rows="3" placeholder="Silahkan Anda Masukkan Deskripsi Kegiatan"><?= $qy['deskripsi_kegiatan'] ?></textarea>
															</div>
															<div class="form-group">
																<label>Lampiran RAB</label>
																<br>
																<label class="fancy-checkbox">
																<input type="checkbox"  id="toggle5" name="ubah_rab">
																<span>Ubah Lampiran</span>
																</label>
																<br>
																<label class="nk-label">
																<input type="file" accept="file_extension" name="lampiran1" class="form-control" id="lampiran3" required disabled
																<small>*Lampiran hanya diperbolehkan berformat pdf</small>
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
					 		 </div>
						</div>
					</section>
				</div>
			</div>
	  	</div>
	</div>
		<!-- END MAIN -->
		<script src="config.js"></script>
    	<script src="jquery.min.js"></script>
		<?php include('footer.php'); ?>
