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
			echo '<script language="javascript">swal("Simpan gagal!", "File bukan dokumen", "warning").then(() => { window.location="proposal-sekdes"; });</script>';
				$uploadOk = 0;
		}

		// Check file size
		if ($_FILES["file"]["size"] > 8000000) {
			echo '<script language="javascript">swal("Simpan gagal!", "Dokumen tidak boleh lebih dari 8MB", "warning").then(() => { window.location="proposal-sekdes"; });</script>';
				$uploadOk = 0;
		}
		// Allow certain file formats
		if($documentFileType != "pdf") {
			echo '<script language="javascript">swal("Simpan gagal!", "File hanya boleh berformat PDF!", "warning").then(() => { window.location="proposal-sekdes"; });</script>';
				$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo '<script language="javascript">swal("Simpan gagal!", "File bukan PDF atau ukuran melebihi 8MB!", "warning").then(() => { window.location="proposal-sekdes"; });</script>';
		// if everything is ok, try to upload file
		} else {
				if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

					mysqli_query($connect, "UPDATE proposal_pengajuan SET 
					status = '2',
					status_baca_sekdes2 = '1',
					status_baca_kades1 = '1',
					lampiran2 = '$filebaru' WHERE id_proposal = '$id'");

					echo '<script language="javascript">swal("Pengajuan berhasil!", "Proposal berhasil diajukan ke Kepala Desa", "success").then(() => { window.location="proposal-sekdes"; });</script>';

				} else {
					echo '<script language="javascript">swal("Simpan gagal!", "File gagal diupload!", "warning").then(() => { window.location="proposal-sekdes"; });</script>';
				}
		}
	}


//   mysqli_query($connect, "UPDATE proposal_pengajuan SET 
// 	status = '2',
// 	status_baca_sekdes2 = '1',
// 	status_baca_kades1 = '1',
// 	lampiran2 = '$filebaru' WHERE id_proposal = '$id'");

//     echo '<script language="javascript">swal("Pengajuan berhasil!", "Proposal berhasil diajukan ke Kepala Desa", "success").then(() => { window.location="proposal-sekdes"; });</script>';


?>
