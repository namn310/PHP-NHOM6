<?php
$this->layoutPath = "LayoutTrangChu.php";
?>
<div class="inforUserView">
    <?php if (isset($_COOKIE["updatePassCusError1"])) { ?>
        <script>
            $.toast({
                heading: 'Thông báo',
                text: 'Mật khẩu không chính xác!',
                showHideTransition: 'slide',
                icon: 'error',
                position: 'top-center'
            })
        </script>
    <?php } ?>
    <?php if (isset($_COOKIE["updatePassCusError2"])) { ?>
        <script>
            $.toast({
                heading: 'Thông báo',
                text: 'Có lỗi xảy ra. Vui lòng thử lại sau',
                showHideTransition: 'slide',
                icon: 'error',
                position: 'top-center'
            })
        </script>
    <?php } ?>
    <?php if (isset($_COOKIE["updatePassCusSuccess"])) { ?>
        <script>
            $.toast({
                heading: 'Thông báo',
                text: 'Đổi mật khẩu thành công !',
                showHideTransition: 'slide',
                icon: 'success',
                position: 'top-center'
            })
        </script>
    <?php } ?>
    <script>
        $(document).ready(function() {
            $("#newPassword").change(function checkPass() {
                var regex = /^.{6,}$/;
                var pass = $(this).val();
                if (regex.test(pass) == true || pass == ' ') {
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                    return true;
                } else {
                    $(this).addClass("is-invalid");
                    return false;
                }
            })
            $("#confirmPassword").change(function checkRepass() {
                var regex = /^.{6,}$/;
                var password = $("#newPassword").val()
                var pass = $(this).val();
                if (regex.test(pass) == true && pass === password || pass == '') {
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                    return true;
                } else {
                    $(this).addClass("is-invalid");
                    return false;
                }
            })
            $("#formChangePassCus").submit(function(event) {
                event.preventDefault();
                if ($("input").hasClass("is-invalid") || $("input").first().val() === ' ') {
                    alert("Vui lòng kiếm tra lại thông tin. Mật khẩu tối thiểu 6 ký tự");
                } else {
                    $.ajax({
                        type: 'POST',
                        url: "index.php?controller=user&action=updatePass",
                        data: $(this).serialize(),
                        success: function() {
                            location.reload();
                        },
                    })
                }
            })
        })
    </script>
    <!-- user infor -->
    <div class="row g-3 align-items-center mx-auto pdt">
        <div class="col-3">
            <div class="card border-0 ">
                <img src="assets/img/avatar-trang-99.jpg" class="card-img-top rounded-circle w-50 mx-auto" alt="">
                <div class="card-body text-center">
                    <h5 class="card-title"></h5>
                    <p class="card-text"><?php echo isset($name) ? $name : "" ?></p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="container">
                <form id="formChangePassCus" method="post">
                    <h2 class="text-center" style="color:#EA9E1E">Đổi mật khẩu</h2>
                    <div>
                        <div class="row">
                            <label class="form-label">Mật khẩu hiện tại</label>
                            <input id="currentPassword" type="password" placeholder="Nhập mật khẩu" name="currentPass" class="form-control">
                        </div>
                        <div class="row">
                            <label class="form-label">Mật khẩu mới</label>
                            <input class="form-control" id="newPassword" type="password" name="newPass" placeholder="Mật khẩu dài hơn 6 ký tự" class="full-width">
                        </div>
                        <div class="row">
                            <label class="form-label">Xác nhận mật khẩu</label>
                            <input id="confirmPassword" class="form-control" type="password" name="confirmPass" class="full-width" placeholder="Nhập lại mật khẩu">
                        </div>
                        <div class="row mt-3">
                            <button type="submit" id="submit" name="submit" class="btn btn-primary" class="full-width">Xác nhận</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>


    </div>
</div>
<!--footer end-->