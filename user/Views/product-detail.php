<?php
$this->layoutPath = ("LayoutTrangChu.php");
$id_danhmuc = isset($_GET['idDM']) && is_numeric($_GET['idDM']) ? $_GET['idDM'] : 0;
$conn = Connection::getInstance();
$query = $conn->query("select id,name from customers");
foreach ($query->fetchAll() as $result) {
  $idCus = $result->id;
}
?>
<style>
  @media screen and (max-width:1030px) {
    .a {
      margin-top: 50px;
    }
  }

  @media screen and (max-width:1200px) {
    .product-detail {
      flex-direction: column;
    }
  }

  @media screen and (max-width:800px) {
    .img-slide {
      display: none
    }

    .img-slide-small {
      display: block
    }
  }

  @media screen and (min-width:801px) {
    .img-slide-small {
      display: none;
    }
  }

  @media screen and (max-width:750px) {
    .a {
      margin-top: 100px;
    }
  }

  .product-detail-img {
    flex: 1;
  }

  .product-detail-intro {
    flex: 1;
  }
</style>
<!-- Danh mục sản phẩm-->
<div class="container-fluid pdt productDetail">
  <div class="row a ">
    <div>
      <nav class="navbar mb-3 navbar-light bg-light justify-content-between">
        <form class="form-inline d-flex">
        </form>
      </nav>
      <script>
        $(document).ready(function() {
          var listImage = document.querySelectorAll(".list-img");
          listImage.forEach(img => {
            var a = $(img).attr('src');
            $(img).click(function() {
              $('.main-img-product').attr('src', a);
            })
          });
        })
        window.onload = function() {
          $(document).ready(function() {
            $('.img-slide').slick({
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              arrows: true,
              centerMode: true,
              cssEase: 'linear',
              accessibility: true,
              autoplay: true,
              autoplaySpeed: 900,
              vertical: true,
            });
            $('.img-slide-small').slick({
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              arrows: true,
              cssEase: 'linear',
              accessibility: true,
              autoplay: true,
              autoplaySpeed: 900,
            });
          });
        }
      </script>
      <?php foreach ($record as $row) : ?>
        <div class="d-flex">
          <p id="idPro" hidden><?php echo $row->idPro ?></p>
          <div class="img-slide mt-3" style="max-height:550px;max-width:200px;overflow:hidden">
            <?php foreach ($productListImg as $result): ?>
              <div style="max-width:140px;border-top:1px solid black;border-bottom:1px solid black"><img
                  class="img-fluid p-2 list-img" src="assets/img-add-pro/<?php echo $result->image ?>"></div>
            <?php endforeach ?>
          </div>
          <div class="product-detail d-flex justify-content-around">
            <div class="product-detail-img ms-2">
              <!-- {{-- Ảnh sản phẩm --}} -->
              <img class="img-float main-img-product" id="main-img-product"
                style="max-width:800px;max-height:600px;border:1px solid  #EA9E1E;border-radius:5px"
                src="assets/img-add-pro/<?php echo $this->getMainImage($row->idPro) ?>">
              <div class="img-slide-small ms-2" style="max-width:140px">
                <?php foreach ($productListImg as $result) : ?>
                  <div style="max-width:140px"><img class="img-fluid p-2 list-img"
                      src="assets/img-add-pro/<?php echo $result->image ?>"></div>
                <?php endforeach ?>
              </div>
            </div>
            <div class="product-detail-intro ms-5 text-break">
              <p>
                <!-- {{-- Tên sản phẩm --}} -->
              <h4 style="font-size:3vw;font-size:3vh">
                <?php echo $row->namePro ?>
              </h4>
              </p>
              <p style="font-size:2vw;font-size:2vh"><strong>Lượt mua: </strong>324</p>
              <span class="rating secondary-font" style="font-size:3vw;font-size:3vh">
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                <i class="fa-solid fa-star text-warning"></i>
                5.0</span>
              <?php if (!$row->discount > 0) { ?>
                <p style="font-size:3vw;font-size:3vh"><span class="card-text text-danger"> <?php echo
                                                                                            number_format($row->giaban) ?>đ</span></p>
              <?php } else { ?>
                <p style="font-size:3vw;font-size:3vh">
                  <span>
                    <b class="card-text text-black text-decoration-line-through"
                      style="border-right:solid black 1px;padding-right:5px"><?php echo number_format($row->giaban) ?>
                      đ</b>
                    <b class="card-text text-danger"><?php echo number_format($row->giaban - ($row->giaban * $row->discount) / 100)
                                                      ?>đ</b>
                  </span>
                </p>
              <?php } ?>
              <!-- Button trigger modal -->
              <?php if ($row->count > 0) { ?>
                <button type="button" style="width:150px ;margin-left:10px;margin-bottom:20px" id="cartSucess"
                  class="btn btn-danger mt-3">
                  <a style="text-decoration:none;color:white;font-size:2vw;font-size:2vh"
                    href="index.php?controller=cart&action=create&id=<?php echo $row->idPro ?>">
                    Mua
                  </a></button>
              <?php } else { ?>
                <button type=" button" style="width:150px ;margin-left:10px;margin-bottom:20px;font-size:2vw;font-size:2vh"
                  id="cartSucess" class="btn btn-danger mt-3">
                  Hàng tạm hết</button>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="mt-3">
          <ul class="nav nav-tabs" style="cursor:pointer">
            <li class="nav-item" style="font-weight:bold">
              <a class="nav-link" id="mota" style="text-decoration:none;color:black;font-size:2vw;font-size:2vh"
                aria-current="page">Mô
                tả
                sản
                phẩm</a>
            </li>
            <li class="nav-item" style="font-weight:bold">
              <a class="nav-link" id="comment" style="text-decoration:none;color:black;font-size:2vw;font-size:2vh">Bình
                luận</a>
            </li>
          </ul>
          <!-- Mô tả sản phẩm -->
          <div class="thongtinchitiet mt-3 ms-4" style="padding-bottom:50px;font-size:2vw;font-size:2vh">
            <?php echo $row->mota ?>

          </div>
          <!--  Bình luận sản phẩm -->
          <div class="comment container mt-3">
            <!--           <iframe style="width:100%" src="../../Project-petcare-php/user/Views/Comment.php"></iframe>
     -->
            <?php if (isset($_COOKIE['tokenLogin'])) { ?>
              <!-- box comment -->
              <form method="post" action="index.php?controller=product&action=addComment&idPro=<?php echo $row->idPro ?>&idUs=<?php echo $idUser ?>">
                <input placeholder="Nhập bình luận của bạn" type="text"
                  style="width:100%;border-radius:10px;height:70px;font-size:2vw;font-size:2vh" name="comment"
                  id="comment" required>
                <div>
                  <button class="btn btn-primary mt-3 float-end" type="submit" style="font-size:2vw;font-size:2vh"
                    id="submitComment">Bình
                    luận</button>
                </div>
              </form>
            <?php } else { ?>
              <a style="font-size:2vw;font-size:2vh" href="index.php?controller=account">Hãy đăng nhập để có thể bình luận</a>
            <?php } ?>
            <!-- Danh sách các bình luận -->
            <div style="width:100%;height:300px;margin-top:20px;overflow-y:auto;overflow-x:hidden;font-size:20px">
              <div class="list-comment mt-5" style="background-color:#EEEEEE;border-radius:6px" width="80%">
                <?php foreach ($comment as $cmt): ?>
                  <div class="d-flex mt-3 ms-5">
                    <div class="me-4">
                    </div>
                    <div class="" style="margin-bottom:20px;box-shadow: 2px 2px 2px gray;margin-top:10px;background-color:#FFFFFF;border-radius:10px;width:60%">
                      <span style="font-weight:bold;font-size:2vw;font-size:2vh;color:blue" class="user-name"><?php echo
                                                                                                              $this->getNameUser($cmt->id_user) ?></span>
                      <span style="font-weight:lighter;font-size:2vw;font-size:2vh" class="comment-time"><?php echo  $cmt->timeCreate
                                                                                                          ?></span>
                      <div style="margin-left:40px;font-size:2vw;font-size:2vh" class="noidung"><?php echo $cmt->noidung ?></div>
                      <br>
                    </div>
                  </div>
                <?php endforeach ?>
              </div>
              <!-- end danh sách bình luận -->
            </div>
          </div>
        </div>
        <hr>
        <!-- {{-- sản phẩm tương tự --}} -->
        <div class="align-items-center">
          <div class="text-center">
            <h3>Các sản phẩm tương tự</h3>
          </div>
          <!-- {{-- danh sách sản phẩm --}} -->
          <div class="product-list d-flex flex-wrap ms-5">
            <!-- Lấy dữ liệu từ bảng product để xuất ra sản phẩm -->
            <?php foreach ($productRelated as $product): ?>
              <!-- {{-- Thông tin sản phẩm --}} -->
              <div id="product-infor" class="card position-relative" style="max-width:15rem;height:27rem"
                style="border:0px">
                <!-- {{-- giảm giá sản phẩm --}} -->
                <?php if ($product->discount > 0): ?>
                  <div class="onsale position-absolute top-0 start-0">
                    <span class="badge rounded-0 bg-danger"><i class="fa-solid fa-arrow-down"></i>
                      <?php echo $product->discount ?>%
                    </span>
                  </div>
                <?php endif ?>
                <div>
                  <!-- {{-- hình ảnh sản phẩm --}} -->
                  <a id="img_pro" href="index.php?controller=product&action=detail&id=<?php echo $product->idPro ?>">
                    <img class="card-img-top img-fluid p-2" style="max-height:20rem"
                      src="assets/img-add-pro/<?php echo $this->getMainImage($product->idPro) ?>"
                      alt=" Card image cap"></a>
                </div>
                <div class="card-body" id="card-body">
                  <h6 id="name-product" class="card-title">
                    <?php echo  $product->namePro ?>

                  </h6>
                  <span class="rating secondary-font">
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-warning"></i>
                    5.0</span>
                  <?php if ($product->discount <= 0) { ?> <p class="card-text text-danger">
                      <?php echo number_format($product->giaban) ?>đ
                    </p>

                    <p hidden id="productCostHidden"><?php echo $product->cost ?></p>
                  <?php } else { ?>
                    <p class="card-text text-danger text-decoration-line-through">
                      <?php echo number_format($product->giaban) ?>đ
                    </p>
                    <p class="card-text text-danger" style="margin-top:-15px">

                      <?php echo number_format($product->giaban - ($product->giaban * $product->discount) / 100) ?>đ
                    </p>
                    <p hidden id="productCostHidden">
                      <?php echo $product->giaban - ($product->giaban * $product->discount) / 100 ?>
                    </p>
                  <?php } ?>
                  <a href="index.php?controller=cart&action=create&id=<?php echo $product->idPro ?>"
                    style="text-decoration:none;color:white"><button type="submit"
                      style="position:absolute;top:0;right:0" class="btn btn-white shadow-sm rounded-pill"><i
                        style="color:black" class="fa-solid fa-cart-shopping text-danger"></i></button></a>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
        <!-- modal thông báo thêm hàng vào giỏ  -->
    </div>
  </div>
<?php endforeach ?>
</div>
<!-- End mục sản phẩm-->

<!--footer end-->
<script>
  $(document).ready(function() {
    $(".comment").hide();

    $("#comment").click(function() {
      $(".thongtinchitiet").hide();
      $(".comment").show();
    })
    $("#mota").click(function() {
      $(".thongtinchitiet").show();
      $(".comment").hide();
    })
  })
</script>
<script src="js/script.js"></script>
<script>
  const toastTrigger = document.getElementById('liveToastBtn');
  const toastLiveExample = document.getElementById('liveToast');

  if (toastTrigger) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
    toastTrigger.addEventListener('click', () => {
      toastBootstrap.show()
    })
  }
</script>