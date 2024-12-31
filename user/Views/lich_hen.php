<?php
$this->layoutPath = ("LayoutTrangChu.php");
function getMainImage($id)
{
    $conn = Connection::getInstance();
    $query = $conn->prepare("select image from image_products where idPro=:id limit 1");
    $query->execute(['id' => $id]);
    foreach ($query->fetchAll() as $row) {
        return $row->image;
    }
};
function getNameProductt($id)
{
    $conn = Connection::getInstance();
    $query = $conn->prepare("select namePro from image_products where idPro=:id limit 1");
    $query->execute(['id' => $id]);
    foreach ($query->fetchAll() as $row) {
        return $row->namePro;
    }
};
$conn = Connection::getInstance();
$id = $_SESSION["userId"] ? $_SESSION["userId"] : 0;
if ($id > 0) {
    $query = $conn->query("select * from booking where idCus = $id");
    $result = $query->fetchAll();
}
?>
<div class="productViewUser">
    <div class="cartSmallView mt-2 tab-pane fade show active " id="home-tab-pane" role="tabpanel"
        aria-labelledby="home-tab" tabindex="0">
        <section class="h-100" style="background-color: #d2c9ff;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-lg-12">

                                        <div class="p-5">
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <h2 style="font-size:2vw;font-size:2vh">Lịch hẹn <i
                                                        class="fa-solid fa-cart-plus"></i></h2>
                                            </div>
                                            <hr class="my-4">
                                            <?php foreach ($result as $row) { ?>
                                                <form style="width:50%" method="post" class="align-items-center" action="index.php?controller=book&action=changePost&id=<?php echo $id ?>" name=" booking_form">
                                                    <div class="form-group">
                                                        <h6 class="text-center">Thông tin của Boss</h6>
                                                        <i class="text-danger">Vui lòng điền đầy đủ thông tin !</i>
                                                        <br>
                                                        <label for="Bossname">Tên của Boss</label>
                                                        <input type="text" value="<?php echo $row->namePet ?>" class="form-control bossname" id="Bossname" name="Bossname" placeholder="Nhập tên của boss" required>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Bosstype">Boss là: </label>
                                                        <input type="text" class="form-control" value="<?php echo $row->type ?>" id="Bosstype" required name="Bosstype" placeholder="Chó, mèo ">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Bosstype">Tên dịch vụ: </label>
                                                        <input type="text" class="form-control" id="Bosstype" value="<?php echo $row->nameService ?>" required name="dichvu" placeholder="Tên gói muốn đăng ký ">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Bosstype">Tên gói: </label>
                                                        <input type="text" class="form-control" id="Bosstype" value="<?php echo $row->goi ?>" required name="goi" placeholder="Tên gói muốn đăng ký ">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Bossweight">Cân nặng(kg): </label>
                                                        <input type="text" class="form-control" id="Bossweight" value="<?php echo $row->weight ?>" required name="weight" placeholder="Điền cân nặng của Boss">
                                                    </div>
                                                    <div class="Date">
                                                        <p>Chọn lịch</p>
                                                        <input name="date" class="form-control" value="<?php echo $row->dateBook ?>" placeholder="Nhập lịch" required type="text">
                                                    </div>
                                                    <?php if ($row->tinhtrangBook === 0) { ?>
                                                        <div class="align-items-center d-flex justify-content-center">
                                                            <button type="submit" class="btn btn-primary mt-3 submit_booking mb-2">
                                                                Cập nhật
                                                            </button>
                                                        </div>
                                                        <div>
                                                            <button class="btn btn-danger">Lịch hẹn chưa được xác nhận</button>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div>
                                                            <button class="btn btn-success">Lịch đã được xác nhận</button>
                                                        </div>
                                                    <?php } ?>
                                                </form>
                                            <?php } ?>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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