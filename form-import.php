<?php
include("header-kaurper.php");
?>
<style>
		#loading{
	background: whitesmoke;
	position: absolute;
	top: 140px;
	left: 82px;
	padding: 5px 10px;
	border: 1px solid #ccc;
}
</style>

<script>
$(document).ready(function(){
	// Sembunyikan alert validasi kosong
	$("#kosong").hide();
});
</script>
		<div class="app-content content">
			<div class="content-wrapper">
				<div class="content-header row"></div>
					<div class="content-body"><!-- Stats -->
						<section id="base-style">
							<div class="row">
								<div class="col-12">
									<div class="card">
										<div class="card-header">
											<h3 class="panel-title"> <i class="ft-clipboard"></i> Rencana Pembangunan <i class="fa fa-angle-right"></i> Import Data dari Excel </h3>
											<p class="panel-subtitle">Halaman untuk meng-import data dari Microsoft Excel</p>
											<p class="panel-subtitle"></p>
										</div>
										<div class="panel-body">
											<div class="row">
												<div class="col-md-12">
													<div class="card-body card-dashboard" style="margin-top:-40px;">
													<!-- Buat sebuah tag form dan arahkan action nya ke import.php -->
													<form method="post" action="import.php" enctype="multipart/form-data">
														<a href="template.php" class="btn btn-pink" title="Download Form Excel" name="button">
														<i class="fa fa-cloud-download"></i>
															 Download Template
														</a><br><small>*Download template terlebih dahulu jika anda belum memliki template MS. Excel yang sesuai untuk mengimport data ke dalam aplikasi</small>		
														<br><br>
														<!--
														-- Buat sebuah input type 'file' dengan nama 'file_excel'
														-- class pull-left berfungsi agar file input berada di sebelah kiri
														-->
														<input type="file" name="file_excel" class="pull-left">
														<button type="submit" class="btn btn-primary">
															<i class="fa fa-download"></i>
															 Import
														</button>
													</form>
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
		<script>
		$(document).ready(function(){
			// Sembunyikan alert validasi kosong
			$("#kosong").hide();
		});
		</script>
<?php include('footer.php'); ?>
