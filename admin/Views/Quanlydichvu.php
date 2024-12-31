<?php
//load file layout.php
$this->layoutPath = "Layout.php";
?>

<div class="pagetitle">
  <h1>Quản lý dịch vụ</h1>
  <!-- End Page Title -->
  <?php if (isset($_COOKIE["deleteServiceError"])) { ?>
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
  <?php if (isset($_COOKIE["deleteServiceSuccess"])) { ?>
    <script>
      $.toast({
        heading: 'Thông báo',
        text: 'Xóa dịch vụ thành công !',
        showHideTransition: 'slide',
        icon: 'success',
        position: 'top-center'
      })
    </script>
  <?php } ?>
  <?php if (isset($_COOKIE["changeServiceError"])) { ?>
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
  <?php if (isset($_COOKIE["changeServiceSuccess"])) { ?>
    <script>
      $.toast({
        heading: 'Thông báo',
        text: 'Cập nhật dịch vụ thành công !',
        showHideTransition: 'slide',
        icon: 'success',
        position: 'top-center'
      })
    </script>
  <?php } ?>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="button-function d-flex justify-content-between mt-3 mb-4" style="width:70%">
            <button id="uploadfile" class="btn btn-success" type="button" title="Nhập"><a id="addnhanvien" href="index.php?controller=dichvu&action=create"><i class="fas fa-plus"></i>>
                Tạo mới dịch vụ</a></button>
          </div>
          <div class="search mt-4 mb-4 input-group" style="width:50%">
            <button class="input-group-text btn btn-success"><i class="fa-solid fa-magnifying-glass"></i></button>
            <input class="form-control" type="text" id="searchNV">
          </div>
          <table class="table table-hover table-bordered text-center" cellpadding="0" cellspacing="0" border="0" id="sampleTable">
            <thead>

              <tr class="table-primary">
                <th>
                  ID danh mục
                </th>
                <th>
                  Tên dịch vụ
                </th>
                <th>
                  Thời gian tạo
                </th>
                <th>
                  Tính năng
                </th>
              </tr>
            </thead>
            <tbody id="table-nv">
              <?php
              foreach ($data as $row) {
              ?>
                <tr>
                  <td><?php echo $row->id_dichvu ?> </td>
                  <td><?php echo $row->ten_dichvu ?></td>
                  <td><?php echo $row->dateCreate ?></td>
                  <td>
                    <a href="index.php?controller=dichvu&action=delete&id=<?php echo $row->id_dichvu ?>"> <button class="btn btn-danger">X</button></a>
                    <a href="index.php?controller=dichvu&action=change&id=<?php echo $row->id_dichvu ?>"> <button class="btn btn-success"><i class="fas fa-edit"></i></button></a>
                    <a href="index.php?controller=dichvu&action=detail&id=<?php echo $row->id_dichvu ?>"><button class="btn btn-primary">Xem</button></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>