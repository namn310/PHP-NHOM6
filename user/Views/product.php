<?php
$this->layoutPath = ("LayoutTrangChu.php");
$conn = Connection::getInstance();
$query2 = $conn->query("select id_danhmuc from danhmuc limit 1");
foreach ($query2->fetchAll() as $row) {
  $id = $row->id_danhmuc;
};
$id_danhmuc = isset($_GET['idDM']) && is_numeric($_GET['idDM']) ? $_GET['idDM'] : $id;
?>
<div class="productViewUser">
  <!-- Danh mục sản phẩm-->
  <div class=" container-fluid pdt">
    <div class="row">
      <div class="col-3 sm">
        <h3 class="text-center mb-2">Danh mục sản phẩm</h3>
        <ul class="category list-group">
          <!-- Lấy dữ liệu bảng danh mục xuất ra danh mục -->
          <?php
          $data = $conn->query("SELECT * FROM danhmuc");
          foreach ($data->fetchAll() as $a) {
          ?>
            <li class="list-group-item"><a href="index.php?controller=product&action=danhmuc&idDM=<?php echo $a->id_danhmuc ?>"> <button class="btn btn-white" style="width:100%"><?php echo $a->tendanhmuc ?></button></a></li>
          <?php } ?>
        </ul>
      </div>
      <div class="col-9 lg">
        <nav class="navbar mb-3 navbar-light bg-light justify-content-between">
          <h3 style="color:black"><?php echo $this->getDanhMuc($id_danhmuc)  ?></h3>
          <p class="hiddenCat" hidden><?php echo $id_danhmuc ?></p>
          <form class="form-inline d-flex">
            <input class="form-control mr-sm-2" type="text" id="nameProductSearch" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0 ml-3" id="buttonSearch" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
        </nav>
        <div>

          <div class="dropdown" style="font-size:1.3vw 1.3vh">
            <button class="btn btn-white dropdown-toggle" style="border:1px solid black" type="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Sắp xếp
            </button>
            <ul class="dropdown-menu">
              <li><button class="sort-button btn btn-white" data-field="giaban" data-order="asc">Giá tăng từ
                  thấp ->
                  cao</button></li>
              <li><button class="sort-button btn btn-white" data-field="giaban" data-order="desc">Giá từ cao
                  ->
                  thấp</button></li>
              <li><button class="sort-button btn btn-white" data-field="namePro" data-order="asc">Sắp xếp
                  từ A ->
                  Z</button></li>
              <li><button class="sort-button btn btn-white" data-field="namePro" data-order="desc">Sắp xếp
                  từ Z ->
                  A</button></li>
            </ul>
          </div>
        </div>
        <div class="product-list d-flex flex-wrap">
          <!-- Lấy dữ liệu từ bảng product để xuất ra sản phẩm -->
          <?php
          $query = $conn->query("select * from product where idCat=$id_danhmuc");
          foreach ($query->fetchAll() as $product) :
          ?>
            <!-- {{-- Thông tin sản phẩm --}} -->
            <div id="product-infor" class="card position-relative" style="max-width:15rem;height:27rem"
              style="border:0px">
              <!-- {{-- giảm giá sản phẩm --}} -->
              <?php if ($product->discount > 0) : ?>
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
                    alt="Card image cap"></a>
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
</div>
<!-- End mục sản phẩm-->

<!-- Tìm kiếm sản phẩm -->
<script>
  //searchProduct
  $(document).ready(function() {
    $("#nameProductSearch").on("keyup", function() {
      var result = $("#nameProductSearch").val().toLowerCase();
      var nameProduct = document.querySelectorAll("#name-product");
      nameProduct.forEach((product) => {

        $(product).parent().parent().parent().filter(function() {
          $(product).parent().parent().toggle($(product).text().toLowerCase().indexOf(result) > -1);
        })

      })
    });
  });
</script>