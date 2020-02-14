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
$tgl = date('Y-m-d');

  mysqli_query($connect, "UPDATE proposal_pengajuan SET
  tanggal_acc = '$tgl',
  status = '3',
  status_baca_kades2 = '1',
  status_baca_bendes1 = '1' WHERE id_proposal = '$id'");

    echo '<script language="javascript">swal("Berhasil menyetujui!", "Proposal berhasil dikirim ke Bendahara Desa", "success").then(() => { window.location="proposal-kades"; });</script>';


?>
