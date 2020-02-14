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

$id = antiinjection($_POST['id_jabatan']);
$nama_jabatan = antiinjection($_POST['nama_jabatan']);


  $cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM jabatan WHERE nama_jabatan = '$nama_jabatan'"));
	if ($cek > 0) {
	  echo '<script language="javascript">swal("Simpan gagal!", "Data Jabatan Sudah Ada!", "warning").then(() => { window.location="jabatan"; });</script>';
	}else{
    mysqli_query($connect, "INSERT INTO jabatan (nama_jabatan)
      VALUES ('$nama_jabatan')");
	  echo '<script language="javascript">swal("Simpan berhasil!", "Data Jabatan Tersimpan", "success").then(() => { window.location="jabatan"; });</script>';
	}
?>
