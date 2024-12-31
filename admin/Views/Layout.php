<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Admin-Petcare</title>
    <link rel="shortcut icon" type="image/png" href="../images/logo/PetCARE.png">
    <script href="/../Project-petcare-php/admin/Boostrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> <!-- Latest compiled JavaScript -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <!-- toast message -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.css" rel="stylesheet">

    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <script href="../assets/js/chart.js"></script>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.php" style="text-decoration: none;" class="logo d-flex align-items-center">
                <img src="../assets/img/PetCARE.png" alt="">
                <span class="d-none d-lg-block">Admin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->
                <?php
                if (!isset($_SESSION["admin_email"])) {
                ?>
                    <li><a href="index.php?controller=login">Đăng nhập</a></li>
                <?php
                } else { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-bell"></i>
                            <span class="badge bg-primary badge-number">4</span>
                        </a><!-- End Notification Icon -->
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                            <li class="dropdown-header">
                                Bạn có 4 thông báo mới
                                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Xem tất cả</span></a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="notification-item">
                                <i class="bi bi-exclamation-circle text-warning"></i>
                                <div>
                                    <h4>Quản lí</h4>
                                    <p>Tấn chôm tiền đi bắn bi-a</p>
                                    <p>30 phút trước</p>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="notification-item">
                                <i class="bi bi-x-circle text-danger"></i>
                                <div>
                                    <h4>Cảnh báo</h4>
                                    <p>Có 4 nhân viên đến muộn hôm nay</p>
                                    <p>1 giờ trước</p>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="notification-item">
                                <i class="bi bi-check-circle text-success"></i>
                                <div>
                                    <h4>Thông báo</h4>
                                    <p>Quyết định sa thải đồng chí Tấn</p>
                                    <p>2 giờ trước</p>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="notification-item">
                                <i class="bi bi-info-circle text-primary"></i>
                                <div>
                                    <h4>Thông báo</h4>
                                    <p>Tấn dẫn các bác sĩ đi trộm chó</p>
                                    <p>4 giờ trước</p>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="dropdown-footer">
                                <a href="#">Xem tất cả thông báo</a>
                            </li>
                        </ul><!-- End Notification Dropdown Items -->
                    </li><!-- End Notification Nav -->
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-chat-left-text"></i>
                            <span class="badge bg-success badge-number">3</span>
                        </a><!-- End Messages Icon -->
                        <style>
                            .message-item a {
                                text-decoration: none;
                            }
                        </style>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                            <li class="dropdown-header">
                                Bạn có 3 thông báo
                                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Xem tất cả</span></a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="message-item">
                                <a href="#">
                                    <img src="../assets/img/avt.jpg" alt="" class="rounded-circle">
                                    <!-- <div>
                                        <h4>Nam</h4>
                                        <p>Nay xin nghỉ nhé</p>
                                        <p>4 giờ trước</p>
                                    </div> -->
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="message-item">
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="dropdown-footer">
                                <a href="#">Hiển thị tất cả tin nhắn</a>
                            </li>
                        </ul><!-- End Messages Dropdown Items -->

                    </li><!-- End Messages Nav -->
                    <li class="nav-item dropdown pe-3">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <img src="../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                            <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
                        </a><!-- End Profile Iamge Icon -->
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6>Admin</h6>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="index.php?controller=user">
                                    <i class="bi bi-gear"></i>
                                    <span>Cài đặt tài khoản</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="index.php?controller=login&action=logOut">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Đăng xuất</span>
                                </a>
                            </li>
                        </ul><!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->
                <?php
                } ?>
            </ul>
        </nav><!-- End Icons Navigation -->
    </header><!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link" style="font-size:1.5vw;font-size:1.5vh" href="index.php?controller=home">
                    <i class="fa-solid fa-house-user"></i>
                    <span>Trang chủ</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-size:1.5vw;font-size:1.5vh" href="index.php?controller=khachhang">
                    <i class="fa-solid fa-person"></i></i><span>Quản lý khách hàng</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" style="font-size:1.5vw;font-size:1.5vh" href="index.php?controller=nhanvien">
                    <i class="fa-solid fa-users-gear"></i><span>Quản lý nhân viên</span>
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" style="font-size:1.5vw;font-size:1.5vh" href="index.php?controller=product">
                    <i class="fa-brands fa-product-hunt"></i><span>Quản lý sản phẩm</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-size:1.5vw;font-size:1.5vh" href="index.php?controller=danhmuc">
                    <i class="fa-brands fa-product-hunt"></i><span>Quản lý danh mục</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-size:1.5vw;font-size:1.5vh" href="index.php?controller=dichvu">
                    <i class="fa-brands fa-servicestack"></i><span>Quản lý dịch vụ</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-size:1.5vw;font-size:1.5vh" href="index.php?controller=donhang">
                    <i class="fa-solid fa-cart-shopping"></i><span>Quản lý đơn hàng</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a style="font-size:1.5vw;font-size:1.5vh" class="nav-link " href="index.php?controller=discount">
                    <i class="fa-solid fa-tags"></i><span>Quản lý chương trình khuyến mại</span>
                </a>
            </li> -->
            <li class="nav-item">
                <!-- <a style="font-size:1.5vw;font-size:1.5vh" class="nav-link " href="index.php?controller=voucher">
                    <i class="fa-solid fa-ticket"></i><span>Quản lý Voucher</span>
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" style="font-size:1.5vw;font-size:1.5vh" href="index.php?controller=book">
                    <i class="fa-regular fa-address-book"></i><span>Quản lý lịch hẹn</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="index.php?controller=luong">
                    <i class="fa-solid fa-coins"></i><span>Bảng kê lương</span>
                </a>
            </li> -->

            <!-- <li class="nav-item">
                <a class="nav-link" href="index.php?controller=doanhthu">
                    <i class="fa-solid fa-chart-line"></i><span>Báo cáo doanh thu</span>
                </a>
            </li> -->
        </ul>
    </aside><!-- End Sidebar-->
    <!-- Load view-->
    <div id="main" class="main">
        <?php
        echo $this->view;
        ?>
    </div>
</body>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
<script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/chart.js/chart.umd.js"></script>
<script src="../assets/vendor/echarts/echarts.min.js"></script>
<script src="../assets/vendor/quill/quill.js"></script>
<script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="../assets/vendor/tinymce/tinymce.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>
<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>
<script src="../assets/js/Voucher.js"></script>

</html>