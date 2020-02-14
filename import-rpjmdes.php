<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
	 <meta charset="utf-8">
	 <script type="text/javascript" src="assets/vendor/sweetalert/sweetalert.min.js"></script>
 </head>
</html>
<?php

	// Load file koneksi.php
	include "koneksi.php";

	// Memanggil class PHPExcel
	// DIR itu direktory atau folder
	require_once __DIR__.'/PHPExcel/PHPExcel.php';
	require_once __DIR__.'/PHPExcel/PHPExcel/IOFactory.php';

	// Load excel
	$file = $_FILES['file_excel']['tmp_name'];
	$load = PHPExcel_IOFactory::load($file);
	$sheets = $load->getActiveSheet()->toArray(null,true,true,true);

	$i = 1;
	foreach ($sheets as $sheet) {

	// Karena data yang di excel di mulai dari baris ke 4
	// Maka jika $i lebih dari 3 data akan di masukan ke database
	$sheets_jenkeg = $sheet['B'];
	$sheets_nrab = $sheet['C'];
	$sheets_judkeg = $sheet['D'];
	$sheets_deskeg = $sheet['E'];

	if($sheets_jenkeg=='' || $sheets_nrab=='' || $sheets_judkeg=='' || $sheets_deskeg=='') {
		echo '<script language="javascript">swal("Simpan gagal!", "Ada kolom yang kosong", "warning").then(() => { window.location="form-import-rpjmdes"; });</script>';
	}else{

		if ($i > 3) {
			if($sheets_jenkeg=='' || $sheets_nrab=='' || $sheets_judkeg=='' || $sheets_deskeg=='') {
				echo '<script language="javascript">swal("Simpan gagal!", "Ada kolom yang kosong", "warning").then(() => { window.location="form-import-rpjmdes"; });</script>';
			}else {
				$sql = 'INSERT INTO rpjm_des SET';
				$sql .= ' jenis_keg="'.$sheet['B'].'",';
				$sql .= ' nilai_rab="'.$sheet['C'].'",';
				$sql .= ' judul_keg="'.$sheet['D'].'",';
				$sql .= ' deskripsi_keg="'.$sheet['E'].'"';
				$exc = mysqli_query($connect,$sql);
				if($exc){
					echo '<script language="javascript">swal("", "Import data sukses!", "success").then(() => { window.location="rpjm-des"; });</script>';
		
				}
			}
			// Nilai RAB ada di kolom B
			// Jenis Kegiatan ada di kolom C
			// Judul Kegiatan ada di kolom D
			// Deskripsi Kegiatan ada di kolom E
			
		}

		$i++;
		}

		// if($i >= 4) {
		// // Pesan jika data berhasil di input
		// 	echo '<script language="javascript">swal("", "Import data sukses!", "success").then(() => { window.location="perencanaan-kaurper"; });</script>';
		// }
	}
?>
