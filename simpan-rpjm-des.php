<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
	 <meta charset="utf-8">
	 <script type="text/javascript" src="assets/vendor/sweetalert/sweetalert.min.js"></script>
 </head>
</html>
<?php
include('koneksi.php');
// include('session.php');

function antiinjection($data){
    $filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
    return $filter_sql;
}

$jenis_kegiatan = antiinjection($_POST['jenis_kegiatan']);
$nilai_rab = antiinjection($_POST['nilai_rab']);
$judul_kegiatan = antiinjection($_POST['judul_kegiatan']);
$deskripsi_kegiatan = antiinjection($_POST['deskripsi_kegiatan']);
	
	$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM rpjm_des WHERE judul_keg = '$judul_kegiatan'"));
	if ($cek > 0) {
	  echo '<script language="javascript">swal("Simpan gagal!", "Data rencana pembangunan sudah ada!", "warning").then(() => { window.location="rpjm-des"; });</script>';
	}else{
    mysqli_query($connect, "INSERT INTO rpjm_des (jenis_keg, nilai_rab, judul_keg, deskripsi_keg)
      VALUES ('$jenis_kegiatan', '$nilai_rab', '$judul_kegiatan', '$deskripsi_kegiatan')");
		echo '<script language="javascript">swal("Simpan berhasil!", "Data rencanaan pembangunan tersimpan", "success").then(() => { window.location="rpjm-des"; });</script>';
	}

?>
