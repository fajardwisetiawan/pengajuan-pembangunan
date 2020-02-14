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
	
	$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM proposal_pengajuan WHERE judul_kegiatan = '$judul_kegiatan'"));
	if ($cek > 0) {
	  echo '<script language="javascript">swal("Simpan gagal!", "Data rencana pembangunan sudah ada!", "warning").then(() => { window.location="perencanaan-kaurper"; });</script>';
	}else{
    mysqli_query($connect, "INSERT INTO proposal_pengajuan (jenis_kegiatan, nilai_rab, judul_kegiatan, deskripsi_kegiatan, status)
      VALUES ('$jenis_kegiatan', '$nilai_rab', '$judul_kegiatan', '$deskripsi_kegiatan', '0')");
		echo '<script language="javascript">swal("Simpan berhasil!", "Data rencanaan pembangunan tersimpan", "success").then(() => { window.location="perencanaan-kaurper"; });</script>';
	}

?>
