<body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="<?= base_url() ?>index.php/user"><img src="<?= base_url() ?>template2/images/polres_bantul.png" alt="Image" width="45" height="60"></a>
                <a href="<?= base_url() ?>index.php/user"><img src="<?= base_url() ?>template2/images/satlantas.png" alt="Image" width="55" height="55"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= base_url() ?>index.php/user">Home</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= base_url() ?>index.php/user/tabelsemua">Data Kasus</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= base_url() ?>index.php/user/lapor">Laporkan Kecelakaan</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= base_url() ?>index.php/login/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>