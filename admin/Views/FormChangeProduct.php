<?php
$this->layoutPath = "Layout.php";
?>
<div class="pagetitle">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="font-size: 22px;">
            <li class="breadcrumb-item"><a href="index.php?controller=product">Quản lý sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sửa sản phẩm</li>
        </ol>
    </nav>
    <div style="background-color: white;padding:20px;border-radius:20px;box-shadow: 2px 2px 2px #FFCC99;">
        <!-- End Page Title -->
        <?php foreach ($record1 as $record): ?>
            <form method="post" id="AddProForm" action="index.php?controller=product&action=changePost&idPro=<?php echo $record->idPro ?>" enctype="multipart/form-data" class="row mt-4">
                <div class="form-group col-md-4">
                    <label style="font-weight: bolder;" class="control-label">Tên sản phẩm</label>
                    <input class="form-control" id="namepro" value="<?php echo $record->namePro ?>" name="namepro" type="text" required>
                </div>
                <div class="form-group col-md-4">
                    <label style="font-weight: bolder;" class="control-label">Số lượng</label>
                    <input class="form-control" name="countpro" value="<?php echo $record->count ?>" id="countpro" type="text" required>
                </div>
                <div class="form-group col-md-4">
                    <label style="font-weight: bolder;" class="control-label mt-3">Giá bán(VND)</label>
                    <input class="form-control" id="giabanpro" name="giabanpro" value="<?php echo $record->giaban ?>" type="text" required>
                </div>
                <div class="form-group  col-md-4">
                    <label style="font-weight: bolder;" class="control-label mt-3">Giá vốn(VND)</label>
                    <input class="form-control" id="giavonpro" name="giavonpro" value="<?php echo $record->giavon ?>" type="text" required>
                </div>
                <div class="form-group  col-md-4">
                    <label style="font-weight: bolder;" class="control-label mt-3">Giảm giá(%)</label>
                    <input class="form-control" id="giavonpro" name="discount" value="<?php echo $record->discount ?>" type="text">
                </div>

                <div class="form-group col-md-3">
                    <label style="font-weight: bolder;" class="control-label mt-3">Danh mục</label>
                    <select class="form-control" id="danhmucAddpro" name="danhmucAddpro" required>
                        <option selected value="<?php echo $record->idCat ?>"><?php echo $this->getNameCat($record->idCat) ?></option>
                        <?php foreach ($cat as $row): ?>
                            <option value="<?php echo $row->id_danhmuc ?>"><?php echo $row->tendanhmuc ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group ">
                    <label style="font-weight: bolder;" class="control-label mt-3">Mô tả sản phẩm</label>
                    <textarea id="mota" name="mota" class="form-control"> <?php echo $record->mota ?> </textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace("mota");
                    </script>
                </div>
                <div class="form-group col-md-12">
                    <label style="font-weight: bolder;" class="control-label mt-3">Ảnh sản phẩm</label>
                    <input class="form-control" id="imagepro" name="imagepro[]" multiple style="width:30%" type="file">
                </div>
                <!-- lisst picture -->
                <div class=" col-md-12">
                    <?php foreach ($this->getAllImg($record->idPro) as $img) : ?>
                        <img style="width:200px;height:200px;margin-top:20px;border:1px solid black;border-radius:5px"
                            src="../assets/img-add-pro/<?php echo $img->image ?>">
                    <?php endforeach ?>
                </div>
                <button class="btn btn-success mt-4 ms-2" type="submit" id="buttonAddPro" style="width:10%" value="Thêm" name="addproduct"> Cập nhật
                </button>
            </form>
        <?php endforeach ?>
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