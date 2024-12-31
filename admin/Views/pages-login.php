<?php
$conn = Connection::getInstance();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Admin-Petcare</title>
  <link rel="shortcut icon" type="image/png" href="../images/logo/PetCARE.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> <!-- Latest compiled JavaScript -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <!-- toast message -->
  <script src="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.css" rel="stylesheet">
</head>

<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a href="index.php" style="text-decoration: none;" class="logo d-flex align-items-center w-auto">
                  <img src="../assets/img/PetCARE.png" alt="">
                  <span class="d-none d-lg-block">Admin-Petcare</span>
                </a>
              </div><!-- End Logo -->
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Đăng Nhập</h5>
                  </div>
                  <form class="row g-3 needs-validation" method="post" action="index.php?controller=login&action=login">
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Tên đăng nhập</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" class="form-control" id="yourUsername">
                        <div class="invalid-feedback">Please enter your email.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Mật khẩu</label>
                      <input type="password" name="password" class="form-control" id="yourPassword">
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="login" type="submit">Đăng nhập</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't you forgot account ? <a href="">Quên mật khẩu</a>
                      </p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main><!-- End #main -->
  <?php if (isset($_COOKIE["errorLogin"])) {
    echo ("
    <script>
      $.toast({
        heading: 'Thông báo',
        text: 'Email hoặc mật khẩu không chính xác !',
        showHideTransition: 'slide',
        icon: 'error',
        position: 'bottom-right'
      })
    </script>
    ");
  } ?>

  <?php if (isset($_COOKIE["error"])) {
    echo ("
    <script>
      $.toast({
        heading: 'Thông báo',
        text: 'Có lỗi xảy ra vui lòng thử lại sau !',
        showHideTransition: 'slide',
        icon: 'error',
        position: 'bottom-right'
      })
    </script>
    ");
  } ?>
  
</body>

</html>