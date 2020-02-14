<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
	 <meta charset="utf-8">
	 <script type="text/javascript" src="assets/vendor/sweetalert/sweetalert.min.js"></script>
 </head>
</html>
<?php
include "koneksi.php";

	/*--------------------------------------------------------------------------*/


		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
		}

        $username = antiinjection($_POST['username']);
        $password_lama			= antiinjection($_POST['password_lama']);
    	$password_baru			= antiinjection($_POST['password_baru']);
        $konfirmasi_password	= antiinjection($_POST['konfirmasi_password']);
        // $pass_baru = md5($password_baru);

				$cek_user=mysqli_num_rows(mysqli_query($connect, "SELECT * FROM perangkat_desa WHERE username = '$username'"));
					if ($cek_user > 0) {
						$cek=mysqli_query($connect, "SELECT * FROM perangkat_desa WHERE username = '$username'");
						$d=mysqli_fetch_object($cek);
						if ($d->password == $password_lama) {
						  	if ($password_baru == $konfirmasi_password) {
	                mysqli_query($connect, "UPDATE `perangkat_desa` SET
	                `password`='$password_baru' WHERE `username` = '$username'");
	                echo '<script language="javascript">swal("Update berhasil!", "Password telah dirubah", "success").then(() => { window.location="dashboard-sekdes"; });</script>';	  
							} else {
							echo '<script language="javascript">swal("Update gagal!", "Password tidak cocok!", "error").then(() => { window.history.back(); });</script>';
							}
						}else{
							echo '<script language="javascript">swal("Update gagal!", "Password tidak cocok!", "error").then(() => { window.history.back(); });</script>';
						}
					} else {
					echo '<script language="javascript">swal("Update gagal!", "Password tidak ditemukan!", "error").then(() => { window.history.back(); });</script>';
					}
?>