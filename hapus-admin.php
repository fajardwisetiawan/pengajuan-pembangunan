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

$id_admin = antiinjection($_POST['id_admin']);

$data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM admin WHERE id_admin='$id_admin'"));

if(is_file("images/".$data['foto']))
	 unlink("images/".$data['foto']);

	 $qy = mysqli_query($connect, "DELETE FROM admin WHERE id_admin = '$id_admin'");
			if($qy){
			    echo '<script language="javascript">swal("Hapus berhasil!", "Data User Terhapus!", "success").then(() => { window.location="kelola-admin"; });</script>';
			}else{
					echo '<script language="javascript">swal("Hapus Gagal!", "Data User Gagal Terhapus!", "error").then(() => { window.history.back(); });</script>';
			}

?>
