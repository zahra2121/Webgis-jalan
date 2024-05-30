<nav class="button-navbar">
        <div class="container">
            <ul class="nav page-navigation">
              <li class="nav-item">
			  	        <a class="nav-link" href="<?= base_url() ?>index.php/home">
                    <i class="mdi mdi-google-maps menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="<?= base_url() ?>index.php/home/blackspot" class="nav-link">
                    <i class="mdi mdi-grid menu-icon"></i>
                    <span class="menu-title">Tabel Black Spot</span>
                    <i class="menu-arrow"></i>
                  </a>
                  <div class="submenu">
                      <ul>
                          <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>index.php/home/input_blackspot">Tambah Area</a></li>
                          <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>index.php/home/blackspot">Lihat Data</a></li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
			  	        <a class="nav-link" href="<?= base_url() ?>index.php/home/kasus">
                    <i class="mdi mdi-file menu-icon"></i>
                    <span class="menu-title">Tabel Kasus</span>
                    <i class="menu-arrow"></i>
                  </a>
                  <div class="submenu">
                      <ul>
                          <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>index.php/home/input_kasus">Tambah Area</a></li>
                          <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>index.php/home/kasus">Lihat Data</a></li>
                      </ul>
                  </div>
              </li>
			        <li class="nav-item">
			  	        <a class="nav-link" href="<?= base_url() ?>index.php/home/lapor">
                    <i class="mdi mdi-clipboard-account menu-icon"></i>
                    <span class="menu-title">User Lapor</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
			  	        <a class="nav-link" href="<?= base_url() ?>index.php/home/daftar_user">
                    <i class="mdi mdi-account menu-icon"></i>
                    <span class="menu-title">Daftar User</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                <div class="template-demo mt-2">
                  <a href="<?= base_url() ?>index.php/login/logout">
                  <button class="btn btn-outline-dark btn-icon-text" type="button">
                    <i class="mdi mdi-highway btn-icon-prepend mdi-36px"></i>
                    <span class="d-inline-block text-left">
                      <small class="font-weight-light d-block">Kunjungi</small>
                      Website
                    </span>
                  </button></a>
                </div>
              </li>
            </ul>
        </div>
      </nav>
	</div><br><br><br>