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

$id_subjabatan = antiinjection($_POST['id_subjabatan']);
$nama_jabatan = antiinjection($_POST['nama_jabatan']);
$nama_subjabatan = antiinjection($_POST['nama_subjabatan']);


  $cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM subjabatan WHERE id_subjabatan = '$id_subjabatan'"));
	if ($cek > 0) {
	  echo '<script language="javascript">swal("Simpan gagal!", "Data Sub-jabatan Sudah Ada!", "warning").then(() => { window.location="sub-jabatan"; });</script>';
	}else{
    mysqli_query($connect, "INSERT INTO subjabatan (nama_jabatan, nama_subjabatan)
      VALUES ('$nama_jabatan', '$nama_subjabatan')");
	  echo '<script language="javascript">swal("Simpan berhasil!", "Data Sub-jabatan Tersimpan", "success").then(() => { window.location="sub-jabatan"; });</script>';
	}
?>
