<?php
include("header-kades.php");
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
										<h3 class="panel-title"> <i class="ft-clipboard"></i> RPJM Des</h3>
										<p class="panel-subtitle">Halaman untuk mengelola RPJM Des</p>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-12">
											<div class="card-body card-dashboard" style="margin-top:-40px;margin-bottom:-40px;">
												<button type="button" class="btn btn-primary" title="Import Data dari Excel" onclick="window.location='form-import-rpjmdes'" name="button"><i class="ft-file-plus"></i> Import Data dari Excel</button>
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
																$qy = mysqli_query($connect, "SELECT * FROM rpjm_des");
																while($q = mysqli_fetch_array($qy)) { ?>
																	<tr>
																		<td><?= $no; ?></td>
																		<td><?= $q['jenis_keg']; ?></td>
																		<td><?= $q['nilai_rab']; ?></td>
																		<td><?= $q['judul_keg']; ?></td>
																		<td><?= $q['deskripsi_keg']; ?></td>
																		<td>
																		<button type="button" onClick="hapus(<?php echo $q['id_rpjm']; ?>)" class="btn btn-danger" data-toggle="tooltip" title="Hapus">
																			<i class="icon-trash"></i>
																			Hapus
																			<script language="javascript">
																				function hapus(id_rpjm)
																				{
																				if(confirm("Apakah Anda yakin ingin menghapus Rencana RPJM Des ini?")){
																				window.location.href='hapus-rpjm-des.php?id_rpjm='+id_rpjm+'';
																				return true;
																				}
																				} 
																			</script>
																		</button>
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
						<h3 class="panel-title">Tambah RPJM Des</h3>
						<div class="right">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
					</div>
					<div class="panel-body">
						<form class="" enctype="multipart/form-data" action="simpan-rpjm-des.php" method="post">
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

	<script src="config.js"></script>
	<script src="jquery.min.js"></script>
	
<?php include('footer.php'); ?>
