<?php
//load file layout.php
$this->layoutPath = "Layout.php";
?>
<div class="pagetitle">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="font-size:2vw;font-size:2vh">
            <li class="breadcrumb-item"><a href="index.php?controller=voucher">Quản lý Vouchers</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cập nhật Voucher</li>
        </ol>
    </nav>
    <div style="background-color: white;padding:20px;border-radius:20px;box-shadow: 2px 2px 2px #FFCC99;">
        <!-- End Page Title --><?php foreach ($result as $row): ?>
            <form style="font-size:2vw;font-size:2vh" method="post" id="ChangeVoucherForm" enctype="multipart/form-data" class="row mt-4">
                <input id="url" hidden value="index.php?controller=voucher&action=update&id=<?php echo $row->id ?>">
                <div class="form-group col-md-4">
                    <label style="font-weight: bolder;" class="control-label">Mã Voucher</label>
                    <input style="font-size:2vw;font-size:2vh" value="<?php echo $row->ma ?>" type="text" class="form-control" id="maVoucher" name="ma">
                </div>
                <div class="form-group col-md-4">
                    <label style="font-weight: bolder;" class="control-label">Số lượng</label>
                    <input style="font-size:2vw;font-size:2vh" class="form-control" value="<?php echo $row->count ?>" name="count" id="countVoucher" type="text">
                </div>
                <div class="form-group col-md-4">
                    <label style="font-weight: bolder;" class="control-label">Giảm giá</label>
                    <input style="font-size:2vw;font-size:2vh" class="form-control" value="<?php echo $row->discount ?>" name="discount" id="discountVoucher"
                        type="text">
                </div>
                <div class="form-group col-md-4">
                    <label style="font-weight: bolder;" class="control-label">Điều kiện áp dụng cho hóa đơn</label>
                    <input style="font-size:2vw;font-size:2vh" placeholder="Nhập giá trị tối thiểu của hóa đơn"
                        class="form-control" name="dk_hoadon" value="<?php echo $row->dk_hoadon ?>" id="countpro" type="text">
                </div>
                <div class="form-group col-md-4">
                    <label style="font-weight: bolder;" class="control-label">Điều kiện áp dụng với số lượng</label>
                    <input style="font-size:2vw;font-size:2vh" placeholder="Nhập số lượng sản phẩm tối thiểu"
                        class="form-control" name="dk_soluong" value="<?php echo $row->dk_soluong ?>" id="countpro" type="text">
                </div>

                <div class="form-group  col-md-4">
                    <label style="font-weight: bolder;" class="control-label mt-3">Ngày áp dụng</label>
                    <input style="font-size:2vw;font-size:2vh" value="<?php echo $row->time_start ?>" class="form-control" id="dateStart" name="dateStart"
                        type="date">
                </div>
                <div class="form-group  col-md-4">
                    <label style="font-weight: bolder;" class="control-label mt-3">Ngày kết thúc</label>
                    <input style="font-size:2vw;font-size:2vh" class="form-control" value="<?php echo $row->time_end ?>" id="dateEnd" name="dateEnd"
                        type="date">
                </div>
                <div class="form-group ">
                    <label style="font-weight: bolder;" class="control-label mt-3">Mô tả</label>
                    <textarea style="font-size:2vw;font-size:2vh" id="mota" value="<?php echo $row->description ?>" name="mota" class="form-control"> </textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace("mota");
                    </script>
                </div>
                <div>
                    <button class="btn btn-success mt-4 ms-2" type="submit" id="buttonAddPro"
                        style="width:10%;font-size:2vw;font-size:2vh" value="Thêm" name="addproduct"> Cập nhật
                    </button>
                </div>
            <?php endforeach ?>
            </form>
    </div>
</div>
<?php if (isset($_COOKIE["UpdateVoucherFalse"])) { ?>
    <script>
        $.toast({
            heading: 'Thông báo',
            text: 'Mã Voucher đã tồn tại !',
            showHideTransition: 'slide',
            icon: 'error',
            position: 'top-center'
        })
    </script>
<?php } ?>
<?php if (isset($_COOKIE["UpdateVoucherSuccess"])) { ?>
    <script>
        $.toast({
            heading: 'Thông báo',
            text: 'Cập nhật Voucher thành công !',
            showHideTransition: 'slide',
            icon: 'success',
            position: 'top-center'
        })
    </script>
<?php } ?>
<?php if (isset($_COOKIE["UpdateVoucherError"])) { ?>
    <script>
        $.toast({
            heading: 'Thông báo',
            text: 'Có lỗi xảy ra. Vui lòng thử lại sau',
            showHideTransition: 'slide',
            icon: 'warning',
            position: 'top-center'
        })
    </script>
<?php } ?>
<script src="../assets/js/ckeditor/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/translations/vi.js"> </script>
<style>
    .ck-editor__editable_inline {
        min-height: 250px;
        max-height: 450px;
    }
</style>
<script>
    ClassicEditor.create(document.querySelector('#mota'), {
            language: 'vi'
        })
        .then(editor => {})
        .catch(error => {
            console.error(error)
        });
</script>