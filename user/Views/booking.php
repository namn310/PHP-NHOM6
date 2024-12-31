<?php
$this->layoutPath = ("LayoutTrangChu.php");
?>
<div class=" bookingUserView">
  <!-- Booking -->
  <div class="container mt-4 border pdt">
    <h3 class="service text-capitalize">ĐẶT LỊCH NGAY</h3>
    <hr>
    <div class="row">
      <div class="col-4">
        <img src="images/login-img/load.gif" class="w-100">
        <?php if (isset($_COOKIE["createBookingError"])) { ?>
          <script>
            $.toast({
              heading: 'Thông báo',
              text: 'Có lỗi xảy ra. Vui lòng thử lại sau !',
              showHideTransition: 'slide',
              icon: 'error',
              position: 'top-center'
            })
          </script>
        <?php } ?>
        <?php if (isset($_COOKIE["createBookingSuccess"])) { ?>
          <script>
            $.toast({
              heading: 'Thông báo',
              text: 'Đặt lịch thành công !',
              showHideTransition: 'slide',
              icon: 'success',
              position: 'top-center'
            })
          </script>
        <?php } ?>
      </div>
      <div class="col-8 align-items-left d-flex justify-content-left ps-5">
        <form style="width:50%" method="post" class="align-items-center" action="index.php?controller=book&action=create&id=<?php echo $idUser ?>" name=" booking_form">
          <div class="form-group">
            <h6 class="text-center">Thông tin của Boss</h6>
            <i class="text-danger">Vui lòng điền đầy đủ thông tin !</i>
            <br>
            <label for="Bossname">Tên của Boss</label>
            <input type="text" class="form-control bossname" id="Bossname" name="Bossname" placeholder="Nhập tên của boss" required>

          </div>
          <div class="form-group">
            <label for="Bosstype">Boss là: </label>
            <input type="text" class="form-control" id="Bosstype" required name="Bosstype" placeholder="Chó, mèo ">

          </div>
          <div class="form-group">
            <label for="Bosstype">Tên dịch vụ: </label>
            <input type="text" class="form-control" id="Bosstype" required name="dichvu" placeholder="Tên gói muốn đăng ký ">

          </div>
          <div class="form-group">
            <label for="Bosstype">Tên gói: </label>
            <input type="text" class="form-control" id="Bosstype" required name="goi" placeholder="Tên gói muốn đăng ký ">

          </div>
          <div class="form-group">
            <label for="Bossweight">Cân nặng(kg): </label>
            <input type="text" class="form-control" id="Bossweight" required name="weight" placeholder="Điền cân nặng của Boss">
          </div>
          <div class="Date">
            <p>Chọn lịch</p>
            <input name="date" class="form-control" placeholder="Nhập lịch" required type="text">
          </div>
          <div class="align-items-center d-flex justify-content-center">
            <button type="submit" class="btn btn-danger mt-3 submit_booking mb-2">
              Đặt lịch
            </button>
          </div>
        </form>
      </div>
      <!-- Button trigger modal -->
      <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">

              <h3>Xác nhận đặt lịch</h3>
            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
              <a href="index.php?controller=book&action=create&id=<?php echo $customerId ?>"> <button type="button" class="btn btn-success" data-bs-dismiss="modal">Đồng ý</button></a>
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>


  </div>
</div>