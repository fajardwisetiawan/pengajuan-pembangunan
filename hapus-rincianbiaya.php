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

// $ids = antiinjection($_POST['id_propo']);
$id = antiinjection($_GET['id_rinbi']);


	 $qy = mysqli_query($connect, "DELETE FROM rincian_biaya WHERE id_rinbi = '$id'");
			if($qy){
			    echo '<script language="javascript">swal("Hapus berhasil!", "Data pembangunan terhapus", "success").then(() => {  window.history.back(); });</script>';
			}else{
					echo '<script language="javascript">swal("Hapus gagal!", "Data pembangunan gagal terhapus", "error").then(() => { window.history.back(); });</script>';
			}

?>
