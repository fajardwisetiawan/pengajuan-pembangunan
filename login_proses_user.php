<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
	 <meta charset="utf-8">
	 <script type="text/javascript" src="assets/vendor/sweetalert/sweetalert.min.js"></script>
 </head>
</html>


<?php

include('koneksi.php');

function antiinjection($data){
	$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  	return $filter_sql;
}

$username = antiinjection($_POST['username']);
$password = antiinjection($_POST['password']);


$sql=mysqli_query($connect, "SELECT * FROM perangkat_desa WHERE username='$username' AND password='$password'");
$f=mysqli_fetch_array($sql);
if ($f['username']==$username and $f['password']==$password){

	$_SESSION['username'] = $f['username'];
	$_SESSION['id_perangkat_desa'] = $f['id_perangkat_desa'];
	$_SESSION['jabatan'] = $f['jabatan'];
	if($f['jabatan'] == 'Kepala Desa'){
		echo '<script language="javascript">swal("Login berhasil!", "Silahkan Masuk!", "success").then(() => { window.location="dashboard-kades"; });</script>';
	
	}elseif($f['jabatan'] == 'Sekertaris Desa'){
		// $_SESSION['username']=$f['username'];
		echo '<script language="javascript">swal("Login berhasil!", "Silahkan Masuk!", "success").then(() => { window.location="dashboard-sekdes"; });</script>';
	
	}elseif($f['jabatan'] == 'Bendahara Desa'){
		// $_SESSION['username']=$f['username'];
		echo '<script language="javascript">swal("Login berhasil!", "Silahkan Masuk!", "success").then(() => { window.location="dashboard-bendes"; });</script>';
	
	}elseif($f['jabatan'] == 'KAUR Perencanaan'){
		// $_SESSION['username']=$f['username'];
		echo '<script language="javascript">swal("Login berhasil!", "Silahkan Masuk!", "success").then(() => { window.location="dashboard-kaurper"; });</script>';
	
	}elseif($f['jabatan'] == 'KAUR Pembangunan'){
		// $_SESSION['username']=$f['username'];
		echo '<script language="javascript">swal("Login berhasil!", "Silahkan Masuk!", "success").then(() => { window.location="dashboard-kaurpem"; });</script>';
	}else{
	echo '<script language="javascript">swal("Login Gagal!", "Silahkan cek lagi username dan password anda!", "error").then(() => { window.location="masuk-user"; });</script>';
	}
}else{
echo '<script language="javascript">swal("Login Gagal!", "Silahkan cek lagi username dan password anda!", "error").then(() => { window.location="masuk-user"; });</script>';
}

?>