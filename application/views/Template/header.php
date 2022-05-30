<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Perwalian SI-UKDW</title>
    <!-- plugins:css -->
	<script src="<?= base_url() ?>assets/js/jquery-1.11.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html"><img src="<?= base_url() ?>assets/images/logo.png" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="<?= base_url() ?>assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
								<?php if($this->session->userdata('profile') == null){?>
                  <img class="img-xs rounded-circle " src="<?= base_url() ?>assets/images/faces/face15.jpg" alt="">


									<?php }else {?>
										<img class="img-xs rounded-circle " src="<?= base_url() ?>profile/<?= $this->session->userdata('profile'); ?>" alt="">
									<?php }?>
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?= $this->session->userdata('username');?></h5>
									<?php if($this->session->userdata('roles') == 1){ ?>
										<span>Mahasiswa</span>

									<?php }elseif($this->session->userdata('roles') == 2){?>
										<span>Dosen</span>
									
									<?php }else{?>
										<span>Admin</span>

									<?php } ?>


                </div>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
					<!-- MAHASISWA -->
					<?php if($this->session->userdata('roles') == 1){ ?>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?= base_url('/Mahasiswa/Dashboard/') ?>">
              <span class="menu-icon">
                <i class="mdi mdi-home"></i>
              </span>
              <span class="menu-title">Beranda</span>
            </a>
          </li>
					<li class="nav-item menu-items">
            <a class="nav-link" href="<?= base_url('/Mahasiswa/DosenWali/') ?>">
              <span class="menu-icon">
                <i class="mdi mdi-account-settings"></i>
              </span>
              <span class="menu-title">Info Dosen Wali</span>
            </a>
          </li>
					<li class="nav-item menu-items">
            <a class="nav-link" href="<?= base_url('/Mahasiswa/ProfileMhs/') ?>">
              <span class="menu-icon">
                <i class="mdi mdi-account"></i>
              </span>
              <span class="menu-title">Profil</span>
            </a>
          </li>

					<!-- DOSEN -->
					<?php }elseif($this->session->userdata('roles') == 2){?>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?= base_url('/Dosen/Dashboard/') ?>">
              <span class="menu-icon">
                <i class="mdi mdi-home"></i>
              </span>
              <span class="menu-title">Beranda</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?= base_url('/Dosen/Dashboard/ViewJadwal') ?>">
              <span class="menu-icon">
                <i class="mdi mdi-calendar-text"></i>
              </span>
              <span class="menu-title">Jadwal Perwalian</span>
            </a>
          </li>
					<?php }else{?>
         <!-- ADMIN -->
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?= base_url('/Admin/Dashboard') ?>">
              <span class="menu-icon">
                <i class="mdi mdi-home"></i>
              </span>
              <span class="menu-title">Beranda</span>
            </a>
          </li>
					<li class="nav-item menu-items">
						<a class="nav-link" href="<?= base_url('/Admin/Mahasiswa/') ?>">
							<span class="menu-icon">
								<i class="mdi mdi-account"></i>
							</span>
							<span class="menu-title">Mahasiswa</span>
						</a>
					</li>
          
					<li class="nav-item menu-items">
						<a class="nav-link" href="<?= base_url('/Admin/TambahDosen/') ?>">
							<span class="menu-icon">
								<i class="mdi mdi-account-settings"></i>
							</span>
							<span class="menu-title">Dosen</span>
						</a>
					</li>
					<li class="nav-item menu-items">
						<a class="nav-link" href="<?= base_url('/Admin/Jadwal/') ?>">
              <span class="menu-icon">
								<i class="mdi mdi-calendar-text"></i>
              </span>
              <span class="menu-title">Jadwal Perwalian</span>
            </a>
          </li>
					<li class="nav-item menu-items">
						<a class="nav-link" href="<?= base_url('/Admin/Krs') ?>">
							<span class="menu-icon">
								<i class="mdi mdi-file-document-box"></i>
							</span>
							<span class="menu-title">Krs Prediksi</span>
						</a>
					</li>
					<?php } ?>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?= base_url() ?>assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
									<?php if($this->session->userdata('profile') == null){?>
                    <img class="img-xs rounded-circle" src="<?= base_url() ?>assets/images/faces/face15.jpg" alt="">

									<?php }else {?>
                    <img class="img-xs rounded-circle" src="<?= base_url() ?>profile/<?= $this->session->userdata('profile')?>" alt="">

									<?php }?>
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?= $this->session->userdata('username');?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <!-- <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                    </div>
                  </a> -->
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="<?= base_url() .'login/logout'?>">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                  <!-- <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">Advanced settings</p>
                </div> -->
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
          