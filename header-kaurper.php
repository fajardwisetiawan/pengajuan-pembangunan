<?php
session_start();
include 'session.php';
include 'koneksi.php';
$qy_user = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM perangkat_desa WHERE id_perangkat_desa = '$_SESSION[id_perangkat_desa]'"));
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
    <title>E-PROMI - KAUR Perencanaan | Desa Kedungbenda, Kecamatan Kemangkon, Kabupaten Purbalingga</title>
    <link rel="apple-touch-icon" href="assets/assets/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/assets/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/vendors/css/extensions/unslider.css">
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/vendors/css/weather-icons/climacons.min.css">
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/fonts/meteocons/style.min.css">
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/vendors/css/charts/morris.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/css/app.min.css">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/css/pages/timeline.min.css">

    <link rel="stylesheet" type="text/css" href="assets/assets/app-assets/css/plugins/forms/extended/form-extended.min.css">
    
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
            <li class="nav-item mr-auto"><a class="navbar-brand" href="dashboard-kaurper"><img class="brand-logo" alt="stack admin logo" style="width:33px;height:30px;" src="assets/assets/app-assets/images/logo/purbalingga_logo.png">
                <h2 class="brand-text">E-PROMI</h2></a></li>
            <li class="nav-item d-none d-md-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <!-- <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li> -->
            </ul>
            <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                  <span class="avatar avatar-online">
                    <?php if($qy_user['foto'] == ''){ ?>
                    <img src="images/avatar0.jpg" alt="avatar" style="width:33px;height:30px;"/><i></i>
                    <?php }else{ ?>
                      <img src="images/<?= $qy_user['foto']; ?>" alt="avatar" style="width:33px;height:30px;"/><i></i>
                    </span>
                    <?php } ?>
                  <span class="user-name"><?= $qy_user['nama']; ?></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="edit-user-kaurper"><i class="ft-user"></i> Kelola Akun</a>
                <a class="dropdown-item" href="edit-password-kaurper"><i class="ft-settings"></i> Ubah Password</a>
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
          <li class=" navigation-header"><span>KAUR Perencanaan</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
          </li>
          <li class=" nav-item"><a class="update-pro" href="dashboard-kaurper" title="Dashboard"><i class="icon-speedometer"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
          <li class="">
	          <a href="perencanaan-kaurper" title="Perencanaan Pembangunan"><i class="ft-clipboard"></i><span class="menu-title" data-i18n="">Perencanaan Pembangunan</span></a>
          </li>
          <!-- <li class="">
	          <a href="pengajuan-kaurper" title="Pengajuan Pembangunan"><i class="icon-paper-plane"></i><span class="menu-title" data-i18n="">Pengajuan Pembangunan</span></a>
          </li> -->
          <li class=" nav-item"><a href="#"><i class="fa fa-spinner"></i><span class="menu-title" data-i18n="">Tahap Pengajuan</span></a>
            <ul class="menu-content">
				      <li><a href="pengajuan-kaurper" title="Pengajuan Pembangunan" class="notification-item">Pengajuan Pembangunan</a>
				      </li>
              <li><a href="proposal-diterima-oleh-sekdes" title="Diterima Sekertaris Desa" class="notification-item">Diterima Sekertaris Desa</a>
				      </li>
              <li><a href="proposal-ditolak-pada-kaurper" title="Ditolak Kepala Desa" class="notification-item">Ditolak Kepala Desa</a>
				      </li>
            </ul>
          </li>
          <!-- <li class="">
	          <a href="proposal-ditolak-pada-kaurper" title="Proposal Ditolak Kepala Desa"><i class="icon-ban"></i><span class="menu-title" data-i18n="">Proposal Ditolak KADES</span></a>
          </li> -->
        </ul>
      </div>
    </div>