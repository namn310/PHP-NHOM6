<?php
//load file layout.php
$this->layoutPath = "Layout.php";
?>
<div class="pagetitle">
    <h1>Quản lý danh mục</h1>
    <!-- End Page Title -->
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <?php if (isset($_COOKIE["createCatError"])) { ?>
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
                    <?php if (isset($_COOKIE["createCatSuccess"])) { ?>
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
                    <?php if (isset($_COOKIE["deleteCatError"])) { ?>
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
                    <?php if (isset($_COOKIE["deleteCatSuccess"])) { ?>
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
                    <?php if (isset($_COOKIE["updateCatError"])) { ?>
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
                    <?php if (isset($_COOKIE["updateCatSuccess"])) { ?>
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
                        <button id="uploadfile" class="btn btn-success" type="button" title="Nhập"><a id="addnhanvien" href="index.php?controller=danhmuc&action=create"><i class="fas fa-plus"></i>>
                                Tạo mới danh mục</a></button>
                    </div>
                    <div class="search mt-4 mb-4 input-group" style="width:50%">
                        <button class="input-group-text btn btn-success"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <input class="form-control" type="text" id="searchNV">
                    </div>
                    <table class="table table-hover table-bordered text-center table-responsive" cellpadding="0" cellspacing="0" border="0" id="sampleTable">
                        <thead>

                            <tr class="table-primary">
                                <th>
                                    ID danh mục
                                </th>
                                <th>
                                    Tên danh mục
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
                                    <td><?php echo $row->id_danhmuc ?></td>
                                    <td>
                                        <?php echo $row->tendanhmuc ?>
                                    </td>
                                    <td class="table-td-center">
                                        <button class="btn btn-danger btn-sm trash" type="button" title="Xóa" data-bs-toggle="modal" data-bs-target="#delete<?php echo $row->id_danhmuc ?>">
                                            <a style="color:white"><i class="fas fa-trash-alt"></i></a>
                                        </button>
                                        <!-- delete -->
                                        <div class="modal fade" id="delete<?php echo $row->id_danhmuc ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Xác nhận xóa danh mục sản phẩm này
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary"><a style="text-decoration:none;color:white" href="index.php?controller=danhmuc&action=delete&id=<?php echo $row->id_danhmuc ?>">Đồng ý</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- update -->
                                        <button class="btn btn-success btn-sm edit" type="button" title="Sửa" data-bs-toggle="modal" data-bs-target="#update<?php echo $row->id_danhmuc ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <div class="modal fade" id="update<?php echo $row->id_danhmuc ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form method="post" action="index.php?controller=danhmuc&action=update&id=<?php echo $row->id_danhmuc ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div>
                                                                <label class="form-label" for="tendanhmuc">Tên danh mục</label>
                                                                <input class="form-control" id="tendanhmuc" type="text" name="tendanhmuc" value="<?php echo $row->tendanhmuc ?>">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"><a style="text-decoration:none;color:white">Đồng ý</a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
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