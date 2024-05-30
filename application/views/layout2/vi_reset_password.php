<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<body>
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
              
                <center>
                    <h3 class="font-weight-light"><b>Reset Password</b></h3>
                    <h5>Hello <span><b><?php echo $nama; ?></b></span>, Silakan isi password baru anda.</h5>
                    <?php echo form_open('lupa_password/reset_password/token/' . $token); ?>
                </center><br><br>

                <form class="pt-3">
                  <div class="form-group">
                    <p>Password Baru:</p>
                    <input type="password" class="form-control form-control-lg" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>" />
                    <span class="error"><?php echo form_error('password'); ?></span>
                  </div>
                  <div class="form-group">
                    <p>Konfirmasi Password Baru:</p>
                    <input type="password" class="form-control form-control-lg" placeholder="Password Confirm" name="passconf" value="<?php echo set_value('passconf'); ?>" />
                    <span class="error"><?php echo form_error('passconf'); ?></span>
                  </div>
                  
                  <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Reset</button>
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
