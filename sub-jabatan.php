<?php
include("header.php");

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
										<h3 class="panel-title"> <i class="lnr lnr-cog"></i> Pengaturan <i class="fa fa-angle-right"></i> <a href="sub-jabatan">Sub-jabatan</a> </h3>
										<p class="panel-subtitle">Halaman untuk mengelola data sub-jabatan</p>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-12">
											<div class="card-body card-dashboard" style="margin-top:-40px;margin-bottom:-40px;">
												<button type="button" class="btn btn-primary" data-toggle="modal" title="Tambah Sub-jabatan" data-target="#myModalthree" name="button"><i class="ft-plus"></i> Tambah Sub-jabatan</button>
											</div>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-12">
											<div class="card-body card-dashboard">
												<!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
												<!--<table class="table table-bordered table-striped table-vcenter js-dataTable-full">-->
												<table class="table table-striped table-bordered base-style">
													<thead>
															<tr>
																	<th width="10px"></th>
																	<th>Jabatan</th>
																	<th>Sub-jabatan</th>
																	<th width="10px"></th>
																	<th width="10px"></th>
															</tr>
													</thead>
													<tbody>
														<?php
														$no = 1;
														$qy = mysqli_query($connect, "SELECT * FROM subjabatan");
														while($q = mysqli_fetch_array($qy)) { ?>
															<tr>
																<td><?= $no; ?></td>
																<td><?= $q['nama_jabatan']; ?></td>
																<td><?= $q['nama_subjabatan']; ?></td>
																<td class="text-center">
																	<form class="" action="edit-sub-jabatan" method="post">
																		<input type="hidden" name="id_subjabatan" value="<?= $q['id_subjabatan'] ?>">
																		<button type="submit" class="btn btn-warning" data-toggle="tooltip" title="Edit">
																			<i class="icon-pencil"></i>
																			Ubah
																		</button>
																	</form>
																</td>
																<td>
																	<form class="" action="hapus-sub-jabatan.php" method="post">
																		<input type="hidden" name="id_subjabatan" value="<?= $q['id_subjabatan'] ?>">
																		<button type="submit" class="btn btn-danger" data-toggle="tooltip" title="Hapus">
																			<i class="icon-trash"></i>
																			Hapus
																		</button>
																	</form>
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


		<div class="modal fade text-left" id="myModalthree" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
			<div class="modal-dialog modal-large" role="document">
				<!-- PANEL DEFAULT -->
				<div class="modal-content">
					<div class="modal-header">
							<h3 class="panel-title">Tambah Sub-jabatan</h3>
						<div class="right">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
					</div>
					<div class="panel-body">
						<form class="" enctype="multipart/form-data" action="simpan-sub-jabatan.php" method="post">
							<div class="modal-body">
									<div class="form-group">
										<label class="nk-label">Jabatan</label>
										<div class="form-group">
											<select class="form-control" name="nama_jabatan">
												<option hidden value="-">Pilih Jabatan</option>
													<?php $query = mysqli_query($connect, "SELECT * FROM jabatan");
													while($m = mysqli_fetch_array($query)){ ?>
													<option value="<?= $m['nama_jabatan'] ?>"><?= $m['nama_jabatan'] ?></option>
													<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group">
											<label class="nk-label">Sub-jabatan</label>
											<input type="hidden" class="form-control" name="id_subjabatan" required>
											<input type="text" class="form-control" name="nama_subjabatan" placeholder="Masukkan Nama Sub-jabatan" required>
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

<?php include('footer.php'); ?>
