<?php
include("header-kaurpem.php");
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
										<h3 class="panel-title"> <i class="fa fa-wrench"></i> Tahap Pembangunan <i class="fa fa-angle-right"></i> Dalam Proses</h3>
										<p class="panel-subtitle">Halaman untuk mengelola pembangunan yang sedang dalam proses pengerjaan oleh KAUR Pembangunan</p>
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
																<th>Jenis Kegiatan</th>
																<th>Judul Kegiatan</th>
																<th>Deskripsi Kegiatan</th>
																<th>Tanggal Mulai Pelaksanaan</th>
																<th>Gambar Kegiatan</th>
																<th>#</th>
																<th>#</th>
															</tr>
													</thead>
													<tbody>
														<?php
														$no = 1;
														$qy = mysqli_query($connect, "SELECT * FROM proposal_pengajuan WHERE status2 = '2'");
														while($q = mysqli_fetch_array($qy)) { ?>
															<tr>
																<td><?= $no; ?></td>
																<td><?= $q['jenis_kegiatan']; ?></td>
																<td><?= $q['judul_kegiatan']; ?></td>
																<td><?= $q['deskripsi_kegiatan']; ?></td>
																<td><?= $q['tanggal_mulai_pelaksanaan']; ?></td>
																<td>
																	<div class="btn-group" role="group" aria-label="Basic example">
																		<button type="button" data-toggle="modal" title="Tambah" data-target="#tambah<?php echo $q['id_proposal']; ?>" class="btn btn-primary"><i class="ft-plus"></i> Tambah</button>
																		<button type="button" data-toggle="modal" title="Tampil" data-target="#tampil<?php echo $q['id_proposal']; ?>" class="btn btn-info"><i class="icon-eye"></i> Tampil</button>
																	</div>
																</td>
																<td class="text-center">
																	<form class="" action="rincian-biaya" method="get">
																		<input type="hidden" name="id" value="<?= $q['id_proposal'] ?>">
																			<button type="submit" class="btn bg-gradient-directional-purple white btn-purple btn-glow" data-toggle="tooltip" title="Rincian Biaya">
																			<i class="fa fa-calculator"></i>
																				Rincian Biaya
																			</button>
																	</form>
																</td>																
																<td>
																	<div class="btn-group" role="group" aria-label="Basic example">
																	<button type="button" onClick="terima(<?php echo $q['id_proposal']; ?>)" class="btn btn-soundcloud" data-toggle="tooltip" title="Mulai">
																			<i class="icon-control-forward"></i>
																			Selesai Pembangunan
																			<script language="javascript">
																				function terima(id_proposal)
																				{
																				if(confirm("Apakah Anda yakin pembangunan ini telah selesai?")){
																				window.location.href='selesai-pembangunan.php?id_proposal='+id_proposal;
																				return true;
																				}
																				} 
																			</script>
																	</button>
																	</div>
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
						</div>
					</section>
				</div>
			</div>
	  	</div>
	</div>

	<?php
		$no = 1;
		$qy = mysqli_query($connect, "SELECT * FROM proposal_pengajuan WHERE status2 = '2'");
		while($q = mysqli_fetch_array($qy)) { ?>
	<!-- LAMPIRKAN PROPOSAL -->
	<div class="modal fade text-left" id="tambah<?php echo $q['id_proposal']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
			<div class="modal-dialog modal-large" role="document">
				<!-- PANEL DEFAULT -->
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="panel-title">Kirim Proposal Kepala Desa</h3>
						<div class="right">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
					</div>
					<div class="panel-body">
						<form class="" enctype="multipart/form-data" action="tambah-gambar.php" method="post">
							<div class="modal-body">
									<div class="form-group">
											<label class="nk-label">Jenis Kegiatan</label>
											<input type="hidden" class="form-control" name="id_proposal" value="<?= $q['id_proposal'] ?>">
											<input type="text" class="form-control" value="<?= $q['jenis_kegiatan'] ?>" readonly>
									</div>
									<div class="form-group">
											<label class="nk-label">Judul Kegiatan</label>
											<input type="text" class="form-control" value="<?= $q['judul_kegiatan'] ?>" readonly>
									</div>
									<div class="form-group">
										<label>Tambah Gambar</label>
										<br>
										<label class="nk-label">
										<input type="file" accept="image/*" name="foto" class="form-control" required>
										<small>*Gambar hanya boleh berformat JPG, JPEG, dan PNG</small>
									</div>
									<div class="form-group">
											<label class="nk-label">Deskripsi Gambar</label>
											<textarea class="form-control" name="deskripsi_gambar" id="descTextarea" rows="3" placeholder="Silahkan Anda Masukkan Deskripsi Gambar"></textarea>
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

	<?php
	$qy = mysqli_query($connect, "SELECT * FROM proposal_pengajuan WHERE status2 = '2'");
	while($q = mysqli_fetch_array($qy)) { ?>
		<!-- Modal -->
		<div class="modal fade text-left" id="tampil<?php echo $q['id_proposal']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myModalLabel1">Gambar Kegiatan</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body" style="text-align:center">
								<?php if($q['gambar_kegiatan'] == ''){ ?>
									<img src="images/empty.png" style="width:170px;height:130px;" class="img-circle" width="100px" alt="image" />
								<?php }else{ ?>
								<div class="hd-message-img">
									<img src="images/<?= $q['gambar_kegiatan']; ?>" class="img-circle" width="100px" alt="image" />
								</div>
								<?php } ?>
							</div>
							<div class="modal-body">
							<p><?= $q['deskripsi_gambar']; ?></p>
							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-action-undo"></i> Kembali</button>
							</div>
							</div>
						</div>
					</div>
		<?php } ?>

		<script src="config.js"></script>
		<script src="jquery.min.js"></script>
		
<?php include('footer.php'); ?>
