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
							<h3 class="panel-title"> <i class="lnr lnr-cog"></i> Admin <i class="fa fa-angle-right"></i> <a href="kadus">Kelola Admin</a> </h3>
							<p class="panel-subtitle">Halaman untuk mengelola data administrator</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
								<div class="card-body card-dashboard" style="margin-top:-40px;margin-bottom:-40px;">
									<button type="button" class="btn btn-primary" data-toggle="modal" title="Tambah Pengurus" data-target="#myModalthree" name="button"><i class="ft-plus"></i> Tambah Admin</button>
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
														<th>Nama</th>
														<th>Username</th>
														<th>Foto</th>
														<th width="10px"></th>
														<th width="10px"></th>
												</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											$qy = mysqli_query($connect, "SELECT * FROM admin");
											while($q = mysqli_fetch_array($qy)) { ?>
												<tr>
													<td><?= $no; ?></td>
													<td><?= $q['nama']; ?></td>
													<td><?= $q['username']; ?></td>
													<td><?= $q['foto']; ?></td>
													<td class="text-center">
														<form class="" action="edit-admin" method="post">
															<input type="hidden" name="id_admin" value="<?= $q['id_admin'] ?>">
															<button type="submit" class="btn btn-warning" data-toggle="tooltip" title="Edit">
																<i class="icon-pencil"></i>
																Ubah
															</button>
														</form>
													</td>
													<td>
														<form class="" action="hapus-admin.php" method="post">
															<input type="hidden" name="id_admin" value="<?= $q['id_admin'] ?>">
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
						<h3 class="panel-title">Tambah Admin</h3>
						<div class="right">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
					</div>
					<div class="panel-body">
						<form class="" enctype="multipart/form-data" action="simpan-admin.php" method="post">
							<div class="modal-body">
									<div class="form-group">
											<label class="nk-label">Nama Admin</label>
											<input type="hidden" class="form-control" name="id_admin" required>
											<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Admin" required>
									</div>
									<div class="form-group">
											<label class="nk-label">Username</label>
											<input type="text" class="form-control" name=username placeholder="Masukkan Username Admin" required>
									</div>
									<div class="form-group">
											<label class="nk-label">Password</label>
											<input type="text" class="form-control" name="password" value="<?= randomString() ?>" readonly>
									</div>	
									<div class="form-group">
										<label class="nk-label">Foto</label>
										<br>
										<label class="fancy-checkbox">
										<input type="checkbox"  id="toggle2" name="ubah_foto" >
										<span>Tambah Foto</span>
										</label>
										<input type="file" accept="image/*" name="foto" class="form-control" id="foto2" required disabled>
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
