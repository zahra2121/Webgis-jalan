<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo form_open('lupa_password/'. $message);?>

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
              
                <center>
                    <h3 class="font-weight-light"><b>Token Password</b></h3>
                    <p><?php echo $message; ?></p>
                </center><br><br>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <?php echo form_close();?>
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
