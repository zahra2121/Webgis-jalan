<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo form_open('register/input_user');?>

<!DOCTYPE html>
<html lang="en">
<body>
  <?php
      // Mendeklarasikan variabel dan meng-set data kosong ke variable tersebut
      $usernameErr = $passwordErr = $emailErr = $namaErr = $noErr= $confirmErr= "";
      $username = $password = $email = $nama= $no= $confirm= "";

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

          if (empty($_POST["nama"])) {
              $namaErr = "Nama harus diisi";
          } else {
              $nama = test_input($_POST["nama"]);
          }

          if (empty($_POST["username"])) {
              $usernameErr = "Username harus diisi";
          } else {
              $username = test_input($_POST["username"]);
          }

          if (empty($_POST["email"])) {
              $emailErr = "Email harus diisi";
          } else {
              $email = test_input($_POST["email"]);
          }

          if (empty($_POST["password_conf"])) {
              $confirmErr = "Konfirmasi harus diisi";
          } else {
            if($_POST["password_conf"] != $password){
              $confirmErr = "Konfirmasi harus sama dengan Password";
            }else{
              $confirm = test_input($_POST["password_conf"]);
            }
          }

          if (empty($_POST["no_hp"])) {
              $noErr = "Nomor Hp harus dipilih";
          } else {
              $no = test_input($_POST["no_hp"]);
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
              <center><h2 class="font-weight-light"><b>DAFTAR AKUN</b></h2></center><br><br>
                <?php
                  // validasi input
                  echo validation_errors('<div class="alert alert-danger">','</div>');
                ?><br>


                <form class="pt-3">
                  <div class="form-group">
                    <p>Nama Lengkap:</p>
                    <input type="text" class="form-control form-control-lg" id="nama" name="nama" placeholder="Nama Lengkap" value="<?php echo set_value('nama');?>">
                    <span class="error"><?php echo $namaErr; ?></span>
                  </div>
                  <div class="form-group">
                    <p>Email:</p>
                    <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email" value="<?php echo set_value('email');?>">
                    <span class="error"><?php echo $emailErr; ?></span>
                  </div>
                  <div class="form-group">
                    <p>Nomor HP:</p>
                    <input type="number" class="form-control form-control-lg" id="no_hp" name="no_hp" placeholder="Nomor HP" value="<?php echo set_value('no_hp');?>">
                    <span class="error"><?php echo $noErr; ?></span>
                  </div>
                  <div class="form-group">
                    <p>Username Baru:</p>
                    <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username" value="<?php echo set_value('username');?>">
                    <span class="error"><?php echo $usernameErr; ?></span>
                  </div>
                  <div class="form-group">
                    <p>Password:</p>
                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" value="<?php echo set_value('password');?>">
                    <span class="error"><?php echo $passwordErr; ?></span>
                  </div>
                  <div class="form-group">
                    <p>Konfirmasi Password:</p>
                    <input type="password" class="form-control form-control-lg" id="password_conf" name="password_conf" placeholder="Password Confirm" value="<?php echo set_value('password_conf');?>">
                    <span class="error"><?php echo $confirmErr; ?></span>
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" value="daftar">DAFTAR</button>
                  </div>

                  <div class="text-center mt-4 font-weight-light">
                    Sudah daftar tamu? <a href="<?= base_url() ?>index.php/login" class="text-primary">Login</a>
                  </div>

                  <?php echo form_close();?>

                </form>
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
  <script src="<?= base_url() ?>template2/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?= base_url() ?>template2/js/template.js"></script>
  <!-- endinject -->
</body>

</html>
