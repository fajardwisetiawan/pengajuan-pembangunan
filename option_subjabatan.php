<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data ID Provinsi yang dikirim via ajax post
$id = $_POST['jabatan'];

// Buat query untuk menampilkan data kota dengan provinsi tertentu (sesuai yang dipilih user pada form)
$sql = mysqli_query($connect, "SELECT * FROM subjabatan WHERE nama_jabatan='".$id."' ORDER BY nama_jabatan");

// Buat variabel untuk menampung tag-tag option nya
// Set defaultnya dengan tag option Pilih
$html = "<option value=''>Pilih Sub-jabatan</option>";

while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
	$html .= "<option value='".$data['nama_subjabatan']."'>".$data['nama_subjabatan']."</option>"; // Tambahkan tag option ke variabel $html
}

$callback = array('data_subjabatan'=>$html); // Masukan variabel html tadi ke dalam array $callback dengan index array : data_kota

echo json_encode($callback); // konversi varibael $callback menjadi JSON
?>
