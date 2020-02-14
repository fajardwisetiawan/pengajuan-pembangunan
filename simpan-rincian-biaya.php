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

$id = antiinjection($_POST['id']);
$rincian = antiinjection($_POST['rincian']);
$biaya = antiinjection($_POST['biaya']);

if($_FILES['foto']['name']!='')
	{
		$target_dir = "images/";
		$target_file = $target_dir . basename($id . "-" . $_FILES["foto"]["name"]);
        $fotobaru = $id . "-" . $_FILES["foto"]["name"];

		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


		// gambar 1
		$check = getimagesize($_FILES["foto"]["tmp_name"]);
		if($check !== false) {
				$uploadOk = 1;
		} else {
			echo '<script language="javascript">swal("Simpan gagal!", "File bukan gambar", "warning").then(() => { window.location="perangkat-desa"; });</script>';
				$uploadOk = 0;
		}

		// Check file size
		if ($_FILES["foto"]["size"] > 2000000) {
			echo '<script language="javascript">swal("Simpan gagal!", "Gambar tidak boleh lebih dari 2MB", "warning").then(() => { window.location="perangkat-desa"; });</script>';
				$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			echo '<script language="javascript">swal("Simpan gagal!", "Gambar hanya boleh berupa JPG, PNG atau JPEG", "warning").then(() => { window.location="perangkat-desa"; });</script>';
				$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo '<script language="javascript">swal("Simpan gagal!", "Foto gagal diupload!", "warning").then(() => { window.location="perangkat-desa"; });</script>';
		// if everything is ok, try to upload file
		} else {
				if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {

                    $query = mysqli_query($connect, "INSERT INTO rincian_biaya (id_proposal, rincian, biaya, gambar_kwitansi)
                    VALUES ('$id', '$rincian', '$biaya', '$fotobaru')");

                    if($query){
                        $insert_id = $connect->insert_id;
                        $vrab = mysqli_query($connect,"SELECT * FROM proposal_pengajuan WHERE id_proposal='$id'");
                        $biayaa=0;
                        $rRab = mysqli_fetch_object($vrab);
                        $rab = $rRab->nilai_rab;
                        
                        $vjumlah= mysqli_query($connect,"SELECT * FROM rincian_biaya WHERE id_proposal='$id'");
                        while($r=mysqli_fetch_array($vjumlah)){
                        $biayaa += $r['biaya'];
                        }
                        
                    $total = $rab-$biayaa;
                        
                        if ($total>0){
                            
                            echo '<script language="javascript">swal("Simpan berhasil!", "Rincian biaya telah ditambahkan", "success").then(() => { window.location="rincian-biaya?id='.$id.'"; });</script>';
                        
                        }else if($total<0){
                        
                            $hapusss = mysqli_query($connect,"DELETE FROM `rincian_biaya` WHERE id_rinbi='$insert_id'");
                            if($hapusss){
                                echo '<script language="javascript">swal("Simpan gagal!", "Harga Material melebihi Nilai RAB!", "warning").then(() => { window.location="rincian-biaya?id='.$id.'"; });</script>';
                        
                            }
                            
                        }
                    }

				} else {
					echo '<script language="javascript">swal("Simpan gagal!", "Foto gagal diupload!", "warning").then(() => { window.location="perangkat-desa"; });</script>';
				}
		}
	}

// $query = mysqli_query($connect, "INSERT INTO rincian_biaya (id_proposal, rincian, biaya)
//     VALUES ('$id', '$rincian', '$biaya')");

// if($query){
//     $insert_id = $connect->insert_id;
//     $vrab = mysqli_query($connect,"SELECT * FROM proposal_pengajuan WHERE id_proposal='$id'");
//     $biayaa=0;
//     $rRab = mysqli_fetch_object($vrab);
//     $rab = $rRab->nilai_rab;
    
//     $vjumlah= mysqli_query($connect,"SELECT * FROM rincian_biaya WHERE id_proposal='$id'");
//     while($r=mysqli_fetch_array($vjumlah)){
//     $biayaa += $r['biaya'];
//     }
    
//    $total = $rab-$biayaa;
    
//     if ($total>0){
        
//         echo '<script language="javascript">swal("Simpan berhasil!", "Rincian biaya telah ditambahkan", "success").then(() => { window.location="rincian-biaya?id='.$id.'"; });</script>';
      
//     }else if($total<0){
       
//         $hapusss = mysqli_query($connect,"DELETE FROM `rincian_biaya` WHERE id_rinbi='$insert_id'");
//         if($hapusss){
//             echo '<script language="javascript">swal("Simpan gagal!", "Harga Material melebihi Nilai RAB!", "warning").then(() => { window.location="rincian-biaya?id='.$id.'"; });</script>';
      
//         }
        
//     }
// }




  
?>
