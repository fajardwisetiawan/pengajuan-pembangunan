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
$id_proposal = antiinjection($_POST['id_proposal']);
$tanggal_proposal = antiinjection($_POST['tanggal_proposal']);
$judul_kegiatan = antiinjection($_POST['judul_kegiatan']);
$deskripsi_kegiatan = antiinjection($_POST['deskripsi_kegiatan']);

if (isset($_POST['ubah_proposal'])) {
	if($_FILES['lampiran2']['name']!='')
	{
		$target_dir = "documents/";
		$target_file = $target_dir . basename($id_proposal . "-" . $_FILES["lampiran2"]["name"]);
    	$filebaru2 = $id_proposal . "-" . $_FILES["lampiran2"]["name"];

		$uploadOk = 1;
		$documentFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


		// gambar 1
		$check = filesize($_FILES["lampiran2"]["tmp_name"]);
		if($check !== false) {
				$uploadOk = 1;
		} else {
			echo '<script language="javascript">swal("Simpan gagal!", "File bukan dokumen", "warning").then(() => { window.location="proposal-ditolak-pada-sekdes"; });</script>';
				$uploadOk = 0;
		}

		// Check file size
		if ($_FILES["lampiran2"]["size"] > 8000000) {
			echo '<script language="javascript">swal("Simpan gagal!", "Dokumen tidak boleh lebih dari 8MB", "warning").then(() => { window.location="proposal-ditolak-pada-sekdes"; });</script>';
				$uploadOk = 0;
		}
		// Allow certain file formats
		if($documentFileType != "pdf") {
			echo '<script language="javascript">swal("Simpan gagal!", "File hanya boleh berformat PDF", "warning").then(() => { window.location="proposal-ditolak-pada-sekdes"; });</script>';
				$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo '<script language="javascript">swal("Simpan gagal!", "File bukan PDF atau ukuran melebihi 8MB!", "warning").then(() => { window.location="proposal-ditolak-pada-sekdes"; });</script>';
		// if everything is ok, try to upload file
		} else {
				if (move_uploaded_file($_FILES["lampiran2"]["tmp_name"], $target_file)) {

					mysqli_query($connect, "UPDATE proposal_pengajuan SET
					status = 2,
					tanggal_proposal = '$tanggal_proposal',
					judul_kegiatan = '$judul_kegiatan',
					deskripsi_kegiatan = '$deskripsi_kegiatan',
					lampiran2 = '$filebaru2' WHERE id_proposal = '$id_proposal'");
					echo '<script language="javascript">swal("Perbaikan berhasil!", "Pengajuan telah diperbaiki dan dikirim ke Kepala Desa", "success").then(() => { window.location="proposal-ditolak-pada-sekdes"; });</script>';


				} else {
					echo '<script language="javascript">swal("Simpan gagal!", "File gagal diupload!", "warning").then(() => { window.location="proposal-ditolak-pada-sekdes"; });</script>';
				}
		}
	}
	
	}else {
	mysqli_query($connect, "UPDATE proposal_pengajuan SET
      status = 2,
	  tanggal_proposal = '$tanggal_proposal',
      judul_kegiatan = '$judul_kegiatan',
      deskripsi_kegiatan = '$deskripsi_kegiatan' WHERE id_proposal = '$id_proposal'");
      echo '<script language="javascript">swal("Perbaikan berhasil!", "Pengajuan telah diperbaiki dan dikirim ke Kepala Desa", "success").then(() => { window.location="proposal-ditolak-pada-sekdes"; });</script>';

}
?>