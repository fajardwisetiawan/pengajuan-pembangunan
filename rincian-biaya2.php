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
										<h3 class="panel-title"> <i class="fa fa-calculator"></i> Rincian Biaya</h3>
										<p class="panel-subtitle">Halaman untuk mengelihat rincian biaya yang digunakan dalam pembangunan</p>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-12" style="margin-top:-40px;">
											<div class="card-body card-dashboard">
												<!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
												<!--<table class="table table-bordered table-striped table-vcenter js-dataTable-full">-->
												<table class="table table-striped table-bordered base-style">
													<thead>
															<tr>
																	<th width="10px">No</th>
																	<th>Rincian</th>
																	<th>Biaya</th>
																	<th width="10px">#</th>
															</tr>
													</thead>
													<tbody>
														<?php
														$ids = $_GET['id'];
														$no = 1;
														$qy = mysqli_query($connect, "SELECT * FROM rincian_biaya WHERE id_proposal = '$ids' ");
														while($q = mysqli_fetch_array($qy)) { ?>
															<tr>
																<td><?= $no; ?></td>
																<td><?= $q['rincian']; ?></td>
																<td><?= $q['biaya']; ?></td>
																<td>
																	<button type="button" data-toggle="modal" title="Kwitansi" data-target="#kwitansi<?php echo $q['id_rinbi']; ?>" class="btn btn-info"><i class="icon-eye"></i> Kwitansi</button>
																</td>
																<!-- <td class="text-center">
																	<form class="" action="edit-perangkat-desa" method="post">
																		<input type="hidden" name="id" value="">
																		<button type="submit" class="btn btn-warning" data-toggle="tooltip" title="Edit">
																			<i class="icon-pencil"></i>
																			Ubah
																		</button>
																	</form>
																</td> -->
															</tr>
														<?php $no++; } ?>
														</tbody>
														<?php 
															$vrab = mysqli_query($connect,"SELECT * FROM proposal_pengajuan WHERE id_proposal='$ids'");
															$i = 0;
															$biaya=0;
															$rRab = mysqli_fetch_object($vrab);
															$rab = $rRab->nilai_rab;

															$vjumlah= mysqli_query($connect,"SELECT * FROM rincian_biaya WHERE id_proposal='$ids'");
															while($r=mysqli_fetch_array($vjumlah)){
																$biaya += $r['biaya'];

																$i++;
															}

														
														?>
														<tfoot>
															<tr>
																	<th  style="text-align: center" width="10px" colspan="2">Jumlah</th>
																	<th><?=$biaya ?></th>
															</tr>
															<tr>
																	<th  style="text-align: center" width="10px" colspan="2">Total</th>
																	<th><?=$rab." - " .$biaya ?></th>
															</tr>
															<tr>
																	<th  style="text-align: center" width="10px" colspan="2"></th>
																	<th><?=$rab-$biaya ?></th>
															</tr>
														</tfoot>
												</table>
												<?php
														$idx = $_GET['id'];
														$qy = mysqli_query($connect, "SELECT * FROM rincian_biaya WHERE id_proposal = '$idx' ");
														while($q = mysqli_fetch_array($qy)) { ?>
												<!-- Modal -->
												<div class="modal fade text-left" id="kwitansi<?php echo $q['id_rinbi']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																	<div class="modal-header">
																		<h4 class="modal-title" id="myModalLabel1">Kwitansi</h4>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body" style="text-align:center">
																		<?php if($q['gambar_kwitansi'] == ''){ ?>
																			<img src="images/empty.png" style="width:170px;height:130px;" class="img-circle" width="100px" alt="image" />
																		<?php }else{ ?>
																		<div class="hd-message-img">
																			<img src="images/<?= $q['gambar_kwitansi']; ?>" class="img-circle" width="100px" alt="image" />
																		</div>
																		<?php } ?>
																	</div>
																	<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-action-undo"></i> Kembali</button>
																	</div>
																	</div>
																</div>
															</div>
												<?php } ?>
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


	<div class="modal fade text-left" id="myModalthree" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
			<div class="modal-dialog modal-large" role="document">
				<!-- PANEL DEFAULT -->
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="panel-title">Tambah Rincian Biaya RAB</h3>
						<div class="right">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
					</div>
					<div class="panel-body">
						<form class="" enctype="multipart/form-data" action="simpan-rincian-biaya.php" method="post">
							<div class="modal-body">
									<div class="form-group">
											<label class="nk-label">Rincian</label>
											<input type="hidden" class="form-control" name="id" value="<?php echo $_GET['id'] ?>" required>
											<input type="text" class="form-control" name="rincian" placeholder="Masukkan Rincian" required>
									</div>
									<div class="form-group">
											<label class="nk-label">Biaya</label>
											<input type="text" class="form-control" name="biaya" placeholder="Masukkan Biaya" required>
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
