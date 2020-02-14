<?php include 'header-kades.php' ?>

	<div class="app-content content">
		<div class="content-wrapper">
			<div class="content-header row"></div>
				<div class="content-body"><!-- Stats -->
					<section id="base-style">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h3 class="panel-title"> SELAMAT DATANG, KEPALA DESA.</h3>
										<p class="panel-subtitle">Anda masuk sebagai kepala desa, berikut adalah halaman untuk kepala desa. Selamat bekerja!</p>
									</div>
								  </div>
								  <div class="card">
									<div class="card-header">
										<h3 class="panel-title"> <i class="ft-clipboard"></i> RPJM DES</h3>
										<p class="panel-subtitle">Berikut adalah RPJM DES periode ini</p>
									</div>
									<div class="panel-body">					
										<br>
										<div class="row">
											<div class="col-md-12">
												<div class="card-body card-dashboard" style="margin-top:-50px;">
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
																	</tr>
															</thead>
															<tbody>
																<?php
																$no = 1;
																$qy = mysqli_query($connect, "SELECT * FROM proposal_pengajuan WHERE status = '0'");
																while($q = mysqli_fetch_array($qy)) { ?>
																	<tr>
																		<td><?= $no; ?></td>
																		<td><?= $q['jenis_kegiatan']; ?></td>
																		<td><?= $q['nilai_rab']; ?></td>
																		<td><?= $q['judul_kegiatan']; ?></td>
																		<td><?= $q['deskripsi_kegiatan']; ?></td>																		
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

<?php include 'footer.php' ?>