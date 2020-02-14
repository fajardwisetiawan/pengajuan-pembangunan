<?php
session_start();
include 'session.php';
include 'koneksi.php';
$qy_user = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM perangkat_desa WHERE id_perangkat_desa = '$_SESSION[id_perangkat_desa]'"));

$jabatan = $qy_user['jabatan'];
?>


<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Feb 2019 00:36:40 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>E-PROMI - KAUR Pembangunan | Desa Kedungbenda, Kecamatan Kemangkon, Kabupaten Purbalingga</title>
    <link rel="apple-touch-icon" href="assets/assets/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/assets/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/vendors/css/extensions/unslider.css">
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/vendors/css/weather-icons/climacons.min.css">
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/fonts/meteocons/style.min.css">
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/daterange/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/css/app.min.css">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/css/pages/timeline.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/pickers/daterange/daterange.min.css">
    
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/assets/assets/css/style.css">
    <!-- END Custom CSS-->
  </head>
  <body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row position-relative">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item mr-auto"><a class="navbar-brand" href="index-2.html"><img class="brand-logo" alt="stack admin logo" style="width:33px;height:30px;" src="assets/assets/app-assets/images/logo/purbalingga_logo.png">
                <h3 class="brand-text">E-PROMI</h3></a></li>
            <li class="nav-item d-none d-md-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <!-- <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li> -->
            </ul>
           
            <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i><span class="badge badge-pill badge-default badge-danger badge-default badge-up"><strong class="count">0</strong></span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <li class="dropdown-menu-header">
                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Pemberitahuan</span><span class="notification-tag badge badge-default badge-danger float-right m-0">5 New</span></h6>
                  </li>
                  <li class="scrollable-container media-list hasil"></li>
                  <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li>
                </ul>
              </li>
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                  <span class="avatar avatar-online">
                    <?php if($qy_user['foto'] == ''){ ?>
                    <img src="images/avatar0.jpg" alt="avatar" style="width:33px;height:30px;"/><i></i>
                    <?php }else{ ?>
                      <img src="images/<?= $qy_user['foto']; ?>" alt="avatar" style="width:33px;height:30px;"/><i></i>
                    </span>
                    <?php } ?>
                  <span class="user-name"><?= $qy_user['nama']; ?><input type="hidden" id="jab" value="<?=$jabatan;?>"/></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="edit-user-kaurpem"><i class="ft-user"></i> Kelola Akun</a>
                <a class="dropdown-item" href="edit-password-kaurpem"><i class="ft-settings"></i> Ubah Password</a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="keluar-user"><i class="ft-power"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" navigation-header"><span>KAUR PEMBANGUNAN</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
          </li>
          <li class=" nav-item"><a class="update-pro" href="dashboard-kaurpem" title="Dashboard"><i class="icon-speedometer"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
          <!-- <li class="">
	          <a href="daftar-pembangunan" title="Daftar Pembangunan"><i class="fa fa-building-o"></i><span class="menu-title" data-i18n="">Daftar Pembangunan</span></a>
          </li> -->
          <li class=" nav-item"><a href="#"><i class="fa fa-building-o"></i><span class="menu-title" data-i18n="">Pembangunan</span></a>
            <ul class="menu-content">
				      <li><a href="daftar-pembangunan" title="Daftar Pembangunan" class="notification-item">Daftar Pembangunan</a>
				      </li>
              <li><a href="riwayat-pembangunan-terlaksana" title="Riwayat Pembangunan Terlaksana" class="notification-item">Riwayat Pembangunan Terlaksana</a>
				      </li>
            </ul>
		      </li>
          <li class=" nav-item"><a href="#"><i class="fa fa-wrench"></i><span class="menu-title" data-i18n="">Tahap Pembangunan</span></a>
            <ul class="menu-content">
				      <li><a href="pembangunan-belum-dikerjakan" title="Pembangunan Belum Dikerjakan" class="notification-item">Belum Dikerjakan</a>
				      </li>
              <li><a href="pembangunan-dalam-proses" title="Pembangunan Dalam Proses" class="notification-item">Dalam Proses</a>
				      </li>
              <li><a href="pembangunan-selesai-pengerjaan" title="Pembangunan Selesai Pengerjaan" class="notification-item">Selesai Pengerjaan</a>
				      </li>
            </ul>
		      </li>
        </ul>
      </div>
    </div>
