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
										<h3 class="panel-title"> <i class="fa fa-wrench"></i> Pembangunan <i class="fa fa-angle-right"></i> Konfirmasi Pembangunan</h3>
										<p class="panel-subtitle">Halaman untuk mengkonfirmasi pembangunan oleh Kepala Desa</p>
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
																<th>#</th>
															</tr>
													</thead>
													<tbody>
														<?php
														$no = 1;
														$qy = mysqli_query($connect, "SELECT * FROM proposal_pengajuan WHERE status2 = '3'");
														while($q = mysqli_fetch_array($qy)) { ?>
															<tr>
																<td><?= $no; ?></td>
																<td><?= $q['jenis_kegiatan']; ?></td>
																<td><?= $q['judul_kegiatan']; ?></td>
																<td><?= $q['deskripsi_kegiatan']; ?></td>
																<td><?= $q['tanggal_mulai_pelaksanaan']; ?></td>
																<td>
																<div class="btn-group" role="group" aria-label="Basic example">
																	<button type="button" onClick="terima(<?php echo $q['id_proposal']; ?>)" class="btn btn-info" data-toggle="tooltip" title="Terima">
																			<i class="icon-check"></i>
																			Terima
																			<script language="javascript">
																				function terima(id_proposal)
																				{
																				if(confirm("Apakah Anda yakin ingin menerima pembangunan ini?")){
																				window.location.href='terima-pembangunan.php?id_proposal='+id_proposal;
																				return true;
																				}
																				} 
																			</script>
																	</button>
																	<button type="button" onClick="tolak(<?php echo $q['id_proposal']; ?>)" class="btn btn-danger" data-toggle="tooltip" title="Tolak">
																			<i class="icon-ban"></i>
																			Tolak
																			<script language="javascript">
																				function tolak(id_proposal)
																				{
																				if(confirm("Apakah Anda yakin ingin menolak pembangunan ini?")){
																				window.location.href='tolak-pembangunan.php?id_proposal='+id_proposal;
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

		<script src="config.js"></script>
		<script src="jquery.min.js"></script>
		
<?php include('footer.php'); ?>
