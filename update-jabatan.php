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

$id_jabatan = antiinjection($_POST['id_jabatan']);
$nama_jabatan = antiinjection($_POST['nama_jabatan']);



  mysqli_query($connect, "UPDATE jabatan SET
	id_jabatan = '$id_jabatan',
	nama_jabatan = '$nama_jabatan' WHERE id_jabatan = '$id_jabatan'");

    echo '<script language="javascript">swal("Update berhasil!", "Data Jabatan terupdate", "success").then(() => { window.location="jabatan"; });</script>';


?>
