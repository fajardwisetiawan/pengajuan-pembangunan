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

$id = antiinjection($_GET['id_proposal']);


	 $qy = mysqli_query($connect, "DELETE FROM proposal_pengajuan WHERE id_proposal = '$id'");
			if($qy){
			    echo '<script language="javascript">swal("Hapus berhasil!", "Proposal berhasil dihapus!", "success").then(() => {  window.location="proposal-pending-sekdes"; });</script>';
			}else{
					echo '<script language="javascript">swal("Hapus Gagal!", "Proposal gagal dihapus!", "error").then(() => { window.history.back(); });</script>';
			}

?>
