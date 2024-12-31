<?php
//load file layout.php
$this->layoutPath = "Layout.php";
?>
<div class="pagetitle">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="font-size: 22px;">
            <li class="breadcrumb-item"><a href="index.php?controller=product">Quản lý sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm</li>
        </ol>
    </nav>
    <div style="background-color: white;padding:20px;border-radius:20px;box-shadow: 2px 2px 2px #FFCC99;">
        <!-- End Page Title -->
        <form method="post" id="AddProForm" action="<?php echo $action ?>" enctype="multipart/form-data" class="row mt-4">
            <div class="form-group col-md-4">
                <label style="font-weight: bolder;" class="control-label">Tên sản phẩm</label>
                <input class="form-control" id="namepro" name="namepro" type="text" required>
            </div>
            <div class="form-group col-md-4">
                <label style="font-weight: bolder;" class="control-label">Số lượng</label>
                <input class="form-control" name="countpro" id="countpro" type="text" required>
            </div>
            <div class="form-group col-md-4">
                <label style="font-weight: bolder;" class="control-label mt-3">Giá bán(VND)</label>
                <input class="form-control" id="giabanpro" name="giabanpro" type="text" required>
            </div>
            <div class="form-group  col-md-4">
                <label style="font-weight: bolder;" class="control-label mt-3">Giá vốn(VND)</label>
                <input class="form-control" id="giavonpro" name="giavonpro" type="text" required>
            </div>
            <div class="form-group  col-md-4">
                <label style="font-weight: bolder;" class="control-label mt-3">Giảm giá(%)</label>
                <input class="form-control" id="giavonpro" name="discount"  type="text">
            </div>

            <div class="form-group col-md-3">
                <label style="font-weight: bolder;" class="control-label mt-3">Danh mục</label>
                <select class="form-control" id="danhmucAddpro" name="danhmucAddpro" required>
                    <option selected>Chọn danh mục</option>
                    <?php foreach ($cat as $row): ?>
                        <option value="<?php echo $row->id_danhmuc ?>"><?php echo $row->tendanhmuc ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group ">
                <label style="font-weight: bolder;" class="control-label mt-3">Mô tả sản phẩm</label>
                <textarea id="mota" name="mota" class="form-control"> </textarea>
                <script type="text/javascript">
                    CKEDITOR.replace("mota");
                </script>
            </div>
            <div class="form-group col-md-12">
                <label style="font-weight: bolder;" class="control-label mt-3">Ảnh sản phẩm</label>
                <input class="form-control" id="imagepro" name="imagepro[]" multiple required style="width:30%" type="file">
            </div>
            <button class="btn btn-success mt-4 ms-2" type="submit" id="buttonAddPro" style="width:10%" value="Thêm" name="addproduct"> Thêm
            </button>
        </form>

    </div>
</div>
<!-- ======= Footer ======= -->
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