<?php
//load file layout.php
$this->layoutPath = "Layout.php";
?>
<div class="pagetitle">
    <h1 style="font-size:2.5vw;font-size:2.5vh">Quản lý Vouchers</h1>
    <!-- End Page Title -->
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="button-function d-flex justify-content-between mt-3 mb-4" style="width:70%">

                        <button style="font-size:2vw;font-size:2vh" id="uploadfile" class="btn btn-success"
                            type="button" title="Nhập"><a id="addnhanvien" href="index.php?controller=voucher&action=create"><i
                                    class="fas fa-plus"></i>>
                                Tạo mới Voucher</a></button>

                    </div>
                    <div class="search mt-4 mb-4 input-group" style="width:50%">
                        <button style="font-size:2vw;font-size:2vh" class="input-group-text btn btn-success"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                        <input class="form-control" type="text" id="searchNV">
                    </div>
                    <table style="font-size:2vw;font-size:2vh" class="table table-hover table-bordered text-center"
                        cellpadding="0" cellspacing="0" border="0" id="sampleTable">
                        <thead>
                            <tr class="table-primary">
                                <th>
                                    Mã Voucher
                                </th>
                                <th>
                                    Giảm giá
                                </th>
                                <th>Số lượng</th>
                                <th>Điều kiện áp dụng</th>
                                <th>
                                    Thời gian bắt đầu
                                </th>
                                <th>Thời gian kết thúc</th>
                                <th>
                                    Tình trạng
                                </th>
                                <th>
                                    Tính năng
                                </th>
                            </tr>
                        </thead>
                        <tbody id="table-nv">
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td><?php echo $row->ma ?></td>
                                    <td><?php echo $row->discount ?>%</td>
                                    <td><?php echo $row->count ?>
                                    </td>
                                    <td>
                                        <?php if ($row->dk_hoadon != ''): ?>
                                            <p>Áp dụng cho hóa đơn tối thiểu <?php echo number_format($row->dk_hoadon) ?>đ</p>
                                        <?php endif ?>
                                        <?php if ($row->dk_soluong != ''): ?>
                                            <p>Áp dụng với số lượng sản phẩm trong đơn hàng là <?php echo $row->dk_soluong ?></p>
                                        <?php endif ?>
                                        <?php if ($row->dk_hoadon == '' && $row->dk_soluong == ''): ?>
                                            <p>Áp dụng cho mọi đơn hàng</p>
                                        <?php endif ?>
                                    </td>
                                    <td><?php echo $row->time_start ?></td>
                                    <td><?php echo $row->time_end ?></td>

                                    <?php if ($row->status == 2) { ?>
                                        <td>
                                            <p class="text-secondary">Voucher chưa khả dụng</p>
                                        </td>
                                    <?php } elseif ($row->status == 1) { ?>
                                        <td>
                                            <p class="text-success">Voucher khả dụng</p>
                                        </td>
                                    <?php } elseif ($row->count <= 0) { ?>
                                        <td>
                                            <p class="text-danger">Voucher đã hết</p>
                                        </td>
                                    <?php } else { ?>
                                        <td>
                                            <p class="text-danger">Voucher đã hết hạn</p>
                                        </td>
                                    <?php } ?>
                                    <td class="table-td-center">
                                        <button style="font-size:2vw;font-size:2vh" class="btn btn-danger btn-sm trash"
                                            data-bs-target="#delete<?php echo $row->id ?>" data-bs-toggle="modal" type="button">
                                            <a style="color:white"> <i class="fas fa-trash-alt"></i></a>
                                        </button>
                                        <!-- Modal xóa -->
                                        <div class="modal fade" id="delete<?php echo $row->id ?>" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Bạn có muốn xóa chương trình này không ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary"><a
                                                                style="text-decoration:none;color:white"
                                                                href="index.php?controller=voucher&action=delete&id=<?php echo $row->id ?>">Đồng
                                                                ý</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- {{-- button sửa voucher --}} -->
                                        <button style="font-size:2vw;font-size:2vh" class="btn btn-success btn-sm edit"
                                            type="button" title="Sửa" id="show-emp" data-bs-toggle="modal"
                                            data-bs-target="#update">
                                            <a style="text-decoration:none;color:white"
                                                href="index.php?controller=voucher&action=change&id=<?php echo $row->id ?>"> <i
                                                    class="fas fa-edit"></i></a>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#" class="page-link">Trang</a></li>
                        <?php for ($i = 1; $i <= $numPage; $i++) { ?>
                            <li class="page-item"><a href="index.php?controller=voucher&page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_COOKIE["error"])) { ?>
    <script>
        $.toast({
            heading: 'Thông báo',
            text: 'Có lỗi xảy ra. Vui lòng thử lại sau !',
            showHideTransition: 'slide',
            icon: 'error',
            position: 'bottom-right'
        })
    </script>
<?php } ?>
<?php if (isset($_COOKIE["success"])) { ?>
    <script>
        $.toast({
            heading: 'Thông báo',
            text: 'Xóa thành công !',
            showHideTransition: 'slide',
            icon: 'success',
            position: 'bottom-right'
        })
    </script>
<?php } ?>
<?php if (isset($_COOKIE["successUpdate"])) { ?>
    <script>
        $.toast({
            heading: 'Thông báo',
            text: 'Cập nhật thành công !',
            showHideTransition: 'slide',
            icon: 'success',
            position: 'bottom-right'
        })
    </script>
<?php } ?>
<?php if (isset($_COOKIE["errorUpdate"])) { ?>
    <script>
        $.toast({
            heading: 'Thông báo',
            text: 'Có lỗi xảy ra. Vui lòng thử lại sau !',
            showHideTransition: 'slide',
            icon: 'error',
            position: 'bottom-right'
        })
    </script>
<?php } ?>
<!-- ======= Footer ======= -->
<script>
    $(document).ready(function() {
        $("#searchNV").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#table-nv tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>