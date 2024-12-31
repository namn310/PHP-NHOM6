<?php
$this->layoutPath = ("LayoutTrangChu.php");
$customerId = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : 0;

?>

<!-- main images -->
<div class="main_img mt-2">

</div>
<!-- Booking -->
<div class="container mt-4 border pdt">
    <h3 class="service text-capitalize">Thay đổi lịch</h3>
    <hr>
    <div class="row">
        <div class="col-4">
            <img src="../images/login-img/load.gif" class="w-100">
        </div>
        <?php foreach ($data as $row) { ?>
            <div class="col-8 align-items-left d-flex justify-content-left ps-5">
                <form style="width:50%" method="post" class="align-items-center" action="index.php?controller=book&action=changePost&id=<?php echo $row->id ?>" name=" booking_form">
                    <div class="form-group">
                        <h6 class="text-center">Thông tin của Boss</h6>
                        <label for="Bossname">Tên của Boss</label>
                        <input type="text" class="form-control bossname" id="Bossname" name="Bossname" value="<?php echo $row->namePet ?>">

                    </div>
                    <div class="form-group">
                        <label for="Bosstype">Boss là: </label>
                        <input type="text" class="form-control" id="Bosstype" name="Bosstype" value="<?php echo $row->type ?>">

                    </div>
                    <div class="form-group">
                        <label for="Bosstype">Tên dịch vụ: </label>
                        <input type="text" class="form-control" id="Bosstype" name="dichvu" value="<?php echo $row->nameService ?>">

                    </div>
                    <div class="form-group">
                        <label for="Bosstype">Tên gói: </label>
                        <input type="text" class="form-control" id="Bosstype" name="goi" value="<?php echo $row->goi ?>">

                    </div>
                    <div class="form-group">
                        <label for="Bossweight">Cân nặng(kg): </label>
                        <input type="text" class="form-control" id="Bossweight" name="weight" value="<?php echo $row->weight ?>">
                    </div>
                    <div class="Date">
                        <p>Chọn lịch</p>
                        <input name="date" class="form-control" value="<?php echo $row->dateBook ?>" required type="text">
                    </div>
                    <div class="align-items-center d-flex justify-content-center">
                        <button type="submit" class="btn btn-danger mt-3 submit_booking mb-2">
                            Xác nhận
                        </button>
                    </div>
                </form>
            </div>
        <?php } ?>
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


<!--footer-->


<!--footer end-->
<script src="../js/script.js"></script>