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
										<h3 class="panel-title"> <i class="fa fa-wrench"></i> Tahap Pembangunan <i class="fa fa-angle-right"></i> Selesai Pengerjaan</h3>
										<p class="panel-subtitle">Halaman untuk mengelola pembangunan yang telah selesai pengerjaannya oleh KAUR Pembangunan</p>
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
																<th>Tanggal Selesai Pelaksanaan</th>
																<th>Gambar Kegiatan</th>
																<th>#</th>
																<th>#</th>
															</tr>
													</thead>
													<tbody>
														<?php
														$no = 1;
														$qy = mysqli_query($connect, "SELECT * FROM proposal_pengajuan WHERE status2 = '4'");
														while($q = mysqli_fetch_array($qy)) { ?>
															<tr>
																<td><?= $no; ?></td>
																<td><?= $q['jenis_kegiatan']; ?></td>
																<td><?= $q['judul_kegiatan']; ?></td>
																<td><?= $q['deskripsi_kegiatan']; ?></td>
																<td><?= $q['tanggal_selesai_pelaksanaan']; ?></td>
																<td>
																	<button type="button" data-toggle="modal" title="Tampil" data-target="#tampil<?php echo $q['id_proposal']; ?>" class="btn btn-info"><i class="icon-eye"></i> Tampil</button>
																</td>
																<td class="text-center">
																				<form class="" action="rincian-biaya3" method="get">
																					<input type="hidden" name="id" value="<?= $q['id_proposal'] ?>">
																						<button type="submit" class="btn bg-gradient-directional-purple white btn-purple btn-glow" data-toggle="tooltip" title="Rincian Biaya">
																						<i class="fa fa-calculator"></i>
																							Rincian Biaya
																						</button>
																				</form>
																			</td>
																<td>
																		<button type="button" onClick="hapus(<?php echo $q['id_proposal']; ?>)" class="btn btn-danger" data-toggle="tooltip" title="Hapus">
																			<i class="icon-trash"></i>
																			Hapus
																			<script language="javascript">
																				function hapus(id_proposal)
																				{
																				if(confirm("Apakah Anda yakin ingin menghapus pembangunan ini?")){
																				window.location.href='update-pembangunan.php?id_proposal='+id_proposal+'';
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

	<?php
	$qy = mysqli_query($connect, "SELECT * FROM proposal_pengajuan WHERE status2 = '4'");
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
