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

$id = antiinjection($_POST['id_proposal']);
$keterangan = antiinjection($_POST['keterangan']);

  mysqli_query($connect, "UPDATE proposal_pengajuan SET `status` = '-3',
  `keterangan` = '$keterangan' WHERE `id_proposal` = '$id'");

    echo '<script language="javascript">swal("Berhasil menolak!", "Proposal telah ditolak", "success").then(() => { window.location="proposal-kades"; });</script>';


?>
