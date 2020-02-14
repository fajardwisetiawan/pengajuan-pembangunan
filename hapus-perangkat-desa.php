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

$id = antiinjection($_GET['id']);

$data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM perangkat_desa WHERE id_perangkat_desa='$id'"));

if(is_file("images/".$data['foto']))
	 unlink("images/".$data['foto']);

	 $qy = mysqli_query($connect, "DELETE FROM perangkat_desa WHERE id_perangkat_desa = '$id'");
			if($qy){
			    echo '<script language="javascript">swal("Hapus berhasil!", "Data Perangkat Desa Terhapus!", "success").then(() => {  window.location="perangkat-desa"; });</script>';
			}else{
					echo '<script language="javascript">swal("Hapus Gagal!", "Data Perangkat Desa Gagal Terhapus!", "error").then(() => { window.history.back(); });</script>';
			}

?>
