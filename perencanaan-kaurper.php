<?php
include("header-kaurper.php");
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
										<h3 class="panel-title"> <i class="ft-clipboard"></i> Perencanaan Pembangunan</h3>
										<p class="panel-subtitle">Halaman untuk mengelola perencanaan proposal pembangunan</p>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-12">
											<div class="card-body card-dashboard" style="margin-top:-40px;margin-bottom:-40px;">
												<button type="button" class="btn btn-primary" title="Import Data dari Excel" onclick="window.location='form-import'" name="button"><i class="ft-file-plus"></i> Import Data dari Excel</button>
												<button type="button" class="btn btn-primary" data-toggle="modal" title="Tambah Rencana Pembangunan" data-target="#myModalthree" name="button"><i class="ft-plus"></i> Tambah Rencana Pembangunan</button>
											</div>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-12">
												<div class="card-body card-dashboard">
													<div class="table-responsive">
														<!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
														<!--<table class="table table-bordered table-striped table-vcenter js-dataTable-full">-->
														<table class="table table-striped table-bordered base-style">
															<thead>
																	<tr>
																			<th>No</th>
																			<th>Jenis Kegiatan</th>
																			<th>Nilai RAB</th>
																			<th>Judul Kegiatan</th>
																			<th>Deskripsi Kegiatan</th>
																			<th width="10px">#</th>
																	</tr>
															</thead>
															<tbody>
																<?php
																$no = 1;
																$qy = mysqli_query($connect, "SELECT * FROM proposal_pengajuan WHERE status = '0'");
																while($q = mysqli_fetch_array($qy)) { ?>
																	<tr>
																		<td><?= $no; ?></td>
																		<td><?= $q['jenis_kegiatan']; ?></td>
																		<td><?= $q['nilai_rab']; ?></td>
																		<td><?= $q['judul_kegiatan']; ?></td>
																		<td><?= $q['deskripsi_kegiatan']; ?></td>
																		<td>
																			<button type="button" class="btn btn-soundcloud" data-toggle="modal" title="Kirim Pengajuan Pembangunan" data-target="#pengajuan<?php echo $q['id_proposal']; ?>" name="button"><i class="icon-paper-plane"></i> Kirim Pengajuan</button>
																		</td>
																	</tr>
																<?php $no++; } ?>
															</tbody>
														</table>
													</div>
												</div>
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



	<!-- TAMBAH -->
	<div class="modal fade text-left" id="myModalthree" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
			<div class="modal-dialog modal-large" role="document">
				<!-- PANEL DEFAULT -->
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="panel-title">Kirim Pengajuan</h3>
						<div class="right">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
					</div>
					<div class="panel-body">
						<form class="" enctype="multipart/form-data" action="simpan-perencanaan-kaurper.php" method="post">
							<div class="modal-body">
									<div class="form-group">
										<label class="nk-label">Jenis Kegiatan</label>
										<select class="form-control" name="jenis_kegiatan" required>
											<option value="">Pilih</option>
											<option value="Penyelenggaraan Pemerintahan">Penyelenggaraan Pemerintahan</option>
											<option value="Pembangunan">Pembangunan</option>
											<option value="Pembinaan Masyarakat">Pembinaan Masyarakat</option>
											<option value="Pemberdayaan Masyarakat">Pemberdayaan Masyarakat</option>
											<option value="Bencana Alam">Bencana Alam</option>
										</select>
									</div>
									<div class="form-group">
											<label class="nk-label">Nilai RAB</label>
											<input type="text" class="form-control" name="nilai_rab" placeholder="Masukkan Nilai RAB" required>
									</div>									
									<div class="form-group">
											<label class="nk-label">Judul Kegiatan</label>
											<input type="text" class="form-control" name="judul_kegiatan" placeholder="Masukkan Judul" required>
									</div>
									<div class="form-group">
											<label class="nk-label">Deskripsi Kegiatan</label>
											<textarea class="form-control" name="deskripsi_kegiatan" id="descTextarea" rows="3" placeholder="Silahkan Anda Masukkan Deskripsi Kegiatan"></textarea>
											<!-- <input type="text" class="form-control" name="deskripsi_kegiatan" placeholder="Masukkan Deskripsi" required> -->
									</div>
							</div>
							<div class="modal-footer">
									<button type="submit" class="btn btn-default"><i class="ft-save"></i> Simpan</button>
									<button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-close"></i> Batal</button>
							</div>
						</form>

					</div>
				</div>
				<!-- END PANEL DEFAULT -->
			</div>
	</div>

	<?php
		$no = 1;
		$qy = mysqli_query($connect, "SELECT * FROM proposal_pengajuan WHERE status = '0'");
		while($q = mysqli_fetch_array($qy)) { ?>
	<!-- LAMPIRKAN PROPOSAL -->
	<div class="modal fade text-left" id="pengajuan<?php echo $q['id_proposal']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
		<div class="modal-dialog modal-large" role="document">
			<!-- PANEL DEFAULT -->
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="panel-title">Kirim Pengajuan Pembangunan</h3>
					<div class="right">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
				</div>
				<div class="panel-body">
					<form class="" enctype="multipart/form-data" action="kirim-pengajuan-kaurper.php" method="post">
						<div class="modal-body">
								<div class="form-group">
										<label class="nk-label">Jenis Kegiatan</label>
										<input type="hidden" class="form-control" name="id_proposal" value="<?= $q['id_proposal'] ?>">
										<input type="text" class="form-control" value="<?= $q['jenis_kegiatan'] ?>" readonly>
								</div>
								<div class="form-group">
										<label class="nk-label">Nilai RAB</label>
										<input type="hidden" class="form-control" name="id_proposal" value="<?= $q['id_proposal'] ?>">
										<input type="text" class="form-control" value="<?= $q['nilai_rab'] ?>" readonly>
								</div>
								<div class="form-group">
										<label class="nk-label">Judul Kegiatan</label>
										<input type="text" class="form-control" value="<?= $q['judul_kegiatan'] ?>" readonly>
								</div>
								<div class="form-group">
										<label class="nk-label">Deskripsi Kegiatan</label>
										<input type="text" class="form-control" value="<?= $q['deskripsi_kegiatan'] ?>" readonly>
								</div>
								<div class="form-group">
										<label for="date1">Tanggal Proposal</label>
										<input type="text" class="form-control date-inputmask" id="date-mask" placeholder="Masukkan Tanggal Proposal" name="tanggal_proposal" value="<?= date('Y-m-d') ?>" required readonly>
										<!-- <input type="text" class="form-control" id="date1" name="tanggal_proposal"  required> -->
										<!-- <input type="text" class="form-control" name="tanggal_proposal" placeholder="Masukkan Tanggal Proposal" required> -->
								</div>
								
								<div class="form-group">
									<label>Lampiran RAB</label>
									<br>
									<label class="nk-label">
									<input type="file" accept="file_extension" name="file" class="form-control" id="lampiran1" required>
									<small>*Lampiran hanya diperbolehkan berformat pdf</small>
								</div>
						</div>
						<div class="modal-footer">
								<button type="submit" class="btn btn-default"><i class="ft-save"></i> Simpan</button>
								<button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-close"></i> Batal</button>
						</div>
					</form>
				</div>
			</div>
			<!-- END PANEL DEFAULT -->
		</div>
	</div>
	<?php } ?>


	<script src="config.js"></script>
	<script src="jquery.min.js"></script>
	
<?php include('footer.php'); ?>
