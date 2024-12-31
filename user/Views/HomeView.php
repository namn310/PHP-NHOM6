<?php
$this->layoutPath = "LayoutTrangChu.php";
?>
<div class="contentuser">
    <div class="container-fluid">
        <img class="w-100" src="images/product/banner_collection.webp">
    </div>
    <!--Hot product-->
    <div class="d-flex flex-column justify-content-center align-items-center mb-3">
        <span class="service text-center">
            <h3 style="font-family:Geneva">Hot Product</h3>
        </span>
        <i class="fa-solid fa-heart" style="color: #de2121;align-items: center;"></i>
    </div>
    <div class="wrapper container">
        <div class="carouselHome ">
            <!-- san pham 1 -->
            <?php
            $result = $this->ModelHotProduct();
            foreach ($result as $a) :
            ?>
                <div class="col-xl-9 col-lg-9 col-md-6 mb-3 ps-3" style="position:relative">
                    <div class="product-box">
                        <div class="product-inner-box ">
                            <div class="icons d-flex justify-content-end">
                                <a class="text-decoration-none text-dark"><i class="fa-solid fa-heart"
                                        style="color: #ec0e0e;"></i></a>

                            </div>
                            <div class="onsale">
                                <span style="position: absolute;top:40px" class="badge rounded-2"><i
                                        class="fa-solid fa-arrow-down"></i><?php echo $a->discount ?>%</span>
                                <a href="index.php?controller=product&action=detail&id=<?php echo $a->idPro ?>"><img
                                        src="assets/img-add-pro/<?php echo $this->getMainImage($a->idPro) ?>"
                                        class="img-fluid"></a>
                            </div>
                            <div class="cart" style="position:absolute;top:0px">
                                <a href="index.php?controller=cart&action=create&id=<?php echo $a->idPro ?>"
                                    style="text-decoration:none"><button class=" btn btn-white shadow-sm rounded-pill"
                                        id="buy" class="btn btn-danger " data-bs-toggle="modal"
                                        data-bs-target="#modalbuyproduct"><i
                                            class="fa-solid fa-cart-shopping text-danger"></i>
                                        Mua</button></a>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-name mt-2">
                                <h3><b><?php echo $a->namePro ?></b></h3>
                            </div>
                            <span class="rating secondary-font">
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                5.0</span>
                            <div class="product-price">
                                <?php if ($a->discount > 0) { ?>
                                    <p class=" text-secondary text-decoration-line-through mb-0">
                                        <?php echo number_format($a->giaban) ?>đ
                                    </p>
                                    <p class=" text-danger fs-5">
                                        <?php echo number_format($a->giaban - ($a->giaban * $a->discount) / 100) ?>đ
                                    <?php } else { ?>
                                    <p class=" text-danger mb-0"> <?php echo number_format($a->giaban) ?>đ</p>
                                <?php } ?>

                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="modal fade" id="modalbuyproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Đã thêm sản phẩm vào giỏ hàng !
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div id="carouselExampleDark" class="carousel carousel-dark slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="images/product/banner.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Đa dạng cái loại đồ ăn</h5>
                        <p>Chúng tôi luôn đem đến da dạng các loại đồ ăn cho thú cưng</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="images/product/slider_3.webp" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Dịch vụ tận tâm</h5>
                        <p>Chúng tôi luôn quan tâm đến trải nghiệm người dùng </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/product/Banner3-1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Uy tín, chất lượng</h5>
                        <p>Chúng tôi luôn đặt uy tín, chất lượng lên hàng đầu</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<!--footer-->
<!--footer end-->