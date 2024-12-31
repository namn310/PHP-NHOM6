<?php
$this->layoutPath = ("LayoutTrangChu.php");
?>
<div class="cartView">
  <!-- Dịch vụ-->
  <?php
  foreach ($data as $row) {


  ?>
    <div class=" service container text-center mt-3 pdt">
      <h2><?php echo $row->ten_dichvu ?></h2>
      <i class="fa-solid fa-heart"></i>
      <h4>Bảng giá dịch vụ</h4>
      <img class="img-fluid" src="assets/img-dichvu/<?php echo $row->hinhanh ?>">
      <button type="button" class="btn btn-danger mt-3"><a style="text-decoration: none;color:white" href="index.php?controller=book">Đăng ký ngay</a></button>
    </div>
    <br>
    <hr>
  <?php } ?>
</div>
<!--hẾT DỊCH VỤ-->