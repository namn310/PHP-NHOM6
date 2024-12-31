<?php
//load file layout.php
$this->layoutPath = "Layout.php";
$conn = Connection::getInstance();
$query = $conn->query("select * from booking");
?>

<div class="pagetitle">
    <h1>Danh Sách lịch hẹn</h1>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">
        <div class="search mt-4 mb-4 input-group" style="width:50%">
            <button class="input-group-text btn btn-success"><i class="fa-solid fa-magnifying-glass"></i></button>
            <input class="form-control" type="text" id="searchOrders">
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table text-center table-bordered">
                        <thead>
                            <tr>
                                <th>ID lịch hẹn </th>
                                <th>Tên khách hàng </th>
                                <th>Số điện thoại</th>
                                <th>Ngày hẹn</th>
                                <th>Dịch vụ</th>
                                <th>Tình trạng</th>
                                <th>Tính năng</th>
                            </tr>
                        </thead>
                        <tbody id="table-order">
                            <?php
                            foreach ($query->fetchAll() as $row) {
                                $idCus = $row->idCus;
                                $query2 = $conn->query("select name,sodienthoai from customers where id=$idCus");
                                foreach ($query2->fetchAll() as $row2) {
                                    $nameCus = $row2->name;
                                    $phone = $row2->sodienthoai;
                                }
                            ?>
                                <tr>
                                    <td><?php echo $row->id ?></td>
                                    <td><?php echo $nameCus ?></td>
                                    <td><?php echo $phone ?></td>
                                    <td><?php echo $row->dateBook ?></td>
                                    <td><?php echo $row->nameService ?></td>
                                    <?php
                                    if ($row->tinhtrangBook == 1) {
                                    ?>
                                        <th><button class="btn btn-success">Đã duyệt</button></th>
                                    <?php
                                    } else { ?>
                                        <th><button class="btn btn-danger">Chưa duyệt</button></th>
                                    <?php } ?>
                                    <td class="d-flex justify-content-between flex-wrap">
                                        <a style="text-decoration:none" href="index.php?controller=book&action=detail&id=<?php echo $row->id ?>"><button class="btn btn-secondary"><i class="fa-solid fa-bars"></i></button></a>
                                        <a style="text-decoration:none" class="ms-2" href="index.php?controller=book&action=confirm&id=<?php echo $row->id ?>"><button class="btn btn-primary"><i class="fa-solid fa-check"></i></button></a>
                                        <a style="text-decoration:none" class="ms-2" href="index.php?controller=book&action=unconfirm&id=<?php echo $row->id ?>"><button class="btn btn-warning"><i class="fa-solid fa-circle-notch"></i></button></a>
                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBook"><i class="fa-solid fa-xmark"></i></button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#" class="page-link">Trang</a></li>
                        <?php for ($i = 1; $i <= $numPage; $i++) { ?>
                            <li class="page-item"><a href="index.php?controller=book&page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="fa-solid fa-check-double" style="color: #12ca27;"></i>
            <strong class="me-auto ms-2">Thông báo</strong>
            <small>Now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Đơn hàng đã được giao !
        </div>
    </div>
</div>
<!-- Modal xóa order -->
<div class="modal fade" id="deleteBook" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Bạn có chắc chắn muốn xóa lịch hẹn này không ?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <a style="text-decoration:none" class="ms-2" href="index.php?controller=book&action=delete&id=<?php echo $row->id ?>"><button class="btn btn-primary">Xác nhận</button></a>
            </div>
        </div>
    </div>
</div>
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