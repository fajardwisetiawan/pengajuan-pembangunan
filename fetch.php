<?php
include("koneksi.php");
$jabayan = $_POST['jabatan'];
// echo $_SESSION['jabatan'];
if(isset($_POST['view'])){
 
// $con = mysqli_connect("localhost", "root", "", "notif");
if($_POST["view"] != '')
{
  $update_query = "";
  if($jabayan=='Kepala Desa'){

  }elseif ($jabayan=="Sekertaris Desa") {
    # code...
  }elseif ($jabayan=="Bendahara Desa") {
    # code...
  }elseif ($jabayan=='KAUR Perencanaan') {
    # code...
  }elseif ($jabayan=="KAUR Pembangunan") {
    $update_query = "UPDATE proposal_pengajuan SET notif = 1 WHERE status = '4' AND notif=0";
  }
  
   mysqli_query($connect, $update_query);
}
$query = "";
if($jabayan=='Kepala Desa'){

}elseif ($jabayan=='Sekertaris Desa') {
  # code...
}elseif ($jabayan=='Bendahara Desa') {
  # code...
}elseif ($jabayan=='KAUR Perencanaan') {
  # code...
}elseif ($jabayan=="KAUR Pembangunan") {
  $query = "SELECT * FROM proposal_pengajuan status = '4' ORDER BY id_proposal DESC LIMIT 5";
}

$result = mysqli_query($connect, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
    $output .='<li class="scrollable-container media-list"><a href="javascript:void(0)"><div class="media">
    <div class="media-left align-self-center"></div>
    <div class="media-body">
      <h6 class="media-heading">'.$row["judul_kegiatan"].'</h6>
      <p class="notification-text font-small-3 text-muted">'.$row["deskripsi_kegiatan"].'</p><small>
        <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time></small>
    </div></a></li>';
 
}
}
else{
    $output .='<li class="scrollable-container media-list "><div class="media">
    <div class="media-body">
      <h6 class="media-heading">Data tidak ada</h6>
     </div></li>';
}
$status_query = "";
if($jabayan=='Kepala Desa'){

}elseif ($jabayan=='Sekertaris Desa') {
  # code...
}elseif ($jabayan=='Bendahara Desa') {
  # code...
}elseif ($jabayan=='KAUR Perencanaan') {
  # code...
}elseif ($jabayan=="KAUR Pembangunan") {
  $status_query = "SELECT * FROM proposal_pengajuan WHERE status = '4' AND notif=0";
}

$result_query = mysqli_query($connect, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
echo json_encode($data);
}
?>