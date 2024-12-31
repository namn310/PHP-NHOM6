<?php
$this->layoutPath = "Layout.php";
$conn = Connection::getInstance();
$email = isset($_SESSION['admin_email']) ? $_SESSION['admin_email'] : '';
$query = $conn->prepare("select * from admin where email= :email");
$query->execute([':email' => $email]);
foreach ($query->fetchAll() as $row) {
  $id = $row->id;
  $name = $row->name;
}
?>
<div class="pagetitle">
  <?php if (isset($_COOKIE["error1"])) {
    echo ("
    <script>
      $.toast({
        heading: 'Thông báo',
        text: 'Mật khẩu không chính xác',
        showHideTransition: 'slide',
        icon: 'error',
        position: 'bottom-right'
      })
    </script>
    ");
  } ?>
  <?php if (isset($_COOKIE["error2"])) { ?>
    <script>
      $.toast({
        heading: 'Thông báo',
        text: 'Có lỗi xảy ra. Vui lòng thử lại sau !',
        showHideTransition: 'slide',
        icon: 'error',
        position: 'bottom-right'
      })
    </script>
  <?php } ?>
  <?php if (isset($_COOKIE["success"])) { ?>
    <script>
      $.toast({
        heading: 'Thông báo',
        text: 'Đổi mật khẩu thành công',
        showHideTransition: 'slide',
        icon: 'success',
        position: 'bottom-right'
      })
    </script>
  <?php } ?>

  <h1>Trang cá nhân</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Users</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">
      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
          <img src="/../Project-petcare-php/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
          <h2><?php echo $name ?></h2>
          <div class="social-links mt-2">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-8">
      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Cài đặt</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Đổi mật
                khẩu</button>
            </li>
          </ul>
          <div class="tab-content pt-2">
            <div class="tab-pane fade pt-3" id="profile-settings">
              <!-- Settings Form -->
              <form>
                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Thông báo Email</label>
                  <div class="col-md-8 col-lg-9">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="changesMade" checked>
                      <label class="form-check-label" for="changesMade">
                        Thay đổi tài khoản
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="newProducts" checked>
                      <label class="form-check-label" for="newProducts">
                        Thông báo về sản phẩm và dịch vụ mới
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="proOffers">
                      <label class="form-check-label" for="proOffers">
                        Các chiến lược marketing
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="securityNotify" checked>
                      <label class="form-check-label" for="securityNotify">
                        Thông báo hệ thống
                      </label>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
              </form><!-- End settings Form -->
            </div>
            <div class="fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <form id="changePassAdmin" method="post" >
                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mật khẩu hiện tại</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="currentPass" type="password" class="form-control" id="currentPassword" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Mật khẩu mới</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="newPass" type="password" class="form-control" id="newPassword" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Nhập lại mật khẩu mới</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="confirmPass" type="password" class="form-control" id="renewPassword" required>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" name="changePassAdmin" class="btn btn-primary">Đổi mật khẩu</button>
                </div>
              </form><!-- End Change Password Form -->
            </div>
          </div><!-- End Bordered Tabs -->
        </div>
      </div>
    </div>
  </div>
</section>
<script src="../assets/js/admin.js"></script>
<!-- ======= Footer ======= -->