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



  mysqli_query($connect, "UPDATE subjabatan SET
	id_subjabatan = '$id_subjabatan',
	nama_jabatan = '$nama_jabatan',
  nama_subjabatan = '$nama_subjabatan' WHERE id_subjabatan = '$id_subjabatan'");

    echo '<script language="javascript">swal("Update berhasil!", "Data Sub-jabatan terupdate", "success").then(() => { window.location="sub-jabatan"; });</script>';


?>
