<body>
		<!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0 bg-secondary">
        <div class="container-fluid">
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <ul class="navbar-nav navbar-nav-left">
              <a href="<?= base_url() ?>index.php/home"><img src="<?= base_url() ?>template2/images/polres_bantul.png" alt="Image" width="40" height="50"></a>
              <a href="<?= base_url() ?>index.php/home"><img src="<?= base_url() ?>template2/images/satlantas.png" alt="Image" width="45" height="45"></a>
            </ul>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <h1 class="text-white fs-3 fw-bolder">SIG PEMETAAN TITIK LOKASI RAWAN KECELAKAAN LALU LINTAS KABUPATEN BANTUL</h1>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                    <span class="nav-profile-name text-white">
                      <?php echo ucfirst($this->session->userdata('nama')); ?>
                    </span>
                    <span class="online-status"></span>
                    <img src="<?= base_url() ?>template/images/faces/akun.png" alt="profile"/>
                  </a>
                  
                </li>
            </ul>
            
          </div>
        </div>
      </nav>