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


	 $qy = mysqli_query($connect, "DELETE FROM jabatan WHERE id_jabatan = '$id'");
			if($qy){
			    echo '<script language="javascript">swal("Hapus berhasil!", "Data Jabatan Terhapus!", "success").then(() => {  window.location="jabatan"; });</script>';
			}else{
					echo '<script language="javascript">swal("Hapus Gagal!", "Data Jabatan Gagal Terhapus!", "error").then(() => { window.history.back(); });</script>';
			}

?>
