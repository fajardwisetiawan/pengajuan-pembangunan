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
$tanggal_proposal = antiinjection($_POST['tanggal_proposal']);
$tahun = date('Y');
$nomor_proposal = "";
$kegiatan = mysqli_query($connect,"Select * FROM proposal_pengajuan WHERE id_proposal='$id'");
$judul_kegiatan = mysqli_fetch_object($kegiatan);
$vJudul_kegiatan = $judul_kegiatan->judul_kegiatan;
$vDesa = "Kedung Benda";
$nomor_surat =$judul_kegiatan->nomor_proposal;
// $nomor_proposal_depan = substr($nomor_surat,0,2);
// $vnomor_proposal_depan = 0;
// if(empty($nomor_surat)){
// 	$vnomor_proposal_depan = 0;
// }else {
// 	$vnomor_proposal_depan = (int) $nomor_proposal_depan;
// }

$sub_nomor ="";
$time=date("m/y");
		if (strlen($id)==1){
			 $sub_nomor = "00". ($id+1);
		}else if(strlen($id)==2){
			 $sub_nomor = "0".($id+1);
		}else if(strlen($id)==3){
			 $sub_nomor =($id+1);
		}
$nomor_proposal = $sub_nomor."/".$vDesa."/".$vJudul_kegiatan."/".$time;

	if($_FILES['file']['name']!='')
	{
		$target_dir = "documents/";
		$target_file = $target_dir . basename($id . "-" . $_FILES["file"]["name"]);
    	$filebaru = $id . "-" . $_FILES["file"]["name"];

		$uploadOk = 1;
		$documentFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


		// gambar 1
		$check = filesize($_FILES["file"]["tmp_name"]);
		if($check !== false) {
				$uploadOk = 1;
		} else {
			echo '<script language="javascript">swal("Simpan gagal!", "File bukan dokumen", "warning").then(() => { window.location="perencanaan-kaurper"; });</script>';
				$uploadOk = 0;
		}

		// Check file size
		if ($_FILES["file"]["size"] > 8000000) {
			echo '<script language="javascript">swal("Simpan gagal!", "Dokumen tidak boleh lebih dari 8MB", "warning").then(() => { window.location="perencanaan-kaurper"; });</script>';
				$uploadOk = 0;
		}
		// Allow certain file formats
		if($documentFileType != "pdf") {
			echo '<script language="javascript">swal("Simpan gagal!", "File hanya boleh berformat PDF!", "warning").then(() => { window.location="perencanaan-kaurper"; });</script>';
				$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo '<script language="javascript">swal("Simpan gagal!", "File bukan PDF atau ukuran melebihi 8MB!", "warning").then(() => { window.location="perencanaan-kaurper"; });</script>';
		// if everything is ok, try to upload file
		} else {
				if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

					$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM proposal_pengajuan WHERE nomor_proposal = '$nomor_proposal'"));
					if ($cek > 0) {
					echo '<script language="javascript">swal("Simpan gagal!", "Data proposal sudah ada!", "warning").then(() => { window.location="perencanaan-kaurper"; });</script>';
					}else{
					mysqli_query($connect, "UPDATE proposal_pengajuan SET 
						status = '1',
						status_baca_kaurper = '1',
						status_baca_sekdes1 = '1',
						tanggal_proposal = '$tanggal_proposal',
						tahun_proposal = '$tahun',
						nomor_proposal = '$nomor_proposal',
						lampiran1 = '$filebaru' WHERE id_proposal = '$id'");

						echo '<script language="javascript">swal("Pengajuan berhasil!", "Proposal berhasil diajukan ke Sekertaris Desa", "success").then(() => { window.location="perencanaan-kaurper"; });</script>';
					}

				} else {
					echo '<script language="javascript">swal("Simpan gagal!", "File gagal diupload!", "warning").then(() => { window.location="perencanaan-kaurper"; });</script>';
				}
		}
	}

	// $cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM proposal_pengajuan WHERE nomor_proposal = '$nomor_proposal'"));
	// if ($cek > 0) {
	//   echo '<script language="javascript">swal("Simpan gagal!", "Data proposal sudah ada!", "warning").then(() => { window.location="perencanaan-kaurper"; });</script>';
	// }else{
	// mysqli_query($connect, "UPDATE proposal_pengajuan SET 
	// 	status = '1',
	// 	status_baca_kaurper = '1',
	// 	status_baca_sekdes1 = '1',
	// 	tanggal_proposal = '$tanggal_proposal',
	// 	nomor_proposal = '$nomor_proposal',
	// 	lampiran1 = '$filebaru' WHERE id_proposal = '$id'");

	// 	echo '<script language="javascript">swal("Pengajuan berhasil!", "Proposal berhasil diajukan ke Sekertaris Desa", "success").then(() => { window.location="perencanaan-kaurper"; });</script>';
	// }
?>
