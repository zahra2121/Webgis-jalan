<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo form_open('login/input_login');?>

<!DOCTYPE html>
<html lang="en">

<body>

<?php
      // Mendeklarasikan variabel dan meng-set data kosong ke variable tersebut
      $usernameErr = $passwordErr = "";
      $username = $password = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["password"])) {
              $passwordErr = "Password harus diisi";
          } else {
              if (strlen($_POST["password"]) <= 5) {
                  $passwordErr = "Password minimal 5 digit";
              } else {
                  $password = test_input($_POST["password"]);
              }
          }

          if (empty($_POST["username"])) {
              $usernameErr = "Username harus diisi";
          } else {
              $username = test_input($_POST["username"]);
          }
      }

      function test_input($data)
      {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
      }
?>

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="main-panel">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">

              <?php
              // Cetak jika ada notifikasi
                if($this->session->flashdata('sukses')) {
                      echo '<p class="warning" style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>';
                }
              ?>
                <?php
                  // notifikasi CRUD
                    if($this->session->flashdata('pesan')) {
                      echo '<div class="alert alert-success">';
                      echo $this->session->flashdata('pesan');
                      echo '</div>';
                    }
                  ?>
              
                <center><h2 class="font-weight-light"><b>LOGIN</b></h2></center><br><br>

                <form class="pt-3">
                  <div class="form-group">
                    <input type="username" class="form-control form-control-lg" name="username" id="username" placeholder="Username" value="<?php echo set_value('username'); ?>">
                    <span class="error"><?php echo $usernameErr; ?></span>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
                    <span class="error"><?php echo $passwordErr; ?></span>
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Login</button>
                    <!-- <button onclick='javascript:alert("Halo.. Selamat Datang di SistemIT.com")' href='#'>Tombol Ini</button> -->
                  </div>

                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <!-- <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input">
                        Keep me signed in
                      </label> -->
                    </div>
                    <a href="<?= base_url() ?>index.php/lupa_password" class="auth-link text-black">Forgot password?</a>
                  </div>
                  <div class="text-center mt-4 font-weight-light">
                    Belum daftar? <a href="<?= base_url() ?>index.php/register" class="text-primary">Daftar Akun</a>
                  </div>
                </form>

                <?php echo form_close();?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="<?= base_url() ?>template/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?= base_url() ?>template/js/template.js"></script>
  <!-- endinject -->
</body>

</html>
