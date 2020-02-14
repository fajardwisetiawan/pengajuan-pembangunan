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

$tanggal_proposal = antiinjection($_POST['tanggal_proposal']);
$nomor_proposal = antiinjection($_POST['nomor_proposal']);
$jenis_kegiatan = antiinjection($_POST['jenis_kegiatan']);
$judul_kegiatan = antiinjection($_POST['judul_kegiatan']);
$deskripsi_kegiatan = antiinjection($_POST['deskripsi_kegiatan']);

if (isset($_POST['ubah_lampiran'])) {
	if($_FILES['file']['name']!='')
	{
		$target_dir = "documents/";
		$target_file = $target_dir . basename($nomor_proposal . "-" . $_FILES["file"]["name"]);
    $filebaru = $nomor_proposal . "-" . $_FILES["file"]["name"];

		$uploadOk = 1;
		$documentFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


		// gambar 1
		$check = filesize($_FILES["file"]["tmp_name"]);
		if($check !== false) {
				$uploadOk = 1;
		} else {
			echo '<script language="javascript">swal("Simpan gagal!", "File bukan dokumen", "warning").then(() => { window.location="pengajuan-kadus"; });</script>';
				$uploadOk = 0;
		}

		// Check file size
		if ($_FILES["file"]["size"] > 8000000) {
			echo '<script language="javascript">swal("Simpan gagal!", "Dokumen tidak boleh lebih dari 8MB", "warning").then(() => { window.location="pengajuan-kadus"; });</script>';
				$uploadOk = 0;
		}
		// Allow certain file formats
		if($documentFileType != "doc" && $documentFileType != "pdf" && $documentFileType != "docx") {
			echo '<script language="javascript">swal("Simpan gagal!", "File hanya boleh berupa DOC, PDF atau DOCX", "warning").then(() => { window.location="pengajuan-kadus"; });</script>';
				$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo '<script language="javascript">swal("Simpan gagal!", "File gagal diupload!", "warning").then(() => { window.location="pengajuan-kadus"; });</script>';
		// if everything is ok, try to upload file
		} else {
				if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
				} else {
					echo '<script language="javascript">swal("Simpan gagal!", "File gagal diupload!", "warning").then(() => { window.location="pengajuan-kadus"; });</script>';
				}
		}
	}

	
	$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM proposal_pengajuan WHERE nomor_proposal = '$nomor_proposal'"));
	if ($cek > 0) {
	  echo '<script language="javascript">swal("Simpan gagal!", "Data Perangkat Desa Sudah Ada!", "warning").then(() => { window.location="pengajuan-kaurper"; });</script>';
	}else{
    mysqli_query($connect, "INSERT INTO proposal_pengajuan (tanggal_proposal, nomor_proposal, jenis_kegiatan, judul_kegiatan, deskripsi_kegiatan, lampiran, status)
      VALUES ('$tanggal_proposal','$nomor_proposal','$jenis_kegiatan','$judul_kegiatan', '$deskripsi_kegiatan', '$filebaru', '1')");
		echo '<script language="javascript">swal("Simpan berhasil!", "Data Perangkat Desa tersimpan", "success").then(() => { window.location="pengajuan-kaurper"; });</script>';
	}
}else{
	$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM proposal_pengajuan WHERE nomor_proposal = '$nomor_proposal'"));
	if ($cek > 0) {
	  echo '<script language="javascript">swal("Simpan gagal!", "Data Perangkat Desa Sudah Ada!", "warning").then(() => { window.location="pengajuan-kaurper"; });</script>';
	}else{
    mysqli_query($connect, "INSERT INTO proposal_pengajuan (tanggal_proposal, nomor_proposal, jenis_kegiatan, judul_kegiatan, deskripsi_kegiatan, status)
			VALUES ('$tanggal_proposal','$nomor_proposal','$jenis_kegiatan','$judul_kegiatan', '$deskripsi_kegiatan', '1')");
      echo '<script language="javascript">swal("Simpan berhasil!", "Data Perangkat Desa tersimpan", "success").then(() => { window.location="pengajuan-kaurper"; });</script>';
	}
}
?>
