<?php
$this->layoutPath = "LayoutTrangChu.php";
$conn = Connection::getInstance();
$query = $conn->prepare('SELECT * FROM customers WHERE id=:id');
$query->execute(["id" => $idUser]);
if (isset($_POST['updateInfor'])) {
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $local = $_POST['local'];
  $query1 = $conn->prepare("update customers set name=:_name, address=:_address,sodienthoai=:_phone ");
  $query1->execute([":_name" => $name, ":_address" => $local, ":_phone" => $phone]);
  if (isset($query1)) {
    echo ('<script>alert("Thay đổi thông tin thành công"</script>');
  }
}
foreach ($query->fetchAll() as $row) {
?>
  <div class="inforUserView">
    <!-- user infor -->
    <div class="row g-3 align-items-center mx-auto">
      <div class="col-3">
        <div class="card border-0 ">
          <img src="assets/img/avatar-trang-99.jpg" class="card-img-top rounded-circle w-50 mx-auto" alt="">
          <div class="card-body text-center">
            <h5 class="card-title"></h5>
            <p class="card-text"><?php echo isset($_SESSION['customer_email']) ? $_SESSION['customer_email'] : "" ?></p>

          </div>
        </div>
      </div>
      <div class="col-6">
        <form method="post">
          <h1 class="text-center mt-3">Thông tin cá nhân</h1>
          <div class="row g-3 align-items-center border-start border-end border-secondary  border-secondary-subtle">
            <div class="col">
              <p class="ms-2">Họ tên</p>
              <input type="text" name="name" class="form-control" value="<?php echo $row->name ?>">
            </div>
            <div class="col-12">
              <p class="ms-2">Số điện thoại</p>
              <input type="text" class="form-control" name="phone" value="<?php echo $row->sodienthoai ?>">
            </div>
            <div class="col-12">
              <p class="ms-2">Địa chỉ</p>
              <input type="text" class="form-control" name="local" value="<?php echo $row->address ?>">
            </div>
            <div class="col-12">
              <div class="d-grid gap-2 col-4 mx-auto">
                <button class="btn btn-outline-danger" name="updateInfor" type="submit">Lưu thông tin</button>
              </div>

            </div>
          </div>
        </form>
      </div>
    <?php } ?>
    </div>
  </div>