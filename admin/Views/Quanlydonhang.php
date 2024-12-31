<?php
//load file layout.php
$this->layoutPath = "Layout.php";
?>
<div class="pagetitle">
  <h1>Danh Sách Đơn Hàng</h1>
</div><!-- End Page Title -->
<?php if (isset($_COOKIE["deleteOrderError"])) { ?>
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
<?php if (isset($_COOKIE["deleteOrderSuccess"])) { ?>
  <script>
    $.toast({
      heading: 'Thông báo',
      text: 'Xóa đơn hàng thành công !',
      showHideTransition: 'slide',
      icon: 'success',
      position: 'top-center'
    })
  </script>
<?php } ?>
<?php if (isset($_COOKIE["deliveryOrderError"])) { ?>
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
<?php if (isset($_COOKIE["deliveryOrderSuccess"])) { ?>
  <script>
    $.toast({
      heading: 'Thông báo',
      text: 'Đơn hàng đã được xác nhận giao hàng thành công !',
      showHideTransition: 'slide',
      icon: 'success',
      position: 'top-center'
    })
  </script>
<?php } ?>
<section class="section">
  <div class="row">
    <div class="search mt-4 mb-4 input-group" style="width:50%">
      <button class="input-group-text btn btn-success"><i class="fa-solid fa-magnifying-glass"></i></button>
      <input class="form-control" type="text" id="searchOrders">
    </div>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body table-responsive">
          <table class="table text-center">
            <thead>
              <tr>
                <th>
                  ID đơn hàng
                </th>
                <th>Khách Hàng </th>
                <th>Số điện thoại</th>
                <th>Ngày đặt</th>
                <th>Tình trạng</th>
                <th>Tính năng</th>
              </tr>
            </thead>
            <tbody id="table-order">
              <?php
              foreach ($listRecord as $row) {
                $customer = $this->modelGetCustomers($row->customer_id);
              ?>
                <tr>
                  <td><?php echo $row->id ?></td>
                  <td><?php echo $customer->name;  ?></td>
                  <td><?php echo $customer->sodienthoai;  ?></td>
                  <td><?php echo $row->create_at;  ?></td>
                  <?php
                  if ($row->status > 0) {
                  ?>
                    <td><button class=" btn btn-success">Đã giao hàng</button> </td>
                  <?php
                  } else {
                  ?>
                    <td><button class="btn btn-danger">Chưa giao hàng</button> </td>
                  <?php
                  } ?>

                  <td>
                    <a style="color:white;text-decoration:none"> <button data-bs-toggle="modal" data-bs-target="#deleteOrder<?php echo $row->id ?>" class="btn btn-danger"> <i class="bi bi-trash"></i></button></a>
                    <!-- Modal xóa order -->
                    <div class="modal fade" id="deleteOrder<?php echo $row->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <h5>Bạn có chắc chắn muốn xóa đơn hàng này không ?</h5>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <a href="index.php?controller=donhang&action=delete&id=<?php echo $row->id ?>"> <button type="button" class="btn btn-primary">Xác nhận</button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                    if ($row->status > 0) {
                    } else {
                    ?>

                      <a> <button data-bs-target="#delivery<?php echo $row->id ?>" data-bs-toggle="modal" class="btn btn-success"><i class="fa-solid fa-truck"></i></button></a>
                      <!-- Modal giao hàng -->
                      <div class="modal fade" id="delivery<?php echo $row->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <h5>Xác nhận giao hàng</h5>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                              <a href="index.php?controller=donhang&action=delivery&id=<?php echo $row->id ?>"> <button type="submit" class="btn btn-primary">Xác nhận</button></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                    <button class="btn btn-primary"><a style="color:white;text-decoration:none" href="index.php?controller=donhang&action=detail&id=<?php echo $row->id ?>">Xem </a></button>
                  </td>
                </tr>
              <?php
              } ?>
            </tbody>
          </table>
          <!-- End Table with stripped rows -->
          <ul class="pagination">
            <li class="page-item disabled"><a href="#" class="page-link">Trang</a></li>
            <?php for ($i = 1; $i <= $numPage; $i++) { ?>
              <li class="page-item"><a href="index.php?controller=donhang&page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- Modal giao hàng -->
<div class="modal fade" id="delivery" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5>Xác nhận giao hàng</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <a href="index.php?controller=donhang&action=delivery&id=<?php echo $row->id ?>"> <button type="submit" class="btn btn-primary">Xác nhận</button></a>
      </div>
    </div>
  </div>
</div>

<!-- ======= Footer ======= -->



<script>
  const toastTrigger = document.getElementById('liveToastBtn')
  const toastLiveExample = document.getElementById('liveToast')

  if (toastTrigger) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
    toastTrigger.addEventListener('click', () => {
      toastBootstrap.show()
    })
  }
</script>
<script>
  $(document).ready(function() {
    $("#searchOrders").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#table-order tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>