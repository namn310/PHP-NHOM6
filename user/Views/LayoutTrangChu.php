<?php
$conn = Connection::getInstance();
$query = $conn->query("select * from danhmuc limit 1");
$data = $query->fetchAll();
?>
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
    <!-- slick carousel -->
    <link rel="stylesheet" href="assets/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="assets/slick-carousel/slick/slick-theme.css">
    <!-- {{--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"> --}} -->
    <script src="assets/slick-carousel/slick/slick.min.js"></script>
</head>

<body>
    <!-- header -->
    <div class="header container-fluid mb-3 fixed-top">
        <div class="d-flex justify-content-between bg-dark py-2 px-lg-5 flex-wrap text-center align-items-center">
            <div class="text-left mb-2 mb-lg-0 d-inline-flex">
                <a class="text-white px-3" href="">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-white px-3" href="">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-white px-3" href="">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-white px-3" href="">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-white px-3" href="">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
            <div class=" d-inline-flex align-items-right justify-content-end px-0">
                <div class="d-inline-flex align-items-center ">
                    <a style="font-size:1.3vw 1.3vh;text-decoration:none" class="text-white px-3" href=""><i
                            class="fa-solid fa-phone mx-1"></i>0123456789</a>
                </div>
            </div>
        </div>
        <div class="row navbar navbar-dark bg-white shadow">
            <nav class="navbar navbar-expand-xl d-flex flex-column ">
                <div class="container-fluid d-flex justify-content-around">
                    <div class="nav-brand ps-2 text-center d-flex align-items-center flex-wrap">
                        <img class="img-fluid" style="width:80px" src="images/logo/PetCARE.png">
                        <a class="navbar-brand mx-0" href="index.php" style="color: #F7A98F">PetCare</a>
                    </div>
                    <div>
                        <button class="navbar-toggler mt-2" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <button class="btn text-dark ms-2 me-3" id="btnSearchNav" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false"
                            aria-controls="collapseExample">
                            <i class="fa-solid fa-magnifying-glass" style="font-size: 1.3vw 1.3vh"></i>
                        </button>
                    </div>
                    <?php
                    $query = $conn->query("select * from product");
                    $result = $query->fetchAll();
                    ?>
                    <!-- {{-- search --}} -->
                    <div id="InputContainer" style="width:40%;position: relative;left:-8%">
                        <div class="InputContainer">
                            <input placeholder="Search.." id="input" class="input" name="text" type="text">
                        </div>
                        <div style="position: absolute;z-index:1">
                            <div id="list-search-product" class="d-flex mt-1 flex-wrap bg-white"
                                style="overflow-y:visible;overflow-x:hidden;max-height:400px;width:100%;z-index:1;border-radius:5px">
                                <?php
                                foreach ($result as $row) :
                                ?>

                                    <?php
                                    $idProduct = $row->idPro;
                                    $query2 = $conn->prepare("select image from image_products where idPro=:id limit 1");
                                    $query2->execute(['id' => $idProduct]);
                                    $img = $query2->fetchAll();
                                    foreach ($img as $key) {
                                        $image = $key->image;
                                    } ?>
                                    <div class="listPro2" style="display:none;z-index:2">
                                        <div style="width:100%;padding-left:10px;padding-right:20px "
                                            class="d-flex justify-content-start bg-white ">
                                            <a style="text-decoration:none"
                                                href="index.php?controller=product&action=detail&id=<?php echo $row->idPro ?>">
                                                <img src="assets/img-add-pro/<?php echo $image ?>"
                                                    class="img-fluid" style="max-width:100px;height:100%"></a>
                                            <p id="product-name-search1" class="ms-3" style="width:100%;font-size:1vw">
                                                <?php echo $row->namePro ?></p>
                                            </p>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                    <div class="buttonInforUser">

                        <?php
                        if (isset($_COOKIE["tokenLogin"]) == false) {
                        ?>
                            <a style="text-decoration:none;color:black" style="font-size: 1.3vw" class="me-2 ms-2"
                                href="index.php?controller=account">Đăng
                                Nhập</a><span></span>
                        <?php
                        } else {

                        ?>

                            <div class="nav-item dropdown me-5">
                                <a class=" login-button dropdown-toggle" style="width:190px" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user"></i>

                                </a>
                                <ul class="dropdown-menu me-5" style="top:60px">
                                    <li><a class="dropdown-item" style="text-decoration:none" href="index.php?controller=cart&action=CartHistory"><i
                                                class="fa-solid fa-cart-shopping pe-2" style="color: #cf1717"></i>Đơn
                                            hàng</a>
                                    </li>
                                    <li><a class="dropdown-item" style="text-decoration:none" href="index.php?controller=book&action=BookHistory"><i
                                                class="fa-solid fa-cart-shopping pe-2" style="color: #cf1717"></i>Lịch hẹn</a>
                                    </li>
                                    <li>
                                        <a style="text-decoration:none" class="dropdown-item" href="index.php?controller=user"><i
                                                class="fa-solid fa-gear pe-2"></i>Cài
                                            đặt</a>
                                    </li>
                                    <li><a style="text-decoration:none" class="dropdown-item" href="index.php?controller=user&action=changepass"><i
                                                class="fa-solid fa-key pe-2 text-primary"></i>Đổi mật khẩu</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a style="text-decoration:none" class="dropdown-item" href="index.php?controller=account&action=logOut">Đăng
                                            Xuất<i class="fa-solid fa-right-from-bracket text-secondary ps-2"></i></a>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- {{-- navbar --}} -->
                <div>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">

                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body menuOffCanvas">
                            <ul class="navbar-nav d-flex">
                                <li class="nav-item me-4">
                                    <a class="nav-link " aria-current="page" href="index.php"><b>Trang
                                            chủ </b></a>
                                </li>
                                <li class="nav-item me-4">
                                    <a class="nav-link" href="index.php?controller=about"><b>Giới thiệu </b></a>
                                </li>
                                <li class="nav-item me-4">
                                    <a class="nav-link" href="index.php?controller=service"><b> Dịch vụ</b></a>
                                </li>
                                <li class="nav-item dropdown me-4">
                                    <a class="nav-link" href="index.php?controller=product&idDM="><b> Sản
                                            phẩm</b></a>
                                </li>
                                <li class="nav-item me-4">
                                    <a class="nav-link" href="index.php?controller=book"><b>Đặt lịch </b></a>
                                </li>
                                <!-- {{-- <li class="nav-item me-4">
                                    <a class="nav-link" href="index.php?controller=contact"><b>Liên hệ </b></a>
                                </li> --}} -->
                                <li class="nav-item me-4">
                                    <a class="nav-link" type="button" href="index.php?controller=cart"><b>Giỏ hàng
                                        </b><i class="fa-solid fa-cart-shopping ms-1">
                                        </i>
                                        <?php
                                        $numberProduct = 0;
                                        if (isset($_SESSION["cart"]) && isset($_COOKIE["tokenLogin"])) {
                                            foreach ($_SESSION["cart"] as $product) {
                                                $numberProduct++;
                                            }
                                        ?>
                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php if ($numberProduct > 0) echo $numberProduct ?></span> <?php } ?>

                                    </a>
                                </li>
                        </div>
                    </div>

                </div>
            </nav>
        </div>
        <div>
            <div class="row my-2" style="overflow-y:hidden">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="collapse mb-1" id="collapseExample" data-bs-backdrop="static">
                        <div class="input-group flex-nowrap" role=" search">
                            <input id="search_pro" class="form-control me-2" type="search"
                                placeholder="Tìm kiếm sản phẩm" aria-label="Search">

                        </div>
                    </div>
                    <div class="col-4"></div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div id="list-search-product2" class="d-flex mt-1 flex-wrap bg-white"
                style="overflow-y:visible;overflow-x:hidden;max-height:300px;max-width:400px">
                <?php
                foreach ($result as $row) :
                ?>
                    <div class="listPro bg-white" style="display:none">
                        <div style="height:50px;max-width:400px;padding-left:10px;padding-right:20px "
                            class="d-flex justify-content-start  ">
                            <a style="text-decoration:none" href="index.php?controller=product&action=detail&id=<?php echo $row->idPro ?>">
                                <img src="assets/img-add-pro/<?php
                                                                $idProduct = $row->idPro;
                                                                $query2 = $conn->prepare("select image from image_products where idPro=:id limit 1");
                                                                $query2->execute(['id' => $idProduct]);
                                                                $img = $query2->fetchAll();
                                                                foreach ($img as $key) {
                                                                    echo $key->image;
                                                                }
                                                                ?>"
                                    class="img-fluid" style="max-width:100px;height:100%"></a>
                            <p id="product-name-search" class="ms-2" style="width:100%;font-size:1.2vw;font-size:1.2vh">
                                <?php echo $row->namePro ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <!-- load view -->
    <?php
    echo $this->view;
    ?>
    <!--footer-->
    <div class="container-fluid d-flex justify-content-around flex-wrap bg-dark mt-5">
        <div class="footer1 d-flex align-items-center flex-column p-3">
            <h1 class="mb-3 mt-4  text-capitalize" style="color:#F7A98F;font-size:4vw">PetCare</h1>
            <p class="text-white" style="font-size: 1.2vw">Giờ hoạt động: 8AM-10PM</p>
        </div>
        <div class="footer2 mt-3 text-white d-flex flex-column justify-content-between p-3">
            <h3 style="font-size: 2vw">Get in touch</h3>
            <span>
                <h6><i class="fa-solid fa-envelope-circle-check fa-lg me-3"
                        style="color: #ffffff;font-size:2vw"></i>petcare@gmail.com
                </h6>
            </span>
            <span>
                <h6><i class="fa-solid fa-phone fa-lg me-4" style="color: #ffffff;font-size:2vw"></i>0912345678</h6>
            </span>
            <span>
                <h6><i class="fa-solid fa-location-dot fa-lg me-4" style="color: #ffffff;font-size:2vw"></i>Láng
                    Thượng, Đống Đa, Hà
                    Nội
                </h6>
            </span>
        </div>
        <div class="footer3 d-flex text-white flex-column mt-3 p-3 text-center">
            <h3 style="font-size: 2vw">Popular links</h3>
            <a href="#" class="mb-4"><i class="fa-brands fa-facebook fa-lg me-3 "
                    style="color: #ffffff;font-size:2vw"></i></a>
            <a href="#" class="mb-4"><i class="fa-brands fa-instagram fa-lg me-3"
                    style="color: #ffffff;font-size:2vw"></i></a>
            <a href="#" class="mb-4"><i class="fa-brands fa-youtube fa-lg me-3"
                    style="color: #ffffff;font-size:2vw"></i></a>
        </div>

    </div>

    <!--footer end-->
</body>
<script src="assets/js/script.js"></script>

</html>