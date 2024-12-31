<?php
//load file layout.php
$this->layoutPath = "Layout.php";
?>
<div class="pagetitle">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="font-size:2vw;font-size:2vh">
            <li class="breadcrumb-item"><a href="index.php?controller=discount">Quản lý chương trình giảm giá</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm chương trình mới</li>
        </ol>
    </nav>
    <div style="background-color: white;padding:20px;border-radius:20px;box-shadow: 2px 2px 2px #FFCC99;">
        <!-- End Page Title -->
        <form style="font-size:2vw;font-size:2vh" method="post" id="AddProForm"
            action="index.php?controller=discount&action=store" enctype="multipart/form-data" class="row mt-4">
            <div class="form-group col-md-4">
                <label style="font-weight: bolder;" class="control-label">Tên chương trình</label>
                <input style="font-size:2vw;font-size:2vh" class="form-control" id="nameDiscount" name="name" required>
            </div>
            <div class="form-group col-md-4">
                <label style="font-weight: bolder;" class="control-label">Giảm giá</label>
                <input style="font-size:2vw;font-size:2vh" class="form-control" name="discount" id="discount"
                    type="text" required>
            </div>
            <div class="form-group  col-md-4">
                <label style="font-weight: bolder;" class="control-label mt-3">Ngày áp dụng</label>
                <input style="font-size:2vw;font-size:2vh" class="form-control" id="giavonpro" name="dateStart"
                    type="date" required>
            </div>
            <div class="form-group  col-md-4">
                <label style="font-weight: bolder;" class="control-label mt-3">Ngày kết thúc</label>
                <input style="font-size:2vw;font-size:2vh" class="form-control" id="giavonpro" name="dateEnd"
                    type="date" required>
            </div>
            <div class="form-group col-md-3">
                <label style="font-weight: bolder;" class="control-label mt-3">Danh mục</label>
                <select style="font-size:2vw;font-size:2vh" class="form-control" id="danhmucAddpro"
                    name="category" required>
                    <option>Chọn danh mục sản phẩm giảm giá</option>
                    <?php foreach ($category as $row): ?>
                        <option value="<?php echo $row->id_danhmuc ?>"><?php echo $row->tendanhmuc ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <button class="btn btn-success mt-4 ms-2" type="submit" id="buttonAddPro"
                    style="width:10%;font-size:2vw;font-size:2vh" value="Thêm" name="addproduct"> Thêm
                </button>
            </div>
        </form>
    </div>
</div>
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