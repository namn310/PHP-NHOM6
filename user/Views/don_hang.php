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
// echo $id;
if ($id > 0) {
    $query = $conn->query("select orders.*,orderdetails.* from orders inner join orderdetails on orders.id = orderdetails.order_id where orders.customer_id = $id");
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
                                                <h2 style="font-size:2vw;font-size:2vh">Đơn hàng <i
                                                        class="fa-solid fa-cart-plus"></i></h2>
                                            </div>
                                            <hr class="my-4">
                                            <?php
                                            if ($result !== null) {
                                                foreach ($result as $row) { ?>
                                                    <div>
                                                        <div
                                                            class="row mb-0 d-flex justify-content-between align-items-center">
                                                            <div class="col-md-3 col-lg-3 col-xl-3 mb-4">
                                                                <img src="assets/img-add-pro/<?php echo $this->getMainImage($row->product_id) ?>"
                                                                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                            </div>
                                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                                <h6 style="font-size:3vw;font-size:3vh" class="mb-0">
                                                                    <?php
                                                                    $query = $conn->prepare("select namePro from product where idPro=:id limit 1");
                                                                    $query->execute(['id' => $row->product_id]);
                                                                    $result = $query->fetch(PDO::FETCH_ASSOC);
                                                                    echo $result['namePro'];
                                                                    ?>
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-1 col-lg-1 col-xl-1 d-flex">
                                                                <h5>x<?php echo $row->number ?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <h6 class="text-danger"><b> Tổng tiền :
                                                                    <?php echo number_format($row->price)
                                                                    ?>đ</b>
                                                            </h6>
                                                        </div>
                                                        <div>
                                                            <?php if ($row->status == 0) { ?>
                                                                <div class="text-end"><button
                                                                        class="btn btn-warning m-2">Chờ
                                                                        xác
                                                                        nhận</button> </div>
                                                                <div><button class="btn btn-danger cancel-order"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#cancel_order{{ $order->id }}">Hủy
                                                                        đơn</button>
                                                                </div>
                                                                <!-- {{-- modal thông báo xác nhận xóa đơn hàng --}}
                                                                <div class="modal fade" id="cancel_order{{ $order->id }}"
                                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 style="font-size:1.3vh;font-size:1.3vw"
                                                                                    class="modal-title fs-5"
                                                                                    id="exampleModalLabel">Thông
                                                                                    báo
                                                                                </h1>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body"
                                                                                style="font-size:1.3vh;font-size:1.3vw">
                                                                                Bạn có muốn hủy đơn hàng này không ?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-danger"
                                                                                    data-bs-dismiss="modal"
                                                                                    style="font-size:1.3vh;font-size:1.3vw">Đóng</button>

                                                                                <button type="submit"
                                                                                    class="btn btn-primary"> @csrf<a
                                                                                        href="{{ route('user.deleteOrder', ['id' => $order->id]) }}"
                                                                                        style="text-decoration:none;color:white;font-size:1.3vh;font-size:1.3vw">Đồng
                                                                                        ý</a></button>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                            <?php } else { ?>
                                                                <div class="text-end"><button
                                                                        class="btn btn-success m-2">Đơn hàng
                                                                        đang được giao</button> </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="text-end"></div>
                                                    <hr class="my-4">
                                                <?php }
                                            } else {
                                                ?>
                                                <p>Bạn chưa có đơn hàng nào</p>
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