<?php 
    if (isset($_GET['id'])) {
    $file    = $_GET['id'];

    $back_dir    ="documents/";
    $filename = $back_dir.$_GET['id'];
     
    header('Content-type: application/pdf'); 
  
    header('Content-Disposition: inline; filename="' . $filename . '"'); 
      
    header('Content-Transfer-Encoding: binary'); 
      
    header('Accept-Ranges: bytes'); 
      
    // Read the file 
    readfile($filename);
    }
?> 