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

$id = antiinjection($_GET['id_rpjm']);


	 $qy = mysqli_query($connect, "DELETE FROM rpjm_des WHERE id_rpjm = '$id'");
			if($qy){
			    echo '<script language="javascript">swal("Hapus berhasil!", "RPJM Des berhasil dihapus!", "success").then(() => {  window.location="rpjm-des"; });</script>';
			}else{
					echo '<script language="javascript">swal("Hapus Gagal!", "RPJM Des gagal dihapus!", "error").then(() => { window.history.back(); });</script>';
			}

?>
