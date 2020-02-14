<?php
include("header-bendes.php");

function randomString($length = 5) {
	$str = "";
	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
	$rand = mt_rand(0, $max);
	$str .= $characters[$rand];
	}
	return $str;
}

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
							<h3 class="panel-title"><i class="icon-ban"></i> Surat Ditolak</h3>
							<p class="panel-subtitle">Halaman untuk mengelola surat yang ditolak oleh Sekertaris Desa</p>
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
														<th>Tanggal Surat</th>
														<th>Nomor Surat</th>
														<th>Nama Pekerjaan</th>
														<th>Nilai RAB</th>
														<th>Lampiran</th>
														<th>#</th>
														<th>#</th>
												</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											$qy = mysqli_query($connect, "SELECT * FROM surat_pengajuan WHERE status = '-3'");
											while($q = mysqli_fetch_array($qy)) { ?>
												<tr>
													<td><?= $no; ?></td>
													<td><?= $q['tanggal_surat']; ?></td>
													<td><?= $q['nomor_surat']; ?></td>
													<td><?= $q['nama_pekerjaan']; ?></td>
													<td><?= $q['nilai_rab']; ?></td>
													<td><?= $q['lampiran']; ?></td>													
													<td>
														<form class="" action="detail-pengajuan-kades.php" method="post">
															<input type="hidden" name="id" value="<?= $q['id_surat'] ?>">
															<button type="button" class="btn btn-success" data-toggle="modal" title="Detail" data-target="#myModaldetail" name="button"><i class="icon-info"></i> Detail</button>
														</form>
													</td>
													<td>
														<button type="button" onClick="hapus(<?php echo $q['id_surat']; ?>)" class="btn btn-danger" data-toggle="tooltip" title="Hapus">
																<i class="icon-trash"></i>
																Hapus
																<script language="javascript">
																	function hapus(id_surat)
																	{
																	if(confirm("Apakah Anda yakin ingin menghapusnya?")){
																	window.location.href='hapus-surat-ditolak-bendes.php?id_surat='+id_surat+'';
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
						<form class="" enctype="multipart/form-data" action="simpan-pengajuan-kadus.php" method="post">
							<div class="modal-body">
									<div class="form-group">
                      <label for="date1">Tanggal Surat</label>
                      <input type="date" class="form-control" id="date1" name="tanggal_surat" required>
											 <!-- <input type="text" class="form-control" name="tanggal_surat" placeholder="Masukkan Tanggal Surat" required> -->
									</div>
									<div class="form-group">
											<label class="nk-label">Nomor Surat</label>
											<input type="text" class="form-control" name="nomor_surat" placeholder="Masukkan Nomor Surat" required>
									</div>
									<div class="form-group">
											<label class="nk-label">Nama Pekerjaan</label>
											<input type="text" class="form-control" name="nama_pekerjaan" placeholder="Masukkan Nama Pekerjaan" required>
									</div>
									<div class="form-group">
											<label class="nk-label">Nilai RAB</label>
											<input type="text" class="form-control" name="nilai_rab" placeholder="Masukkan Nilai RAB" required>
									</div>
									<div class="form-group">
										<label class="nk-label">Lampiran</label>
										<br>
										<label class="fancy-checkbox">
										<input type="checkbox"  id="toggle3" name="ubah_lampiran" >
										<span>Tambah Lampiran</span>
										</label>
										<input type="file" accept="file_extension" name="file" class="form-control" id="lampiran1" required disabled>
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


		<!-- DETAIL -->
		<div class="modal fade text-left" id="myModaldetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
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
						<form class="" enctype="multipart/form-data" action="simpan.php" method="post">
							<div class="modal-body">
									<div class="form-group">
                                            <label for="date1">Tanggal Surat</label>
                                            <input type="date" class="form-control" id="date1" >
									</div>
									<div class="form-group">
											<label class="nk-label">Nomor Surat</label>
											<input type="text" class="form-control" name="nomor_surat" placeholder="Masukkan Nomor Surat" required>
									</div>
									<div class="form-group">
											<label class="nk-label">Nama Pekerjaan</label>
											<input type="text" class="form-control" name="nama_pekerjaan" placeholder="Masukkan Nama Pekerjaan" required>
									</div>
									<div class="form-group">
											<label class="nk-label">Nilai RAB</label>
											<input type="text" class="form-control" name="nilai_rab" placeholder="Masukkan Nilai RAB" required>
									</div>
									<div class="form-group">
										<label class="nk-label">Lampiran</label>
										<br>
										<label class="fancy-checkbox">
										<input type="checkbox"  id="toggle3" name="ubah_lampiran" >
										<span>Tambah Lampiran</span>
										</label>
										<input type="file" accept="file_extension" name="file" class="form-control" id="lampiran1" required disabled>
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
