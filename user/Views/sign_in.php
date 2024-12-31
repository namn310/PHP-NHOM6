<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Care</title>
    <link rel="shortcut icon" type="image/png" href="images/logo/PetCARE.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/user-responsive.css">
    <link rel="stylesheet" href="assets/css/user1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- toast message -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.css" rel="stylesheet">
</head>


<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background:  #FFE4DA;">
                <div class="featured-image mb-3">
                    <img src="assets/img/PetCARE.png" class="img-fluid mt-3" style="width:100%">
                </div>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center text-center">
                    <div class="header-text mb-4">
                        <h3 style="font-family: 'Courier New', Courier, monospace;font-weight: 600;">Đăng Ký</h3>
                    </div>
                    <form id="loginForm" method="post" action="index.php?controller=Register&action=registerPost">
                        <div class=" form-group mb-3">
                            <input type="username" name="name" class="form-control form-control-lg bg-light fs-6" id="username" placeholder="Tên người dùng">
                            <p class="UsernameError text-danger text-start ps-1"></p>
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" name="email" class="form-control form-control-lg bg-light fs-6" id="email_signup" placeholder="Địa chỉ Email">
                            <p class="emailError text-danger text-start ps-1"></p>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="phone" class="form-control form-control-lg bg-light fs-6" id="phone_signup" placeholder="Số điện thoại">
                            <p class=" text-danger text-start ps-1"></p>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="local" class="form-control form-control-lg bg-light fs-6" id="local_signup" placeholder="Địa chỉ">
                            <p class=" text-danger text-start ps-1"></p>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" name="pass" class="form-control form-control-lg bg-light fs-6" id="password_signup" placeholder="Mật Khẩu">
                            <small>Mật khẩu tối thiểu 6 ý tự</small>
                            <p class="passwordError text-danger text-start ps-1"></p>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" name="Repass" class="form-control form-control-lg bg-light fs-6" id="Re_password_signup" placeholder="Nhập lại mật khẩu">
                            <p class="passwordError text-danger text-start ps-1"></p>
                        </div>
                        <div class="input-group mb-3">
                            <button class="btn btn-lg btn-warning w-100 fs-6" type="submit" name="dangky" id="submit">Đăng Ký</button>
                        </div>
                    </form>
                    <div class="row">
                        <small>Bạn đã có tài khoản? <a href="index.php?controller=account">Đăng Nhập</a></small>
                    </div>

                </div>
            </div>


        </div>
    </div>
    <?php if (isset($_COOKIE["success"])) {
        echo ("
    <script>
      $.toast({
        heading: 'Thông báo',
        text: 'Đăng ký thành công !',
        showHideTransition: 'slide',
        icon: 'success',
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
        text: 'Email đã tồn tại !',
        showHideTransition: 'slide',
        icon: 'error',
        position: 'bottom-right'
      })
    </script>
    ");
    } ?>
    <script src="assets/js/registerAccount.js">

    </script>

</body>

</html>