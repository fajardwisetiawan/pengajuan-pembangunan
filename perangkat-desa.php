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
							<h3 class="panel-title"> <i class="icon-users"></i> Perangkat Desa</h3>
							<p class="panel-subtitle">Halaman untuk mengelola data perangkat desa</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
								<div class="card-body card-dashboard" style="margin-top:-40px;margin-bottom:-40px;">
									<button type="button" class="btn btn-primary" data-toggle="modal" title="Tambah Perangkat Desa" data-target="#myModalthree" name="button"><i class="ft-plus"></i> Tambah Perangkat Desa</button>
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
														<th></th>
														<th>Nama</th>
														<th>Username</th>
														<th>Jabatan</th>
														<th>Sub-jabatan</th>
														<th width="10px"></th>
														<th width="10px"></th>
												</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											$qy = mysqli_query($connect, "SELECT * FROM perangkat_desa");
											while($q = mysqli_fetch_array($qy)) { ?>
												<tr>
													<td><?= $no; ?></td>
													<td><?= $q['nama']; ?></td>
													<td><?= $q['username']; ?></td>
													<td><?= $q['jabatan']; ?></td>
													<td><?= $q['subjabatan']; ?></td>
													<td class="text-center">
														<form class="" action="edit-perangkat-desa" method="post">
															<input type="hidden" name="id" value="<?= $q['id_perangkat_desa'] ?>">
															<button type="submit" class="btn btn-warning" data-toggle="tooltip" title="Edit">
																<i class="icon-pencil"></i>
																Ubah
															</button>
														</form>
													</td>
													<td>
															<button type="button" onClick="deleteme(<?php echo $q['id_perangkat_desa']; ?>)" class="btn btn-danger" data-toggle="tooltip" title="Hapus">
																<i class="icon-trash"></i>
																Hapus
																<script language="javascript">
																	function deleteme(delid)
																	{
																	if(confirm("Apakah Anda yakin ingin menghapusnya?")){
																	window.location.href='hapus-perangkat-desa.php?id='+delid+'';
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


	<div class="modal fade text-left" id="myModalthree" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
			<div class="modal-dialog modal-large" role="document">
				<!-- PANEL DEFAULT -->
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="panel-title">Tambah Perangkat Desa</h3>
						<div class="right">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
					</div>
					<div class="panel-body">
						<form class="" enctype="multipart/form-data" action="simpan-perangkat-desa.php" method="post">
							<div class="modal-body">
									<div class="form-group">
											<label class="nk-label">Nama</label>
											<input type="hidden" class="form-control" name="id_perangkat_desa" required>
											<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required>
									</div>
									<div class="form-group">
											<label class="nk-label">Username</label>
											<input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
									</div>
									<div class="form-group">
											<label class="nk-label">Password</label>
											<input type="text" class="form-control" name="password" value="<?= randomString() ?>" readonly>
									</div>
									<div class="form-group">
										<label class="nk-label">Jabatan</label>
										<select name="jabatan" id="jabatan" class="js-example-basic-single js-states form-control">
              							<option value="">Pilih Jabatan</option>
										  	<?php
              								$sql = mysqli_query($connect, "SELECT * FROM jabatan");
              								while($data = mysqli_fetch_array($sql)){
              								  echo "<option value='".$data['nama_jabatan']."'>".$data['nama_jabatan']."</option>";
              								}
              								?>
										</select>
									</div>
									<div class="form-group">
										<label class="nk-label">Sub-jabatan</label>
											<select name="subjabatan" id="subjabatan" class="js-example-basic-single js-states form-control">
                							<option value="">Pilih Sub-jabatan</option>
              								</select>
              							<div id="loading" style="margin-top: 15px;">
              							  <img src="loading.gif" width="18"> <small>Loading...</small>
              							</div>
									</div>
									<div class="form-group">
										<label class="nk-label">Foto</label>
										<br>
										<label class="fancy-checkbox">
										<input type="checkbox"  id="toggle1" name="ubah_foto" >
										<span>Tambah Foto</span>
										</label>
										<input type="file" accept="image/*" name="foto" class="form-control" id="foto1" required disabled>
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
