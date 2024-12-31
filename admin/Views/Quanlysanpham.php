<?php
//load file layout.php
$this->layoutPath = "Layout.php";
?>

<div class="pagetitle">
    <h1>Quản lý sản phẩm</h1>
    <!-- End Page Title -->
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <?php if (isset($_COOKIE["createProductError"])) { ?>
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
                    <?php if (isset($_COOKIE["createProductSuccess"])) { ?>
                        <script>
                            $.toast({
                                heading: 'Thông báo',
                                text: 'Thêm sản phẩm mới thành công !',
                                showHideTransition: 'slide',
                                icon: 'success',
                                position: 'top-center'
                            })
                        </script>
                    <?php } ?>
                    <?php if (isset($_COOKIE["deleteProductError"])) { ?>
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
                    <?php if (isset($_COOKIE["deleteProductSuccess"])) { ?>
                        <script>
                            $.toast({
                                heading: 'Thông báo',
                                text: 'Xóa thành công thành công !',
                                showHideTransition: 'slide',
                                icon: 'success',
                                position: 'top-center'
                            })
                        </script>
                    <?php } ?>
                    <?php if (isset($_COOKIE["updateProductError"])) { ?>
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
                    <?php if (isset($_COOKIE["updateProductSuccess"])) { ?>
                        <script>
                            $.toast({
                                heading: 'Thông báo',
                                text: 'Câp nhật thông tin sản phẩm thành công !',
                                showHideTransition: 'slide',
                                icon: 'success',
                                position: 'top-center'
                            })
                        </script>
                    <?php } ?>
                    <div class="button-function d-flex justify-content-between mt-3 mb-4" style="width:70%">
                        <button id="uploadfile" class="btn btn-success btn-sm nhap-tu-file" type="button" title="Nhập"><a style="color:white" href="index.php?controller=product&action=create"><i class="fas fa-plus"></i>>
                                Tạo mới sản phẩm</a></button>
                    </div>
                    <div class="search mt-4 mb-4 input-group" style="width:50%">
                        <button class="input-group-text btn btn-success"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <input class="form-control" type="text" id="searchProduct">
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr class="table-primary text-center">
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Số lượng</th>
                                <th>Giá tiền</th>
                                <th>Giảm giá</th>
                                <th>Danh mục</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody id="table-product">
                            <?php
                            foreach ($data as $row) {
                            ?>
                                <tr class="text-center">
                                    <td><?php echo $row->idPro ?></td>
                                    <td><?php echo $row->namePro ?></td>
                                    <td class="text-center"><img src="../assets/img-add-pro/<?php echo $this->getMainImage($row->idPro) ?>" style="width:10vw;height:auto"></td>
                                    <td><?php echo $row->count ?></td>
                                    <td><?php echo number_format($row->giaban) ?>đ</td>
                                    <?php if ($row->discount !== '') { ?>
                                        <td><?php echo $row->discount ?>%</td>
                                    <?php } else { ?>
                                        <td></td>
                                    <?php } ?>
                                    <td><?php echo $this->getNameCat($row->idCat) ?></td>
                                    <td class="table-td-center">
                                        <a> <button class="btn btn-danger btn-sm trash" data-bs-toggle="modal" data-bs-target="#delete-product<?php echo $row->idPro ?>" type="button" title="Xóa">
                                                <i class="fas fa-trash-alt"></i>
                                            </button></a>
                                        <button class="btn btn-success btn-sm edit" type="button" title="Sửa" id="show-emp">
                                            <a style="text-decoration:none;color:white" href="index.php?controller=product&action=change&id=<?php echo $row->idPro ?>"><i class="fas fa-edit"></i> </a>
                                        </button>

                                        <!-- Modal xóa -->
                                        <div class="modal fade" id="delete-product<?php echo $row->idPro ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Bạn có muốn xóa không ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary"><a style="text-decoration:none;color:white" href="index.php?controller=product&action=delete&id=<?php echo $row->idPro ?>">Đồng ý</a></button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                            <li class="page-item"><a href="index.php?controller=product&page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#searchProduct").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#table-product tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>