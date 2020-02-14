<?php 
    if (isset($_GET['lampiran1'])) {
    $lampiran1    = $_GET['lampiran1'];

    $back_dir    ="documents/";
    $file = $back_dir.$_GET['lampiran1'];
     
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: private');
            header('Pragma: private');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            
            exit;
        } 
        else {
            echo '<script language="javascript">swal("Download gagal!", "Data lampiran tidak ditemukan!", "warning").then(() => { window.location="daftar-pembangunan"; });</script>';

        }
    }
?>