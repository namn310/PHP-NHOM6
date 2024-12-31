<?php
//load file layout.php
$this->layoutPath = "Layout.php";
?>
<div class="pagetitle">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="font-size: 22px;">
            <li class="breadcrumb-item"><a href="index.php?controller=danhmuc">Quản lý danh mục</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm danh mục</li>
        </ol>
    </nav>
    <!-- End Page Title -->
    <form id="AddForm" method="post" class="AddForm row mt-4" action="index.php?controller=danhmuc&action=createPost" enctype="multipart/form-data" style="background-color: white;padding:20px;border-radius:20px;box-shadow: 2px 2px 2px #FFCC99;">

        <div class="form-group col-md-4">
            <label style="font-weight: bolder;" class="control-label">Tên danh mục</label>
            <input class="form-control" id="nameDM" name="nameDM" type="text">
        </div>
        <button class="btn btn-success mt-4" type="submit" href="" id="addbutton" style="width:10%">Thêm</button>
    </form>
</div>