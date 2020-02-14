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
										<h3 class="panel-title"><i class="icon-ban"></i> Proposal Dana Ditolak</h3>
										<p class="panel-subtitle">Halaman untuk mengelola proposal pengajuan yang ditolak pencairan dananya oleh Bendahara Desa</p>
									</div>
									<div class="panel-body">
										<!-- <div class="row">
											<div class="col-md-12">
											<div class="card-body card-dashboard" style="margin-top:-40px;margin-bottom:-40px;">
												<button type="button" class="btn btn-primary" data-toggle="modal" title="Tambah Pengajuan" data-target="#myModalthree" name="button"><i class="ft-plus"></i> Kirim Pengajuan</button>
											</div>
											</div>
										</div>
										<br> -->
										<div class="row">
											<div class="col-md-12">
											<div class="card-body card-dashboard" style="margin-top:-40px;">
											<div class="table-responsive">
												<!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
												<!--<table class="table table-bordered table-striped table-vcenter js-dataTable-full">-->
												<table class="table table-striped table-bordered base-style">
													<thead>
															<tr>
																<th>No</th>
																<th>Tanggal Proposal</th>
																<th>Nomor Proposal</th>
																<th>Jenis Kegiatan</th>
																<th>Judul Kegiatan</th>
																<th>Deskripsi Kegiatan</th>
																<th>Lampiran</th>
																<th>#</th>
																<th>#</th>
															</tr>
													</thead>
													<tbody>
														<?php
														$no = 1;
														$qy = mysqli_query($connect, "SELECT * FROM proposal_pengajuan WHERE status = '-3'");
														while($q = mysqli_fetch_array($qy)) { ?>
															<tr>
																<td><?= $no; ?></td>
																<td><?= $q['tanggal_proposal']; ?></td>
																<td><?= $q['nomor_proposal']; ?></td>
																<td><?= $q['jenis_kegiatan']; ?></td>
																<td><?= $q['judul_kegiatan']; ?></td>
																<td><?= $q['deskripsi_kegiatan']; ?></td>
																<td>																	
																	<div class="btn-group" role="group" aria-label="Basic example">
																		<a href="tampil.php?id=<?php echo $q['lampiran1'] ?>" class="btn btn-pink" title="Download Lampiran RAB"><i class="fa fa-cloud-download"></i> Lampiran RAB</a>
																		<a href="tampil2.php?id=<?php echo $q['lampiran2'] ?>" class="btn btn-pink" title="Download Lampiran Proposal"><i class="fa fa-cloud-download"></i> Lampiran Proposal</a>
																	</div>
																</td>													
																<td>
																	<button type="button" data-toggle="modal" title="Keterangan" data-target="#detail<?php echo $q['id_proposal']; ?>" class="btn btn-info"><i class="icon-note"></i> Keterangan</button>
																</td>
																<td class="text-center">
																	<button type="button" data-toggle="modal" title="Teruskan" data-target="#tolak<?php echo $q['id_proposal']; ?>" class="btn btn-warning"><i class="icon-cursor"></i> Teruskan</button>
																</td>
															</tr>
														<?php $no++; } ?>
														</tbody>
												</table>
												<?php
												$no = 1;
												$qy = mysqli_query($connect, "SELECT * FROM proposal_pengajuan WHERE status = '-3'");
												while($q = mysqli_fetch_array($qy)) { ?>
												<!-- Modal -->
												<div class="modal fade text-left" id="detail<?php echo $q['id_proposal']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
														<div class="modal-header">
															<h4 class="modal-title" id="myModalLabel1">Keterangan</h4>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
														<p><?= $q['keterangan']; ?></p>
														</div>
														<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-action-undo"></i> Kembali</button>
														</div>
														</div>
													</div>
												</div>
												<?php $no++; } ?>

												<?php
												$no = 1;
												$qy = mysqli_query($connect, "SELECT * FROM proposal_pengajuan WHERE status = '-3'");
												while($q = mysqli_fetch_array($qy)) { ?>
												<!-- Modal -->
												<div class="modal fade text-left" id="tolak<?php echo $q['id_proposal']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
													<div class="modal-dialog modal-large" role="document">
														<!-- PANEL DEFAULT -->
														<div class="modal-content">
															<div class="modal-header">
																<h3 class="panel-title">Tambah Keterangan</h3>
																<div class="right">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																</div>
															</div>
															<div class="panel-body">
																<form class="" enctype="multipart/form-data" action="teruskan-tolak-kades.php" method="post">
																	<div class="modal-body">
																		<div class="form-group">
																		<label for="projectinput7">Untuk</label>
																			<select id="projectinput7" name="untuk" class="form-control" required>
																				<option value="" selected="" disabled="">Pilih Perangkat Desa</option>
																				<option value="KAUR Perencanaan">KAUR Perencanaan</option>
																				<option value="Sekertaris Desa">Sekertaris Desa</option>
																			</select>
																		</div>
																		<div class="form-group">
																				<label class="nk-label">Keterangan</label>
																				<input type="hidden" class="form-control" name="id_proposal" value="<?= $q['id_proposal'] ?>">
																				<textarea class="form-control" name="keterangan" id="descTextarea" rows="3" placeholder="Silahkan Anda Masukkan Keterangan"></textarea>
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
												<?php $no++; } ?>
											</div>
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

		<script src="config.js"></script>
    	<script src="jquery.min.js"></script>
		
<?php include('footer.php'); ?>
